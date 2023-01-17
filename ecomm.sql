-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 17, 2023 at 05:27 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomm`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_12_25_170924_add_role_to_users_table', 1),
(5, '2023_01_05_031236_add_contact_to_users_table', 2),
(6, '2023_01_05_091142_create_products_table', 3),
(7, '2023_01_10_014004_create_roles_table', 4),
(8, '2023_01_16_024624_create_orders_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `user_id` int NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `payment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Cash',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `description`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Shoe', 800, NULL, 'Product_23_01_06_021908.jpg', NULL, '2023-01-05 19:49:08', '2023-01-05 19:49:08'),
(2, 'clothes', 600, NULL, 'Product_23_01_11_042210.jpg', NULL, '2023-01-05 19:51:16', '2023-01-10 21:52:10'),
(3, 'RainCoat', 600, NULL, 'Product_23_01_06_025122.jpg', NULL, '2023-01-05 20:21:22', '2023-01-05 20:21:22'),
(4, 'Bag', 300, NULL, 'Product_23_01_06_050004.jpg', NULL, '2023-01-05 22:30:04', '2023-01-05 22:30:04'),
(5, 'Jean', 360, NULL, 'Product_23_01_06_050207.jpg', NULL, '2023-01-05 22:32:07', '2023-01-05 22:32:07'),
(6, 'shirt', 300, NULL, 'Product_23_01_06_050254.jpg', NULL, '2023-01-05 22:32:54', '2023-01-05 22:32:54'),
(7, 'Light Shirt', 450, NULL, 'Product_23_01_06_053318.jpg', NULL, '2023-01-05 23:03:18', '2023-01-05 23:03:18'),
(8, 'Glasses', 100, NULL, 'Product_23_01_06_070927.jpg', NULL, '2023-01-06 00:39:27', '2023-01-06 00:39:27');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `role` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'superadmin'),
(2, 'user'),
(3, 'admin'),
(4, 'editor');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` int NOT NULL DEFAULT '0',
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`, `phone`, `address`, `deleted_at`) VALUES
(1, 'SuperAdmin', 'superadmin@gmail.com', NULL, '$2y$10$0ELG.uMHFc7zL4NhgqTy4eLUosBZfyRdl3nIoxvYICpkXUjrbalH.', NULL, '2023-01-04 19:22:09', '2023-01-04 19:22:09', 1, NULL, NULL, NULL),
(2, 'admin', 'admin@gmail.com', NULL, '$2y$10$0ELG.uMHFc7zL4NhgqTy4eLUosBZfyRdl3nIoxvYICpkXUjrbalH.', NULL, '2023-01-04 19:24:51', '2023-01-05 01:14:44', 3, NULL, NULL, NULL),
(3, 'tanaka', 'tanaka@gmail.com', NULL, '$2y$10$0ELG.uMHFc7zL4NhgqTy4eLUosBZfyRdl3nIoxvYICpkXUjrbalH.', NULL, '2023-01-04 20:59:45', '2023-01-10 20:18:13', 4, '09774586957', 'Insein, Yangon', NULL),
(4, 'sithu', 'sithudaung@gmail.com', NULL, '$2y$10$0ELG.uMHFc7zL4NhgqTy4eLUosBZfyRdl3nIoxvYICpkXUjrbalH.', NULL, '2023-01-09 19:44:15', '2023-01-10 01:20:17', 3, NULL, NULL, NULL),
(5, 'suzuki', 'suzuki@gmail.com', NULL, '$2y$10$ImGO1e5nHlMb4Z6m3x2iBu7ckrBkJPkN5JiOrquyhRpFW9HkH2FVy', NULL, '2023-01-10 00:44:21', '2023-01-10 20:26:09', 2, NULL, NULL, NULL),
(6, 'honda', 'honda@gmail.com', NULL, '$2y$10$27w4ePssA2DJ9Bnapxea1ubKcKDutrGDm7XMF.dn4L.F4fj8SILm.', NULL, '2023-01-10 21:54:36', '2023-01-10 22:21:31', 4, NULL, NULL, NULL),
(7, 'kobayashi', 'kobayashi@gmail.com', NULL, '$2y$10$s1c6bwXfB4e8n6VLKHik8udowaY7rLAvEsXUmck2dTAJfw0L8me2q', NULL, '2023-01-10 21:55:27', '2023-01-10 21:55:27', 2, NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
