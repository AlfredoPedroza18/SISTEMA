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
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_cn` int(10) unsigned NOT NULL,
  `id_ejecutivo` int(10) unsigned NOT NULL,
  `tipo` int(11) DEFAULT '1' COMMENT 'Estados:\nPROSPECTO => 1\nCLIENTE => 2',
  `contrato_a` int(10) unsigned NOT NULL,
  `id_user` int(10) unsigned NOT NULL,
  `nombre_comercial` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `forma_juridica` int(11) DEFAULT NULL,
  `razon_social` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `apellido_paterno` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `apellido_materno` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `genero` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_nacimiento_pros` date DEFAULT NULL,
  `lugar_nacimiento` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `clase_pm` int(11) DEFAULT NULL,
  `rfc` varchar(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `curp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `registro_patronal` int(11) DEFAULT NULL,
  `actividad_economica` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `df_cp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `df_estado` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `df_municipio` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `df_ciudad` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `df_colonia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `df_calle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `df_num_exterior` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `df_num_interior` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dc_cp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dc_estado` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dc_municipio` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dc_ciudad` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dc_colonia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dc_calle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dc_num_exterior` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dc_num_interior` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `medio_contacto` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo_cliente` int(11) DEFAULT NULL,
  `comentario` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `db_forma_pago` int(10) unsigned NOT NULL,
  `db_banco` int(10) unsigned NOT NULL,
  `db_dias_credito` int(11) DEFAULT NULL,
  `db_limite_credito` decimal(10,2) DEFAULT NULL,
  `db_cta_clientes` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-14 14:52:24
