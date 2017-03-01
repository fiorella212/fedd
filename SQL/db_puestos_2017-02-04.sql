# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.1.21-MariaDB)
# Database: db_puestos
# Generation Time: 2017-02-05 04:53:04 +0000
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
  `id_local` int(11) NOT NULL,
  `usuario_creado` varchar(250) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT CURRENT_TIMESTAMP,
  `usuario_modificado` varchar(250) NOT NULL,
  `fecha_modificado` datetime DEFAULT CURRENT_TIMESTAMP,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

LOCK TABLES `area` WRITE;
/*!40000 ALTER TABLE `area` DISABLE KEYS */;

INSERT INTO `area` (`id`, `nombre`, `id_local`, `usuario_creado`, `fecha_creado`, `usuario_modificado`, `fecha_modificado`, `estado`)
VALUES
	(1,'Administracion',1,NULL,'2017-02-04 22:00:13','','2017-02-04 22:03:18',1);

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
  `usuario_creado` varchar(250) NOT NULL,
  `fecha_creado` datetime DEFAULT CURRENT_TIMESTAMP,
  `usuario_modificado` varchar(250) NOT NULL,
  `fecha_modificado` datetime DEFAULT CURRENT_TIMESTAMP,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

LOCK TABLES `empresa` WRITE;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;

INSERT INTO `empresa` (`id`, `codigo`, `razon_social`, `ruc`, `direccion`, `telefono`, `usuario_creado`, `fecha_creado`, `usuario_modificado`, `fecha_modificado`, `estado`)
VALUES
	(1,'EMP','EmpresaCool','11111111111','1111','1111','','2017-02-04 22:04:11','','2017-02-04 22:04:11',1),
	(2,'EMP2','CSG_3','12312312333','por ahi','54656354654','','2017-02-04 22:04:11','','2017-02-04 22:04:11',1),
	(3,'EMP3','asdfasd','34232321234','dsfsdf','fdf44','','2017-02-04 22:04:11','','2017-02-04 22:04:11',1);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

LOCK TABLES `local` WRITE;
/*!40000 ALTER TABLE `local` DISABLE KEYS */;

INSERT INTO `local` (`id`, `id_empresa`, `nombre`, `direccion`, `encargado`, `telefono`, `email`, `usuario_creado`, `fecha_creado`, `usuario_modificado`, `fecha_modificado`, `estado`)
VALUES
	(1,1,'Huachipa','sdfasdf','dfsdf','dsfsdf','sdfsdf','','2017-02-04 22:06:21','','2017-02-04 22:06:21',1),
	(2,1,'Lima','asdfasd','erever','565','dfsdfs','','2017-02-04 22:06:21','','2017-02-04 22:06:21',1),
	(3,2,'Surco','Surco','Tiburcio','243234234','tiburcio@sdfsdf.cc','','2017-02-04 22:06:21','','2017-02-04 22:06:21',1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



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

LOCK TABLES `puesto_trabajo` WRITE;
/*!40000 ALTER TABLE `puesto_trabajo` DISABLE KEYS */;

INSERT INTO `puesto_trabajo` (`id`, `id_local`, `entrevistado_nombre`, `entrevistado_puesto`, `entrevistado_telefono`, `entrevistado_email`, `eva_erin_resultado`, `eva_erin_observaciones`, `id_cuestionario_siso`, `siso_s_visual`, `siso_s_auditivo`, `siso_m_ext_inferior`, `siso_m_ext_superior`, `siso_m_intelectual`, `siso_m_psicosocial`, `codigo_sabha`, `denominacion_sabha`, `codigo_mof`, `denominacion_mof`, `codigo_sap`, `denominacion_sap`, `otra_denominacion`, `id_area`, `funcion_principal`, `s_visual_actividad`, `s_visual_requerimiento`, `s_visual_restriccion`, `s_visual_pre_eval`, `s_auditivo_actividad`, `s_auditivo_requerimiento`, `s_auditivo_restriccion`, `s_auditivo_pre_eval`, `m_ext_inf_actividad`, `m_ext_inf_requerimiento`, `m_ext_inf_restriccion`, `m_ext_inf_pre_eval`, `m_ext_sup_actividad`, `m_ext_sup_requerimiento`, `m_ext_sup_restriccion`, `m_ext_sup_pre_eval`, `m_intelectual_actividad`, `m_intelectual_requerimiento`, `m_intelectual_restriccion`, `m_intelectual_pre_eval`, `m_psicosocial_actividad`, `m_psicosocial_requerimiento`, `m_psicosocial_restriccion`, `m_psicosocial_pre_eval`, `resultado_pt_s_visual`, `resultado_pt_s_auditivo`, `resultado_pt_m_ext_inf`, `resultado_pt_m_ext_sup`, `resultado_pt_m_intelectual`, `resultado_pt_m_psicosocial`, `resultado_final_s_visual`, `resultado_final_s_auditivo`, `resultado_final_m_ext_inf`, `resultado_final_m_ext_sup`, `resultado_final_m_intelectual`, `resultado_final_m_psicosocial`, `es_apto`, `aplica_ajutes`, `estado_registro`, `notas`, `usuario_creado`, `fecha_creado`, `usuario_modificado`, `fecha_modificado`, `estado`)
VALUES
	(1,1,'Tiburcio Gomez','Techero','25485744','tibu@rcio.cc',NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,'casd','casd','asdas','sdfas','sadfas','swefsd','Techerus Caninus',1,'Evaaluador de techos ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,'EN_PROCESO','-- sin obs','','2017-02-04 22:25:22','','2017-02-04 22:25:22',1);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;

INSERT INTO `usuarios` (`id`, `nombres`, `apellidos`, `telefono`, `email`, `usuario`, `contrasena`, `id_rol`, `id_empresa`, `usuario_creado`, `fecha_creado`, `usuario_modificado`, `fecha_modificado`, `estado`)
VALUES
	(1,'admin','admin','111','admin@admin','admin','admin',1,1,'','2017-02-04 22:06:50','','2017-02-04 22:06:50',1);

/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
