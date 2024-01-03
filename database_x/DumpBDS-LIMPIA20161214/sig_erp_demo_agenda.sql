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
-- Table structure for table `agenda`
--

DROP TABLE IF EXISTS `agenda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agenda` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `evento` varchar(255) NOT NULL,
  `hora_inicio` varchar(20) NOT NULL,
  `hora_fin` varchar(20) NOT NULL,
  `fecha_inicio` varchar(20) NOT NULL,
  `fecha_fin` varchar(20) NOT NULL,
  `f_inicio` varchar(20) NOT NULL,
  `f_fin` varchar(20) NOT NULL,
  `ocurrencia_evento` varchar(30) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `id_usuario` int(9) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agenda`
--

LOCK TABLES `agenda` WRITE;
/*!40000 ALTER TABLE `agenda` DISABLE KEYS */;
INSERT INTO `agenda` VALUES (1,'Ir con cliente reforma 222B','08:00:30','12:00:30','2016-10-31','2016-10-31','2016-10-31T08:00:30','2016-10-31T12:00:30','month',1,21),(2,'IR A COMER CON PEPE','13:00:00','14:15:00','2016-10-31','2016-10-31','2016-10-31T13:00:00','2016-10-31T14:15:00','agendaWeek',1,21),(3,'ir a casa','15:00:00','16:15:30','2016-10-31','2016-10-31','2016-10-31T15:00:00','2016-10-31T16:15:30','agendaDay',0,21),(4,'ñooo','12:30:00','13:30:00','2016-11-01','2016-11-01','2016-11-01T12:30:00','2016-11-01T13:30:00','month',1,21),(5,'pepepepe','10:00:30','10:00:30','2016-10-26','2016-11-01','2016-10-26T10:00:30','2016-11-01T10:00:30','month',1,21),(6,'pepepepee','10:00:45','10:00:45','2016-10-19','2016-11-01','2016-10-19T10:00:45','2016-11-01T10:00:45','month',1,21),(7,'ghth','10:00:15','10:00:15','2016-11-02','2016-11-02','2016-11-02T10:00:15','2016-11-02T10:00:15','month',1,21),(8,'dffdg','10:30:15','10:30:15','2016-11-03','2016-11-03','2016-11-03T10:30:15','2016-11-03T10:30:15','month',1,21),(9,'dfgdfgdfdg','10:30:30','10:30:30','2016-11-04','2016-11-04','2016-11-04T10:30:30','2016-11-04T10:30:30','month',1,21),(10,'pepepepelotazp','11:00:00','11:15:30','2016-11-05','2016-11-05','2016-11-05T11:00:00','2016-11-05T11:15:30','agendaWeek',1,21),(11,'rrrrrr','12:30:00','13:15:00','2016-11-05','2016-11-05','2016-11-05T12:30:00','2016-11-05T13:15:00','agendaDay',1,21),(12,'pepeppepepeee','16:15:45','16:15:45','2016-11-07','2016-11-07','2016-11-07T16:15:45','2016-11-07T16:15:45','month',0,21),(13,'Ir con cliente SMNYL','09:15:30','10:45:30','2016-11-08','2016-11-08','2016-11-08T09:15:30','2016-11-08T10:45:30','month',1,21),(14,'IR A COMER','19:00:00','19:45:15','2016-11-07','2016-11-08','2016-11-07T19:00:00','2016-11-08T19:45:15','agendaDay',1,21),(15,'Salir a comer con pepe y toño','13:00:00','15:00:00','2016-11-11','2016-11-11','2016-11-11T13:00:00','2016-11-11T15:00:00','month',0,21),(16,'Prueba demo','17:30:00','18:30:00','2016-12-12','2016-12-13','2016-12-12T17:30:00','2016-12-13T18:30:00','month',1,21),(17,'pppppp','15:30:00','15:30:00','2016-12-15','2016-12-12','2016-12-15T15:30:00','2016-12-12T15:30:00','month',1,21);
/*!40000 ALTER TABLE `agenda` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-14 14:52:29
