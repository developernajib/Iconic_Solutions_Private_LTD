-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2022 at 11:28 AM
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
-- Database: `p2p_wallet`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `secret_code` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `secret_code`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@gmail.com', '2022-12-27 03:17:31', '$2y$10$tXKa839k/ueiGT7blkiGpOmUXWHX7ihJEq.RkoTGLxJS8AgZRgELi', 'Developer', 1, NULL, '2022-12-27 03:17:31', '2022-12-27 03:17:31');

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
(71, '2014_10_12_000000_create_users_table', 1),
(72, '2014_10_12_100000_create_password_resets_table', 1),
(73, '2019_08_19_000000_create_failed_jobs_table', 1),
(74, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(75, '2022_12_23_140244_create_admins_table', 1),
(76, '2022_12_24_054657_create_transactions_table', 1),
(77, '2022_12_24_055727_create_wallets_table', 1),
(78, '2022_12_24_112016_create_total_supplies_table', 1),
(79, '2022_12_24_112308_create_supported_currencies_table', 1),
(80, '2022_12_27_051647_create_supply_lefts_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
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
-- Table structure for table `supply_lefts`
--

CREATE TABLE `supply_lefts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total_supply_left` int(11) NOT NULL DEFAULT 989000,
  `main_supply` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supply_lefts`
--

INSERT INTO `supply_lefts` (`id`, `total_supply_left`, `main_supply`, `created_at`, `updated_at`) VALUES
(1, 979750, 1, '2022-12-27 03:17:31', '2022-12-27 03:18:22');

-- --------------------------------------------------------

--
-- Table structure for table `supported_currencies`
--

CREATE TABLE `supported_currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `currency` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supported_currencies`
--

INSERT INTO `supported_currencies` (`id`, `currency`, `country`, `created_at`, `updated_at`) VALUES
(1, 'USD', 'USA', '2022-12-27 03:17:31', '2022-12-27 03:17:31');

-- --------------------------------------------------------

--
-- Table structure for table `total_supplies`
--

CREATE TABLE `total_supplies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total_supply` int(11) NOT NULL,
  `base_currency` varchar(255) NOT NULL DEFAULT 'USD',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `total_supplies`
--

INSERT INTO `total_supplies` (`id`, `total_supply`, `base_currency`, `created_at`, `updated_at`) VALUES
(1, 1000000, 'USD', '2022-12-27 03:17:31', '2022-12-27 03:17:31');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from` varchar(255) NOT NULL,
  `to` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `from`, `to`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', 'user@gmail.com', 10000, 1, '2022-12-27 03:17:32', '2022-12-27 03:17:32'),
(2, 'admin@gmail.com', 'user2@gmail.com', 10000, 1, '2022-12-27 03:17:32', '2022-12-27 03:17:32'),
(3, 'user@gmail.com', 'user2@gmail.com', 100, 1, '2022-12-27 03:17:32', '2022-12-27 03:17:32'),
(4, 'admin@gmail.com', 'user2@gmail.com', 250, 1, '2022-12-27 03:18:22', '2022-12-27 03:18:22'),
(5, 'user@gmail.com', 'user2@gmail.com', 200, 1, '2022-12-27 03:19:18', '2022-12-27 03:19:18'),
(6, 'user@gmail.com', 'user2@gmail.com', 500, 1, '2022-12-28 03:34:06', '2022-12-28 03:34:06'),
(7, 'user@gmail.com', 'user2@gmail.com', 1200, 1, '2022-12-28 04:06:24', '2022-12-28 04:06:24');

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
  `country` varchar(255) NOT NULL DEFAULT 'USA',
  `wallet_id` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `country`, `wallet_id`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Prof. Josiah O\'Kon PhD', 'maryse.thompson@example.net', '2022-12-27 03:17:31', '$2y$10$a6ScODoGLxIjbkWwhiGpheqRhwluHjnjglhyYjqFhED9YQVUErhGW', 'USA', NULL, 1, 'p0a0hARqTn', '2022-12-27 03:17:31', '2022-12-27 03:17:31'),
(2, 'Chase Mayert', 'hettie49@example.net', '2022-12-27 03:17:31', '$2y$10$ZI5yF2KWSbmZfNmef4D33eiDX0t3pW/WESbSAoyxpg9zCRJy66y/i', 'USA', NULL, 1, 'caF0h04qvq', '2022-12-27 03:17:31', '2022-12-27 03:17:31'),
(3, 'Prof. Boris Jast Jr.', 'breitenberg.westley@example.net', '2022-12-27 03:17:31', '$2y$10$xpFMADY/WhMlfCoK1wpLvOR.b1Gg/P1hI83bxtpCqcTDIjkIEQ6he', 'USA', NULL, 1, 'EX6oVwhWFI', '2022-12-27 03:17:31', '2022-12-27 03:17:31'),
(4, 'Wanda Pouros', 'littel.jarod@example.net', '2022-12-27 03:17:31', '$2y$10$T0wbhNjp2Eu4loOMYcJGmuij9.D.KCN9VL.LSGYNzgxzz6KXWhnIu', 'USA', NULL, 1, 'WJm3OzqQ14', '2022-12-27 03:17:31', '2022-12-27 03:17:31'),
(5, 'Leon Nolan', 'annette.mayert@example.com', '2022-12-27 03:17:31', '$2y$10$QeIpG3zgdn3yK6ZYio9hr.bnljreX7HwIjViQFXSLh882D3y1aejG', 'USA', NULL, 1, 'T28HTRjgl6', '2022-12-27 03:17:31', '2022-12-27 03:17:31'),
(6, 'Miss Alia Volkman', 'kailee02@example.net', '2022-12-27 03:17:31', '$2y$10$It/ZLIYP/up5b/yPHx3P9e5zKlzFdNrlpVdH6o7QNHbHj5PsDgfc2', 'USA', NULL, 1, 'qUeH8QxFrY', '2022-12-27 03:17:31', '2022-12-27 03:17:31'),
(7, 'Dr. Xzavier Hayes DDS', 'rlind@example.org', '2022-12-27 03:17:31', '$2y$10$aPWbHN8s8yMiZcrNxLyCiOg3YIBDvWvcccJ8GBLcC7gZpcHRBPSKq', 'USA', NULL, 1, '8SjBTJyf7j', '2022-12-27 03:17:31', '2022-12-27 03:17:31'),
(8, 'Fletcher Denesik', 'dangelo26@example.net', '2022-12-27 03:17:31', '$2y$10$dWXOBpQr7EO6Q8uEvIpPh.sXmH3x8UAnC4vit78yp.2xVLQ81fLsi', 'USA', NULL, 1, 'zC8Byfub4B', '2022-12-27 03:17:31', '2022-12-27 03:17:31'),
(9, 'Alexa Jast', 'zita.spinka@example.net', '2022-12-27 03:17:31', '$2y$10$ibabfcTAgYx8L1AwRY1YpexvXkVv9oTD8hyZEznRISeeas4Psd696', 'USA', NULL, 1, 'fToL3X6NkX', '2022-12-27 03:17:31', '2022-12-27 03:17:31'),
(10, 'Mrs. Ilene Weber', 'nledner@example.org', '2022-12-27 03:17:31', '$2y$10$4L4hJWyz5dfte5LcCLKum.dhtMdi2z0WlpzzrGR06Q1DNe18yPF4u', 'USA', NULL, 1, '9tMiQZIV28', '2022-12-27 03:17:31', '2022-12-27 03:17:31'),
(11, 'Md. Najib Islam', 'user@gmail.com', '2022-12-27 03:17:31', '$2y$10$lVTGchLl2QRVmefzybfVLu1Bx3AsVMBlTiMaHr08ljA/xI177VE72', 'Bangladesh', '1', 1, '6G0Aw9rhx7', '2022-12-27 03:17:32', '2022-12-27 03:17:32'),
(12, 'Tawsif Tamim', 'user2@gmail.com', '2022-12-27 03:17:32', '$2y$10$zzOL5c2viEP6EMsvYI6GIuNAzNJlPHbyk2M.pEvWwAU5DAOmZbmia', 'USA', '2', 1, 'dgYRlMh4x4', '2022-12-27 03:17:32', '2022-12-27 03:17:32');

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL DEFAULT 0,
  `supply_id` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `user_id`, `email`, `amount`, `supply_id`, `created_at`, `updated_at`) VALUES
(1, 11, 'user@gmail.com', 8000, 1, '2022-12-27 03:17:31', '2022-12-28 04:06:24'),
(2, 12, 'user2@gmail.com', 12250, 1, '2022-12-27 03:17:32', '2022-12-28 04:06:24');

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
-- Indexes for table `supply_lefts`
--
ALTER TABLE `supply_lefts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supported_currencies`
--
ALTER TABLE `supported_currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `total_supplies`
--
ALTER TABLE `total_supplies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_wallet_id_unique` (`wallet_id`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supply_lefts`
--
ALTER TABLE `supply_lefts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supported_currencies`
--
ALTER TABLE `supported_currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `total_supplies`
--
ALTER TABLE `total_supplies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
