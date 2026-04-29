-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: portal_karanganyar
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_links`
--

DROP TABLE IF EXISTS `menu_links`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu_links` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_external` tinyint(1) NOT NULL DEFAULT '1',
  `order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_links`
--

LOCK TABLES `menu_links` WRITE;
/*!40000 ALTER TABLE `menu_links` DISABLE KEYS */;
INSERT INTO `menu_links` VALUES (1,'Profil','Legislatif','https://www.karanganyarkab.go.id/legislatif/',1,1,'2026-04-27 20:29:38','2026-04-27 20:29:38'),(2,'Profil','Daftar Pejabat','https://www.karanganyarkab.go.id/daftar-nama-pejabat/',1,2,'2026-04-27 20:29:38','2026-04-27 20:29:38'),(3,'Profil','RLPPD','https://www.karanganyarkab.go.id/rlppd-kabupaten-karanganyar/',1,3,'2026-04-27 20:29:38','2026-04-27 20:29:38'),(4,'Profil','Pariwisata','https://pesonakaranganyar.karanganyarkab.go.id/',1,4,'2026-04-27 20:29:38','2026-04-27 20:29:38'),(5,'Perangkat Daerah','Sekretariat Daerah','https://setda.karanganyarkab.go.id/',1,1,'2026-04-27 20:29:38','2026-04-27 20:29:38'),(6,'Perangkat Daerah','Sekretariat DPRD','https://dprd.karanganyarkab.go.id/struktur-organisasi-dprd-kabupaten-karanganyar/',1,2,'2026-04-27 20:29:38','2026-04-27 20:29:38'),(7,'Perangkat Daerah','Inspektorat','https://inspektorat.karanganyarkab.go.id/',1,3,'2026-04-27 20:29:38','2026-04-27 20:29:38'),(8,'Perangkat Daerah','Dinas','https://www.karanganyarkab.go.id/category/skpd/dinas/',1,4,'2026-04-27 20:29:38','2026-04-27 20:29:38'),(9,'Perangkat Daerah','Badan','https://www.karanganyarkab.go.id/category/skpd/badan/',1,5,'2026-04-27 20:29:38','2026-04-27 20:29:38'),(10,'Perangkat Daerah','Kecamatan','https://www.karanganyarkab.go.id/kecamatan/',1,6,'2026-04-27 20:29:38','2026-04-27 20:29:38'),(11,'Perangkat Daerah','Kelurahan','https://www.karanganyarkab.go.id/kelurahan/',1,7,'2026-04-27 20:29:38','2026-04-27 20:29:38'),(12,'Perangkat Daerah','RSUD (Rumah Sakit Daerah)','https://rsudkaranganyar.simkeskhanza.com/',1,8,'2026-04-27 20:29:38','2026-04-27 20:29:38'),(13,'Perangkat Daerah','BUMD','https://www.karanganyarkab.go.id/category/bumd/',1,9,'2026-04-27 20:29:38','2026-04-27 20:29:38'),(14,'Aduan','Whistleblowing System','https://www.karanganyarkab.go.id/wbs/',1,1,'2026-04-27 20:29:38','2026-04-27 20:29:38'),(15,'Aduan','Suara Masyarakat','https://www.karanganyarkab.go.id/suara-masyarakat/',1,2,'2026-04-27 20:29:38','2026-04-27 20:29:38'),(16,'Aduan','Laporgub','https://laporgub.jatengprov.go.id/',1,3,'2026-04-27 20:29:38','2026-04-27 20:29:38'),(17,'Aduan','SP4N Lapor','https://www.lapor.go.id/',1,4,'2026-04-27 20:29:38','2026-04-27 20:29:38'),(18,'Aduan','Sapamas (WA)','https://api.whatsapp.com/send?phone=628112629999',1,5,'2026-04-27 20:29:38','2026-04-27 20:29:38'),(19,'Data','Satudata','https://satudata.karanganyarkab.go.id/',1,1,'2026-04-27 20:29:38','2026-04-27 20:29:38'),(20,'Data','Opendata','https://opendata.karanganyarkab.go.id/',1,2,'2026-04-27 20:29:38','2026-04-27 20:29:38'),(21,'Data','Keuangan Daerah','https://www.karanganyarkab.go.id/transparansi-anggaran-2/',1,3,'2026-04-27 20:29:38','2026-04-27 20:29:38'),(22,'Data','Hibah & Bansos','https://www.karanganyarkab.go.id/hibah-dan-bansos/',1,4,'2026-04-27 20:29:38','2026-04-27 23:36:00'),(23,'Data','Statistik','https://www.karanganyarkab.go.id/statistik/',1,5,'2026-04-27 20:29:38','2026-04-27 23:35:15');
/*!40000 ALTER TABLE `menu_links` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2026_04_28_000001_create_news_table',1),(6,'2026_04_28_032609_create_menu_links_table',2),(7,'2026_04_28_054556_add_manual_image_to_news_table',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `headline` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `og_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manual_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pemerintahan',
  `created_by` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `news_created_by_foreign` (`created_by`),
  CONSTRAINT `news_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (4,'Viral Keributan Antarpendaki di Puncak Gunung Lawu Gara-gara Berebut Foto','Keributan antarpendaki terjadi di kawasan spot puncakGunung Lawu. Insiden tersebut sempat terekam video dan viral di media sosial pada Senin (27/4/2026).\r\n\r\nDalam rekaman video yang beredar, keributan terjadi di lokasi spot foto puncak Gunung Lawu. Dalam video itu terlihat sejumlah orang terlibat adu dorong hingga menyebabkan seorang pendaki terjatuh. Sedangkan sejumlah pendaki lain tampak berupaya meredakan situasi.','https://solopos.espos.id/viral-keributan-antarpendaki-di-puncak-gunung-lawu-gara-gara-berebut-foto-2210681',NULL,'1777355435_69f04aab82153.webp','Sosial',1,'2026-04-27 22:42:12','2026-04-27 22:50:36'),(5,'Warga Kaliwuluh Terlapor Pengeroyokan, Rencana Minta Perlindungan Hukum Ke Pemkab Dan DPRD','Disangka lakukan pengeroyokan warga kaliwuluh kebak kramat diperiksa Polres Karanganyar, rencanakan minta perlindungan hukum ke pemkab dan DPRD Karanganyar','https://kabarkaranganyar.com/warga-kaliwuluh-terlapor-pengeroyokan-rencana-minta-perlindungan-hukum-ke-pemkab-dan-dprd/','https://kabarkaranganyar.com/wp-content/uploads/2026/04/IMG-20260427-191048.jpg',NULL,'Sosial',1,'2026-04-27 22:55:19','2026-04-27 22:55:19');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `is_approved` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Administrator Diskominfo','DiskominfoKeren','admin@karanganyarkab.go.id',NULL,'$2y$12$/AfXgkWi5Qyl1/AyAgssqu0kh.sT360TP1yyrceMwukkAAnBJivdS',1,1,'LHmDnPhW77JWF5uuwnvpkyj6oFEyhHVPBKqmogAVBWjNyrXXhhMKEfWPqJ1f','2026-04-27 19:40:03','2026-04-27 19:40:03');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-04-29 11:11:20
