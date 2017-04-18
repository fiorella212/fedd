# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.1.21-MariaDB)
# Database: db_puestos
# Generation Time: 2017-04-02 23:09:22 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table area
# ------------------------------------------------------------

DROP TABLE IF EXISTS `area`;

CREATE TABLE `area` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) DEFAULT NULL,
  `id_local` int(10) unsigned NOT NULL,
  `usuario_creado` varchar(250) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `usuario_modificado` varchar(250) DEFAULT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `area_local_UN` (`id_local`,`nombre`),
  CONSTRAINT `area_local_FK` FOREIGN KEY (`id_local`) REFERENCES `local` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `area` WRITE;
/*!40000 ALTER TABLE `area` DISABLE KEYS */;

INSERT INTO `area` (`id`, `nombre`, `id_local`, `usuario_creado`, `fecha_creado`, `usuario_modificado`, `fecha_modificado`, `estado`)
VALUES
	(1,'ADMINISTRACION',1,'admin','2017-03-16 05:35:24',NULL,NULL,1),
	(2,'CAMPO',1,'admin','2017-03-16 05:35:37',NULL,NULL,1),
	(3,'JEFATURA CAMPO',2,'admin','2017-03-18 19:30:06',NULL,NULL,1),
	(4,'JEFATURA CONDENSERIA AQP',2,'admin','2017-03-18 19:30:21',NULL,NULL,1),
	(5,'JEFATURA DERIVADOS LACTEOS AQP',2,'admin','2017-03-18 19:30:36',NULL,NULL,1),
	(6,'JEFATURA FABRICA DE ENVASES AQP',2,'admin','2017-03-18 19:30:51',NULL,NULL,1),
	(7,'JEFATURA MANTENIMIENTO AQP',2,'admin','2017-03-18 19:31:06',NULL,NULL,1),
	(8,'JEFATURA PROYECTOS',2,'admin','2017-03-18 19:31:23',NULL,NULL,1),
	(9,'JEFATURA CALIDAD AQP',2,'admin','2017-03-18 19:31:35',NULL,NULL,1),
	(10,'JEFATURA LOGISTICA AQP',2,'admin','2017-03-18 19:31:47',NULL,NULL,1),
	(11,'SEGURIDAD INTEGRAL',1,'admin','2017-03-19 14:46:01',NULL,NULL,1),
	(12,'OPERACIONES Y ACOPIO',1,'admin','2017-03-19 15:07:29',NULL,NULL,1),
	(13,'INVESTIGACIÓN & DESARROLLO',1,'admin','2017-03-19 15:07:51',NULL,NULL,1),
	(14,'COMERCIAL DE ENVASES',1,'admin','2017-03-19 15:08:13',NULL,NULL,1),
	(15,'GERENCIA DE ALMACEN',3,'admin','2017-04-02 14:17:43',NULL,NULL,1),
	(16,'GERENCIA DE CAMPO',3,'admin','2017-04-02 14:17:58',NULL,NULL,1),
	(17,'JEFATURA DE CALIDAD',4,'admin','2017-04-02 16:08:14',NULL,NULL,1),
	(18,'JEFATURA DE CAMPO',4,'admin','2017-04-02 16:09:08',NULL,NULL,1),
	(19,'JEFATURA DE CONDENSERIA',4,'admin','2017-04-02 16:09:24',NULL,NULL,1),
	(20,'JEFATURA DE FABRICA DE ENVASES',4,'admin','2017-04-02 16:10:05',NULL,NULL,1),
	(21,'JEFATURA DE DERIVADOS LACTEOS',4,'admin','2017-04-02 16:10:25',NULL,NULL,1),
	(22,'JEFATURA DE LOGISTICA',4,'admin','2017-04-02 16:10:43',NULL,NULL,1),
	(23,'JEFATURA DE MANTENIMIENTO',4,'admin','2017-04-02 16:11:01',NULL,NULL,1),
	(24,'JEFATURA DE PROYECTOS',8,'admin','2017-04-02 16:11:27',NULL,NULL,1),
	(25,'JEFATURA DE CALIDAD',5,'admin','2017-04-02 16:11:41',NULL,NULL,1),
	(26,'JEFATURA DE CAMPO',5,'admin','2017-04-02 16:11:57',NULL,NULL,1),
	(27,'JEFATURA DE LOGISTICA',5,'admin','2017-04-02 16:12:09',NULL,NULL,1),
	(28,'JEFATURA DE MANTENIMIENTO',5,'admin','2017-04-02 16:12:24',NULL,NULL,1),
	(29,'JEFATURA DE PRODUCCION',5,'admin','2017-04-02 16:12:40',NULL,NULL,1),
	(30,'ADMINISTRACION',6,'admin','2017-04-02 16:12:54','admin','2017-04-02 16:13:22',1),
	(31,'SUPERVISION DE CALIDAD',6,'admin','2017-04-02 16:14:34',NULL,NULL,1),
	(32,'COMERCIAL',6,'admin','2017-04-02 16:14:48',NULL,NULL,1),
	(33,'SUPERVISION DE PRODUCCION',6,'admin','2017-04-02 16:15:15',NULL,NULL,1),
	(34,'DIRECCION CORPORATIVA CONTRALORIA',7,'admin','2017-04-02 16:15:45',NULL,NULL,1),
	(35,'DIRECCION CORPORATIVA FINANZAS',7,'admin','2017-04-02 16:16:02',NULL,NULL,1),
	(36,'DIRECCION CORPORATIVA DE FINANZAS - CREDITOSY COBRANZAS',7,'admin','2017-04-02 16:16:31',NULL,NULL,1),
	(38,'DIRECCION CORPORATIVA DE FINANZAS - TESORERIA',7,'admin','2017-04-02 16:17:02',NULL,NULL,1),
	(39,'DIRECCION CORPORATIVA LEGAL Y RELACIONES INSTITUCIONALES',7,'admin','2017-04-02 16:18:29',NULL,NULL,1),
	(40,'DIRECCION CORPORATIVA LEGAL Y RRII',7,'admin','2017-04-02 16:18:47',NULL,NULL,1),
	(42,'DIRECCION CORPORATIVA DE RECURSOS HUMANOS',7,'admin','2017-04-02 16:19:21',NULL,NULL,1),
	(43,'GERENCIA DE RECURSOS HUMANOS - GESTION DEL TALENTO',7,'admin','2017-04-02 16:19:51',NULL,NULL,1),
	(47,'DIRECCION CORPORATIVA ESTRATEGIA Y DESARROLLO DE NEGOCIOS',7,'admin','2017-04-02 16:20:51',NULL,NULL,1),
	(48,'DIRECCION OFICINA DE TRANSFORMACION',7,'admin','2017-04-02 16:21:12',NULL,NULL,1),
	(49,'GERENCIA DE EXPORTACIONES',7,'admin','2017-04-02 16:21:33',NULL,NULL,1),
	(51,'GERENCIA DE SEGUROS',7,'admin','2017-04-02 16:22:28',NULL,NULL,1),
	(52,'GERENCIA DE PLANEAMIENTO Y CONTROL DE PROYECTOS',7,'admin','2017-04-02 16:22:55',NULL,NULL,1),
	(53,'PRESIDENCIA',7,'admin','2017-04-02 16:25:58',NULL,NULL,1),
	(54,'GERENCIA DE SISTEMAS',7,'admin','2017-04-02 16:26:50',NULL,NULL,1),
	(55,'SUPERINTENDENCIA DE CALIDAD',8,'admin','2017-04-02 17:01:22',NULL,NULL,1),
	(56,'JEFATURA DE CAMPO',8,'admin','2017-04-02 17:03:09',NULL,NULL,1),
	(57,'GERENCIA COMERCIAL',8,'admin','2017-04-02 17:03:20',NULL,NULL,1),
	(58,'SUPERINTENDENCIA DE CONDENSERIA',8,'admin','2017-04-02 17:03:35',NULL,NULL,1),
	(59,'SUPERINTENDENCIA DE DERIVADOS LACTEOS',8,'admin','2017-04-02 17:03:57',NULL,NULL,1),
	(60,'SUPERINTENDENCIA DE FABRICA DE ENVASES',8,'admin','2017-04-02 17:04:23',NULL,NULL,1),
	(61,'GERENCIA DE PRODUCCION',8,'admin','2017-04-02 17:04:45',NULL,NULL,1),
	(62,'JEFATURA DE ADMINISTRACION Y OPERACIONES',8,'admin','2017-04-02 17:04:59',NULL,NULL,1),
	(63,'JEFATURA DE INGENIERIA INDUSTRIAL',8,'admin','2017-04-02 17:05:11',NULL,NULL,1),
	(64,'INVESTIGACION Y DESARROLLO',8,'admin','2017-04-02 17:05:27',NULL,NULL,1),
	(65,'GERENCIA DE LOGISTICA',8,'admin','2017-04-02 17:05:38',NULL,NULL,1),
	(66,'SUPERINTENDENCIA DE MANTENIMIENTO',8,'admin','2017-04-02 17:05:59',NULL,NULL,1),
	(67,'GERENCIA DE OPERACIONES',8,'admin','2017-04-02 17:06:21',NULL,NULL,1),
	(68,'GERENCIA DE PROYECTOS',8,'admin','2017-04-02 17:06:34',NULL,NULL,1),
	(69,'GERENCIA DE RECURSOS HUMANOS',8,'admin','2017-04-02 17:06:48',NULL,NULL,1),
	(72,'JEFATURA DE SISTEMAS',8,'admin','2017-04-02 17:07:27',NULL,NULL,1),
	(73,'SUPERVISION DE ALMACEN',8,'admin','2017-04-02 17:07:39',NULL,NULL,1),
	(74,'SUPERVISION DE MANTENIMIENTO',8,'admin','2017-04-02 17:07:51',NULL,NULL,1),
	(75,'JEFATURA DE PLANTA',8,'admin','2017-04-02 17:08:03',NULL,NULL,1);

/*!40000 ALTER TABLE `area` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table cuestionario_siso
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cuestionario_siso`;

CREATE TABLE `cuestionario_siso` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_puesto_trabajo` int(10) unsigned NOT NULL,
  `id_pregunta_siso` int(10) unsigned NOT NULL,
  `respuesta` tinyint(1) DEFAULT NULL,
  `usuario_creado` varchar(250) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `usuario_modificado` varchar(250) DEFAULT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `cuestionario_siso_puesto_trabajo_FK` (`id_puesto_trabajo`),
  KEY `cuestionario_siso_pregunta_siso_FK` (`id_pregunta_siso`),
  CONSTRAINT `cuestionario_siso_pregunta_siso_FK` FOREIGN KEY (`id_pregunta_siso`) REFERENCES `pregunta_siso` (`id`),
  CONSTRAINT `cuestionario_siso_puesto_trabajo_FK` FOREIGN KEY (`id_puesto_trabajo`) REFERENCES `puesto_trabajo` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



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
  `usuario_creado` varchar(250) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `usuario_modificado` varchar(250) DEFAULT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `empresa_codigo_UN` (`codigo`),
  UNIQUE KEY `empresa_ruc_UN` (`ruc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `empresa` WRITE;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;

INSERT INTO `empresa` (`id`, `codigo`, `razon_social`, `ruc`, `direccion`, `telefono`, `usuario_creado`, `fecha_creado`, `usuario_modificado`, `fecha_modificado`, `estado`)
VALUES
	(1,'SABHA','SABHA','11111111111','','','admin','2017-02-04 22:04:11','admin','2017-02-04 22:04:11',1),
	(2,'AGRO','AGROAURORA','22222222233','qwer','1234343','admin','2017-04-02 11:22:19',NULL,NULL,1),
	(3,'GLORIA','GLORIA','33333333344','GLORIA','1231234','admin','2017-04-02 15:58:49',NULL,NULL,1);

/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table local
# ------------------------------------------------------------

DROP TABLE IF EXISTS `local`;

CREATE TABLE `local` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_empresa` int(10) unsigned NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `direccion` varchar(250) DEFAULT NULL,
  `encargado` varchar(250) DEFAULT NULL,
  `telefono` varchar(12) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `usuario_creado` varchar(250) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `usuario_modificado` varchar(250) DEFAULT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `local_empresa_UN` (`id_empresa`,`nombre`),
  CONSTRAINT `local_empresa_FK` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `local` WRITE;
/*!40000 ALTER TABLE `local` DISABLE KEYS */;

INSERT INTO `local` (`id`, `id_empresa`, `nombre`, `direccion`, `encargado`, `telefono`, `email`, `usuario_creado`, `fecha_creado`, `usuario_modificado`, `fecha_modificado`, `estado`)
VALUES
	(1,1,'HUACHIPA','asdf','asdf','234','asdf@asdf.cc','admin','2017-03-16 05:34:56',NULL,NULL,1),
	(2,1,'AREQUIPA','AREQUIPA','AQP','123456','aqp@aqp.cc','admin','2017-03-18 19:23:43','admin','2017-03-20 21:13:05',1),
	(3,2,'SULLANA','SULLANA','emp2','1234123','emp@agro.cc','admin','2017-04-02 11:23:22',NULL,NULL,1),
	(4,3,'AREQUIPA','AREQUIPA','AREQUIPA','1231233','are@are.cc','admin','2017-04-02 15:59:22',NULL,NULL,1),
	(5,3,'CAJAMARCA','CAJAMARCA','CAJAMARCA','1233211','caj@caj.cc','admin','2017-04-02 16:00:13',NULL,NULL,1),
	(6,3,'VIRÚ','VIRÚ','VIRÚ','12332232','vr@vr.cc','admin','2017-04-02 16:00:38',NULL,NULL,1),
	(7,3,'EDIFICIO CORPORATIVO','EDIFICIO CORPORATIVO','EDIFICIO CORPORATIVO','2344323','ed@ed.cc','admin','2017-04-02 16:01:32',NULL,NULL,1),
	(8,3,'HUACHIPA','HUACHIPA','HUACHIPA','3453455','hua@hua.cc','admin','2017-04-02 16:04:05',NULL,NULL,1);

/*!40000 ALTER TABLE `local` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table permisos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permisos`;

CREATE TABLE `permisos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) DEFAULT NULL,
  `base_url` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `permisos` WRITE;
/*!40000 ALTER TABLE `permisos` DISABLE KEYS */;

INSERT INTO `permisos` (`id`, `nombre`, `base_url`)
VALUES
	(1,'MANT. PUESTOS DE TRABAJO','puestos'),
	(2,'IMPORTAR PERSONAL SAP','personal'),
	(3,'MANT. EMPRESA','empresa'),
	(4,'MANT. LOCAL','local'),
	(5,'MANT. AREA','area'),
	(6,'EVALUACION EVA-ERIN','evaerin'),
	(7,'EVALUACION SISO','siso'),
	(8,'EVALUACION FEDD','fedd'),
	(9,'REPORTE INTERNO','reporte'),
	(10,'MANT. ROLES','rol'),
	(11,'MANT. USUARIO','usuario'),
	(12,'CONFIGURACION SISO','siso/configuracion'),
	(13,'Reporte puestos','reporte/reportePuestos');

/*!40000 ALTER TABLE `permisos` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table personal
# ------------------------------------------------------------

DROP TABLE IF EXISTS `personal`;

CREATE TABLE `personal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa_sap` varchar(45) DEFAULT NULL,
  `empresa_nombre_sap` varchar(250) DEFAULT NULL,
  `id_sede_sap` varchar(45) DEFAULT NULL,
  `sede_nombre_sap` varchar(250) DEFAULT NULL,
  `area_nombre` varchar(250) DEFAULT NULL,
  `codigo_puesto_creado` varchar(45) DEFAULT NULL,
  `codigo_sabha` varchar(45) DEFAULT NULL,
  `consultoria` varchar(45) DEFAULT NULL,
  `codigo_puesto` varchar(45) DEFAULT NULL,
  `nombre_puesto` varchar(150) DEFAULT NULL,
  `genero` enum('Masculino','Femenino') DEFAULT NULL,
  `num_colaborador` bigint(20) DEFAULT NULL,
  `nombres_apellidos` varchar(250) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `id_empresa` int(11) DEFAULT NULL,
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
  `estado` tinyint(4) DEFAULT NULL,
  `usuario_creado` varchar(250) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `usuario_modificado` varchar(250) DEFAULT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `pregunta_siso` WRITE;
/*!40000 ALTER TABLE `pregunta_siso` DISABLE KEYS */;

INSERT INTO `pregunta_siso` (`id`, `pregunuta`, `grupo`, `tipo_riesgo`, `valor_s_visual`, `valor_s_auditivo`, `valor_m_ext_inferior`, `valor_m_ext_superior`, `valor_m_intelectual`, `valor_m_psicosocial`, `estado`, `usuario_creado`, `fecha_creado`, `usuario_modificado`, `fecha_modificado`)
VALUES
	(1,'Se realiza alguna tarea por encima de 1.80m, o dentro de un espacio confinado (accesos restringidos), o trabajos con llamas o chispas?','Seguridad en el puesto de trabajo','Entorno',0,0,0,0,0,0,1,'','2017-02-24 18:36:58','','2017-02-24 18:37:09'),
	(2,'Se encuentra por encima del primer piso y se accede mediante escaleras o ascensores?','Seguridad en el puesto de trabajo','Entorno',2,2,0,0,NULL,NULL,1,'','2017-02-24 18:36:58','','2017-02-24 18:37:09'),
	(3,'Existen altos niveles de ruido?','Seguridad en el puesto de trabajo','Entorno',NULL,1,NULL,NULL,4,4,1,'','2017-02-24 18:36:58','','2017-02-24 18:37:09'),
	(4,'Tiene cambios bruscos de temperatura (calor, frío, humedad)?','Seguridad en el puesto de trabajo','Entorno',NULL,NULL,1,1,NULL,NULL,1,'','2017-02-24 18:36:58','','2017-02-24 18:37:09'),
	(5,'El puesto esta expuesto a Radiacion Solar en forma directa?','Seguridad en el puesto de trabajo','Entorno',2,NULL,NULL,NULL,NULL,NULL,1,'','2017-02-24 18:36:58','','2017-02-24 18:37:09'),
	(6,'El puesto requiere completar formatos de Analisis de Riesgo (Permisos de Trabajo de Riesgo, AST o ATS, etc)?','Seguridad en el puesto de trabajo','Entorno',0,0,1,1,0,0,1,'','2017-02-24 18:36:58','','2017-02-24 18:37:09'),
	(7,'Tienen elementos giratorios o que se desplazan en forma vertical u horizontal?','Seguridad en el puesto de trabajo','Equipos y Herramientas',0,0,0,0,0,NULL,1,'','2017-02-24 18:36:58','','2017-02-24 18:37:09'),
	(8,'Esta expuesto a vibraciones debido a Herramientas o Uso de Equipos?','Seguridad en el puesto de trabajo','Equipos y Herramientas',NULL,NULL,0,0,NULL,0,1,'','2017-02-24 18:36:58','','2017-02-24 18:37:09'),
	(9,'Cerca al puesto de trabajo circulan vehículos o equipos?','Seguridad en el puesto de trabajo','Equipos y Herramientas',1,0,0,1,0,NULL,1,'','2017-02-24 18:36:58','','2017-02-24 18:37:09'),
	(10,'Tiene carcasa de metal y estan alimentados por Energia Electrica?','Seguridad en el puesto de trabajo','Equipos y Herramientas',1,NULL,NULL,0,0,1,1,'','2017-02-24 18:36:58','','2017-02-24 18:37:09'),
	(11,'En el puesto de trabajo se manipulan frecuentemente cargas (para levantar, trasladar, posicionar, etc)? ','Seguridad en el puesto de trabajo','Materiales',1,1,0,0,0,1,1,'','2017-02-24 18:36:58','','2017-02-24 18:37:09'),
	(12,'Existe peligro vinculado a control de Presión o control de Temperatura en relacion al proceso productivo?','Seguridad en el Proceso','Proceso',1,1,1,1,1,NULL,1,'','2017-02-24 18:36:58','','2017-02-24 18:37:09'),
	(13,'Existe peligro vinculado a control de concentracion, proporciones o mezcla de productos químicos en el proceso productivo?','Seguridad en el Proceso','Proceso',1,2,2,1,0,NULL,1,'','2017-02-24 18:36:58','','2017-02-24 18:37:09'),
	(14,'El Proceso Productivo es tan crítico que requiere de inspecciones, controles o mantenimientos continuos de equipos o máquinas?','Seguridad en el Proceso','Proceso',0,0,0,0,0,1,1,'','2017-02-24 18:36:58','','2017-02-24 18:37:09'),
	(15,'El Proceso Productivo requiere utilizar fuentes de calor con llamas, calderos, reactores o superficies calientes?','Seguridad en el Proceso','Proceso',1,1,1,1,1,0,1,'','2017-02-24 18:36:58','','2017-02-24 18:37:09'),
	(16,'El Proceso Productivo se desarrolla en atmosferas explosivas o tóxicas?','Seguridad en el Proceso','Proceso',0,0,0,0,0,0,1,'','2017-02-24 18:36:58','','2017-02-24 18:37:09'),
	(17,'Una falla en el proceso productivo puede liberar gases, liquidos o materiales muy toxicos o contaminantes?','Seguridad en el Proceso','Proceso',0,0,0,0,0,0,1,'','2017-02-24 18:36:58','','2017-02-24 18:37:09'),
	(18,'Existen cargas suspendidas por encima del puesto de trabajo en algun momento?','Seguridad en el puesto de trabajo','Materiales',1,0,0,2,0,NULL,1,'','2017-02-24 18:36:58','','2017-02-24 18:37:09'),
	(19,'Los materiales o insumos que utiliza son peligrosos y/o tóxicos?','Seguridad en el puesto de trabajo','Materiales',0,0,1,1,0,NULL,1,'','2017-02-24 18:36:58','','2017-02-24 18:37:09');

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

LOCK TABLES `preguntas_doctor` WRITE;
/*!40000 ALTER TABLE `preguntas_doctor` DISABLE KEYS */;

INSERT INTO `preguntas_doctor` (`valor_s_visual_preg`, `valor_s_auditivo_preg`, `valor_m_ext_inferior_preg`, `valor_m_ext_superior_preg`, `valor_m_intelectual_preg`, `valor_m_psicosocial_preg`)
VALUES
	('Requiere una buena vision lejana, cercana, o discriminar colores para realizar sus tareas? Por que? ','Las tareas exijen que escuchar sonidos especiales o comunicarse en forma frecuente en su puesto de trabajo? Por que?','El puesto requiere estar de pie y/o deambular y/o usar las piernas o pies para cumplir sus funciones? Explicar','El puesto requiere uso de ambos brazos, ambas manos y/o sujetar objetos? Uso de cuello? Giro de la columna?','El puesto requiere tomar decisiones, analizar información, resolver problemas? Explicar','El puesto requiere coordinaciones con otros puestos, clientes, proveedores? Explicar');

/*!40000 ALTER TABLE `preguntas_doctor` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table puesto_trabajo
# ------------------------------------------------------------

DROP TABLE IF EXISTS `puesto_trabajo`;

CREATE TABLE `puesto_trabajo` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_local` int(10) unsigned NOT NULL,
  `entrevistado_nombre` varchar(250) DEFAULT NULL,
  `entrevistado_puesto` varchar(250) DEFAULT NULL,
  `entrevistado_telefono` varchar(250) DEFAULT NULL,
  `entrevistado_email` varchar(250) DEFAULT NULL,
  `eva_erin_resultado` varchar(250) DEFAULT NULL,
  `eva_erin_observaciones` text,
  `id_cuestionario_siso` int(11) DEFAULT NULL,
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
  `usuario_creado` varchar(250) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `usuario_modificado` varchar(250) DEFAULT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `FK_COD_SABHA` (`id_local`,`codigo_sabha`),
  KEY `puesto_trabajo_local_FK` (`id_local`),
  KEY `puesto_trabajo_area_FK` (`id_area`),
  CONSTRAINT `puesto_trabajo_area_FK` FOREIGN KEY (`id_area`) REFERENCES `area` (`id`),
  CONSTRAINT `puesto_trabajo_local_FK` FOREIGN KEY (`id_local`) REFERENCES `local` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `puesto_trabajo` WRITE;
/*!40000 ALTER TABLE `puesto_trabajo` DISABLE KEYS */;

INSERT INTO `puesto_trabajo` (`id`, `id_local`, `entrevistado_nombre`, `entrevistado_puesto`, `entrevistado_telefono`, `entrevistado_email`, `eva_erin_resultado`, `eva_erin_observaciones`, `id_cuestionario_siso`, `siso_s_visual`, `siso_s_auditivo`, `siso_m_ext_inferior`, `siso_m_ext_superior`, `siso_m_intelectual`, `siso_m_psicosocial`, `codigo_sabha`, `denominacion_sabha`, `codigo_mof`, `denominacion_mof`, `codigo_sap`, `denominacion_sap`, `otra_denominacion`, `id_area`, `id_empresa`, `funcion_principal`, `s_visual_actividad`, `s_visual_requerimiento`, `s_visual_restriccion`, `s_visual_pre_eval`, `s_auditivo_actividad`, `s_auditivo_requerimiento`, `s_auditivo_restriccion`, `s_auditivo_pre_eval`, `m_ext_inf_actividad`, `m_ext_inf_requerimiento`, `m_ext_inf_restriccion`, `m_ext_inf_pre_eval`, `m_ext_sup_actividad`, `m_ext_sup_requerimiento`, `m_ext_sup_restriccion`, `m_ext_sup_pre_eval`, `m_intelectual_actividad`, `m_intelectual_requerimiento`, `m_intelectual_restriccion`, `m_intelectual_pre_eval`, `m_psicosocial_actividad`, `m_psicosocial_requerimiento`, `m_psicosocial_restriccion`, `m_psicosocial_pre_eval`, `resultado_pt_s_visual`, `resultado_pt_s_auditivo`, `resultado_pt_m_ext_inf`, `resultado_pt_m_ext_sup`, `resultado_pt_m_intelectual`, `resultado_pt_m_psicosocial`, `resultado_final_s_visual`, `resultado_final_s_auditivo`, `resultado_final_m_ext_inf`, `resultado_final_m_ext_sup`, `resultado_final_m_intelectual`, `resultado_final_m_psicosocial`, `es_apto`, `aplica_ajutes`, `estado_registro`, `notas`, `usuario_creado`, `fecha_creado`, `usuario_modificado`, `fecha_modificado`, `estado`)
VALUES
	(1,1,'HUGO BALL�N','SUPERVISOR DE TURNO',NULL,NULL,'VERDE',NULL,NULL,5,4,3,2,1,0,'01ADMI01','Asistente de auditor','mof','mof','sap','sap','',1,1,'FUNCION PRINCIPAL','VISUAL ACT','VISUAL REQ','VISUAL REST',0,'AUDITIVO ACT','AUDITIVO REQ','AUDITIVO REST',1,'INF ACT','INF REQ','INF REST',2,'SUP AT','SUP REQ','SUP REST',3,'INT ACT','INT REQ','INT REST',4,'SI ACT','SI REQ','SI REST',5,0,1,2,3,4,5,0,1,2,2,1,0,1,NULL,'CONCLUIDO','','admin','2017-03-16 05:45:44','admin','2017-03-16 05:45:44',1),
	(974,4,'Irma Delgado','Jefe Control de Calidad',NULL,NULL,'Verde',NULL,NULL,1,0,0,0,0,0,'08CALI01','AUXILIAR DE CONTROL DE CALIDAD','0','AUXILIAR DE CONTROL DE CALIDAD','0','AUXILIAR DE CONTROL DE CALIDAD','NO',17,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:33','admin','2017-04-02 17:12:33',1),
	(975,4,'Irma Delgado','Jefe Control de Calidad',NULL,NULL,'Verde',NULL,NULL,1,0,0,0,0,0,'08CALI02','INSPECTOR CONTROL DE CALIDAD','0','INSPECTOR CONTROL DE CALIDAD','','INSPECTOR CONTROL DE CALIDAD','NO',17,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:33','admin','2017-04-02 17:12:33',1),
	(976,4,'Jonathan Quiroz','ASESOR TECNICO DE CAMPO',NULL,NULL,'Verde',NULL,NULL,1,1,0,0,0,0,'08CAMP01','ASESOR TECNICO DE CAMPO','0','ASESOR TECNICO DE CAMPO','0','ASESOR TECNICO DE CAMPO','ASESOR TECNICO DE ZONA',18,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:33','admin','2017-04-02 17:12:33',1),
	(977,4,'Ricardo Bolaños','JEFE DE PRODUCCION CONDENSERIA',NULL,NULL,'Verde',NULL,NULL,1,0,0,0,0,0,'08COND01','ASISTENTE DE PRODUCCION','0','ASISTENTE DE PRODUCCION','0','ASISTENTE DE PRODUCCION','NO',19,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:33','admin','2017-04-02 17:12:33',1),
	(978,4,'Ricardo Bolaños','JEFE DE PRODUCCION CONDENSERIA',NULL,NULL,'Verde',NULL,NULL,1,0,0,0,0,0,'08COND02','JEFE DE PRODUCCION CONDENSERIA','0','JEFE DE PRODUCCION CONDENSERIA','0','JEFE DE PRODUCCION CONDENSERIA','NO',19,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,0,0,0,0,0,1,0,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:33','admin','2017-04-02 17:12:33',1),
	(979,4,'Ricardo Bolaños','JEFE DE PRODUCCION CONDENSERIA',NULL,NULL,'Verde',NULL,NULL,1,0,0,0,0,0,'08COND03','MONTACARGUISTA','0','MONTACARGUISTA','0','MONTACARGUISTA','NO',19,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:33','admin','2017-04-02 17:12:33',1),
	(980,4,'Ricardo Bolaños','JEFE DE PRODUCCION CONDENSERIA',NULL,NULL,'Verde',NULL,NULL,1,0,0,0,0,0,'08COND04','OPERADOR','0','OPERADOR','0','OPERADOR','NO',19,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,0,0,0,0,0,1,0,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:33','admin','2017-04-02 17:12:33',1),
	(981,4,'Ricardo Bolaños','JEFE DE PRODUCCION CONDENSERIA',NULL,NULL,'Verde',NULL,NULL,1,0,0,0,0,0,'08COND05','OPERARIO','0','OPERARIO','0','OPERARIO','NO',19,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:33','admin','2017-04-02 17:12:33',1),
	(982,4,'Ricardo Bolaños','JEFE DE PRODUCCION CONDENSERIA',NULL,NULL,'Verde',NULL,NULL,1,0,0,0,0,0,'08COND06','PESADOR','0','PESADOR','0','PESADOR','NO',19,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:33','admin','2017-04-02 17:12:33',1),
	(983,4,'Ricardo Bolaños','JEFE DE PRODUCCION CONDENSERIA',NULL,NULL,'Verde',NULL,NULL,1,0,0,0,0,0,'08COND07','SUPERVISOR DE TURNO','0','SUPERVISOR DE TURNO','0','SUPERVISOR DE TURNO','NO',19,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,0,0,0,0,0,1,0,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:33','admin','2017-04-02 17:12:33',1),
	(984,4,'Ricardo Bolaños','JEFE DE PRODUCCION CONDENSERIA',NULL,NULL,'Verde',NULL,NULL,1,0,0,0,0,0,'08COND08','SUPERVISOR SENIOR','0','SUPERVISOR SENIOR','0','SUPERVISOR SENIOR','NO',19,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:33','admin','2017-04-02 17:12:33',1),
	(985,4,'Ricardo Bolaños','JEFE DE PRODUCCION CONDENSERIA',NULL,NULL,'Verde',NULL,NULL,1,0,0,0,0,0,'08COND09','TECNICO DE ELABORACION','0','TECNICO DE ELABORACION','0','TECNICO DE ELABORACION','NO',19,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:33','admin','2017-04-02 17:12:33',1),
	(986,4,'Ricardo Bolaños','JEFE DE PRODUCCION CONDENSERIA',NULL,NULL,'Verde',NULL,NULL,1,0,0,0,0,0,'08COND10','TECNICO DE LABORATORIO','0','TECNICO DE LABORATORIO','0','TECNICO DE LABORATORIO','NO',19,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:33','admin','2017-04-02 17:12:33',1),
	(987,4,'Max Villegas','Supervisor ',NULL,NULL,'Verde',NULL,NULL,1,0,0,0,0,0,'08ENVA01','OPERADOR','0','OPERADOR','','OPERADOR','NO',20,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:33','admin','2017-04-02 17:12:33',1),
	(988,4,'Max Villegas','Supervisor ',NULL,NULL,'Verde',NULL,NULL,1,0,0,0,0,0,'08ENVA02','OPERARIO','0','OPERARIO','','OPERARIO','NO',20,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:33','admin','2017-04-02 17:12:33',1),
	(989,4,'Max Villegas','Supervisor ',NULL,NULL,'Verde',NULL,NULL,1,0,0,0,0,0,'08ENVA03','SUPERVISOR','0','SUPERVISOR','','SUPERVISOR','NO',20,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:33','admin','2017-04-02 17:12:33',1),
	(990,4,'Max Villegas','Supervisor ',NULL,NULL,'Verde',NULL,NULL,1,0,0,0,0,0,'08ENVA04','SUPERVISOR DE TURNO','0','SUPERVISOR DE TURNO','','SUPERVISOR DE TURNO','NO',20,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:33','admin','2017-04-02 17:12:33',1),
	(991,4,'Carlos Rojas','Jefe de Producción',NULL,NULL,'Verde',NULL,NULL,1,0,0,0,0,0,'08LACT01','ALMACENERO PRODUCTOS TERMINADOS','0','ALMACENERO PRODUCTOS TERMINADOS','','ALMACENERO PRODUCTOS TERMINADOS','No',21,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,0,0,0,0,0,1,0,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:33','admin','2017-04-02 17:12:33',1),
	(992,4,'Carlos Rojas','Jefe de Producción',NULL,NULL,'Verde',NULL,NULL,1,0,0,0,0,0,'08LACT02','ENCARGADO DE ALMACEN','0','ENCARGADO DE ALMACEN','','ENCARGADO DE ALMACEN','No',21,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,0,0,0,0,0,1,0,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:33','admin','2017-04-02 17:12:33',1),
	(993,4,'Carlos Rojas','Jefe de Producción',NULL,NULL,'Verde',NULL,NULL,2,0,0,0,0,0,'08LACT03','JEFE DE PRODUCCION DL AREQUIPA','0','JEFE DE PRODUCCION DL AREQUIPA','','JEFE DE PRODUCCION DL AREQUIPA','No',21,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,0,0,0,0,0,1,0,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:33','admin','2017-04-02 17:12:33',1),
	(994,4,'Carlos Rojas','Jefe de Producción',NULL,NULL,'Verde',NULL,NULL,1,0,0,0,0,0,'08LACT04','OPERADOR','0','OPERADOR','','OPERADOR','No',21,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,0,0,0,0,0,1,0,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:33','admin','2017-04-02 17:12:33',1),
	(995,4,'Carlos Rojas','Jefe de Producción',NULL,NULL,'Verde',NULL,NULL,1,0,0,0,0,0,'08LACT05','OPERADOR SENIOR','0','OPERADOR SENIOR','','OPERADOR SENIOR','No',21,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,0,0,0,0,0,1,0,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:33','admin','2017-04-02 17:12:33',1),
	(996,4,'Carlos Rojas','Jefe de Producción',NULL,NULL,'Verde',NULL,NULL,1,0,0,0,0,0,'08LACT06','OPERARIO','0','OPERARIO','','OPERARIO','No',21,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,0,0,0,0,0,1,0,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:33','admin','2017-04-02 17:12:33',1),
	(997,4,'Carlos Rojas','Jefe de Producción',NULL,NULL,'Verde',NULL,NULL,1,0,0,0,0,0,'08LACT07','SUPERVISOR DE TURNO','0','SUPERVISOR DE TURNO','','SUPERVISOR DE TURNO','No',21,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,0,0,0,0,0,1,0,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:33','admin','2017-04-02 17:12:33',1),
	(998,4,'Gorky Barriga','Supervisor de Almacen',NULL,NULL,'Verde',NULL,NULL,1,0,0,0,0,0,'08LOGI01','ASISTENTE DE ALMACEN','0','ASISTENTE DE ALMACEN','','ASISTENTE DE ALMACEN','NO',22,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:33','admin','2017-04-02 17:12:33',1),
	(999,4,'Gorky Barriga','Supervisor de Almacen',NULL,NULL,'Verde',NULL,NULL,1,0,0,0,0,0,'08LOGI02','AUXILIAR DE ALMACEN','0','AUXILIAR DE ALMACEN','','AUXILIAR DE ALMACEN','NO',22,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:33','admin','2017-04-02 17:12:33',1),
	(1000,4,'Gorky Barriga','Supervisor de Almacen',NULL,NULL,'Verde',NULL,NULL,1,0,0,0,0,0,'08LOGI03','RECEPCIONISTA','0','RECEPCIONISTA','','RECEPCIONISTA','NO',22,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:33','admin','2017-04-02 17:12:33',1),
	(1001,4,'Gorky Barriga','Supervisor de Almacen',NULL,NULL,'Verde',NULL,NULL,1,0,0,0,0,0,'08LOGI04','SUPERVISOR DE ALMACEN','0','SUPERVISOR DE ALMACEN','0','SUPERVISOR DE ALMACEN','NO',22,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:33','admin','2017-04-02 17:12:33',1),
	(1002,4,'Ronald Tejada','Coordinador de Mantenimiento',NULL,NULL,'Verde',NULL,NULL,1,0,0,0,0,0,'08MANT01','COORDINADOR DE MANTENIMIENTO','0','COORDINADOR DE MANTENIMIENTO','','COORDINADOR DE MANTENIMIENTO','Jefe de Mantenimiento',23,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:33','admin','2017-04-02 17:12:33',1),
	(1003,4,'Ronald Tejada','Coordinador de Mantenimiento',NULL,NULL,'Verde',NULL,NULL,1,0,0,0,0,0,'08MANT02','ELECTRICISTA ELECTRONICO','0','ELECTRICISTA ELECTRONICO','','ELECTRICISTA ELECTRONICO','Jefe de Mantenimiento',23,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:33','admin','2017-04-02 17:12:33',1),
	(1004,4,'Ronald Tejada','Coordinador de Mantenimiento',NULL,NULL,'Verde',NULL,NULL,1,0,0,0,0,0,'08MANT03','MECANICO','0','MECANICO','','MECANICO','Jefe de Mantenimiento',23,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:34','admin','2017-04-02 17:12:34',1),
	(1005,4,'Ronald Tejada','Coordinador de Mantenimiento',NULL,NULL,'Verde',NULL,NULL,1,0,0,0,0,0,'08MANT04','OPERADOR','0','OPERADOR','','OPERADOR','Jefe de Mantenimiento',23,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:34','admin','2017-04-02 17:12:34',1),
	(1006,4,'Ronald Tejada','Coordinador de Mantenimiento',NULL,NULL,'Verde',NULL,NULL,1,0,0,0,0,0,'08MANT05','SUPERVISOR DE MANTENIMIENTO','0','SUPERVISOR DE MANTENIMIENTO','','SUPERVISOR DE MANTENIMIENTO','Jefe de Mantenimiento',23,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:34','admin','2017-04-02 17:12:34',1),
	(1007,4,'Ronald Tejada','Coordinador de Mantenimiento',NULL,NULL,'Verde',NULL,NULL,1,0,0,0,0,0,'08MANT06','SUPERVISOR DE MANTENIMIENTO VEHICULOS','0','SUPERVISOR DE MANTENIMIENTO VEHICULOS','','SUPERVISOR DE MANTENIMIENTO VEHICULOS','Jefe de Mantenimiento',23,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:34','admin','2017-04-02 17:12:34',1),
	(1008,4,'Ronald Tejada','Coordinador de Mantenimiento',NULL,NULL,'Verde',NULL,NULL,1,0,0,0,0,0,'08MANT07','SUPERVISOR ELECTRICO','0','SUPERVISOR ELECTRICO','','SUPERVISOR ELECTRICO','Jefe de Mantenimiento',23,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:34','admin','2017-04-02 17:12:34',1),
	(1009,4,'Ronald Tejada','Coordinador de Mantenimiento',NULL,NULL,'Verde',NULL,NULL,1,0,0,0,0,0,'08MANT08','SUPERVISOR MECANICO','0','SUPERVISOR MECANICO','','SUPERVISOR MECANICO','Jefe de Mantenimiento',23,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:34','admin','2017-04-02 17:12:34',1),
	(1010,4,'Ronald Tejada','Coordinador de Mantenimiento',NULL,NULL,'Verde',NULL,NULL,1,0,0,0,0,0,'08MANT09','TECNICO DE AUTOMATIZACION','0','TECNICO DE AUTOMATIZACION','0','TECNICO DE AUTOMATIZACION','Jefe de Mantenimiento',23,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:34','admin','2017-04-02 17:12:34',1),
	(1011,4,'Ronald Tejada','Coordinador de Mantenimiento',NULL,NULL,'Verde',NULL,NULL,1,0,0,0,0,0,'08MANT10','TECNICO INSTRUMENTISTA','0','TECNICO INSTRUMENTISTA','','TECNICO INSTRUMENTISTA','Jefe de Mantenimiento',23,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:34','admin','2017-04-02 17:12:34',1),
	(1012,4,'Ronald Tejada','Coordinador de Mantenimiento',NULL,NULL,'Verde',NULL,NULL,1,0,0,0,0,0,'08MANT11','TECNICO PREDICTIVO','0','TECNICO PREDICTIVO','0','TECNICO PREDICTIVO','Jefe de Mantenimiento',23,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:34','admin','2017-04-02 17:12:34',1),
	(1013,5,'','',NULL,NULL,'Verde',NULL,NULL,0,0,0,0,0,0,'08CALI01','INSPECTOR CONTROL DE CALIDAD','','','','INSPECTOR CONTROL DE CALIDAD','',25,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:34','admin','2017-04-02 17:12:34',1),
	(1014,5,'','',NULL,NULL,'Verde',NULL,NULL,0,0,0,0,0,0,'08CAMP01','ADMINISTRADOR TÉCNICO DE CAMPO','','','','ADMINISTRADOR TECNICO DE CAMPO','NO',26,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:34','admin','2017-04-02 17:12:34',1),
	(1015,5,'','',NULL,NULL,'Verde',NULL,NULL,0,0,0,0,0,0,'08CAMP02','ASESOR TÉCNICO DE CAMPO','0','0','','ASESOR TECNICO DE CAMPO','NO',26,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:34','admin','2017-04-02 17:12:34',1),
	(1016,5,'','',NULL,NULL,'Verde',NULL,NULL,0,0,0,0,0,0,'08CAMP03','OPERARIO','0','0','','OPERARIO','NO',26,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:34','admin','2017-04-02 17:12:34',1),
	(1017,5,'','',NULL,NULL,'Verde',NULL,NULL,0,0,0,0,0,0,'08LOGI01','ALMACENERO','0','0','','ALMACENERO','NO',27,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:34','admin','2017-04-02 17:12:34',1),
	(1018,5,'','',NULL,NULL,'Verde',NULL,NULL,0,0,0,0,0,0,'08LOGI02','AUXILIAR DE ALMACÉN','0','0','','AUXILIAR DE ALMACEN','NO',27,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:34','admin','2017-04-02 17:12:34',1),
	(1019,5,'','',NULL,NULL,'Verde',NULL,NULL,0,0,0,0,0,0,'08LOGI03','SUPERVISOR','0','0','','SUPERVISOR','NO',27,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:34','admin','2017-04-02 17:12:34',1),
	(1020,5,'','',NULL,NULL,'Verde',NULL,NULL,0,0,0,0,0,0,'08MANT01','ASISTENTE DE MANTENIMIENTO','0','0','','ASISTENTE DE MANTENIMIENTO','',28,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:34','admin','2017-04-02 17:12:34',1),
	(1021,5,'','',NULL,NULL,'Verde',NULL,NULL,0,0,0,0,0,0,'08MANT02','ELECTRICISTA ELECTRÓNICO','0','0','','ELECTRICISTA ELECTRONICO','',28,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:34','admin','2017-04-02 17:12:34',1),
	(1022,5,'','',NULL,NULL,'Verde',NULL,NULL,0,0,0,0,0,0,'08MANT03','JEFE DE MANTENIMIENTO','0','0','','JEFE DE MANTENIMIENTO','',28,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:34','admin','2017-04-02 17:12:34',1),
	(1023,5,'','',NULL,NULL,'Verde',NULL,NULL,0,0,0,0,0,0,'08MANT04','JEFE DE TALLER','0','0','','JEFE DE TALLER','',28,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:34','admin','2017-04-02 17:12:34',1),
	(1024,5,'','',NULL,NULL,'Verde',NULL,NULL,0,0,0,0,0,0,'08MANT05','MECANICO','0','0','','MECANICO','',28,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:34','admin','2017-04-02 17:12:34',1),
	(1025,5,'','',NULL,NULL,'Verde',NULL,NULL,0,0,0,0,0,0,'08MANT06','ELECTRICISTA','0','0','','MECANICO ELECTRICISTA','',28,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:34','admin','2017-04-02 17:12:34',1),
	(1026,5,'','',NULL,NULL,'Verde',NULL,NULL,0,0,0,0,0,0,'08MANT07','OPERADOR','0','0','','OPERADOR','',28,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:34','admin','2017-04-02 17:12:34',1),
	(1027,5,'Ronald Tejada','Coordinador de Mantenimiento',NULL,NULL,'Verde',NULL,NULL,0,0,0,0,0,0,'08MANT08','TÉCNICO DE REFRIGERACIÓN','0','0','','TECNICO DE REFRIGERACION','',28,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:34','admin','2017-04-02 17:12:34',1),
	(1028,5,'','',NULL,NULL,'Verde',NULL,NULL,0,0,0,1,0,0,'08PROD01','JEFE DE PRODUCCIÓN QUESOS','0','0','','JEFE DE PRODUCCION QUESOS','NO',29,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:34','admin','2017-04-02 17:12:34',1),
	(1029,5,'','',NULL,NULL,'Verde',NULL,NULL,0,0,0,0,0,0,'08PROD02','OPERADOR','0','0','','OPERADOR','NO',29,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:34','admin','2017-04-02 17:12:34',1),
	(1030,5,'','',NULL,NULL,'Verde',NULL,NULL,0,0,0,0,0,0,'08PROD03','OPERARIO','0','0','','OPERARIO','NO',29,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:34','admin','2017-04-02 17:12:34',1),
	(1031,5,'','',NULL,NULL,'Verde',NULL,NULL,0,0,0,0,0,0,'08PROD04','SUPERVISOR DE PRODUCCIÓN','0','0','','SUPERVISOR DE PRODUCCION','NO',29,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:34','admin','2017-04-02 17:12:34',1),
	(1032,6,'Pantoja Sandoval, Cesar','Administrador',NULL,NULL,'Verde',NULL,NULL,1,1,1,0,0,0,'08ADMI01','SUB GERENTE DE LOGISTICA  Ó GERENTE DE PLANTA ','','ADMINISTRADOR','','Adminsitrador','',30,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,1,0,0,0,0,0,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:34','admin','2017-04-02 17:12:34',1),
	(1033,6,'Lujan Saldaña, Susan','Analista de Calidad',NULL,NULL,'Verde',NULL,NULL,1,0,0,1,0,0,'08COCA01','INSPECTOR DE CONTROL DE CALIDAD','','INSPECTOR DE CONTROL DE CALIDAD','','Inspector de Control de Calidad','',31,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:34','admin','2017-04-02 17:12:34',1),
	(1034,6,'Lujan Saldaña, Susan','Analista de Calidad',NULL,NULL,'Verde',NULL,NULL,1,0,0,1,0,0,'08COCA02','SUPERVISOR DE CALIDAD','','SUPERVISOR DE CALIDAD','','Supervisor de Calidad','',31,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:34','admin','2017-04-02 17:12:34',1),
	(1035,6,'Guarniz Herrera,Edwin Hernesto','Coordinador de Servicio Tecnico',NULL,NULL,'Verde',NULL,NULL,0,0,0,0,0,0,'08COME01','ASISTENTE TECNICO','','ASISTENTE TECNICO','','Asistente Tecnico','',32,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,2,0,0,0,0,0,2,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:35','admin','2017-04-02 17:12:35',1),
	(1036,6,'Guarniz Herrera,Edwin Hernesto','Coordinador de Servicio Tecnico',NULL,NULL,'Verde',NULL,NULL,0,0,0,0,0,0,'08COME02','COORDINADOR DE SERVICIO TECNICO','','COORDINADOR DE SERVICIO TECNICO','','Coordinador de Servicio Tecnico','',32,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,2,0,0,0,0,0,2,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:35','admin','2017-04-02 17:12:35',1),
	(1037,6,'Pantoja Sandoval, Cesar','Administrador',NULL,NULL,'Verde',NULL,NULL,0,0,0,0,0,0,'08LOGI01','ASISTENTE DE ALMACEN','','ASISTENTE DE ALMACEN','','Asistente de Almacen','',30,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:35','admin','2017-04-02 17:12:35',1),
	(1038,6,'Pantoja Sandoval, Cesar','Administrador',NULL,NULL,'Verde',NULL,NULL,0,0,0,0,0,0,'08LOGI02','ENCARGADO DE ALMACÉN','','ENCARGADO DE ALMACÉN','','Encargado de Almacén','',30,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:35','admin','2017-04-02 17:12:35',1),
	(1039,6,'Pantoja Sandoval, Cesar','Administrador',NULL,NULL,'Verde',NULL,NULL,1,0,0,1,0,0,'08LOGI03','ASISTENTE DE ALMACÉN (CHIMBOTE)','','ASISTENTE DE ALMACÉN (CHIMBOTE)','','Asistente de Almacén (Chimbote)','',30,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:35','admin','2017-04-02 17:12:35',1),
	(1040,6,'Ballon Roncalla, Hugo','Supervisor de Producción',NULL,NULL,'Verde',NULL,NULL,1,0,0,1,0,0,'08PROD01','SUPERVISOR DE PRODUCCIÓN','','SUPERVISOR DE PRODUCCIÓN','','Supervisor de Producción','',33,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:35','admin','2017-04-02 17:12:35',1),
	(1041,6,'Ballón Roncalla, Hugo','Supervisor de Producción',NULL,NULL,'Verde',NULL,NULL,0,0,0,0,0,0,'08PROD02','ELECTRICISTA','','ELECTRICISTA','','Electricista','',33,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:35','admin','2017-04-02 17:12:35',1),
	(1042,6,'Ballon Roncalla, Hugo','Supervisor de Producción',NULL,NULL,'Verde',NULL,NULL,0,0,0,0,0,0,'08PROD03','MECÁNICO','','MECÁNICO','','Mecánico','',33,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:35','admin','2017-04-02 17:12:35',1),
	(1043,6,'Ballon Roncalla, Hugo','Supervisor de Producción',NULL,NULL,'Verde',NULL,NULL,0,0,0,0,0,0,'08PROD04','MECÁNICO DE MAQUINAS Y HERRAMIENTAS','','MECÁNICO DE MAQUINAS Y HERRAMIENTAS','','Mecánico de Maquinas y Herramientas','',33,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:35','admin','2017-04-02 17:12:35',1),
	(1044,6,'Ballon Roncalla, Hugo','Supervisor de Producción',NULL,NULL,'Verde',NULL,NULL,0,0,0,1,0,0,'08PROD05','OPERADOR','','OPERADOR','','Operador','',33,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:35','admin','2017-04-02 17:12:35',1),
	(1045,6,'Ballon Roncalla, Hugo','Supervisor de Producción',NULL,NULL,'Verde',NULL,NULL,1,0,0,0,0,0,'08PROD06','OPERARIO','','OPERARIO','','Operario','',33,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:35','admin','2017-04-02 17:12:35',1),
	(1046,6,'Ballon Roncalla, Hugo','Supervisor de Producción',NULL,NULL,'Verde',NULL,NULL,1,0,0,1,0,0,'08PROD07','OPERARIO DE SERVICIOS GENERALES','','OPERARIO DE SERVICIOS GENERALES','','Operario de Servicios Generales','',33,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:35','admin','2017-04-02 17:12:35',1),
	(1047,7,'AUDITOR DE OPERACIONES','MUCHA LARA GUSTAVO ELIAS',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08CONT01','DIRECTOR CORPORATIVO CONTRALORIA','0','DIRECTOR CORPORATIVO CONTRALORIA','','','DIRECTOR CORPORATIVO CONTRALORIA',34,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,1,1,0,0,1,1,1,1,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:35','admin','2017-04-02 17:12:35',1),
	(1048,7,'AUDITOR DE OPERACIONES','MUCHA LARA GUSTAVO ELIAS',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08CONT02','AUDITOR DE OPERACIONES','','AUDITOR DE OPERACIONES','','','AUDITOR DE OPERACIONES',34,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,1,0,0,0,1,1,1,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:35','admin','2017-04-02 17:12:35',1),
	(1049,7,'AUDITOR DE OPERACIONES','MUCHA LARA GUSTAVO ELIAS',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08CONT03','ASISTENTE ADMINISTRATIVO','','ASISTENTE ADMINISTRATIVO','','','ASISTENTE ADMINISTRATIVO',34,3,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,1,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,2,1,1,0,0,0,2,1,1,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:35','admin','2017-04-02 17:12:35',1),
	(1050,7,'ELESPURU GUERRERO ALFREDO','GERENTE CORPORATIVO DE FINANZAS',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCFI01','DIRECTOR CORPORATIVO FINANZAS','0','DIRECTOR CORPORATIVO FINANZAS','0','DIRECTOR CORPORATIVO FINANZAS','NO',35,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,1,0,0,0,0,0,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:35','admin','2017-04-02 17:12:35',1),
	(1051,7,'ELESPURU GUERRERO ALFREDO','GERENTE CORPORATIVO DE FINANZAS',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCFI02','GERENTE DE FINANZAS','0','GERENTE DE FINANZAS','0','GERENTE DE FINANZAS','NO',35,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,1,0,0,0,0,0,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:35','admin','2017-04-02 17:12:35',1),
	(1052,7,'ELESPURU GUERRERO ALFREDO','GERENTE CORPORATIVO DE FINANZAS',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCFI03','SUB GERENTE DE CREDITOS Y COBRANZAS','0','SUB GERENTE DE CREDITOS Y COBRANZAS','0','SUB GERENTE DE CREDITOS Y COBRANZAS','NO',36,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,0,0,0,0,1,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:35','admin','2017-04-02 17:12:35',1),
	(1053,7,'DE ALMEIDA ROTTA ILLICH CARLOS - 998-690-064','SUB GERENTE DE CREDITOS Y COBRANZAS',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCFI04','JEFE CREDITOS Y COBRANZAS','0','JEFE CREDITOS Y COBRANZAS','0','JEFE CREDITOS Y COBRANZAS','NO',36,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,1,0,0,0,0,0,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:35','admin','2017-04-02 17:12:35',1),
	(1054,7,'DE ALMEIDA ROTTA ILLICH CARLOS - 998-690-064','SUB GERENTE DE CREDITOS Y COBRANZAS',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCFI05','SUPERVISOR DE CREDITOS Y COBRANZAS','0','SUPERVISOR DE CREDITOS Y COBRANZAS','0','SUPERVISOR DE CREDITOS Y COBRANZAS','NO',36,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,1,0,0,0,0,0,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:35','admin','2017-04-02 17:12:35',1),
	(1055,7,'DE ALMEIDA ROTTA ILLICH CARLOS - 998-690-064','SUB GERENTE DE CREDITOS Y COBRANZAS',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCFI06','ASISTENTE DE CREDITOS Y COBRANZAS','0','ASISTENTE DE CREDITOS Y COBRANZAS','0','ASISTENTE DE CREDITOS Y COBRANZAS','NO',36,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,0,0,0,0,1,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:35','admin','2017-04-02 17:12:35',1),
	(1056,7,'DE ALMEIDA ROTTA ILLICH CARLOS - 998-690-064','SUB GERENTE DE CREDITOS Y COBRANZAS',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCFI07','INSPECTOR CREDITOS Y COBRANZAS','0','INSPECTOR CREDITOS Y COBRANZAS','0','INSPECTOR CREDITOS Y COBRANZAS','NO',36,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,1,0,0,0,0,0,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:35','admin','2017-04-02 17:12:35',1),
	(1057,7,'ALVAREZ CACERES LUIS AUGUSTO/ CESAR ABANTO','GERENTE CORPORATIVO DE FINANZAS',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCFI08','GERENTE DE PLANEAMIENTO FINANCIERO','0','GERENTE DE PLANEAMIENTO FINANCIERO','0','GERENTE DE PLANEAMIENTO FINANCIERO','NO',35,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,1,0,0,0,0,0,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:35','admin','2017-04-02 17:12:35',1),
	(1058,7,'ELESPURU GUERRERO ALFREDO','GERENTE CORPORATIVO DE FINANZAS',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCFI09','SUB GERENTE DE TESORERIA','0','SUB GERENTE DE TESORERIA','0','SUB GERENTE DE TESORERIA','NO',38,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,0,0,0,0,1,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:35','admin','2017-04-02 17:12:35',1),
	(1059,7,'','',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCFI10','ANALISTA DE TESORERIA','0','ANALISTA DE TESORERIA','0','ANALISTA DE TESORERIA','NO',38,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,0,0,0,0,1,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:35','admin','2017-04-02 17:12:35',1),
	(1060,7,'','',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCFI11','ASISTENTE FINANCIERO','0','ASISTENTE FINANCIERO','0','ASISTENTE FINANCIERO','NO',38,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,0,0,0,0,1,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:35','admin','2017-04-02 17:12:35',1),
	(1061,7,'ELESPURU GUERRERO ALFREDO','GERENTE CORPORATIVO DE FINANZAS',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCFI12','JEFE DE COP','0','JEFE DE COP','0','JEFE DE COP','NO',38,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,0,0,0,0,1,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:35','admin','2017-04-02 17:12:35',1),
	(1062,7,'HERRERA OCAMPO GUILLERMO RAUL','JEFE DE COP',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCFI13','ASISTENTE COP','','ASISTENTE COP','','ASISTENTE COP','NO',38,3,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,2,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,2,2,1,0,0,0,2,2,1,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:35','admin','2017-04-02 17:12:35',1),
	(1063,7,'HERRERA OCAMPO GUILLERMO RAUL','JEFE DE COP',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCFI14','AUXILIAR COP','','AUXILIAR','','AUXILIAR','NO',38,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,2,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,2,1,0,0,0,1,2,1,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:35','admin','2017-04-02 17:12:35',1),
	(1064,7,'JORGE POMA ALVA ','SUPERVISOR DE CAJA CENTRAL',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCFI15','JEFE DE CAJA','0','JEFE DE CAJA','0','JEFE DE CAJA','NO',38,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,3,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,1,0,1,0,0,0,1,0,1,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:35','admin','2017-04-02 17:12:35',1),
	(1065,7,'JORGE POMA ALVA - 998-679-424','SUPERVISOR DE CAJA CENTRAL',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCFI16','ASISTENTE DE CAJA','0','ASISTENTE DE CAJA','0','ASISTENTE DE CAJA','NO',38,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,0,0,0,0,1,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:35','admin','2017-04-02 17:12:35',1),
	(1066,7,'JORGE POMA ALVA ','SUPERVISOR DE CAJA CENTRAL',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCFI17','CAJERO','0','CAJERO','0','CAJERO','NO',38,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,3,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,1,0,0,0,0,0,1,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:35','admin','2017-04-02 17:12:35',1),
	(1067,7,'JORGE POMA ALVA ','SUPERVISOR DE CAJA CENTRAL',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCFI18','SUPERVISOR DE CAJA','0','SUPERVISOR DE CAJA','0','SUPERVISOR DE CAJA','NO',38,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,1,0,0,0,0,0,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:35','admin','2017-04-02 17:12:35',1),
	(1068,7,'JORGE POMA ALVA ','SUPERVISOR DE CAJA CENTRAL',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCFI19','CAJERO CENTRAL','0','CAJERO CENTRAL','0','CAJERO CENTRAL','NO',38,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,1,0,0,0,0,0,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:35','admin','2017-04-02 17:12:35',1),
	(1069,7,'ELESPURU GUERRERO ALFREDO','GERENTE CORPORATIVO DE FINANZAS',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCFI20','JEFE DE TESORERIA UN AGROINDUSTRIA','0','JEFE DE TESORERIA UN AGROINDUSTRIA','0','JEFE DE TESORERIA UN AGROINDUSTRIA','NO',38,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,0,0,0,0,1,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:35','admin','2017-04-02 17:12:35',1),
	(1070,7,'ELESPURU GUERRERO ALFREDO','GERENTE CORPORATIVO DE FINANZAS',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCFI21','JEFE DE TESORERIA UN CEMENTOS Y EMPAQUES','0','JEFE DE TESORERIA UN CEMENTOS Y EMPAQUES','0','JEFE DE TESORERIA UN CEMENTOS Y EMPAQUES','NO',38,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,0,0,0,0,1,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:36','admin','2017-04-02 17:12:36',1),
	(1071,7,'WONG BONILLA JOSE FRANCISCO - 991-687-334','ANALISTA SR DE INVERSIONES',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCFI22','ANALISTA SR DE INVERSIONES','0','ANALISTA SR DE INVERSIONES','0','ANALISTA SR DE INVERSIONES','NO',35,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,0,0,0,0,1,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:36','admin','2017-04-02 17:12:36',1),
	(1072,7,'NUÑEZ FERNANDEZ ALEJANDRO FRANCISCO','GERENTE DE CONTABILIDAD',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCFI23','GERENTE CORPORATIVO DE CONTABILIDAD','','GERENTE CORPORATIVO DE CONTABILIDAD','','GERENTE CORPORATIVO DE CONTABILIDAD','NO',35,3,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,1,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,2,1,1,0,0,0,2,1,1,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:36','admin','2017-04-02 17:12:36',1),
	(1073,7,'NUÑEZ FERNANDEZ ALEJANDRO FRANCISCO','GERENTE DE CONTABILIDAD',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCFI24','GERENTE DE CONTABILIDAD','','GERENTE DE CONTABILIDAD','','GERENTE DE CONTABILIDAD','NO',35,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,1,0,0,0,0,0,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:36','admin','2017-04-02 17:12:36',1),
	(1074,7,'NUÑEZ FERNANDEZ ALEJANDRO FRANCISCO','GERENTE DE CONTABILIDAD',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCFI25','CONTADOR GENERAL UN ALIMENTOS','','CONTADOR GENERAL UN ALIMENTOS','','CONTADOR GENERAL UN ALIMENTOS','NO',35,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,1,0,0,0,1,1,1,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:36','admin','2017-04-02 17:12:36',1),
	(1075,7,'NUÑEZ FERNANDEZ ALEJANDRO FRANCISCO','GERENTE DE CONTABILIDAD',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCFI26','CONTADOR','','CONTADOR','','CONTADOR','NO',35,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,1,0,0,0,1,1,1,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:36','admin','2017-04-02 17:12:36',1),
	(1076,7,'NUÑEZ FERNANDEZ ALEJANDRO FRANCISCO','GERENTE DE CONTABILIDAD',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCFI27','CONTADOR TRIBUTARIO','','CONTADOR TRIBUTARIO','','CONTADOR TRIBUTARIO','NO',35,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,1,0,0,0,1,1,1,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:36','admin','2017-04-02 17:12:36',1),
	(1077,7,'NUÑEZ FERNANDEZ ALEJANDRO FRANCISCO','GERENTE DE CONTABILIDAD',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCFI28','ANALISTA CONTABLE','','ANALISTA CONTABLE','','ANALISTA CONTABLE','NO',35,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,2,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,1,1,0,0,1,1,1,1,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:36','admin','2017-04-02 17:12:36',1),
	(1078,7,'NUÑEZ FERNANDEZ ALEJANDRO FRANCISCO','GERENTE DE CONTABILIDAD',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCFI29','ANALISTA DE COSTOS','','ANALISTA DE COSTOS','','ANALISTA DE COSTOS','NO',35,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,2,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,1,1,0,0,1,1,1,1,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:36','admin','2017-04-02 17:12:36',1),
	(1079,7,'NUÑEZ FERNANDEZ ALEJANDRO FRANCISCO','GERENTE DE CONTABILIDAD',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCFI30','ASISTENTE ADMINISTRATIVO','','ASISTENTE ADMINISTRATIVO','','ASISTENTE ADMINISTRATIVO','NO',35,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,1,0,0,0,1,1,1,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:36','admin','2017-04-02 17:12:36',1),
	(1080,7,'NUÑEZ FERNANDEZ ALEJANDRO FRANCISCO','GERENTE DE CONTABILIDAD',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCFI31','ASISTENTE DE CONTABILIDAD','','ASISTENTE DE CONTABILIDAD','','ASISTENTE DE CONTABILIDAD','NO',35,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,1,0,0,0,1,1,1,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:36','admin','2017-04-02 17:12:36',1),
	(1081,7,'NUÑEZ FERNANDEZ ALEJANDRO FRANCISCO','GERENTE DE CONTABILIDAD',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCFI32','ASISTENTE DE COSTOS','','ASISTENTE DE COSTOS','','ASISTENTE DE COSTOS','NO',35,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,1,0,0,0,1,1,1,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:36','admin','2017-04-02 17:12:36',1),
	(1082,7,'NUÑEZ FERNANDEZ ALEJANDRO FRANCISCO','GERENTE DE CONTABILIDAD',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCFI33','ANALISTA DE CONTABILIDAD','','ANALISTA DE CONTABILIDAD','','ANALISTA DE CONTABILIDAD','NO',35,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,1,0,0,0,1,1,1,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:36','admin','2017-04-02 17:12:36',1),
	(1083,7,'GARCIA ROSELL ZULOAGA GUSTAVO ADOLFO','GERENTE DE PLANEAMIENTO FINANCIERO',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCFI34','JEFE PLANEAMIENTO FINANCIERO UN ALIMENTO','','JEFE PLANEAMIENTO FINANCIERO UN ALIMENTO','','JEFE PLANEAMIENTO FINANCIERO UN ALIMENTO','NO',35,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,1,0,0,0,1,1,1,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:36','admin','2017-04-02 17:12:36',1),
	(1084,7,'GARCIA ROSELL ZULOAGA GUSTAVO ADOLFO','JEFE PLANEAMIENTO FINANCIERO UN ALIMENTO',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCFI35','JEFE PLANEAMIENTO FINANCIERO GLORIA','','JEFE PLANEAMIENTO FINANCIERO GLORIA','','JEFE PLANEAMIENTO FINANCIERO GLORIA','NO',35,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,1,0,0,0,1,1,1,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:36','admin','2017-04-02 17:12:36',1),
	(1085,7,'GARCIA ROSELL ZULOAGA GUSTAVO ADOLFO','JEFE PLANEAMIENTO FINANCIERO UN ALIMENTO',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCFI36','ANALISTA SENIOR PLANEAMIENTO FINANCIERO','','ANALISTA SENIOR PLANEAMIENTO FINANCIERO','','ANALISTA SENIOR PLANEAMIENTO FINANCIERO','NO',35,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,1,0,0,0,1,1,1,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:36','admin','2017-04-02 17:12:36',1),
	(1086,7,'GARCIA ROSELL ZULOAGA GUSTAVO ADOLFO','JEFE PLANEAMIENTO FINANCIERO UN ALIMENTO',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCFI37','ANALISTA PLANEAMIENTO FINANCIERO','','ANALISTA PLANEAMIENTO FINANCIERO','','ANALISTA PLANEAMIENTO FINANCIERO','NO',35,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,1,0,0,0,1,1,1,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:36','admin','2017-04-02 17:12:36',1),
	(1087,7,'GARCIA ROSELL ZULOAGA GUSTAVO ADOLFO','JEFE PLANEAMIENTO FINANCIERO UN ALIMENTO',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCFI38','SECRETARIA','','SECRETARIA','','SECRETARIA','NO',35,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,1,0,0,0,1,1,1,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:36','admin','2017-04-02 17:12:36',1),
	(1088,7,'','',NULL,NULL,'Verde',NULL,NULL,0,2,0,0,0,0,'08DCLR01','DIRECTOR CORP LEGAL REL INSTITUCIONAL','0','DIRECTOR CORP LEGAL REL INSTITUCIONAL','0','DIRECTOR CORP LEGAL REL INSTITUCIONAL','NO',39,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,2,0,0,0,0,0,2,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:36','admin','2017-04-02 17:12:36',1),
	(1089,7,'Luis Guzman','SUB GERENTE LEGAL Y RR.II.',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCLR02','ASISTENTE ADMINISTRATIVO LEGAL','0','ASISTENTE ADMINISTRATIVO LEGAL','0','ASISTENTE ADMINISTRATIVO LEGAL','NO',40,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,0,0,0,0,1,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:36','admin','2017-04-02 17:12:36',1),
	(1090,7,'Luis Guzman','SUB GERENTE LEGAL Y RR.II.',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCLR03','SUB GERENTE LEGAL','0','SUB GERENTE LEGAL','0','SUB GERENTE LEGAL','NO',40,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,0,0,0,0,1,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:36','admin','2017-04-02 17:12:36',1),
	(1091,7,'Luis Guzman','SUB GERENTE LEGAL Y RR.II.',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCLR04','ASESOR LEGAL','0','ASESOR LEGAL','0','ASESOR LEGAL','NO',40,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,0,0,0,0,1,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:36','admin','2017-04-02 17:12:36',1),
	(1092,7,'Luis Guzman','SUB GERENTE LEGAL Y RR.II.',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCLR05','ASISTENTE DIGITALIZACION LEGAL','0','ASISTENTE DIGITALIZACION LEGAL','0','ASISTENTE DIGITALIZACION LEGAL','NO',40,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,3,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,2,0,0,0,0,1,2,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:36','admin','2017-04-02 17:12:36',1),
	(1093,7,'Luis Guzman','SUB GERENTE LEGAL Y RR.II.',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCLR06','ASISTENTE LEGAL','0','ASISTENTE LEGAL','0','ASISTENTE LEGAL','NO',40,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,0,0,0,0,1,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:36','admin','2017-04-02 17:12:36',1),
	(1094,7,'Luis Guzman','SUB GERENTE LEGAL Y RR.II.',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCLR07','SECRETARIA','0','SECRETARIA','0','SECRETARIA','NO',40,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,0,0,0,0,1,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:36','admin','2017-04-02 17:12:36',1),
	(1095,7,'CORNEJO URIARTE ALDO LUIGI - 998-742-399','JEFE LEGAL SUBSIDIARIAS',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCLR08','JEFE LEGAL SUBSIDIARIAS','0','JEFE LEGAL SUBSIDIARIAS','0','JEFE LEGAL SUBSIDIARIAS','NO',39,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,1,0,0,0,0,0,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:36','admin','2017-04-02 17:12:36',1),
	(1096,7,'CORNEJO URIARTE ALDO LUIGI - 998-742-399','JEFE LEGAL SUBSIDIARIAS',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCLR09','OFICIAL DE CUMPLIMIENTO','0','OFICIAL DE CUMPLIMIENTO','0','OFICIAL DE CUMPLIMIENTO','NO',39,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,0,0,0,0,1,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:36','admin','2017-04-02 17:12:36',1),
	(1097,7,'ALEJANDRO ROJAS','GERENTE RR.HH. - DEPRODECA',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCRH01','DIRECTOR CORPORATIVO DE RECURSOS HUMANOS','0','DIRECTOR CORPORATIVO DE RECURSOS HUMANOS','0','DIRECTOR CORPORATIVO DE RECURSOS HUMANOS','NO',42,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,1,0,0,0,0,0,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:36','admin','2017-04-02 17:12:36',1),
	(1098,7,'ALEJANDRO ROJAS','GERENTE RR.HH. - DEPRODECA',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCRH02','ASESOR DE RELACIONES LABORALES','0','ASESOR DE RELACIONES LABORALES','0','ASESOR DE RELACIONES LABORALES','NO',42,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,1,0,0,0,0,0,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:36','admin','2017-04-02 17:12:36',1),
	(1099,7,'ALEJANDRO ROJAS','GERENTE RR.HH. - DEPRODECA',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCRH03','SECRETARIA DIRECCION RECURSOS HUMANOS','0','SECRETARIA DIRECCION RECURSOS HUMANOS','0','SECRETARIA DIRECCION RECURSOS HUMANOS','NO',42,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,1,0,0,0,1,1,1,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:36','admin','2017-04-02 17:12:36',1),
	(1100,7,'Patricia Alcozer','GERENTE COMP Y EFECT ORG',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCRH04','GERENTE DE COMPENSACIONES Y EFECTIV ORG','0','GERENTE DE COMPENSACIONES Y EFECTIV ORG','0','GERENTE DE COMPENSACIONES Y EFECTIV ORG','NO',42,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,1,0,0,0,1,1,1,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:36','admin','2017-04-02 17:12:36',1),
	(1101,7,'Patricia Alcozer','GERENTE COMP Y EFECT ORG',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCRH05','JEFE PROCESOS DE RRHH Y ADM DE PERSONAL','0','JEFE PROCESOS DE RRHH Y ADM DE PERSONAL','0','JEFE PROCESOS DE RRHH Y ADM DE PERSONAL','NO',42,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,1,0,0,0,1,1,1,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:36','admin','2017-04-02 17:12:36',1),
	(1102,7,'Patricia Alcozer','GERENTE COMP Y EFECT ORG',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCRH06','ADM DE SERV SALUD Y CONTABILIZACIONES','0','ADM DE SERV SALUD Y CONTABILIZACIONES','0','ADM DE SERV SALUD Y CONTABILIZACIONES','NO',42,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,1,0,0,0,1,1,1,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:36','admin','2017-04-02 17:12:36',1),
	(1103,7,'Patricia Alcozer','GERENTE COMP Y EFECT ORG',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCRH07','ANALISTA DE REMUNERACIONES','0','ANALISTA DE REMUNERACIONES','0','ANALISTA DE REMUNERACIONES','NO',42,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,1,0,0,0,1,1,1,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:36','admin','2017-04-02 17:12:36',1),
	(1104,7,'Patricia Alcozer','GERENTE COMP Y EFECT ORG',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCRH08','ASISTENTE DE REMUNERACIONES','0','ASISTENTE DE REMUNERACIONES','0','ASISTENTE DE REMUNERACIONES','NO',42,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,1,0,0,0,1,1,1,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:36','admin','2017-04-02 17:12:36',1),
	(1105,7,'Patricia Alcozer','GERENTE COMP Y EFECT ORG',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCRH09','SUPERVISOR DE PERSONAL','0','SUPERVISOR DE PERSONAL','0','SUPERVISOR DE PERSONAL','NO',42,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,1,0,0,0,1,1,1,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:36','admin','2017-04-02 17:12:36',1),
	(1106,7,'Patricia Alcozer','GERENTE COMP Y EFECT ORG',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCRH10','ADMINISTRADOR PAGOS','0','ADMINISTRADOR PAGOS','0','ADMINISTRADOR PAGOS','NO',42,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,0,0,0,0,1,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:37','admin','2017-04-02 17:12:37',1),
	(1107,7,'Patricia Alcozer','GERENTE COMP Y EFECT ORG',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCRH11','ASISTENTE DE RECURSOS HUMANOS','0','ASISTENTE DE RECURSOS HUMANOS','0','ASISTENTE DE RECURSOS HUMANOS','NO',42,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,1,0,0,0,1,1,1,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:37','admin','2017-04-02 17:12:37',1),
	(1108,7,'Patricia Alcozer','GERENTE COMP Y EFECT ORG',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCRH12','ESPECIALISTA EFECTIVIDAD ORGANIZACIONAL','0','ESPECIALISTA EFECTIVIDAD ORGANIZACIONAL','0','ESPECIALISTA EFECTIVIDAD ORGANIZACIONAL','NO',42,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,1,0,0,0,1,1,1,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:37','admin','2017-04-02 17:12:37',1),
	(1109,7,'Patricia Alcozer','GERENTE COMP Y EFECT ORG',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCRH13','ASISTENTE PROCESOS RRHH','0','ASISTENTE PROCESOS RRHH','0','ASISTENTE PROCESOS RRHH','NO',42,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,1,0,0,0,1,1,1,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:37','admin','2017-04-02 17:12:37',1),
	(1110,7,'Patricia Alcozer','GERENTE COMP Y EFECT ORG',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCRH14','ESPECIALISTA DE COMPENSACIONES','0','ESPECIALISTA DE COMPENSACIONES','0','ESPECIALISTA DE COMPENSACIONES','NO',42,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,1,0,0,0,1,1,1,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:37','admin','2017-04-02 17:12:37',1),
	(1111,7,'Patricia Alcozer','GERENTE COMP Y EFECT ORG',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCRH15','ANALISTA DE COMPENSACIONES','0','ANALISTA DE COMPENSACIONES','0','ANALISTA DE COMPENSACIONES','NO',42,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,1,0,0,0,1,1,1,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:37','admin','2017-04-02 17:12:37',1),
	(1112,7,'Patricia Alcozer','GERENTE COMP Y EFECT ORG',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCRH16','ANALISTA DE RECURSOS HUMANOS','0','ANALISTA DE RECURSOS HUMANOS','0','ANALISTA DE RECURSOS HUMANOS','NO',42,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,1,0,0,0,1,1,1,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:37','admin','2017-04-02 17:12:37',1),
	(1113,7,'Hector Montes','JEFE ADM. Y SS.GG.',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCRH17','AUXILIAR','0','AUXILIAR','0','AUXILIAR','NO',42,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,1,0,0,0,0,0,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:37','admin','2017-04-02 17:12:37',1),
	(1114,7,'Hector Montes','JEFE ADM. Y SS.GG.',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCRH18','AUXILIAR ADMINISTRATIVO','0','AUXILIAR ADMINISTRATIVO','0','AUXILIAR ADMINISTRATIVO','NO',42,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,2,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,1,1,0,0,1,1,1,1,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:37','admin','2017-04-02 17:12:37',1),
	(1115,7,'Hector Montes','JEFE ADM. Y SS.GG.',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCRH19','AUXILIAR SERVICIOS GENERALES','0','AUXILIAR SERVICIOS GENERALES','0','AUXILIAR SERVICIOS GENERALES','NO',42,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,1,0,0,0,1,1,1,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:37','admin','2017-04-02 17:12:37',1),
	(1116,7,'Hector Montes','JEFE ADM. Y SS.GG.',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCRH20','COORDINADOR SERVICIOS TELECOMUNICACIONES Y COPIADO','0','COORDINADOR SERVICIOS TELECOMUNICACIONES Y COPIADO','0','COORDINADOR SERVICIOS TELECOMUNICACIONES Y COPIADO','NO',42,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,2,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,1,1,0,0,1,1,1,1,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:37','admin','2017-04-02 17:12:37',1),
	(1117,7,'Hector Montes','JEFE ADM. Y SS.GG.',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCRH21','JEFE ADM. Y SS.GG.','0','JEFE ADM. Y SS.GG.','0','JEFE ADM. y SS.GG.','NO',42,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,1,0,0,0,1,1,1,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:37','admin','2017-04-02 17:12:37',1),
	(1118,7,'Hector Montes','JEFE ADM. Y SS.GG.',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,1,1,'08DCRH22','MENSAJERO','0','MENSAJERO','0','MENSAJERO','NO',42,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,0,1,0,0,1,1,0,1,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:37','admin','2017-04-02 17:12:37',1),
	(1119,7,'BOGGIANO DE LAS CASAS LUCIANA - 957-672-044','GERENTE GESTION DEL TALENTO',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCRH23','GERENTE GESTION DEL TALENTO','0','GERENTE GESTION DEL TALENTO','0','GERENTE GESTION DEL TALENTO','NO',43,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,1,0,0,0,0,0,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:37','admin','2017-04-02 17:12:37',1),
	(1120,7,'ISRAEL FERNANDEZ BERMUDEZ - 966-023-104','JEFE DE COMUNICACION',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCRH24','JEFE DE COMUNICACION','0','JEFE DE COMUNICACION','0','JEFE DE COMUNICACION','NO',42,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,1,0,0,0,0,0,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:37','admin','2017-04-02 17:12:37',1),
	(1121,7,'BOGGIANO DE LAS CASAS LUCIANA','GERENTE GESTION DEL TALENTO',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCRH25','JEFE DE SELECCION Y RECLUTAMIENTO','0','JEFE DE SELECCION Y RECLUTAMIENTO','0','JEFE DE SELECCION Y RECLUTAMIENTO','NO',43,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,1,0,0,0,0,0,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:37','admin','2017-04-02 17:12:37',1),
	(1122,7,'BOGGIANO DE LAS CASAS LUCIANA','GERENTE GESTION DEL TALENTO',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCRH26','ANALISTA DE SELECCION','0','ANALISTA DE SELECCION','0','ANALISTA DE SELECCION','NO',43,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,1,0,0,0,0,0,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:37','admin','2017-04-02 17:12:37',1),
	(1123,7,'BOGGIANO DE LAS CASAS LUCIANA','GERENTE GESTION DEL TALENTO',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCRH27','COORDINADOR DE TALENTO','0','COORDINADOR DE TALENTO','0','COORDINADOR DE TALENTO','NO',43,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,1,0,0,0,0,0,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:37','admin','2017-04-02 17:12:37',1),
	(1124,7,'ALEJANDRO ROJAS','GERENTE RR.HH. - DEPRODECA',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCRH28','ASISTENTE ADMINISTRATIVO','0','ASISTENTE ADMINISTRATIVO','0','ASISTENTE ADMINISTRATIVO','NO',42,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,0,0,0,0,1,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:37','admin','2017-04-02 17:12:37',1),
	(1125,7,'ALEJANDRO ROJAS','GERENTE RR.HH. - DEPRODECA',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCRH29','COORDINADOR DE RECURSOS HUMANOS','0','COORDINADOR DE RECURSOS HUMANOS','0','COORDINADOR DE RECURSOS HUMANOS','NO',42,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,0,0,0,0,1,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:37','admin','2017-04-02 17:12:37',1),
	(1126,7,'ALEJANDRO ROJAS','GERENTE RR.HH. - DEPRODECA',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCRH30','SECRETARIA','0','SECRETARIA','0','SECRETARIA','NO',42,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,0,0,0,0,1,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:37','admin','2017-04-02 17:12:37',1),
	(1127,7,'ALIAGA SANTANA VICTOR RAFAEL - 999-009-383','SUPERVISOR SEGUR INT Y COMUNICACIONES',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DCRH31','SUPERVISOR SEGUR INT Y COMUNICACIONES','0','SUPERVISOR SEGUR INT Y COMUNICACIONES','0','SUPERVISOR SEGUR INT Y COMUNICACIONES','NO',42,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,1,0,0,0,0,0,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:37','admin','2017-04-02 17:12:37',1),
	(1128,7,'LI SING RENZO 998-706-965','GERENTE DE FUSIONES Y ADQUISICIONES',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DIES01','DIRECTOR CORP ESTRAT Y DESARROLLO DE NEG','0','DIRECTOR CORP ESTRAT Y DESARROLLO DE NEG','0','DIRECTOR CORP ESTRAT Y DESARROLLO DE NEG','NO',47,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,1,0,0,0,0,0,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:37','admin','2017-04-02 17:12:37',1),
	(1129,7,'LI SING RENZO 998-706-965','GERENTE DE FUSIONES Y ADQUISICIONES',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DIES02','DIRECTOR DE FUSIONES Y ADQUISICIONES','0','DIRECTOR DE FUSIONES Y ADQUISICIONES','0','DIRECTOR DE FUSIONES Y ADQUISICIONES','NO',47,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,1,0,0,0,0,0,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:37','admin','2017-04-02 17:12:37',1),
	(1130,7,'LI SING RENZO 998-706-965','GERENTE DE FUSIONES Y ADQUISICIONES',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DIES03','GERENTE DE FUSIONES Y ADQUISICIONES','0','GERENTE DE FUSIONES Y ADQUISICIONES','0','GERENTE DE FUSIONES Y ADQUISICIONES','NO',47,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,1,0,0,0,0,0,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:37','admin','2017-04-02 17:12:37',1),
	(1131,7,'LI SING RENZO 998-706-965','GERENTE DE FUSIONES Y ADQUISICIONES',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DIES04','ANALISTA SENIOR M&A','0','ANALISTA SENIOR M&A','0','ANALISTA SENIOR M&A','NO',47,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,1,0,0,0,0,0,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:37','admin','2017-04-02 17:12:37',1),
	(1132,7,'LI SING RENZO 998-706-965','GERENTE DE FUSIONES Y ADQUISICIONES',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DIES05','SECRETARIA','0','SECRETARIA','0','SECRETARIA','NO',47,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,1,0,0,0,1,1,1,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:37','admin','2017-04-02 17:12:37',1),
	(1133,7,'PETROZZI HELASVUO ARMANDO IVAN','GERENTE CONTROL DE GESTION',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DOTR01','DIRECTOR','0','DIRECTOR','0','DIRECTOR','NO',48,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,1,0,0,0,0,0,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:37','admin','2017-04-02 17:12:37',1),
	(1134,7,'PETROZZI HELASVUO ARMANDO IVAN','GERENTE CONTROL DE GESTION',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DOTR02','GERENCIA CONTROL DE GESTION','0','GERENCIA CONTROL DE GESTION','0','GERENCIA CONTROL DE GESTION','GERENTE DE INTEGRACIÓN',48,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,1,0,0,0,0,0,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:37','admin','2017-04-02 17:12:37',1),
	(1135,7,'PETROZZI HELASVUO ARMANDO IVAN','GERENTE CONTROL DE GESTION',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DOTR03','LIDER DE PROYECTO II','0','LIDER DE PROYECTO II','0','LIDER DE PROYECTO II','NO',48,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,1,0,0,0,0,0,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:37','admin','2017-04-02 17:12:37',1),
	(1136,7,'PETROZZI HELASVUO ARMANDO IVAN','GERENTE CONTROL DE GESTION',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DOTR04','LIDER III OFT','0','LIDER III OFT','0','LIDER III OFT','NO',48,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,0,0,0,0,1,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:37','admin','2017-04-02 17:12:37',1),
	(1137,7,'PETROZZI HELASVUO ARMANDO IVAN','GERENTE CONTROL DE GESTION',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DOTR05','ASESOR DE PRESIDENCIA','0','ASESOR DE PRESIDENCIA','0','ASESOR DE PRESIDENCIA','NO',48,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,1,0,0,0,0,0,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:37','admin','2017-04-02 17:12:37',1),
	(1138,7,'PETROZZI HELASVUO ARMANDO IVAN','GERENTE CONTROL DE GESTION',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DOTR06','ANALISTA II OFT','0','ANALISTA II OFT','0','ANALISTA II OFT','NO',48,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,1,0,0,0,0,0,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:37','admin','2017-04-02 17:12:37',1),
	(1139,7,'PETROZZI HELASVUO ARMANDO IVAN','GERENTE CONTROL DE GESTION',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DOTR07','ANALISTA III OFT','0','ANALISTA III OFT','0','ANALISTA III OFT','NO',48,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,1,0,0,0,0,0,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:37','admin','2017-04-02 17:12:37',1),
	(1140,7,'PETROZZI HELASVUO ARMANDO IVAN','GERENTE CONTROL DE GESTION',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08DOTR08','LIDER II OFT','0','LIDER II OFT','0','LIDER II OFT','NO',48,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,1,0,0,0,0,0,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:37','admin','2017-04-02 17:12:37',1),
	(1141,7,'MARTINEZ BRICEÑO JAVIER FERNAND - 999-774-507','GERENTE CORPORATIVO DE EXPORTACIONES',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08GCEX01','GERENTE CORPORATIVO DE EXPORTACIONES','0','GERENTE CORPORATIVO DE EXPORTACIONES','0','GERENTE CORPORATIVO DE EXPORTACIONES','NO',49,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,1,0,0,0,0,0,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:37','admin','2017-04-02 17:12:37',1),
	(1142,7,'CHRISTOPHER SCHWARZ - 920-224-883','COORDINADOR DE PROYECTOS',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08GCOG01','COORDINADOR DE PROYECTOS','0','COORDINADOR DE PROYECTOS','0','COORDINADOR DE PROYECTOS','NO',42,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,0,0,0,0,1,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:38','admin','2017-04-02 17:12:38',1),
	(1143,7,'Arturo Zereceda Ortiz de Zevallos','GERENTE DE SEGUROS',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08GSEG01','GERENTE DE SEGUROS','0','GERENTE DE SEGUROS','0','GERENTE DE SEGUROS','NO',51,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,1,0,0,0,0,0,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:38','admin','2017-04-02 17:12:38',1),
	(1144,7,'Arturo Zereceda Ortiz de Zevallos','GERENTE DE SEGUROS',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08GSEG02','COORDINADOR DE SEGUROS','0','COORDINADOR DE SEGUROS','0','COORDINADOR DE SEGUROS','NO',51,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,0,0,0,0,1,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:38','admin','2017-04-02 17:12:38',1),
	(1145,7,'Arturo Zereceda Ortiz de Zevallos','GERENTE DE SEGUROS',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08GSEG03','AUXILIAR ADMINISTRATIVO','0','AUXILIAR ADMINISTRATIVO','0','AUXILIAR ADMINISTRATIVO','NO',51,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,0,0,0,0,1,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:38','admin','2017-04-02 17:12:38',1),
	(1146,7,'GUANILO GONZALES EDUARDO ADALBERTO','Grente de Planeamiento y control de Proyectos',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08PCPR01','GERENTE PLANEAMIENTO Y CONTROL PROYECTOS','','','','GERENTE PLANEAMIENTO Y CONTROL PROYECTOS','NO',52,3,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,1,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,2,1,1,0,0,0,2,1,1,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:38','admin','2017-04-02 17:12:38',1),
	(1147,7,'GUANILO GONZALES EDUARDO ADALBERTO','Grente de Planeamiento y control de Proyectos',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08PCPR02','JEFE DE PROYECTOS','','','','JEFE DE PROYECTOS','NO',52,3,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,2,1,1,1,0,0,2,1,1,1,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:38','admin','2017-04-02 17:12:38',1),
	(1148,7,'GUANILO GONZALES EDUARDO ADALBERTO','Grente de Planeamiento y control de Proyectos',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08PCPR03','LIDER SENIOR PMO','','','','LIDER SENIOR PMO','NO',52,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,1,1,0,0,1,1,1,1,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:38','admin','2017-04-02 17:12:38',1),
	(1149,7,'GUANILO GONZALES EDUARDO ADALBERTO','Grente de Planeamiento y control de Proyectos',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08PCPR04','LIDER CONTROL PRESUPUESTAL Y MASTER PMO','','','','LIDER CONTROL PRESUPUESTAL Y MASTER PMO','NO',52,3,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,2,1,1,1,0,0,2,1,1,1,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:38','admin','2017-04-02 17:12:38',1),
	(1150,7,'ALEJANDRO ROJAS','GERENTE RR.HH. - DEPRODECA',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08PRES01','PRESIDENTE EJECUTIVO','0','PRESIDENTE EJECUTIVO','0','PRESIDENTE EJECUTIVO','NO',53,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,1,1,0,0,1,1,1,1,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:38','admin','2017-04-02 17:12:38',1),
	(1151,7,'ALEJANDRO ROJAS','GERENTE RR.HH. - DEPRODECA',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08PRES02','VICEPRESIDENTE EJECUTIVO','0','VICEPRESIDENTE EJECUTIVO','0','VICEPRESIDENTE EJECUTIVO','NO',53,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,1,1,0,0,1,1,1,1,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:38','admin','2017-04-02 17:12:38',1),
	(1152,7,'ALEJANDRO ROJAS','GERENTE RR.HH. - DEPRODECA',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08PRES03','ASISTENTE ADMINISTRATIVA DE PRESIDENCIA','0','ASISTENTE ADMINISTRATIVA DE PRESIDENCIA','0','ASISTENTE ADMINISTRATIVA DE PRESIDENCIA','NO',53,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,1,0,0,0,1,1,1,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:38','admin','2017-04-02 17:12:38',1),
	(1153,7,'EDGARDO DIONISIO ','JEFE SISTEMAS ',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08SIST01','ARQUITECTO DE APLICACIONES ADM Y RRHH','0','ARQUITECTO DE APLICACIONES ADM Y RRHH','0','ARQUITECTO DE APLICACIONES ADM Y RRHH','NO',54,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,0,0,0,0,1,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:38','admin','2017-04-02 17:12:38',1),
	(1154,7,'EDGARDO DIONISIO ','JEFE SISTEMAS ',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08SIST02','ARQUITECTO DE APLICACIONES NO SAP','0','ARQUITECTO DE APLICACIONES NO SAP','0','ARQUITECTO DE APLICACIONES NO SAP','NO',54,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,0,0,0,0,1,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:38','admin','2017-04-02 17:12:38',1),
	(1155,7,'EDGARDO DIONISIO ','JEFE SISTEMAS ',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08SIST03','ARQUITECTO DE APLICACIONES SAP','0','ARQUITECTO DE APLICACIONES SAP','0','ARQUITECTO DE APLICACIONES SAP','NO',54,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,0,0,0,0,1,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:38','admin','2017-04-02 17:12:38',1),
	(1156,7,'EDGARDO DIONISIO ','JEFE SISTEMAS ',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08SIST04','ARQUITECTO DE INTELIGENCIA DE NEGOCIOS','0','ARQUITECTO DE INTELIGENCIA DE NEGOCIOS','0','ARQUITECTO DE INTELIGENCIA DE NEGOCIOS','NO',54,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,0,0,0,0,1,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:38','admin','2017-04-02 17:12:38',1),
	(1157,7,'EDGARDO DIONISIO ','JEFE SISTEMAS ',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08SIST05','ANALISTA DE SISTEMAS III','0','ANALISTA DE SISTEMAS III','0','ANALISTA DE SISTEMAS III','NO',54,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,0,0,0,0,1,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:38','admin','2017-04-02 17:12:38',1),
	(1158,7,'GUSTAVO PAZOS - 999-009-976','JEFE DE INFRAESTRUCTURA CENTRAL',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08SIST06','ADMINISTRADOR DE BASIS','0','ADMINISTRADOR DE BASIS','0','ADMINISTRADOR DE BASIS','NO',54,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,1,0,0,0,0,0,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:38','admin','2017-04-02 17:12:38',1),
	(1159,7,'GUSTAVO PAZOS - 999-009-976','JEFE DE INFRAESTRUCTURA CENTRAL',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08SIST07','ADMINISTRADOR DE PLATAFORMA','0','ADMINISTRADOR DE PLATAFORMA','0','ADMINISTRADOR DE PLATAFORMA','NO',54,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,1,0,0,0,0,0,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:38','admin','2017-04-02 17:12:38',1),
	(1160,7,'GUSTAVO PAZOS - 999-009-976','JEFE DE INFRAESTRUCTURA CENTRAL',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08SIST08','ADMINISTRADOR DE TELECOMUNICACION','0','ADMINISTRADOR DE TELECOMUNICACION','0','ADMINISTRADOR DE TELECOMUNICACION','NO',54,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,1,0,0,0,0,0,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:38','admin','2017-04-02 17:12:38',1),
	(1161,7,'PEREA CORIMAYA DUILIO - 998-342-110','LIDER DE PORTAFOLIO OPERACIONES',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08SIST09','LIDER DE PORTAFOLIO OPERACIONES','0','LIDER DE PORTAFOLIO OPERACIONES','0','LIDER DE PORTAFOLIO OPERACIONES','NO',54,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,1,0,0,0,0,0,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:38','admin','2017-04-02 17:12:38',1),
	(1162,7,'PEREA CORIMAYA DUILIO - 998-342-110','LIDER DE PORTAFOLIO OPERACIONES',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08SIST10','LIDER DE PROYECTO','0','LIDER DE PROYECTO','0','LIDER DE PROYECTO','NO',54,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,1,0,0,0,0,0,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:38','admin','2017-04-02 17:12:38',1),
	(1163,7,'ANTUNES DE MAYOLO ALEJANDRO','GERENTE DE SISTEMAS',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08SIST11','JEFE DE APLICACIONES','','JEFE DE APLICACIONES','','JEFE DE APLICACIONES','NO',54,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,1,0,0,0,1,1,1,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:38','admin','2017-04-02 17:12:38',1),
	(1164,7,'ANTUNES DE MAYOLO ALEJANDRO','GERENTE DE SISTEMAS',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08SIST12','JEFE DE OFICINA DE GESTION DE PROYECTOS','','JEFE DE OFICINA DE GESTION DE PROYECTOS','','JEFE DE OFICINA DE GESTION DE PROYECTOS','NO',54,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,2,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,1,1,0,0,1,1,1,1,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:38','admin','2017-04-02 17:12:38',1),
	(1165,7,'ANTUNES DE MAYOLO ALEJANDRO','GERENTE DE SISTEMAS',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08SIST13','ANALISTA DE ADMINISTRACION Y CONTROL','','ANALISTA DE ADMINISTRACION Y CONTROL','','ANALISTA DE ADMINISTRACION Y CONTROL','NO',54,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,1,1,0,0,1,1,1,1,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:38','admin','2017-04-02 17:12:38',1),
	(1166,7,'ANTUNES DE MAYOLO ALEJANDRO','GERENTE DE SISTEMAS',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08SIST14','JEFE DE INFRAESTRUCTURA CENTRAL','','JEFE DE INFRAESTRUCTURA CENTRAL','','JEFE DE INFRAESTRUCTURA CENTRAL','NO',54,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,1,1,0,0,0,0,1,1,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:38','admin','2017-04-02 17:12:38',1),
	(1167,7,'ANTUNES DE MAYOLO ALEJANDRO','GERENTE DE SISTEMAS',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08SIST15','JEFE DE INFRAESTRUCTURA DE USUARIO','','JEFE DE INFRAESTRUCTURA DE USUARIO','','JEFE DE INFRAESTRUCTURA DE USUARIO','NO',54,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,1,1,0,0,0,0,1,1,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:38','admin','2017-04-02 17:12:38',1),
	(1168,7,'ANTUNES DE MAYOLO ALEJANDRO','GERENTE DE SISTEMAS',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08SIST16','JEFE DE SISTEMAS','','JEFE DE SISTEMAS','','JEFE DE SISTEMAS','NO',54,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,1,0,0,0,1,1,1,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:38','admin','2017-04-02 17:12:38',1),
	(1169,7,'ANTUNES DE MAYOLO ALEJANDRO','GERENTE DE SISTEMAS',NULL,NULL,'Verde',NULL,NULL,2,2,1,1,0,0,'08SIST17','OFICIAL DE SEGURIDAD DE INFORMACION','','OFICIAL DE SEGURIDAD DE INFORMACION','','OFICIAL DE SEGURIDAD DE INFORMACION','NO',54,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,1,0,0,0,1,1,1,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:38','admin','2017-04-02 17:12:38',1),
	(1170,8,'PATRICIA RODRIGUEZ','JEFE DE LABORATORIO',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08CALI01','SUPERVISOR DE CALIDAD FISICO QUÍMICO','','SUPERVISOR DE CALIDAD (FISICOQUÍMICA)','','SUPERVISOR DE CALIDAD AN FISICO QUIM','',55,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:38','admin','2017-04-02 17:12:38',1),
	(1171,8,'PATRICIA RODRIGUEZ','JEFE DE LABORATORIO',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08CALI02','SUPERVISOR DE CALIDAD MICROBIOLOGIA','','SUPERVISOR DE CALIDAD (MICROBIOLOGÍA)','','SUPERVISOR DE CALIDAD MICROBIOLOGIA','',55,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:38','admin','2017-04-02 17:12:38',1),
	(1172,8,'PATRICIA RODRIGUEZ','JEFE DE LABORATORIO',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08CALI03','SUPERVISOR DE CALIDAD RECEP LECHE','','SUPERVISOR DE CALIDAD (RECEPCIÓN DE LECHE) ','','SUPERVISOR DE CALIDAD RECEP LECHE','',55,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:38','admin','2017-04-02 17:12:38',1),
	(1173,8,'PATRICIA RODRIGUEZ','JEFE DE LABORATORIO',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08CALI04','TECNICO ANALISTA','','TÉCNICO ANALISTA','','TECNICO ANALISTA','',55,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:38','admin','2017-04-02 17:12:38',1),
	(1174,8,'PATRICIA RODRIGUEZ','JEFE DE LABORATORIO',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08CALI05','OPERARIO','','OPERARIO','','OPERARIO','',55,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:38','admin','2017-04-02 17:12:38',1),
	(1175,8,'JOSE RAFAEL LEVANO SALVADOR ','JEFE CONTROL DE CALIDAD',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08CALI06','INSPECTOR CONTROL DE CALIDAD','','INSPECTOR CONTROL DE CALIDAD (PARA MATERIALES - MÁS CRITICO POR SEGURIDAD-, LINEA Y PRODUCTO TÉRMINADO)','','INSPECTOR CONTROL DE CALIDAD','',55,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:38','admin','2017-04-02 17:12:38',1),
	(1176,8,'JUAN JORGE MIGUEL PLANAS RIVAROLA ','SUPERINTENDENTE DE CALIDAD',NULL,NULL,'Amarillo',NULL,NULL,1,0,0,0,0,0,'08CALI07','JEFE CONTROL DE CALIDAD','','JEFE CONTROL DE CALIDAD','','JEFE CONTROL DE CALIDAD','',55,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,0,0,0,0,0,1,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:38','admin','2017-04-02 17:12:38',1),
	(1177,8,'JOSE RAFAEL LEVANO SALVADOR ','JEFE CONTROL DE CALIDAD',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08CALI08','SUPERVISOR DE CALIDAD (DERIVADOS LÁCTEOS) ','','SUPERVISOR DE CALIDAD (DERIVADOS LÁCTEOS) ','','SUPERVISOR DE CALIDAD','',55,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:39','admin','2017-04-02 17:12:39',1),
	(1178,8,'JOSE RAFAEL LEVANO SALVADOR ','JEFE CONTROL DE CALIDAD',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08CALI09','SUPERVISOR DE CALIDAD (CONDENSERÍA) ','','SUPERVISOR DE CALIDAD (CONDENSERÍA) ','','','',55,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:39','admin','2017-04-02 17:12:39',1),
	(1179,8,'JOSE RAFAEL LEVANO SALVADOR ','JEFE CONTROL DE CALIDAD',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08CALI10','SUPERVISOR DE CALIDAD (FÁBRICA DE ENVASES) ','','SUPERVISOR DE CALIDAD (FÁBRICA DE ENVASES) ','','SUPERVISOR DE CALIDAD','',55,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:39','admin','2017-04-02 17:12:39',1),
	(1180,8,'ROSA AMELIA ROJAS DE CABRERA ','JEFE SERVICIOS DE CALIDAD',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08CALI11','AUXILIAR DE CALIDAD (DEVOLUCIONES DE MERCADO) ','','AUXILIAR DE CALIDAD (DEVOLUCIONES DE MERCADO) ','','AUXILIAR DE CALIDAD','',55,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:39','admin','2017-04-02 17:12:39',1),
	(1181,8,'ROSA AMELIA ROJAS DE CABRERA ','JEFE SERVICIOS DE CALIDAD',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08CALI12','INSPECTOR DE CONTROL DE CALIDAD (ALMACENES Y PRODUCTOS DE TERCEROS) ','','INSPECTOR DE CONTROL DE CALIDAD (ALMACENES Y PRODUCTOS DE TERCEROS) ','','INSPECTOR CONTROL DE CALIDAD','',55,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:39','admin','2017-04-02 17:12:39',1),
	(1182,8,'ROSA AMELIA ROJAS DE CABRERA ','JEFE SERVICIOS DE CALIDAD',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08CALI13','INSPECTOR CONTROL DE CALIDAD (MATERIALES Y LÍNEA)','','INSPECTOR CONTROL DE CALIDAD (MATERIALES Y LÍNEA)','','INSPECTOR CONTROL DE CALIDAD','',55,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:39','admin','2017-04-02 17:12:39',1),
	(1183,8,'ROSA AMELIA ROJAS DE CABRERA ','JEFE SERVICIOS DE CALIDAD',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08CALI14','INSPECTOR CONTROL DE CALIDAD (MAQUILA)','','INSPECTOR CONTROL DE CALIDAD (MAQUILA)','','INSPECTOR CONTROL DE CALIDAD','',55,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:39','admin','2017-04-02 17:12:39',1),
	(1184,8,'JUAN JORGE MIGUEL PLANAS RIVAROLA ','SUPERINTENDENTE DE CALIDAD',NULL,NULL,'Amarillo',NULL,NULL,1,0,0,1,0,0,'08CALI15','JEFE DE SERVICIOS DE CALIDAD ','','JEFE DE SERVICIOS DE CALIDAD ','','JEFE DE SERVICIOS DE CALIDAD ','',55,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:39','admin','2017-04-02 17:12:39',1),
	(1185,8,'ROSA AMELIA ROJAS DE CABRERA ','JEFE SERVICIOS DE CALIDAD',NULL,NULL,'Amarillo',NULL,NULL,1,0,0,1,0,0,'08CALI16','SUPERVISOR DE CALIDAD (ATENCIÓN DE RECLAMOS) ','','SUPERVISOR DE CALIDAD (ATENCIÓN DE RECLAMOS) ','','SUPERVISOR DE CALIDAD RECLAMOS','',55,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:39','admin','2017-04-02 17:12:39',1),
	(1186,8,'ROSA AMELIA ROJAS DE CABRERA ','JEFE SERVICIOS DE CALIDAD',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08CALI17','SUPERVISOR DE CALIDAD (HIGIENE Y EVALUACIÓN SENSORIAL) ','','SUPERVISOR DE CALIDAD (HIGIENE Y EVALUACIÓN SENSORIAL) ','','SUPERVISOR DE CALIDAD HIG EVAL SENS','',55,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:39','admin','2017-04-02 17:12:39',1),
	(1187,8,'ASESOR DE CAMPO','KAREN BARRERA',NULL,NULL,'Verde',NULL,NULL,0,0,0,0,0,0,'08CAMP01','JEFE DE SERVICIOS AL GANADERO','','JEFE DE SERVICIOS AL GANADERO','','JEFE DE SERVICIOS AL GANADERO','',56,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:39','admin','2017-04-02 17:12:39',1),
	(1188,8,'ASESOR DE CAMPO','KAREN BARRERA',NULL,NULL,'Verde',NULL,NULL,0,0,0,0,0,0,'08CAMP02','ASESOR TECNICO DE CAMPO','','ASESOR TECNICO DE CAMPO','','ASESOR TECNICO DE CAMPO','',56,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:39','admin','2017-04-02 17:12:39',1),
	(1189,8,'GERENTE COMERCIAL EMP METALICOS UN ALIM','GIANCARLO ANDRES CHICHIZOLA ARTETA',NULL,NULL,'Amarillo',NULL,NULL,1,0,0,0,0,0,'08COME01','GERENTE COMERCIAL EMP METALICOS UN ALIM','','GERENTE COMERCIAL DE EMPAQUES METÁLICOS','','GERENTE COMERCIAL EMP METALICOS UN ALIM','',57,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:39','admin','2017-04-02 17:12:39',1),
	(1190,8,'GERENTE COMERCIAL EMP METALICOS UN ALIM','GIANCARLO ANDRES CHICHIZOLA ARTETA',NULL,NULL,'Amarillo',NULL,NULL,1,0,0,0,0,0,'08COME02','TECNICO DE SERVICIO AL CLIENTE','','TÉCNICO DE SERVICIO AL CLIENTE','','SUPERVISOR SERVICIO AL CLIENTE','',57,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:39','admin','2017-04-02 17:12:39',1),
	(1191,8,'Concha Valencia, Jose Antoni','Jefe de Produccion Condenseria',NULL,NULL,'Verde',NULL,NULL,1,0,0,0,0,0,'08COND01','ENCARGADO DE ALMACEN DE PRODUCTOS TERMINADOS','','ENCARGADO DE ALMACEN DE PRODUCTOS TERMINADOS','','Encargado de Almacen de Productos Terminados','',58,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:39','admin','2017-04-02 17:12:39',1),
	(1192,8,'Concha Valencia, Jose Antoni','Jefe de Produccion Condenseria',NULL,NULL,'Verde',NULL,NULL,1,0,0,1,0,0,'08COND02','JEFE DE PRODUCCION DE CONDENSERIA','','JEFE DE PRODUCCION DE CONDENSERIA','','Jefe de Produccion de Condenseria','',58,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:39','admin','2017-04-02 17:12:39',1),
	(1193,8,'Concha Valencia, Jose Antoni','Jefe de Produccion Condenseria',NULL,NULL,'Verde',NULL,NULL,0,0,0,0,0,0,'08COND03','MECANICO AJUSTADOR','','MECANICO AJUSTADOR','','Mecanico Ajustador','',58,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:39','admin','2017-04-02 17:12:39',1),
	(1194,8,'Concha Valencia, Jose Antoni','Jefe de Produccion Condenseria',NULL,NULL,'Verde',NULL,NULL,0,0,0,0,0,0,'08COND04','OPERADOR','','OPERADOR','','Operador','',58,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:39','admin','2017-04-02 17:12:39',1),
	(1195,8,'Concha Valencia, Jose Antoni','Jefe de Produccion Condenseria',NULL,NULL,'Verde',NULL,NULL,0,0,0,0,0,0,'08COND05','OPERARIO','','OPERARIO','','Operario','',58,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:39','admin','2017-04-02 17:12:39',1),
	(1196,8,'Concha Valencia, Jose Antoni','Jefe de Produccion Condenseria',NULL,NULL,'Verde',NULL,NULL,0,0,0,0,0,0,'08COND06','SUPERINTENDENTE DE CONDENSERIA','','SUPERINTENDENTE DE CONDENSERIA','','Superindente de Condenseria','',58,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:39','admin','2017-04-02 17:12:39',1),
	(1197,8,'Concha Valencia, Jose Antoni','Jefe de Produccion Condenseria',NULL,NULL,'Verde',NULL,NULL,0,0,0,0,0,0,'08COND07','SUPERVISOR DE PRODUCCION DE CONDENSERIA ','','SUPERVISOR DE PRODUCCION DE CONDENSERIA ','','Supervisor de produccion de condenseria ','',58,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:39','admin','2017-04-02 17:12:39',1),
	(1198,8,'Concha Valencia, Jose Antonio','Jefe de Produccion de Condenseria',NULL,NULL,'Verde',NULL,NULL,0,0,0,0,0,0,'08COND08','SUPERVISOR DE TURNO','','SUPERVISOR DE TURNO','','Supervisor de Turno','',58,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:39','admin','2017-04-02 17:12:39',1),
	(1199,8,'Concha Valencia, Jose Antonio','Jefe de Produccion de Condenseria',NULL,NULL,'Verde',NULL,NULL,0,0,0,0,0,0,'08COND09','TECNICO DE ELABORACION','','TECNICO DE ELABORACION','','Tecnico de Elaboracion','',58,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:39','admin','2017-04-02 17:12:39',1),
	(1200,8,'Concha Valencia, Jose Antonio','Jefe de Produccion de Condenseria',NULL,NULL,'Verde',NULL,NULL,0,0,0,0,0,0,'08COND10','TECNICO DE LABORATORIO','','TECNICO DE LABORATORIO','','Tecnico de Laboratorio','',58,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:39','admin','2017-04-02 17:12:39',1),
	(1201,8,'Alvines Quezada Marlon David','Supervisor de Laboratorio',NULL,NULL,'Verde',NULL,NULL,1,0,0,1,0,0,'08DRLC01','ASISTENTE DE PRODUCCION','','ASISTENTE DE PRODUCCION','','Asistente de Produccion','',59,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:39','admin','2017-04-02 17:12:39',1),
	(1202,8,'Alvines Quezada Marlon David','Supervisor de Laboratorio',NULL,NULL,'Verde',NULL,NULL,1,0,0,0,0,0,'08DRLC02','ENCARGADO DE ALMACEN','','ENCARGADO DE ALMACEN','','Encargado de Almacen','',59,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:39','admin','2017-04-02 17:12:39',1),
	(1203,8,'Alvines Quezada Marlon David','Supervisor de Laboratorio',NULL,NULL,'Verde',NULL,NULL,0,0,0,0,0,0,'08DRLC03','SUPERVISOR DE LABORATORIO','','SUPERVISOR DE LABORATORIO','','Supervisor de Laboratorio','',59,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:39','admin','2017-04-02 17:12:39',1),
	(1204,8,'Alvines Quezada Marlon David','Supervisor de Laboratorio',NULL,NULL,'Verde',NULL,NULL,0,0,0,0,0,0,'08DRLC04','SUPERVISOR DE PRODUCCION','','SUPERVISOR DE PRODUCCION','','Supervisor de Produccion','',59,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:39','admin','2017-04-02 17:12:39',1),
	(1205,8,'Alvines Quezada Marlon David','Supervisor de Laboratorio',NULL,NULL,'Verde',NULL,NULL,0,0,0,0,0,0,'08DRLC05','SUPERVISOR DE TURNO','','SUPERVISOR DE TURNO','','Supervisor de Turno','',59,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:39','admin','2017-04-02 17:12:39',1),
	(1206,8,'Alvines Quezada Marlon David','Supervisor de Laboratorio',NULL,NULL,'Verde',NULL,NULL,0,0,0,0,0,0,'08DRLC06','SUPERVISOR SENIOR','','SUPERVISOR SENIOR','','Supervisor Senior','',59,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:39','admin','2017-04-02 17:12:39',1),
	(1207,8,'Alvines Quezada Marlon David','Supervisor de Laboratorio',NULL,NULL,'Verde',NULL,NULL,0,0,0,0,0,0,'08DRLC07','JEFE DE PRODUCCION DE QUESO MANTEQUILLA Y REFRESCOS','','JEFE DE PRODUCCION DE QUESO MANTEQUILLA Y REFRESCOS','','Jefe de Produccion DL Otros','',59,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:39','admin','2017-04-02 17:12:39',1),
	(1208,8,'Alvines Quezada Marlon David','Supervisor de Laboratorio',NULL,NULL,'Verde',NULL,NULL,0,0,0,0,0,0,'08DRLC08','JEFE DE PRODUCCION UHT','','JEFE DE PRODUCCION UHT','','Jefe de Produccion UHT','',59,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:39','admin','2017-04-02 17:12:39',1),
	(1209,8,'Alvines Quezada Marlon David','Supervisor de Laboratorio',NULL,NULL,'Verde',NULL,NULL,0,0,0,0,0,0,'08DRLC09','JEFE DE PRODUCCION YOGURT  Y SOPLADO','','JEFE DE PRODUCCION YOGURT  Y SOPLADO','','Jefe de Produccion Yogurt ','',59,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:39','admin','2017-04-02 17:12:39',1),
	(1210,8,'Alvines Quezada Marlon David','Supervisor de Laboratorio',NULL,NULL,'Verde',NULL,NULL,0,0,0,0,0,0,'08DRLC10','OPERADOR','','OPERADOR','','Operador','',59,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:40','admin','2017-04-02 17:12:40',1),
	(1211,8,'Alvines Quezada Marlon David','Supervisor de Laboratorio',NULL,NULL,'Verde',NULL,NULL,0,0,0,0,0,0,'08DRLC11','OPERADOR SENIOR','','OPERADOR SENIOR','','Operador Senior','',59,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:40','admin','2017-04-02 17:12:40',1),
	(1212,8,'Alvines Quezada Marlon David','Supervisor de Laboratorio',NULL,NULL,'Verde',NULL,NULL,0,0,0,0,0,0,'08DRLC12','OPERARIO','','OPERARIO','','Operario','',59,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:40','admin','2017-04-02 17:12:40',1),
	(1213,8,'CARLOS SEGUNDO JARA SILVA','SUPERINTENDENTE DE FÁBRICA DE ENVASES',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08FABR01','ASISTENTE DE ALMACÉN ','','ASISTENTE DE ALMACÉN ','','ASISTENTE DE ALMACÉN ','',60,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:40','admin','2017-04-02 17:12:40',1),
	(1214,8,'CARLOS SEGUNDO JARA SILVA','SUPERINTENDENTE DE FÁBRICA DE ENVASES',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08FABR02','ENCARGADO DE ALMACEN','','ENCARGADO DE ALMACEN','','ENCARGADO DE ALMACEN','',60,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:40','admin','2017-04-02 17:12:40',1),
	(1215,8,'CARLOS SEGUNDO JARA SILVA','SUPERINTENDENTE DE FÁBRICA DE ENVASES',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08FABR03','JEFE DE PRODUCCIÓN DE FÁBRICA DE ENVASE','','JEFE DE PRODUCCIÓN DE FÁBRICA DE ENVASE','','JEFE DE PRODUCCION ENVASES','',60,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:40','admin','2017-04-02 17:12:40',1),
	(1216,8,'CARLOS SEGUNDO JARA SILVA','SUPERINTENDENTE DE FÁBRICA DE ENVASES',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08FABR04','MECÁNICO','','MECÁNICO','','MECÁNICO','',60,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:40','admin','2017-04-02 17:12:40',1),
	(1217,8,'CARLOS SEGUNDO JARA SILVA','SUPERINTENDENTE DE FÁBRICA DE ENVASES',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08FABR05','MECÁNICO DE MÁQUINAS HERRAMIENTAS','','MECÁNICO DE MÁQUINAS HERRAMIENTAS','','MECANICO DE MAQUINAS Y HERRAMIENTAS','',60,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:40','admin','2017-04-02 17:12:40',1),
	(1218,8,'CARLOS SEGUNDO JARA SILVA','SUPERINTENDENTE DE FÁBRICA DE ENVASES',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08FABR06','OPERADOR','','OPERADOR (BARNIZADORA DE LÁMINAS, CONFORMADORA/CERRADORA, CORTADORA, LINER, LITOGRAFIADO, PRENSA, SOLDADORA, PALETIZADO)','','OPERADOR','',60,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:40','admin','2017-04-02 17:12:40',1),
	(1219,8,'CARLOS SEGUNDO JARA SILVA','SUPERINTENDENTE DE FÁBRICA DE ENVASES',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08FABR07','OPERARIO ','','OPERARIO ','','OPERARIO ','',60,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:40','admin','2017-04-02 17:12:40',1),
	(1220,8,'CARLOS SEGUNDO JARA SILVA','SUPERINTENDENTE DE FÁBRICA DE ENVASES',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08FABR08','SUPERINTENDENTE DE PRODUCCION ENVASES','','SUPERINTENDENTE DE FÁBRICA DE ENVASES','','SUPERINTENDENTE DE PRODUCCION ENVASES','',60,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:40','admin','2017-04-02 17:12:40',1),
	(1221,8,'CARLOS SEGUNDO JARA SILVA','SUPERINTENDENTE DE FÁBRICA DE ENVASES',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08FABR09','SUPERVISOR DE TURNO','','SUPERVISOR DE TURNO (CABEZALES, CORTE Y BARNIZADO, ENVASES, I & D, PESCA Y AGROINDUSTRIA, SIG Y PROYECTOS) ','','SUPERVISOR DE TURNO','',60,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:40','admin','2017-04-02 17:12:40',1),
	(1222,8,'CARLOS SEGUNDO JARA SILVA','SUPERINTENDENTE DE FÁBRICA DE ENVASES',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08FABR10','SUPERVISOR SENIOR','','SUPERVISOR SENIOR (MATERIALES; MEJORAS, PERSONAL Y LITOGRAFÍA; PRODUCCIÓN Y MANTENIMIENTO)','','SUPERVISOR SENIOR','',60,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:40','admin','2017-04-02 17:12:40',1),
	(1223,8,'CARLOS SEGUNDO JARA SILVA','SUPERINTENDENTE DE FÁBRICA DE ENVASES',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08FABR11','TECNICO DE PRENSAS','','TECNICO DE PRENSAS','','TECNICO DE PRENSAS','',60,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:40','admin','2017-04-02 17:12:40',1),
	(1224,8,'CARLOS SEGUNDO JARA SILVA','SUPERINTENDENTE DE FÁBRICA DE ENVASES',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08FABR12','TECNICO DE SOLDADURA','','TECNICO DE SOLDADURA','','TECNICO DE SOLDADURA','',60,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:40','admin','2017-04-02 17:12:40',1),
	(1225,8,'CARLOS SEGUNDO JARA SILVA','SUPERINTENDENTE DE FÁBRICA DE ENVASES',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08FABR13','TECNICO LITOGRAFIADO','','TECNICO LITOGRAFIADO','','TECNICO LITOGRAFIADO','',60,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:40','admin','2017-04-02 17:12:40',1),
	(1226,8,'SUPERVISOR DE TURNO','HUGO BALLÓN',NULL,NULL,'Verde',NULL,NULL,2,1,1,1,4,4,'08GERE01','ASESOR TÉCNICO','','','','ASESOR TECNICO','',61,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,1,0,0,0,0,0,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:40','admin','2017-04-02 17:12:40',1),
	(1227,8,'Sotil  Ureta , Robert Emilio','Jefe de Ingeniria Industrial',NULL,NULL,'Verde',NULL,NULL,0,0,0,0,0,0,'08GRPR01','ANALISTA DE OPERACIONES','','ANALISTA DE OPERACIONES','','Analista de Operaciones','',62,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:40','admin','2017-04-02 17:12:40',1),
	(1228,8,'Sotil  Ureta , Robert Emilio','Jefe de Ingenieria Industrial ',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08GRPR02','ANALISTA DE PROCESO','','ANALISTA DE PROCESOS ','','Analista de Procesos','',63,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:40','admin','2017-04-02 17:12:40',1),
	(1229,8,'Sotil  Ureta , Robert Emilio','Jefe de Ingenieria Industrial ',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08GRPR03','ANALISTA DE PROCESO','','ANALISTA DE TIEMPOS Y METODOS','','Analista de Tiempos y Metodos','',63,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:40','admin','2017-04-02 17:12:40',1),
	(1230,8,'Sotil  Ureta , Robert Emilio','Jefe de Ingenieria Industrial ',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08GRPR04','COORDINADOR TPM','','CORDINADOR DE TPM','','Cordinador de TPM','',63,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:40','admin','2017-04-02 17:12:40',1),
	(1231,8,'Sotil  Ureta , Robert Emilio','Jefe de Ingenieria Industrial ',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08GRPR05','JEFE DE INGENIRIA INDUSTRIAL','','JEFE DE INGENIERIA INDUSTRIAL','','Jefe de Ingenieria Industrial','',63,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:40','admin','2017-04-02 17:12:40',1),
	(1232,8,'Sotil  Ureta , Robert Emilio','Jefe de Ingenieria Industrial ',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08GRPR06','SUPERVISOR DE ALMACEN','','SUPERVISOR DE ALMACEN','','Supervisor de Almacen','',63,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:40','admin','2017-04-02 17:12:40',1),
	(1233,8,'Sotil  Ureta , Robert Emilio','Jefe de Ingenieria Industrial ',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08GRPR07','SUPERVISOR  TPM','','SUPERVISOR  TPM','','Supervisor TPM','',63,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:40','admin','2017-04-02 17:12:40',1),
	(1234,8,'SUPERVISOR DE TURNO','HUGO BALLÓN',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08INVE01','OPERADOR','','OPERADOR','','OPERADOR','',64,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:41','admin','2017-04-02 17:12:41',1),
	(1235,8,'ALVARO ZUÑIGA','GERENTE CORPORATIVO DE LOGÍSTICA',NULL,NULL,'Amarillo',NULL,NULL,2,1,1,1,4,4,'08LOGI01','ASESOR NEGOCIO PESQUERO','','','','ASESOR NEGOCIO PESQUERO','',65,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,1,0,0,0,0,1,1,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:41','admin','2017-04-02 17:12:41',1),
	(1236,8,'DENNIS RAFAEL RODRIGUEZ VARGAS','JEFE DE LOGISTICA INTERNA',NULL,NULL,'Amarillo',NULL,NULL,1,0,0,1,0,0,'08LOGI02','ASISTENTE DE ALMACEN','','ASISTENTE ALMACÉN DE MATERIAS PRIMAS / ASISTENTE DE DESPACHOS','','ASISTENTE DE ALMACEN','',65,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:41','admin','2017-04-02 17:12:41',1),
	(1237,8,'DENNIS RAFAEL RODRIGUEZ VARGAS','JEFE DE LOGISTICA INTERNA',NULL,NULL,'Amarillo',NULL,NULL,1,0,0,1,0,0,'08LOGI03','ASISTENTE DE LOGISTICA','','ASISTENTE DE LOGÍSTICA','','ASISTENTE DE LOGISTICA','',65,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:41','admin','2017-04-02 17:12:41',1),
	(1238,8,'DENNIS RAFAEL RODRIGUEZ VARGAS','JEFE DE LOGISTICA INTERNA',NULL,NULL,'Amarillo',NULL,NULL,1,0,0,1,0,0,'08LOGI04','ASISTENTE RECEPCIÓN','','ASISTENTE DE RECEPCIÓN','','ASISTENTE DE RECEPCION ALMACENES','',65,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:41','admin','2017-04-02 17:12:41',1),
	(1239,8,'DENNIS RAFAEL RODRIGUEZ VARGAS','JEFE DE LOGISTICA INTERNA',NULL,NULL,'Amarillo',NULL,NULL,1,0,0,1,0,0,'08LOGI05','AUXILIAR DE ALMACEN','','AUXILIAR DE RECEPCIÓN / AUXILIAR DE ALMACÉN MATERIAS PRIMAS/AUXILIAR DE ALMACÉN DE DESPACHOS','','AUXILIAR DE ALMACEN','',65,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:41','admin','2017-04-02 17:12:41',1),
	(1240,8,'DENNIS RAFAEL RODRIGUEZ VARGAS','JEFE DE LOGISTICA INTERNA',NULL,NULL,'Amarillo',NULL,NULL,1,0,0,1,0,0,'08LOGI06','CAMARERO','','','','CAMARERO','',65,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:41','admin','2017-04-02 17:12:41',1),
	(1241,8,'ALVARO ZUÑIGA','GERENTE CORPORATIVO DE LOGÍSTICA',NULL,NULL,'Amarillo',NULL,NULL,1,0,0,1,0,0,'08LOGI07','JEFE DE LOGISTICA','','JEFE DE LOGISTICA INTERNA','','JEFE DE LOGISTICA','',65,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:41','admin','2017-04-02 17:12:41',1),
	(1242,8,'ALVARO ZUÑIGA','GERENTE CORPORATIVO DE LOGÍSTICA',NULL,NULL,'Amarillo',NULL,NULL,1,0,0,0,0,0,'08LOGI08','JEFE DE MAQUILAS','','','','JEFE DE MAQUILAS','',65,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:41','admin','2017-04-02 17:12:41',1),
	(1243,8,'DENNIS RAFAEL RODRIGUEZ VARGAS','JEFE DE LOGISTICA INTERNA',NULL,NULL,'Amarillo',NULL,NULL,1,0,0,0,0,0,'08LOGI09','OPERADOR','','OPERADOR','','OPERADOR','',65,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:41','admin','2017-04-02 17:12:41',1),
	(1244,8,'DENNIS RAFAEL RODRIGUEZ VARGAS','JEFE DE LOGISTICA INTERNA',NULL,NULL,'Amarillo',NULL,NULL,1,0,0,0,0,0,'08LOGI10','SUPERVISOR ALMACEN TECNICO','','SUPERVISOR DE ALMACÉN TÉCNICO','','SUPERVISOR ALMACEN TECNICO','',65,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:41','admin','2017-04-02 17:12:41',1),
	(1245,8,'DENNIS RAFAEL RODRIGUEZ VARGAS','JEFE DE LOGISTICA INTERNA',NULL,NULL,'Amarillo',NULL,NULL,1,0,0,0,0,0,'08LOGI11','SUPERVISOR DE ALMACEN DESPACHO','','SUPERVISOR DE DESPACHOS','','SUPERVISOR DE ALMACEN DESPACHO','',65,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:41','admin','2017-04-02 17:12:41',1),
	(1246,8,'DENNIS RAFAEL RODRIGUEZ VARGAS','JEFE DE LOGISTICA INTERNA',NULL,NULL,'Amarillo',NULL,NULL,1,0,0,0,0,0,'08LOGI12','SUPERVISOR DE ALMACEN RECEPCION','','SUPERVISOR DE RECEPCION','','SUPERVISOR DE ALMACEN RECEPCION','',65,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:41','admin','2017-04-02 17:12:41',1),
	(1247,8,'DENNIS RAFAEL RODRIGUEZ VARGAS','JEFE DE LOGISTICA INTERNA',NULL,NULL,'Amarillo',NULL,NULL,1,0,0,0,0,0,'08LOGI13','SUPERVISOR DE ACTIVOS (JABAS Y PALETAS)','','SUPERVISOR DE JABAS Y PALETAS','','SUPERVISOR DE JABAS Y PALETAS','',65,3,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,1,0,0,0,0,0,1,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:41','admin','2017-04-02 17:12:41',1),
	(1248,8,'DENNIS RAFAEL RODRIGUEZ VARGAS','JEFE DE LOGISTICA INTERNA',NULL,NULL,'Amarillo',NULL,NULL,1,0,0,0,0,0,'08LOGI14','SUPERVISOR DE VENTAS NO GIRO','','SUPERVISOR DE VENTAS NO GIRO','','SUPERVISOR DE VENTAS NO GIRO','',65,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:41','admin','2017-04-02 17:12:41',1),
	(1249,8,'DENNIS RAFAEL RODRIGUEZ VARGAS','JEFE DE LOGISTICA INTERNA',NULL,NULL,'Amarillo',NULL,NULL,1,0,0,0,0,0,'08LOGI15','SUPERVISOR MATERIAS PRIMAS','','SUPERVISOR DE MATERIAS PRIMAS','','SUPERVISOR MATERIAS PRIMAS','',65,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:41','admin','2017-04-02 17:12:41',1),
	(1250,8,'Moreno Muñoz Emilio Fernando','Superintendente de Mantenimiento',NULL,NULL,'Amarillo',NULL,NULL,1,0,0,1,0,0,'08MNTO01','ADMINISTRADOR DE ACTIVOS FIJOS','','ADMINISTRADOR DE ACTIVOS FIJOS','','Administrador de Activos Fijos','',66,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:41','admin','2017-04-02 17:12:41',1),
	(1251,8,'Moreno Muñoz Emilio Fernando','Superintendente de Mantenimiento',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08MNTO02','COORDINADOR ELECTRICO','','COORDINADOR ELECTRICO','','Coordinador Electrico','',66,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:41','admin','2017-04-02 17:12:41',1),
	(1252,8,'Moreno Muñoz Emilio Fernando','Superintendente de Mantenimiento',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08MNTO03','MECANICO PREDICTIVO','','MECANICO PREDICTIVO','','Mecanico Predictivo','',66,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:41','admin','2017-04-02 17:12:41',1),
	(1253,8,'Moreno Muñoz Emilio Fernando','Superintendente de Mantenimiento',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08MNTO04','PLANIFICADOR DE MANTENIMIENTO','','PLANIFICADOR DE MANTENIMIENTO','','Planificador de Mantenimiento','',66,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:41','admin','2017-04-02 17:12:41',1),
	(1254,8,'Moreno Muñoz Emilio Fernando','Superintendente de Mantenimiento',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08MNTO05','SUPERVISOR DE AUTOMATIZACION','','SUPERVISOR DE AUTOMATIZACION','','Supervisor de Automatizacion','',66,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:41','admin','2017-04-02 17:12:41',1),
	(1255,8,'Moreno Muñoz Emilio Fernando','Superintendente de Mantenimiento',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08MNTO06','SUPERVISOR DE MANTENIMIENTO VEHICULOS','','SUPERVISOR DE MANTENIMIENTO VEHICULOS','','Supervisor de Instrumentacion','',66,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:41','admin','2017-04-02 17:12:41',1),
	(1256,8,'Moreno Muñoz Emilio Fernando','Superintendente de Mantenimiento',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08MNTO07','SUPERVISOR DE MANTENIMIENTO','','SUPERVISOR DE MANTENIMIENTO MECANICO ','','Supervisor de Mantenimiento','',66,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:41','admin','2017-04-02 17:12:41',1),
	(1257,8,'Moreno Muñoz Emilio Fernando','Superintendente de Mantenimiento',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08MNTO08','SUPERVISOR DE MANTENIMIENTO VEHICULOS','','SUPERVISOR DE MANTENIMIENTO VEHICULOS','','Supervisor de Mantenimiento vehiculos','',66,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:41','admin','2017-04-02 17:12:41',1),
	(1258,8,'Moreno Muñoz Emilio Fernando','Superintendente de Mantenimiento',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08MNTO09','SUPERVISOR DE MANTENIMIENTO VEHICULOS','','SUPERVISOR DE MANTENIMIENTO VEHICULOS','','Supervisor de Tratamiento de Aguas','',66,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:41','admin','2017-04-02 17:12:41',1),
	(1259,8,'Moreno Muñoz Emilio Fernando','Superintendente de Mantenimiento',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08MNTO10','SUPERVISOR DE TURNO','','SUPERVISOR DE MAESTRANZA','','Supervisor de Turno','',66,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:41','admin','2017-04-02 17:12:41',1),
	(1260,8,'Moreno Muñoz Emilio Fernando','Superintendente de Mantenimiento',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08MNTO11','SUPERVISOR ELECTRICO ELECTRONICO','','SUPERVISOR ELECTRICO','','Supervisor Electronico','',66,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:41','admin','2017-04-02 17:12:41',1),
	(1261,8,'Moreno Muñoz Emilio Fernando','Superintendente de Mantenimiento',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08MNTO12','TECNICO DE AUTOMATIZACION','','TECNICO DE AUTOMATIZACION','','Tecnico de Automatizacion','',66,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:41','admin','2017-04-02 17:12:41',1),
	(1262,8,'Moreno Muñoz Emilio Fernando','Superintendente de Mantenimiento',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08MNTO13','TECNICO DE REFRIGERACION','','TECNICO DE REFRIGERACION','','Tecnico de Refrigeracion','',66,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:41','admin','2017-04-02 17:12:41',1),
	(1263,8,'Moreno Muñoz Emilio Fernando','Superintendente de Mantenimiento',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08MNTO14','TECNICO INSTRUMENTISTA','','TECNICO INSTRUMENTISTA','','Tecnico instrumentista','',66,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:41','admin','2017-04-02 17:12:41',1),
	(1264,8,'Moreno Muñoz Emilio Fernando','Superintendente de Mantenimiento',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08MNTO15','JEFE DE MANTENIMIENTO','','JEFE DE DERIVADOS LACTEOS, JEFE DE CONDENSERIA, JEFE DE FABRICA DE ENVASES','','Jefe de Mantenimiento','',66,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:41','admin','2017-04-02 17:12:41',1),
	(1265,8,'Moreno Muñoz Emilio Fernando','Superintendente de Mantenimiento',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08MNTO16','JEFE DE SERVICIOS DE FABRICA','','JEFE DE SERVICIOS DE FABRICA','','Jefe de Servicios de Fabrica','',66,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:41','admin','2017-04-02 17:12:41',1),
	(1266,8,'Moreno Muñoz Emilio Fernando','Superintendente de Mantenimiento',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,1,0,0,'08MNTO17','SUPERINTENDENTE DE MANTENIMEINTO','','SUPERINTENDENTE DE MANTENIMEINTO','','Superintendente de Mantenimeinto','',66,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:41','admin','2017-04-02 17:12:41',1),
	(1267,8,'Moreno Muñoz Emilio Fernando','Superintendente de Mantenimiento',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08MNTO18','ELECTRICISTA ELECTRONICO','','ELECTRICISTA ELECTRONICO','','Electricista Electronico','',66,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:41','admin','2017-04-02 17:12:41',1),
	(1268,8,'Moreno Muñoz Emilio Fernando','Superintendente de Mantenimiento',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08MNTO19','MECANICO','','MECANICO','','Mecanico','',66,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:42','admin','2017-04-02 17:12:42',1),
	(1269,8,'Moreno Muñoz Emilio Fernando','Superintendente de Mantenimiento',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08MNTO20','MECANICO AUTOMOTRIZ','','MECANICO AUTOMOTRIZ','','Mecanico Automotriz','',66,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:42','admin','2017-04-02 17:12:42',1),
	(1270,8,'Moreno Muñoz Emilio Fernando','Superintendente de Mantenimiento',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08MNTO21','MECANICO DE MAQUINAS Y HERRAMIENTAS','','MECANICO DE MAQUINAS Y HERRAMIENTAS','','Mecanico de Maquinas y Herramientas','',66,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:42','admin','2017-04-02 17:12:42',1),
	(1271,8,'Moreno Muñoz Emilio Fernando','Superintendente de Mantenimiento',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08MNTO22','OPERADOR','','OPERADOR (TRATAMIENTO DE AGUAS Y EFLUENTES)- OPERADOR (CASA DE FUERZA)','','Operador','',66,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:42','admin','2017-04-02 17:12:42',1),
	(1272,8,'Moreno Muñoz Emilio Fernando','Superintendente de Mantenimiento',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08MNTO23','OPERARIO','','OPERARIO(LUBRICAION)','','Operario','',66,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:42','admin','2017-04-02 17:12:42',1),
	(1273,8,'Moreno Muñoz Emilio Fernando','Superintendente de Mantenimiento',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08MNTO24','TECNICO ELECTRICO','','','','Tecnico Electrico','',66,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:42','admin','2017-04-02 17:12:42',1),
	(1274,8,'Moreno Muñoz Emilio Fernando','Superintendente de Mantenimiento',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08MNTO25','TECNICO LUBRICADOR','','TECNICO LUBRICADOR','','Tecnico Lubricador','',66,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:42','admin','2017-04-02 17:12:42',1),
	(1275,8,'Moreno Muñoz Emilio Fernando','Superintendente de Mantenimiento',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08MNTO26','TECNICO TETRAPAK','','','','Tecnico Tetrapak','',66,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:42','admin','2017-04-02 17:12:42',1),
	(1276,8,'SUB GERENTE TÉCNICO','JUAN SOBREVILLA',NULL,NULL,'Verde',NULL,NULL,2,2,0,0,0,0,'08OPER01','DIRECTOR AREA DE OPERACIONES Y ACOPIO','','','','DIRECTOR AREA DE OPERACIONES Y ACOPIO','',67,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,1,0,0,0,0,0,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:42','admin','2017-04-02 17:12:42',1),
	(1277,8,'SUB GERENTE TÉCNICO','JUAN SOBREVILLA',NULL,NULL,'Verde',NULL,NULL,2,2,0,0,0,0,'08OPER02','SUB GERENTE TECNICO','','','','SUB GERENTE TECNICO','',67,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,1,0,0,0,0,0,1,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:42','admin','2017-04-02 17:12:42',1),
	(1278,8,'','',NULL,NULL,'Verde',NULL,NULL,1,0,0,1,0,0,'08PLVI01','GERENTE DE PRODUCCIÓN DE OPERACIONES','','','','Gerente de Produccion de Operaciones','',67,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:42','admin','2017-04-02 17:12:42',1),
	(1279,8,'Meneses Zuñiga Carlos Alberto','Jefe de Proyectos',NULL,NULL,'Verde',NULL,NULL,0,0,0,0,0,0,'08PROY01','GERENTE DE PROYECTOS','','GERENTE DE PROYECTOS','','Gerente de Proyectos ','',68,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:42','admin','2017-04-02 17:12:42',1),
	(1280,8,'Meneses  Zuñiga,Carlos Alberto','Jefe de Proyectos',NULL,NULL,'Verde',NULL,NULL,0,0,0,0,0,0,'08PROY02','INGENIERO CIVIL','','INGENIERO CIVIL','','Ingeniero Civil','',68,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:42','admin','2017-04-02 17:12:42',1),
	(1281,8,'Meneses  Zuñiga,Carlos Alberto','Jefe de Proyectos',NULL,NULL,'Verde',NULL,NULL,0,0,0,0,0,0,'08PROY03','INGENIERO DE PROYECTOS','','INGENIERO DE PROYECTOS','','Ingeniero de Proyectos','',68,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:42','admin','2017-04-02 17:12:42',1),
	(1282,8,'Meneses  Zuñiga,Carlos Alberto','Jefe de Proyectos',NULL,NULL,'Verde',NULL,NULL,0,0,0,0,0,0,'08PROY04','INGENIERO JUNIOR DE PROYECTOS','','INGENIERO JUNIOR DE PROEYCTOS','','Ingeniero de Junior de Proyectos','',68,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:42','admin','2017-04-02 17:12:42',1),
	(1283,8,'Meneses  Zuñiga,Carlos Alberto','Jefe de Proyectos',NULL,NULL,'Verde',NULL,NULL,0,0,0,0,0,0,'08PROY05','INGENIERO INDUSTRIAL','','INGENIERO INDUSTRIAL','','Ingeniero Industrial','',68,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:42','admin','2017-04-02 17:12:42',1),
	(1284,8,'Meneses  Zuñiga,Carlos Alberto','Jefe de Proyectos',NULL,NULL,'Verde',NULL,NULL,0,0,0,0,0,0,'08PROY06','INGENIERO MECANICO','','INGENIERO MECANICO','','Ingeniero Mecanico','',68,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:42','admin','2017-04-02 17:12:42',1),
	(1285,8,'Meneses  Zuñiga,Carlos Alberto','Jefe de Proyectos',NULL,NULL,'Verde',NULL,NULL,0,0,0,0,0,0,'08PROY07','INGENIERO DE PROYECTOS MECANICO ELECTRICO','','INGENIERO PROYECTOS MECANICO- ELECTRICO','','Ingeniero  Proyectos Mecanico Electrico','',68,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:42','admin','2017-04-02 17:12:42',1),
	(1286,8,'Meneses  Zuñiga,Carlos Alberto','Jefe de Proyectos',NULL,NULL,'Verde',NULL,NULL,0,0,0,0,0,0,'08PROY08','JEFE DE PROYECTOS','','JEFE DE PROYECTOS ','','Jefe de Proyectos ','',68,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:42','admin','2017-04-02 17:12:42',1),
	(1287,8,'Vargas Trepaud, Gustavo Abel','Sub Gerente de Recuros Humanos',NULL,NULL,'Verde',NULL,NULL,1,0,0,0,0,0,'08RRHH01','ASISTENTE DE RECURSOS HUMANOS','','ASISTENTE DE RECURSOS HUMANOS','','Asistente de Recursos  Humanos','',69,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:42','admin','2017-04-02 17:12:42',1),
	(1288,8,'Vargas Trepaud, Gustavo Abel','Sub Gerente de Recuros Humanos',NULL,NULL,'Verde',NULL,NULL,1,0,0,0,0,0,'08RRHH02','ASISTENTA SOCIAL','','ASISTENTE SOCIAL','','Asistente Social','',69,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:42','admin','2017-04-02 17:12:42',1),
	(1289,8,'Vargas Trepaud, Gustavo Abel','Sub Gerente de Recuros Humanos',NULL,NULL,'Verde',NULL,NULL,2,2,0,0,0,0,'08RRHH03','GERENTE DE RECURSOS HUMANOS','','GERENTE DE RECURSOS HUMANOS','','Gerente de Recursos Humanos','',69,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,2,0,0,0,0,0,2,0,0,0,0,1,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:42','admin','2017-04-02 17:12:42',1),
	(1290,8,'Vargas Trepaud, Gustavo Abel','Sub Gerente de Recuros Humanos',NULL,NULL,'Verde',NULL,NULL,1,0,0,1,0,0,'08RRHH04','JEFE DE RESPONSABILIDAD SOCIAL','','JEFE DE RESPONSABILIDAD  SOCIAL ','','Jefe de Responsabilidad Social ','',69,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:42','admin','2017-04-02 17:12:42',1),
	(1291,8,'Vargas Trepaud, Gustavo Abel','Sub Gerente de Recuros Humanos',NULL,NULL,'Verde',NULL,NULL,1,0,0,0,0,0,'08RRHH05','SUB GERENTE DE RECURSOS HUMANOS','','SUB GERENTE DE RECURSOS HUMANOS ','','Sub Gerente de Recursos Humanos ','',69,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:43','admin','2017-04-02 17:12:43',1),
	(1292,8,'Villegas Miguel','Superintendente de Mantenimiento',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08SEGN01','AUXILIAR DE SERVICIOS GENERALES','','AUXILIAR DE SERVICIOS GENERALES','','Auxiliar de Servicios Generales','',59,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,2,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:43','admin','2017-04-02 17:12:43',1),
	(1293,8,'Villegas Miguel','Asistente de Servicios Generales',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08SEGN02','OPERARIO','','OPERARIO','','Operario','',59,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:43','admin','2017-04-02 17:12:43',1),
	(1294,8,'COORDINADOR DE SEGURIDAD','WILDER DUBLES VIGO ARAUJO',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08SEGU01','COORDINADOR DE SEGURIDAD','','COORDINADOR DE SEGURIDAD','','COORDINADOR DE SEGURIDAD','',69,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:43','admin','2017-04-02 17:12:43',1),
	(1295,8,'WILDER DUBLES VIGO ARAUJO','SEGURIDAD INTEGRAL',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08SEGU02','ENFERMERO','','ENFERMERO','','ENFERMERO','',69,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:43','admin','2017-04-02 17:12:43',1),
	(1296,8,'COORDINADOR DE SEGURIDAD','WILDER DUBLES VIGO ARAUJO',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08SEGU03','GERENTE DE SEGURIDAD INTEGRAL','','GERENTE DE SEGURIDAD INTEGRAL','','GERENTE DE SEGURIDAD INTEGRAL','',69,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:43','admin','2017-04-02 17:12:43',1),
	(1297,8,'COORDINADOR DE SEGURIDAD','WILDER DUBLES VIGO ARAUJO',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08SEGU04','JEFE DE SEGURIDAD','','JEFE DE SEGURIDAD','','JEFE DE SEGURIDAD','',69,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:43','admin','2017-04-02 17:12:43',1),
	(1298,8,'COORDINADOR DE SEGURIDAD','WILDER DUBLES VIGO ARAUJO',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08SEGU05','SUPERVISOR DE SEGURIDAD','','SUPERVISOR DE SEGURIDAD','','SUPERVISOR DE SEGURIDAD','',69,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:43','admin','2017-04-02 17:12:43',1),
	(1299,8,'COORDINADOR DE SEGURIDAD','WILDER DUBLES VIGO ARAUJO',NULL,NULL,'Amarillo',NULL,NULL,0,0,0,0,0,0,'08SEGU06','SUPERVISOR SANEAMIENTO AMB Y MED AMB','','SUPERVISOR DE SANEAMIENTO AMBIENTAL Y MEDIO AMBIENTE','','SUPERVISOR SANEAMIENTO AMB Y MED AMB','',69,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:43','admin','2017-04-02 17:12:43',1),
	(1300,8,'ANALISTA DE APLICACIONES','VILLAR',NULL,NULL,'Verde',NULL,NULL,1,0,0,0,0,0,'08SIST01','ANALISTA DE INFRAESTRUCTURA','','','','ANALISTA DE INFRAESTRUCTURA','',72,3,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,'CONCLUIDO','','admin','2017-04-02 17:12:43','admin','2017-04-02 17:12:43',1);

/*!40000 ALTER TABLE `puesto_trabajo` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table rol_permiso
# ------------------------------------------------------------

DROP TABLE IF EXISTS `rol_permiso`;

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

LOCK TABLES `rol_permiso` WRITE;
/*!40000 ALTER TABLE `rol_permiso` DISABLE KEYS */;

INSERT INTO `rol_permiso` (`id_rol`, `id_permiso`, `acceso`, `agregar`, `editar`, `eliminar`, `exportar`, `importar`)
VALUES
	(2,1,1,1,1,1,1,1),
	(2,2,1,0,0,0,0,0),
	(2,8,1,0,0,0,0,0),
	(2,9,1,0,0,0,0,0),
	(3,6,1,0,0,0,0,0),
	(4,7,1,0,0,0,0,0),
	(5,8,1,0,0,0,0,0),
	(1,1,1,1,1,1,1,1),
	(1,2,1,0,0,0,0,0),
	(1,3,1,1,1,1,1,0),
	(1,4,1,1,1,1,1,0),
	(1,5,1,1,1,1,1,0),
	(1,6,1,0,0,0,0,0),
	(1,7,1,0,0,0,0,0),
	(1,8,1,0,0,0,0,0),
	(1,9,1,0,0,0,0,0),
	(1,10,1,1,1,1,1,0),
	(1,11,1,1,1,1,1,0),
	(1,12,1,1,1,1,1,0),
	(1,13,1,0,0,0,1,0);

/*!40000 ALTER TABLE `rol_permiso` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;

INSERT INTO `roles` (`id`, `nombre`, `estado`)
VALUES
	(1,'Administrador',1),
	(2,'ANALISTA',1),
	(3,'EVAL EVA ERIN',1),
	(4,'EVAL SISO',1),
	(5,'DOCTOR',1);

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
  `usuario_creado` varchar(250) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `usuario_modificado` varchar(250) DEFAULT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `FK_ROLES` (`id_rol`),
  CONSTRAINT `FK_ROLES` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;

INSERT INTO `usuarios` (`id`, `nombres`, `apellidos`, `telefono`, `email`, `usuario`, `contrasena`, `id_rol`, `id_empresa`, `usuario_creado`, `fecha_creado`, `usuario_modificado`, `fecha_modificado`, `estado`)
VALUES
	(1,'admin','admin','111','admin@admin.com','admin','b09DMHUxb3VROUk2Umg1TTRNMGdHZz09',1,1,'','2017-02-04 22:06:50','admin','2017-03-01 11:21:54',1);

/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
