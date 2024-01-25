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
-- Table structure for table `cartas_tipo`
--

DROP TABLE IF EXISTS `cartas_tipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cartas_tipo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `contenido` text,
  `id_usuario` int(11) DEFAULT NULL,
  `fecha_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cartas_tipo`
--

LOCK TABLES `cartas_tipo` WRITE;
/*!40000 ALTER TABLE `cartas_tipo` DISABLE KEYS */;
INSERT INTO `cartas_tipo` VALUES (1,'NUEVO SERVICIO','PROMOCIONAR EL NUEVO SERVICIO DE ERP','<html><head></head><body>\n<p>&nbsp;</p>\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"//www.tinymce.com/images/glyph-tinymce@2x.png\" width=\"100\" height=\"88\" /></p>\n<p>&nbsp;</p>\n<table style=\"height: 61px;\" width=\"1052\">\n<tbody>\n<tr>\n<td style=\"width: 254px;\">&nbsp;</td>\n<td style=\"width: 255px;\">&nbsp;</td>\n<td style=\"width: 257px;\">&nbsp;</td>\n<td style=\"width: 258px;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 254px;\">&nbsp;</td>\n<td style=\"width: 255px;\">&nbsp;</td>\n<td style=\"width: 257px;\">&nbsp;</td>\n<td style=\"width: 258px;\">&nbsp;</td>\n</tr>\n</tbody>\n</table>\n</body></html>\">',1,'2016-10-27 16:12:46'),(2,'Nuevo servicio CRM','Promoción del nuevo servicio de CRM...','<html><head></head><body>\n<p>&nbsp;</p>\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"//www.tinymce.com/images/glyph-tinymce@2x.png\" width=\"100\" height=\"88\" /></p>\n<p>&nbsp;</p>\n<table style=\"height: 61px;\" width=\"1052\">\n<tbody>\n<tr>\n<td style=\"width: 254px;\">&nbsp;</td>\n<td style=\"width: 255px;\">&nbsp;</td>\n<td style=\"width: 257px;\">&nbsp;</td>\n<td style=\"width: 258px;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 254px;\">&nbsp;</td>\n<td style=\"width: 255px;\">&nbsp;</td>\n<td style=\"width: 257px;\">&nbsp;</td>\n<td style=\"width: 258px;\">&nbsp;</td>\n</tr>\n</tbody>\n</table>\n</body></html>\">',1,'2016-10-27 16:13:34'),(3,'Servicio para los negocios de outsourcing','Promocion para nuevos tipos de negocio..','<html><head></head><body>\n<p style=\"text-align: center; font-size: 15px;\"><img title=\"TinyMCE Logo\" src=\"//www.tinymce.com/images/glyph-tinymce@2x.png\" alt=\"TinyMCE Logo\" width=\"110\" height=\"97\" /></p>\n<h1 style=\"text-align: center;\">Welcome to the TinyMCE editor demo!</h1>\n<h1><img style=\"float: right; padding: 0 0 10px 10px;\" title=\"Tiny Husky\" src=\"//www.tinymce.com/docs/images/tiny-husky.jpg\" alt=\"Tiny Husky\" width=\"304\" height=\"320\" /></h1>\n<h2>Image Tools Plugin feature<br />Click on the image to get started</h2>\n<p>Please try out the features provided in this image tools example.</p>\n<p>Note that any <strong>MoxieManager</strong> file and image management functionality in this example is part of our commercial offering &ndash; the demo is to show the integration.</p>\n<h2>Got questions or need help?</h2>\n<ul>\n<li>Our <a href=\"https://www.tinymce.com/docs/\">documentation</a> is a great resource for learning how to configure TinyMCE.</li>\n<li>Have a specific question? Visit the <a href=\"http://community.tinymce.com/forum/\">Community Forum</a>.</li>\n<li>We also offer enterprise grade support as part of <a href=\"www.tinymce.com/pricing\">TinyMCE Enterprise</a>.</li>\n</ul>\n<p style=\"text-align: center; font-size: 15px;\">&nbsp;</p>\n<h2>A simple table to play with</h2>\n<table style=\"height: 61px;\" width=\"719\">\n<thead>\n<tr>\n<th style=\"width: 273px;\">Product</th>\n<th style=\"width: 166px;\">Cost</th>\n<th style=\"width: 258px;\">Really?</th>\n</tr>\n</thead>\n<tbody>\n<tr>\n<td style=\"width: 273px;\"><span style=\"font-family: georgia, palatino, serif; font-size: 12pt;\">TinyMCE</span></td>\n<td style=\"width: 166px;\"><span style=\"font-family: georgia, palatino, serif; font-size: 12pt;\">Free</span></td>\n<td style=\"width: 258px;\"><span style=\"font-family: georgia, palatino, serif; font-size: 12pt;\">YES!</span></td>\n</tr>\n<tr>\n<td style=\"width: 273px;\"><span style=\"font-family: georgia, palatino, serif; font-size: 12pt;\">Plupload</span></td>\n<td style=\"width: 166px;\"><span style=\"font-family: georgia, palatino, serif; font-size: 12pt;\">Free</span></td>\n<td style=\"width: 258px;\"><span style=\"font-family: georgia, palatino, serif; font-size: 12pt;\">YES!</span></td>\n</tr>\n</tbody>\n</table>\n<h2>Found a bug?</h2>\n<p>If you think you have found a bug please create an issue on the <a href=\"https://github.com/tinymce/tinymce/issues\">GitHub repo</a> to report it to the developers.</p>\n<h2>Finally ...</h2>\n<p>Don\'t forget to check out our other product <a href=\"http://www.plupload.com\" target=\"_blank\">Plupload</a>, your ultimate upload solution featuring HTML5 upload support.</p>\n<p>Thanks for supporting TinyMCE! We hope it helps you and your users create great content.<br />All the best from the TinyMCE team.</p>\n<h2>Found a bug?</h2>\n<p>If you think you have found a bug please create an issue on the <a href=\"https://github.com/tinymce/tinymce/issues\">GitHub repo</a> to report it to the developers.</p>\n<h2>Finally ...</h2>\n<p>Don\'t forget to check out our other product <a href=\"http://www.plupload.com\" target=\"_blank\">Plupload</a>, your ultimate upload solution featuring HTML5 upload support.</p>\n<p>Thanks for supporting TinyMCE! We hope it helps you and your users create great content.<br />All the best from the TinyMCE team.</p>\n</body></html>\">',21,'2016-10-27 16:42:45'),(4,NULL,NULL,'<!DOCTYPE html><html><head></head><body><hr /><p><span style=\"font-family: \'comic sans ms\', sans-serif;\"><span style=\"font-size: 32px;\">SERVICIO DE N&Oacute;MINAS</span></span></p><p><span style=\"font-family: \'comic sans ms\', sans-serif; font-size: 10pt;\">En este mes de noviembre obten un precio especial por ser cliente preferencial.</span></p><p><span style=\"font-size: 14pt;\"><em><strong><span style=\"font-family: \'comic sans ms\', sans-serif; color: #ff9900;\">Comienza con nosotros el &iexcl; Buen Fin !</span></strong></em></span></p></body></html>',21,'2016-10-27 17:48:23'),(5,'Nominas','Nominas','<head></head><body>\n<p><span style=\"font-family: \'comic sans ms\', sans-serif;\"><span style=\"font-size: 32px;\">&nbsp;</span></span></p>\n<hr />\n<p><span style=\"font-family: \'comic sans ms\', sans-serif;\"><span style=\"font-size: 32px;\">SERVICIO DE N&Oacute;MINAS</span></span></p>\n<p><span style=\"font-family: \'comic sans ms\', sans-serif; font-size: 10pt;\">En este mes de noviembre obten un precio especial por ser cliente preferencial.</span></p>\n<p><span style=\"font-size: 14pt;\"><em><strong><span style=\"font-family: \'comic sans ms\', sans-serif; color: #ff9900;\">Comienza con nosotros el &iexcl; Buen Fin !</span></strong></em></span></p>\n</body></html>\">\">',21,'2016-10-27 17:51:12'),(6,NULL,NULL,'<!DOCTYPE html><html><head></head><body><hr /><p><span style=\"font-family: \'comic sans ms\', sans-serif;\"><span style=\"font-size: 32px;\">SERVICIO DE N&Oacute;MINAS</span></span></p><p><span style=\"font-family: \'comic sans ms\', sans-serif; font-size: 10pt;\">En este mes de noviembre obten un precio especial por ser cliente preferencial.</span></p><p><span style=\"font-size: 14pt;\"><em><strong><span style=\"font-family: \'comic sans ms\', sans-serif; color: #ff9900;\">Comienza con nosotros el &iexcl; Buen Fin !</span></strong></em></span></p></body></html>',21,'2016-10-27 17:52:00'),(7,NULL,NULL,'<!DOCTYPE html><html><head></head><body><hr /><p><span style=\"font-family: \'comic sans ms\', sans-serif;\"><span style=\"font-size: 32px;\">SERVICIO DE N&Oacute;MINAS</span></span></p><p><span style=\"font-family: \'comic sans ms\', sans-serif; font-size: 10pt;\">En este mes de noviembre obten un precio especial por ser cliente preferencial.</span></p><p><span style=\"font-size: 14pt;\"><em><strong><span style=\"font-family: \'comic sans ms\', sans-serif; color: #ff9900;\">Comienza con nosotros el &iexcl; Buen Fin !</span></strong></em></span></p></body></html>',21,'2016-10-27 17:52:00'),(8,'Nomina descuentos para clientes preferenciales en el mes de noviembre.','Descuento del servicio de nominas del 10% para los clientes que tengan mas de 6 meses contratado el servicio.','<!DOCTYPE html><html><head></head><body><hr /><p><span style=\"font-family: \'comic sans ms\', sans-serif;\"><span style=\"font-size: 32px;\">SERVICIO DE N&Oacute;MINAS</span></span></p><p><span style=\"font-family: \'comic sans ms\', sans-serif; font-size: 10pt;\">En este mes de noviembre obten un precio especial por ser cliente preferencial.</span></p><p><span style=\"font-size: 14pt;\"><em><strong><span style=\"font-family: \'comic sans ms\', sans-serif; color: #ff9900;\">Comienza con nosotros el &iexcl; Buen Fin !</span></strong></em></span></p></body></html>',21,'2016-10-27 17:52:27'),(9,'SERVICIO DE RH NOVIEMBRE','50% DE DESCUENTO AL CONTRATAR ESTUDIO SOCIO ECONÓMICO','<html>\n<head>\n</head>\n<body>\n<p style=\"text-align: center;\"><strong><span style=\"font-size: 14pt; color: #000080; font-family: \'courier new\', courier, monospace;\">50% DE DESCUENTO EN RH</span></strong></p>\n<hr />\n<p style=\"text-align: center;\">&nbsp;</p>\n<p style=\"text-align: left;\"><span style=\"font-size: 10pt; font-family: tahoma, arial, helvetica, sans-serif; color: #ff6600;\"><strong>SI ADQUIRES EL SERVICIO DE ESTUDIO SOCIOECON&Oacute;MICO TE LLEVARAS LA GRAN OFERTA DE UN DESCUENTO QUE DA MIEDO......</strong></span></p>\n<p>&nbsp;</p>\n</body>\n</html>\">',1,'2016-10-27 18:13:03'),(10,'ESTUDIOS SOCIOECONOMICOS PARA LE MES DE NOVIEMBRE','ESTUDIOS SOCIOECONOMICOS PARA LE MES DE NOVIEMBRE PARA LOS CLIENTES CON MAS DE 1 AÑO','<!DOCTYPE html>\n<html>\n<head>\n</head>\n<body>\n<hr />\n<p style=\"text-align: center;\"><span style=\"font-family: tahoma, arial, helvetica, sans-serif; font-size: 18pt;\">ESTUDIOS SOCIOECONOMICOS PARA LE MES DE NOVIEMBRE</span><span style=\"font-family: tahoma, arial, helvetica, sans-serif; font-size: 10pt;\"></span></p>\n<hr />\n<p style=\"text-align: center;\">&nbsp;</p>\n<p style=\"text-align: center;\">&nbsp;</p>\n<p style=\"text-align: center;\">&nbsp;</p>\n</body>\n</html>',1,'2016-10-27 21:23:11'),(11,'ESTUDIOS SOCIOECONOMICOS PARA LE MES DE NOVIEMBRE','ESTUDIOS SOCIOECONOMICOS PARA LE MES DE NOVIEMBRE PARA LOS CLIENTES CON MAS DE 1 AÑO','<!DOCTYPE html>\n<html>\n<head>\n</head>\n<body>\n<hr />\n<p style=\"text-align: center;\"><span style=\"font-family: tahoma, arial, helvetica, sans-serif; font-size: 18pt;\">ESTUDIOS SOCIOECONOMICOS PARA LE MES DE NOVIEMBRE</span><span style=\"font-family: tahoma, arial, helvetica, sans-serif; font-size: 10pt;\"></span></p>\n<hr />\n<p style=\"text-align: center;\">&nbsp;</p>\n<p style=\"text-align: center;\">&nbsp;</p>\n<p style=\"text-align: center;\">&nbsp;</p>\n</body>\n</html>',1,'2016-10-27 21:23:14'),(12,'Carta tipo con imagen','Descripcion de la carta tipo con imagen','<!DOCTYPE html>\n<html>\n<head>\n</head>\n<body>\n<figure class=\"image\"><img src=\"mydog.jpg\" alt=\"Dog\" width=\"100\" height=\"100\" />\n<figcaption>Caption</figcaption>\n</figure>\n<p>&nbsp;</p>\n</body>\n</html>',21,'2016-10-28 15:13:42'),(13,'Servicios para Ramón','Nueva propuesta de servicios para las sucursales de Ramón','<!DOCTYPE html>\n<html>\n<head>\n</head>\n<body>\n<p style=\"text-align: justify;\">&nbsp;</p>\n<p style=\"text-align: center;\">&nbsp;</p>\n<p style=\"text-align: center;\">&nbsp;</p>\n<p style=\"text-align: center;\"><span style=\"color: #8c7e7e; background-color: #ffffff; font-family: \'book antiqua\', palatino, serif; font-size: 14pt;\">SERVCIO DE N&Oacute;MINA CON UN 25% DE DESCUENTO</span></p>\n<p style=\"text-align: center;\"><span style=\"color: #4f1c1c; background-color: #ffffff; font-family: \'book antiqua\', palatino, serif; font-size: 14pt;\">&iexcl; Si presentas a tu mascota se te hace un descuento especial !</span></p>\n<hr />\n<p style=\"text-align: center;\"><span style=\"color: #4f1c1c; background-color: #ffffff; font-family: \'book antiqua\', palatino, serif; font-size: 14pt;\"><img src=\"//www.tinymce.com/docs/images/tiny-husky.jpg\" alt=\"wolf\" width=\"320\" height=\"320\" /></span></p>\n<p style=\"text-align: center;\">&nbsp;</p>\n<p style=\"text-align: left; padding-left: 30px;\"><span style=\"color: #4f1c1c; background-color: #ffffff; font-family: \'book antiqua\', palatino, serif; font-size: 10pt;\">Servicios Profesionales SA de CV</span></p>\n<p style=\"text-align: left; padding-left: 30px;\"><span style=\"color: #4f1c1c; background-color: #ffffff; font-family: \'book antiqua\', palatino, serif; font-size: 10pt;\">Edgar Fuentes Alvarez Director Comercial</span></p>\n<p style=\"text-align: left; padding-left: 30px;\"><span style=\"color: #4f1c1c; background-color: #ffffff; font-family: \'book antiqua\', palatino, serif; font-size: 10pt;\">edgar.fuentes@mail.com</span></p>\n<p style=\"text-align: center;\">&nbsp;</p>\n<p style=\"text-align: center;\">&nbsp;</p>\n</body>\n</html>',21,'2016-10-28 17:42:01'),(14,'','','<!DOCTYPE html>\n<html>\n<head>\n</head>\n<body>\n<p>&nbsp;</p>\n<p style=\"text-align: center;\"><span style=\"font-size: 36pt; font-family: \'comic sans ms\', sans-serif;\">Servicio de RH</span></p>\n<hr />\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"//www.tinymce.com/docs/images/tiny-husky.jpg\" alt=\"wolf\" width=\"320\" height=\"320\" /></p>\n</body>\n</html>',21,'2016-10-28 18:16:24'),(15,'Buen Fin','Aprovecha el buen fin','<!DOCTYPE html>\n<html>\n<head>\n</head>\n<body>\n<p style=\"text-align: center;\"><span style=\"font-size: 18pt; font-family: \'courier new\', courier, monospace; color: #0000ff;\"><strong>NUEVO PROMOCIONAL DE SERVICO ESPECIAL PARA CLIENTES PREFERENCIALES</strong></span></p>\n<hr />\n<p style=\"text-align: center;\">&nbsp;</p>\n<p style=\"text-align: center;\">&nbsp;</p>\n<table style=\"height: 63px; margin-left: auto; margin-right: auto;\" width=\"581\">\n<tbody>\n<tr>\n<td style=\"width: 282px; text-align: center;\"><span style=\"font-size: 12pt;\">SERVICIO CLIENTES PREFERENCIALES</span></td>\n<td style=\"width: 283px;\">COMIENZA EL BUEN FIN CON NOSOTROS</td>\n</tr>\n<tr>\n<td style=\"width: 282px;\">\n<p style=\"text-align: justify;\"><span style=\"font-size: 10pt;\">ESTE SERVICIO CUBRE LAS NECESIDADES PRINCIPALES DE MAQUILA DE NOMINA.</span></p>\n<p style=\"text-align: justify;\"><span style=\"font-size: 10pt;\">ESTAMOS OTORGANDO UN DESCUENTO DEL</span></p>\n<p style=\"text-align: justify;\"><span style=\"font-size: 18pt; color: #ff0000;\">30% DE DESCUENTO.</span></p>\n</td>\n<td style=\"width: 283px; text-align: justify;\"><span style=\"font-family: \'comic sans ms\', sans-serif;\">ES HORA DE QUE DISFRUTES DEL BUEN FIN EN TU EMPRESA Y QUE MEJOR QUE ESTO SE VEA REFLEJADO EN TUS SERVICIOS....</span></td>\n</tr>\n</tbody>\n</table>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n</body>\n</html>',21,'2016-11-07 17:53:42'),(16,'','','<!DOCTYPE html>\n<html>\n<head>\n</head>\n<body>\n<table style=\"height: 79px;\" border=\"1\" width=\"498\" cellspacing=\"15\">\n<tbody>\n<tr>\n<td style=\"width: 227px;\">SERVICIO 1&nbsp;</td>\n<td style=\"width: 216px;\">SERVICIO 2</td>\n</tr>\n<tr>\n<td style=\"width: 227px;\">&nbsp;</td>\n<td style=\"width: 216px;\">&nbsp;</td>\n</tr>\n</tbody>\n</table>\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"../file_upload/21_luis/2016_11_7/gen-t-recursos-humano.jpg\" alt=\"gen-t-recursos-humano.jpg\" width=\"250\" height=\"173\" /></p>\n<p>&nbsp;</p>\n<p style=\"text-align: center;\">TE INVITAMOS A QUE NOS VISITES</p>\n<p style=\"text-align: center;\">&nbsp;</p>\n<p style=\"text-align: center;\">&nbsp;</p>\n<p style=\"text-align: center;\">&nbsp;</p>\n</body>\n</html>',21,'2016-11-07 22:44:13'),(17,'demoo','Demooooooooo','<!DOCTYPE html>\n<html>\n<head>\n</head>\n<body>\n<p><img src=\"../file_upload/21_luis/2016_12_12/huella.jpg\" alt=\"huella.jpg\" width=\"100\" height=\"75\" />&nbsp; &nbsp; &nbsp; &nbsp;<img src=\"../file_upload/21_luis/2016_12_12/globos.jpg\" alt=\"globos.jpg\" width=\"250\" height=\"188\" /></p>\n<table>\n<tbody>\n<tr>\n<td>&nbsp;</td>\n<td>jkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk</td>\n</tr>\n</tbody>\n</table>\n</body>\n</html>',21,'2016-12-12 21:56:25'),(18,'demoo','Demooooooooo','<!DOCTYPE html>\n<html>\n<head>\n</head>\n<body>\n<p><img src=\"../file_upload/21_luis/2016_12_12/huella.jpg\" alt=\"huella.jpg\" width=\"100\" height=\"75\" />&nbsp; &nbsp; &nbsp; &nbsp;<img src=\"../file_upload/21_luis/2016_12_12/globos.jpg\" alt=\"globos.jpg\" width=\"250\" height=\"188\" /></p>\n<table>\n<tbody>\n<tr>\n<td>&nbsp;</td>\n<td>jkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk</td>\n</tr>\n</tbody>\n</table>\n</body>\n</html>',21,'2016-12-12 21:58:54'),(19,'demoo','Demooooooooo','<!DOCTYPE html>\n<html>\n<head>\n</head>\n<body>\n<p><img src=\"../file_upload/21_luis/2016_12_12/huella.jpg\" alt=\"huella.jpg\" width=\"100\" height=\"75\" />&nbsp; &nbsp; &nbsp; &nbsp;<img src=\"../file_upload/21_luis/2016_12_12/globos.jpg\" alt=\"globos.jpg\" width=\"250\" height=\"188\" /></p>\n<table>\n<tbody>\n<tr>\n<td>&nbsp;</td>\n<td>jkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk</td>\n</tr>\n</tbody>\n</table>\n</body>\n</html>',21,'2016-12-12 21:58:55'),(20,'demoo','Demooooooooo','<!DOCTYPE html>\n<html>\n<head>\n</head>\n<body>\n<p><img src=\"../file_upload/21_luis/2016_12_12/huella.jpg\" alt=\"huella.jpg\" width=\"100\" height=\"75\" />&nbsp; &nbsp; &nbsp; &nbsp;<img src=\"../file_upload/21_luis/2016_12_12/globos.jpg\" alt=\"globos.jpg\" width=\"250\" height=\"188\" /></p>\n<table>\n<tbody>\n<tr>\n<td>&nbsp;</td>\n<td>jkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk</td>\n</tr>\n</tbody>\n</table>\n</body>\n</html>',21,'2016-12-12 21:59:05'),(21,'','','<!DOCTYPE html>\n<html>\n<head>\n</head>\n<body>\n<p><img src=\"../file_upload/21_luis/2016_12_12/huella.jpg\" alt=\"huella.jpg\" width=\"100\" height=\"75\" />&nbsp; &nbsp; &nbsp; &nbsp;<img src=\"../file_upload/21_luis/2016_12_12/globos.jpg\" alt=\"globos.jpg\" width=\"250\" height=\"188\" /></p>\n<table>\n<tbody>\n<tr>\n<td>&nbsp;</td>\n<td>jkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk</td>\n</tr>\n</tbody>\n</table>\n</body>\n</html>',21,'2016-12-12 21:59:45'),(22,'','','<!DOCTYPE html>\n<html>\n<head>\n</head>\n<body>\n<p><img src=\"../file_upload/21_luis/2016_12_12/huella.jpg\" alt=\"huella.jpg\" width=\"100\" height=\"75\" />&nbsp; &nbsp; &nbsp; &nbsp;<img src=\"../file_upload/21_luis/2016_12_12/globos.jpg\" alt=\"globos.jpg\" width=\"250\" height=\"188\" /></p>\n<table>\n<tbody>\n<tr>\n<td>&nbsp;</td>\n<td>jkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk</td>\n</tr>\n</tbody>\n</table>\n</body>\n</html>',21,'2016-12-12 21:59:58');
/*!40000 ALTER TABLE `cartas_tipo` ENABLE KEYS */;
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