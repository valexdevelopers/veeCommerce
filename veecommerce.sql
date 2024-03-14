-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2024 at 07:21 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `veecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` char(26) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `apartment` varchar(255) DEFAULT NULL,
  `town` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` char(26) NOT NULL,
  `unique_id` int(11) NOT NULL,
  `admin_verified_at` timestamp NULL DEFAULT NULL,
  `isSuperAdmin` tinyint(1) NOT NULL DEFAULT 0,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `unique_id`, `admin_verified_at`, `isSuperAdmin`, `firstname`, `lastname`, `email`, `phone`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
('01hrezn29j42dq470f7pk11c7r', 94421, '2024-03-08 20:12:21', 1, 'Amanda', 'hindirlane', 'connorhindirlane@gmail.com', '+2348074036471', '$2y$12$044Y0xZVE7eFgo5YvpwWDOmkxsw5OdqZlTJSXrW/IqlcQfGZu.uYG', NULL, '2024-03-08 20:12:22', '2024-03-08 20:12:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `advert_banners`
--

CREATE TABLE `advert_banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `banner_image` varchar(255) NOT NULL,
  `admin_id` char(26) DEFAULT NULL,
  `banner_name` varchar(255) NOT NULL,
  `visibility` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` char(26) DEFAULT NULL,
  `banner_1` varchar(255) NOT NULL,
  `banner_2` varchar(255) DEFAULT NULL,
  `banner_3` varchar(255) DEFAULT NULL,
  `side_banner_1` varchar(255) DEFAULT NULL,
  `side_banner_2` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` char(26) NOT NULL,
  `unique_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_image` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `unique_id`, `brand_name`, `brand_image`, `deleted_at`, `created_at`, `updated_at`) VALUES
('01hrxs1476x40ny1ycpsgyne20', 7763, 'zikel', 'brand/images/zikel.png', NULL, '2024-03-14 13:05:13', '2024-03-14 13:05:13'),
('01hrxs1bpj17h1n24w225km47t', 4998, 'zaron', 'brand/images/zaron.png', NULL, '2024-03-14 13:05:21', '2024-03-14 13:05:21'),
('01hrxs1jhr3vjtq0n0m2fgf727', 1684, 'huda beauty', 'brand/images/huda_beauty.png', NULL, '2024-03-14 13:05:28', '2024-03-14 13:05:28'),
('01hrxs1s9jydpsjavrnk6fg8d6', 2882, 'fenty beauty', 'brand/images/fenty_beauty.png', NULL, '2024-03-14 13:05:35', '2024-03-14 13:05:35'),
('01hrxs202xfx6c9yj6tt6sgw7y', 3293, 'creave', 'brand/images/creave.png', NULL, '2024-03-14 13:05:42', '2024-03-14 13:05:42'),
('01hrxs2ahnzwvbkkv06y487r94', 5816, 'cetaphil', 'brand/images/cetaphil.webp', NULL, '2024-03-14 13:05:53', '2024-03-14 13:05:53'),
('01hrxs2jmg5md7f8wab8ghavh0', 1904, 'mac', 'brand/images/mac.png', NULL, '2024-03-14 13:06:01', '2024-03-14 13:06:01'),
('01hrxs2sc1mmzpberygdfw8t6r', 3465, 'Makeup by mario', 'brand/images/Makeup_by_mario.png', NULL, '2024-03-14 13:06:08', '2024-03-14 13:06:08');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` char(26) NOT NULL,
  `user_id` char(26) DEFAULT NULL,
  `inventory_id` char(26) DEFAULT NULL,
  `product_id` char(26) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `color` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` char(26) NOT NULL,
  `unique_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_image` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `unique_id`, `category_name`, `category_image`, `deleted_at`, `created_at`, `updated_at`) VALUES
('01hrxs5cbc82qggxm7myjbbqqt', 9659, 'Hair', NULL, NULL, '2024-03-14 13:07:33', '2024-03-14 13:07:33'),
('01hrxs5exbtx4cwwckq7gyt5xe', 6330, 'Eyes', NULL, NULL, '2024-03-14 13:07:35', '2024-03-14 13:07:35'),
('01hrxs5h86n5483fehg7970145', 5531, 'Body Care', NULL, NULL, '2024-03-14 13:07:38', '2024-03-14 13:07:38'),
('01hrxs5kevx03ke8rjd34yt7pr', 1117, 'Brushes', NULL, NULL, '2024-03-14 13:07:40', '2024-03-14 13:07:40'),
('01hrxs5p8wx2d8350p0z3337y7', 8251, 'Skincare', NULL, NULL, '2024-03-14 13:07:43', '2024-03-14 13:07:43'),
('01hrxs5rtbnc29rbe9jy42acph', 2987, 'Toners', NULL, NULL, '2024-03-14 13:07:45', '2024-03-14 13:07:45'),
('01hrxs5v419zte703htvf1ggc2', 3438, 'Jumpsuit', NULL, NULL, '2024-03-14 13:07:48', '2024-03-14 13:07:48'),
('01hrxs61mzjn0v6n2hb7sdhz43', 2208, 'Moisturizer', NULL, NULL, '2024-03-14 13:07:55', '2024-03-14 13:07:55'),
('01hrxs64sj8rmtt79dj48eprq9', 3935, 'Feminine Care', NULL, NULL, '2024-03-14 13:07:58', '2024-03-14 13:07:58'),
('01hrxs672ddfpac7avwg5ysntt', 7367, 'Lips', NULL, NULL, '2024-03-14 13:08:00', '2024-03-14 13:08:00'),
('01hrxs69re12rx38g0cb0v9taz', 8624, 'Makeup', NULL, NULL, '2024-03-14 13:08:03', '2024-03-14 13:08:03'),
('01hrxs6c79kv1xjz6mnjkz5nhc', 8187, 'Face', NULL, NULL, '2024-03-14 13:08:05', '2024-03-14 13:08:05'),
('01hrxs6fv9naq4sep3kfy7a8w3', 8407, 'Face and Neck', NULL, NULL, '2024-03-14 13:08:09', '2024-03-14 13:08:09'),
('01hrxs6m51pgsfab21vkvp7s6k', 7671, 'Accessories', NULL, NULL, '2024-03-14 13:08:13', '2024-03-14 13:08:13'),
('01hrxs6pj8g6rn5kapnn1qtam9', 7172, 'concealer', NULL, NULL, '2024-03-14 13:08:16', '2024-03-14 13:08:16'),
('01hrxs6rza82ksd13nhzc04mty', 7954, 'Hand and Feet', NULL, NULL, '2024-03-14 13:08:18', '2024-03-14 13:08:18'),
('01hrxs6vem7fgf1hng5c1hae5w', 3273, 'Highligter', NULL, NULL, '2024-03-14 13:08:21', '2024-03-14 13:08:21'),
('01hrxs7827bwvmmbrnr04dnhk7', 9536, 'Primer', NULL, NULL, '2024-03-14 13:08:34', '2024-03-14 13:08:34'),
('01hrxs7as0egtr97n2ekj5gg99', 5819, 'Ear Care', NULL, NULL, '2024-03-14 13:08:37', '2024-03-14 13:08:37'),
('01hrxs7ds3kz4j13jxy8vged7q', 9591, 'Eye Care', NULL, NULL, '2024-03-14 13:08:40', '2024-03-14 13:08:40');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` char(26) NOT NULL,
  `unique_id` int(11) NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `coupon_worth` int(11) NOT NULL,
  `max_value` int(11) NOT NULL,
  `usuage` int(11) DEFAULT NULL,
  `coupon_resctriction` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `id` char(26) NOT NULL,
  `product_id` char(26) NOT NULL,
  `stock_quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventories`
--

INSERT INTO `inventories` (`id`, `product_id`, `stock_quantity`, `created_at`, `updated_at`) VALUES
('01hrxsbj6048kzhst04txfgjy6', '01hrxsbj4ghwgw8d7g827j8wfw', 10, '2024-03-14 13:10:55', '2024-03-14 13:10:55'),
('01hrxsdcb5ajs35b9z0btwz9bv', '01hrxsdcan7grgv8rf4a8baamf', 16, '2024-03-14 13:11:55', '2024-03-14 13:11:55'),
('01hrxsfc0pkyhkrpp67kf1kx5s', '01hrxsfc099bzrq12zt305gz36', 1, '2024-03-14 13:13:00', '2024-03-14 13:13:00'),
('01hrxsgx1408ybwjxe28g24hjh', '01hrxsgx0ebxqqy7gxa6acsh5y', 32, '2024-03-14 13:13:50', '2024-03-14 13:13:50'),
('01hrxsms6m8ag78g93v9jv8t9s', '01hrxsms6bf3fnbc1txmehx560', 4, '2024-03-14 13:15:57', '2024-03-14 13:15:57'),
('01hrxsqjdr34h02v87ppqbvaq4', '01hrxsqjdb4sqg35kv1enbdj2z', 12, '2024-03-14 13:17:29', '2024-03-14 13:17:29'),
('01hrxssd6xwjqjhhd0crc9a29n', '01hrxssd6hj2sctwm771rhm71v', 11, '2024-03-14 13:18:29', '2024-03-14 13:18:29'),
('01hrxsv210nxggn0ev8yrrbvxn', '01hrxsv20k413dyv80ynw1qfmx', 8, '2024-03-14 13:19:23', '2024-03-14 13:19:23'),
('01hrxsyc4j9fmpgxv3ejkkac1z', '01hrxsyc3ndgx0jtxbavvs2zsy', 12, '2024-03-14 13:21:12', '2024-03-14 13:21:12');

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

CREATE TABLE `logos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` char(26) DEFAULT NULL,
  `logo` varchar(255) NOT NULL,
  `logowhite` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_01_03_104838_create_admins_table', 1),
(6, '2024_01_03_104945_create_categories_table', 1),
(7, '2024_01_03_105003_create_brands_table', 1),
(8, '2024_01_03_105043_create_promos_table', 1),
(9, '2024_01_03_105050_create_products_table', 1),
(10, '2024_01_03_105134_create_product_details_table', 1),
(11, '2024_01_03_105217_create_inventories_table', 1),
(12, '2024_01_03_105229_create_product_categories_table', 1),
(13, '2024_01_03_105320_create_addresses_table', 1),
(14, '2024_01_03_105348_create_coupons_table', 1),
(15, '2024_01_03_105354_create_orders_table', 1),
(16, '2024_01_03_105411_create_carts_table', 1),
(17, '2024_01_03_105419_create_purchases_table', 1),
(18, '2024_01_03_152604_create_product_reviews_table', 1),
(19, '2024_01_10_095817_create_wishlists_table', 1),
(20, '2024_01_12_073527_create_advert_banners_table', 1),
(21, '2024_01_12_140434_create_logos_table', 1),
(22, '2024_01_12_154315_create_banners_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` char(26) NOT NULL,
  `unique_id` int(11) NOT NULL,
  `user_id` char(26) NOT NULL,
  `coupon_id` char(26) DEFAULT NULL,
  `order_details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`order_details`)),
  `order_notes` longtext DEFAULT NULL,
  `total` int(11) NOT NULL,
  `coupon_discount` int(11) DEFAULT NULL,
  `order_status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` char(26) NOT NULL,
  `unique_id` int(11) NOT NULL,
  `admin_id` char(26) DEFAULT NULL,
  `brand_id` char(26) DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_discount_price` int(11) DEFAULT NULL,
  `promo_id` char(26) DEFAULT NULL,
  `product_image_1` varchar(255) NOT NULL,
  `product_image_2` varchar(255) DEFAULT NULL,
  `product_image_3` varchar(255) DEFAULT NULL,
  `product_image_4` varchar(255) DEFAULT NULL,
  `product_image_5` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `unique_id`, `admin_id`, `brand_id`, `product_name`, `product_price`, `product_discount_price`, `promo_id`, `product_image_1`, `product_image_2`, `product_image_3`, `product_image_4`, `product_image_5`, `deleted_at`, `created_at`, `updated_at`) VALUES
('01hrxsbj4ghwgw8d7g827j8wfw', 4958, '01hrezn29j42dq470f7pk11c7r', '01hrxs1476x40ny1ycpsgyne20', 'Zikel Skin Finish', 20600, NULL, NULL, 'products/images/Zikel_Skin_Finish/1.jpg', 'products/images/Zikel_Skin_Finish/2.jpg', 'products/images/Zikel_Skin_Finish/3.jpg', NULL, NULL, NULL, '2024-03-14 13:10:55', '2024-03-14 13:10:55'),
('01hrxsdcan7grgv8rf4a8baamf', 4066, '01hrezn29j42dq470f7pk11c7r', '01hrxs1s9jydpsjavrnk6fg8d6', 'Pre-Show Glow Instant Retexturizing 10% AHA Treatment Reusable Applicator', 10800, NULL, NULL, 'products/images/Pre-Show_Glow_Instant_Retexturizing_10%_AHA_Treatment_Reusable_Applicator/1.webp', 'products/images/Pre-Show_Glow_Instant_Retexturizing_10%_AHA_Treatment_Reusable_Applicator/2.webp', 'products/images/Pre-Show_Glow_Instant_Retexturizing_10%_AHA_Treatment_Reusable_Applicator/3.webp', 'products/images/Pre-Show_Glow_Instant_Retexturizing_10%_AHA_Treatment_Reusable_Applicator/4.webp', 'products/images/Pre-Show_Glow_Instant_Retexturizing_10%_AHA_Treatment_Reusable_Applicator/5.webp', NULL, '2024-03-14 13:11:55', '2024-03-14 13:11:55'),
('01hrxsfc099bzrq12zt305gz36', 7503, '01hrezn29j42dq470f7pk11c7r', '01hrxs1s9jydpsjavrnk6fg8d6', 'Hydra Vizor Broad Spectrum Mineral SPF 30 Sunscreen Moisturizer', 20000, NULL, NULL, 'products/images/Hydra_Vizor_Broad_Spectrum_Mineral_SPF_30_Sunscreen_Moisturizer/1.webp', 'products/images/Hydra_Vizor_Broad_Spectrum_Mineral_SPF_30_Sunscreen_Moisturizer/2.webp', 'products/images/Hydra_Vizor_Broad_Spectrum_Mineral_SPF_30_Sunscreen_Moisturizer/3.jpg', 'products/images/Hydra_Vizor_Broad_Spectrum_Mineral_SPF_30_Sunscreen_Moisturizer/4.webp', NULL, NULL, '2024-03-14 13:13:00', '2024-03-14 13:13:00'),
('01hrxsgx0ebxqqy7gxa6acsh5y', 4659, '01hrezn29j42dq470f7pk11c7r', '01hrxs2sc1mmzpberygdfw8t6r', 'E4 Brush', 39000, 37000, NULL, 'products/images/E4_Brush/1.webp', 'products/images/E4_Brush/2.webp', NULL, NULL, NULL, NULL, '2024-03-14 13:13:50', '2024-03-14 13:13:50'),
('01hrxsms6bf3fnbc1txmehx560', 4311, '01hrezn29j42dq470f7pk11c7r', '01hrxs1476x40ny1ycpsgyne20', 'SurrealSkin™ Awakening Concealer', 5000, NULL, NULL, 'products/images/SurrealSkin™_Awakening_Concealer/1.jpg', 'products/images/SurrealSkin™_Awakening_Concealer/2.jpg', 'products/images/SurrealSkin™_Awakening_Concealer/3.jpg', 'products/images/SurrealSkin™_Awakening_Concealer/4.jpg', NULL, NULL, '2024-03-14 13:15:57', '2024-03-14 13:15:57'),
('01hrxsqjdb4sqg35kv1enbdj2z', 3466, '01hrezn29j42dq470f7pk11c7r', '01hrxs1jhr3vjtq0n0m2fgf727', 'Easy Bake Loose Baking & Setting Powder', 50000, 45000, NULL, 'products/images/Easy_Bake_Loose_Baking_&_Setting_Powder/1.jpg', 'products/images/Easy_Bake_Loose_Baking_&_Setting_Powder/2.jpg', NULL, NULL, NULL, NULL, '2024-03-14 13:17:29', '2024-03-14 13:17:29'),
('01hrxssd6hj2sctwm771rhm71v', 8953, '01hrezn29j42dq470f7pk11c7r', '01hrxs1jhr3vjtq0n0m2fgf727', 'Pretty Grunge Eyeshadow Palette', 12000, NULL, NULL, 'products/images/Pretty_Grunge_Eyeshadow_Palette/1.jpg', 'products/images/Pretty_Grunge_Eyeshadow_Palette/2.png', 'products/images/Pretty_Grunge_Eyeshadow_Palette/3.png', NULL, NULL, NULL, '2024-03-14 13:18:29', '2024-03-14 13:18:29'),
('01hrxsv20k413dyv80ynw1qfmx', 3997, '01hrezn29j42dq470f7pk11c7r', '01hrxs1jhr3vjtq0n0m2fgf727', 'Power Bullet Matte Lipstick', 2000, 1800, NULL, 'products/images/Power_Bullet_Matte_Lipstick/1.webp', 'products/images/Power_Bullet_Matte_Lipstick/2.jpg', NULL, NULL, NULL, NULL, '2024-03-14 13:19:23', '2024-03-14 13:19:23'),
('01hrxsyc3ndgx0jtxbavvs2zsy', 3160, '01hrezn29j42dq470f7pk11c7r', '01hrxs1476x40ny1ycpsgyne20', 'Zikel Skin Fit Compact powder', 4000, NULL, NULL, 'products/images/Zikel_Skin_Fit_Compact_powder/1.jpg', NULL, NULL, NULL, NULL, NULL, '2024-03-14 13:21:12', '2024-03-14 13:21:12');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` char(26) NOT NULL,
  `category_id` char(26) NOT NULL,
  `product_id` char(26) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `category_id`, `product_id`, `created_at`, `updated_at`) VALUES
('01hrxsbj51wt84882vbmww9vz9', '01hrxs69re12rx38g0cb0v9taz', '01hrxsbj4ghwgw8d7g827j8wfw', '2024-03-14 13:10:55', '2024-03-14 13:10:55'),
('01hrxsbj54f4sx8ybx9w2phft9', '01hrxs6c79kv1xjz6mnjkz5nhc', '01hrxsbj4ghwgw8d7g827j8wfw', '2024-03-14 13:10:55', '2024-03-14 13:10:55'),
('01hrxsbj557970tsg0z8ngfbrp', '01hrxs6fv9naq4sep3kfy7a8w3', '01hrxsbj4ghwgw8d7g827j8wfw', '2024-03-14 13:10:55', '2024-03-14 13:10:55'),
('01hrxsdcav05dm9rzphdecj04c', '01hrxs5p8wx2d8350p0z3337y7', '01hrxsdcan7grgv8rf4a8baamf', '2024-03-14 13:11:55', '2024-03-14 13:11:55'),
('01hrxsdcaymxty1v9c3c8z2932', '01hrxs61mzjn0v6n2hb7sdhz43', '01hrxsdcan7grgv8rf4a8baamf', '2024-03-14 13:11:55', '2024-03-14 13:11:55'),
('01hrxsdcb10t2wv6cgg0p57byq', '01hrxs6c79kv1xjz6mnjkz5nhc', '01hrxsdcan7grgv8rf4a8baamf', '2024-03-14 13:11:55', '2024-03-14 13:11:55'),
('01hrxsfc0dy5n0x25kjhff79s4', '01hrxs5p8wx2d8350p0z3337y7', '01hrxsfc099bzrq12zt305gz36', '2024-03-14 13:13:00', '2024-03-14 13:13:00'),
('01hrxsfc0fta032zt8vv4beba1', '01hrxs5rtbnc29rbe9jy42acph', '01hrxsfc099bzrq12zt305gz36', '2024-03-14 13:13:00', '2024-03-14 13:13:00'),
('01hrxsfc0g7hthr0kx1d99tpaz', '01hrxs6c79kv1xjz6mnjkz5nhc', '01hrxsfc099bzrq12zt305gz36', '2024-03-14 13:13:00', '2024-03-14 13:13:00'),
('01hrxsgx0v9400g9g91r4gpjwe', '01hrxs5kevx03ke8rjd34yt7pr', '01hrxsgx0ebxqqy7gxa6acsh5y', '2024-03-14 13:13:50', '2024-03-14 13:13:50'),
('01hrxsgx0zj6m22bns2sab6rk6', '01hrxs69re12rx38g0cb0v9taz', '01hrxsgx0ebxqqy7gxa6acsh5y', '2024-03-14 13:13:50', '2024-03-14 13:13:50'),
('01hrxsms6eq38qmyfnv3003z6j', '01hrxs69re12rx38g0cb0v9taz', '01hrxsms6bf3fnbc1txmehx560', '2024-03-14 13:15:57', '2024-03-14 13:15:57'),
('01hrxsms6g38s227tsaa66fb9d', '01hrxs6pj8g6rn5kapnn1qtam9', '01hrxsms6bf3fnbc1txmehx560', '2024-03-14 13:15:57', '2024-03-14 13:15:57'),
('01hrxsqjde478zcyhjc5az5e02', '01hrxs69re12rx38g0cb0v9taz', '01hrxsqjdb4sqg35kv1enbdj2z', '2024-03-14 13:17:29', '2024-03-14 13:17:29'),
('01hrxsqjdh76ndf3jt5e2406t0', '01hrxs6c79kv1xjz6mnjkz5nhc', '01hrxsqjdb4sqg35kv1enbdj2z', '2024-03-14 13:17:29', '2024-03-14 13:17:29'),
('01hrxsqjdmevwpamxm1w2kgkpe', '01hrxs6fv9naq4sep3kfy7a8w3', '01hrxsqjdb4sqg35kv1enbdj2z', '2024-03-14 13:17:29', '2024-03-14 13:17:29'),
('01hrxssd6n5hpq52bj83ykpsgs', '01hrxs69re12rx38g0cb0v9taz', '01hrxssd6hj2sctwm771rhm71v', '2024-03-14 13:18:29', '2024-03-14 13:18:29'),
('01hrxssd6qsxzh9mpkatkngwwb', '01hrxs6c79kv1xjz6mnjkz5nhc', '01hrxssd6hj2sctwm771rhm71v', '2024-03-14 13:18:29', '2024-03-14 13:18:29'),
('01hrxssd6teqx9jqe7k1rjvrb2', '01hrxs6fv9naq4sep3kfy7a8w3', '01hrxssd6hj2sctwm771rhm71v', '2024-03-14 13:18:29', '2024-03-14 13:18:29'),
('01hrxsv20qk3h5n2g5ytf90ay4', '01hrxs672ddfpac7avwg5ysntt', '01hrxsv20k413dyv80ynw1qfmx', '2024-03-14 13:19:23', '2024-03-14 13:19:23'),
('01hrxsv20vwvpjaf3hj1ksmgkw', '01hrxs69re12rx38g0cb0v9taz', '01hrxsv20k413dyv80ynw1qfmx', '2024-03-14 13:19:23', '2024-03-14 13:19:23'),
('01hrxsyc42h448q844pk14e4b6', '01hrxs69re12rx38g0cb0v9taz', '01hrxsyc3ndgx0jtxbavvs2zsy', '2024-03-14 13:21:12', '2024-03-14 13:21:12'),
('01hrxsyc451m0cjkh4dmrak362', '01hrxs6c79kv1xjz6mnjkz5nhc', '01hrxsyc3ndgx0jtxbavvs2zsy', '2024-03-14 13:21:12', '2024-03-14 13:21:12'),
('01hrxsyc48e7fk0p1yycd6dfdr', '01hrxs6fv9naq4sep3kfy7a8w3', '01hrxsyc3ndgx0jtxbavvs2zsy', '2024-03-14 13:21:12', '2024-03-14 13:21:12');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` char(26) NOT NULL,
  `about` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`about`)),
  `technical_details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`technical_details`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`id`, `product_id`, `about`, `technical_details`, `created_at`, `updated_at`) VALUES
(1, '01hrxsbj4ghwgw8d7g827j8wfw', '\"\"', '{\"product_dimension\":null,\"product_weigth\":null,\"product_color\":\"[\\\"Cocoa\\\",\\\"Olive\\\",\\\"bronze\\\"]\",\"product_size\":null}', '2024-03-14 13:10:55', '2024-03-14 13:10:55'),
(2, '01hrxsdcan7grgv8rf4a8baamf', '\"\"', '{\"product_dimension\":null,\"product_weigth\":null,\"product_color\":null,\"product_size\":null}', '2024-03-14 13:11:55', '2024-03-14 13:11:55'),
(3, '01hrxsfc099bzrq12zt305gz36', '\"\"', '{\"product_dimension\":null,\"product_weigth\":null,\"product_color\":null,\"product_size\":null}', '2024-03-14 13:13:00', '2024-03-14 13:13:00'),
(4, '01hrxsgx0ebxqqy7gxa6acsh5y', '\"\"', '{\"product_dimension\":null,\"product_weigth\":null,\"product_color\":null,\"product_size\":null}', '2024-03-14 13:13:50', '2024-03-14 13:13:50'),
(5, '01hrxsms6bf3fnbc1txmehx560', '\"\"', '{\"product_dimension\":null,\"product_weigth\":null,\"product_color\":\"[\\\"Olive\\\",\\\"White\\\",\\\"medium\\\",\\\"dark\\\"]\",\"product_size\":null}', '2024-03-14 13:15:57', '2024-03-14 13:15:57'),
(6, '01hrxsqjdb4sqg35kv1enbdj2z', '\"\"', '{\"product_dimension\":null,\"product_weigth\":null,\"product_color\":null,\"product_size\":null}', '2024-03-14 13:17:29', '2024-03-14 13:17:29'),
(7, '01hrxssd6hj2sctwm771rhm71v', '\"\"', '{\"product_dimension\":null,\"product_weigth\":null,\"product_color\":null,\"product_size\":null}', '2024-03-14 13:18:29', '2024-03-14 13:18:29'),
(8, '01hrxsv20k413dyv80ynw1qfmx', '\"\"', '{\"product_dimension\":null,\"product_weigth\":null,\"product_color\":null,\"product_size\":null}', '2024-03-14 13:19:23', '2024-03-14 13:19:23'),
(9, '01hrxsyc3ndgx0jtxbavvs2zsy', '\"\"', '{\"product_dimension\":null,\"product_weigth\":null,\"product_color\":null,\"product_size\":null}', '2024-03-14 13:21:12', '2024-03-14 13:21:12');

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` char(26) NOT NULL,
  `order_id` char(26) NOT NULL,
  `user_id` char(26) DEFAULT NULL,
  `number_of_stars` int(11) NOT NULL,
  `review_comment` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promos`
--

CREATE TABLE `promos` (
  `id` char(26) NOT NULL,
  `unique_id` int(11) NOT NULL,
  `admin_id` char(26) DEFAULT NULL,
  `discount_name` varchar(255) NOT NULL,
  `discount_type` varchar(255) NOT NULL,
  `discount_value` int(11) NOT NULL,
  `discount_max_value` int(11) DEFAULT NULL,
  `discount_start_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `discount_end_date` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `products` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`products`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` char(26) NOT NULL,
  `unique_id` int(11) NOT NULL,
  `user_id` char(26) NOT NULL,
  `order_id` char(26) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `receipt_number` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `order_details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`order_details`)),
  `authorization` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`authorization`)),
  `customer` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`customer`)),
  `requested_amount` int(11) NOT NULL,
  `paidamount` int(11) NOT NULL,
  `transaction_date` timestamp NULL DEFAULT NULL,
  `paidAt` timestamp NULL DEFAULT NULL,
  `gatewayfees` int(11) NOT NULL,
  `channel` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `gateway_response` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` char(26) NOT NULL,
  `unique_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` char(26) NOT NULL,
  `user_id` char(26) NOT NULL,
  `inventory_id` char(26) NOT NULL,
  `product_id` char(26) NOT NULL,
  `color` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_user_id_foreign` (`user_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_unique_id_unique` (`unique_id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `advert_banners`
--
ALTER TABLE `advert_banners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `advert_banners_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `banners_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_unique_id_unique` (`unique_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_inventory_id_foreign` (`inventory_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_unique_id_unique` (`unique_id`),
  ADD UNIQUE KEY `categories_category_name_unique` (`category_name`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_unique_id_unique` (`unique_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventories_product_id_foreign` (`product_id`);

--
-- Indexes for table `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `logos_admin_id_foreign` (`admin_id`);

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
  ADD UNIQUE KEY `orders_unique_id_unique` (`unique_id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_coupon_id_foreign` (`coupon_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_unique_id_unique` (`unique_id`),
  ADD KEY `products_admin_id_foreign` (`admin_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `products_promo_id_foreign` (`promo_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_categories_product_id_foreign` (`product_id`),
  ADD KEY `product_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_details_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_reviews_product_id_foreign` (`product_id`),
  ADD KEY `product_reviews_user_id_foreign` (`user_id`),
  ADD KEY `product_reviews_order_id_foreign` (`order_id`);

--
-- Indexes for table `promos`
--
ALTER TABLE `promos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `promos_unique_id_unique` (`unique_id`),
  ADD KEY `promos_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `purchases_unique_id_unique` (`unique_id`),
  ADD KEY `purchases_user_id_foreign` (`user_id`),
  ADD KEY `purchases_order_id_foreign` (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_unique_id_unique` (`unique_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`),
  ADD KEY `wishlists_inventory_id_foreign` (`inventory_id`),
  ADD KEY `wishlists_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `advert_banners`
--
ALTER TABLE `advert_banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `advert_banners`
--
ALTER TABLE `advert_banners`
  ADD CONSTRAINT `advert_banners_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `banners`
--
ALTER TABLE `banners`
  ADD CONSTRAINT `banners_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_inventory_id_foreign` FOREIGN KEY (`inventory_id`) REFERENCES `inventories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `inventories`
--
ALTER TABLE `inventories`
  ADD CONSTRAINT `inventories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `logos`
--
ALTER TABLE `logos`
  ADD CONSTRAINT `logos_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_coupon_id_foreign` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `products_promo_id_foreign` FOREIGN KEY (`promo_id`) REFERENCES `promos` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD CONSTRAINT `product_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_categories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_details`
--
ALTER TABLE `product_details`
  ADD CONSTRAINT `product_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD CONSTRAINT `product_reviews_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `promos`
--
ALTER TABLE `promos`
  ADD CONSTRAINT `promos_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchases_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_inventory_id_foreign` FOREIGN KEY (`inventory_id`) REFERENCES `inventories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
