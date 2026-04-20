-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 20, 2026 lúc 01:29 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `vibe_shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `attribute_templates`
--

CREATE TABLE `attribute_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `suggest_value` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`suggest_value`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `attribute_templates`
--

INSERT INTO `attribute_templates` (`id`, `name`, `display_name`, `suggest_value`, `created_at`, `updated_at`) VALUES
(5, 'mau-sac', 'Màu sắc', NULL, '2026-04-15 10:09:18', '2026-04-15 10:09:18'),
(6, 'kich-thuoc', 'Kích thước', NULL, '2026-04-15 10:09:23', '2026-04-15 10:09:23'),
(7, 'loai-ket-noi', 'Loại kết nối', NULL, '2026-04-15 10:09:26', '2026-04-15 10:09:26'),
(12, 'switch', 'Switch', NULL, '2026-04-18 10:29:28', '2026-04-18 10:29:28'),
(13, 'layout', 'Layout', NULL, '2026-04-18 10:29:35', '2026-04-18 10:29:35'),
(14, 'tan-so-phan-hoi', 'Tần số phản hồi', NULL, '2026-04-18 10:30:00', '2026-04-18 10:30:00'),
(15, 'keycap', 'Keycap', NULL, '2026-04-18 10:30:12', '2026-04-18 10:30:12'),
(16, 'so-nut', 'Số nút', NULL, '2026-04-18 10:30:25', '2026-04-18 10:30:25'),
(17, 'dpi', 'DPI', NULL, '2026-04-18 10:30:31', '2026-04-18 10:30:31'),
(18, 'pin', 'Pin', NULL, '2026-04-18 10:30:51', '2026-04-18 10:30:51'),
(19, 'trong-luong', 'Trọng lượng', NULL, '2026-04-18 10:30:58', '2026-04-18 10:30:58'),
(20, 'driver', 'Driver', NULL, '2026-04-18 10:31:55', '2026-04-18 10:31:55'),
(21, 'bao-hanh', 'Bảo hành', NULL, '2026-04-18 10:32:41', '2026-04-18 10:32:41'),
(22, 'he-dieu-hanh-ho-tro', 'Hệ điều hành hỗ trợ', NULL, '2026-04-18 10:33:03', '2026-04-18 10:33:03'),
(23, 'tro-khang', 'Trở kháng', NULL, '2026-04-18 10:33:34', '2026-04-18 10:33:34'),
(24, 'tan-so-dap-ung', 'Tần số đáp ứng', NULL, '2026-04-18 10:33:47', '2026-04-18 10:33:47'),
(25, 'microphone', 'Microphone', NULL, '2026-04-18 10:33:56', '2026-04-18 10:33:56'),
(26, 'chiu-tai-toi-da', 'Chịu tải tối đa', NULL, '2026-04-18 23:03:45', '2026-04-18 23:03:45'),
(27, 'nga-lung', 'Ngả lưng', NULL, '2026-04-18 23:03:52', '2026-04-18 23:03:52'),
(28, 'chieu-cao-phu-hop', 'Chiều cao phù hợp', NULL, '2026-04-18 23:03:58', '2026-04-18 23:03:58'),
(29, 'loai-ghe', 'Loại ghế', NULL, '2026-04-18 23:04:08', '2026-04-18 23:04:08'),
(30, 'chat-lieu', 'Chất liệu', NULL, '2026-04-18 23:04:19', '2026-04-18 23:04:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `logo` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0:inactive, 1:active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `name`, `description`, `created_at`, `updated_at`, `logo`, `status`) VALUES
(1, 'Razer', 'Gaming', '2026-04-14 04:13:40', '2026-04-14 10:36:58', 'brand-image/rduunZCE48OHTp716LrZhhCq7V7Fgt7KxDsetCsK.png', 1),
(2, 'Logitech', 'Gaming', '2026-04-14 04:13:48', '2026-04-14 10:35:37', 'brand-image/oZBpjJlvS4ZMXYphl6EnrhueMPfYOeetOPXMiCzs.png', 1),
(3, 'Corsair', 'Gaming', '2026-04-14 04:13:59', '2026-04-14 10:36:16', 'brand-image/8Pw4IK7GzchnWKohJKy1zOxASxtwMNcjzh7QAap4.png', 1),
(4, 'Asus', 'Gaming', '2026-04-14 04:14:10', '2026-04-14 10:35:27', 'brand-image/cPFyHnIX5zyxWiRvhBYuzU59FNX1NLMFPQQfPBGK.png', 1),
(5, 'Acer', 'Gaming', '2026-04-14 04:14:20', '2026-04-14 10:34:52', 'brand-image/vUYPCDBBqUImKZBaInd7aJMT8M2mCKliE377EPIH.png', 1),
(6, 'Gigabyte', 'Gaming', '2026-04-14 04:14:28', '2026-04-14 10:35:04', 'brand-image/KbQMFPsMGJetlRJeRlgjpidHFfQrcu4dGvGmCuo4.png', 1),
(8, 'ATK', 'Gaming', '2026-04-18 09:52:07', '2026-04-18 09:52:07', 'brand-image/rNmo21vUEBykzVMenY8CDe77GP8oQhbaewKSIaPI.jpg', 1),
(9, 'HyperX', 'Gaming', '2026-04-18 10:36:49', '2026-04-18 10:36:49', 'brand-image/DnVo8lMaJc0HixFfQwFBYjv2LI8fvDNlaEjuVjWc.jpg', 1),
(10, 'Akko', 'Gaming', '2026-04-18 11:14:51', '2026-04-18 11:14:51', 'brand-image/j722jHQ7n1JphLeB2xSL1cemMKTvMIkDNhg6mOi2.webp', 1),
(11, 'Zowie', 'Gaming', '2026-04-18 22:13:42', '2026-04-18 22:13:42', 'brand-image/QLmyxyq7dIicogutvgPyX8jwCyD8vpOg99KjZHfh.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-15d8671e881778a1c15d7a56c24870f3', 'i:2;', 1776678011),
('laravel-cache-15d8671e881778a1c15d7a56c24870f3:timer', 'i:1776678011;', 1776678011),
('laravel-cache-5ed32f06bb2037b2291a8af8d825c64e', 'i:1;', 1776526160),
('laravel-cache-5ed32f06bb2037b2291a8af8d825c64e:timer', 'i:1776526160;', 1776526160),
('laravel-cache-product_filters', 'a:1:{s:7:\"mau-sac\";a:1:{i:0;s:7:\"Trắng\";}}', 1776285586);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 6, '2026-04-17 20:34:21', '2026-04-17 20:34:21'),
(2, 8, '2026-04-17 20:58:50', '2026-04-17 20:58:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_items`
--

CREATE TABLE `cart_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cart_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `price` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart_items`
--

INSERT INTO `cart_items` (`id`, `cart_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(24, 1, 127, 1, 1690000.00, '2026-04-19 06:17:02', '2026-04-19 06:17:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0:inactive, 1:active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `thumbnail`, `slug`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Chuột gaming', 'chuột', 'category-image/o9ZnnZ8kTppJo64oCLG4OqoPsy2d7dwLMSzrnRgc.jpg', 'chuot-gaming', '2026-04-14 04:16:40', '2026-04-14 11:04:50', 1),
(2, 'Bàn phím cơ', 'Bàn phím', 'category-image/zPpy4MrxCb6p2kmRg4x3cuRnd2Uwtbw2Y1ts7l7p.jpg', 'ban-phim-co', '2026-04-14 04:16:55', '2026-04-14 11:04:46', 1),
(3, 'Tai nghe', 'tai nghe', 'category-image/6e4fnMQixDN8G2iXz1QaLPGY3qv4rPjsPdnRn3U6.jpg', 'tai-nghe', '2026-04-14 04:17:09', '2026-04-14 11:04:39', 1),
(4, 'Phụ kiện khác', 'Mic, dây kết nối, switch bàn phím,...', 'category-image/XKRxtC8Lz06fJQFTF5ZfnTodnQDNlO0IDDNTPQdo.jpg', 'phu-kien-khac', '2026-04-14 04:17:39', '2026-04-18 10:47:07', 1),
(5, 'siuuuu', 'ádasdasd', 'category-image/71E5574cKRoW8YImt8seMnUY26ctx3SRD2d0wYKd.jpg', 'siuuuu', '2026-04-14 11:01:20', '2026-04-15 13:14:27', 0),
(6, 'NBT', 'ádasda', 'category-image/RHcKsMcczM3tHJ2LQnwoCCEHjq3z99sy03JDg7bN.jpg', 'nbt', '2026-04-14 13:41:19', '2026-04-14 13:44:46', 0),
(7, 'Màn hình', 'Màn hình', 'category-image/iTa6qHTfTEEQQDo0Ioa8dAFi4bSdsVEyBNz6GWeE.webp', 'man-hinh', '2026-04-18 10:35:30', '2026-04-18 10:35:30', 1),
(8, 'Ghế & Bàn', 'Bàn ghế công thái học, gaming', 'category-image/0GZhrIjhff9TwNy6sbOUFyYhblQ8Bo4NfXRuv2ne.webp', 'ghe-ban', '2026-04-18 10:43:29', '2026-04-18 10:43:29', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment_content` text NOT NULL,
  `comment_rating` tinyint(4) DEFAULT NULL,
  `comment_status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `jobs`
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
-- Cấu trúc bảng cho bảng `job_batches`
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
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_04_09_075849_add_two_factor_columns_to_users_table', 1),
(5, '2026_04_09_075949_create_personal_access_tokens_table', 1),
(6, '2026_04_09_094700_create_categories_table', 1),
(7, '2026_04_09_094710_create_brands_table', 1),
(8, '2026_04_09_094730_create_products_table', 1),
(9, '2026_04_09_095434_create_orders_table', 1),
(10, '2026_04_09_095557_create_order_details_table', 1),
(11, '2026_04_09_110022_create_comments_table', 1),
(12, '2026_04_10_075730_create_product_images_table', 1),
(13, '2026_04_10_081051_create_wishlists_table', 1),
(14, '2026_04_14_103810_create_carts_table', 1),
(15, '2026_04_14_103837_create_cart_items_table', 1),
(16, '2026_04_14_113607_add_sale_price_to_products_table', 2),
(17, '2026_04_14_124123_add_logo_to_brands_table', 3),
(18, '2026_04_14_130200_add_status_to_categories_table', 4),
(19, '2026_04_14_160110_add_status_to_brands_table', 5),
(20, '2026_04_15_064945_add_columns_discount_percent_to_table_products', 6),
(21, '2026_04_15_115713_add_columns_attributes_to_table_products', 7),
(22, '2026_04_15_152235_create_attribute_templates_table', 8),
(23, '2026_04_15_153529_create_attribute_templates_table', 9),
(24, '2026_04_15_162435_attribute_templates', 10),
(25, '2026_04_15_170138_attribute_templates', 11),
(26, '2026_04_17_015711_change_phone_columns_type_in_users_table', 12),
(27, '2026_04_17_155319_create_comments_table', 13);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_code` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `sub_total` decimal(10,2) NOT NULL,
  `shipping_fee` decimal(10,2) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `payment_method` varchar(255) NOT NULL DEFAULT 'cod',
  `note` text DEFAULT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `customer_phone` varchar(255) DEFAULT NULL,
  `customer_email` varchar(255) DEFAULT NULL,
  `customer_address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `order_code`, `user_id`, `total_amount`, `sub_total`, `shipping_fee`, `status`, `payment_method`, `note`, `customer_name`, `customer_phone`, `customer_email`, `customer_address`, `created_at`, `updated_at`) VALUES
(6, 'DH69E4BE92CECEB', 6, 520000.00, 490000.00, 30000.00, 'pending', 'cod', NULL, 'Test User', '0827227271', 'test@gmail.com', '123', '2026-04-19 04:37:54', '2026-04-19 04:37:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(5, 6, 126, 1, 490000.00, '2026-04-19 04:37:54', '2026-04-19 04:37:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('nbtrong23081997@gmail.com', '$2y$12$SSAErH/80aA3HP11TkIdIuQ2k7BNB9efuEZw5ovTLdQKfvRugG7fa', '2026-04-16 10:28:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sku` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `sale_price` decimal(15,2) DEFAULT NULL,
  `stock_quantity` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0:inactive, 1:active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `discount_percent` double DEFAULT NULL,
  `attributes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`attributes`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `sku`, `category_id`, `brand_id`, `name`, `description`, `thumbnail`, `price`, `sale_price`, `stock_quantity`, `slug`, `status`, `created_at`, `updated_at`, `discount_percent`, `attributes`) VALUES
(13, 'SKU-CHUOT-GAMING-0010', 1, 11, 'Chuột Gaming BenQ Zowie EC3-DW', '<p>Đầy là mô tả cho sản phẩm Sản phẩm Chuột gaming 10. Hàng chính hãng, chất lượng cao, bảo hành 12 tháng.</p>', 'product-thumbnail/IcvAh7cU5XUYk24nQ1GAnnBGJaCbTD5mkI9Kyocg.png', 4380000.00, NULL, 13, 'chuot-gaming-benq-zowie-ec3-dw', 1, '2026-04-14 12:15:22', '2026-04-18 22:14:17', 0, '{\"mau-sac\":\"\\u0110en\",\"loai-ket-noi\":\"Kh\\u00f4ng d\\u00e2y 2.4GHz + Wired USB-C\",\"trong-luong\":\"59g\",\"kich-thuoc\":\"Small (S)\",\"he-dieu-hanh-ho-tro\":\"PC, Console\",\"bao-hanh\":\"24 th\\u00e1ng\"}'),
(18, 'PVN2787', 2, 4, 'Bàn phím cơ ASUS ROG Azoth Extreme (ROG NX Switch)', '<p><strong>BÀN PHÍM CƠ ASUS ROG AZOTH EXTREME (ROG NX SWITCH)</strong></p><p>Bàn phím cơ ASUS ROG Azoth Extreme với ROG NX Switch là sản phẩm cao cấp dành cho game thủ chuyên nghiệp và enthusiast, với thiết kế hiện đại và hiệu suất vượt trội. Layout 75% compact, switch ROG NX mechanical (Red/Blue/Brown tùy chọn), gasket mount, hot-swap, RGB per-key, tri-mode (Bluetooth/2.4GHz/Wired), pin 8000mAh siêu lâu. Khung nhôm CNC cao cấp, OLED display tùy chỉnh, keycap PBT double-shot, âm thanh creamy thocky, phù hợp cho gaming cạnh tranh, typing marathon và setup thẩm mỹ cao cấp, giúp bạn tùy chỉnh theo phong cách cá nhân.</p><p><strong><img src=\"https://bizweb.dktcdn.net/100/443/218/files/download_7_.png?v=1769757041186\" width=\"800\" height=\"400\"></strong></p><p><strong>SWITCH ROG NX VÀ ÂM THANH ĐỈNH CAO</strong></p><p>Bàn phím sử dụng switch ROG NX mechanical (Red linear, Blue clicky, Brown tactile) với độ nảy chính xác, hot-swap 3/5-pin cho tùy biến dễ dàng. Gasket mount đa lớp, Poron foam, silicone dampening mang lại âm thanh creamy thocky sâu lắng, êm ái và không mệt mỏi khi gõ lâu.</p><p><strong><img src=\"https://bizweb.dktcdn.net/100/443/218/files/download_6_.png?v=1769757040035\" width=\"800\" height=\"400\"></strong></p><p><strong>TRI-MODE CONNECTIVITY VÀ PIN SIÊU LÂU</strong></p><p>Kết nối Bluetooth 5.0 (3 thiết bị), 2.4GHz ROG SpeedNova low latency và wired USB-C. Pin 8000mAh cho thời gian sử dụng lên đến 2000 giờ (RGB tắt), polling rate 1000Hz ổn định ở mọi mode, sạc nhanh USB-C.</p><p><strong>RGB PER-KEY VÀ OLED DISPLAY TÙY CHỈNH</strong></p><p>RGB per-key 16 triệu màu south-facing tùy chỉnh qua Armoury Crate, OLED display hiển thị thông tin thời gian, battery, profile, animation tùy chỉnh. Keycap PBT double-shot profile Cherry bền đẹp, chống phai chữ.</p><p><strong><img src=\"https://bizweb.dktcdn.net/100/443/218/files/download_8_.png?v=1769757041952\" width=\"800\" height=\"400\"></strong></p><p><strong>PHẦN MỀM ARMOURY CRATE VÀ TÙY CHỈNH</strong></p><p>Phần mềm Armoury Crate hỗ trợ remap phím, macro, RGB, actuation adjustment (nếu switch adjustable), profile cloud. Tương thích Windows/macOS, dễ dàng customize theo nhu cầu.</p><p><strong><img src=\"https://bizweb.dktcdn.net/100/443/218/files/download_5_.png?v=1769757038656\" width=\"800\" height=\"400\"></strong></p><p><strong>THOẢI MÁI VÀ PHỤ KIỆN ĐẦY ĐỦ</strong></p><p>Thiết kế ergonomics với wrist rest tùy chọn, trọng lượng cân bằng. Phụ kiện kèm coiled cable, extra keycap, switch puller, USB receiver 2.4GHz, dust cover, tool kit. Độ bền cao với nhôm CNC và switch ROG NX.</p><p><strong>NÂNG TẦM SETUP VỚI BÀN PHÍM ASUS ROG AZOTH EXTREME ĐỘC QUYỀN</strong></p><p>ASUS ROG Azoth Extreme là bàn phím cơ cao cấp hoàn hảo, kết hợp switch ROG NX chính xác, OLED display thông minh và kết nối tri-mode linh hoạt. Đây là lựa chọn lý tưởng cho game thủ muốn hiệu suất đỉnh cao, âm thanh xuất sắc và thiết kế premium.</p><p><strong><img src=\"https://bizweb.dktcdn.net/100/443/218/files/download_4_.png?v=1769757037530\" width=\"800\" height=\"400\"></strong></p>', 'product-thumbnail/oGJUV7kxznYGnr7RaSogHoemtFsdsWcVddKKX6RY.webp', 15990000.00, 14950000.00, 16, 'ban-phim-co-asus-rog-azoth-extreme-rog-nx-switch', 1, '2026-04-14 12:15:29', '2026-04-18 11:29:38', 7, '{\"mau-sac\":\"\\u0110en\",\"layout\":\"75% (80-84 ph\\u00edm)\",\"loai-ket-noi\":\"Tri-mode: Bluetooth \\/ 2.4GHz \\/ Wired USB-C\",\"keycap\":\"PBT Double-shot Cherry Profile\",\"switch\":\"ROG NX (Red\\/Blue\\/Brown)\",\"pin\":\"8000mAh (l\\u00ean \\u0111\\u1ebfn 2000 gi\\u1edd)\",\"kich-thuoc\":\"Kho\\u1ea3ng 330 x 140 x 40 mm\",\"trong-luong\":\"Kho\\u1ea3ng 1.0-1.2kg\",\"he-dieu-hanh-ho-tro\":\"Windows, macOS\",\"bao-hanh\":\"24 th\\u00e1ng\"}'),
(19, 'PVN2748', 2, 10, 'Bàn phím AKKO 3098B Plus', '<p><strong>BÀN PHÍM AKKO 3098B PLUS (SILENT SWITCH)</strong></p><p>Bàn phím AKKO 3098B Plus với Silent Switch là sản phẩm cao cấp dành cho người dùng văn phòng và game thủ, với thiết kế hiện đại và hiệu suất vượt trội. Layout 98% compact (98 phím), switch silent tactile/linear tùy chọn (như AKKO CS Jelly Silent), tri-mode (Bluetooth/2.4GHz/Wired), hot-swap 5-pin, RGB programmable. Keycap PBT double-shot ASA profile bền đẹp, âm thanh êm ái yên tĩnh, pin 3000mAh lâu dài, phù hợp cho typing marathon, gaming nhẹ và setup chuyên nghiệp, giúp bạn tùy chỉnh theo phong cách cá nhân.</p><p><strong>SWITCH SILENT VÀ ÂM THANH ÊM ÁI</strong></p><p>Bàn phím sử dụng switch silent AKKO CS Jelly Silent (tactile/linear), tùy chỉnh actuation êm ái, giảm tiếng ồn tối đa. Hot-swap 5-pin south-facing cho tùy biến dễ dàng, âm thanh muffled creamy phù hợp văn phòng yên tĩnh.</p><p><strong>TRI-MODE CONNECTIVITY VÀ PIN LÂU</strong></p><p>Kết nối Bluetooth 5.0 (3 thiết bị), 2.4GHz dongle low latency và wired USB-C. Pin 3000mAh cho thời gian sử dụng lên đến 500 giờ (RGB tắt), polling rate ổn định ở mọi mode.</p><p><strong>RGB PROGRAMMABLE VÀ KEYCAP PBT</strong></p><p>RGB 16 triệu màu tùy chỉnh qua phần mềm AKKO Cloud Driver, keycap PBT double-shot ASA profile bền bỉ, chống shine. Coiled cable tùy chọn, thẩm mỹ cao cấp cho setup minimalist.</p><p><strong>PHẦN MỀM VÀ TÙY CHỈNH</strong></p><p>Phần mềm AKKO Cloud Driver hỗ trợ remap phím, macro, RGB, tương thích Windows/macOS, dễ dàng customize theo nhu cầu.</p><p><strong>THOẢI MÁI VÀ PHỤ KIỆN ĐẦY ĐỦ</strong></p><p>Ergonomics cao với height thấp, trọng lượng cân bằng. Phụ kiện kèm extra keycap, switch puller, USB cable, dongle 2.4GHz, dust cover.</p><p><strong>NÂNG TẦM SETUP VỚI BÀN PHÍM AKKO 3098B PLUS SILENT SWITCH ĐỘC QUYỀN</strong></p><p>AKKO 3098B Plus Silent Switch là bàn phím tri-mode hoàn hảo, kết hợp âm thanh êm ái, kết nối linh hoạt và layout compact. Đây là lựa chọn lý tưởng cho người dùng văn phòng muốn hiệu suất cao và yên tĩnh tối ưu.</p>', 'product-thumbnail/26ai8STgimvb8f9YZfz517AHl56XPTtC0G9UUo8f.webp', 1390000.00, NULL, 45, 'ban-phim-akko-3098b-plus', 1, '2026-04-14 12:15:32', '2026-04-18 11:20:15', 0, '{\"mau-sac\":\"\\u0110en\",\"switch\":\"AKKO V3 Cream Yellow Pro (linear silent, pre-lubed, tu\\u1ed5i th\\u1ecd 50M+)\",\"layout\":\"98% (98 ph\\u00edm)\",\"keycap\":\"PBT Double-shot ASA Profile\",\"pin\":\"3000mAh (500 gi\\u1edd)\",\"tan-so-phan-hoi\":\"1000Hz\",\"kich-thuoc\":\"Kho\\u1ea3ng 382 x 134 x 40 mm\",\"trong-luong\":\"Kho\\u1ea3ng 900g\",\"he-dieu-hanh-ho-tro\":\"Windows, macOS\",\"bao-hanh\":\"12 th\\u00e1ng\"}'),
(20, 'AK00059', 2, 8, 'Bàn phím cơ không dây AKKO 3068B Plus Multi-modes World Tour Tokyo R2', '<p><strong>AKKO 3068B Plus World Tour Tokyo R2</strong></p><p>sở hữu layout 68 phím bấm vô cùng nhỏ gọn, thiết kế độc đáo với phối màu “World Tour Tokyo” đẹp mắt. Đồng thời, ở bản nâng cấp lần này Akko hứa hẹn sẽ mang đến cho người dùng dòng sản phẩm bàn phím&nbsp;với&nbsp;những trải nghiệm gõ phím có một không hai.</p><p><strong>Phối màu độc đáo cùng layout 68 phím bấm</strong></p><p><img src=\"https://bizweb.dktcdn.net/thumb/1024x1024/100/443/218/files/kko-3068b-plus-world-tour-tokyo-r2-02-3899eea1f29d4fb28d0d3e5fea55f146-32d8c2ba2f6a494ea6cf672199ceb096-jpeg.jpg?v=1746093620706\" width=\"1024\" height=\"1024\"></p><p>Phối màu độc đáo, bắt mắt chính là những gì bạn có thể nhận thấy được trên thiết bị gaming gear&nbsp;đến từ Akko. Với phối màu “World Tour Tokyo” AKKO 3068B Plus sẽ giúp cho mọi không gian từ làm việc cho đến giải trí thêm phần lung linh.</p><p><img src=\"https://bizweb.dktcdn.net/thumb/1024x1024/100/443/218/files/kko-3068b-plus-world-tour-tokyo-r2-05-21e9cfcdab7b40db896987f7a7f06a6b-3b3b8ed538b64f4493927b0f6933fb87-jpeg.jpg?v=1746093621319\" width=\"1024\" height=\"1024\"></p><p>Để có thể mang đi và sử dụng ở bất kỳ đâu, AKKO 3068B Plus World Tour Tokyo R2 sở hữu layout 60% với 68 phím bấm được bố trí thông minh. Người chơi hoàn toàn có thể cất gọn trong balo cùng các thiết bị ngoại vi như chuột máy tính , tai nghe hoặc những phụ kiện đi kèm để tăng thêm trải nghiệm.</p><p><strong>Sở hữu nhiều tính năng nổi bật</strong></p><p><img src=\"https://bizweb.dktcdn.net/thumb/1024x1024/100/443/218/files/kko-3068b-plus-world-tour-tokyo-r2-03-420eb2b1c4dc4f5a94cd270c19fa06ef-0b59d807ded24b3a97210c9467883d86-jpeg.jpg?v=1746093618047\" width=\"1024\" height=\"1024\"></p><p><strong>AKKO 3068B Plus World Tour Tokyo R2 được biết đến là dòng bàn phím cơ&nbsp;sở hữu nhiều nâng cấp nhất để người chơi có những trải nghiệm riêng biệt như:</strong></p><p>Tương thích: Windows / MacOS / Linux (có hỗ trợ MAC Function)</p><p>Hỗ trợ NKRO / Multimedia / Macro / Khóa phím Windows</p><p>Stab pre-lubed được tinh chỉnh sẵn</p><p>Có lót tiêu âm (FOAM) EVA dày 3.5mm (nằm giữa plate và PCB)</p><p>Công nghệ hỗ trợ thay nóng switch (hotswap, 5 pin, TTC hotswap socket)</p><p><strong>Đèn nền LED RGB với nhiều chế độ</strong></p><p><img src=\"https://bizweb.dktcdn.net/thumb/1024x1024/100/443/218/files/thumbphim-12702df47c6b4bed9506e2e27b658d3d-e6483bd9ec28426ab05b63f8c7efe652-jpeg.jpg?v=1746093619879\" width=\"1024\" height=\"1024\"></p><p>Kết hợp với phối màu độc đáo, thiết kế nhỏ gọn chính là hệ thống đèn nền LED RGB lấp lánh với nhiều chế độ chiếu sáng khác nhau. Bạn có thể tùy chọn nhiều chế độ LED thông qua tổ hợp phím được tích hợp sẵn, tạo nên không gian gaming đầy sắc màu.</p><p><strong>Switch AKKO CS Jelly Pink độc quyền</strong></p><p><img src=\"https://bizweb.dktcdn.net/thumb/1024x1024/100/443/218/files/kko-3068b-plus-world-tour-tokyo-r2-07-697ca72de6334d238c71f7539b29f20e-7b90d8f201c643a38c99d41f47e9276a-jpeg.jpg?v=1746093622852\" width=\"1024\" height=\"1024\"></p><p>Hãng sản xuất đã trang bị cho AKKO 3068B Plus World Tour Tokyo R2 bộ switch độc quyền AKKO CS Jelly Pink. Cảm giác ấn phím êm tay mượt mà kết hợp âm thanh gõ phím trong trẻo hứa hẹn sẽ đem lại trải nghiệm khác biệt cho người dùng.</p><p><strong>Kết nối tiện lợi “3 trong 1”</strong></p><p><img src=\"https://bizweb.dktcdn.net/thumb/1024x1024/100/443/218/files/kko-3068b-plus-world-tour-tokyo-r2-04-8750b100f97241f7a6efa6a3c33660e5-1d67a65877584f58913da8cf1a0a4399-jpeg.jpg?v=1746093618965\" width=\"1024\" height=\"1024\"></p><p>Không dừng lại ở thiết kế với 68 phím bấm nhỏ gọn, để tối ưu cho việc có thể sử dụng bàn phím&nbsp;ở bất kỳ đâu. 3068B Plus World Tour Tokyo R2 được trang bị đến 3 chế độ kết nối khác nhau. Bạn có thể sử dụng chế độ không dây Wireless 2.4Ghz phạm vi kết nối lên đến 10m, Bluetooth 5.0&nbsp;(tối đa 3 thiết bị) độ với độ trễ cực kỳ thấp hoặc&nbsp;thông qua cáp USB Type-C có thể tháo rời</p><p><img src=\"https://bizweb.dktcdn.net/thumb/1024x1024/100/443/218/files/kko-3068b-plus-world-tour-tokyo-r2-06-6960dd46a9d54830941415652c25e8f8-9dd9803618b041ecad884bcdffddb500-jpeg.jpg?v=1746093621956\" width=\"1024\" height=\"1024\"></p>', 'product-thumbnail/z38jDGy1zPwsY21JB8GgQZ2SCweTuvhq3StDXEJj.webp', 1950000.00, NULL, 44, 'ban-phim-co-khong-day-akko-3068b-plus-multi-modes-world-tour-tokyo-r2', 1, '2026-04-14 12:15:33', '2026-04-18 11:25:21', 0, '{\"mau-sac\":\"H\\u1ed3ng\",\"switch\":\"AKKO CS Jelly Pink\",\"layout\":\"65%\",\"keycap\":\"PBT Double-Shot, OSA profile\",\"kich-thuoc\":\"316 x 107 x 39mm\",\"trong-luong\":\"640g\",\"pin\":\"1800 mah\",\"loai-ket-noi\":\"USB Type C, c\\u00f3 th\\u1ec3 th\\u00e1o r\\u1eddi \\/ b\\u00e0n ph\\u00edm Bluetooth 5.0 (t\\u1ed1i \\u0111a 3 thi\\u1ebft b\\u1ecb)\\/ Wireless 2.4Ghz (1 trong 3)\",\"bao-hanh\":\"12 th\\u00e1ng\"}'),
(21, 'PVN2667', 2, 8, 'Bàn phím HE ATK x QK Hex80 TKL (Ti Switch)', '<p><strong>BÀN PHÍM HE ATK X QK HEX80 TKL (TI SWITCH)</strong></p><p>Bàn phím HE ATK x QK Hex80 TKL Ti Switch là phiên bản collab cao cấp dành cho game thủ chuyên nghiệp và enthusiast, với thiết kế hiện đại và hiệu suất vượt trội. Layout TKL 80% compact, switch Hall Effect magnetic Ti Switch hỗ trợ rapid trigger, tùy chỉnh actuation 0.1-4.0mm, polling rate 8KHz cho độ trễ siêu thấp. Khung nhôm hợp kim, gasket mount, RGB 16 triệu màu, kết nối tri-mode (Bluetooth/2.4GHz/Wired), pin lâu. Phiên bản collab độc quyền với thiết kế hex pattern, âm thanh creamy thocky đỉnh cao, phù hợp cho FPS cạnh tranh, streaming và typing marathon.</p><p><strong>SWITCH HALL EFFECT TI SWITCH VÀ RAPID TRIGGER</strong></p><p>Bàn phím sử dụng switch Hall Effect magnetic Ti Switch linear cao cấp, tùy chỉnh actuation từ 0.1-4.0mm, hỗ trợ rapid trigger, dynamic keystroke và SOCD cho phản hồi nhanh chóng. Polling rate 8KHz, scanning rate cao, lý tưởng cho FPS như CS2, Valorant, Apex Legends với độ chính xác và tốc độ vượt trội.</p><p><strong>THIẾT KẾ NHÔM HỢP KIM VÀ ÂM THANH ĐỈNH CAO</strong></p><p>Khung nhôm hợp kim CNC nguyên khối với gasket mount đa lớp, poron foam, IXPE pad mang lại âm thanh creamy thocky sâu lắng ngay từ hộp. Layout TKL 80% compact với precision knob, phiên bản collab hex pattern độc quyền, keycap PBT double-shot shine-through bền bỉ.</p><p><strong>RGB SOUTH-FACING VÀ TRI-MODE CONNECTIVITY</strong></p><p>RGB 16 triệu màu south-facing tùy chỉnh đẹp mắt, kết nối Bluetooth 5.0 (3 thiết bị), 2.4GHz low latency và wired USB-C. Pin 4000mAh cho thời gian sử dụng lên đến 800 giờ (RGB tắt).</p><p><strong>PHẦN MỀM VÀ TÙY CHỈNH</strong></p><p>Phần mềm ATK/QK hỗ trợ remap phím, macro, RGB, QMK/VIA compatible. Tương thích Windows/macOS/Linux, dễ dàng customize theo nhu cầu.</p><p><strong>THOẢI MÁI VÀ PHỤ KIỆN COLLAB</strong></p><p>Ergonomics cao với height điều chỉnh, trọng lượng cân bằng. Phụ kiện collab đặc biệt: extra keycap signature, coiled cable, dust cover, switch puller. Số lượng limited toàn cầu.</p><p><strong>NÂNG TẦM SETUP VỚI BÀN PHÍM ATK X QK HEX80 TKL TI SWITCH ĐỘC QUYỀN</strong></p><p>ATK x QK Hex80 TKL Ti Switch là bàn phím Hall Effect collab hoàn hảo, kết hợp tốc độ rapid trigger, âm thanh đỉnh cao và thiết kế hex pattern độc quyền. Đây là lựa chọn lý tưởng cho game thủ muốn hiệu suất cao và phong cách riêng biệt, số lượng limited.</p>', 'product-thumbnail/pOj42e2kdHMUYd63QreCekuNclpXogv6hVNzWm2b.png', 6990000.00, 5980000.00, 14, 'ban-phim-he-atk-x-qk-hex80-tkl-ti-switch', 1, '2026-04-14 12:15:35', '2026-04-18 11:09:51', 14, '{\"mau-sac\":\"Sandgold, Purple, Grey, Babypink, Spark\",\"layout\":\"TKL 80% layout\",\"switch\":\"Hall Effect Magnetic Ti Switch (Linear)\",\"keycap\":\"PBT double-shot shine-through\",\"loai-ket-noi\":\"Tri-mode: Bluetooth \\/ 2.4GHz \\/ Wired USB-C\",\"tan-so-phan-hoi\":\"8KHz\",\"kich-thuoc\":\"Kho\\u1ea3ng 360 x 140 x 40 mm\",\"trong-luong\":\"Kho\\u1ea3ng 950g\",\"he-dieu-hanh-ho-tro\":\"Windows, macOS, Linux\",\"bao-hanh\":\"12 th\\u00e1ng\"}'),
(22, 'RZ8727', 2, 1, 'Bàn phím Razer Huntsman V3 Pro Mini', '<p><strong>Bàn phím cơ Razer Huntsman V3 Pro Mini</strong></p><p><strong>Razer Huntsman V3 Pro Mini&nbsp;</strong>bàn phím gaming kich thước 60% được Razer trang bị&nbsp;<strong>switch quang học&nbsp;ANALOG RAZER™ GEN-2</strong>, được tích hợp app điều chỉnh Razer giúp khởi động và lưu giữ cài đặt của bạn nhằm tối ưu hóa việc sử dụng phím cho các lần sau.</p><p><strong>Công Tắc Quang Analog Razer™ Gen-2 – Tốc Độ &amp; Chính Xác Tuyệt Đối</strong></p><p><img src=\"https://bizweb.dktcdn.net/thumb/1024x1024/100/443/218/files/ban-phim-co-razer-huntsman-v3-pro-mini-60-analog-optical-rz03-04990100-r3m1-jpeg.jpg?v=1748661817187\" width=\"1000\" height=\"1000\"></p><p><strong>Razer Huntsman V3 Pro Mini</strong>&nbsp;được trang bị&nbsp;<strong>Công Tắc Quang Analog Razer™ Gen-2</strong>, mang đến khả năng kích hoạt nhanh và điều chỉnh độ nhạy linh hoạt. Bạn có thể tùy chỉnh phạm vi kích hoạt từ&nbsp;<strong>0,1mm đến 4,0mm</strong>, phù hợp với mọi phong cách chơi game. Với tuổi thọ lên đến&nbsp;<strong>100 triệu lần nhấn</strong>, bàn phím đảm bảo độ bền vượt trội.</p><p>Chế Độ Kích Hoạt Nhanh – Rapid Trigger Siêu Nhạy</p><p><img src=\"https://bizweb.dktcdn.net/thumb/1024x1024/100/443/218/files/ban-phim-co-razer-huntsman-v3-pro-mini-60-analog-optical-rz03-04990100-r3m1-4-jpeg.jpg?v=1748661750835\" width=\"1000\" height=\"1000\"></p><p>Tính năng&nbsp;<strong>Rapid Trigger</strong>&nbsp;giúp các phím thiết lập lại ngay lập tức chỉ với chuyển động hướng lên&nbsp;<strong>0,1mm</strong>. Điều này cho phép bạn thực hiện các thao tác nhanh chóng mà không cần nhấn mạnh, tăng tốc độ phản hồi trong các tựa game FPS hoặc MOBA.</p><p>Razer™ Snap Tap – Ưu Tiên Phản Hồi Tức Thì</p><p>&nbsp;</p><p>Với tính năng&nbsp;<strong>Razer™ Snap Tap</strong>, bàn phím sẽ ưu tiên lệnh nhập mới nhất giữa hai phím đã chọn mà không cần thả phím trước đó. Điều này giúp bạn&nbsp;<strong>thay đổi hướng di chuyển nhanh chóng</strong>, mang lại lợi thế lớn trong các tình huống giao tranh căng thẳng.</p><p>Điều Chỉnh Hành Trình Phím Theo Ý Muốn</p><p><img src=\"https://bizweb.dktcdn.net/thumb/1024x1024/100/443/218/files/ban-phim-co-razer-huntsman-v3-pro-mini-60-analog-optical-rz03-04990100-r3m1-9-jpeg.jpg?v=1748661752574\" width=\"1000\" height=\"1000\"></p><p>Bàn phím&nbsp;<strong>Razer Huntsman V3 Pro Mini</strong>&nbsp;hỗ trợ điều chỉnh độ nhạy&nbsp;<strong>từ 0,1mm đến 4,0mm</strong>, cho phép bạn tùy chỉnh phù hợp với&nbsp;<strong>cường độ nhấn và phong cách chơi</strong>&nbsp;của mình. Bên cạnh đó, lực kích hoạt&nbsp;<strong>chỉ 40g</strong>, giúp bạn thao tác nhẹ nhàng và nhanh hơn bao giờ hết.</p><p>Chế Độ Điều Chỉnh Nhanh Trực Tiếp Trên Bàn Phím</p><p><strong>Quick Actuation Adjustment Mode</strong>: Nhấn&nbsp;<strong>FN + Tab</strong>&nbsp;để bắt đầu điều chỉnh điểm kích hoạt. Nhấn phím số tương ứng để đặt độ nhạy mong muốn.</p><p><strong>Quick Rapid Trigger Adjustment Mode</strong>: Nhấn&nbsp;<strong>FN + Caps Lk</strong>&nbsp;để điều chỉnh và bật/tắt chế độ&nbsp;<strong>Rapid Trigger</strong>.</p><p><strong>Quick Snap Tap Adjustment Mode</strong>: Nhấn&nbsp;<strong>FN + Left Shift</strong>&nbsp;để kích hoạt&nbsp;<strong>Snap Tap</strong>, hỗ trợ mặc định cho phím&nbsp;<strong>A &amp; D</strong>.</p><p><strong>Thiết Kế Nhỏ Gọn 60% – Tối Ưu Không Gian</strong></p><p>&nbsp;</p><p>Là một&nbsp;<strong>bàn phím 60%</strong>,&nbsp;<strong>Huntsman V3 Pro Mini</strong>&nbsp;giúp tối ưu không gian làm việc và chơi game. Với thiết kế nhỏ gọn, bạn có thể dễ dàng&nbsp;<strong>mang theo</strong>&nbsp;để thi đấu hoặc chơi game mọi lúc mọi nơi.</p><p><strong>Keycap PBT Doubleshot – Bền Bỉ &amp; Chống Mài Mòn</strong></p><p>Các phím&nbsp;<strong>PBT Doubleshot</strong>&nbsp;mang lại độ bền cao, chống bóng và mài mòn, giúp giữ cho ký tự&nbsp;<strong>không bị phai</strong>&nbsp;theo thời gian. Các ký tự phụ được in bên hông, giúp bạn dễ dàng tra cứu chức năng phím nhanh chóng.</p><p><img src=\"https://bizweb.dktcdn.net/thumb/1024x1024/100/443/218/files/ban-phim-co-razer-huntsman-v3-pro-mini-60-analog-optical-rz03-04990100-r3m1-8-jpeg.jpg?v=1748661753661\" width=\"1000\" height=\"1000\"></p><p><strong>Phím Đa Năng – Hỗ Trợ Chức Năng Mũi Tên</strong></p><p>Dù có kích thước nhỏ,&nbsp;<strong>Razer Huntsman V3 Pro Mini</strong>&nbsp;vẫn tích hợp phím chức năng&nbsp;<strong>mũi tên 4 chiều</strong>&nbsp;ngay tại góc bàn phím. Chỉ cần&nbsp;<strong>chạm nhẹ hoặc giữ</strong>, bạn có thể sử dụng chúng như các phím điều hướng trên bàn phím full-size.</p><p><img src=\"https://bizweb.dktcdn.net/thumb/1024x1024/100/443/218/files/ban-phim-co-razer-huntsman-v3-pro-mini-60-analog-optical-rz03-04990100-r3m1-7-1-jpeg.jpg?v=1748661750169\" width=\"1000\" height=\"1000\"></p>', 'product-thumbnail/301Yc59eVoaU30iDUVIaVDgwbnA6qz3nUn52wgox.webp', 4590000.00, 3780000.00, 89, 'ban-phim-razer-huntsman-v3-pro-mini', 1, '2026-04-14 12:15:36', '2026-04-18 11:01:05', 18, '{\"mau-sac\":\"\\u0110en, Tr\\u1eafng\",\"layout\":\"65%\",\"switch\":\"Razer\\u2122 Analog Optical Switch Gen-2\",\"keycap\":\"PBT DoubleShot\",\"loai-ket-noi\":\"D\\u00e2y USB Type C c\\u00f3 th\\u1ec3 th\\u00e1o r\\u1eddi\",\"bao-hanh\":\"24 th\\u00e1ng\"}'),
(23, 'KB9800', 2, 1, 'Bàn phím cơ gaming Razer BlackWidow V4', '<p><strong>Bàn phím cơ gaming Razer BlackWidow V4 75%</strong></p><p><strong>Razer BlackWidow V4 Pro 75% Wireless</strong> là bàn phím cơ nhỏ gọn với <strong>Hot-Swap lần đầu tiên xuất hiện trên Razer</strong>, hỗ trợ switch 3 pin và 5 pin, giúp thay đổi switch dễ dàng. Trang bị <strong>Razer Orange Switch Gen 3</strong>, gõ êm, phản hồi tốt, được <strong>factory lube bằng GPL 205g0</strong>. Thiết kế <strong>layout 75%</strong> với case kim loại chắc chắn, tích hợp <strong>Gasket Mount, Tape Mod PCB, Stab lube sẵn và 2 lớp foam</strong>, tối ưu cảm giác gõ. Hệ thống <strong>LED RGB, LED viền 2 bên</strong> đồng bộ với Synapse. Tích hợp <strong>nút xoay đa chức năng, nút media</strong>, kê tay từ tính bọc da. Hỗ trợ <strong>Polling Rate 8000Hz</strong>, mang lại độ trễ cực thấp cho trải nghiệm mượt mà.</p><p><strong>Thiết kế dạng Hot-Swap, lần đầu tiên được trang bị trên phím Razer</strong></p><p>PCB của Razer BlackWidow V4 75% sử dụng hotswap thích hợp cho cả Switch 3 pin và 5 pin, cho phép bạn dễ dàng thay đổi các switch tùy chỉnh để đạt được cảm giác phím mong muốn.</p><p><img src=\"https://bizweb.dktcdn.net/100/443/218/files/ban-phim-co-razer-blackwidow-v4-75-percentage-rgb-hotswap-razer-switch-orange-4-nd-jpeg.jpg?v=1748721339002\" width=\"400\" height=\"266\"></p><p><strong>Switch cơ học RAZER™ ORANGE TACTILE thế hệ thứ 3</strong></p><p>Công tắc cơ Razer Orange Tactile có khả năng gõ êm hơn trong khi mang lại một trải nghiệm tuyệt vời hơn khi sử dụng, khiến nó trở thành lựa chọn hoàn hảo cho những ai muốn sự linh hoạt mà không cần phải thực hiện thêm nhiều thao tác. Đã được Factory lube bằng GPL 205g0</p><p><img src=\"https://bizweb.dktcdn.net/100/443/218/files/ban-phim-co-razer-blackwidow-v4-75-percentage-rgb-hotswap-razer-switch-orange-1-nd-jpeg.jpg?v=1748721348026\" width=\"400\" height=\"266\"></p><p><strong>Layout 75% nhỏ gọn với Case được làm từ kim loại</strong></p><p>Bố cục hợp lý của bàn phím vẫn bao gồm một hàng F chức năng và các phím mũi tên để bao gồm các lệnh cần thiết, trong khi vỏ bàn phím bằng nhôm đảm bảo kết cấu chắc chắn nhưng nhỏ gọn.</p><p><img src=\"https://bizweb.dktcdn.net/100/443/218/files/ban-phim-co-razer-blackwidow-v4-75-percentage-rgb-hotswap-razer-switch-orange-3-nd-jpeg.jpg?v=1748721382672\" width=\"400\" height=\"266\"></p><p><strong>Cảm giác gõ stock được tối ưu rất tốt</strong></p><p>Nổi bật bằng việc sử dụng Gasket Mount trên plate FR4, Tape Mod PCB, Stab đã được lube sẵn, và đi cùng 2 lớp foam sẽ giúp cho trải nghiệm sử dụng được tối ưu hoàn hảo nhất</p><p><img src=\"https://bizweb.dktcdn.net/100/443/218/files/ban-phim-co-razer-blackwidow-v4-75-percentage-rgb-hotswap-razer-switch-orange-7-nd-jpeg-510066f1-b51e-4f32-b56a-d195531cd026.jpg?v=1748721391976\" width=\"400\" height=\"340\"></p><p><strong>Được trang bị hệ thống Led đẹp đi cùng Led viền 2 bên nổi bật</strong></p><p>Đồng bộ hóa hệ thống LED RGB của bàn phím với trạm từng thiết bị và Setup chung của bạn để tận hưởng trải nghiệm đắm chìm tuyệt vời hơn cho những tựa game, và phần mềm tích hợp.</p><p><img src=\"https://bizweb.dktcdn.net/100/443/218/files/ban-phim-co-razer-blackwidow-v4-75-percentage-rgb-hotswap-razer-switch-orange-2-nd-jpeg.jpg?v=1748721429739\" width=\"400\" height=\"266\"></p><p><strong>Con lăn đa chức năng và các nút media phụ</strong></p><p>Tạm dừng, phát, tiếp tục phát nhạc, phim và điều chỉnh mọi thứ từ độ sáng đến âm lượng—sự tiện lợi tối đa khi bạn tận hưởng hoạt động giải trí của mình.</p><p><img src=\"https://bizweb.dktcdn.net/100/443/218/files/ban-phim-co-razer-blackwidow-v4-75-percentage-rgb-hotswap-razer-switch-orange-5-nd-jpeg.jpg?v=1748721438215\" width=\"400\" height=\"266\"></p><p><strong>Kê tay bằng da sử dụng nam châm từ tính&nbsp;</strong></p><p>Phần kê cổ tay bàn phím mềm, có đệm mang lại sự thoải mái lâu dài, cho phép bạn tiếp thêm sức mạnh trong những cuộc chơi game kéo dài khốc liệt nhất.</p><p><img src=\"https://bizweb.dktcdn.net/100/443/218/files/ban-phim-co-razer-blackwidow-v4-75-percentage-rgb-hotswap-razer-switch-orange-nd-jpeg.jpg?v=1748721459577\" width=\"600\" height=\"400\"></p><p><strong>Những tính năng đầu bảng khác đi kèm như 8000Hz Polling Rate, tích hợp Synapse đầy đủ, đi kèm Keypuller và Switchpuller 2 trong 1 …</strong></p><p>&nbsp;</p><p><img src=\"https://bizweb.dktcdn.net/100/443/218/files/screenshot-1626841880-jpeg-59f59cb8-97bf-47c0-af4d-9887e50ca0fa.jpg?v=1748721470437\" width=\"745\" height=\"489\"></p>', 'product-thumbnail/G1gylDmE1Vn8tPKcodS6JHkgiJ3KE6FCGeCw0EIA.jpg', 5090000.00, 3480000.00, 54, 'ban-phim-co-gaming-razer-blackwidow-v4', 1, '2026-04-14 12:15:37', '2026-04-18 10:57:59', 32, '{\"mau-sac\":\"\\u0110en, Tr\\u1eafng\",\"loai-ket-noi\":\"D\\u00e2y Type C c\\u00f3 th\\u1ec3 th\\u00e1o r\\u1eddi\",\"switch\":\"Razer\\u2122 Mechanical Switches (Tactile)\",\"keycap\":\"Doubleshot ABS Keycaps\",\"layout\":\"75%\",\"bao-hanh\":\"24 th\\u00e1ng\"}'),
(42, 'PVN1676', 4, 1, 'Dock Razer Thunderbolt 5 mở rộng cổng kết nối', '<p>Razer Thunderbolt™ 5 Dock: Tăng Tốc Kết Nối, Đột Phá Hiệu Năng</p><p><img src=\"https://bizweb.dktcdn.net/100/443/218/files/download-4-2c8f8630-0f7e-421a-b449-ef4d2511e8fb.png?v=1752652207859\" width=\"1920\" height=\"700\"></p><p>Tốc Độ. Lưu Trữ. Đơn Giản Hóa.</p><p>Nâng tầm trải nghiệm laptop hoặc desktop của bạn với <strong>Razer Thunderbolt™ 5 Dock Chroma</strong> – bộ hub kết nối đỉnh cao với tốc độ truyền dữ liệu nhanh nhất, <strong>10 cổng kết nối</strong>, khe <strong>M.2 SSD</strong>, hỗ trợ <strong>ba màn hình 4K 144Hz</strong>, và công nghệ <strong>Razer Chroma™ RGB</strong> với vô số hiệu ứng ánh sáng độc đáo. Tất cả chỉ qua một kết nối <strong>Thunderbolt™ 5 USB-C</strong>, mang lại sự tiện lợi và hiệu năng vượt trội cho cả công việc và chơi game.</p><p><strong>Từ khóa SEO</strong>: Razer Thunderbolt 5 Dock, hub Thunderbolt 5, dock laptop, hỗ trợ ba màn hình 4K, M.2 SSD, Razer Chroma, kết nối USB-C, dock chơi game.</p><p>Tốc Độ Kết Nối Thunderbolt™ 5 Siêu Nhanh</p><p>Tương Thích Thunderbolt™ 4 và USB4</p><p>Với tốc độ truyền dữ liệu lên đến <strong>120 Gb/s</strong>, Razer Thunderbolt™ 5 Dock Chroma mang đến khả năng xử lý mượt mà các tựa game AAA, kết nối nhiều màn hình và hỗ trợ toàn bộ hệ thống thiết bị ngoại vi, đồng thời sạc laptop <strong>Thunderbolt™ 5</strong> nhanh chóng. Công nghệ này tương thích ngược với <strong>Thunderbolt™ 4</strong> và <strong>USB4</strong>, đảm bảo khả năng tích hợp linh hoạt với nhiều thiết bị.</p><p><img src=\"https://bizweb.dktcdn.net/100/443/218/files/download-5-935c9b42-5868-4968-91a8-758dbf8a3f06.png?v=1752652209805\" width=\"1920\" height=\"700\"></p><p>10 Cổng Kết Nối Với Khe M.2 SSD</p><p>Tối Ưu Hóa Hệ Thống Của Bạn</p><p>Razer Thunderbolt™ 5 Dock Chroma được trang bị <strong>10 cổng kết nối</strong> đa dạng, bao gồm:</p><p><img src=\"https://bizweb.dktcdn.net/100/443/218/files/download-8526535a-0d05-4101-95f5-a17e280c0136.png?v=1752652212998\" width=\"1922\" height=\"752\"></p><p><strong>1 cổng Gigabit Ethernet (RJ45)</strong>: Kết nối mạng ổn định, tốc độ cao.</p><p><strong>2 cổng Thunderbolt™ 5 (Downstream)</strong>: Hỗ trợ thiết bị ngoại vi tốc độ cao.</p><p><strong>1 cổng Thunderbolt™ 5 (Upstream)</strong>: Kết nối chính đến laptop/desktop.</p><p><strong>2 cổng USB-A 3.2 Gen 2 (10Gb/s)</strong>: Kết nối thiết bị USB truyền thống.</p><p><strong>1 cổng USB-C 3.2 Gen 2 (10Gb/s)</strong>: Truyền dữ liệu nhanh và linh hoạt.</p><p><strong>1 khe thẻ SD UHS-II</strong>: Đọc thẻ nhớ tốc độ cao.</p><p><strong>1 cổng âm thanh combo 3.5mm (hỗ trợ 7.1 Surround)</strong>: Âm thanh chất lượng cao.</p><p><strong>1 khe M.2 SSD (PCIe Gen4x4)</strong>: Mở rộng lưu trữ siêu nhanh.</p><p>Khe <strong>M.2 SSD</strong> hỗ trợ dung lượng lên đến <strong>8TB</strong>, cho phép truy cập nhanh chóng vào các tệp lớn như video, ảnh hoặc dữ liệu game.</p><p>Sạc Mạnh Mẽ 140W Với Tản Nhiệt Chủ Động</p><p>Sạc Nhanh, Hiệu Suất Ổn Định</p><p>Cung cấp công suất sạc lên đến <strong>140W</strong>, tăng <strong>56%</strong> so với Thunderbolt™ 4 Dock, Razer Thunderbolt™ 5 Dock Chroma sạc laptop nhanh chóng mà không cần bộ nguồn bổ sung. Hệ thống quạt tản nhiệt tích hợp tự động điều chỉnh tốc độ, đảm bảo hiệu suất ổn định ngay cả khi tải nặng.</p><p>Thunderbolt™ Share: Kết Nối và Điều Khiển Linh Hoạt</p><p>Quản Lý Đa Thiết Bị Dễ Dàng</p><p><img src=\"https://bizweb.dktcdn.net/100/443/218/files/download-3-1c1b049b-3b04-4ed8-8a31-6b04e7ae66db.png?v=1752652206021\" width=\"1920\" height=\"700\"></p><p>Tính năng <strong>Thunderbolt™ Share</strong> cho phép kết nối và chia sẻ tệp giữa các PC, đồng thời điều khiển nhiều máy tính bằng một bộ bàn phím và chuột. Đây là giải pháp hoàn hảo cho các hệ thống làm việc đa PC hoặc cấu hình nhiều màn hình.</p><p>Tùy Chỉnh Ánh Sáng Với Razer Chroma™ RGB</p><p>Cá Nhân Hóa Không Gian Làm Việc</p><p>Hỗ trợ <strong>16.8 triệu màu</strong> và vô số hiệu ứng ánh sáng qua <strong>Razer Chroma™</strong>, bạn có thể đồng bộ dock với các thiết bị Razer khác để tạo nên một không gian làm việc hoặc chơi game đầy phong cách. Tùy chỉnh dễ dàng thông qua phần mềm <strong>Razer Synapse</strong>.</p><p><img src=\"https://bizweb.dktcdn.net/100/443/218/files/download-6-90f7dc65-e2f7-4a9b-8116-c8b7c47fea5d.png?v=1752652211263\" width=\"1920\" height=\"700\"></p><p>Tại Sao Nên Chọn Razer Thunderbolt™ 5 Dock Chroma?</p><p><strong>Tốc độ vượt trội</strong>: Băng thông 120 Gb/s với Thunderbolt™ 5.</p><p><strong>Kết nối đa năng</strong>: 10 cổng và khe M.2 SSD hỗ trợ lên đến 8TB.</p><p><strong>Hỗ trợ đa màn hình</strong>: Ba màn 4K 144Hz hoặc một màn 8K 60Hz.</p><p><strong>Sạc mạnh mẽ</strong>: Công suất 140W với tản nhiệt chủ động.</p><p><strong>Tùy chỉnh ánh sáng</strong>: Hiệu ứng Razer Chroma™ RGB độc đáo.</p><p><strong>Razer Thunderbolt™ 5 Dock Chroma</strong> là giải pháp tối ưu cho game thủ và nhà sáng tạo cần một hub mạnh mẽ, đa năng. Mua ngay tại TechSpace VN với chính sách đổi trả 14 ngày và bảo hành 1 năm.</p>', 'product-thumbnail/ajmYKKdfjeF7hGpOa0W8qp5UBIWdp4XUlHxA99CP.webp', 14990000.00, NULL, 99, 'dock-razer-thunderbolt-5-mo-rong-cong-ket-noi', 1, '2026-04-14 12:16:06', '2026-04-18 22:55:47', 0, '{\"mau-sac\":\"\\u0110en\",\"loai-ket-noi\":\"10 c\\u1ed5ng (2x Thunderbolt\\u2122 5 Downstream, 2x USB-A 3.2 Gen 2, 1x USB-C 3.2 Gen 2, 1x Gigabit Ethernet, 1x 3.5mm Audio Combo, 1x UHS-II SD Card)\"}'),
(43, 'MIC9455', 4, 4, 'Mic thu âm Asus ROG Carnyx – White', '<p><strong>Kích thước Driver thu âm lên đến 25mm</strong></p><p>So với micrô tiêu chuẩn, vỏ tụ điện 25 mm lớn hơn của Carnyx cải thiện hiệu suất tần số thấp và mang lại âm thanh phong phú, tự nhiên và ấm áp.</p><p><strong>Tần số lấy mẫu 192 KHZ / 24-BIT</strong></p><p>Xử lý âm thanh lossless hỗ trợ tốc độ lấy mẫu cao 192 kHz / 24-bit để đảm bảo tái tạo âm thanh có độ trung thực cao phản ánh mọi sắc thái giọng nói của bạn.</p><p><strong>Kiểu thu âm Cardioid</strong></p><p>Kiểu phân cực cardioid nhấn mạnh âm thanh từ phía trước và giảm thiểu việc thu âm thanh từ hai bên và phía sau, khiến Carnyx trở nên hoàn hảo cho các buổi phát sóng solo, game thủ và người làm podcast.</p><p><strong>Filter lọc ồn chất lượng cao</strong></p><p>Bộ lọc tích hợp giúp loại bỏ các tạp âm nền tần số thấp không mong muốn dưới 80 Hz như tiếng ầm ầm hoặc tiếng vo ve, điều này giúp giọng nói của bạn không bị lẫn lộn và giúp giọng nói nổi bật.</p><p><strong>Nút tắt tiếng một chạm</strong></p><p>Chạm nhanh vào nút tắt tiếng sẽ tắt micrô trong khi ghi âm. Nút cảm ứng hoạt động im lặng nên không có âm thanh nào được mic thu vào để ghi âm không bị gián đoạn. Ngoài ra, đèn chỉ báo LED sẽ cho bạn biết khi nào nó được kích hoạt.</p><p>*Chạm và giữ nút trong 2 giây cũng sẽ bật và tắt đèn RGB.</p>', 'product-thumbnail/gtUZj2ltgZksXC88unxWYMowUbg89D9z91ahrnXF.webp', 4520000.00, NULL, 14, 'mic-thu-am-asus-rog-carnyx-white', 1, '2026-04-14 12:16:07', '2026-04-18 22:50:14', 0, '{\"mau-sac\":\"Tr\\u1eafng\",\"loai-ket-noi\":\"USB - A\",\"tan-so-dap-ung\":\"20hz - 20khz\",\"trong-luong\":\"634g\",\"he-dieu-hanh-ho-tro\":\"PC, MAC\",\"bao-hanh\":\"24 th\\u00e1ng\"}'),
(44, 'SKU-SIUUUU-0041', 5, 6, 'Sản phẩm siuuuu 1', 'Đầy là mô tả cho sản phẩm Sản phẩm siuuuu 1. Hàng chính hãng, chất lượng cao, bảo hành 12 tháng.', 'product-image/dummy-66c612f1-c1bd-4541-bed5-a00d76429854.jpg', 2590000.00, NULL, 96, 'san-pham-siuuuu-1-cOQss', 1, '2026-04-14 12:16:09', '2026-04-14 12:16:09', NULL, NULL),
(45, 'SKU-SIUUUU-0042', 5, 1, 'Sản phẩm siuuuu 2', 'Đầy là mô tả cho sản phẩm Sản phẩm siuuuu 2. Hàng chính hãng, chất lượng cao, bảo hành 12 tháng.', 'product-image/dummy-282a096b-63ff-431f-8247-14d0a4ce8c52.jpg', 2760000.00, 2700000.00, 51, 'san-pham-siuuuu-2-nLTzd', 1, '2026-04-14 12:16:10', '2026-04-14 12:16:10', NULL, NULL),
(46, 'SKU-SIUUUU-0043', 5, 1, 'Sản phẩm siuuuu 3', 'Đầy là mô tả cho sản phẩm Sản phẩm siuuuu 3. Hàng chính hãng, chất lượng cao, bảo hành 12 tháng.', 'product-image/dummy-60a2325b-b392-4bf6-bf0f-304b5807b64a.jpg', 4940000.00, NULL, 85, 'san-pham-siuuuu-3-61RNd', 1, '2026-04-14 12:16:12', '2026-04-14 12:16:12', NULL, NULL),
(47, 'SKU-SIUUUU-0044', 5, 6, 'Sản phẩm siuuuu 4', '<p>Đầy là mô tả cho sản phẩm Sản phẩm siuuuu 4. Hàng chính hãng, chất lượng cao, bảo hành 12 tháng.</p>', 'product-image/dummy-5d2a3661-8997-4caa-b925-45578d71b703.jpg', 1540000.00, 1400000.00, 55, 'san-pham-siuuuu-4-8EA7M', 1, '2026-04-14 12:16:13', '2026-04-15 01:15:28', 9, NULL),
(48, 'SKU-SIUUUU-0045', 5, 2, 'Sản phẩm siuuuu 5', 'Đầy là mô tả cho sản phẩm Sản phẩm siuuuu 5. Hàng chính hãng, chất lượng cao, bảo hành 12 tháng.', 'product-image/dummy-8298e164-3b2c-4641-a6b9-860ab2c48553.jpg', 3820000.00, NULL, 78, 'san-pham-siuuuu-5-nF2Rz', 1, '2026-04-14 12:16:15', '2026-04-14 12:16:15', NULL, NULL),
(49, 'SKU-SIUUUU-0046', 5, 3, 'Sản phẩm siuuuu 6', 'Đầy là mô tả cho sản phẩm Sản phẩm siuuuu 6. Hàng chính hãng, chất lượng cao, bảo hành 12 tháng.', 'product-image/dummy-713048db-2711-4bf5-8af1-4546fd81035a.jpg', 2150000.00, NULL, 35, 'san-pham-siuuuu-6-Tskkv', 1, '2026-04-14 12:16:16', '2026-04-14 12:16:16', NULL, NULL),
(50, 'SKU-SIUUUU-0047', 5, 1, 'Sản phẩm siuuuu 7', 'Đầy là mô tả cho sản phẩm Sản phẩm siuuuu 7. Hàng chính hãng, chất lượng cao, bảo hành 12 tháng.', 'product-image/dummy-75cf9bfe-5e7f-4872-b7ac-3a1ecf6793a5.jpg', 1210000.00, NULL, 64, 'san-pham-siuuuu-7-7WTHZ', 1, '2026-04-14 12:16:18', '2026-04-14 12:16:18', NULL, NULL),
(51, 'SKU-SIUUUU-0048', 5, 1, 'Sản phẩm siuuuu 8', '<p>Đầy là mô tả cho sản phẩm Sản phẩm siuuuu 8. Hàng chính hãng, chất lượng cao, bảo hành 12 tháng.</p>', 'product-image/dummy-df302ce6-76f1-4999-a673-5791f1c4fe2a.jpg', 2180000.00, 2000000.00, 87, 'san-pham-siuuuu-8-4rkHw', 1, '2026-04-14 12:16:19', '2026-04-15 01:05:55', 8, NULL),
(52, 'SKU-SIUUUU-0049', 5, 5, 'Sản phẩm siuuuu 9', 'Đầy là mô tả cho sản phẩm Sản phẩm siuuuu 9. Hàng chính hãng, chất lượng cao, bảo hành 12 tháng.', 'product-image/dummy-ad3427bd-2faa-48b8-9f14-e76cf7807ec5.jpg', 4270000.00, NULL, 44, 'san-pham-siuuuu-9-T3SUM', 1, '2026-04-14 12:16:21', '2026-04-14 12:16:21', NULL, NULL),
(53, 'SKU-SIUUUU-0050', 5, 4, 'Sản phẩm siuuuu 10', 'Đầy là mô tả cho sản phẩm Sản phẩm siuuuu 10. Hàng chính hãng, chất lượng cao, bảo hành 12 tháng.', 'product-image/dummy-9adc9fbd-da0d-4890-9b63-ae946eb83ce4.jpg', 1690000.00, NULL, 72, 'san-pham-siuuuu-10-IvdUE', 1, '2026-04-14 12:16:22', '2026-04-14 12:16:22', NULL, NULL),
(55, 'PVN2987', 2, 8, 'Bàn phím từ tính Gaming ATK RS7 Air Esports Hall Effect Keyboard - Switch Iceblade', '<p><strong>Đột phá công nghệ với Rapid Trigger siêu nhạy</strong></p><p>ATK RS7 Air không chỉ là một chiếc bàn phím cơ thông thường; nó là vũ khí tối thượng cho game thủ FPS. Nhờ công nghệ Rapid Trigger (RT), phím sẽ nhận lệnh hoặc ngắt lệnh ngay lập tức khi bạn thay đổi hành trình nhấn (dù chỉ 0.1mm). Điều này giúp các pha \"Counter-Strafing\" trở nên hoàn hảo, giúp bạn dừng lại và bắn chính xác nhanh hơn đối thủ.</p><p><img src=\"https://bizweb.dktcdn.net/100/443/218/files/imgi_51_image_-_2025-11-11t123827.255_5d744e5e882345b39a184a392476716f.png?v=1773479285806\" width=\"750\" height=\"750\"></p><p><strong>Tùy chỉnh hành trình phím linh hoạt</strong></p><p>Với phần mềm ATK HUB, bạn có thể tự do tùy chỉnh điểm nhận lệnh (Actuation Point) từ 0.1mm đến 4.0mm cho từng phím riêng biệt. Cho dù bạn muốn phím siêu nhạy để chơi game hay hành trình dài để gõ văn bản tránh nhầm lẫn, ATK RS7 Air đều đáp ứng hoàn hảo.</p><p><img src=\"https://bizweb.dktcdn.net/100/443/218/files/imgi_52_image_-_2025-11-11t123825.141_319cbbefff744b57a4cbbb7a665c619f.png?v=1773479287117\" width=\"750\" height=\"750\"></p><p><strong>Tốc độ 8000Hz - Phản xạ nhanh như chớp</strong></p><p>Trang bị vi xử lý cao cấp hỗ trợ Polling Rate lên đến 8000Hz, tốc độ truyền tín hiệu từ bàn phím đến máy tính nhanh gấp 8 lần các bàn phím 1000Hz thông thường. Mọi thao tác của bạn đều được thực thi ngay lập tức, loại bỏ hoàn toàn hiện tượng lag hay đè phím.</p><p><strong>Chất lượng build cao cấp và Cảm giác gõ êm ái</strong></p><p>ATK RS7 Air sở hữu bộ Keycap PBT chất lượng cao, bề mặt nhám nhẹ chống bám vân tay. Bên trong phím được trang bị các lớp đệm tiêu âm giúp âm thanh khi gõ chắc chắn, triệt tiêu các tiếng vang khó chịu, mang lại trải nghiệm gõ phím \"thocky\" cực kỳ sướng tay.</p><p><img src=\"https://bizweb.dktcdn.net/100/443/218/files/imgi_54_image_-_2026-02-03t130513.473_7ca0d46596cf450ab7aa57308afa31c7.png?v=1773479288687\" width=\"750\" height=\"750\"></p>', 'product-thumbnail/tZSVwbDdNNqvbL9fRYReU6NgxHrn8solzONlJIkW.png', 2480000.00, NULL, 12, 'ban-phim-tu-tinh-gaming-atk-rs7-air-esports-hall-effect-keyboard-switch-iceblade', 1, '2026-04-15 00:21:39', '2026-04-18 10:51:34', 0, '{\"mau-sac\":\"Tr\\u1eafng, H\\u1ed3ng, \\u0110en\",\"layout\":\"75% (82 ph\\u00edm)\",\"keycap\":\"PBT Double-shot (\\u0110\\u1ed9 b\\u1ec1n cao, ch\\u1ed1ng b\\u00f3ng)\",\"loai-ket-noi\":\"Wired USB-C (T\\u1ed1i \\u01b0u t\\u1ed1c \\u0111\\u1ed9)\",\"tan-so-phan-hoi\":\"8000Hz (Polling Rate)\",\"switch\":\"ATK Magnetic Switch (H\\u1ed7 tr\\u1ee3 thay th\\u1ebf nhanh)\",\"bao-hanh\":\"24 th\\u00e1ng\"}'),
(57, 'LG-GPXS2', 1, 2, 'Logitech G Pro X Superlight 2', '<p>Logitech G PRO X SUPERLIGHT 2 là chuột gaming không dây nhẹ nhất thế giới cho esports. Cảm biến HERO 2 32K, LIGHTSPEED wireless và trọng lượng chỉ 60g.</p><p>Cảm biến HERO 2 Sensor 32K DPI</p><p>LIGHTSPEED Wireless</p><p>Pin 95 giờ</p><p>5 nút có thể lập trình</p>', 'product-thumbnail/VAxJZHFAA6yqRxeZJjfZIGdcp3aioK6nohsbtvef.webp', 3590000.00, 2990000.00, 40, 'logitech-g-pro-x-superlight-2', 1, '2026-04-18 11:46:04', '2026-04-18 22:09:46', 17, '{\"mau-sac\":\"\\u0110en\",\"loai-ket-noi\":\"LIGHTSPEED Wireless\",\"so-nut\":\"5 n\\u00fat\",\"dpi\":\"32000 DPI\",\"pin\":\"95 gi\\u1edd\",\"trong-luong\":\"60g\",\"bao-hanh\":\"24 th\\u00e1ng\"}'),
(60, 'LG-GPX60', 2, 2, 'Logitech G Pro X 60 Lightspeed', '<p>Logitech G PRO X 60 LIGHTSPEED là bàn phím cơ compact 60% không dây, thiết kế cho esports với GX Optical Switch, LIGHTSYNC RGB per-key và construction kim loại chắc chắn.</p>', 'product-thumbnail/BHX2DrOViOdVRPD3hPFW2wtbuBk5e8La5YPGPOhy.webp', 4490000.00, 3990000.00, 25, 'logitech-g-pro-x-60-lightspeed', 1, '2026-04-18 11:46:08', '2026-04-18 22:26:04', 11, '{\"mau-sac\":\"\\u0110en\",\"loai-ket-noi\":\"LIGHTSPEED Wireless \\/ Bluetooth \\/ USB-C\",\"switch\":\"GX Optical\",\"layout\":\"60%\",\"keycap\":\"Double-shot PBT\",\"pin\":\"65 gi\\u1edd\",\"bao-hanh\":\"24 th\\u00e1ng\"}'),
(64, 'AS-CETRA-TWP', 3, 4, 'ASUS ROG Cetra True Wireless Pro', '<p>ASUS ROG Cetra True Wireless Pro là tai nghe true wireless gaming với ANC, driver 10mm, kết nối 2.4GHz + Bluetooth, độ trễ siêu thấp cho mobile gaming.</p>', 'product-thumbnail/Jip1BL7xIJCSQwRlmATjzJoZJsV3DOk99TlcXLjf.webp', 3290000.00, 2790000.00, 30, 'asus-rog-cetra-true-wireless-pro', 1, '2026-04-18 11:46:23', '2026-04-18 22:42:12', 15, '{\"mau-sac\":\"\\u0110en\",\"loai-ket-noi\":\"2.4GHz \\/ Bluetooth 5.3\",\"driver\":\"10mm Custom\",\"tan-so-dap-ung\":\"20Hz - 20kHz\",\"microphone\":\"AI Noise Canceling x3 mic\",\"pin\":\"5.5h (case 27h)\",\"trong-luong\":\"7g m\\u1ed7i b\\u00ean\",\"bao-hanh\":\"12 th\\u00e1ng\"}'),
(66, 'AS-VG249Q1A', 7, 4, 'ASUS VG249Q1A', '<p>ASUS VG249Q1A là màn hình gaming 23.8 inch Full HD IPS 165Hz 1ms với FreeSync Premium, Shadow Boost và Eye Care technology. Lựa chọn tuyệt vời cho gaming phổ thông.</p><p>23.8\" FHD IPS 165Hz</p><p>1ms MPRT</p><p>FreeSync Premium</p><p>HDR10</p>', 'product-thumbnail/RXsbU9F4JfRvEKyObWOeUjEGeJptVYayt8RcMioL.jpg', 4290000.00, 3790000.00, 25, 'asus-vg249q1a', 1, '2026-04-18 11:46:25', '2026-04-18 23:01:42', 12, '{\"mau-sac\":\"\\u0110en\",\"kich-thuoc\":\"23.8 inch\",\"loai-ket-noi\":\"HDMI x2, DisplayPort x1\",\"tan-so-phan-hoi\":\"165Hz\",\"bao-hanh\":\"36 th\\u00e1ng\"}'),
(67, 'RZ-DA-V3', 1, 1, 'Razer DeathAdder V3', '<p>Razer DeathAdder V3 là chuột gaming ergonomic hàng đầu với cảm biến Focus Pro 30K, trọng lượng siêu nhẹ 59g và thiết kế tinh chỉnh cho grip thoải mái nhất. Được các game thủ esports chuyên nghiệp tin dùng.</p><p>Cảm biến Razer Focus Pro 30K</p><p>Công nghệ HyperPolling 8000Hz</p><p>Switch quang học thế hệ 3</p><p>Trọng lượng chỉ 59g</p>', 'product-thumbnail/chYpdH9mfUw1guFMeHnqU2Ee7NQFzp0Zl4670yMI.webp', 1990000.00, 1690000.00, 50, 'razer-deathadder-v3', 1, '2026-04-18 11:49:01', '2026-04-18 22:08:38', 15, '{\"mau-sac\":\"\\u0110en\",\"loai-ket-noi\":\"C\\u00f3 d\\u00e2y USB\",\"so-nut\":\"5 n\\u00fat\",\"dpi\":\"30000 DPI\",\"trong-luong\":\"59g\",\"bao-hanh\":\"24 th\\u00e1ng\"}'),
(68, 'RZ-VV3-PRO', 1, 1, 'Razer Viper V3 Pro', '<p>Razer Viper V3 Pro là chuột gaming không dây cao cấp nhất của Razer. Với trọng lượng chỉ 54g, cảm biến Focus Pro 35K và kết nối HyperSpeed Wireless, đây là chuột esports đỉnh cao.</p><p>Cảm biến Focus Pro 35K</p><p>HyperSpeed Wireless</p><p>Pin 95 giờ</p><p>Trọng lượng 54g</p>', 'product-thumbnail/yFeru1RPSOs2EjZXPvfSeJ7UIDNRdV4iWVg9PwiN.webp', 3990000.00, 3490000.00, 30, 'razer-viper-v3-pro', 1, '2026-04-18 11:49:02', '2026-04-18 22:07:26', 13, '{\"mau-sac\":\"\\u0110en, Tr\\u1eafng\",\"loai-ket-noi\":\"Wireless 2.4GHz \\/ USB\",\"so-nut\":\"5 n\\u00fat\",\"dpi\":\"35000 DPI\",\"pin\":\"95 gi\\u1edd\",\"trong-luong\":\"54g\",\"bao-hanh\":\"24 th\\u00e1ng\"}'),
(69, 'RZ-BV3', 1, 1, 'Razer Basilisk V3', '<p>Razer Basilisk V3 sở hữu con lăn HyperScroll Tilt thông minh, cảm biến Focus Pro 26K và 11 nút lập trình. Thiết kế ergonomic tối ưu cho FPS và MMO.</p><p>HyperScroll Tilt Wheel</p><p>11 nút có thể lập trình</p><p>Razer Chroma RGB</p>', 'product-thumbnail/VZ8x4g0kFV0IREOFiXQqgox5eJluxPBizAvfKIyh.webp', 2290000.00, 1890000.00, 40, 'razer-basilisk-v3', 1, '2026-04-18 11:49:03', '2026-04-18 22:05:43', 17, '{\"mau-sac\":\"\\u0110en\",\"loai-ket-noi\":\"C\\u00f3 d\\u00e2y USB\",\"so-nut\":\"11 n\\u00fat\",\"dpi\":\"35000 DPI\",\"trong-luong\":\"101g\",\"bao-hanh\":\"24 th\\u00e1ng\"}'),
(72, 'RZ-BSV2-PRO', 3, 1, 'Razer BlackShark V2 Pro', '<p>Razer BlackShark V2 Pro (2023) là tai nghe gaming không dây cao cấp với driver Razer TriForce Titanium 50mm, micro HyperClear Super Wideband và kết nối HyperSpeed Wireless.</p><p>Driver TriForce Titanium 50mm</p><p>THX Spatial Audio</p><p>Pin 70 giờ</p><p>Micro detachable HyperClear</p>', 'product-thumbnail/QTdyt83wftjjjLlrM5OTR9d2qfg4lPbeWkA1pdUw.webp', 4490000.00, 3790000.00, 35, 'razer-blackshark-v2-pro', 1, '2026-04-18 11:49:05', '2026-04-18 22:41:15', 16, '{\"mau-sac\":\"\\u0110en\",\"loai-ket-noi\":\"Wireless 2.4GHz \\/ USB-C\",\"driver\":\"TriForce Titanium 50mm\",\"tan-so-dap-ung\":\"12Hz - 28kHz\",\"tro-khang\":\"32\\u03a9\",\"microphone\":\"HyperClear Super Wideband\",\"pin\":\"70 gi\\u1edd\",\"trong-luong\":\"320g\",\"bao-hanh\":\"24 th\\u00e1ng\"}'),
(73, 'RZ-KV4', 3, 1, 'Razer Kraken V4', '<p>Razer Kraken V4 với driver Razer TriForce 40mm, Razer Chroma RGB, micro retractable và đệm tai gel mát lạnh cho gaming session dài.</p>', 'product-thumbnail/EDh5VXbxDP8KlmwR4O6iHSkNmivf9m7nmW8XOgtH.webp', 3490000.00, 2990000.00, 40, 'razer-kraken-v4', 1, '2026-04-18 11:49:05', '2026-04-18 22:43:15', 14, '{\"mau-sac\":\"\\u0110en\",\"loai-ket-noi\":\"USB \\/ Wireless 2.4GHz\",\"driver\":\"TriForce 40mm\",\"tan-so-dap-ung\":\"20Hz - 20kHz\",\"tro-khang\":\"32\\u03a9\",\"microphone\":\"Retractable\",\"pin\":\"60 gi\\u1edd\",\"trong-luong\":\"325g\",\"bao-hanh\":\"24 th\\u00e1ng\"}'),
(75, 'RZ-COBRA-PRO', 1, 1, 'Razer Cobra Pro', '<p>Razer Cobra Pro là chuột gaming không dây đối xứng với Razer Chroma RGB 360°, cảm biến Focus Pro 30K và kết nối 3 chế độ (HyperSpeed / Bluetooth / USB).</p>', 'product-thumbnail/M10YrNMDzUfhz9XBWGhZbZfrnJMilD1gM1uFy0lC.webp', 2490000.00, 2190000.00, 35, 'razer-cobra-pro', 1, '2026-04-18 11:49:07', '2026-04-18 22:02:04', 12, '{\"mau-sac\":\"\\u0110en\",\"loai-ket-noi\":\"Wireless 2.4GHz \\/ Bluetooth \\/ USB\",\"so-nut\":\"6 n\\u00fat\",\"dpi\":\"30000 DPI\",\"pin\":\"100 gi\\u1edd\",\"trong-luong\":\"77g\",\"bao-hanh\":\"24 th\\u00e1ng\"}'),
(76, 'RZ-BARX', 3, 1, 'Razer Barracuda X', '<p>Razer Barracuda X là tai nghe gaming đa nền tảng (PC, PS5, Switch, Mobile) với kết nối không dây 2.4GHz + Bluetooth. Thiết kế nhẹ nhàng, đeo thoải mái cả ngày.</p>', 'product-thumbnail/poVFvkndxkTR9E2iUBdoxzZbQ6zUFdKf3rUAs40N.webp', 1790000.00, 1490000.00, 45, 'razer-barracuda-x', 1, '2026-04-18 11:49:07', '2026-04-18 22:40:30', 17, '{\"mau-sac\":\"\\u0110en\",\"loai-ket-noi\":\"Wireless 2.4GHz \\/ Bluetooth\",\"driver\":\"40mm\",\"tan-so-dap-ung\":\"20Hz - 20kHz\",\"tro-khang\":\"32\\u03a9\",\"microphone\":\"T\\u00edch h\\u1ee3p Beamforming\",\"pin\":\"50 gi\\u1edd\",\"trong-luong\":\"260g\",\"bao-hanh\":\"12 th\\u00e1ng\"}'),
(77, 'LG-G502XP', 1, 2, 'Logitech G502 X Plus', '<p>Logitech G502 X PLUS kế thừa huyền thoại G502 với cảm biến HERO 25K, switch LIGHTFORCE hybrid, LIGHTSYNC RGB và thiết kế ergonomic kinh điển.</p>', 'product-thumbnail/uL26Hrz6DvzP5f24RMfRai8MAagQsv6W8N2oq0qw.webp', 3890000.00, 3290000.00, 35, 'logitech-g502-x-plus', 1, '2026-04-18 11:49:08', '2026-04-18 22:03:16', 15, '{\"mau-sac\":\"\\u0110en\",\"loai-ket-noi\":\"LIGHTSPEED Wireless\",\"so-nut\":\"13 n\\u00fat\",\"dpi\":\"25600 DPI\",\"pin\":\"130 gi\\u1edd\",\"trong-luong\":\"106g\",\"bao-hanh\":\"24 th\\u00e1ng\"}'),
(78, 'LG-GPX2-HS', 3, 2, 'Logitech G Pro X 2 Lightspeed', '<p>Logitech G PRO X 2 LIGHTSPEED là tai nghe gaming không dây cao cấp với driver graphene 50mm, DTS Headphone:X 2.0, micro Blue VO!CE và PRO-G cushion êm ái.</p>', 'product-thumbnail/Hy2kxzINBf5wdgRKy6G7fpiR0Vk16n0TiSKESMAd.webp', 5490000.00, 4690000.00, 20, 'logitech-g-pro-x-2-lightspeed', 1, '2026-04-18 11:49:08', '2026-04-18 22:39:25', 15, '{\"mau-sac\":\"\\u0110en\",\"loai-ket-noi\":\"LIGHTSPEED Wireless \\/ Bluetooth \\/ 3.5mm\",\"driver\":\"Graphene 50mm\",\"tan-so-dap-ung\":\"20Hz - 20kHz\",\"tro-khang\":\"38\\u03a9\",\"microphone\":\"Blue VO!CE Detachable\",\"pin\":\"50 gi\\u1edd\",\"trong-luong\":\"309g\",\"bao-hanh\":\"24 th\\u00e1ng\"}'),
(79, 'LG-G435', 3, 2, 'Logitech G435', '<p>Logitech G435 LIGHTSPEED là tai nghe gaming không dây nhẹ nhàng (165g), phù hợp cho gaming lẫn di động. Hỗ trợ Bluetooth + LIGHTSPEED, micro dual beamforming tích hợp.</p>', 'product-thumbnail/ue1jQw2zMWu2Nq5VRjnucyfvc7DlUGEugE3rAt2e.webp', 1690000.00, 1290000.00, 50, 'logitech-g435', 1, '2026-04-18 11:49:08', '2026-04-18 22:44:01', 24, '{\"mau-sac\":\"\\u0110en \\/ V\\u00e0ng neon\",\"loai-ket-noi\":\"LIGHTSPEED Wireless \\/ Bluetooth\",\"driver\":\"40mm\",\"tan-so-dap-ung\":\"20Hz - 20kHz\",\"tro-khang\":\"45\\u03a9\",\"microphone\":\"Dual Beamforming t\\u00edch h\\u1ee3p\",\"pin\":\"18 gi\\u1edd\",\"trong-luong\":\"165g\",\"bao-hanh\":\"24 th\\u00e1ng\"}'),
(83, 'CR-K70PRO', 2, 3, 'Corsair K70 RGB Pro', '<p>Corsair K70 RGB PRO là bàn phím cơ full-size huyền thoại với Cherry MX Switch, polling rate 8000Hz, khung nhôm, PBT double-shot keycap và iCUE RGB per-key.</p>', 'product-thumbnail/SdvW0BMmQmihTdYui0rvYMgOKBrNOL5sS56Y3lTr.webp', 3990000.00, 3490000.00, 25, 'corsair-k70-rgb-pro', 1, '2026-04-18 11:49:11', '2026-04-18 22:19:04', 13, '{\"mau-sac\":\"\\u0110en\",\"loai-ket-noi\":\"C\\u00f3 d\\u00e2y USB passthrough\",\"switch\":\"Cherry MX Red\",\"layout\":\"Full-size\",\"keycap\":\"PBT Double-shot\",\"bao-hanh\":\"24 th\\u00e1ng\"}'),
(86, 'CR-VIRTXT', 3, 3, 'Corsair Virtuoso RGB Wireless XT', '<p>Corsair Virtuoso RGB Wireless XT là tai nghe gaming hi-fi cao cấp nhất với driver 50mm, Dolby Atmos, kết nối SLIPSTREAM/Bluetooth aptX HD, vỏ nhôm CNC và micro broadcast-grade.</p>', 'product-thumbnail/1p3vZuwbsyNP4LfTRwIR2723hqES1w4mxoPQPYlh.jpg', 6490000.00, 5490000.00, 15, 'corsair-virtuoso-rgb-wireless-xt', 1, '2026-04-18 11:49:13', '2026-04-18 22:36:38', 15, '{\"mau-sac\":\"\\u0110en\",\"loai-ket-noi\":\"SLIPSTREAM \\/ Bluetooth aptX HD \\/ USB \\/ 3.5mm\",\"driver\":\"50mm Neodymium\",\"tan-so-dap-ung\":\"20Hz - 40kHz\",\"tro-khang\":\"32\\u03a9\",\"microphone\":\"Broadcast-grade Detachable\",\"pin\":\"15 gi\\u1edd\",\"trong-luong\":\"360g\",\"bao-hanh\":\"24 th\\u00e1ng\"}');
INSERT INTO `products` (`id`, `sku`, `category_id`, `brand_id`, `name`, `description`, `thumbnail`, `price`, `sale_price`, `stock_quantity`, `slug`, `status`, `created_at`, `updated_at`, `discount_percent`, `attributes`) VALUES
(89, 'CR-M65UW', 1, 3, 'Corsair M65 RGB Ultra Wireless', '<p>Corsair M65 RGB Ultra Wireless là chuột gaming FPS với nút sniper chuyên dụng, cảm biến MARKSMAN 26K, khung nhôm cứng cáp và hệ thống cân bằng trọng lượng.</p>', 'product-thumbnail/8rF76xH8hqe9gp77sWfva1uzZAZ4m9tLycqCguJn.webp', 2890000.00, 2490000.00, 30, 'corsair-m65-rgb-ultra-wireless', 1, '2026-04-18 11:49:14', '2026-04-18 21:59:32', 14, '{\"mau-sac\":\"\\u0110en\",\"loai-ket-noi\":\"SLIPSTREAM Wireless \\/ Bluetooth \\/ USB\",\"so-nut\":\"8 n\\u00fat + Sniper\",\"dpi\":\"26000 DPI\",\"pin\":\"120 gi\\u1edd\",\"trong-luong\":\"110g\",\"bao-hanh\":\"24 th\\u00e1ng\"}'),
(90, 'CR-HS55WC', 3, 3, 'Corsair HS55 Wireless Core', '<p>Corsair HS55 Wireless Core là tai nghe gaming không dây giá tốt với driver 50mm, Bluetooth, micro flip-to-mute và đệm tai memory foam thoải mái.</p>', 'product-thumbnail/h09l7Me906KFy5G3Hxh68eKThvjvDG5noRWBTjnD.webp', 1490000.00, 1190000.00, 50, 'corsair-hs55-wireless-core', 1, '2026-04-18 11:49:14', '2026-04-18 22:35:17', 20, '{\"mau-sac\":\"\\u0110en\",\"loai-ket-noi\":\"Bluetooth \\/ 3.5mm\",\"driver\":\"50mm Custom\",\"tan-so-dap-ung\":\"20Hz - 20kHz\",\"tro-khang\":\"32\\u03a9\",\"microphone\":\"Flip-to-mute\",\"pin\":\"28 gi\\u1edd\",\"trong-luong\":\"273g\",\"bao-hanh\":\"24 th\\u00e1ng\"}'),
(91, 'AS-HARPE-ACE', 1, 4, 'ASUS ROG Harpe Ace Aim Lab Edition', '<p>ASUS ROG Harpe Ace là chuột gaming không dây esports hợp tác với Aim Lab. Cảm biến ROG AimPoint 36K, trọng lượng 54g, ROG SpeedNova wireless và push-fit switch hot-swap.</p>', 'product-thumbnail/bPsYfDCPNDddOkT8plDXTEMgzmgrVzEAq4oFr7pG.jpg', 3490000.00, 2990000.00, 25, 'asus-rog-harpe-ace-aim-lab-edition', 1, '2026-04-18 11:49:15', '2026-04-18 21:58:53', 14, '{\"mau-sac\":\"Tr\\u1eafng\",\"loai-ket-noi\":\"ROG SpeedNova \\/ Bluetooth \\/ USB-C\",\"so-nut\":\"5 n\\u00fat\",\"dpi\":\"36000 DPI\",\"pin\":\"90 gi\\u1edd\",\"trong-luong\":\"54g\",\"bao-hanh\":\"24 th\\u00e1ng\"}'),
(94, 'AS-DELTASWL', 3, 4, 'ASUS ROG Delta S Wireless', '<p>ASUS ROG Delta S Wireless là tai nghe gaming không dây với driver ASUS Essence 50mm, AI Noise Canceling Microphone, Hi-Res Audio wireless và Aura Sync RGB.</p>', 'product-thumbnail/COH0jXxnIig5Q9i42cASf5TyVuWcMnjNMynlWMUZ.png', 4990000.00, 4290000.00, 20, 'asus-rog-delta-s-wireless', 1, '2026-04-18 11:49:16', '2026-04-18 22:38:55', 14, '{\"mau-sac\":\"\\u0110en\",\"loai-ket-noi\":\"2.4GHz \\/ Bluetooth \\/ USB-C \\/ 3.5mm\",\"driver\":\"ASUS Essence 50mm\",\"tan-so-dap-ung\":\"20Hz - 40kHz\",\"tro-khang\":\"32\\u03a9\",\"microphone\":\"AI Noise Canceling Beamforming\",\"pin\":\"25 gi\\u1edd\",\"trong-luong\":\"310g\",\"bao-hanh\":\"24 th\\u00e1ng\"}'),
(95, 'AS-KERIS2ACE', 1, 4, 'ASUS ROG Keris II Ace', '<p>ASUS ROG Keris II Ace là chuột gaming không dây siêu nhẹ 54g với cảm biến AimPoint Pro 42K, ROG SpeedNova wireless, push-fit switch socket và ROG Micro Switch.</p>', 'product-thumbnail/gq6BDUcgdFPjDFVhhPOZbm79OGIIMgdSKa2BsAsp.webp', 2390000.00, 1990000.00, 35, 'asus-rog-keris-ii-ace', 1, '2026-04-18 11:49:16', '2026-04-18 21:57:31', 17, '{\"mau-sac\":\"\\u0110en\",\"loai-ket-noi\":\"ROG SpeedNova \\/ Bluetooth \\/ USB-C\",\"so-nut\":\"5 n\\u00fat\",\"dpi\":\"42000 DPI\",\"pin\":\"107 gi\\u1edd\",\"trong-luong\":\"54g\",\"bao-hanh\":\"24 th\\u00e1ng\"}'),
(96, 'AS-PG27AQN', 7, 4, 'ASUS ROG Swift PG27AQN', '<p>ASUS ROG Swift PG27AQN là màn hình gaming 27 inch QHD IPS 360Hz - nhanh nhất phân khúc QHD. NVIDIA G-SYNC, Reflex Analyzer, HDR600 cho esports đỉnh cao.</p><p>27\" QHD IPS 360Hz</p><p>NVIDIA G-SYNC</p><p>1ms GTG</p><p>HDR600</p>', 'product-thumbnail/wbbMKbOyW4ig6nTYFcKtJ46IQ6KmXrrcmKMBfK3M.webp', 21990000.00, 19990000.00, 10, 'asus-rog-swift-pg27aqn', 1, '2026-04-18 11:49:16', '2026-04-18 23:00:09', 9, '{\"mau-sac\":\"\\u0110en\",\"kich-thuoc\":\"27 inch\",\"loai-ket-noi\":\"HDMI 2.0 x2, DisplayPort 1.4 x1, USB Hub\",\"tan-so-phan-hoi\":\"360Hz\",\"bao-hanh\":\"36 th\\u00e1ng\"}'),
(100, 'AC-XV272UV3', 7, 5, 'Acer Nitro XV272U V3', '<p>Acer Nitro XV272U V3 là màn hình gaming 27 inch WQHD IPS 180Hz với AMD FreeSync Premium, HDR400, 95% DCI-P3. Thiết kế viền mỏng và đế chỉnh được đa hướng.</p>', 'product-thumbnail/9wZQ5id6bXTB2XrhiwzCPBKzzowsntNIHVy9cW3q.jpg', 6990000.00, 5990000.00, 20, 'acer-nitro-xv272u-v3', 1, '2026-04-18 11:49:16', '2026-04-18 23:00:47', 14, '{\"mau-sac\":\"\\u0110en\",\"kich-thuoc\":\"27 inch\",\"loai-ket-noi\":\"HDMI 2.0 x2, DisplayPort 1.4 x1\",\"tan-so-phan-hoi\":\"180Hz\",\"bao-hanh\":\"36 th\\u00e1ng\"}'),
(101, 'AC-X27UF3', 7, 5, 'Acer Predator X27U F3', '<p>Acer Predator X27U F3 là màn hình gaming OLED 27 inch QHD 480Hz - tốc độ làm tươi cao nhất cho OLED. 0.01ms GtG, 99% DCI-P3, NVIDIA G-SYNC compatible.</p>', 'product-thumbnail/n36lk0298mW2LC90T2vGlvVrT4c5lmF72eAniWcH.webp', 19990000.00, 17990000.00, 8, 'acer-predator-x27u-f3', 1, '2026-04-18 11:49:17', '2026-04-18 22:59:14', 10, '{\"mau-sac\":\"\\u0110en\",\"kich-thuoc\":\"27 inch OLED\",\"loai-ket-noi\":\"HDMI 2.1 x2, DisplayPort 1.4 x1, USB-C\",\"tan-so-phan-hoi\":\"480Hz\",\"bao-hanh\":\"36 th\\u00e1ng\"}'),
(105, 'AC-XV240YM3', 7, 5, 'Acer Nitro XV240Y M3', '<p>Acer Nitro XV240Y M3 là màn hình gaming 23.8 inch Full HD IPS 180Hz giá tốt. AMD FreeSync, 1ms VRB, HDR10 và thiết kế viền mỏng 3 cạnh thẩm mỹ.</p>', 'product-thumbnail/LDsKDjr6xm46wFDrTKEQIZ6ZItxIfn3FNmXdVPkT.webp', 3990000.00, 3490000.00, 30, 'acer-nitro-xv240y-m3', 1, '2026-04-18 11:49:17', '2026-04-18 22:59:42', 13, '{\"mau-sac\":\"\\u0110en\",\"kich-thuoc\":\"23.8 inch\",\"loai-ket-noi\":\"HDMI 2.0 x1, DisplayPort 1.2 x1\",\"tan-so-phan-hoi\":\"180Hz\",\"bao-hanh\":\"36 th\\u00e1ng\"}'),
(106, 'AC-PC350W', 1, 5, 'Acer Predator Cestus 350 Wireless', '<p>Acer Predator Cestus 350 Wireless là chuột gaming không dây với cảm biến PixArt 3335 16K DPI, kết nối 2.4GHz + USB, pin sạc và Predator Sense lighting.</p>', 'product-thumbnail/luJcfkHdBRugx3ubuf85faFWDZ1NP5oydsa3BSzf.webp', 2690000.00, 2190000.00, 25, 'acer-predator-cestus-350-wireless', 1, '2026-04-18 11:49:17', '2026-04-18 21:56:48', 19, '{\"mau-sac\":\"\\u0110en\",\"loai-ket-noi\":\"Wireless 2.4GHz \\/ USB\",\"so-nut\":\"8 n\\u00fat\",\"dpi\":\"16000 DPI\",\"pin\":\"60 gi\\u1edd\",\"trong-luong\":\"114g\",\"bao-hanh\":\"24 th\\u00e1ng\"}'),
(107, 'GB-AM6', 1, 6, 'Gigabyte AORUS M6', '<p>Gigabyte AORUS M6 là chuột gaming không dây siêu nhẹ 58g với cảm biến PixArt PAW3395 26K DPI, kết nối tri-mode, bề mặt PTFE feet và switch Omron 80M.</p>', 'product-thumbnail/NPf0L4VVjRYyJ1Z4a2t6xQ7tLFZskRmHgHQolbEz.webp', 1890000.00, 1590000.00, 35, 'gigabyte-aorus-m6', 1, '2026-04-18 11:49:17', '2026-04-18 21:56:19', 16, '{\"mau-sac\":\"\\u0110en\",\"loai-ket-noi\":\"Wireless 2.4GHz \\/ Bluetooth \\/ USB-C\",\"so-nut\":\"6 n\\u00fat\",\"dpi\":\"26000 DPI\",\"pin\":\"119 gi\\u1edd\",\"trong-luong\":\"58g\",\"bao-hanh\":\"24 th\\u00e1ng\"}'),
(109, 'GB-AH1', 3, 6, 'Gigabyte AORUS H1', '<p>Gigabyte AORUS H1 là tai nghe gaming với driver 50mm ENC, DAC/AMP USB tích hợp, 7.1 Virtual Surround Sound và micro detachable chất lượng cao.</p>', 'product-thumbnail/4kiCX1r5qKpOuj5ZZydAsq5gutOkkqoWd3kvgRhn.png', 3290000.00, 2790000.00, 20, 'gigabyte-aorus-h1', 1, '2026-04-18 11:49:17', '2026-04-18 22:35:48', 15, '{\"mau-sac\":\"\\u0110en\",\"loai-ket-noi\":\"USB DAC\",\"driver\":\"50mm ENC\",\"tan-so-dap-ung\":\"20Hz - 20kHz\",\"tro-khang\":\"32\\u03a9\",\"microphone\":\"Detachable Cardioid\",\"trong-luong\":\"352g\",\"bao-hanh\":\"24 th\\u00e1ng\"}'),
(111, 'GB-G24F2', 7, 6, 'Gigabyte G24F 2', '<p>Gigabyte G24F 2 là màn hình gaming 23.8 inch Full HD SS IPS 180Hz giá tốt nhất phân khúc. 1ms, FreeSync Premium, 110% sRGB và thiết kế 3-sided borderless.</p>', 'product-thumbnail/t9c8zRDIdNqQWhLNLiYPi08IoYq6RK0T8p7iPPEm.webp', 3790000.00, 3290000.00, 40, 'gigabyte-g24f-2', 1, '2026-04-18 11:49:18', '2026-04-18 22:58:04', 13, '{\"mau-sac\":\"\\u0110en\",\"kich-thuoc\":\"23.8 inch\",\"loai-ket-noi\":\"HDMI 2.0 x2, DisplayPort 1.2 x1\",\"tan-so-phan-hoi\":\"180Hz\",\"bao-hanh\":\"36 th\\u00e1ng\"}'),
(113, 'GB-FK83', 2, 6, 'Gigabyte FORCE K83', '<p>Gigabyte FORCE K83 là bàn phím cơ full-size giá tốt với Cherry MX Red/Blue switch, N-key rollover, backlit Red LED và thiết kế bền bỉ cho sử dụng hàng ngày.</p>', 'product-thumbnail/xRNxG4U6MS7Hi4EuVmzSb8NHD4WYtIFA8T99G3Bg.jpg', 1290000.00, 990000.00, 40, 'gigabyte-force-k83', 1, '2026-04-18 11:49:18', '2026-04-18 22:21:08', 23, '{\"mau-sac\":\"\\u0110en\",\"loai-ket-noi\":\"C\\u00f3 d\\u00e2y USB\",\"switch\":\"Cherry MX Red\",\"layout\":\"Full-size\",\"keycap\":\"ABS\",\"bao-hanh\":\"24 th\\u00e1ng\"}'),
(114, 'GB-AH5', 3, 6, 'Gigabyte AORUS H5', '<p>Gigabyte AORUS H5 là tai nghe gaming với driver Beryllium 50mm chất lượng audiophile, micro unidirectional noise-canceling và đệm tai memory foam bọc protein leather.</p>', 'product-thumbnail/wqdZVzqW7WdYszKm60UlHKMIcpvYXUaODQ7meC2W.webp', 1890000.00, 1490000.00, 30, 'gigabyte-aorus-h5', 1, '2026-04-18 11:49:18', '2026-04-18 22:34:05', 21, '{\"mau-sac\":\"\\u0110en\",\"loai-ket-noi\":\"3.5mm \\/ USB\",\"driver\":\"Beryllium 50mm\",\"tan-so-dap-ung\":\"20Hz - 20kHz\",\"tro-khang\":\"32\\u03a9\",\"microphone\":\"Detachable Unidirectional\",\"trong-luong\":\"390g\",\"bao-hanh\":\"24 th\\u00e1ng\"}'),
(115, 'GB-M32U', 7, 6, 'Gigabyte M32U', '<p>Gigabyte M32U là màn hình gaming 32 inch 4K UHD SS IPS 144Hz với HDMI 2.1 cho PS5/Xbox. KVM Switch tích hợp, 90% DCI-P3, HDR400 và FreeSync Premium Pro.</p>', 'product-thumbnail/8wcQSgT3DpNHoZrYZ4DBwIi9DODk2zmOw0YcNn7G.jpg', 14990000.00, 12990000.00, 12, 'gigabyte-m32u', 1, '2026-04-18 11:49:18', '2026-04-18 22:58:43', 13, '{\"mau-sac\":\"\\u0110en\",\"kich-thuoc\":\"32 inch\",\"loai-ket-noi\":\"HDMI 2.1 x2, DisplayPort 1.4 x1, USB-C\",\"tan-so-phan-hoi\":\"144Hz\",\"bao-hanh\":\"36 th\\u00e1ng\"}'),
(116, 'GB-AM4', 1, 6, 'Gigabyte AORUS M4', '<p>Gigabyte AORUS M4 là chuột gaming có dây với cảm biến PixArt PAW3395 26K DPI, trọng lượng 74g, RGB Fusion 2.0 và PTFE feet cho độ trượt mượt mà.</p>', 'product-thumbnail/8qjd7zQAKlYpnAzBmNRyTri73uwhvmtiiqYJyCAo.webp', 1290000.00, 990000.00, 44, 'gigabyte-aorus-m4', 1, '2026-04-18 11:49:18', '2026-04-19 04:35:57', 23, '{\"mau-sac\":\"\\u0110en\",\"loai-ket-noi\":\"C\\u00f3 d\\u00e2y USB-C\",\"so-nut\":\"6 n\\u00fat\",\"dpi\":\"26000 DPI\",\"trong-luong\":\"74g\",\"bao-hanh\":\"24 th\\u00e1ng\"}'),
(119, 'ATK-F1PRO', 1, 8, 'ATK F1 Pro', '<p>ATK F1 Pro là chuột gaming giá siêu rẻ nhưng hiệu năng cao với cảm biến PAW3311, kết nối tri-mode, trọng lượng 55g và switch Kailh 8.0.</p>', 'product-thumbnail/IdeXr9TSLwDLKlRIiisq46Yo84HbWmJtbnEOvLJy.webp', 590000.00, 490000.00, 100, 'atk-f1-pro', 1, '2026-04-18 11:49:20', '2026-04-18 21:54:12', 17, '{\"mau-sac\":\"\\u0110en\",\"loai-ket-noi\":\"Wireless 2.4GHz \\/ Bluetooth \\/ USB-C\",\"so-nut\":\"6 n\\u00fat\",\"dpi\":\"12400 DPI\",\"pin\":\"80 gi\\u1edd\",\"trong-luong\":\"55g\",\"bao-hanh\":\"12 th\\u00e1ng\"}'),
(120, 'ATK-X1ERGO', 1, 8, 'ATK X1 Ergo', '<p>ATK X1 Ergo là chuột gaming không dây thiết kế ergonomic dạng cong cho người thuận tay phải. PAW3950, 4000Hz polling rate, 52g nhẹ và kiểu dáng dễ cầm grip.</p>', 'product-thumbnail/YCgSoC4fWyDRWsb1j6EbKQf7fu6rj03Rp71phv7W.jpg', 990000.00, 790000.00, 60, 'atk-x1-ergo', 1, '2026-04-18 11:49:22', '2026-04-18 21:51:59', 20, '{\"mau-sac\":\"\\u0110en, Tr\\u1eafng\",\"loai-ket-noi\":\"Wireless 2.4GHz \\/ Bluetooth \\/ USB-C\",\"so-nut\":\"6 n\\u00fat\",\"dpi\":\"26000 DPI\",\"pin\":\"100 gi\\u1edd\",\"trong-luong\":\"52g\",\"tan-so-phan-hoi\":\"4000Hz\",\"bao-hanh\":\"12 th\\u00e1ng\"}'),
(124, 'ATK-F1ULT', 1, 8, 'ATK F1 Ultimate', '<p>ATK F1 Ultimate là chuột gaming tri-mode với cảm biến PAW3395 26K, trọng lượng 49g, switch Kailh 8.0 và polling rate 1000Hz. Giá rẻ hiệu năng cao.</p>', 'product-thumbnail/T1MpfOKfFIT9tx5qsdlDT7tqhUiYZNbHx0xCf4Me.webp', 790000.00, 590000.00, 70, 'atk-f1-ultimate', 1, '2026-04-18 11:49:24', '2026-04-18 21:50:49', 25, '{\"mau-sac\":\"Tr\\u1eafng\",\"loai-ket-noi\":\"Wireless 2.4GHz \\/ Bluetooth \\/ USB-C\",\"so-nut\":\"5 n\\u00fat\",\"dpi\":\"26000 DPI\",\"pin\":\"80 gi\\u1edd\",\"trong-luong\":\"49g\",\"bao-hanh\":\"12 th\\u00e1ng\"}'),
(126, 'ATK-X1MINI', 1, 8, 'ATK X1 Mini', '<p>ATK X1 Mini là chuột gaming siêu nhỏ dành cho tay nhỏ hoặc fingertip grip. Cảm biến PAW3395 26K, trọng lượng chỉ 42g, kết nối tri-mode và pin sạc nhanh.</p>', 'product-thumbnail/Hs7oqXEGeByo0Ftr6Eka4s9gI0k1juEFsMqYWsmY.jpg', 690000.00, 490000.00, 85, 'atk-x1-mini', 1, '2026-04-18 11:49:26', '2026-04-19 04:37:55', 29, '{\"mau-sac\":\"Tr\\u1eafng\",\"loai-ket-noi\":\"Wireless 2.4GHz \\/ Bluetooth \\/ USB-C\",\"so-nut\":\"5 n\\u00fat\",\"dpi\":\"26000 DPI\",\"pin\":\"80 gi\\u1edd\",\"trong-luong\":\"42g\",\"bao-hanh\":\"12 th\\u00e1ng\"}'),
(127, 'HX-PH2W', 1, 9, 'HyperX Pulsefire Haste 2 Wireless', '<p>HyperX Pulsefire Haste 2 Wireless là chuột gaming không dây siêu nhẹ 61g với cảm biến 26K DPI, kết nối tri-mode (2.4GHz/BT/USB), pin 100 giờ và switch 80M click.</p>', 'product-thumbnail/qblpwcXRFllNM9JynhjyMOect0FQA712uqOQZe1g.webp', 1990000.00, 1690000.00, 39, 'hyperx-pulsefire-haste-2-wireless', 1, '2026-04-18 11:49:26', '2026-04-19 03:45:26', 15, '{\"mau-sac\":\"\\u0110en\",\"loai-ket-noi\":\"Wireless 2.4GHz \\/ Bluetooth \\/ USB-C\",\"so-nut\":\"6 n\\u00fat\",\"dpi\":\"26000 DPI\",\"pin\":\"100 gi\\u1edd\",\"trong-luong\":\"61g\",\"bao-hanh\":\"24 th\\u00e1ng\"}'),
(128, 'HX-PH2', 1, 9, 'HyperX Pulsefire Haste 2', '<p>HyperX Pulsefire Haste 2 là chuột gaming có dây nhẹ 53g với cảm biến 26K DPI, switch cơ học 80M click, grip tape kèm theo và PTFE skates mượt mà.</p>', 'product-thumbnail/iPdoCMkDYMRzhOeXJGSba9ADW9vK0Xad7JlaXAFL.jpg', 1290000.00, 990000.00, 50, 'hyperx-pulsefire-haste-2', 1, '2026-04-18 11:49:26', '2026-04-18 21:50:08', 23, '{\"mau-sac\":\"\\u0110en\",\"loai-ket-noi\":\"C\\u00f3 d\\u00e2y USB-C\",\"so-nut\":\"6 n\\u00fat\",\"dpi\":\"26000 DPI\",\"trong-luong\":\"53g\",\"bao-hanh\":\"24 th\\u00e1ng\"}'),
(130, 'HX-AOCORE', 2, 9, 'HyperX Alloy Origins Core', '<p>HyperX Alloy Origins Core TKL là bàn phím cơ TKL với khung nhôm nguyên khối, HyperX mechanical switch, per-key RGB và game mode. Thiết kế chắc chắn cho competitive gaming.</p>', 'product-thumbnail/3FF3KJe9ktqXASyW8mCCaPQwcIFakGz836vTOfdR.jpg', 2290000.00, 1790000.00, 35, 'hyperx-alloy-origins-core', 1, '2026-04-18 11:49:27', '2026-04-18 22:25:13', 22, '{\"mau-sac\":\"\\u0110en\",\"loai-ket-noi\":\"C\\u00f3 d\\u00e2y USB-C th\\u00e1o r\\u1eddi\",\"switch\":\"HyperX Red Linear\",\"layout\":\"TKL (Tenkeyless)\",\"keycap\":\"ABS\",\"bao-hanh\":\"24 th\\u00e1ng\"}'),
(131, 'HX-CL3W', 3, 9, 'HyperX Cloud III Wireless', '<p>HyperX Cloud III Wireless là tai nghe gaming không dây với driver 53mm angled, DTS Headphone:X Spatial Audio, micro detachable noise-canceling và pin 120 giờ siêu trâu.</p>', 'product-thumbnail/pkpbt4nVScQJz2Te1aTY0SP9ZV0GObxZoD91eMLw.webp', 3490000.00, 2990000.00, 30, 'hyperx-cloud-iii-wireless', 1, '2026-04-18 11:49:27', '2026-04-18 22:33:04', 14, '{\"mau-sac\":\"\\u0110en\",\"loai-ket-noi\":\"Wireless 2.4GHz \\/ 3.5mm\",\"driver\":\"53mm Angled\",\"tan-so-dap-ung\":\"10Hz - 21kHz\",\"tro-khang\":\"64\\u03a9\",\"microphone\":\"Detachable Noise-canceling\",\"pin\":\"120 gi\\u1edd\",\"trong-luong\":\"330g\",\"bao-hanh\":\"24 th\\u00e1ng\"}'),
(132, 'HX-CLAW', 3, 9, 'HyperX Cloud Alpha Wireless', '<p>HyperX Cloud Alpha Wireless đạt kỷ lục pin 300 giờ - dài nhất thế giới trong dòng tai nghe gaming. Driver Dual Chamber 50mm, DTS Headphone:X Spatial Audio.</p>', 'product-thumbnail/0NL3m2aP7Q7eJT4T8Mm5Nahw2o2ZCYC3SFkMXKWV.jpg', 4490000.00, 3790000.00, 25, 'hyperx-cloud-alpha-wireless', 1, '2026-04-18 11:49:27', '2026-04-18 22:34:34', 16, '{\"mau-sac\":\"\\u0110en\\/\\u0110\\u1ecf\",\"loai-ket-noi\":\"Wireless 2.4GHz\",\"driver\":\"Dual Chamber 50mm\",\"tan-so-dap-ung\":\"15Hz - 21kHz\",\"tro-khang\":\"62\\u03a9\",\"microphone\":\"Detachable Noise-canceling\",\"pin\":\"300 gi\\u1edd\",\"trong-luong\":\"335g\",\"bao-hanh\":\"24 th\\u00e1ng\"}'),
(134, 'HX-PFDART', 1, 9, 'HyperX Pulsefire Dart', '<p>HyperX Pulsefire Dart là chuột gaming không dây ergonomic với cảm biến PixArt 3389 16K DPI, sạc không dây Qi, Omron switch 50M và grip bọc da leather.</p>', 'product-thumbnail/wMCJtvN4fEmHRGetwv0w3V79CoQHEpYsXCt9ztQE.jpg', 2290000.00, 1790000.00, 30, 'hyperx-pulsefire-dart', 1, '2026-04-18 11:49:28', '2026-04-18 21:45:05', 22, '{\"mau-sac\":\"\\u0110en\",\"loai-ket-noi\":\"Wireless 2.4GHz \\/ USB\",\"so-nut\":\"6 n\\u00fat\",\"dpi\":\"16000 DPI\",\"pin\":\"50 gi\\u1edd\",\"trong-luong\":\"110g\",\"bao-hanh\":\"24 th\\u00e1ng\"}'),
(135, 'HX-AR75W', 2, 9, 'HyperX Alloy Rise 75 Wireless', '<p>HyperX Alloy Rise 75 Wireless là bàn phím cơ 75% không dây hot-swappable với gasket mount, foam dampening, knob kim loại và per-key RGB. Thiết kế mới nhất dòng Alloy.</p>', 'product-thumbnail/v51q7UUwI9b5LOhozyvBqPvZTyQn8eI1yaUgsfdx.webp', 3290000.00, 2790000.00, 25, 'hyperx-alloy-rise-75-wireless', 1, '2026-04-18 11:49:28', '2026-04-18 22:22:19', 15, '{\"mau-sac\":\"\\u0110en\",\"loai-ket-noi\":\"Wireless 2.4GHz \\/ Bluetooth \\/ USB-C\",\"switch\":\"HyperX Linear (Hot-swap)\",\"layout\":\"75%\",\"keycap\":\"PBT Double-shot\",\"pin\":\"80 gi\\u1edd\",\"bao-hanh\":\"24 th\\u00e1ng\"}'),
(136, 'HX-CS2', 3, 9, 'HyperX Cloud Stinger 2', '<p>HyperX Cloud Stinger 2 là tai nghe gaming có dây giá tốt với driver 50mm, khung xoay 90°, micro swivel-to-mute và trọng lượng nhẹ 275g. Lựa chọn tuyệt vời cho budget gaming.</p>', 'product-thumbnail/3lRx6s8p7H3V92LFw7HVDXYE3byb7LP2WHGmFHcr.jpg', 990000.00, 790000.00, 60, 'hyperx-cloud-stinger-2', 1, '2026-04-18 11:49:29', '2026-04-18 22:32:05', 20, '{\"mau-sac\":\"\\u0110en\",\"loai-ket-noi\":\"3.5mm\",\"driver\":\"50mm\",\"tan-so-dap-ung\":\"10Hz - 25kHz\",\"tro-khang\":\"32\\u03a9\",\"microphone\":\"Swivel-to-mute\",\"trong-luong\":\"275g\",\"bao-hanh\":\"24 th\\u00e1ng\"}'),
(137, 'AK-5075BPV2', 2, 10, 'Akko 5075B Plus V2', '<p>Akko 5075B Plus V2 là bàn phím cơ 75% không dây hot-swappable với gasket mount, VIA/QMK support, foam dampening, RGB per-key và multi-mode kết nối. Best-seller của Akko.</p>', 'product-thumbnail/eNZ4xM6oPg5CHToCT1iNG21wq5BwJ2FAK7scpl2E.webp', 1690000.00, 1390000.00, 45, 'akko-5075b-plus-v2', 1, '2026-04-18 11:49:30', '2026-04-18 22:20:25', 18, '{\"mau-sac\":\"\\u0110en\",\"loai-ket-noi\":\"Bluetooth 5.0 \\/ 2.4GHz \\/ USB-C\",\"switch\":\"Akko Cream Yellow V3 Pro\",\"layout\":\"75%\",\"keycap\":\"PBT Double-shot ASA profile\",\"pin\":\"3000mAh\",\"bao-hanh\":\"12 th\\u00e1ng\"}'),
(144, 'AK-CRYV3P-45', 4, 10, 'Akko Cream Yellow V3 Pro Switch (45 pcs)', '<p>Akko Cream Yellow V3 Pro là switch cơ linear cao cấp nhất của Akko. Pre-lubed, spring 43gf, travel 3.3mm, actuation 1.4mm. Bộ 45 switch.</p><p>Type: Linear</p><p>Actuation: 1.4mm</p><p>Bottom-out: 3.3mm</p><p>Force: 43gf actuation / 53gf bottom-out</p><p>Pre-lubed factory</p>', 'product-thumbnail/hIrv0FlQ0D7PPQ7tHomVvMEkRuePB8O5FNcpi1QL.jpg', 290000.00, NULL, 200, 'akko-cream-yellow-v3-pro-switch-45-pcs', 1, '2026-04-18 11:49:36', '2026-04-18 22:52:47', 0, '{\"mau-sac\":\"V\\u00e0ng\",\"bao-hanh\":\"6 th\\u00e1ng\"}'),
(145, 'AK-CSJP-45', 4, 10, 'Akko CS Jelly Pink Switch (45 pcs)', '<p>Akko CS Jelly Pink là switch linear giá rẻ, smooth và bouncy. Actuation 1.9mm, total travel 3.5mm, force 36gf. Bộ 45 switch, thích hợp cho người mới.</p><p>Type: Linear</p><p>Actuation: 1.9mm</p><p>Bottom-out: 3.5mm</p><p>Force: 36gf actuation / 50gf bottom-out</p>', 'product-thumbnail/JlRLRBQijCoi1LalVfVqA9TrxXxIhIRMoMFN3hq2.jpg', 190000.00, NULL, 300, 'akko-cs-jelly-pink-switch-45-pcs', 1, '2026-04-18 11:49:37', '2026-04-18 22:46:32', 0, '{\"mau-sac\":\"H\\u1ed3ng\",\"bao-hanh\":\"6 th\\u00e1ng\"}'),
(146, 'AK-KC-BOW', 4, 10, 'Akko Keycap Set Black on White (BoW)', '<p>Akko Black on White (BoW) Keycap Set là bộ keycap PBT Double-shot 227 phím tương thích mọi layout. Cherry profile, dày 1.5mm, font chữ sắc nét và bền màu theo thời gian.</p><p>Chất liệu: PBT Double-shot</p><p>Profile: Cherry</p><p>Số lượng: 227 phím</p><p>Tương thích: 60-100% layout</p>', 'product-thumbnail/IicrNVNALO0iMW3b38jIC98oZB1gb04IZLqP5Ar9.jpg', 590000.00, 490000.00, 80, 'akko-keycap-set-black-on-white-bow', 1, '2026-04-18 11:49:37', '2026-04-18 22:47:06', 17, '{\"mau-sac\":\"Tr\\u1eafng\\/\\u0110en\",\"bao-hanh\":\"6 th\\u00e1ng\"}'),
(147, 'PVN2751', 8, 1, 'Ghế Gaming Razer Iskur V2 Newgen', '<p><strong>GHẾ GAMING RAZER ISKUR V2 NEWGEN</strong></p><p><img src=\"https://bizweb.dktcdn.net/100/443/218/files/1-jpeg-0701e30f-3ce7-4b37-99cc-ff526ccbce79.jpg?v=1768382965630\" width=\"1920\" height=\"1280\"><img src=\"https://bizweb.dktcdn.net/100/443/218/files/4-jpeg-a68a3e94-2bd4-43d2-b9bc-89c177f3a22f.jpg?v=1768382968951\" width=\"1920\" height=\"1280\"></p><p>Ghế gaming Razer Iskur V2 Newgen là sản phẩm cao cấp dành cho game thủ chuyên nghiệp, với thiết kế hiện đại và hiệu suất vượt trội. Lưng ghế tích hợp công nghệ Lumbar Support 6D tự điều chỉnh theo tư thế, đệm ngồi foam memory cao cấp, chất liệu da PU cao cấp kết hợp lưới thoáng khí. Hỗ trợ điều chỉnh đa chiều (chiều cao, độ ngả lưng 152°, tay vịn 4D), trọng lượng chịu tải lên đến 136kg, phù hợp cho gaming marathon, streaming và làm việc lâu dài, giúp bạn duy trì tư thế thoải mái và giảm mỏi lưng tối đa.</p><p><strong>LUMBAR SUPPORT 6D TỰ ĐIỀU CHỈNH</strong></p><p>Công nghệ Lumbar Support 6D độc quyền tự động điều chỉnh theo chuyển động của lưng, hỗ trợ vùng thắt lưng tối ưu, giảm áp lực cột sống hiệu quả. Không cần chỉnh tay, luôn ôm sát lưng dù ngồi thẳng hay ngả, lý tưởng cho các phiên chơi game kéo dài hàng giờ.</p><p><strong>CHẤT LIỆU CAO CẤP VÀ THOÁNG KHÍ</strong></p><p><img src=\"https://bizweb.dktcdn.net/100/443/218/files/5-jpeg-09a06b68-6586-482a-9d7c-87fe7f28ecff.jpg?v=1768382969884\" width=\"1920\" height=\"1280\"></p><p><img src=\"https://bizweb.dktcdn.net/100/443/218/files/8-jpeg.jpg?v=1768382972864\" width=\"1920\" height=\"1280\"></p><p>Đệm ngồi memory foam dày dặn, lưng ghế kết hợp da PU cao cấp và lưới thoáng khí ở vùng lưng trên, giảm nóng bức khi ngồi lâu. Chất liệu chống thấm, chống bám bẩn, dễ vệ sinh, mang lại cảm giác sang trọng và bền bỉ.</p><p><img src=\"https://bizweb.dktcdn.net/100/443/218/files/6-jpeg-c37e0837-7583-4de2-8ce3-8b09c676af95.jpg?v=1768382970981\" width=\"1920\" height=\"1280\"></p><p><img src=\"https://bizweb.dktcdn.net/100/443/218/files/7-jpeg-72e0f562-17cd-4365-9667-71e40f1b1f2f.jpg?v=1768382971883\" width=\"1920\" height=\"1280\"></p><p><strong>ĐIỀU CHỈNH ĐA CHIỀU VÀ ERGONOMICS</strong></p><p>Ngả lưng lên đến 152°, tay vịn 4D (lên xuống, trước sau, trái phải, xoay), điều chỉnh chiều cao ghế, độ nghiêng tựa lưng. Chân đế 5 cánh nhôm chắc chắn, bánh xe PU êm ái không làm xước sàn.</p><p><img src=\"https://bizweb.dktcdn.net/100/443/218/files/2-jpeg-70f5eeab-603e-4e33-8c51-7ab78aaa8916.jpg?v=1768382966590\" width=\"1920\" height=\"1280\"></p><p><strong>CHỊU TẢI CAO VÀ ĐỘ BỀN</strong></p><p>Chịu tải tối đa 136kg, khung thép chắc chắn, bảo hành 3 năm. Thiết kế ergonomics giúp giảm đau lưng, vai gáy, phù hợp cho game thủ, streamer và dân văn phòng ngồi lâu.</p><p><strong>THOẢI MÁI VÀ PHỤ KIỆN ĐẦY ĐỦ</strong></p><p>Đi kèm hướng dẫn lắp ráp chi tiết, dễ lắp đặt trong 15-20 phút. Trọng lượng ghế khoảng 25kg, kích thước lớn phù hợp người cao từ 160-195cm.</p><p><img src=\"https://bizweb.dktcdn.net/100/443/218/files/9-jpeg-c786910c-491a-404c-8330-cb3f65975280.jpg?v=1768382973604\" width=\"1920\" height=\"1280\"></p><p><strong>NÂNG TẦM SETUP VỚI GHẾ GAMING RAZER ISKUR V2 NEWGEN ĐỘC QUYỀN</strong></p><p>Razer Iskur V2 Newgen là ghế gaming ergonomics hoàn hảo, kết hợp Lumbar Support 6D tự động, chất liệu cao cấp và điều chỉnh đa chiều. Đây là lựa chọn lý tưởng cho game thủ muốn sự thoải mái tối ưu và sức khỏe lâu dài trong các phiên chơi kéo dài.</p><p><img src=\"https://bizweb.dktcdn.net/100/443/218/files/3-jpeg-66c1bb5c-670a-4976-8f98-ada95d5af8e5.jpg?v=1768382967773\" width=\"1920\" height=\"1280\"></p>', 'product-thumbnail/uxn40udO2XxWUTwpqpt2FXr4M2a2DU9SGJvYwJS9.webp', 15890000.00, NULL, 10, 'ghe-gaming-razer-iskur-v2-newgen', 1, '2026-04-18 23:03:26', '2026-04-18 23:05:44', 0, '{\"mau-sac\":\"\\u0110en\",\"loai-ghe\":\"Gaming Ergonomic\",\"chat-lieu\":\"Da PU + L\\u01b0\\u1edbi tho\\u00e1ng kh\\u00ed + Memory Foam\",\"chieu-cao-phu-hop\":\"160-195cm\",\"nga-lung\":\"152\\u00b0\",\"chiu-tai-toi-da\":\"136kg\",\"trong-luong\":\"Kho\\u1ea3ng 25kg\",\"bao-hanh\":\"36 th\\u00e1ng\"}');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image_path`, `created_at`, `updated_at`) VALUES
(16, 55, 'product_galleries/9WzMDmJuV8GJ4vCLx71HFW5I1fElqAF2oUJgepVd.png', '2026-04-18 10:51:34', '2026-04-18 10:51:34'),
(17, 55, 'product_galleries/MmDdco3eloIKy1cRx9x2maqSqGUd4TwLMCysBd8K.png', '2026-04-18 10:51:34', '2026-04-18 10:51:34'),
(18, 55, 'product_galleries/EvPVe3ImqoGqkXpoyPJSdyxPbvHU6owWbgFGy4Po.png', '2026-04-18 10:51:34', '2026-04-18 10:51:34'),
(19, 23, 'product_galleries/iRv03x8VTuXpi00VVRz3paDhzNqtrevfczMuaQiV.jpg', '2026-04-18 10:57:59', '2026-04-18 10:57:59'),
(20, 23, 'product_galleries/2qUhqz0GDpf0s2cxK73njSlhhnhGJVjff0xVqAjC.jpg', '2026-04-18 10:57:59', '2026-04-18 10:57:59'),
(21, 22, 'product_galleries/5NP2uQEF5sUmaeHUPgi0DNXlrmyzjuLcBVujCANN.webp', '2026-04-18 11:01:05', '2026-04-18 11:01:05'),
(22, 22, 'product_galleries/tFnWf1OhBABAu5gwGFbSvin54d1FprH7gArR9iR3.webp', '2026-04-18 11:01:05', '2026-04-18 11:01:05'),
(23, 21, 'product_galleries/RtyJZJTHDNqdtj21y215kBQGcFleg1EdjAhXRYKy.png', '2026-04-18 11:09:51', '2026-04-18 11:09:51'),
(24, 21, 'product_galleries/sNzFJ1bLNwmFdj1wOfqvUNQaNRKqo0p3kWHvS2rg.png', '2026-04-18 11:09:51', '2026-04-18 11:09:51'),
(25, 21, 'product_galleries/IwOAMZhRHQQi5WAOYFml0x4SBDDWmuDkuZbzh39R.png', '2026-04-18 11:09:51', '2026-04-18 11:09:51'),
(26, 21, 'product_galleries/CyQKbcKPElkxyeArtbxiwcyF9zFLRikK6kOrTl9b.png', '2026-04-18 11:09:51', '2026-04-18 11:09:51'),
(27, 21, 'product_galleries/dz95mFWYmHvSk6iunfElUcNLnnAlXXZGIR7xvJC3.png', '2026-04-18 11:09:52', '2026-04-18 11:09:52'),
(28, 19, 'product_galleries/WBx4x0v5Cte2qhciVV5cP6rGk8wZCg1OssCG7sLe.webp', '2026-04-18 11:20:15', '2026-04-18 11:20:15'),
(29, 19, 'product_galleries/YaeCycvDRwzZoLIYAcspV7RiMQFnePP2PfhZvn9n.webp', '2026-04-18 11:20:15', '2026-04-18 11:20:15'),
(30, 19, 'product_galleries/hyvBX49k0kAdMwoNGuOC50QHN2Wn28YHaS2QkRlA.webp', '2026-04-18 11:20:15', '2026-04-18 11:20:15'),
(31, 19, 'product_galleries/yfddiU39Wd1LaoUEOLrc7mNTaWGKinI4qFcdYvv2.webp', '2026-04-18 11:20:15', '2026-04-18 11:20:15'),
(32, 20, 'product_galleries/QeBwhAlJhOCSqO23zo4rohGCNPq9e2x6RMTbPhkN.webp', '2026-04-18 11:25:21', '2026-04-18 11:25:21'),
(33, 20, 'product_galleries/6Qzu9Dg8Y28jRgXdBgFAfkKkaEkfgB4FKHiKUPHs.webp', '2026-04-18 11:25:21', '2026-04-18 11:25:21'),
(34, 20, 'product_galleries/S0fHh2vIvnUCPs4LK2lAzmZNAggTnu6PSthqFzTT.webp', '2026-04-18 11:25:22', '2026-04-18 11:25:22'),
(35, 18, 'product_galleries/xykVuZdmhZufu8PBoCrMXqFUqunEyHHyAP0uwQmz.webp', '2026-04-18 11:29:28', '2026-04-18 11:29:28'),
(36, 18, 'product_galleries/LZCLc98Q8Duovh1S1zoxysalajOXoejbD9XpHk01.webp', '2026-04-18 11:29:28', '2026-04-18 11:29:28'),
(37, 69, 'product_galleries/a4IyZsLaQP7PcIuRS5MrJyxdECrj7OmXh7d92WyQ.webp', '2026-04-18 22:05:43', '2026-04-18 22:05:43'),
(38, 68, 'product_galleries/bdL2KIhhI7RfZzglBCFnCjVnuG5O9hps7Dwt58oR.webp', '2026-04-18 22:07:26', '2026-04-18 22:07:26'),
(39, 68, 'product_galleries/03IRj1n7Al4zWrBLBh8BsoexPtWWXfEpfh6qd7Yg.webp', '2026-04-18 22:07:26', '2026-04-18 22:07:26'),
(40, 68, 'product_galleries/o2VLeUHj7JBDvw0GRngd7xcOjdDyM8yk7C9dSu0H.webp', '2026-04-18 22:07:26', '2026-04-18 22:07:26'),
(41, 67, 'product_galleries/mDPlo83EUA8vCFf51oA7c9iqDcBUxs2U4d9mcZCm.webp', '2026-04-18 22:08:38', '2026-04-18 22:08:38'),
(42, 67, 'product_galleries/wBJexGxJKCdaSc8P22iv8npihpzvsF9NDZJMggRl.webp', '2026-04-18 22:08:38', '2026-04-18 22:08:38'),
(43, 67, 'product_galleries/XAb2jLw5zD54SZ0DWHI9bECNbtcPg4TJv8rAOoCZ.webp', '2026-04-18 22:08:38', '2026-04-18 22:08:38'),
(44, 57, 'product_galleries/5ttoGNniXOMpVOKJmcNhdblnc7nAN3mM0Je3ZRBj.webp', '2026-04-18 22:09:46', '2026-04-18 22:09:46'),
(45, 57, 'product_galleries/0Qr9wYX8HVmjcFfwpEH8zRVtIg0MrkPUrTxid6Ol.webp', '2026-04-18 22:09:46', '2026-04-18 22:09:46'),
(46, 13, 'product_galleries/rimQaTdOjuY02iyWM0AKBsNSQBWdG5v31vYyRx7u.png', '2026-04-18 22:12:33', '2026-04-18 22:12:33'),
(47, 13, 'product_galleries/ZqhlpDACG0nteUvXZwBNN9AGKzoOgZq0DxeIbROU.png', '2026-04-18 22:12:33', '2026-04-18 22:12:33'),
(48, 13, 'product_galleries/ZqjYMqh2avSxxtdL3cUqOx8mvxHdfUt0m2XlBcwp.png', '2026-04-18 22:12:33', '2026-04-18 22:12:33'),
(49, 13, 'product_galleries/GG7VoRzh1R0fFaRL3kuYF9QhiwmhWz9qI2wASkoS.png', '2026-04-18 22:12:33', '2026-04-18 22:12:33'),
(50, 83, 'product_galleries/676nYAzDbLwx6fq0LAtpxVTeTJX8JUAGAch2q9Nn.webp', '2026-04-18 22:19:05', '2026-04-18 22:19:05'),
(51, 83, 'product_galleries/sLp4XgcN5JNQWcMRoe8WBZbEfcGS2NSatsXfvy7p.webp', '2026-04-18 22:19:05', '2026-04-18 22:19:05'),
(52, 136, 'product_galleries/fJIVSZwR3tsAqgHS406CVWUXxfzDT6Fsca9iIPmB.jpg', '2026-04-18 22:32:05', '2026-04-18 22:32:05'),
(53, 136, 'product_galleries/IRJcFycrOCtTxWBGY0nW6clvPNP75n0Pl9yWF6tC.jpg', '2026-04-18 22:32:05', '2026-04-18 22:32:05'),
(54, 136, 'product_galleries/WtKpQ7r4DjcsFPupNJQHBUNnACgD0TxQUVLQZK6T.jpg', '2026-04-18 22:32:05', '2026-04-18 22:32:05'),
(55, 136, 'product_galleries/INepbFHw6DBDsW2cHTQFI7LLB1dE1TRc4xA207io.jpg', '2026-04-18 22:32:05', '2026-04-18 22:32:05'),
(56, 131, 'product_galleries/En7u657kfj0u2XdRbwU0ckoSn720LmCz5250SUMT.webp', '2026-04-18 22:33:04', '2026-04-18 22:33:04'),
(57, 131, 'product_galleries/TWije5vZDhBNqZOptrkhMOKQuoUqOFOBetxscqzl.webp', '2026-04-18 22:33:04', '2026-04-18 22:33:04'),
(58, 90, 'product_galleries/DJl5faD9dDR48AgE7oDJXcVhB7QfxPWPRB1WhLRm.webp', '2026-04-18 22:35:17', '2026-04-18 22:35:17'),
(59, 90, 'product_galleries/fYoXw0sN1kicQI1d5e53OlxI8qRs431gZLwkF0KN.webp', '2026-04-18 22:35:17', '2026-04-18 22:35:17'),
(60, 90, 'product_galleries/3niXxRKoHIpwPQY6XszjhAjQWvISNLUZdKoZAhrm.webp', '2026-04-18 22:35:17', '2026-04-18 22:35:17'),
(61, 76, 'product_galleries/npSeSQO8Ser0lIYLsOZWHiau0dYtIPpCGUZhzDJS.webp', '2026-04-18 22:40:30', '2026-04-18 22:40:30'),
(62, 76, 'product_galleries/xt9Y4IyWiqdZEZOMxtJGL5HdqaU36eAjxV0c2W2Z.webp', '2026-04-18 22:40:30', '2026-04-18 22:40:30'),
(63, 76, 'product_galleries/g1OvmtB3f76hKTxWyy9AcmjCaJHvUgspg40zPQvF.webp', '2026-04-18 22:40:30', '2026-04-18 22:40:30'),
(64, 73, 'product_galleries/ySScXMwMPumOIIsuIZoMJKgeaAUxREQEWXOvYZNo.webp', '2026-04-18 22:43:15', '2026-04-18 22:43:15'),
(65, 73, 'product_galleries/B0Vrr26sMr4ZCgGHwpEgyfvgXmHysZIqESkk7Q7W.webp', '2026-04-18 22:43:16', '2026-04-18 22:43:16'),
(66, 73, 'product_galleries/nCbIIvogeHtPdrfI9cT9J19Ugqw5adzqlh7jB07J.webp', '2026-04-18 22:43:16', '2026-04-18 22:43:16'),
(67, 79, 'product_galleries/XUV7xIjN6pnvI6sK1gqE6t9AGxiGGGGdM43H3umQ.webp', '2026-04-18 22:44:01', '2026-04-18 22:44:01'),
(68, 79, 'product_galleries/i7jFnS2b6KPA5AcAJWKv5cPyj6VeZL5TnT7BwnCt.webp', '2026-04-18 22:44:01', '2026-04-18 22:44:01'),
(69, 79, 'product_galleries/yCA8YPisZrllpLl7wiMt2z6OQV7Tyo76aBYFx89G.webp', '2026-04-18 22:44:02', '2026-04-18 22:44:02'),
(70, 43, 'product_galleries/zvBo40OD5JZNZPlBtqpNdk8ZWmZxO0RQ414HHxN3.webp', '2026-04-18 22:49:41', '2026-04-18 22:49:41'),
(71, 43, 'product_galleries/gU8WZRh8pry7y8B12EFrYNRH2JLx0NpTXOGKb3xL.webp', '2026-04-18 22:49:41', '2026-04-18 22:49:41'),
(72, 42, 'product_galleries/E0JvjJQIuqyYlEWNS1WfTBXDC2gLXkMQStF8jcWL.webp', '2026-04-18 22:55:34', '2026-04-18 22:55:34'),
(73, 147, 'product_galleries/wmH0FYsm1F1xe2IUix3sTWQnVNZ6zXepCFnO6lBG.webp', '2026-04-18 23:03:26', '2026-04-18 23:03:26'),
(74, 147, 'product_galleries/DfMroo05b8g67d3v4nWQ4bzAnXu5m1Y3t4BCl3wx.webp', '2026-04-18 23:03:26', '2026-04-18 23:03:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
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
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('25F264zyfPFNjDeEAAbw2W6QTU1hVnYgwoj7lGRG', 6, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36 Edg/147.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiYXRYVmpaZ1hzR3NsZ1FOOFMyeU1nWWxIcTlWd2h0S1ZrSEZlTXc0ViI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9vcmRlcnMiO3M6NToicm91dGUiO3M6Njoib3JkZXJzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjQ6IjkzYzNlYTBiMmQ0NGI0ZDQxNmI0ZjhmN2E4ODI0NDIwZmM0ODk4YWRlNDA2ZGQxMWQ0MjQ0YjUzYTY4ZDkwODQiO30=', 1776677994),
('psWWfriW6lkr7QN41oudbjcBREKIHrrFs7mzdBIT', 6, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36 Edg/147.0.0.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiTkltTEJwdTkweVVmOUxiODhXeHlVYkprcjI4SmpKeFgwYk1xaVRIcyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbi9vcmRlcnM/cGFnZT0xIjtzOjU6InJvdXRlIjtzOjY6Im9yZGVycyI7fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo2O3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2NDoiOTNjM2VhMGIyZDQ0YjRkNDE2YjRmOGY3YTg4MjQ0MjBmYzQ4OThhZGU0MDZkZDExZDQyNDRiNTNhNjhkOTA4NCI7fQ==', 1776627981);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `user_type` tinyint(1) NOT NULL DEFAULT 0,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `user_type`, `phone`, `address`, `status`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(6, 'Test User', 'test@gmail.com', '2026-04-16 19:28:00', '$2y$12$.19rzy6Lk7hBp9eIw5SdouswiONJFitMzum6yCtD8AGEelnVm9qde', NULL, NULL, NULL, 1, '0827227271', '123', 1, 'LhGyoM3YsVxmrkc5iNX6dEDBdjHEDujRZRlSPh0yjoQwqb04R3VQwLsUmhBo', NULL, NULL, '2026-04-16 19:28:00', '2026-04-19 00:13:11'),
(8, 'Nguyễn Bảo Trọng', 'nbtrong23081997@gmail.com', NULL, '$2y$12$.MlKsgSw2r3cOZo8micT2e7KIENdM5DO8tPlPewXkZSoGh5Y/S2I6', NULL, NULL, NULL, 0, '0867647911', NULL, 1, 'a2fSi6SJ7gYp6CHjjHFTySgsQbg9qMMcXhz9t2RQWOVpHU5f4fuyUZwYjw9c', NULL, NULL, '2026-04-17 01:02:10', '2026-04-17 01:02:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `attribute_templates`
--
ALTER TABLE `attribute_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `attribute_templates_name_unique` (`name`),
  ADD UNIQUE KEY `attribute_templates_display_name_unique` (`display_name`);

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Chỉ mục cho bảng `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_items_cart_id_foreign` (`cart_id`),
  ADD KEY `cart_items_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Chỉ mục cho bảng `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_order_code_unique` (`order_code`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  ADD KEY `personal_access_tokens_expires_at_index` (`expires_at`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_sku_unique` (`sku`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_product_id_foreign` (`product_id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `attribute_templates`
--
ALTER TABLE `attribute_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
