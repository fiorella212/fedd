-- MySQL dump 10.15  Distrib 10.0.29-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: localhost
-- ------------------------------------------------------
-- Server version	10.0.29-MariaDB-0ubuntu0.16.10.1

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `area`
--

LOCK TABLES `area` WRITE;
/*!40000 ALTER TABLE `area` DISABLE KEYS */;
/*!40000 ALTER TABLE `area` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-01 19:42:01
-- MySQL dump 10.15  Distrib 10.0.29-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: localhost
-- ------------------------------------------------------
-- Server version	10.0.29-MariaDB-0ubuntu0.16.10.1

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuestionario_siso`
--

LOCK TABLES `cuestionario_siso` WRITE;
/*!40000 ALTER TABLE `cuestionario_siso` DISABLE KEYS */;
/*!40000 ALTER TABLE `cuestionario_siso` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-01 19:42:02
-- MySQL dump 10.15  Distrib 10.0.29-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: localhost
-- ------------------------------------------------------
-- Server version	10.0.29-MariaDB-0ubuntu0.16.10.1

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa`
--

LOCK TABLES `empresa` WRITE;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT INTO `empresa` VALUES (1,'SABHA','SABHA','11111111111','','','admin','2017-02-04 22:04:11','admin','2017-02-04 22:04:11',1);
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-01 19:42:01
-- MySQL dump 10.15  Distrib 10.0.29-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: localhost
-- ------------------------------------------------------
-- Server version	10.0.29-MariaDB-0ubuntu0.16.10.1

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `local`
--

LOCK TABLES `local` WRITE;
/*!40000 ALTER TABLE `local` DISABLE KEYS */;
/*!40000 ALTER TABLE `local` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-01 19:42:02
-- MySQL dump 10.15  Distrib 10.0.29-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: localhost
-- ------------------------------------------------------
-- Server version	10.0.29-MariaDB-0ubuntu0.16.10.1

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
INSERT INTO `permisos` VALUES (1,'MANT. PUESTOS DE TRABAJO','puestos'),(2,'IMPORTAR PERSONAL SAP','personal'),(3,'MANT. EMPRESA','empresa'),(4,'MANT. LOCAL','local'),(5,'MANT. AREA','area'),(6,'EVALUACION EVA-ERIN','evaerin'),(7,'EVALUACION SISO','siso'),(8,'EVALUACION FEDD','fedd'),(9,'REPORTE INTERNO','reporte'),(10,'MANT. ROLES','rol'),(11,'MANT. USUARIO','usuario'),(12,'CONFIGURACION SISO','siso/configuracion');
/*!40000 ALTER TABLE `permisos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-01 19:42:02
-- MySQL dump 10.15  Distrib 10.0.29-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: localhost
-- ------------------------------------------------------
-- Server version	10.0.29-MariaDB-0ubuntu0.16.10.1

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
  `id_empresa` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal`
--

LOCK TABLES `personal` WRITE;
/*!40000 ALTER TABLE `personal` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-01 19:42:01
-- MySQL dump 10.15  Distrib 10.0.29-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: localhost
-- ------------------------------------------------------
-- Server version	10.0.29-MariaDB-0ubuntu0.16.10.1

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
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-01 19:42:02
-- MySQL dump 10.15  Distrib 10.0.29-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: localhost
-- ------------------------------------------------------
-- Server version	10.0.29-MariaDB-0ubuntu0.16.10.1

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
  `fecha_creado` datetime DEFAULT NULL,
  `usuario_modificado` varchar(250) NOT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pregunta_siso`
--

LOCK TABLES `pregunta_siso` WRITE;
/*!40000 ALTER TABLE `pregunta_siso` DISABLE KEYS */;
INSERT INTO `pregunta_siso` VALUES (1,'Se realiza alguna tarea por encima de 1.80m, o dentro de un espacio confinado (accesos restringidos), o trabajos con llamas o chispas?','Seguridad en el puesto de trabajo','Entorno',0,0,0,0,0,0,1,'','2017-02-24 18:36:58','','2017-02-24 18:37:09'),(2,'Se encuentra por encima del primer piso y se accede mediante escaleras o ascensores?','Seguridad en el puesto de trabajo','Entorno',2,2,0,0,NULL,NULL,1,'','2017-02-24 18:36:58','','2017-02-24 18:37:09'),(3,'Existen altos niveles de ruido?','Seguridad en el puesto de trabajo','Entorno',NULL,1,NULL,NULL,4,4,1,'','2017-02-24 18:36:58','','2017-02-24 18:37:09'),(4,'Tiene cambios bruscos de temperatura (calor, frío, humedad)?','Seguridad en el puesto de trabajo','Entorno',NULL,NULL,1,1,NULL,NULL,1,'','2017-02-24 18:36:58','','2017-02-24 18:37:09'),(5,'El puesto esta expuesto a Radiacion Solar en forma directa?','Seguridad en el puesto de trabajo','Entorno',2,NULL,NULL,NULL,NULL,NULL,1,'','2017-02-24 18:36:58','','2017-02-24 18:37:09'),(6,'El puesto requiere completar formatos de Analisis de Riesgo (Permisos de Trabajo de Riesgo, AST o ATS, etc)?','Seguridad en el puesto de trabajo','Entorno',0,0,1,1,0,0,1,'','2017-02-24 18:36:58','','2017-02-24 18:37:09'),(7,'Tienen elementos giratorios o que se desplazan en forma vertical u horizontal?','Seguridad en el puesto de trabajo','Equipos y Herramientas',0,0,0,0,0,NULL,1,'','2017-02-24 18:36:58','','2017-02-24 18:37:09'),(8,'Esta expuesto a vibraciones debido a Herramientas o Uso de Equipos?','Seguridad en el puesto de trabajo','Equipos y Herramientas',NULL,NULL,0,0,NULL,0,1,'','2017-02-24 18:36:58','','2017-02-24 18:37:09'),(9,'Cerca al puesto de trabajo circulan vehículos o equipos?','Seguridad en el puesto de trabajo','Equipos y Herramientas',1,0,0,1,0,NULL,1,'','2017-02-24 18:36:58','','2017-02-24 18:37:09'),(10,'Tiene carcasa de metal y estan alimentados por Energia Electrica?','Seguridad en el puesto de trabajo','Equipos y Herramientas',1,NULL,NULL,0,0,1,1,'','2017-02-24 18:36:58','','2017-02-24 18:37:09'),(11,'En el puesto de trabajo se manipulan frecuentemente cargas (para levantar, trasladar, posicionar, etc)? ','Seguridad en el puesto de trabajo','Materiales',1,1,0,0,0,1,1,'','2017-02-24 18:36:58','','2017-02-24 18:37:09'),(12,'Existe peligro vinculado a control de Presión o control de Temperatura en relacion al proceso productivo?','Seguridad en el Proceso','Proceso',1,1,1,1,1,NULL,1,'','2017-02-24 18:36:58','','2017-02-24 18:37:09'),(13,'Existe peligro vinculado a control de concentracion, proporciones o mezcla de productos químicos en el proceso productivo?','Seguridad en el Proceso','Proceso',1,2,2,1,0,NULL,1,'','2017-02-24 18:36:58','','2017-02-24 18:37:09'),(14,'El Proceso Productivo es tan crítico que requiere de inspecciones, controles o mantenimientos continuos de equipos o máquinas?','Seguridad en el Proceso','Proceso',0,0,0,0,0,1,1,'','2017-02-24 18:36:58','','2017-02-24 18:37:09'),(15,'El Proceso Productivo requiere utilizar fuentes de calor con llamas, calderos, reactores o superficies calientes?','Seguridad en el Proceso','Proceso',1,1,1,1,1,0,1,'','2017-02-24 18:36:58','','2017-02-24 18:37:09'),(16,'El Proceso Productivo se desarrolla en atmosferas explosivas o tóxicas?','Seguridad en el Proceso','Proceso',0,0,0,0,0,0,1,'','2017-02-24 18:36:58','','2017-02-24 18:37:09'),(17,'Una falla en el proceso productivo puede liberar gases, liquidos o materiales muy toxicos o contaminantes?','Seguridad en el Proceso','Proceso',0,0,0,0,0,0,1,'','2017-02-24 18:36:58','','2017-02-24 18:37:09'),(18,'Existen cargas suspendidas por encima del puesto de trabajo en algun momento?','Seguridad en el puesto de trabajo','Materiales',1,0,0,2,0,NULL,1,'','2017-02-24 18:36:58','','2017-02-24 18:37:09'),(19,'Los materiales o insumos que utiliza son peligrosos y/o tóxicos?','Seguridad en el puesto de trabajo','Materiales',0,0,1,1,0,NULL,1,'','2017-02-24 18:36:58','','2017-02-24 18:37:09'),(20,'147','Seguridad en el Proceso','Entorno',2,NULL,0,2,NULL,NULL,0,'','2017-02-24 18:36:58','admin','2017-02-24 18:41:20'),(21,'Pregunta a Eliminar','Seguridad en el Proceso','Equipos y Herramientas',2,3,0,2,NULL,NULL,0,'','2017-02-24 18:36:58','admin','2017-02-24 18:41:10'),(22,'Pregunta para Validar','Seguridad en el Proceso','Equipos y Herramientas',0,NULL,4,4,NULL,NULL,1,'admin','2017-02-26 21:50:21','','2017-02-26 21:50:21'),(23,'Pregunta para Borrarr 2','Seguridad en el Proceso','Equipos y Herramientas',4,NULL,NULL,NULL,NULL,NULL,1,'admin','2017-02-26 21:53:28','','2017-02-26 21:53:28'),(24,'Sera?','Seguridad en el Puesto de trabajo','Equipos y Herramientas',NULL,NULL,NULL,NULL,NULL,5,1,'admin','2017-02-26 23:12:26','','2017-02-26 23:12:26'),(25,'Sera?','Seguridad en el Puesto de trabajo','Equipos y Herramientas',NULL,NULL,NULL,NULL,NULL,5,1,'admin','2017-02-26 23:13:36','','2017-02-26 23:13:36');
/*!40000 ALTER TABLE `pregunta_siso` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-01 19:42:01
-- MySQL dump 10.15  Distrib 10.0.29-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: localhost
-- ------------------------------------------------------
-- Server version	10.0.29-MariaDB-0ubuntu0.16.10.1

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
  `fecha_creado` datetime DEFAULT NULL,
  `usuario_modificado` varchar(250) NOT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `FK_COD_SABHA` (`codigo_sabha`),
  KEY `puesto_trabajo_local_FK` (`id_local`),
  KEY `puesto_trabajo_area_FK` (`id_area`),
  CONSTRAINT `puesto_trabajo_area_FK` FOREIGN KEY (`id_area`) REFERENCES `area` (`id`),
  CONSTRAINT `puesto_trabajo_local_FK` FOREIGN KEY (`id_local`) REFERENCES `local` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `puesto_trabajo`
--

LOCK TABLES `puesto_trabajo` WRITE;
/*!40000 ALTER TABLE `puesto_trabajo` DISABLE KEYS */;
/*!40000 ALTER TABLE `puesto_trabajo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-01 19:42:02
-- MySQL dump 10.15  Distrib 10.0.29-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: localhost
-- ------------------------------------------------------
-- Server version	10.0.29-MariaDB-0ubuntu0.16.10.1

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
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Administrador',1);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-01 19:42:01
-- MySQL dump 10.15  Distrib 10.0.29-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: localhost
-- ------------------------------------------------------
-- Server version	10.0.29-MariaDB-0ubuntu0.16.10.1

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
INSERT INTO `rol_permiso` VALUES (1,1,1,1,1,1,1,1),(1,2,1,1,1,1,1,1),(1,3,1,1,1,1,1,1),(1,4,1,1,1,1,1,1),(1,5,1,1,1,1,1,1),(1,6,1,0,0,0,0,0),(1,7,1,0,0,0,0,0),(1,8,1,0,0,0,0,0),(1,9,1,1,1,1,1,1),(1,10,1,1,1,1,1,1),(1,11,1,1,1,1,1,1),(1,12,1,1,1,1,1,1);
/*!40000 ALTER TABLE `rol_permiso` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-01 19:42:02
-- MySQL dump 10.15  Distrib 10.0.29-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: localhost
-- ------------------------------------------------------
-- Server version	10.0.29-MariaDB-0ubuntu0.16.10.1

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'admin','admin','111','admin@admin.com','admin','JELgOlfYfMk4JPNYdphYJC/msBGL8tGVmJOt4l0G1dQ=',1,1,'','2017-02-04 22:06:50','admin','2017-03-01 11:21:54',1);
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

-- Dump completed on 2017-03-01 19:42:02
