-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 05, 2023 at 01:22 PM
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
-- Database: `property_beehive`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_roles`
--

DROP TABLE IF EXISTS `admin_roles`;
CREATE TABLE IF NOT EXISTS `admin_roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` int NOT NULL DEFAULT '1' COMMENT '1=Active, 2=>Inactive',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `admin_password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag` int NOT NULL DEFAULT '1' COMMENT '1=Active,2=Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `role_id`, `name`, `email`, `contact`, `email_verified_at`, `admin_password`, `password`, `remember_token`, `flag`, `created_at`, `updated_at`) VALUES
(1, 1, 'Hackberry Softech', 'info@hackberrysoftech.com', '7948998877', NULL, '123', '$2y$10$jHkW8JR9QqbaJLWoSSiULOu8v1riVsJ0IgKqcPi5YahYk/vM40jwC', NULL, 1, '2023-05-03 13:01:55', '2023-05-03 13:01:55');

-- --------------------------------------------------------

--
-- Table structure for table `client_master`
--

DROP TABLE IF EXISTS `client_master`;
CREATE TABLE IF NOT EXISTS `client_master` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_type_id` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `user_password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` int NOT NULL DEFAULT '1' COMMENT '1=Active, 2=>Inactive',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_master`
--

INSERT INTO `client_master` (`id`, `client_type_id`, `name`, `contact`, `email`, `email_verified_at`, `user_password`, `password`, `flag`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, '8780009537', NULL, NULL, '123', '$2y$10$g.i5hZ3Qh70QFHymmA1L9OtWi/sNNakUCkOCGi.xzPECGFlixxJdy', 1, NULL, '2023-05-05 04:22:01', '2023-05-05 04:22:01'),
(2, 1, NULL, '1234567898', NULL, NULL, '1234', '$2y$10$SFMzT2g9HETSHSXf1n6Wz.x74GNgGgkS2e9pXkNMRCkdUqdD8faru', 1, NULL, '2023-05-05 06:13:29', '2023-05-05 06:13:29'),
(3, 2, NULL, '9876543210', NULL, NULL, '123', '$2y$10$mtkK6j0La0E8oJnU.xAMqe20dAw0qz3V9UkDiGFlCSQdbx.4bNV5.', 1, NULL, '2023-05-05 06:16:11', '2023-05-05 06:16:11'),
(4, 2, NULL, '9876543210', NULL, NULL, '1234567890', '$2y$10$4Qjt3j/87frjBPFmqrwXnuHqeV1UJYHprJ4C.iFH8gfGS9MWkJckK', 1, NULL, '2023-05-05 06:27:00', '2023-05-05 06:27:00');

-- --------------------------------------------------------

--
-- Table structure for table `client_types`
--

DROP TABLE IF EXISTS `client_types`;
CREATE TABLE IF NOT EXISTS `client_types` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` int NOT NULL DEFAULT '1' COMMENT '1=Active, 2=>Inactive',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_types`
--

INSERT INTO `client_types` (`id`, `client_type`, `flag`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Owner', 1, NULL, NULL, NULL, NULL),
(2, 'Buyer', 1, NULL, NULL, NULL, NULL),
(3, 'Broker', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2023_04_20_133648_create_admin_users_table', 1),
(2, '2023_04_20_132934_create_admin_roles_table', 2),
(3, '2023_05_05_051359_create_client_master_table', 3),
(4, '2023_05_05_123307_create_client_types_table', 4);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
