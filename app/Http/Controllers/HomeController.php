<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $slides = collect([
            (object) [
                'title' => 'Bank Seized Cars at Unbeatable Prices',
                'subtitle' => 'Browse our inventory of bank-repossessed vehicles — quality cars at fraction of market value',
                'cta_primary' => 'Browse Inventory',
                'cta_secondary' => 'How It Works',
                'image' => 'https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?w=1920&q=80',
                'tag' => 'Best Deals',
            ],
            (object) [
                'title' => 'Verified Vehicles, Transparent History',
                'subtitle' => 'Every vehicle comes with full inspection report and clean title documentation',
                'cta_primary' => 'View Reports',
                'cta_secondary' => 'Our Process',
                'image' => 'https://images.unsplash.com/photo-1503376780353-7e6692767b70?w=1920&q=80',
                'tag' => 'Quality Assured',
            ],
            (object) [
                'title' => 'Serving Burlington, Vermont & Beyond',
                'subtitle' => 'Visit us at 1675 Shelburne Rd, South Burlington, VT 05403',
                'cta_primary' => 'Get Directions',
                'cta_secondary' => 'Contact Us',
                'image' => 'https://images.unsplash.com/photo-1562141961-b5f1e805e1af?w=1920&q=80',
                'tag' => 'Visit Us',
            ],
        ]);

        $categories = collect([
            (object) ['name' => 'Sedan', 'slug' => 'sedan', 'image' => 'default.png', 'count' => 0],
            (object) ['name' => 'SUV', 'slug' => 'suv', 'image' => 'default.png', 'count' => 0],
            (object) ['name' => 'Truck', 'slug' => 'truck', 'image' => 'default.png', 'count' => 0],
            (object) ['name' => 'Coupe', 'slug' => 'coupe', 'image' => 'default.png', 'count' => 0],
            (object) ['name' => 'Hatchback', 'slug' => 'hatchback', 'image' => 'default.png', 'count' => 0],
            (object) ['name' => 'Minivan', 'slug' => 'minivan', 'image' => 'default.png', 'count' => 0],
            (object) ['name' => 'Convertible', 'slug' => 'convertible', 'image' => 'default.png', 'count' => 0],
            (object) ['name' => 'Wagon', 'slug' => 'wagon', 'image' => 'default.png', 'count' => 0],
        ]);

        $products = Product::inRandomOrder()->take(8)->get();

        $brands = collect(config('brands'))
            ->filter(fn($file) => file_exists(base_path('public/images/' . $file)))
            ->map(fn($file, $name) => (object) ['name' => $name, 'logo' => asset('images/' . $file)])
            ->values();

        $testimonials = [
            (object) ['name' => 'Michael Johnson', 'location' => 'Burlington', 'avatar' => 'https://i.pravatar.cc/100?u=1', 'rating' => 5, 'text' => 'Found a 2020 Honda Civic at 40% below market price. Process was smooth and the car runs perfectly.'],
            (object) ['name' => 'Sarah Anderson', 'location' => 'Montpelier', 'avatar' => 'https://i.pravatar.cc/100?u=2', 'rating' => 5, 'text' => "Purchased a Toyota Camry for my daughter's college. Great condition and fair price."],
            (object) ['name' => 'David Martinez', 'location' => 'Essex Junction', 'avatar' => 'https://i.pravatar.cc/100?u=3', 'rating' => 5, 'text' => "Skeptic at first, but the vehicle inspection report was thorough. Bought a Ford F-150 I'm very happy with."],
            (object) ['name' => 'Jennifer Lee', 'location' => 'Winooski', 'avatar' => 'https://i.pravatar.cc/100?u=4', 'rating' => 5, 'text' => 'Best car buying experience. No haggle pricing and the staff was incredibly helpful.'],
            (object) ['name' => 'Robert Wilson', 'location' => 'Plattsburgh', 'avatar' => 'https://i.pravatar.cc/100?u=5', 'rating' => 5, 'text' => 'Saved thousands on my BMW 3 Series. Will definitely check here first for my next car.'],
            (object) ['name' => 'Emily Davis', 'location' => 'St. Albans', 'avatar' => 'https://i.pravatar.cc/100?u=6', 'rating' => 5, 'text' => 'Bought a Subaru Outback for Vermont winters. Runs great and was priced fairly.'],
        ];

        return view('pages.home', compact('slides', 'categories', 'products', 'brands', 'testimonials'));
    }
}
