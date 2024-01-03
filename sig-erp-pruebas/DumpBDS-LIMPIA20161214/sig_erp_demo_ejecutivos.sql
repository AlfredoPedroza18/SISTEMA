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
-- Table structure for table `ejecutivos`
--

DROP TABLE IF EXISTS `ejecutivos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ejecutivos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_cn` int(10) unsigned NOT NULL,
  `id_puesto` int(10) unsigned NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ap_paterno` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ap_materno` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nickname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuario` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `correo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono_oficina` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `celular` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ciudad` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `colonia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `calle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_exterior` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_interior` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ejecutivos_id_cn_foreign` (`id_cn`),
  KEY `ejecutivos_id_puesto_foreign` (`id_puesto`),
  CONSTRAINT `ejecutivos_id_cn_foreign` FOREIGN KEY (`id_cn`) REFERENCES `centros_negocio` (`id`),
  CONSTRAINT `ejecutivos_id_puesto_foreign` FOREIGN KEY (`id_puesto`) REFERENCES `puestos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ejecutivos`
--

LOCK TABLES `ejecutivos` WRITE;
/*!40000 ALTER TABLE `ejecutivos` DISABLE KEYS */;
INSERT INTO `ejecutivos` VALUES (1,1,1,'Hertha Walsh','Braeden','Dach',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-10-07 20:24:24','2016-10-07 20:24:24'),(2,1,1,'Ariane Harris','Hayden','Kutch',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-10-07 20:24:25','2016-10-07 20:24:25'),(3,1,1,'Eileen Durgan','Marty','Torp',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-10-07 20:24:25','2016-10-07 20:24:25'),(4,1,1,'Philip Beatty I','Matt','Ebert',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-10-07 20:24:25','2016-10-07 20:24:25'),(5,1,1,'Tito Legros','Nestor','Zieme',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-10-07 20:24:25','2016-10-07 20:24:25'),(6,1,1,'Cindy Olson','Jerad','Bernier',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-10-07 20:24:25','2016-10-07 20:24:25'),(7,1,1,'Antwon Dooley','Jaydon','Hansen',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-10-07 20:24:25','2016-10-07 20:24:25'),(8,1,1,'Johanna Gerhold','Trevion','Leuschke',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-10-07 20:24:25','2016-10-07 20:24:25'),(9,1,1,'Holden Kling','Arne','Harris',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-10-07 20:24:25','2016-10-07 20:24:25'),(10,1,1,'Reba Streich V','Hayden','Romaguera',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-10-07 20:24:25','2016-10-07 20:24:25'),(11,1,1,'Jaren Ziemann Sr.','Lonzo','Klocko',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-10-07 20:24:25','2016-10-07 20:24:25'),(12,1,1,'Mrs. Kiera Ferry Sr.','Erich','Sanford',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-10-07 20:24:25','2016-10-07 20:24:25'),(13,1,1,'Dante Lehner','Arch','Hyatt',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-10-07 20:24:25','2016-10-07 20:24:25'),(14,1,1,'Prof. Kianna Durgan','Dane','Jacobs',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-10-07 20:24:25','2016-10-07 20:24:25'),(15,1,1,'Ms. Priscilla O\'Keefe II','Eldred','Stoltenberg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-10-07 20:24:25','2016-10-07 20:24:25');
/*!40000 ALTER TABLE `ejecutivos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-14 14:52:26
