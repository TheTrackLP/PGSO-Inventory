-- MySQL dump 10.13  Distrib 8.0.42, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: pgso_inventory
-- ------------------------------------------------------
-- Server version	8.0.42

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `establishments`
--

DROP TABLE IF EXISTS `establishments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `establishments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `estab_acronym` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estab_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estab_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estab_incharge` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estab_position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estab_sequence` int DEFAULT NULL,
  `estab_type` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `establishments`
--

LOCK TABLES `establishments` WRITE;
/*!40000 ALTER TABLE `establishments` DISABLE KEYS */;
INSERT INTO `establishments` VALUES (1,'BAC','210','Bid And Award Committee','FERDINAND B. CABEROY','Chief BAC Secretariat',NULL,1,'2025-06-24 22:59:36','2025-06-24 22:59:36'),(2,'MIS',NULL,'Management Information System','LEONIL A. BALASA','Project Development Officer',NULL,1,'2025-06-24 23:00:59','2025-06-24 23:00:59'),(3,'OVG','150','Vice Governor\'s Office','HON. JAIME O. MAGBANUA','Vice Governor',NULL,1,'2025-06-24 23:01:58','2025-06-24 23:01:58'),(4,'PACCO','170','Provincial Accounting Office','ATTY. ERNIE B. ARCENAS','Provincial Accountant',NULL,1,'2025-06-24 23:02:53','2025-06-24 23:02:53'),(5,'PDRRMO','130','Provincial Disaster Risk Reduction And Management Office','ATTY. SHEILA A. ARTILLERO','LDRRMO V',NULL,1,'2025-06-24 23:03:51','2025-06-24 23:03:51'),(6,'PEO','290','Provincial Engineer\'s Office','ANTONIO S. CERADO','Provincial Engineer',NULL,1,'2025-06-24 23:05:08','2025-06-24 23:05:08'),(7,'PGO',NULL,'Provincial Governor\'s Office','ROSEMARIE F. GARDOSE','Executive Assistant V',NULL,1,'2025-06-24 23:06:16','2025-06-24 23:06:16'),(8,'PPDO','240','Provincial Planning And Development Office','WILAR C. DE LOS SANTOS','Provincial Planning and Development Officer',NULL,1,'2025-06-24 23:06:58','2025-06-24 23:06:58'),(9,'RMPH','010','Roxas Memorial Provincial Hospital','MAI B BUENVENIDA','Administrative Aide III',NULL,2,'2025-06-24 23:10:47','2025-06-24 23:10:47'),(10,'SP','300','Sangguniang Panlalawigan','ZOE G. HERRERA, JR.','SP Secretary',NULL,1,'2025-06-24 23:11:56','2025-06-24 23:11:56');
/*!40000 ALTER TABLE `establishments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2025_06_19_004429_create_ppe_accounts_table',1),(5,'2025_06_19_004451_create_unit_types_table',1),(6,'2025_06_19_004511_create_serviceables_table',1),(7,'2025_06_19_004526_create_pgso_numbers_table',1),(8,'2025_06_20_005950_create_establishments_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
-- Table structure for table `pgso_numbers`
--

DROP TABLE IF EXISTS `pgso_numbers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pgso_numbers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `estab_id` int NOT NULL,
  `ppe_id` int NOT NULL,
  `serv_type` int NOT NULL,
  `inc_pgso` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pgso_numbers`
--

LOCK TABLES `pgso_numbers` WRITE;
/*!40000 ALTER TABLE `pgso_numbers` DISABLE KEYS */;
INSERT INTO `pgso_numbers` VALUES (1,1,7,1,3,'2025-06-24 23:18:06','2025-06-24 23:18:06'),(2,1,7,2,7,'2025-06-24 23:20:50','2025-06-24 23:20:50'),(3,1,8,2,12,'2025-06-24 23:30:34','2025-06-24 23:30:34'),(4,1,9,2,24,'2025-06-24 23:36:21','2025-06-24 23:39:43'),(5,1,12,2,2,'2025-06-24 23:41:24','2025-06-24 23:41:24'),(6,2,7,2,2,'2025-06-24 23:42:00','2025-06-24 23:42:00'),(7,2,8,2,1,'2025-06-24 23:42:23','2025-06-24 23:42:23'),(8,2,9,2,13,'2025-06-24 23:45:56','2025-06-24 23:45:56'),(9,3,7,1,4,'2025-06-29 21:54:00','2025-06-29 21:54:00'),(10,3,9,1,4,'2025-06-29 22:35:33','2025-06-29 22:35:33'),(11,3,12,1,1,'2025-06-29 22:37:24','2025-06-29 22:37:24'),(12,3,18,1,1,'2025-06-29 22:38:21','2025-06-29 22:38:21'),(13,3,7,2,2,'2025-06-29 22:39:22','2025-06-29 22:40:18'),(14,3,8,2,10,'2025-06-29 22:43:19','2025-06-29 22:43:19'),(15,3,9,2,4,'2025-06-29 22:45:39','2025-06-29 22:45:39'),(16,3,12,2,1,'2025-06-29 22:46:37','2025-06-29 22:46:37'),(17,4,7,1,4,'2025-06-29 22:54:38','2025-06-29 22:54:38'),(18,4,9,1,3,'2025-06-29 22:59:13','2025-06-29 22:59:13'),(19,4,7,2,3,'2025-06-29 23:00:38','2025-06-29 23:00:38'),(20,4,8,2,16,'2025-06-29 23:08:02','2025-06-29 23:08:02'),(21,4,9,2,34,'2025-06-29 23:13:35','2025-06-29 23:21:55'),(22,4,17,2,1,'2025-06-29 23:22:38','2025-06-29 23:22:38'),(23,10,7,1,2,'2025-06-29 23:25:47','2025-06-29 23:25:47'),(24,10,9,1,6,'2025-06-29 23:27:49','2025-06-29 23:40:04'),(25,10,18,1,1,'2025-06-29 23:41:16','2025-06-29 23:41:16'),(26,10,7,2,2,'2025-06-29 23:42:30','2025-06-29 23:42:30'),(27,10,8,2,11,'2025-06-29 23:46:11','2025-06-29 23:46:11');
/*!40000 ALTER TABLE `pgso_numbers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ppe_accounts`
--

DROP TABLE IF EXISTS `ppe_accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ppe_accounts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ppe_code` int DEFAULT NULL,
  `ppe_life` int DEFAULT NULL,
  `ppe_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ppe_accounts`
--

LOCK TABLES `ppe_accounts` WRITE;
/*!40000 ALTER TABLE `ppe_accounts` DISABLE KEYS */;
INSERT INTO `ppe_accounts` VALUES (1,201,NULL,'Land','2025-06-24 22:52:24','2025-06-24 22:52:24'),(2,202,NULL,'Land Improvements','2025-06-24 22:52:35','2025-06-24 22:52:35'),(3,205,NULL,'Electrification, Power & Energy Structures','2025-06-24 22:52:50','2025-06-24 22:52:50'),(4,211,NULL,'Buildings','2025-06-24 22:52:59','2025-06-24 22:52:59'),(5,213,NULL,'Hospital and Health Center','2025-06-24 22:53:07','2025-06-24 22:53:07'),(6,215,NULL,'Other Structures','2025-06-24 22:53:16','2025-06-24 22:53:16'),(7,221,NULL,'Office Equipment','2025-06-24 22:53:22','2025-06-24 22:53:22'),(8,222,NULL,'Furniture and Fixtures','2025-06-24 22:53:30','2025-06-24 22:53:30'),(9,223,NULL,'IT Equipment and Software','2025-06-24 22:53:37','2025-06-24 22:53:37'),(10,226,NULL,'Machineries','2025-06-24 22:53:46','2025-06-24 22:53:46'),(11,227,NULL,'Agriculture and Forestry Equipment','2025-06-24 22:53:57','2025-06-24 22:53:57'),(12,229,NULL,'Communication Equipment','2025-06-24 22:54:08','2025-06-24 22:54:08'),(13,230,NULL,'Construction and Heavy Equipment','2025-06-24 22:54:21','2025-06-24 22:54:21'),(14,231,NULL,'Disaster Response and Rescue Equipment','2025-06-24 22:54:45','2025-06-24 22:54:45'),(15,233,NULL,'Medical Dental and Laboratory Equipment','2025-06-24 22:55:16','2025-06-24 22:55:16'),(16,235,NULL,'Sports Equipment','2025-06-24 22:56:33','2025-06-24 22:56:33'),(17,240,NULL,'Other Machineries and Equipment','2025-06-24 22:56:44','2025-06-24 22:56:44'),(18,241,NULL,'Motor Vehicles','2025-06-24 22:56:50','2025-06-24 22:56:50'),(19,248,NULL,'Other Transportation Equipment','2025-06-24 22:57:23','2025-06-24 22:57:23'),(20,244,NULL,'Watercrafts','2025-06-24 22:57:32','2025-06-24 22:57:32'),(21,250,NULL,'Other Property, Plant and Equipment','2025-06-24 22:57:47','2025-06-24 22:57:47'),(22,254,NULL,'Artesans, Wells, Resevior, Pumping Stations and Conducts','2025-06-24 22:58:07','2025-06-24 22:58:07');
/*!40000 ALTER TABLE `ppe_accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `serviceables`
--

DROP TABLE IF EXISTS `serviceables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `serviceables` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `serv_desc` longtext COLLATE utf8mb4_unicode_ci,
  `serv_prop` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serv_acctg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serv_pgso` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serv_date` date DEFAULT NULL,
  `serv_unit` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serv_qty` int DEFAULT NULL,
  `serv_value` float DEFAULT NULL,
  `serv_remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serv_estab` int DEFAULT NULL,
  `serv_ppe` int DEFAULT NULL,
  `serv_type` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=176 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `serviceables`
--

LOCK TABLES `serviceables` WRITE;
/*!40000 ALTER TABLE `serviceables` DISABLE KEYS */;
INSERT INTO `serviceables` VALUES (1,'AIRCON	\r\nFloor mounted 3TR KOLIN\r\nIndoor (3tons/1 phase)\r\nSpecifications:\r\nCooling Capacity: 37,980kl/h\r\nPower: 4,220w\r\nRated Voltage: 230v/60Hz\r\nWeight: 56kg, Dimension (WxDxH): 540 x 1825 x \r\n410mm  , Outdoor:\r\nWeight: 80kg, Dimension (WxDxH): 895 x 860 x 330mm\r\n(1) 20412    (0)  20170 SN: 10631603-20170','221-01-17','221-008-0004-0004-000007','210-221-2023-0001','2017-05-11','unit',1,71750,'BAC OFFICE',1,7,1,'2025-06-24 23:18:06','2025-06-24 23:18:06'),(2,'Multifunction Copier\r\nINCO 165EN, SN: AD68141001742, Specification:\r\nPrint speed 16ppm, Print resolution 600x600dpi\r\nPrint area max 297x432mm (11368x17 in), Paper weight\r\nstandard 64-157 gsm by pass 64-157 gsm (optional)\r\nPaper size A5, A3-297x432mm (11.69x17 in) copy &\r\nScan 600x600dpi, resolution, copy speed 16cpm, \r\nstandard tray 250 sheets, capacity','221-01-22','221-001-0002-0003-000011','210-221-2023-0002','2022-05-05','unit',1,60000,NULL,1,7,1,'2025-06-24 23:18:06','2025-06-24 23:18:06'),(3,'AIRCONDITIONER	\r\nFloor Mounted 3 Tonner Direct Cooling\r\nSpecifications:\r\nNominal Size 3.0 OTR\r\nR4 10a Refrigerant\r\nCooling capacity 37.980Kj/W Hr\r\nEnergy effeciency ratio 9.2KjW Hr\r\nPower comsumption 3.920W\r\nMechanical Knob Thermostat Control\r\nBrand: CARRIER\r\nSN: (1) 0147826\r\n(O) 0151607','221-01-23','221-008-0004-0003-221-01-23','210-221-2023-0003','2023-03-10','unit',1,168920,NULL,1,7,1,'2025-06-24 23:18:06','2025-06-24 23:18:06'),(4,'AIRCON Ceiling mounted 2 TR - KOLIN\r\nIndoor\r\nSpecifications:\r\nCooling Capacity: 18,990kl/h\r\nPower: 1,870W\r\nRated Voltage: 230V/60Hz\r\nWeight: 13kg, Dimension (WxDxH): 940 x 298 x 200mm\r\nOutdoor:\r\nWeight: 37kg, Dimension (WxDxH): 848 x 540 x 320mm\r\n(1) 14056             (0)  113881',NULL,NULL,'BAC-221-23-01',NULL,'unit',1,41800,NULL,1,7,2,'2025-06-24 23:20:50','2025-06-24 23:20:50'),(5,'AIRCONDITIONER 2 HP High Wall Split-type Carrier\r\nSN: 3408545560198030170167 (1)                221-01-20\r\nSN: 340947728069C100170039  (2)','221-01-20',NULL,'BAC-221-23-02',NULL,'unit',1,47500,NULL,1,7,2,'2025-06-24 23:20:50','2025-06-24 23:20:50'),(6,'Steel cabinet with 4 drawers','210-221-02-14',NULL,'BAC-221-23-03',NULL,'unit',NULL,NULL,NULL,1,7,2,'2025-06-24 23:20:50','2025-06-24 23:20:50'),(7,'Steel cabinet with 4 drawers','221-07-14(3)',NULL,'BAC-221-23-04(3)',NULL,'unit',3,9950,NULL,1,7,2,'2025-06-24 23:20:50','2025-06-24 23:20:50'),(8,'Steel cabinet 4 Drawers','210-221-01-14',NULL,'BAC-221-23-05',NULL,'unit',NULL,NULL,NULL,1,7,2,'2025-06-24 23:20:50','2025-06-24 23:20:50'),(9,'INEO 164 COPIER DEVELOP SN: AOXX121102179',NULL,NULL,'BAC-221-23-06',NULL,'unit',NULL,NULL,NULL,1,7,2,'2025-06-24 23:20:50','2025-06-24 23:20:50'),(10,'INEO 165 COPIER DEVELOP SN: AOXX147006038',NULL,NULL,'BAC-221-23-07',NULL,'unit',NULL,NULL,NULL,1,7,2,'2025-06-24 23:20:50','2025-06-24 23:20:50'),(11,'TUBE LEG/TABLE LEG\r\n-made of steel, chrome coated','222-01-G-17',NULL,'BAC-222-23-01(2)',NULL,'unit',2,2375,NULL,1,8,2,'2025-06-24 23:30:34','2025-06-24 23:30:34'),(12,'Mobile Drawer\r\n-made of steel, 3 drawers w/ lock\r\n-powdercoated finish, with wheels\r\ncolors: Gray','222-01H-17',NULL,'BAC-222-23-02(12)',NULL,'unit',12,4184,NULL,1,8,2,'2025-06-24 23:30:34','2025-06-24 23:30:34'),(13,'Office Table 4 drawers (FABRICATED)','210-222-03-14(2)',NULL,'BAC-222-23-03(2)',NULL,'unit',2,NULL,NULL,1,8,2,'2025-06-24 23:30:34','2025-06-24 23:30:34'),(14,'Office Table 3 Drawers','210-222-08-14',NULL,'BAC-222-23-04',NULL,'unit',1,NULL,NULL,1,8,2,'2025-06-24 23:30:34','2025-06-24 23:30:34'),(15,'SOFA 3s, SOFA 2S','222-12-14',NULL,'BAC-222-23-05',NULL,'unit',1,16000,NULL,1,8,2,'2025-06-24 23:30:34','2025-06-24 23:30:34'),(16,'Long Table (8Seaters)',NULL,NULL,'BAC-222-23-06',NULL,'unit',1,NULL,NULL,1,8,2,'2025-06-24 23:30:34','2025-06-24 23:30:34'),(17,'Office Table 6 Drawers Gray','222-14-14',NULL,'BAC-222-23-07',NULL,'unit',1,14910,NULL,1,8,2,'2025-06-24 23:30:34','2025-06-24 23:30:34'),(18,'Office Chair Black','222-01A-16-1/20',NULL,'BAC-222-23-08',NULL,'unit',1,NULL,NULL,1,8,2,'2025-06-24 23:30:34','2025-06-24 23:30:34'),(19,'Set Coffee table, 2 Chair, 1 Table','49-10 1/2',NULL,'BAC-222-23-09',NULL,'unit',1,14000,NULL,1,8,2,'2025-06-24 23:30:34','2025-06-24 23:30:34'),(20,'Table 6 seaters',NULL,NULL,'BAC-222-23-10',NULL,'unit',1,NULL,NULL,1,8,2,'2025-06-24 23:30:34','2025-06-24 23:30:34'),(21,'MONOBLOCK CHAIRS\r\nSpecifications:\r\nseat Width 375mm\r\nSeat Depth: 330mm\r\nFront Legs: Distance : 355 mm\r\nSide Legs: Distance Left 378mm\r\nSide Legs: Distance Right 378mm\r\nBack Legs: Distance: 210 mm\r\nBack Rest: Height: 779mm\r\nSeat Back: Height: 405mm\r\nSeat Height: 376 mm\r\nGross Weight: 2.25 kgs','01-24',NULL,'BAC-222-23-11(10)',NULL,'unit',10,599.85,NULL,1,8,2,'2025-06-24 23:30:34','2025-06-24 23:30:34'),(22,'OFFICE TABLE W/ 6 DRAWERS W-68M, L140M H-76M',NULL,NULL,'BAC-222-23-12',NULL,'unit',1,6870,NULL,1,8,2,'2025-06-24 23:30:34','2025-06-24 23:30:34'),(23,'COMPUTER SET Intel core i3-7100; \r\nGigabyte GA-H110M-DS2\r\nDDR4 Socket LGA 1151 Motherboard; Memory\r\nKingstone 4GB DDR4; Seagate HDD internal\r\n500gb Sata 3.5; LG 18.5 in LED Monitor aoc SN: ARZIB1A007091\r\n650W PS Sata; A4tech keyboard and mouse combo\r\nPS2; AVR Secure 500w; mousepad','223-01-181/3',NULL,'BAC-223-23-01',NULL,'unit',1,28995,NULL,1,9,2,'2025-06-24 23:36:21','2025-06-24 23:36:21'),(24,'CPU W/ PRINTER Brand/\r\nModel SN: A1625G4377\r\nSpecification:\r\nIntel Core i5 Processor\r\nGigabyte Motherboard\r\n4 GB Memory DDR3\r\nOptical Drive\r\n1 TB Hard\r\nATX Casing\r\nA4 Tech Keyboard\r\nA4 Tech Mouse\r\nMonitor -HP Sn: CM0736SDKW\r\nPRINTER EPSON L120\r\nSN: TP3k281315\r\nUPS-APC',NULL,NULL,'BAC-223-23-02',NULL,'unit',1,30492,NULL,1,9,2,'2025-06-24 23:36:21','2025-06-24 23:36:21'),(25,'Computer Set Intel core i3-7100; \r\nGigabyte GA-H110M-DS2\r\nDDR4 Socket LGA 1151 Motherboard; Memory\r\n500gb Sata 3.5; LG 18.5 in LED\r\nSN: 711NTUW7C638     \'223-01-18 2/3\r\nmonitor-civo case SN: 711NTUW7C638\r\nPS2; AVR Secure 500w; Mousepad; with printer',NULL,NULL,'BAC-223-23-03',NULL,'unit',1,27500,NULL,1,9,2,'2025-06-24 23:36:21','2025-06-24 23:36:21'),(26,'L360 Epson\r\nSN: VGFK069625',NULL,NULL,'BAC-223-23-04',NULL,'unit',1,NULL,NULL,1,9,2,'2025-06-24 23:36:21','2025-06-24 23:36:21'),(27,'Computer Set Intel core i3-7100; \r\nGigabyte GA-H110M\r\nDS2 DDR4 Socket LGA 1151 Motherboard; Memory\r\n500gb Sata 3.5; LG 18.5 in LED Monitor; civo case\r\nSN: 711NTQD7C652         \'223-01-18 3/3\r\nPS2; AVR Secure 500w; Mousepad; with printer',NULL,NULL,'BAC-223-23-05',NULL,'unit',1,22300,NULL,1,9,2,'2025-06-24 23:36:21','2025-06-24 23:36:21'),(28,'CPU Specifications:\r\nAMD A6-7400k 3.9GHJz Max Turbo 1mb \r\ncache with Radeon R5 Graphics Processor Orovision\r\nFM2/FM2 + MotherBoard 4GB 1600MHz DDR3 \r\nRAM 500GB Hardisk Seagate ATX Casing with \r\n750W PSU 1 Year Warranty on call parts\r\nPRINTER L120 SN: PP3K573337\r\nCOMPUTER LG SN: 711NPDV7C610, CPU\r\n SAMSUNG, AVR -  F96SECURE',NULL,NULL,'BAC-223-23-06',NULL,'unit',1,19450,NULL,1,9,2,'2025-06-24 23:36:21','2025-06-24 23:36:21'),(29,'Monitor Samsung \r\nSN: pe17hmbq500611h, CPU-FORTRESS\r\nUPS-SECURE, PRINTER L3150 EPSON\r\nX93K039633\r\nMonitor Samsung\r\nMB S-1200 Gigabyte H410M H V3 memory 8Gb\r\nCasing EK-03B with 700w SSD M.2 RAMSTA\r\nR900 NVME 128GB',NULL,NULL,'BAC-223-23-07',NULL,'unit',1,49200,NULL,1,9,2,'2025-06-24 23:36:21','2025-06-24 23:36:21'),(30,'Monitor Samsung Set \r\nSN: PA17HMBQ500055Y',NULL,NULL,'BAC-223-23-08',NULL,'unit',1,42950,NULL,1,9,2,'2025-06-24 23:36:21','2025-06-24 23:36:21'),(31,'CPU-POWERLOGIC \r\nprinter L120  SN: TP3K004368, avr-protect',NULL,NULL,'BAC-223-23-09',NULL,'unit',1,16026,NULL,1,9,2,'2025-06-24 23:36:21','2025-06-24 23:36:21'),(32,'Monitor Philips \r\nSN: QKOA1313029866\r\nPrinterL120 SN: TP3K527626, CPU-CYS\r\nUPS-APC, 1 OFFICE CHAIR BLACK',NULL,NULL,'BAC-223-23-10',NULL,'unit',1,NULL,NULL,1,9,2,'2025-06-24 23:36:21','2025-06-24 23:36:21'),(33,'CPU Intel i5 10th Gen \r\nMB S-1200 Gigabyte H410M H V3 memory 8Gb \r\nCasing EK-03B with 700w SSD M.2 RAMSTA \r\nR900 NVME 128GB',NULL,NULL,'BAC-223-23-11',NULL,'unit',1,31997,NULL,1,9,2,'2025-06-24 23:39:43','2025-06-24 23:39:43'),(34,'Printer Brand Epson\r\nL-360, SN: VGFK352745',NULL,NULL,'BAC-223-23-12',NULL,'unit',1,7595,NULL,1,9,2,'2025-06-24 23:39:43','2025-06-24 23:39:43'),(35,'Monitor-AOC\r\nGDLF9HA000515',NULL,NULL,'BAC-223-23-13',NULL,'set',1,6750,NULL,1,9,2,'2025-06-24 23:39:43','2025-06-24 23:39:43'),(36,'PRINTER EPSON\r\nL3110-X5DY195206',NULL,NULL,'BAC-223-23-14',NULL,'unit',1,NULL,NULL,1,9,2,'2025-06-24 23:39:43','2025-06-24 23:39:43'),(37,'CPU-NPLAY, UPS-AVR',NULL,NULL,'BAC-223-23-15',NULL,'unit',1,NULL,NULL,1,9,2,'2025-06-24 23:39:43','2025-06-24 23:39:43'),(38,'PRINTER L120 \r\nSN: TP3K552059\r\nCPU-FORTRESS, UPS',NULL,NULL,'BAC-223-23-16',NULL,'unit',1,4995,NULL,1,9,2,'2025-06-24 23:39:43','2025-06-24 23:39:43'),(39,'UPS 325 watts/650VA\r\nOutput Frequency 50/690Hz +/-1Hz\r\noutput Connections: (2) Universal Receptable',NULL,NULL,'BAC-223-23-17(3)',NULL,'unit',3,3450,NULL,1,9,2,'2025-06-24 23:39:43','2025-06-24 23:39:43'),(40,'240GB Solid State drive (SASD)\r\nSATA 3.0\r\n3D NAND Technology 3D NAND offers the potenial\r\nfor higher capacity, performance and stability,\r\nvibration resistant structure',NULL,NULL,'BAC-223-23-18(2)',NULL,'pc',2,1950,NULL,1,9,2,'2025-06-24 23:39:43','2025-06-24 23:39:43'),(41,'Combo mouse & Keyboard\r\nType: Keyboard and mouse\r\nCategory: A shape Keyboard Ports USB port compatible w/ Desktop and Laptop',NULL,NULL,'BAC-223-23-19(2)',NULL,'pc',2,900,NULL,1,9,2,'2025-06-24 23:39:43','2025-06-24 23:39:43'),(42,'PRINTER L120\r\nSN: TP3K204762',NULL,NULL,'BAC-223-23-20',NULL,'unit',1,NULL,NULL,1,9,2,'2025-06-24 23:39:43','2025-06-24 23:39:43'),(43,'Computer Printer Inkjet- EPSON L121\r\nSN: X9LV094399',NULL,NULL,'BAC-223-23-21',NULL,'unit',1,7990,NULL,1,9,2,'2025-06-24 23:39:43','2025-06-24 23:39:43'),(44,'Monitor 21 5 MX-22 75HZ \r\nview pluz SN: mx-2201900646',NULL,NULL,'BAC-223-23-22',NULL,'unit',1,11995,NULL,1,9,2,'2025-06-24 23:39:43','2025-06-24 23:39:43'),(45,'CPU Intel i5 10Th Gen. CPU\r\nS-1200 Intel 15-10400, MB s-1200 Gigabyte H410M\r\nH V3, memory 8GB Casing EK-03B w/ 700W SSD\r\nM.2 RAMSTA R900 NVME 128Gb AVR secure 3x700w',NULL,NULL,'BAC-223-23-23',NULL,'unit',1,35995,NULL,1,9,2,'2025-06-24 23:39:43','2025-06-24 23:39:43'),(46,'External Hard Drive, 1TB, 2.5\" HDD\r\nUSB 3.0, 1 unit of individual box',NULL,NULL,'BAC-223-23-24(3)',NULL,'unit',3,3639,NULL,1,9,2,'2025-06-24 23:39:43','2025-06-24 23:39:43'),(47,'PROJECTOR 3 LCD Specifications:\r\nEpson EB X36 3600 ANSI Lumens, 3LCD\r\nTechnology Projector with HDMI XGA 5,000 hours\r\n(normal) 10,000 hours 234 x 297 x 82mm with free \r\ntripod SN: WFEK6900136','229-01-17',NULL,'BAC-229-23-01',NULL,'unit',1,34900,NULL,1,12,2,'2025-06-24 23:41:24','2025-06-24 23:41:24'),(48,'Projector Specifications: \r\nProjections Technology: RGB liquid crystal shutter\r\nprojection system\r\nConnectivity:\r\nUSB Interface: USB Type A; 1 (for USB memorY\r\nUSB Document\r\nCamera, for wireless LAN Unit, Firmware Update)\r\nUSB Type B: 1\r\nWhite Light Output (Normal/Eco): at least 3,000lm/\r\n2,000lm\r\nColour Light Output: at least 3,000lm\r\nSN: X4HL0101084','229-01-20',NULL,'BAC-229-23-02',NULL,'unit',1,25450,NULL,1,12,2,'2025-06-24 23:41:24','2025-06-24 23:41:24'),(49,'A/C Wall Mounted Split Type 1 PH Cooling Capacity 9,000kj/ht\r\nPower consumption 660watts\r\nPowerEffeciency Ratio 13.6kj/W-hr\r\nRecommended Cooling Area 12-17 sqm.\r\nUnit Dimension (w xHxD) 715 x 204x 270mm\r\nUnit Weight 7.5kg\r\n1 HP A/C non inverter outdoor spec\r\nCARRIER LP- 53CAF009\r\nSN: (1) 170195\r\n        (0) 170068',NULL,NULL,'MIS-221-23-01',NULL,'unit',1,39900,NULL,2,7,2,'2025-06-24 23:42:00','2025-06-24 23:42:00'),(50,'Fire Extinguisher 10lbs',NULL,NULL,'MIS-221-23-02',NULL,'unit',1,NULL,NULL,2,7,2,'2025-06-24 23:42:00','2025-06-24 23:42:00'),(51,'Mesh Chair','140-222-01-17',NULL,'MIS-222-23-01(6)',NULL,'unit',6,2300,NULL,2,8,2,'2025-06-24 23:42:23','2025-06-24 23:42:23'),(52,'Gigabit Switch + mini BIC View Linkeys \r\nSN: RDO62000009 (Server Room) SN: RIE  1060583 (PPDO/2)','140-223-02-14',NULL,'MIS-223-23-01',NULL,'unit',1,35805,NULL,2,9,2,'2025-06-24 23:45:56','2025-06-24 23:45:56'),(53,'Laptop Processor: AMD A9 9400 2.4 GHZ Dual Core \r\n8GB DDRA SDRAM Hard Drive itb 2.5\"5400rpm Black Texture',NULL,NULL,'MIS-223-23-02',NULL,'unit',1,32490,NULL,2,9,2,'2025-06-24 23:45:56','2025-06-24 23:45:56'),(54,'PC Desktop Processor 17.4th gen. \r\nSN: M72716600777',NULL,NULL,'MIS-223-23-03(4)',NULL,'unit',4,36790,NULL,2,9,2,'2025-06-24 23:45:56','2025-06-24 23:45:56'),(55,'AVR Secure 500 watts',NULL,NULL,'MIS-223-23-04',NULL,'unit',1,NULL,NULL,2,9,2,'2025-06-24 23:45:56','2025-06-24 23:45:56'),(56,'24\" LED Monitor sasung SN: ZZNH42H700779\r\nSN: ZZNNH42HH900452, ZZNNH42H900079, SN: ZZNNH42H900362','140-223-01C-14',NULL,'MIS-223-23-05(4)',NULL,'unit',4,8800,NULL,2,9,2,'2025-06-24 23:45:56','2025-06-24 23:45:56'),(57,'Arm chair w/ Foam','140-223-2-01-14',NULL,'MIS-223-23-06(4)',NULL,'unit',4,5000,NULL,2,9,2,'2025-06-24 23:45:56','2025-06-24 23:45:56'),(58,'KVM Switch 4 ports EDIMAX','140-223-11-14',NULL,'MIS-223-23-07',NULL,'unit',1,5000,NULL,2,9,2,'2025-06-24 23:45:56','2025-06-24 23:45:56'),(59,'Load Balance Broadband Routin','140-223-12-14',NULL,'MIS-223-23-08',NULL,'pc',1,14900,NULL,2,9,2,'2025-06-24 23:45:56','2025-06-24 23:45:56'),(60,'Printer Epson Scanner SN: SMXK103641','140-223-14-14',NULL,'MIS-223-23-09',NULL,'unit',1,11000,NULL,2,9,2,'2025-06-24 23:45:56','2025-06-24 23:45:56'),(61,'Centralized Lock Computer Table w/ CPU Stand','140-223-04-17',NULL,'MIS-223-23-10(8)',NULL,'unit',8,4695,NULL,2,9,2,'2025-06-24 23:45:56','2025-06-24 23:45:56'),(62,'Network Attached Storage - NAS, w/ Peer to peer\r\ndownload engine, RAID 1 Technology',NULL,NULL,'MIS-223-23-11',NULL,'pc',1,5995,NULL,2,9,2,'2025-06-24 23:45:56','2025-06-24 23:45:56'),(63,'EPSON L365 Multifunction Inkjet Printer, \r\nprinter resolution: 5,760x\r\n1, 444DPI, PRINT SPEED COLOUR: 15PPM\r\nScanner Type: Flatbed\r\n5,760x1,440 dpi photo-quality prints\r\nSN: VGFK338330',NULL,NULL,'MIS-223-23-12',NULL,'pc',1,7595,NULL,2,9,2,'2025-06-24 23:45:56','2025-06-24 23:45:56'),(64,'Computer Desktop HP SN: 3CQ42327VD',NULL,NULL,'MIS-223-23-13',NULL,'unit',1,NULL,NULL,2,9,2,'2025-06-24 23:45:56','2025-06-24 23:45:56'),(65,'Aircon\r\nInverter (floor Mounted)\r\nCARRIER (0) 03TE652DN\r\n5019-0328835\r\nSN: (1) 42BFMCAR','150-221-01-20','221-008-0004-0003-000019','150-221-2023-0001','2020-06-07','unit',1,109250,'OFFICE/ADMIN',3,7,1,'2025-06-29 21:54:00','2025-06-29 21:54:00'),(66,'PHOTO COPIER\r\nCANON I193200 SN:(21)WDW01840','221-02-20','221-001-0002-0002-000007','150-221-2023-0002','2020-11-13','unit',1,82800,'OFFICE',3,7,1,'2025-06-29 21:54:00','2025-06-29 21:54:00'),(67,'AIRCONDITIONER\r\nAIRCONDITIONER 1.5HP SPLIT TYPE\r\nSN: 340947728059C070170120\r\nBRAND:CARRIER','221-02-20','221-008-0002-0004-221-02-21','150-221-2023-0003(2)','2021-07-22','unit',2,74980,'150-221-02-21',3,7,1,'2025-06-29 21:54:00','2025-06-29 21:54:00'),(68,'Photocopying Machine\r\nSystem Speed 20ppm System Memory 256MB Print\r\nresolution 600 x 600 dpi San Resolution 600x600 dpi Warm-up Time 15 Sec\r\nor less Printable Paper 4 Size A3 Printable Paper weight 64-157 gsm Paper\r\nInput Capacity 350 Sheets Machine Dimension 607x570x458mm toner\r\nTN118 Drum DR114 Developer DV116\r\nBrand: (Kyocera) Kyocera taskalfa 2020/2320/2321\r\nSN: H552020674','221-01-24',NULL,'150-221-2024-0004','2024-12-19','unit',1,99900,NULL,3,7,1,'2025-06-29 21:54:00','2025-06-29 21:54:00'),(69,'Computer Laptop\r\nPredator \r\nSN; NHQJ1SP00123813DE83400','223-01-02','223-001-0001-0001-223-01-02','150-223-2023-0001','2023-12-29','unit',1,247725,NULL,3,9,1,'2025-06-29 22:35:33','2025-06-29 22:35:33'),(70,'Laptop\r\nS34014IWQL 81N700CLPH, Pantinum, Grey\r\n14 Inch display, up to FHD (1920 x 1080) resolution\r\nIntel Core i7-8565U Processor 1.8Ghz 8M, Cache, up to\r\n4.60 Ghz, 8GB DDR4 Memory, 1TB HDD, 128GB M.2\r\nSSD Windows 10 Home, No Optical Drive\r\nSN: MP1L52E8','223-04-20','223-001-0001-0002-000206','150-223-2023-0002','2020-12-14','unit',1,82150,NULL,3,9,1,'2025-06-29 22:35:33','2025-06-29 22:35:33'),(71,'Computer Set\r\nProcessor: R7 5700G\r\nMotherboard: B550m series\r\nRAM: 16GB variation 16GB (2x8GB)\r\nGPU: 8GB graphics card\r\nSSD: 500GB NVME m.2\"\r\nHDD: 1TB SATA 2.5\"\r\nPower Supply\r\n120mm Exhaust fans\r\nCPU: Case\r\nMonitor LED IPS\r\nKeyboard & Mouse','223-01-24',NULL,'150-223-2024-0003','2024-12-19','set',1,109500,NULL,3,9,1,'2025-06-29 22:35:33','2025-06-29 22:35:33'),(72,'PrinterPrinter Type: all in One Printer\r\nDouble Sided printing: Yes\r\nPrint Method: Inkjet\r\nPrinter Features: auto Duplex Printing, Integrated Ink Tank System\r\nPorts/Interface: Ethernet LAN, USB 2.0\r\nPrint Colour: Colour\r\nPrinter Connectivity type: USB, Wi-Fi\r\nNumber of Ink cartridges: 4\r\nAutomatic Document Feeder: Yes\r\nPrinter Function Type: Print, Copy, Scan\r\nDimension (LxWxH): 498x358x245mm\r\nWeight: 10kg','223-01A-24',NULL,'150-223-2024-0004','2024-12-19','pc',1,52700,NULL,3,9,1,'2025-06-29 22:35:33','2025-06-29 22:35:33'),(73,'CAMERA\r\nDSLR Camera (KIT)\r\n. 26.2MP FULL FRAME CMOS SENSOR\r\n.DUAL PIXEL CMOS AF\r\n.45-POINT ALL CROSS-TYPE AF; UP\r\nTO 6.5FPS CONTINOUS SHOOTING\r\n.ISO 100-40000 (EXPANDABLE TO 102400\r\n.GPS, WIFI, NFC AND BLUETOOTH\r\nLOW ENERGY','229-02-20',NULL,'150-229-2023-0001','2020-12-29','set',1,151980,'VICE GOV',3,12,1,'2025-06-29 22:37:24','2025-06-29 22:37:24'),(74,'Transportation VehicleColor:2JZ White Pearl  (46-14)\r\nModel: KDH212L-JDPNY\r\nEngine: 2KDA 553685\r\nFrame JTFRS13P600034676\r\nEngine: Toyota HI Ace GL Grandia\r\nModel: 2KD-FTV / 2.5 L DSL AT 2T-ON','150-241-02-14','241-001-0001-0001-000003','150-241-2023-0001','2014-08-30','unit',1,2145000,NULL,3,18,1,'2025-06-29 22:38:21','2025-06-29 22:38:21'),(75,'Fingerprint Time\r\nand Attendance Recorder (Biometrics) Including Installation','150-221-04-16',NULL,'OVG-221-23-01(2)',NULL,'unit',2,12000,NULL,3,7,2,'2025-06-29 22:39:22','2025-06-29 22:39:22'),(76,'SWIVEL CHAIR BLACK LEATHER','01C-22',NULL,'OVG-221-23-02',NULL,'unit',1,28400,NULL,3,7,2,'2025-06-29 22:40:18','2025-06-29 22:40:18'),(77,'Chandeliers SB/SDL glass type-2 Layers','150-222-16-14',NULL,'OVG-222-23-01',NULL,'set',1,25500,NULL,3,8,2,'2025-06-29 22:43:19','2025-06-29 22:43:19'),(78,'Conference Table Laminated','150-222-01-15',NULL,'OVG-222-23-02',NULL,'unit',1,28000,NULL,3,8,2,'2025-06-29 22:43:19','2025-06-29 22:43:19'),(79,'Lounge SOFA Dimension (WxDxH) 280cm x 156x79cm\r\ncolour: Maroon loading weight: 150kgs metal legs with chrome finish, pine wood frame	\r\nhigh density foam upholstery, faux leather upholstered corner sofa','150-222-01-19',NULL,'OVG-222-23-03',NULL,'unit',1,28850,NULL,3,8,2,'2025-06-29 22:43:19','2025-06-29 22:43:19'),(80,'Swivel Chair ( ( Black Leather)','222-01-21',NULL,'OVG-222-23-04',NULL,'unit',1,28450,NULL,3,8,2,'2025-06-29 22:43:19','2025-06-29 22:43:19'),(81,'Office Table  w/ 7 drawers Narra 25 1/2 x 35 1/2 w/ Lock','150-222-03-14',NULL,'OVG-222-23-05',NULL,'unit',1,1300,NULL,3,8,2,'2025-06-29 22:43:19','2025-06-29 22:43:19'),(82,'Visitor Chair Black Upholstered','150-222-09-14',NULL,'OVG-222-23-06(3)',NULL,'unit',3,2500,NULL,3,8,2,'2025-06-29 22:43:19','2025-06-29 22:43:19'),(83,'Center Table Happy House','150-222-12-14',NULL,'OVG-222-23-07',NULL,'unit',1,5500,NULL,3,8,2,'2025-06-29 22:43:19','2025-06-29 22:43:19'),(84,'Office Visitor Chair','02-19',NULL,'OVG-222-23-08(12)',NULL,'unit',12,1920,NULL,3,8,2,'2025-06-29 22:43:19','2025-06-29 22:43:19'),(85,'Conference Chair','02C-19',NULL,'OVG-222-23-09(12)',NULL,'unit',12,4910,NULL,3,8,2,'2025-06-29 22:43:19','2025-06-29 22:43:19'),(86,'Executive Chair','02D-19',NULL,'OVG-222-23-10',NULL,'unit',1,8900,NULL,3,8,2,'2025-06-29 22:43:19','2025-06-29 22:43:19'),(87,'COMPUTER DESKTOP Corei5 Desktop Package\r\nIntel 9th Generation intel Process\r\nBRAND: CPU BRAND EXTREME POWER\r\nMONITOR MODEL: EB192Q-ACER\r\nSN: 1) MNT6MSS003946006493E00\r\n 2)MMT6MSS003966006753000\r\n 3)MMT6MSS003966006403000','150-223-01-20(',NULL,'OVG-223-23-01(3)',NULL,'unit',3,39995,NULL,3,9,2,'2025-06-29 22:45:39','2025-06-29 22:45:39'),(88,'PRINTER (Print,copy,scan,rear input) 3in1 SN: 943001944314','223-03A-20',NULL,'OVG-223-23-02(2)',NULL,'unit',2,11950,NULL,3,9,2,'2025-06-29 22:45:39','2025-06-29 22:45:39'),(89,'COMPUTER PRINTER (L121 Series)','02-22',NULL,'OVG-223-23-03(2)',NULL,'pc',2,7972,NULL,3,9,2,'2025-06-29 22:45:39','2025-06-29 22:45:39'),(90,'COMPUTER MONITOR (27\" FLAT) -N-VISION\r\nSN: M2010CEO2S21040950',NULL,NULL,'OVG-223-23-04',NULL,'pc',1,16118,NULL,3,9,2,'2025-06-29 22:45:39','2025-06-29 22:45:39'),(91,'MICROPHONE  FROM FACTOR SRTAND/BOOM MOUNT\r\nSOUND FIELD MONO OPERATING PRINCIPLE LINE GRADIENT			\r\nCAPSULE ELECTYRET CONDENNSER DIAPHRAGM 0.5\"/1212.70mm			\r\nPOLAR PATTERN SUPERCARDIOID ORIENTAL END ADDREE			\r\nCIRCUITRY SOILD-STATE (JFET) PAD NONE HIGH-PASS FILTER 80.HZ			\r\nTONE ADJUSTMENT-10DB TO +20 DB INDICATORS 1X SINGLE LED POWERP			\r\nGAIN HIGH-PASS FILTER ON BOARD CONTROLS ON/OFF WUNDSCREEN			\r\n FOAM (INCLUDED)','229-02A-20',NULL,'OVG-229-23-01',NULL,'pc',1,20500,NULL,3,12,2,'2025-06-29 22:46:37','2025-06-29 22:46:37'),(92,'AIRCONDITIONER\r\n2.0 HP Wall Mounted Split Type\r\nBrand: CARRIER, Model No: FP-42CSHO18308\r\nSN: D202006120316707170001\r\n      D201457220616423170001','170-221-01-16','221-008-0002-0004-000001','170-221-2023-0001','2016-10-11','unit',1,64500,'SIR ERNIE',4,7,1,'2025-06-29 22:50:52','2025-08-25 21:29:25'),(93,'AIRCON\r\nAIRCONDITIONER 2.5 HP Split-Type\r\nCARRIER (NON INVERTER)\r\nSN:340478428087BI80170098\r\nINDOOR:170008\r\nOUTDOOR: 170212','221-01-20','221-008-0002-0007-000003','170-221-2023-0002','2020-02-19','unit',1,79000,'BOOKKEEPING',4,7,1,'2025-06-29 22:50:52','2025-08-25 21:29:25'),(94,'AIRCONDITIONER\r\nFLOOR MOU8NTED, CARRIER 3.0 OTR\r\nIndoor SN: 42BFMFSUCAR03TEAJ15PC-0485350','170-221-02-15','221-008-0004-0003-000008','170-221-2023-0003',NULL,'unit',1,97600,'REMITTANCE',4,7,1,'2025-06-29 22:54:38','2025-08-25 21:29:25'),(95,'AIR CONDITIONER\r\n3.0 TONS HP FLOOR MOUNTED SPLIT TYPE CARRIER		\r\nCOOLING CAPACITY: 37,980KJ/W-HR		\r\nPOWER SUPPLY 230V1PH/60HZ		\r\nREFRIGERANT: R410a		\r\nMODEL CODES: 42CFM04H/38ASCO4H-A		\r\nINDOOR:2922-0169319		\r\nOUTDOOR: 2922-0168949		\r\nSET:53CFM-ASC\r\nPERFORMANCE DATA: \r\nPOWER INPUT:4,180WATTS\r\nENERGY EFFICIENCY RATIO (EER):9.1 KJ/W-HR\r\nSOUND LEVEL @ LOW:54 DBA: 37,980KJ/HR','221-01-22','221-008-0004-0003-000021','170-221-2023-0004','2022-07-09','unit',1,113880,NULL,4,7,1,'2025-06-29 22:54:38','2025-08-25 21:29:25'),(96,'Laptop\r\nComputer 13\" 2.0 GHZ Intel Core\r\nSN: W8752403Z62    20-08','170-223-01-14','223-001-0001-0002-000011','170-223-2023-0001','2007-12-28','unit',1,68650,'SIR ERNIE',4,9,1,'2025-06-29 22:59:13','2025-06-29 22:59:13'),(97,'Server \r\nHP Prolioan ML350e Gen 8 E5-2407 IP4GB -U','170-223-03-14','223-001-0001-0001-000281','170-223-2023-0002','2014-05-21','set',1,240000,'SIR ERNIE',4,9,1,'2025-06-29 22:59:13','2025-06-29 22:59:13'),(98,'CPU Server\r\nServer Grade Processor (Engas 2006 Compatible)\r\nGA H81M S2PV LGA 1150 Micro ATX Motherboard\r\nSingle tower CPU Air cooler \r\n8gb (x2) Ddr3-1600 DIMM with heat spreader Memory SSD 240GB 2.5 SATA\r\n500GB SATA 6Bb/s Internal Hard Drive\r\n03 Mid Tower MicroATX Case,GS550-Ultra 80 Plus Bronze ATX, Power Supply\r\n1500VA Automatic Voltage Regulator Servo-Motor Control UPS 1200VA,230,AVR universal Sockets','223-01-23','223-002-0002-9999-000183','170-223-2023-0003','2023-10-25','set',1,72978,NULL,4,9,1,'2025-06-29 22:59:13','2025-06-29 22:59:13'),(99,'STEEL CABINET FILING W/ DRAWERS, WRINKLESS','170-221-03-14',NULL,'PACCO-221-23-01(4)',NULL,'unit',4,NULL,NULL,4,7,2,'2025-06-29 23:00:38','2025-06-29 23:00:38'),(100,'Marion High Back Office Chair','080-221-01-19',NULL,'PACCO-221-23-02',NULL,'unit',1,9360,NULL,4,7,2,'2025-06-29 23:00:38','2025-06-29 23:00:38'),(101,'Steel filing cabinet 4 DRAWERS','170-221-01-15',NULL,'PACCO-221-23-03',NULL,'unit',1,15000,NULL,4,7,2,'2025-06-29 23:00:38','2025-06-29 23:00:38'),(102,'SOFA UPHOLSTERED BEIGE  11-04B','170-22-02-14',NULL,'PACCO-222-23-01',NULL,'unit',1,7500,NULL,4,8,2,'2025-06-29 23:08:01','2025-06-29 23:08:01'),(103,'CABINET W/ 3 DOORS W/ DRAWERS 17X48   PAO(32-04)','01-14',NULL,'PACCO-222-23-02',NULL,'unit',1,NULL,NULL,4,8,2,'2025-06-29 23:08:02','2025-06-29 23:08:02'),(104,'OFFICE TABLE W/ 3 DRAWERS AND ONE DORR W/ FULL TAN',NULL,NULL,'PACCO-222-23-03',NULL,'unit',1,NULL,NULL,4,8,2,'2025-06-29 23:08:02','2025-06-29 23:08:02'),(105,'EXECUTIVE CHAIR',NULL,NULL,'PACCO-222-23-04(3)',NULL,'unit',3,NULL,NULL,4,8,2,'2025-06-29 23:08:02','2025-06-29 23:08:02'),(106,'OFFICE TABLE W/ 7 DRAWERS',NULL,NULL,'PACCO-222-23-05',NULL,'unit',1,NULL,NULL,4,8,2,'2025-06-29 23:08:02','2025-06-29 23:08:02'),(107,'COMPUTER TABLE STEEL  12-01','170-222-05-14',NULL,'PACCO-222-23-06(3)',NULL,'unit',3,4800,NULL,4,8,2,'2025-06-29 23:08:02','2025-06-29 23:08:02'),(108,'HANGING CABINET W/ 12 DOUBLE DOORS 96X17',NULL,NULL,'PACCO-222-23-07',NULL,'unit',1,NULL,NULL,4,8,2,'2025-06-29 23:08:02','2025-06-29 23:08:02'),(109,'OFFICE TABLE W/ 7 DRAWERS W/ GLASSPAD','170-222-01-14',NULL,'PACCO-222-23-08',NULL,'unit',1,NULL,NULL,4,8,2,'2025-06-29 23:08:02','2025-06-29 23:08:02'),(110,'OFFICE TABLE NARRA W/ 7 DRAWERS 59 1/2X36 1/2  PAO(50-04) GLASS PAD','170-222-07-14',NULL,'PACCO-222-23-09',NULL,'unit',1,NULL,NULL,4,8,2,'2025-06-29 23:08:02','2025-06-29 23:08:02'),(111,'PLANTERS CABINET W/ DOUBLE DOORS      PAO(62-04)','170-222-09-14',NULL,'PACCO-222-23-10',NULL,'unit',1,NULL,NULL,4,8,2,'2025-06-29 23:08:02','2025-06-29 23:08:02'),(112,'DIVIDER LONG WOODEN W/ DRAWERS        PAO (63-04)','170-222-10-14',NULL,'PACCO-222-23-11',NULL,'unit',1,NULL,NULL,4,8,2,'2025-06-29 23:08:02','2025-06-29 23:08:02'),(113,'Office Table','170-222-04-14',NULL,'PACCO-222-23-12(2)',NULL,'unit',2,5450,NULL,4,8,2,'2025-06-29 23:08:02','2025-06-29 23:08:02'),(114,'Office Table','170-222-12-14',NULL,'PACCO-222-23-13(23)',NULL,'unit',23,4500,NULL,4,8,2,'2025-06-29 23:08:02','2025-06-29 23:08:02'),(115,'Steel filing cabinet','170-222-14-14',NULL,'PACCO-222-23-14',NULL,'unit',1,6500,NULL,4,8,2,'2025-06-29 23:08:02','2025-06-29 23:08:02'),(116,'Fire Extinguisher 10lbs',NULL,NULL,'PACCO-222-23-15',NULL,'unit',1,NULL,NULL,4,8,2,'2025-06-29 23:08:02','2025-06-29 23:08:02'),(117,'Office Table with drawers','080-222-69-14',NULL,'PACCO-222-23-16',NULL,'unit',1,NULL,NULL,4,8,2,'2025-06-29 23:08:02','2025-06-29 23:08:02'),(118,'COMPUTER PRINTER \r\n( CONTINOUS INK) MODEL-L120 BRAND- EPSON SN: TP3K388486 PN:','223-01B-17',NULL,'PACCO-223-23-01',NULL,'unit',1,NULL,NULL,4,9,2,'2025-06-29 23:13:35','2025-06-29 23:13:35'),(119,'19*\" MONITOR LED SAMSUMG\r\nSN-ZU44H9LBA06447K','170-223-21-14',NULL,'PACCO-223-23-02',NULL,'unit',1,4750,NULL,4,9,2,'2025-06-29 23:13:35','2025-06-29 23:13:35'),(120,'MONITOR LG 15.6, \r\n310JNBSJF453','170-223-26-14',NULL,'PACCO-223-23-03',NULL,'unit',1,5200,NULL,4,9,2,'2025-06-29 23:13:35','2025-06-29 23:13:35'),(121,'MONITOR 16 LG,\r\nSN-4051NCN4T491','170-223-44-14',NULL,'PACCO-223-23-04',NULL,'unit',1,6500,NULL,4,9,2,'2025-06-29 23:13:35','2025-06-29 23:13:35'),(122,'HARD DISK 1 TB PORTABLE','223-45-14',NULL,'PACCO-223-23-05',NULL,'unit',1,7000,NULL,4,9,2,'2025-06-29 23:13:35','2025-06-29 23:13:35'),(123,'Printer EPSON L120\r\nSN: TP3485099, TP3K271588','170-223-01-15',NULL,'PACCO-223-23-06(2)',NULL,'unit',2,7050,NULL,4,9,2,'2025-06-29 23:13:35','2025-06-29 23:13:35'),(124,'Printer EPSON L120 \r\nSN: TP3K338118, TP3K67174','170-223-06-16',NULL,'PACCO-223-23-07(2)',NULL,'unit',2,5200,NULL,4,9,2,'2025-06-29 23:13:35','2025-06-29 23:13:35'),(125,'CPU TRENDSONIC',NULL,NULL,'PACCO-223-23-08',NULL,'unit',1,NULL,NULL,4,9,2,'2025-06-29 23:13:35','2025-06-29 23:13:35'),(126,'LG MONITOR 18.5\r\nSN: 809NTW09V121','080-223-01A-19',NULL,'PACCO-223-23-09',NULL,'unit',1,3700,NULL,4,9,2,'2025-06-29 23:13:35','2025-06-29 23:13:35'),(127,'BENQ LED 18.5 MODEL: GL930-B','240-223-15-14',NULL,'PACCO-223-23-10',NULL,'unit',1,7400,NULL,4,9,2,'2025-06-29 23:13:35','2025-06-29 23:13:35'),(128,'PRINTER CANON\r\nip2770 SN: HRDF35606','240-223-16-14-C',NULL,'PACCO-223-23-11',NULL,'unit',1,3985,NULL,4,9,2,'2025-06-29 23:13:35','2025-06-29 23:13:35'),(129,'PRINTER EPSON L120 \r\nSingle Function Tank SN: TP3KA38313','223-02B-18',NULL,'PACCO-223-23-12',NULL,'unit',1,4995,NULL,4,9,2,'2025-06-29 23:13:35','2025-06-29 23:13:35'),(130,'CPU i3 n4GB Memory, \r\n500GB Hardisk Brand- SN- JN170160041024','223-01D-17',NULL,'PACCO-223-23-13',NULL,'unit',1,14650,NULL,4,9,2,'2025-06-29 23:13:35','2025-06-29 23:13:35'),(131,'Printer Epson L120\r\nSingle Function Ink Tank System TP3K709161,TP3K066571',NULL,NULL,'PACCO-223-23-14(2)',NULL,'unit',2,NULL,NULL,4,9,2,'2025-06-29 23:13:35','2025-06-29 23:13:35'),(132,'1NAS W/ 2 PCS. 1 TB 9 BACK UP STRIPE 1 RAID','170-223-O4A-14',NULL,'PACCO-223-23-15',NULL,'unit',1,31000,NULL,4,9,2,'2025-06-29 23:13:35','2025-06-29 23:13:35'),(133,'W32 EN 3 PK DSP OEI (MLK)  (Software)','170-223-O5-14',NULL,'PACCO-223-23-16(6)',NULL,'unit',6,18750,NULL,4,9,2,'2025-06-29 23:20:36','2025-06-29 23:20:36'),(134,'Desktop Intel Core i5 \r\nIntel 9th Generation Intel processors 5-9400F, GHZ, 9MB Cache,\r\nLGA 1151 MONITOR: VIEWSONIC SN: NEM184221951','223-01-20',NULL,'PACCO-223-23-17',NULL,'unit',1,28000,NULL,4,9,2,'2025-06-29 23:20:36','2025-06-29 23:20:36'),(135,'Computer Processor \r\nintel core I3 ASUS 7H55M-LX BOARD 2 GB DDR3 Memory 500 GB SATA\r\nHDD DVDRW SN: 33700118142','170-223-02-13',NULL,'PACCO-223-23-18',NULL,'set',1,40000,NULL,4,9,2,'2025-06-29 23:20:36','2025-06-29 23:20:36'),(136,'EPSON L3150 4in1 \r\nPrinter, Compact Integrated SN:X93K003515',NULL,NULL,'PACCO-223-23-19',NULL,'unit',1,9295,NULL,4,9,2,'2025-06-29 23:20:36','2025-06-29 23:20:36'),(137,'Laptop Acer Aspire E5-471 SN: NXM8NSP001430160E7600','170-223-40-14',NULL,'PACCO-223-23-20',NULL,'unit',1,40250,NULL,4,9,2,'2025-06-29 23:20:36','2025-06-29 23:20:36'),(138,'Computer I5 17-4460 \r\n3.3 GHZ 6 MBC Computer Motherboard MSI/Gigabyte H81 Series,   Adata Memory 4 GB DD3, Toshiba 500GB Sata Hardisk, DVD Writer Creative Speaker, Trigon Casing with 0600 wattS power\r\n supply, A4tech Keyboard and Mouse, 500 watts AVR','170-223-01-17',NULL,'PACCO-223-23-21',NULL,'unit',1,26500,NULL,4,9,2,'2025-06-29 23:20:36','2025-06-29 23:20:36'),(139,'AOC, 18,5Benq 19.5 LED MONITOR SN-KPPG91A013209','170-223-01A-17',NULL,'PACCO-223-23-22',NULL,'unit',1,NULL,NULL,4,9,2,'2025-06-29 23:20:36','2025-06-29 23:20:36'),(140,'LAPTOP-ASUS INTEL i5-1135G7 SSD:512GB RFAM: DDR4 16GB SN: 1.) M7NXCVI86808298\r\n2.) M7NXCVI86818294','223-01-22',NULL,'PACCO-223-23-23(2)',NULL,'unit',2,46990,NULL,4,9,2,'2025-06-29 23:20:36','2025-06-29 23:20:36'),(141,'Desktop Package, Motherboard, DDR 8GB, 21.5\" Monitor,Keyboard & Mouse, 65VA\r\nUPS FORTRESS,Case w\' 750W Generic PSU, SN:MMAIPSS002215072293W01-ALER ADPEN','02-23',NULL,'PACCO-223-23-24',NULL,'unit',1,19990,NULL,4,9,2,'2025-06-29 23:20:36','2025-06-29 23:20:36'),(142,'Printer 2n1 EPSON L121 SN:X9LV277537','02A-23',NULL,'PACCO-223-23-25',NULL,'unit',1,6990,NULL,4,9,2,'2025-06-29 23:20:36','2025-06-29 23:20:36'),(143,'Duplex Sheetfed Document Scanner, \r\nScanning Speed of up to 35 ppm/701 pm, Automatic Document Feeder(ADF) 0f up to 50 sheets\r\nDaily Duty Cycle of 4,000 pages,One-Pass Duplex Scanning,Paper Protection Function & Image Sensor glass, Dirt Detection','03-23',NULL,'PACCO-223-23-26',NULL,'unit',1,34900,NULL,4,9,2,'2025-06-29 23:20:36','2025-06-29 23:20:36'),(144,'Desktop Package, Motherboard, DDR 8GB, 21.5\" Monitor,Keyboard & Mouse, 65VA\r\nUPS FORTRESS,Case w\' 750W Generic PSU, SN:MMAIPSS002215D7CDF3W01-ALER ADPEN','01-23',NULL,'PACCO-223-23-27',NULL,'unit',1,19990,NULL,4,9,2,'2025-06-29 23:20:36','2025-06-29 23:20:36'),(145,'System unit only,\r\nMotherboard,DDR3 8GB  480gb ssd, Case w/750W Generic PSU, AVR Secure 500 W','01A-23',NULL,'PACCO-223-23-28',NULL,'unit',1,12990,NULL,4,9,2,'2025-06-29 23:20:36','2025-06-29 23:20:36'),(146,'24\" Wide  LED Monitor, \r\n1920x1080 Native Resolution, VGA & HDMI ports','01B-23',NULL,'PACCO-223-23-29',NULL,'unit',1,5190,NULL,4,9,2,'2025-06-29 23:20:36','2025-06-29 23:20:36'),(147,'24\" inches 75Hz IPS Monitor,\r\n1980x1080 FHD, VGA & HDMI','01-23',NULL,'PACCO-223-23-30',NULL,'unit',1,5190,NULL,4,9,2,'2025-06-29 23:20:36','2025-06-29 23:20:36'),(148,'UPS 650VA 230V','01D-23',NULL,'PACCO-223-23-31',NULL,'unit',1,3100,NULL,4,9,2,'2025-06-29 23:21:55','2025-06-29 23:21:55'),(149,'PRINTER 2n1 EPSON L121 SN:X9LV308139','01F-23',NULL,'PACCO-223-23-32',NULL,'unit',1,6990,NULL,4,9,2,'2025-06-29 23:21:55','2025-06-29 23:21:55'),(150,'Printer Model: L121\r\nBrand: EPSON Serial No.: X9LV658391','01-25',NULL,'PACCO-223-23-33',NULL,'unit',1,5495,NULL,4,9,2,'2025-06-29 23:21:55','2025-06-29 23:21:55'),(151,'Printer Model: L121\r\nBrand: EPSON Serial No.: X9LV672162',NULL,NULL,'PACCO-223-23-34',NULL,'unit',1,5495,NULL,4,9,2,'2025-06-29 23:21:55','2025-06-29 23:21:55'),(152,'LADDER ALUMINUM 12FT.','170-240-01-14',NULL,'PACCO-240-23-01',NULL,'unit',1,11450,NULL,4,17,2,'2025-06-29 23:22:38','2025-06-29 23:22:38'),(153,'AIRCONDITIONER\r\n5TR Floor Mounted (Koppel ACU) SN: Indoor  		\r\nBK273060/BK373062/BK273065/\r\nOutdoor: AK323117,AK323531,AK323527','300-221-01-17','221-008-0004-0001-000007','300-221-2023-0001(3)','2017-07-06','unit',3,119375,'Z. Herrera',10,7,1,'2025-06-29 23:25:34','2025-06-29 23:25:34'),(155,'PHOTO COPIER\r\nBRAND: DEVELOP,\r\nMACHINE DESCRIPTION: MONOCHROME COPIER WITH\r\nPRINTER COLORED SCANNER FUNCTION: SCAN\r\nPRINT RES: 600X600 dpi TONER TECH: HD POLYMERIZED\r\nSN: ACN3141000274  MODEL: INEO205','221-01-22','221-001-0002-0003-221-01-22','300-221-2023-0002','2022-09-14','unit',1,90000,'Z. Herrera',10,7,1,'2025-06-29 23:25:47','2025-06-29 23:25:47'),(156,'Computer Monitor\r\nINTEL CORE l5, LCD 18\" Comfy View 4GB DDR3,SN.E54F464000622','300-223-01A-16','223-001-0001-0001-000318','300-223-2023-0001','2016-05-23','unit',1,59950,NULL,10,9,1,'2025-06-29 23:27:49','2025-06-29 23:27:49'),(157,'Printer\r\nEpson L1455 with Scanner SN:V2SK009737','300-223-01A-18','223-002-0001-0002-000140','300-223-2023-0002','2018-07-24','unit',1,52942,'Z. Herrera',10,9,1,'2025-06-29 23:27:49','2025-06-29 23:35:06'),(158,'Computer Desktop\r\nSPECIFICATIONS: INTEL CORE i5 GHZ, 12 CACHE UP O 4.3 GHZ\r\nLGA 1200 GIGABYTE GA H410MHV3, KINGSTON 8GB, DDR4 2666 28\r\nPIN KINGMAX, 512 GB SSD 2.5 COMPUTER CASE W/ 550W TRUE\r\nRATED PSU, A4TECH KK3330, KEYBOARD AND MOUSE, INTEX IT\r\n 2202 LED MONITOR 20\" LOGIC BLASER 720VA UPS, MOUSE\r\nPAD PLAIN SN: (21) 4929537202650912  (21) 04929537202650909','223-02-22','223-001-0001-0001-0223-02-22','300-223-2023-0003(2)','2022-12-13','unit',2,61180,'Z. Herrera',10,9,1,'2025-06-29 23:40:03','2025-06-29 23:40:03'),(159,'Laptop-Acer\r\nINTEL CORE l  - 1156G7/15\'6\" FHD, 8GB RAM/512 GB SSD/NO odd, \r\nWindow Home','223-01-22',NULL,'300-223-2023-0004','2022-11-14','unit',1,69800,'Z. Herrera',10,9,1,'2025-06-29 23:40:03','2025-06-29 23:40:03'),(160,'Computer Desktop\r\nMonitor SN:NI905G81A230503259,905G81A230603853\r\n,905G81A230502849,905G8123063953\r\nInter Core i5 Ghz,2Cache upto 4,30Ghz LGA 1200,Gigabyte GA H410NHV3,\r\n8GB DDR4 2666 28 Pin,480GB SSD 2.5\r\nComputer Case w/ 550w true rated PSU,Keyboard & Mouse\r\n,ILED Monitor 20-N-VISION,720 VA UPS,Mousepad Plain','223-02-23','223-001-0001-0001-000473','300-223-2023-0005(4)','2023-08-29','unit',4,61170,NULL,10,9,1,'2025-06-29 23:40:04','2025-06-29 23:40:04'),(161,'Computer Desktop\r\nInter Core i5Hhz, 2 cache up to 4.30HGz 1200,Gigabyte,GA H410MHV3,\r\nKingstone 8GB DDR4 266628 Pin,King\r\nMax,480 GB SSD 2.5,Computer case w/ 550w true,Rated PSU,A4tech Keyboard & Mouse,Intex IT,2202\r\nLED Monitor 20\" Logic Blaster 720 VA UPA,Mouse Plain Pad','223-01-23-23','223-001-0001-0001-00223-01-23(2)','300-223-2023-0006(2)','2023-08-03','unit',2,61170,NULL,10,9,1,'2025-06-29 23:40:04','2025-06-29 23:40:04'),(162,'ISUZU TROOPER WAGON 5 DOOR	\r\nPlate No: CSL-789      15-02A\r\nChassis No. UBS5FW-7104896\r\nMotor No. 4JBI-399601','300-241-01-14','241-001-0002-0001-000004','300-241-2023-0001','2002-12-15','unit',1,380000,'SP Sec./CAMPO  Zoe H. Herrera',10,18,1,'2025-06-29 23:41:16','2025-06-29 23:41:16'),(163,'5 STAGE PURIFIER WITH NEGATIVE IONS- EVEREST\r\nDOUBLE HEPA FILTER, DOUBLE ACTIVATED CARBON\r\nFILTER, DOUBLE PHOTO CATALYST FILTER, UV \r\nLIGHTS STERILIZATION (UV AMAP+AMP HOLDER) \r\nIONIZER, AUTO MODE/SLEEP MODE, TIMER OPTION\r\n1H/2H/4H, GAN SPEED OPTION, LOW/MEDIUM HIGH\r\nLED DISPLAY W/ REMOTE CONTROL, AIR QUALITY','02A-22',NULL,'SP-221-23-01',NULL,'unit',1,28500,NULL,10,7,2,'2025-06-29 23:42:30','2025-06-29 23:42:30'),(164,'Water Dispenser\r\n-rated voltage; rated frg; heating power 500w; cooling power/85 w/ 0.8A; hot/water temp, 90\"\" c\' cold water temp 10\r\nModel: BY602 / Brand Kaiser Water Dispenser','01D-24',NULL,'SP-221-23-02',NULL,'unit',1,8999,NULL,10,7,2,'2025-06-29 23:42:30','2025-06-29 23:42:30'),(165,'Round Table','300-222-02A-18',NULL,'SP-222-23-01',NULL,'pc',1,1450,NULL,10,8,2,'2025-06-29 23:46:11','2025-06-29 23:46:11'),(166,'P120120L PARTITION PANEL','300-222-01-18',NULL,'SP-222-23-02(6)',NULL,'unit',6,11100,NULL,10,8,2,'2025-06-29 23:46:11','2025-06-29 23:46:11'),(167,'P12060L PARTITION PANEL','300-222-01A-18',NULL,'SP-222-23-03(16)',NULL,'unit',16,7300,NULL,10,8,2,'2025-06-29 23:46:11','2025-06-29 23:46:11'),(168,'PC-126A PARTITION TABLE','300-222-01B-18',NULL,'SP-222-23-04(12)',NULL,'unit',12,4400,NULL,10,8,2,'2025-06-29 23:46:11','2025-06-29 23:46:11'),(169,'L-101 3D Mobile Drawer',NULL,NULL,'SP-222-23-05(12)',NULL,'unit',12,4450,NULL,10,8,2,'2025-06-29 23:46:11','2025-06-29 23:46:11'),(170,'GANG CHAIR FOUR SEATER','300-222-02-18',NULL,'SP-222-23-06',NULL,'unit',1,17300,NULL,10,8,2,'2025-06-29 23:46:11','2025-06-29 23:46:11'),(171,'Chair-Computer Table Chair','01B-23',NULL,'SP-222-23-07',NULL,'unit',1,6995,NULL,10,8,2,'2025-06-29 23:46:11','2025-06-29 23:46:11'),(172,'Executive chair-High back \r\nLeatherette chair w/ footrest','01C-23',NULL,'SP-222-23-08',NULL,'unit',1,12515,NULL,10,8,2,'2025-06-29 23:46:11','2025-06-29 23:46:11'),(173,'Executive Office Mesh Chair\r\n(Mesh Highback Chair) with armrest,gas-lift & headrest Chrome Base',NULL,NULL,'SP-222-23-09(18)',NULL,'unit',18,15549,NULL,10,8,2,'2025-06-29 23:46:11','2025-06-29 23:46:11'),(174,'W3 Woodlock 202 Mush 45.25x46 @ 40/sq.ft.','05-23(2)',NULL,'SP-222-23-10','2023-11-10','unit',2,15990,NULL,10,8,2,'2025-06-29 23:46:11','2025-06-29 23:49:09'),(175,'Computer Table','04B-24',NULL,'SP-222-24-11','2024-11-25','unit',1,6990,NULL,10,8,2,'2025-06-29 23:46:11','2025-06-29 23:46:11');
/*!40000 ALTER TABLE `serviceables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('HxKCQErofCSI0J5qEjt1c4ErmxTvY0tfQ1DJO2cF',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZmJjOVlOazFBaGpMQzNjOEdkUTlFZXNzWUdzbU1KMWt4ajVBYjMyZSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjc5OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vc2VydmljZWFibGVzL2VkaXRzP2VzdGFiRWRpdD0xJnBwZUVkaXQ9NyZ0eXBlRWRpdD0xIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9',1756186635);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','admin','admin@gmail.com',NULL,'$2y$12$WMPAMUOTcU/6zQFr11wv9.ML5nsKY6Q/CAdrVJpADV0vqlEUlgOi6',NULL,NULL,NULL);
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

-- Dump completed on 2025-08-26 13:38:02
