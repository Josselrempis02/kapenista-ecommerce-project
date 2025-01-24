-- MySQL dump 10.13  Distrib 8.0.36, for Linux (x86_64)
--
-- Host: localhost    Database: kapenista_shop_db
-- ------------------------------------------------------
-- Server version	8.0.40-0ubuntu0.24.04.1

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
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admins` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (17,'admin','admin@gmail.com',NULL,'$2y$10$760I9y1zlOoB4/CQyFodHuFxL/8htKSh0O6Mrsq2TF7ipowb5Xd5C',NULL,'2024-10-01 17:42:50','2024-10-01 17:42:50'),(18,'AJ','AJ@gmail.com',NULL,'$2y$10$V6fZfaEyg9AMj78Lsj9LWOK4EZwo5sY6/yg4b2Ol5XaOGa7OSVR9C',NULL,'2024-10-01 17:43:32','2024-10-01 17:43:32');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `category_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Cold Coffee','Cold Coffee',0,'Cold Coffee','Cold Coffee','Cold Coffee,Cold Coffee','2024-10-03 18:21:43','2024-10-03 18:21:43'),(2,'Hot Coffee','Hot Coffee',0,'Hot Coffee','Hot Coffee','Hot Coffee,Hot Coffee','2024-10-03 18:21:59','2024-10-03 18:21:59'),(3,'Bottled Beverages','Bottled Beverages',0,'Bottled Beverages','Bottled Beverages','Bottled Beverages,Bottled Beverages','2024-10-03 18:22:11','2024-10-03 23:03:09'),(4,'Non-Coffee','Non-Coffee',0,'Non-Coffee','Non-Coffee','Non-Coffee,Non-Coffee','2024-10-17 18:14:13','2024-10-17 18:14:13');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2024_08_10_102932_create_password_resets_table',1),(6,'2024_08_14_082721_create_admins_table',1),(7,'2024_08_15_083854_create_products_table',1),(8,'2024_08_29_072015_create_orders_table',1),(9,'2024_09_03_023318_create_orders_product_table',1),(10,'2024_09_03_024420_create_payment_table',1),(11,'2024_10_02_021227_create_category_table',2),(12,'2024_10_03_031045_add_title_description_keywords_to_category_table',3),(13,'2024_10_03_031343_add_title_description_keywords_to_category_table',4),(14,'2024_10_04_021932_create_category',5),(15,'2024_10_09_022541_update_column_price',6),(16,'2024_10_09_063230_drop_orders',7),(17,'2024_10_11_054533_drop_orders_product',8),(18,'2024_10_11_061433_droptable',9),(19,'2024_10_11_055412_create_orders_table',10),(20,'2024_10_11_070755_drop_column_from_orders',11),(21,'2024_10_12_134757_add_status_to_orders_table',12),(22,'2024_10_12_144826_add_column',13),(23,'2024_10_12_153152_drop_column_orders',14),(24,'2024_10_12_153331_add_colun_orders',15),(25,'2024_10_14_025822_adding_column_orders_table',16),(26,'2024_10_14_030146_drop_column',17),(27,'2024_10_16_013535_update_orders_table_add_cancelled_status',18),(28,'2024_10_16_125333_drop_column',19),(29,'2024_10_16_130433_add_column',20),(30,'2024_10_17_013113_create_staff_table',21),(31,'2024_12_11_094751_create_notifications_table',22);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint unsigned NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` VALUES ('0bed2f64-bf00-4c64-a3e4-4cfb47fa502f','App\\Notifications\\NewOrderNotification','App\\Models\\Staff',3,'{\"order_id\":\"20250124-1-EOS0SU\",\"customer_name\":\"Jossel\",\"total_amount\":null,\"message\":\"A new order has been placed by Jossel\"}',NULL,'2025-01-23 17:47:28','2025-01-23 17:47:28'),('0f17e6ce-f0b1-4971-a824-4835966a5019','App\\Notifications\\OrderStatusUpdated','App\\Models\\User',6,'{\"title\":\"Order Approved\",\"message\":\"Your Order Has Been Approved.\",\"order_id\":null,\"order_number\":\"20241213-6-OYRQ1R\",\"status\":\"Delivered\"}','2024-12-13 01:15:56','2024-12-13 01:15:45','2024-12-13 01:15:56'),('12d3e31e-07d6-4d8b-97b0-87557df67346','App\\Notifications\\OrderDelivered','App\\Models\\User',6,'{\"title\":\"Order Delivered\",\"message\":\"Your order has been delivered.\",\"order_id\":null,\"status\":\"Delivered\"}','2024-12-13 01:17:55','2024-12-13 01:17:48','2024-12-13 01:17:55'),('1bffbf27-0a06-4901-8b3a-11909d7da263','App\\Notifications\\NewOrderNotification','App\\Models\\Staff',2,'{\"order_id\":\"20250123-1-XOC1OM\",\"customer_name\":\"Jossel\",\"total_amount\":null,\"message\":\"A new order has been placed by Jossel\"}',NULL,'2025-01-23 06:55:27','2025-01-23 06:55:27'),('1ffce1fa-ab00-4be2-b701-4bd73b01a1a6','App\\Notifications\\OrderDelivered','App\\Models\\User',6,'{\"message\":\"Your order has been delivered\",\"order_id\":null,\"status\":\"Delivered\"}','2024-12-13 01:11:59','2024-12-13 01:11:40','2024-12-13 01:11:59'),('2203b5ca-4d97-4fa3-8624-f8979ebe625d','App\\Notifications\\NewOrderNotification','App\\Models\\Staff',3,'{\"order_id\":\"20250123-1-WJEPIQ\",\"customer_name\":\"Jossel\",\"total_amount\":null,\"message\":\"A new order has been placed by Jossel\"}',NULL,'2025-01-23 06:48:43','2025-01-23 06:48:43'),('230a06dd-c299-4dff-97d6-3556ab8f41ef','App\\Notifications\\NewOrderNotification','App\\Models\\Admin',18,'{\"order_id\":\"20250123-1-XOC1OM\",\"customer_name\":\"Jossel\",\"total_amount\":null,\"message\":\"A new order has been placed by Jossel\"}',NULL,'2025-01-23 06:55:27','2025-01-23 06:55:27'),('24818c00-e14e-4a41-926a-cf7a7670cced','App\\Notifications\\OrderStatusUpdated','App\\Models\\User',10,'{\"title\":\"Order Approved\",\"message\":\"Your Order Has Been Approved.\",\"order_id\":null,\"order_number\":\"20250121-10-PTOZPH\",\"status\":\"Delivered\"}','2025-01-21 02:23:46','2025-01-21 02:20:54','2025-01-21 02:23:46'),('27ca3895-64c0-494b-8546-34fe646b6f3b','App\\Notifications\\NewOrderNotification','App\\Models\\Admin',17,'{\"order_id\":\"20250123-1-WJEPIQ\",\"customer_name\":\"Jossel\",\"total_amount\":null,\"message\":\"A new order has been placed by Jossel\"}',NULL,'2025-01-23 06:48:43','2025-01-23 06:48:43'),('347bf8e3-a086-451e-8aff-1257a37bca6b','App\\Notifications\\NewOrderNotification','App\\Models\\Staff',3,'{\"order_id\":\"20250121-10-2JIXCS\",\"customer_name\":\"pogi\",\"total_amount\":null,\"message\":\"A new order has been placed by pogi\"}',NULL,'2025-01-21 02:18:52','2025-01-21 02:18:52'),('3599eec4-7fc9-412a-8784-de8a5a3876be','App\\Notifications\\NewOrderNotification','App\\Models\\Staff',3,'{\"order_id\":\"20250123-1-3RIURZ\",\"customer_name\":\"Jossel\",\"total_amount\":null,\"message\":\"A new order has been placed by Jossel\"}',NULL,'2025-01-23 06:25:58','2025-01-23 06:25:58'),('39acf5e5-8af7-4289-aa9d-e45e09fd34bb','App\\Notifications\\NewOrderNotification','App\\Models\\Admin',18,'{\"order_id\":\"20250123-1-QOEIQU\",\"customer_name\":\"Jossel\",\"total_amount\":null,\"message\":\"A new order has been placed by Jossel\"}',NULL,'2025-01-23 06:48:40','2025-01-23 06:48:40'),('39c0d093-86ae-4de1-9be0-95ae5aaa81eb','App\\Notifications\\NewOrderNotification','App\\Models\\Admin',18,'{\"order_id\":\"20250124-1-EOS0SU\",\"customer_name\":\"Jossel\",\"total_amount\":null,\"message\":\"A new order has been placed by Jossel\"}',NULL,'2025-01-23 17:47:28','2025-01-23 17:47:28'),('4113757e-e799-4627-93ab-0d4826ff99ac','App\\Notifications\\NewOrderNotification','App\\Models\\Staff',2,'{\"order_id\":\"20250121-10-PTOZPH\",\"customer_name\":\"pogi\",\"total_amount\":null,\"message\":\"A new order has been placed by pogi\"}',NULL,'2025-01-20 23:10:15','2025-01-20 23:10:15'),('49107ceb-c0df-475e-930b-5d6f6131e98d','App\\Notifications\\NewOrderNotification','App\\Models\\Admin',18,'{\"order_id\":\"20241218-1-JWFA6A\",\"customer_name\":\"Jossel\",\"total_amount\":null,\"message\":\"A new order has been placed by \"}','2025-01-20 18:28:19','2024-12-18 05:17:30','2025-01-20 18:28:19'),('5604763a-5476-454b-80c4-34b4dd0c6095','App\\Notifications\\NewOrderNotification','App\\Models\\Staff',2,'{\"order_id\":\"20250124-1-EOS0SU\",\"customer_name\":\"Jossel\",\"total_amount\":null,\"message\":\"A new order has been placed by Jossel\"}',NULL,'2025-01-23 17:47:28','2025-01-23 17:47:28'),('5676d423-2768-44ef-b825-7ffc22f3989c','App\\Notifications\\NewOrderNotification','App\\Models\\Staff',3,'{\"order_id\":\"20250123-1-XOC1OM\",\"customer_name\":\"Jossel\",\"total_amount\":null,\"message\":\"A new order has been placed by Jossel\"}',NULL,'2025-01-23 06:55:27','2025-01-23 06:55:27'),('5abbf1bf-5c55-4add-b3f1-6f2f539c7c0e','App\\Notifications\\NewOrderNotification','App\\Models\\Staff',2,'{\"order_id\":\"20241218-1-JWFA6A\",\"customer_name\":\"Jossel\",\"total_amount\":null,\"message\":\"A new order has been placed by \"}',NULL,'2024-12-18 05:17:30','2024-12-18 05:17:30'),('5ea1a778-223c-4823-acfb-59332675d2f8','App\\Notifications\\NewOrderNotification','App\\Models\\Staff',2,'{\"order_id\":\"20250123-1-X8C2MZ\",\"customer_name\":\"Jossel\",\"total_amount\":null,\"message\":\"A new order has been placed by Jossel\"}',NULL,'2025-01-23 06:34:51','2025-01-23 06:34:51'),('5f4dd75d-3c11-4bea-80de-2a85f7a2dac4','App\\Notifications\\OrderDelivered','App\\Models\\User',6,'{\"title\":\"Order Delivered\",\"message\":\"Your order has been delivered.\",\"order_id\":null,\"status\":\"Delivered\"}','2024-12-13 01:15:54','2024-12-13 01:15:46','2024-12-13 01:15:54'),('619736d1-9cad-4c4e-ac86-d1f2a6ff1f74','App\\Notifications\\NewOrderNotification','App\\Models\\Staff',3,'{\"order_id\":\"20250123-1-QOEIQU\",\"customer_name\":\"Jossel\",\"total_amount\":null,\"message\":\"A new order has been placed by Jossel\"}',NULL,'2025-01-23 06:48:40','2025-01-23 06:48:40'),('65aa3369-cc28-4ca5-96ef-b866bd9b18c4','App\\Notifications\\OrderStatusUpdated','App\\Models\\User',6,'{\"title\":\"Order Approved\",\"message\":\"Your Order Has Been Approved.\",\"order_id\":null,\"order_number\":\"20241213-6-OYRQ1R\",\"status\":\"Delivered\"}','2024-12-13 01:17:54','2024-12-13 01:17:47','2024-12-13 01:17:54'),('6c2f873b-d2d6-4184-b132-52b61e101360','App\\Notifications\\NewOrderNotification','App\\Models\\Admin',18,'{\"order_id\":\"20250123-1-3RIURZ\",\"customer_name\":\"Jossel\",\"total_amount\":null,\"message\":\"A new order has been placed by Jossel\"}',NULL,'2025-01-23 06:25:58','2025-01-23 06:25:58'),('6eecce54-6812-456d-8df6-fb4b83ac91bd','App\\Notifications\\NewOrderNotification','App\\Models\\Admin',18,'{\"order_id\":\"20250123-1-UOUQNV\",\"customer_name\":\"Jossel\",\"total_amount\":null,\"message\":\"A new order has been placed by Jossel\"}',NULL,'2025-01-23 06:33:14','2025-01-23 06:33:14'),('73f27190-5562-42b8-bdbb-5fc077065504','App\\Notifications\\NewOrderNotification','App\\Models\\Admin',18,'{\"order_id\":\"20250121-10-2JIXCS\",\"customer_name\":\"pogi\",\"total_amount\":null,\"message\":\"A new order has been placed by pogi\"}','2025-01-21 02:24:27','2025-01-21 02:18:52','2025-01-21 02:24:27'),('7652363a-fdb2-4a4b-8e5f-9abe26ff0212','App\\Notifications\\NewOrderNotification','App\\Models\\Admin',17,'{\"order_id\":\"20250124-1-EOS0SU\",\"customer_name\":\"Jossel\",\"total_amount\":null,\"message\":\"A new order has been placed by Jossel\"}',NULL,'2025-01-23 17:47:28','2025-01-23 17:47:28'),('76e9a91e-d550-42c0-b76f-cd9e2fe4ed91','App\\Notifications\\NewOrderNotification','App\\Models\\Admin',17,'{\"order_id\":\"20250123-1-X8C2MZ\",\"customer_name\":\"Jossel\",\"total_amount\":null,\"message\":\"A new order has been placed by Jossel\"}',NULL,'2025-01-23 06:34:51','2025-01-23 06:34:51'),('7e7a7b5b-f1f8-45a0-b97a-753989e112d9','App\\Notifications\\OrderStatusUpdated','App\\Models\\User',6,'{\"title\":\"Order Approved\",\"message\":\"Your Order Has Been Approved.\",\"order_id\":null,\"order_number\":\"20241213-6-OYRQ1R\",\"status\":\"Processing\"}','2024-12-13 01:16:53','2024-12-13 01:16:47','2024-12-13 01:16:53'),('84acd588-03a9-4d1c-b099-ccc2bbfb3ad1','App\\Notifications\\NewOrderNotification','App\\Models\\Staff',3,'{\"order_id\":\"20250123-1-YFTNWB\",\"customer_name\":\"Jossel\",\"total_amount\":null,\"message\":\"A new order has been placed by Jossel\"}',NULL,'2025-01-23 06:48:37','2025-01-23 06:48:37'),('8e092596-7381-458b-8d2e-b91d4f6c37e2','App\\Notifications\\OrderStatusUpdated','App\\Models\\User',6,'{\"title\":\"Order Approved\",\"message\":\"Your Order Has Been Approved.\",\"order_id\":null,\"order_number\":\"20241213-6-OYRQ1R\",\"status\":\"Delivered\"}','2024-12-13 01:16:19','2024-12-13 01:16:09','2024-12-13 01:16:19'),('8e90971e-dac7-47a5-a5b3-0ae9958f4bd0','App\\Notifications\\NewOrderNotification','App\\Models\\Staff',2,'{\"order_id\":\"20250121-10-2JIXCS\",\"customer_name\":\"pogi\",\"total_amount\":null,\"message\":\"A new order has been placed by pogi\"}',NULL,'2025-01-21 02:18:52','2025-01-21 02:18:52'),('9443408e-1259-41bb-8ee9-ae2cfb283b50','App\\Notifications\\NewOrderNotification','App\\Models\\Staff',3,'{\"order_id\":\"20250123-1-UOUQNV\",\"customer_name\":\"Jossel\",\"total_amount\":null,\"message\":\"A new order has been placed by Jossel\"}',NULL,'2025-01-23 06:33:14','2025-01-23 06:33:14'),('97e0d6b9-c547-4fd0-af6b-0de43da96970','App\\Notifications\\NewOrderNotification','App\\Models\\Admin',17,'{\"order_id\":\"20250123-1-YFTNWB\",\"customer_name\":\"Jossel\",\"total_amount\":null,\"message\":\"A new order has been placed by Jossel\"}',NULL,'2025-01-23 06:48:37','2025-01-23 06:48:37'),('9d6983cb-8b96-4191-967b-cc54905bed58','App\\Notifications\\NewOrderNotification','App\\Models\\Admin',17,'{\"order_id\":\"20241218-1-JWFA6A\",\"customer_name\":\"Jossel\",\"total_amount\":null,\"message\":\"A new order has been placed by \"}',NULL,'2024-12-18 05:17:30','2024-12-18 05:17:30'),('9e4f2122-5eaf-4de2-925f-634ace035182','App\\Notifications\\NewOrderNotification','App\\Models\\Staff',2,'{\"order_id\":\"20250123-1-QOEIQU\",\"customer_name\":\"Jossel\",\"total_amount\":null,\"message\":\"A new order has been placed by Jossel\"}',NULL,'2025-01-23 06:48:40','2025-01-23 06:48:40'),('9f4e39c2-f94a-472d-954c-17652baaff2a','App\\Notifications\\NewOrderNotification','App\\Models\\Staff',3,'{\"order_id\":\"20241218-1-JWFA6A\",\"customer_name\":\"Jossel\",\"total_amount\":null,\"message\":\"A new order has been placed by \"}',NULL,'2024-12-18 05:17:30','2024-12-18 05:17:30'),('9fc444a3-9829-42c0-b674-5370ae612745','App\\Notifications\\NewOrderNotification','App\\Models\\Staff',3,'{\"order_id\":\"20250121-10-PTOZPH\",\"customer_name\":\"pogi\",\"total_amount\":null,\"message\":\"A new order has been placed by pogi\"}',NULL,'2025-01-20 23:10:15','2025-01-20 23:10:15'),('a811c97b-6bfc-4dcb-8f75-5f008e8e3b9e','App\\Notifications\\NewOrderNotification','App\\Models\\Admin',17,'{\"order_id\":\"20250121-10-PTOZPH\",\"customer_name\":\"pogi\",\"total_amount\":null,\"message\":\"A new order has been placed by pogi\"}',NULL,'2025-01-20 23:10:15','2025-01-20 23:10:15'),('ade7c249-7229-413d-9e91-15c4b2f499e1','App\\Notifications\\NewOrderNotification','App\\Models\\Staff',2,'{\"order_id\":\"20250123-1-3RIURZ\",\"customer_name\":\"Jossel\",\"total_amount\":null,\"message\":\"A new order has been placed by Jossel\"}',NULL,'2025-01-23 06:25:58','2025-01-23 06:25:58'),('b4069c77-8afa-4992-9ef1-2ab74098cd75','App\\Notifications\\NewOrderNotification','App\\Models\\Admin',18,'{\"order_id\":\"20250123-1-YFTNWB\",\"customer_name\":\"Jossel\",\"total_amount\":null,\"message\":\"A new order has been placed by Jossel\"}',NULL,'2025-01-23 06:48:37','2025-01-23 06:48:37'),('b78c86b4-5436-438e-93e2-6f60613b8c19','App\\Notifications\\NewOrderNotification','App\\Models\\Admin',18,'{\"order_id\":\"20250123-1-WJEPIQ\",\"customer_name\":\"Jossel\",\"total_amount\":null,\"message\":\"A new order has been placed by Jossel\"}',NULL,'2025-01-23 06:48:43','2025-01-23 06:48:43'),('bab1f092-f45a-4afd-a14e-fb2c0f308020','App\\Notifications\\NewOrderNotification','App\\Models\\Admin',17,'{\"order_id\":\"20250123-1-UOUQNV\",\"customer_name\":\"Jossel\",\"total_amount\":null,\"message\":\"A new order has been placed by Jossel\"}',NULL,'2025-01-23 06:33:14','2025-01-23 06:33:14'),('c03d4399-6cda-454a-918f-90a0b7a2232b','App\\Notifications\\OrderStatusUpdated','App\\Models\\User',6,'{\"message\":\"Your Order Has Been Approved\",\"order_id\":null,\"order_number\":\"20241213-6-OYRQ1R\",\"status\":\"Delivered\"}','2024-12-13 01:12:00','2024-12-13 01:11:39','2024-12-13 01:12:00'),('c2be07d7-f402-4879-b001-b61f40df6c19','App\\Notifications\\NewOrderNotification','App\\Models\\Admin',18,'{\"order_id\":\"20250121-10-PTOZPH\",\"customer_name\":\"pogi\",\"total_amount\":null,\"message\":\"A new order has been placed by pogi\"}','2025-01-21 02:24:29','2025-01-20 23:10:15','2025-01-21 02:24:29'),('c4b18bdd-0f85-4240-a7e0-d64eb5e1fca4','App\\Notifications\\NewOrderNotification','App\\Models\\Staff',2,'{\"order_id\":\"20250123-1-YFTNWB\",\"customer_name\":\"Jossel\",\"total_amount\":null,\"message\":\"A new order has been placed by Jossel\"}',NULL,'2025-01-23 06:48:37','2025-01-23 06:48:37'),('c4d23c1f-9fd3-407e-9fad-7517d491a6c7','App\\Notifications\\OrderStatusUpdated','App\\Models\\User',6,'{\"message\":\"Your Order Has Been Approved\",\"order_id\":null,\"order_number\":\"20241213-6-OYRQ1R\",\"status\":\"Processing\"}','2024-12-13 01:15:32','2024-12-13 01:14:19','2024-12-13 01:15:32'),('d2fbd585-98bc-40cf-9689-46e30f092f14','App\\Notifications\\NewOrderNotification','App\\Models\\Staff',3,'{\"order_id\":\"20250123-1-X8C2MZ\",\"customer_name\":\"Jossel\",\"total_amount\":null,\"message\":\"A new order has been placed by Jossel\"}',NULL,'2025-01-23 06:34:51','2025-01-23 06:34:51'),('d32dec01-26fb-438e-882c-a5cb06975ba2','App\\Notifications\\NewOrderNotification','App\\Models\\Admin',17,'{\"order_id\":\"20250123-1-3RIURZ\",\"customer_name\":\"Jossel\",\"total_amount\":null,\"message\":\"A new order has been placed by Jossel\"}',NULL,'2025-01-23 06:25:58','2025-01-23 06:25:58'),('e2e0a949-7d35-4551-be85-7c549319094e','App\\Notifications\\NewOrderNotification','App\\Models\\Staff',2,'{\"order_id\":\"20250123-1-UOUQNV\",\"customer_name\":\"Jossel\",\"total_amount\":null,\"message\":\"A new order has been placed by Jossel\"}',NULL,'2025-01-23 06:33:14','2025-01-23 06:33:14'),('e5fe22bb-603c-4c3b-b6b9-05ea266c6a69','App\\Notifications\\NewOrderNotification','App\\Models\\Admin',17,'{\"order_id\":\"20250121-10-2JIXCS\",\"customer_name\":\"pogi\",\"total_amount\":null,\"message\":\"A new order has been placed by pogi\"}',NULL,'2025-01-21 02:18:52','2025-01-21 02:18:52'),('e64b06b9-1e45-4dae-8343-6a26bf635c87','App\\Notifications\\NewOrderNotification','App\\Models\\Admin',17,'{\"order_id\":\"20250123-1-XOC1OM\",\"customer_name\":\"Jossel\",\"total_amount\":null,\"message\":\"A new order has been placed by Jossel\"}',NULL,'2025-01-23 06:55:27','2025-01-23 06:55:27'),('e6a3218b-b558-47d2-b438-61c6e1a0bb65','App\\Notifications\\NewOrderNotification','App\\Models\\Admin',17,'{\"order_id\":\"20250123-1-QOEIQU\",\"customer_name\":\"Jossel\",\"total_amount\":null,\"message\":\"A new order has been placed by Jossel\"}',NULL,'2025-01-23 06:48:40','2025-01-23 06:48:40'),('ef7ac0b3-90ba-45f5-b41c-13f40461cd74','App\\Notifications\\NewOrderNotification','App\\Models\\Staff',2,'{\"order_id\":\"20250123-1-WJEPIQ\",\"customer_name\":\"Jossel\",\"total_amount\":null,\"message\":\"A new order has been placed by Jossel\"}',NULL,'2025-01-23 06:48:43','2025-01-23 06:48:43'),('f3132386-0987-4332-9967-40e1c8d17e1e','App\\Notifications\\OrderStatusUpdated','App\\Models\\User',6,'{\"title\":\"Order Approved\",\"message\":\"Your Order Has Been Approved.\",\"order_id\":null,\"order_number\":\"20241213-6-OYRQ1R\",\"status\":\"Processing\"}','2024-12-13 01:19:30','2024-12-13 01:18:33','2024-12-13 01:19:30'),('f3c3d691-1370-4997-809f-b620bf24b116','App\\Notifications\\OrderStatusUpdated','App\\Models\\User',6,'{\"message\":\"Your Order Has Been Approved\",\"order_id\":null,\"order_number\":\"20241213-6-OYRQ1R\",\"status\":\"Processing\"}','2024-12-13 01:09:52','2024-12-13 00:48:28','2024-12-13 01:09:52'),('f6a75a8e-5363-4a41-884f-bb985af18740','App\\Notifications\\NewOrderNotification','App\\Models\\Admin',18,'{\"order_id\":\"20250123-1-X8C2MZ\",\"customer_name\":\"Jossel\",\"total_amount\":null,\"message\":\"A new order has been placed by Jossel\"}',NULL,'2025-01-23 06:34:51','2025-01-23 06:34:51'),('fb4c530d-67f0-4e96-a94a-db953a0c4d51','App\\Notifications\\OrderDelivered','App\\Models\\User',10,'{\"title\":\"Order Delivered\",\"message\":\"Your order has been delivered.\",\"order_id\":null,\"status\":\"Delivered\"}','2025-01-21 02:23:37','2025-01-21 02:20:56','2025-01-21 02:23:37');
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `order_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` enum('GCash','COD') COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gcash_reference_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('Pending','Processing','Delivered','Completed','Cancelled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `gcash_receipt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `orders_user_id_foreign` (`user_id`),
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=142 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (31,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-11-01 01:18:21','2024-10-14 03:11:19','Completed',NULL,''),(32,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-11 01:20:32','2024-10-11 01:20:32','Pending',NULL,''),(33,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-11 01:21:56','2024-10-11 01:21:56','Pending',NULL,''),(36,1,'#16 St. Micheal #16 St. Micheal #16 St. Micheal #16 St. Micheal #16 St. Micheal #16 St. Micheal #16 St. Micheal #16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-12 05:41:05','2024-10-12 05:41:05','Pending',NULL,''),(39,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-12 07:21:52','2024-10-12 07:21:52','Pending',NULL,''),(40,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-12 07:22:25','2024-10-12 07:22:25','Pending',NULL,''),(41,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-12 07:23:33','2024-10-12 07:23:33','Pending',NULL,''),(43,1,'#16 St. Micheal','San mateo rizal','GCash','','',NULL,'2024-10-12 07:40:03','2024-10-12 07:40:03','Pending',NULL,''),(44,1,'#16 St. Micheal','San mateo rizal','GCash','','',NULL,'2024-10-12 07:42:10','2024-10-12 07:42:10','Pending',NULL,''),(45,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-12 08:08:39','2024-10-12 08:08:39','Pending',NULL,''),(46,1,'#16 St. Micheal','San mateo rizal','GCash','','',NULL,'2024-10-12 08:28:39','2024-10-12 08:28:39','Pending',NULL,''),(47,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-13 17:48:37','2024-10-13 17:48:37','Pending',NULL,''),(48,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-13 17:58:22','2024-10-13 17:58:22','Pending',NULL,''),(49,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-13 18:11:10','2024-10-13 18:11:10','Pending',NULL,''),(50,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-13 18:11:30','2024-10-13 18:11:30','Pending',NULL,''),(51,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-13 18:13:12','2024-10-13 18:13:12','Pending',NULL,''),(53,1,'#16 St. Micheal','San mateo rizal','GCash','','','123213211553543','2024-10-13 19:29:26','2024-10-13 19:29:26','Pending','receipts/8HcwnkZEjUouC9lPBfJ5DCtXigPRbgw2mXIP9WnH.jpg',''),(54,1,'#16 St. Micheal','San mateo rizal','GCash','','','123213211553543','2024-10-13 19:30:31','2024-10-13 19:30:31','Pending','receipts/abLoX4x2wISA0y9LNIwTLMknArttXw8NZTrTZFfF.jpg',''),(55,1,'#16 St. Micheal','San mateo rizal','GCash','','','123213211553543','2024-10-13 19:30:57','2024-10-13 19:30:57','Pending','receipts/AyawlbrnwJRGiQq19KFRi2XTxNVVltBkfxgCf5MK.jpg',''),(56,1,'#16 St. Micheal','San mateo rizal','GCash','','','123213211553543','2024-10-13 19:33:31','2024-10-13 19:33:31','Pending','receipts/41VZyqjoAkeY4khgcSQqstg5mGH9r8vkGFQroFg6.jpg',''),(57,1,'#16 St. Micheal','San mateo rizal','GCash','','','123213211553543','2024-10-13 19:34:34','2024-10-13 19:34:34','Pending','receipts/QMsWXZVX9znFOv9ZluYUcRTO3poZG04N4bK7mdbU.jpg',''),(58,1,'#16 St. Micheal','San mateo rizal','GCash','','','123213211553543','2024-10-13 19:35:03','2024-10-13 19:35:03','Pending','receipts/kFrLtEozHa95UbObPXNrtSIelMGdUNcVW3CzE65a.jpg',''),(60,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-13 23:25:58','2024-10-13 23:25:58','Pending',NULL,''),(61,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-13 23:27:55','2024-10-13 23:27:55','Pending',NULL,''),(62,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-14 00:43:15','2024-10-14 00:43:15','Pending',NULL,''),(63,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-14 00:48:16','2024-10-14 00:48:16','Pending',NULL,''),(64,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-14 00:49:57','2024-10-14 00:49:57','Pending',NULL,''),(65,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-14 00:50:35','2024-10-14 00:50:35','Pending',NULL,''),(66,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-14 00:53:42','2024-10-14 00:53:42','Pending',NULL,''),(67,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-14 00:54:58','2024-10-14 00:54:58','Pending',NULL,''),(75,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-14 01:10:02','2024-10-14 01:10:02','Pending',NULL,''),(76,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-14 01:12:10','2024-10-14 01:12:10','Pending',NULL,''),(77,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-14 01:12:59','2024-10-14 01:12:59','Pending',NULL,''),(78,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-14 01:17:02','2024-10-14 01:17:02','Pending',NULL,''),(79,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-14 01:20:02','2024-10-14 01:20:02','Pending',NULL,''),(80,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-14 01:20:05','2024-10-14 01:20:05','Pending',NULL,''),(81,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-14 01:20:13','2024-10-14 01:20:13','Pending',NULL,''),(82,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-14 01:22:06','2024-10-14 01:22:06','Pending',NULL,''),(83,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-14 01:23:26','2024-10-14 01:23:26','Pending',NULL,''),(84,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-14 01:25:34','2024-10-14 01:25:34','Pending',NULL,''),(85,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-14 01:29:10','2024-10-14 01:29:10','Pending',NULL,''),(86,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-14 01:29:52','2024-10-14 01:29:52','Pending',NULL,''),(87,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-14 01:30:04','2024-10-14 01:30:04','Pending',NULL,''),(88,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-14 01:30:34','2024-10-14 01:30:34','Pending',NULL,''),(89,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-14 01:32:11','2024-10-14 01:32:11','Pending',NULL,''),(90,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-14 01:34:12','2024-10-14 01:34:12','Pending',NULL,''),(91,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-14 01:34:50','2024-10-14 01:34:50','Pending',NULL,''),(92,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-14 01:36:13','2024-10-14 18:23:55','Completed',NULL,''),(93,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-14 01:37:51','2024-10-14 01:37:51','Pending',NULL,''),(95,1,'#16 St. Micheal','San mateo rizal','COD','0631a7a0-c3e1-41d2-9198-075ad940ce43','',NULL,'2024-10-14 01:51:37','2024-10-14 01:51:37','Pending',NULL,''),(97,1,'#16 St. Micheal','San mateo rizal','COD','85fe5ac9-eb58-4792-8f1c-9d38500cba29','ORDER-20241014-1-W160SF',NULL,'2024-10-14 01:58:20','2024-10-14 17:15:03','Processing',NULL,''),(98,1,'#16 St. Micheal','San mateo rizal','COD','cd45f6ef-c4e8-46b2-952f-a276e4d90bfc','ORDER-20241014-1-JPKRYO',NULL,'2024-10-14 01:58:53','2024-10-14 01:58:53','Pending',NULL,''),(99,1,'#16 St. Micheal','San mateo rizal','COD','d9564727-fb90-4c17-88e0-945faed3f4e7','ORDER-20241014-1-KUGBMX',NULL,'2024-10-14 01:59:52','2024-10-14 01:59:52','Pending',NULL,''),(100,1,'#16 St. Micheal','San mateo rizal','COD','c72c4e70-6f49-41da-8fe0-368a348abe15','ORDER-20241014-1-FQOSXS',NULL,'2024-10-14 02:00:22','2024-10-14 02:00:22','Pending',NULL,''),(101,1,'#16 St. Micheal','San mateo rizal','COD','a9b96a2e-a710-43a9-9e5a-956a9262f691','ORDER-20241014-1-VIPAUZ',NULL,'2024-10-14 02:01:40','2024-10-14 23:51:25','Completed',NULL,''),(102,1,'#16 St. Micheal','San mateo rizal','COD','45503c23-daa5-4ace-9f17-082a885d1dfe','20241014-1-BKXX2H',NULL,'2024-10-14 02:05:27','2024-10-14 17:11:58','Completed',NULL,''),(104,1,'#16 St. Micheal','San mateo rizal','COD','0f66c369-2ec3-430e-b139-32da3226403e','20241015-1-H7SPHN',NULL,'2024-10-14 17:20:12','2024-10-14 17:20:12','Pending',NULL,''),(105,1,'#16 St. Micheal','San mateo rizal','COD','4ae3662f-5fca-4148-8bbf-ddc584f937e9','20241015-1-4ENWBT',NULL,'2024-10-14 17:20:22','2024-10-14 17:20:22','Pending',NULL,''),(106,1,'#16 St. Micheal','San mateo rizal','COD','b4ccbecd-b1be-40da-a1c8-c39370141503','20241015-1-M1STN3',NULL,'2024-10-14 17:20:35','2024-10-14 17:20:35','Pending',NULL,''),(107,1,'#16 St. Micheal','San mateo rizal','COD','0c8d73c1-b621-4fa8-9413-18670a29adc4','20241015-1-DWCLSB',NULL,'2024-10-14 17:23:57','2024-10-14 17:23:57','Pending',NULL,''),(109,1,'#16 St. Micheal','San mateo rizal','COD','e3fb78e2-2edf-44e6-9232-ec18e9b0db1d','20241015-1-YKPAQH',NULL,'2024-10-14 17:34:42','2024-10-14 17:34:42','Pending',NULL,''),(110,1,'#16 St. Micheal','San mateo rizal','COD','92474561-db0b-4e07-864e-e54db0f5ae6c','20241015-1-OTIGNK',NULL,'2024-10-14 17:35:45','2024-10-14 17:35:45','Pending',NULL,''),(111,1,'#16 St. Micheal','San mateo rizal','COD','4c9acecf-7177-4d08-892e-a12079682113','20241015-1-9NTY2K',NULL,'2024-10-14 17:37:26','2024-10-17 18:33:18','Cancelled',NULL,''),(112,1,'#16 St. Micheal','San mateo rizal','COD','5270655f-e708-41e6-87c6-bc2c2cf1fdba','20241015-1-PBEZKF',NULL,'2024-10-14 17:39:02','2024-10-15 23:55:12','Cancelled',NULL,''),(113,5,'#16 St. Micheal','San mateo rizal','COD','f736326d-3e13-489b-9a73-4c4efe85706f','20241015-5-XRPBNZ',NULL,'2024-10-14 18:31:49','2024-10-15 17:16:44','Completed',NULL,''),(114,5,'#16 St. Micheal','San mateo rizal','COD','0a148848-b5ac-46e3-b592-6f18ae601571','20241015-5-OCJLXF',NULL,'2024-10-14 18:34:51','2024-10-15 17:04:35','Completed',NULL,''),(115,5,'#16 St. Micheal','San mateo rizal','COD','ca1be091-8eb3-4b5c-bcdd-75edbafeb8ce','20241016-5-RZWKHK',NULL,'2024-10-15 16:27:08','2024-10-15 16:46:25','Completed',NULL,''),(116,5,'#16 St. Micheal','San mateo rizal','COD','b08882ee-51db-46b4-8a10-d9f5ac14f149','20241016-5-7TH4T6',NULL,'2024-10-15 17:11:18','2024-10-15 17:46:38','Cancelled',NULL,''),(117,5,'#16 St. Micheal','San mateo rizal','COD','5a722a14-fa1d-4ad6-adc4-303b9e771b80','20241016-5-VMP17W',NULL,'2024-10-15 17:19:09','2024-10-15 17:36:49','Cancelled',NULL,''),(118,5,'#16 St. Micheal','San mateo rizal','GCash','ae5e5075-66b2-445e-8e4f-2c17c54bf5ad','20241016-5-2HZMHV','123213211553543','2024-10-15 17:50:30','2024-10-15 18:41:02','Completed','receipts/26Y2Wn9zmGQLNp9htZFQrpbwrSHqsNzNXiHN3joI.jpg',''),(119,5,'#16 St. Micheal','San mateo rizal','COD','29c6a9ef-75eb-47bb-a962-d25880e18dfb','20241016-5-LSHAQ2',NULL,'2024-10-15 18:37:13','2024-10-15 18:40:53','Completed',NULL,''),(121,1,'dasda','adasdas','GCash','fd8a2a15-14eb-4452-ac9e-d2dc0f9b6ab4','20241016-1-XA2XVJ','asdasdasdasdas','2024-10-15 23:51:43','2024-10-15 23:52:25','Cancelled','receipts/q0V9FLTASr2AVIhphhGR27wVGCUP7IlPwtTCWQFO.jpg',''),(122,1,'#16 St. Micheal','San mateo rizal','COD','d425b5f0-0592-448b-aa96-d24b3c98e01a','20241016-1-30VWFC',NULL,'2024-10-16 04:38:58','2024-10-17 18:33:14','Cancelled',NULL,''),(123,1,'#16 St. Micheal','San mateo rizal','COD','99d30b2f-dadf-4dd7-b946-39a9041b2794','20241016-1-1X0C8C',NULL,'2024-10-16 05:16:43','2024-10-17 18:33:11','Cancelled',NULL,'Jossel Alfred Rempillo Rempis'),(124,1,'#16 St. Micheal','San mateo rizal','GCash','5c7accff-5504-407c-9d2f-86c10533dad9','20241018-1-M7RCV8','21312312312','2024-10-17 19:07:50','2024-12-13 00:40:08','Processing','receipts/pkdV79TQ8bAokgs1kkbBgVBgUX1J237a4wwHam1s.png','Jossel Alfred Rempillo Rempis'),(125,7,'#16 St. Micheal','San mateo rizal','GCash','a3075b54-2e2b-47cb-977b-4e5a2b5fe5fb','20241018-7-XC2MUM','123213211553543','2024-10-18 05:16:10','2024-10-18 05:23:20','Completed','receipts/TLaVdnj1Ippj4pWaVynnUufgOiUL2iNyoqDaS0Sq.png','JC LUKA'),(126,8,'#16 St. Micheal','San mateo rizal','COD','750a8faf-b610-480f-881a-412fdc7b8629','20241211-8-81J6LS',NULL,'2024-12-11 01:18:44','2024-12-11 01:21:15','Completed',NULL,'Jossel Alfred Rempillo Rempis'),(127,6,'#16 St. Micheal','San mateo rizal','COD','9d05fb0c-c3db-48c3-86d9-f7dbc6c2092b','20241213-6-OYRQ1R',NULL,'2024-12-13 00:48:00','2024-12-13 01:18:30','Processing',NULL,'Jossel Alfred Rempillo Rempis'),(128,1,'#16 St. Micheal','San mateo rizal','COD','07ab320c-0100-412b-b512-f8e8b6111909','20241218-1-RGPWUC',NULL,'2024-12-18 05:15:30','2024-12-18 05:15:30','Pending',NULL,'Jossel Alfred Rempillo Rempis'),(129,1,'#16 St. Micheal','San mateo rizal','COD','17ced0dd-ead6-44bf-88e4-1591a783ed12','20241218-1-NBCFOG',NULL,'2024-12-18 05:16:24','2024-12-18 05:16:24','Pending',NULL,'Jossel Alfred Rempillo Rempis'),(130,1,'#16 St. Micheal','San mateo rizal','COD','a297a26e-9d49-4dc8-b324-24ab35abe70e','20241218-1-UMDSGX',NULL,'2024-12-18 05:17:08','2024-12-18 05:17:08','Pending',NULL,'Jossel Alfred Rempillo Rempis'),(131,1,'#16 St. Micheal','San mateo rizal','COD','4ec19a5a-246d-46e4-8bcd-eef6d7d14d83','20241218-1-JWFA6A',NULL,'2024-12-18 05:17:28','2024-12-18 05:17:28','Pending',NULL,'Jossel Alfred Rempillo Rempis'),(132,10,'#16 St. Micheal','San mateo rizal','GCash','f110b590-2d89-4c97-97a8-3cfd7e34fa34','20250121-10-PTOZPH','21312312312','2025-01-20 23:10:12','2025-01-21 02:20:51','Delivered','receipts/zSx6bMvYEdBfgu6dm05ELDkJMqiYJgqNSSdARd2K.jpg','Jossel Alfred Rempillo Rempis'),(133,10,'#16 St. Micheal','San mateo rizal','COD','94682ceb-5daa-47f2-ab31-1e0f21369955','20250121-10-2JIXCS',NULL,'2025-01-21 02:18:48','2025-01-21 02:18:48','Pending',NULL,'Jm Valderama'),(134,1,'#16 St. Micheal','San mateo rizal','COD','a9868810-a4a3-4f73-bc84-f37159f51e1a','20250123-1-3RIURZ',NULL,'2025-01-23 06:25:55','2025-01-23 06:34:36','Cancelled',NULL,'Jossel Alfred Rempillo Rempis'),(135,1,'#16 St. Micheal','San mateo rizal','COD','913299cd-fe20-4db8-84c5-ccda441df831','20250123-1-UOUQNV',NULL,'2025-01-23 06:33:11','2025-01-23 06:34:32','Cancelled',NULL,'Jossel Alfred Rempillo Rempis'),(136,1,'#16 St. Micheal','San mateo rizal','COD','1a18cd9a-92ac-433e-91d8-2f00d12943a2','20250123-1-X8C2MZ',NULL,'2025-01-23 06:34:47','2025-01-23 06:47:49','Cancelled',NULL,'Jossel Alfred Rempillo Rempis'),(137,1,'#16 St. Micheal','San mateo rizal','COD','8cb890fa-d9f4-41d6-af0b-19646967b3c0','20250123-1-YFTNWB',NULL,'2025-01-23 06:48:33','2025-01-23 06:48:33','Pending',NULL,'Jossel Alfred Rempillo Rempis'),(138,1,'#16 St. Micheal','San mateo rizal','COD','64ba963b-d868-454e-a161-03a20aeeffe7','20250123-1-QOEIQU',NULL,'2025-01-23 06:48:37','2025-01-23 06:48:37','Pending',NULL,'Jossel Alfred Rempillo Rempis'),(139,1,'#16 St. Micheal','San mateo rizal','COD','810cb30a-0240-4bdf-882a-84b194614053','20250123-1-WJEPIQ',NULL,'2025-01-23 06:48:41','2025-01-23 06:48:41','Pending',NULL,'Jossel Alfred Rempillo Rempis'),(140,1,'#16 St. Micheal','San mateo rizal','COD','a3ebedd8-70dd-4555-a541-93f8ba61fcd7','20250123-1-XOC1OM',NULL,'2025-01-23 06:55:24','2025-01-23 06:55:24','Pending',NULL,'Jossel Alfred Rempillo Rempis'),(141,1,'#16 St. Micheal','San mateo rizal','COD','1c12c81e-9c81-4e01-8acf-0a141b59203c','20250124-1-EOS0SU',NULL,'2025-01-23 17:47:25','2025-01-23 17:47:25','Pending',NULL,'Jossel Alfred Rempillo Rempis');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders_product`
--

DROP TABLE IF EXISTS `orders_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders_product` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `size` enum('16oz','22oz') COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders_product`
--

LOCK TABLES `orders_product` WRITE;
/*!40000 ALTER TABLE `orders_product` DISABLE KEYS */;
INSERT INTO `orders_product` VALUES (2,31,1,'16oz',5,532.45,2662.25,'2024-10-11 01:18:21','2024-10-11 01:18:21'),(3,32,2,'16oz',2,959.79,1919.58,'2024-10-11 01:20:32','2024-10-11 01:20:32'),(4,33,4,'16oz',1,557.09,557.09,'2024-10-11 01:21:56','2024-10-11 01:21:56'),(5,34,9,'16oz',1,42.23,42.23,'2024-10-11 21:24:12','2024-10-11 21:24:12'),(6,35,1,'16oz',1,532.45,532.45,'2024-10-11 23:31:50','2024-10-11 23:31:50'),(7,36,3,'16oz',1,793.21,793.21,'2024-10-12 05:41:05','2024-10-12 05:41:05'),(8,39,2,'16oz',1,949.79,949.79,'2024-10-12 07:21:52','2024-10-12 07:21:52'),(9,43,2,'16oz',1,949.79,949.79,'2024-10-12 07:40:03','2024-10-12 07:40:03'),(10,44,2,'16oz',1,949.79,949.79,'2024-10-12 07:42:10','2024-10-12 07:42:10'),(11,45,2,'16oz',2,949.79,1899.58,'2024-10-12 08:08:39','2024-10-12 08:08:39'),(12,46,1,'16oz',1,532.45,532.45,'2024-10-12 08:28:39','2024-10-12 08:28:39'),(13,47,2,'16oz',1,949.79,949.79,'2024-10-13 17:48:37','2024-10-13 17:48:37'),(14,48,2,'16oz',1,949.79,949.79,'2024-10-13 17:58:22','2024-10-13 17:58:22'),(15,53,2,'16oz',2,949.79,1899.58,'2024-10-13 19:29:26','2024-10-13 19:29:26'),(16,58,4,'16oz',1,557.09,557.09,'2024-10-13 19:35:03','2024-10-13 19:35:03'),(17,60,2,'16oz',1,949.79,949.79,'2024-10-13 23:25:58','2024-10-13 23:25:58'),(18,61,16,'16oz',1,100.00,100.00,'2024-10-13 23:27:55','2024-10-13 23:27:55'),(19,62,2,'16oz',1,959.79,959.79,'2024-10-14 00:43:15','2024-10-14 00:43:15'),(20,63,2,'16oz',1,949.79,949.79,'2024-10-14 00:48:16','2024-10-14 00:48:16'),(21,67,3,'16oz',1,793.21,793.21,'2024-10-14 00:54:58','2024-10-14 00:54:58'),(22,68,2,'16oz',1,949.79,949.79,'2024-10-14 01:02:26','2024-10-14 01:02:26'),(23,70,3,'16oz',2,793.21,1586.42,'2024-10-14 01:07:36','2024-10-14 01:07:36'),(24,75,3,'16oz',1,793.21,793.21,'2024-10-14 01:10:02','2024-10-14 01:10:02'),(25,77,4,'16oz',1,567.09,567.09,'2024-10-14 01:12:59','2024-10-14 01:12:59'),(26,77,3,'16oz',1,793.21,793.21,'2024-10-14 01:12:59','2024-10-14 01:12:59'),(27,77,6,'16oz',1,641.37,641.37,'2024-10-14 01:12:59','2024-10-14 01:12:59'),(28,77,4,'16oz',1,557.09,557.09,'2024-10-14 01:12:59','2024-10-14 01:12:59'),(29,78,3,'16oz',1,793.21,793.21,'2024-10-14 01:17:02','2024-10-14 01:17:02'),(30,78,4,'16oz',1,557.09,557.09,'2024-10-14 01:17:02','2024-10-14 01:17:02'),(31,78,5,'16oz',1,870.05,870.05,'2024-10-14 01:17:02','2024-10-14 01:17:02'),(32,78,6,'16oz',1,641.37,641.37,'2024-10-14 01:17:02','2024-10-14 01:17:02'),(33,85,3,'16oz',1,793.21,793.21,'2024-10-14 01:29:10','2024-10-14 01:29:10'),(34,85,5,'16oz',1,870.05,870.05,'2024-10-14 01:29:10','2024-10-14 01:29:10'),(35,85,6,'16oz',1,641.37,641.37,'2024-10-14 01:29:10','2024-10-14 01:29:10'),(36,91,9,'16oz',1,42.23,42.23,'2024-10-14 01:34:50','2024-10-14 01:34:50'),(37,91,3,'16oz',1,793.21,793.21,'2024-10-14 01:34:50','2024-10-14 01:34:50'),(38,91,5,'16oz',1,870.05,870.05,'2024-10-14 01:34:50','2024-10-14 01:34:50'),(39,91,6,'16oz',1,641.37,641.37,'2024-10-14 01:34:50','2024-10-14 01:34:50'),(40,92,3,'16oz',1,793.21,793.21,'2024-10-14 01:36:13','2024-10-14 01:36:13'),(41,92,5,'16oz',1,870.05,870.05,'2024-10-14 01:36:13','2024-10-14 01:36:13'),(42,92,6,'16oz',1,641.37,641.37,'2024-10-14 01:36:13','2024-10-14 01:36:13'),(43,93,3,'16oz',1,793.21,793.21,'2024-10-14 01:37:51','2024-10-14 01:37:51'),(44,93,5,'16oz',1,870.05,870.05,'2024-10-14 01:37:51','2024-10-14 01:37:51'),(45,95,3,'16oz',1,793.21,793.21,'2024-10-14 01:51:37','2024-10-14 01:51:37'),(46,97,3,'16oz',1,793.21,793.21,'2024-10-14 01:58:20','2024-10-14 01:58:20'),(47,99,3,'16oz',1,793.21,793.21,'2024-10-14 01:59:52','2024-10-14 01:59:52'),(48,100,2,'16oz',1,949.79,949.79,'2024-10-14 02:00:22','2024-10-14 02:00:22'),(49,101,17,'16oz',1,159.00,159.00,'2024-10-14 02:01:40','2024-10-14 02:01:40'),(50,102,3,'16oz',1,793.21,793.21,'2024-10-14 02:05:27','2024-10-14 02:05:27'),(51,103,3,'16oz',1,793.21,793.21,'2024-10-14 02:12:24','2024-10-14 02:12:24'),(52,103,4,'16oz',1,557.09,557.09,'2024-10-14 02:12:24','2024-10-14 02:12:24'),(53,103,5,'16oz',1,870.05,870.05,'2024-10-14 02:12:24','2024-10-14 02:12:24'),(54,103,6,'16oz',1,641.37,641.37,'2024-10-14 02:12:24','2024-10-14 02:12:24'),(55,104,3,'16oz',1,793.21,793.21,'2024-10-14 17:20:12','2024-10-14 17:20:12'),(56,107,3,'16oz',1,793.21,793.21,'2024-10-14 17:23:57','2024-10-14 17:23:57'),(57,109,3,'16oz',1,793.21,793.21,'2024-10-14 17:34:42','2024-10-14 17:34:42'),(58,113,2,'16oz',1,949.79,949.79,'2024-10-14 18:31:49','2024-10-14 18:31:49'),(59,114,3,'16oz',1,793.21,793.21,'2024-10-14 18:34:51','2024-10-14 18:34:51'),(60,115,16,'16oz',1,110.00,110.00,'2024-10-15 16:27:08','2024-10-15 16:27:08'),(61,116,2,'16oz',1,949.79,949.79,'2024-10-15 17:11:18','2024-10-15 17:11:18'),(62,117,3,'16oz',1,793.21,793.21,'2024-10-15 17:19:09','2024-10-15 17:19:09'),(63,117,5,'16oz',1,870.05,870.05,'2024-10-15 17:19:09','2024-10-15 17:19:09'),(64,118,3,'16oz',1,803.21,803.21,'2024-10-15 17:50:30','2024-10-15 17:50:30'),(65,119,5,'16oz',1,870.05,870.05,'2024-10-15 18:37:13','2024-10-15 18:37:13'),(66,121,2,'16oz',2,949.79,1899.58,'2024-10-15 23:51:43','2024-10-15 23:51:43'),(67,122,2,'16oz',5,949.79,4748.95,'2024-10-16 04:38:58','2024-10-16 04:38:58'),(68,123,2,'16oz',1,949.79,949.79,'2024-10-16 05:16:43','2024-10-16 05:16:43'),(69,124,16,'16oz',2,100.00,200.00,'2024-10-17 19:07:50','2024-10-17 19:07:50'),(70,125,16,'16oz',1,100.00,100.00,'2024-10-18 05:16:10','2024-10-18 05:16:10'),(71,126,1,'16oz',1,542.45,542.45,'2024-12-11 01:18:44','2024-12-11 01:18:44'),(72,127,2,'16oz',2,949.79,1899.58,'2024-12-13 00:48:00','2024-12-13 00:48:00'),(73,128,1,'16oz',1,532.45,532.45,'2024-12-18 05:15:30','2024-12-18 05:15:30'),(74,132,2,'16oz',1,949.79,949.79,'2025-01-20 23:10:12','2025-01-20 23:10:12'),(75,132,4,'16oz',1,557.09,557.09,'2025-01-20 23:10:12','2025-01-20 23:10:12'),(76,133,17,'16oz',1,159.00,159.00,'2025-01-21 02:18:48','2025-01-21 02:18:48'),(77,134,20,'16oz',1,100.00,100.00,'2025-01-23 06:25:55','2025-01-23 06:25:55'),(78,135,22,'16oz',1,90.00,90.00,'2025-01-23 06:33:11','2025-01-23 06:33:11'),(79,136,19,'16oz',1,110.00,110.00,'2025-01-23 06:34:47','2025-01-23 06:34:47'),(80,137,20,'16oz',1,100.00,100.00,'2025-01-23 06:48:34','2025-01-23 06:48:34'),(81,140,21,'16oz',1,130.00,130.00,'2025-01-23 06:55:24','2025-01-23 06:55:24'),(82,140,20,'16oz',8,100.00,800.00,'2025-01-23 06:55:24','2025-01-23 06:55:24'),(83,141,21,'16oz',35,120.00,4200.00,'2025-01-23 17:47:25','2025-01-23 17:47:25');
/*!40000 ALTER TABLE `orders_product` ENABLE KEYS */;
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
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES ('jrempis08@gmail.com','$2y$10$9GGDQrS4XvkckR6QjPEwQ.QUx/y/8JMY3FHBwIab/fG6H.3ifQPqe','2025-01-20 18:40:44');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payment` (
  `payment_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint unsigned NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `payment_method` enum('COD','GCash') COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`payment_id`),
  KEY `payment_order_id_foreign` (`order_id`),
  CONSTRAINT `payment_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment`
--

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `product_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint unsigned NOT NULL,
  `stock` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (19,'products/ljqm7U0SCvPNhHAJlbej9cAJMgQYmOSJPTFmk6BG.png','Cafe Latte',110.00,'Cafe Latte',1,100,'2025-01-23 05:34:50','2025-01-23 06:19:00'),(20,'products/n8b8NaBWnEHZwgKFHbPPWImPW02FuV3jRosWyQej.png','Cappuccino',100.00,'Cappuccino',1,91,'2025-01-23 05:35:38','2025-01-23 06:55:24'),(21,'products/40PeTMGfxdaRDWNWpV8BRn3XrFjnTHzj6vkZVfrc.png','Caramel Machiatto',120.00,'Caramel Machiatto',1,64,'2025-01-23 05:36:04','2025-01-23 17:47:25'),(22,'products/ewWRgm5oplChNyvuy4MMavddiL6R9cqg1e39TUBu.png','Americano',90.00,'Americano',1,100,'2025-01-23 05:36:45','2025-01-23 05:36:45'),(23,'products/wFUMr81VAP46XPAYHAK5LUMbyhN3e8xT9nyZUZ2o.png','Cafe Mocha',120.00,'Cafe Mocha',1,100,'2025-01-23 05:38:08','2025-01-23 05:38:08'),(24,'products/vvIt40fgsb44YPYTYm0tPnBxs563kKA1yZkbdSRC.png','Spanish Latte',110.00,'Spanish Latte',1,100,'2025-01-23 05:42:22','2025-01-23 05:42:22'),(25,'products/CtUY9IdpvGgrwF5GlgautD6U0HglXN1MzlpfevKp.png','Hot Americano',90.00,'Hot Americano',2,100,'2025-01-23 05:44:03','2025-01-23 05:44:03'),(26,'products/1tnh3l1RXiCBYzbCzKnr694jToFAv6f9PffSygtn.png','Hot Coffee',80.00,'Hot Coffee',2,100,'2025-01-23 05:44:27','2025-01-23 05:44:27'),(27,'products/PX0qDoOllFboWpjC7RrInH4ZMZhGaYPpj6pJouNj.png','Hot Cappuccino',80.00,'Hot Cappuccino',2,100,'2025-01-23 05:45:01','2025-01-23 05:45:01'),(28,'products/N6k1QWNUhxaCvxPYuXPHEIM00AOMNkoNw6s7irbN.png','Mocha',80.00,'Mocha',2,100,'2025-01-23 05:45:27','2025-01-23 05:45:27'),(29,'products/PttEo2WYSNMyjLmAjyE124iPwm4e054c1Ok6Fg81.png','Strawberry Latte',110.00,'Strawberry Latte',4,100,'2025-01-23 05:48:08','2025-01-23 05:48:08'),(30,'products/k26sL230FgBpGPl89g8jsFjFxbs5tktpTQnd944E.png','Iced Choco',110.00,'Iced Choco',4,100,'2025-01-23 05:48:37','2025-01-23 05:48:37'),(31,'products/VuTkNXDxRvsL2DqH0eKF8luJf5vVQkNRfmirSnx7.png','Bottle Cafe Latte',120.00,'Bottle Cafe Latte',3,100,'2025-01-23 05:50:26','2025-01-23 05:50:26');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `staff` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `staff_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff`
--

LOCK TABLES `staff` WRITE;
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
INSERT INTO `staff` VALUES (2,'jucil','josselrempis02@gmail.com',NULL,'$2y$10$k6jHrlJBW0MgYxQ1zm8HPuqoWSM1RaY6tDq9MzBOAbK8vMNE2a7Fq',NULL,'2024-10-16 18:02:54','2025-01-21 02:48:55'),(3,'JC luka','jcalmarioooo@gmail.com',NULL,'$2y$10$QXd8sm3mAeN6h7qr.Q95Uewtw76vLgbGpHIzXQU6Ro1iG9hdfMtem',NULL,'2024-10-18 05:18:39','2024-10-18 05:18:39');
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Jossel','josselrempis02@gmail.com',NULL,NULL,'$2y$10$EHsoOSUssoUkMy4G3RobguzQwyxIpRd7j92i4vosGC7OSBjxsxbBq','09167790175','#16 St. Micheal #16 St. Micheal #16 St. Micheal #16 St. Micheal #16 St. Micheal #16 St. Micheal',NULL,'2024-09-03 19:02:04','2024-10-17 17:37:32'),(5,'AJ','ajrempis3@gmail.com','108018855830139003740',NULL,'eyJpdiI6IlVmNU1VQnFvZFc4UUFTWkNocHh2MUE9PSIsInZhbHVlIjoiNDdKUm43cXc3dUxRM1Y2SEtGdjQvK1BENUxJMXVNTWxaOUFVK0lBcnorOD0iLCJtYWMiOiJlZTFhNzExNmU0ZDdiY2NiMDc2Nzc4ZmFmOWM2MTBmNWQ5ZTQ5MjZmMWVjMGRjNGFhYzEzOGZhNTg4N2FiYjllIiwidGFnIjoiIn0=','09167790175','#16 St. Micheal',NULL,'2024-10-14 18:31:16','2024-10-15 17:29:50'),(6,'Kapenista','kapenista@gmail.com','109953682068000041229',NULL,'eyJpdiI6InJpYU1BRWZEazRvZk00VkNXVksvOXc9PSIsInZhbHVlIjoiTXVGU2NqanAwbGJNVzNHSmt3dWxxK3QwaWNVQUpzank1NkF6aHR3WllBVT0iLCJtYWMiOiI2YjMyYjAxMTU4MzI2ZWY1NmQyMjA2YTkxYzg4ZmFmN2FjYjQ1NjQ5Yjc4MWM0NmI5OTRmM2ZiZTM3ZTdmNTYyIiwidGFnIjoiIn0=',NULL,NULL,NULL,'2024-10-14 22:24:46','2024-10-14 22:24:46'),(7,'Jc Luka23','jcalmarioooo@gmail.com',NULL,NULL,'$2y$10$ZHFAJunPVxy7HNvkrnYamuC37YIJBpk2wuRPRy6yf8zkmQj1wXlQG','09167790175','Tondo,Manila',NULL,'2024-10-18 05:13:08','2024-10-18 05:13:23'),(8,'Rempis, Jossel Alfred R.','rempis.jossel.bsinfotech@gmail.com','115918198215882782543',NULL,'eyJpdiI6InRzOE1sL1M1Mnpza3AzSy9Zb3BLWHc9PSIsInZhbHVlIjoib1FjMUxpS2FYU2s1MEtsLzVhMDI2Q0VIYU9BQlZqM0hJNmt3MGtSVkVGVT0iLCJtYWMiOiJkZjEzZDFkNTI2NDViNGQ4MzgzYjk1N2U2Mzc2N2QwYWYwZjllM2M1ZDUyNjM0NmY4MmI1NGFhZjkxMjBlNzU4IiwidGFnIjoiIn0=',NULL,NULL,NULL,'2024-12-11 01:17:33','2024-12-11 01:17:33'),(9,'Jucilkupal','jrempis08@gmail.com',NULL,NULL,'$2y$10$l9eD3nZrpfp3cA3Rr7Gbd.oL8oT.YdOQBnkwU6uikYxcPBarAcgl.','09167790175','#16 St. Micheal',NULL,'2025-01-20 18:19:02','2025-01-20 18:41:51'),(10,'pogi','valderamajm08@gmail.com',NULL,NULL,'$2y$10$DmnZWFPizQ5w7EQJmzcn8.OnOeCk6p9k9/MgWGJiguvMYyApTncEe','09761768762','manda',NULL,'2025-01-20 22:14:23','2025-01-20 22:20:48'),(11,'12121515asfasdfasd','mamamoblue@gmail.com',NULL,NULL,'$2y$10$KV4z79znlj7/xt0kGAY2fuxUA/.355jpnSssTy4f5VwW6APrh8g36','09167790175','#16 St. Micheal',NULL,'2025-01-21 03:18:27','2025-01-21 03:18:27');
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

-- Dump completed on 2025-01-24 10:49:55
