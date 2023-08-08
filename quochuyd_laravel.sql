-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th8 08, 2023 lúc 07:56 PM
-- Phiên bản máy phục vụ: 10.3.39-MariaDB-cll-lve
-- Phiên bản PHP: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quochuyd_laravel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nameCategory` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `nameCategory`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Headphones', 'headphones', '2022-12-28 06:26:14', '2022-12-28 06:26:14'),
(2, 'Computers', 'computers', '2022-12-28 06:26:23', '2022-12-28 06:26:23'),
(3, 'TV, Video & Audio', 'tv-video-audio', '2022-12-28 06:26:40', '2022-12-28 06:26:40'),
(4, 'Smart Home', 'smart-home', '2022-12-28 06:26:51', '2022-12-28 06:26:51'),
(5, 'Wearable Electronics', 'wearable-electronics', '2022-12-28 06:27:04', '2022-12-28 06:27:04'),
(6, 'Smartphones', 'smartphones', '2022-12-28 06:27:12', '2022-12-28 06:27:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `credit`
--

CREATE TABLE `credit` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `number_card` varchar(200) NOT NULL,
  `name_card` varchar(200) NOT NULL,
  `cvc_card` text NOT NULL,
  `date_card` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `credit`
--

INSERT INTO `credit` (`id`, `user_id`, `number_card`, `name_card`, `cvc_card`, `date_card`, `created_at`, `updated_at`) VALUES
(1, 1, '4089 0419 9434 7498', 'Lê Quốc Huy', '626', '06 / 27', '2022-12-25 23:42:39', '2022-12-25 23:42:39'),
(4, 2, '4038 3626 4352 2341', 'NGUYEN NGOC NHU QUYNH', '874', '06 / 28', '2022-12-26 02:00:21', '2022-12-26 02:00:21');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_12_21_131350_create_category', 1),
(10, '2022_12_26_032345_create_credit', 2),
(30, '2022_12_26_114436_create_order', 3),
(31, '2022_12_26_114837_create_products_order', 3),
(32, '2022_12_11_061913_create_products_table', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_order` bigint(20) UNSIGNED NOT NULL,
  `random_order` varchar(200) NOT NULL,
  `status_order` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id`, `user_order`, `random_order`, `status_order`, `created_at`, `updated_at`) VALUES
(7, 1, 'a0d4EvYT', 'Complete', '2022-12-27 07:24:20', '2022-12-29 20:14:35'),
(8, 1, 'yO326LaP', 'Processed', '2022-12-29 07:53:55', '2022-12-29 20:56:13'),
(10, 1, 'V0fUUfub', 'Complete', '2022-12-29 21:01:09', '2023-04-10 04:18:30'),
(11, 1, 'UXKupC8x', 'Processed', '2023-04-10 04:18:15', '2023-04-10 04:18:15'),
(12, 1, '07mgxKYx', 'Processed', '2023-08-07 19:27:27', '2023-08-07 19:27:27'),
(13, 1, 'trUxAops', 'Processed', '2023-08-07 19:27:44', '2023-08-07 19:27:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nameProducts` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `imgProducts` varchar(255) NOT NULL,
  `priceProducts` int(10) UNSIGNED NOT NULL,
  `descProducts` text NOT NULL,
  `product_cat_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `nameProducts`, `slug`, `imgProducts`, `priceProducts`, `descProducts`, `product_cat_id`, `created_at`, `updated_at`) VALUES
(1, 'Wireless Bluetooth Headphones', 'wireless-bluetooth-headphones', 'https://cartzilla.createx.studio/img/shop/catalog/58.jpg', 3000000, '<p>Huy demo</p>', 1, '2022-12-28 06:31:07', '2022-12-28 06:31:07'),
(3, 'Smart TV LED 49’’ Ultra HD', 'smart-tv-led-49’’-ultra-hd', 'https://cartzilla.createx.studio/img/shop/catalog/60.jpg', 3847232, '<p>Huy demo</p>', 3, '2022-12-28 06:36:04', '2022-12-28 06:36:04'),
(4, 'Smart Speaker with Voice Control', 'smart-speaker-with-voice-control', 'https://cartzilla.createx.studio/img/shop/catalog/61.jpg', 2943123, '<p>Huy demo</p>', 4, '2022-12-28 06:38:31', '2022-12-28 06:38:31'),
(5, 'Fitness GPS Smart Watch', 'fitness-gps-smart-watch', 'https://cartzilla.createx.studio/img/shop/catalog/62.jpg', 555555, '<p>huy demo</p>', 5, '2022-12-28 06:39:15', '2022-12-28 06:39:15'),
(6, 'Popular Smartphone 128GB', 'popular-smartphone-128gb', 'https://cartzilla.createx.studio/img/shop/catalog/63.jpg', 67593732, '<p>Huy demo</p>', 6, '2022-12-28 06:39:42', '2022-12-28 06:39:42'),
(7, 'Smart Watch Series 5, Aluminium', 'smart-watch-series-5-aluminium', 'https://cartzilla.createx.studio/img/shop/catalog/64.jpg', 22222222, '<p>Huy demo</p>', 5, '2022-12-28 06:40:18', '2022-12-28 06:40:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products_order`
--

CREATE TABLE `products_order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `orders_id` bigint(20) UNSIGNED NOT NULL,
  `orders_random` varchar(200) NOT NULL,
  `product_id` varchar(200) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_img` varchar(200) NOT NULL,
  `product_qty` text NOT NULL,
  `product_price` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products_order`
--

INSERT INTO `products_order` (`id`, `orders_id`, `orders_random`, `product_id`, `product_name`, `product_img`, `product_qty`, `product_price`, `created_at`, `updated_at`) VALUES
(7, 7, 'a0d4EvYT', '5', 'Smart Watch Series 5, Aluminium', 'https://cartzilla.createx.studio/img/shop/catalog/64.jpg', '5', '100000.00', NULL, NULL),
(8, 7, 'a0d4EvYT', '2', 'Popular Smartphone 128GB', 'https://cartzilla.createx.studio/img/shop/catalog/63.jpg', '3', '3333333.00', NULL, NULL),
(9, 8, 'yO326LaP', '6', 'Popular Smartphone 128GB', 'https://cartzilla.createx.studio/img/shop/catalog/63.jpg', '1', '67593732.00', NULL, NULL),
(10, 10, 'V0fUUfub', '7', 'Smart Watch Series 5, Aluminium', 'https://cartzilla.createx.studio/img/shop/catalog/64.jpg', '4', '88888888.00', NULL, NULL),
(11, 11, 'UXKupC8x', '6', 'Popular Smartphone 128GB', 'https://cartzilla.createx.studio/img/shop/catalog/63.jpg', '2', '135187464.00', NULL, NULL),
(12, 12, '07mgxKYx', '6', 'Popular Smartphone 128GB', 'https://cartzilla.createx.studio/img/shop/catalog/63.jpg', '4', '270374928.00', NULL, NULL),
(13, 13, 'trUxAops', '6', 'Popular Smartphone 128GB', 'https://cartzilla.createx.studio/img/shop/catalog/63.jpg', '4', '270374928.00', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `banned` varchar(255) DEFAULT NULL,
  `time_banned` varchar(255) DEFAULT NULL,
  `ip` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `number`, `address`, `level`, `banned`, `time_banned`, `ip`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Lê Quốc Huy', 'huydev', 'qhuy.dev@gmail.com', '$2y$10$M/YMchrwd9jdXcROWSR0Duco572GRrNaacGgaBaHP9gNuqmraWU1u', '0934436067', 'Tổ 2 , Thôn Cồn Mong , Xã Hòa Phước , Huyện Hòa Vang , TP Đà Nẵng', 'admin', '0', NULL, '127.0.0.1', NULL, '2022-12-25 23:26:57', '2022-12-25 23:26:57'),
(2, 'Như Quỳnh', 'quynxinh', 'quynhx@gmail.com', '$2y$10$n00dlpdaJev1iQmSah8AH.8ENkYm6GZZEx9UDsONSfEGulQ5NSJh2', '0901928363', 'Tổ 2 , Thôn Cồn Mong , Xã Hòa Phước , Huyện Hòa Vang , TP Đà Nẵng', 'member', '0', NULL, '127.0.0.1', NULL, '2022-12-26 01:22:41', '2022-12-26 01:22:41');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `credit`
--
ALTER TABLE `credit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `credit_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_user_order_foreign` (`user_order`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_product_cat_id_foreign` (`product_cat_id`);

--
-- Chỉ mục cho bảng `products_order`
--
ALTER TABLE `products_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_order_orders_id_foreign` (`orders_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `credit`
--
ALTER TABLE `credit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `products_order`
--
ALTER TABLE `products_order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `credit`
--
ALTER TABLE `credit`
  ADD CONSTRAINT `credit_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_user_order_foreign` FOREIGN KEY (`user_order`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_product_cat_id_foreign` FOREIGN KEY (`product_cat_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products_order`
--
ALTER TABLE `products_order`
  ADD CONSTRAINT `products_order_orders_id_foreign` FOREIGN KEY (`orders_id`) REFERENCES `order` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
