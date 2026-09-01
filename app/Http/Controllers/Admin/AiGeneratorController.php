<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class AiGeneratorController extends Controller
{
    public function generate(Request $request)
    {
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'brand' => 'nullable|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'price' => 'nullable|numeric',
            'keywords' => 'nullable|string|max:500',
        ]);

        $category = $validated['category_id'] ? Category::find($validated['category_id']) : null;
        $catName = $category?->name ?? 'automotive';
        $brand = $validated['brand'] ?? 'OEM';
        $keywords = $validated['keywords'] ?? '';
        $name = $validated['name'] ?: ($keywords ? explode(',', $keywords)[0] : 'Premium Part');
        $price = $validated['price'] ?? 0;

        $features = $this->generateFeatures($catName, $brand, $keywords);
        $specs = $this->generateSpecs($catName, $brand);
        $description = $this->generateDescription($name, $brand, $catName, $features);
        $metaTitle = $this->generateMetaTitle($name, $brand);
        $metaDescription = $this->generateMetaDescription($name, $brand, $catName);

        return response()->json([
            'description' => $description,
            'specifications' => $specs,
            'meta_title' => $metaTitle,
            'meta_description' => $metaDescription,
        ]);
    }

    private function generateDescription(string $name, string $brand, string $category, array $features): string
    {
        $lines = [];
        $lines[] = "<p>Genuine {$brand} {$category} component — the {$name} is engineered to meet the highest OE standards. Manufactured from premium-grade materials, this part delivers outstanding performance, durability, and reliability for your vehicle.</p>";
        $lines[] = "<p>Every {$brand} {$category} component undergoes rigorous quality control testing to ensure perfect fitment and long service life. Whether you're a professional mechanic or a dedicated enthusiast, you can trust this part to restore your vehicle's performance to factory specifications.</p>";
        $lines[] = "<p><strong>Key Features:</strong></p><ul>";
        foreach ($features as $feature) {
            $lines[] = "<li>{$feature}</li>";
        }
        $lines[] = "</ul>";
        $lines[] = "<p>Compatible with a wide range of vehicles — please verify your vehicle's compatibility using our handy lookup tool or contact our expert support team for assistance.</p>";

        return implode("\n", $lines);
    }

    private function generateFeatures(string $category, string $brand, string $keywords): array
    {
        $base = [
            "Direct OE replacement — no modifications required for installation",
            "Manufactured from high-grade materials for maximum durability",
            "Corrosion-resistant coating for long-lasting protection",
            "Rigorously tested to meet or exceed OEM specifications",
            "Precision-engineered for perfect fitment every time",
            "Backed by full manufacturer warranty",
        ];

        $catFeatures = [
            'braking' => ['High-carbon disc construction for superior heat dissipation', 'Low dust formulation for cleaner wheels', 'ECE R90 certified for road use'],
            'engine' => ['High-temperature resistant construction', 'Precision tolerances for optimal performance', 'Improved fuel efficiency and reduced emissions'],
            'suspension' => ['Gas-pressurised design for consistent damping', 'Triple-stage corrosion protection', 'Enhanced ride comfort and vehicle handling'],
            'filtration' => ['Multi-layer filtration media for 99.5% efficiency', 'High dust-holding capacity for extended service intervals', 'Environmentally friendly — fully recyclable'],
            'exhaust' => ['Mandrel-bent tubing for optimal exhaust flow', 'Stainless steel construction for longevity', 'Deep, sporty tone without drone'],
            'electrics' => ['Water-resistant sealed construction', 'Overload protection for peace of mind', 'Direct plug-and-play connection'],
        ];

        foreach ($catFeatures as $key => $extra) {
            if (str_contains(strtolower($category), $key)) {
                $base = array_merge($base, $extra);
                break;
            }
        }

        if (!empty($keywords)) {
            $kw = array_map('trim', explode(',', $keywords));
            foreach ($kw as $k) {
                if (!empty($k)) {
                    $base[] = "Optimised for {$k} applications";
                }
            }
        }

        return array_slice($base, 0, 7);
    }

    private function generateSpecs(string $category, string $brand): string
    {
        return "<ul>
<li>Brand: {$brand}</li>
<li>Category: {$category}</li>
<li>Condition: Brand New — OEM Quality</li>
<li>Warranty: 12 Months (24 months on Premium parts)</li>
<li>Material: High-grade engineered materials</li>
<li>Certification: TUV / ECE / ISO 9001</li>
<li>Packaging: Manufacturer-sealed packaging</li>
</ul>";
    }

    private function generateMetaTitle(string $name, string $brand): string
    {
        $parts = explode(' ', $name);
        $short = implode(' ', array_slice($parts, 0, 5));
        return "{$short} — {$brand} | Buy UK | Next-Day Delivery";
    }

    private function generateMetaDescription(string $name, string $brand, string $category): string
    {
        $parts = explode(' ', $name);
        $short = implode(' ', array_slice($parts, 0, 6));
        return "Check out this {$short} from Bank Seized Cars. {$brand} {$category} with full inspection report. ✓ Verified vehicle ✓ Fair pricing ✓ Expert support. Contact us at +1 (909) 784-5166 or WhatsApp +1 (217) 481-1401.";
    }
}
