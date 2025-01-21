-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 21, 2025 at 08:25 PM
-- Server version: 8.0.40-0ubuntu0.24.04.1
-- PHP Version: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `role_id`, `email`, `email_verified_at`, `password`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'RootAdmin', 1, 'root@admin.com', NULL, '$2y$12$CA7FqIAnOh1TLgGxX1/YROK4gKbiv0l8dM2EJNpWL4dWUa/gIvMoi', NULL, NULL, '2025-01-21 20:21:53', '2025-01-21 20:21:53'),
(2, 'Admin', 2, 'admin@gmail.com', NULL, '$2y$12$TuRKpegbqCC5R7QvCSy2eOTi1475LyRfKzN/YYvOUXHGV/wSq6ffO', NULL, NULL, '2025-01-21 20:21:53', '2025-01-21 20:21:53'),
(3, 'Transoper', 3, 'transoper@gmail.com', NULL, '$2y$12$kT3hj8p7BGwFPIA4Gh2i..E..l6vldyQx3sq6LM72bGu4imFu5mnG', NULL, NULL, '2025-01-21 20:21:53', '2025-01-21 20:21:53'),
(4, 'Loading', 4, 'loading@gmail.com', NULL, '$2y$12$Z0tXLnf0OPMi.GR/g6SyJOxxJYQuxgDZWLjE5MXti1WuwxVZO8mzq', NULL, NULL, '2025-01-21 20:21:54', '2025-01-21 20:21:54'),
(5, 'Production', 5, 'production@gmail.com', NULL, '$2y$12$vpWQIxWn6zESzh3tOENfs.WSOu7lTEeBN8uv6ZJvqSeiYDlHmSUXi', NULL, NULL, '2025-01-21 20:21:54', '2025-01-21 20:21:54');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `car_registrations`
--

CREATE TABLE `car_registrations` (
  `id` bigint UNSIGNED NOT NULL,
  `lsp_id` bigint UNSIGNED DEFAULT NULL,
  `customer_id` bigint UNSIGNED DEFAULT NULL,
  `car_id` bigint UNSIGNED DEFAULT NULL,
  `car_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cusomter_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driver_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_of_truck` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_of_truck_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `qr_code` text COLLATE utf8mb4_unicode_ci,
  `click_date` timestamp NULL DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint UNSIGNED NOT NULL,
  `lsp_id` bigint UNSIGNED DEFAULT NULL,
  `customer_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

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
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `l_s_p_s`
--

CREATE TABLE `l_s_p_s` (
  `id` bigint UNSIGNED NOT NULL,
  `lsp_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `l_s_p_s`
--

INSERT INTO `l_s_p_s` (`id`, `lsp_name`, `created_at`, `updated_at`) VALUES
(1, 'New Moe Makha', '2025-01-21 20:21:54', '2025-01-21 20:21:54'),
(2, 'Myint Nadi Services', '2025-01-21 20:21:54', '2025-01-21 20:21:54'),
(3, 'May Oo Paing', '2025-01-21 20:21:54', '2025-01-21 20:21:54'),
(4, 'New Royal Forty Five', '2025-01-21 20:21:54', '2025-01-21 20:21:54'),
(5, 'Htein Win and Brothers', '2025-01-21 20:21:54', '2025-01-21 20:21:54'),
(6, 'Kerry Logistics (Railway)', '2025-01-21 20:21:54', '2025-01-21 20:21:54'),
(7, 'Resources Group Logistics', '2025-01-21 20:21:54', '2025-01-21 20:21:54'),
(8, 'KAT Transportation', '2025-01-21 20:21:54', '2025-01-21 20:21:54'),
(9, 'Karzo Company Limited', '2025-01-21 20:21:54', '2025-01-21 20:21:54'),
(10, 'Locomo', '2025-01-21 20:21:54', '2025-01-21 20:21:54'),
(11, 'Customer Value Logistics', '2025-01-21 20:21:54', '2025-01-21 20:21:54'),
(12, 'Chindwin Cherry', '2025-01-21 20:21:54', '2025-01-21 20:21:54'),
(13, 'Myanmar Logistics Supply Chain', '2025-01-21 20:21:54', '2025-01-21 20:21:54'),
(14, '24 Diamonds', '2025-01-21 20:21:54', '2025-01-21 20:21:54'),
(15, 'Aung Paw Tun', '2025-01-21 20:21:54', '2025-01-21 20:21:54');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_09_17_081239_create_admins_table', 1),
(5, '2024_09_20_042754_create_personal_access_tokens_table', 1),
(6, '2024_10_01_020509_create_permission_tables', 1),
(7, '2024_10_04_050851_create_telescope_entries_table', 1),
(8, '2025_01_14_130654_create_customers_table', 1),
(9, '2025_01_15_155657_create_l_s_p_s_table', 1),
(10, '2025_01_19_040818_create_trucks_table', 1),
(11, '2025_01_19_055418_create_car_registrations_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\Admin', 1),
(2, 'App\\Models\\Admin', 2),
(3, 'App\\Models\\Admin', 3),
(4, 'App\\Models\\Admin', 4),
(5, 'App\\Models\\Admin', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'root-admin', 'admin', '2025-01-21 20:21:53', '2025-01-21 20:21:53'),
(2, 'admin', 'admin', '2025-01-21 20:21:53', '2025-01-21 20:21:53'),
(3, 'transoper', 'admin', '2025-01-21 20:21:53', '2025-01-21 20:21:53'),
(4, 'loading', 'admin', '2025-01-21 20:21:53', '2025-01-21 20:21:53'),
(5, 'production', 'admin', '2025-01-21 20:21:53', '2025-01-21 20:21:53');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('tCBcwIJlUzEd0j8xGNyMXfnMWCAHHCmZTyPK9S2d', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQWRidGViR0VyOU1Ga3V4S1hxTEdvZ1hPY0ZScnBQTVFBQjc3bVNuRCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo1NToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL29yZGVyL2hpc3Rvcnk/c2VhcmNoPVRoZXQlMjBuYWluZyI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1737491111);

-- --------------------------------------------------------

--
-- Table structure for table `telescope_entries`
--

CREATE TABLE `telescope_entries` (
  `sequence` bigint UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `family_hash` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `should_display_on_index` tinyint(1) NOT NULL DEFAULT '1',
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `telescope_entries`
--

INSERT INTO `telescope_entries` (`sequence`, `uuid`, `batch_id`, `family_hash`, `should_display_on_index`, `type`, `content`, `created_at`) VALUES
(1, '9e061cde-582f-4e68-acf3-323397e40656', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `roles` where `name` = \'root-admin\' and `guard_name` = \'admin\' limit 1\",\"time\":\"1.24\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/database\\/seeders\\/RoleSeeder.php\",\"line\":24,\"hash\":\"de1bc7a62331e87ecc91f3ab3855091f\",\"hostname\":\"msi\"}', '2025-01-22 02:51:53'),
(2, '9e061cde-5cf1-411a-a63b-273c257c8615', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `roles` (`guard_name`, `name`, `updated_at`, `created_at`) values (\'admin\', \'root-admin\', \'2025-01-22 02:51:53\', \'2025-01-22 02:51:53\')\",\"time\":\"8.05\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/database\\/seeders\\/RoleSeeder.php\",\"line\":24,\"hash\":\"1dca94ec652015a6eef78cc3270f91c0\",\"hostname\":\"msi\"}', '2025-01-22 02:51:53'),
(3, '9e061cde-5d1f-40f9-9c02-9bb5559e47c2', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'model', '{\"action\":\"created\",\"model\":\"Spatie\\\\Permission\\\\Models\\\\Role:1\",\"hostname\":\"msi\"}', '2025-01-22 02:51:53'),
(4, '9e061cde-5d69-462b-8f30-f9b4e2d24b4b', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"delete from `cache` where `key` in (\'spatie.permission.cache\', \'illuminate:cache:flexible:created:spatie.permission.cache\')\",\"time\":\"0.42\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/database\\/seeders\\/RoleSeeder.php\",\"line\":24,\"hash\":\"84c324f59f1a38efa9584ea67003529d\",\"hostname\":\"msi\"}', '2025-01-22 02:51:53'),
(5, '9e061cde-5d7e-4703-9f3b-4ad7662bb553', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'cache', '{\"type\":\"forget\",\"key\":\"spatie.permission.cache\",\"hostname\":\"msi\"}', '2025-01-22 02:51:53'),
(6, '9e061cde-5e5c-47f7-a9da-869f3e6f569f', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `roles` where `name` = \'admin\' and `guard_name` = \'admin\' limit 1\",\"time\":\"0.66\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/database\\/seeders\\/RoleSeeder.php\",\"line\":25,\"hash\":\"de1bc7a62331e87ecc91f3ab3855091f\",\"hostname\":\"msi\"}', '2025-01-22 02:51:53'),
(7, '9e061cde-623d-4872-9a3e-8b361e290395', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `roles` (`guard_name`, `name`, `updated_at`, `created_at`) values (\'admin\', \'admin\', \'2025-01-22 02:51:53\', \'2025-01-22 02:51:53\')\",\"time\":\"9.33\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/database\\/seeders\\/RoleSeeder.php\",\"line\":25,\"hash\":\"1dca94ec652015a6eef78cc3270f91c0\",\"hostname\":\"msi\"}', '2025-01-22 02:51:53'),
(8, '9e061cde-6257-4303-a4ca-1c014752074c', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'model', '{\"action\":\"created\",\"model\":\"Spatie\\\\Permission\\\\Models\\\\Role:2\",\"hostname\":\"msi\"}', '2025-01-22 02:51:53'),
(9, '9e061cde-62a5-49a7-bfec-6e2db1ce1d9c', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"delete from `cache` where `key` in (\'spatie.permission.cache\', \'illuminate:cache:flexible:created:spatie.permission.cache\')\",\"time\":\"0.45\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/database\\/seeders\\/RoleSeeder.php\",\"line\":25,\"hash\":\"84c324f59f1a38efa9584ea67003529d\",\"hostname\":\"msi\"}', '2025-01-22 02:51:53'),
(10, '9e061cde-62b6-441d-a725-b870a55ca522', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'cache', '{\"type\":\"forget\",\"key\":\"spatie.permission.cache\",\"hostname\":\"msi\"}', '2025-01-22 02:51:53'),
(11, '9e061cde-6311-4ffb-97ad-f7d383efb7f3', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `roles` where `name` = \'transoper\' and `guard_name` = \'admin\' limit 1\",\"time\":\"0.48\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/database\\/seeders\\/RoleSeeder.php\",\"line\":26,\"hash\":\"de1bc7a62331e87ecc91f3ab3855091f\",\"hostname\":\"msi\"}', '2025-01-22 02:51:53'),
(12, '9e061cde-65cb-4d98-b75f-0fce0f93f3c4', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `roles` (`guard_name`, `name`, `updated_at`, `created_at`) values (\'admin\', \'transoper\', \'2025-01-22 02:51:53\', \'2025-01-22 02:51:53\')\",\"time\":\"6.44\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/database\\/seeders\\/RoleSeeder.php\",\"line\":26,\"hash\":\"1dca94ec652015a6eef78cc3270f91c0\",\"hostname\":\"msi\"}', '2025-01-22 02:51:53'),
(13, '9e061cde-65ea-409f-a0a1-97bc7d076f25', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'model', '{\"action\":\"created\",\"model\":\"Spatie\\\\Permission\\\\Models\\\\Role:3\",\"hostname\":\"msi\"}', '2025-01-22 02:51:53'),
(14, '9e061cde-6636-461d-bec4-8aa99f4984e0', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"delete from `cache` where `key` in (\'spatie.permission.cache\', \'illuminate:cache:flexible:created:spatie.permission.cache\')\",\"time\":\"0.43\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/database\\/seeders\\/RoleSeeder.php\",\"line\":26,\"hash\":\"84c324f59f1a38efa9584ea67003529d\",\"hostname\":\"msi\"}', '2025-01-22 02:51:53'),
(15, '9e061cde-6645-4c2e-9764-e04fe761d3b4', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'cache', '{\"type\":\"forget\",\"key\":\"spatie.permission.cache\",\"hostname\":\"msi\"}', '2025-01-22 02:51:53'),
(16, '9e061cde-6687-473c-abca-e3832d301119', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `roles` where `name` = \'loading\' and `guard_name` = \'admin\' limit 1\",\"time\":\"0.40\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/database\\/seeders\\/RoleSeeder.php\",\"line\":27,\"hash\":\"de1bc7a62331e87ecc91f3ab3855091f\",\"hostname\":\"msi\"}', '2025-01-22 02:51:53'),
(17, '9e061cde-6a12-4dae-8036-f3761a12c970', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `roles` (`guard_name`, `name`, `updated_at`, `created_at`) values (\'admin\', \'loading\', \'2025-01-22 02:51:53\', \'2025-01-22 02:51:53\')\",\"time\":\"8.59\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/database\\/seeders\\/RoleSeeder.php\",\"line\":27,\"hash\":\"1dca94ec652015a6eef78cc3270f91c0\",\"hostname\":\"msi\"}', '2025-01-22 02:51:53'),
(18, '9e061cde-6a2b-459e-bf0f-806d5e6ad12a', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'model', '{\"action\":\"created\",\"model\":\"Spatie\\\\Permission\\\\Models\\\\Role:4\",\"hostname\":\"msi\"}', '2025-01-22 02:51:53'),
(19, '9e061cde-6a6d-410a-9119-a7991037740f', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"delete from `cache` where `key` in (\'spatie.permission.cache\', \'illuminate:cache:flexible:created:spatie.permission.cache\')\",\"time\":\"0.47\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/database\\/seeders\\/RoleSeeder.php\",\"line\":27,\"hash\":\"84c324f59f1a38efa9584ea67003529d\",\"hostname\":\"msi\"}', '2025-01-22 02:51:53'),
(20, '9e061cde-6a76-413a-926e-649c2e0f85b9', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'cache', '{\"type\":\"forget\",\"key\":\"spatie.permission.cache\",\"hostname\":\"msi\"}', '2025-01-22 02:51:53'),
(21, '9e061cde-6ac4-4b9c-aee2-4924b53fface', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `roles` where `name` = \'production\' and `guard_name` = \'admin\' limit 1\",\"time\":\"0.51\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/database\\/seeders\\/RoleSeeder.php\",\"line\":28,\"hash\":\"de1bc7a62331e87ecc91f3ab3855091f\",\"hostname\":\"msi\"}', '2025-01-22 02:51:53'),
(22, '9e061cde-6e16-4608-8aaf-3b2edc7a0e45', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `roles` (`guard_name`, `name`, `updated_at`, `created_at`) values (\'admin\', \'production\', \'2025-01-22 02:51:53\', \'2025-01-22 02:51:53\')\",\"time\":\"8.03\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/database\\/seeders\\/RoleSeeder.php\",\"line\":28,\"hash\":\"1dca94ec652015a6eef78cc3270f91c0\",\"hostname\":\"msi\"}', '2025-01-22 02:51:53'),
(23, '9e061cde-6e37-484d-b119-0a3a4a7f3335', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'model', '{\"action\":\"created\",\"model\":\"Spatie\\\\Permission\\\\Models\\\\Role:5\",\"hostname\":\"msi\"}', '2025-01-22 02:51:53'),
(24, '9e061cde-6e93-4c68-b0e2-d48837479f4d', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"delete from `cache` where `key` in (\'spatie.permission.cache\', \'illuminate:cache:flexible:created:spatie.permission.cache\')\",\"time\":\"0.59\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/database\\/seeders\\/RoleSeeder.php\",\"line\":28,\"hash\":\"84c324f59f1a38efa9584ea67003529d\",\"hostname\":\"msi\"}', '2025-01-22 02:51:53'),
(25, '9e061cde-6e9d-4938-a491-e40e0eaf9a6b', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'cache', '{\"type\":\"forget\",\"key\":\"spatie.permission.cache\",\"hostname\":\"msi\"}', '2025-01-22 02:51:53'),
(26, '9e061cde-6fe7-4e74-a6a3-e9b1b835ade2', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `permissions`\",\"time\":\"0.82\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/database\\/seeders\\/RoleSeeder.php\",\"line\":30,\"hash\":\"c61ac84cc59cece74af9165092fde0b3\",\"hostname\":\"msi\"}', '2025-01-22 02:51:53'),
(27, '9e061cde-70ef-43aa-b307-91fd495cfebe', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select `permissions`.*, `role_has_permissions`.`role_id` as `pivot_role_id`, `role_has_permissions`.`permission_id` as `pivot_permission_id` from `permissions` inner join `role_has_permissions` on `permissions`.`id` = `role_has_permissions`.`permission_id` where `role_has_permissions`.`role_id` = 1\",\"time\":\"0.78\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/database\\/seeders\\/RoleSeeder.php\",\"line\":30,\"hash\":\"eec147138b5334a7e593e2dd4252090d\",\"hostname\":\"msi\"}', '2025-01-22 02:51:53'),
(28, '9e061cde-7237-4ab6-910e-2db0c2b4fa41', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"delete from `cache` where `key` in (\'spatie.permission.cache\', \'illuminate:cache:flexible:created:spatie.permission.cache\')\",\"time\":\"0.50\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/database\\/seeders\\/RoleSeeder.php\",\"line\":30,\"hash\":\"84c324f59f1a38efa9584ea67003529d\",\"hostname\":\"msi\"}', '2025-01-22 02:51:53'),
(29, '9e061cde-7244-4a5d-b905-7aa6838d1616', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'cache', '{\"type\":\"forget\",\"key\":\"spatie.permission.cache\",\"hostname\":\"msi\"}', '2025-01-22 02:51:53'),
(30, '9e061cde-be5b-4816-a22e-3c14fd86b54a', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `admins` (`role_id`, `name`, `email`, `password`, `updated_at`, `created_at`) values (1, \'RootAdmin\', \'root@admin.com\', \'y$CA7FqIAnOh1TLgGxX1\\/YROK4gKbiv0l8dM2EJNpWL4dWUa\\/gIvMoi\', \'2025-01-22 02:51:53\', \'2025-01-22 02:51:53\')\",\"time\":\"5.01\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/database\\/seeders\\/AdminSeeder.php\",\"line\":16,\"hash\":\"e41c2b209d140af22e4a90fd79941277\",\"hostname\":\"msi\"}', '2025-01-22 02:51:53'),
(31, '9e061cde-be81-4323-b570-b82b3cac130d', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'model', '{\"action\":\"created\",\"model\":\"App\\\\Models\\\\Admin:1\",\"hostname\":\"msi\"}', '2025-01-22 02:51:53'),
(32, '9e061cde-bf4d-4ba5-a183-13cbc350a407', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `roles` where `name` = \'root-admin\' and `guard_name` = \'admin\' limit 1\",\"time\":\"0.68\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/database\\/seeders\\/AdminSeeder.php\",\"line\":22,\"hash\":\"de1bc7a62331e87ecc91f3ab3855091f\",\"hostname\":\"msi\"}', '2025-01-22 02:51:53'),
(33, '9e061cde-bf60-4cc5-a4af-c0f67e9392d5', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'model', '{\"action\":\"retrieved\",\"model\":\"Spatie\\\\Permission\\\\Models\\\\Role\",\"count\":5,\"hostname\":\"msi\"}', '2025-01-22 02:51:53'),
(34, '9e061cde-bfd7-4d16-8961-cfb5073ba855', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select `roles`.*, `model_has_roles`.`model_id` as `pivot_model_id`, `model_has_roles`.`role_id` as `pivot_role_id`, `model_has_roles`.`model_type` as `pivot_model_type` from `roles` inner join `model_has_roles` on `roles`.`id` = `model_has_roles`.`role_id` where `model_has_roles`.`model_id` = 1 and `model_has_roles`.`model_type` = \'App\\\\Models\\\\Admin\'\",\"time\":\"0.57\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/database\\/seeders\\/AdminSeeder.php\",\"line\":22,\"hash\":\"eb2635dbf27540ab6ab19dc9db8a2961\",\"hostname\":\"msi\"}', '2025-01-22 02:51:53'),
(35, '9e061cde-c1c0-46a6-87c0-982b8cbf8cb0', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `model_has_roles` (`model_id`, `model_type`, `role_id`) values (1, \'App\\\\Models\\\\Admin\', 1)\",\"time\":\"4.47\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/database\\/seeders\\/AdminSeeder.php\",\"line\":22,\"hash\":\"b40636c8a9886b7fb107e3eb7dd2c0eb\",\"hostname\":\"msi\"}', '2025-01-22 02:51:53'),
(36, '9e061cdf-0ce3-41f7-b385-0c8a491e3e63', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `admins` (`role_id`, `name`, `email`, `password`, `updated_at`, `created_at`) values (2, \'Admin\', \'admin@gmail.com\', \'y$TuRKpegbqCC5R7QvCSy2eOTi1475LyRfKzN\\/YYvOUXHGV\\/wSq6ffO\', \'2025-01-22 02:51:53\', \'2025-01-22 02:51:53\')\",\"time\":\"15.24\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/database\\/seeders\\/AdminSeeder.php\",\"line\":24,\"hash\":\"e41c2b209d140af22e4a90fd79941277\",\"hostname\":\"msi\"}', '2025-01-22 02:51:53'),
(37, '9e061cdf-0cf3-465b-8f02-cc72d8f245f1', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'model', '{\"action\":\"created\",\"model\":\"App\\\\Models\\\\Admin:2\",\"hostname\":\"msi\"}', '2025-01-22 02:51:53'),
(38, '9e061cdf-0d3a-4250-830a-94019f7edc23', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `roles` where `name` = \'admin\' and `guard_name` = \'admin\' limit 1\",\"time\":\"0.38\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/database\\/seeders\\/AdminSeeder.php\",\"line\":30,\"hash\":\"de1bc7a62331e87ecc91f3ab3855091f\",\"hostname\":\"msi\"}', '2025-01-22 02:51:53'),
(39, '9e061cdf-0d91-4d18-bacd-8e46f347b181', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select `roles`.*, `model_has_roles`.`model_id` as `pivot_model_id`, `model_has_roles`.`role_id` as `pivot_role_id`, `model_has_roles`.`model_type` as `pivot_model_type` from `roles` inner join `model_has_roles` on `roles`.`id` = `model_has_roles`.`role_id` where `model_has_roles`.`model_id` = 2 and `model_has_roles`.`model_type` = \'App\\\\Models\\\\Admin\'\",\"time\":\"0.42\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/database\\/seeders\\/AdminSeeder.php\",\"line\":30,\"hash\":\"eb2635dbf27540ab6ab19dc9db8a2961\",\"hostname\":\"msi\"}', '2025-01-22 02:51:53'),
(40, '9e061cdf-0ff1-4d1b-bef7-1b8dd5ae8733', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `model_has_roles` (`model_id`, `model_type`, `role_id`) values (2, \'App\\\\Models\\\\Admin\', 2)\",\"time\":\"5.64\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/database\\/seeders\\/AdminSeeder.php\",\"line\":30,\"hash\":\"b40636c8a9886b7fb107e3eb7dd2c0eb\",\"hostname\":\"msi\"}', '2025-01-22 02:51:53'),
(41, '9e061cdf-5b0e-4e3f-89b1-c732391f523e', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `admins` (`role_id`, `name`, `email`, `password`, `updated_at`, `created_at`) values (3, \'Transoper\', \'transoper@gmail.com\', \'y$kT3hj8p7BGwFPIA4Gh2i..E..l6vldyQx3sq6LM72bGu4imFu5mnG\', \'2025-01-22 02:51:53\', \'2025-01-22 02:51:53\')\",\"time\":\"15.13\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/database\\/seeders\\/AdminSeeder.php\",\"line\":31,\"hash\":\"e41c2b209d140af22e4a90fd79941277\",\"hostname\":\"msi\"}', '2025-01-22 02:51:53'),
(42, '9e061cdf-5b26-4c5e-80a7-198b277b3e0a', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'model', '{\"action\":\"created\",\"model\":\"App\\\\Models\\\\Admin:3\",\"hostname\":\"msi\"}', '2025-01-22 02:51:53'),
(43, '9e061cdf-5b81-4ece-960f-1ed50c88cadd', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `roles` where `name` = \'transoper\' and `guard_name` = \'admin\' limit 1\",\"time\":\"0.48\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/database\\/seeders\\/AdminSeeder.php\",\"line\":37,\"hash\":\"de1bc7a62331e87ecc91f3ab3855091f\",\"hostname\":\"msi\"}', '2025-01-22 02:51:53'),
(44, '9e061cdf-5bdd-4809-8b36-69601cabeb17', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select `roles`.*, `model_has_roles`.`model_id` as `pivot_model_id`, `model_has_roles`.`role_id` as `pivot_role_id`, `model_has_roles`.`model_type` as `pivot_model_type` from `roles` inner join `model_has_roles` on `roles`.`id` = `model_has_roles`.`role_id` where `model_has_roles`.`model_id` = 3 and `model_has_roles`.`model_type` = \'App\\\\Models\\\\Admin\'\",\"time\":\"0.43\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/database\\/seeders\\/AdminSeeder.php\",\"line\":37,\"hash\":\"eb2635dbf27540ab6ab19dc9db8a2961\",\"hostname\":\"msi\"}', '2025-01-22 02:51:53'),
(45, '9e061cdf-5dd1-4d70-b88d-090bfaf9cf01', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `model_has_roles` (`model_id`, `model_type`, `role_id`) values (3, \'App\\\\Models\\\\Admin\', 3)\",\"time\":\"4.54\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/database\\/seeders\\/AdminSeeder.php\",\"line\":37,\"hash\":\"b40636c8a9886b7fb107e3eb7dd2c0eb\",\"hostname\":\"msi\"}', '2025-01-22 02:51:53'),
(46, '9e061cdf-a94d-4bc3-9b8e-52dff7d98fa4', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `admins` (`role_id`, `name`, `email`, `password`, `updated_at`, `created_at`) values (4, \'Loading\', \'loading@gmail.com\', \'y$Z0tXLnf0OPMi.GR\\/g6SyJOxxJYQuxgDZWLjE5MXti1WuwxVZO8mzq\', \'2025-01-22 02:51:54\', \'2025-01-22 02:51:54\')\",\"time\":\"15.97\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/database\\/seeders\\/AdminSeeder.php\",\"line\":39,\"hash\":\"e41c2b209d140af22e4a90fd79941277\",\"hostname\":\"msi\"}', '2025-01-22 02:51:54'),
(47, '9e061cdf-a967-403c-a3cc-62c762e7e6a0', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'model', '{\"action\":\"created\",\"model\":\"App\\\\Models\\\\Admin:4\",\"hostname\":\"msi\"}', '2025-01-22 02:51:54'),
(48, '9e061cdf-a9b9-4839-b385-ce1082d45398', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `roles` where `name` = \'loading\' and `guard_name` = \'admin\' limit 1\",\"time\":\"0.36\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/database\\/seeders\\/AdminSeeder.php\",\"line\":45,\"hash\":\"de1bc7a62331e87ecc91f3ab3855091f\",\"hostname\":\"msi\"}', '2025-01-22 02:51:54'),
(49, '9e061cdf-aa0e-4a8a-ae63-73ddec72a05a', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select `roles`.*, `model_has_roles`.`model_id` as `pivot_model_id`, `model_has_roles`.`role_id` as `pivot_role_id`, `model_has_roles`.`model_type` as `pivot_model_type` from `roles` inner join `model_has_roles` on `roles`.`id` = `model_has_roles`.`role_id` where `model_has_roles`.`model_id` = 4 and `model_has_roles`.`model_type` = \'App\\\\Models\\\\Admin\'\",\"time\":\"0.40\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/database\\/seeders\\/AdminSeeder.php\",\"line\":45,\"hash\":\"eb2635dbf27540ab6ab19dc9db8a2961\",\"hostname\":\"msi\"}', '2025-01-22 02:51:54'),
(50, '9e061cdf-ac1e-49b9-a6a5-1b892baa295b', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `model_has_roles` (`model_id`, `model_type`, `role_id`) values (4, \'App\\\\Models\\\\Admin\', 4)\",\"time\":\"4.85\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/database\\/seeders\\/AdminSeeder.php\",\"line\":45,\"hash\":\"b40636c8a9886b7fb107e3eb7dd2c0eb\",\"hostname\":\"msi\"}', '2025-01-22 02:51:54'),
(51, '9e061cdf-f2c0-46e1-bc55-3f23ee922f09', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `admins` (`role_id`, `name`, `email`, `password`, `updated_at`, `created_at`) values (5, \'Production\', \'production@gmail.com\', \'y$vpWQIxWn6zESzh3tOENfs.WSOu7lTEeBN8uv6ZJvqSeiYDlHmSUXi\', \'2025-01-22 02:51:54\', \'2025-01-22 02:51:54\')\",\"time\":\"5.01\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/database\\/seeders\\/AdminSeeder.php\",\"line\":47,\"hash\":\"e41c2b209d140af22e4a90fd79941277\",\"hostname\":\"msi\"}', '2025-01-22 02:51:54'),
(52, '9e061cdf-f2e3-4565-bf8e-a4ac8fae7856', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'model', '{\"action\":\"created\",\"model\":\"App\\\\Models\\\\Admin:5\",\"hostname\":\"msi\"}', '2025-01-22 02:51:54'),
(53, '9e061cdf-f358-40e3-8dbd-49d9a1f36b2b', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `roles` where `name` = \'production\' and `guard_name` = \'admin\' limit 1\",\"time\":\"0.55\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/database\\/seeders\\/AdminSeeder.php\",\"line\":53,\"hash\":\"de1bc7a62331e87ecc91f3ab3855091f\",\"hostname\":\"msi\"}', '2025-01-22 02:51:54'),
(54, '9e061cdf-f3b2-42a7-993b-a77f04de6263', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select `roles`.*, `model_has_roles`.`model_id` as `pivot_model_id`, `model_has_roles`.`role_id` as `pivot_role_id`, `model_has_roles`.`model_type` as `pivot_model_type` from `roles` inner join `model_has_roles` on `roles`.`id` = `model_has_roles`.`role_id` where `model_has_roles`.`model_id` = 5 and `model_has_roles`.`model_type` = \'App\\\\Models\\\\Admin\'\",\"time\":\"0.44\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/database\\/seeders\\/AdminSeeder.php\",\"line\":53,\"hash\":\"eb2635dbf27540ab6ab19dc9db8a2961\",\"hostname\":\"msi\"}', '2025-01-22 02:51:54'),
(55, '9e061cdf-f5c7-4998-b427-7e793a6c9347', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `model_has_roles` (`model_id`, `model_type`, `role_id`) values (5, \'App\\\\Models\\\\Admin\', 5)\",\"time\":\"4.89\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/database\\/seeders\\/AdminSeeder.php\",\"line\":53,\"hash\":\"b40636c8a9886b7fb107e3eb7dd2c0eb\",\"hostname\":\"msi\"}', '2025-01-22 02:51:54'),
(56, '9e061cdf-f8cd-49e9-8334-595229257157', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `l_s_p_s` (`lsp_name`, `updated_at`, `created_at`) values (\'New Moe Makha\', \'2025-01-22 02:51:54\', \'2025-01-22 02:51:54\')\",\"time\":\"5.49\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/database\\/seeders\\/LSPSeeder.php\",\"line\":36,\"hash\":\"e65478d7bdf5f85142c2f68a587be4a6\",\"hostname\":\"msi\"}', '2025-01-22 02:51:54'),
(57, '9e061cdf-f8ea-4095-ab31-f2ed110be6c8', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'model', '{\"action\":\"created\",\"model\":\"App\\\\Models\\\\LSP:1\",\"hostname\":\"msi\"}', '2025-01-22 02:51:54'),
(58, '9e061cdf-fb98-4c36-a607-345e3854cf79', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `l_s_p_s` (`lsp_name`, `updated_at`, `created_at`) values (\'Myint Nadi Services\', \'2025-01-22 02:51:54\', \'2025-01-22 02:51:54\')\",\"time\":\"6.43\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/database\\/seeders\\/LSPSeeder.php\",\"line\":36,\"hash\":\"e65478d7bdf5f85142c2f68a587be4a6\",\"hostname\":\"msi\"}', '2025-01-22 02:51:54'),
(59, '9e061cdf-fba8-49cd-a045-51b6a99ef4de', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'model', '{\"action\":\"created\",\"model\":\"App\\\\Models\\\\LSP:2\",\"hostname\":\"msi\"}', '2025-01-22 02:51:54'),
(60, '9e061cdf-fdf8-4284-ba72-3072bed6a309', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `l_s_p_s` (`lsp_name`, `updated_at`, `created_at`) values (\'May Oo Paing\', \'2025-01-22 02:51:54\', \'2025-01-22 02:51:54\')\",\"time\":\"5.49\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/database\\/seeders\\/LSPSeeder.php\",\"line\":36,\"hash\":\"e65478d7bdf5f85142c2f68a587be4a6\",\"hostname\":\"msi\"}', '2025-01-22 02:51:54'),
(61, '9e061cdf-fe0e-4c4a-a465-5e2c8392060a', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'model', '{\"action\":\"created\",\"model\":\"App\\\\Models\\\\LSP:3\",\"hostname\":\"msi\"}', '2025-01-22 02:51:54'),
(62, '9e061ce0-007c-46eb-aba6-a19c42a6b15b', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `l_s_p_s` (`lsp_name`, `updated_at`, `created_at`) values (\'New Royal Forty Five\', \'2025-01-22 02:51:54\', \'2025-01-22 02:51:54\')\",\"time\":\"5.76\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/database\\/seeders\\/LSPSeeder.php\",\"line\":36,\"hash\":\"e65478d7bdf5f85142c2f68a587be4a6\",\"hostname\":\"msi\"}', '2025-01-22 02:51:54'),
(63, '9e061ce0-008d-4d9c-93f8-8baa074c922f', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'model', '{\"action\":\"created\",\"model\":\"App\\\\Models\\\\LSP:4\",\"hostname\":\"msi\"}', '2025-01-22 02:51:54'),
(64, '9e061ce0-0302-42d3-852f-4c9e6a12ed22', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `l_s_p_s` (`lsp_name`, `updated_at`, `created_at`) values (\'Htein Win and Brothers\', \'2025-01-22 02:51:54\', \'2025-01-22 02:51:54\')\",\"time\":\"5.87\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/database\\/seeders\\/LSPSeeder.php\",\"line\":36,\"hash\":\"e65478d7bdf5f85142c2f68a587be4a6\",\"hostname\":\"msi\"}', '2025-01-22 02:51:54'),
(65, '9e061ce0-0321-43c3-af2f-04f322cfd9f9', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'model', '{\"action\":\"created\",\"model\":\"App\\\\Models\\\\LSP:5\",\"hostname\":\"msi\"}', '2025-01-22 02:51:54'),
(66, '9e061ce0-0523-46e6-bad5-820961a732b2', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `l_s_p_s` (`lsp_name`, `updated_at`, `created_at`) values (\'Kerry Logistics (Railway)\', \'2025-01-22 02:51:54\', \'2025-01-22 02:51:54\')\",\"time\":\"4.54\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/database\\/seeders\\/LSPSeeder.php\",\"line\":36,\"hash\":\"e65478d7bdf5f85142c2f68a587be4a6\",\"hostname\":\"msi\"}', '2025-01-22 02:51:54'),
(67, '9e061ce0-0533-4b29-8c5e-5cfc8baea39f', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'model', '{\"action\":\"created\",\"model\":\"App\\\\Models\\\\LSP:6\",\"hostname\":\"msi\"}', '2025-01-22 02:51:54'),
(68, '9e061ce0-072a-4659-8bc1-3e764fe68a00', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `l_s_p_s` (`lsp_name`, `updated_at`, `created_at`) values (\'Resources Group Logistics\', \'2025-01-22 02:51:54\', \'2025-01-22 02:51:54\')\",\"time\":\"4.58\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/database\\/seeders\\/LSPSeeder.php\",\"line\":36,\"hash\":\"e65478d7bdf5f85142c2f68a587be4a6\",\"hostname\":\"msi\"}', '2025-01-22 02:51:54'),
(69, '9e061ce0-074c-49d8-b020-094badb096af', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'model', '{\"action\":\"created\",\"model\":\"App\\\\Models\\\\LSP:7\",\"hostname\":\"msi\"}', '2025-01-22 02:51:54'),
(70, '9e061ce0-0a00-42ad-84b5-f5f7907e6150', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `l_s_p_s` (`lsp_name`, `updated_at`, `created_at`) values (\'KAT Transportation\', \'2025-01-22 02:51:54\', \'2025-01-22 02:51:54\')\",\"time\":\"6.18\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/database\\/seeders\\/LSPSeeder.php\",\"line\":36,\"hash\":\"e65478d7bdf5f85142c2f68a587be4a6\",\"hostname\":\"msi\"}', '2025-01-22 02:51:54'),
(71, '9e061ce0-0a22-4424-b66e-3d1d687694ae', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'model', '{\"action\":\"created\",\"model\":\"App\\\\Models\\\\LSP:8\",\"hostname\":\"msi\"}', '2025-01-22 02:51:54'),
(72, '9e061ce0-0c28-4d27-8ecb-a17d7575cfda', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `l_s_p_s` (`lsp_name`, `updated_at`, `created_at`) values (\'Karzo Company Limited\', \'2025-01-22 02:51:54\', \'2025-01-22 02:51:54\')\",\"time\":\"4.67\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/database\\/seeders\\/LSPSeeder.php\",\"line\":36,\"hash\":\"e65478d7bdf5f85142c2f68a587be4a6\",\"hostname\":\"msi\"}', '2025-01-22 02:51:54'),
(73, '9e061ce0-0c4a-43d9-bb2d-2f32466bc675', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'model', '{\"action\":\"created\",\"model\":\"App\\\\Models\\\\LSP:9\",\"hostname\":\"msi\"}', '2025-01-22 02:51:54'),
(74, '9e061ce0-0f54-400d-8677-0c17b8ce2441', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `l_s_p_s` (`lsp_name`, `updated_at`, `created_at`) values (\'Locomo\', \'2025-01-22 02:51:54\', \'2025-01-22 02:51:54\')\",\"time\":\"7.02\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/database\\/seeders\\/LSPSeeder.php\",\"line\":36,\"hash\":\"e65478d7bdf5f85142c2f68a587be4a6\",\"hostname\":\"msi\"}', '2025-01-22 02:51:54'),
(75, '9e061ce0-0f70-45d1-8337-d7cd1779d4a3', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'model', '{\"action\":\"created\",\"model\":\"App\\\\Models\\\\LSP:10\",\"hostname\":\"msi\"}', '2025-01-22 02:51:54'),
(76, '9e061ce0-1219-480c-9cc7-62e1ed472d6a', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `l_s_p_s` (`lsp_name`, `updated_at`, `created_at`) values (\'Customer Value Logistics\', \'2025-01-22 02:51:54\', \'2025-01-22 02:51:54\')\",\"time\":\"6.10\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/database\\/seeders\\/LSPSeeder.php\",\"line\":36,\"hash\":\"e65478d7bdf5f85142c2f68a587be4a6\",\"hostname\":\"msi\"}', '2025-01-22 02:51:54'),
(77, '9e061ce0-123c-4a4f-bed4-2d82b20f1764', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'model', '{\"action\":\"created\",\"model\":\"App\\\\Models\\\\LSP:11\",\"hostname\":\"msi\"}', '2025-01-22 02:51:54'),
(78, '9e061ce0-1456-4f22-801b-c33d60231d2e', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `l_s_p_s` (`lsp_name`, `updated_at`, `created_at`) values (\'Chindwin Cherry\', \'2025-01-22 02:51:54\', \'2025-01-22 02:51:54\')\",\"time\":\"4.66\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/database\\/seeders\\/LSPSeeder.php\",\"line\":36,\"hash\":\"e65478d7bdf5f85142c2f68a587be4a6\",\"hostname\":\"msi\"}', '2025-01-22 02:51:54'),
(79, '9e061ce0-1475-49a3-ae47-bb8395914862', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'model', '{\"action\":\"created\",\"model\":\"App\\\\Models\\\\LSP:12\",\"hostname\":\"msi\"}', '2025-01-22 02:51:54'),
(80, '9e061ce0-16dd-4ca8-8537-1a215587caa9', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `l_s_p_s` (`lsp_name`, `updated_at`, `created_at`) values (\'Myanmar Logistics Supply Chain\', \'2025-01-22 02:51:54\', \'2025-01-22 02:51:54\')\",\"time\":\"5.34\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/database\\/seeders\\/LSPSeeder.php\",\"line\":36,\"hash\":\"e65478d7bdf5f85142c2f68a587be4a6\",\"hostname\":\"msi\"}', '2025-01-22 02:51:54'),
(81, '9e061ce0-16fe-447e-a9ab-1bc03d1c33dc', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'model', '{\"action\":\"created\",\"model\":\"App\\\\Models\\\\LSP:13\",\"hostname\":\"msi\"}', '2025-01-22 02:51:54'),
(82, '9e061ce0-197e-4445-aecb-9eeb2106be7a', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `l_s_p_s` (`lsp_name`, `updated_at`, `created_at`) values (\'24 Diamonds\', \'2025-01-22 02:51:54\', \'2025-01-22 02:51:54\')\",\"time\":\"5.75\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/database\\/seeders\\/LSPSeeder.php\",\"line\":36,\"hash\":\"e65478d7bdf5f85142c2f68a587be4a6\",\"hostname\":\"msi\"}', '2025-01-22 02:51:54'),
(83, '9e061ce0-19a0-47ec-9112-f7c7081d4bdc', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'model', '{\"action\":\"created\",\"model\":\"App\\\\Models\\\\LSP:14\",\"hostname\":\"msi\"}', '2025-01-22 02:51:54'),
(84, '9e061ce0-1c02-4d29-9440-cdf43bcca256', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `l_s_p_s` (`lsp_name`, `updated_at`, `created_at`) values (\'Aung Paw Tun\', \'2025-01-22 02:51:54\', \'2025-01-22 02:51:54\')\",\"time\":\"5.35\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/database\\/seeders\\/LSPSeeder.php\",\"line\":36,\"hash\":\"e65478d7bdf5f85142c2f68a587be4a6\",\"hostname\":\"msi\"}', '2025-01-22 02:51:54'),
(85, '9e061ce0-1c22-47f1-93ca-2432cb867cad', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'model', '{\"action\":\"created\",\"model\":\"App\\\\Models\\\\LSP:15\",\"hostname\":\"msi\"}', '2025-01-22 02:51:54'),
(86, '9e061ce0-1c9d-45f0-b405-832276258bf6', '9e061ce0-1d1e-4a99-8a40-b59dae89d3a0', NULL, 1, 'command', '{\"command\":\"db:seed\",\"exit_code\":0,\"arguments\":{\"command\":\"db:seed\",\"class\":null},\"options\":{\"class\":\"Database\\\\Seeders\\\\DatabaseSeeder\",\"database\":null,\"force\":false,\"help\":false,\"quiet\":false,\"verbose\":false,\"version\":false,\"ansi\":null,\"no-interaction\":false,\"env\":null},\"hostname\":\"msi\"}', '2025-01-22 02:51:54'),
(87, '9e061d58-191e-4a01-8a42-0ec0f4765ea6', '9e061d58-1b7b-480f-b5d2-bc73f52d4350', '0f1e45e1aeb5cd40bcb78b288de52d23', 0, 'exception', '{\"class\":\"ParseError\",\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/routes\\/web.php\",\"line\":83,\"message\":\"syntax error, unexpected token \\\"<<\\\"\",\"context\":null,\"trace\":[{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Router.php\",\"line\":513},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Router.php\",\"line\":467},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/RouteRegistrar.php\",\"line\":199},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Configuration\\/ApplicationBuilder.php\",\"line\":242},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/BoundMethod.php\",\"line\":36},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/Util.php\",\"line\":43},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/BoundMethod.php\",\"line\":83},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/BoundMethod.php\",\"line\":35},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/Container.php\",\"line\":690},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Support\\/Providers\\/RouteServiceProvider.php\",\"line\":162},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Support\\/Providers\\/RouteServiceProvider.php\",\"line\":59},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/BoundMethod.php\",\"line\":36},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/Util.php\",\"line\":43},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/BoundMethod.php\",\"line\":83},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/BoundMethod.php\",\"line\":35},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/Container.php\",\"line\":690},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Support\\/ServiceProvider.php\",\"line\":144},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Application.php\",\"line\":1124},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Application.php\",\"line\":1102},[],{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Application.php\",\"line\":1101},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Bootstrap\\/BootProviders.php\",\"line\":17},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Application.php\",\"line\":316},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Console\\/Kernel.php\",\"line\":473},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Console\\/Kernel.php\",\"line\":195},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Application.php\",\"line\":1205},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/artisan\",\"line\":13}],\"line_preview\":{\"74\":\"    Route::get(\'lsp\\/{lsp}\', LSPEdit::class)->name(\'edit.lsp\');\",\"75\":\"\",\"76\":\"\",\"77\":\"\",\"78\":\"\",\"79\":\"    Route::get(\'reg\\/car\', SubmitCarRegister::class)->name(\'reg.car\');\",\"80\":\"\",\"81\":\"    Route::get(\'\\/order\\/history\', CarRegisterHistory::class)->name(\'order.history\');\",\"82\":\"\",\"83\":\"<<<<<<< HEAD\",\"84\":\"    Route::get(\'\\/qrcode\\/{id}\', [QrCodeGenController::class, \\\"qrcodegen\\\"])->name(\'qrcode.show\');\",\"85\":\"    \\/\\/ Route::get(\'\\/qrcode\\/{id}\', QrCodePage::class)->name(\'qrcode.show\');\",\"86\":\"=======\",\"87\":\"    \\/\\/ Route::get(\'\\/qrcode\\/{id}\', QrCodePage::class)->name(\'qrcode.show\');\",\"88\":\"    Route::get(\'\\/qrcode\\/{id}\', [QrCodeGenController::class, \\\"qrcodegen\\\"])->name(\'qrcode.show\');\",\"89\":\">>>>>>> 6a090f9ebd565cbe76cd1b1ff76da02f5be0895d\",\"90\":\"});\",\"91\":\"\"},\"hostname\":\"msi\",\"occurrences\":1}', '2025-01-22 02:53:13'),
(88, '9e061d58-74ca-4d14-9bd7-57bbfd673351', '9e061d58-7715-444c-8c94-3c32a7231d2f', '0f1e45e1aeb5cd40bcb78b288de52d23', 0, 'exception', '{\"class\":\"ParseError\",\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/routes\\/web.php\",\"line\":83,\"message\":\"syntax error, unexpected token \\\"<<\\\"\",\"context\":null,\"trace\":[{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Router.php\",\"line\":513},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Router.php\",\"line\":467},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/RouteRegistrar.php\",\"line\":199},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Configuration\\/ApplicationBuilder.php\",\"line\":242},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/BoundMethod.php\",\"line\":36},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/Util.php\",\"line\":43},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/BoundMethod.php\",\"line\":83},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/BoundMethod.php\",\"line\":35},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/Container.php\",\"line\":690},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Support\\/Providers\\/RouteServiceProvider.php\",\"line\":162},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Support\\/Providers\\/RouteServiceProvider.php\",\"line\":59},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/BoundMethod.php\",\"line\":36},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/Util.php\",\"line\":43},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/BoundMethod.php\",\"line\":83},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/BoundMethod.php\",\"line\":35},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/Container.php\",\"line\":690},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Support\\/ServiceProvider.php\",\"line\":144},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Application.php\",\"line\":1124},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Application.php\",\"line\":1102},[],{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Application.php\",\"line\":1101},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Bootstrap\\/BootProviders.php\",\"line\":17},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Application.php\",\"line\":316},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Console\\/Kernel.php\",\"line\":473},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Console\\/Kernel.php\",\"line\":195},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Application.php\",\"line\":1205},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/artisan\",\"line\":13}],\"line_preview\":{\"74\":\"    Route::get(\'lsp\\/{lsp}\', LSPEdit::class)->name(\'edit.lsp\');\",\"75\":\"\",\"76\":\"\",\"77\":\"\",\"78\":\"\",\"79\":\"    Route::get(\'reg\\/car\', SubmitCarRegister::class)->name(\'reg.car\');\",\"80\":\"\",\"81\":\"    Route::get(\'\\/order\\/history\', CarRegisterHistory::class)->name(\'order.history\');\",\"82\":\"\",\"83\":\"<<<<<<< HEAD\",\"84\":\"    Route::get(\'\\/qrcode\\/{id}\', [QrCodeGenController::class, \\\"qrcodegen\\\"])->name(\'qrcode.show\');\",\"85\":\"    \\/\\/ Route::get(\'\\/qrcode\\/{id}\', QrCodePage::class)->name(\'qrcode.show\');\",\"86\":\"=======\",\"87\":\"    \\/\\/ Route::get(\'\\/qrcode\\/{id}\', QrCodePage::class)->name(\'qrcode.show\');\",\"88\":\"    Route::get(\'\\/qrcode\\/{id}\', [QrCodeGenController::class, \\\"qrcodegen\\\"])->name(\'qrcode.show\');\",\"89\":\">>>>>>> 6a090f9ebd565cbe76cd1b1ff76da02f5be0895d\",\"90\":\"});\",\"91\":\"\"},\"hostname\":\"msi\",\"occurrences\":2}', '2025-01-22 02:53:13');
INSERT INTO `telescope_entries` (`sequence`, `uuid`, `batch_id`, `family_hash`, `should_display_on_index`, `type`, `content`, `created_at`) VALUES
(89, '9e061d58-fcf7-4489-bc30-004f4a088b4a', '9e061d59-3a76-44fe-801d-cd8698342b57', '0f1e45e1aeb5cd40bcb78b288de52d23', 1, 'exception', '{\"class\":\"ParseError\",\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/routes\\/web.php\",\"line\":83,\"message\":\"syntax error, unexpected token \\\"<<\\\"\",\"context\":null,\"trace\":[{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Router.php\",\"line\":513},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Router.php\",\"line\":467},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/RouteRegistrar.php\",\"line\":199},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Configuration\\/ApplicationBuilder.php\",\"line\":242},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/BoundMethod.php\",\"line\":36},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/Util.php\",\"line\":43},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/BoundMethod.php\",\"line\":83},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/BoundMethod.php\",\"line\":35},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/Container.php\",\"line\":690},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Support\\/Providers\\/RouteServiceProvider.php\",\"line\":162},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Support\\/Providers\\/RouteServiceProvider.php\",\"line\":59},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/BoundMethod.php\",\"line\":36},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/Util.php\",\"line\":43},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/BoundMethod.php\",\"line\":83},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/BoundMethod.php\",\"line\":35},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Container\\/Container.php\",\"line\":690},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Support\\/ServiceProvider.php\",\"line\":144},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Application.php\",\"line\":1124},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Application.php\",\"line\":1102},[],{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Application.php\",\"line\":1101},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Bootstrap\\/BootProviders.php\",\"line\":17},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Application.php\",\"line\":316},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Http\\/Kernel.php\",\"line\":187},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Http\\/Kernel.php\",\"line\":171},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Http\\/Kernel.php\",\"line\":145},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Application.php\",\"line\":1190},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/public\\/index.php\",\"line\":17},{\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/resources\\/server.php\",\"line\":23}],\"line_preview\":{\"74\":\"    Route::get(\'lsp\\/{lsp}\', LSPEdit::class)->name(\'edit.lsp\');\",\"75\":\"\",\"76\":\"\",\"77\":\"\",\"78\":\"\",\"79\":\"    Route::get(\'reg\\/car\', SubmitCarRegister::class)->name(\'reg.car\');\",\"80\":\"\",\"81\":\"    Route::get(\'\\/order\\/history\', CarRegisterHistory::class)->name(\'order.history\');\",\"82\":\"\",\"83\":\"<<<<<<< HEAD\",\"84\":\"    Route::get(\'\\/qrcode\\/{id}\', [QrCodeGenController::class, \\\"qrcodegen\\\"])->name(\'qrcode.show\');\",\"85\":\"    \\/\\/ Route::get(\'\\/qrcode\\/{id}\', QrCodePage::class)->name(\'qrcode.show\');\",\"86\":\"=======\",\"87\":\"    \\/\\/ Route::get(\'\\/qrcode\\/{id}\', QrCodePage::class)->name(\'qrcode.show\');\",\"88\":\"    Route::get(\'\\/qrcode\\/{id}\', [QrCodeGenController::class, \\\"qrcodegen\\\"])->name(\'qrcode.show\');\",\"89\":\">>>>>>> 6a090f9ebd565cbe76cd1b1ff76da02f5be0895d\",\"90\":\"});\",\"91\":\"\"},\"hostname\":\"msi\",\"occurrences\":3}', '2025-01-22 02:53:13'),
(90, '9e061d59-16e0-47b9-be3b-a291b08dc9b3', '9e061d59-3a76-44fe-801d-cd8698342b57', NULL, 1, 'view', '{\"name\":\"laravel-exceptions-renderer::show\",\"path\":\"\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Providers\\/..\\/resources\\/exceptions\\/renderer\\/show.blade.php\",\"data\":[\"exception\"],\"hostname\":\"msi\"}', '2025-01-22 02:53:13'),
(91, '9e061d59-1704-4edf-a4bd-b00969d96186', '9e061d59-3a76-44fe-801d-cd8698342b57', NULL, 1, 'view', '{\"name\":\"laravel-exceptions-renderer::components.navigation\",\"path\":\"\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Providers\\/..\\/resources\\/exceptions\\/renderer\\/components\\/navigation.blade.php\",\"data\":[\"exception\",\"attributes\",\"slot\",\"__laravel_slots\"],\"hostname\":\"msi\"}', '2025-01-22 02:53:13'),
(92, '9e061d59-1713-4850-8932-ee1c26cd6b5f', '9e061d59-3a76-44fe-801d-cd8698342b57', NULL, 1, 'view', '{\"name\":\"laravel-exceptions-renderer::components.theme-switcher\",\"path\":\"\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Providers\\/..\\/resources\\/exceptions\\/renderer\\/components\\/theme-switcher.blade.php\",\"data\":[\"attributes\",\"slot\",\"__laravel_slots\"],\"hostname\":\"msi\"}', '2025-01-22 02:53:13'),
(93, '9e061d59-1720-4565-8b51-1128e7cbf01e', '9e061d59-3a76-44fe-801d-cd8698342b57', NULL, 1, 'view', '{\"name\":\"laravel-exceptions-renderer::components.icons.sun\",\"path\":\"\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Providers\\/..\\/resources\\/exceptions\\/renderer\\/components\\/icons\\/sun.blade.php\",\"data\":[\"class\",\"attributes\",\"slot\",\"__laravel_slots\"],\"hostname\":\"msi\"}', '2025-01-22 02:53:13'),
(94, '9e061d59-172e-4d5a-82be-9711bb122b66', '9e061d59-3a76-44fe-801d-cd8698342b57', NULL, 1, 'view', '{\"name\":\"laravel-exceptions-renderer::components.icons.moon\",\"path\":\"\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Providers\\/..\\/resources\\/exceptions\\/renderer\\/components\\/icons\\/moon.blade.php\",\"data\":[\"class\",\"attributes\",\"slot\",\"__laravel_slots\"],\"hostname\":\"msi\"}', '2025-01-22 02:53:13'),
(95, '9e061d59-1739-4bfc-bd13-87f7c1e64a61', '9e061d59-3a76-44fe-801d-cd8698342b57', NULL, 1, 'view', '{\"name\":\"laravel-exceptions-renderer::components.icons.sun\",\"path\":\"\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Providers\\/..\\/resources\\/exceptions\\/renderer\\/components\\/icons\\/sun.blade.php\",\"data\":[\"class\",\"attributes\",\"slot\",\"__laravel_slots\"],\"hostname\":\"msi\"}', '2025-01-22 02:53:13'),
(96, '9e061d59-1743-411f-a04e-6a8335675e54', '9e061d59-3a76-44fe-801d-cd8698342b57', NULL, 1, 'view', '{\"name\":\"laravel-exceptions-renderer::components.icons.moon\",\"path\":\"\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Providers\\/..\\/resources\\/exceptions\\/renderer\\/components\\/icons\\/moon.blade.php\",\"data\":[\"class\",\"attributes\",\"slot\",\"__laravel_slots\"],\"hostname\":\"msi\"}', '2025-01-22 02:53:13'),
(97, '9e061d59-174e-4c8e-a322-db122bd32b38', '9e061d59-3a76-44fe-801d-cd8698342b57', NULL, 1, 'view', '{\"name\":\"laravel-exceptions-renderer::components.icons.computer-desktop\",\"path\":\"\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Providers\\/..\\/resources\\/exceptions\\/renderer\\/components\\/icons\\/computer-desktop.blade.php\",\"data\":[\"class\",\"attributes\",\"slot\",\"__laravel_slots\"],\"hostname\":\"msi\"}', '2025-01-22 02:53:13'),
(98, '9e061d59-175c-4c07-9c58-72e317a07782', '9e061d59-3a76-44fe-801d-cd8698342b57', NULL, 1, 'view', '{\"name\":\"laravel-exceptions-renderer::components.header\",\"path\":\"\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Providers\\/..\\/resources\\/exceptions\\/renderer\\/components\\/header.blade.php\",\"data\":[\"exception\",\"attributes\",\"slot\",\"__laravel_slots\"],\"hostname\":\"msi\"}', '2025-01-22 02:53:13'),
(99, '9e061d59-176c-4445-9c40-1b33949bf15c', '9e061d59-3a76-44fe-801d-cd8698342b57', NULL, 1, 'view', '{\"name\":\"laravel-exceptions-renderer::components.card\",\"path\":\"\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Providers\\/..\\/resources\\/exceptions\\/renderer\\/components\\/card.blade.php\",\"data\":[\"attributes\",\"slot\",\"__laravel_slots\"],\"hostname\":\"msi\"}', '2025-01-22 02:53:13'),
(100, '9e061d59-177a-4556-9f9d-50a5aab99fdc', '9e061d59-3a76-44fe-801d-cd8698342b57', NULL, 1, 'view', '{\"name\":\"laravel-exceptions-renderer::components.trace-and-editor\",\"path\":\"\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Providers\\/..\\/resources\\/exceptions\\/renderer\\/components\\/trace-and-editor.blade.php\",\"data\":[\"exception\",\"attributes\",\"slot\",\"__laravel_slots\"],\"hostname\":\"msi\"}', '2025-01-22 02:53:13'),
(101, '9e061d59-3524-49b6-905f-5582a139ee14', '9e061d59-3a76-44fe-801d-cd8698342b57', NULL, 1, 'view', '{\"name\":\"laravel-exceptions-renderer::components.trace\",\"path\":\"\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Providers\\/..\\/resources\\/exceptions\\/renderer\\/components\\/trace.blade.php\",\"data\":[\"exception\",\"attributes\",\"slot\",\"__laravel_slots\"],\"hostname\":\"msi\"}', '2025-01-22 02:53:13'),
(102, '9e061d59-353a-417e-9da2-f68426914aa2', '9e061d59-3a76-44fe-801d-cd8698342b57', NULL, 1, 'view', '{\"name\":\"laravel-exceptions-renderer::components.icons.chevron-down\",\"path\":\"\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Providers\\/..\\/resources\\/exceptions\\/renderer\\/components\\/icons\\/chevron-down.blade.php\",\"data\":[\"attributes\",\"slot\",\"__laravel_slots\"],\"hostname\":\"msi\"}', '2025-01-22 02:53:13'),
(103, '9e061d59-3547-4236-84c9-39ba62bd91f6', '9e061d59-3a76-44fe-801d-cd8698342b57', NULL, 1, 'view', '{\"name\":\"laravel-exceptions-renderer::components.icons.chevron-up\",\"path\":\"\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Providers\\/..\\/resources\\/exceptions\\/renderer\\/components\\/icons\\/chevron-up.blade.php\",\"data\":[\"attributes\",\"slot\",\"__laravel_slots\"],\"hostname\":\"msi\"}', '2025-01-22 02:53:13'),
(104, '9e061d59-3553-4ee3-98b7-0048ed643a43', '9e061d59-3a76-44fe-801d-cd8698342b57', NULL, 1, 'view', '{\"name\":\"laravel-exceptions-renderer::components.icons.chevron-up\",\"path\":\"\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Providers\\/..\\/resources\\/exceptions\\/renderer\\/components\\/icons\\/chevron-up.blade.php\",\"data\":[\"attributes\",\"slot\",\"__laravel_slots\"],\"hostname\":\"msi\"}', '2025-01-22 02:53:13'),
(105, '9e061d59-355c-40e5-a051-f0bbbce9625a', '9e061d59-3a76-44fe-801d-cd8698342b57', NULL, 1, 'view', '{\"name\":\"laravel-exceptions-renderer::components.icons.chevron-down\",\"path\":\"\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Providers\\/..\\/resources\\/exceptions\\/renderer\\/components\\/icons\\/chevron-down.blade.php\",\"data\":[\"attributes\",\"slot\",\"__laravel_slots\"],\"hostname\":\"msi\"}', '2025-01-22 02:53:13'),
(106, '9e061d59-36b5-44d8-8148-aadf00505503', '9e061d59-3a76-44fe-801d-cd8698342b57', NULL, 1, 'view', '{\"name\":\"laravel-exceptions-renderer::components.editor\",\"path\":\"\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Providers\\/..\\/resources\\/exceptions\\/renderer\\/components\\/editor.blade.php\",\"data\":[\"exception\",\"attributes\",\"slot\",\"__laravel_slots\"],\"hostname\":\"msi\"}', '2025-01-22 02:53:13'),
(107, '9e061d59-390a-4717-a243-24381b7eab00', '9e061d59-3a76-44fe-801d-cd8698342b57', NULL, 1, 'view', '{\"name\":\"laravel-exceptions-renderer::components.card\",\"path\":\"\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Providers\\/..\\/resources\\/exceptions\\/renderer\\/components\\/card.blade.php\",\"data\":[\"class\",\"attributes\",\"slot\",\"__laravel_slots\"],\"hostname\":\"msi\"}', '2025-01-22 02:53:13'),
(108, '9e061d59-3922-43df-8d6d-4b8f229672f7', '9e061d59-3a76-44fe-801d-cd8698342b57', NULL, 1, 'view', '{\"name\":\"laravel-exceptions-renderer::components.context\",\"path\":\"\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Providers\\/..\\/resources\\/exceptions\\/renderer\\/components\\/context.blade.php\",\"data\":[\"exception\",\"attributes\",\"slot\",\"__laravel_slots\"],\"hostname\":\"msi\"}', '2025-01-22 02:53:13'),
(109, '9e061d59-3935-4bee-a61d-1f9b0084cec8', '9e061d59-3a76-44fe-801d-cd8698342b57', NULL, 1, 'view', '{\"name\":\"laravel-exceptions-renderer::components.card\",\"path\":\"\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Providers\\/..\\/resources\\/exceptions\\/renderer\\/components\\/card.blade.php\",\"data\":[\"class\",\"attributes\",\"slot\",\"__laravel_slots\"],\"hostname\":\"msi\"}', '2025-01-22 02:53:13'),
(110, '9e061d59-3943-490a-aa23-3bb3ca70f203', '9e061d59-3a76-44fe-801d-cd8698342b57', NULL, 1, 'view', '{\"name\":\"laravel-exceptions-renderer::components.card\",\"path\":\"\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Providers\\/..\\/resources\\/exceptions\\/renderer\\/components\\/card.blade.php\",\"data\":[\"class\",\"attributes\",\"slot\",\"__laravel_slots\"],\"hostname\":\"msi\"}', '2025-01-22 02:53:13'),
(111, '9e061d59-3951-4792-a4a0-81b395b73dd6', '9e061d59-3a76-44fe-801d-cd8698342b57', NULL, 1, 'view', '{\"name\":\"laravel-exceptions-renderer::components.layout\",\"path\":\"\\/vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Foundation\\/Providers\\/..\\/resources\\/exceptions\\/renderer\\/components\\/layout.blade.php\",\"data\":[\"exception\",\"attributes\",\"slot\",\"__laravel_slots\"],\"hostname\":\"msi\"}', '2025-01-22 02:53:13'),
(112, '9e061d59-3a3d-4e3b-83fd-fec8fdf89cd0', '9e061d59-3a76-44fe-801d-cd8698342b57', NULL, 1, 'request', '{\"ip_address\":\"127.0.0.1\",\"uri\":\"\\/order\\/history?search=Thet%20naing\",\"method\":\"GET\",\"controller_action\":null,\"middleware\":[],\"headers\":{\"host\":\"127.0.0.1:8000\",\"connection\":\"keep-alive\",\"cache-control\":\"max-age=0\",\"sec-ch-ua\":\"\\\"Google Chrome\\\";v=\\\"131\\\", \\\"Chromium\\\";v=\\\"131\\\", \\\"Not_A Brand\\\";v=\\\"24\\\"\",\"sec-ch-ua-mobile\":\"?0\",\"sec-ch-ua-platform\":\"\\\"Linux\\\"\",\"upgrade-insecure-requests\":\"1\",\"user-agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/131.0.0.0 Safari\\/537.36\",\"accept\":\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\",\"sec-fetch-site\":\"same-origin\",\"sec-fetch-mode\":\"navigate\",\"sec-fetch-dest\":\"document\",\"referer\":\"http:\\/\\/127.0.0.1:8000\\/order\\/history?search=Thet+naing\",\"accept-encoding\":\"gzip, deflate, br, zstd\",\"accept-language\":\"en-US,en;q=0.9,my;q=0.8\",\"cookie\":\"XSRF-TOKEN=eyJpdiI6IkcyZVNMZ2xvT2NvSkM2TEdyMVRLelE9PSIsInZhbHVlIjoiWVVFVjNveVpuZnpoV1FzVkRXRzhpdk5OYlFRZVd4Y09ZblZhSk9VV1ZXWXhobXpMdGwzMk9XenBveDdWV0FaOTNkVVVLQXJJU05iS3cvdXZmYlJWQTlnNHZjZUU4NmVqZzlWejUxUzROT2FvRkkrTitDbUxRK2dhQnpya2NLZzEiLCJtYWMiOiI3NTRlYjEwY2U3MWViOTI0NDFkMTM4OGY1YzJlZGYxZTcwZjUwMTI4NzgwYWI4YTU0MTBiNTIyNTIyNGU3YzNhIiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6IjJmSytoQmZRdFBkMzBZUGwvSUJ0Y1E9PSIsInZhbHVlIjoiSytqemFCOFZVVk5iam1xQ0lKV3RCRGhSVjQ3d0tWRkpCTEhGdU00RFZyZVdsa0Y5bWNOd0c3YTZnNE9tVnNybVFYT1l5Mm5CWnlOUGlONzQ0YlNqSjk2RmtNK2NLa29KWDA0VXBGakd0a2NHZ1Z6T3JNek12MVEvMGdvVU54eWwiLCJtYWMiOiIxNWZhOThlNmI0MzQ1NmYzY2YyMWY1NGU5NmJlNDdlMmNkNmUzZGViN2FiNGQ2YTRkN2UxMWNlMzI1NGJhNjZmIiwidGFnIjoiIn0%3D\"},\"payload\":{\"search\":\"Thet naing\"},\"session\":[],\"response_status\":500,\"response\":\"HTML Response\",\"duration\":181,\"memory\":16,\"hostname\":\"msi\"}', '2025-01-22 02:53:13'),
(113, '9e061dd0-0067-4e3d-a8a4-4cd16c0b013c', '9e061dd0-1320-4d05-9547-1866666e5256', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `sessions` where `id` = \'tCBcwIJlUzEd0j8xGNyMXfnMWCAHHCmZTyPK9S2d\' limit 1\",\"time\":\"0.65\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/public\\/index.php\",\"line\":17,\"hash\":\"f48fa5df8fd323d753d03a2e0070fcde\",\"hostname\":\"msi\"}', '2025-01-22 02:54:31'),
(114, '9e061dd0-0db1-4298-acb8-f1e7234f1abf', '9e061dd0-1320-4d05-9547-1866666e5256', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `sessions` where `id` = \'tCBcwIJlUzEd0j8xGNyMXfnMWCAHHCmZTyPK9S2d\' limit 1\",\"time\":\"0.59\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/public\\/index.php\",\"line\":17,\"hash\":\"f48fa5df8fd323d753d03a2e0070fcde\",\"hostname\":\"msi\"}', '2025-01-22 02:54:31'),
(115, '9e061dd0-1011-47e4-956a-4cb4b98861f6', '9e061dd0-1320-4d05-9547-1866666e5256', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `sessions` (`payload`, `last_activity`, `user_id`, `ip_address`, `user_agent`, `id`) values (\'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQWRidGViR0VyOU1Ga3V4S1hxTEdvZ1hPY0ZScnBQTVFBQjc3bVNuRCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo1NToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL29yZGVyL2hpc3Rvcnk\\/c2VhcmNoPVRoZXQlMjBuYWluZyI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjU1OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvb3JkZXIvaGlzdG9yeT9zZWFyY2g9VGhldCUyMG5haW5nIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==\', 1737491071, null, \'127.0.0.1\', \'Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/131.0.0.0 Safari\\/537.36\', \'tCBcwIJlUzEd0j8xGNyMXfnMWCAHHCmZTyPK9S2d\')\",\"time\":\"5.37\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/public\\/index.php\",\"line\":17,\"hash\":\"566661626de27be35c0f28e73b1dccf0\",\"hostname\":\"msi\"}', '2025-01-22 02:54:31'),
(116, '9e061dd0-10e2-497a-965d-bb99548ef1e9', '9e061dd0-1320-4d05-9547-1866666e5256', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `sessions` where `id` = \'tCBcwIJlUzEd0j8xGNyMXfnMWCAHHCmZTyPK9S2d\' limit 1\",\"time\":\"0.63\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/public\\/index.php\",\"line\":17,\"hash\":\"f48fa5df8fd323d753d03a2e0070fcde\",\"hostname\":\"msi\"}', '2025-01-22 02:54:31'),
(117, '9e061dd0-1262-475c-adc0-cdf755d319f2', '9e061dd0-1320-4d05-9547-1866666e5256', NULL, 1, 'debugbar', '{\"requestId\":\"X8a844827b637e21f76f7bd6dbc4967ec\",\"hostname\":\"msi\"}', '2025-01-22 02:54:31'),
(118, '9e061dd0-12c6-4bcf-8e82-1ae5b7ee996d', '9e061dd0-1320-4d05-9547-1866666e5256', NULL, 1, 'request', '{\"ip_address\":\"127.0.0.1\",\"uri\":\"\\/order\\/history?search=Thet%20naing\",\"method\":\"GET\",\"controller_action\":\"App\\\\Livewire\\\\CarRegister\\\\CarRegisterHistory\",\"middleware\":[\"web\",\"auth:admin\"],\"headers\":{\"host\":\"127.0.0.1:8000\",\"connection\":\"keep-alive\",\"cache-control\":\"max-age=0\",\"sec-ch-ua\":\"\\\"Google Chrome\\\";v=\\\"131\\\", \\\"Chromium\\\";v=\\\"131\\\", \\\"Not_A Brand\\\";v=\\\"24\\\"\",\"sec-ch-ua-mobile\":\"?0\",\"sec-ch-ua-platform\":\"\\\"Linux\\\"\",\"upgrade-insecure-requests\":\"1\",\"user-agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/131.0.0.0 Safari\\/537.36\",\"accept\":\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\",\"sec-fetch-site\":\"same-origin\",\"sec-fetch-mode\":\"navigate\",\"sec-fetch-dest\":\"document\",\"referer\":\"http:\\/\\/127.0.0.1:8000\\/order\\/history?search=Thet+naing\",\"accept-encoding\":\"gzip, deflate, br, zstd\",\"accept-language\":\"en-US,en;q=0.9,my;q=0.8\",\"cookie\":\"XSRF-TOKEN=eyJpdiI6IkcyZVNMZ2xvT2NvSkM2TEdyMVRLelE9PSIsInZhbHVlIjoiWVVFVjNveVpuZnpoV1FzVkRXRzhpdk5OYlFRZVd4Y09ZblZhSk9VV1ZXWXhobXpMdGwzMk9XenBveDdWV0FaOTNkVVVLQXJJU05iS3cvdXZmYlJWQTlnNHZjZUU4NmVqZzlWejUxUzROT2FvRkkrTitDbUxRK2dhQnpya2NLZzEiLCJtYWMiOiI3NTRlYjEwY2U3MWViOTI0NDFkMTM4OGY1YzJlZGYxZTcwZjUwMTI4NzgwYWI4YTU0MTBiNTIyNTIyNGU3YzNhIiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6IjJmSytoQmZRdFBkMzBZUGwvSUJ0Y1E9PSIsInZhbHVlIjoiSytqemFCOFZVVk5iam1xQ0lKV3RCRGhSVjQ3d0tWRkpCTEhGdU00RFZyZVdsa0Y5bWNOd0c3YTZnNE9tVnNybVFYT1l5Mm5CWnlOUGlONzQ0YlNqSjk2RmtNK2NLa29KWDA0VXBGakd0a2NHZ1Z6T3JNek12MVEvMGdvVU54eWwiLCJtYWMiOiIxNWZhOThlNmI0MzQ1NmYzY2YyMWY1NGU5NmJlNDdlMmNkNmUzZGViN2FiNGQ2YTRkN2UxMWNlMzI1NGJhNjZmIiwidGFnIjoiIn0%3D\"},\"payload\":{\"search\":\"Thet naing\"},\"session\":{\"_token\":\"AdbtebGEr9MFkuxKXqLGogXOcFRrpPMQAB77mSnD\",\"url\":{\"intended\":\"http:\\/\\/127.0.0.1:8000\\/order\\/history?search=Thet%20naing\"},\"_previous\":{\"url\":\"http:\\/\\/127.0.0.1:8000\\/order\\/history?search=Thet%20naing\"},\"_flash\":{\"old\":[],\"new\":[]},\"PHPDEBUGBAR_STACK_DATA\":{\"X8a844827b637e21f76f7bd6dbc4967ec\":null}},\"response_status\":302,\"response\":\"Redirected to http:\\/\\/127.0.0.1:8000\\/login\",\"duration\":67,\"memory\":14,\"hostname\":\"msi\"}', '2025-01-22 02:54:31'),
(119, '9e061dd0-1e8d-4470-bcb0-678074563f35', '9e061dd0-3144-4bae-b71f-fda7099c4f7a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `sessions` where `id` = \'tCBcwIJlUzEd0j8xGNyMXfnMWCAHHCmZTyPK9S2d\' limit 1\",\"time\":\"0.78\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/public\\/index.php\",\"line\":17,\"hash\":\"f48fa5df8fd323d753d03a2e0070fcde\",\"hostname\":\"msi\"}', '2025-01-22 02:54:31'),
(120, '9e061dd0-2bfe-46e5-a461-0eae39fd5266', '9e061dd0-3144-4bae-b71f-fda7099c4f7a', NULL, 1, 'view', '{\"name\":\"livewire.login\",\"path\":\"\\/resources\\/views\\/livewire\\/login.blade.php\",\"data\":[\"layoutConfig\",\"email\",\"password\"],\"composers\":[{\"name\":\"Closure at \\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[259:261]\",\"type\":\"composer\"}],\"hostname\":\"msi\"}', '2025-01-22 02:54:31'),
(121, '9e061dd0-2c69-4410-9048-cf723c819cf2', '9e061dd0-3144-4bae-b71f-fda7099c4f7a', NULL, 1, 'view', '{\"name\":\"__components::4943bc92ebba41e8b0e508149542e0ad\",\"path\":\"\\/storage\\/framework\\/views\\/4943bc92ebba41e8b0e508149542e0ad.blade.php\",\"data\":[\"content\",\"layout\"],\"composers\":[{\"name\":\"Closure at \\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[259:261]\",\"type\":\"composer\"}],\"hostname\":\"msi\"}', '2025-01-22 02:54:31'),
(122, '9e061dd0-2c81-49a2-8adf-a6f26e9cf664', '9e061dd0-3144-4bae-b71f-fda7099c4f7a', NULL, 1, 'view', '{\"name\":\"custom.app\",\"path\":\"\\/resources\\/views\\/custom\\/app.blade.php\",\"data\":[\"title\",\"attributes\",\"slot\",\"__laravel_slots\"],\"composers\":[{\"name\":\"Closure at \\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[259:261]\",\"type\":\"composer\"}],\"hostname\":\"msi\"}', '2025-01-22 02:54:31'),
(123, '9e061dd0-2ef5-4f15-b15b-5c705cb44a3d', '9e061dd0-3144-4bae-b71f-fda7099c4f7a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"update `sessions` set `payload` = \'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQWRidGViR0VyOU1Ga3V4S1hxTEdvZ1hPY0ZScnBQTVFBQjc3bVNuRCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo1NToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL29yZGVyL2hpc3Rvcnk\\/c2VhcmNoPVRoZXQlMjBuYWluZyI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19\', `last_activity` = 1737491071, `user_id` = null, `ip_address` = \'127.0.0.1\', `user_agent` = \'Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/131.0.0.0 Safari\\/537.36\' where `id` = \'tCBcwIJlUzEd0j8xGNyMXfnMWCAHHCmZTyPK9S2d\'\",\"time\":\"5.21\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/public\\/index.php\",\"line\":17,\"hash\":\"8ca748303d971bd62c762f74392caa83\",\"hostname\":\"msi\"}', '2025-01-22 02:54:31'),
(124, '9e061dd0-2fcf-4adf-88dc-2377c1d71bf4', '9e061dd0-3144-4bae-b71f-fda7099c4f7a', NULL, 1, 'debugbar', '{\"requestId\":\"Xd2fd23f18b0dce354e3263ae172b52cd\",\"hostname\":\"msi\"}', '2025-01-22 02:54:31'),
(125, '9e061dd0-30be-425b-afee-c1a219cc87ff', '9e061dd0-3144-4bae-b71f-fda7099c4f7a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `sessions` where `id` = \'tCBcwIJlUzEd0j8xGNyMXfnMWCAHHCmZTyPK9S2d\' limit 1\",\"time\":\"0.59\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/public\\/index.php\",\"line\":17,\"hash\":\"f48fa5df8fd323d753d03a2e0070fcde\",\"hostname\":\"msi\"}', '2025-01-22 02:54:31'),
(126, '9e061dd0-30ff-41ba-bfe9-90cff48bcee4', '9e061dd0-3144-4bae-b71f-fda7099c4f7a', NULL, 1, 'request', '{\"ip_address\":\"127.0.0.1\",\"uri\":\"\\/login\",\"method\":\"GET\",\"controller_action\":\"App\\\\Livewire\\\\Login@__invoke\",\"middleware\":[\"web\"],\"headers\":{\"host\":\"127.0.0.1:8000\",\"connection\":\"keep-alive\",\"cache-control\":\"max-age=0\",\"upgrade-insecure-requests\":\"1\",\"user-agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/131.0.0.0 Safari\\/537.36\",\"accept\":\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\",\"sec-fetch-site\":\"same-origin\",\"sec-fetch-mode\":\"navigate\",\"sec-fetch-dest\":\"document\",\"sec-ch-ua\":\"\\\"Google Chrome\\\";v=\\\"131\\\", \\\"Chromium\\\";v=\\\"131\\\", \\\"Not_A Brand\\\";v=\\\"24\\\"\",\"sec-ch-ua-mobile\":\"?0\",\"sec-ch-ua-platform\":\"\\\"Linux\\\"\",\"referer\":\"http:\\/\\/127.0.0.1:8000\\/order\\/history?search=Thet+naing\",\"accept-encoding\":\"gzip, deflate, br, zstd\",\"accept-language\":\"en-US,en;q=0.9,my;q=0.8\",\"cookie\":\"XSRF-TOKEN=eyJpdiI6ImVoempubW5yb3hIdGtxYXByZjdkbWc9PSIsInZhbHVlIjoiamVRaDZhT2pMTGpkbFBFZ1UvN0tiQmkzbkVZT21OaGxIZHNnSzF4YVczSTdiZ1pGNHlYZGdsWXZIb3JrTWtadmxhTUtBYzhrVnZrRkRiSVRUSTJhbDNIL2hCZjhCWFVxYVpHS09TRE9lLzFKZVJHTzFranBOdk84aCtlWnJOeGgiLCJtYWMiOiJhNTQ3YWUxYzU3MjdiOTgyMmMwMmE4NTNlNTZkY2E3YmZiOTAzZDhlZWZhNjlmOWM4NmYzY2MxNzFiY2MwN2IwIiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6IlE0eVE5bVAvOGY3dk5Ld0JSZGNDcGc9PSIsInZhbHVlIjoiRFoxbmRRYWdDWm1TalRZN1RBYzE4ZlJUd3k4bVZEakQ0ZytHR2FTbXBXNU5WbTJ0UXkyc1JPQ1B1OXNzOGN2Wnh2MkhwVWUrZjJTUytTdnl3enNBYVNTSFJ2MUZ6U0RpUlB6dHQ3ZjhnZnprTXBOMzhDcWpXSk5DaHIvN0JmaHIiLCJtYWMiOiJjMjZiZDg5ODAwNjEyNjMyZGY0ZTQwZjE4M2E2MjMyMjg0YzYwZDVhODVmZWQwOTJjNjNhYzRkODYzMTA3ZThjIiwidGFnIjoiIn0%3D\"},\"payload\":[],\"session\":{\"_token\":\"AdbtebGEr9MFkuxKXqLGogXOcFRrpPMQAB77mSnD\",\"url\":{\"intended\":\"http:\\/\\/127.0.0.1:8000\\/order\\/history?search=Thet%20naing\"},\"_previous\":{\"url\":\"http:\\/\\/127.0.0.1:8000\\/login\"},\"_flash\":{\"old\":[],\"new\":[]},\"PHPDEBUGBAR_STACK_DATA\":[]},\"response_status\":200,\"response\":\"HTML Response\",\"duration\":66,\"memory\":14,\"hostname\":\"msi\"}', '2025-01-22 02:54:31'),
(127, '9e061dd0-7ca1-4432-aa16-0b28182721e3', '9e061dd0-7dd5-4bab-a5da-70a069c932fb', NULL, 1, 'command', '{\"command\":\"route:list\",\"exit_code\":0,\"arguments\":{\"command\":\"route:list\"},\"options\":{\"json\":true,\"method\":null,\"name\":null,\"domain\":null,\"path\":null,\"except-path\":null,\"reverse\":false,\"sort\":\"uri\",\"except-vendor\":false,\"only-vendor\":false,\"help\":false,\"quiet\":false,\"verbose\":false,\"version\":false,\"ansi\":null,\"no-interaction\":false,\"env\":null},\"hostname\":\"msi\"}', '2025-01-22 02:54:31'),
(128, '9e061e0d-082d-4e8e-82a7-c9a141311570', '9e061e0d-2179-4f9e-8661-60553f88cef9', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `sessions` where `id` = \'tCBcwIJlUzEd0j8xGNyMXfnMWCAHHCmZTyPK9S2d\' limit 1\",\"time\":\"0.64\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/public\\/index.php\",\"line\":17,\"hash\":\"f48fa5df8fd323d753d03a2e0070fcde\",\"hostname\":\"msi\"}', '2025-01-22 02:55:11'),
(129, '9e061e0d-1709-45fe-b990-c78f24f8999d', '9e061e0d-2179-4f9e-8661-60553f88cef9', NULL, 1, 'view', '{\"name\":\"livewire.login\",\"path\":\"\\/resources\\/views\\/livewire\\/login.blade.php\",\"data\":[\"layoutConfig\",\"email\",\"password\"],\"composers\":[{\"name\":\"Closure at \\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[259:261]\",\"type\":\"composer\"}],\"hostname\":\"msi\"}', '2025-01-22 02:55:11'),
(130, '9e061e0d-1764-463a-9823-ede7bd3bedec', '9e061e0d-2179-4f9e-8661-60553f88cef9', NULL, 1, 'view', '{\"name\":\"__components::4943bc92ebba41e8b0e508149542e0ad\",\"path\":\"\\/storage\\/framework\\/views\\/4943bc92ebba41e8b0e508149542e0ad.blade.php\",\"data\":[\"content\",\"layout\"],\"composers\":[{\"name\":\"Closure at \\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[259:261]\",\"type\":\"composer\"}],\"hostname\":\"msi\"}', '2025-01-22 02:55:11'),
(131, '9e061e0d-1781-42ef-a97d-d96a60252aa3', '9e061e0d-2179-4f9e-8661-60553f88cef9', NULL, 1, 'view', '{\"name\":\"custom.app\",\"path\":\"\\/resources\\/views\\/custom\\/app.blade.php\",\"data\":[\"title\",\"attributes\",\"slot\",\"__laravel_slots\"],\"composers\":[{\"name\":\"Closure at \\/home\\/msi\\/Desktop\\/client\\/car_project\\/vendor\\/barryvdh\\/laravel-debugbar\\/src\\/LaravelDebugbar.php[259:261]\",\"type\":\"composer\"}],\"hostname\":\"msi\"}', '2025-01-22 02:55:11'),
(132, '9e061e0d-1eea-442a-9614-7bd697884b3d', '9e061e0d-2179-4f9e-8661-60553f88cef9', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"update `sessions` set `payload` = \'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQWRidGViR0VyOU1Ga3V4S1hxTEdvZ1hPY0ZScnBQTVFBQjc3bVNuRCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo1NToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL29yZGVyL2hpc3Rvcnk\\/c2VhcmNoPVRoZXQlMjBuYWluZyI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19\', `last_activity` = 1737491111, `user_id` = null, `ip_address` = \'127.0.0.1\', `user_agent` = \'Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/131.0.0.0 Safari\\/537.36\' where `id` = \'tCBcwIJlUzEd0j8xGNyMXfnMWCAHHCmZTyPK9S2d\'\",\"time\":\"17.98\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/public\\/index.php\",\"line\":17,\"hash\":\"8ca748303d971bd62c762f74392caa83\",\"hostname\":\"msi\"}', '2025-01-22 02:55:11'),
(133, '9e061e0d-1fb8-4c46-9226-851b0ffdce69', '9e061e0d-2179-4f9e-8661-60553f88cef9', NULL, 1, 'debugbar', '{\"requestId\":\"Xdf96ac79ee84423b0b9742afe1f78cdf\",\"hostname\":\"msi\"}', '2025-01-22 02:55:11'),
(134, '9e061e0d-20b8-49b0-b578-fc276cc80edf', '9e061e0d-2179-4f9e-8661-60553f88cef9', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `sessions` where `id` = \'tCBcwIJlUzEd0j8xGNyMXfnMWCAHHCmZTyPK9S2d\' limit 1\",\"time\":\"0.48\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/client\\/car_project\\/public\\/index.php\",\"line\":17,\"hash\":\"f48fa5df8fd323d753d03a2e0070fcde\",\"hostname\":\"msi\"}', '2025-01-22 02:55:11'),
(135, '9e061e0d-2108-44e8-b989-b7c4306485ed', '9e061e0d-2179-4f9e-8661-60553f88cef9', NULL, 1, 'request', '{\"ip_address\":\"127.0.0.1\",\"uri\":\"\\/login\",\"method\":\"GET\",\"controller_action\":\"App\\\\Livewire\\\\Login@__invoke\",\"middleware\":[\"web\"],\"headers\":{\"host\":\"127.0.0.1:8000\",\"connection\":\"keep-alive\",\"cache-control\":\"max-age=0\",\"sec-ch-ua\":\"\\\"Google Chrome\\\";v=\\\"131\\\", \\\"Chromium\\\";v=\\\"131\\\", \\\"Not_A Brand\\\";v=\\\"24\\\"\",\"sec-ch-ua-mobile\":\"?0\",\"sec-ch-ua-platform\":\"\\\"Linux\\\"\",\"upgrade-insecure-requests\":\"1\",\"user-agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/131.0.0.0 Safari\\/537.36\",\"accept\":\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\",\"sec-fetch-site\":\"same-origin\",\"sec-fetch-mode\":\"navigate\",\"sec-fetch-dest\":\"document\",\"referer\":\"http:\\/\\/127.0.0.1:8000\\/login\",\"accept-encoding\":\"gzip, deflate, br, zstd\",\"accept-language\":\"en-US,en;q=0.9,my;q=0.8\",\"cookie\":\"XSRF-TOKEN=eyJpdiI6ImdvdTlFZEU0R1o3UUlmM3hQQm9NU1E9PSIsInZhbHVlIjoiYXhTd3lPb1YrZ0NTY2F3R2Nxc1NzQWVaeUpRdmF2V25UNzBhUE4vWmJGTjBlNUVVVGJrQUhlcUFXd3EwazZ6NnMwSy8wY1ZpN2lzaTgvZm1FL1lqZkpGOWVLUWF6bVJ2NW42dmFwOTNDMFJ1bHNBY29HNzBBaTZZbzRHTnhHVFoiLCJtYWMiOiJmMjE0ODc0MmJhOGIzNmFhYWU0Yzk5NmE1ZjZiZjYxOGRlZTQ2ZjBjMzA0NzkyZjFkMDM3OWEzZGRmNTEyOTBjIiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6IlJPNUwwdUUwKzE0elR3ZjN2OXA3cFE9PSIsInZhbHVlIjoiK0djU0lWVmFWS0szVi9BR3JMbEhPWXpHdTFrVVZ5ZHhZWW0zMVJqZXFSSUEzUHFtbWxnSjl0dXFLbTZFQW9HaVh3WVUySGF6RG9vT1JjakUzTGo1Y0Z0cXNtZHRyMEQ5Z3NHeGZTMzVUVnRXTXlwM0tuRjY1M1pKLzVJTElQa28iLCJtYWMiOiI3OTI2NTkyNjczOTRkOGI4YzA0ZGI4ZjVmMmE1YzYxNzJiYWM0MzlhZDE3MTg5MzY3ZGZiNTc0ZmNhNTMyM2Y4IiwidGFnIjoiIn0%3D\"},\"payload\":[],\"session\":{\"_token\":\"AdbtebGEr9MFkuxKXqLGogXOcFRrpPMQAB77mSnD\",\"url\":{\"intended\":\"http:\\/\\/127.0.0.1:8000\\/order\\/history?search=Thet%20naing\"},\"_previous\":{\"url\":\"http:\\/\\/127.0.0.1:8000\\/login\"},\"_flash\":{\"old\":[],\"new\":[]},\"PHPDEBUGBAR_STACK_DATA\":[]},\"response_status\":200,\"response\":\"HTML Response\",\"duration\":81,\"memory\":14,\"hostname\":\"msi\"}', '2025-01-22 02:55:11');

-- --------------------------------------------------------

--
-- Table structure for table `telescope_entries_tags`
--

CREATE TABLE `telescope_entries_tags` (
  `entry_uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `telescope_entries_tags`
--

INSERT INTO `telescope_entries_tags` (`entry_uuid`, `tag`) VALUES
('9e061cde-be81-4323-b570-b82b3cac130d', 'App\\Models\\Admin:1'),
('9e061cdf-0cf3-465b-8f02-cc72d8f245f1', 'App\\Models\\Admin:2'),
('9e061cdf-5b26-4c5e-80a7-198b277b3e0a', 'App\\Models\\Admin:3'),
('9e061cdf-a967-403c-a3cc-62c762e7e6a0', 'App\\Models\\Admin:4'),
('9e061cdf-f2e3-4565-bf8e-a4ac8fae7856', 'App\\Models\\Admin:5'),
('9e061cdf-f8ea-4095-ab31-f2ed110be6c8', 'App\\Models\\LSP:1'),
('9e061ce0-0f70-45d1-8337-d7cd1779d4a3', 'App\\Models\\LSP:10'),
('9e061ce0-123c-4a4f-bed4-2d82b20f1764', 'App\\Models\\LSP:11'),
('9e061ce0-1475-49a3-ae47-bb8395914862', 'App\\Models\\LSP:12'),
('9e061ce0-16fe-447e-a9ab-1bc03d1c33dc', 'App\\Models\\LSP:13'),
('9e061ce0-19a0-47ec-9112-f7c7081d4bdc', 'App\\Models\\LSP:14'),
('9e061ce0-1c22-47f1-93ca-2432cb867cad', 'App\\Models\\LSP:15'),
('9e061cdf-fba8-49cd-a045-51b6a99ef4de', 'App\\Models\\LSP:2'),
('9e061cdf-fe0e-4c4a-a465-5e2c8392060a', 'App\\Models\\LSP:3'),
('9e061ce0-008d-4d9c-93f8-8baa074c922f', 'App\\Models\\LSP:4'),
('9e061ce0-0321-43c3-af2f-04f322cfd9f9', 'App\\Models\\LSP:5'),
('9e061ce0-0533-4b29-8c5e-5cfc8baea39f', 'App\\Models\\LSP:6'),
('9e061ce0-074c-49d8-b020-094badb096af', 'App\\Models\\LSP:7'),
('9e061ce0-0a22-4424-b66e-3d1d687694ae', 'App\\Models\\LSP:8'),
('9e061ce0-0c4a-43d9-bb2d-2f32466bc675', 'App\\Models\\LSP:9'),
('9e061cde-bf60-4cc5-a4af-c0f67e9392d5', 'Spatie\\Permission\\Models\\Role'),
('9e061cde-5d1f-40f9-9c02-9bb5559e47c2', 'Spatie\\Permission\\Models\\Role:1'),
('9e061cde-6257-4303-a4ca-1c014752074c', 'Spatie\\Permission\\Models\\Role:2'),
('9e061cde-65ea-409f-a0a1-97bc7d076f25', 'Spatie\\Permission\\Models\\Role:3'),
('9e061cde-6a2b-459e-bf0f-806d5e6ad12a', 'Spatie\\Permission\\Models\\Role:4'),
('9e061cde-6e37-484d-b119-0a3a4a7f3335', 'Spatie\\Permission\\Models\\Role:5');

-- --------------------------------------------------------

--
-- Table structure for table `telescope_monitoring`
--

CREATE TABLE `telescope_monitoring` (
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trucks`
--

CREATE TABLE `trucks` (
  `id` bigint UNSIGNED NOT NULL,
  `lsp_id` bigint UNSIGNED DEFAULT NULL,
  `licence_plate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicle_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `student_id` int DEFAULT NULL,
  `student_code` text COLLATE utf8mb4_unicode_ci,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` int DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reg_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','active','inactive','suspend') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `car_registrations`
--
ALTER TABLE `car_registrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `l_s_p_s`
--
ALTER TABLE `l_s_p_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `telescope_entries`
--
ALTER TABLE `telescope_entries`
  ADD PRIMARY KEY (`sequence`),
  ADD UNIQUE KEY `telescope_entries_uuid_unique` (`uuid`),
  ADD KEY `telescope_entries_batch_id_index` (`batch_id`),
  ADD KEY `telescope_entries_family_hash_index` (`family_hash`),
  ADD KEY `telescope_entries_created_at_index` (`created_at`),
  ADD KEY `telescope_entries_type_should_display_on_index_index` (`type`,`should_display_on_index`);

--
-- Indexes for table `telescope_entries_tags`
--
ALTER TABLE `telescope_entries_tags`
  ADD PRIMARY KEY (`entry_uuid`,`tag`),
  ADD KEY `telescope_entries_tags_tag_index` (`tag`);

--
-- Indexes for table `telescope_monitoring`
--
ALTER TABLE `telescope_monitoring`
  ADD PRIMARY KEY (`tag`);

--
-- Indexes for table `trucks`
--
ALTER TABLE `trucks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `car_registrations`
--
ALTER TABLE `car_registrations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `l_s_p_s`
--
ALTER TABLE `l_s_p_s`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `telescope_entries`
--
ALTER TABLE `telescope_entries`
  MODIFY `sequence` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `trucks`
--
ALTER TABLE `trucks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `telescope_entries_tags`
--
ALTER TABLE `telescope_entries_tags`
  ADD CONSTRAINT `telescope_entries_tags_entry_uuid_foreign` FOREIGN KEY (`entry_uuid`) REFERENCES `telescope_entries` (`uuid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
