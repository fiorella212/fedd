-- MySQL dump 10.16  Distrib 10.1.21-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: localhost
-- ------------------------------------------------------
-- Server version	10.1.21-MariaDB

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
-- Table structure for table `area`
--

DROP TABLE IF EXISTS `area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `area` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) DEFAULT NULL,
  `id_local` int(10) unsigned NOT NULL,
  `usuario_creado` varchar(250) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `usuario_modificado` varchar(250) NOT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `area_local_UN` (`id_local`,`nombre`),
  CONSTRAINT `area_local_FK` FOREIGN KEY (`id_local`) REFERENCES `local` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `area`
--

LOCK TABLES `area` WRITE;
/*!40000 ALTER TABLE `area` DISABLE KEYS */;
INSERT INTO `area` VALUES (1,'Administracion',1,NULL,'2017-02-04 22:00:13','','2017-02-04 22:03:18',1),(2,'Sistemas',1,'admin','2017-02-05 09:53:35','','2017-02-05 09:53:35',1),(3,'rrhh',1,'admin','2017-02-05 09:54:48','admin','2017-02-05 09:56:01',0),(4,'GERENCIA DE PRODUCCIÓN',1,'admin','2017-02-23 01:17:18','',NULL,1),(5,'CAMPO',1,'admin','2017-02-23 01:17:30','',NULL,1);
/*!40000 ALTER TABLE `area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuestionario_siso`
--

DROP TABLE IF EXISTS `cuestionario_siso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuestionario_siso` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_puesto_trabajo` int(10) unsigned NOT NULL,
  `id_pregunta_siso` int(10) unsigned NOT NULL,
  `respuesta` tinyint(1) DEFAULT NULL,
  `usuario_creado` varchar(250) NOT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `usuario_modificado` varchar(250) NOT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `cuestionario_siso_puesto_trabajo_FK` (`id_puesto_trabajo`),
  KEY `cuestionario_siso_pregunta_siso_FK` (`id_pregunta_siso`),
  CONSTRAINT `cuestionario_siso_pregunta_siso_FK` FOREIGN KEY (`id_pregunta_siso`) REFERENCES `pregunta_siso` (`id`),
  CONSTRAINT `cuestionario_siso_puesto_trabajo_FK` FOREIGN KEY (`id_puesto_trabajo`) REFERENCES `puesto_trabajo` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=361 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuestionario_siso`
--

LOCK TABLES `cuestionario_siso` WRITE;
/*!40000 ALTER TABLE `cuestionario_siso` DISABLE KEYS */;
INSERT INTO `cuestionario_siso` VALUES (1,1,1,1,'admin','2017-02-05 16:23:35','admin','2017-02-26 15:23:24',0),(2,1,2,1,'admin','2017-02-05 16:23:35','admin','2017-02-26 15:23:24',0),(3,1,3,1,'admin','2017-02-05 16:23:35','admin','2017-02-26 15:23:24',0),(4,1,4,1,'admin','2017-02-05 16:23:35','admin','2017-02-26 15:23:24',0),(5,1,1,0,'admin','2017-02-05 16:23:49','admin','2017-02-26 15:23:24',0),(6,1,2,0,'admin','2017-02-05 16:23:50','admin','2017-02-26 15:23:24',0),(7,1,3,0,'admin','2017-02-05 16:23:50','admin','2017-02-26 15:23:24',0),(8,1,4,0,'admin','2017-02-05 16:23:50','admin','2017-02-26 15:23:24',0),(9,1,1,0,'admin','2017-02-07 05:18:59','admin','2017-02-26 15:23:25',0),(10,1,2,0,'admin','2017-02-07 05:18:59','admin','2017-02-26 15:23:25',0),(11,1,3,0,'admin','2017-02-07 05:18:59','admin','2017-02-26 15:23:25',0),(12,1,4,0,'admin','2017-02-07 05:18:59','admin','2017-02-26 15:23:25',0),(13,1,1,1,'admin','2017-02-07 05:48:23','admin','2017-02-26 15:23:25',0),(14,1,2,1,'admin','2017-02-07 05:48:23','admin','2017-02-26 15:23:25',0),(15,1,3,1,'admin','2017-02-07 05:48:23','admin','2017-02-26 15:23:25',0),(16,1,4,1,'admin','2017-02-07 05:48:23','admin','2017-02-26 15:23:25',0),(17,1,1,1,'admin','2017-02-07 06:54:23','admin','2017-02-26 15:23:25',0),(18,1,2,0,'admin','2017-02-07 06:54:23','admin','2017-02-26 15:23:25',0),(19,1,3,1,'admin','2017-02-07 06:54:23','admin','2017-02-26 15:23:26',0),(20,1,4,0,'admin','2017-02-07 06:54:23','admin','2017-02-26 15:23:26',0),(21,1,1,1,'admin','2017-02-07 06:55:28','admin','2017-02-26 15:23:26',0),(22,1,2,1,'admin','2017-02-07 06:55:28','admin','2017-02-26 15:23:26',0),(23,1,3,1,'admin','2017-02-07 06:55:28','admin','2017-02-26 15:23:26',0),(24,1,4,0,'admin','2017-02-07 06:55:28','admin','2017-02-26 15:23:26',0),(25,2,1,1,'admin','2017-02-07 07:14:08','admin','2017-02-20 23:43:33',0),(26,2,2,0,'admin','2017-02-07 07:14:08','admin','2017-02-20 23:43:33',0),(27,2,3,1,'admin','2017-02-07 07:14:08','admin','2017-02-20 23:43:33',0),(28,2,4,1,'admin','2017-02-07 07:14:08','admin','2017-02-20 23:43:33',0),(29,2,5,0,'admin','2017-02-07 07:14:08','admin','2017-02-20 23:43:33',0),(30,2,6,0,'admin','2017-02-07 07:14:08','admin','2017-02-20 23:43:33',0),(31,2,7,1,'admin','2017-02-07 07:14:08','admin','2017-02-20 23:43:33',0),(32,2,8,1,'admin','2017-02-07 07:14:08','admin','2017-02-20 23:43:33',0),(33,2,9,0,'admin','2017-02-07 07:14:08','admin','2017-02-20 23:43:33',0),(34,2,10,1,'admin','2017-02-07 07:14:08','admin','2017-02-20 23:43:33',0),(35,2,11,1,'admin','2017-02-07 07:14:08','admin','2017-02-20 23:43:33',0),(36,2,12,0,'admin','2017-02-07 07:14:08','admin','2017-02-20 23:43:33',0),(37,2,13,0,'admin','2017-02-07 07:14:08','admin','2017-02-20 23:43:33',0),(38,2,14,1,'admin','2017-02-07 07:14:08','admin','2017-02-20 23:43:33',0),(39,2,15,1,'admin','2017-02-07 07:14:08','admin','2017-02-20 23:43:33',0),(40,2,16,0,'admin','2017-02-07 07:14:08','admin','2017-02-20 23:43:33',0),(41,2,17,0,'admin','2017-02-07 07:14:08','admin','2017-02-20 23:43:33',0),(42,2,1,1,'admin','2017-02-07 07:24:00','admin','2017-02-20 23:43:33',0),(43,2,2,0,'admin','2017-02-07 07:24:00','admin','2017-02-20 23:43:33',0),(44,2,3,1,'admin','2017-02-07 07:24:00','admin','2017-02-20 23:43:33',0),(45,2,4,1,'admin','2017-02-07 07:24:00','admin','2017-02-20 23:43:33',0),(46,2,5,0,'admin','2017-02-07 07:24:00','admin','2017-02-20 23:43:33',0),(47,2,6,0,'admin','2017-02-07 07:24:00','admin','2017-02-20 23:43:33',0),(48,2,7,1,'admin','2017-02-07 07:24:00','admin','2017-02-20 23:43:33',0),(49,2,8,1,'admin','2017-02-07 07:24:00','admin','2017-02-20 23:43:33',0),(50,2,9,0,'admin','2017-02-07 07:24:00','admin','2017-02-20 23:43:33',0),(51,2,10,1,'admin','2017-02-07 07:24:00','admin','2017-02-20 23:43:33',0),(52,2,11,1,'admin','2017-02-07 07:24:00','admin','2017-02-20 23:43:33',0),(53,2,12,0,'admin','2017-02-07 07:24:00','admin','2017-02-20 23:43:33',0),(54,2,13,0,'admin','2017-02-07 07:24:00','admin','2017-02-20 23:43:33',0),(55,2,14,1,'admin','2017-02-07 07:24:00','admin','2017-02-20 23:43:33',0),(56,2,15,1,'admin','2017-02-07 07:24:00','admin','2017-02-20 23:43:33',0),(57,2,16,1,'admin','2017-02-07 07:24:00','admin','2017-02-20 23:43:33',0),(58,2,17,1,'admin','2017-02-07 07:24:00','admin','2017-02-20 23:43:33',0),(59,2,1,1,'admin','2017-02-07 07:25:34','admin','2017-02-20 23:43:33',0),(60,2,2,0,'admin','2017-02-07 07:25:34','admin','2017-02-20 23:43:33',0),(61,2,3,1,'admin','2017-02-07 07:25:34','admin','2017-02-20 23:43:33',0),(62,2,4,1,'admin','2017-02-07 07:25:34','admin','2017-02-20 23:43:33',0),(63,2,5,0,'admin','2017-02-07 07:25:34','admin','2017-02-20 23:43:33',0),(64,2,6,0,'admin','2017-02-07 07:25:34','admin','2017-02-20 23:43:33',0),(65,2,7,1,'admin','2017-02-07 07:25:34','admin','2017-02-20 23:43:33',0),(66,2,8,1,'admin','2017-02-07 07:25:34','admin','2017-02-20 23:43:33',0),(67,2,9,0,'admin','2017-02-07 07:25:34','admin','2017-02-20 23:43:33',0),(68,2,10,1,'admin','2017-02-07 07:25:34','admin','2017-02-20 23:43:33',0),(69,2,11,1,'admin','2017-02-07 07:25:34','admin','2017-02-20 23:43:33',0),(70,2,12,0,'admin','2017-02-07 07:25:34','admin','2017-02-20 23:43:33',0),(71,2,13,0,'admin','2017-02-07 07:25:34','admin','2017-02-20 23:43:33',0),(72,2,14,1,'admin','2017-02-07 07:25:34','admin','2017-02-20 23:43:33',0),(73,2,15,1,'admin','2017-02-07 07:25:34','admin','2017-02-20 23:43:33',0),(74,2,16,1,'admin','2017-02-07 07:25:34','admin','2017-02-20 23:43:33',0),(75,2,17,1,'admin','2017-02-07 07:25:34','admin','2017-02-20 23:43:33',0),(76,1,1,1,'admin','2017-02-09 04:21:52','admin','2017-02-26 15:23:26',0),(77,1,2,1,'admin','2017-02-09 04:21:52','admin','2017-02-26 15:23:26',0),(78,1,3,1,'admin','2017-02-09 04:21:52','admin','2017-02-26 15:23:26',0),(79,1,4,0,'admin','2017-02-09 04:21:52','admin','2017-02-26 15:23:27',0),(80,1,5,0,'admin','2017-02-09 04:21:52','admin','2017-02-26 15:23:27',0),(81,1,6,0,'admin','2017-02-09 04:21:52','admin','2017-02-26 15:23:27',0),(82,1,7,0,'admin','2017-02-09 04:21:52','admin','2017-02-26 15:23:27',0),(83,1,8,0,'admin','2017-02-09 04:21:52','admin','2017-02-26 15:23:27',0),(84,1,9,0,'admin','2017-02-09 04:21:52','admin','2017-02-26 15:23:27',0),(85,1,10,0,'admin','2017-02-09 04:21:52','admin','2017-02-26 15:23:27',0),(86,1,11,0,'admin','2017-02-09 04:21:52','admin','2017-02-26 15:23:27',0),(87,1,12,0,'admin','2017-02-09 04:21:52','admin','2017-02-26 15:23:28',0),(88,1,13,0,'admin','2017-02-09 04:21:52','admin','2017-02-26 15:23:28',0),(89,1,14,0,'admin','2017-02-09 04:21:52','admin','2017-02-26 15:23:28',0),(90,1,15,0,'admin','2017-02-09 04:21:52','admin','2017-02-26 15:23:28',0),(91,1,16,1,'admin','2017-02-09 04:21:52','admin','2017-02-26 15:23:28',0),(92,1,17,0,'admin','2017-02-09 04:21:52','admin','2017-02-26 15:23:28',0),(93,4,1,0,'admin','2017-02-13 01:50:00','admin','2017-02-13 01:55:53',0),(94,4,2,1,'admin','2017-02-13 01:50:00','admin','2017-02-13 01:55:53',0),(95,4,3,1,'admin','2017-02-13 01:50:00','admin','2017-02-13 01:55:53',0),(96,4,4,1,'admin','2017-02-13 01:50:00','admin','2017-02-13 01:55:53',0),(97,4,5,1,'admin','2017-02-13 01:50:00','admin','2017-02-13 01:55:53',0),(98,4,6,0,'admin','2017-02-13 01:50:00','admin','2017-02-13 01:55:53',0),(99,4,7,0,'admin','2017-02-13 01:50:00','admin','2017-02-13 01:55:53',0),(100,4,8,0,'admin','2017-02-13 01:50:00','admin','2017-02-13 01:55:53',0),(101,4,9,0,'admin','2017-02-13 01:50:00','admin','2017-02-13 01:55:53',0),(102,4,10,0,'admin','2017-02-13 01:50:00','admin','2017-02-13 01:55:53',0),(103,4,11,0,'admin','2017-02-13 01:50:00','admin','2017-02-13 01:55:53',0),(104,4,12,0,'admin','2017-02-13 01:50:00','admin','2017-02-13 01:55:53',0),(105,4,13,1,'admin','2017-02-13 01:50:00','admin','2017-02-13 01:55:53',0),(106,4,14,0,'admin','2017-02-13 01:50:00','admin','2017-02-13 01:55:53',0),(107,4,15,0,'admin','2017-02-13 01:50:00','admin','2017-02-13 01:55:53',0),(108,4,16,0,'admin','2017-02-13 01:50:00','admin','2017-02-13 01:55:53',0),(109,4,17,0,'admin','2017-02-13 01:50:00','admin','2017-02-13 01:55:53',0),(110,4,18,0,'admin','2017-02-13 01:50:00','admin','2017-02-13 01:55:53',0),(111,4,19,0,'admin','2017-02-13 01:50:00','admin','2017-02-13 01:55:53',0),(112,4,1,0,'admin','2017-02-13 01:55:53','','2017-02-12 19:55:53',1),(113,4,2,1,'admin','2017-02-13 01:55:53','','2017-02-12 19:55:53',1),(114,4,3,1,'admin','2017-02-13 01:55:53','','2017-02-12 19:55:53',1),(115,4,4,1,'admin','2017-02-13 01:55:53','','2017-02-12 19:55:53',1),(116,4,5,1,'admin','2017-02-13 01:55:53','','2017-02-12 19:55:53',1),(117,4,6,0,'admin','2017-02-13 01:55:53','','2017-02-12 19:55:53',1),(118,4,7,0,'admin','2017-02-13 01:55:53','','2017-02-12 19:55:53',1),(119,4,8,0,'admin','2017-02-13 01:55:53','','2017-02-12 19:55:53',1),(120,4,9,0,'admin','2017-02-13 01:55:53','','2017-02-12 19:55:53',1),(121,4,10,0,'admin','2017-02-13 01:55:53','','2017-02-12 19:55:53',1),(122,4,11,0,'admin','2017-02-13 01:55:53','','2017-02-12 19:55:53',1),(123,4,12,0,'admin','2017-02-13 01:55:53','','2017-02-12 19:55:53',1),(124,4,13,1,'admin','2017-02-13 01:55:53','','2017-02-12 19:55:53',1),(125,4,14,0,'admin','2017-02-13 01:55:53','','2017-02-12 19:55:53',1),(126,4,15,0,'admin','2017-02-13 01:55:53','','2017-02-12 19:55:53',1),(127,4,16,0,'admin','2017-02-13 01:55:53','','2017-02-12 19:55:53',1),(128,4,17,0,'admin','2017-02-13 01:55:53','','2017-02-12 19:55:53',1),(129,4,18,0,'admin','2017-02-13 01:55:53','','2017-02-12 19:55:53',1),(130,4,19,0,'admin','2017-02-13 01:55:53','','2017-02-12 19:55:53',1),(131,10,1,NULL,'admin','2017-02-20 11:43:22','admin','2017-02-20 11:43:34',0),(132,10,2,1,'admin','2017-02-20 11:43:22','admin','2017-02-20 11:43:34',0),(133,10,3,1,'admin','2017-02-20 11:43:22','admin','2017-02-20 11:43:34',0),(134,10,4,1,'admin','2017-02-20 11:43:22','admin','2017-02-20 11:43:34',0),(135,10,5,1,'admin','2017-02-20 11:43:22','admin','2017-02-20 11:43:34',0),(136,10,6,NULL,'admin','2017-02-20 11:43:22','admin','2017-02-20 11:43:34',0),(137,10,7,NULL,'admin','2017-02-20 11:43:22','admin','2017-02-20 11:43:34',0),(138,10,8,NULL,'admin','2017-02-20 11:43:22','admin','2017-02-20 11:43:34',0),(139,10,9,NULL,'admin','2017-02-20 11:43:22','admin','2017-02-20 11:43:34',0),(140,10,10,NULL,'admin','2017-02-20 11:43:22','admin','2017-02-20 11:43:34',0),(141,10,11,NULL,'admin','2017-02-20 11:43:22','admin','2017-02-20 11:43:34',0),(142,10,18,NULL,'admin','2017-02-20 11:43:22','admin','2017-02-20 11:43:34',0),(143,10,19,NULL,'admin','2017-02-20 11:43:22','admin','2017-02-20 11:43:34',0),(144,10,12,NULL,'admin','2017-02-20 11:43:22','admin','2017-02-20 11:43:34',0),(145,10,13,1,'admin','2017-02-20 11:43:22','admin','2017-02-20 11:43:34',0),(146,10,14,NULL,'admin','2017-02-20 11:43:22','admin','2017-02-20 11:43:34',0),(147,10,15,NULL,'admin','2017-02-20 11:43:22','admin','2017-02-20 11:43:34',0),(148,10,16,NULL,'admin','2017-02-20 11:43:22','admin','2017-02-20 11:43:34',0),(149,10,17,NULL,'admin','2017-02-20 11:43:22','admin','2017-02-20 11:43:34',0),(150,10,1,NULL,'admin','2017-02-20 11:43:29','admin','2017-02-20 11:43:34',0),(151,10,2,1,'admin','2017-02-20 11:43:29','admin','2017-02-20 11:43:34',0),(152,10,3,1,'admin','2017-02-20 11:43:29','admin','2017-02-20 11:43:34',0),(153,10,4,1,'admin','2017-02-20 11:43:29','admin','2017-02-20 11:43:34',0),(154,10,5,1,'admin','2017-02-20 11:43:29','admin','2017-02-20 11:43:34',0),(155,10,6,NULL,'admin','2017-02-20 11:43:29','admin','2017-02-20 11:43:34',0),(156,10,7,NULL,'admin','2017-02-20 11:43:29','admin','2017-02-20 11:43:34',0),(157,10,8,NULL,'admin','2017-02-20 11:43:29','admin','2017-02-20 11:43:34',0),(158,10,9,NULL,'admin','2017-02-20 11:43:29','admin','2017-02-20 11:43:34',0),(159,10,10,NULL,'admin','2017-02-20 11:43:29','admin','2017-02-20 11:43:34',0),(160,10,11,NULL,'admin','2017-02-20 11:43:29','admin','2017-02-20 11:43:34',0),(161,10,18,NULL,'admin','2017-02-20 11:43:29','admin','2017-02-20 11:43:34',0),(162,10,19,NULL,'admin','2017-02-20 11:43:29','admin','2017-02-20 11:43:34',0),(163,10,12,NULL,'admin','2017-02-20 11:43:29','admin','2017-02-20 11:43:34',0),(164,10,13,1,'admin','2017-02-20 11:43:29','admin','2017-02-20 11:43:34',0),(165,10,14,NULL,'admin','2017-02-20 11:43:29','admin','2017-02-20 11:43:34',0),(166,10,15,NULL,'admin','2017-02-20 11:43:29','admin','2017-02-20 11:43:34',0),(167,10,16,NULL,'admin','2017-02-20 11:43:29','admin','2017-02-20 11:43:34',0),(168,10,17,NULL,'admin','2017-02-20 11:43:29','admin','2017-02-20 11:43:34',0),(169,10,1,NULL,'admin','2017-02-20 11:43:34','',NULL,1),(170,10,2,1,'admin','2017-02-20 11:43:34','',NULL,1),(171,10,3,1,'admin','2017-02-20 11:43:34','',NULL,1),(172,10,4,1,'admin','2017-02-20 11:43:34','',NULL,1),(173,10,5,1,'admin','2017-02-20 11:43:34','',NULL,1),(174,10,6,NULL,'admin','2017-02-20 11:43:34','',NULL,1),(175,10,7,NULL,'admin','2017-02-20 11:43:34','',NULL,1),(176,10,8,NULL,'admin','2017-02-20 11:43:34','',NULL,1),(177,10,9,NULL,'admin','2017-02-20 11:43:34','',NULL,1),(178,10,10,NULL,'admin','2017-02-20 11:43:34','',NULL,1),(179,10,11,NULL,'admin','2017-02-20 11:43:34','',NULL,1),(180,10,18,NULL,'admin','2017-02-20 11:43:34','',NULL,1),(181,10,19,NULL,'admin','2017-02-20 11:43:34','',NULL,1),(182,10,12,NULL,'admin','2017-02-20 11:43:34','',NULL,1),(183,10,13,1,'admin','2017-02-20 11:43:34','',NULL,1),(184,10,14,NULL,'admin','2017-02-20 11:43:34','',NULL,1),(185,10,15,NULL,'admin','2017-02-20 11:43:34','',NULL,1),(186,10,16,NULL,'admin','2017-02-20 11:43:34','',NULL,1),(187,10,17,NULL,'admin','2017-02-20 11:43:34','',NULL,1),(188,22,1,0,'admin','2017-02-20 11:47:39','admin','2017-02-20 22:32:55',0),(189,22,2,1,'admin','2017-02-20 11:47:39','admin','2017-02-20 22:32:55',0),(190,22,3,1,'admin','2017-02-20 11:47:39','admin','2017-02-20 22:32:55',0),(191,22,4,1,'admin','2017-02-20 11:47:39','admin','2017-02-20 22:32:55',0),(192,22,5,1,'admin','2017-02-20 11:47:39','admin','2017-02-20 22:32:55',0),(193,22,6,NULL,'admin','2017-02-20 11:47:39','admin','2017-02-20 22:32:55',0),(194,22,7,NULL,'admin','2017-02-20 11:47:39','admin','2017-02-20 22:32:55',0),(195,22,8,NULL,'admin','2017-02-20 11:47:39','admin','2017-02-20 22:32:55',0),(196,22,9,NULL,'admin','2017-02-20 11:47:39','admin','2017-02-20 22:32:55',0),(197,22,10,NULL,'admin','2017-02-20 11:47:39','admin','2017-02-20 22:32:55',0),(198,22,11,NULL,'admin','2017-02-20 11:47:39','admin','2017-02-20 22:32:55',0),(199,22,18,NULL,'admin','2017-02-20 11:47:39','admin','2017-02-20 22:32:55',0),(200,22,19,NULL,'admin','2017-02-20 11:47:39','admin','2017-02-20 22:32:55',0),(201,22,12,NULL,'admin','2017-02-20 11:47:39','admin','2017-02-20 22:32:55',0),(202,22,13,1,'admin','2017-02-20 11:47:39','admin','2017-02-20 22:32:55',0),(203,22,14,NULL,'admin','2017-02-20 11:47:39','admin','2017-02-20 22:32:55',0),(204,22,15,NULL,'admin','2017-02-20 11:47:39','admin','2017-02-20 22:32:55',0),(205,22,16,NULL,'admin','2017-02-20 11:47:39','admin','2017-02-20 22:32:55',0),(206,22,17,NULL,'admin','2017-02-20 11:47:39','admin','2017-02-20 22:32:55',0),(207,22,1,0,'admin','2017-02-20 11:47:42','admin','2017-02-20 22:32:55',0),(208,22,2,1,'admin','2017-02-20 11:47:42','admin','2017-02-20 22:32:55',0),(209,22,3,1,'admin','2017-02-20 11:47:42','admin','2017-02-20 22:32:55',0),(210,22,4,1,'admin','2017-02-20 11:47:42','admin','2017-02-20 22:32:55',0),(211,22,5,1,'admin','2017-02-20 11:47:42','admin','2017-02-20 22:32:55',0),(212,22,6,NULL,'admin','2017-02-20 11:47:42','admin','2017-02-20 22:32:55',0),(213,22,7,NULL,'admin','2017-02-20 11:47:42','admin','2017-02-20 22:32:55',0),(214,22,8,NULL,'admin','2017-02-20 11:47:42','admin','2017-02-20 22:32:55',0),(215,22,9,NULL,'admin','2017-02-20 11:47:42','admin','2017-02-20 22:32:55',0),(216,22,10,NULL,'admin','2017-02-20 11:47:42','admin','2017-02-20 22:32:55',0),(217,22,11,NULL,'admin','2017-02-20 11:47:42','admin','2017-02-20 22:32:55',0),(218,22,18,NULL,'admin','2017-02-20 11:47:42','admin','2017-02-20 22:32:55',0),(219,22,19,NULL,'admin','2017-02-20 11:47:42','admin','2017-02-20 22:32:55',0),(220,22,12,NULL,'admin','2017-02-20 11:47:42','admin','2017-02-20 22:32:55',0),(221,22,13,1,'admin','2017-02-20 11:47:42','admin','2017-02-20 22:32:55',0),(222,22,14,NULL,'admin','2017-02-20 11:47:42','admin','2017-02-20 22:32:55',0),(223,22,15,NULL,'admin','2017-02-20 11:47:42','admin','2017-02-20 22:32:55',0),(224,22,16,NULL,'admin','2017-02-20 11:47:42','admin','2017-02-20 22:32:55',0),(225,22,17,NULL,'admin','2017-02-20 11:47:42','admin','2017-02-20 22:32:55',0),(226,22,1,0,'admin','2017-02-20 22:32:55','',NULL,1),(227,22,2,1,'admin','2017-02-20 22:32:55','',NULL,1),(228,22,3,1,'admin','2017-02-20 22:32:55','',NULL,1),(229,22,4,1,'admin','2017-02-20 22:32:55','',NULL,1),(230,22,5,1,'admin','2017-02-20 22:32:55','',NULL,1),(231,22,6,0,'admin','2017-02-20 22:32:55','',NULL,1),(232,22,7,0,'admin','2017-02-20 22:32:55','',NULL,1),(233,22,8,0,'admin','2017-02-20 22:32:55','',NULL,1),(234,22,9,0,'admin','2017-02-20 22:32:55','',NULL,1),(235,22,10,0,'admin','2017-02-20 22:32:55','',NULL,1),(236,22,11,0,'admin','2017-02-20 22:32:55','',NULL,1),(237,22,18,0,'admin','2017-02-20 22:32:55','',NULL,1),(238,22,19,0,'admin','2017-02-20 22:32:55','',NULL,1),(239,22,12,0,'admin','2017-02-20 22:32:55','',NULL,1),(240,22,13,1,'admin','2017-02-20 22:32:55','',NULL,1),(241,22,14,0,'admin','2017-02-20 22:32:55','',NULL,1),(242,22,15,0,'admin','2017-02-20 22:32:55','',NULL,1),(243,22,16,0,'admin','2017-02-20 22:32:55','',NULL,1),(244,22,17,0,'admin','2017-02-20 22:32:55','',NULL,1),(245,2,1,1,'admin','2017-02-20 23:43:33','',NULL,1),(246,2,2,0,'admin','2017-02-20 23:43:33','',NULL,1),(247,2,3,1,'admin','2017-02-20 23:43:33','',NULL,1),(248,2,4,1,'admin','2017-02-20 23:43:33','',NULL,1),(249,2,5,0,'admin','2017-02-20 23:43:33','',NULL,1),(250,2,6,0,'admin','2017-02-20 23:43:33','',NULL,1),(251,2,7,1,'admin','2017-02-20 23:43:33','',NULL,1),(252,2,8,1,'admin','2017-02-20 23:43:33','',NULL,1),(253,2,9,0,'admin','2017-02-20 23:43:33','',NULL,1),(254,2,10,1,'admin','2017-02-20 23:43:33','',NULL,1),(255,2,11,1,'admin','2017-02-20 23:43:33','',NULL,1),(256,2,18,0,'admin','2017-02-20 23:43:33','',NULL,1),(257,2,19,0,'admin','2017-02-20 23:43:33','',NULL,1),(258,2,12,1,'admin','2017-02-20 23:43:33','',NULL,1),(259,2,13,1,'admin','2017-02-20 23:43:33','',NULL,1),(260,2,14,1,'admin','2017-02-20 23:43:33','',NULL,1),(261,2,15,1,'admin','2017-02-20 23:43:33','',NULL,1),(262,2,16,0,'admin','2017-02-20 23:43:33','',NULL,1),(263,2,17,0,'admin','2017-02-20 23:43:33','',NULL,1),(264,1,1,1,'admin','2017-02-21 00:17:14','admin','2017-02-26 15:23:28',0),(265,1,2,1,'admin','2017-02-21 00:17:14','admin','2017-02-26 15:23:28',0),(266,1,3,1,'admin','2017-02-21 00:17:14','admin','2017-02-26 15:23:28',0),(267,1,4,0,'admin','2017-02-21 00:17:14','admin','2017-02-26 15:23:29',0),(268,1,5,0,'admin','2017-02-21 00:17:14','admin','2017-02-26 15:23:29',0),(269,1,6,0,'admin','2017-02-21 00:17:14','admin','2017-02-26 15:23:29',0),(270,1,7,0,'admin','2017-02-21 00:17:14','admin','2017-02-26 15:23:29',0),(271,1,8,0,'admin','2017-02-21 00:17:14','admin','2017-02-26 15:23:29',0),(272,1,9,0,'admin','2017-02-21 00:17:14','admin','2017-02-26 15:23:29',0),(273,1,10,0,'admin','2017-02-21 00:17:14','admin','2017-02-26 15:23:29',0),(274,1,11,0,'admin','2017-02-21 00:17:14','admin','2017-02-26 15:23:29',0),(275,1,18,0,'admin','2017-02-21 00:17:14','admin','2017-02-26 15:23:29',0),(276,1,19,0,'admin','2017-02-21 00:17:14','admin','2017-02-26 15:23:30',0),(277,1,12,0,'admin','2017-02-21 00:17:14','admin','2017-02-26 15:23:30',0),(278,1,13,0,'admin','2017-02-21 00:17:14','admin','2017-02-26 15:23:30',0),(279,1,14,1,'admin','2017-02-21 00:17:14','admin','2017-02-26 15:23:30',0),(280,1,15,0,'admin','2017-02-21 00:17:14','admin','2017-02-26 15:23:30',0),(281,1,16,0,'admin','2017-02-21 00:17:14','admin','2017-02-26 15:23:30',0),(282,1,17,0,'admin','2017-02-21 00:17:14','admin','2017-02-26 15:23:30',0),(283,15,1,1,'admin','2017-02-21 04:16:29','admin','2017-02-21 04:24:59',0),(284,15,2,0,'admin','2017-02-21 04:16:29','admin','2017-02-21 04:24:59',0),(285,15,3,1,'admin','2017-02-21 04:16:29','admin','2017-02-21 04:24:59',0),(286,15,4,1,'admin','2017-02-21 04:16:29','admin','2017-02-21 04:24:59',0),(287,15,5,NULL,'admin','2017-02-21 04:16:29','admin','2017-02-21 04:24:59',0),(288,15,6,NULL,'admin','2017-02-21 04:16:29','admin','2017-02-21 04:24:59',0),(289,15,7,NULL,'admin','2017-02-21 04:16:29','admin','2017-02-21 04:24:59',0),(290,15,8,NULL,'admin','2017-02-21 04:16:29','admin','2017-02-21 04:24:59',0),(291,15,9,NULL,'admin','2017-02-21 04:16:29','admin','2017-02-21 04:24:59',0),(292,15,10,NULL,'admin','2017-02-21 04:16:29','admin','2017-02-21 04:24:59',0),(293,15,11,NULL,'admin','2017-02-21 04:16:29','admin','2017-02-21 04:24:59',0),(294,15,18,NULL,'admin','2017-02-21 04:16:29','admin','2017-02-21 04:24:59',0),(295,15,19,NULL,'admin','2017-02-21 04:16:29','admin','2017-02-21 04:24:59',0),(296,15,12,NULL,'admin','2017-02-21 04:16:29','admin','2017-02-21 04:24:59',0),(297,15,13,NULL,'admin','2017-02-21 04:16:29','admin','2017-02-21 04:24:59',0),(298,15,14,NULL,'admin','2017-02-21 04:16:29','admin','2017-02-21 04:24:59',0),(299,15,15,NULL,'admin','2017-02-21 04:16:29','admin','2017-02-21 04:24:59',0),(300,15,16,NULL,'admin','2017-02-21 04:16:29','admin','2017-02-21 04:24:59',0),(301,15,17,NULL,'admin','2017-02-21 04:16:29','admin','2017-02-21 04:24:59',0),(302,15,1,1,'admin','2017-02-21 04:24:22','admin','2017-02-21 04:24:59',0),(303,15,2,0,'admin','2017-02-21 04:24:22','admin','2017-02-21 04:24:59',0),(304,15,3,1,'admin','2017-02-21 04:24:22','admin','2017-02-21 04:24:59',0),(305,15,4,1,'admin','2017-02-21 04:24:22','admin','2017-02-21 04:24:59',0),(306,15,5,1,'admin','2017-02-21 04:24:22','admin','2017-02-21 04:24:59',0),(307,15,6,0,'admin','2017-02-21 04:24:22','admin','2017-02-21 04:24:59',0),(308,15,7,1,'admin','2017-02-21 04:24:22','admin','2017-02-21 04:24:59',0),(309,15,8,1,'admin','2017-02-21 04:24:22','admin','2017-02-21 04:24:59',0),(310,15,9,1,'admin','2017-02-21 04:24:22','admin','2017-02-21 04:24:59',0),(311,15,10,1,'admin','2017-02-21 04:24:22','admin','2017-02-21 04:24:59',0),(312,15,11,0,'admin','2017-02-21 04:24:22','admin','2017-02-21 04:24:59',0),(313,15,18,0,'admin','2017-02-21 04:24:22','admin','2017-02-21 04:24:59',0),(314,15,19,0,'admin','2017-02-21 04:24:22','admin','2017-02-21 04:24:59',0),(315,15,12,1,'admin','2017-02-21 04:24:22','admin','2017-02-21 04:24:59',0),(316,15,13,1,'admin','2017-02-21 04:24:22','admin','2017-02-21 04:24:59',0),(317,15,14,1,'admin','2017-02-21 04:24:22','admin','2017-02-21 04:24:59',0),(318,15,15,1,'admin','2017-02-21 04:24:22','admin','2017-02-21 04:24:59',0),(319,15,16,0,'admin','2017-02-21 04:24:22','admin','2017-02-21 04:24:59',0),(320,15,17,1,'admin','2017-02-21 04:24:22','admin','2017-02-21 04:24:59',0),(321,15,1,1,'admin','2017-02-21 04:24:59','',NULL,1),(322,15,2,0,'admin','2017-02-21 04:24:59','',NULL,1),(323,15,3,1,'admin','2017-02-21 04:24:59','',NULL,1),(324,15,4,1,'admin','2017-02-21 04:24:59','',NULL,1),(325,15,5,1,'admin','2017-02-21 04:24:59','',NULL,1),(326,15,6,0,'admin','2017-02-21 04:24:59','',NULL,1),(327,15,7,1,'admin','2017-02-21 04:24:59','',NULL,1),(328,15,8,1,'admin','2017-02-21 04:24:59','',NULL,1),(329,15,9,1,'admin','2017-02-21 04:24:59','',NULL,1),(330,15,10,1,'admin','2017-02-21 04:24:59','',NULL,1),(331,15,11,0,'admin','2017-02-21 04:24:59','',NULL,1),(332,15,18,0,'admin','2017-02-21 04:24:59','',NULL,1),(333,15,19,0,'admin','2017-02-21 04:24:59','',NULL,1),(334,15,12,1,'admin','2017-02-21 04:24:59','',NULL,1),(335,15,13,1,'admin','2017-02-21 04:24:59','',NULL,1),(336,15,14,1,'admin','2017-02-21 04:24:59','',NULL,1),(337,15,15,1,'admin','2017-02-21 04:24:59','',NULL,1),(338,15,16,0,'admin','2017-02-21 04:24:59','',NULL,1),(339,15,17,1,'admin','2017-02-21 04:24:59','',NULL,1),(340,1,1,1,'admin','2017-02-26 15:23:30','',NULL,1),(341,1,2,1,'admin','2017-02-26 15:23:31','',NULL,1),(342,1,3,1,'admin','2017-02-26 15:23:31','',NULL,1),(343,1,4,0,'admin','2017-02-26 15:23:31','',NULL,1),(344,1,5,0,'admin','2017-02-26 15:23:31','',NULL,1),(345,1,6,0,'admin','2017-02-26 15:23:31','',NULL,1),(346,1,7,0,'admin','2017-02-26 15:23:31','',NULL,1),(347,1,8,0,'admin','2017-02-26 15:23:31','',NULL,1),(348,1,9,0,'admin','2017-02-26 15:23:32','',NULL,1),(349,1,10,0,'admin','2017-02-26 15:23:32','',NULL,1),(350,1,11,0,'admin','2017-02-26 15:23:32','',NULL,1),(351,1,18,0,'admin','2017-02-26 15:23:32','',NULL,1),(352,1,19,0,'admin','2017-02-26 15:23:32','',NULL,1),(353,1,20,0,'admin','2017-02-26 15:23:32','',NULL,1),(354,1,21,0,'admin','2017-02-26 15:23:32','',NULL,1),(355,1,12,1,'admin','2017-02-26 15:23:32','',NULL,1),(356,1,13,0,'admin','2017-02-26 15:23:33','',NULL,1),(357,1,14,0,'admin','2017-02-26 15:23:33','',NULL,1),(358,1,15,0,'admin','2017-02-26 15:23:33','',NULL,1),(359,1,16,1,'admin','2017-02-26 15:23:33','',NULL,1),(360,1,17,1,'admin','2017-02-26 15:23:33','',NULL,1);
/*!40000 ALTER TABLE `cuestionario_siso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresa`
--

DROP TABLE IF EXISTS `empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresa` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `codigo` varchar(250) DEFAULT NULL,
  `razon_social` varchar(250) DEFAULT NULL,
  `ruc` varchar(12) DEFAULT NULL,
  `direccion` varchar(250) DEFAULT NULL,
  `telefono` varchar(12) DEFAULT NULL,
  `usuario_creado` varchar(250) NOT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `usuario_modificado` varchar(250) NOT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `empresa_codigo_UN` (`codigo`),
  UNIQUE KEY `empresa_ruc_UN` (`ruc`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa`
--

LOCK TABLES `empresa` WRITE;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT INTO `empresa` VALUES (1,'EMP','EmpresaCool','11111111111','1111','1111','','2017-02-04 22:04:11','','2017-02-04 22:04:11',1),(2,'EMP2','CSG_3','12312312333','por ahi','54656354654','','2017-02-04 22:04:11','','2017-02-04 22:04:11',1),(3,'EMP3','asdfasd','34232321234','dsfsdf','fdf44','','2017-02-04 22:04:11','','2017-02-04 22:04:11',1),(4,'EMP4','Bakus','44444555569','callao','12346','admin','2017-02-05 09:32:39','admin','2017-02-05 09:38:01',0),(8,'EMP5','RUC REPETIDO','11111111112','sdfsdfsdf','2434343434','admin','2017-02-26 14:05:27','',NULL,1);
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `local`
--

DROP TABLE IF EXISTS `local`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `local` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_empresa` int(10) unsigned NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `direccion` varchar(250) DEFAULT NULL,
  `encargado` varchar(250) DEFAULT NULL,
  `telefono` varchar(12) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `usuario_creado` varchar(250) NOT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `usuario_modificado` varchar(250) NOT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `local_empresa_UN` (`id_empresa`,`nombre`),
  CONSTRAINT `local_empresa_FK` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `local`
--

LOCK TABLES `local` WRITE;
/*!40000 ALTER TABLE `local` DISABLE KEYS */;
INSERT INTO `local` VALUES (1,1,'Huachipa','sdfasdf','dfsdf','dsfsdf','sdfsdf','','2017-02-04 22:06:21','','2017-02-04 22:06:21',1),(2,1,'Lima','asdfasd','erever','565','dfsdfs','','2017-02-04 22:06:21','','2017-02-04 22:06:21',1),(3,2,'Surco','Surco','Tiburcio','243234234','tiburcio@sdfsdf.cc','','2017-02-04 22:06:21','','2017-02-04 22:06:21',1),(4,1,'aaa','aaa','aa','aaa','aaa@aaa.com','admin','2017-02-05 09:43:15','admin','2017-02-05 09:44:39',0),(6,3,'aaa','asdf','asdf','3423423','asdf@sdfsd.cc','admin','2017-02-26 17:19:33','',NULL,1),(9,1,'aaab','dfsdfsd','fsdfsdf','2323232','dfdff@fefe.cc','admin','2017-02-26 17:21:43','',NULL,1);
/*!40000 ALTER TABLE `local` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permisos`
--

DROP TABLE IF EXISTS `permisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permisos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) DEFAULT NULL,
  `base_url` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permisos`
--

LOCK TABLES `permisos` WRITE;
/*!40000 ALTER TABLE `permisos` DISABLE KEYS */;
INSERT INTO `permisos` VALUES (1,'Mant. Puestos de trabajo','puestos'),(2,'Importar personal SAP','personal'),(3,'Mant. Empresa','empresa'),(4,'Mant. Local','local'),(5,'Mant. Area','area'),(6,'Evaluacion EVA-ERIN','evaerin'),(7,'Evaluacion Siso','siso'),(8,'Evaluacion Fedd','fedd'),(9,'Reporte interno','reporte'),(10,'Mant. Roles','rol'),(11,'Mant. Usuario','usuario'),(12,'Configuracion Siso','siso/configuracion');
/*!40000 ALTER TABLE `permisos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal`
--

DROP TABLE IF EXISTS `personal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `planilla` varchar(45) DEFAULT NULL,
  `codigo_sap` varchar(45) DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `nombres_trabajador` varchar(200) DEFAULT NULL,
  `apellidos_trabajador` varchar(200) DEFAULT NULL,
  `regimen` varchar(100) DEFAULT NULL,
  `sede` varchar(100) DEFAULT NULL,
  `denominacion_sap` varchar(100) DEFAULT NULL,
  `area` varchar(100) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `sexo` enum('M','F') DEFAULT NULL,
  `anos_res_jubilacion` int(11) DEFAULT NULL,
  `ano_jubilacion` int(11) DEFAULT NULL,
  `dni` int(11) DEFAULT NULL,
  `codigo_trabajador` varchar(45) DEFAULT NULL,
  `gerencia` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal`
--

LOCK TABLES `personal` WRITE;
/*!40000 ALTER TABLE `personal` DISABLE KEYS */;
INSERT INTO `personal` VALUES (1,'AU','30011102','0000-00-00','MANRIQUE BARQUERO PAUL MANUEL','EMPLEADO','PLANTA AREQUIPA','AUXILIAR DE CONTROL DE CALIDAD','Calidad AQP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,'AU','30012673','0000-00-00','ASTORGA GONZALES TERESA LIZBETH','EMPLEADO','PLANTA AREQUIPA','INSPECTOR CONTROL DE CALIDAD','Calidad AQP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,'LU','30016435','0000-00-00','BARREDA CHOQUE EDUARDO MANUEL','EMPLEADO','PLANTA AREQUIPA','ASESOR TECNICO DE CAMPO','Campo',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,'AU','30015652','0000-00-00','SANCHEZ ZEGARRA ALEXANDRA','EMPLEADO','PLANTA AREQUIPA','ASISTENTE DE PRODUCCION','Condensería AQP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,'AU','30002077','0000-00-00','HERRERA LINARES CARLOS FREDY','EMPLEADO','PLANTA AREQUIPA','PESADOR','Condensería AQP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,'AU','30002076','0000-00-00','FLORES ALCAZAR LESMES TEOFILO','EMPLEADO','PLANTA AREQUIPA','SUPERVISOR DE TURNO','Condensería AQP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,'AU','30002504','0000-00-00','ANDRADE MIMBELA JUAN CARLOS','EMPLEADO','PLANTA AREQUIPA','SUPERVISOR SENIOR','Condensería AQP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,'AU','30004252','0000-00-00','ALEJO RIVERA WILLY NICOLAS','EMPLEADO','PLANTA AREQUIPA','TECNICO DE ELABORACION','Condensería AQP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,'AU','30026301','0000-00-00','CACERES ARENAS DORA PIERINA','EMPLEADO','PLANTA AREQUIPA','TECNICO DE LABORATORIO','Condensería AQP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(10,'AU','30002083','0000-00-00','BOLAÑOS ARROSPIDE JULIAN RICARDO','FUNCIONARIOS','PLANTA AREQUIPA','JEFE DE PRODUCCION CONDENSERIA','Condensería AQP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(11,'AU','30002080','0000-00-00','CANAZA QUILLA VICENTE','OBRERO','PLANTA AREQUIPA','MONTACARGUISTA','Condensería AQP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(12,'AU','30025247','0000-00-00','BEDOYA SALAS SILVIO JESUS','OBRERO','PLANTA AREQUIPA','OPERADOR','Condensería AQP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(13,'AU','30031280','0000-00-00','ALVAREZ OSORIO GERARDO','OBRERO','PLANTA AREQUIPA','OPERARIO','Condensería AQP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(14,'AU','30010837','0000-00-00','FLORES PALOMINO LUIS RENATO','EMPLEADO','PLANTA AREQUIPA','ALMACENERO PRODUCTOS TERMINADOS','Derivados Lácteos AQP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(15,'AU','30004261','0000-00-00','PAREDES DELGADO ALESSANDRO MANUEL','EMPLEADO','PLANTA AREQUIPA','ENCARGADO DE ALMACEN','Derivados Lácteos AQP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(16,'AU','30010678','0000-00-00','BUSTINZA FLORES JIMMY DANTE','EMPLEADO','PLANTA AREQUIPA','SUPERVISOR DE TURNO','Derivados Lácteos AQP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(17,'AU','30007724','0000-00-00','ROJAS LAVA CARLOS ALFONSO','FUNCIONARIOS','PLANTA AREQUIPA','JEFE DE PRODUCCION DL AREQUIPA','Derivados Lácteos AQP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(18,'AU','30012871','0000-00-00','ALVAREZ MAMANI LUIS  ALBERTO','OBRERO','PLANTA AREQUIPA','OPERADOR','Derivados Lácteos AQP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(19,'AU','30000324','0000-00-00','YUCRA PADILLA RONALD BERLY','OBRERO','PLANTA AREQUIPA','OPERADOR SENIOR','Derivados Lácteos AQP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(20,'AU','30027427','0000-00-00','CHAMBI DE COPA LOURDES MAXIMA','OBRERO','PLANTA AREQUIPA','OPERARIO','Derivados Lácteos AQP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(21,'AU','30028481','0000-00-00','VILLEGAS URETA MAXIMO','EMPLEADO','PLANTA AREQUIPA','SUPERVISOR','Fábrica de Envases AQP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(22,'AU','30030615','0000-00-00','MENDOZA ESCOBEDO ALEXANDER','EMPLEADO','PLANTA AREQUIPA','SUPERVISOR DE TURNO','Fábrica de Envases AQP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(23,'AU','30016660','0000-00-00','ACO CHIRINOS DANIEL JESUS','OBRERO','PLANTA AREQUIPA','OPERADOR','Fábrica de Envases AQP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(24,'AU','30016728','0000-00-00','QUISPE VILCA DIEGO JESUS','OBRERO','PLANTA AREQUIPA','OPERARIO','Fábrica de Envases AQP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(25,'AU','30013410','0000-00-00','MAMANI LAQUISE HUGO ARMANDO','EMPLEADO','PLANTA AREQUIPA','ASISTENTE DE ALMACEN','Logística AQP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(26,'AU','30002088','0000-00-00','AMANQUI HUANCA SANTIAGO','EMPLEADO','PLANTA AREQUIPA','AUXILIAR DE ALMACEN','Logística AQP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(27,'AU','30002089','0000-00-00','MARQUEZ JUAREZ MARIO EDUARDO','EMPLEADO','PLANTA AREQUIPA','RECEPCIONISTA','Logística AQP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(28,'AU','30010376','0000-00-00','BARRIGA GALLEGOS GORKY LEONEL','EMPLEADO','PLANTA AREQUIPA','SUPERVISOR DE ALMACEN','Logística AQP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(29,'AU','30014568','0000-00-00','PONCE ORELLANA ERICK MATEO','EMPLEADO','PLANTA AREQUIPA','SUPERVISOR DE MANTENIMIENTO','Mantenimiento AQP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(30,'AU','30004522','0000-00-00','MONTALVO DIAZ PAUL LARRY','EMPLEADO','PLANTA AREQUIPA','SUPERVISOR DE MANTENIMIENTO VEHICULOS','Mantenimiento AQP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(31,'AU','30015734','0000-00-00','DAVILA MORALES MANUEL ALEJANDRO','EMPLEADO','PLANTA AREQUIPA','SUPERVISOR ELECTRICO','Mantenimiento AQP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(32,'AU','30029518','0000-00-00','HUAJE FLORES JORGE ANGEL','EMPLEADO','PLANTA AREQUIPA','SUPERVISOR MECANICO','Mantenimiento AQP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(33,'AU','30015653','0000-00-00','ZUÑIGA NAVARRO WALTER JAIME','EMPLEADO','PLANTA AREQUIPA','TECNICO DE AUTOMATIZACION','Mantenimiento AQP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(34,'AU','30000780','0000-00-00','CONDORI TINTAYA WALTER EUSEBIO','EMPLEADO','PLANTA AREQUIPA','TECNICO INSTRUMENTISTA','Mantenimiento AQP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(35,'AU','30006850','0000-00-00','VALDIVIA BARRIGA GIANCARLO ALBERTO','EMPLEADO','PLANTA AREQUIPA','TECNICO PREDICTIVO','Mantenimiento AQP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(36,'AU','30014105','0000-00-00','TEJADA LOZANO RONALD AUGUSTO','FUNCIONARIOS','PLANTA AREQUIPA','COORDINADOR DE MANTENIMIENTO','Mantenimiento AQP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(37,'AU','30032221','0000-00-00','TORRES CONDORI NESTOR MARTIN','OBRERO','PLANTA AREQUIPA','ELECTRICISCTA ELECTRONICO','Mantenimiento AQP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(38,'AU','30030727','0000-00-00','CASTRO CASTILLO FRANK MICHAEL','OBRERO','PLANTA AREQUIPA','ELECTRICISTA ELECTRONICO','Mantenimiento AQP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(39,'AU','30015351','0000-00-00','CADILLO ORTIZ ROMULO YUSHONY','OBRERO','PLANTA AREQUIPA','MECANICO','Mantenimiento AQP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(40,'AU','30004525','0000-00-00','ALCAZAR CALDERON MARTIN TEODOCIO','OBRERO','PLANTA AREQUIPA','OPERADOR','Mantenimiento AQP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(41,'AU','30000144','0000-00-00','ZEGARRA YABAR CHARLIE JUAN','EMPLEADO','PLANTA AREQUIPA','SUPERVISOR DE PROYECTOS','Proyectos',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(42,'AU','30015733','0000-00-00','HUERTAS SORIA GERSON ALBERTO','FUNCIONARIOS','PLANTA AREQUIPA','INGENIERO DE PROYECTOS','Proyectos',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(43,'LU','30032645','0000-00-00','CHUQUILIN MEDINA RONALD ENRIQUE','EMPLEADO','PLANTA CAJAMARC','INSPECTOR CONTROL DE CALIDAD','Calidad LIM',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(44,'LU','30009419','0000-00-00','RAMOS PAEZ PERCY OSWALDO','EMPLEADO','PLANTA CAJAMARC','ADMINISTRADOR TECNICO DE CAMPO','Planta Cajamarca',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(45,'LU','30002661','0000-00-00','QUINDE HUAYGUA AUGUSTO LAURENS','EMPLEADO','PLANTA CAJAMARC','ALMACENERO','Planta Cajamarca',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(46,'LU','30012745','0000-00-00','DELGADO HORNA HEBER ELI','EMPLEADO','PLANTA CAJAMARC','ASESOR TECNICO DE CAMPO','Planta Cajamarca',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(47,'LU','30000732','0000-00-00','ORUNA ABANTO WILLIAM ROGER','EMPLEADO','PLANTA CAJAMARC','ASISTENTE DE MANTENIMIENTO','Planta Cajamarca',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(48,'LU','30000194','0000-00-00','CACHI ALCANTARA SEGUNDO MARCELINO','EMPLEADO','PLANTA CAJAMARC','AUXILIAR DE ALMACEN','Planta Cajamarca',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(49,'LU','30000892','0000-00-00','FLORES PEREZ LUIS ORLANDO','EMPLEADO','PLANTA CAJAMARC','JEFE DE MANTENIMIENTO','Planta Cajamarca',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(50,'LU','30000193','0000-00-00','VILCHEZ CERDAN TEODORO','EMPLEADO','PLANTA CAJAMARC','JEFE DE TALLER','Planta Cajamarca',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(51,'99999','qwerty','1992-11-29','jorge jair','nunez solis','12','13','4','Desarrollo','1992-11-29','M',30,2500,73332718,'76985464','Operaciones');
/*!40000 ALTER TABLE `personal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pregunta_siso`
--

DROP TABLE IF EXISTS `pregunta_siso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pregunta_siso` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pregunuta` varchar(250) DEFAULT NULL,
  `grupo` varchar(250) DEFAULT NULL,
  `tipo_riesgo` varchar(250) DEFAULT NULL,
  `valor_s_visual` int(11) DEFAULT NULL,
  `valor_s_auditivo` int(11) DEFAULT NULL,
  `valor_m_ext_inferior` int(11) DEFAULT NULL,
  `valor_m_ext_superior` int(11) DEFAULT NULL,
  `valor_m_intelectual` int(11) DEFAULT NULL,
  `valor_m_psicosocial` int(11) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL,
  `usuario_creado` varchar(250) NOT NULL,
  `fecha_creado` datetime DEFAULT CURRENT_TIMESTAMP,
  `usuario_modificado` varchar(250) NOT NULL,
  `fecha_modificado` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pregunta_siso`
--

LOCK TABLES `pregunta_siso` WRITE;
/*!40000 ALTER TABLE `pregunta_siso` DISABLE KEYS */;
INSERT INTO `pregunta_siso` VALUES (1,'Se realiza alguna tarea por encima de 1.80m, o dentro de un espacio confinado (accesos restringidos), o trabajos con llamas o chispas?','Seguridad en el puesto de trabajo','Entorno',0,0,0,0,0,0,1,'','2017-02-24 18:36:58','','2017-02-24 18:37:09'),(2,'Se encuentra por encima del primer piso y se accede mediante escaleras o ascensores?','Seguridad en el puesto de trabajo','Entorno',2,2,0,0,NULL,NULL,1,'','2017-02-24 18:36:58','','2017-02-24 18:37:09'),(3,'Existen altos niveles de ruido?','Seguridad en el puesto de trabajo','Entorno',NULL,1,NULL,NULL,4,4,1,'','2017-02-24 18:36:58','','2017-02-24 18:37:09'),(4,'Tiene cambios bruscos de temperatura (calor, frío, humedad)?','Seguridad en el puesto de trabajo','Entorno',NULL,NULL,1,1,NULL,NULL,1,'','2017-02-24 18:36:58','','2017-02-24 18:37:09'),(5,'El puesto esta expuesto a Radiacion Solar en forma directa?','Seguridad en el puesto de trabajo','Entorno',2,NULL,NULL,NULL,NULL,NULL,1,'','2017-02-24 18:36:58','','2017-02-24 18:37:09'),(6,'El puesto requiere completar formatos de Analisis de Riesgo (Permisos de Trabajo de Riesgo, AST o ATS, etc)?','Seguridad en el puesto de trabajo','Entorno',0,0,1,1,0,0,1,'','2017-02-24 18:36:58','','2017-02-24 18:37:09'),(7,'Tienen elementos giratorios o que se desplazan en forma vertical u horizontal?','Seguridad en el puesto de trabajo','Equipos y Herramientas',0,0,0,0,0,NULL,1,'','2017-02-24 18:36:58','','2017-02-24 18:37:09'),(8,'Esta expuesto a vibraciones debido a Herramientas o Uso de Equipos?','Seguridad en el puesto de trabajo','Equipos y Herramientas',NULL,NULL,0,0,NULL,0,1,'','2017-02-24 18:36:58','','2017-02-24 18:37:09'),(9,'Cerca al puesto de trabajo circulan vehículos o equipos?','Seguridad en el puesto de trabajo','Equipos y Herramientas',1,0,0,1,0,NULL,1,'','2017-02-24 18:36:58','','2017-02-24 18:37:09'),(10,'Tiene carcasa de metal y estan alimentados por Energia Electrica?','Seguridad en el puesto de trabajo','Equipos y Herramientas',1,NULL,NULL,0,0,1,1,'','2017-02-24 18:36:58','','2017-02-24 18:37:09'),(11,'En el puesto de trabajo se manipulan frecuentemente cargas (para levantar, trasladar, posicionar, etc)? ','Seguridad en el puesto de trabajo','Materiales',1,1,0,0,0,1,1,'','2017-02-24 18:36:58','','2017-02-24 18:37:09'),(12,'Existe peligro vinculado a control de Presión o control de Temperatura en relacion al proceso productivo?','Seguridad en el Proceso','Proceso',1,1,1,1,1,NULL,1,'','2017-02-24 18:36:58','','2017-02-24 18:37:09'),(13,'Existe peligro vinculado a control de concentracion, proporciones o mezcla de productos químicos en el proceso productivo?','Seguridad en el Proceso','Proceso',1,2,2,1,0,NULL,1,'','2017-02-24 18:36:58','','2017-02-24 18:37:09'),(14,'El Proceso Productivo es tan crítico que requiere de inspecciones, controles o mantenimientos continuos de equipos o máquinas?','Seguridad en el Proceso','Proceso',0,0,0,0,0,1,1,'','2017-02-24 18:36:58','','2017-02-24 18:37:09'),(15,'El Proceso Productivo requiere utilizar fuentes de calor con llamas, calderos, reactores o superficies calientes?','Seguridad en el Proceso','Proceso',1,1,1,1,1,0,1,'','2017-02-24 18:36:58','','2017-02-24 18:37:09'),(16,'El Proceso Productivo se desarrolla en atmosferas explosivas o tóxicas?','Seguridad en el Proceso','Proceso',0,0,0,0,0,0,1,'','2017-02-24 18:36:58','','2017-02-24 18:37:09'),(17,'Una falla en el proceso productivo puede liberar gases, liquidos o materiales muy toxicos o contaminantes?','Seguridad en el Proceso','Proceso',0,0,0,0,0,0,1,'','2017-02-24 18:36:58','','2017-02-24 18:37:09'),(18,'Existen cargas suspendidas por encima del puesto de trabajo en algun momento?','Seguridad en el puesto de trabajo','Materiales',1,0,0,2,0,NULL,1,'','2017-02-24 18:36:58','','2017-02-24 18:37:09'),(19,'Los materiales o insumos que utiliza son peligrosos y/o tóxicos?','Seguridad en el puesto de trabajo','Materiales',0,0,1,1,0,NULL,1,'','2017-02-24 18:36:58','','2017-02-24 18:37:09'),(20,'147','Seguridad en el Proceso','Entorno',2,NULL,0,2,NULL,NULL,0,'','2017-02-24 18:36:58','admin','2017-02-24 18:41:20'),(21,'Pregunta a Eliminar','Seguridad en el Proceso','Equipos y Herramientas',2,3,0,2,NULL,NULL,0,'','2017-02-24 18:36:58','admin','2017-02-24 18:41:10');
/*!40000 ALTER TABLE `pregunta_siso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `preguntas_doctor`
--

DROP TABLE IF EXISTS `preguntas_doctor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `preguntas_doctor` (
  `valor_s_visual_preg` varchar(250) DEFAULT NULL,
  `valor_s_auditivo_preg` varchar(250) DEFAULT NULL,
  `valor_m_ext_inferior_preg` varchar(250) DEFAULT NULL,
  `valor_m_ext_superior_preg` varchar(250) DEFAULT NULL,
  `valor_m_intelectual_preg` varchar(250) DEFAULT NULL,
  `valor_m_psicosocial_preg` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preguntas_doctor`
--

LOCK TABLES `preguntas_doctor` WRITE;
/*!40000 ALTER TABLE `preguntas_doctor` DISABLE KEYS */;
INSERT INTO `preguntas_doctor` VALUES ('Requiere una buena vision lejana, cercana, o discriminar colores para realizar sus tareas? Por que? ','Las tareas exijen que escuchar sonidos especiales o comunicarse en forma frecuente en su puesto de trabajo? Por que?','El puesto requiere estar de pie y/o deambular y/o usar las piernas o pies para cumplir sus funciones? Explicar','El puesto requiere uso de ambos brazos, ambas manos y/o sujetar objetos? Uso de cuello? Giro de la columna?','El puesto requiere tomar decisiones, analizar información, resolver problemas? Explicar','El puesto requiere coordinaciones con otros puestos, clientes, proveedores? Explicar');
/*!40000 ALTER TABLE `preguntas_doctor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `puesto_trabajo`
--

DROP TABLE IF EXISTS `puesto_trabajo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `puesto_trabajo` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_local` int(10) unsigned NOT NULL,
  `entrevistado_nombre` varchar(250) DEFAULT NULL,
  `entrevistado_puesto` varchar(250) DEFAULT NULL,
  `entrevistado_telefono` varchar(250) DEFAULT NULL,
  `entrevistado_email` varchar(250) DEFAULT NULL,
  `eva_erin_resultado` varchar(250) DEFAULT NULL,
  `eva_erin_observaciones` text,
  `id_cuestionario_siso` int(11) NOT NULL,
  `siso_s_visual` int(11) DEFAULT NULL,
  `siso_s_auditivo` int(11) DEFAULT NULL,
  `siso_m_ext_inferior` int(11) DEFAULT NULL,
  `siso_m_ext_superior` int(11) DEFAULT NULL,
  `siso_m_intelectual` int(11) DEFAULT NULL,
  `siso_m_psicosocial` int(11) DEFAULT NULL,
  `codigo_sabha` varchar(250) DEFAULT NULL,
  `denominacion_sabha` varchar(250) DEFAULT NULL,
  `codigo_mof` varchar(250) DEFAULT NULL,
  `denominacion_mof` varchar(250) DEFAULT NULL,
  `codigo_sap` varchar(250) DEFAULT NULL,
  `denominacion_sap` varchar(250) DEFAULT NULL,
  `otra_denominacion` varchar(250) DEFAULT NULL,
  `id_area` int(10) unsigned NOT NULL,
  `id_empresa` int(11) DEFAULT NULL,
  `funcion_principal` mediumtext,
  `s_visual_actividad` mediumtext,
  `s_visual_requerimiento` mediumtext,
  `s_visual_restriccion` mediumtext,
  `s_visual_pre_eval` int(11) DEFAULT NULL,
  `s_auditivo_actividad` mediumtext,
  `s_auditivo_requerimiento` mediumtext,
  `s_auditivo_restriccion` mediumtext,
  `s_auditivo_pre_eval` int(11) DEFAULT NULL,
  `m_ext_inf_actividad` mediumtext,
  `m_ext_inf_requerimiento` mediumtext,
  `m_ext_inf_restriccion` mediumtext,
  `m_ext_inf_pre_eval` int(11) DEFAULT NULL,
  `m_ext_sup_actividad` mediumtext,
  `m_ext_sup_requerimiento` mediumtext,
  `m_ext_sup_restriccion` mediumtext,
  `m_ext_sup_pre_eval` int(11) DEFAULT NULL,
  `m_intelectual_actividad` mediumtext,
  `m_intelectual_requerimiento` mediumtext,
  `m_intelectual_restriccion` mediumtext,
  `m_intelectual_pre_eval` int(11) DEFAULT NULL,
  `m_psicosocial_actividad` mediumtext,
  `m_psicosocial_requerimiento` mediumtext,
  `m_psicosocial_restriccion` mediumtext,
  `m_psicosocial_pre_eval` int(11) DEFAULT NULL,
  `resultado_pt_s_visual` int(11) DEFAULT NULL,
  `resultado_pt_s_auditivo` int(11) DEFAULT NULL,
  `resultado_pt_m_ext_inf` int(11) DEFAULT NULL,
  `resultado_pt_m_ext_sup` int(11) DEFAULT NULL,
  `resultado_pt_m_intelectual` int(11) DEFAULT NULL,
  `resultado_pt_m_psicosocial` int(11) DEFAULT NULL,
  `resultado_final_s_visual` int(11) DEFAULT NULL,
  `resultado_final_s_auditivo` int(11) DEFAULT NULL,
  `resultado_final_m_ext_inf` int(11) DEFAULT NULL,
  `resultado_final_m_ext_sup` int(11) DEFAULT NULL,
  `resultado_final_m_intelectual` int(11) DEFAULT NULL,
  `resultado_final_m_psicosocial` int(11) DEFAULT NULL,
  `es_apto` tinyint(1) DEFAULT NULL,
  `aplica_ajutes` mediumtext,
  `estado_registro` varchar(250) DEFAULT NULL,
  `notas` text,
  `usuario_creado` varchar(250) NOT NULL,
  `fecha_creado` datetime DEFAULT CURRENT_TIMESTAMP,
  `usuario_modificado` varchar(250) NOT NULL,
  `fecha_modificado` datetime DEFAULT CURRENT_TIMESTAMP,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `FK_COD_SABHA` (`codigo_sabha`),
  KEY `puesto_trabajo_local_FK` (`id_local`),
  KEY `puesto_trabajo_area_FK` (`id_area`),
  CONSTRAINT `puesto_trabajo_area_FK` FOREIGN KEY (`id_area`) REFERENCES `area` (`id`),
  CONSTRAINT `puesto_trabajo_local_FK` FOREIGN KEY (`id_local`) REFERENCES `local` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `puesto_trabajo`
--

LOCK TABLES `puesto_trabajo` WRITE;
/*!40000 ALTER TABLE `puesto_trabajo` DISABLE KEYS */;
INSERT INTO `puesto_trabajo` VALUES (1,1,'Tiburcio Gomez','Techero','25485744','tibu@rcio.cc','AMARILLO','',0,0,0,0,0,0,0,'01ADMI01','Asistente ','asdas','sdfas','sadfas','swefsd','Techerus Caninus',1,1,'Evaaluador de techos ','act','req','res',0,'act','req','res',2,'act','req','res',2,'act','req','res',4,'act','req','act',1,'act','req','res',3,0,0,0,0,0,0,2,2,4,2,4,5,1,'','EN_PROCESO','-- sin obs','','2017-02-04 22:25:22','admin','2017-02-26 15:28:05',1),(2,1,'Edilberto Jimenez','Analista Calidad','45645645','edi@jimenez.com',NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,'01ADMI02','Analista Calidad','147852369','Analista Calidad','987456321','Analista Calidad','Analista Calidad',1,1,'Analista Calidad',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ninguna','OBSERVADO','Analista Calidad','','2017-02-07 01:09:30','admin','2017-02-20 23:43:33',1),(3,1,'Marco Santos Pinedo','Ingeniero de Software','74125896','ggr@fdfdf.cc',NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,'01SIST01','Ingeniero de Software','','','','','Ingeniero de Software',2,1,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'EN_PROCESO','','admin','2017-02-12 14:21:12','admin','2017-02-12 14:21:12',1),(4,1,'Roberto Chale','Supervisor Fisico','471717','rchale@dc.cc',NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,'01SIST02','Supervisor Fisico','','','','','',2,1,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','EN_PROCESO','Nuevo','admin','2017-02-12 19:45:39','admin','2017-02-13 06:26:43',1),(5,1,'Jhon Harris Nakowicks','Gerente Comercial','999665333','jhn@jhn.cc',NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,'01SIST03','Gerente Comercial','','','','','',2,1,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'EN_PROCESO','','admin','2017-02-12 23:20:40','admin','2017-02-13 22:15:20',1),(6,1,'KAREN BARRERA','ASESOR DE CAMPO','747474','karenb@emp.com',NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,'01ADMI07','JEFE DE SERVICIOS AL GANADERO','','','','JEFE DE SERVICIOS AL GANADERO','',1,1,'Administrar la logística de proyectos de responsabilidad social de mejora de ganadería de proveedores de leche a nivel nacional.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'EN_PROCESO','','',NULL,'admin','2017-02-21 01:18:27',1),(8,1,'HUGO BALLÓN','SUPERVISOR DE TURNO','2562584','email@example.com',NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,'01ADMI03','SUPERVISOR DE TURNO','','','','ASESOR TECNICO','',1,1,'Asesorar técnicamente a la Gerencia de Producción para adquision de equipos, puesta en marcha de proyectos, contacto con proveedores de equipos,venta de materiales, asesora en toda la gestion de la planta; la referida asesoría es no vinculante en la ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'OBSERVADO','','',NULL,'fiorella','2017-02-21 01:49:54',1),(10,1,'Jazmin Uehara','Gerente de operaciones','7005148','carolinah@emp.com',NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,'01ADMI04','Coordinador de proyectos','','','','','',1,1,'Monitorear, coordinaciones en proyectos',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'algunos ajustes','EN_PROCESO','','admin',NULL,'admin','2017-02-21 03:34:51',1),(15,1,'Emily Fernandez','Ingeniero de Soporte','5858775','emily@ff.cc',NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,'01SIST04','Ingeniero de Soporte II','','','','','',2,1,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'EN_PROCESO','','admin',NULL,'admin','2017-02-21 04:24:59',1),(19,1,'Carlos Parreño','Validador','46548','ca@parreno.cc',NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,'01ADMI05','Validador ','','','','','',1,1,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'EN_PROCESO','','admin',NULL,'admin','2017-02-21 06:44:49',0),(22,1,'Carolina Herrera','Gerente de operaciones','7905148','carolinah@gmail.com',NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,'01ADMI06','Gestor de proyecto','','','','','',1,1,'Gestionar proyectos',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'algunos ajustes razonables','CONCLUIDO','','admin',NULL,'admin','2017-02-21 03:44:06',1),(28,1,'Leoncio Prado','Arquitecto de Software','65487245','l@prado.cc',NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,'01SIST05','Arquitecto de Software','','','','','',2,1,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'EN_PROCESO','','admin',NULL,'admin',NULL,1),(31,1,'Sheldon Cooper','Ingeniero de Software','854785','s@cooper.cc',NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,'01SIST06','Ingeniero de Software','','','','','',2,1,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'EN_PROCESO','','admin',NULL,'admin',NULL,1),(32,1,'Carolina Herrera','Gerente de operaciones','7005148','carolinah@emp.com',NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,'01ADMI08','Analista de mermas','','','','','',1,1,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'EN_PROCESO','','admin',NULL,'admin',NULL,1),(33,1,'Carolina Herrera','Gerente de operaciones','7005148','carolinah@emp.com',NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,'01ADMI09','Analista de informacion','','','','','',1,1,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'EN_PROCESO','','admin',NULL,'admin',NULL,1),(35,1,'Carolina Herrera','Gerente de operaciones','7005148','carolinah@emp.com',NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,'01ADMI10','Analista de operaciones','','','','','',1,1,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','EN_PROCESO','','admin',NULL,'admin','2017-02-21 04:31:09',1),(36,1,'Lucio Quieto','Ingeniero Soporte','757575757','ggr@fdfdf.cc',NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,'01SIST07','Ingerio Soporte','','','','','',2,1,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'EN_PROCESO','','admin',NULL,'admin',NULL,1),(43,1,'HUGO BALLÓN','SUPERVISOR DE TURNO',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,'08GERE01','','',NULL,'','ASESOR TECNICO','',4,1,'Asesorar técnicamente a la Gerencia de Producción para adquision de equipos, puesta en marcha de proyectos, contacto con proveedores de equipos,venta de materiales, asesora en toda la gestion de la planta; la referida asesoría es no vinculante en la toma de desiciones de compras.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'CONCLUIDO','','admin','2017-02-23 01:42:02','admin','2017-02-23 01:42:02',1),(44,1,'KAREN BARRERA','ASESOR DE CAMPO',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,'08CAMP01','JEFE DE SERVICIOS AL GANADERO','',NULL,'','JEFE DE SERVICIOS AL GANADERO','',5,1,'Administrar la logística de proyectos de responsabilidad social de mejora de ganadería de proveedores de leche a nivel nacional.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'CONCLUIDO','','admin','2017-02-23 01:42:03','admin','2017-02-23 01:42:03',1),(45,1,'KAREN BARRERA','ASESOR DE CAMPO',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,'08CAMP02','ASESOR TECNICO DE CAMPO','',NULL,'','ASESOR TECNICO DE CAMPO','',5,1,'Dar asesoría técnica insitu al ganadero  o proveedor de leche.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'CONCLUIDO','','admin','2017-02-23 01:42:04','admin','2017-02-23 01:42:04',1);
/*!40000 ALTER TABLE `puesto_trabajo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol_permiso`
--

DROP TABLE IF EXISTS `rol_permiso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rol_permiso` (
  `id_rol` int(11) unsigned NOT NULL,
  `id_permiso` int(11) unsigned NOT NULL,
  `acceso` tinyint(4) DEFAULT NULL,
  `agregar` tinyint(4) DEFAULT NULL,
  `editar` tinyint(4) DEFAULT NULL,
  `eliminar` tinyint(4) DEFAULT NULL,
  `exportar` tinyint(4) DEFAULT NULL,
  `importar` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol_permiso`
--

LOCK TABLES `rol_permiso` WRITE;
/*!40000 ALTER TABLE `rol_permiso` DISABLE KEYS */;
INSERT INTO `rol_permiso` VALUES (2,1,1,0,0,0,0,0),(2,2,0,1,0,0,0,0),(2,3,0,0,1,0,0,0),(2,4,0,0,0,1,0,0),(2,5,0,0,0,0,1,0),(2,6,0,0,0,0,0,1),(4,7,1,0,0,0,0,0),(6,6,1,0,0,0,0,0),(8,1,1,0,0,0,0,0),(1,1,1,1,1,1,1,1),(1,2,1,1,1,1,1,1),(1,3,1,1,1,1,1,1),(1,4,1,1,1,1,1,1),(1,5,1,1,1,1,1,1),(1,6,1,0,0,0,0,0),(1,7,1,0,0,0,0,0),(1,8,1,0,0,0,0,0),(1,9,1,1,1,1,1,1),(1,10,1,1,1,1,1,1),(1,11,1,1,1,1,1,1),(1,12,1,1,1,1,1,1);
/*!40000 ALTER TABLE `rol_permiso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Administrador'),(2,'Analista'),(4,'ingeniero siso'),(6,'especialista eva-erin'),(7,'Rol'),(8,'analista3');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombres` varchar(250) DEFAULT NULL,
  `apellidos` varchar(250) DEFAULT NULL,
  `telefono` varchar(12) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `usuario` varchar(250) DEFAULT NULL,
  `contrasena` varchar(250) DEFAULT NULL,
  `id_rol` int(11) unsigned NOT NULL,
  `id_empresa` int(11) DEFAULT NULL,
  `usuario_creado` varchar(250) NOT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `usuario_modificado` varchar(250) NOT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `FK_ROLES` (`id_rol`),
  CONSTRAINT `FK_ROLES` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'admin','admin','111','admin@admin','admin','admin',1,1,'','2017-02-04 22:06:50','','2017-02-04 22:06:50',1),(2,'jorge jair','nuñez solis ','111111','jnunezs@dd.com','jnunez','123456',1,1,'admin','2017-02-05 10:02:02','admin','2017-02-05 10:02:45',0),(3,'analista','analista','123123','analista@ff.cc','analista','analista',2,1,'admin','2017-02-16 03:52:14','admin','2017-02-16 03:53:38',1),(4,'Segundo','Rosales','0499005148','fiorella212@gmail.com','siso','siso',4,1,'admin','2017-02-18 18:26:38','',NULL,1),(5,'Eva','Mendez','','fiorella212@gmail.com','analista2','analista2',2,1,'admin','2017-02-18 18:33:47','admin','2017-02-18 18:33:59',0),(6,'Rafael','Nadal','','dd@ddd.cc','ingenierosiso2','123456',4,1,'admin','2017-02-19 21:14:35','',NULL,1),(7,'Rafael','Na','','x@x.com','ingenierosiso3','1234',6,1,'admin','2017-02-19 21:17:39','admin','2017-02-19 21:27:44',1),(8,'Fiorella','Ríos Canales','','fiorellarc@consultora.com','fiorella','1234',7,1,'admin','2017-02-20 13:06:10','admin','2017-02-26 17:05:30',1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'db_puestos'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-02-26 19:51:16
