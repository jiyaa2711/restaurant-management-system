-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2026 at 04:37 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eco`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `booking_date` date NOT NULL,
  `booking_time` time NOT NULL,
  `total_person` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `name`, `email`, `phone`, `booking_date`, `booking_time`, `total_person`, `status`, `created_at`, `updated_at`) VALUES
(1, 'dev', 'dev@gmail.com', '9512175957', '2026-04-07', '21:00:00', 4, 'Pending', '2026-04-04 09:45:53', '2026-04-04 09:45:53'),
(2, 'dev', 'dev@gmail.com', '9512175957', '2026-04-17', '21:00:00', 4, 'Pending', '2026-04-04 10:46:19', '2026-04-04 10:46:19'),
(3, 'dev', 'dev@gmail.com', '9512175957', '2026-04-30', '20:00:00', 4, 'Pending', '2026-04-05 01:36:45', '2026-04-05 01:36:45');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `meal_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `meal_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(11, 4, 18, 1, 150.00, '2026-04-14 09:05:27', '2026-04-14 09:05:27'),
(12, 4, 15, 1, 250.00, '2026-04-14 09:07:05', '2026-04-14 09:07:05');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Burger', '1774824006.webp', NULL, '2026-03-29 17:10:06'),
(2, 'Gujrati dishes', '1774824033.webp', NULL, '2026-04-13 23:51:02'),
(3, 'Punjabi dishes', '1774824457.png', '2026-03-29 17:17:37', '2026-04-13 23:50:41'),
(5, 'Pizza', '1775394242.webp', '2026-04-05 07:34:02', '2026-04-05 07:34:02'),
(6, 'Sandwich', '1775394341.jpg', '2026-04-05 07:35:41', '2026-04-05 07:35:41'),
(7, 'Pasta', '1776143975.jpg', '2026-04-13 23:49:35', '2026-04-13 23:49:35');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Jiya Dodhiya', 'jiyadodhiya@gmail.com', '+919512175957', 'i want  your hotel location', '2026-04-13 07:29:15', '2026-04-13 07:29:15');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `feedback_id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`feedback_id`, `user_name`, `message`, `date`, `created_at`, `updated_at`) VALUES
(1, 'dev', 'This is very nice website.', '2026-03-24', NULL, NULL),
(3, 'Jiya Dodhiya', 'Thank you!! It Is user friedly', '2026-04-13', '2026-04-12 22:27:59', '2026-04-12 22:27:59');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

CREATE TABLE `meals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meals`
--

INSERT INTO `meals` (`id`, `category_id`, `name`, `description`, `price`, `image`, `created_at`, `updated_at`) VALUES
(5, 5, 'Margherita pizza', 'A Margherita pizza is a classic Neapolitan-style pizza topped with fresh tomatoes (or sauce), mozzarella cheese (often fresh mozzarella), fresh basil, and extra virgin olive oil.', 150.00, '1775394453.jpg', '2026-04-05 07:37:33', '2026-04-05 07:37:33'),
(6, 5, 'Paneer Capsicum Pizza', 'A Paneer Capsicum Pizza is a popular Indian-style vegetarian pizza featuring soft, marinated or spiced paneer cubes and crunchy capsicum (bell peppers) on a cheesy base.', 200.00, '1775394612.webp', '2026-04-05 07:40:12', '2026-04-05 07:40:12'),
(7, 5, 'Cheese Corn Pizza', 'A cheese corn pizza is a popular, fusion-style vegetarian pizza featuring a crispy crust topped with savory pizza sauce, abundant melted mozzarella cheese, and sweet, crunchy corn kernels.', 200.00, '1775394726.jpg', '2026-04-05 07:42:06', '2026-04-05 07:42:06'),
(8, 5, 'Tandoori Paneer Ultimate Cheese Pizza', 'The Tandoori Paneer Ultimate Cheese pizza is a fusion pizza from Pizza Hut featuring spiced tandoori paneer, onions, capsicum, red paprika, and aromatic tandoori sauce.', 250.00, '1775394893.jpg', '2026-04-05 07:44:53', '2026-04-05 07:44:53'),
(9, 6, 'Veggie Mayonnaise Sandwich', 'A Veggie Mayonnaise Sandwich is a quick, creamy, and crunchy dish made by mixing finely chopped vegetables—typically carrots, cabbage, capsicum, and onions—with mayonnaise and seasonings (pepper, salt, herbs).', 200.00, '1775395076.jpg', '2026-04-05 07:47:56', '2026-04-05 07:47:56'),
(10, 6, 'Aloo Masala/Grilled Sandwich', 'Aloo Masala Grilled Sandwich is a popular, crispy Indian street-style snack made by stuffing bread with spiced mashed potatoes, green chutney, and optional cheese, then toasted with butter.', 200.00, '1775395200.jpg', '2026-04-05 07:50:00', '2026-04-05 07:50:00'),
(11, 1, 'Aloo Tikki Burger', 'An Aloo Tikki Burger is a popular Indian-style vegetarian burger featuring a crispy, spiced potato patty (tikki) topped with onion, tomato, and mayo in a toasted bun', 190.00, '1775395485.jpg', '2026-04-05 07:54:45', '2026-04-05 07:54:45'),
(12, 1, 'Spicy Barbeque Burger', 'A spicy barbecue burger is made by mixing ground beef or chicken with spices (cayenne, chipotle), topped with pepper jack cheese, jalapeños, and bacon, then smothered in spicy BBQ sauce.', 280.00, '1775395614.jpg', '2026-04-05 07:56:54', '2026-04-05 07:56:54'),
(13, 1, 'Creamy Paneer Tikka', 'A creamy Paneer Tikka burger is a popular Indian-fusion vegetarian burger featuring a thick, spiced paneer patty (or marinated paneer cubes) cooked until crispy, served in a toasted bun.', 300.00, '1775395812.jpg', '2026-04-05 08:00:12', '2026-04-05 08:00:12'),
(14, 3, 'Chole Bhature', 'Chole Bhature is a popular, indulgent North Indian dish consisting of spicy, tangy chickpea curry (chole) paired with soft, fluffy, deep-fried leavened bread (bhature).', 100.00, '1775396182.webp', '2026-04-05 08:06:22', '2026-04-05 08:06:22'),
(15, 3, 'Dal Makhani with Naan', 'Dal Makhani with Naan is a rich, creamy, and iconic North Indian pairing.', 250.00, '1775396360.jpg', '2026-04-05 08:09:20', '2026-04-05 08:09:20'),
(16, 7, 'Red sauce pasta', 'Red sauce pasta is a vibrant, tangy dish made by tossing boiled pasta (typically penne or spaghetti) in a homemade tomato-based sauce.', 120.00, '1776173753.jpg', '2026-04-14 08:05:53', '2026-04-14 08:05:53'),
(18, 7, 'White sauce pasta', 'Creamy white sauce pasta is made by coating boiled pasta (often penne) in a roux-based béchamel sauce, thickened with milk and cheese, and mixed with sautéed vegetables like onions, carrots, and capsicum', 150.00, '1776173901.jpg', '2026-04-14 08:08:21', '2026-04-14 08:08:21');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_03_26_165923_create_feedbacks_table', 1),
(5, '2026_03_27_175047_create_categories_table', 1),
(6, '2026_03_27_175053_create_meals_table', 1),
(7, '2026_03_31_124757_create_orders_table', 2),
(8, '2026_03_31_124811_create_order_items_table', 2),
(9, '2026_04_04_150657_create_bookings_table', 3),
(10, '2026_04_13_044548_create_carts_table', 4),
(11, '2026_04_13_122216_create_contacts_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `phone`, `address`, `total_amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'dev', '08849962095', 'Sardardham phase 2, vaishnodevi circle\r\nSardardham Medical center near', 200.00, 'Accepted', '2026-03-31 07:33:26', '2026-03-31 07:49:18'),
(2, 2, 'dev', '08849962095', 'Sardardham phase 2, vaishnodevi circle\r\nSardardham Medical center near', 200.00, 'Rejected', '2026-03-31 07:50:51', '2026-03-31 08:43:01'),
(3, 2, 'dev', '08849962095', 'Sardardham phase 2, vaishnodevi circle\r\nSardardham Medical center near', 125.00, 'Rejected', '2026-03-31 07:51:32', '2026-03-31 07:54:21'),
(4, 2, 'dev', '9512175957', 'Ahmedabad', 125.00, 'Accepted', '2026-03-31 08:05:40', '2026-03-31 08:05:57'),
(5, 2, 'dev', '9512175957', 'Ahmedabad', 400.00, 'Accepted', '2026-03-31 08:53:23', '2026-03-31 08:53:42'),
(6, 2, 'dev', '9512175957', 'Ahmedabad', 125.00, 'Accepted', '2026-03-31 09:09:38', '2026-03-31 09:09:54'),
(7, 4, 'Jiya Dodhiya', '9512175957', 'Ahmedabad', 390.00, 'Accepted', '2026-04-05 11:34:50', '2026-04-06 06:02:50');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `meal_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `meal_name`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 'Gujarati Thali', 1, 200.00, '2026-03-31 07:33:26', '2026-03-31 07:33:26'),
(2, 2, 'Gujarati Thali', 1, 200.00, '2026-03-31 07:50:51', '2026-03-31 07:50:51'),
(3, 3, 'Cheese Burger', 1, 80.00, '2026-03-31 07:51:32', '2026-03-31 07:51:32'),
(4, 3, 'Burger', 1, 45.00, '2026-03-31 07:51:32', '2026-03-31 07:51:32'),
(5, 4, 'Cheese Burger', 1, 80.00, '2026-03-31 08:05:41', '2026-03-31 08:05:41'),
(6, 4, 'Burger', 1, 45.00, '2026-03-31 08:05:41', '2026-03-31 08:05:41'),
(7, 5, 'Gujarati Thali', 2, 200.00, '2026-03-31 08:53:23', '2026-03-31 08:53:23'),
(8, 6, 'Cheese Burger', 1, 80.00, '2026-03-31 09:09:38', '2026-03-31 09:09:38'),
(9, 6, 'Burger', 1, 45.00, '2026-03-31 09:09:38', '2026-03-31 09:09:38'),
(10, 7, 'Aloo Tikki Burger', 1, 190.00, '2026-04-05 11:34:50', '2026-04-05 11:34:50'),
(11, 7, 'Aloo Masala/Grilled Sandwich', 1, 200.00, '2026-04-05 11:34:50', '2026-04-05 11:34:50');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('P1g6Zf4SKNCZl1CQZwmbVXDZrRigqpNsEFMonvGT', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiS2pTTXpoWm1XdTFxRkhZMUthdXNuRHEySWFMdmo0NVVhWjcwYk95NiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jYXJ0IjtzOjU6InJvdXRlIjtzOjQ6ImNhcnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NDt9', 1776177425);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user' COMMENT '1 Admin/2 User',
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'diya', 'admin', 'diya@gmail.com', '$2y$12$ZXFQ2OLdd1dLh4vY22XQ7.h.GZjEjqrAocACVpLXcwBCYifYkGKQC', NULL, '2026-03-27 13:19:39', '2026-03-27 13:19:39'),
(2, 'dev', 'user', 'dev@gmail.com', '$2y$12$4vEyEf0Z2CO0cIGwFl5hXehxVL2B6WMkh7S8G1LC8Stx9TUQ8PjJ6', NULL, '2026-03-27 13:20:11', '2026-03-27 13:20:11'),
(3, 'pravina', 'user', 'pravina@gmail.com', '$2y$12$7cwlAHTRBpYa7lP67WhzfuJQ3eMl2M94w5byWo.hjrp7SNxYj/wIm', NULL, '2026-03-29 18:28:44', '2026-03-29 18:28:44'),
(4, 'Jiya Dodhiya', 'user', 'jiyadodhiya@gmail.com', '$2y$12$CL.nlxmHuO2TYMgFYE0imOZOtGRgxkFNOj.R5udmLP.V61S/wcrQu', NULL, '2026-04-05 08:55:53', '2026-04-05 08:55:53'),
(5, 'ziyaa', 'user', 'ziya@gmail.com', '$2y$12$wMUzZwvO5R/VgB4YMX9mk.YYZysyOTl910yaqbpoETp3q.0.nM/B6', NULL, '2026-04-12 06:38:59', '2026-04-12 06:38:59'),
(6, 'ziya', 'user', 'ziyadodhiya@gmail.com', '$2y$12$M0kaCyX7uthu8ygho56mNOS8D0QfukN6myPdv2sbk8mOSqqCm6Npa', NULL, '2026-04-12 06:49:20', '2026-04-12 06:49:20'),
(7, 'ziya', 'user', 'ziyadodhiya27@gmail.com', '$2y$12$T5FkTbrkHCOHAjBi1MZtvOV6K9zGkAJIZbuljhDvwDaNGF9ld7dVm', NULL, '2026-04-12 06:49:47', '2026-04-12 06:49:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_meal_id_foreign` (`meal_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meals`
--
ALTER TABLE `meals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meals_category_id_foreign` (`category_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `feedback_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meals`
--
ALTER TABLE `meals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_meal_id_foreign` FOREIGN KEY (`meal_id`) REFERENCES `meals` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `meals`
--
ALTER TABLE `meals`
  ADD CONSTRAINT `meals_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
