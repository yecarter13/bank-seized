-- Bank Seized Cars for Sale — Database Seed
-- Burlington, VT 05403

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Users
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
INSERT INTO `users` VALUES (1,'Admin','admin@bankseizedcars.com',1,NULL,'$2y$12$4g/HtLUi9iI7nbTTXFV0n.xrqwPJcdcmRemVg1Qr.kdC55zdrHQ9W',NULL,NOW(),NOW());

-- Cache
DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Sessions
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Jobs
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` smallint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Password reset tokens
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Categories (body types)
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
INSERT INTO `categories` VALUES
(1,'Sedan','sedan','Comfortable and fuel-efficient passenger cars','https://images.unsplash.com/photo-1549317661-bd32c8ce0afa?w=400&q=80',NULL,1,1,NOW(),NOW()),
(2,'SUV','suv','Spacious sport utility vehicles for families','https://images.unsplash.com/photo-1519641471654-76ce0107ad1b?w=400&q=80',NULL,1,2,NOW(),NOW()),
(3,'Truck','truck','Powerful pickup trucks for work and play','https://images.unsplash.com/photo-1559416523-140ddc3d238c?w=400&q=80',NULL,1,3,NOW(),NOW()),
(4,'Coupe','coupe','Sleek two-door sports cars','https://images.unsplash.com/photo-1544636331-e26879cd4d9b?w=400&q=80',NULL,1,4,NOW(),NOW()),
(5,'Hatchback','hatchback','Compact and practical everyday vehicles','https://images.unsplash.com/photo-1471444928139-48c5bf5173c8?w=400&q=80',NULL,1,5,NOW(),NOW()),
(6,'Minivan','minivan','Family-friendly minivans with maximum space','https://images.unsplash.com/photo-1590362891991-f776e747a588?w=400&q=80',NULL,1,6,NOW(),NOW()),
(7,'Convertible','convertible','Open-top cars for the ultimate driving experience','https://images.unsplash.com/photo-1502877338535-766e1452684a?w=400&q=80',NULL,1,7,NOW(),NOW()),
(8,'Wagon','wagon','Versatile station wagons with cargo space','https://images.unsplash.com/photo-1552519507-da3b142c6e3d?w=400&q=80',NULL,1,8,NOW(),NOW());

-- Products (sample vehicles)
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `specifications` text COLLATE utf8mb4_unicode_ci,
  `price` decimal(10,2) NOT NULL,
  `old_price` decimal(10,2) DEFAULT NULL,
  `down_payment` decimal(10,2) DEFAULT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `compatibility` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gallery_images` json DEFAULT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mileage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transmission` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fuel_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exterior_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interior_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `engine_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `drivetrain` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `condition_note` text COLLATE utf8mb4_unicode_ci,
  `is_new` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `stock_quantity` int NOT NULL DEFAULT '0',
  `rating` decimal(3,1) NOT NULL DEFAULT '0.0',
  `review_count` int NOT NULL DEFAULT '0',
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_slug_unique` (`slug`),
  UNIQUE KEY `products_sku_unique` (`sku`),
  KEY `products_category_id_foreign` (`category_id`),
  FULLTEXT KEY `ft_search` (`name`,`sku`,`description`,`compatibility`,`brand`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
INSERT INTO `products` VALUES
(1,2,'2021 Honda CR-V EX-L','2021-honda-cr-v-ex-l','<p>Well-maintained 2021 Honda CR-V EX-L with one owner. Clean title, no accidents. Features leather seats, sunroof, and Honda Sensing suite.</p><ul><li>One-owner vehicle with clean title</li><li>Leather seats and sunroof</li><li>Honda Sensing safety suite</li><li>Apple CarPlay and Android Auto</li><li>Fully inspected and road-ready</li></ul>',NULL,28500.00,32000.00,5000.00,'BSC-001','Honda CR-V 2017-2022','https://images.unsplash.com/photo-1568844293986-8d0400f4745b?w=800&q=80',NULL,'Honda','2021','38,500 miles','Automatic','Gasoline','2HKRW2H5XMH642351','Platinum White Pearl','Black Leather','1.5L Turbo 4-Cylinder','AWD','Minor rock chips on hood, interior immaculate',0,1,1,4.5,23,NULL,NULL,NOW(),NOW()),
(2,1,'2019 Toyota Camry SE','2019-toyota-camry-se','<p>Reliable 2019 Toyota Camry SE in excellent condition. Regular oil changes, new tires at 30k. Perfect commuter car.</p><ul><li>Extremely reliable powertrain</li><li>New tires installed at 30,000 miles</li><li>Toyota Safety Sense 2.0</li><li>Excellent fuel economy</li><li>Certified pre-owned eligible</li></ul>',NULL,22800.00,25500.00,4000.00,'BSC-002','Toyota Camry 2018-2024','https://images.unsplash.com/photo-1621007947382-bb3c3994e3fb?w=800&q=80',NULL,'Toyota','2019','42,000 miles','Automatic','Gasoline','4T1BZ1HK5KU123456','Midnight Black Metallic','Gray Cloth','2.5L 4-Cylinder','FWD','No dents or scratches, very clean',0,1,1,4.7,31,NULL,NULL,NOW(),NOW()),
(3,3,'2020 Ford F-150 XLT','2020-ford-f-150-xlt','<p>Powerful 2020 Ford F-150 XLT SuperCrew. Towing package, spray-in bedliner, bed cover. Perfect for work or play.</p><ul><li>3.5L EcoBoost V6 — 375 HP</li><li>Towing package rated at 12,200 lbs</li><li>Spray-in bedliner and tonneau cover</li><li>SYNC 3 infotainment system</li><li>Backup camera and parking sensors</li></ul>',NULL,38900.00,43500.00,7000.00,'BSC-003','Ford F-150 2015-2020','https://images.unsplash.com/photo-1605893477799-b99e3b8b93fe?w=800&q=80',NULL,'Ford','2020','29,800 miles','Automatic','Gasoline','1FTEW1EPXLK123456','Iconic Silver','Black Cloth','3.5L EcoBoost V6','4WD','Minor bed scratches, frame clean',0,1,1,4.6,18,NULL,NULL,NOW(),NOW()),
(4,4,'2018 BMW 440i Coupe','2018-bmw-440i-coupe','<p>Exciting 2018 BMW 440i with M Sport package. 6-cylinder power, premium features. Drive in style.</p><ul><li>3.0L Turbo Inline-6 — 320 HP</li><li>M Sport suspension and brakes</li><li>Premium leather interior</li><li>Harman Kardon sound system</li><li>LED headlights and adaptive cruise</li></ul>',NULL,32500.00,37000.00,6000.00,'BSC-004','BMW 4 Series 2014-2020','https://images.unsplash.com/photo-1555215695-3004980ad54e?w=800&q=80',NULL,'BMW','2018','35,200 miles','Automatic','Gasoline','WBA8E9C50JA765432','Mineral Grey','Black Vernasca Leather','3.0L TwinPower Turbo I6','RWD','Small curb rash on passenger wheel',0,1,1,4.8,15,NULL,NULL,NOW(),NOW()),
(5,2,'2020 Chevrolet Equinox LT','2020-chevrolet-equinox-lt','<p>Spacious 2020 Chevy Equinox LT with AWD. One owner, highway miles. Android Auto, backup camera, and more.</p><ul><li>All-wheel drive for Vermont winters</li><li>One-owner with highway miles</li><li>Apple CarPlay / Android Auto</li><li>Rear vision camera</li><li>Teen Driver technology</li></ul>',NULL,24200.00,27000.00,4500.00,'BSC-005','Chevrolet Equinox 2018-2022','https://images.unsplash.com/photo-1609521263047-f8f205293f24?w=800&q=80',NULL,'Chevrolet','2020','45,100 miles','Automatic','Gasoline','3GNAXUEV0LS123456','Summit White','Jet Black Cloth','1.5L Turbo 4-Cylinder','AWD','No mechanical issues, very clean interior',0,1,1,4.4,21,NULL,NULL,NOW(),NOW()),
(6,5,'2019 Hyundai Elantra SEL','2019-hyundai-elantra-sel','<p>Efficient 2019 Hyundai Elantra SEL with excellent fuel economy. Perfect commuter. Still under factory warranty.</p><ul><li>Factory warranty until 2026</li><li>36 MPG combined fuel economy</li><li>Forward collision avoidance</li><li>Proximity key with push button start</li><li>8-inch touchscreen display</li></ul>',NULL,17500.00,19800.00,3000.00,'BSC-006','Hyundai Elantra 2017-2022','https://images.unsplash.com/photo-1606611013016-969c19ba27a9?w=800&q=80',NULL,'Hyundai','2019','38,000 miles','Automatic','Gasoline','5NPEC4AC9KH123456','Phantom Black','Gray Cloth','2.0L 4-Cylinder','FWD','No issues, factory warranty still active',0,1,1,4.3,27,NULL,NULL,NOW(),NOW()),
(7,1,'2017 Nissan Altima 2.5 SV','2017-nissan-altima-2-5-sv','<p>Comfortable 2017 Nissan Altima with zero-gravity seats. Great on gas, smooth ride. Well-maintained with service records.</p><ul><li>Zero-gravity seats for fatigue-free driving</li><li>Blind spot warning system</li><li>Intelligent cruise control</li><li>Service records available</li><li>New brake pads at 60k</li></ul>',NULL,15800.00,18200.00,2500.00,'BSC-007','Nissan Altima 2013-2018','https://images.unsplash.com/photo-1549399542-7e3f8b79c341?w=800&q=80',NULL,'Nissan','2017','62,000 miles','Automatic','Gasoline','1N4BL4CV7KN123456','Silver Sky Metallic','Charcoal Cloth','2.5L 4-Cylinder','FWD','Minor door dings, new brake pads',0,1,1,4.2,19,NULL,NULL,NOW(),NOW()),
(8,6,'2021 Chrysler Pacifica Touring','2021-chrysler-pacifica-touring','<p>Family-ready 2021 Chrysler Pacifica with Stow n Go seats. The ultimate minivan with modern tech.</p><ul><li>Stow n Go seating — seats fold flat into floor</li><li>Uconnect 4 with 10.1-inch touchscreen</li><li>Rear seat entertainment system</li><li>Hands-free sliding doors and liftgate</li><li>35 MPG highway, best-in-class</li></ul>',NULL,33500.00,37800.00,6000.00,'BSC-008','Chrysler Pacifica 2017-2023','https://images.unsplash.com/photo-1619767886558-efdc259cde1a?w=800&q=80',NULL,'Chrysler','2021','31,200 miles','Automatic','Gasoline','2C4RC1FG9MR123456','Brilliant Black Crystal Pearl','Black/Alloy Interior','3.6L Pentastar V6','FWD','No issues, like new interior',0,1,1,4.7,12,NULL,NULL,NOW(),NOW()),
(9,4,'2020 Audi A5 Sportback','2020-audi-a5-sportback','<p>Elegant 2020 Audi A5 Sportback with Quattro all-wheel drive. Turbocharged power meets German luxury.</p><ul><li>2.0L Turbocharged engine — 261 HP</li><li>Quattro all-wheel drive</li><li>Virtual cockpit digital仪表</li><li>MMI navigation plus</li><li>LED headlights with daytime running lights</li></ul>',NULL,35800.00,40200.00,6500.00,'BSC-009','Audi A5 2018-2024','https://images.unsplash.com/photo-1606664515524-ed2f786a0bd6?w=800&q=80',NULL,'Audi','2020','28,900 miles','Automatic','Gasoline','WAUFKAF59LA123456','Mythos Black Metallic','Rock Gray Nappa Leather','2.0L TFSI Turbo I4','AWD','Small scratch on rear bumper',0,1,1,4.6,14,NULL,NULL,NOW(),NOW()),
(10,7,'2019 Ford Mustang GT Convertible','2019-ford-mustang-gt-convertible','<p>Powerful 2019 Ford Mustang GT with the legendary 5.0L Coyote V8. Convertible top works perfectly.</p><ul><li>5.0L Coyote V8 — 460 HP</li><li>6-speed manual transmission</li><li>Premium GT package with Recaro seats</li><li>Convertible top in excellent condition</li><li>Performance package with Brembo brakes</li></ul>',NULL,36500.00,41000.00,7000.00,'BSC-010','Ford Mustang 2015-2023','https://images.unsplash.com/photo-1494976388531-d1058494cdd8?w=800&q=80',NULL,'Ford','2019','24,600 miles','Manual','Gasoline','1FA6P8CF0K5123456','Ruby Red','Ebony Black Leather','5.0L Coyote V8','RWD','Minor paint chip on hood, convertible top perfect',0,1,1,4.9,22,NULL,NULL,NOW(),NOW());

-- Orders
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `stripe_session_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_payment_intent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `subtotal` decimal(10,2) NOT NULL,
  `shipping` decimal(10,2) NOT NULL DEFAULT '0.00',
  `total` decimal(10,2) NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'usd',
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_postcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `orders_order_number_unique` (`order_number`),
  KEY `orders_user_id_foreign` (`user_id`),
  KEY `orders_stripe_session_id_index` (`stripe_session_id`),
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Order Items
DROP TABLE IF EXISTS `order_items`;
CREATE TABLE `order_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_items_order_id_foreign` (`order_id`),
  KEY `order_items_product_id_foreign` (`product_id`),
  CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Newsletter subscribers
DROP TABLE IF EXISTS `newsletter_subscribers`;
CREATE TABLE `newsletter_subscribers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `newsletter_subscribers_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4_unicode_ci;

-- Site settings
DROP TABLE IF EXISTS `site_settings`;
CREATE TABLE `site_settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `site_settings_key_unique` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
INSERT INTO `site_settings` VALUES
(1,'whatsapp_number','12174811401',NULL,NULL),
(2,'phone','+1 (909) 784-5166',NULL,NULL),
(3,'email','info@bankseizedcars.com',NULL,NULL),
(4,'address','1675 Shelburne Rd, South Burlington, VT 05403, USA',NULL,NULL),
(5,'facebook_url','#',NULL,NULL),
(6,'instagram_url','#',NULL,NULL),
(7,'tiktok_url','#',NULL,NULL),
(8,'twitter_url','#',NULL,NULL),
(9,'opening_hours','Mon-Fri: 9:00 AM - 6:00 PM | Sat: 10:00 AM - 4:00 PM',NULL,NULL);

-- Migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
INSERT INTO `migrations` VALUES
(1,'0001_01_01_000000_create_users_table',1),
(2,'0001_01_01_000001_create_cache_table',1),
(3,'0001_01_01_000002_create_jobs_table',1),
(4,'2026_07_21_105118_add_is_admin_to_users_table',1),
(5,'2026_07_21_110000_create_categories_table',1),
(6,'2026_07_21_110001_create_products_table',1),
(7,'2026_07_21_111608_create_site_settings_table',1),
(8,'2026_07_21_113242_create_orders_table',1),
(9,'2026_07_21_113251_create_order_items_table',1),
(10,'2026_07_22_080841_add_fulltext_index_to_products_table',1),
(11,'2026_08_01_000000_add_car_fields_to_products_table',1),
(12,'2026_09_01_000000_add_down_payment_to_products_table',1);

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
