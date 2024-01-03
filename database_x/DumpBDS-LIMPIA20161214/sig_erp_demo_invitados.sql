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
-- Table structure for table `invitados`
--

DROP TABLE IF EXISTS `invitados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invitados` (
  `id` int(10) unsigned NOT NULL DEFAULT '0',
  `idcn` int(11) DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invitados`
--

LOCK TABLES `invitados` WRITE;
/*!40000 ALTER TABLE `invitados` DISABLE KEYS */;
INSERT INTO `invitados` VALUES (1,NULL,'Samara Hansen','ankunding.clifford@example.org','$2y$10$epF9GVuohlPrzIbeTrDjqey3hpuoPBXDWcYKR4LYC63Nw0DIiNAai','ynaOQpRNEGaJYMQLc3btcO6PoRvwif2r8OLAT2mb2Ck8ZHBzqRg3knbFxmw7','2016-10-07 20:24:22','2016-12-03 02:31:35'),(2,NULL,'Marcelina Carter','kacey53@example.com','$2y$10$bCaQc4bnNx6PiRUGHzI7DOol96TFVhokMYC.Fe9e759GeWcoaIjYu','4ROVhjeUpq','2016-10-07 20:24:22','2016-10-07 20:24:22'),(3,NULL,'Ms. Aditya Effertz V','orville55@example.net','$2y$10$hovLb9Txx7NdKUPMUaN3Dufb/B5sUCvxib9rBHry1srXd2Q5UBZ1m','ZpFfe98jlg','2016-10-07 20:24:22','2016-10-07 20:24:22'),(4,NULL,'Kaley Schimmel','muller.oral@example.net','$2y$10$OQl.snxk3.AsiGX3Ayz2veH3tIHL9mQARLtluvPfzX6M26vG/XHQq','2wjDt4WvIMA5ywSCE2Mdo5zjC3FMqnYhwmi6PVGQ54YZFAt1pdxmHflfEN4q','2016-10-07 20:24:22','2016-11-05 00:14:30'),(5,NULL,'Mack Brekke','kboyer@example.net','$2y$10$TYksLet5sfLDrPdW3KObF.Q4FipHRub.5.dz2aOtcbDj0/ZfMJ1kK','MCehaJr6p5','2016-10-07 20:24:22','2016-10-07 20:24:22'),(6,NULL,'Jerald Sipes','rosie12@example.net','$2y$10$oX4fz92.et/wJdafUkp/l.JtOcA1bHxexIrvLa66WBLJ2JHD1ZJBW','hkTNIk2iwjcBXHBypBDfLXiNCoXpNsrawRjCn5Atj8JziXugXwVEs3e1vHHk','2016-10-07 20:24:22','2016-12-02 01:22:57'),(7,NULL,'Tom Romaguera','barrows.theron@example.com','$2y$10$ObSroGGyZlqHzM0sxmIFsOVzm3okB032KghBasX1V2FEp5rnBAua2','a1SzoQhhk1','2016-10-07 20:24:22','2016-10-07 20:24:22'),(8,NULL,'Jeremie Bradtke','claudine36@example.net','$2y$10$8qV.lNUI33H4xaZ94EwVD.0pGB2NQAGGNRc8bB9uDNkzqW1vc1zxy','3AQ6HNQzxivgqXyk9sBO7lh8tGlQPecr9JkCLn4cVqPwhR5WOh1VzRCGxkkC','2016-10-07 20:24:22','2016-11-04 23:48:51'),(9,NULL,'Meredith Deckow','orn.ally@example.org','$2y$10$WUYjEAEjXUYB12BJgv0tNuobYjtNi/h1QOxrsxhw9JMbGl7UG9LUO','XR8Z4RU5Wo','2016-10-07 20:24:22','2016-10-07 20:24:22'),(10,NULL,'Curt Daniel','jenifer43@example.net','$2y$10$2QRWRYWb61scjsOcOGAHH.HqcZeTHM1d5DJpqjIrmQnNPN2THZC32','NulHujNdAU','2016-10-07 20:24:23','2016-10-07 20:24:23'),(11,NULL,'Annie Heaney','mdooley@example.com','$2y$10$fPvTvQO1OWM8IqGIO7NGs.7V9KO5vODMJPRNfHF6YonrRBswSxvYO','VI8j5faJYY','2016-10-07 20:24:23','2016-10-07 20:24:23'),(12,NULL,'Triston Hagenes','glen17@example.org','$2y$10$Y9sKqO/HurLvi9FfCfJmaOxGZHWZXPj6QsIIP8Bm3y0WI77jurRT.','RWDO16LBfi','2016-10-07 20:24:23','2016-10-07 20:24:23'),(13,NULL,'Dayana Hilpert','jonatan.cassin@example.org','$2y$10$Fh/68Og56kvm8vwvCMhngu5VS4fREupEvOnHueLwBjVe3iDk0S7eG','kIFa8kCD0N','2016-10-07 20:24:23','2016-10-07 20:24:23'),(14,NULL,'Nickolas Zieme','laurence39@example.com','$2y$10$n0PTI.znIwBLvEyxVidSDeNu6ZYOq8ld..Wpc0GDimA8JF.kgy9WS','Hk6TJqYFKr','2016-10-07 20:24:23','2016-10-07 20:24:23'),(15,NULL,'Giovanny Ratke','preichel@example.com','$2y$10$ItwlUuBpqd0c.aNU2KgB5e.iiRCp16ImaxWtEps7xcfAZ94Dg/cZq','VwZA3GHcDY','2016-10-07 20:24:23','2016-10-07 20:24:23'),(16,NULL,'Stefan Dickens Sr.','stiedemann.alexa@example.org','$2y$10$tfmmGbVLglwbI1wPHPB3beY5PpXMyZGCw3rP2gvg4tqXnqowQTXpy','BCD6WQo3jn','2016-10-07 20:24:23','2016-10-07 20:24:23'),(17,NULL,'Alejandrin Yundt','hermann.sammy@example.org','$2y$10$zHnUNUWa.qkmNCZ5DN8PLuwu4VtxZ/c61nFePeGua2Hby3gAU2kuW','GKE5rKMbBK','2016-10-07 20:24:23','2016-10-07 20:24:23'),(18,NULL,'Judy Parker','wiza.serenity@example.net','$2y$10$1IH7KpJ53LfNVrXCy0Ag8eTUQoBURgQDs7pR4DQbPLFZEHlHaeogC','mPfVq60qDR','2016-10-07 20:24:23','2016-10-07 20:24:23'),(19,NULL,'Loren Gleason','ovon@example.com','$2y$10$V3erQJDWIjM60.IeS3ErnO.0d8FNfdj7xM6LRSKPeog9rJ91H0Dy.','8x7xdCYBp0','2016-10-07 20:24:23','2016-10-07 20:24:23'),(20,NULL,'Mr. Bud West III','gmarquardt@example.net','$2y$10$brh9i0kvpyK0gDIAvdHEVuPBZolnr8wZ6dGonjD2SKQN/t4it7hDe','pj7eSghlwm','2016-10-07 20:24:23','2016-10-07 20:24:23'),(21,4,'Luis Damian','demo@mail.com','$2y$10$1FGvTVtcVX.N94ir2KaTyeWC3QNErav7uFnlNeKz657XEYdOTlhZW','LUXmMfxfildL1KmOBULIf2XFTb40H9I2jiuyFRrvzMFtWhNv4GEIDqMofsNp','2016-10-07 20:34:27','2016-12-14 14:38:33'),(22,NULL,'Damian','luis.tapia@union-informatica.com','$2y$10$uYm7aMHk4Yd7vgFIw9YimOZB9xhRLrmVwm9SV0LaHplyKAiQCFAxy','rk7QSy1WFNv0xmikE7cU2UgLceUbvA6vKH3h4ydtuk1ZvP8PBEhCcie8O6fQ','2016-10-31 22:11:36','2016-11-01 01:01:14');
/*!40000 ALTER TABLE `invitados` ENABLE KEYS */;
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
