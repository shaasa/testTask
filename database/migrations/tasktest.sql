-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mar 23, 2021 alle 21:33
-- Versione del server: 10.4.17-MariaDB
-- Versione PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tasktest`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `dipendenti`
--

CREATE TABLE `dipendenti` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `cf` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `dipendenti`
--

INSERT INTO `dipendenti` (`id`, `nome`, `cf`, `created_at`, `updated_at`) VALUES
(1, 'Agrippa Grande', 'GRNGPP05D12A662R', '2021-03-18 00:46:53', '2021-03-18 00:46:53'),
(2, 'Helen Madonia', 'MDNHLN06H43L736Q', '2021-03-18 00:46:53', '2021-03-18 00:46:53'),
(3, 'Margaret Savino', 'SVNMGR05T57D612H', '2021-03-18 00:46:53', '2021-03-18 00:46:53'),
(4, 'Harry Manzi', 'MNZHRY04L26D612N', '2021-03-18 00:46:53', '2021-03-18 00:46:53'),
(5, 'Efrem Gori', 'GROFRM04A09D612P', '2021-03-18 00:46:53', '2021-03-18 00:46:53'),
(6, 'Fabrizia Floris', 'FLRFRZ05P54L736J', '2021-03-18 00:46:53', '2021-03-18 00:46:53');

-- --------------------------------------------------------

--
-- Struttura della tabella `dipendenti_bustepaga`
--

CREATE TABLE `dipendenti_bustepaga` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dipendente_id` bigint(20) UNSIGNED DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `mese` int(11) DEFAULT NULL,
  `anno` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `dipendenti_bustepaga`
--

INSERT INTO `dipendenti_bustepaga` (`id`, `dipendente_id`, `file`, `mese`, `anno`, `created_at`, `updated_at`) VALUES
(1, 1, '12020_GRNGPP05D12A662R.pdf', 1, 2020, '2021-03-23 13:45:22', '2021-03-23 13:45:22'),
(2, 2, '12020_MDNHLN06H43L736Q.pdf', 1, 2020, '2021-03-23 13:45:22', '2021-03-23 13:45:22'),
(3, 3, '12020_SVNMGR05T57D612H.pdf', 1, 2020, '2021-03-23 13:45:22', '2021-03-23 13:45:22'),
(4, 1, '22020_GRNGPP05D12A662R.pdf', 2, 2020, '2021-03-23 13:54:34', '2021-03-23 13:54:34'),
(5, 2, '22020_MDNHLN06H43L736Q.pdf', 2, 2020, '2021-03-23 13:54:34', '2021-03-23 13:54:34'),
(6, 3, '22020_SVNMGR05T57D612H.pdf', 2, 2020, '2021-03-23 13:54:34', '2021-03-23 13:54:34'),
(7, 1, '32020_GRNGPP05D12A662R.pdf', 3, 2020, '2021-03-23 14:21:54', '2021-03-23 14:21:54'),
(8, 2, '32020_MDNHLN06H43L736Q.pdf', 3, 2020, '2021-03-23 14:21:54', '2021-03-23 14:21:54'),
(9, 3, '32020_SVNMGR05T57D612H.pdf', 3, 2020, '2021-03-23 14:21:55', '2021-03-23 14:21:55'),
(10, 1, '52020_GRNGPP05D12A662R.pdf', 5, 2020, '2021-03-23 14:38:34', '2021-03-23 14:38:34'),
(11, 2, '52020_MDNHLN06H43L736Q.pdf', 5, 2020, '2021-03-23 14:38:34', '2021-03-23 14:38:34'),
(12, 3, '52020_SVNMGR05T57D612H.pdf', 5, 2020, '2021-03-23 14:38:34', '2021-03-23 14:38:34'),
(13, 1, '62020_GRNGPP05D12A662R.pdf', 6, 2020, '2021-03-23 15:04:09', '2021-03-23 15:04:09'),
(14, 2, '62020_MDNHLN06H43L736Q.pdf', 6, 2020, '2021-03-23 15:04:09', '2021-03-23 15:04:09'),
(15, 3, '62020_SVNMGR05T57D612H.pdf', 6, 2020, '2021-03-23 15:04:09', '2021-03-23 15:04:09'),
(16, 1, '102020_GRNGPP05D12A662R.pdf', 10, 2020, '2021-03-23 18:09:16', '2021-03-23 18:09:16'),
(17, 2, '102020_MDNHLN06H43L736Q.pdf', 10, 2020, '2021-03-23 18:09:16', '2021-03-23 18:09:16'),
(18, 3, '102020_SVNMGR05T57D612H.pdf', 10, 2020, '2021-03-23 18:09:16', '2021-03-23 18:09:16'),
(19, 1, '112020_GRNGPP05D12A662R.pdf', 11, 2020, '2021-03-23 19:16:13', '2021-03-23 19:16:13'),
(20, 2, '112020_MDNHLN06H43L736Q.pdf', 11, 2020, '2021-03-23 19:16:14', '2021-03-23 19:16:14'),
(21, 3, '112020_SVNMGR05T57D612H.pdf', 11, 2020, '2021-03-23 19:16:14', '2021-03-23 19:16:14'),
(22, 1, '122020_GRNGPP05D12A662R.pdf', 12, 2020, '2021-03-23 19:25:51', '2021-03-23 19:25:51'),
(23, 2, '122020_MDNHLN06H43L736Q.pdf', 12, 2020, '2021-03-23 19:25:51', '2021-03-23 19:25:51'),
(24, 3, '122020_SVNMGR05T57D612H.pdf', 12, 2020, '2021-03-23 19:25:51', '2021-03-23 19:25:51');

-- --------------------------------------------------------

--
-- Struttura della tabella `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_03_23_123134_create_sessions_table', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('ilf7kB88sZ97We3nP4fOmUxIJyBof29YVIB8GUfF', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiSTF3eUMzazRkTUpBMzR6WEQzMUZrNGtTN0QyU1psdDduTEh0aHMzMyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9kaXBlbmRlbnRpIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJHdsa21neE1tdFU5WVRScFZzWkUwbnVjYnpHZVdpYmczNjRKTUFzZ0tYN3hVTVpJZDZYL2p1IjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCR3bGttZ3hNbXRVOVlUUnBWc1pFMG51Y2J6R2VXaWJnMzY0Sk1Bc2dLWDd4VU1aSWQ2WC9qdSI7fQ==', 1616531189);

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Beatrice', 'arras@beatriceweb.it', NULL, '$2y$10$wlkmgxMmtU9YTRpVsZE0nucbzGeWibg364JMAsgKX7xUMZId6X/ju', NULL, NULL, 'fyS1SR6lOT17iFQ44j1dqLc5hVTfPXeCVw5Gw25rvbdox9PCAi21NQiAQI9w', NULL, NULL, '2021-03-23 11:41:17', '2021-03-23 11:41:17');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `dipendenti`
--
ALTER TABLE `dipendenti`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `dipendenti_bustepaga`
--
ALTER TABLE `dipendenti_bustepaga`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indici per le tabelle `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indici per le tabelle `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indici per le tabelle `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `dipendenti`
--
ALTER TABLE `dipendenti`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `dipendenti_bustepaga`
--
ALTER TABLE `dipendenti_bustepaga`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT per la tabella `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
