-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Jan 23, 2022 at 06:23 AM
-- Server version: 8.0.22
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_submission`
--

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_01_21_100321_create_employees_table', 1),
(6, '2022_01_21_100403_create_leaves_table', 1),
(7, '2022_01_21_142742_create_employees_table', 2),
(8, '2022_01_21_142758_create_leaves_table', 3),
(9, '2022_01_21_145032_update_employees_table', 4),
(10, '2022_01_22_011230_update_employees_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_employees`
--

CREATE TABLE `tb_employees` (
  `id` bigint UNSIGNED NOT NULL,
  `identification_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `date_of_birth` date DEFAULT NULL,
  `join_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_employees`
--

INSERT INTO `tb_employees` (`id`, `identification_number`, `name`, `address`, `date_of_birth`, `join_date`, `created_at`, `updated_at`) VALUES
(2, 'IP06001', 'Agus', 'Jln Gaja Mada no 12, Surabaya', '1980-01-11', '2005-08-07', '2022-01-22 05:33:17', '2022-01-22 05:33:17'),
(3, 'IP06002', 'Amin', 'Jln Imam Bonjol no 11, Mojokerto', '1977-09-03', '2005-08-07', '2022-01-22 05:41:08', '2022-01-22 07:49:34'),
(4, 'IP06003', 'Yusuf', 'Jln A Yani Raya 15 No 14 Malang', '1973-08-09', '2006-08-07', '2022-01-22 05:44:46', '2022-01-22 05:44:46'),
(5, 'IP06004', 'Alyssa', 'Jln Bungur Sari V no 166, Bandung', '1983-03-18', '2006-09-06', '2022-01-22 05:46:34', '2022-01-22 05:46:34'),
(6, 'IP06005', 'Maulana', 'Jln Candi Agung, No 78 Gg 5, Jakarta', '1978-11-10', '2006-09-10', '2022-01-22 05:50:06', '2022-01-22 05:50:06'),
(7, 'IP06006', 'Agfika', 'Jln Nangka, Jakarta Timur', '1979-02-07', '2007-01-02', '2022-01-22 05:52:09', '2022-01-22 05:52:09'),
(8, 'IP06007', 'James', 'Jln Merpati, 8 Surabaya', '1989-05-18', '2007-04-07', '2022-01-22 05:53:15', '2022-01-22 05:53:15'),
(9, 'IP06008', 'Octavanus', 'Jln A Yani 17, B 08 Sidoarjo', '1985-04-14', '2007-05-19', '2022-01-22 05:56:57', '2022-01-22 05:56:57'),
(10, 'IP06009', 'Nugroho', 'Jln Duren tiga 167, Jakarta Selatan', '1984-01-01', '2008-01-16', '2022-01-22 05:58:08', '2022-01-22 05:58:08'),
(11, 'IP06010', 'Raisa', 'Jln Kelapa Sawit, Jakarta Selatan', '1990-12-17', '2008-08-16', '2022-01-22 05:59:23', '2022-01-22 05:59:23');

-- --------------------------------------------------------

--
-- Table structure for table `tb_leaves`
--

CREATE TABLE `tb_leaves` (
  `id` bigint UNSIGNED NOT NULL,
  `leave_date` date NOT NULL,
  `long_leave` int DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `employee_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_leaves`
--

INSERT INTO `tb_leaves` (`id`, `leave_date`, `long_leave`, `description`, `employee_id`, `created_at`, `updated_at`) VALUES
(2, '2020-08-02', 2, 'Acara Keluarga', 2, '2022-01-22 12:24:33', '2022-01-22 12:24:33'),
(3, '2020-08-18', 2, 'Anak Sakit', 2, '2022-01-22 12:25:33', '2022-01-22 12:25:33'),
(4, '2020-08-19', 1, 'Nenek Sakit', 7, '2022-01-22 12:26:48', '2022-01-22 12:26:48'),
(5, '2020-08-23', 1, 'Sakit', 8, '2022-01-22 12:27:22', '2022-01-22 12:27:22'),
(6, '2020-08-29', 5, 'Menikah', 5, '2022-01-22 12:28:14', '2022-01-22 12:28:14'),
(7, '2020-08-30', 2, 'Acara Keluarga', 4, '2022-01-22 12:28:46', '2022-01-22 16:58:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Diki Taufik Gurohman', 'taufikdiki11@gmail.com', NULL, '$2y$10$f.yHMhS3G.fYBOMrDDfYTuJxbh.Bqbqt9dH8T3JRJpMC7vQQTB602', NULL, '2022-01-21 10:58:53', '2022-01-21 10:58:53'),
(2, 'Demo', 'Demo@demo.com', '2022-01-23 12:58:04', '$2y$10$qY/6tt1lvjAOE/5gKv918.WzedpTAUQ3zweBTsYkYd2yqvMQSn/Hy', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tb_employees`
--
ALTER TABLE `tb_employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tb_employees_identification_number_unique` (`identification_number`);

--
-- Indexes for table `tb_leaves`
--
ALTER TABLE `tb_leaves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_leaves_employee_id_foreign` (`employee_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_employees`
--
ALTER TABLE `tb_employees`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_leaves`
--
ALTER TABLE `tb_leaves`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_leaves`
--
ALTER TABLE `tb_leaves`
  ADD CONSTRAINT `tb_leaves_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `tb_employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
