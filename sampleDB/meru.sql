-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 09, 2018 at 03:30 PM
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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Health', 'The national government has invested heavily to make access to health care a reality for millions of Kenyans at affordable or no cost. The Government distributed World Class medical equipment to all counties, introduced a free maternity health program and expanded National Hospital Insurance Fund.', 'home/img/health.jpg', '2018-06-30 21:00:00', '2018-07-06 21:00:00'),
(2, 'Education', 'Kenya is the 7th largest funder of Education in the world. The Education sector continues to be the largest recipient of government budget totalling over Ksh.300 billion annually. The government has made interventions at every level of education to increase access to quality education to Kenyans.', '/home/img/education.jpg', '2018-07-01 21:00:00', '2018-07-02 21:00:00'),
(3, 'Roads', 'Development of Key Infrastructure has been a key focus of the Government, in particular Roads, Rail, Energy and Water Infrastructure. These are critical interventions that are are required to jump start the economy and vault the country to middle-income industrialized status as spelt out in Vision 2030.', 'home/img/roads.jpg', '2018-06-30 21:00:00', '2018-07-03 21:00:00'),
(4, 'ICT', 'Information, Communication and Technology is a major priority for the Kenya government as it seeks to transform the country into a knowledge-based economy. Digital Literacy Programme, KONZA Technopolis, Ajira and Presidential Digital Talent Programme are key programmes under ICT', 'home/img/ict.jpg', '2018-06-30 21:00:00', '2018-07-06 21:00:00'),
(5, 'Agriculture and Food Security', 'The government’s efforts to make food cheap and available to all Kenyans are bearing fruit with various initiatives aimed at supporting farming, livestock rearing and fish production initiated. More farmers are accessing subsidized inputs to lower their cost of production and boost earnings.', 'home/img/food.jpg', '2018-06-30 21:00:00', '2018-07-06 21:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `constituencies`
--

CREATE TABLE `constituencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `constituency_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `constituencies`
--

INSERT INTO `constituencies` (`id`, `constituency_name`, `created_at`, `updated_at`) VALUES
(1, 'Buuri', '2018-06-30 21:00:00', '2018-07-02 21:00:00'),
(2, 'South Imenti', '2018-07-01 21:00:00', '2018-07-06 21:00:00'),
(3, 'North Imenti', '2018-06-30 21:00:00', '2018-07-03 21:00:00'),
(4, 'Tigania East', '2018-07-01 21:00:00', '2018-07-06 21:00:00'),
(5, 'Tigania West', '2018-06-30 21:00:00', '2018-07-03 21:00:00'),
(6, 'Igembe South', '2018-06-30 21:00:00', '2018-07-04 21:00:00'),
(7, 'Central Imenti', '2018-06-30 21:00:00', '2018-07-03 21:00:00'),
(8, 'Igembe Central', '2018-07-01 21:00:00', '2018-07-04 21:00:00'),
(9, 'Igembe North', '2018-07-01 21:00:00', '2018-07-02 21:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `sender_first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender_last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(4, '2018_06_09_154217_create_projects_table', 1),
(5, '2018_06_24_100946_create_constituencies_table', 1),
(7, '2018_06_24_105700_create_photos_table', 1),
(8, '2018_06_27_140620_create_messages_table', 1),
(9, '2018_07_06_095538_create_categories_table', 1),
(10, '2018_06_24_101003_create_wards_table', 2);

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
  `id` int(10) UNSIGNED NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `path`, `project_id`, `created_at`, `updated_at`) VALUES
(1, 'uploads/Dam/3KlcEyDpv1771IYb847xFBAnvW70EdCYDL7UkjQl.png', 1, '2018-06-30 21:00:00', '2018-07-06 21:00:00'),
(2, 'uploads/Airstrip/MOpwTWG5pzMGyjHM4wHcVuwwecNW5MYxWFCGgvYv.jpeg', 4, '2018-07-08 15:44:49', '2018-07-08 15:44:49'),
(3, 'uploads/mmmmmm/e2GtwCV9hbOAFTfZj1bFQ6aGQV4SBU0tNQwCEeZJ.jpeg', 6, '2018-07-08 15:55:04', '2018-07-08 15:55:04'),
(4, 'uploads/Dam Water/ypzSBl9ghHNskKrWjO0qZow4cspDYeHzT7WG0Q5q.jpeg', 8, '2018-07-08 15:56:58', '2018-07-08 15:56:58'),
(5, 'uploads/uuuu/82vbPHyXIi6o51Hey6MTykYjLn6EVZh5t3RXAzxk.jpeg', 9, '2018-07-08 15:58:59', '2018-07-08 15:58:59'),
(6, 'uploads/vvvvvvvvvvvv/snOfO3GvPHu7yumTmUMQalJleWQias86oTaD9o9v.jpeg', 10, '2018-07-08 16:02:52', '2018-07-08 16:02:52'),
(7, 'uploads/vvvvvvvvvvvv/GyaA2XfYKW2x7PDEvoGg0GwRx27UC86N27Bivd9H.jpeg', 10, '2018-07-08 16:02:52', '2018-07-08 16:02:52');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `constituency_id` int(10) UNSIGNED NOT NULL,
  `ward` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `projects` (`id`, `name`, `description`, `category`, `constituency_id`, `ward`, `budget`, `completion`, `contractor`, `due_date`, `added_by`, `created_at`, `updated_at`) VALUES
(1, 'Dam', 'Dam to provide water for irrigation and home use to the beautiful people of our great county.', 'Agriculture and Food Security', 1, 'Giteretu', '345 Billion', 47, 'Kelvin Pac', '2018-07-07', 'Admin', '2018-07-08 15:28:33', '2018-07-08 15:28:33'),
(2, 'Tarmac Road', 'Dam to provide water for irrigation and home use to the beautiful people of our great county.', 'Agriculture and Food Security', 1, 'Giteretu', '345 Billion', 97, 'Kelvin Pac', '2018-07-04', 'Admin', '2018-07-08 15:39:12', '2018-07-08 15:39:12'),
(3, 'Tarmac Road', 'Dam to provide water for irrigation and home use to the beautiful people of our great county.', 'Agriculture and Food Security', 1, 'Giteretu', '345 Billion', 97, 'Kelvin Pac', '2018-07-04', 'Admin', '2018-07-08 15:43:40', '2018-07-08 15:43:40'),
(4, 'Airstrip', 'Dam to provide water for irrigation and home use to the beautiful people of our great county.', 'Agriculture and Food Security', 1, 'Giteretu', '345 Billion', 17, 'Kelvin Pac', '2018-07-04', 'Admin', '2018-07-08 15:44:49', '2018-07-08 15:44:49'),
(6, 'mmmmmm', 'gggggggggggggggggggggggggggggg', 'Health', 6, 'Giteretu', '234 Million', 34, 'Kelvin Pac', '2018-07-06', 'Admin', '2018-07-08 15:55:04', '2018-07-08 15:55:04'),
(8, 'Dam Water', 'qqqqqqqqqqqqqqqqqqqqqq', 'Roads', 8, 'Giteretu', '4 Billion', 78, 'Kelvin Pac', '2018-07-06', 'Admin', '2018-07-08 15:56:58', '2018-07-08 15:56:58'),
(9, 'uuuu', 'bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb', 'ICT', 4, 'Giteretu', '77 Billion', 100, 'Kelvin Pac', '2018-07-03', 'Admin', '2018-07-08 15:58:59', '2018-07-08 15:58:59'),
(10, 'vvvvvvvvvvvv', 'cccccccccccccccccccc', 'Agriculture and Food Security', 4, 'Giteretu', '6 Billion', 65, 'Kelvin Pac', '2018-07-28', 'Admin', '2018-07-08 16:02:52', '2018-07-08 16:02:52');

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
  `constituency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ward` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `first_name`, `last_name`, `phone`, `constituency`, `ward`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'masterfork5@gmail.com', '$2y$12$YKcMO5L2DmB.f21nQ9Exm.b.MTNYj8FKuP8SSw5aLjyS8CRvrKFgC', 'Kevin', 'Kiprotich', '0734567845', 'Buuri', 'Giteretu', 'Admin', NULL, '2018-06-30 21:00:00', '2018-07-02 21:00:00'),
(2, 'kelvinpac@gmail.com', '$2y$12$PL5F0UB1Vj4CAeO1NkJuKuH0Liq2dtKPhhxs.RajZW9UEc75x.reO', 'Kelvin', 'Pac', '0789654723', 'North Imenti', 'Gatundu', 'Contractor', NULL, '2018-06-30 21:00:00', '2018-07-03 21:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `wards`
--

CREATE TABLE `wards` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `constituency_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wards`
--

INSERT INTO `wards` (`id`, `name`, `constituency_id`, `created_at`, `updated_at`) VALUES
(1, 'Giteretu', 6, '2018-06-30 21:00:00', '2018-07-03 21:00:00'),
(2, 'Igembe East', 6, '2018-06-30 21:00:00', '2018-07-01 21:00:00'),
(3, 'Igembe South', 6, '2018-06-30 21:00:00', '2018-07-01 21:00:00'),
(4, 'Igembe South East', 6, '2018-07-01 21:00:00', '2018-07-02 21:00:00');

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
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `constituencies`
--
ALTER TABLE `constituencies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `constituencies_name_unique` (`constituency_name`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `photos_project_id_foreign` (`project_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_constituency_id_foreign` (`constituency_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `wards_name_unique` (`name`),
  ADD KEY `wards_constituency_id_foreign` (`constituency_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `constituencies`
--
ALTER TABLE `constituencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `wards`
--
ALTER TABLE `wards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_constituency_id_foreign` FOREIGN KEY (`constituency_id`) REFERENCES `projects` (`id`);

--
-- Constraints for table `wards`
--
ALTER TABLE `wards`
  ADD CONSTRAINT `wards_constituency_id_foreign` FOREIGN KEY (`constituency_id`) REFERENCES `constituencies` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
