-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 08, 2018 at 11:38 AM
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
(1, 'Buuri', '2018-06-30 18:00:00', '2018-07-14 18:00:00'),
(2, 'Igembe South', '2018-06-30 18:00:00', '2018-07-16 18:00:00'),
(3, 'South Imenti', '2018-06-30 18:00:00', '2018-07-03 18:00:00'),
(4, 'North Imenti', '2018-07-02 18:00:00', '2018-07-06 18:00:00'),
(5, 'Tigania East', '2018-06-30 18:00:00', '2018-07-15 18:00:00'),
(6, 'Igembe North', '2018-06-30 18:00:00', '2018-07-16 18:00:00'),
(7, 'Tigania West', '2018-07-10 18:00:00', '2018-07-10 18:00:00'),
(8, 'Central Imenti', '2018-07-12 18:00:00', '2018-07-13 18:00:00'),
(9, 'Igembe Central', '2018-06-30 18:00:00', '2018-06-30 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `department_id` int(10) UNSIGNED NOT NULL,
  `department_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `department_name`, `department_description`, `department_photo`, `created_at`, `updated_at`) VALUES
(1, 'Education', 'Sample iscription here.', 'home/img/wQhUaPW2VQ2jgKsOLgUetdboNv8xoa13OLIpKN9E.png', '2018-08-07 14:13:38', '2018-08-07 14:13:38');

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
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
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
(9, '2018_07_12_122516_create_photos_table', 1);

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
(1, 'uploads/Dam/8wqbWAzzbXKMbCgN61QEANwc0cYC0brFFzlBLmA6.png', 1, '2018-08-07 14:14:48', '2018-08-07 14:14:48'),
(2, 'uploads/Dam/RJLeWxjBAfEsYvbtEDOIqnoOJ478qtYohK2SD2RU.png', 1, '2018-08-07 14:14:48', '2018-08-07 14:14:48'),
(3, 'uploads/Dam/wbntImOsdUlsN7wo5AFruhlyQPBV0A5U9L6oGf2r.png', 1, '2018-08-07 14:14:48', '2018-08-07 14:14:48'),
(4, 'uploads/new/EWWU2u7crTqSITv0z97jDS0VG2whyhICTveuDHPJ.png', 2, '2018-08-08 05:16:49', '2018-08-08 05:16:49'),
(5, 'uploads/Sampe/4798HwS9Ld5biZXkbNGig4c3GzbBekmZXzv6F8VU.png', 3, '2018-08-08 05:27:48', '2018-08-08 05:27:48'),
(6, 'uploads/Newest project/mGi5TbhccDTac6hxzXJNqf7Wu0vhLkxZVQhejwlN.png', 4, '2018-08-08 06:14:32', '2018-08-08 06:14:32'),
(7, 'uploads/Newewst of all/xEuq6ih27uxa6LbixmKyazB2muns9H96EWBeFuuq.png', 5, '2018-08-08 06:32:51', '2018-08-08 06:32:51'),
(8, 'uploads/Newewst of all/b1sQKmbquS7wPFBIXkQKOYY5sJBFbz9gmjuyrCWz.png', 6, '2018-08-08 06:33:14', '2018-08-08 06:33:14'),
(9, 'uploads/ANother new/cygs27PKWbVuLfUDKYdxVNH4mQD4R9o8QsvKlSkU.png', 7, '2018-08-08 06:35:51', '2018-08-08 06:35:51');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` int(10) UNSIGNED NOT NULL,
  `project_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_constituency` int(10) UNSIGNED NOT NULL,
  `project_ward` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `budget` bigint(20) NOT NULL,
  `completion` int(11) NOT NULL,
  `contractor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `due_date` date NOT NULL,
  `added_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_status` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `project_name`, `project_description`, `project_category`, `project_constituency`, `project_ward`, `budget`, `completion`, `contractor`, `due_date`, `added_by`, `project_status`, `balance`, `created_at`, `updated_at`) VALUES
(1, 'Dam', 'Sample description over here. nothing important..', 'Education', 4, 'Ntima East', 1000000, 43, 'Kelvin Pac', '2018-08-25', 'Admin', 1, 0, '2018-08-07 14:14:48', '2018-08-08 05:14:03'),
(2, 'new', 'New project description going on.', 'Education', 8, 'Abothuguchi Central', 10000, 33, 'Kelvin Pac', '2018-08-31', 'Admin', 1, 0, '2018-08-08 05:16:49', '2018-08-08 05:44:48'),
(3, 'Sampe', 'Project to test balance payable', 'Education', 4, 'Ntima East', 10000, 77, 'Brian Kim', '2018-08-30', 'Admin', 1, 0, '2018-08-08 05:27:48', '2018-08-08 06:07:49'),
(4, 'Newest project', 'Very new one just to test the API endpoint for all projects.', 'Education', 6, 'Ntunene', 100000, 87, 'Kelvin Pac', '2018-08-30', 'Admin', 0, 0, '2018-08-08 06:14:32', '2018-08-08 06:14:32'),
(5, 'Newewst of all', 'Am adding another project as proof', 'Education', 2, 'Kegoi', 1000000, 0, 'Kelvin Pac', '2018-08-18', 'Admin', 0, 0, '2018-08-08 06:32:42', '2018-08-08 06:32:42'),
(6, 'Newewst of all', 'Am adding another project as proof', 'Education', 2, 'Kegoi', 1000000, 0, 'Kelvin Pac', '2018-08-18', 'Admin', 0, 0, '2018-08-08 06:33:11', '2018-08-08 06:33:11'),
(7, 'ANother new', 'Very new to verify things', 'Education', 1, 'Kiirua', 100000, 0, 'Brian Kim', '2018-09-01', 'Admin', 0, 0, '2018-08-08 06:35:51', '2018-08-08 06:35:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `users` (`id`, `email`, `password`, `first_name`, `last_name`, `phone`, `user_constituency`, `user_role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'masterfork5@gmail.com', '$2y$10$65HKbFxlEEHGHBIQfiBOXO9cMeir5ZHmvXPQPQW7mNXRRmwl8MGHi', 'Kevin', 'Kiprotich', '0754304260', 'Central Imenti', 'Admin', 'J3fMuWVhmFISc8cVmq6aZKBdmluPbtLRsVaYTmY1TKg89NCzuQqF1IrAOPzE', '2018-07-17 01:31:08', '2018-07-17 01:31:08'),
(2, 'aushimedics@gmail.com', '$2y$10$fXmZVD8ZVluba6E.121JNu6tyusNcN6KXPqOTU.fxFQpnPaaaonJO', 'Kelvin', 'Pac', '072345678900', 'Igembe South', 'Contractor', '8QaKpac60u5N0mXSOkGUYyBiYe8pxM4zuT3jVY8GBY3ErqATc2JjXrAfpXmN', '2018-07-19 02:47:06', '2018-07-19 03:30:23'),
(3, 'maruchui@gmail.com', '$2y$10$Zc7A3CyHPWtiFnsITu827uyR6.5qyycA7xPKpTc0jdY2jluN9sSOu', 'Mary', 'Chui', '0754304260', 'Igembe South', 'Finance Officer', NULL, '2018-08-07 14:13:09', '2018-08-07 14:13:09'),
(4, 'mailymail@gmail.com', '$2y$10$Zg5AoxxidLi1DDTrIPz6LuDdY.1AjXkNJBmwwG5KeFFBwyXx00bUK', 'Brian', 'Kim', '0725778511', 'Igembe South', 'Contractor', NULL, '2018-08-07 16:16:48', '2018-08-07 16:16:48');

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
(1, 'Thangatha', 5, '2018-07-03 12:00:00', '2018-07-17 12:00:00'),
(2, 'Mikinduri', 5, '2018-07-15 12:00:00', '2018-07-16 12:00:00'),
(3, 'Kiguchwa', 5, '2018-07-01 12:00:00', '2018-07-12 12:00:00'),
(4, 'Mithara', 5, '2018-07-15 12:00:00', '2018-07-16 12:00:00'),
(5, 'Karama', 5, '2018-07-01 12:00:00', '2018-07-17 12:00:00'),
(6, 'Athwana', 7, '2018-07-01 12:00:00', '2018-07-11 12:00:00'),
(7, 'Akithi', 7, '2018-07-02 12:00:00', '2018-07-16 12:00:00'),
(8, 'Kianjai', 7, '2018-07-07 12:00:00', '2018-07-16 12:00:00'),
(9, 'Nkomo', 7, '2018-07-01 12:00:00', '2018-07-11 12:00:00'),
(10, 'Mbeu', 7, '2018-06-30 12:00:00', '2018-07-11 12:00:00'),
(11, 'Antuambui', 6, '2018-07-01 12:00:00', '2018-07-16 12:00:00'),
(12, 'Ntunene', 6, '2018-07-07 12:00:00', '2018-07-16 12:00:00'),
(13, 'Antubetwe Kiongo', 6, '2018-07-01 12:00:00', '2018-07-10 12:00:00'),
(14, 'Naathui', 6, '2018-07-14 12:00:00', '2018-07-15 12:00:00'),
(15, 'Amwathi', 6, '2018-06-30 12:00:00', '2018-07-10 12:00:00'),
(16, 'Maua', 2, '2018-07-14 12:00:00', '2018-07-16 12:00:00'),
(17, 'Kegoi', 2, '2018-06-30 12:00:00', '2018-07-15 12:00:00'),
(18, 'Athiru', 2, '2018-07-08 12:00:00', '2018-07-16 12:00:00'),
(19, 'Gaiti', 2, '2018-07-01 12:00:00', '2018-07-01 12:00:00'),
(20, 'Akachiu', 2, '2018-07-08 12:00:00', '2018-07-08 12:00:00'),
(21, 'Kanuni', 2, '2018-07-02 12:00:00', '2018-07-16 12:00:00'),
(22, 'Municipality', 4, '2018-07-15 12:00:00', '2018-07-15 12:00:00'),
(23, 'Ntima East', 4, '2018-07-02 12:00:00', '2018-07-02 12:00:00'),
(24, 'Ntima West', 4, '2018-07-16 12:00:00', '2018-07-16 12:00:00'),
(25, 'Nyaki West', 4, '2018-07-03 12:00:00', '2018-07-04 12:00:00'),
(26, 'Nyaki East', 4, '2018-07-15 12:00:00', '2018-07-15 12:00:00'),
(27, 'Mitunguu', 3, '2018-07-01 12:00:00', '2018-07-16 12:00:00'),
(28, 'Igoji East', 3, '2018-07-14 12:00:00', '2018-07-15 12:00:00'),
(29, 'Igoji West', 3, '2018-07-07 12:00:00', '2018-07-14 12:00:00'),
(30, 'Abogeta East', 3, '2018-07-15 12:00:00', '2018-07-16 12:00:00'),
(31, 'Abogeta West', 3, '2018-07-01 12:00:00', '2018-07-05 12:00:00'),
(32, 'Nkuene', 3, '2018-07-14 12:00:00', '2018-07-14 12:00:00'),
(33, 'Timau', 1, '2018-07-03 12:00:00', '2018-07-03 12:00:00'),
(34, 'Kisima', 1, '2018-07-14 12:00:00', '2018-07-16 12:00:00'),
(35, 'Kiirua', 1, '2018-07-02 12:00:00', '2018-07-03 12:00:00'),
(36, 'Ruiri', 1, '2018-07-08 12:00:00', '2018-07-09 12:00:00'),
(37, 'Ruujine', 9, '2018-07-02 12:00:00', '2018-07-10 12:00:00'),
(38, 'Igembe East Njia', 9, '2018-07-15 12:00:00', '2018-07-16 12:00:00'),
(39, 'Kangeta', 9, '2018-07-03 12:00:00', '2018-07-04 12:00:00'),
(40, 'Mwanganthia', 8, '2018-07-05 12:00:00', '2018-07-06 12:00:00'),
(41, 'Abothuguchi Central', 8, '2018-07-16 12:00:00', '2018-07-16 12:00:00'),
(42, 'Abothuguchi West', 8, '2018-07-15 12:00:00', '2018-07-15 12:00:00'),
(43, 'Kiagu', 8, '2018-07-06 12:00:00', '2018-07-13 12:00:00'),
(44, 'Kibirichia', 8, '2018-07-13 12:00:00', '2018-07-16 12:00:00');

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
  ADD PRIMARY KEY (`department_id`),
  ADD UNIQUE KEY `departments_department_name_unique` (`department_name`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

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
  MODIFY `constituency_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `department_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `photo_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `wards`
--
ALTER TABLE `wards`
  MODIFY `ward_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
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
