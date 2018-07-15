-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 15, 2018 at 11:35 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meru`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `constituencies`
--

CREATE TABLE `constituencies` (
  `constituency_id` int(10) UNSIGNED NOT NULL,
  `constituency_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `constituencies`
--

INSERT INTO `constituencies` (`constituency_id`, `constituency_name`, `created_at`, `updated_at`) VALUES
(1, 'Buuri', '2018-06-30 21:00:00', '2018-07-14 21:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `department_id` int(10) UNSIGNED NOT NULL,
  `department_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_description` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `department_name`, `department_description`, `department_photo`, `created_at`, `updated_at`) VALUES
(1, 'Health', 'The national government has invested heavily to make access to health care a reality for millions of Kenyans at affordable or no cost. The Government distributed World Class medical equipment to all counties, introduced a free maternity health program and expanded National Hospital Insurance Fund.', 'home/img/health.jpg', '2018-06-30 21:00:00', '2018-07-08 21:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(10) UNSIGNED NOT NULL,
  `sender_first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender_last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender_constituency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_06_09_154208_create_admins_table', 1),
(4, '2018_06_24_100946_create_constituencies_table', 1),
(5, '2018_06_24_101003_create_wards_table', 1),
(6, '2018_06_27_140620_create_messages_table', 1),
(7, '2018_07_12_121820_create_departments_table', 1),
(8, '2018_07_12_122428_create_projects_table', 1),
(11, '2018_07_12_122516_create_photos_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `photo_id` int(10) UNSIGNED NOT NULL,
  `photo_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_project` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`photo_id`, `photo_path`, `photo_project`, `created_at`, `updated_at`) VALUES
(1, 'uploads/A newer test/eKH2WpwCu6g6A8wIZFxRXohv1pCX3epsrF2rQ3rd.jpeg', 7, '2018-07-15 14:51:22', '2018-07-15 14:51:22'),
(2, 'uploads/A newer test/auIsBzwKbGvygznhI57lc3xChHHVaTqTTmIIt90O.jpeg', 7, '2018-07-15 14:51:22', '2018-07-15 14:51:22'),
(3, 'uploads/vvvvvvvvvvvvvvvvvvvvvvvvvvvv/ZF7UHqxTTmCoMqURz7d1P1ihdQFelRJt2gEQIB0C.jpeg', 8, '2018-07-15 16:25:36', '2018-07-15 16:25:36'),
(4, 'uploads/vvvvvvvvvvvvvvvvvvvvvvvvvvvv/2SOZ0lCkxiGKmrnjENyCa9jpKLvTLGmieqCq70K4.jpeg', 8, '2018-07-15 16:25:36', '2018-07-15 16:25:36'),
(5, 'uploads/vvvvvvvvvvvvvvvvvvvvvvvvvvvv/lI77a1YknBG8cRoDyND3p9U7qObmH1lHu0S27tyO.jpeg', 8, '2018-07-15 16:25:36', '2018-07-15 16:25:36'),
(6, 'uploads/vvvvvvvvvvvvvvvvvvvvvvvvvvvv/f02MHDanUBgX9UxW6ygrHGDVs4MkH6ykmJzjml1U.jpeg', 8, '2018-07-15 16:25:36', '2018-07-15 16:25:36'),
(7, 'uploads/vvvvvvvvvvvvvvvvvvvvvvvvvvvv/EvXTMbJVqtc5ZPRjl08L5VkCsoD3cW1tzNPgB1s5.jpeg', 8, '2018-07-15 16:25:36', '2018-07-15 16:25:36'),
(8, 'uploads/vvvvvvvvvvvvvvvvvvvvvvvvvvvv/H4DfddVRtcz3C5G0Mf0N3KaR3jod7U64n9gr8jYK.jpeg', 8, '2018-07-15 16:25:36', '2018-07-15 16:25:36'),
(9, 'uploads/New Completed/CKME2AxcAdxFaZV3bF7jxpsD4valgu9KIc6ONGGE.jpeg', 9, '2018-07-15 18:18:52', '2018-07-15 18:18:52'),
(10, 'uploads/New Completed/JwKBKb6Scb4uahrwHEOYvgAGNnGZfHZQZljLkKW7.jpeg', 9, '2018-07-15 18:18:52', '2018-07-15 18:18:52'),
(11, 'uploads/New Completed/oFXzR6NjvnSdRVoAXt7FfQFWYVoWIShdaoca2Kfp.jpeg', 9, '2018-07-15 18:18:52', '2018-07-15 18:18:52'),
(12, 'uploads/New Completed/nMhcJingIcuNPHk74QCxgNf4BfyHZsrRwQ4KCBdI.jpeg', 9, '2018-07-15 18:18:52', '2018-07-15 18:18:52');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` int(10) UNSIGNED NOT NULL,
  `project_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_description` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_constituency` int(10) UNSIGNED NOT NULL,
  `project_ward` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `budget` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completion` int(11) NOT NULL,
  `contractor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `due_date` date NOT NULL,
  `added_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `project_name`, `project_description`, `project_category`, `project_constituency`, `project_ward`, `budget`, `completion`, `contractor`, `due_date`, `added_by`, `created_at`, `updated_at`) VALUES
(7, 'A newer test', 'Vet nwe onw to tesy things out kabisa', 'Health', 1, 'Gakoromone', '345 Billion', 54, 'Kelvin Pac', '2018-08-04', 'Admin', '2018-07-15 14:51:22', '2018-07-15 14:51:22'),
(8, 'vvvvvvvvvvvvvvvvvvvvvvvvvvvv', 'vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv', 'Health', 1, 'Gakoromone', '6 Billion', 98, 'Kelvin Pac', '2019-10-19', 'Admin', '2018-07-15 16:25:36', '2018-07-15 16:25:36'),
(9, 'New Completed', 'Completed Project to test', 'Health', 1, 'Gakoromone', '45 Million', 100, 'Kelvin Pac', '2018-07-28', 'Admin', '2018-07-15 18:18:52', '2018-07-15 18:18:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_constituency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `user_password`, `first_name`, `last_name`, `phone`, `user_constituency`, `user_role`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'masterfork5@gmail.com', 'password', 'Kevin', 'Kiprotich', '754304260', 'Buuri', 'Finance Officer', NULL, '2018-07-15 06:58:43', '2018-07-15 10:48:20'),
(3, 'aushimedics@gmail.com', '$2y$10$JeyPFtsxm0J9o3jhmT2HXOfCkQjb4tp/1WY/YJEKZfWE5wyIO7ohm', 'Kelvin', 'Pac', '754304260', 'Buuri', 'Contractor', NULL, '2018-07-15 12:20:01', '2018-07-15 12:20:01');

-- --------------------------------------------------------

--
-- Table structure for table `wards`
--

CREATE TABLE `wards` (
  `ward_id` int(10) UNSIGNED NOT NULL,
  `ward_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ward_constituency` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wards`
--

INSERT INTO `wards` (`ward_id`, `ward_name`, `ward_constituency`, `created_at`, `updated_at`) VALUES
(1, 'Gakoromone', 1, '2018-06-30 21:00:00', '2018-07-14 21:00:00');

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
-- Indexes for table `constituencies`
--
ALTER TABLE `constituencies`
  ADD PRIMARY KEY (`constituency_id`),
  ADD UNIQUE KEY `constituencies_constituency_name_unique` (`constituency_name`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`photo_id`),
  ADD KEY `photos_photo_project_foreign` (`photo_project`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `projects_project_constituency_foreign` (`project_constituency`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_user_email_unique` (`user_email`);

--
-- Indexes for table `wards`
--
ALTER TABLE `wards`
  ADD PRIMARY KEY (`ward_id`),
  ADD UNIQUE KEY `wards_ward_name_unique` (`ward_name`),
  ADD KEY `wards_ward_constituency_foreign` (`ward_constituency`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `constituencies`
--
ALTER TABLE `constituencies`
  MODIFY `constituency_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `department_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `photo_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `wards`
--
ALTER TABLE `wards`
  MODIFY `ward_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_photo_project_foreign` FOREIGN KEY (`photo_project`) REFERENCES `projects` (`project_id`) ON DELETE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_project_constituency_foreign` FOREIGN KEY (`project_constituency`) REFERENCES `constituencies` (`constituency_id`) ON DELETE CASCADE;

--
-- Constraints for table `wards`
--
ALTER TABLE `wards`
  ADD CONSTRAINT `wards_ward_constituency_foreign` FOREIGN KEY (`ward_constituency`) REFERENCES `constituencies` (`constituency_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
