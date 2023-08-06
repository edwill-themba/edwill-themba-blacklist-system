-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2023 at 01:42 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jsbclabdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `black_lists`
--

CREATE TABLE `black_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reason` varchar(255) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `proof` varchar(255) NOT NULL,
  `student_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `black_lists`
--

INSERT INTO `black_lists` (`id`, `reason`, `school_name`, `proof`, `student_id`, `school_id`, `created_at`, `updated_at`) VALUES
(1, 'Smoking drugs at school with friends', 'Ngwane Primary School', '7de48653e45e708ba492fd33cb6a5603.jpg_1691331168.jpg', 6, 1, '2023-08-06 19:12:48', '2023-08-06 19:12:48'),
(2, 'Drinking alchol at school', 'Esithuthukile Primary School', 'an-african-teenage-boy-sitting-with-his-friends-drinking-alcohol-F1KDX1.jpg_1691332838.jpg', 6, 2, '2023-08-06 19:40:38', '2023-08-06 19:40:38'),
(4, 'Playing Music at class', 'Ngwane Primary School', 'file_example_MP3_1MG.mp3_1691334153.mp3', 3, 1, '2023-08-06 20:02:33', '2023-08-06 20:02:33');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2023_08_04_124939_student_teachers', 2),
(11, '2023_08_06_010320_schools_table', 3),
(12, '2023_08_06_112643_create_black_lists_table', 4),
(13, '2023_08_06_221140_create_jobs_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `name`, `location`, `created_at`, `updated_at`) VALUES
(1, 'Ngwane Primary School', 'Barberton', '2023-08-06 06:06:31', '2023-08-06 06:06:31'),
(2, 'Esithuthukile Primary School', 'Kroomdrai', '2023-08-06 06:17:12', '2023-08-06 06:17:12'),
(4, 'Cyril Clark', 'Mbombela', '2023-08-06 22:56:28', '2023-08-06 22:56:28');

-- --------------------------------------------------------

--
-- Table structure for table `student_teachers`
--

CREATE TABLE `student_teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `street_name` varchar(255) NOT NULL,
  `unversity` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_teachers`
--

INSERT INTO `student_teachers` (`id`, `fname`, `lname`, `province`, `city`, `street_name`, `unversity`, `created_at`, `updated_at`) VALUES
(1, 'Edwill', 'Themba', 'Mpumalanga', 'Barberton', '498 Mavela str', 'VUT', '2023-08-05 04:39:02', '2023-08-05 04:39:02'),
(2, 'Branko', 'Ilic', 'Gauteng', 'Pretoria', '66 Gumbi str', 'UJ', '2023-08-05 04:39:02', '2023-08-05 04:39:02'),
(3, 'Mogatla', 'Motaung', 'Free State', 'Sasolburg', '7 eloff street', 'University Johannesburg', NULL, NULL),
(5, 'Vumile', 'Themba', 'Gauteng', 'Pretoria', '76 Centurion', 'Tuks', NULL, NULL),
(6, 'Peter', 'Heitinga', 'Western Cape', 'Cape Town', '45 Schoeman str', 'UCP', '2023-08-06 06:51:04', '2023-08-06 06:51:04'),
(7, 'Nuno', 'Espirito Santo', 'Eastern Cape', 'Porth Elisabeth', '101 North str', 'Rhodes', '2023-08-07 03:38:40', '2023-08-07 03:38:40'),
(8, 'Mpepho', 'Themba', 'Mpumalanga', 'Barberton', '498 Mavela str', 'VUT', '2023-08-07 03:38:40', '2023-08-07 03:38:40'),
(9, 'Sara', 'Johnson', 'Limpopo', 'Nylstroom', '88 pump str', 'UKZN', '2023-08-07 03:38:40', '2023-08-07 03:38:40'),
(10, 'Virginia', 'Nkosi', 'KwaZulu-Natal', 'Durban', '76 Umfolosi', 'UCP', '2023-08-07 03:38:40', '2023-08-07 03:38:40'),
(11, 'Anton', 'Le Roux', 'Free State', 'Kroonstad', '58 Kroonsvaal', 'UFS', '2023-08-07 03:38:40', '2023-08-07 03:38:40'),
(12, 'Noluthando', 'Zulu', 'Mpumalanga', 'Barberton', '89 Manana str', 'Wits', '2023-08-07 04:14:29', '2023-08-07 04:14:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Prof. Ignacio Marks', 'dayna.rohan@example.net', '2023-08-04 07:32:56', '$2y$10$3c3PJ2XQQT3tmrmVxZBeGOqLYzkhvMfeMmklIu3qYPogWdQNDaJaO', '0bfTFbnalttZcIqXaXTAbEQBbVZwVtFPLRepnjsSOErkOuNywJaEl6QAy9bP', '2023-08-04 07:32:59', '2023-08-04 07:32:59'),
(2, 'Noemi Collins', 'erdman.jeanie@example.org', '2023-08-04 07:32:56', '$2y$10$RU7if2RNb1NAargLT2C5JuCybOm6h6yh/c3kjkcU..rGqH4r.g6CG', 'wwdRS93JW0', '2023-08-04 07:32:59', '2023-08-04 07:32:59'),
(3, 'Katherine Runolfsson DDS', 'kenna.schaden@example.org', '2023-08-04 07:32:57', '$2y$10$5M82cgcyR0ogvjTp1ju5eek7Nui0qbx9dEuP0/T0b0ywidtY6ALhK', 'xSX3JcMRhC', '2023-08-04 07:32:59', '2023-08-04 07:32:59'),
(4, 'Jake Gerhold', 'jerel.howe@example.net', '2023-08-04 07:32:57', '$2y$10$p9wCsxkrDPaTBLaOYKDkzuwU6O6bTne4PxXZUtQgVWSL/S5VHIzTa', 'SPnsz4Dq9y', '2023-08-04 07:32:59', '2023-08-04 07:32:59'),
(5, 'Dr. Durward Hansen Sr.', 'forest43@example.org', '2023-08-04 07:32:57', '$2y$10$pUgJPN4XqXOE8VE/hto0RegrMbSvWft04TxWRm8pB.q/Pd8OGWxDi', 'xdCkOL18qM', '2023-08-04 07:32:59', '2023-08-04 07:32:59'),
(6, 'Felicity Feil', 'cleo95@example.net', '2023-08-04 07:32:58', '$2y$10$VkxC7VilWku30mrQDTB0eO/Odc6gFYhfkL.v0anIPlL5upTzAQcSS', 'IQ0izEFdGN', '2023-08-04 07:32:59', '2023-08-04 07:32:59'),
(7, 'Mr. Deangelo Grady', 'mertz.petra@example.com', '2023-08-04 07:32:58', '$2y$10$op8oLC.Zx2Ho9S47nYEMReDNcZ1CEBqWI.jUQGcqfkEtzcf/vb4vO', 'bYkcErFO7K', '2023-08-04 07:32:59', '2023-08-04 07:32:59'),
(8, 'Prof. Rosetta Corkery III', 'garrison03@example.net', '2023-08-04 07:32:58', '$2y$10$9RQYIGpf7t8Nfq9zQmkYGOMsNicwSAGYlHepYQLBShqyAPYdXzOgu', 'jdof95WZU9', '2023-08-04 07:32:59', '2023-08-04 07:32:59'),
(9, 'Rowan Wehner III', 'qblock@example.com', '2023-08-04 07:32:59', '$2y$10$J7IS0yUotJ4usUR/117Rk.Eh6oCgy6eROdw.eQRqqY5GV.uwcXOc2', '4fntOaPvxe', '2023-08-04 07:32:59', '2023-08-04 07:32:59'),
(10, 'Kaela Bruen IV', 'jocelyn.cummerata@example.com', '2023-08-04 07:32:59', '$2y$10$pwAX0XSWqafDOP2Vkpo8iu4x0AFHi4ewbQLxXtSYL44usOTJNJO4a', 'Bh4Hb1klY4', '2023-08-04 07:32:59', '2023-08-04 07:32:59'),
(11, 'Dr. Elyse Johnson MD', 'talon77@example.net', '2023-08-04 07:53:33', '$2y$10$bOL4QqZQCELtns5sbW6Xr.3qDQfwhkLAGffXve/.W77IxFeS/t9HS', 'dDgmqpzXRs', '2023-08-04 07:53:36', '2023-08-04 07:53:36'),
(12, 'Graham Baumbach', 'allen.satterfield@example.org', '2023-08-04 07:53:33', '$2y$10$67f0gO7uKYmze33EZWGMTeegpxoaj5Bs0AFoFX9uWK1rT.fJS9SJK', 'tq2ggfYDSv', '2023-08-04 07:53:36', '2023-08-04 07:53:36'),
(13, 'Dr. Deangelo Luettgen', 'kcarter@example.com', '2023-08-04 07:53:33', '$2y$10$fvnx/0BkNQNSueM5lB8hC.8Ypb1oxF2UR75w/1kSLhdpMxQTupwLK', 'pGKn3Hz8mF', '2023-08-04 07:53:36', '2023-08-04 07:53:36'),
(14, 'Mr. Chauncey Harber', 'leonard.olson@example.net', '2023-08-04 07:53:34', '$2y$10$eMlhK/xveI4q.6whL1talu6GluPPmPNhvs3jM9fdQQ9WxPloICUhS', 'RV64hrhxyD', '2023-08-04 07:53:36', '2023-08-04 07:53:36'),
(15, 'Kip Williamson', 'pfeffer.preston@example.net', '2023-08-04 07:53:34', '$2y$10$4su99MjAp68eub5ir3iilO5YFMEgtCx3lVY5SzYA2sd53JmdrQbs2', 'bXEdLrJOpG', '2023-08-04 07:53:36', '2023-08-04 07:53:36'),
(16, 'Dr. Zelma Friesen', 'anya.sauer@example.com', '2023-08-04 07:53:34', '$2y$10$d2/m6dpkzAuQVzY74ofOn.u4XpjzwXSZwGuG05HUg9JPzMai0ZvoW', 'U7MbeUR0gp', '2023-08-04 07:53:36', '2023-08-04 07:53:36'),
(17, 'Gianni Rosenbaum', 'zritchie@example.com', '2023-08-04 07:53:34', '$2y$10$ZfglPUXoH9NRe45ZLd1MhO4zfzjxk/pUr8uyz6UCw9C1yyqhVyL1.', 'OK66cgGDgw', '2023-08-04 07:53:36', '2023-08-04 07:53:36'),
(18, 'Julius West', 'leuschke.archibald@example.org', '2023-08-04 07:53:34', '$2y$10$hbEAyDd8IhG4MxhkF9J4ZOvderu98n4RtlR70JV7ETNMp8h7AKcQK', '3suyzxWkqX', '2023-08-04 07:53:36', '2023-08-04 07:53:36'),
(19, 'Alyson Considine', 'qrobel@example.net', '2023-08-04 07:53:35', '$2y$10$5KhUEwVftqCQa670s0izyeRl5jYltDR440he83XmUqwv1MBrm0u8C', 'Kp1wB7XH2K', '2023-08-04 07:53:36', '2023-08-04 07:53:36'),
(20, 'Mrs. Cassandra Champlin', 'irving.cassin@example.org', '2023-08-04 07:53:35', '$2y$10$BsyQUuILonUOuxxjvKK08eOb2o8WMU71CkE3/.iQajK2D2waLuMse', 'IJPNqF2BwFwIloxflKAvRSRUlpnUHKJSusXZvdIxJosvMZqOJeyKC1d7HP36', '2023-08-04 07:53:36', '2023-08-04 07:53:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `black_lists`
--
ALTER TABLE `black_lists`
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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_teachers`
--
ALTER TABLE `student_teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `black_lists`
--
ALTER TABLE `black_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_teachers`
--
ALTER TABLE `student_teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
