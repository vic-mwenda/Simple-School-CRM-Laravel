-- MySQL dump 10.13  Distrib 5.7.42, for Linux (x86_64)
--
-- Host: localhost    Database: CRM
-- ------------------------------------------------------
-- Server version	5.7.42-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `campus_courses`
--

DROP TABLE IF EXISTS `campus_courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `campus_courses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `campus_id` int(10) unsigned NOT NULL,
  `course_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campus_courses`
--

LOCK TABLES `campus_courses` WRITE;
/*!40000 ALTER TABLE `campus_courses` DISABLE KEYS */;
INSERT INTO `campus_courses` VALUES (1,1,1,NULL,NULL),(2,2,1,NULL,NULL),(3,2,2,NULL,NULL),(4,3,2,NULL,NULL),(5,1,3,NULL,NULL),(6,3,3,NULL,NULL),(7,2,4,NULL,NULL),(8,3,4,NULL,NULL),(9,2,5,NULL,NULL),(10,1,5,NULL,NULL),(11,2,6,NULL,NULL),(12,3,6,NULL,NULL),(13,1,7,NULL,NULL),(14,2,7,NULL,NULL),(15,2,8,NULL,NULL),(16,3,8,NULL,NULL),(17,3,9,NULL,NULL),(18,4,9,NULL,NULL);
/*!40000 ALTER TABLE `campus_courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `campuses`
--

DROP TABLE IF EXISTS `campuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `campuses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campuses`
--

LOCK TABLES `campuses` WRITE;
/*!40000 ALTER TABLE `campuses` DISABLE KEYS */;
INSERT INTO `campuses` VALUES (1,'campus 1',NULL,NULL),(2,'campus 2',NULL,NULL),(3,'campus 3',NULL,NULL),(4,'Campus 3',NULL,NULL),(5,'Campus 1',NULL,NULL),(6,'Campus 2',NULL,NULL);
/*!40000 ALTER TABLE `campuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chartello_dashboards`
--

DROP TABLE IF EXISTS `chartello_dashboards`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chartello_dashboards` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chartello_dashboards`
--

LOCK TABLES `chartello_dashboards` WRITE;
/*!40000 ALTER TABLE `chartello_dashboards` DISABLE KEYS */;
INSERT INTO `chartello_dashboards` VALUES (1,'Overview','2023-06-02 08:33:16','2023-06-02 08:33:16');
/*!40000 ALTER TABLE `chartello_dashboards` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chartello_panels`
--

DROP TABLE IF EXISTS `chartello_panels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chartello_panels` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'trend-chart',
  `dashboard_id` bigint(20) unsigned NOT NULL,
  `settings` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `chartello_panels_dashboard_id_foreign` (`dashboard_id`),
  CONSTRAINT `chartello_panels_dashboard_id_foreign` FOREIGN KEY (`dashboard_id`) REFERENCES `chartello_dashboards` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chartello_panels`
--

LOCK TABLES `chartello_panels` WRITE;
/*!40000 ALTER TABLE `chartello_panels` DISABLE KEYS */;
INSERT INTO `chartello_panels` VALUES (1,'Recent Users','trend-chart',1,'{\"query\": \"SELECT id, name, email, created_at as x\\nFROM users as y\\nWHERE created_at BETWEEN @start AND @end\\nORDER BY created_at ASC\"}','2023-06-02 08:33:16','2023-06-02 09:02:24'),(2,'Users','trend-chart',1,'{\"query\": \"SELECT COUNT(*) AS y, DATE(created_at) AS x\\nFROM users\\nWHERE created_at BETWEEN @start AND @end\\nGROUP BY x\\nORDER BY x ASC\"}','2023-06-02 08:33:16','2023-06-02 08:33:16'),(3,NULL,'trend-chart',1,'{\"query\": \"SELECT COUNT(*) AS y,\\nDATE(created_at) AS x\\nFROM inquiries\\nWHERE created_at BETWEEN @start AND @end\\nGROUP BY x\\nORDER BY x ASC\"}','2023-06-02 08:33:32','2023-06-02 08:35:20');
/*!40000 ALTER TABLE `chartello_panels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `courses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `course_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` VALUES (1,'Course 1','CIT','diploma','2023-06-09 07:53:15','2023-06-09 07:53:15'),(2,'Course 2','CIT','diploma','2023-06-09 07:53:15','2023-06-09 07:53:15'),(3,'Course 3','CIT','diploma','2023-06-09 07:53:15','2023-06-09 07:53:15'),(4,'Course 4','CIT','diploma','2023-06-09 07:53:15','2023-06-09 07:53:15'),(5,'Course 5','CIT','certificate','2023-06-09 07:53:15','2023-06-09 07:53:15'),(6,'Course 6','CIT','degree','2023-06-09 07:53:15','2023-06-09 07:53:15'),(7,'Bachelor of Business Information Technology','Department of Information Technology','female','2023-06-09 08:35:39','2023-06-09 08:35:39'),(8,'Diploma in Business Management','Department of Biology','other','2023-06-09 10:04:26','2023-06-09 10:04:26'),(9,'Bachelor of finance','Department of Biology','other','2023-06-09 12:34:54','2023-06-09 12:34:54');
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'between 21-30',
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education_level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institution_attended` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `field_of_study` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `how_did_you_hear` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `consent_terms` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`id`),
  UNIQUE KEY `customers_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (4,'Babu','babuowino@gmail.com','0759261505','2023-06-26','male','highSchool','Mangu high school','Technology and Science','printAdvertisement',1,'2023-06-09 12:32:38','2023-06-15 12:22:54','ALB','AL-03','rongai','2021',7,'active'),(5,'zoza brands','mwendav63@gmail.com','0759261505',NULL,'male','highSchool',NULL,'Technology and Science','website',1,'2023-06-09 12:33:01','2023-06-19 06:47:42','KEN','KE-110','rongai','2021',7,'active'),(9,'zoza brands','mwendav126@gmail.com','0759261505','2023-06-22','male','highSchool','Mangu high school','Technology and Science','website',1,'2023-06-09 13:35:02','2023-06-15 11:40:07','KEN','KE-110','rongai','2021',19,'active'),(10,'Kevin Gitonga','Kevingitonga@gmail.com','0759261505','2023-06-22','female','bachelors','Multimedia University of Kenya','Education','onlineAdvertisement',1,'2023-06-09 19:15:41','2023-06-09 19:15:41','KEN','KE-400','Embu','2021',7,'pending'),(11,'brandy','mwendav67@gmail.com','0759261505','2023-06-13','female','highSchool','Alliance high school','Media','onlineAdvertisement',1,'2023-06-10 07:49:28','2023-06-10 07:49:28','KEN','KE-110','rongai','2021',7,'pending'),(13,'Kevin Kimani','Kevkim@gmail.com','0759261505','2023-06-14','other','bachelors','Mangu high school','Technology and Science','friendsFamily',1,'2023-06-12 12:39:38','2023-06-12 12:39:38','KEN','KE-110','rongai','2021',7,'pending'),(15,'john doe','johndoe@example.com','0759261505','2023-06-22','male','doctorate','Multimedia University of Kenya','Technology and Science','website',1,'2023-06-13 08:04:41','2023-06-13 08:38:41','KEN','KE-110','rongai','2021',7,'active'),(16,'Kevin Njenga','kevin.njenga@gmail.com','0759261505','2023-06-16','male','bachelors','Multimedia University of Kenya','Technology and Science','socialMedia',1,'2023-06-14 14:40:43','2023-06-14 14:40:43','ARE','AE-AJ','rongai','2021',7,'pending'),(17,'Kaka','kaka.done@gmail.com','0745322341','2023-06-28','male','highSchool','Multimedia University of Kenya','Technology and Science','printAdvertisement',1,'2023-06-15 10:15:58','2023-06-15 10:15:58','ALB','AL-10','rongai','2021',19,'pending'),(18,'Kevin Ndemo','kevin.ndemo@gmail.com','0759261505','2023-06-19','male','highSchool','Multimedia University of Kenya','Business','website',1,'2023-06-15 10:42:49','2023-06-15 10:42:49','BEL','BE-BRU','rongai','2021',19,'pending'),(19,'zoza brands','mwendav620@gmail.com','0759261505','2023-06-16','male','highSchool','Mangu high school','Technology and Science','onlineAdvertisement',1,'2023-06-15 11:42:51','2023-06-15 11:42:51','KEN','KE-110','rongai','2021',31,'pending'),(20,'Jane Doe','janedoe@gmail.com','0759261505','2023-06-09','other','masters','Mangu high school','Media','friendsFamily',1,'2023-06-18 10:36:46','2023-06-18 10:36:46','AND','AD-02','rongai','2021',35,'pending'),(21,'brandy','brandy@gmail.com','0759261505','Between 31-40','female','masters','Mangu high school','Technology and Science','socialMedia',1,'2023-06-18 18:00:04','2023-06-18 18:00:04','BDI','BI-BB','rongai','2021',32,'pending'),(22,'zoza brands','mwendav6@gmail.com','0759261505','Between 10-20','male','highSchool','Mangu high school','Technology and Science','onlineAdvertisement',1,'2023-06-20 14:01:30','2023-06-21 12:30:01','ABW',NULL,'rongai','2021',19,'active'),(23,'Victor Mwenda','victor.mwenda@zetech.ac.ke','0759261505','Between 31-40','female','highSchool','Mangu high school','Education','onlineAdvertisement',1,'2023-06-21 08:04:18','2023-06-21 08:04:18','KEN','KE-110','Nairobi','00100',7,'pending'),(24,'Victor Mwenda','mwendav36@gmail.com','0759261505','Between 31-40','female','highSchool','Mangu high school','Business','friendsFamily',1,'2023-06-21 09:42:28','2023-06-21 09:42:28','KEN','KE-110','Nairobi','00100',7,'pending'),(25,'King','king@zetech.ac.ke','0759261505','Between 31-40','female','highSchool','Mangu high school','Technology and Science','socialMedia',1,'2023-06-21 10:48:23','2023-06-21 10:48:23','KEN','KE-110','rongai','2021',7,'pending'),(26,'Joel Masika','joe@gmail.com','0759261505','Between 10-20','male','highSchool','Multimedia University of Kenya','Technology and Science','friendsFamily',1,'2023-06-21 10:54:21','2023-06-21 10:54:21','KEN','KE-110','rongai','2021',19,'pending'),(28,'Farmer mine','farmer.mine@gmail.com','0718304754','Between 10-20','male','highSchool','Mangu high school','Technology and Science','printAdvertisement',1,'2023-06-21 11:09:01','2023-06-21 11:09:01','ARG','AR-F','rongai','2021',19,'pending'),(29,'mimosa','mimosa@gmail.com','0718304754','Between 10-20','male','highSchool','Mangu high school','Technology and Science','socialMedia',1,'2023-06-21 11:14:39','2023-06-21 11:14:39','KEN','KE-110','rongai','2021',19,'pending'),(30,'minosa','minosa@gmail.com','254718304754','Between 10-20','male','masters','Multimedia University of Kenya','Technology and Science','socialMedia',1,'2023-06-21 11:16:11','2023-06-21 11:16:11','ARE','AE-AJ','rongai','2021',19,'pending'),(31,'Dante','dante@gmail.com','0759261505','Between 10-20','male','masters','Multimedia University of Kenya','Business','socialMedia',1,'2023-06-22 09:52:25','2023-06-22 09:52:25','KEN','KE-110','rongai','2021',7,'pending'),(32,'Devic','devicdevelopers@gmail.com','0759261505','Between 31-40','male','highSchool','Multimedia University of Kenya','Media','website',1,'2023-06-23 08:31:40','2023-06-23 08:31:40','ATF','TF-X01~','rongai','2021',7,'pending'),(33,'Janice Stone','Janice.stone@gmail.com','0759261505','Between 10-20','male','masters','Multimedia University of Kenya','Education','friendsFamily',1,'2023-06-23 14:16:31','2023-06-23 14:16:31','KEN','KE-110','rongai','2021',37,'pending');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
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
-- Table structure for table `feedbacks`
--

DROP TABLE IF EXISTS `feedbacks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feedbacks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `inquiry_id` bigint(20) unsigned NOT NULL,
  `customer_id` bigint(20) unsigned NOT NULL,
  `feedback` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `feedbacks_inquiry_id_foreign` (`inquiry_id`),
  KEY `feedbacks_customer_id_foreign` (`customer_id`),
  CONSTRAINT `feedbacks_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `feedbacks_inquiry_id_foreign` FOREIGN KEY (`inquiry_id`) REFERENCES `inquiries` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedbacks`
--

LOCK TABLES `feedbacks` WRITE;
/*!40000 ALTER TABLE `feedbacks` DISABLE KEYS */;
INSERT INTO `feedbacks` VALUES (1,119,32,'They are still thinking about the course','2023-06-23 10:10:43','2023-06-23 10:10:43'),(2,90,20,'I do not want the course anymore','2023-06-23 10:37:48','2023-06-23 10:37:48'),(3,119,32,'Couldnt manage to apply','2023-06-23 13:06:56','2023-06-23 13:06:56'),(4,87,18,'no reply','2023-06-23 14:11:55','2023-06-23 14:11:55'),(5,120,33,'Will be registering for the units very soon','2023-06-23 14:17:17','2023-06-23 14:17:17');
/*!40000 ALTER TABLE `feedbacks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `flights`
--

DROP TABLE IF EXISTS `flights`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `flights` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `flights`
--

LOCK TABLES `flights` WRITE;
/*!40000 ALTER TABLE `flights` DISABLE KEYS */;
/*!40000 ALTER TABLE `flights` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inquiries`
--

DROP TABLE IF EXISTS `inquiries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inquiries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `message` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `customer_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mode_of_inquiry` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'walk in',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inquiries`
--

LOCK TABLES `inquiries` WRITE;
/*!40000 ALTER TABLE `inquiries` DISABLE KEYS */;
INSERT INTO `inquiries` VALUES (78,'How much do we pay school fees per semester','2023-06-09 19:15:41','2023-06-09 19:15:41',10,7,'Bachelor of Business Information Technology','walk in'),(84,'Wanted to get further information about the course offered','2023-06-14 14:40:43','2023-06-14 14:40:43',16,7,'Diploma in Business Management','walk in'),(87,'Enrollment for this course','2023-06-15 10:42:49','2023-06-15 10:42:49',18,19,'Bachelor of Business Information Technology','walk in'),(90,'Information management','2023-06-18 10:36:46','2023-06-18 10:36:46',20,35,'Bachelor of Business Information Technology','walk in'),(91,'Nothing to Inquire','2023-06-18 18:00:04','2023-06-18 18:00:04',21,32,'Bachelor of Business Information Technology','walk in'),(94,'wanted to enroll','2023-06-21 07:59:17','2023-06-21 07:59:17',22,7,'Diploma in Business Management','walk in'),(103,'Wanted more information about the course','2023-06-21 10:39:16','2023-06-21 10:39:16',23,7,'Bachelor of Business Information Technology','walk in'),(113,'I am encountering an issue when updating PHP','2023-06-21 11:01:18','2023-06-21 11:01:18',22,19,'Bachelor of Business Information Technology','walk in'),(115,'Information Management','2023-06-21 11:09:02','2023-06-21 11:09:02',28,19,'Bachelor of Business Information Technology','walk in'),(116,'I am encountering an issue when updating PHP','2023-06-21 11:14:40','2023-06-21 11:14:40',29,19,'Bachelor of Business Information Technology','walk in'),(117,'I am encountering an issue when updating PHP','2023-06-21 11:16:11','2023-06-21 11:16:11',30,19,'Bachelor of Business Information Technology','walk in'),(118,'wanted to know where the course is offered','2023-06-22 09:52:26','2023-06-22 09:52:26',31,7,'Bachelor of Business Information Technology','telephone'),(119,'Program Duration and Scheduling','2023-06-23 08:31:40','2023-06-23 08:31:40',32,7,'Bachelor of Business Information Technology','whatsapp'),(120,'Career Opportunities and Alumni Network','2023-06-23 14:16:31','2023-06-23 14:16:31',33,37,'Diploma in Business Management','telephone');
/*!40000 ALTER TABLE `inquiries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2023_05_18_130037_create_flights_table',1),(6,'2023_05_24_114209_add_role_column',2),(7,'2023_05_24_143938_create_inquiries_table',3),(9,'2023_05_26_062632_user_logs_table',4),(12,'2023_05_26_094709_add_logger_column_inquiries',5),(13,'2023_05_30_103755_google_social_auth_id',6),(14,'2023_05_31_101411_create_password_default',7),(15,'2023_05_31_112630_create_first_login_column',8),(16,'create_dashboards_table',9),(17,'create_panels_table',9),(18,'2023_06_05_135630_create_campus_column_users',10),(19,'2023_06_06_123216_create_customers_table',11),(20,'2023_06_06_165530_create_courses__table',12),(21,'2023_06_07_104205_modify_inquiries_table',13),(22,'2023_06_07_105637_modify_inquiries_table',14),(23,'2023_06_07_110445_modifyy_inquiries_table',15),(24,'2023_06_07_123822_modifyy_customers_table',16),(25,'2023_06_09_102430_create_campuses_table',17),(26,'2023_06_09_102430_create_courses_table',18),(27,'2023_06_09_131601_alter_inquiries_table',19),(28,'2023_06_09_131936_alter_inquiries_table',20),(29,'2023_06_13_113304_add_status_to_customers_table',21),(30,'2023_06_13_155259_create_targets_table',22),(31,'2023_06_14_113804_add_column_users_table',23),(32,'2023_06_14_153618_add_column_last_table',24),(33,'2023_06_15_142444_add_column_to_user_logs',25),(34,'2023_06_16_124523_modify_targets_table',26),(35,'2023_06_23_115415_create_feedbacks_table',27);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
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
INSERT INTO `password_reset_tokens` VALUES ('boy.director@zetech.ac.ke','$2y$10$T.diHWWA7Td6VmmdftFhlOH2RXpJp/aMHq8Yt98W62Dq3qSNhNbGi','2023-06-19 07:22:41');
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
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
-- Table structure for table `user_log`
--

DROP TABLE IF EXISTS `user_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_log` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `ip` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mac` varchar(17) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_log`
--

LOCK TABLES `user_log` WRITE;
/*!40000 ALTER TABLE `user_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_logs`
--

DROP TABLE IF EXISTS `user_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_logs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `ip` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mac` varchar(17) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=202 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_logs`
--

LOCK TABLES `user_logs` WRITE;
/*!40000 ALTER TABLE `user_logs` DISABLE KEYS */;
INSERT INTO `user_logs` VALUES (1,NULL,'Boy','boy.director@zetech.ac.ke','127.0.0.1','',NULL,NULL,NULL),(2,NULL,'Boy','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-26 05:07:20','2023-05-26 05:07:20'),(3,NULL,'Boy','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-26 05:12:58','2023-05-26 05:12:58'),(4,NULL,'Boy','boy.director@zetech.ac.ke','fe80::f119:3160:84ed:1c8','',NULL,'2023-05-26 05:17:00','2023-05-26 05:17:00'),(5,NULL,'Boy','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-26 05:58:11','2023-05-26 05:58:11'),(6,NULL,'Boy','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-26 05:58:55','2023-05-26 05:58:55'),(7,NULL,'Boy','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-26 06:05:41','2023-05-26 06:05:41'),(8,NULL,'King','king@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-26 06:26:22','2023-05-26 06:26:22'),(9,NULL,'Boy','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-26 06:27:09','2023-05-26 06:27:09'),(10,NULL,'King','king@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-26 06:31:33','2023-05-26 06:31:33'),(11,NULL,'Boy','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-26 06:38:52','2023-05-26 06:38:52'),(12,NULL,'Boy','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-26 08:00:54','2023-05-26 08:00:54'),(13,NULL,'Boy','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-26 14:58:57','2023-05-26 14:58:57'),(14,NULL,'Boy','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-27 06:54:39','2023-05-27 06:54:39'),(15,NULL,'Boy','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-28 09:26:50','2023-05-28 09:26:50'),(16,NULL,'Boyz','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-29 05:54:16','2023-05-29 05:54:16'),(17,NULL,'King','king@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-29 05:57:12','2023-05-29 05:57:12'),(18,NULL,'King','king@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-29 07:57:09','2023-05-29 07:57:09'),(19,NULL,'Boyz','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-29 08:03:44','2023-05-29 08:03:44'),(20,NULL,'Boyz','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-29 08:11:49','2023-05-29 08:11:49'),(21,NULL,'Boyz','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-29 08:25:40','2023-05-29 08:25:40'),(22,NULL,'Boyz','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-29 10:13:53','2023-05-29 10:13:53'),(23,NULL,'Boyz','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-29 14:30:17','2023-05-29 14:30:17'),(24,NULL,'Boyz','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-30 08:12:07','2023-05-30 08:12:07'),(25,NULL,'Boyz','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-30 09:55:02','2023-05-30 09:55:02'),(26,NULL,'Boyz','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-30 11:44:05','2023-05-30 11:44:05'),(27,NULL,'Boyz','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-30 11:50:35','2023-05-30 11:50:35'),(28,NULL,'Boyz','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-30 17:03:28','2023-05-30 17:03:28'),(29,NULL,'Boyz','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-30 19:17:44','2023-05-30 19:17:44'),(30,NULL,'Boyz','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-30 19:17:55','2023-05-30 19:17:55'),(31,NULL,'Boyz','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-31 07:09:07','2023-05-31 07:09:07'),(32,NULL,'Boyz','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-31 07:12:26','2023-05-31 07:12:26'),(33,NULL,'Boyz','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-31 07:39:15','2023-05-31 07:39:15'),(34,NULL,'Boyz','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-31 08:15:10','2023-05-31 08:15:10'),(35,NULL,'kamau','kamauchege@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-31 08:15:54','2023-05-31 08:15:54'),(36,NULL,'kamau','kamauchege@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-31 08:18:55','2023-05-31 08:18:55'),(37,NULL,'Boyz','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-31 08:19:07','2023-05-31 08:19:07'),(38,NULL,'kim','kim@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-31 08:19:46','2023-05-31 08:19:46'),(39,NULL,'Victor Mwenda','victor.mwenda@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-31 08:41:18','2023-05-31 08:41:18'),(40,NULL,'Boyz','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-31 08:51:49','2023-05-31 08:51:49'),(41,NULL,'Boyz','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-31 09:39:19','2023-05-31 09:39:19'),(42,NULL,'kingjakob','king.jakob@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-31 09:40:04','2023-05-31 09:40:04'),(43,NULL,'kingjakob','king.jakob@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-31 11:38:11','2023-05-31 11:38:11'),(44,NULL,'Boyz','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-31 11:40:46','2023-05-31 11:40:46'),(45,NULL,'Boyz','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-31 11:41:47','2023-05-31 11:41:47'),(46,NULL,'Boyz','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-31 11:45:15','2023-05-31 11:45:15'),(47,NULL,'Boyz','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-31 11:51:36','2023-05-31 11:51:36'),(48,NULL,'Boyz','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-31 11:52:03','2023-05-31 11:52:03'),(49,NULL,'Boyz','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-31 12:29:06','2023-05-31 12:29:06'),(50,NULL,'Boyz','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-31 12:36:38','2023-05-31 12:36:38'),(51,NULL,'Boyz','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-31 12:43:06','2023-05-31 12:43:06'),(52,NULL,'Boyz','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-31 12:45:54','2023-05-31 12:45:54'),(53,NULL,'Boyz','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-31 12:46:25','2023-05-31 12:46:25'),(54,NULL,'kamau','kamauchege@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-31 12:46:55','2023-05-31 12:46:55'),(55,NULL,'Boyz','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-31 12:47:31','2023-05-31 12:47:31'),(56,NULL,'zoza brands','mwendav6@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-31 12:48:01','2023-05-31 12:48:01'),(57,NULL,'zoza brands','mwendav6@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-31 12:56:36','2023-05-31 12:56:36'),(58,NULL,'maina','maina@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-31 12:57:19','2023-05-31 12:57:19'),(59,NULL,'Boyz','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-31 12:58:32','2023-05-31 12:58:32'),(60,NULL,'maina','maina@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-31 12:59:50','2023-05-31 12:59:50'),(61,NULL,'kamaa','kamaa@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-31 13:12:48','2023-05-31 13:12:48'),(62,NULL,'kingjakob','king.jakob@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-31 13:24:47','2023-05-31 13:24:47'),(63,NULL,'eli','eli@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-31 13:25:19','2023-05-31 13:25:19'),(64,NULL,'eli','eli@zetech.ac.ke','127.0.0.1','',NULL,'2023-05-31 13:58:56','2023-05-31 13:58:56'),(65,NULL,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-01 09:45:08','2023-06-01 09:45:08'),(66,NULL,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-02 06:46:36','2023-06-02 06:46:36'),(67,NULL,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-02 06:52:47','2023-06-02 06:52:47'),(68,NULL,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-02 07:00:10','2023-06-02 07:00:10'),(69,NULL,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-02 14:23:53','2023-06-02 14:23:53'),(70,NULL,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-02 15:02:51','2023-06-02 15:02:51'),(71,NULL,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-02 18:02:09','2023-06-02 18:02:09'),(72,NULL,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-03 10:55:57','2023-06-03 10:55:57'),(73,NULL,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-04 18:38:38','2023-06-04 18:38:38'),(74,NULL,'Joel','Joel.maina@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-04 20:53:25','2023-06-04 20:53:25'),(75,NULL,'amina','amina.mohammed@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-04 21:15:02','2023-06-04 21:15:02'),(76,NULL,'amina','amina.mohammed@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-04 21:15:22','2023-06-04 21:15:22'),(77,NULL,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-05 05:43:04','2023-06-05 05:43:04'),(78,NULL,'sample','sample.user@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-05 06:28:18','2023-06-05 06:28:18'),(79,NULL,'sample','sample.user@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-05 06:37:22','2023-06-05 06:37:22'),(80,NULL,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-05 08:21:51','2023-06-05 08:21:51'),(81,NULL,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-05 08:22:39','2023-06-05 08:22:39'),(82,NULL,'kamau','kamau2@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-05 11:04:08','2023-06-05 11:04:08'),(83,NULL,'kamau','kamau2@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-05 11:05:07','2023-06-05 11:05:07'),(84,NULL,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-05 11:07:31','2023-06-05 11:07:31'),(85,NULL,'joeli','joel.kinagi@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-05 11:10:57','2023-06-05 11:10:57'),(86,NULL,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-05 19:01:40','2023-06-05 19:01:40'),(87,NULL,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-06 07:09:26','2023-06-06 07:09:26'),(88,NULL,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-07 06:57:48','2023-06-07 06:57:48'),(89,NULL,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-08 06:39:25','2023-06-08 06:39:25'),(90,NULL,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-08 17:11:41','2023-06-08 17:11:41'),(91,NULL,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-09 06:39:32','2023-06-09 06:39:32'),(92,NULL,'eli','eli@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-09 10:39:41','2023-06-09 10:39:41'),(93,NULL,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-09 11:44:06','2023-06-09 11:44:06'),(94,NULL,'eli','eli@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-09 13:20:32','2023-06-09 13:20:32'),(95,NULL,'eli','eli@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-09 16:09:05','2023-06-09 16:09:05'),(96,NULL,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-09 16:12:37','2023-06-09 16:12:37'),(97,NULL,'eli','eli@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-09 19:33:20','2023-06-09 19:33:20'),(98,NULL,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-10 07:22:02','2023-06-10 07:22:02'),(99,NULL,'eli','eli@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-10 07:36:03','2023-06-10 07:36:03'),(100,NULL,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-10 07:44:45','2023-06-10 07:44:45'),(101,NULL,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-10 09:35:48','2023-06-10 09:35:48'),(102,NULL,'Dean','deanofstudents@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-10 09:38:29','2023-06-10 09:38:29'),(103,NULL,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-10 09:39:52','2023-06-10 09:39:52'),(104,NULL,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-10 15:38:29','2023-06-10 15:38:29'),(105,NULL,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-12 07:16:59','2023-06-12 07:16:59'),(106,NULL,'justin','justin@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-12 07:43:18','2023-06-12 07:43:18'),(107,NULL,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-12 07:49:25','2023-06-12 07:49:25'),(108,NULL,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-12 11:42:07','2023-06-12 11:42:07'),(109,NULL,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-12 11:42:18','2023-06-12 11:42:18'),(110,NULL,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-12 11:48:14','2023-06-12 11:48:14'),(111,NULL,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-13 06:39:37','2023-06-13 06:39:37'),(112,NULL,'eli','eli@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-13 12:27:15','2023-06-13 12:27:15'),(113,NULL,'eli','eli@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-13 12:27:29','2023-06-13 12:27:29'),(114,NULL,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-13 12:28:46','2023-06-13 12:28:46'),(115,NULL,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-14 07:10:42','2023-06-14 07:10:42'),(116,NULL,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-14 07:19:57','2023-06-14 07:19:57'),(117,NULL,'Kevin Gitonga','kevin.gitonga@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-14 08:55:14','2023-06-14 08:55:14'),(118,NULL,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-14 08:55:54','2023-06-14 08:55:54'),(119,NULL,'eli','eli@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-14 11:39:45','2023-06-14 11:39:45'),(120,NULL,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-14 11:52:32','2023-06-14 11:52:32'),(121,NULL,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-14 11:55:27','2023-06-14 11:55:27'),(122,NULL,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-14 13:30:43','2023-06-14 13:30:43'),(123,NULL,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-14 13:37:12','2023-06-14 13:37:12'),(124,NULL,'maina','maina.kenga@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-14 14:07:01','2023-06-14 14:07:01'),(125,NULL,'eli','eli@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-14 14:07:51','2023-06-14 14:07:51'),(126,NULL,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-14 14:08:06','2023-06-14 14:08:06'),(127,NULL,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-15 07:41:38','2023-06-15 07:41:38'),(128,NULL,'eli','eli@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-15 07:46:49','2023-06-15 07:46:49'),(129,NULL,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-15 07:47:21','2023-06-15 07:47:21'),(130,NULL,'maina','maina.kenga@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-15 07:47:45','2023-06-15 07:47:45'),(131,NULL,'eli','eli@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-15 08:43:56','2023-06-15 08:43:56'),(132,NULL,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-15 08:47:05','2023-06-15 08:47:05'),(133,NULL,'eli','eli@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-15 09:56:08','2023-06-15 09:56:08'),(134,NULL,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-15 10:06:32','2023-06-15 10:06:32'),(135,NULL,'Byron','byron.james@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-15 10:06:53','2023-06-15 10:06:53'),(136,NULL,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-15 10:11:53','2023-06-15 10:11:53'),(137,NULL,'eli','eli@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-15 10:14:38','2023-06-15 10:14:38'),(138,NULL,'Byron','byron.james@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-15 10:16:24','2023-06-15 10:16:24'),(139,NULL,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-15 10:20:57','2023-06-15 10:20:57'),(140,NULL,'eli','eli@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-15 10:31:38','2023-06-15 10:31:38'),(141,NULL,'Byron','byron.james@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-15 10:43:16','2023-06-15 10:43:16'),(142,NULL,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-15 11:05:42','2023-06-15 11:05:42'),(143,19,'eli','eli@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-15 11:28:40','2023-06-15 11:28:40'),(144,30,'Byron','byron.james@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-15 11:28:57','2023-06-15 11:28:57'),(145,7,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-15 11:37:21','2023-06-15 11:37:21'),(146,31,'admin','admin.main@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-15 11:42:03','2023-06-15 11:42:03'),(147,30,'Byron','byron.james@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-15 11:43:30','2023-06-15 11:43:30'),(148,7,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-15 11:50:44','2023-06-15 11:50:44'),(149,7,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-15 11:56:50','2023-06-15 11:56:50'),(150,19,'eli','eli@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-15 12:31:52','2023-06-15 12:31:52'),(151,30,'Byron','byron.james@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-15 12:56:25','2023-06-15 12:56:25'),(152,7,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-16 07:21:34','2023-06-16 07:21:34'),(153,30,'Byron','byron.james@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-16 07:25:13','2023-06-16 07:25:13'),(154,7,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-16 07:25:32','2023-06-16 07:25:32'),(155,7,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-18 09:20:54','2023-06-18 09:20:54'),(156,32,'Jacob Simon','jakob.simon@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-18 09:36:21','2023-06-18 09:36:21'),(157,7,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-18 09:52:36','2023-06-18 09:52:36'),(158,33,'joel','joel@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-18 09:54:22','2023-06-18 09:54:22'),(159,35,'Johnny','Johnny@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-18 10:34:52','2023-06-18 10:34:52'),(160,35,'Johnny','Johnny@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-18 10:37:29','2023-06-18 10:37:29'),(161,35,'Johnny','Johnny@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-18 10:37:40','2023-06-18 10:37:40'),(162,7,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-18 10:38:55','2023-06-18 10:38:55'),(163,33,'joel','joel@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-18 10:39:24','2023-06-18 10:39:24'),(164,7,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-18 17:32:36','2023-06-18 17:32:36'),(165,32,'Jacob Simon','jakob.simon@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-18 17:59:02','2023-06-18 17:59:02'),(166,7,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-18 18:09:29','2023-06-18 18:09:29'),(167,19,'eli','eli@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-18 18:23:24','2023-06-18 18:23:24'),(168,7,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-19 06:43:27','2023-06-19 06:43:27'),(169,32,'Jacob Simon','jakob.simon@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-19 06:53:49','2023-06-19 06:53:49'),(170,7,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-19 07:12:34','2023-06-19 07:12:34'),(171,7,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-19 07:59:23','2023-06-19 07:59:23'),(172,7,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-20 08:11:01','2023-06-20 08:11:01'),(173,7,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-20 10:22:19','2023-06-20 10:22:19'),(174,19,'eli','eli@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-20 12:44:25','2023-06-20 12:44:25'),(175,7,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-21 07:50:27','2023-06-21 07:50:27'),(176,19,'eli','eli@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-21 10:51:35','2023-06-21 10:51:35'),(177,7,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-21 11:29:28','2023-06-21 11:29:28'),(178,30,'Byron','byron.james@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-21 12:24:33','2023-06-21 12:24:33'),(179,7,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-21 12:25:41','2023-06-21 12:25:41'),(180,7,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-22 08:35:28','2023-06-22 08:35:28'),(181,7,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-22 13:22:52','2023-06-22 13:22:52'),(182,19,'eli','eli@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-22 13:23:48','2023-06-22 13:23:48'),(183,7,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-22 13:25:12','2023-06-22 13:25:12'),(184,19,'eli','eli@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-22 14:09:06','2023-06-22 14:09:06'),(185,7,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-22 14:13:04','2023-06-22 14:13:04'),(186,7,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-23 07:29:11','2023-06-23 07:29:11'),(187,19,'eli','eli@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-23 14:11:36','2023-06-23 14:11:36'),(188,7,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-23 14:13:56','2023-06-23 14:13:56'),(189,37,'Kamau Njuguna','kamau.njuguna@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-23 14:15:09','2023-06-23 14:15:09'),(190,7,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-24 12:43:57','2023-06-24 12:43:57'),(191,36,'victor','victor.mwenda@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-24 12:53:34','2023-06-24 12:53:34'),(192,7,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-24 13:43:20','2023-06-24 13:43:20'),(193,7,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-26 06:53:35','2023-06-26 06:53:35'),(194,32,'Jacob Simon','jakob.simon@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-26 07:06:53','2023-06-26 07:06:53'),(195,19,'eli','eli@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-26 07:08:46','2023-06-26 07:08:46'),(196,7,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-26 07:10:53','2023-06-26 07:10:53'),(197,7,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-26 12:30:47','2023-06-26 12:30:47'),(198,7,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-26 16:18:35','2023-06-26 16:18:35'),(199,7,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-27 08:07:07','2023-06-27 08:07:07'),(200,7,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-29 13:37:03','2023-06-29 13:37:03'),(201,7,'Boy.director','boy.director@zetech.ac.ke','127.0.0.1','',NULL,'2023-06-29 13:51:05','2023-06-29 13:51:05');
/*!40000 ALTER TABLE `user_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_targets`
--

DROP TABLE IF EXISTS `user_targets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_targets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `rate` decimal(5,2) NOT NULL DEFAULT '50.00',
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_targets_user_id_foreign` (`user_id`),
  CONSTRAINT `user_targets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_targets`
--

LOCK TABLES `user_targets` WRITE;
/*!40000 ALTER TABLE `user_targets` DISABLE KEYS */;
INSERT INTO `user_targets` VALUES (1,7,37.00,'2023-06-05','2023-06-12','2023-06-16 12:01:54','2023-06-16 12:01:54'),(2,31,22.00,'2023-06-13','2023-06-19','2023-06-16 12:18:14','2023-06-16 12:18:14'),(3,31,26.00,'2023-06-19','2023-06-30','2023-06-16 12:19:00','2023-06-16 12:19:00'),(4,31,73.00,'2023-06-27','2023-07-16','2023-06-16 12:27:32','2023-06-16 12:27:32'),(5,31,43.00,'2023-06-15','2023-06-30','2023-06-16 12:33:46','2023-06-16 12:33:46'),(6,31,28.00,'2023-06-29','2023-07-26','2023-06-16 12:34:32','2023-06-16 12:34:32'),(7,31,67.00,'2023-06-13','2023-06-19','2023-06-16 13:00:30','2023-06-16 13:00:30'),(8,31,43.00,'2023-06-20','2023-07-18','2023-06-16 13:16:52','2023-06-16 13:16:52'),(9,29,59.00,'2023-06-13','2023-07-21','2023-06-16 13:18:06','2023-06-16 13:18:06'),(10,19,50.00,'2023-06-13','2023-06-30','2023-06-18 09:53:12','2023-06-18 09:53:12'),(11,33,50.00,'2023-06-13','2023-06-30','2023-06-18 09:54:03','2023-06-18 09:54:03'),(12,34,50.00,'2023-06-13','2023-06-30','2023-06-18 10:04:44','2023-06-18 10:04:44'),(13,35,50.00,'2023-06-13','2023-06-30','2023-06-18 10:08:46','2023-06-18 10:08:46'),(14,32,50.00,'2023-06-13','2023-06-14','2023-06-18 18:08:48','2023-06-18 18:08:48'),(15,36,50.00,'2023-06-13','2023-06-30','2023-06-19 07:21:50','2023-06-19 07:21:50'),(16,31,68.00,'2023-06-21','2023-06-30','2023-06-23 11:27:09','2023-06-23 11:27:09'),(17,31,39.00,'2023-06-13','2023-06-30','2023-06-23 11:36:40','2023-06-23 11:36:40'),(18,31,75.00,'2023-06-27','2023-06-30','2023-06-23 11:37:32','2023-06-23 11:37:32'),(19,7,59.00,'2023-06-13','2023-06-30','2023-06-23 11:52:45','2023-06-23 11:52:45'),(20,7,66.00,'2023-06-06','2023-06-28','2023-06-23 11:52:59','2023-06-23 11:52:59'),(21,7,72.00,'2023-06-13','2023-06-30','2023-06-23 11:53:24','2023-06-23 11:53:24'),(22,7,60.00,'2023-06-13','2023-06-29','2023-06-23 11:53:48','2023-06-23 11:53:48'),(23,7,32.00,'2023-06-14','2023-06-29','2023-06-23 11:54:10','2023-06-23 11:54:10'),(24,7,36.00,'2023-06-14','2023-06-28','2023-06-23 11:55:48','2023-06-23 11:55:48'),(25,19,39.00,'2023-06-15','2023-06-29','2023-06-23 12:22:31','2023-06-23 12:22:31'),(26,29,61.00,'2023-06-07','2023-06-30','2023-06-23 12:22:44','2023-06-23 12:22:44'),(27,30,74.00,'2023-06-20','2023-06-30','2023-06-23 12:23:44','2023-06-23 12:23:44'),(28,29,39.00,'2023-06-21','2023-06-29','2023-06-23 12:30:08','2023-06-23 12:30:08'),(29,29,64.00,'2023-06-08','2023-06-30','2023-06-23 12:30:26','2023-06-23 12:30:26'),(30,7,42.00,'2023-06-14','2023-06-30','2023-06-23 12:32:50','2023-06-23 12:32:50'),(31,7,8.00,'2023-06-06','2023-06-30','2023-06-23 12:37:13','2023-06-23 12:37:13'),(32,7,72.00,'2023-06-07','2023-06-30','2023-06-23 12:39:06','2023-06-23 12:39:06'),(33,37,50.00,'2023-06-13','2023-06-30','2023-06-23 14:14:47','2023-06-23 14:14:47'),(34,30,59.00,'2023-06-20','2023-06-30','2023-06-26 07:02:48','2023-06-26 07:02:48'),(35,19,55.00,'2023-06-22','2023-06-30','2023-06-26 07:03:40','2023-06-26 07:03:40');
/*!40000 ALTER TABLE `user_targets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'zetech123',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `gauth_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gauth_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_login` tinyint(1) NOT NULL DEFAULT '1',
  `campus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Thika Road Campus',
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_seen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'logged_out',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (7,'Boy.director','boy.director@zetech.ac.ke',NULL,'$2y$10$AegpnD0bFJfFpLCt2jCt8.qKFKI6v3E5A/dL4gnqncYQJxOvRmWDu',NULL,'2023-05-24 09:59:48','2023-06-29 13:51:05',0,NULL,NULL,0,'Mang\'u Campus',NULL,'logged_in'),(19,'eli','eli@zetech.ac.ke',NULL,'$2y$10$2ZapHlZC2nV1qFW8vDr1e.JGo6PTreYGBQXwrrwW4xRgP9Iuu8c5y',NULL,'2023-05-31 13:25:04','2023-06-26 07:09:51',2,NULL,NULL,0,'Thika Road Campus',NULL,'logged_out'),(29,'maina','maina.kenga@zetech.ac.ke',NULL,'$2y$10$Y.CF8EToJJ17DDZwjMfmiOz32yzwRlQndqN45d13M36bnE5QrIDnK',NULL,'2023-06-14 14:03:02','2023-06-15 08:50:18',2,NULL,NULL,0,'Thika Road Campus','0726150524','logged_out'),(30,'Byron','byron.james@zetech.ac.ke',NULL,'$2y$10$Qg6fqQGaVi1rqd.7vlnO0u65OI7jCnTF/Cjsm0ctGQzd.vhR8W3pi',NULL,'2023-06-15 08:16:49','2023-06-21 12:25:35',1,NULL,NULL,0,'Thika Road Campus','0765432123','logged_out'),(31,'admin','admin.main@zetech.ac.ke',NULL,'$2y$10$zYUaF05ikvc.sKi0ZwNVLO2sYsfE8ANlUBt8qO54rV.b31/1LyDj6',NULL,'2023-06-15 11:41:38','2023-06-15 11:43:11',2,NULL,NULL,0,'Thika Road Campus','0711726465','logged_out'),(32,'Jacob Simon','jakob.simon@zetech.ac.ke',NULL,'$2y$10$s2wKpDiAnBEV2.iOSZUTD.PTAdLd4W3Lycr0s/z1VGyTvM3HWooPy',NULL,'2023-06-18 09:35:28','2023-06-26 07:08:31',1,NULL,NULL,0,'Thika Road Campus','0745342316','logged_out'),(33,'joel','joel@zetech.ac.ke',NULL,'$2y$10$/XE3gHJu09FUQhXI/6im1.DUvOKVOUr9fY8dByAqw0yUDWGSnROYO',NULL,'2023-06-18 09:54:03','2023-06-18 10:40:45',1,NULL,NULL,0,'Nairobi Campus 1','0803854832','logged_out'),(34,'Kings','ling@zetech.ac.ke',NULL,'$2y$10$86DGu40nz7.WfsNOvr89j.NNthlK3YvNumZbRraaaR4jm/V1S0Sqy',NULL,'2023-06-18 10:04:44','2023-06-18 10:04:44',2,NULL,NULL,1,NULL,'0749202012','logged_out'),(35,'Johnny','Johnny@zetech.ac.ke',NULL,'$2y$10$a.SV5I6QoYUA.QYyMq06JeHDrGt.wtShuYPkMjMwutlseG6s18njG',NULL,'2023-06-18 10:08:46','2023-06-18 10:38:03',2,NULL,NULL,0,'Nairobi Campus 1','0745361423','logged_out'),(36,'victor','victor.mwenda@zetech.ac.ke',NULL,'$2y$10$5d2kvyO.heNQj6ym/GvDfuE0/55xa.OmXs85iA/ic4dUe0oDt0FqG','ZIFzm696f1z2RZ0TjrxP8WcC906fF5zMd49q73IwI5CpX6mwyEKiN4eoy99t','2023-06-19 07:21:50','2023-06-29 13:50:40',0,NULL,NULL,0,'Thika Road Campus','0789323451','logged_out'),(37,'Kamau Njuguna','kamau.njuguna@zetech.ac.ke',NULL,'$2y$10$w5LBMs7YhvlYupw6WzXavea2EVvCXBnO.4Hqmh/6rJqEKQMQgapV6',NULL,'2023-06-23 14:14:47','2023-06-23 14:15:21',2,NULL,NULL,0,'Nairobi Campus 1','0756434123','logged_in');
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

-- Dump completed on 2023-06-29 16:58:59
