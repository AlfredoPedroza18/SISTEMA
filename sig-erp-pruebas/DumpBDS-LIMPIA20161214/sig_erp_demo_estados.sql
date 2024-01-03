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
-- Table structure for table `estados`
--

DROP TABLE IF EXISTS `estados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_estado` varchar(255) DEFAULT NULL,
  `variable` varchar(255) DEFAULT NULL,
  `renapo` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estados`
--

LOCK TABLES `estados` WRITE;
/*!40000 ALTER TABLE `estados` DISABLE KEYS */;
INSERT INTO `estados` VALUES (1,'Aguascalientes','Ags.','AS\r'),(2,'Baja California','B.C.','BC\r'),(3,'Baja California Sur','B.C.S.','BS\r'),(4,'Campeche','Camp.','CC\r'),(5,'Chiapas','Chis.','CS\r'),(6,'Chihuahua','Chih.','CH\r'),(7,'Coahuila','Coah.','CL\r'),(8,'Colima','Col.','CM\r'),(9,'Distrito Federal','D.F.','DF\r'),(10,'Ciudad de M','Cd. M','CX\r'),(11,'Durango','Dgo.','DG\r'),(12,'Guanajuato','Gto.','GT\r'),(13,'Guerrero','Gro.','GR\r'),(14,'Hidalgo','Hgo.','HG\r'),(15,'Jalisco','Jal.','JC\r'),(16,'Estado de M','Edo. M','MC\r'),(17,'Michoac','Mich.','MN\r'),(18,'Morelos','Mor.','MS\r'),(19,'Nayarit','Nay.','NT\r'),(20,'Nuevo Leon','N.L.','NL\r'),(21,'Oaxaca','Oax.','OC\r'),(22,'Puebla','Pue.','PL\r'),(23,'Quer','Qro.','QT\r'),(24,'Quintana Roo','Q. Roo.','QR\r'),(25,'San Luis Potos','S.L.P.','SP\r'),(26,'Sinaloa','Sin.','SL\r'),(27,'Sonora','Son.','SR\r'),(28,'Tabasco','Tab.','TC\r'),(29,'Tamaulipas','Tamps.','TS\r'),(30,'Tlaxcala','Tlax.','TL\r'),(31,'Veracruz','Ver.','VZ\r'),(32,'Yucat','Yuc.','YN\r'),(33,'Zacatecas','Zac.','ZS\r');
/*!40000 ALTER TABLE `estados` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-14 14:52:30
