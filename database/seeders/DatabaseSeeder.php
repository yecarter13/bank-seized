<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@autoparts.co.uk',
            'password' => bcrypt('admin123'),
            'is_admin' => true,
        ]);

        $categories = [
            ['name' => 'Braking', 'slug' => 'braking', 'image' => 'brakes.png', 'sort_order' => 1],
            ['name' => 'Filtration', 'slug' => 'filtration', 'image' => 'aircondition.png', 'sort_order' => 2],
            ['name' => 'Exhaust Systems', 'slug' => 'exhaust', 'image' => 'exhaust.png', 'sort_order' => 3],
            ['name' => 'Suspension', 'slug' => 'suspension', 'image' => 'suspension.png', 'sort_order' => 4],
            ['name' => 'Engine & Components', 'slug' => 'engine', 'image' => 'engine.png', 'sort_order' => 5],
            ['name' => 'Electronics', 'slug' => 'electronics', 'image' => 'electrics.png', 'sort_order' => 6],
        ];

        foreach ($categories as $c) {
            Category::create($c);
        }

        $products = [
            ['name' => 'Brembo High-Performance Brake Disc', 'slug' => 'brembo-high-performance-brake-disc', 'category_id' => 1, 'sku' => 'BRM-BD-001', 'price' => 189.99, 'old_price' => 229.99, 'compatibility' => 'BMW 3 Series E90 (2005-2012)', 'image' => 'https://images.unsplash.com/photo-1578643463396-0997cb5328c1?w=400&q=80', 'is_new' => true, 'stock_quantity' => 45, 'rating' => 4.8, 'review_count' => 124, 'brand' => 'Brembo', 'description' => '<p>Genuine Brembo high-performance brake discs engineered for maximum stopping power and heat dissipation. Manufactured from high-carbon cast iron with precision machining for perfect run-out tolerance.</p><ul><li>Direct OEM replacement — no modification required</li><li>High-carbon cast iron construction for durability</li><li>Precision balanced for vibration-free braking</li><li>Corrosion-resistant coating on non-braking surfaces</li><li>Sold individually — pair required per axle</li></ul>'],
            ['name' => 'Bosch Oil Filter — PremiumLine', 'slug' => 'bosch-oil-filter-premiumline', 'category_id' => 2, 'sku' => 'BOS-OF-002', 'price' => 14.99, 'old_price' => null, 'compatibility' => 'VW Golf Mk7 / Audi A3 8V', 'image' => 'https://images.unsplash.com/photo-1580273916550-e323be2ae537?w=400&q=80', 'is_new' => false, 'stock_quantity' => 230, 'rating' => 4.6, 'review_count' => 89, 'brand' => 'Bosch', 'description' => '<p>Bosch PremiumLine oil filters deliver outstanding filtration performance and engine protection. Featuring high-quality filtration media and a robust construction, they meet or exceed OE specifications.</p><ul><li>High filtration efficiency for extended engine life</li><li>Heavy-duty construction withstands high oil pressure</li><li>Anti-drain back valve prevents dry starts</li><li>Easily recyclable — environmentally friendly</li><li>Meets or exceeds OEM specifications</li></ul>'],
            ['name' => 'Valeo Complete Clutch Kit', 'slug' => 'valeo-complete-clutch-kit', 'category_id' => 5, 'sku' => 'VAL-CK-003', 'price' => 349.99, 'old_price' => 399.99, 'compatibility' => 'Ford Focus Mk3 (2011-2018)', 'image' => 'https://images.unsplash.com/photo-1486262715619-67b85e0b08d3?w=400&q=80', 'is_new' => true, 'stock_quantity' => 18, 'rating' => 4.7, 'review_count' => 56, 'brand' => 'Valeo', 'description' => '<p>Complete Valeo clutch kit including pressure plate, driven plate, release bearing, and pilot bearing. Everything you need for a professional clutch replacement.</p><ul><li>Complete kit — all components included</li><li>OEM specification — direct fit</li><li>Sachs/ZF manufacturing quality</li><li>Balanced for smooth engagement</li><li>Includes alignment tool for easy installation</li></ul>'],
            ['name' => 'Bilstein B4 Shock Absorber', 'slug' => 'bilstein-b4-shock-absorber', 'category_id' => 4, 'sku' => 'BIL-B4-004', 'price' => 149.99, 'old_price' => null, 'compatibility' => 'Mercedes-Benz C-Class W204', 'image' => 'https://images.unsplash.com/photo-1619642751034-765dfdf7c58e?w=400&q=80', 'is_new' => false, 'stock_quantity' => 37, 'rating' => 4.9, 'review_count' => 203, 'brand' => 'Bilstein', 'description' => '<p>Bilstein B4 gas pressure shock absorbers deliver outstanding ride comfort and handling precision. The German-engineered monotube design ensures consistent damping performance in all conditions.</p><ul><li>Premium gas pressure technology</li><li>Direct OEM replacement — bolt-on installation</li><li>Consistent damping performance regardless of temperature</li><li>Triple-chrome plated piston rod for corrosion resistance</li><li>2-year manufacturer warranty</li></ul>'],
            ['name' => 'NGK Iridium Spark Plugs — Set of 4', 'slug' => 'ngk-iridium-spark-plugs-set-of-4', 'category_id' => 5, 'sku' => 'NGK-IR-005', 'price' => 44.99, 'old_price' => 54.99, 'compatibility' => 'Toyota Corolla E210 (2019+)', 'image' => 'https://images.unsplash.com/photo-1578643463396-0997cb5328c1?w=400&q=80', 'is_new' => true, 'stock_quantity' => 150, 'rating' => 4.5, 'review_count' => 312, 'brand' => 'NGK', 'description' => '<p>NGK Iridium IX spark plugs feature a fine iridium tip for superior ignitability, better fuel economy, and longer service life. Pre-gapped for easy installation.</p><ul><li>Iridium 0.6mm centre electrode for sharp spark</li><li>Improved throttle response and fuel efficiency</li><li>Pre-gapped — ready to install out of the box</li><li>Longer service life than standard copper plugs</li><li>Set of 4 — suitable for 4-cylinder engines</li></ul>'],
            ['name' => 'Febi Bilstein Control Arm', 'slug' => 'febi-bilstein-control-arm', 'category_id' => 4, 'sku' => 'FEB-CA-006', 'price' => 89.99, 'old_price' => null, 'compatibility' => 'Audi A4 B9 (2015-2020)', 'image' => 'https://images.unsplash.com/photo-1580273916550-e323be2ae537?w=400&q=80', 'is_new' => false, 'stock_quantity' => 62, 'rating' => 4.4, 'review_count' => 78, 'brand' => 'Febi Bilstein', 'description' => '<p>Febi Bilstein control arms are manufactured to the highest OE standards. Each arm is precision-engineered for exact fitment and long service life.</p><ul><li>OE-quality construction and materials</li><li>Includes ball joint and bushings pre-installed</li><li>Corrosion-protected for UK road conditions</li><li>Direct bolt-on replacement — no modification needed</li><li>5-year warranty against manufacturing defects</li></ul>'],
            ['name' => 'Mann-Filter Air Filter', 'slug' => 'mann-filter-air-filter', 'category_id' => 2, 'sku' => 'MNN-AF-007', 'price' => 32.99, 'old_price' => 39.99, 'compatibility' => 'Range Rover L405 (2013-2021)', 'image' => 'https://images.unsplash.com/photo-1486262715619-67b85e0b08d3?w=400&q=80', 'is_new' => true, 'stock_quantity' => 85, 'rating' => 4.7, 'review_count' => 145, 'brand' => 'Mann-Filter', 'description' => '<p>Mann-Filter air filters provide outstanding engine protection with their multi-layer filtration media. Traps 99.5% of airborne contaminants while maintaining optimal airflow.</p><ul><li>Multi-layer synthetic filtration media</li><li>99.5% filtration efficiency</li><li>High dust-holding capacity extends service intervals</li><li>OE fitment — exact match to original</li><li>Made in Germany</li></ul>'],
            ['name' => 'SKF Wheel Bearing Kit', 'slug' => 'skf-wheel-bearing-kit', 'category_id' => 4, 'sku' => 'SKF-WB-008', 'price' => 67.99, 'old_price' => null, 'compatibility' => 'Vauxhall Astra K (2015-2022)', 'image' => 'https://images.unsplash.com/photo-1619642751034-765dfdf7c58e?w=400&q=80', 'is_new' => false, 'stock_quantity' => 41, 'rating' => 4.3, 'review_count' => 92, 'brand' => 'SKF', 'description' => '<p>SKF wheel bearing kits include premium-quality bearings, circlips, and grease for a complete professional installation. SKF is the world leader in bearing technology.</p><ul><li>Complete kit — everything needed for replacement</li><li>Premium-grade bearing steel for long life</li><li>Pre-packed with high-temperature grease</li><li>Integrated ABS sensor ring on applicable models</li><li>Stringent OE quality control standards</li></ul>'],
        ];

        foreach ($products as $p) {
            Product::create($p);
        }
    }
}
