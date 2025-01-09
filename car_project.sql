-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 09, 2025 at 03:28 AM
-- Server version: 8.0.40-0ubuntu0.22.04.1
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
(1, 'RootAdmin', 1, 'root@admin.com', NULL, '$2y$12$TQhzCbM50xX2v2p7rKDzJurBwhvzNIUhvc6G3O4RBXEqSvU5OkpyS', NULL, NULL, '2025-01-08 20:58:16', '2025-01-08 20:58:16'),
(2, 'Admin', 2, 'admin@gmail.com', NULL, '$2y$12$IBWhWP46jXU9JFrsQqW4OuahWoOhYcSF3jDhQXwo.XQxfjsy4tziu', NULL, NULL, '2025-01-08 20:58:16', '2025-01-08 20:58:16');

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
(13, '0001_01_01_000000_create_users_table', 1),
(14, '0001_01_01_000001_create_cache_table', 1),
(15, '0001_01_01_000002_create_jobs_table', 1),
(16, '2024_09_17_081239_create_admins_table', 1),
(17, '2024_09_20_042754_create_personal_access_tokens_table', 1),
(18, '2024_09_23_071452_create_oauth_auth_codes_table', 1),
(19, '2024_09_23_071453_create_oauth_access_tokens_table', 1),
(20, '2024_09_23_071454_create_oauth_refresh_tokens_table', 1),
(21, '2024_09_23_071455_create_oauth_clients_table', 1),
(22, '2024_09_23_071456_create_oauth_personal_access_clients_table', 1),
(23, '2024_10_01_020509_create_permission_tables', 1),
(24, '2024_10_04_050851_create_telescope_entries_table', 1);

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
(2, 'App\\Models\\Admin', 2);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'index', 'admin', '2025-01-08 20:58:15', '2025-01-08 20:58:15'),
(2, 'create', 'admin', '2025-01-08 20:58:15', '2025-01-08 20:58:15'),
(3, 'show', 'admin', '2025-01-08 20:58:15', '2025-01-08 20:58:15'),
(4, 'edit', 'admin', '2025-01-08 20:58:15', '2025-01-08 20:58:15'),
(5, 'delete', 'admin', '2025-01-08 20:58:15', '2025-01-08 20:58:15'),
(6, 'forum', 'admin', '2025-01-08 20:58:15', '2025-01-08 20:58:15'),
(7, 'user-approve', 'admin', '2025-01-08 20:58:15', '2025-01-08 20:58:15');

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
(1, 'root-admin', 'admin', '2025-01-08 20:58:15', '2025-01-08 20:58:15'),
(2, 'admin', 'admin', '2025-01-08 20:58:15', '2025-01-08 20:58:15');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(1, 2),
(2, 2),
(3, 2);

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
(1, '9dec8e56-93e9-4a54-b907-7c3324d002a6', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select exists (select 1 from information_schema.tables where table_schema = \'car_project\' and table_name = \'migrations\' and table_type in (\'BASE TABLE\', \'SYSTEM VERSIONED\')) as `exists`\",\"time\":\"1.29\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/artisan\",\"line\":13,\"hash\":\"e8f97e3f6b064a22481450e45f84636e\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:38'),
(2, '9dec8e56-95cc-4edd-927c-9b04ca1c2380', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select exists (select 1 from information_schema.tables where table_schema = \'car_project\' and table_name = \'migrations\' and table_type in (\'BASE TABLE\', \'SYSTEM VERSIONED\')) as `exists`\",\"time\":\"1.09\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/artisan\",\"line\":13,\"hash\":\"e8f97e3f6b064a22481450e45f84636e\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:38'),
(3, '9dec8e56-963f-481c-bfcc-f9a9d3b0edb4', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select `migration` from `migrations` order by `batch` asc, `migration` asc\",\"time\":\"0.47\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/artisan\",\"line\":13,\"hash\":\"ed08a59c7f0b8851f0fd2291ca94d5c7\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:38'),
(4, '9dec8e56-96c0-49ec-9583-c55c884ebcd4', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select `migration` from `migrations` order by `batch` asc, `migration` asc\",\"time\":\"0.41\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/artisan\",\"line\":13,\"hash\":\"ed08a59c7f0b8851f0fd2291ca94d5c7\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:38'),
(5, '9dec8e56-9798-491b-8013-daff16a9c865', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select max(`batch`) as aggregate from `migrations`\",\"time\":\"0.44\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/artisan\",\"line\":13,\"hash\":\"06e60d7b3d1a0c2de504de4e6f27735e\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:38'),
(6, '9dec8e56-b74b-4d0a-91eb-c46902a30885', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"create table `users` (`id` bigint unsigned not null auto_increment primary key, `student_id` int null, `student_code` text null, `name` varchar(255) not null, `email` varchar(255) not null, `phone` varchar(255) null, `country_id` int null, `password` varchar(255) not null, `reg_type` varchar(255) not null, `status` enum(\'pending\', \'active\', \'inactive\', \'suspend\') not null default \'pending\', `email_verified_at` timestamp null, `remember_token` varchar(100) null, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate \'utf8mb4_unicode_ci\'\",\"time\":\"73.65\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/migrations\\/0001_01_01_000000_create_users_table.php\",\"line\":13,\"hash\":\"5064838f6051c1b666d7a4ccd7cea3ef\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:38'),
(7, '9dec8e56-d366-42fd-a8f6-b1cac8350c24', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"alter table `users` add unique `users_email_unique`(`email`)\",\"time\":\"71.44\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/migrations\\/0001_01_01_000000_create_users_table.php\",\"line\":13,\"hash\":\"0648806a3d18c0f5b81e2257de64675e\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:38'),
(8, '9dec8e56-ed36-4e11-8c58-e373395f2537', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"alter table `users` add unique `users_phone_unique`(`phone`)\",\"time\":\"65.52\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/migrations\\/0001_01_01_000000_create_users_table.php\",\"line\":13,\"hash\":\"cbb880065c57552e89f6ee6d252658b1\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:39'),
(9, '9dec8e57-121d-4af6-9219-716f8b03f816', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"create table `password_reset_tokens` (`email` varchar(255) not null, `token` varchar(255) not null, `created_at` timestamp null, primary key (`email`)) default character set utf8mb4 collate \'utf8mb4_unicode_ci\'\",\"time\":\"93.45\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/migrations\\/0001_01_01_000000_create_users_table.php\",\"line\":29,\"hash\":\"d1b8ec2d95ac0278e9c404209ef4276d\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:39'),
(10, '9dec8e57-3971-47be-b845-27dad060c964', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"create table `sessions` (`id` varchar(255) not null, `user_id` bigint unsigned null, `ip_address` varchar(45) null, `user_agent` text null, `payload` longtext not null, `last_activity` int not null, primary key (`id`)) default character set utf8mb4 collate \'utf8mb4_unicode_ci\'\",\"time\":\"99.23\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/migrations\\/0001_01_01_000000_create_users_table.php\",\"line\":35,\"hash\":\"644f094fd9982dc877d67d9ae8dab9a6\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:39'),
(11, '9dec8e57-54a3-4220-be0f-6016fa0aeeaf', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"alter table `sessions` add index `sessions_user_id_index`(`user_id`)\",\"time\":\"69.12\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/migrations\\/0001_01_01_000000_create_users_table.php\",\"line\":35,\"hash\":\"143e0209095c4f5cecfdd51a11268572\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:39'),
(12, '9dec8e57-6b82-42af-85e3-09819514946d', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"alter table `sessions` add index `sessions_last_activity_index`(`last_activity`)\",\"time\":\"58.04\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/migrations\\/0001_01_01_000000_create_users_table.php\",\"line\":35,\"hash\":\"5102944fa5d480fdd2bbfbfe1a0c03bc\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:39'),
(13, '9dec8e57-72ea-4ee2-94ef-8e54eea820db', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `migrations` (`migration`, `batch`) values (\'0001_01_01_000000_create_users_table\', 1)\",\"time\":\"15.09\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/artisan\",\"line\":13,\"hash\":\"f2b8e8e4266db16aec6db940c643eb68\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:39'),
(14, '9dec8e57-9584-4d83-892c-c31ca890b9d5', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"create table `cache` (`key` varchar(255) not null, `value` mediumtext not null, `expiration` int not null, primary key (`key`)) default character set utf8mb4 collate \'utf8mb4_unicode_ci\'\",\"time\":\"87.12\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/migrations\\/0001_01_01_000001_create_cache_table.php\",\"line\":14,\"hash\":\"372cda85881fe89b6a62d84e07110cf1\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:39'),
(15, '9dec8e57-b850-41e9-a671-7943a8759e40', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"create table `cache_locks` (`key` varchar(255) not null, `owner` varchar(255) not null, `expiration` int not null, primary key (`key`)) default character set utf8mb4 collate \'utf8mb4_unicode_ci\'\",\"time\":\"87.85\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/migrations\\/0001_01_01_000001_create_cache_table.php\",\"line\":20,\"hash\":\"3d517557cf20220e6ecfaf0a9ee12c4f\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:39'),
(16, '9dec8e57-beb9-467d-a8d9-d7710c9aa9cf', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `migrations` (`migration`, `batch`) values (\'0001_01_01_000001_create_cache_table\', 1)\",\"time\":\"12.95\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/artisan\",\"line\":13,\"hash\":\"f2b8e8e4266db16aec6db940c643eb68\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:39'),
(17, '9dec8e57-e038-4d42-a8a5-859a4b2dfc53', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"create table `jobs` (`id` bigint unsigned not null auto_increment primary key, `queue` varchar(255) not null, `payload` longtext not null, `attempts` tinyint unsigned not null, `reserved_at` int unsigned null, `available_at` int unsigned not null, `created_at` int unsigned not null) default character set utf8mb4 collate \'utf8mb4_unicode_ci\'\",\"time\":\"84.01\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/migrations\\/0001_01_01_000002_create_jobs_table.php\",\"line\":14,\"hash\":\"87d7e48163c279f619932f5e34922b35\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:39'),
(18, '9dec8e57-f8a7-48eb-96f0-37ef1556bfd2', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"alter table `jobs` add index `jobs_queue_index`(`queue`)\",\"time\":\"62.09\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/migrations\\/0001_01_01_000002_create_jobs_table.php\",\"line\":14,\"hash\":\"0cfaf07533bec3024be637314b74804b\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:39'),
(19, '9dec8e58-1b9e-434a-8995-c8c629389324', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"create table `job_batches` (`id` varchar(255) not null, `name` varchar(255) not null, `total_jobs` int not null, `pending_jobs` int not null, `failed_jobs` int not null, `failed_job_ids` longtext not null, `options` mediumtext null, `cancelled_at` int null, `created_at` int not null, `finished_at` int null, primary key (`id`)) default character set utf8mb4 collate \'utf8mb4_unicode_ci\'\",\"time\":\"87.95\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/migrations\\/0001_01_01_000002_create_jobs_table.php\",\"line\":24,\"hash\":\"cce8d09300a9a72f6d316f46dce3ac3f\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:39'),
(20, '9dec8e58-4765-4169-8936-44f4474d3da6', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"create table `failed_jobs` (`id` bigint unsigned not null auto_increment primary key, `uuid` varchar(255) not null, `connection` text not null, `queue` text not null, `payload` longtext not null, `exception` longtext not null, `failed_at` timestamp not null default CURRENT_TIMESTAMP) default character set utf8mb4 collate \'utf8mb4_unicode_ci\'\",\"time\":\"110.44\",\"slow\":true,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/migrations\\/0001_01_01_000002_create_jobs_table.php\",\"line\":37,\"hash\":\"2036eec2d3e24057db38a9579d6633e3\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:39'),
(21, '9dec8e58-6745-491b-8d38-00055345c9b7', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"alter table `failed_jobs` add unique `failed_jobs_uuid_unique`(`uuid`)\",\"time\":\"80.98\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/migrations\\/0001_01_01_000002_create_jobs_table.php\",\"line\":37,\"hash\":\"f851653a45d1f2394473d70db5636fd3\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:40'),
(22, '9dec8e58-6e14-4215-8166-cd1437cd3bef', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `migrations` (`migration`, `batch`) values (\'0001_01_01_000002_create_jobs_table\', 1)\",\"time\":\"13.92\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/artisan\",\"line\":13,\"hash\":\"f2b8e8e4266db16aec6db940c643eb68\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:40'),
(23, '9dec8e58-9432-449c-9630-51b161547056', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"create table `admins` (`id` bigint unsigned not null auto_increment primary key, `name` varchar(255) not null, `role_id` int not null, `email` varchar(255) not null, `email_verified_at` timestamp null, `password` varchar(255) not null, `deleted_at` datetime null, `remember_token` varchar(100) null, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate \'utf8mb4_unicode_ci\'\",\"time\":\"95.53\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/migrations\\/2024_09_17_081239_create_admins_table.php\",\"line\":13,\"hash\":\"2e26c72c7da0223b7ce7884ed3b57aba\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:40'),
(24, '9dec8e58-abf4-49eb-bb0b-d9aff16bd90c', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"alter table `admins` add unique `admins_email_unique`(`email`)\",\"time\":\"60.32\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/migrations\\/2024_09_17_081239_create_admins_table.php\",\"line\":13,\"hash\":\"7929408b0f07946ddca4910aaeefa82d\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:40'),
(25, '9dec8e58-b276-4c0d-bd0d-e4865cb5924e', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `migrations` (`migration`, `batch`) values (\'2024_09_17_081239_create_admins_table\', 1)\",\"time\":\"13.29\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/artisan\",\"line\":13,\"hash\":\"f2b8e8e4266db16aec6db940c643eb68\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:40'),
(26, '9dec8e58-dcec-46b4-9730-5c9b389e8d26', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"create table `personal_access_tokens` (`id` bigint unsigned not null auto_increment primary key, `tokenable_type` varchar(255) not null, `tokenable_id` bigint unsigned not null, `name` varchar(255) not null, `token` varchar(64) not null, `abilities` text null, `last_used_at` timestamp null, `expires_at` timestamp null, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate \'utf8mb4_unicode_ci\'\",\"time\":\"106.65\",\"slow\":true,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/migrations\\/2024_09_20_042754_create_personal_access_tokens_table.php\",\"line\":14,\"hash\":\"c3ce2064f6541373814860c9a7e44c89\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:40'),
(27, '9dec8e58-f583-4dd2-97c5-138915706cb6', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"alter table `personal_access_tokens` add index `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type`, `tokenable_id`)\",\"time\":\"62.42\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/migrations\\/2024_09_20_042754_create_personal_access_tokens_table.php\",\"line\":14,\"hash\":\"23e16d13faedc7fd756b258a984d3cad\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:40'),
(28, '9dec8e59-0c7f-4fb5-a2d8-7f5ccaa68e60', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"alter table `personal_access_tokens` add unique `personal_access_tokens_token_unique`(`token`)\",\"time\":\"58.37\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/migrations\\/2024_09_20_042754_create_personal_access_tokens_table.php\",\"line\":14,\"hash\":\"6d0025967d6eebfcb6fddf6dcb6ed14c\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:40'),
(29, '9dec8e59-12c3-40b4-b5bc-d98dbcb0cfc8', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `migrations` (`migration`, `batch`) values (\'2024_09_20_042754_create_personal_access_tokens_table\', 1)\",\"time\":\"13.11\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/artisan\",\"line\":13,\"hash\":\"f2b8e8e4266db16aec6db940c643eb68\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:40'),
(30, '9dec8e59-3bc8-4bf6-94e0-d7baf038e447', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"create table `oauth_auth_codes` (`id` varchar(100) not null, `user_id` bigint unsigned not null, `client_id` bigint unsigned not null, `scopes` text null, `revoked` tinyint(1) not null, `expires_at` datetime null, primary key (`id`)) default character set utf8mb4 collate \'utf8mb4_unicode_ci\'\",\"time\":\"103.31\",\"slow\":true,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/migrations\\/2024_09_23_071452_create_oauth_auth_codes_table.php\",\"line\":14,\"hash\":\"79734c412542fb791fe0d94157f31700\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:40'),
(31, '9dec8e59-5638-40b2-a7ae-7be16e52cb42', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"alter table `oauth_auth_codes` add index `oauth_auth_codes_user_id_index`(`user_id`)\",\"time\":\"67.14\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/migrations\\/2024_09_23_071452_create_oauth_auth_codes_table.php\",\"line\":14,\"hash\":\"672329a8ecc84bf315ed3624dd041214\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:40'),
(32, '9dec8e59-5c8c-416e-a0cf-1291ca670900', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `migrations` (`migration`, `batch`) values (\'2024_09_23_071452_create_oauth_auth_codes_table\', 1)\",\"time\":\"13.02\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/artisan\",\"line\":13,\"hash\":\"f2b8e8e4266db16aec6db940c643eb68\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:40'),
(33, '9dec8e59-86ab-4344-a13f-6f7f8b618f42', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"create table `oauth_access_tokens` (`id` varchar(100) not null, `user_id` bigint unsigned null, `client_id` bigint unsigned not null, `name` varchar(255) null, `scopes` text null, `revoked` tinyint(1) not null, `created_at` timestamp null, `updated_at` timestamp null, `expires_at` datetime null, primary key (`id`)) default character set utf8mb4 collate \'utf8mb4_unicode_ci\'\",\"time\":\"105.84\",\"slow\":true,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/migrations\\/2024_09_23_071453_create_oauth_access_tokens_table.php\",\"line\":14,\"hash\":\"8766f0ef3c7b4db37a8e2985ecae84eb\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:40'),
(34, '9dec8e59-a1b7-4f17-9c19-4445b0d4c4bd', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"alter table `oauth_access_tokens` add index `oauth_access_tokens_user_id_index`(`user_id`)\",\"time\":\"68.75\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/migrations\\/2024_09_23_071453_create_oauth_access_tokens_table.php\",\"line\":14,\"hash\":\"c1b15baef8790b12f521213dbe280686\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:40'),
(35, '9dec8e59-a86d-47fe-8eb1-a2c13e20f7a9', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `migrations` (`migration`, `batch`) values (\'2024_09_23_071453_create_oauth_access_tokens_table\', 1)\",\"time\":\"14.10\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/artisan\",\"line\":13,\"hash\":\"f2b8e8e4266db16aec6db940c643eb68\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:40'),
(36, '9dec8e59-dbae-4b30-9797-588b35a461dc', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"create table `oauth_refresh_tokens` (`id` varchar(100) not null, `access_token_id` varchar(100) not null, `revoked` tinyint(1) not null, `expires_at` datetime null, primary key (`id`)) default character set utf8mb4 collate \'utf8mb4_unicode_ci\'\",\"time\":\"129.57\",\"slow\":true,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/migrations\\/2024_09_23_071454_create_oauth_refresh_tokens_table.php\",\"line\":14,\"hash\":\"6c8d0775dc02523afe69a8bb76d5648e\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:40'),
(37, '9dec8e59-f424-4e58-8ef4-09792e596c67', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"alter table `oauth_refresh_tokens` add index `oauth_refresh_tokens_access_token_id_index`(`access_token_id`)\",\"time\":\"62.15\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/migrations\\/2024_09_23_071454_create_oauth_refresh_tokens_table.php\",\"line\":14,\"hash\":\"bb9271815aa9a8648cb481be7ad348a3\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:41'),
(38, '9dec8e59-fa64-4fc4-9310-7e868f1f8b61', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `migrations` (`migration`, `batch`) values (\'2024_09_23_071454_create_oauth_refresh_tokens_table\', 1)\",\"time\":\"12.93\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/artisan\",\"line\":13,\"hash\":\"f2b8e8e4266db16aec6db940c643eb68\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:41'),
(39, '9dec8e5a-1fcf-49d7-a95c-1a7a398ba77b', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"create table `oauth_clients` (`id` bigint unsigned not null auto_increment primary key, `user_id` bigint unsigned null, `name` varchar(255) not null, `secret` varchar(100) null, `provider` varchar(255) null, `redirect` text not null, `personal_access_client` tinyint(1) not null, `password_client` tinyint(1) not null, `revoked` tinyint(1) not null, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate \'utf8mb4_unicode_ci\'\",\"time\":\"93.63\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/migrations\\/2024_09_23_071455_create_oauth_clients_table.php\",\"line\":14,\"hash\":\"58725cfa264a00b8d74dee83f68198c5\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:41'),
(40, '9dec8e5a-389c-46ef-b5c1-86fab923433d', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"alter table `oauth_clients` add index `oauth_clients_user_id_index`(`user_id`)\",\"time\":\"62.84\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/migrations\\/2024_09_23_071455_create_oauth_clients_table.php\",\"line\":14,\"hash\":\"d80805c01983b9f1402e5c83cc8fca13\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:41'),
(41, '9dec8e5a-3f0d-47a1-8ffa-bf6fb2d07eed', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `migrations` (`migration`, `batch`) values (\'2024_09_23_071455_create_oauth_clients_table\', 1)\",\"time\":\"13.04\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/artisan\",\"line\":13,\"hash\":\"f2b8e8e4266db16aec6db940c643eb68\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:41'),
(42, '9dec8e5a-6596-4d46-813f-0f81096d3451', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"create table `oauth_personal_access_clients` (`id` bigint unsigned not null auto_increment primary key, `client_id` bigint unsigned not null, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate \'utf8mb4_unicode_ci\'\",\"time\":\"97.29\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/migrations\\/2024_09_23_071456_create_oauth_personal_access_clients_table.php\",\"line\":14,\"hash\":\"e0d623a5cea9359b37b49a3525a26391\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:41'),
(43, '9dec8e5a-6bd1-47d8-8a24-2db4aeabc1d6', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `migrations` (`migration`, `batch`) values (\'2024_09_23_071456_create_oauth_personal_access_clients_table\', 1)\",\"time\":\"13.18\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/artisan\",\"line\":13,\"hash\":\"f2b8e8e4266db16aec6db940c643eb68\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:41'),
(44, '9dec8e5a-910d-4426-8f1c-d0e9acd143c9', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"create table `permissions` (`id` bigint unsigned not null auto_increment primary key, `name` varchar(255) not null, `guard_name` varchar(255) not null, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate \'utf8mb4_unicode_ci\'\",\"time\":\"93.62\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/migrations\\/2024_10_01_020509_create_permission_tables.php\",\"line\":27,\"hash\":\"eb63c3583de582a709a51b49c078ca03\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:41'),
(45, '9dec8e5a-a818-4a84-be4e-22e161858f48', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"alter table `permissions` add unique `permissions_name_guard_name_unique`(`name`, `guard_name`)\",\"time\":\"58.51\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/migrations\\/2024_10_01_020509_create_permission_tables.php\",\"line\":27,\"hash\":\"5238fb7ac2ac0c6531d371b983681d76\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:41'),
(46, '9dec8e5a-ceac-4256-9f22-2268ce94c98e', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"create table `roles` (`id` bigint unsigned not null auto_increment primary key, `name` varchar(255) not null, `guard_name` varchar(255) not null, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate \'utf8mb4_unicode_ci\'\",\"time\":\"97.40\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/migrations\\/2024_10_01_020509_create_permission_tables.php\",\"line\":37,\"hash\":\"c8fbd6ab203ec575e47ce2d7e4f07910\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:41'),
(47, '9dec8e5a-e5fd-4c99-9900-fe09ac5349aa', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"alter table `roles` add unique `roles_name_guard_name_unique`(`name`, `guard_name`)\",\"time\":\"59.19\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/migrations\\/2024_10_01_020509_create_permission_tables.php\",\"line\":37,\"hash\":\"476aef0b952e50c5926ba8cdc0c9bfa6\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:41'),
(48, '9dec8e5b-0e77-42ae-a2ff-a7833f519c80', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"create table `model_has_permissions` (`permission_id` bigint unsigned not null, `model_type` varchar(255) not null, `model_id` bigint unsigned not null, primary key (`permission_id`, `model_id`, `model_type`)) default character set utf8mb4 collate \'utf8mb4_unicode_ci\'\",\"time\":\"102.40\",\"slow\":true,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/migrations\\/2024_10_01_020509_create_permission_tables.php\",\"line\":54,\"hash\":\"ec1b8cf686b6562712dee3002dd401c3\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:41'),
(49, '9dec8e5b-2659-4ff3-b0a7-3c557f7c7e79', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"alter table `model_has_permissions` add index `model_has_permissions_model_id_model_type_index`(`model_id`, `model_type`)\",\"time\":\"60.66\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/migrations\\/2024_10_01_020509_create_permission_tables.php\",\"line\":54,\"hash\":\"799c3262f33663c6bf50078fe1c8ce02\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:41'),
(50, '9dec8e5b-936a-48f2-a3f0-e52f048d1add', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"alter table `model_has_permissions` add constraint `model_has_permissions_permission_id_foreign` foreign key (`permission_id`) references `permissions` (`id`) on delete cascade\",\"time\":\"278.64\",\"slow\":true,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/migrations\\/2024_10_01_020509_create_permission_tables.php\",\"line\":54,\"hash\":\"2c922be382fed48d8023537e84ccdd66\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:42'),
(51, '9dec8e5b-b5ba-4bed-86d2-7c98fa81043c', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"create table `model_has_roles` (`role_id` bigint unsigned not null, `model_type` varchar(255) not null, `model_id` bigint unsigned not null, primary key (`role_id`, `model_id`, `model_type`)) default character set utf8mb4 collate \'utf8mb4_unicode_ci\'\",\"time\":\"86.72\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/migrations\\/2024_10_01_020509_create_permission_tables.php\",\"line\":78,\"hash\":\"ed1930e13e87605cce4ebc47dc397bb8\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:42'),
(52, '9dec8e5b-cf58-497d-b590-7167918a27ff', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"alter table `model_has_roles` add index `model_has_roles_model_id_model_type_index`(`model_id`, `model_type`)\",\"time\":\"65.07\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/migrations\\/2024_10_01_020509_create_permission_tables.php\",\"line\":78,\"hash\":\"b5fc483eb06997eadd0a189cdb6820fd\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:42'),
(53, '9dec8e5c-43fd-4888-95fa-a1dec264a348', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"alter table `model_has_roles` add constraint `model_has_roles_role_id_foreign` foreign key (`role_id`) references `roles` (`id`) on delete cascade\",\"time\":\"298.11\",\"slow\":true,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/migrations\\/2024_10_01_020509_create_permission_tables.php\",\"line\":78,\"hash\":\"13a9f5419fe9cfd65c84f44a9af8aebe\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:42'),
(54, '9dec8e5c-61c2-461a-8d1b-0eda8bb1f4e5', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"create table `role_has_permissions` (`permission_id` bigint unsigned not null, `role_id` bigint unsigned not null, primary key (`permission_id`, `role_id`)) default character set utf8mb4 collate \'utf8mb4_unicode_ci\'\",\"time\":\"75.15\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/migrations\\/2024_10_01_020509_create_permission_tables.php\",\"line\":101,\"hash\":\"92e8ce6598a3d32430f6a20647e75cc6\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:42'),
(55, '9dec8e5c-b1b3-4023-aee8-c2a3a03302aa', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"alter table `role_has_permissions` add constraint `role_has_permissions_permission_id_foreign` foreign key (`permission_id`) references `permissions` (`id`) on delete cascade\",\"time\":\"204.16\",\"slow\":true,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/migrations\\/2024_10_01_020509_create_permission_tables.php\",\"line\":101,\"hash\":\"09327a2ff7df4421191b9fdf2a1cce9e\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:42'),
(56, '9dec8e5d-10e4-4bb0-b3bf-4b25e75fa4eb', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"alter table `role_has_permissions` add constraint `role_has_permissions_role_id_foreign` foreign key (`role_id`) references `roles` (`id`) on delete cascade\",\"time\":\"243.17\",\"slow\":true,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/migrations\\/2024_10_01_020509_create_permission_tables.php\",\"line\":101,\"hash\":\"4ad12bf8366b7b214265d1ff60544e17\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:43'),
(57, '9dec8e5d-1186-4920-85ec-70751075c84e', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"delete from `cache` where `key` in (\'spatie.permission.cache\', \'illuminate:cache:flexible:created:spatie.permission.cache\')\",\"time\":\"0.80\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/migrations\\/2024_10_01_020509_create_permission_tables.php\",\"line\":120,\"hash\":\"84c324f59f1a38efa9584ea67003529d\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:43'),
(58, '9dec8e5d-11ac-493e-91b5-4b03f6808041', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'cache', '{\"type\":\"forget\",\"key\":\"spatie.permission.cache\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:43'),
(59, '9dec8e5d-19c2-4c3b-94e9-9959215f4779', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `migrations` (`migration`, `batch`) values (\'2024_10_01_020509_create_permission_tables\', 1)\",\"time\":\"16.34\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/artisan\",\"line\":13,\"hash\":\"f2b8e8e4266db16aec6db940c643eb68\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:43'),
(60, '9dec8e5d-4080-47cd-9b17-845bb25143d0', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"create table `telescope_entries` (`sequence` bigint unsigned not null auto_increment primary key, `uuid` char(36) not null, `batch_id` char(36) not null, `family_hash` varchar(255) null, `should_display_on_index` tinyint(1) not null default \'1\', `type` varchar(20) not null, `content` longtext not null, `created_at` datetime null) default character set utf8mb4 collate \'utf8mb4_unicode_ci\'\",\"time\":\"97.23\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/migrations\\/2024_10_04_050851_create_telescope_entries_table.php\",\"line\":24,\"hash\":\"d9429550f8856c1af1c89f24a6440cb5\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:43'),
(61, '9dec8e5d-5562-433c-958c-ad4a28d00bf5', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"alter table `telescope_entries` add unique `telescope_entries_uuid_unique`(`uuid`)\",\"time\":\"52.99\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/migrations\\/2024_10_04_050851_create_telescope_entries_table.php\",\"line\":24,\"hash\":\"9fb859ae1faff74c6b9e0b70dfd8eea9\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:43'),
(62, '9dec8e5d-6f96-4872-84d3-595bdfc0b45f', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"alter table `telescope_entries` add index `telescope_entries_batch_id_index`(`batch_id`)\",\"time\":\"66.58\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/migrations\\/2024_10_04_050851_create_telescope_entries_table.php\",\"line\":24,\"hash\":\"2b075509a9242d6e3f622536c5ccca07\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:43'),
(63, '9dec8e5d-891a-454e-8309-4fa6efc88ff8', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"alter table `telescope_entries` add index `telescope_entries_family_hash_index`(`family_hash`)\",\"time\":\"64.87\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/migrations\\/2024_10_04_050851_create_telescope_entries_table.php\",\"line\":24,\"hash\":\"3d25a2a244bd2028dfa0326d3dbf7f4c\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:43'),
(64, '9dec8e5d-a196-405f-9821-16599195b8c6', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"alter table `telescope_entries` add index `telescope_entries_created_at_index`(`created_at`)\",\"time\":\"62.17\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/migrations\\/2024_10_04_050851_create_telescope_entries_table.php\",\"line\":24,\"hash\":\"7352e7f84460fb7ffc450e7ea4de9dc7\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:43'),
(65, '9dec8e5d-bae9-4ac8-ace0-c55f906292a6', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"alter table `telescope_entries` add index `telescope_entries_type_should_display_on_index_index`(`type`, `should_display_on_index`)\",\"time\":\"64.33\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/migrations\\/2024_10_04_050851_create_telescope_entries_table.php\",\"line\":24,\"hash\":\"7317a4cad2dfa1a5167548a6acd0b6a5\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:43'),
(66, '9dec8e5d-d9e7-4db4-ab62-2974057f9b3d', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"create table `telescope_entries_tags` (`entry_uuid` char(36) not null, `tag` varchar(255) not null, primary key (`entry_uuid`, `tag`)) default character set utf8mb4 collate \'utf8mb4_unicode_ci\'\",\"time\":\"78.30\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/migrations\\/2024_10_04_050851_create_telescope_entries_table.php\",\"line\":41,\"hash\":\"f8c7e1e3c3d557b70e7a918609f839f2\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:43'),
(67, '9dec8e5d-f293-4532-be1d-708960fe165e', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"alter table `telescope_entries_tags` add index `telescope_entries_tags_tag_index`(`tag`)\",\"time\":\"62.68\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/migrations\\/2024_10_04_050851_create_telescope_entries_table.php\",\"line\":41,\"hash\":\"0bdb35d17e876d6225a7774a2c17647d\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:43'),
(68, '9dec8e5e-5bf6-489e-807f-6ac3dbbc7cbc', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"alter table `telescope_entries_tags` add constraint `telescope_entries_tags_entry_uuid_foreign` foreign key (`entry_uuid`) references `telescope_entries` (`uuid`) on delete cascade\",\"time\":\"269.28\",\"slow\":true,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/migrations\\/2024_10_04_050851_create_telescope_entries_table.php\",\"line\":41,\"hash\":\"662a818f80a3a9ba2570081fd7a6af2f\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:43'),
(69, '9dec8e5e-871e-4569-aa52-8bbf54c9ec84', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"create table `telescope_monitoring` (`tag` varchar(255) not null, primary key (`tag`)) default character set utf8mb4 collate \'utf8mb4_unicode_ci\'\",\"time\":\"109.77\",\"slow\":true,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/migrations\\/2024_10_04_050851_create_telescope_entries_table.php\",\"line\":54,\"hash\":\"18d1fa09eade84a80848982d91caec5c\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:44'),
(70, '9dec8e5e-8d6a-4805-a17d-020f42e8817a', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `migrations` (`migration`, `batch`) values (\'2024_10_04_050851_create_telescope_entries_table\', 1)\",\"time\":\"12.97\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/artisan\",\"line\":13,\"hash\":\"f2b8e8e4266db16aec6db940c643eb68\",\"hostname\":\"pop-os\"}', '2025-01-09 03:27:44'),
(71, '9dec8e5e-8dca-4b79-ad2d-c2faa9ea1479', '9dec8e5e-8e49-4267-8c10-17312c01c47a', NULL, 1, 'command', '{\"command\":\"migrate\",\"exit_code\":0,\"arguments\":{\"command\":\"migrate\"},\"options\":{\"database\":null,\"force\":false,\"path\":[],\"realpath\":false,\"schema-path\":null,\"pretend\":false,\"seed\":false,\"seeder\":null,\"step\":false,\"graceful\":false,\"isolated\":false,\"help\":false,\"quiet\":false,\"verbose\":false,\"version\":false,\"ansi\":null,\"no-interaction\":false,\"env\":null},\"hostname\":\"pop-os\"}', '2025-01-09 03:27:44'),
(72, '9dec8e8e-2cc7-44fa-9c4e-ac7f017cfcb3', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `cache` where `key` in (\'spatie.permission.cache\')\",\"time\":\"0.49\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":16,\"hash\":\"423396ec9e2f98d907ef4fff47152199\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(73, '9dec8e8e-2e3d-4afb-92c3-042ef3185d74', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'cache', '{\"type\":\"missed\",\"key\":\"spatie.permission.cache\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(74, '9dec8e8e-2ef9-403e-8912-53e2231da9c4', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `permissions`\",\"time\":\"0.66\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":16,\"hash\":\"c61ac84cc59cece74af9165092fde0b3\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(75, '9dec8e8e-357a-48fc-822c-f10ccd84249f', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `cache` (`expiration`, `key`, `value`) values (1736479695, \'spatie.permission.cache\', \'a:3:{s:5:\\\\\\\"alias\\\\\\\";a:0:{}s:11:\\\\\\\"permissions\\\\\\\";a:0:{}s:5:\\\\\\\"roles\\\\\\\";a:0:{}}\') on duplicate key update `expiration` = values(`expiration`), `key` = values(`key`), `value` = values(`value`)\",\"time\":\"14.41\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":16,\"hash\":\"76eef42be78383b10040709eefcbb33a\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(76, '9dec8e8e-35e4-4365-b6cf-44cdaa7b22a8', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'cache', '{\"type\":\"set\",\"key\":\"spatie.permission.cache\",\"value\":{\"alias\":[],\"permissions\":[],\"roles\":[]},\"expiration\":86400,\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(77, '9dec8e8e-3d51-4b53-bcc2-b37b037a6086', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `permissions` (`guard_name`, `name`, `updated_at`, `created_at`) values (\'admin\', \'index\', \'2025-01-09 03:28:15\', \'2025-01-09 03:28:15\')\",\"time\":\"13.95\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":16,\"hash\":\"73f7df78b47d34a5ac79b23755419206\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(78, '9dec8e8e-3db5-480c-9878-e6092b7d9f8b', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'model', '{\"action\":\"created\",\"model\":\"Spatie\\\\Permission\\\\Models\\\\Permission:1\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(79, '9dec8e8e-45c0-48db-87f9-c5fe28d25a36', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"delete from `cache` where `key` in (\'spatie.permission.cache\', \'illuminate:cache:flexible:created:spatie.permission.cache\')\",\"time\":\"19.53\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":16,\"hash\":\"84c324f59f1a38efa9584ea67003529d\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(80, '9dec8e8e-45e9-4528-9a5c-ee1b4855374e', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'cache', '{\"type\":\"forget\",\"key\":\"spatie.permission.cache\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(81, '9dec8e8e-46eb-4ff4-bb9e-25ebdbff71cd', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `cache` where `key` in (\'spatie.permission.cache\')\",\"time\":\"0.51\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":17,\"hash\":\"423396ec9e2f98d907ef4fff47152199\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(82, '9dec8e8e-470c-4a49-b2f4-06f613342239', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'cache', '{\"type\":\"missed\",\"key\":\"spatie.permission.cache\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(83, '9dec8e8e-4774-48d6-a869-4fbee1becd52', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `permissions`\",\"time\":\"0.37\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":17,\"hash\":\"c61ac84cc59cece74af9165092fde0b3\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(84, '9dec8e8e-47ad-4a49-b84c-ad324f722ef3', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'model', '{\"action\":\"retrieved\",\"model\":\"Spatie\\\\Permission\\\\Models\\\\Permission\",\"count\":35,\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(85, '9dec8e8e-4954-40f2-b51a-7823f09cae30', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select `roles`.*, `role_has_permissions`.`permission_id` as `pivot_permission_id`, `role_has_permissions`.`role_id` as `pivot_role_id` from `roles` inner join `role_has_permissions` on `roles`.`id` = `role_has_permissions`.`role_id` where `role_has_permissions`.`permission_id` in (1)\",\"time\":\"1.20\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":17,\"hash\":\"0616b315bc2bd061388c4ebb964339fa\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(86, '9dec8e8e-4f9e-4fc4-9dfa-168983377c76', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `cache` (`expiration`, `key`, `value`) values (1736479695, \'spatie.permission.cache\', \'a:3:{s:5:\\\\\\\"alias\\\\\\\";a:3:{s:1:\\\\\\\"a\\\\\\\";s:2:\\\\\\\"id\\\\\\\";s:1:\\\\\\\"b\\\\\\\";s:4:\\\\\\\"name\\\\\\\";s:1:\\\\\\\"c\\\\\\\";s:10:\\\\\\\"guard_name\\\\\\\";}s:11:\\\\\\\"permissions\\\\\\\";a:1:{i:0;a:3:{s:1:\\\\\\\"a\\\\\\\";i:1;s:1:\\\\\\\"b\\\\\\\";s:5:\\\\\\\"index\\\\\\\";s:1:\\\\\\\"c\\\\\\\";s:5:\\\\\\\"admin\\\\\\\";}}s:5:\\\\\\\"roles\\\\\\\";a:0:{}}\') on duplicate key update `expiration` = values(`expiration`), `key` = values(`key`), `value` = values(`value`)\",\"time\":\"14.86\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":17,\"hash\":\"76eef42be78383b10040709eefcbb33a\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(87, '9dec8e8e-4fc7-48d7-9cd7-b007f2f6c981', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'cache', '{\"type\":\"set\",\"key\":\"spatie.permission.cache\",\"value\":{\"alias\":{\"a\":\"id\",\"b\":\"name\",\"c\":\"guard_name\"},\"permissions\":[{\"a\":1,\"b\":\"index\",\"c\":\"admin\"}],\"roles\":[]},\"expiration\":86400,\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(88, '9dec8e8e-5740-4508-96f9-9c5d6645692d', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `permissions` (`guard_name`, `name`, `updated_at`, `created_at`) values (\'admin\', \'create\', \'2025-01-09 03:28:15\', \'2025-01-09 03:28:15\')\",\"time\":\"17.32\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":17,\"hash\":\"73f7df78b47d34a5ac79b23755419206\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(89, '9dec8e8e-576b-40f5-8910-5f17984bcbe7', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'model', '{\"action\":\"created\",\"model\":\"Spatie\\\\Permission\\\\Models\\\\Permission:2\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(90, '9dec8e8e-5eb2-4993-b472-2a528bce5fb9', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"delete from `cache` where `key` in (\'spatie.permission.cache\', \'illuminate:cache:flexible:created:spatie.permission.cache\')\",\"time\":\"17.93\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":17,\"hash\":\"84c324f59f1a38efa9584ea67003529d\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15');
INSERT INTO `telescope_entries` (`sequence`, `uuid`, `batch_id`, `family_hash`, `should_display_on_index`, `type`, `content`, `created_at`) VALUES
(91, '9dec8e8e-5ecf-4dbe-a51c-1f4b1906e549', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'cache', '{\"type\":\"forget\",\"key\":\"spatie.permission.cache\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(92, '9dec8e8e-5f3a-45fc-a571-4fa7a75fd8ea', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `cache` where `key` in (\'spatie.permission.cache\')\",\"time\":\"0.38\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":18,\"hash\":\"423396ec9e2f98d907ef4fff47152199\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(93, '9dec8e8e-5f57-41ab-a34f-6ed9ed731784', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'cache', '{\"type\":\"missed\",\"key\":\"spatie.permission.cache\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(94, '9dec8e8e-5fbc-428a-a08b-bea1fc704602', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `permissions`\",\"time\":\"0.40\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":18,\"hash\":\"c61ac84cc59cece74af9165092fde0b3\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(95, '9dec8e8e-6081-4c43-bbfc-d045b3df88c4', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select `roles`.*, `role_has_permissions`.`permission_id` as `pivot_permission_id`, `role_has_permissions`.`role_id` as `pivot_role_id` from `roles` inner join `role_has_permissions` on `roles`.`id` = `role_has_permissions`.`role_id` where `role_has_permissions`.`permission_id` in (1, 2)\",\"time\":\"0.44\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":18,\"hash\":\"458f6a601281774771f11d3168a9079d\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(96, '9dec8e8e-660a-4059-b5bb-90e0305bf05b', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `cache` (`expiration`, `key`, `value`) values (1736479695, \'spatie.permission.cache\', \'a:3:{s:5:\\\\\\\"alias\\\\\\\";a:3:{s:1:\\\\\\\"a\\\\\\\";s:2:\\\\\\\"id\\\\\\\";s:1:\\\\\\\"b\\\\\\\";s:4:\\\\\\\"name\\\\\\\";s:1:\\\\\\\"c\\\\\\\";s:10:\\\\\\\"guard_name\\\\\\\";}s:11:\\\\\\\"permissions\\\\\\\";a:2:{i:0;a:3:{s:1:\\\\\\\"a\\\\\\\";i:1;s:1:\\\\\\\"b\\\\\\\";s:5:\\\\\\\"index\\\\\\\";s:1:\\\\\\\"c\\\\\\\";s:5:\\\\\\\"admin\\\\\\\";}i:1;a:3:{s:1:\\\\\\\"a\\\\\\\";i:2;s:1:\\\\\\\"b\\\\\\\";s:6:\\\\\\\"create\\\\\\\";s:1:\\\\\\\"c\\\\\\\";s:5:\\\\\\\"admin\\\\\\\";}}s:5:\\\\\\\"roles\\\\\\\";a:0:{}}\') on duplicate key update `expiration` = values(`expiration`), `key` = values(`key`), `value` = values(`value`)\",\"time\":\"13.18\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":18,\"hash\":\"76eef42be78383b10040709eefcbb33a\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(97, '9dec8e8e-6625-4ab5-a0fd-bb9fed4c3355', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'cache', '{\"type\":\"set\",\"key\":\"spatie.permission.cache\",\"value\":{\"alias\":{\"a\":\"id\",\"b\":\"name\",\"c\":\"guard_name\"},\"permissions\":[{\"a\":1,\"b\":\"index\",\"c\":\"admin\"},{\"a\":2,\"b\":\"create\",\"c\":\"admin\"}],\"roles\":[]},\"expiration\":86400,\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(98, '9dec8e8e-6bae-4e07-8027-199463129879', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `permissions` (`guard_name`, `name`, `updated_at`, `created_at`) values (\'admin\', \'show\', \'2025-01-09 03:28:15\', \'2025-01-09 03:28:15\')\",\"time\":\"12.81\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":18,\"hash\":\"73f7df78b47d34a5ac79b23755419206\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(99, '9dec8e8e-6bd2-48a8-ad03-95b0e0ceaf6b', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'model', '{\"action\":\"created\",\"model\":\"Spatie\\\\Permission\\\\Models\\\\Permission:3\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(100, '9dec8e8e-7116-421f-b321-0378134821bf', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"delete from `cache` where `key` in (\'spatie.permission.cache\', \'illuminate:cache:flexible:created:spatie.permission.cache\')\",\"time\":\"12.79\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":18,\"hash\":\"84c324f59f1a38efa9584ea67003529d\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(101, '9dec8e8e-7132-48df-9aef-aae01626baf4', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'cache', '{\"type\":\"forget\",\"key\":\"spatie.permission.cache\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(102, '9dec8e8e-71a2-4f38-94ef-b7585addc65f', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `cache` where `key` in (\'spatie.permission.cache\')\",\"time\":\"0.45\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":19,\"hash\":\"423396ec9e2f98d907ef4fff47152199\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(103, '9dec8e8e-71bf-41cc-b1f0-2d4b9cb7e229', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'cache', '{\"type\":\"missed\",\"key\":\"spatie.permission.cache\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(104, '9dec8e8e-7221-452b-83c3-9f3f7d4dc9ff', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `permissions`\",\"time\":\"0.39\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":19,\"hash\":\"c61ac84cc59cece74af9165092fde0b3\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(105, '9dec8e8e-72ec-4b55-8cab-e0f7f0a218eb', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select `roles`.*, `role_has_permissions`.`permission_id` as `pivot_permission_id`, `role_has_permissions`.`role_id` as `pivot_role_id` from `roles` inner join `role_has_permissions` on `roles`.`id` = `role_has_permissions`.`role_id` where `role_has_permissions`.`permission_id` in (1, 2, 3)\",\"time\":\"0.38\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":19,\"hash\":\"babe038f2faf0fb5396538a8c406bd8c\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(106, '9dec8e8e-7997-4deb-aa7c-092de151e19a', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `cache` (`expiration`, `key`, `value`) values (1736479695, \'spatie.permission.cache\', \'a:3:{s:5:\\\\\\\"alias\\\\\\\";a:3:{s:1:\\\\\\\"a\\\\\\\";s:2:\\\\\\\"id\\\\\\\";s:1:\\\\\\\"b\\\\\\\";s:4:\\\\\\\"name\\\\\\\";s:1:\\\\\\\"c\\\\\\\";s:10:\\\\\\\"guard_name\\\\\\\";}s:11:\\\\\\\"permissions\\\\\\\";a:3:{i:0;a:3:{s:1:\\\\\\\"a\\\\\\\";i:1;s:1:\\\\\\\"b\\\\\\\";s:5:\\\\\\\"index\\\\\\\";s:1:\\\\\\\"c\\\\\\\";s:5:\\\\\\\"admin\\\\\\\";}i:1;a:3:{s:1:\\\\\\\"a\\\\\\\";i:2;s:1:\\\\\\\"b\\\\\\\";s:6:\\\\\\\"create\\\\\\\";s:1:\\\\\\\"c\\\\\\\";s:5:\\\\\\\"admin\\\\\\\";}i:2;a:3:{s:1:\\\\\\\"a\\\\\\\";i:3;s:1:\\\\\\\"b\\\\\\\";s:4:\\\\\\\"show\\\\\\\";s:1:\\\\\\\"c\\\\\\\";s:5:\\\\\\\"admin\\\\\\\";}}s:5:\\\\\\\"roles\\\\\\\";a:0:{}}\') on duplicate key update `expiration` = values(`expiration`), `key` = values(`key`), `value` = values(`value`)\",\"time\":\"16.00\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":19,\"hash\":\"76eef42be78383b10040709eefcbb33a\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(107, '9dec8e8e-79b6-44fe-89e2-50672dfc5b6a', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'cache', '{\"type\":\"set\",\"key\":\"spatie.permission.cache\",\"value\":{\"alias\":{\"a\":\"id\",\"b\":\"name\",\"c\":\"guard_name\"},\"permissions\":[{\"a\":1,\"b\":\"index\",\"c\":\"admin\"},{\"a\":2,\"b\":\"create\",\"c\":\"admin\"},{\"a\":3,\"b\":\"show\",\"c\":\"admin\"}],\"roles\":[]},\"expiration\":86400,\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(108, '9dec8e8e-814d-4e76-90ec-f4a266a483fd', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `permissions` (`guard_name`, `name`, `updated_at`, `created_at`) values (\'admin\', \'edit\', \'2025-01-09 03:28:15\', \'2025-01-09 03:28:15\')\",\"time\":\"17.95\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":19,\"hash\":\"73f7df78b47d34a5ac79b23755419206\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(109, '9dec8e8e-8172-4ebb-a83f-a634eaea0aa7', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'model', '{\"action\":\"created\",\"model\":\"Spatie\\\\Permission\\\\Models\\\\Permission:4\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(110, '9dec8e8e-86d1-4f9f-92f0-115d8daa1f58', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"delete from `cache` where `key` in (\'spatie.permission.cache\', \'illuminate:cache:flexible:created:spatie.permission.cache\')\",\"time\":\"13.15\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":19,\"hash\":\"84c324f59f1a38efa9584ea67003529d\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(111, '9dec8e8e-86eb-47ec-acd7-9b9d4a113c9c', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'cache', '{\"type\":\"forget\",\"key\":\"spatie.permission.cache\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(112, '9dec8e8e-8763-421b-8f04-c38bf1d87dcc', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `cache` where `key` in (\'spatie.permission.cache\')\",\"time\":\"0.50\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":20,\"hash\":\"423396ec9e2f98d907ef4fff47152199\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(113, '9dec8e8e-8780-4804-8993-f3dca2c1894d', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'cache', '{\"type\":\"missed\",\"key\":\"spatie.permission.cache\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(114, '9dec8e8e-87ec-41f7-a5dd-66dc9cfd841c', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `permissions`\",\"time\":\"0.44\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":20,\"hash\":\"c61ac84cc59cece74af9165092fde0b3\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(115, '9dec8e8e-88ca-43ab-b80d-da05a7b8e181', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select `roles`.*, `role_has_permissions`.`permission_id` as `pivot_permission_id`, `role_has_permissions`.`role_id` as `pivot_role_id` from `roles` inner join `role_has_permissions` on `roles`.`id` = `role_has_permissions`.`role_id` where `role_has_permissions`.`permission_id` in (1, 2, 3, 4)\",\"time\":\"0.44\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":20,\"hash\":\"bb409b15f864392f6e60ffccddde6a6b\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(116, '9dec8e8e-8f35-4a94-81d7-61d84f4e5d74', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `cache` (`expiration`, `key`, `value`) values (1736479695, \'spatie.permission.cache\', \'a:3:{s:5:\\\\\\\"alias\\\\\\\";a:3:{s:1:\\\\\\\"a\\\\\\\";s:2:\\\\\\\"id\\\\\\\";s:1:\\\\\\\"b\\\\\\\";s:4:\\\\\\\"name\\\\\\\";s:1:\\\\\\\"c\\\\\\\";s:10:\\\\\\\"guard_name\\\\\\\";}s:11:\\\\\\\"permissions\\\\\\\";a:4:{i:0;a:3:{s:1:\\\\\\\"a\\\\\\\";i:1;s:1:\\\\\\\"b\\\\\\\";s:5:\\\\\\\"index\\\\\\\";s:1:\\\\\\\"c\\\\\\\";s:5:\\\\\\\"admin\\\\\\\";}i:1;a:3:{s:1:\\\\\\\"a\\\\\\\";i:2;s:1:\\\\\\\"b\\\\\\\";s:6:\\\\\\\"create\\\\\\\";s:1:\\\\\\\"c\\\\\\\";s:5:\\\\\\\"admin\\\\\\\";}i:2;a:3:{s:1:\\\\\\\"a\\\\\\\";i:3;s:1:\\\\\\\"b\\\\\\\";s:4:\\\\\\\"show\\\\\\\";s:1:\\\\\\\"c\\\\\\\";s:5:\\\\\\\"admin\\\\\\\";}i:3;a:3:{s:1:\\\\\\\"a\\\\\\\";i:4;s:1:\\\\\\\"b\\\\\\\";s:4:\\\\\\\"edit\\\\\\\";s:1:\\\\\\\"c\\\\\\\";s:5:\\\\\\\"admin\\\\\\\";}}s:5:\\\\\\\"roles\\\\\\\";a:0:{}}\') on duplicate key update `expiration` = values(`expiration`), `key` = values(`key`), `value` = values(`value`)\",\"time\":\"15.38\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":20,\"hash\":\"76eef42be78383b10040709eefcbb33a\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(117, '9dec8e8e-8f50-4ac3-99f5-7f2d27ac3a0d', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'cache', '{\"type\":\"set\",\"key\":\"spatie.permission.cache\",\"value\":{\"alias\":{\"a\":\"id\",\"b\":\"name\",\"c\":\"guard_name\"},\"permissions\":[{\"a\":1,\"b\":\"index\",\"c\":\"admin\"},{\"a\":2,\"b\":\"create\",\"c\":\"admin\"},{\"a\":3,\"b\":\"show\",\"c\":\"admin\"},{\"a\":4,\"b\":\"edit\",\"c\":\"admin\"}],\"roles\":[]},\"expiration\":86400,\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(118, '9dec8e8e-96f4-4c29-9e80-3ab456c7e1a0', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `permissions` (`guard_name`, `name`, `updated_at`, `created_at`) values (\'admin\', \'delete\', \'2025-01-09 03:28:15\', \'2025-01-09 03:28:15\')\",\"time\":\"18.10\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":20,\"hash\":\"73f7df78b47d34a5ac79b23755419206\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(119, '9dec8e8e-9719-421d-bbd5-c0e6f0594e96', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'model', '{\"action\":\"created\",\"model\":\"Spatie\\\\Permission\\\\Models\\\\Permission:5\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(120, '9dec8e8e-9e33-4ce1-8ba6-e80eef2cb75f', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"delete from `cache` where `key` in (\'spatie.permission.cache\', \'illuminate:cache:flexible:created:spatie.permission.cache\')\",\"time\":\"17.53\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":20,\"hash\":\"84c324f59f1a38efa9584ea67003529d\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(121, '9dec8e8e-9e4f-4847-bbb8-41f769da8671', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'cache', '{\"type\":\"forget\",\"key\":\"spatie.permission.cache\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(122, '9dec8e8e-9ec2-45cd-9d59-4a3db638bd8b', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `cache` where `key` in (\'spatie.permission.cache\')\",\"time\":\"0.45\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":21,\"hash\":\"423396ec9e2f98d907ef4fff47152199\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(123, '9dec8e8e-9ee2-4352-b00c-0f0f467fc413', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'cache', '{\"type\":\"missed\",\"key\":\"spatie.permission.cache\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(124, '9dec8e8e-9f51-4796-b94d-48723c90aad7', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `permissions`\",\"time\":\"0.41\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":21,\"hash\":\"c61ac84cc59cece74af9165092fde0b3\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(125, '9dec8e8e-a064-4362-ab0e-de9eff51b241', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select `roles`.*, `role_has_permissions`.`permission_id` as `pivot_permission_id`, `role_has_permissions`.`role_id` as `pivot_role_id` from `roles` inner join `role_has_permissions` on `roles`.`id` = `role_has_permissions`.`role_id` where `role_has_permissions`.`permission_id` in (1, 2, 3, 4, 5)\",\"time\":\"0.55\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":21,\"hash\":\"9455933ecde8ecafe458fe0dd4588d4c\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(126, '9dec8e8e-a6ad-4942-97de-10a1e085b1f7', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `cache` (`expiration`, `key`, `value`) values (1736479695, \'spatie.permission.cache\', \'a:3:{s:5:\\\\\\\"alias\\\\\\\";a:3:{s:1:\\\\\\\"a\\\\\\\";s:2:\\\\\\\"id\\\\\\\";s:1:\\\\\\\"b\\\\\\\";s:4:\\\\\\\"name\\\\\\\";s:1:\\\\\\\"c\\\\\\\";s:10:\\\\\\\"guard_name\\\\\\\";}s:11:\\\\\\\"permissions\\\\\\\";a:5:{i:0;a:3:{s:1:\\\\\\\"a\\\\\\\";i:1;s:1:\\\\\\\"b\\\\\\\";s:5:\\\\\\\"index\\\\\\\";s:1:\\\\\\\"c\\\\\\\";s:5:\\\\\\\"admin\\\\\\\";}i:1;a:3:{s:1:\\\\\\\"a\\\\\\\";i:2;s:1:\\\\\\\"b\\\\\\\";s:6:\\\\\\\"create\\\\\\\";s:1:\\\\\\\"c\\\\\\\";s:5:\\\\\\\"admin\\\\\\\";}i:2;a:3:{s:1:\\\\\\\"a\\\\\\\";i:3;s:1:\\\\\\\"b\\\\\\\";s:4:\\\\\\\"show\\\\\\\";s:1:\\\\\\\"c\\\\\\\";s:5:\\\\\\\"admin\\\\\\\";}i:3;a:3:{s:1:\\\\\\\"a\\\\\\\";i:4;s:1:\\\\\\\"b\\\\\\\";s:4:\\\\\\\"edit\\\\\\\";s:1:\\\\\\\"c\\\\\\\";s:5:\\\\\\\"admin\\\\\\\";}i:4;a:3:{s:1:\\\\\\\"a\\\\\\\";i:5;s:1:\\\\\\\"b\\\\\\\";s:6:\\\\\\\"delete\\\\\\\";s:1:\\\\\\\"c\\\\\\\";s:5:\\\\\\\"admin\\\\\\\";}}s:5:\\\\\\\"roles\\\\\\\";a:0:{}}\') on duplicate key update `expiration` = values(`expiration`), `key` = values(`key`), `value` = values(`value`)\",\"time\":\"14.78\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":21,\"hash\":\"76eef42be78383b10040709eefcbb33a\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(127, '9dec8e8e-a6cd-4f76-a8a3-775cde79b61f', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'cache', '{\"type\":\"set\",\"key\":\"spatie.permission.cache\",\"value\":{\"alias\":{\"a\":\"id\",\"b\":\"name\",\"c\":\"guard_name\"},\"permissions\":[{\"a\":1,\"b\":\"index\",\"c\":\"admin\"},{\"a\":2,\"b\":\"create\",\"c\":\"admin\"},{\"a\":3,\"b\":\"show\",\"c\":\"admin\"},{\"a\":4,\"b\":\"edit\",\"c\":\"admin\"},{\"a\":5,\"b\":\"delete\",\"c\":\"admin\"}],\"roles\":[]},\"expiration\":86400,\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(128, '9dec8e8e-ae65-43bd-a905-3e3174467814', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `permissions` (`guard_name`, `name`, `updated_at`, `created_at`) values (\'admin\', \'forum\', \'2025-01-09 03:28:15\', \'2025-01-09 03:28:15\')\",\"time\":\"17.89\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":21,\"hash\":\"73f7df78b47d34a5ac79b23755419206\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(129, '9dec8e8e-ae88-4d48-b8c0-db03c60593ad', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'model', '{\"action\":\"created\",\"model\":\"Spatie\\\\Permission\\\\Models\\\\Permission:6\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(130, '9dec8e8e-b3b7-4b41-b6d7-03b0827742a7', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"delete from `cache` where `key` in (\'spatie.permission.cache\', \'illuminate:cache:flexible:created:spatie.permission.cache\')\",\"time\":\"12.61\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":21,\"hash\":\"84c324f59f1a38efa9584ea67003529d\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(131, '9dec8e8e-b3d1-47af-9ea9-13d8c492c377', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'cache', '{\"type\":\"forget\",\"key\":\"spatie.permission.cache\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(132, '9dec8e8e-b43c-44dc-b5d2-89ff6cd5a1e8', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `cache` where `key` in (\'spatie.permission.cache\')\",\"time\":\"0.40\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":22,\"hash\":\"423396ec9e2f98d907ef4fff47152199\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(133, '9dec8e8e-b458-477d-aec5-cca1080a002e', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'cache', '{\"type\":\"missed\",\"key\":\"spatie.permission.cache\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(134, '9dec8e8e-b4c4-4db1-be6b-7323335d53f0', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `permissions`\",\"time\":\"0.44\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":22,\"hash\":\"c61ac84cc59cece74af9165092fde0b3\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(135, '9dec8e8e-b5cf-40e0-ae37-5f26c86ddda4', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select `roles`.*, `role_has_permissions`.`permission_id` as `pivot_permission_id`, `role_has_permissions`.`role_id` as `pivot_role_id` from `roles` inner join `role_has_permissions` on `roles`.`id` = `role_has_permissions`.`role_id` where `role_has_permissions`.`permission_id` in (1, 2, 3, 4, 5, 6)\",\"time\":\"0.45\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":22,\"hash\":\"1c7982955ac9e86c6e42f204d70e1fcc\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(136, '9dec8e8e-bc1f-436a-b50a-5c8b05455e28', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `cache` (`expiration`, `key`, `value`) values (1736479695, \'spatie.permission.cache\', \'a:3:{s:5:\\\\\\\"alias\\\\\\\";a:3:{s:1:\\\\\\\"a\\\\\\\";s:2:\\\\\\\"id\\\\\\\";s:1:\\\\\\\"b\\\\\\\";s:4:\\\\\\\"name\\\\\\\";s:1:\\\\\\\"c\\\\\\\";s:10:\\\\\\\"guard_name\\\\\\\";}s:11:\\\\\\\"permissions\\\\\\\";a:6:{i:0;a:3:{s:1:\\\\\\\"a\\\\\\\";i:1;s:1:\\\\\\\"b\\\\\\\";s:5:\\\\\\\"index\\\\\\\";s:1:\\\\\\\"c\\\\\\\";s:5:\\\\\\\"admin\\\\\\\";}i:1;a:3:{s:1:\\\\\\\"a\\\\\\\";i:2;s:1:\\\\\\\"b\\\\\\\";s:6:\\\\\\\"create\\\\\\\";s:1:\\\\\\\"c\\\\\\\";s:5:\\\\\\\"admin\\\\\\\";}i:2;a:3:{s:1:\\\\\\\"a\\\\\\\";i:3;s:1:\\\\\\\"b\\\\\\\";s:4:\\\\\\\"show\\\\\\\";s:1:\\\\\\\"c\\\\\\\";s:5:\\\\\\\"admin\\\\\\\";}i:3;a:3:{s:1:\\\\\\\"a\\\\\\\";i:4;s:1:\\\\\\\"b\\\\\\\";s:4:\\\\\\\"edit\\\\\\\";s:1:\\\\\\\"c\\\\\\\";s:5:\\\\\\\"admin\\\\\\\";}i:4;a:3:{s:1:\\\\\\\"a\\\\\\\";i:5;s:1:\\\\\\\"b\\\\\\\";s:6:\\\\\\\"delete\\\\\\\";s:1:\\\\\\\"c\\\\\\\";s:5:\\\\\\\"admin\\\\\\\";}i:5;a:3:{s:1:\\\\\\\"a\\\\\\\";i:6;s:1:\\\\\\\"b\\\\\\\";s:5:\\\\\\\"forum\\\\\\\";s:1:\\\\\\\"c\\\\\\\";s:5:\\\\\\\"admin\\\\\\\";}}s:5:\\\\\\\"roles\\\\\\\";a:0:{}}\') on duplicate key update `expiration` = values(`expiration`), `key` = values(`key`), `value` = values(`value`)\",\"time\":\"14.98\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":22,\"hash\":\"76eef42be78383b10040709eefcbb33a\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(137, '9dec8e8e-bc3b-48d1-beff-00342bd85a8d', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'cache', '{\"type\":\"set\",\"key\":\"spatie.permission.cache\",\"value\":{\"alias\":{\"a\":\"id\",\"b\":\"name\",\"c\":\"guard_name\"},\"permissions\":[{\"a\":1,\"b\":\"index\",\"c\":\"admin\"},{\"a\":2,\"b\":\"create\",\"c\":\"admin\"},{\"a\":3,\"b\":\"show\",\"c\":\"admin\"},{\"a\":4,\"b\":\"edit\",\"c\":\"admin\"},{\"a\":5,\"b\":\"delete\",\"c\":\"admin\"},{\"a\":6,\"b\":\"forum\",\"c\":\"admin\"}],\"roles\":[]},\"expiration\":86400,\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(138, '9dec8e8e-c326-47c4-ad4f-9bc5af37b7fe', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `permissions` (`guard_name`, `name`, `updated_at`, `created_at`) values (\'admin\', \'user-approve\', \'2025-01-09 03:28:15\', \'2025-01-09 03:28:15\')\",\"time\":\"16.13\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":22,\"hash\":\"73f7df78b47d34a5ac79b23755419206\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(139, '9dec8e8e-c34b-46e9-8681-dc8ceac4a40b', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'model', '{\"action\":\"created\",\"model\":\"Spatie\\\\Permission\\\\Models\\\\Permission:7\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(140, '9dec8e8e-ca5f-49fd-aae7-6602a0868b1d', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"delete from `cache` where `key` in (\'spatie.permission.cache\', \'illuminate:cache:flexible:created:spatie.permission.cache\')\",\"time\":\"17.49\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":22,\"hash\":\"84c324f59f1a38efa9584ea67003529d\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(141, '9dec8e8e-ca7c-497c-8b72-8bbe9409e934', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'cache', '{\"type\":\"forget\",\"key\":\"spatie.permission.cache\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(142, '9dec8e8e-cafd-41df-85b1-3dfcba9ecca6', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `roles` where `name` = \'root-admin\' and `guard_name` = \'admin\' limit 1\",\"time\":\"0.48\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":24,\"hash\":\"de1bc7a62331e87ecc91f3ab3855091f\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(143, '9dec8e8e-d2a4-455a-bd7a-d03fa9c5697d', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `roles` (`guard_name`, `name`, `updated_at`, `created_at`) values (\'admin\', \'root-admin\', \'2025-01-09 03:28:15\', \'2025-01-09 03:28:15\')\",\"time\":\"18.39\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":24,\"hash\":\"1dca94ec652015a6eef78cc3270f91c0\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(144, '9dec8e8e-d2c9-4187-9b85-13292b797d72', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'model', '{\"action\":\"created\",\"model\":\"Spatie\\\\Permission\\\\Models\\\\Role:1\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(145, '9dec8e8e-d330-42de-9d03-29bab67750f3', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"delete from `cache` where `key` in (\'spatie.permission.cache\', \'illuminate:cache:flexible:created:spatie.permission.cache\')\",\"time\":\"0.46\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":24,\"hash\":\"84c324f59f1a38efa9584ea67003529d\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(146, '9dec8e8e-d34d-487c-b795-5ccae7a1edf3', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'cache', '{\"type\":\"forget\",\"key\":\"spatie.permission.cache\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(147, '9dec8e8e-d3b5-4d6b-8bb7-7ea3e8f44685', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `permissions`\",\"time\":\"0.39\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":25,\"hash\":\"c61ac84cc59cece74af9165092fde0b3\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(148, '9dec8e8e-d50b-439b-b479-73d2be0cd287', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select `permissions`.*, `role_has_permissions`.`role_id` as `pivot_role_id`, `role_has_permissions`.`permission_id` as `pivot_permission_id` from `permissions` inner join `role_has_permissions` on `permissions`.`id` = `role_has_permissions`.`permission_id` where `role_has_permissions`.`role_id` = 1\",\"time\":\"0.55\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":25,\"hash\":\"eec147138b5334a7e593e2dd4252090d\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(149, '9dec8e8e-da52-48ed-a399-5725f651f8f6', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `role_has_permissions` (`permission_id`, `role_id`) values (1, 1), (2, 1), (3, 1), (4, 1), (5, 1), (6, 1), (7, 1)\",\"time\":\"12.37\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":25,\"hash\":\"b08de5c9855ea60f1fd33f6d4b43d396\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(150, '9dec8e8e-dc1f-49aa-85f1-754d4f1bc0bd', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"delete from `cache` where `key` in (\'spatie.permission.cache\', \'illuminate:cache:flexible:created:spatie.permission.cache\')\",\"time\":\"0.38\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":25,\"hash\":\"84c324f59f1a38efa9584ea67003529d\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(151, '9dec8e8e-dc3a-46c8-961e-420a91346caf', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'cache', '{\"type\":\"forget\",\"key\":\"spatie.permission.cache\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(152, '9dec8e8e-dca0-4687-b519-374909014898', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `roles` where `name` = \'admin\' and `guard_name` = \'admin\' limit 1\",\"time\":\"0.36\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":27,\"hash\":\"de1bc7a62331e87ecc91f3ab3855091f\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(153, '9dec8e8e-e306-4e89-a959-fcc7c7e63939', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `roles` (`guard_name`, `name`, `updated_at`, `created_at`) values (\'admin\', \'admin\', \'2025-01-09 03:28:15\', \'2025-01-09 03:28:15\')\",\"time\":\"15.24\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":27,\"hash\":\"1dca94ec652015a6eef78cc3270f91c0\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(154, '9dec8e8e-e329-47ca-b1fb-16dad2598a44', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'model', '{\"action\":\"created\",\"model\":\"Spatie\\\\Permission\\\\Models\\\\Role:2\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(155, '9dec8e8e-e37a-4e6f-9a51-4e5dc7a10d18', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"delete from `cache` where `key` in (\'spatie.permission.cache\', \'illuminate:cache:flexible:created:spatie.permission.cache\')\",\"time\":\"0.26\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":27,\"hash\":\"84c324f59f1a38efa9584ea67003529d\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(156, '9dec8e8e-e391-42e4-93fa-922c81bdc816', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'cache', '{\"type\":\"forget\",\"key\":\"spatie.permission.cache\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(157, '9dec8e8e-e405-459f-99c5-6087100c39bc', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `cache` where `key` in (\'spatie.permission.cache\')\",\"time\":\"0.39\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":28,\"hash\":\"423396ec9e2f98d907ef4fff47152199\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(158, '9dec8e8e-e421-4da5-bf45-55a9c3992ad5', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'cache', '{\"type\":\"missed\",\"key\":\"spatie.permission.cache\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(159, '9dec8e8e-e485-4868-86ca-e4e7caea8520', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `permissions`\",\"time\":\"0.35\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":28,\"hash\":\"c61ac84cc59cece74af9165092fde0b3\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(160, '9dec8e8e-e5b6-48d1-9066-4ce53911f123', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select `roles`.*, `role_has_permissions`.`permission_id` as `pivot_permission_id`, `role_has_permissions`.`role_id` as `pivot_role_id` from `roles` inner join `role_has_permissions` on `roles`.`id` = `role_has_permissions`.`role_id` where `role_has_permissions`.`permission_id` in (1, 2, 3, 4, 5, 6, 7)\",\"time\":\"0.58\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":28,\"hash\":\"1e1ed7449bf86b2aa089908f14e8d67c\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(161, '9dec8e8e-e5eb-4de6-ae2a-ca73282979a0', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'model', '{\"action\":\"retrieved\",\"model\":\"Spatie\\\\Permission\\\\Models\\\\Role\",\"count\":9,\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(162, '9dec8e8e-ec7e-4130-b662-0277caa44318', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `cache` (`expiration`, `key`, `value`) values (1736479695, \'spatie.permission.cache\', \'a:3:{s:5:\\\\\\\"alias\\\\\\\";a:4:{s:1:\\\\\\\"a\\\\\\\";s:2:\\\\\\\"id\\\\\\\";s:1:\\\\\\\"b\\\\\\\";s:4:\\\\\\\"name\\\\\\\";s:1:\\\\\\\"c\\\\\\\";s:10:\\\\\\\"guard_name\\\\\\\";s:1:\\\\\\\"r\\\\\\\";s:5:\\\\\\\"roles\\\\\\\";}s:11:\\\\\\\"permissions\\\\\\\";a:7:{i:0;a:4:{s:1:\\\\\\\"a\\\\\\\";i:1;s:1:\\\\\\\"b\\\\\\\";s:5:\\\\\\\"index\\\\\\\";s:1:\\\\\\\"c\\\\\\\";s:5:\\\\\\\"admin\\\\\\\";s:1:\\\\\\\"r\\\\\\\";a:1:{i:0;i:1;}}i:1;a:4:{s:1:\\\\\\\"a\\\\\\\";i:2;s:1:\\\\\\\"b\\\\\\\";s:6:\\\\\\\"create\\\\\\\";s:1:\\\\\\\"c\\\\\\\";s:5:\\\\\\\"admin\\\\\\\";s:1:\\\\\\\"r\\\\\\\";a:1:{i:0;i:1;}}i:2;a:4:{s:1:\\\\\\\"a\\\\\\\";i:3;s:1:\\\\\\\"b\\\\\\\";s:4:\\\\\\\"show\\\\\\\";s:1:\\\\\\\"c\\\\\\\";s:5:\\\\\\\"admin\\\\\\\";s:1:\\\\\\\"r\\\\\\\";a:1:{i:0;i:1;}}i:3;a:4:{s:1:\\\\\\\"a\\\\\\\";i:4;s:1:\\\\\\\"b\\\\\\\";s:4:\\\\\\\"edit\\\\\\\";s:1:\\\\\\\"c\\\\\\\";s:5:\\\\\\\"admin\\\\\\\";s:1:\\\\\\\"r\\\\\\\";a:1:{i:0;i:1;}}i:4;a:4:{s:1:\\\\\\\"a\\\\\\\";i:5;s:1:\\\\\\\"b\\\\\\\";s:6:\\\\\\\"delete\\\\\\\";s:1:\\\\\\\"c\\\\\\\";s:5:\\\\\\\"admin\\\\\\\";s:1:\\\\\\\"r\\\\\\\";a:1:{i:0;i:1;}}i:5;a:4:{s:1:\\\\\\\"a\\\\\\\";i:6;s:1:\\\\\\\"b\\\\\\\";s:5:\\\\\\\"forum\\\\\\\";s:1:\\\\\\\"c\\\\\\\";s:5:\\\\\\\"admin\\\\\\\";s:1:\\\\\\\"r\\\\\\\";a:1:{i:0;i:1;}}i:6;a:4:{s:1:\\\\\\\"a\\\\\\\";i:7;s:1:\\\\\\\"b\\\\\\\";s:12:\\\\\\\"user-approve\\\\\\\";s:1:\\\\\\\"c\\\\\\\";s:5:\\\\\\\"admin\\\\\\\";s:1:\\\\\\\"r\\\\\\\";a:1:{i:0;i:1;}}}s:5:\\\\\\\"roles\\\\\\\";a:1:{i:0;a:3:{s:1:\\\\\\\"a\\\\\\\";i:1;s:1:\\\\\\\"b\\\\\\\";s:10:\\\\\\\"root-admin\\\\\\\";s:1:\\\\\\\"c\\\\\\\";s:5:\\\\\\\"admin\\\\\\\";}}}\') on duplicate key update `expiration` = values(`expiration`), `key` = values(`key`), `value` = values(`value`)\",\"time\":\"13.44\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":28,\"hash\":\"76eef42be78383b10040709eefcbb33a\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(163, '9dec8e8e-ec9a-4037-a992-fa158bcec8a7', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'cache', '{\"type\":\"set\",\"key\":\"spatie.permission.cache\",\"value\":{\"alias\":{\"a\":\"id\",\"b\":\"name\",\"c\":\"guard_name\",\"r\":\"roles\"},\"permissions\":[{\"a\":1,\"b\":\"index\",\"c\":\"admin\",\"r\":[1]},{\"a\":2,\"b\":\"create\",\"c\":\"admin\",\"r\":[1]},{\"a\":3,\"b\":\"show\",\"c\":\"admin\",\"r\":[1]},{\"a\":4,\"b\":\"edit\",\"c\":\"admin\",\"r\":[1]},{\"a\":5,\"b\":\"delete\",\"c\":\"admin\",\"r\":[1]},{\"a\":6,\"b\":\"forum\",\"c\":\"admin\",\"r\":[1]},{\"a\":7,\"b\":\"user-approve\",\"c\":\"admin\",\"r\":[1]}],\"roles\":[{\"a\":1,\"b\":\"root-admin\",\"c\":\"admin\"}]},\"expiration\":86400,\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(164, '9dec8e8e-ed95-475e-abb5-2a4effcfc411', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select `permissions`.*, `role_has_permissions`.`role_id` as `pivot_role_id`, `role_has_permissions`.`permission_id` as `pivot_permission_id` from `permissions` inner join `role_has_permissions` on `permissions`.`id` = `role_has_permissions`.`permission_id` where `role_has_permissions`.`role_id` = 2\",\"time\":\"0.62\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":28,\"hash\":\"eec147138b5334a7e593e2dd4252090d\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(165, '9dec8e8e-f4a6-4adf-81e9-8e80c161e9d5', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `role_has_permissions` (`permission_id`, `role_id`) values (1, 2), (3, 2), (2, 2)\",\"time\":\"17.11\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":28,\"hash\":\"82708e2567729e8a826955ffd508fd30\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(166, '9dec8e8e-f9e7-4dff-a25a-5416536174af', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"delete from `cache` where `key` in (\'spatie.permission.cache\', \'illuminate:cache:flexible:created:spatie.permission.cache\')\",\"time\":\"12.77\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/RoleSeeder.php\",\"line\":28,\"hash\":\"84c324f59f1a38efa9584ea67003529d\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(167, '9dec8e8e-fa05-4ef3-9ab5-b65932507091', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'cache', '{\"type\":\"forget\",\"key\":\"spatie.permission.cache\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:15'),
(168, '9dec8e8f-6483-4869-9786-2ae5a89f62cf', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `admins` (`role_id`, `name`, `email`, `password`, `updated_at`, `created_at`) values (1, \'RootAdmin\', \'root@admin.com\', \'y$TQhzCbM50xX2v2p7rKDzJurBwhvzNIUhvc6G3O4RBXEqSvU5OkpyS\', \'2025-01-09 03:28:16\', \'2025-01-09 03:28:16\')\",\"time\":\"25.52\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/AdminSeeder.php\",\"line\":16,\"hash\":\"e41c2b209d140af22e4a90fd79941277\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:16'),
(169, '9dec8e8f-64af-40a7-aaf9-65c6ad483e8e', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'model', '{\"action\":\"created\",\"model\":\"App\\\\Models\\\\Admin:1\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:16'),
(170, '9dec8e8f-6541-4ce8-acd0-7847ea6d82e0', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `roles` where `name` = \'root-admin\' and `guard_name` = \'admin\' limit 1\",\"time\":\"0.51\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/AdminSeeder.php\",\"line\":22,\"hash\":\"de1bc7a62331e87ecc91f3ab3855091f\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:16'),
(171, '9dec8e8f-6631-4eb9-a990-7b52c0d450f3', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select `roles`.*, `model_has_roles`.`model_id` as `pivot_model_id`, `model_has_roles`.`role_id` as `pivot_role_id`, `model_has_roles`.`model_type` as `pivot_model_type` from `roles` inner join `model_has_roles` on `roles`.`id` = `model_has_roles`.`role_id` where `model_has_roles`.`model_id` = 1 and `model_has_roles`.`model_type` = \'App\\\\Models\\\\Admin\'\",\"time\":\"0.63\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/AdminSeeder.php\",\"line\":22,\"hash\":\"eb2635dbf27540ab6ab19dc9db8a2961\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:16'),
(172, '9dec8e8f-6e4c-42ab-8491-e819a5df8f9f', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `model_has_roles` (`model_id`, `model_type`, `role_id`) values (1, \'App\\\\Models\\\\Admin\', 1)\",\"time\":\"19.75\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/AdminSeeder.php\",\"line\":22,\"hash\":\"b40636c8a9886b7fb107e3eb7dd2c0eb\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:16'),
(173, '9dec8e8f-d2be-4699-a0ee-0c26a86905f6', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `admins` (`role_id`, `name`, `email`, `password`, `updated_at`, `created_at`) values (2, \'Admin\', \'admin@gmail.com\', \'y$IBWhWP46jXU9JFrsQqW4OuahWoOhYcSF3jDhQXwo.XQxfjsy4tziu\', \'2025-01-09 03:28:16\', \'2025-01-09 03:28:16\')\",\"time\":\"17.24\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/AdminSeeder.php\",\"line\":24,\"hash\":\"e41c2b209d140af22e4a90fd79941277\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:16'),
(174, '9dec8e8f-d2e8-4164-9782-3eefe602c032', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'model', '{\"action\":\"created\",\"model\":\"App\\\\Models\\\\Admin:2\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:16'),
(175, '9dec8e8f-d376-4579-a041-f8ee70109c23', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `roles` where `name` = \'admin\' and `guard_name` = \'admin\' limit 1\",\"time\":\"0.50\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/AdminSeeder.php\",\"line\":30,\"hash\":\"de1bc7a62331e87ecc91f3ab3855091f\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:16'),
(176, '9dec8e8f-d440-4b6e-8b6e-8407a1ae688f', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select `roles`.*, `model_has_roles`.`model_id` as `pivot_model_id`, `model_has_roles`.`role_id` as `pivot_role_id`, `model_has_roles`.`model_type` as `pivot_model_type` from `roles` inner join `model_has_roles` on `roles`.`id` = `model_has_roles`.`role_id` where `model_has_roles`.`model_id` = 2 and `model_has_roles`.`model_type` = \'App\\\\Models\\\\Admin\'\",\"time\":\"0.51\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/AdminSeeder.php\",\"line\":30,\"hash\":\"eb2635dbf27540ab6ab19dc9db8a2961\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:16'),
(177, '9dec8e8f-d9ed-4f3f-81b4-fbc904de2e31', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `model_has_roles` (`model_id`, `model_type`, `role_id`) values (2, \'App\\\\Models\\\\Admin\', 2)\",\"time\":\"13.50\",\"slow\":false,\"file\":\"\\/home\\/msi\\/Desktop\\/bootdev\\/car_exera\\/database\\/seeders\\/AdminSeeder.php\",\"line\":30,\"hash\":\"b40636c8a9886b7fb107e3eb7dd2c0eb\",\"hostname\":\"pop-os\"}', '2025-01-09 03:28:16'),
(178, '9dec8e8f-daa5-4a65-a0c5-77e62dbea6e3', '9dec8e8f-db26-4dd5-b76c-6e45a00d1a2e', NULL, 1, 'command', '{\"command\":\"db:seed\",\"exit_code\":0,\"arguments\":{\"command\":\"db:seed\",\"class\":null},\"options\":{\"class\":\"Database\\\\Seeders\\\\DatabaseSeeder\",\"database\":null,\"force\":false,\"help\":false,\"quiet\":false,\"verbose\":false,\"version\":false,\"ansi\":null,\"no-interaction\":false,\"env\":null},\"hostname\":\"pop-os\"}', '2025-01-09 03:28:16');

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
('9dec8e8f-64af-40a7-aaf9-65c6ad483e8e', 'App\\Models\\Admin:1'),
('9dec8e8f-d2e8-4164-9782-3eefe602c032', 'App\\Models\\Admin:2'),
('9dec8e58-4765-4169-8936-44f4474d3da6', 'slow'),
('9dec8e58-dcec-46b4-9730-5c9b389e8d26', 'slow'),
('9dec8e59-3bc8-4bf6-94e0-d7baf038e447', 'slow'),
('9dec8e59-86ab-4344-a13f-6f7f8b618f42', 'slow'),
('9dec8e59-dbae-4b30-9797-588b35a461dc', 'slow'),
('9dec8e5b-0e77-42ae-a2ff-a7833f519c80', 'slow'),
('9dec8e5b-936a-48f2-a3f0-e52f048d1add', 'slow'),
('9dec8e5c-43fd-4888-95fa-a1dec264a348', 'slow'),
('9dec8e5c-b1b3-4023-aee8-c2a3a03302aa', 'slow'),
('9dec8e5d-10e4-4bb0-b3bf-4b25e75fa4eb', 'slow'),
('9dec8e5e-5bf6-489e-807f-6ac3dbbc7cbc', 'slow'),
('9dec8e5e-871e-4569-aa52-8bbf54c9ec84', 'slow'),
('9dec8e8e-47ad-4a49-b84c-ad324f722ef3', 'Spatie\\Permission\\Models\\Permission'),
('9dec8e8e-3db5-480c-9878-e6092b7d9f8b', 'Spatie\\Permission\\Models\\Permission:1'),
('9dec8e8e-576b-40f5-8910-5f17984bcbe7', 'Spatie\\Permission\\Models\\Permission:2'),
('9dec8e8e-6bd2-48a8-ad03-95b0e0ceaf6b', 'Spatie\\Permission\\Models\\Permission:3'),
('9dec8e8e-8172-4ebb-a83f-a634eaea0aa7', 'Spatie\\Permission\\Models\\Permission:4'),
('9dec8e8e-9719-421d-bbd5-c0e6f0594e96', 'Spatie\\Permission\\Models\\Permission:5'),
('9dec8e8e-ae88-4d48-b8c0-db03c60593ad', 'Spatie\\Permission\\Models\\Permission:6'),
('9dec8e8e-c34b-46e9-8681-dc8ceac4a40b', 'Spatie\\Permission\\Models\\Permission:7'),
('9dec8e8e-e5eb-4de6-ae2a-ca73282979a0', 'Spatie\\Permission\\Models\\Role'),
('9dec8e8e-d2c9-4187-9b85-13292b797d72', 'Spatie\\Permission\\Models\\Role:1'),
('9dec8e8e-e329-47ca-b1fb-16dad2598a44', 'Spatie\\Permission\\Models\\Role:2');

-- --------------------------------------------------------

--
-- Table structure for table `telescope_monitoring`
--

CREATE TABLE `telescope_monitoring` (
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
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
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `telescope_entries`
--
ALTER TABLE `telescope_entries`
  MODIFY `sequence` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

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
