-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2020 at 04:17 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soc_samara_internationa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `admin_name`, `admin_phone`, `admin_email`, `admin_password`, `admin_address`, `admin_status`, `created_at`, `updated_at`) VALUES
(1, 'Dhali Abir', '01684924439', 'abirdhali6876@gmail.com', '123456', 'Kollanpur,Dhaka,Bangladesh', 'A', NULL, NULL),
(6, 'Test', '111', 'test@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Test Address', 'A', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_08_04_183854_create_web_site_sliders_table', 1),
(2, '2020_08_06_151611_create_work_main_menus_table', 2),
(4, '2020_08_06_184701_create_our_services_table', 3),
(6, '2020_08_07_043448_create_my_about_uses_table', 4),
(7, '2020_08_07_054659_create_admin_users_table', 5),
(8, '2020_08_07_103801_create_my_contact_us_infos_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `my_about_uses`
--

CREATE TABLE `my_about_uses` (
  `about_id` int(10) UNSIGNED NOT NULL,
  `about_tile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `my_about_uses`
--

INSERT INTO `my_about_uses` (`about_id`, `about_tile`, `about_details`, `about_image`, `about_status`, `created_at`, `updated_at`) VALUES
(4, 'Test', 'Test dfhdfgh', 'allImages/about/vExY7AboutImage.jpg', 'A', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `my_contact_us_infos`
--

CREATE TABLE `my_contact_us_infos` (
  `contact_id` int(10) UNSIGNED NOT NULL,
  `contact_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_msg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `our_services`
--

CREATE TABLE `our_services` (
  `services_id` int(10) UNSIGNED NOT NULL,
  `services_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `services_details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `services_icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `services_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `our_services`
--

INSERT INTO `our_services` (`services_id`, `services_name`, `services_details`, `services_icon`, `services_status`, `created_at`, `updated_at`) VALUES
(5, 'Lorem Ipsum', 'Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident', '<i class=\"icofont-computer\"></i>', 'A', NULL, NULL),
(6, 'Lorem Ipsum', 'Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident', '<i class=\"icofont-computer\"></i>', 'A', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `web_site_sliders`
--

CREATE TABLE `web_site_sliders` (
  `slider_id` int(10) UNSIGNED NOT NULL,
  `slider_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `web_site_sliders`
--

INSERT INTO `web_site_sliders` (`slider_id`, `slider_title`, `slider_details`, `slider_image`, `slider_status`, `created_at`, `updated_at`) VALUES
(5, 'Welcome To Samara International', 'We Provided the best Service To Our Customer.Here You Can Find Different Type Of Product. You Can Choose One Of Them.', 'allImages/slider/pKJREslider.jpg', 'A', '2020-08-08 17:50:39', '2020-08-08 17:50:39');

-- --------------------------------------------------------

--
-- Table structure for table `work_main_menus`
--

CREATE TABLE `work_main_menus` (
  `work_main_menu_id` int(10) UNSIGNED NOT NULL,
  `work_main_menu_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_main_menu_details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_main_menu_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_main_menu_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_main_menu_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work_main_menus`
--

INSERT INTO `work_main_menus` (`work_main_menu_id`, `work_main_menu_name`, `work_main_menu_details`, `work_main_menu_type`, `work_main_menu_image`, `work_main_menu_status`, `created_at`, `updated_at`) VALUES
(3, 'Ornaments', 'Ornaments Ring', 'ornaments', 'allImages/work/dGuvBWorkingImage.jpg', 'A', NULL, NULL),
(4, 'Ornaments', 'Ornaments Chain And Watch', 'ornaments', 'allImages/work/4UetPWorkingImage.jpg', 'A', NULL, NULL),
(5, 'Car', 'Toyota Car', 'car', 'allImages/work/oreqeWorkingImage.jpg', 'A', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_users_admin_email_unique` (`admin_email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `my_about_uses`
--
ALTER TABLE `my_about_uses`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `my_contact_us_infos`
--
ALTER TABLE `my_contact_us_infos`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `our_services`
--
ALTER TABLE `our_services`
  ADD PRIMARY KEY (`services_id`);

--
-- Indexes for table `web_site_sliders`
--
ALTER TABLE `web_site_sliders`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `work_main_menus`
--
ALTER TABLE `work_main_menus`
  ADD PRIMARY KEY (`work_main_menu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `my_about_uses`
--
ALTER TABLE `my_about_uses`
  MODIFY `about_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `my_contact_us_infos`
--
ALTER TABLE `my_contact_us_infos`
  MODIFY `contact_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `our_services`
--
ALTER TABLE `our_services`
  MODIFY `services_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `web_site_sliders`
--
ALTER TABLE `web_site_sliders`
  MODIFY `slider_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `work_main_menus`
--
ALTER TABLE `work_main_menus`
  MODIFY `work_main_menu_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
