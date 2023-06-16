-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 16, 2023 at 12:30 PM
-- Server version: 8.0.31
-- PHP Version: 8.1.13

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
-- Table structure for table `agricultural_properties`
--

DROP TABLE IF EXISTS `agricultural_properties`;
CREATE TABLE IF NOT EXISTS `agricultural_properties` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `property_master_id` int NOT NULL,
  `descr` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_floor` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_bedrooms` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_bathrooms` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_open_side` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `width_of_road_facing_plot` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `boundary_wall_made` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `carpet_area` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `super_area` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `width_of_entrance` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plot_area` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plot_length` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plot_breadth` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `furnished_status` varchar(99) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `possession_status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_duration` varchar(99) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currently_leased_out` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `leased_to` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monthly_rent` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag` int NOT NULL DEFAULT '1' COMMENT '1=Active, 2=>Inactive',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

DROP TABLE IF EXISTS `amenities`;
CREATE TABLE IF NOT EXISTS `amenities` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `amenities` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` int NOT NULL DEFAULT '1' COMMENT '1=Active, 2=>Inactive',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`id`, `amenities`, `flag`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Water supply', 1, 1, NULL, '2023-05-09 04:51:30', '2023-05-09 04:51:30'),
(2, 'Power backup', 1, 1, NULL, '2023-05-09 04:51:38', '2023-05-09 04:51:38'),
(3, 'Parking', 1, 1, NULL, '2023-05-09 04:52:19', '2023-05-09 04:52:19'),
(4, 'Elevator', 1, 1, NULL, '2023-05-09 04:52:27', '2023-05-09 04:52:27'),
(5, 'Shop', 1, 1, NULL, '2023-05-09 04:52:34', '2023-05-09 04:52:34'),
(6, 'Security system', 1, 1, NULL, '2023-05-09 04:52:42', '2023-05-09 04:52:42'),
(7, 'Living in the greens', 1, 1, NULL, '2023-05-09 04:52:52', '2023-05-09 04:52:52'),
(8, 'Play area for kids', 1, 1, NULL, '2023-05-09 04:53:00', '2023-05-09 04:53:00'),
(9, 'Clubhouse', 1, 1, NULL, '2023-05-09 04:53:10', '2023-05-09 04:53:10'),
(10, 'Sports facilities', 1, 1, NULL, '2023-05-09 04:53:21', '2023-05-09 04:53:21'),
(11, 'Salon & spa', 1, 1, NULL, '2023-05-09 04:53:32', '2023-05-09 04:53:32'),
(12, 'Focus on fitness', 1, 1, NULL, '2023-05-09 04:53:39', '2023-05-09 04:53:39'),
(13, 'Restaurant', 1, 1, NULL, '2023-05-09 04:53:46', '2023-05-09 04:53:46'),
(14, 'Concierge service', 1, 1, NULL, '2023-05-09 04:53:55', '2023-05-09 04:53:55');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_id` int NOT NULL,
  `flag` int NOT NULL DEFAULT '1' COMMENT '1=Active, 2=>Inactive',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=607 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city`, `state_id`, `flag`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Ahmedabad', 1, 1, NULL, NULL, NULL, NULL),
(2, 'Amreli', 1, 1, NULL, NULL, NULL, NULL),
(3, 'Anand', 1, 1, NULL, NULL, NULL, NULL),
(4, 'Aravalli', 1, 1, NULL, NULL, NULL, NULL),
(5, 'Banaskantha', 1, 1, NULL, NULL, NULL, NULL),
(6, 'Bharuch', 1, 1, NULL, NULL, NULL, NULL),
(7, 'Bhavnagar', 1, 1, NULL, NULL, NULL, NULL),
(8, 'Botad', 1, 1, NULL, NULL, NULL, NULL),
(9, 'Chhota Udaipur', 1, 1, NULL, NULL, NULL, NULL),
(10, 'Dahod', 1, 1, NULL, NULL, NULL, NULL),
(11, 'Dangs', 1, 1, NULL, NULL, NULL, NULL),
(12, 'Devbhumi Dwarka', 1, 1, NULL, NULL, NULL, NULL),
(13, 'Gandhinagar', 1, 1, NULL, NULL, NULL, NULL),
(14, 'Gir Somnath', 1, 1, NULL, NULL, NULL, NULL),
(15, 'Jamnagar', 1, 1, NULL, NULL, NULL, NULL),
(16, 'Junagadh', 1, 1, NULL, NULL, NULL, NULL),
(17, 'Kheda', 1, 1, NULL, NULL, NULL, NULL),
(18, 'Kutch', 1, 1, NULL, NULL, NULL, NULL),
(19, 'Mahisagar', 1, 1, NULL, NULL, NULL, NULL),
(20, 'Mehsana', 1, 1, NULL, NULL, NULL, NULL),
(21, 'Morbi', 1, 1, NULL, NULL, NULL, NULL),
(22, 'Narmada', 1, 1, NULL, NULL, NULL, NULL),
(23, 'Navsari', 1, 1, NULL, NULL, NULL, NULL),
(24, 'Panchmahal', 1, 1, NULL, NULL, NULL, NULL),
(25, 'Patan', 1, 1, NULL, NULL, NULL, NULL),
(26, 'Porbandar', 1, 1, NULL, NULL, NULL, NULL),
(27, 'Rajkot', 1, 1, NULL, NULL, NULL, NULL),
(28, 'Sabarkantha', 1, 1, NULL, NULL, NULL, NULL),
(29, 'Surat', 1, 1, NULL, NULL, NULL, NULL),
(30, 'Surendranagar', 1, 1, NULL, NULL, NULL, NULL),
(31, 'Tapi', 1, 1, NULL, NULL, NULL, NULL),
(32, 'Vadodara', 1, 1, NULL, NULL, NULL, NULL),
(33, 'Valsad', 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `client_master`
--

DROP TABLE IF EXISTS `client_master`;
CREATE TABLE IF NOT EXISTS `client_master` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_type_id` int NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `state_id` int DEFAULT NULL,
  `city_id` int DEFAULT NULL,
  `zip` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
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

INSERT INTO `client_master` (`id`, `client_type_id`, `name`, `contact`, `email`, `email_verified_at`, `state_id`, `city_id`, `zip`, `address`, `user_password`, `password`, `flag`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 2, 'Kaushal Parekh1', '8780009537', 'kaushal.parekh@hackberrysoftech.com', NULL, NULL, NULL, '380009', 'Aakash Complex, 105-106 Near Citi Bank Lane Shri Arvind Marg Road Navrangpura Ahmedabad', '123', '$2y$10$g.i5hZ3Qh70QFHymmA1L9OtWi/sNNakUCkOCGi.xzPECGFlixxJdy', 1, NULL, '2023-05-05 04:22:01', '2023-06-15 07:49:32'),
(2, 1, 'Yash Patel', '1234567898', 'yash@gmail.com', NULL, 5, 125, '380009', 'Swastik', '1234', '$2y$10$SFMzT2g9HETSHSXf1n6Wz.x74GNgGgkS2e9pXkNMRCkdUqdD8faru', 1, NULL, '2023-05-05 06:13:29', '2023-06-02 05:24:38'),
(3, 2, 'Parthik Modi', '9173281097', 'parthikmodi43@gmail.com', NULL, 5, 141, '384265', 'Patan Gujarat', '123', '$2y$10$mtkK6j0La0E8oJnU.xAMqe20dAw0qz3V9UkDiGFlCSQdbx.4bNV5.', 1, NULL, '2023-05-05 06:16:11', '2023-06-07 00:10:52'),
(4, 2, NULL, '9876543210', NULL, NULL, NULL, NULL, NULL, NULL, '1234567890', '$2y$10$4Qjt3j/87frjBPFmqrwXnuHqeV1UJYHprJ4C.iFH8gfGS9MWkJckK', 1, NULL, '2023-05-05 06:27:00', '2023-05-05 06:27:00');

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
-- Table structure for table `commercial_properties`
--

DROP TABLE IF EXISTS `commercial_properties`;
CREATE TABLE IF NOT EXISTS `commercial_properties` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `property_master_id` int NOT NULL,
  `descr` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `land_zone` varchar(99) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ideal_for_business` varchar(99) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nearby_business` varchar(99) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `floor_no` varchar(99) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_floor` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_washrooms` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `personal_washroom` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cafeteria` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `corner` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_main_road_facing` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `floor_allowed_for_construction` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_open_side` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `width_of_road_facing_plot` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `any_construction` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `boundary_wall_made` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_in_gated_colony` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `carpet_area` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `super_area` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `width_of_entrance` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plot_area` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plot_length` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plot_breadth` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `furnished_status` varchar(99) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `possession_status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_duration` varchar(99) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currently_leased_out` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `leased_to` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monthly_rent` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag` int NOT NULL DEFAULT '1' COMMENT '1=Active, 2=>Inactive',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `commercial_properties`
--

INSERT INTO `commercial_properties` (`id`, `property_master_id`, `descr`, `land_zone`, `ideal_for_business`, `nearby_business`, `floor_no`, `total_floor`, `total_washrooms`, `personal_washroom`, `cafeteria`, `corner`, `is_main_road_facing`, `floor_allowed_for_construction`, `total_open_side`, `width_of_road_facing_plot`, `any_construction`, `boundary_wall_made`, `is_in_gated_colony`, `carpet_area`, `super_area`, `width_of_entrance`, `plot_area`, `plot_length`, `plot_breadth`, `furnished_status`, `possession_status`, `age`, `time_duration`, `currently_leased_out`, `leased_to`, `monthly_rent`, `flag`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 7, 'Abc', NULL, NULL, NULL, NULL, '3', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '250', '200', NULL, NULL, NULL, NULL, 'Fully Furnished', 'Ready to Move', '5 to 10 Years', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-06-09 11:56:54', '2023-06-09 11:56:54');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `industrial_properties`
--

DROP TABLE IF EXISTS `industrial_properties`;
CREATE TABLE IF NOT EXISTS `industrial_properties` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `property_master_id` int NOT NULL,
  `descr` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `land_zone` varchar(99) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_floor` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_main_road_facing` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `floor_allowed_for_construction` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_open_side` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `width_of_road_facing_plot` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `any_construction` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `boundary_wall_made` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `carpet_area` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `super_area` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plot_area` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plot_length` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plot_breadth` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `furnished_status` varchar(99) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `possession_status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_duration` varchar(99) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currently_leased_out` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `leased_to` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monthly_rent` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag` int NOT NULL DEFAULT '1' COMMENT '1=Active, 2=>Inactive',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

DROP TABLE IF EXISTS `inquiries`;
CREATE TABLE IF NOT EXISTS `inquiries` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_master_id` int NOT NULL,
  `property_master_id` int NOT NULL,
  `inqury_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag` int NOT NULL DEFAULT '1' COMMENT '1=Active, 2=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`id`, `client_master_id`, `property_master_id`, `inqury_type`, `name`, `contact`, `email`, `flag`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'Property Inquiry', 'Parthik Modi', '9173281097', 'parthikmodi43@gmail.com', 1, '2023-06-02 02:46:37', '2023-06-02 02:46:37'),
(2, 3, 2, 'JoyProperty Inquiry ByParthik Modi', 'Parthik Modi', '9173281097', 'parthikmodi43@gmail.com', 1, '2023-06-02 03:39:44', '2023-06-02 03:39:44'),
(3, 3, 3, 'Patan Test Property Inquiry By Kaushal Parekh', 'Kaushal Parekh', '8780009537', 'kaushal.parekh@hackberrysoftech.com', 1, '2023-06-02 04:58:09', '2023-06-02 04:58:09'),
(4, 3, 3, 'Patan Test Property Inquiry By Yash Patel', 'Yash Patel', '1234567898', 'yash@gmail.com', 1, '2023-06-02 05:26:57', '2023-06-02 05:26:57'),
(5, 3, 2, 'Joy Property Inquiry By Parthik Modi', 'Parthik Modi', '9173281097', 'parthikmodi43@gmail.com', 1, '2023-06-08 05:46:22', '2023-06-08 05:46:22');

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
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2023_04_20_133648_create_admin_users_table', 1),
(2, '2023_04_20_132934_create_admin_roles_table', 2),
(3, '2023_05_05_051359_create_client_master_table', 3),
(4, '2023_05_05_123307_create_client_types_table', 4),
(5, '2023_04_21_133443_create_states_table', 5),
(6, '2023_04_21_133428_create_cities_table', 6),
(7, '2023_05_02_132759_create_property_types_table', 7),
(8, '2023_05_02_130245_create_property_categories_table', 8),
(9, '2023_04_26_124455_create_property_master_plan_images_table', 9),
(10, '2023_04_26_112651_create_property_masters_table', 10),
(11, '2023_05_03_065510_create_residential_properties_table', 11),
(12, '2023_04_26_125414_create_property_amenities_table', 12),
(13, '2023_05_03_093957_create_property_site_view_images_table', 13),
(14, '2023_05_03_095112_create_commercial_properties_table', 14),
(15, '2023_05_03_104315_create_industrial_properties_table', 15),
(16, '2023_05_03_110728_create_agricultural_properties_table', 16),
(17, '2014_10_12_000000_create_users_table', 17),
(18, '2014_10_12_100000_create_password_reset_tokens_table', 17),
(19, '2019_08_19_000000_create_failed_jobs_table', 17),
(20, '2019_12_14_000001_create_personal_access_tokens_table', 17),
(21, '2023_04_20_114843_create_properties_table', 17),
(22, '2023_04_25_082414_create_property_transactions_table', 17),
(23, '2023_06_02_060531_create_inquiries_table', 18),
(24, '2023_04_26_065126_create_amenities_table.php', 19),
(25, '2023_06_14_071710_create_talukas_table', 20);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

DROP TABLE IF EXISTS `properties`;
CREATE TABLE IF NOT EXISTS `properties` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `property_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` int NOT NULL DEFAULT '1' COMMENT '1=Active, 2=>Inactive',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `property_amenities`
--

DROP TABLE IF EXISTS `property_amenities`;
CREATE TABLE IF NOT EXISTS `property_amenities` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `property_master_id` int NOT NULL,
  `amenities_id` int NOT NULL,
  `amenities_image` varchar(99) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag` int NOT NULL DEFAULT '1' COMMENT '1=Active, 2=>Inactive',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_amenities`
--

INSERT INTO `property_amenities` (`id`, `property_master_id`, `amenities_id`, `amenities_image`, `flag`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, 1, NULL, NULL, '2023-05-13 07:08:33', '2023-05-13 07:08:33'),
(2, 1, 3, NULL, 1, NULL, NULL, '2023-05-13 07:08:33', '2023-05-13 07:08:33'),
(3, 1, 4, NULL, 1, NULL, NULL, '2023-05-13 07:08:33', '2023-05-13 07:08:33'),
(4, 1, 5, NULL, 1, NULL, NULL, '2023-05-13 07:08:33', '2023-05-13 07:08:33'),
(5, 1, 7, NULL, 1, NULL, NULL, '2023-05-13 07:08:33', '2023-05-13 07:08:33'),
(6, 1, 12, NULL, 1, NULL, NULL, '2023-05-13 07:08:33', '2023-05-13 07:08:33'),
(7, 2, 1, NULL, 1, NULL, NULL, '2023-05-13 13:37:42', '2023-05-13 13:37:42'),
(8, 2, 4, NULL, 1, NULL, NULL, '2023-05-13 13:37:42', '2023-05-13 13:37:42'),
(9, 2, 9, NULL, 1, NULL, NULL, '2023-05-13 13:37:42', '2023-05-13 13:37:42'),
(10, 2, 10, NULL, 1, NULL, NULL, '2023-05-13 13:37:42', '2023-05-13 13:37:42'),
(11, 2, 11, NULL, 1, NULL, NULL, '2023-05-13 13:37:42', '2023-05-13 13:37:42'),
(12, 2, 14, NULL, 1, NULL, NULL, '2023-05-13 13:37:42', '2023-05-13 13:37:42'),
(13, 3, 1, NULL, 1, NULL, NULL, '2023-05-13 13:40:35', '2023-05-13 13:40:35'),
(14, 3, 4, NULL, 1, NULL, NULL, '2023-05-13 13:40:35', '2023-05-13 13:40:35'),
(15, 3, 9, NULL, 1, NULL, NULL, '2023-05-13 13:40:35', '2023-05-13 13:40:35'),
(16, 3, 10, NULL, 1, NULL, NULL, '2023-05-13 13:40:35', '2023-05-13 13:40:35'),
(17, 3, 11, NULL, 1, NULL, NULL, '2023-05-13 13:40:35', '2023-05-13 13:40:35'),
(18, 3, 14, NULL, 1, NULL, NULL, '2023-05-13 13:40:35', '2023-05-13 13:40:35'),
(19, 4, 1, NULL, 1, NULL, NULL, '2023-05-13 13:42:56', '2023-05-13 13:42:56'),
(20, 4, 2, NULL, 1, NULL, NULL, '2023-05-13 13:42:56', '2023-05-13 13:42:56'),
(21, 4, 4, NULL, 1, NULL, NULL, '2023-05-13 13:42:56', '2023-05-13 13:42:56'),
(22, 4, 6, NULL, 1, NULL, NULL, '2023-05-13 13:42:56', '2023-05-13 13:42:56'),
(23, 4, 10, NULL, 1, NULL, NULL, '2023-05-13 13:42:56', '2023-05-13 13:42:56'),
(24, 6, 1, NULL, 1, NULL, NULL, '2023-05-15 12:45:23', '2023-05-15 12:45:23'),
(25, 7, 1, NULL, 1, NULL, NULL, '2023-05-15 12:46:39', '2023-05-15 12:46:39'),
(26, 8, 1, NULL, 1, NULL, NULL, '2023-05-15 12:48:18', '2023-05-15 12:48:18'),
(27, 8, 1, NULL, 1, NULL, NULL, '2023-05-15 12:48:18', '2023-05-15 12:48:18'),
(28, 8, 1, NULL, 1, NULL, NULL, '2023-05-15 12:48:18', '2023-05-15 12:48:18'),
(29, 8, 1, NULL, 1, NULL, NULL, '2023-05-15 12:48:18', '2023-05-15 12:48:18'),
(30, 9, 1, NULL, 1, NULL, NULL, '2023-05-15 12:49:13', '2023-05-15 12:49:13'),
(31, 9, 1, NULL, 1, NULL, NULL, '2023-05-15 12:49:13', '2023-05-15 12:49:13'),
(32, 2, 1, NULL, 1, NULL, NULL, '2023-05-15 12:57:17', '2023-05-15 12:57:17');

-- --------------------------------------------------------

--
-- Table structure for table `property_categories`
--

DROP TABLE IF EXISTS `property_categories`;
CREATE TABLE IF NOT EXISTS `property_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `property_type_id` int NOT NULL,
  `property_category_name` varchar(99) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` int NOT NULL DEFAULT '1' COMMENT '1=Active, 2=>Inactive',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_categories`
--

INSERT INTO `property_categories` (`id`, `property_type_id`, `property_category_name`, `flag`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'Flat/ Apartment', 1, 1, 1, '2023-05-09 04:37:39', '2023-05-09 04:37:39'),
(2, 1, 'Residential House', 1, 1, 1, '2023-05-09 04:37:56', '2023-05-09 04:37:56'),
(3, 1, 'Villa', 1, 1, 1, '2023-05-09 04:38:09', '2023-05-09 04:38:09'),
(4, 1, 'Builder Floor Apartment', 1, 1, 1, '2023-05-09 04:38:19', '2023-05-09 04:38:19'),
(5, 1, 'Residential Land/ Plot', 1, 1, 1, '2023-05-09 04:38:35', '2023-05-09 04:38:35'),
(6, 1, 'Penthouse', 1, 1, 1, '2023-05-09 04:38:46', '2023-05-09 04:38:46'),
(7, 1, 'Studio Apartment', 1, 1, 1, '2023-05-09 04:38:56', '2023-05-09 04:38:56'),
(8, 2, 'Commercial Office Space', 1, 1, 1, '2023-05-09 04:39:52', '2023-05-09 04:39:52'),
(9, 2, 'Office in IT Park/ SEZ', 1, 1, 1, '2023-05-09 04:40:03', '2023-05-09 04:40:03'),
(10, 2, 'Commercial Shop', 1, 1, 1, '2023-05-09 04:40:12', '2023-05-09 04:40:12'),
(11, 2, 'Commercial Showroom', 1, 1, 1, '2023-05-09 04:40:24', '2023-05-09 04:40:24'),
(12, 2, 'Commercial Land', 1, 1, 1, '2023-05-09 04:40:35', '2023-05-09 04:40:35'),
(13, 2, 'Warehouse/ Godown', 1, 1, 1, '2023-05-09 04:40:47', '2023-05-09 04:40:47'),
(14, 3, 'Industrial Land', 1, 1, 1, '2023-05-09 04:41:00', '2023-05-09 04:41:00'),
(15, 3, 'Industrial Building', 1, 1, 1, '2023-05-09 04:41:09', '2023-05-09 04:41:09'),
(16, 3, 'Industrial Shed', 1, 1, 1, '2023-05-09 04:41:22', '2023-05-09 04:41:22'),
(17, 4, 'Agricultural Land', 1, 1, 1, '2023-05-09 04:41:47', '2023-05-09 04:41:47'),
(18, 4, 'Farm House', 1, 1, 1, '2023-05-09 04:41:58', '2023-05-09 04:41:58');

-- --------------------------------------------------------

--
-- Table structure for table `property_masters`
--

DROP TABLE IF EXISTS `property_masters`;
CREATE TABLE IF NOT EXISTS `property_masters` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `property_status` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_type_id` int NOT NULL,
  `client_master_id` int NOT NULL,
  `property_category_id` int NOT NULL,
  `state_id` int NOT NULL,
  `city_id` int NOT NULL,
  `taluka_id` int NOT NULL,
  `name_of_project` varchar(99) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locality` varchar(99) COLLATE utf8mb4_unicode_ci NOT NULL,
  `landmark` varchar(99) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `expected_price` int NOT NULL,
  `booking_amount` int DEFAULT NULL,
  `rera_registration_number` varchar(99) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag` int NOT NULL DEFAULT '1' COMMENT '1=Active, 2=>Inactive',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_masters`
--

INSERT INTO `property_masters` (`id`, `property_status`, `property_type_id`, `client_master_id`, `property_category_id`, `state_id`, `city_id`, `taluka_id`, `name_of_project`, `locality`, `landmark`, `address`, `expected_price`, `booking_amount`, `rera_registration_number`, `cover_image`, `flag`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 'Sale', 1, 3, 1, 1, 1, 0, 'Joy', 'Ahmedabad', NULL, 'Dariyapur', 15000, 101, NULL, 'flat1.jpg', 1, NULL, NULL, '2023-05-17 10:21:18', '2023-05-17 10:21:18'),
(1, 'Rent/Lease', 1, 3, 1, 1, 1, 0, 'Ganesh', 'Ahmedabad', NULL, 'Gota Ahmedabad', 12000, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-06-05 05:25:59'),
(7, 'Sale', 2, 3, 8, 5, 141, 0, 'Shree Nivas Duplex', 'Hingla Chachar Chowk', NULL, 'Ganapati Ni Pole, Hingla Chachar, Patan', 950000, 75000, NULL, '648313a4b62f1_Subpost 4 - Swipe _point_left_type_1_2_ ⠀⠀ Evenings in Toledo _ Spain ⠀⠀ - bobbyjoshi - goodshotz ( 786 X 1080 ).jpg', 1, NULL, NULL, '2023-06-09 11:56:53', '2023-06-09 06:27:24');

-- --------------------------------------------------------

--
-- Table structure for table `property_master_plan_images`
--

DROP TABLE IF EXISTS `property_master_plan_images`;
CREATE TABLE IF NOT EXISTS `property_master_plan_images` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `property_master_id` int NOT NULL,
  `master_plan_image` varchar(99) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag` int NOT NULL DEFAULT '1' COMMENT '1=Active, 2=>Inactive',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_master_plan_images`
--

INSERT INTO `property_master_plan_images` (`id`, `property_master_id`, `master_plan_image`, `flag`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 2, '646237330a2ca_accessgroup.png', 1, NULL, NULL, '2023-05-15 08:14:19', '2023-05-15 08:14:19');

-- --------------------------------------------------------

--
-- Table structure for table `property_site_view_images`
--

DROP TABLE IF EXISTS `property_site_view_images`;
CREATE TABLE IF NOT EXISTS `property_site_view_images` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `property_master_id` int NOT NULL,
  `site_view_image` varchar(99) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag` int NOT NULL DEFAULT '1' COMMENT '1=Active, 2=>Inactive',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `property_transactions`
--

DROP TABLE IF EXISTS `property_transactions`;
CREATE TABLE IF NOT EXISTS `property_transactions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `property_transaction_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` int NOT NULL DEFAULT '1' COMMENT '1=Active, 2=>Inactive',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `property_types`
--

DROP TABLE IF EXISTS `property_types`;
CREATE TABLE IF NOT EXISTS `property_types` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `property_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` int NOT NULL DEFAULT '1' COMMENT '1=Active, 2=>Inactive',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_types`
--

INSERT INTO `property_types` (`id`, `property_type`, `flag`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Residential', 1, NULL, NULL, NULL, NULL),
(2, 'Commercial', 1, NULL, NULL, NULL, NULL),
(3, 'Industrial', 1, NULL, NULL, NULL, NULL),
(4, 'Agriculture', 1, NULL, NULL, NULL, NULL),
(5, 'PG/Hostel', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `residential_properties`
--

DROP TABLE IF EXISTS `residential_properties`;
CREATE TABLE IF NOT EXISTS `residential_properties` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `property_master_id` int NOT NULL,
  `descr` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_flats` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_bedrooms` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_balconies` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_bathrooms` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_floor` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `floor_allowed_for_construction` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_open_side` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `width_of_road_facing_plot` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `any_construction` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `boundary_wall_made` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_in_gated_colony` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `carpet_area` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `super_area` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plot_area` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plot_length` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plot_breadth` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `furnished_status` varchar(99) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `possession_status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_duration` varchar(99) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag` int NOT NULL DEFAULT '1' COMMENT '1=Active, 2=>Inactive',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `residential_properties`
--

INSERT INTO `residential_properties` (`id`, `property_master_id`, `descr`, `no_of_flats`, `total_bedrooms`, `total_balconies`, `total_bathrooms`, `total_floor`, `floor_allowed_for_construction`, `total_open_side`, `width_of_road_facing_plot`, `any_construction`, `boundary_wall_made`, `is_in_gated_colony`, `carpet_area`, `super_area`, `plot_area`, `plot_length`, `plot_breadth`, `furnished_status`, `possession_status`, `age`, `time_duration`, `cover_image`, `flag`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(4, 1, 'acscsc', NULL, NULL, '2', '2', NULL, '2', '2', '2', 'Yes', 'Yes', NULL, '250', '230', '230', '120', '110', 'Fully Furnished', 'Ready to Move', 'Less than 5 Years', NULL, NULL, 1, NULL, NULL, '2023-05-17 13:28:06', '2023-05-17 13:28:06'),
(5, 2, 'Building', NULL, '5', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '125', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
CREATE TABLE IF NOT EXISTS `states` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `state` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` int NOT NULL DEFAULT '1' COMMENT '1=Active, 2=>Inactive',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `state`, `flag`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'GUJRAT', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `talukas`
--

DROP TABLE IF EXISTS `talukas`;
CREATE TABLE IF NOT EXISTS `talukas` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `state_id` int NOT NULL,
  `city_id` int NOT NULL,
  `taluka` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` int NOT NULL DEFAULT '1' COMMENT '1=Active, 2=>Inactive',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=252 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `talukas`
--

INSERT INTO `talukas` (`id`, `state_id`, `city_id`, `taluka`, `flag`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Ahmadabad', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(2, 1, 1, 'Bavla', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(3, 1, 1, 'Daskroi', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(4, 1, 1, 'Detroj-Rampura', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(5, 1, 1, 'Dhandhuka', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(6, 1, 1, 'Dholera', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(7, 1, 1, 'Dholka', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(8, 1, 1, 'Mandal', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(9, 1, 1, 'Sanand', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(10, 1, 1, 'Viramgam', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(11, 1, 2, 'Amreli', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(12, 1, 2, 'Babra', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(13, 1, 2, 'Bagasara', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(14, 1, 2, 'Dhari', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(15, 1, 2, 'Jafrabad', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(16, 1, 2, 'Khambha', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(17, 1, 2, 'Kunkavav vadia', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(18, 1, 2, 'Lathi', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(19, 1, 2, 'Lilia', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(20, 1, 2, 'Rajula', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(21, 1, 2, 'Savarkundla', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(22, 1, 3, 'Anand', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(23, 1, 3, 'Anklav', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(24, 1, 3, 'Borsad', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(25, 1, 3, 'Khambhat', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(26, 1, 3, 'Petlad', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(27, 1, 3, 'Sojitra', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(28, 1, 3, 'Tarapur', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(29, 1, 3, 'Umreth', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(30, 1, 4, 'Bayad', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(31, 1, 4, 'Bhiloda', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(32, 1, 4, 'Dhansura', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(33, 1, 4, 'Malpur', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(34, 1, 4, 'Meghraj', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(35, 1, 4, 'Modasa', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(36, 1, 5, 'Amirgadh', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(37, 1, 5, 'Bhabhar', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(38, 1, 5, 'Danta', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(39, 1, 5, 'Dantiwada', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(40, 1, 5, 'Deesa', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(41, 1, 5, 'Deodar', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(42, 1, 5, 'Dhanera', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(43, 1, 5, 'Kankrej', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(44, 1, 5, 'Lakhani', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(45, 1, 5, 'Palanpur', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(46, 1, 5, 'Suigam', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(47, 1, 5, 'Tharad', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(48, 1, 5, 'Vadgam', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(49, 1, 5, 'Vav', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(50, 1, 6, 'Bharuch', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(51, 1, 6, 'Amod', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(52, 1, 6, 'Ankleshwar', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(53, 1, 6, 'Hansot', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(54, 1, 6, 'Jambusar', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(55, 1, 6, 'Jhagadia', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(56, 1, 6, 'Netrang', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(57, 1, 6, 'Vagra', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(58, 1, 6, 'Valia', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(59, 1, 7, 'Bhavnagar', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(60, 1, 7, 'Gariadhar', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(61, 1, 7, 'Ghogha', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(62, 1, 7, 'Jesar', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(63, 1, 7, 'Mahuva', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(64, 1, 7, 'Palitana', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(65, 1, 7, 'Sihor', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(66, 1, 7, 'Talaja', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(67, 1, 7, 'Umrala', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(68, 1, 7, 'Vallabhipur', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(69, 1, 8, 'Botad', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(70, 1, 8, 'Barwala', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(71, 1, 8, 'Gadhada', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(72, 1, 8, 'Ranpur', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(73, 1, 9, 'Chhota Udaipur', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(74, 1, 9, 'Bodeli', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(75, 1, 9, 'Jetpur pavi', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(76, 1, 9, 'Kavant', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(77, 1, 9, 'Nasvadi', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(78, 1, 9, 'Sankheda', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(79, 1, 10, 'Dahod', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(80, 1, 10, 'Devgadh baria', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(81, 1, 10, 'Dhanpur', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(82, 1, 10, 'Fatepura', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(83, 1, 10, 'Garbada', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(84, 1, 10, 'Limkheda', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(85, 1, 10, 'Sanjeli', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(86, 1, 10, 'Jhalod', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(87, 1, 10, 'Singvad', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(88, 1, 11, 'Ahwa', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(89, 1, 11, 'Subir', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(90, 1, 11, 'Waghai', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(91, 1, 12, 'Bhanvad', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(92, 1, 12, 'Kalyanpur', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(93, 1, 12, 'Khambhalia', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(94, 1, 12, 'Okhamandal', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(95, 1, 13, 'Gandhinagar', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(96, 1, 13, 'Dehgam', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(97, 1, 13, 'Kalol', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(98, 1, 13, 'Mansa', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(99, 1, 14, 'Gir-Gadhada', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(100, 1, 14, 'Kodinar', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(101, 1, 14, 'Sutrapada', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(102, 1, 14, 'Talala', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(103, 1, 14, 'Una', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(104, 1, 14, 'Veraval-Patan', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(105, 1, 15, 'Jamnagar', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(106, 1, 15, 'Dhrol', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(107, 1, 15, 'Jamjodhpur', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(108, 1, 15, 'Jodiya', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(109, 1, 15, 'Kalavad', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(110, 1, 15, 'Lalpur', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(111, 1, 16, 'Junagadh City', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(112, 1, 16, 'Junagadh Rural', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(113, 1, 16, 'Bhesana', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(114, 1, 16, 'Keshod', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(115, 1, 16, 'Malia', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(116, 1, 16, 'Manavadar', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(117, 1, 16, 'Mangrol', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(118, 1, 16, 'Mendarda', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(119, 1, 16, 'Vanthali', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(120, 1, 16, 'Visavadar', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(121, 1, 17, 'Kheda', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(122, 1, 17, 'Galteshwar', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(123, 1, 17, 'Kapadvanj', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(124, 1, 17, 'Kathlal', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(125, 1, 17, 'Mahudha', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(126, 1, 17, 'Matar', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(127, 1, 17, 'Mehmedabad', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(128, 1, 17, 'Nadiad', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(129, 1, 17, 'Thasra', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(130, 1, 17, 'Vaso', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(131, 1, 18, 'Abdasa', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(132, 1, 18, 'Anjar', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(133, 1, 18, 'Bhachau', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(134, 1, 18, 'Bhuj', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(135, 1, 18, 'Gandhidham', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(136, 1, 18, 'Lakhpat', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(137, 1, 18, 'Mandvi', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(138, 1, 18, 'Mundra', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(139, 1, 18, 'Nakhatrana', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(140, 1, 18, 'Rapar', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(141, 1, 19, 'Balasinor', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(142, 1, 19, 'Kadana', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(143, 1, 19, 'Khanpur', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(144, 1, 19, 'Lunawada', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(145, 1, 19, 'Santrampur', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(146, 1, 19, 'Virpur', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(147, 1, 20, 'Mehsana', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(148, 1, 20, 'Becharaji', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(149, 1, 20, 'Jotana', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(150, 1, 20, 'Kadi', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(151, 1, 20, 'Kheralu', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(152, 1, 20, 'Satlasana', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(153, 1, 20, 'Unjha', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(154, 1, 20, 'Vadnagar', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(155, 1, 20, 'Vijapur', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(156, 1, 20, 'Visnagar', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(157, 1, 21, 'Halvad', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(158, 1, 21, 'Maliya', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(159, 1, 21, 'Morbi', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(160, 1, 21, 'Tankara', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(161, 1, 21, 'Wankaner', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(162, 1, 22, 'Dediapada', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(163, 1, 22, 'Garudeshwar', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(164, 1, 22, 'Nandod', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(165, 1, 22, 'Sagbara', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(166, 1, 22, 'Tilakwada', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(167, 1, 23, 'Navsari', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(168, 1, 23, 'Vansda', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(169, 1, 23, 'Chikhli', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(170, 1, 23, 'Gandevi', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(171, 1, 23, 'Jalalpore', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(172, 1, 23, 'Khergam', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(173, 1, 24, 'Ghoghamba', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(174, 1, 24, 'Godhra', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(175, 1, 24, 'Halol', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(176, 1, 24, 'Jambughoda', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(177, 1, 24, 'Kalol', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(178, 1, 24, 'Morwa Hadaf', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(179, 1, 24, 'Shehera', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(180, 1, 25, 'Patan', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(181, 1, 25, 'Chanasma', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(182, 1, 25, 'Harij', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(183, 1, 25, 'Radhanpur', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(184, 1, 25, 'Sami', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(185, 1, 25, 'Sankheswar', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(186, 1, 25, 'Santalpur', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(187, 1, 25, 'Sarasvati', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(188, 1, 25, 'Sidhpur', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(189, 1, 26, 'Porbandar', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(190, 1, 26, 'Kutiyana', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(191, 1, 26, 'Ranavav', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(192, 1, 27, 'Rajkot', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(193, 1, 27, 'Dhoraji', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(194, 1, 27, 'Gondal', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(195, 1, 27, 'Jamkandorna', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(196, 1, 27, 'Jasdan', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(197, 1, 27, 'Jetpur', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(198, 1, 27, 'Kotada Sangani', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(199, 1, 27, 'Lodhika', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(200, 1, 27, 'Paddhari', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(201, 1, 27, 'Upleta', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(202, 1, 27, 'Vinchchiya', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(203, 1, 28, 'Himatnagar', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(204, 1, 28, 'Idar', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(205, 1, 28, 'Khedbrahma', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(206, 1, 28, 'Poshina', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(207, 1, 28, 'Prantij', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(208, 1, 28, 'Talod', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(209, 1, 28, 'Vadali', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(210, 1, 28, 'Vijaynagar', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(211, 1, 29, 'Surat', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(212, 1, 29, 'Bardoli', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(213, 1, 29, 'Choryasi', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(214, 1, 29, 'Kamrej', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(215, 1, 29, 'Mahuva', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(216, 1, 29, 'Mandvi', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(217, 1, 29, 'Mangrol', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(218, 1, 29, 'Olpad', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(219, 1, 29, 'Palsana', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(220, 1, 29, 'Umarpada', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(221, 1, 30, 'Chotila', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(222, 1, 30, 'Chuda', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(223, 1, 30, 'Dasada', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(224, 1, 30, 'Dhrangadhra', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(225, 1, 30, 'Lakhtar', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(226, 1, 30, 'Limbdi', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(227, 1, 30, 'Muli', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(228, 1, 30, 'Sayla', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(229, 1, 30, 'Thangadh', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(230, 1, 30, 'Wadhwan', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(231, 1, 31, 'Nizar', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(232, 1, 31, 'Songadh', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(233, 1, 31, 'Uchhal', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(234, 1, 31, 'Valod', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(235, 1, 31, 'Vyara', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(236, 1, 31, 'Kukarmunda', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(237, 1, 31, 'Dolvan', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(238, 1, 32, 'Vadodara', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(239, 1, 32, 'Dabhoi', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(240, 1, 32, 'Desar', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(241, 1, 32, 'Karjan', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(242, 1, 32, 'Padra', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(243, 1, 32, 'Savli', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(244, 1, 32, 'Sinor', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(245, 1, 32, 'Waghodia', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(246, 1, 33, 'Valsad', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(247, 1, 33, 'Dharampur', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(248, 1, 33, 'Kaprada', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(249, 1, 33, 'Pardi', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(250, 1, 33, 'Umbergaon', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49'),
(251, 1, 33, 'Vapi', 1, NULL, NULL, '2023-06-15 01:05:49', '2023-06-15 01:05:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_type_id` int NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` int NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `user_password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` int NOT NULL DEFAULT '1' COMMENT '1=Active, 2=>Inactive',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
