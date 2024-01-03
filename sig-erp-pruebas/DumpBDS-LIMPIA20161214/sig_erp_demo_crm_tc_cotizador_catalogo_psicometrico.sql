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
-- Table structure for table `crm_tc_cotizador_catalogo_psicometrico`
--

DROP TABLE IF EXISTS `crm_tc_cotizador_catalogo_psicometrico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crm_tc_cotizador_catalogo_psicometrico` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `prueba` varchar(255) NOT NULL,
  `evaluacion` varchar(255) NOT NULL,
  `niveles` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crm_tc_cotizador_catalogo_psicometrico`
--

LOCK TABLES `crm_tc_cotizador_catalogo_psicometrico` WRITE;
/*!40000 ALTER TABLE `crm_tc_cotizador_catalogo_psicometrico` DISABLE KEYS */;
INSERT INTO `crm_tc_cotizador_catalogo_psicometrico` VALUES (1,'16FP','Personalidad','Operativos, mandos medios y alta gerencia','Mide con 187 reactivos rasgos de personalidad. Toda vez que explora las características, impulsos y tendencias permanentes o esenciales del carácter de las personas.'),(2,'Allport','Valores','Mandos medios y alta gerencia','Consta de 45 reactivos. Mide la importancia de seis intereses básicos en la personalidad: Teórico, económico, estético, social, político y religioso.'),(3,'Barsit','Inteligencia','Operativo','Prueba de agilidad mental que el evaluado conteste correctamente el mayor número de preguntas en un tiempo específico, utilizando la lógica y la razón, operativos. 60 reactivos.'),(4,'Cleaver','Comportamiento y motivaciones','Operativos, mandos medios y alta gerencia','Evalúa el comportamiento del sujeto como líder de forma normal, motivado y bajo presión así como su desempeño en el puesto'),(5,'EGEP  (Escala Global de Estrés Postraumático)','Manejo de estrés y eventos traumáticos','Mandos medios y alta gerencia','Se compone de 62 ítems divididos en 3 secciones que hacen referencia a la evaluación de los acontecimientos traumáticos, la sintomatología y el funcionamiento del individuo.'),(6,'Estilos de Liderazgo','Liderazgo','Mandos medios y alta gerencia','Evalúa la relación conducta con toma de decisiones.'),(7,'Gordon','Personalidad','Mandos medios y alta gerencia','Consta de 38 reactivos, este test proporciona información acerca de ocho aspectos de la personalidad importantes dentro del funcionamiento diario de la persona, evalúa ascendencia, responsabilidad, estabilidad emocional, sociabilidad, cautela, originalidad, relaciones personales, vigor, autoestima e iniciativa.'),(8,'IPV','Personalidad y habilidad para ventas','Operativos, mandos medios y alta gerencia','Mide diversos aspectos de personalidad relacionados con las ventas.'),(9,'Kostic','Comportamiento en ambiente laboral','Mandos medios y alta gerencia','Consta de 90 preguntas, donde se deberá contestar la respuesta más afin a la personalidad, mide 20 factores de comportamiento.'),(10,'Luscher 16 colores','Personalidad','Operativos, mandos medios y alta gerencia','Consta de responder una secuencia de colores por preferencias. Mide diversos aspectos de personalidad.'),(11,'MIPS (Inventario Millon de Estilos de Personalidad )','Personalidad','Mandos medios y alta gerencia','Consta de 180 preguntas de Falso- Verdadero / SI – NO. Mide diversos tipos de personalidad y de trastornos emocionales.'),(12,'MMPI 2 (Inventario Multifásico de Personalidad de Minnesota)','Personalidad','Mandos medios y alta gerencia','Consta de 567 preguntas de Falso- Verdadero / SI – NO. Mide diversos tipos de personalidad y de trastornos emocionales'),(13,'Moss','Habilidades de supervisión y adaptabilidad social','Mandos medios y alta gerencia','Habilidades Gerenciales. Consta de 30 preguntas, es una evaluación de adaptabilidad social, esta prueba psicométrica evalúa el grado en que una persona se adapta a distintas situaciones sociales, como: Capacidad de decisión en las relaciones humanas. Capacidad de evaluación de problemas interpersonales. Habilidad para establecer relaciones interpersonales. Habilidad en supervisión. Sentido común. Tacto en las relaciones interpersonales.'),(14,'NEO-PIR (Inventario de Personalidad Neo - Revisado)','Personalidad','Mandos medios y alta gerencia','Este instrumento evalúa los principales factores de personalidad: Neuroticismo, Extraversión, Apertura, Amabilidad y Responsabilidad. Cada factor se compone de seis escalas o facetas, medidas por ocho ítems cada una, lo que hace un total de doscientas cuarenta cuestiones a responder.'),(15,'Otis','Inteligencia','Operativo','Esta es una prueba de agilidad mental en la cual se pretende que el evaluado conteste correctamente el mayor número de preguntas en un tiempo específico, utilizando la lógica y la razón.'),(16,'Raven','Inteligencia','Operativo','Consta de 60 preguntas presentadas en orden de dificultad creciente. Esta es una prueba de agilidad mental, se sugiere complementar con alguna otra de inteligencia según las capacidades del evaluado.'),(17,'Terman','Inteligencia','Mandos medios y alta gerencia','Consta de 10 bloques o series. Mide distintas áreas del conocimiento como son: Conocimientos generales, juicio y sentido común, capacidad de razonamiento, aritmética; juicio practico; habilidad para razonar, planeación, comprensión y organización de conceptos verbales y análisis en el manejo de aspectos numéricos.'),(18,'Thurstone','Inteligencia','Operativos y mandos medios','Consta de 140 preguntas, es una evaluación de medición de diversos factores temperamentales como son Actividad, vigor, impulso, dominancia, estabilidad, sociabilidad y reflexión.'),(19,'Test de Inteligencia Emocional','Personalidad','Operativos y mandos medios','Mide la capacidad que tiene una persona de manejar, entender, seleccionar y trabajar sus emociones y las de los demás con eficiencia y generando resultados positivos'),(20,'Wonderlic','Inteligencia','Operativos y mandos medios','Consta de 50 preguntas presentadas en orden de dificultad creciente. Esta es una prueba de agilidad mental en la cual se pretende que el evaluado conteste correctamente el mayor número de preguntas en un tiempo específico, utilizando la lógica y la razón.'),(21,'Zavic','Valores','Operativos y mandos medios','Consta de 20 preguntas con cuatro posibles respuestas cada una. Se divide en dos áreas: Valores e Intereses. Valores: moral, legalidad, indiferencia y corrupción. Intereses: económico, político, social y religioso.'),(22,'Orientación vocacional','Elegir carrera','Estudiantes de bachillerato','Evaluación que busca determinar habilidades o simpatia por alguna rama del conocimiento.'),(23,'Lifo','Habilidades en toma de decisiones','Mandos medios y alta gerencia','Consta de 18 reactivos, esta prueba nos permite identificar fuerzas y talentos del candidato evaluado, así como la forma de aplicarlas en sus tareas gerenciales.'),(24,'Sucesos de vida','Personalidad','Estudiantes de nivel basico','Consta de 120 preguntas, tiene la finalidad de detectar problemas emocionales en adolescentes, a partir de los sucesos estresantes y la evaluación afectiva que el joven mismo hace de ellos');
/*!40000 ALTER TABLE `crm_tc_cotizador_catalogo_psicometrico` ENABLE KEYS */;
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
