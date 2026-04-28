-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 28, 2026 at 03:44 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portal_karanganyar`
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
-- Table structure for table `menu_links`
--

CREATE TABLE `menu_links` (
  `id` bigint UNSIGNED NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_external` tinyint(1) NOT NULL DEFAULT '1',
  `order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_links`
--

INSERT INTO `menu_links` (`id`, `group`, `label`, `url`, `is_external`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Profil', 'Legislatif', 'https://www.karanganyarkab.go.id/legislatif/', 1, 1, '2026-04-27 20:29:38', '2026-04-27 20:29:38'),
(2, 'Profil', 'Daftar Pejabat', 'https://www.karanganyarkab.go.id/daftar-nama-pejabat/', 1, 2, '2026-04-27 20:29:38', '2026-04-27 20:29:38'),
(3, 'Profil', 'RLPPD', 'https://www.karanganyarkab.go.id/rlppd-kabupaten-karanganyar/', 1, 3, '2026-04-27 20:29:38', '2026-04-27 20:29:38'),
(4, 'Profil', 'Pariwisata', 'https://pesonakaranganyar.karanganyarkab.go.id/', 1, 4, '2026-04-27 20:29:38', '2026-04-27 20:29:38'),
(5, 'Perangkat Daerah', 'Sekretariat Daerah', 'https://setda.karanganyarkab.go.id/', 1, 1, '2026-04-27 20:29:38', '2026-04-27 20:29:38'),
(6, 'Perangkat Daerah', 'Sekretariat DPRD', 'https://dprd.karanganyarkab.go.id/struktur-organisasi-dprd-kabupaten-karanganyar/', 1, 2, '2026-04-27 20:29:38', '2026-04-27 20:29:38'),
(7, 'Perangkat Daerah', 'Inspektorat', 'https://inspektorat.karanganyarkab.go.id/', 1, 3, '2026-04-27 20:29:38', '2026-04-27 20:29:38'),
(8, 'Perangkat Daerah', 'Dinas', 'https://www.karanganyarkab.go.id/category/skpd/dinas/', 1, 4, '2026-04-27 20:29:38', '2026-04-27 20:29:38'),
(9, 'Perangkat Daerah', 'Badan', 'https://www.karanganyarkab.go.id/category/skpd/badan/', 1, 5, '2026-04-27 20:29:38', '2026-04-27 20:29:38'),
(10, 'Perangkat Daerah', 'Kecamatan', 'https://www.karanganyarkab.go.id/kecamatan/', 1, 6, '2026-04-27 20:29:38', '2026-04-27 20:29:38'),
(11, 'Perangkat Daerah', 'Kelurahan', 'https://www.karanganyarkab.go.id/kelurahan/', 1, 7, '2026-04-27 20:29:38', '2026-04-27 20:29:38'),
(12, 'Perangkat Daerah', 'RSUD (Rumah Sakit Daerah)', 'https://rsudkaranganyar.simkeskhanza.com/', 1, 8, '2026-04-27 20:29:38', '2026-04-27 20:29:38'),
(13, 'Perangkat Daerah', 'BUMD', 'https://www.karanganyarkab.go.id/category/bumd/', 1, 9, '2026-04-27 20:29:38', '2026-04-27 20:29:38'),
(14, 'Aduan', 'Whistleblowing System', 'https://www.karanganyarkab.go.id/wbs/', 1, 1, '2026-04-27 20:29:38', '2026-04-27 20:29:38'),
(15, 'Aduan', 'Suara Masyarakat', 'https://www.karanganyarkab.go.id/suara-masyarakat/', 1, 2, '2026-04-27 20:29:38', '2026-04-27 20:29:38'),
(16, 'Aduan', 'Laporgub', 'https://laporgub.jatengprov.go.id/', 1, 3, '2026-04-27 20:29:38', '2026-04-27 20:29:38'),
(17, 'Aduan', 'SP4N Lapor', 'https://www.lapor.go.id/', 1, 4, '2026-04-27 20:29:38', '2026-04-27 20:29:38'),
(18, 'Aduan', 'Sapamas (WA)', 'https://api.whatsapp.com/send?phone=628112629999', 1, 5, '2026-04-27 20:29:38', '2026-04-27 20:29:38'),
(19, 'Data', 'Satudata', 'https://satudata.karanganyarkab.go.id/', 1, 1, '2026-04-27 20:29:38', '2026-04-27 20:29:38'),
(20, 'Data', 'Opendata', 'https://opendata.karanganyarkab.go.id/', 1, 2, '2026-04-27 20:29:38', '2026-04-27 20:29:38'),
(21, 'Data', 'Keuangan Daerah', 'https://www.karanganyarkab.go.id/transparansi-anggaran-2/', 1, 3, '2026-04-27 20:29:38', '2026-04-27 20:29:38'),
(22, 'Data', 'Hibah & Bansos', 'https://www.karanganyarkab.go.id/hibah-dan-bansos/', 1, 4, '2026-04-27 20:29:38', '2026-04-27 20:29:38'),
(23, 'Data', 'Statistik', 'https://www.karanganyarkab.go.id/statistik/', 1, 5, '2026-04-27 20:29:38', '2026-04-27 20:29:38');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2026_04_28_000001_create_news_table', 1),
(6, '2026_04_28_032609_create_menu_links_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint UNSIGNED NOT NULL,
  `headline` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `og_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pemerintahan',
  `created_by` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `headline`, `description`, `link`, `og_image`, `category`, `created_by`, `created_at`, `updated_at`) VALUES
(3, 'Tabrakan KRL dan KA Argo Bromo Anggrek di Stasiun Bekasi Timur: Tujuh orang meninggal, tiga korban terhimpit berhasil dievakuasi', 'Tiga orang penumpang yang terhimpit di dalam gerbong KRL akibat tabrakan di Stasiun Bekasi Timur, berhasil dievakuasi pada Selasa (28/04) pagi, kata Basarnas. Belum diketahui apakah masih ada korban lain di dalam gerbong tersebut.', 'https://www.bbc.com/indonesia/articles/c5yvynj08z7o', 'https://ichef.bbci.co.uk/news/1024/branded_indonesia/65e6/live/6679b230-42a3-11f1-9d9f-d39fb7b2d9d6.jpg', 'Lainnya', 1, '2026-04-27 20:00:45', '2026-04-27 20:00:45');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `is_approved` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `is_admin`, `is_approved`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator Diskominfo', 'DiskominfoKeren', 'admin@karanganyarkab.go.id', NULL, '$2y$12$/AfXgkWi5Qyl1/AyAgssqu0kh.sT360TP1yyrceMwukkAAnBJivdS', 1, 1, 'RGrgwkKfZx7LG3oppVcoL8rJ9f6ywy0hxuKWDHki7LwSFXZT88HneAC06kic', '2026-04-27 19:40:03', '2026-04-27 19:40:03');

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
-- Indexes for table `menu_links`
--
ALTER TABLE `menu_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_created_by_foreign` (`created_by`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
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
-- AUTO_INCREMENT for table `menu_links`
--
ALTER TABLE `menu_links`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
