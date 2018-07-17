-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 17, 2018 at 01:29 PM
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
  `department_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `department_name`, `department_description`, `department_photo`, `created_at`, `updated_at`) VALUES
(1, 'ICT', 'ICT department ICT department ICT department ICT departmentICT department ICT department ICT department ICT department ICT department ICT department', 'home/img/FqRBsRTzNG58uZUDwpYxj1SB3soNAOjNepzXose4.jpeg', '2018-07-17 03:46:43', '2018-07-17 03:46:43'),
(2, 'Roads', 'Roads Department', 'home/img/iduY2DQPZLDAMEeevjsSc1qCC1VP1RwLDzZJ5xDB.jpeg', '2018-07-17 03:47:22', '2018-07-17 03:47:22'),
(5, 'Educations', 'Educations', 'home/img/6OvJXvESLSjCjsRvdjyhK1rLj713hYzScWv95fKH.jpeg', '2018-07-17 03:48:40', '2018-07-17 03:48:40');

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

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `sender_first_name`, `sender_last_name`, `sender_email`, `sender_constituency`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Kelvin', 'Pac', 'maruchui@gmail.com', 'Central Imenti', 'New Message', '2018-07-17 06:24:34', '2018-07-17 06:24:34');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_06_09_154208_create_admins_table', 1),
(4, '2018_06_24_100946_create_constituencies_table', 1),
(5, '2018_06_24_101003_create_wards_table', 1),
(6, '2018_06_27_140620_create_messages_table', 1),
(7, '2018_07_12_121820_create_departments_table', 1),
(8, '2018_07_12_122428_create_projects_table', 1),
(9, '2018_07_12_122516_create_photos_table', 1),
(11, '2014_10_12_000000_create_users_table', 2);

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
(1, 'uploads/Testing wards/WxICmId0QdZwQb1U1Zf0CR9rMfdbvmvbr3stygBQ.png', 1, '2018-07-17 06:57:17', '2018-07-17 06:57:17'),
(2, 'uploads/mm/53ypbHJobpCfQsxLCeGlGDV8waokmOARTT2i2tbQ.jpeg', 2, '2018-07-17 08:05:44', '2018-07-17 08:05:44'),
(3, 'uploads/Mmmmmmm/YlqMz03mWHyI714gcmpLbnU1ZgJWQS7G3jL1eJWG.jpeg', 3, '2018-07-17 08:06:32', '2018-07-17 08:06:32'),
(4, 'uploads/n/B74Dpd3piLeFiggQLXKZ5INJhrOHj6X4myQVxBad.jpeg', 4, '2018-07-17 08:07:33', '2018-07-17 08:07:33'),
(5, 'uploads/m/HttidXqgnhExgkfGzzQYheH8ul16zR5txI2U5lzS.jpeg', 5, '2018-07-17 08:09:10', '2018-07-17 08:09:10'),
(6, 'uploads/b/mZQ5qCxNpC37hY8eK5wuitYvA0ZAMJmUX2MCJ6DF.jpeg', 6, '2018-07-17 08:09:48', '2018-07-17 08:09:48'),
(7, 'uploads/m/xELcCDA3vNvhTEk3DFaLenxwAYci3G8hUG1nLzB2.jpeg', 7, '2018-07-17 08:10:47', '2018-07-17 08:10:47'),
(8, 'uploads/m/6hJVcNt2WNoMzsQ9vXpp2JNtnkl53oZ4f38Gv8Wv.jpeg', 8, '2018-07-17 08:11:25', '2018-07-17 08:11:25'),
(9, 'uploads/b/PGvxCo2vrSV5gpXvHddt7vbsU7LUvTt3Q4SfXh56.jpeg', 9, '2018-07-17 08:12:12', '2018-07-17 08:12:12'),
(10, 'uploads/k/x6iJaXhvq41o8Omn68X3zn6Yk0EVEAy2pnd704Ea.jpeg', 10, '2018-07-17 08:12:50', '2018-07-17 08:12:50');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` int(10) UNSIGNED NOT NULL,
  `project_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, 'Testing wards', 'ytesring qards', 'ICT', 8, 'Abogeta West', '56bMillion', 77, 'Kelvin Pac', '2018-07-07', 'Admin', '2018-07-17 06:57:17', '2018-07-17 06:57:17'),
(2, 'mm', 'mmmmmmmmmmmmmmmmmmmmmmmmmm', 'Roads', 3, 'Igoji East', '77 Billion', 100, 'Kelvin Pac', '2018-08-02', 'Admin', '2018-07-17 08:05:44', '2018-07-17 08:05:44'),
(3, 'Mmmmmmm', 'wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww', 'Educations', 8, 'Abothuguchi West', '4 Billion', 1, 'Kelvin Pac', '2018-07-14', 'Admin', '2018-07-17 08:06:32', '2018-07-17 08:06:32'),
(4, 'n', 'nnnnnnnnnnnnnnnnnnnnnnnnnnnn', 'ICT', 5, 'Thangatha', '234 Million', 23, 'Kelvin Pac', '2018-08-04', 'Admin', '2018-07-17 08:07:33', '2018-07-17 08:07:33'),
(5, 'm', 'xxxxxxxxxxxxxxxx', 'ICT', 4, 'Ntima East', '4 Billion', 92, 'Kelvin Pac', '2018-08-04', 'Admin', '2018-07-17 08:09:10', '2018-07-17 08:09:10'),
(6, 'b', 'bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb', 'Roads', 7, 'Athwana', '45 Million', 100, 'Kelvin Pac', '2018-07-07', 'Admin', '2018-07-17 08:09:48', '2018-07-17 08:09:48'),
(7, 'm', 'mmmmmmmmmmmmmmmmmmmmmmmmmm', 'Roads', 2, 'Kegoi', '56bMillion', 65, 'Kelvin Pac', '2018-08-04', 'Admin', '2018-07-17 08:10:47', '2018-07-17 08:10:47'),
(8, 'm', 'mmmmmmmmmmmmmmmmmmmmmmmmmm', 'ICT', 1, 'Kisima', '6 Billion', 43, 'Kelvin Pac', '2018-08-04', 'Admin', '2018-07-17 08:11:24', '2018-07-17 08:11:24'),
(9, 'b', 'b', 'Educations', 9, 'Igembe East Njia', '6 Billion', 87, 'Kelvin Pac', '2018-08-03', 'Admin', '2018-07-17 08:12:11', '2018-07-17 08:12:11'),
(10, 'k', 'k', 'ICT', 1, 'Kisima', '6 Billion', 56, 'Kelvin Pac', '2018-08-02', 'Admin', '2018-07-17 08:12:50', '2018-07-17 08:16:55');

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
(1, 'masterfork5@gmail.com', '$2y$10$65HKbFxlEEHGHBIQfiBOXO9cMeir5ZHmvXPQPQW7mNXRRmwl8MGHi', 'Kevin', 'Kiprotich', '0754304260', 'Central Imenti', 'Admin', '5d85S0hEwZWp3DfrpG03C91xQitAMlnbqbq6exlYjbXYhs1bhdmvaSxzyJdS', '2018-07-17 04:31:08', '2018-07-17 04:31:08'),
(2, 'aushimedics@gmail.com', '$2y$10$N8D1ywwz.j/FrDmAdHyBnu59VkhCRGqlWEiu9M2V2N4cIbEIzlwm6', 'Kelvin', 'Pac', '0754304260', 'North Imenti', 'Contractor', 'zyK26ZbbSzsrshUtDQUh0sKVidCT6zLdTUS7Hm8KYoKVstOMvmEy467gtYYC', '2018-07-17 05:10:34', '2018-07-17 05:10:34');

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
(1, 'Thangatha', 5, '2018-07-03 15:00:00', '2018-07-17 15:00:00'),
(2, 'Mikinduri', 5, '2018-07-15 15:00:00', '2018-07-16 15:00:00'),
(3, 'Kiguchwa', 5, '2018-07-01 15:00:00', '2018-07-12 15:00:00'),
(4, 'Mithara', 5, '2018-07-15 15:00:00', '2018-07-16 15:00:00'),
(5, 'Karama', 5, '2018-07-01 15:00:00', '2018-07-17 15:00:00'),
(6, 'Athwana', 7, '2018-07-01 15:00:00', '2018-07-11 15:00:00'),
(7, 'Akithi', 7, '2018-07-02 15:00:00', '2018-07-16 15:00:00'),
(8, 'Kianjai', 7, '2018-07-07 15:00:00', '2018-07-16 15:00:00'),
(9, 'Nkomo', 7, '2018-07-01 15:00:00', '2018-07-11 15:00:00'),
(10, 'Mbeu', 7, '2018-06-30 15:00:00', '2018-07-11 15:00:00'),
(11, 'Antuambui', 6, '2018-07-01 15:00:00', '2018-07-16 15:00:00'),
(12, 'Ntunene', 6, '2018-07-07 15:00:00', '2018-07-16 15:00:00'),
(13, 'Antubetwe Kiongo', 6, '2018-07-01 15:00:00', '2018-07-10 15:00:00'),
(14, 'Naathui', 6, '2018-07-14 15:00:00', '2018-07-15 15:00:00'),
(15, 'Amwathi', 6, '2018-06-30 15:00:00', '2018-07-10 15:00:00'),
(16, 'Maua', 2, '2018-07-14 15:00:00', '2018-07-16 15:00:00'),
(17, 'Kegoi', 2, '2018-06-30 15:00:00', '2018-07-15 15:00:00'),
(18, 'Athiru', 2, '2018-07-08 15:00:00', '2018-07-16 15:00:00'),
(19, 'Gaiti', 2, '2018-07-01 15:00:00', '2018-07-01 15:00:00'),
(20, 'Akachiu', 2, '2018-07-08 15:00:00', '2018-07-08 15:00:00'),
(21, 'Kanuni', 2, '2018-07-02 15:00:00', '2018-07-16 15:00:00'),
(22, 'Municipality', 4, '2018-07-15 15:00:00', '2018-07-15 15:00:00'),
(23, 'Ntima East', 4, '2018-07-02 15:00:00', '2018-07-02 15:00:00'),
(24, 'Ntima West', 4, '2018-07-16 15:00:00', '2018-07-16 15:00:00'),
(25, 'Nyaki West', 4, '2018-07-03 15:00:00', '2018-07-04 15:00:00'),
(26, 'Nyaki East', 4, '2018-07-15 15:00:00', '2018-07-15 15:00:00'),
(27, 'Mitunguu', 3, '2018-07-01 15:00:00', '2018-07-16 15:00:00'),
(28, 'Igoji East', 3, '2018-07-14 15:00:00', '2018-07-15 15:00:00'),
(29, 'Igoji West', 3, '2018-07-07 15:00:00', '2018-07-14 15:00:00'),
(30, 'Abogeta East', 3, '2018-07-15 15:00:00', '2018-07-16 15:00:00'),
(31, 'Abogeta West', 3, '2018-07-01 15:00:00', '2018-07-05 15:00:00'),
(32, 'Nkuene', 3, '2018-07-14 15:00:00', '2018-07-14 15:00:00'),
(33, 'Timau', 1, '2018-07-03 15:00:00', '2018-07-03 15:00:00'),
(34, 'Kisima', 1, '2018-07-14 15:00:00', '2018-07-16 15:00:00'),
(35, 'Kiirua', 1, '2018-07-02 15:00:00', '2018-07-03 15:00:00'),
(36, 'Ruiri', 1, '2018-07-08 15:00:00', '2018-07-09 15:00:00'),
(37, 'Ruujine', 9, '2018-07-02 15:00:00', '2018-07-10 15:00:00'),
(38, 'Igembe East Njia', 9, '2018-07-15 15:00:00', '2018-07-16 15:00:00'),
(39, 'Kangeta', 9, '2018-07-03 15:00:00', '2018-07-04 15:00:00'),
(40, 'Mwanganthia', 8, '2018-07-05 15:00:00', '2018-07-06 15:00:00'),
(41, 'Abothuguchi Central', 8, '2018-07-16 15:00:00', '2018-07-16 15:00:00'),
(42, 'Abothuguchi West', 8, '2018-07-15 15:00:00', '2018-07-15 15:00:00'),
(43, 'Kiagu', 8, '2018-07-06 15:00:00', '2018-07-13 15:00:00'),
(44, 'Kibirichia', 8, '2018-07-13 15:00:00', '2018-07-16 15:00:00');

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
  MODIFY `department_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
  MODIFY `photo_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
