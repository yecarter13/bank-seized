<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function suggest(Request $request)
    {
        $search = $request->input('q');
        if (!$search || strlen($search) < 2) {
            return response()->json([]);
        }

        $terms = preg_split('/[\s,]+/', trim($search));
        $terms = array_filter($terms, fn($t) => strlen($t) >= 2);

        // Brand suggestions (fast LIKE only - no AI call)
        $brands = Product::where('is_active', true)
            ->where('brand', '!=', '')
            ->whereNotNull('brand')
            ->where(function ($q) use ($terms) {
                foreach ($terms as $t) {
                    $q->orWhere('brand', 'like', $t . '%');
                }
            })
            ->distinct()
            ->take(4)
            ->pluck('brand');

        // Product suggestions using FULLTEXT (primary) + LIKE (fallback)
        $fulltextTerms = [];
        foreach ($terms as $t) {
            $fulltextTerms[] = '+' . preg_replace('/[+\-><\(\)~*\"@]/', '', $t) . '*';
        }

        $products = collect();
        if (!empty($fulltextTerms)) {
            $boolQuery = implode(' ', $fulltextTerms);
            try {
                $products = Product::where('is_active', true)
                    ->whereRaw('MATCH(name, sku, description, compatibility, brand) AGAINST(? IN BOOLEAN MODE)', [$boolQuery])
                    ->take(8)
                    ->get(['id', 'name', 'slug', 'price', 'image', 'brand']);
            } catch (\Exception $e) {
                // FULLTEXT index may be missing - fall through to LIKE
            }
        }

        if ($products->count() < 8) {
            $existingIds = $products->pluck('id')->toArray();
            $like = Product::where('is_active', true)
                ->where(function ($q) use ($terms) {
                    foreach ($terms as $t) {
                        $q->where(function ($s) use ($t) {
                            $s->where('name', 'like', '%' . $t . '%')
                              ->orWhere('brand', 'like', '%' . $t . '%')
                              ->orWhere('compatibility', 'like', '%' . $t . '%');
                        });
                    }
                });
            if ($existingIds) {
                $like->whereNotIn('id', $existingIds);
            }
            $likeProducts = $like->take(8 - $products->count())
                ->get(['id', 'name', 'slug', 'price', 'image', 'brand']);
            $products = $products->concat($likeProducts);
        }

        return response()->json([
            'products' => $products->map(fn($p) => [
                'name' => $p->name,
                'slug' => $p->slug,
                'price' => '$' . number_format($p->price, 2),
                'image' => $p->image,
                'brand' => $p->brand,
            ]),
            'brands' => $brands,
        ]);
    }

    public function index(Request $request)
    {
        $makes = array_keys(config('brands'));
        $categories = Category::where('is_active', true)->orderBy('name')->get();
        $years = range(1990, 2026);

        $query = Product::where('is_active', true)->with('category');

        $currentCategory = null;
        if ($request->filled('category')) {
            $currentCategory = Category::where('slug', $request->category)->first();
            $query->whereHas('category', fn($q) => $q->where('slug', $request->category));
        }
        if ($request->filled('search')) {
            $s = $request->search;
            $terms = preg_split('/[\s,]+/', trim($s));
            $terms = array_filter($terms, fn($t) => strlen($t) >= 2);
            $query->where(function ($q) use ($terms) {
                foreach ($terms as $t) {
                    $q->where(function ($s) use ($t) {
                        $s->where('name', 'like', '%' . $t . '%')
                          ->orWhere('brand', 'like', '%' . $t . '%')
                          ->orWhere('compatibility', 'like', '%' . $t . '%')
                          ->orWhere('sku', 'like', '%' . $t . '%');
                    });
                }
            });
            $query->orderByRaw("CASE WHEN brand LIKE ? THEN 0 WHEN name LIKE ? THEN 1 ELSE 2 END", [$s . '%', '%' . $s . '%']);
        }
        if ($request->filled('make')) {
            $query->where(function($q) use ($request) {
                $q->where('brand', $request->make)
                  ->orWhere('compatibility', 'like', "%{$request->make}%");
            });
        }
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        $sort = $request->input('sort', 'random');

        if ($sort === 'random') {
            $query->inRandomOrder();
        } else {
            $query->orderBy(match($sort) {
                'price_asc' => 'price', 'price_desc' => 'price',
                'newest' => 'created_at', 'rating' => 'rating',
                default => 'review_count',
            }, in_array($sort, ['price_asc', 'newest']) ? 'asc' : 'desc');
        }

        $total = $query->count();
        $perPage = 20;
        $products = $query->paginate($perPage)->withQueryString();

        $makeLogo = null;
        $makeName = $request->make;
        if ($makeName && isset(config('brands')[$makeName])) {
            $file = config('brands')[$makeName];
            if (file_exists(base_path('public/images/' . $file))) {
                $makeLogo = asset('images/' . $file);
            }
        }

        $categoryTitle = null;
        $metaDescription = null;
        if ($currentCategory) {
            $categoryTitle = $currentCategory->name . ' Bank Seized Cars — Bank Seized Cars for Sale';
            $metaDescription = "Shop premium {$currentCategory->name} bank seized cars. Fast delivery across the US. Quality seized vehicles at great prices.";
        } elseif ($makeName) {
            $categoryTitle = $makeName . ' Bank Seized Cars — Bank Seized Cars for Sale';
            $metaDescription = "Find quality {$makeName} bank seized cars. Wide range of seized vehicles with fast delivery.";
        } elseif ($request->filled('search')) {
            $searchTerm = trim($request->search);
            $categoryTitle = ucfirst($searchTerm) . ' — Bank Seized Cars — Bank Seized Cars for Sale';
            $metaDescription = "Browse {$total} results for '{$searchTerm}'. Bank seized cars at great prices with fast delivery.";
        }

        $noindex = $request->has('page') && $request->page > 1; // noindex paginated pages

        return view('pages.shop', compact('makes', 'categories', 'years', 'products', 'total', 'makeName', 'makeLogo', 'currentCategory', 'categoryTitle', 'metaDescription', 'noindex'));
    }

    public function categories()
    {
        $imageMap = [
            'Sedan' => 'default.png',
            'SUV' => 'default.png',
            'Truck' => 'default.png',
            'Coupe' => 'default.png',
            'Hatchback' => 'default.png',
            'Minivan' => 'default.png',
            'Convertible' => 'default.png',
            'Wagon' => 'default.png',
        ];

        $categories = Category::withCount('products')
            ->where('is_active', true)
            ->orderBy('products_count', 'desc')
            ->get()
            ->filter(fn($c) => $c->products_count > 0)
            ->map(fn($c) => (object) [
                'name' => $c->name,
                'slug' => $c->slug,
                'image' => $c->image ?? $imageMap[$c->name] ?? 'default.png',
                'count' => $c->products_count,
            ])
            ->values();

        return view('pages.categories-index', compact('categories'));
    }
}
