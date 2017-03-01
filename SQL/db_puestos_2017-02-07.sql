# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.1.21-MariaDB)
# Database: db_puestos
# Generation Time: 2017-02-07 06:33:19 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

use db_puestos;
# Dump of table area
# ------------------------------------------------------------

DROP TABLE IF EXISTS `area`;

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

LOCK TABLES `area` WRITE;
/*!40000 ALTER TABLE `area` DISABLE KEYS */;

INSERT INTO `area` (`id`, `nombre`, `id_local`, `usuario_creado`, `fecha_creado`, `usuario_modificado`, `fecha_modificado`, `estado`)
VALUES
	(1,'Administracion',1,NULL,'2017-02-04 22:00:13','','2017-02-04 22:03:18',1),
	(2,'Sistemas',1,'admin','2017-02-05 09:53:35','','2017-02-05 09:53:35',1),
	(3,'rrhh',1,'admin','2017-02-05 09:54:48','admin','2017-02-05 09:56:01',0);

/*!40000 ALTER TABLE `area` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table cuestionario_siso
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cuestionario_siso`;

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
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;

LOCK TABLES `cuestionario_siso` WRITE;
/*!40000 ALTER TABLE `cuestionario_siso` DISABLE KEYS */;

INSERT INTO `cuestionario_siso` (`id`, `id_puesto_trabajo`, `id_pregunta_siso`, `respuesta`, `usuario_creado`, `fecha_creado`, `usuario_modificado`, `fecha_modificado`, `estado`)
VALUES
	(1,1,1,1,'admin','2017-02-05 16:23:35','admin','2017-02-07 06:55:28',0),
	(2,1,2,1,'admin','2017-02-05 16:23:35','admin','2017-02-07 06:55:28',0),
	(3,1,3,1,'admin','2017-02-05 16:23:35','admin','2017-02-07 06:55:28',0),
	(4,1,4,1,'admin','2017-02-05 16:23:35','admin','2017-02-07 06:55:28',0),
	(5,1,1,0,'admin','2017-02-05 16:23:49','admin','2017-02-07 06:55:28',0),
	(6,1,2,0,'admin','2017-02-05 16:23:50','admin','2017-02-07 06:55:28',0),
	(7,1,3,0,'admin','2017-02-05 16:23:50','admin','2017-02-07 06:55:28',0),
	(8,1,4,0,'admin','2017-02-05 16:23:50','admin','2017-02-07 06:55:28',0),
	(9,1,1,0,'admin','2017-02-07 05:18:59','admin','2017-02-07 06:55:28',0),
	(10,1,2,0,'admin','2017-02-07 05:18:59','admin','2017-02-07 06:55:28',0),
	(11,1,3,0,'admin','2017-02-07 05:18:59','admin','2017-02-07 06:55:28',0),
	(12,1,4,0,'admin','2017-02-07 05:18:59','admin','2017-02-07 06:55:28',0),
	(13,1,1,1,'admin','2017-02-07 05:48:23','admin','2017-02-07 06:55:28',0),
	(14,1,2,1,'admin','2017-02-07 05:48:23','admin','2017-02-07 06:55:28',0),
	(15,1,3,1,'admin','2017-02-07 05:48:23','admin','2017-02-07 06:55:28',0),
	(16,1,4,1,'admin','2017-02-07 05:48:23','admin','2017-02-07 06:55:28',0),
	(17,1,1,1,'admin','2017-02-07 06:54:23','admin','2017-02-07 06:55:28',0),
	(18,1,2,0,'admin','2017-02-07 06:54:23','admin','2017-02-07 06:55:28',0),
	(19,1,3,1,'admin','2017-02-07 06:54:23','admin','2017-02-07 06:55:28',0),
	(20,1,4,0,'admin','2017-02-07 06:54:23','admin','2017-02-07 06:55:28',0),
	(21,1,1,1,'admin','2017-02-07 06:55:28','','2017-02-07 00:55:28',1),
	(22,1,2,1,'admin','2017-02-07 06:55:28','','2017-02-07 00:55:28',1),
	(23,1,3,1,'admin','2017-02-07 06:55:28','','2017-02-07 00:55:28',1),
	(24,1,4,0,'admin','2017-02-07 06:55:28','','2017-02-07 00:55:28',1),
	(25,2,1,1,'admin','2017-02-07 07:14:08','admin','2017-02-07 07:25:33',0),
	(26,2,2,0,'admin','2017-02-07 07:14:08','admin','2017-02-07 07:25:33',0),
	(27,2,3,1,'admin','2017-02-07 07:14:08','admin','2017-02-07 07:25:33',0),
	(28,2,4,1,'admin','2017-02-07 07:14:08','admin','2017-02-07 07:25:33',0),
	(29,2,5,0,'admin','2017-02-07 07:14:08','admin','2017-02-07 07:25:33',0),
	(30,2,6,0,'admin','2017-02-07 07:14:08','admin','2017-02-07 07:25:33',0),
	(31,2,7,1,'admin','2017-02-07 07:14:08','admin','2017-02-07 07:25:33',0),
	(32,2,8,1,'admin','2017-02-07 07:14:08','admin','2017-02-07 07:25:33',0),
	(33,2,9,0,'admin','2017-02-07 07:14:08','admin','2017-02-07 07:25:33',0),
	(34,2,10,1,'admin','2017-02-07 07:14:08','admin','2017-02-07 07:25:33',0),
	(35,2,11,1,'admin','2017-02-07 07:14:08','admin','2017-02-07 07:25:33',0),
	(36,2,12,0,'admin','2017-02-07 07:14:08','admin','2017-02-07 07:25:33',0),
	(37,2,13,0,'admin','2017-02-07 07:14:08','admin','2017-02-07 07:25:33',0),
	(38,2,14,1,'admin','2017-02-07 07:14:08','admin','2017-02-07 07:25:33',0),
	(39,2,15,1,'admin','2017-02-07 07:14:08','admin','2017-02-07 07:25:33',0),
	(40,2,16,0,'admin','2017-02-07 07:14:08','admin','2017-02-07 07:25:33',0),
	(41,2,17,0,'admin','2017-02-07 07:14:08','admin','2017-02-07 07:25:34',0),
	(42,2,1,1,'admin','2017-02-07 07:24:00','admin','2017-02-07 07:25:34',0),
	(43,2,2,0,'admin','2017-02-07 07:24:00','admin','2017-02-07 07:25:34',0),
	(44,2,3,1,'admin','2017-02-07 07:24:00','admin','2017-02-07 07:25:34',0),
	(45,2,4,1,'admin','2017-02-07 07:24:00','admin','2017-02-07 07:25:34',0),
	(46,2,5,0,'admin','2017-02-07 07:24:00','admin','2017-02-07 07:25:34',0),
	(47,2,6,0,'admin','2017-02-07 07:24:00','admin','2017-02-07 07:25:34',0),
	(48,2,7,1,'admin','2017-02-07 07:24:00','admin','2017-02-07 07:25:34',0),
	(49,2,8,1,'admin','2017-02-07 07:24:00','admin','2017-02-07 07:25:34',0),
	(50,2,9,0,'admin','2017-02-07 07:24:00','admin','2017-02-07 07:25:34',0),
	(51,2,10,1,'admin','2017-02-07 07:24:00','admin','2017-02-07 07:25:34',0),
	(52,2,11,1,'admin','2017-02-07 07:24:00','admin','2017-02-07 07:25:34',0),
	(53,2,12,0,'admin','2017-02-07 07:24:00','admin','2017-02-07 07:25:34',0),
	(54,2,13,0,'admin','2017-02-07 07:24:00','admin','2017-02-07 07:25:34',0),
	(55,2,14,1,'admin','2017-02-07 07:24:00','admin','2017-02-07 07:25:34',0),
	(56,2,15,1,'admin','2017-02-07 07:24:00','admin','2017-02-07 07:25:34',0),
	(57,2,16,1,'admin','2017-02-07 07:24:00','admin','2017-02-07 07:25:34',0),
	(58,2,17,1,'admin','2017-02-07 07:24:00','admin','2017-02-07 07:25:34',0),
	(59,2,1,1,'admin','2017-02-07 07:25:34','','2017-02-07 01:25:34',1),
	(60,2,2,0,'admin','2017-02-07 07:25:34','','2017-02-07 01:25:34',1),
	(61,2,3,1,'admin','2017-02-07 07:25:34','','2017-02-07 01:25:34',1),
	(62,2,4,1,'admin','2017-02-07 07:25:34','','2017-02-07 01:25:34',1),
	(63,2,5,0,'admin','2017-02-07 07:25:34','','2017-02-07 01:25:34',1),
	(64,2,6,0,'admin','2017-02-07 07:25:34','','2017-02-07 01:25:34',1),
	(65,2,7,1,'admin','2017-02-07 07:25:34','','2017-02-07 01:25:34',1),
	(66,2,8,1,'admin','2017-02-07 07:25:34','','2017-02-07 01:25:34',1),
	(67,2,9,0,'admin','2017-02-07 07:25:34','','2017-02-07 01:25:34',1),
	(68,2,10,1,'admin','2017-02-07 07:25:34','','2017-02-07 01:25:34',1),
	(69,2,11,1,'admin','2017-02-07 07:25:34','','2017-02-07 01:25:34',1),
	(70,2,12,0,'admin','2017-02-07 07:25:34','','2017-02-07 01:25:34',1),
	(71,2,13,0,'admin','2017-02-07 07:25:34','','2017-02-07 01:25:34',1),
	(72,2,14,1,'admin','2017-02-07 07:25:34','','2017-02-07 01:25:34',1),
	(73,2,15,1,'admin','2017-02-07 07:25:34','','2017-02-07 01:25:34',1),
	(74,2,16,1,'admin','2017-02-07 07:25:34','','2017-02-07 01:25:34',1),
	(75,2,17,1,'admin','2017-02-07 07:25:34','','2017-02-07 01:25:34',1);

/*!40000 ALTER TABLE `cuestionario_siso` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table empresa
# ------------------------------------------------------------

DROP TABLE IF EXISTS `empresa`;

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

LOCK TABLES `empresa` WRITE;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;

INSERT INTO `empresa` (`id`, `codigo`, `razon_social`, `ruc`, `direccion`, `telefono`, `usuario_creado`, `fecha_creado`, `usuario_modificado`, `fecha_modificado`, `estado`)
VALUES
	(1,'EMP','EmpresaCool','11111111111','1111','1111','','2017-02-04 22:04:11','','2017-02-04 22:04:11',1),
	(2,'EMP2','CSG_3','12312312333','por ahi','54656354654','','2017-02-04 22:04:11','','2017-02-04 22:04:11',1),
	(3,'EMP3','asdfasd','34232321234','dsfsdf','fdf44','','2017-02-04 22:04:11','','2017-02-04 22:04:11',1),
	(4,'EMP4','Bakus','44444555569','callao','12346','admin','2017-02-05 09:32:39','admin','2017-02-05 09:38:01',0);

/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table local
# ------------------------------------------------------------

DROP TABLE IF EXISTS `local`;

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

LOCK TABLES `local` WRITE;
/*!40000 ALTER TABLE `local` DISABLE KEYS */;

INSERT INTO `local` (`id`, `id_empresa`, `nombre`, `direccion`, `encargado`, `telefono`, `email`, `usuario_creado`, `fecha_creado`, `usuario_modificado`, `fecha_modificado`, `estado`)
VALUES
	(1,1,'Huachipa','sdfasdf','dfsdf','dsfsdf','sdfsdf','','2017-02-04 22:06:21','','2017-02-04 22:06:21',1),
	(2,1,'Lima','asdfasd','erever','565','dfsdfs','','2017-02-04 22:06:21','','2017-02-04 22:06:21',1),
	(3,2,'Surco','Surco','Tiburcio','243234234','tiburcio@sdfsdf.cc','','2017-02-04 22:06:21','','2017-02-04 22:06:21',1),
	(4,1,'aaa','aaa','aa','aaa','aaa@aaa.com','admin','2017-02-05 09:43:15','admin','2017-02-05 09:44:39',0);

/*!40000 ALTER TABLE `local` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table permisos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permisos`;

CREATE TABLE `permisos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table pregunta_siso
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pregunta_siso`;

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

LOCK TABLES `pregunta_siso` WRITE;
/*!40000 ALTER TABLE `pregunta_siso` DISABLE KEYS */;

INSERT INTO `pregunta_siso` (`id`, `pregunuta`, `grupo`, `tipo_riesgo`, `valor_s_visual`, `valor_s_auditivo`, `valor_m_ext_inferior`, `valor_m_ext_superior`, `valor_m_intelectual`, `valor_m_psicosocial`)
VALUES
	(1,'Se realiza alguna tarea por encima de 1.80m, o dentro de un espacio confinado (accesos restringidos), o trabajos con llamas o chispas?','Seguridad en el puesto de trabajo','Entorno',0,0,0,0,0,0),
	(2,'Se encuentra por encima del primer piso y se accede mediante escaleras o ascensores?','Seguridad en el puesto de trabajo','Entorno',2,2,0,0,NULL,NULL),
	(3,'Existen altos niveles de ruido?','Seguridad en el puesto de trabajo','Entorno',NULL,1,NULL,NULL,4,4),
	(4,'Tiene cambios bruscos de temperatura (calor, frío, humedad)?','Seguridad en el puesto de trabajo','Entorno',NULL,NULL,1,1,NULL,NULL),
	(5,'El puesto esta expuesto a Radiacion Solar en forma directa?','Seguridad en el puesto de trabajo','Entorno',2,NULL,NULL,NULL,NULL,NULL),
	(6,'El puesto requiere completar formatos de Analisis de Riesgo (Permisos de Trabajo de Riesgo, AST o ATS, etc)?','Seguridad en el puesto de trabajo','Entorno',0,0,1,1,0,0),
	(7,'Tienen elementos giratorios o que se desplazan en forma vertical u horizontal?','Seguridad en el puesto de trabajo','Equipos y Herramientas',0,0,0,0,0,NULL),
	(8,'Esta expuesto a vibraciones debido a Herramientas o Uso de Equipos?','Seguridad en el puesto de trabajo','Equipos y Herramientas',NULL,NULL,0,0,NULL,0),
	(9,'Cerca al puesto de trabajo circulan vehículos o equipos?','Seguridad en el puesto de trabajo','Equipos y Herramientas',1,0,0,1,0,NULL),
	(10,'Tiene carcasa de metal y estan alimentados por Energia Electrica?','Seguridad en el puesto de trabajo','Equipos y Herramientas',1,NULL,NULL,0,0,1),
	(11,'En el puesto de trabajo se manipulan frecuentemente cargas (para levantar, trasladar, posicionar, etc)? ','Seguridad en el puesto de trabajo','Equipos y Herramientas',1,1,0,0,0,1),
	(12,'Existe peligro vinculado a control de Presión o control de Temperatura en relacion al proceso productivo?','Seguridad en el Proceso','Proceso',1,1,1,1,1,NULL),
	(13,'Existe peligro vinculado a control de concentracion, proporciones o mezcla de productos químicos en el proceso productivo?','Seguridad en el Proceso','Proceso',1,2,2,1,0,0),
	(14,'El Proceso Productivo es tan crítico que requiere de inspecciones, controles o mantenimientos continuos de equipos o máquinas?','Seguridad en el Proceso','Proceso',0,0,0,0,0,1),
	(15,'El Proceso Productivo requiere utilizar fuentes de calor con llamas, calderos, reactores o superficies calientes?','Seguridad en el Proceso','Proceso',1,1,1,1,1,0),
	(16,'El Proceso Productivo se desarrolla en atmosferas explosivas o tóxicas?','Seguridad en el Proceso','Proceso',0,0,0,0,0,0),
	(17,'Una falla en el proceso productivo puede liberar gases, liquidos o materiales muy toxicos o contaminantes?','Seguridad en el Proceso','Proceso',0,0,0,0,0,0);

/*!40000 ALTER TABLE `pregunta_siso` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table preguntas_doctor
# ------------------------------------------------------------

DROP TABLE IF EXISTS `preguntas_doctor`;

CREATE TABLE `preguntas_doctor` (
  `valor_s_visual_preg` varchar(250) DEFAULT NULL,
  `valor_s_auditivo_preg` varchar(250) DEFAULT NULL,
  `valor_m_ext_inferior_preg` varchar(250) DEFAULT NULL,
  `valor_m_ext_superior_preg` varchar(250) DEFAULT NULL,
  `valor_m_intelectual_preg` varchar(250) DEFAULT NULL,
  `valor_m_psicosocial_preg` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table puesto_trabajo
# ------------------------------------------------------------

DROP TABLE IF EXISTS `puesto_trabajo`;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

LOCK TABLES `puesto_trabajo` WRITE;
/*!40000 ALTER TABLE `puesto_trabajo` DISABLE KEYS */;

INSERT INTO `puesto_trabajo` (`id`, `id_local`, `entrevistado_nombre`, `entrevistado_puesto`, `entrevistado_telefono`, `entrevistado_email`, `eva_erin_resultado`, `eva_erin_observaciones`, `id_cuestionario_siso`, `siso_s_visual`, `siso_s_auditivo`, `siso_m_ext_inferior`, `siso_m_ext_superior`, `siso_m_intelectual`, `siso_m_psicosocial`, `codigo_sabha`, `denominacion_sabha`, `codigo_mof`, `denominacion_mof`, `codigo_sap`, `denominacion_sap`, `otra_denominacion`, `id_area`, `id_empresa`, `funcion_principal`, `s_visual_actividad`, `s_visual_requerimiento`, `s_visual_restriccion`, `s_visual_pre_eval`, `s_auditivo_actividad`, `s_auditivo_requerimiento`, `s_auditivo_restriccion`, `s_auditivo_pre_eval`, `m_ext_inf_actividad`, `m_ext_inf_requerimiento`, `m_ext_inf_restriccion`, `m_ext_inf_pre_eval`, `m_ext_sup_actividad`, `m_ext_sup_requerimiento`, `m_ext_sup_restriccion`, `m_ext_sup_pre_eval`, `m_intelectual_actividad`, `m_intelectual_requerimiento`, `m_intelectual_restriccion`, `m_intelectual_pre_eval`, `m_psicosocial_actividad`, `m_psicosocial_requerimiento`, `m_psicosocial_restriccion`, `m_psicosocial_pre_eval`, `resultado_pt_s_visual`, `resultado_pt_s_auditivo`, `resultado_pt_m_ext_inf`, `resultado_pt_m_ext_sup`, `resultado_pt_m_intelectual`, `resultado_pt_m_psicosocial`, `resultado_final_s_visual`, `resultado_final_s_auditivo`, `resultado_final_m_ext_inf`, `resultado_final_m_ext_sup`, `resultado_final_m_intelectual`, `resultado_final_m_psicosocial`, `es_apto`, `aplica_ajutes`, `estado_registro`, `notas`, `usuario_creado`, `fecha_creado`, `usuario_modificado`, `fecha_modificado`, `estado`)
VALUES
	(1,1,'Tiburcio Gomez','Techero','25485744','tibu@rcio.cc',NULL,NULL,0,1,1,1,1,1,1,'casd','casd','asdas','sdfas','sadfas','swefsd','Techerus Caninus',1,NULL,'Evaaluador de techos ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,'EN_PROCESO','-- sin obs','','2017-02-04 22:25:22','admin','2017-02-07 06:55:28',1),
	(2,1,'Edilberto Jimenez','Analista Calidad','45645645','edi@jimenez.com',NULL,NULL,0,0,0,0,0,0,0,'01ANAL01','Analista Calidad','147852369','Analista Calidad','987456321','Analista Calidad','Analista Calidad',2,NULL,'Analista Calidad',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,'EN_PROCESO','Analista Calidad','','2017-02-07 01:09:30','admin','2017-02-07 07:25:34',1);

/*!40000 ALTER TABLE `puesto_trabajo` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table rol_permiso
# ------------------------------------------------------------

DROP TABLE IF EXISTS `rol_permiso`;

CREATE TABLE `rol_permiso` (
  `id_rol` int(11) unsigned NOT NULL,
  `id_permiso` int(11) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;

INSERT INTO `roles` (`id`, `nombre`)
VALUES
	(1,'Administrador');

/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table usuarios
# ------------------------------------------------------------

DROP TABLE IF EXISTS `usuarios`;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;

INSERT INTO `usuarios` (`id`, `nombres`, `apellidos`, `telefono`, `email`, `usuario`, `contrasena`, `id_rol`, `id_empresa`, `usuario_creado`, `fecha_creado`, `usuario_modificado`, `fecha_modificado`, `estado`)
VALUES
	(1,'admin','admin','111','admin@admin','admin','admin',1,1,'','2017-02-04 22:06:50','','2017-02-04 22:06:50',1),
	(2,'jorge jair','nuñez solis ','111111','jnunezs@dd.com','jnunez','123456',1,1,'admin','2017-02-05 10:02:02','admin','2017-02-05 10:02:45',0);

/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
