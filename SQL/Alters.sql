ALTER TABLE `puesto_trabajo` ADD `id_empresa_sap` VARCHAR(11)  NULL  DEFAULT NULL  AFTER `codigo_unificado`;
ALTER TABLE `puesto_trabajo` ADD `id_local_sap` VARCHAR(11)  NULL  DEFAULT NULL  AFTER `id_empresa_sap`;



-- 05/04/2017

ALTER TABLE `puesto_trabajo` ADD `area_puesto` VARCHAR(255)  NULL  DEFAULT NULL  AFTER `tipo_puesto`;
ALTER TABLE `puesto_trabajo` ADD `codigo_unificado` VARCHAR(255)  NULL  DEFAULT NULL  AFTER `area_puesto`;
ALTER TABLE `empresa` ADD `rubro` VARCHAR(250)  NULL  DEFAULT NULL  AFTER `estado`;
ALTER TABLE `local` ADD `ubicacion` VARCHAR(250)  NULL  DEFAULT NULL  AFTER `estado`;




----------------



ALTER TABLE db_puestos.pregunta_siso ADD estado TINYINT NOT NULL ;

ALTER TABLE db_puestos.pregunta_siso ADD `usuario_creado` varchar(250) NOT NULL;
ALTER TABLE db_puestos.pregunta_siso ADD `fecha_creado` datetime DEFAULT NULL;
ALTER TABLE db_puestos.pregunta_siso ADD `usuario_modificado` varchar(250) NOT NULL;
ALTER TABLE db_puestos.pregunta_siso ADD `fecha_modificado` datetime DEFAULT NULL;



-- 26/02/2017

ALTER TABLE db_puestos.`local` MODIFY COLUMN id_empresa INT UNSIGNED NOT NULL ;
ALTER TABLE db_puestos.area MODIFY COLUMN id_local INT UNSIGNED NOT NULL ;
ALTER TABLE db_puestos.puesto_trabajo MODIFY COLUMN id_local INT UNSIGNED NOT NULL ;
ALTER TABLE db_puestos.puesto_trabajo MODIFY COLUMN id_area INT UNSIGNED NOT NULL ;
ALTER TABLE db_puestos.cuestionario_siso MODIFY COLUMN id_puesto_trabajo INT UNSIGNED NOT NULL ;
ALTER TABLE db_puestos.cuestionario_siso MODIFY COLUMN id_pregunta_siso INT UNSIGNED NOT NULL ;


ALTER TABLE db_puestos.`local` ADD CONSTRAINT local_empresa_FK FOREIGN KEY (id_empresa) REFERENCES db_puestos.empresa(id) ;
ALTER TABLE db_puestos.area ADD CONSTRAINT area_local_FK FOREIGN KEY (id_local) REFERENCES db_puestos.`local`(id) ;
ALTER TABLE db_puestos.puesto_trabajo ADD CONSTRAINT puesto_trabajo_local_FK FOREIGN KEY (id_local) REFERENCES db_puestos.`local`(id) ;
ALTER TABLE db_puestos.puesto_trabajo ADD CONSTRAINT puesto_trabajo_area_FK FOREIGN KEY (id_area) REFERENCES db_puestos.area(id) ;
ALTER TABLE db_puestos.cuestionario_siso ADD CONSTRAINT cuestionario_siso_puesto_trabajo_FK FOREIGN KEY (id_puesto_trabajo) REFERENCES db_puestos.puesto_trabajo(id) ;
ALTER TABLE db_puestos.cuestionario_siso ADD CONSTRAINT cuestionario_siso_pregunta_siso_FK FOREIGN KEY (id_pregunta_siso) REFERENCES db_puestos.pregunta_siso(id) ;



ALTER TABLE db_puestos.empresa ADD CONSTRAINT empresa_codigo_UN UNIQUE KEY (codigo) ;
ALTER TABLE db_puestos.empresa ADD CONSTRAINT empresa_ruc_UN UNIQUE KEY (ruc) ;


ALTER TABLE db_puestos.`local` ADD CONSTRAINT local_empresa_UN UNIQUE KEY (id_empresa, nombre) ; -- Para evitar tener que consultar la tabla =) Soy Un CHUCHA
ALTER TABLE db_puestos.area ADD CONSTRAINT area_local_UN UNIQUE KEY (id_local, nombre) ; -- Idem ^


ALTER TABLE db_puestos.pregunta_siso ADD CONSTRAINT pregunta_siso_UN UNIQUE KEY (pregunuta) ;

alter table personal add column id_empresa int;
alter table personal add column sede_estudio varchar(255);
