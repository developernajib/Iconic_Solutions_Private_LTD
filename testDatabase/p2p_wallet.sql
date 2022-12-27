-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2022 at 09:50 AM
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
(1, 'Administrator', 'admin@gmail.com', '2022-12-27 02:37:51', '$2y$10$/4.l1QcpND0so2LNWgtIzuz/gKQyQ6U0g1M9U1LnIVnR3c45Ufcei', 'Developer', 1, NULL, '2022-12-27 02:37:51', '2022-12-27 02:37:51');

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
(41, '2014_10_12_000000_create_users_table', 1),
(42, '2014_10_12_100000_create_password_resets_table', 1),
(43, '2019_08_19_000000_create_failed_jobs_table', 1),
(44, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(45, '2022_12_23_140244_create_admins_table', 1),
(46, '2022_12_24_054657_create_transactions_table', 1),
(47, '2022_12_24_055727_create_wallets_table', 1),
(48, '2022_12_24_112016_create_total_supplies_table', 1),
(49, '2022_12_24_112308_create_supported_currencies_table', 1),
(50, '2022_12_27_051647_create_supply_lefts_table', 1);

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
(1, 979500, 1, '2022-12-27 02:37:52', '2022-12-27 02:38:09');

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
(1, 'USD', 'USA', '2022-12-27 02:37:52', '2022-12-27 02:37:52');

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
(1, 1000000, 'USD', '2022-12-27 02:37:52', '2022-12-27 02:37:52');

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
(1, 'user@gmail.com', 'user2@gmail.com', 100, 1, '2022-12-27 02:37:52', '2022-12-27 02:37:52'),
(2, 'admin@gmail.com', 'user@gmail.com', 500, 1, '2022-12-27 02:38:09', '2022-12-27 02:38:09');

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
(1, 'Modesta Raynor', 'burdette37@example.net', '2022-12-27 02:37:51', '$2y$10$CgAQTl2sV//AOSM6dL42GuEQ5rqIQNB6/qYL5La2MK7ysrphrnsvC', 'USA', NULL, 1, 'QdYDSdTV5w', '2022-12-27 02:37:52', '2022-12-27 02:37:52'),
(2, 'Lyda Aufderhar', 'ortiz.alan@example.com', '2022-12-27 02:37:51', '$2y$10$QdZ3VByqCRHTstj2AaWJ9.CYy/IKqeAoNFJ3Pdbxbnf9hdRXWJGte', 'USA', NULL, 1, 'v7vrQ2N7xt', '2022-12-27 02:37:52', '2022-12-27 02:37:52'),
(3, 'Dr. Rasheed Gorczany', 'zruecker@example.com', '2022-12-27 02:37:51', '$2y$10$MNK.fycigsJVomAn8tG2guDFd0qkHaO87qkg67sJfhxPOI/3Nm0Nu', 'USA', NULL, 1, 'jM1Omrac6c', '2022-12-27 02:37:52', '2022-12-27 02:37:52'),
(4, 'Dorian Mitchell', 'hildegard97@example.net', '2022-12-27 02:37:51', '$2y$10$/ptU3CB0cs0n6ug/YPmDEOSJD/nFizjnkow4DpJVOkVOucajFmXj2', 'USA', NULL, 1, '2WtXSgcQXL', '2022-12-27 02:37:52', '2022-12-27 02:37:52'),
(5, 'Makayla Boyle', 'fhartmann@example.net', '2022-12-27 02:37:51', '$2y$10$pTEWp8W2x51Wjdq9F.kQDeFsFJYzW34mnm4oEMqykCoxHvzKlD7fm', 'USA', NULL, 1, 'odSH4Afx1R', '2022-12-27 02:37:52', '2022-12-27 02:37:52'),
(6, 'Vito Schultz', 'oberbrunner.clay@example.org', '2022-12-27 02:37:51', '$2y$10$wGdRmyd1sgvIe28ekPBZg.6lfEBK6p7hK9dZ0tq5CcICvWyLQekiu', 'USA', NULL, 1, '6GA8OZQUZD', '2022-12-27 02:37:52', '2022-12-27 02:37:52'),
(7, 'Angelina Champlin V', 'bertha.barrows@example.net', '2022-12-27 02:37:51', '$2y$10$weqRvqB8Cl2GY0K1xUIaHObmgMlKB.AfC65AIExcrqJ2G4t/LAB.6', 'USA', NULL, 1, 'a80QVCzBwc', '2022-12-27 02:37:52', '2022-12-27 02:37:52'),
(8, 'Sven McClure I', 'rafaela32@example.org', '2022-12-27 02:37:51', '$2y$10$J32867P7D0smIFLCIbxP2eslgAvbVLxd53FGtJWkmz7rfdaMpgxHu', 'USA', NULL, 1, 'O9nmBTncz0', '2022-12-27 02:37:52', '2022-12-27 02:37:52'),
(9, 'Fanny Reynolds', 'isabel25@example.com', '2022-12-27 02:37:51', '$2y$10$WDKMScYMcmTI40xr8SmsuOauBBoTyQzt7w10HR9DVtXSX0rfOg1xm', 'USA', NULL, 1, 'f3gz48l6Ww', '2022-12-27 02:37:52', '2022-12-27 02:37:52'),
(10, 'Timmy Glover', 'drake.zboncak@example.com', '2022-12-27 02:37:51', '$2y$10$mTl6.NwvjptFRVoTaEVTy.p0PHsPhZZl7qS0UZCWSBF20b5pjtzU.', 'USA', NULL, 1, 'NQxPubRtZA', '2022-12-27 02:37:52', '2022-12-27 02:37:52'),
(11, 'Md. Najib Islam', 'user@gmail.com', '2022-12-27 02:37:52', '$2y$10$woSUQVDYkuQq/qKimKZhr.L86PUXm.SLEATLo8LiCUpEx0UNwErcC', 'Bangladesh', '1', 1, 'h2Y60Ax7JO', '2022-12-27 02:37:52', '2022-12-27 02:37:52'),
(12, 'Tawsif Tamim', 'user2@gmail.com', '2022-12-27 02:37:52', '$2y$10$ibzaA3BEuCUAUtL0vXfSA.MOnRakT5yNg8NpQBG/11gFEafKzt5u2', 'USA', '2', 1, '6EOY9e7mZV', '2022-12-27 02:37:52', '2022-12-27 02:37:52');

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
(1, 11, 'user@gmail.com', 10400, 1, '2022-12-27 02:37:52', '2022-12-27 02:38:09'),
(2, 12, 'user2@gmail.com', 10100, 1, '2022-12-27 02:37:52', '2022-12-27 02:37:52');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
