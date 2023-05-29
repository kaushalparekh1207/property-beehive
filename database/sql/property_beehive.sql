-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 29, 2023 at 06:06 AM
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
  `role_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `admin_password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `descr` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_floor` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_bedrooms` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_bathrooms` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_open_side` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `width_of_road_facing_plot` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `boundary_wall_made` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `carpet_area` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `super_area` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `width_of_entrance` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plot_area` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plot_length` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plot_breadth` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `furnished_status` varchar(99) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `possession_status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_duration` varchar(99) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currently_leased_out` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `leased_to` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monthly_rent` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `amenities` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_id` int NOT NULL,
  `flag` int NOT NULL DEFAULT '1' COMMENT '1=Active, 2=>Inactive',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=604 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city`, `state_id`, `flag`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'North and Middle Andaman', 32, 1, NULL, NULL, NULL, NULL),
(2, 'South Andaman', 32, 1, NULL, NULL, NULL, NULL),
(3, 'Nicobar', 32, 1, NULL, NULL, NULL, NULL),
(4, 'Adilabad', 1, 1, NULL, NULL, NULL, NULL),
(5, 'Anantapur', 1, 1, NULL, NULL, NULL, NULL),
(6, 'Chittoor', 1, 1, NULL, NULL, NULL, NULL),
(7, 'East Godavari', 1, 1, NULL, NULL, NULL, NULL),
(8, 'Guntur', 1, 1, NULL, NULL, NULL, NULL),
(9, 'Hyderabad', 1, 1, NULL, NULL, NULL, NULL),
(10, 'Kadapa', 1, 1, NULL, NULL, NULL, NULL),
(11, 'Karimnagar', 1, 1, NULL, NULL, NULL, NULL),
(12, 'Khammam', 1, 1, NULL, NULL, NULL, NULL),
(13, 'Krishna', 1, 1, NULL, NULL, NULL, NULL),
(14, 'Kurnool', 1, 1, NULL, NULL, NULL, NULL),
(15, 'Mahbubnagar', 1, 1, NULL, NULL, NULL, NULL),
(16, 'Medak', 1, 1, NULL, NULL, NULL, NULL),
(17, 'Nalgonda', 1, 1, NULL, NULL, NULL, NULL),
(18, 'Nellore', 1, 1, NULL, NULL, NULL, NULL),
(19, 'Nizamabad', 1, 1, NULL, NULL, NULL, NULL),
(20, 'Prakasam', 1, 1, NULL, NULL, NULL, NULL),
(21, 'Rangareddi', 1, 1, NULL, NULL, NULL, NULL),
(22, 'Srikakulam', 1, 1, NULL, NULL, NULL, NULL),
(23, 'Vishakhapatnam', 1, 1, NULL, NULL, NULL, NULL),
(24, 'Vizianagaram', 1, 1, NULL, NULL, NULL, NULL),
(25, 'Warangal', 1, 1, NULL, NULL, NULL, NULL),
(26, 'West Godavari', 1, 1, NULL, NULL, NULL, NULL),
(27, 'Anjaw', 3, 1, NULL, NULL, NULL, NULL),
(28, 'Changlang', 3, 1, NULL, NULL, NULL, NULL),
(29, 'East Kameng', 3, 1, NULL, NULL, NULL, NULL),
(30, 'Lohit', 3, 1, NULL, NULL, NULL, NULL),
(31, 'Lower Subansiri', 3, 1, NULL, NULL, NULL, NULL),
(32, 'Papum Pare', 3, 1, NULL, NULL, NULL, NULL),
(33, 'Tirap', 3, 1, NULL, NULL, NULL, NULL),
(34, 'Dibang Valley', 3, 1, NULL, NULL, NULL, NULL),
(35, 'Upper Subansiri', 3, 1, NULL, NULL, NULL, NULL),
(36, 'West Kameng', 3, 1, NULL, NULL, NULL, NULL),
(37, 'Barpeta', 2, 1, NULL, NULL, NULL, NULL),
(38, 'Bongaigaon', 2, 1, NULL, NULL, NULL, NULL),
(39, 'Cachar', 2, 1, NULL, NULL, NULL, NULL),
(40, 'Darrang', 2, 1, NULL, NULL, NULL, NULL),
(41, 'Dhemaji', 2, 1, NULL, NULL, NULL, NULL),
(42, 'Dhubri', 2, 1, NULL, NULL, NULL, NULL),
(43, 'Dibrugarh', 2, 1, NULL, NULL, NULL, NULL),
(44, 'Goalpara', 2, 1, NULL, NULL, NULL, NULL),
(45, 'Golaghat', 2, 1, NULL, NULL, NULL, NULL),
(46, 'Hailakandi', 2, 1, NULL, NULL, NULL, NULL),
(47, 'Jorhat', 2, 1, NULL, NULL, NULL, NULL),
(48, 'Karbi Anglong', 2, 1, NULL, NULL, NULL, NULL),
(49, 'Karimganj', 2, 1, NULL, NULL, NULL, NULL),
(50, 'Kokrajhar', 2, 1, NULL, NULL, NULL, NULL),
(51, 'Lakhimpur', 2, 1, NULL, NULL, NULL, NULL),
(52, 'Marigaon', 2, 1, NULL, NULL, NULL, NULL),
(53, 'Nagaon', 2, 1, NULL, NULL, NULL, NULL),
(54, 'Nalbari', 2, 1, NULL, NULL, NULL, NULL),
(55, 'North Cachar Hills', 2, 1, NULL, NULL, NULL, NULL),
(56, 'Sibsagar', 2, 1, NULL, NULL, NULL, NULL),
(57, 'Sonitpur', 2, 1, NULL, NULL, NULL, NULL),
(58, 'Tinsukia', 2, 1, NULL, NULL, NULL, NULL),
(59, 'Araria', 4, 1, NULL, NULL, NULL, NULL),
(60, 'Aurangabad', 4, 1, NULL, NULL, NULL, NULL),
(61, 'Banka', 4, 1, NULL, NULL, NULL, NULL),
(62, 'Begusarai', 4, 1, NULL, NULL, NULL, NULL),
(63, 'Bhagalpur', 4, 1, NULL, NULL, NULL, NULL),
(64, 'Bhojpur', 4, 1, NULL, NULL, NULL, NULL),
(65, 'Buxar', 4, 1, NULL, NULL, NULL, NULL),
(66, 'Darbhanga', 4, 1, NULL, NULL, NULL, NULL),
(67, 'Purba Champaran', 4, 1, NULL, NULL, NULL, NULL),
(68, 'Gaya', 4, 1, NULL, NULL, NULL, NULL),
(69, 'Gopalganj', 4, 1, NULL, NULL, NULL, NULL),
(70, 'Jamui', 4, 1, NULL, NULL, NULL, NULL),
(71, 'Jehanabad', 4, 1, NULL, NULL, NULL, NULL),
(72, 'Khagaria', 4, 1, NULL, NULL, NULL, NULL),
(73, 'Kishanganj', 4, 1, NULL, NULL, NULL, NULL),
(74, 'Kaimur', 4, 1, NULL, NULL, NULL, NULL),
(75, 'Katihar', 4, 1, NULL, NULL, NULL, NULL),
(76, 'Lakhisarai', 4, 1, NULL, NULL, NULL, NULL),
(77, 'Madhubani', 4, 1, NULL, NULL, NULL, NULL),
(78, 'Munger', 4, 1, NULL, NULL, NULL, NULL),
(79, 'Madhepura', 4, 1, NULL, NULL, NULL, NULL),
(80, 'Muzaffarpur', 4, 1, NULL, NULL, NULL, NULL),
(81, 'Nalanda', 4, 1, NULL, NULL, NULL, NULL),
(82, 'Nawada', 4, 1, NULL, NULL, NULL, NULL),
(83, 'Patna', 4, 1, NULL, NULL, NULL, NULL),
(84, 'Purnia', 4, 1, NULL, NULL, NULL, NULL),
(85, 'Rohtas', 4, 1, NULL, NULL, NULL, NULL),
(86, 'Saharsa', 4, 1, NULL, NULL, NULL, NULL),
(87, 'Samastipur', 4, 1, NULL, NULL, NULL, NULL),
(88, 'Sheohar', 4, 1, NULL, NULL, NULL, NULL),
(89, 'Sheikhpura', 4, 1, NULL, NULL, NULL, NULL),
(90, 'Saran', 4, 1, NULL, NULL, NULL, NULL),
(91, 'Sitamarhi', 4, 1, NULL, NULL, NULL, NULL),
(92, 'Supaul', 4, 1, NULL, NULL, NULL, NULL),
(93, 'Siwan', 4, 1, NULL, NULL, NULL, NULL),
(94, 'Vaishali', 4, 1, NULL, NULL, NULL, NULL),
(95, 'Pashchim Champaran', 4, 1, NULL, NULL, NULL, NULL),
(96, 'Bastar', 36, 1, NULL, NULL, NULL, NULL),
(97, 'Bilaspur', 36, 1, NULL, NULL, NULL, NULL),
(98, 'Dantewada', 36, 1, NULL, NULL, NULL, NULL),
(99, 'Dhamtari', 36, 1, NULL, NULL, NULL, NULL),
(100, 'Durg', 36, 1, NULL, NULL, NULL, NULL),
(101, 'Jashpur', 36, 1, NULL, NULL, NULL, NULL),
(102, 'Janjgir-Champa', 36, 1, NULL, NULL, NULL, NULL),
(103, 'Korba', 36, 1, NULL, NULL, NULL, NULL),
(104, 'Koriya', 36, 1, NULL, NULL, NULL, NULL),
(105, 'Kanker', 36, 1, NULL, NULL, NULL, NULL),
(106, 'Kawardha', 36, 1, NULL, NULL, NULL, NULL),
(107, 'Mahasamund', 36, 1, NULL, NULL, NULL, NULL),
(108, 'Raigarh', 36, 1, NULL, NULL, NULL, NULL),
(109, 'Rajnandgaon', 36, 1, NULL, NULL, NULL, NULL),
(110, 'Raipur', 36, 1, NULL, NULL, NULL, NULL),
(111, 'Surguja', 36, 1, NULL, NULL, NULL, NULL),
(112, 'Diu', 29, 1, NULL, NULL, NULL, NULL),
(113, 'Daman', 29, 1, NULL, NULL, NULL, NULL),
(114, 'Central Delhi', 25, 1, NULL, NULL, NULL, NULL),
(115, 'East Delhi', 25, 1, NULL, NULL, NULL, NULL),
(116, 'New Delhi', 25, 1, NULL, NULL, NULL, NULL),
(117, 'North Delhi', 25, 1, NULL, NULL, NULL, NULL),
(118, 'North East Delhi', 25, 1, NULL, NULL, NULL, NULL),
(119, 'North West Delhi', 25, 1, NULL, NULL, NULL, NULL),
(120, 'South Delhi', 25, 1, NULL, NULL, NULL, NULL),
(121, 'South West Delhi', 25, 1, NULL, NULL, NULL, NULL),
(122, 'West Delhi', 25, 1, NULL, NULL, NULL, NULL),
(123, 'North Goa', 26, 1, NULL, NULL, NULL, NULL),
(124, 'South Goa', 26, 1, NULL, NULL, NULL, NULL),
(125, 'Ahmedabad', 5, 1, NULL, NULL, NULL, NULL),
(126, 'Amreli District', 5, 1, NULL, NULL, NULL, NULL),
(127, 'Anand', 5, 1, NULL, NULL, NULL, NULL),
(128, 'Banaskantha', 5, 1, NULL, NULL, NULL, NULL),
(129, 'Bharuch', 5, 1, NULL, NULL, NULL, NULL),
(130, 'Bhavnagar', 5, 1, NULL, NULL, NULL, NULL),
(131, 'Dahod', 5, 1, NULL, NULL, NULL, NULL),
(132, 'The Dangs', 5, 1, NULL, NULL, NULL, NULL),
(133, 'Gandhinagar', 5, 1, NULL, NULL, NULL, NULL),
(134, 'Jamnagar', 5, 1, NULL, NULL, NULL, NULL),
(135, 'Junagadh', 5, 1, NULL, NULL, NULL, NULL),
(136, 'Kutch', 5, 1, NULL, NULL, NULL, NULL),
(137, 'Kheda', 5, 1, NULL, NULL, NULL, NULL),
(138, 'Mehsana', 5, 1, NULL, NULL, NULL, NULL),
(139, 'Narmada', 5, 1, NULL, NULL, NULL, NULL),
(140, 'Navsari', 5, 1, NULL, NULL, NULL, NULL),
(141, 'Patan', 5, 1, NULL, NULL, NULL, NULL),
(142, 'Panchmahal', 5, 1, NULL, NULL, NULL, NULL),
(143, 'Porbandar', 5, 1, NULL, NULL, NULL, NULL),
(144, 'Rajkot', 5, 1, NULL, NULL, NULL, NULL),
(145, 'Sabarkantha', 5, 1, NULL, NULL, NULL, NULL),
(146, 'Surendranagar', 5, 1, NULL, NULL, NULL, NULL),
(147, 'Surat', 5, 1, NULL, NULL, NULL, NULL),
(148, 'Vadodara', 5, 1, NULL, NULL, NULL, NULL),
(149, 'Valsad', 5, 1, NULL, NULL, NULL, NULL),
(150, 'Ambala', 6, 1, NULL, NULL, NULL, NULL),
(151, 'Bhiwani', 6, 1, NULL, NULL, NULL, NULL),
(152, 'Faridabad', 6, 1, NULL, NULL, NULL, NULL),
(153, 'Fatehabad', 6, 1, NULL, NULL, NULL, NULL),
(154, 'Gurgaon', 6, 1, NULL, NULL, NULL, NULL),
(155, 'Hissar', 6, 1, NULL, NULL, NULL, NULL),
(156, 'Jhajjar', 6, 1, NULL, NULL, NULL, NULL),
(157, 'Jind', 6, 1, NULL, NULL, NULL, NULL),
(158, 'Karnal', 6, 1, NULL, NULL, NULL, NULL),
(159, 'Kaithal', 6, 1, NULL, NULL, NULL, NULL),
(160, 'Kurukshetra', 6, 1, NULL, NULL, NULL, NULL),
(161, 'Mahendragarh', 6, 1, NULL, NULL, NULL, NULL),
(162, 'Mewat', 6, 1, NULL, NULL, NULL, NULL),
(163, 'Panchkula', 6, 1, NULL, NULL, NULL, NULL),
(164, 'Panipat', 6, 1, NULL, NULL, NULL, NULL),
(165, 'Rewari', 6, 1, NULL, NULL, NULL, NULL),
(166, 'Rohtak', 6, 1, NULL, NULL, NULL, NULL),
(167, 'Sirsa', 6, 1, NULL, NULL, NULL, NULL),
(168, 'Sonepat', 6, 1, NULL, NULL, NULL, NULL),
(169, 'Yamuna Nagar', 6, 1, NULL, NULL, NULL, NULL),
(170, 'Palwal', 6, 1, NULL, NULL, NULL, NULL),
(171, 'Bilaspur', 7, 1, NULL, NULL, NULL, NULL),
(172, 'Chamba', 7, 1, NULL, NULL, NULL, NULL),
(173, 'Hamirpur', 7, 1, NULL, NULL, NULL, NULL),
(174, 'Kangra', 7, 1, NULL, NULL, NULL, NULL),
(175, 'Kinnaur', 7, 1, NULL, NULL, NULL, NULL),
(176, 'Kulu', 7, 1, NULL, NULL, NULL, NULL),
(177, 'Lahaul and Spiti', 7, 1, NULL, NULL, NULL, NULL),
(178, 'Mandi', 7, 1, NULL, NULL, NULL, NULL),
(179, 'Shimla', 7, 1, NULL, NULL, NULL, NULL),
(180, 'Sirmaur', 7, 1, NULL, NULL, NULL, NULL),
(181, 'Solan', 7, 1, NULL, NULL, NULL, NULL),
(182, 'Una', 7, 1, NULL, NULL, NULL, NULL),
(183, 'Anantnag', 8, 1, NULL, NULL, NULL, NULL),
(184, 'Badgam', 8, 1, NULL, NULL, NULL, NULL),
(185, 'Bandipore', 8, 1, NULL, NULL, NULL, NULL),
(186, 'Baramula', 8, 1, NULL, NULL, NULL, NULL),
(187, 'Doda', 8, 1, NULL, NULL, NULL, NULL),
(188, 'Jammu', 8, 1, NULL, NULL, NULL, NULL),
(189, 'Kargil', 8, 1, NULL, NULL, NULL, NULL),
(190, 'Kathua', 8, 1, NULL, NULL, NULL, NULL),
(191, 'Kupwara', 8, 1, NULL, NULL, NULL, NULL),
(192, 'Leh', 8, 1, NULL, NULL, NULL, NULL),
(193, 'Poonch', 8, 1, NULL, NULL, NULL, NULL),
(194, 'Pulwama', 8, 1, NULL, NULL, NULL, NULL),
(195, 'Rajauri', 8, 1, NULL, NULL, NULL, NULL),
(196, 'Srinagar', 8, 1, NULL, NULL, NULL, NULL),
(197, 'Samba', 8, 1, NULL, NULL, NULL, NULL),
(198, 'Udhampur', 8, 1, NULL, NULL, NULL, NULL),
(199, 'Bokaro', 34, 1, NULL, NULL, NULL, NULL),
(200, 'Chatra', 34, 1, NULL, NULL, NULL, NULL),
(201, 'Deoghar', 34, 1, NULL, NULL, NULL, NULL),
(202, 'Dhanbad', 34, 1, NULL, NULL, NULL, NULL),
(203, 'Dumka', 34, 1, NULL, NULL, NULL, NULL),
(204, 'Purba Singhbhum', 34, 1, NULL, NULL, NULL, NULL),
(205, 'Garhwa', 34, 1, NULL, NULL, NULL, NULL),
(206, 'Giridih', 34, 1, NULL, NULL, NULL, NULL),
(207, 'Godda', 34, 1, NULL, NULL, NULL, NULL),
(208, 'Gumla', 34, 1, NULL, NULL, NULL, NULL),
(209, 'Hazaribagh', 34, 1, NULL, NULL, NULL, NULL),
(210, 'Koderma', 34, 1, NULL, NULL, NULL, NULL),
(211, 'Lohardaga', 34, 1, NULL, NULL, NULL, NULL),
(212, 'Pakur', 34, 1, NULL, NULL, NULL, NULL),
(213, 'Palamu', 34, 1, NULL, NULL, NULL, NULL),
(214, 'Ranchi', 34, 1, NULL, NULL, NULL, NULL),
(215, 'Sahibganj', 34, 1, NULL, NULL, NULL, NULL),
(216, 'Seraikela and Kharsawan', 34, 1, NULL, NULL, NULL, NULL),
(217, 'Pashchim Singhbhum', 34, 1, NULL, NULL, NULL, NULL),
(218, 'Ramgarh', 34, 1, NULL, NULL, NULL, NULL),
(219, 'Bidar', 9, 1, NULL, NULL, NULL, NULL),
(220, 'Belgaum', 9, 1, NULL, NULL, NULL, NULL),
(221, 'Bijapur', 9, 1, NULL, NULL, NULL, NULL),
(222, 'Bagalkot', 9, 1, NULL, NULL, NULL, NULL),
(223, 'Bellary', 9, 1, NULL, NULL, NULL, NULL),
(224, 'Bangalore Rural District', 9, 1, NULL, NULL, NULL, NULL),
(225, 'Bangalore Urban District', 9, 1, NULL, NULL, NULL, NULL),
(226, 'Chamarajnagar', 9, 1, NULL, NULL, NULL, NULL),
(227, 'Chikmagalur', 9, 1, NULL, NULL, NULL, NULL),
(228, 'Chitradurga', 9, 1, NULL, NULL, NULL, NULL),
(229, 'Davanagere', 9, 1, NULL, NULL, NULL, NULL),
(230, 'Dharwad', 9, 1, NULL, NULL, NULL, NULL),
(231, 'Dakshina Kannada', 9, 1, NULL, NULL, NULL, NULL),
(232, 'Gadag', 9, 1, NULL, NULL, NULL, NULL),
(233, 'Gulbarga', 9, 1, NULL, NULL, NULL, NULL),
(234, 'Hassan', 9, 1, NULL, NULL, NULL, NULL),
(235, 'Haveri District', 9, 1, NULL, NULL, NULL, NULL),
(236, 'Kodagu', 9, 1, NULL, NULL, NULL, NULL),
(237, 'Kolar', 9, 1, NULL, NULL, NULL, NULL),
(238, 'Koppal', 9, 1, NULL, NULL, NULL, NULL),
(239, 'Mandya', 9, 1, NULL, NULL, NULL, NULL),
(240, 'Mysore', 9, 1, NULL, NULL, NULL, NULL),
(241, 'Raichur', 9, 1, NULL, NULL, NULL, NULL),
(242, 'Shimoga', 9, 1, NULL, NULL, NULL, NULL),
(243, 'Tumkur', 9, 1, NULL, NULL, NULL, NULL),
(244, 'Udupi', 9, 1, NULL, NULL, NULL, NULL),
(245, 'Uttara Kannada', 9, 1, NULL, NULL, NULL, NULL),
(246, 'Ramanagara', 9, 1, NULL, NULL, NULL, NULL),
(247, 'Chikballapur', 9, 1, NULL, NULL, NULL, NULL),
(248, 'Yadagiri', 9, 1, NULL, NULL, NULL, NULL),
(249, 'Alappuzha', 10, 1, NULL, NULL, NULL, NULL),
(250, 'Ernakulam', 10, 1, NULL, NULL, NULL, NULL),
(251, 'Idukki', 10, 1, NULL, NULL, NULL, NULL),
(252, 'Kollam', 10, 1, NULL, NULL, NULL, NULL),
(253, 'Kannur', 10, 1, NULL, NULL, NULL, NULL),
(254, 'Kasaragod', 10, 1, NULL, NULL, NULL, NULL),
(255, 'Kottayam', 10, 1, NULL, NULL, NULL, NULL),
(256, 'Kozhikode', 10, 1, NULL, NULL, NULL, NULL),
(257, 'Malappuram', 10, 1, NULL, NULL, NULL, NULL),
(258, 'Palakkad', 10, 1, NULL, NULL, NULL, NULL),
(259, 'Pathanamthitta', 10, 1, NULL, NULL, NULL, NULL),
(260, 'Thrissur', 10, 1, NULL, NULL, NULL, NULL),
(261, 'Thiruvananthapuram', 10, 1, NULL, NULL, NULL, NULL),
(262, 'Wayanad', 10, 1, NULL, NULL, NULL, NULL),
(263, 'Alirajpur', 11, 1, NULL, NULL, NULL, NULL),
(264, 'Anuppur', 11, 1, NULL, NULL, NULL, NULL),
(265, 'Ashok Nagar', 11, 1, NULL, NULL, NULL, NULL),
(266, 'Balaghat', 11, 1, NULL, NULL, NULL, NULL),
(267, 'Barwani', 11, 1, NULL, NULL, NULL, NULL),
(268, 'Betul', 11, 1, NULL, NULL, NULL, NULL),
(269, 'Bhind', 11, 1, NULL, NULL, NULL, NULL),
(270, 'Bhopal', 11, 1, NULL, NULL, NULL, NULL),
(271, 'Burhanpur', 11, 1, NULL, NULL, NULL, NULL),
(272, 'Chhatarpur', 11, 1, NULL, NULL, NULL, NULL),
(273, 'Chhindwara', 11, 1, NULL, NULL, NULL, NULL),
(274, 'Damoh', 11, 1, NULL, NULL, NULL, NULL),
(275, 'Datia', 11, 1, NULL, NULL, NULL, NULL),
(276, 'Dewas', 11, 1, NULL, NULL, NULL, NULL),
(277, 'Dhar', 11, 1, NULL, NULL, NULL, NULL),
(278, 'Dindori', 11, 1, NULL, NULL, NULL, NULL),
(279, 'Guna', 11, 1, NULL, NULL, NULL, NULL),
(280, 'Gwalior', 11, 1, NULL, NULL, NULL, NULL),
(281, 'Harda', 11, 1, NULL, NULL, NULL, NULL),
(282, 'Hoshangabad', 11, 1, NULL, NULL, NULL, NULL),
(283, 'Indore', 11, 1, NULL, NULL, NULL, NULL),
(284, 'Jabalpur', 11, 1, NULL, NULL, NULL, NULL),
(285, 'Jhabua', 11, 1, NULL, NULL, NULL, NULL),
(286, 'Katni', 11, 1, NULL, NULL, NULL, NULL),
(287, 'Khandwa', 11, 1, NULL, NULL, NULL, NULL),
(288, 'Khargone', 11, 1, NULL, NULL, NULL, NULL),
(289, 'Mandla', 11, 1, NULL, NULL, NULL, NULL),
(290, 'Mandsaur', 11, 1, NULL, NULL, NULL, NULL),
(291, 'Morena', 11, 1, NULL, NULL, NULL, NULL),
(292, 'Narsinghpur', 11, 1, NULL, NULL, NULL, NULL),
(293, 'Neemuch', 11, 1, NULL, NULL, NULL, NULL),
(294, 'Panna', 11, 1, NULL, NULL, NULL, NULL),
(295, 'Rewa', 11, 1, NULL, NULL, NULL, NULL),
(296, 'Rajgarh', 11, 1, NULL, NULL, NULL, NULL),
(297, 'Ratlam', 11, 1, NULL, NULL, NULL, NULL),
(298, 'Raisen', 11, 1, NULL, NULL, NULL, NULL),
(299, 'Sagar', 11, 1, NULL, NULL, NULL, NULL),
(300, 'Satna', 11, 1, NULL, NULL, NULL, NULL),
(301, 'Sehore', 11, 1, NULL, NULL, NULL, NULL),
(302, 'Seoni', 11, 1, NULL, NULL, NULL, NULL),
(303, 'Shahdol', 11, 1, NULL, NULL, NULL, NULL),
(304, 'Shajapur', 11, 1, NULL, NULL, NULL, NULL),
(305, 'Sheopur', 11, 1, NULL, NULL, NULL, NULL),
(306, 'Shivpuri', 11, 1, NULL, NULL, NULL, NULL),
(307, 'Sidhi', 11, 1, NULL, NULL, NULL, NULL),
(308, 'Singrauli', 11, 1, NULL, NULL, NULL, NULL),
(309, 'Tikamgarh', 11, 1, NULL, NULL, NULL, NULL),
(310, 'Ujjain', 11, 1, NULL, NULL, NULL, NULL),
(311, 'Umaria', 11, 1, NULL, NULL, NULL, NULL),
(312, 'Vidisha', 11, 1, NULL, NULL, NULL, NULL),
(313, 'Ahmednagar', 12, 1, NULL, NULL, NULL, NULL),
(314, 'Akola', 12, 1, NULL, NULL, NULL, NULL),
(315, 'Amrawati', 12, 1, NULL, NULL, NULL, NULL),
(316, 'Aurangabad', 12, 1, NULL, NULL, NULL, NULL),
(317, 'Bhandara', 12, 1, NULL, NULL, NULL, NULL),
(318, 'Beed', 12, 1, NULL, NULL, NULL, NULL),
(319, 'Buldhana', 12, 1, NULL, NULL, NULL, NULL),
(320, 'Chandrapur', 12, 1, NULL, NULL, NULL, NULL),
(321, 'Dhule', 12, 1, NULL, NULL, NULL, NULL),
(322, 'Gadchiroli', 12, 1, NULL, NULL, NULL, NULL),
(323, 'Gondiya', 12, 1, NULL, NULL, NULL, NULL),
(324, 'Hingoli', 12, 1, NULL, NULL, NULL, NULL),
(325, 'Jalgaon', 12, 1, NULL, NULL, NULL, NULL),
(326, 'Jalna', 12, 1, NULL, NULL, NULL, NULL),
(327, 'Kolhapur', 12, 1, NULL, NULL, NULL, NULL),
(328, 'Latur', 12, 1, NULL, NULL, NULL, NULL),
(329, 'Mumbai City', 12, 1, NULL, NULL, NULL, NULL),
(330, 'Mumbai suburban', 12, 1, NULL, NULL, NULL, NULL),
(331, 'Nandurbar', 12, 1, NULL, NULL, NULL, NULL),
(332, 'Nanded', 12, 1, NULL, NULL, NULL, NULL),
(333, 'Nagpur', 12, 1, NULL, NULL, NULL, NULL),
(334, 'Nashik', 12, 1, NULL, NULL, NULL, NULL),
(335, 'Osmanabad', 12, 1, NULL, NULL, NULL, NULL),
(336, 'Parbhani', 12, 1, NULL, NULL, NULL, NULL),
(337, 'Pune', 12, 1, NULL, NULL, NULL, NULL),
(338, 'Raigad', 12, 1, NULL, NULL, NULL, NULL),
(339, 'Ratnagiri', 12, 1, NULL, NULL, NULL, NULL),
(340, 'Sindhudurg', 12, 1, NULL, NULL, NULL, NULL),
(341, 'Sangli', 12, 1, NULL, NULL, NULL, NULL),
(342, 'Solapur', 12, 1, NULL, NULL, NULL, NULL),
(343, 'Satara', 12, 1, NULL, NULL, NULL, NULL),
(344, 'Thane', 12, 1, NULL, NULL, NULL, NULL),
(345, 'Wardha', 12, 1, NULL, NULL, NULL, NULL),
(346, 'Washim', 12, 1, NULL, NULL, NULL, NULL),
(347, 'Yavatmal', 12, 1, NULL, NULL, NULL, NULL),
(348, 'Bishnupur', 13, 1, NULL, NULL, NULL, NULL),
(349, 'Churachandpur', 13, 1, NULL, NULL, NULL, NULL),
(350, 'Chandel', 13, 1, NULL, NULL, NULL, NULL),
(351, 'Imphal East', 13, 1, NULL, NULL, NULL, NULL),
(352, 'Senapati', 13, 1, NULL, NULL, NULL, NULL),
(353, 'Tamenglong', 13, 1, NULL, NULL, NULL, NULL),
(354, 'Thoubal', 13, 1, NULL, NULL, NULL, NULL),
(355, 'Ukhrul', 13, 1, NULL, NULL, NULL, NULL),
(356, 'Imphal West', 13, 1, NULL, NULL, NULL, NULL),
(357, 'East Garo Hills', 14, 1, NULL, NULL, NULL, NULL),
(358, 'East Khasi Hills', 14, 1, NULL, NULL, NULL, NULL),
(359, 'Jaintia Hills', 14, 1, NULL, NULL, NULL, NULL),
(360, 'Ri-Bhoi', 14, 1, NULL, NULL, NULL, NULL),
(361, 'South Garo Hills', 14, 1, NULL, NULL, NULL, NULL),
(362, 'West Garo Hills', 14, 1, NULL, NULL, NULL, NULL),
(363, 'West Khasi Hills', 14, 1, NULL, NULL, NULL, NULL),
(364, 'Aizawl', 15, 1, NULL, NULL, NULL, NULL),
(365, 'Champhai', 15, 1, NULL, NULL, NULL, NULL),
(366, 'Kolasib', 15, 1, NULL, NULL, NULL, NULL),
(367, 'Lawngtlai', 15, 1, NULL, NULL, NULL, NULL),
(368, 'Lunglei', 15, 1, NULL, NULL, NULL, NULL),
(369, 'Mamit', 15, 1, NULL, NULL, NULL, NULL),
(370, 'Saiha', 15, 1, NULL, NULL, NULL, NULL),
(371, 'Serchhip', 15, 1, NULL, NULL, NULL, NULL),
(372, 'Dimapur', 16, 1, NULL, NULL, NULL, NULL),
(373, 'Kohima', 16, 1, NULL, NULL, NULL, NULL),
(374, 'Mokokchung', 16, 1, NULL, NULL, NULL, NULL),
(375, 'Mon', 16, 1, NULL, NULL, NULL, NULL),
(376, 'Phek', 16, 1, NULL, NULL, NULL, NULL),
(377, 'Tuensang', 16, 1, NULL, NULL, NULL, NULL),
(378, 'Wokha', 16, 1, NULL, NULL, NULL, NULL),
(379, 'Zunheboto', 16, 1, NULL, NULL, NULL, NULL),
(380, 'Angul', 17, 1, NULL, NULL, NULL, NULL),
(381, 'Boudh', 17, 1, NULL, NULL, NULL, NULL),
(382, 'Bhadrak', 17, 1, NULL, NULL, NULL, NULL),
(383, 'Bolangir', 17, 1, NULL, NULL, NULL, NULL),
(384, 'Bargarh', 17, 1, NULL, NULL, NULL, NULL),
(385, 'Baleswar', 17, 1, NULL, NULL, NULL, NULL),
(386, 'Cuttack', 17, 1, NULL, NULL, NULL, NULL),
(387, 'Debagarh', 17, 1, NULL, NULL, NULL, NULL),
(388, 'Dhenkanal', 17, 1, NULL, NULL, NULL, NULL),
(389, 'Ganjam', 17, 1, NULL, NULL, NULL, NULL),
(390, 'Gajapati', 17, 1, NULL, NULL, NULL, NULL),
(391, 'Jharsuguda', 17, 1, NULL, NULL, NULL, NULL),
(392, 'Jajapur', 17, 1, NULL, NULL, NULL, NULL),
(393, 'Jagatsinghpur', 17, 1, NULL, NULL, NULL, NULL),
(394, 'Khordha', 17, 1, NULL, NULL, NULL, NULL),
(395, 'Kendujhar', 17, 1, NULL, NULL, NULL, NULL),
(396, 'Kalahandi', 17, 1, NULL, NULL, NULL, NULL),
(397, 'Kandhamal', 17, 1, NULL, NULL, NULL, NULL),
(398, 'Koraput', 17, 1, NULL, NULL, NULL, NULL),
(399, 'Kendrapara', 17, 1, NULL, NULL, NULL, NULL),
(400, 'Malkangiri', 17, 1, NULL, NULL, NULL, NULL),
(401, 'Mayurbhanj', 17, 1, NULL, NULL, NULL, NULL),
(402, 'Nabarangpur', 17, 1, NULL, NULL, NULL, NULL),
(403, 'Nuapada', 17, 1, NULL, NULL, NULL, NULL),
(404, 'Nayagarh', 17, 1, NULL, NULL, NULL, NULL),
(405, 'Puri', 17, 1, NULL, NULL, NULL, NULL),
(406, 'Rayagada', 17, 1, NULL, NULL, NULL, NULL),
(407, 'Sambalpur', 17, 1, NULL, NULL, NULL, NULL),
(408, 'Subarnapur', 17, 1, NULL, NULL, NULL, NULL),
(409, 'Sundargarh', 17, 1, NULL, NULL, NULL, NULL),
(410, 'Karaikal', 27, 1, NULL, NULL, NULL, NULL),
(411, 'Mahe', 27, 1, NULL, NULL, NULL, NULL),
(412, 'Puducherry', 27, 1, NULL, NULL, NULL, NULL),
(413, 'Yanam', 27, 1, NULL, NULL, NULL, NULL),
(414, 'Amritsar', 18, 1, NULL, NULL, NULL, NULL),
(415, 'Bathinda', 18, 1, NULL, NULL, NULL, NULL),
(416, 'Firozpur', 18, 1, NULL, NULL, NULL, NULL),
(417, 'Faridkot', 18, 1, NULL, NULL, NULL, NULL),
(418, 'Fatehgarh Sahib', 18, 1, NULL, NULL, NULL, NULL),
(419, 'Gurdaspur', 18, 1, NULL, NULL, NULL, NULL),
(420, 'Hoshiarpur', 18, 1, NULL, NULL, NULL, NULL),
(421, 'Jalandhar', 18, 1, NULL, NULL, NULL, NULL),
(422, 'Kapurthala', 18, 1, NULL, NULL, NULL, NULL),
(423, 'Ludhiana', 18, 1, NULL, NULL, NULL, NULL),
(424, 'Mansa', 18, 1, NULL, NULL, NULL, NULL),
(425, 'Moga', 18, 1, NULL, NULL, NULL, NULL),
(426, 'Mukatsar', 18, 1, NULL, NULL, NULL, NULL),
(427, 'Nawan Shehar', 18, 1, NULL, NULL, NULL, NULL),
(428, 'Patiala', 18, 1, NULL, NULL, NULL, NULL),
(429, 'Rupnagar', 18, 1, NULL, NULL, NULL, NULL),
(430, 'Sangrur', 18, 1, NULL, NULL, NULL, NULL),
(431, 'Ajmer', 19, 1, NULL, NULL, NULL, NULL),
(432, 'Alwar', 19, 1, NULL, NULL, NULL, NULL),
(433, 'Bikaner', 19, 1, NULL, NULL, NULL, NULL),
(434, 'Barmer', 19, 1, NULL, NULL, NULL, NULL),
(435, 'Banswara', 19, 1, NULL, NULL, NULL, NULL),
(436, 'Bharatpur', 19, 1, NULL, NULL, NULL, NULL),
(437, 'Baran', 19, 1, NULL, NULL, NULL, NULL),
(438, 'Bundi', 19, 1, NULL, NULL, NULL, NULL),
(439, 'Bhilwara', 19, 1, NULL, NULL, NULL, NULL),
(440, 'Churu', 19, 1, NULL, NULL, NULL, NULL),
(441, 'Chittorgarh', 19, 1, NULL, NULL, NULL, NULL),
(442, 'Dausa', 19, 1, NULL, NULL, NULL, NULL),
(443, 'Dholpur', 19, 1, NULL, NULL, NULL, NULL),
(444, 'Dungapur', 19, 1, NULL, NULL, NULL, NULL),
(445, 'Ganganagar', 19, 1, NULL, NULL, NULL, NULL),
(446, 'Hanumangarh', 19, 1, NULL, NULL, NULL, NULL),
(447, 'Juhnjhunun', 19, 1, NULL, NULL, NULL, NULL),
(448, 'Jalore', 19, 1, NULL, NULL, NULL, NULL),
(449, 'Jodhpur', 19, 1, NULL, NULL, NULL, NULL),
(450, 'Jaipur', 19, 1, NULL, NULL, NULL, NULL),
(451, 'Jaisalmer', 19, 1, NULL, NULL, NULL, NULL),
(452, 'Jhalawar', 19, 1, NULL, NULL, NULL, NULL),
(453, 'Karauli', 19, 1, NULL, NULL, NULL, NULL),
(454, 'Kota', 19, 1, NULL, NULL, NULL, NULL),
(455, 'Nagaur', 19, 1, NULL, NULL, NULL, NULL),
(456, 'Pali', 19, 1, NULL, NULL, NULL, NULL),
(457, 'Pratapgarh', 19, 1, NULL, NULL, NULL, NULL),
(458, 'Rajsamand', 19, 1, NULL, NULL, NULL, NULL),
(459, 'Sikar', 19, 1, NULL, NULL, NULL, NULL),
(460, 'Sawai Madhopur', 19, 1, NULL, NULL, NULL, NULL),
(461, 'Sirohi', 19, 1, NULL, NULL, NULL, NULL),
(462, 'Tonk', 19, 1, NULL, NULL, NULL, NULL),
(463, 'Udaipur', 19, 1, NULL, NULL, NULL, NULL),
(464, 'East Sikkim', 20, 1, NULL, NULL, NULL, NULL),
(465, 'North Sikkim', 20, 1, NULL, NULL, NULL, NULL),
(466, 'South Sikkim', 20, 1, NULL, NULL, NULL, NULL),
(467, 'West Sikkim', 20, 1, NULL, NULL, NULL, NULL),
(468, 'Ariyalur', 21, 1, NULL, NULL, NULL, NULL),
(469, 'Chennai', 21, 1, NULL, NULL, NULL, NULL),
(470, 'Coimbatore', 21, 1, NULL, NULL, NULL, NULL),
(471, 'Cuddalore', 21, 1, NULL, NULL, NULL, NULL),
(472, 'Dharmapuri', 21, 1, NULL, NULL, NULL, NULL),
(473, 'Dindigul', 21, 1, NULL, NULL, NULL, NULL),
(474, 'Erode', 21, 1, NULL, NULL, NULL, NULL),
(475, 'Kanchipuram', 21, 1, NULL, NULL, NULL, NULL),
(476, 'Kanyakumari', 21, 1, NULL, NULL, NULL, NULL),
(477, 'Karur', 21, 1, NULL, NULL, NULL, NULL),
(478, 'Madurai', 21, 1, NULL, NULL, NULL, NULL),
(479, 'Nagapattinam', 21, 1, NULL, NULL, NULL, NULL),
(480, 'The Nilgiris', 21, 1, NULL, NULL, NULL, NULL),
(481, 'Namakkal', 21, 1, NULL, NULL, NULL, NULL),
(482, 'Perambalur', 21, 1, NULL, NULL, NULL, NULL),
(483, 'Pudukkottai', 21, 1, NULL, NULL, NULL, NULL),
(484, 'Ramanathapuram', 21, 1, NULL, NULL, NULL, NULL),
(485, 'Salem', 21, 1, NULL, NULL, NULL, NULL),
(486, 'Sivagangai', 21, 1, NULL, NULL, NULL, NULL),
(487, 'Tiruppur', 21, 1, NULL, NULL, NULL, NULL),
(488, 'Tiruchirappalli', 21, 1, NULL, NULL, NULL, NULL),
(489, 'Theni', 21, 1, NULL, NULL, NULL, NULL),
(490, 'Tirunelveli', 21, 1, NULL, NULL, NULL, NULL),
(491, 'Thanjavur', 21, 1, NULL, NULL, NULL, NULL),
(492, 'Thoothukudi', 21, 1, NULL, NULL, NULL, NULL),
(493, 'Thiruvallur', 21, 1, NULL, NULL, NULL, NULL),
(494, 'Thiruvarur', 21, 1, NULL, NULL, NULL, NULL),
(495, 'Tiruvannamalai', 21, 1, NULL, NULL, NULL, NULL),
(496, 'Vellore', 21, 1, NULL, NULL, NULL, NULL),
(497, 'Villupuram', 21, 1, NULL, NULL, NULL, NULL),
(498, 'Dhalai', 22, 1, NULL, NULL, NULL, NULL),
(499, 'North Tripura', 22, 1, NULL, NULL, NULL, NULL),
(500, 'South Tripura', 22, 1, NULL, NULL, NULL, NULL),
(501, 'West Tripura', 22, 1, NULL, NULL, NULL, NULL),
(502, 'Almora', 33, 1, NULL, NULL, NULL, NULL),
(503, 'Bageshwar', 33, 1, NULL, NULL, NULL, NULL),
(504, 'Chamoli', 33, 1, NULL, NULL, NULL, NULL),
(505, 'Champawat', 33, 1, NULL, NULL, NULL, NULL),
(506, 'Dehradun', 33, 1, NULL, NULL, NULL, NULL),
(507, 'Haridwar', 33, 1, NULL, NULL, NULL, NULL),
(508, 'Nainital', 33, 1, NULL, NULL, NULL, NULL),
(509, 'Pauri Garhwal', 33, 1, NULL, NULL, NULL, NULL),
(510, 'Pithoragharh', 33, 1, NULL, NULL, NULL, NULL),
(511, 'Rudraprayag', 33, 1, NULL, NULL, NULL, NULL),
(512, 'Tehri Garhwal', 33, 1, NULL, NULL, NULL, NULL),
(513, 'Udham Singh Nagar', 33, 1, NULL, NULL, NULL, NULL),
(514, 'Uttarkashi', 33, 1, NULL, NULL, NULL, NULL),
(515, 'Agra', 23, 1, NULL, NULL, NULL, NULL),
(516, 'Allahabad', 23, 1, NULL, NULL, NULL, NULL),
(517, 'Aligarh', 23, 1, NULL, NULL, NULL, NULL),
(518, 'Ambedkar Nagar', 23, 1, NULL, NULL, NULL, NULL),
(519, 'Auraiya', 23, 1, NULL, NULL, NULL, NULL),
(520, 'Azamgarh', 23, 1, NULL, NULL, NULL, NULL),
(521, 'Barabanki', 23, 1, NULL, NULL, NULL, NULL),
(522, 'Badaun', 23, 1, NULL, NULL, NULL, NULL),
(523, 'Bagpat', 23, 1, NULL, NULL, NULL, NULL),
(524, 'Bahraich', 23, 1, NULL, NULL, NULL, NULL),
(525, 'Bijnor', 23, 1, NULL, NULL, NULL, NULL),
(526, 'Ballia', 23, 1, NULL, NULL, NULL, NULL),
(527, 'Banda', 23, 1, NULL, NULL, NULL, NULL),
(528, 'Balrampur', 23, 1, NULL, NULL, NULL, NULL),
(529, 'Bareilly', 23, 1, NULL, NULL, NULL, NULL),
(530, 'Basti', 23, 1, NULL, NULL, NULL, NULL),
(531, 'Bulandshahr', 23, 1, NULL, NULL, NULL, NULL),
(532, 'Chandauli', 23, 1, NULL, NULL, NULL, NULL),
(533, 'Chitrakoot', 23, 1, NULL, NULL, NULL, NULL),
(534, 'Deoria', 23, 1, NULL, NULL, NULL, NULL),
(535, 'Etah', 23, 1, NULL, NULL, NULL, NULL),
(536, 'Kanshiram Nagar', 23, 1, NULL, NULL, NULL, NULL),
(537, 'Etawah', 23, 1, NULL, NULL, NULL, NULL),
(538, 'Firozabad', 23, 1, NULL, NULL, NULL, NULL),
(539, 'Farrukhabad', 23, 1, NULL, NULL, NULL, NULL),
(540, 'Fatehpur', 23, 1, NULL, NULL, NULL, NULL),
(541, 'Faizabad', 23, 1, NULL, NULL, NULL, NULL),
(542, 'Gautam Buddha Nagar', 23, 1, NULL, NULL, NULL, NULL),
(543, 'Gonda', 23, 1, NULL, NULL, NULL, NULL),
(544, 'Ghazipur', 23, 1, NULL, NULL, NULL, NULL),
(545, 'Gorkakhpur', 23, 1, NULL, NULL, NULL, NULL),
(546, 'Ghaziabad', 23, 1, NULL, NULL, NULL, NULL),
(547, 'Hamirpur', 23, 1, NULL, NULL, NULL, NULL),
(548, 'Hardoi', 23, 1, NULL, NULL, NULL, NULL),
(549, 'Mahamaya Nagar', 23, 1, NULL, NULL, NULL, NULL),
(550, 'Jhansi', 23, 1, NULL, NULL, NULL, NULL),
(551, 'Jalaun', 23, 1, NULL, NULL, NULL, NULL),
(552, 'Jyotiba Phule Nagar', 23, 1, NULL, NULL, NULL, NULL),
(553, 'Jaunpur District', 23, 1, NULL, NULL, NULL, NULL),
(554, 'Kanpur Dehat', 23, 1, NULL, NULL, NULL, NULL),
(555, 'Kannauj', 23, 1, NULL, NULL, NULL, NULL),
(556, 'Kanpur Nagar', 23, 1, NULL, NULL, NULL, NULL),
(557, 'Kaushambi', 23, 1, NULL, NULL, NULL, NULL),
(558, 'Kushinagar', 23, 1, NULL, NULL, NULL, NULL),
(559, 'Lalitpur', 23, 1, NULL, NULL, NULL, NULL),
(560, 'Lakhimpur Kheri', 23, 1, NULL, NULL, NULL, NULL),
(561, 'Lucknow', 23, 1, NULL, NULL, NULL, NULL),
(562, 'Mau', 23, 1, NULL, NULL, NULL, NULL),
(563, 'Meerut', 23, 1, NULL, NULL, NULL, NULL),
(564, 'Maharajganj', 23, 1, NULL, NULL, NULL, NULL),
(565, 'Mahoba', 23, 1, NULL, NULL, NULL, NULL),
(566, 'Mirzapur', 23, 1, NULL, NULL, NULL, NULL),
(567, 'Moradabad', 23, 1, NULL, NULL, NULL, NULL),
(568, 'Mainpuri', 23, 1, NULL, NULL, NULL, NULL),
(569, 'Mathura', 23, 1, NULL, NULL, NULL, NULL),
(570, 'Muzaffarnagar', 23, 1, NULL, NULL, NULL, NULL),
(571, 'Pilibhit', 23, 1, NULL, NULL, NULL, NULL),
(572, 'Pratapgarh', 23, 1, NULL, NULL, NULL, NULL),
(573, 'Rampur', 23, 1, NULL, NULL, NULL, NULL),
(574, 'Rae Bareli', 23, 1, NULL, NULL, NULL, NULL),
(575, 'Saharanpur', 23, 1, NULL, NULL, NULL, NULL),
(576, 'Sitapur', 23, 1, NULL, NULL, NULL, NULL),
(577, 'Shahjahanpur', 23, 1, NULL, NULL, NULL, NULL),
(578, 'Sant Kabir Nagar', 23, 1, NULL, NULL, NULL, NULL),
(579, 'Siddharthnagar', 23, 1, NULL, NULL, NULL, NULL),
(580, 'Sonbhadra', 23, 1, NULL, NULL, NULL, NULL),
(581, 'Sant Ravidas Nagar', 23, 1, NULL, NULL, NULL, NULL),
(582, 'Sultanpur', 23, 1, NULL, NULL, NULL, NULL),
(583, 'Shravasti', 23, 1, NULL, NULL, NULL, NULL),
(584, 'Unnao', 23, 1, NULL, NULL, NULL, NULL),
(585, 'Varanasi', 23, 1, NULL, NULL, NULL, NULL),
(586, 'Birbhum', 24, 1, NULL, NULL, NULL, NULL),
(587, 'Bankura', 24, 1, NULL, NULL, NULL, NULL),
(588, 'Bardhaman', 24, 1, NULL, NULL, NULL, NULL),
(589, 'Darjeeling', 24, 1, NULL, NULL, NULL, NULL),
(590, 'Dakshin Dinajpur', 24, 1, NULL, NULL, NULL, NULL),
(591, 'Hooghly', 24, 1, NULL, NULL, NULL, NULL),
(592, 'Howrah', 24, 1, NULL, NULL, NULL, NULL),
(593, 'Jalpaiguri', 24, 1, NULL, NULL, NULL, NULL),
(594, 'Cooch Behar', 24, 1, NULL, NULL, NULL, NULL),
(595, 'Kolkata', 24, 1, NULL, NULL, NULL, NULL),
(596, 'Malda', 24, 1, NULL, NULL, NULL, NULL),
(597, 'Midnapore', 24, 1, NULL, NULL, NULL, NULL),
(598, 'Murshidabad', 24, 1, NULL, NULL, NULL, NULL),
(599, 'Nadia', 24, 1, NULL, NULL, NULL, NULL),
(600, 'North 24 Parganas', 24, 1, NULL, NULL, NULL, NULL),
(601, 'South 24 Parganas', 24, 1, NULL, NULL, NULL, NULL),
(602, 'Purulia', 24, 1, NULL, NULL, NULL, NULL),
(603, 'Uttar Dinajpur', 24, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `client_master`
--

DROP TABLE IF EXISTS `client_master`;
CREATE TABLE IF NOT EXISTS `client_master` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_type_id` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `state_id` int DEFAULT NULL,
  `city_id` int DEFAULT NULL,
  `zip` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `user_password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` int NOT NULL DEFAULT '1' COMMENT '1=Active, 2=>Inactive',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_master`
--

INSERT INTO `client_master` (`id`, `client_type_id`, `name`, `contact`, `email`, `email_verified_at`, `state_id`, `city_id`, `zip`, `address`, `user_password`, `password`, `flag`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 2, 'Kaushal Parekh', '8780009537', 'kaushal.parekh@hackberrysoftech.com', NULL, 5, 125, '380009', 'Aakash Complex, 105-106 Near Citi Bank Lane Shri Arvind Marg Road Navrangpura Ahmedabad', '123', '$2y$10$g.i5hZ3Qh70QFHymmA1L9OtWi/sNNakUCkOCGi.xzPECGFlixxJdy', 1, NULL, '2023-05-05 04:22:01', '2023-05-08 06:44:32'),
(2, 1, NULL, '1234567898', NULL, NULL, NULL, NULL, NULL, NULL, '1234', '$2y$10$SFMzT2g9HETSHSXf1n6Wz.x74GNgGgkS2e9pXkNMRCkdUqdD8faru', 1, NULL, '2023-05-05 06:13:29', '2023-05-05 06:13:29'),
(3, 2, NULL, '9876543210', NULL, NULL, NULL, NULL, NULL, NULL, '123', '$2y$10$mtkK6j0La0E8oJnU.xAMqe20dAw0qz3V9UkDiGFlCSQdbx.4bNV5.', 1, NULL, '2023-05-05 06:16:11', '2023-05-05 06:16:11'),
(4, 2, NULL, '9876543210', NULL, NULL, NULL, NULL, NULL, NULL, '1234567890', '$2y$10$4Qjt3j/87frjBPFmqrwXnuHqeV1UJYHprJ4C.iFH8gfGS9MWkJckK', 1, NULL, '2023-05-05 06:27:00', '2023-05-05 06:27:00');

-- --------------------------------------------------------

--
-- Table structure for table `client_types`
--

DROP TABLE IF EXISTS `client_types`;
CREATE TABLE IF NOT EXISTS `client_types` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `descr` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `land_zone` varchar(99) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ideal_for_business` varchar(99) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nearby_business` varchar(99) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `floor_no` varchar(99) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_floor` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_washrooms` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `personal_washroom` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cafeteria` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `corner` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_main_road_facing` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `floor_allowed_for_construction` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_open_side` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `width_of_road_facing_plot` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `any_construction` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `boundary_wall_made` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_in_gated_colony` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `carpet_area` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `super_area` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `width_of_entrance` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plot_area` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plot_length` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plot_breadth` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `furnished_status` varchar(99) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `possession_status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_duration` varchar(99) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currently_leased_out` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `leased_to` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monthly_rent` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag` int NOT NULL DEFAULT '1' COMMENT '1=Active, 2=>Inactive',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `industrial_properties`
--

DROP TABLE IF EXISTS `industrial_properties`;
CREATE TABLE IF NOT EXISTS `industrial_properties` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `property_master_id` int NOT NULL,
  `descr` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `land_zone` varchar(99) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_floor` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_main_road_facing` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `floor_allowed_for_construction` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_open_side` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `width_of_road_facing_plot` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `any_construction` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `boundary_wall_made` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `carpet_area` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `super_area` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plot_area` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plot_length` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plot_breadth` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `furnished_status` varchar(99) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `possession_status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_duration` varchar(99) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currently_leased_out` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `leased_to` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monthly_rent` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag` int NOT NULL DEFAULT '1' COMMENT '1=Active, 2=>Inactive',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(16, '2023_05_03_110728_create_agricultural_properties_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `property_amenities`
--

DROP TABLE IF EXISTS `property_amenities`;
CREATE TABLE IF NOT EXISTS `property_amenities` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `property_master_id` int NOT NULL,
  `amenities_id` int NOT NULL,
  `amenities_image` varchar(99) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `property_category_name` varchar(99) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
(17, 5, 'Agricultural Land', 1, 1, 1, '2023-05-09 04:41:47', '2023-05-09 04:41:47'),
(18, 5, 'Farm House', 1, 1, 1, '2023-05-09 04:41:58', '2023-05-09 04:41:58');

-- --------------------------------------------------------

--
-- Table structure for table `property_masters`
--

DROP TABLE IF EXISTS `property_masters`;
CREATE TABLE IF NOT EXISTS `property_masters` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_master_id` int NOT NULL,
  `property_status` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_type_id` int NOT NULL,
  `property_category_id` int NOT NULL,
  `state_id` int NOT NULL,
  `city_id` int NOT NULL,
  `name_of_project` varchar(99) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `locality` varchar(99) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `landmark` varchar(99) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expected_price` int NOT NULL,
  `booking_amount` int DEFAULT NULL,
  `cover_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` int NOT NULL DEFAULT '1' COMMENT '1=Active, 2=>Inactive',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_masters`
--

INSERT INTO `property_masters` (`id`, `client_master_id`, `property_status`, `property_type_id`, `property_category_id`, `state_id`, `city_id`, `name_of_project`, `locality`, `landmark`, `address`, `expected_price`, `booking_amount`, `cover_image`, `flag`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 0, 'Sell', 1, 1, 1, 5, 'fd', 'fd', NULL, 'fd', 52, 1, '', 1, NULL, NULL, '2023-05-15 13:23:15', '2023-05-15 13:23:15'),
(2, 0, 'Sell', 1, 2, 1, 5, 'f', 'sfdf', NULL, 'dsd', 5, NULL, '', 1, NULL, NULL, '2023-05-15 13:44:13', '2023-05-15 13:44:13');

-- --------------------------------------------------------

--
-- Table structure for table `property_master_plan_images`
--

DROP TABLE IF EXISTS `property_master_plan_images`;
CREATE TABLE IF NOT EXISTS `property_master_plan_images` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `property_master_id` int NOT NULL,
  `master_plan_image` varchar(99) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `site_view_image` varchar(99) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag` int NOT NULL DEFAULT '1' COMMENT '1=Active, 2=>Inactive',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `property_types`
--

DROP TABLE IF EXISTS `property_types`;
CREATE TABLE IF NOT EXISTS `property_types` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `property_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `descr` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_flats` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_bedrooms` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_balconies` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_bathrooms` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_floor` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `floor_allowed_for_construction` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_open_side` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `width_of_road_facing_plot` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `any_construction` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `boundary_wall_made` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_in_gated_colony` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `carpet_area` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `super_area` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plot_area` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plot_length` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plot_breadth` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `furnished_status` varchar(99) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `possession_status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_duration` varchar(99) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag` int NOT NULL DEFAULT '1' COMMENT '1=Active, 2=>Inactive',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `residential_properties`
--

INSERT INTO `residential_properties` (`id`, `property_master_id`, `descr`, `no_of_flats`, `total_bedrooms`, `total_balconies`, `total_bathrooms`, `total_floor`, `floor_allowed_for_construction`, `total_open_side`, `width_of_road_facing_plot`, `any_construction`, `boundary_wall_made`, `is_in_gated_colony`, `carpet_area`, `super_area`, `plot_area`, `plot_length`, `plot_breadth`, `furnished_status`, `possession_status`, `age`, `time_duration`, `cover_image`, `flag`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'fd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-05-15 13:23:15', '2023-05-15 13:23:15'),
(2, 2, 'f', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-05-15 13:44:13', '2023-05-15 13:44:13');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
CREATE TABLE IF NOT EXISTS `states` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `state` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, 'ANDHRA PRADESH', 1, NULL, NULL, NULL, NULL),
(2, 'ASSAM', 1, NULL, NULL, NULL, NULL),
(3, 'ARUNACHAL PRADESH', 1, NULL, NULL, NULL, NULL),
(4, 'BIHAR', 1, NULL, NULL, NULL, NULL),
(5, 'GUJRAT', 1, NULL, NULL, NULL, NULL),
(6, 'HARYANA', 1, NULL, NULL, NULL, NULL),
(7, 'HIMACHAL PRADESH', 1, NULL, NULL, NULL, NULL),
(8, 'JAMMU & KASHMIR', 1, NULL, NULL, NULL, NULL),
(9, 'KARNATAKA', 1, NULL, NULL, NULL, NULL),
(10, 'KERALA', 1, NULL, NULL, NULL, NULL),
(11, 'MADHYA PRADESH', 1, NULL, NULL, NULL, NULL),
(12, 'MAHARASHTRA', 1, NULL, NULL, NULL, NULL),
(13, 'MANIPUR', 1, NULL, NULL, NULL, NULL),
(14, 'MEGHALAYA', 1, NULL, NULL, NULL, NULL),
(15, 'MIZORAM', 1, NULL, NULL, NULL, NULL),
(16, 'NAGALAND', 1, NULL, NULL, NULL, NULL),
(17, 'ORISSA', 1, NULL, NULL, NULL, NULL),
(18, 'PUNJAB', 1, NULL, NULL, NULL, NULL),
(19, 'RAJASTHAN', 1, NULL, NULL, NULL, NULL),
(20, 'SIKKIM', 1, NULL, NULL, NULL, NULL),
(21, 'TAMIL NADU', 1, NULL, NULL, NULL, NULL),
(22, 'TRIPURA', 1, NULL, NULL, NULL, NULL),
(23, 'UTTAR PRADESH', 1, NULL, NULL, NULL, NULL),
(24, 'WEST BENGAL', 1, NULL, NULL, NULL, NULL),
(25, 'DELHI', 1, NULL, NULL, NULL, NULL),
(26, 'GOA', 1, NULL, NULL, NULL, NULL),
(27, 'PONDICHERY', 1, NULL, NULL, NULL, NULL),
(28, 'LAKSHDWEEP', 1, NULL, NULL, NULL, NULL),
(29, 'DAMAN & DIU', 1, NULL, NULL, NULL, NULL),
(30, 'DADRA & NAGAR', 1, NULL, NULL, NULL, NULL),
(31, 'CHANDIGARH', 1, NULL, NULL, NULL, NULL),
(32, 'ANDAMAN & NICOBAR', 1, NULL, NULL, NULL, NULL),
(33, 'UTTARANCHAL', 1, NULL, NULL, NULL, NULL),
(34, 'JHARKHAND', 1, NULL, NULL, NULL, NULL),
(35, 'CHATTISGARH', 1, NULL, NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
