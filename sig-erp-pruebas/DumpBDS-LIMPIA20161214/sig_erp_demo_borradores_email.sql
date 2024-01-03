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
-- Table structure for table `borradores_email`
--

DROP TABLE IF EXISTS `borradores_email`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `borradores_email` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `para` text,
  `asunto` varchar(255) DEFAULT NULL,
  `contenido` text,
  `datos_adjuntos` text,
  `fecha_creacion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `borradores_email`
--

LOCK TABLES `borradores_email` WRITE;
/*!40000 ALTER TABLE `borradores_email` DISABLE KEYS */;
INSERT INTO `borradores_email` VALUES (2,21,'Servicios RH','Servicio de RH para los clientes preferenciales','fuened@hotmail.com;luisdtgmac@gmail.com;','Servicios RH','<p>&nbsp;</p><p style=\"text-align: justify;\">&nbsp;</p><p style=\"text-align: center;\">&nbsp;</p><p style=\"text-align: center;\">&nbsp;</p><p style=\"text-align: center;\"><span style=\"color: #8c7e7e; background-color: #ffffff; font-family: \'book antiqua\', palatino, serif; font-size: 14pt;\">SERVCIO DE N&Oacute;MINA CON UN 25% DE DESCUENTO</span></p><p style=\"text-align: center;\"><span style=\"color: #4f1c1c; background-color: #ffffff; font-family: \'book antiqua\', palatino, serif; font-size: 14pt;\">&iexcl; Si presentas a tu mascota se te hace un descuento especial !</span></p><hr /><p style=\"text-align: center;\"><span style=\"color: #4f1c1c; background-color: #ffffff; font-family: \'book antiqua\', palatino, serif; font-size: 14pt;\"><img src=\"//www.tinymce.com/docs/images/tiny-husky.jpg\" alt=\"wolf\" width=\"320\" height=\"320\" /></span></p><p style=\"text-align: center;\">&nbsp;</p><p style=\"text-align: left; padding-left: 30px;\"><span style=\"color: #4f1c1c; background-color: #ffffff; font-family: \'book antiqua\', palatino, serif; font-size: 10pt;\">Servicios Profesionales SA de CV</span></p><p style=\"text-align: left; padding-left: 30px;\"><span style=\"color: #4f1c1c; background-color: #ffffff; font-family: \'book antiqua\', palatino, serif; font-size: 10pt;\">Edgar Fuentes Alvarez Director Comercial</span></p><p style=\"text-align: left; padding-left: 30px;\"><span style=\"color: #4f1c1c; background-color: #ffffff; font-family: \'book antiqua\', palatino, serif; font-size: 10pt;\">edgar.fuentes@mail.com</span></p><p style=\"text-align: center;\">&nbsp;</p><p style=\"text-align: center;\">&nbsp;</p>','','2016-11-01 12:36:31');
/*!40000 ALTER TABLE `borradores_email` ENABLE KEYS */;
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
