-- MySQL dump 10.15  Distrib 10.0.29-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: localhost
-- ------------------------------------------------------
-- Server version	10.0.29-MariaDB-0ubuntu0.16.10.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
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
  `id_local` int(11) NOT NULL,
  `usuario_creado` varchar(250) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT CURRENT_TIMESTAMP,
  `usuario_modificado` varchar(250) NOT NULL,
  `fecha_modificado` datetime DEFAULT CURRENT_TIMESTAMP,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `area`
--

LOCK TABLES `area` WRITE;
/*!40000 ALTER TABLE `area` DISABLE KEYS */;
INSERT INTO `area` VALUES (1,'Administracion',1,NULL,'2017-02-04 22:00:13','','2017-02-04 22:03:18',1),(2,'Sistemas',1,'admin','2017-02-05 09:53:35','','2017-02-05 09:53:35',1),(3,'rrhh',1,'admin','2017-02-05 09:54:48','admin','2017-02-05 09:56:01',0);
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
  `id_puesto_trabajo` int(11) NOT NULL,
  `id_pregunta_siso` int(11) NOT NULL,
  `respuesta` tinyint(1) DEFAULT NULL,
  `usuario_creado` varchar(250) NOT NULL,
  `fecha_creado` datetime DEFAULT CURRENT_TIMESTAMP,
  `usuario_modificado` varchar(250) NOT NULL,
  `fecha_modificado` datetime DEFAULT CURRENT_TIMESTAMP,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuestionario_siso`
--

LOCK TABLES `cuestionario_siso` WRITE;
/*!40000 ALTER TABLE `cuestionario_siso` DISABLE KEYS */;
INSERT INTO `cuestionario_siso` VALUES (1,1,1,1,'admin','2017-02-05 21:27:44','admin','2017-02-11 18:36:11',0),(2,1,2,0,'admin','2017-02-05 21:27:44','admin','2017-02-11 18:36:11',0),(3,1,3,1,'admin','2017-02-05 21:27:44','admin','2017-02-11 18:36:11',0),(4,1,4,0,'admin','2017-02-05 21:27:44','admin','2017-02-11 18:36:11',0),(5,1,1,1,'admin','2017-02-07 00:18:34','admin','2017-02-11 18:36:11',0),(6,1,2,0,'admin','2017-02-07 00:18:34','admin','2017-02-11 18:36:11',0),(7,1,3,1,'admin','2017-02-07 00:18:34','admin','2017-02-11 18:36:11',0),(8,1,4,0,'admin','2017-02-07 00:18:35','admin','2017-02-11 18:36:11',0),(9,1,1,1,'admin','2017-02-07 00:42:09','admin','2017-02-11 18:36:11',0),(10,1,2,1,'admin','2017-02-07 00:42:09','admin','2017-02-11 18:36:11',0),(11,1,3,1,'admin','2017-02-07 00:42:10','admin','2017-02-11 18:36:11',0),(12,1,4,0,'admin','2017-02-07 00:42:10','admin','2017-02-11 18:36:11',0),(13,1,1,0,'admin','2017-02-11 18:36:11','','2017-02-11 18:36:11',1),(14,1,2,0,'admin','2017-02-11 18:36:12','','2017-02-11 18:36:12',1),(15,1,3,1,'admin','2017-02-11 18:36:12','','2017-02-11 18:36:12',1),(16,1,4,0,'admin','2017-02-11 18:36:12','','2017-02-11 18:36:12',1);
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
  `fecha_creado` datetime DEFAULT CURRENT_TIMESTAMP,
  `usuario_modificado` varchar(250) NOT NULL,
  `fecha_modificado` datetime DEFAULT CURRENT_TIMESTAMP,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa`
--

LOCK TABLES `empresa` WRITE;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT INTO `empresa` VALUES (1,'EMP','EmpresaCool','11111111111','1111','1111','','2017-02-04 22:04:11','','2017-02-04 22:04:11',1),(2,'EMP2','CSG_3','12312312333','por ahi','54656354654','','2017-02-04 22:04:11','','2017-02-04 22:04:11',1),(3,'EMP3','asdfasd','34232321234','dsfsdf','fdf44','','2017-02-04 22:04:11','','2017-02-04 22:04:11',1),(4,'EMP4','Bakus','44444555569','callao','12346','admin','2017-02-05 09:32:39','admin','2017-02-05 09:38:01',0);
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
  `id_empresa` int(11) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `direccion` varchar(250) DEFAULT NULL,
  `encargado` varchar(250) DEFAULT NULL,
  `telefono` varchar(12) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `usuario_creado` varchar(250) NOT NULL,
  `fecha_creado` datetime DEFAULT CURRENT_TIMESTAMP,
  `usuario_modificado` varchar(250) NOT NULL,
  `fecha_modificado` datetime DEFAULT CURRENT_TIMESTAMP,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `local`
--

LOCK TABLES `local` WRITE;
/*!40000 ALTER TABLE `local` DISABLE KEYS */;
INSERT INTO `local` VALUES (1,1,'Huachipa','sdfasdf','dfsdf','dsfsdf','sdfsdf','','2017-02-04 22:06:21','','2017-02-04 22:06:21',1),(2,1,'Lima','asdfasd','erever','565','dfsdfs','','2017-02-04 22:06:21','','2017-02-04 22:06:21',1),(3,2,'Surco','Surco','Tiburcio','243234234','tiburcio@sdfsdf.cc','','2017-02-04 22:06:21','','2017-02-04 22:06:21',1),(4,1,'aaa','aaa','aa','aaa','aaa@aaa.com','admin','2017-02-05 09:43:15','admin','2017-02-05 09:44:39',0);
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pregunta_siso`
--

LOCK TABLES `pregunta_siso` WRITE;
/*!40000 ALTER TABLE `pregunta_siso` DISABLE KEYS */;
INSERT INTO `pregunta_siso` VALUES (1,'exiten altos niveles de ruido?','Seguridad en el puesto de trabajo','Entorno',NULL,0,1,2,2,0),(2,'tiene cambios bruscos de temperatura (calor,frio,humedad)? ','Seguridad en el puesto de trabajo','Entorno',0,NULL,4,3,3,0),(3,'existe peligro vinculado a control de presion o control de temperatura en relacion al proceso productivo?','Seguridad en el proceso','Proceso',3,0,2,NULL,2,1),(4,'el proceso productivo se desarrolla en atmosferas explosivas o toxicas','Seguridad en el proceso','Proceso',0,4,2,1,1,1),(5,'exiten altos niveles de ruido?','Seguridad en el Puesto de Trabajo','Entorno',NULL,0,1,2,2,0);
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
  `id_local` int(11) NOT NULL,
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
  `id_area` int(11) DEFAULT NULL,
  `id_empresa` int(11) DEFAULT NULL,
  `funcion_principal` varchar(250) DEFAULT NULL,
  `s_visual_actividad` text,
  `s_visual_requerimiento` text,
  `s_visual_restriccion` text,
  `s_visual_pre_eval` int(11) DEFAULT NULL,
  `s_auditivo_actividad` text,
  `s_auditivo_requerimiento` text,
  `s_auditivo_restriccion` text,
  `s_auditivo_pre_eval` int(11) DEFAULT NULL,
  `m_ext_inf_actividad` text,
  `m_ext_inf_requerimiento` text,
  `m_ext_inf_restriccion` text,
  `m_ext_inf_pre_eval` int(11) DEFAULT NULL,
  `m_ext_sup_actividad` text,
  `m_ext_sup_requerimiento` text,
  `m_ext_sup_restriccion` text,
  `m_ext_sup_pre_eval` int(11) DEFAULT NULL,
  `m_intelectual_actividad` text,
  `m_intelectual_requerimiento` text,
  `m_intelectual_restriccion` text,
  `m_intelectual_pre_eval` int(11) DEFAULT NULL,
  `m_psicosocial_actividad` text,
  `m_psicosocial_requerimiento` text,
  `m_psicosocial_restriccion` text,
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
  `es_apto` tinyint(1) DEFAULT '0',
  `aplica_ajutes` text,
  `estado_registro` varchar(250) DEFAULT NULL,
  `notas` text,
  `usuario_creado` varchar(250) NOT NULL,
  `fecha_creado` datetime DEFAULT CURRENT_TIMESTAMP,
  `usuario_modificado` varchar(250) NOT NULL,
  `fecha_modificado` datetime DEFAULT CURRENT_TIMESTAMP,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `puesto_trabajo`
--

LOCK TABLES `puesto_trabajo` WRITE;
/*!40000 ALTER TABLE `puesto_trabajo` DISABLE KEYS */;
INSERT INTO `puesto_trabajo` VALUES (1,1,'Tiburcio Gomez','Techero','25485744','tibu@rcio.cc','AMARILLO','qqqqqq',0,3,0,2,5,2,1,'casd','casd','asdas','sdfas','sadfas','swefsd','Techerus Caninus',1,NULL,'Evaaluador de techos ','22','22','22',1,'2222','333','3333',3,'222','3232','3223',1,'111','111','111',0,'22','222','2222',4,'1212','2121','212121',0,1,0,1,0,2,0,0,0,0,0,0,0,0,'asdasdsadsadsa','EN_PROCESO','-- sin obs','','2017-02-04 22:25:22','admin','2017-02-11 18:45:53',1);
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
INSERT INTO `rol_permiso` VALUES (1,1,1,1,1,1,1,1),(1,2,1,1,1,1,1,1),(1,3,1,1,1,1,1,1),(1,4,1,1,1,1,1,1),(1,5,1,1,1,1,1,1),(1,6,1,1,1,1,1,1),(1,7,1,1,1,1,1,1),(1,8,1,1,1,1,1,1),(1,9,1,1,1,1,1,1),(1,10,1,1,1,1,1,1),(1,11,1,1,1,1,1,1),(1,12,1,1,1,1,1,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Administrador');
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
  `fecha_creado` datetime DEFAULT CURRENT_TIMESTAMP,
  `usuario_modificado` varchar(250) NOT NULL,
  `fecha_modificado` datetime DEFAULT CURRENT_TIMESTAMP,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `FK_ROLES` (`id_rol`),
  CONSTRAINT `FK_ROLES` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'admin','admin','111','admin@admin','admin','admin',1,1,'','2017-02-04 22:06:50','','2017-02-04 22:06:50',1),(2,'jorge jair','nuñez solis ','111111','jnunezs@dd.com','jnunez','123456',1,1,'admin','2017-02-05 10:02:02','admin','2017-02-05 10:02:45',0);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-02-15  1:58:39
