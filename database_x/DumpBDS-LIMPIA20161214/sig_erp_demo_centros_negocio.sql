-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: sig_erp_demo
-- ------------------------------------------------------
-- Server version	5.6.26

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
-- Table structure for table `centros_negocio`
--

DROP TABLE IF EXISTS `centros_negocio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `centros_negocio` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nomenclatura` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ciudad` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `colonia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `calle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_exterior` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_interior` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ubicacion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `centros_negocio`
--

LOCK TABLES `centros_negocio` WRITE;
/*!40000 ALTER TABLE `centros_negocio` DISABLE KEYS */;
INSERT INTO `centros_negocio` VALUES (1,'Aguascalientes','CN',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','2016-10-07 20:24:23','2016-10-07 20:24:23'),(2,'Aguascalientes','CN',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','2016-10-07 20:24:23','2016-10-07 20:24:23'),(3,'Aguascalientes','CN',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','2016-10-07 20:24:23','2016-10-07 20:24:23'),(4,'Aguascalientes','CN',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','2016-10-07 20:24:23','2016-10-07 20:24:23'),(5,'Aguascalientes','CN',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','2016-10-07 20:24:23','2016-10-07 20:24:23'),(6,'Aguascalientes','CN',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','2016-10-07 20:24:24','2016-10-07 20:24:24'),(7,'Aguascalientes','CN',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','2016-10-07 20:24:24','2016-10-07 20:24:24'),(8,'Aguascalientes','CN',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','2016-10-07 20:24:24','2016-10-07 20:24:24'),(9,'Aguascalientes','CN',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','2016-10-07 20:24:24','2016-10-07 20:24:24'),(10,'Aguascalientes','CN',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','2016-10-07 20:24:24','2016-10-07 20:24:24');
/*!40000 ALTER TABLE `centros_negocio` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-14 14:52:27
