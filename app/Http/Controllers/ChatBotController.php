<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Services\HuggingFaceService;
use Illuminate\Http\Request;

class ChatBotController extends Controller
{
    public function message(Request $request, HuggingFaceService $hf)
    {
        $request->validate([
            'message' => 'required|string|max:500',
        ]);

        $userMessage = $request->input('message');
        $history = $request->input('history', []);

        $systemPrompt = "You are an auto parts search assistant for autoparts-uk.co.uk. "
            . "Your ONLY role is to help customers find car parts that exist on our platform. "
            . "You have access to our FULL catalog — search results show the most relevant matches. "
            . "ONLY reference products that appear in the list provided to you. "
            . "If no matching products exist, say 'No parts found for your search' and suggest they try different keywords. "
            . "Do NOT answer general questions, give advice, or talk about anything other than our product catalog. "
            . "Be concise. Respond in the same language as the customer."
            . "\n\nWhen listing products, ALWAYS format them as a clean bullet-point list using dashes, one product per line. "
            . "Example format:\n"
            . "- Product Name — £Price\n"
            . "- Product Name — £Price\n"
            . "Do NOT put multiple products on the same line. Group by category if possible. "
            . "Start with a brief line like 'I found X matching products:' then list them.";

        $params = $hf->parseSearchIntent($userMessage);

        $allProducts = $this->searchProducts($params, 100);
        $displayProducts = $allProducts->take(8);

        $context = $allProducts->map(fn($p) => [
            'name' => $p->name,
            'price' => number_format($p->price, 2),
            'brand' => $p->brand ?? 'Generic',
            'category' => $p->category?->name ?? 'General',
        ])->toArray();

        if ($hf->isAvailable()) {
            $contextPrompt = $systemPrompt;
            if (!empty($context)) {
                $totalProducts = count($context);
                $contextPrompt .= "\n\nI found {$totalProducts} matching product(s) from our catalog. List them with dashes, one per line. Help the customer choose the right one by referencing name, price, and brand.";
            } else {
                $contextPrompt .= "\n\nNo matching products were found in our full catalog. Suggest the customer try different keywords, check spelling, or browse categories. Do NOT claim products exist that aren't listed.";
            }
            $aiResponse = $hf->chat($contextPrompt, $userMessage, $context);
        } else {
            $aiResponse = '';
        }

        if (!$hf->isAvailable() || $aiResponse === $hf->getLastFallback()) {
            if (!empty($context)) {
                $names = array_slice(array_map(fn($p) => $p['name'], $context), 0, 5);
                $bulletList = '';
                foreach ($names as $n) {
                    $bulletList .= "\n- " . $n;
                }
                $aiResponse = 'I found ' . count($context) . ' matching part' . (count($context) > 1 ? 's' : '') . ':' . $bulletList
                    . "\n\nYou can click on any product above for more details. "
                    . 'Tell me if you need something else!';
            } else {
                $aiResponse = 'No parts found for "' . $userMessage . '". Try different keywords like "brake discs Golf 7" or browse our categories.';
            }
        }

        $productResults = $displayProducts->map(fn($p) => [
            'id' => $p->id,
            'name' => $p->name,
            'slug' => $p->slug,
            'price' => '£' . number_format($p->price, 2),
            'image' => $p->image,
            'brand' => $p->brand,
            'category' => $p->category?->name,
            'url' => route('product.show', $p->slug),
        ]);

        return response()->json([
            'reply' => $aiResponse,
            'products' => $productResults,
            'params' => $params,
        ]);
    }

    public function aiSearch(Request $request, HuggingFaceService $hf)
    {
        $request->validate([
            'q' => 'required|string|max:500',
        ]);

        $query = $request->input('q');
        $params = $hf->parseSearchIntent($query);
        $allProducts = $this->searchProducts($params, 100);
        $products = $allProducts->take(8);

        return response()->json([
            'products' => $products->map(fn($p) => [
                'id' => $p->id,
                'name' => $p->name,
                'slug' => $p->slug,
                'price' => '£' . number_format($p->price, 2),
                'image' => $p->image,
                'brand' => $p->brand,
                'category' => $p->category?->name,
                'url' => route('product.show', $p->slug),
            ]),
            'params' => $params,
        ]);
    }

    protected function searchProducts(array $params, int $limit = 8)
    {
        $query = Product::where('is_active', true)->with('category');

        if (!empty($params['brand'])) {
            $query->where(function ($q) use ($params) {
                $q->where('brand', 'like', $params['brand'] . '%')
                  ->orWhere('compatibility', 'like', '%' . $params['brand'] . '%');
            });
        }

        if (!empty($params['make'])) {
            $query->where(function ($q) use ($params) {
                $q->where('brand', 'like', $params['make'] . '%')
                  ->orWhere('compatibility', 'like', '%' . $params['make'] . '%');
            });
        }

        if (!empty($params['category'])) {
            $category = Category::where('name', 'like', '%' . $params['category'] . '%')->first();
            if ($category) {
                $query->where('category_id', $category->id);
            }
        }

        if (!empty($params['min_price'])) {
            $query->where('price', '>=', (float) $params['min_price']);
        }

        if (!empty($params['max_price'])) {
            $query->where('price', '<=', (float) $params['max_price']);
        }

        if (!empty($params['keywords'])) {
            $keywords = $params['keywords'];
            $terms = preg_split('/[\s,]+/', trim($keywords));
            $terms = array_filter($terms, fn($t) => strlen($t) >= 2);
            $fulltextTerms = [];

            foreach ($terms as $t) {
                $fulltextTerms[] = '+' . preg_replace('/[+\-><\(\)~*\"@]/', '', $t) . '*';
            }

            if (!empty($fulltextTerms)) {
                $boolQuery = implode(' ', $fulltextTerms);
                $query->where(function ($q) use ($boolQuery, $terms) {
                    $q->whereRaw('MATCH(name, sku, description, compatibility, brand) AGAINST(? IN BOOLEAN MODE)', [$boolQuery]);
                    $q->orWhere(function ($sub) use ($terms) {
                        foreach ($terms as $t) {
                            $sub->where(function ($s) use ($t) {
                                $s->where('name', 'like', '%' . $t . '%')
                                  ->orWhere('brand', 'like', '%' . $t . '%')
                                  ->orWhere('compatibility', 'like', '%' . $t . '%');
                            });
                        }
                    });
                });
            }
        }

        return $query->take($limit)->get();
    }
}
