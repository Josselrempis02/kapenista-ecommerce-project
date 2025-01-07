-- MySQL dump 10.13  Distrib 8.0.40, for macos14 (x86_64)
--
-- Host: 127.0.0.1    Database: kapenista_shop_db
-- ------------------------------------------------------
-- Server version	9.1.0

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2024_08_10_102932_create_password_resets_table',1),(6,'2024_08_14_082721_create_admins_table',1),(7,'2024_08_15_083854_create_products_table',1),(8,'2024_08_29_072015_create_orders_table',1),(9,'2024_09_03_023318_create_orders_product_table',1),(10,'2024_09_03_024420_create_payment_table',1),(11,'2024_10_02_021227_create_category_table',2),(12,'2024_10_03_031045_add_title_description_keywords_to_category_table',3),(13,'2024_10_03_031343_add_title_description_keywords_to_category_table',4),(14,'2024_10_04_021932_create_category',5),(15,'2024_10_09_022541_update_column_price',6),(16,'2024_10_09_063230_drop_orders',7),(17,'2024_10_11_054533_drop_orders_product',8),(18,'2024_10_11_061433_droptable',9),(19,'2024_10_11_055412_create_orders_table',10),(20,'2024_10_11_070755_drop_column_from_orders',11),(21,'2024_10_12_134757_add_status_to_orders_table',12),(22,'2024_10_12_144826_add_column',13),(23,'2024_10_12_153152_drop_column_orders',14),(24,'2024_10_12_153331_add_colun_orders',15),(25,'2024_10_14_025822_adding_column_orders_table',16),(26,'2024_10_14_030146_drop_column',17),(27,'2024_10_16_013535_update_orders_table_add_cancelled_status',18),(28,'2024_10_16_125333_drop_column',19),(29,'2024_10_16_130433_add_column',20),(30,'2024_10_17_013113_create_staff_table',21),(31,'2024_10_11_063435_create_orders_product',22),(32,'2025_01_07_133251_create_notifications_table',23);
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
INSERT INTO `notifications` VALUES ('0cf6afad-2106-4827-8c18-0bcb5cdfe151','App\\Notifications\\NewOrderNotification','App\\Models\\Staff',3,'{\"order_id\":\"20250107-1-JXQVS3\",\"customer_name\":\"Jossel\",\"total_amount\":null,\"message\":\"A new order has been placed by Jossel\"}',NULL,'2025-01-07 05:40:26','2025-01-07 05:40:26'),('0e9be06a-6cb5-491a-b6a9-0c5a4074392b','App\\Notifications\\OrderStatusUpdated','App\\Models\\User',1,'{\"title\":\"Order Approved\",\"message\":\"Your Order Has Been Approved.\",\"order_id\":null,\"order_number\":\"20250107-1-JXQVS3\",\"status\":\"Processing\"}','2025-01-07 05:41:09','2025-01-07 05:41:00','2025-01-07 05:41:09'),('ad5ed040-b393-4b88-be5a-c7e9cd6e988b','App\\Notifications\\NewOrderNotification','App\\Models\\Staff',2,'{\"order_id\":\"20250107-1-JXQVS3\",\"customer_name\":\"Jossel\",\"total_amount\":null,\"message\":\"A new order has been placed by Jossel\"}',NULL,'2025-01-07 05:40:26','2025-01-07 05:40:26'),('c56d2459-505e-409e-bfc8-b9892030cf5e','App\\Notifications\\NewOrderNotification','App\\Models\\Admin',18,'{\"order_id\":\"20250107-1-JXQVS3\",\"customer_name\":\"Jossel\",\"total_amount\":null,\"message\":\"A new order has been placed by Jossel\"}',NULL,'2025-01-07 05:40:26','2025-01-07 05:40:26'),('e3fe269b-d10f-4794-83ca-b5b049415738','App\\Notifications\\NewOrderNotification','App\\Models\\Admin',17,'{\"order_id\":\"20250107-1-JXQVS3\",\"customer_name\":\"Jossel\",\"total_amount\":null,\"message\":\"A new order has been placed by Jossel\"}',NULL,'2025-01-07 05:40:26','2025-01-07 05:40:26');
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
) ENGINE=InnoDB AUTO_INCREMENT=128 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (31,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-11-01 01:18:21','2024-10-14 03:11:19','Completed',NULL,''),(32,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-11 01:20:32','2024-10-11 01:20:32','Pending',NULL,''),(33,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-11 01:21:56','2024-10-11 01:21:56','Pending',NULL,''),(34,2,'#16 St. Micheal','San mateo rizal','GCash','','',NULL,'2024-10-11 21:24:12','2024-10-11 21:24:12','Pending',NULL,''),(35,2,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-11 23:31:50','2024-10-11 23:31:50','Pending',NULL,''),(36,1,'#16 St. Micheal #16 St. Micheal #16 St. Micheal #16 St. Micheal #16 St. Micheal #16 St. Micheal #16 St. Micheal #16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-12 05:41:05','2024-10-12 05:41:05','Pending',NULL,''),(39,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-12 07:21:52','2024-10-12 07:21:52','Pending',NULL,''),(40,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-12 07:22:25','2024-10-12 07:22:25','Pending',NULL,''),(41,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-12 07:23:33','2024-10-12 07:23:33','Pending',NULL,''),(43,1,'#16 St. Micheal','San mateo rizal','GCash','','',NULL,'2024-10-12 07:40:03','2024-10-12 07:40:03','Pending',NULL,''),(44,1,'#16 St. Micheal','San mateo rizal','GCash','','',NULL,'2024-10-12 07:42:10','2024-10-12 07:42:10','Pending',NULL,''),(45,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-12 08:08:39','2024-10-12 08:08:39','Pending',NULL,''),(46,1,'#16 St. Micheal','San mateo rizal','GCash','','',NULL,'2024-10-12 08:28:39','2024-10-12 08:28:39','Pending',NULL,''),(47,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-13 17:48:37','2024-10-13 17:48:37','Pending',NULL,''),(48,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-13 17:58:22','2024-10-13 17:58:22','Pending',NULL,''),(49,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-13 18:11:10','2024-10-13 18:11:10','Pending',NULL,''),(50,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-13 18:11:30','2024-10-13 18:11:30','Pending',NULL,''),(51,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-13 18:13:12','2024-10-13 18:13:12','Pending',NULL,''),(53,1,'#16 St. Micheal','San mateo rizal','GCash','','','123213211553543','2024-10-13 19:29:26','2024-10-13 19:29:26','Pending','receipts/8HcwnkZEjUouC9lPBfJ5DCtXigPRbgw2mXIP9WnH.jpg',''),(54,1,'#16 St. Micheal','San mateo rizal','GCash','','','123213211553543','2024-10-13 19:30:31','2024-10-13 19:30:31','Pending','receipts/abLoX4x2wISA0y9LNIwTLMknArttXw8NZTrTZFfF.jpg',''),(55,1,'#16 St. Micheal','San mateo rizal','GCash','','','123213211553543','2024-10-13 19:30:57','2024-10-13 19:30:57','Pending','receipts/AyawlbrnwJRGiQq19KFRi2XTxNVVltBkfxgCf5MK.jpg',''),(56,1,'#16 St. Micheal','San mateo rizal','GCash','','','123213211553543','2024-10-13 19:33:31','2024-10-13 19:33:31','Pending','receipts/41VZyqjoAkeY4khgcSQqstg5mGH9r8vkGFQroFg6.jpg',''),(57,1,'#16 St. Micheal','San mateo rizal','GCash','','','123213211553543','2024-10-13 19:34:34','2024-10-13 19:34:34','Pending','receipts/QMsWXZVX9znFOv9ZluYUcRTO3poZG04N4bK7mdbU.jpg',''),(58,1,'#16 St. Micheal','San mateo rizal','GCash','','','123213211553543','2024-10-13 19:35:03','2024-10-13 19:35:03','Pending','receipts/kFrLtEozHa95UbObPXNrtSIelMGdUNcVW3CzE65a.jpg',''),(60,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-13 23:25:58','2024-10-13 23:25:58','Pending',NULL,''),(61,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-13 23:27:55','2024-10-13 23:27:55','Pending',NULL,''),(62,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-14 00:43:15','2024-10-14 00:43:15','Pending',NULL,''),(63,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-14 00:48:16','2024-10-14 00:48:16','Pending',NULL,''),(64,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-14 00:49:57','2024-10-14 00:49:57','Pending',NULL,''),(65,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-14 00:50:35','2024-10-14 00:50:35','Pending',NULL,''),(66,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-14 00:53:42','2024-10-14 00:53:42','Pending',NULL,''),(67,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-14 00:54:58','2024-10-14 00:54:58','Pending',NULL,''),(75,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-14 01:10:02','2024-10-14 01:10:02','Pending',NULL,''),(76,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-14 01:12:10','2024-10-14 01:12:10','Pending',NULL,''),(77,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-14 01:12:59','2024-10-14 01:12:59','Pending',NULL,''),(78,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-14 01:17:02','2024-10-14 01:17:02','Pending',NULL,''),(79,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-14 01:20:02','2024-10-14 01:20:02','Pending',NULL,''),(80,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-14 01:20:05','2024-10-14 01:20:05','Pending',NULL,''),(81,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-14 01:20:13','2024-10-14 01:20:13','Pending',NULL,''),(82,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-14 01:22:06','2024-10-14 01:22:06','Pending',NULL,''),(83,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-14 01:23:26','2024-10-14 01:23:26','Pending',NULL,''),(84,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-14 01:25:34','2024-10-14 01:25:34','Pending',NULL,''),(85,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-14 01:29:10','2024-10-14 01:29:10','Pending',NULL,''),(86,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-14 01:29:52','2024-10-14 01:29:52','Pending',NULL,''),(87,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-14 01:30:04','2024-10-14 01:30:04','Pending',NULL,''),(88,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-14 01:30:34','2024-10-14 01:30:34','Pending',NULL,''),(89,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-14 01:32:11','2024-10-14 01:32:11','Pending',NULL,''),(90,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-14 01:34:12','2024-10-14 01:34:12','Pending',NULL,''),(91,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-14 01:34:50','2024-10-14 01:34:50','Pending',NULL,''),(92,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-14 01:36:13','2024-10-14 18:23:55','Completed',NULL,''),(93,1,'#16 St. Micheal','San mateo rizal','COD','','',NULL,'2024-10-14 01:37:51','2024-10-14 01:37:51','Pending',NULL,''),(95,1,'#16 St. Micheal','San mateo rizal','COD','0631a7a0-c3e1-41d2-9198-075ad940ce43','',NULL,'2024-10-14 01:51:37','2024-10-14 01:51:37','Pending',NULL,''),(97,1,'#16 St. Micheal','San mateo rizal','COD','85fe5ac9-eb58-4792-8f1c-9d38500cba29','ORDER-20241014-1-W160SF',NULL,'2024-10-14 01:58:20','2024-10-14 17:15:03','Processing',NULL,''),(98,1,'#16 St. Micheal','San mateo rizal','COD','cd45f6ef-c4e8-46b2-952f-a276e4d90bfc','ORDER-20241014-1-JPKRYO',NULL,'2024-10-14 01:58:53','2024-10-14 01:58:53','Pending',NULL,''),(99,1,'#16 St. Micheal','San mateo rizal','COD','d9564727-fb90-4c17-88e0-945faed3f4e7','ORDER-20241014-1-KUGBMX',NULL,'2024-10-14 01:59:52','2024-10-14 01:59:52','Pending',NULL,''),(100,1,'#16 St. Micheal','San mateo rizal','COD','c72c4e70-6f49-41da-8fe0-368a348abe15','ORDER-20241014-1-FQOSXS',NULL,'2024-10-14 02:00:22','2024-10-14 02:00:22','Pending',NULL,''),(101,1,'#16 St. Micheal','San mateo rizal','COD','a9b96a2e-a710-43a9-9e5a-956a9262f691','ORDER-20241014-1-VIPAUZ',NULL,'2024-10-14 02:01:40','2024-10-14 23:51:25','Completed',NULL,''),(102,1,'#16 St. Micheal','San mateo rizal','COD','45503c23-daa5-4ace-9f17-082a885d1dfe','20241014-1-BKXX2H',NULL,'2024-10-14 02:05:27','2024-10-14 17:11:58','Completed',NULL,''),(104,1,'#16 St. Micheal','San mateo rizal','COD','0f66c369-2ec3-430e-b139-32da3226403e','20241015-1-H7SPHN',NULL,'2024-10-14 17:20:12','2024-10-14 17:20:12','Pending',NULL,''),(105,1,'#16 St. Micheal','San mateo rizal','COD','4ae3662f-5fca-4148-8bbf-ddc584f937e9','20241015-1-4ENWBT',NULL,'2024-10-14 17:20:22','2024-10-14 17:20:22','Pending',NULL,''),(106,1,'#16 St. Micheal','San mateo rizal','COD','b4ccbecd-b1be-40da-a1c8-c39370141503','20241015-1-M1STN3',NULL,'2024-10-14 17:20:35','2024-10-14 17:20:35','Pending',NULL,''),(107,1,'#16 St. Micheal','San mateo rizal','COD','0c8d73c1-b621-4fa8-9413-18670a29adc4','20241015-1-DWCLSB',NULL,'2024-10-14 17:23:57','2024-10-14 17:23:57','Pending',NULL,''),(109,1,'#16 St. Micheal','San mateo rizal','COD','e3fb78e2-2edf-44e6-9232-ec18e9b0db1d','20241015-1-YKPAQH',NULL,'2024-10-14 17:34:42','2024-10-14 17:34:42','Pending',NULL,''),(110,1,'#16 St. Micheal','San mateo rizal','COD','92474561-db0b-4e07-864e-e54db0f5ae6c','20241015-1-OTIGNK',NULL,'2024-10-14 17:35:45','2024-10-14 17:35:45','Pending',NULL,''),(111,1,'#16 St. Micheal','San mateo rizal','COD','4c9acecf-7177-4d08-892e-a12079682113','20241015-1-9NTY2K',NULL,'2024-10-14 17:37:26','2024-10-17 18:33:18','Cancelled',NULL,''),(112,1,'#16 St. Micheal','San mateo rizal','COD','5270655f-e708-41e6-87c6-bc2c2cf1fdba','20241015-1-PBEZKF',NULL,'2024-10-14 17:39:02','2024-10-15 23:55:12','Cancelled',NULL,''),(113,5,'#16 St. Micheal','San mateo rizal','COD','f736326d-3e13-489b-9a73-4c4efe85706f','20241015-5-XRPBNZ',NULL,'2024-10-14 18:31:49','2024-10-15 17:16:44','Completed',NULL,''),(114,5,'#16 St. Micheal','San mateo rizal','COD','0a148848-b5ac-46e3-b592-6f18ae601571','20241015-5-OCJLXF',NULL,'2024-10-14 18:34:51','2024-10-15 17:04:35','Completed',NULL,''),(115,5,'#16 St. Micheal','San mateo rizal','COD','ca1be091-8eb3-4b5c-bcdd-75edbafeb8ce','20241016-5-RZWKHK',NULL,'2024-10-15 16:27:08','2024-10-15 16:46:25','Completed',NULL,''),(116,5,'#16 St. Micheal','San mateo rizal','COD','b08882ee-51db-46b4-8a10-d9f5ac14f149','20241016-5-7TH4T6',NULL,'2024-10-15 17:11:18','2024-10-15 17:46:38','Cancelled',NULL,''),(117,5,'#16 St. Micheal','San mateo rizal','COD','5a722a14-fa1d-4ad6-adc4-303b9e771b80','20241016-5-VMP17W',NULL,'2024-10-15 17:19:09','2024-10-15 17:36:49','Cancelled',NULL,''),(118,5,'#16 St. Micheal','San mateo rizal','GCash','ae5e5075-66b2-445e-8e4f-2c17c54bf5ad','20241016-5-2HZMHV','123213211553543','2024-10-15 17:50:30','2024-10-15 18:41:02','Completed','receipts/26Y2Wn9zmGQLNp9htZFQrpbwrSHqsNzNXiHN3joI.jpg',''),(119,5,'#16 St. Micheal','San mateo rizal','COD','29c6a9ef-75eb-47bb-a962-d25880e18dfb','20241016-5-LSHAQ2',NULL,'2024-10-15 18:37:13','2024-10-15 18:40:53','Completed',NULL,''),(121,1,'dasda','adasdas','GCash','fd8a2a15-14eb-4452-ac9e-d2dc0f9b6ab4','20241016-1-XA2XVJ','asdasdasdasdas','2024-10-15 23:51:43','2024-10-15 23:52:25','Cancelled','receipts/q0V9FLTASr2AVIhphhGR27wVGCUP7IlPwtTCWQFO.jpg',''),(122,1,'#16 St. Micheal','San mateo rizal','COD','d425b5f0-0592-448b-aa96-d24b3c98e01a','20241016-1-30VWFC',NULL,'2024-10-16 04:38:58','2024-10-17 18:33:14','Cancelled',NULL,''),(123,1,'#16 St. Micheal','San mateo rizal','COD','99d30b2f-dadf-4dd7-b946-39a9041b2794','20241016-1-1X0C8C',NULL,'2024-10-16 05:16:43','2024-10-17 18:33:11','Cancelled',NULL,'Jossel Alfred Rempillo Rempis'),(124,1,'#16 St. Micheal','San mateo rizal','GCash','5c7accff-5504-407c-9d2f-86c10533dad9','20241018-1-M7RCV8','21312312312','2024-10-17 19:07:50','2024-10-17 19:07:50','Pending','receipts/pkdV79TQ8bAokgs1kkbBgVBgUX1J237a4wwHam1s.png','Jossel Alfred Rempillo Rempis'),(125,7,'#16 St. Micheal','San mateo rizal','GCash','a3075b54-2e2b-47cb-977b-4e5a2b5fe5fb','20241018-7-XC2MUM','123213211553543','2024-10-18 05:16:10','2024-10-18 05:23:20','Completed','receipts/TLaVdnj1Ippj4pWaVynnUufgOiUL2iNyoqDaS0Sq.png','JC LUKA'),(126,1,'#16 St. Micheal','San mateo rizal','COD','282cf574-1cba-4798-84c3-cd63db758f83','20250107-1-SLKMZN',NULL,'2025-01-07 05:35:35','2025-01-07 05:35:35','Pending',NULL,'Jossel Alfred Rempillo Rempis'),(127,1,'#16 St. Micheal','San mateo rizal','COD','bfce9f06-7501-4c28-aa24-1dce94c29967','20250107-1-JXQVS3',NULL,'2025-01-07 05:40:22','2025-01-07 05:40:57','Processing',NULL,'Jossel Alfred Rempillo Rempis');
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
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders_product`
--

LOCK TABLES `orders_product` WRITE;
/*!40000 ALTER TABLE `orders_product` DISABLE KEYS */;
INSERT INTO `orders_product` VALUES (2,31,1,'16oz',5,532.45,2662.25,'2024-10-11 01:18:21','2024-10-11 01:18:21'),(3,32,2,'16oz',2,959.79,1919.58,'2024-10-11 01:20:32','2024-10-11 01:20:32'),(4,33,4,'16oz',1,557.09,557.09,'2024-10-11 01:21:56','2024-10-11 01:21:56'),(5,34,9,'16oz',1,42.23,42.23,'2024-10-11 21:24:12','2024-10-11 21:24:12'),(6,35,1,'16oz',1,532.45,532.45,'2024-10-11 23:31:50','2024-10-11 23:31:50'),(7,36,3,'16oz',1,793.21,793.21,'2024-10-12 05:41:05','2024-10-12 05:41:05'),(8,39,2,'16oz',1,949.79,949.79,'2024-10-12 07:21:52','2024-10-12 07:21:52'),(9,43,2,'16oz',1,949.79,949.79,'2024-10-12 07:40:03','2024-10-12 07:40:03'),(10,44,2,'16oz',1,949.79,949.79,'2024-10-12 07:42:10','2024-10-12 07:42:10'),(11,45,2,'16oz',2,949.79,1899.58,'2024-10-12 08:08:39','2024-10-12 08:08:39'),(12,46,1,'16oz',1,532.45,532.45,'2024-10-12 08:28:39','2024-10-12 08:28:39'),(13,47,2,'16oz',1,949.79,949.79,'2024-10-13 17:48:37','2024-10-13 17:48:37'),(14,48,2,'16oz',1,949.79,949.79,'2024-10-13 17:58:22','2024-10-13 17:58:22'),(15,53,2,'16oz',2,949.79,1899.58,'2024-10-13 19:29:26','2024-10-13 19:29:26'),(16,58,4,'16oz',1,557.09,557.09,'2024-10-13 19:35:03','2024-10-13 19:35:03'),(17,60,2,'16oz',1,949.79,949.79,'2024-10-13 23:25:58','2024-10-13 23:25:58'),(18,61,16,'16oz',1,100.00,100.00,'2024-10-13 23:27:55','2024-10-13 23:27:55'),(19,62,2,'16oz',1,959.79,959.79,'2024-10-14 00:43:15','2024-10-14 00:43:15'),(20,63,2,'16oz',1,949.79,949.79,'2024-10-14 00:48:16','2024-10-14 00:48:16'),(21,67,3,'16oz',1,793.21,793.21,'2024-10-14 00:54:58','2024-10-14 00:54:58'),(22,68,2,'16oz',1,949.79,949.79,'2024-10-14 01:02:26','2024-10-14 01:02:26'),(23,70,3,'16oz',2,793.21,1586.42,'2024-10-14 01:07:36','2024-10-14 01:07:36'),(24,75,3,'16oz',1,793.21,793.21,'2024-10-14 01:10:02','2024-10-14 01:10:02'),(25,77,4,'16oz',1,567.09,567.09,'2024-10-14 01:12:59','2024-10-14 01:12:59'),(26,77,3,'16oz',1,793.21,793.21,'2024-10-14 01:12:59','2024-10-14 01:12:59'),(27,77,6,'16oz',1,641.37,641.37,'2024-10-14 01:12:59','2024-10-14 01:12:59'),(28,77,4,'16oz',1,557.09,557.09,'2024-10-14 01:12:59','2024-10-14 01:12:59'),(29,78,3,'16oz',1,793.21,793.21,'2024-10-14 01:17:02','2024-10-14 01:17:02'),(30,78,4,'16oz',1,557.09,557.09,'2024-10-14 01:17:02','2024-10-14 01:17:02'),(31,78,5,'16oz',1,870.05,870.05,'2024-10-14 01:17:02','2024-10-14 01:17:02'),(32,78,6,'16oz',1,641.37,641.37,'2024-10-14 01:17:02','2024-10-14 01:17:02'),(33,85,3,'16oz',1,793.21,793.21,'2024-10-14 01:29:10','2024-10-14 01:29:10'),(34,85,5,'16oz',1,870.05,870.05,'2024-10-14 01:29:10','2024-10-14 01:29:10'),(35,85,6,'16oz',1,641.37,641.37,'2024-10-14 01:29:10','2024-10-14 01:29:10'),(36,91,9,'16oz',1,42.23,42.23,'2024-10-14 01:34:50','2024-10-14 01:34:50'),(37,91,3,'16oz',1,793.21,793.21,'2024-10-14 01:34:50','2024-10-14 01:34:50'),(38,91,5,'16oz',1,870.05,870.05,'2024-10-14 01:34:50','2024-10-14 01:34:50'),(39,91,6,'16oz',1,641.37,641.37,'2024-10-14 01:34:50','2024-10-14 01:34:50'),(40,92,3,'16oz',1,793.21,793.21,'2024-10-14 01:36:13','2024-10-14 01:36:13'),(41,92,5,'16oz',1,870.05,870.05,'2024-10-14 01:36:13','2024-10-14 01:36:13'),(42,92,6,'16oz',1,641.37,641.37,'2024-10-14 01:36:13','2024-10-14 01:36:13'),(43,93,3,'16oz',1,793.21,793.21,'2024-10-14 01:37:51','2024-10-14 01:37:51'),(44,93,5,'16oz',1,870.05,870.05,'2024-10-14 01:37:51','2024-10-14 01:37:51'),(45,95,3,'16oz',1,793.21,793.21,'2024-10-14 01:51:37','2024-10-14 01:51:37'),(46,97,3,'16oz',1,793.21,793.21,'2024-10-14 01:58:20','2024-10-14 01:58:20'),(47,99,3,'16oz',1,793.21,793.21,'2024-10-14 01:59:52','2024-10-14 01:59:52'),(48,100,2,'16oz',1,949.79,949.79,'2024-10-14 02:00:22','2024-10-14 02:00:22'),(49,101,17,'16oz',1,159.00,159.00,'2024-10-14 02:01:40','2024-10-14 02:01:40'),(50,102,3,'16oz',1,793.21,793.21,'2024-10-14 02:05:27','2024-10-14 02:05:27'),(51,103,3,'16oz',1,793.21,793.21,'2024-10-14 02:12:24','2024-10-14 02:12:24'),(52,103,4,'16oz',1,557.09,557.09,'2024-10-14 02:12:24','2024-10-14 02:12:24'),(53,103,5,'16oz',1,870.05,870.05,'2024-10-14 02:12:24','2024-10-14 02:12:24'),(54,103,6,'16oz',1,641.37,641.37,'2024-10-14 02:12:24','2024-10-14 02:12:24'),(55,104,3,'16oz',1,793.21,793.21,'2024-10-14 17:20:12','2024-10-14 17:20:12'),(56,107,3,'16oz',1,793.21,793.21,'2024-10-14 17:23:57','2024-10-14 17:23:57'),(57,109,3,'16oz',1,793.21,793.21,'2024-10-14 17:34:42','2024-10-14 17:34:42'),(58,113,2,'16oz',1,949.79,949.79,'2024-10-14 18:31:49','2024-10-14 18:31:49'),(59,114,3,'16oz',1,793.21,793.21,'2024-10-14 18:34:51','2024-10-14 18:34:51'),(60,115,16,'16oz',1,110.00,110.00,'2024-10-15 16:27:08','2024-10-15 16:27:08'),(61,116,2,'16oz',1,949.79,949.79,'2024-10-15 17:11:18','2024-10-15 17:11:18'),(62,117,3,'16oz',1,793.21,793.21,'2024-10-15 17:19:09','2024-10-15 17:19:09'),(63,117,5,'16oz',1,870.05,870.05,'2024-10-15 17:19:09','2024-10-15 17:19:09'),(64,118,3,'16oz',1,803.21,803.21,'2024-10-15 17:50:30','2024-10-15 17:50:30'),(65,119,5,'16oz',1,870.05,870.05,'2024-10-15 18:37:13','2024-10-15 18:37:13'),(66,121,2,'16oz',2,949.79,1899.58,'2024-10-15 23:51:43','2024-10-15 23:51:43'),(67,122,2,'16oz',5,949.79,4748.95,'2024-10-16 04:38:58','2024-10-16 04:38:58'),(68,123,2,'16oz',1,949.79,949.79,'2024-10-16 05:16:43','2024-10-16 05:16:43'),(69,124,16,'16oz',2,100.00,200.00,'2024-10-17 19:07:50','2024-10-17 19:07:50'),(70,125,16,'16oz',1,100.00,100.00,'2024-10-18 05:16:10','2024-10-18 05:16:10'),(71,126,5,'16oz',1,880.05,880.05,'2025-01-07 05:35:35','2025-01-07 05:35:35');
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'products/8pXdM8dbiVgS8wFTf0od0aJxsMVNsjHoCjA5ydQj.png','Iced Americano',532.45,'cum veritatis sapiente. Possimus est non error molestias vitae atque. Alias explicabo harum ad dolore. Rem odio qui autem modi consectetur. Accusantium porro qui cupiditate officiis distinctio veritatis omnis et.',1,50,'2024-09-03 19:10:09','2024-10-08 18:48:30'),(2,'https://via.placeholder.com/640x480.png/004488?text=doloribus','sed',949.79,'Nulla fugit consectetur quaerat fugit beatae ipsa. Cupiditate est omnis incidunt nisi quae adipisci. Repellendus praesentium delectus voluptatem molestiae deserunt praesentium enim. Rem pariatur eum incidunt dolore.',2,100,'2024-09-03 19:10:09','2024-10-03 23:43:00'),(3,'products/akyUcfQCkjYnQqKlABa9AAFHmhhaoGsS9ieqXDg7.jpg','vel',793.21,'Voluptates dolorem ad ipsam aliquam sunt eum. Doloribus sit consequuntur sed inventore quo quia qui. Accusantium quia a qui autem quam aspernatur quos recusandae. Occaecati aspernatur est eum quis soluta nostrum impedit occaecati. Id est incidunt saepe rerum aut eaque. A aliquid deleniti debitis vero.',3,98,'2024-09-03 19:10:09','2024-10-14 23:36:40'),(4,'https://via.placeholder.com/640x480.png/001133?text=suscipit','iste',557.09,'Expedita molestiae itaque non aut. Dolore ipsum accusantium architecto aspernatur occaecati. Dignissimos assumenda dolorem est aut neque quo. Aliquam aut a et iusto ea et et atque.',1,3,'2024-09-03 19:10:09','2024-10-03 22:46:47'),(5,'https://via.placeholder.com/640x480.png/0088aa?text=sint','porro',870.05,'Optio aliquid quis fugiat et autem sunt. Quisquam voluptatem at iste voluptatem. Temporibus voluptas quam est tempore debitis neque vero. Hic voluptatem aut temporibus sit. Praesentium deleniti temporibus voluptas beatae nihil perspiciatis. Libero perspiciatis sunt aut tenetur natus eos rerum. Qui alias est omnis dolores.',3,31,'2024-09-03 19:10:09','2024-10-03 22:46:39'),(6,'https://via.placeholder.com/640x480.png/00cc66?text=eos','aperiam',641.37,'Eum ut sunt cum similique ex. Quisquam illum labore voluptate numquam consectetur tempora nemo. Doloribus consequatur esse rerum blanditiis commodi. Eius cumque aut repellendus. Illo eligendi est molestiae. Voluptas suscipit nihil at nisi molestiae cum at ut.',3,66,'2024-09-03 19:10:09','2024-10-03 22:46:31'),(8,'https://via.placeholder.com/640x480.png/0033dd?text=mollitia','excepturi',552.11,'Ut cum magni optio est repellendus quia sint. Itaque amet veniam magni iusto qui sequi amet eligendi. Sint magni quis aliquam porro quibusdam. Quis odit molestiae illo unde rerum laudantium. Exercitationem quia rerum velit enim aut nisi ipsum.',1,23,'2024-09-03 19:10:09','2024-10-03 22:29:50'),(9,'https://via.placeholder.com/640x480.png/0044cc?text=nulla','consectetur',42.23,'Voluptas et ut maiores dolores. Aut numquam nisi porro quo laborum numquam quaerat. Nobis cum ipsam suscipit repudiandae. Est fuga facere necessitatibus explicabo provident. Voluptatem numquam minima rerum est.',2,80,'2024-09-03 19:10:09','2024-10-03 22:46:23'),(10,'https://via.placeholder.com/640x480.png/000033?text=aut','illum',886.80,'Officiis nostrum magni at qui. Nam dolor soluta magni. Recusandae et facilis dolorem eos officia aliquam. Ab earum rerum et voluptatem qui minima officiis iste. Suscipit et eos ut molestiae dolorem minima. Rem et qui qui omnis assumenda quos provident officiis. Incidunt rerum dignissimos minus nulla dolor dolores dolor.',2,23,'2024-09-03 19:10:09','2024-10-03 22:46:18'),(16,'products/C38LFlCmh0xgy0dAYwM6Y4epcvNOrFBqmua7lb2u.jpg','Iced Latte',100.00,'Iced Latte',1,100,'2024-10-03 22:46:05','2024-10-03 22:46:05'),(17,'products/3Dz6sI89qLADcqEmWBn2otXHTSAWZDfgEUhQbPuP.jpg','Spanish Latte',159.00,'Spanish Latte',1,99,'2024-10-08 18:32:39','2024-10-08 18:32:39');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff`
--

LOCK TABLES `staff` WRITE;
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
INSERT INTO `staff` VALUES (2,'staff','josselrempis02@gmail.com',NULL,'$2y$10$k6jHrlJBW0MgYxQ1zm8HPuqoWSM1RaY6tDq9MzBOAbK8vMNE2a7Fq',NULL,'2024-10-16 18:02:54','2024-10-16 18:02:54'),(3,'JC luka','jcalmarioooo@gmail.com',NULL,'$2y$10$QXd8sm3mAeN6h7qr.Q95Uewtw76vLgbGpHIzXQU6Ro1iG9hdfMtem',NULL,'2024-10-18 05:18:39','2024-10-18 05:18:39');
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Jossel','josselrempis02@gmail.com',NULL,NULL,'$2y$10$EHsoOSUssoUkMy4G3RobguzQwyxIpRd7j92i4vosGC7OSBjxsxbBq','09167790175','#16 St. Micheal #16 St. Micheal #16 St. Micheal #16 St. Micheal #16 St. Micheal #16 St. Micheal',NULL,'2024-09-03 19:02:04','2024-10-17 17:37:32'),(2,'Rempis, Jossel Alfred R.','rempis.jossel.bsinfotech@gmail.com','115918198215882782543',NULL,'eyJpdiI6ImluQmNRRnNVODlQSTBaSU96Z0JwOFE9PSIsInZhbHVlIjoicDYweGVEVVZYdm5TT3hGSWdtblFwV3gwckVkNWc2cC85dGhOSi9kMFRpZz0iLCJtYWMiOiI1MDg5ZDY4Nzc5NjkyZGNkNTJiOTY4OTMzNWNmMmNlYWIzYTdiMjA2YTgyNTZmOWM0NzkwNjRmMTkyOGRlNWU5IiwidGFnIjoiIn0=','09167790175','San mateo rizal',NULL,'2024-09-24 22:53:36','2024-10-11 21:23:44'),(5,'AJ','ajrempis3@gmail.com','108018855830139003740',NULL,'eyJpdiI6IlVmNU1VQnFvZFc4UUFTWkNocHh2MUE9PSIsInZhbHVlIjoiNDdKUm43cXc3dUxRM1Y2SEtGdjQvK1BENUxJMXVNTWxaOUFVK0lBcnorOD0iLCJtYWMiOiJlZTFhNzExNmU0ZDdiY2NiMDc2Nzc4ZmFmOWM2MTBmNWQ5ZTQ5MjZmMWVjMGRjNGFhYzEzOGZhNTg4N2FiYjllIiwidGFnIjoiIn0=','09167790175','#16 St. Micheal',NULL,'2024-10-14 18:31:16','2024-10-15 17:29:50'),(6,'Kapenista','kapenista@gmail.com','109953682068000041229',NULL,'eyJpdiI6InJpYU1BRWZEazRvZk00VkNXVksvOXc9PSIsInZhbHVlIjoiTXVGU2NqanAwbGJNVzNHSmt3dWxxK3QwaWNVQUpzank1NkF6aHR3WllBVT0iLCJtYWMiOiI2YjMyYjAxMTU4MzI2ZWY1NmQyMjA2YTkxYzg4ZmFmN2FjYjQ1NjQ5Yjc4MWM0NmI5OTRmM2ZiZTM3ZTdmNTYyIiwidGFnIjoiIn0=',NULL,NULL,NULL,'2024-10-14 22:24:46','2024-10-14 22:24:46'),(7,'Jc Luka23','jcalmarioooo@gmail.com',NULL,NULL,'$2y$10$ZHFAJunPVxy7HNvkrnYamuC37YIJBpk2wuRPRy6yf8zkmQj1wXlQG','09167790175','Tondo,Manila',NULL,'2024-10-18 05:13:08','2024-10-18 05:13:23');
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

-- Dump completed on 2025-01-07 21:47:24
