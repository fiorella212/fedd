<?php

/**
 * Created by IntelliJ IDEA.
 * User: gustavo
 * Date: 2/18/17
 * Time: 11:38 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporte extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Local_model');
		$this->load->model('Area_model');
		$this->load->model('Puesto_trabajo_model');

		$this->load->library(array('form_validation', 'session'));
		$this->load->helper(array('url', 'html', 'form'));

	}

	public function index()
	{
		ini_set('max_execution_time', -1);
		ini_set('memory_limit', '-1');
//		$puestos = Puesto_trabajo_model::all();

		$_sql = "SELECT 
`local`.nombre as `local`,
puesto_trabajo.entrevistado_nombre,
puesto_trabajo.entrevistado_puesto,
puesto_trabajo.entrevistado_telefono,
puesto_trabajo.entrevistado_email,
puesto_trabajo.eva_erin_resultado,
puesto_trabajo.eva_erin_observaciones,
puesto_trabajo.siso_s_visual,
puesto_trabajo.siso_s_auditivo,
puesto_trabajo.siso_m_ext_inferior,
puesto_trabajo.siso_m_ext_superior,
puesto_trabajo.siso_m_intelectual,
puesto_trabajo.siso_m_psicosocial,
puesto_trabajo.codigo_sabha,
puesto_trabajo.denominacion_sabha,
puesto_trabajo.codigo_mof,
puesto_trabajo.denominacion_mof,
puesto_trabajo.codigo_sap,
puesto_trabajo.denominacion_sap,
puesto_trabajo.otra_denominacion,
area.nombre as Area,
empresa.razon_social as empresa,
puesto_trabajo.funcion_principal,
puesto_trabajo.s_visual_actividad,
puesto_trabajo.s_visual_requerimiento,
puesto_trabajo.s_visual_restriccion,
puesto_trabajo.s_visual_pre_eval,
puesto_trabajo.s_auditivo_actividad,
puesto_trabajo.s_auditivo_requerimiento,
puesto_trabajo.s_auditivo_restriccion,
puesto_trabajo.s_auditivo_pre_eval,
puesto_trabajo.m_ext_inf_actividad,
puesto_trabajo.m_ext_inf_requerimiento,
puesto_trabajo.m_ext_inf_restriccion,
puesto_trabajo.m_ext_inf_pre_eval,
puesto_trabajo.m_ext_sup_actividad,
puesto_trabajo.m_ext_sup_requerimiento,
puesto_trabajo.m_ext_sup_restriccion,
puesto_trabajo.m_ext_sup_pre_eval,
puesto_trabajo.m_intelectual_actividad,
puesto_trabajo.m_intelectual_requerimiento,
puesto_trabajo.m_intelectual_restriccion,
puesto_trabajo.m_intelectual_pre_eval,
puesto_trabajo.m_psicosocial_actividad,
puesto_trabajo.m_psicosocial_requerimiento,
puesto_trabajo.m_psicosocial_restriccion,
puesto_trabajo.m_psicosocial_pre_eval,
puesto_trabajo.resultado_pt_s_visual,
puesto_trabajo.resultado_pt_s_auditivo,
puesto_trabajo.resultado_pt_m_ext_inf,
puesto_trabajo.resultado_pt_m_ext_sup,
puesto_trabajo.resultado_pt_m_intelectual,
puesto_trabajo.resultado_pt_m_psicosocial,
puesto_trabajo.resultado_final_s_visual,
puesto_trabajo.resultado_final_s_auditivo,
puesto_trabajo.resultado_final_m_ext_inf,
puesto_trabajo.resultado_final_m_ext_sup,
puesto_trabajo.resultado_final_m_intelectual,
puesto_trabajo.resultado_final_m_psicosocial,
CASE puesto_trabajo.es_apto WHEN 0 then 'NO APTO' WHEN 1 THEN 'APTO' END as es_apto,
puesto_trabajo.aplica_ajutes,
puesto_trabajo.estado_registro,
puesto_trabajo.notas,
personal.planilla,
personal.codigo_sap AS 'SAP_COD',
personal.fecha_ingreso,
personal.nombres_trabajador,
personal.apellidos_trabajador,
personal.regimen,
personal.sede,
personal.denominacion_sap AS 'SAP_DENO',
personal.area,
personal.fecha_nacimiento,
personal.sexo,
personal.anos_res_jubilacion,
personal.ano_jubilacion,
personal.dni,
personal.codigo_trabajador,
personal.gerencia
FROM 
puesto_trabajo
INNER JOIN `local` ON puesto_trabajo.id_local = `local`.id
INNER JOIN area ON puesto_trabajo.id_area = area.id
INNER JOIN empresa ON puesto_trabajo.id_empresa = empresa.id
LEFT JOIN personal on puesto_trabajo.codigo_sap = personal.codigo_sap
WHERE puesto_trabajo.id_empresa = " . $this->session->id_empresa .  "
or personal.id_empresa = " . $this->session->id_empresa .  "
UNION 

SELECT 
`local`.nombre as `local`,
puesto_trabajo.entrevistado_nombre,
puesto_trabajo.entrevistado_puesto,
puesto_trabajo.entrevistado_telefono,
puesto_trabajo.entrevistado_email,
puesto_trabajo.eva_erin_resultado,
puesto_trabajo.eva_erin_observaciones,
puesto_trabajo.siso_s_visual,
puesto_trabajo.siso_s_auditivo,
puesto_trabajo.siso_m_ext_inferior,
puesto_trabajo.siso_m_ext_superior,
puesto_trabajo.siso_m_intelectual,
puesto_trabajo.siso_m_psicosocial,
puesto_trabajo.codigo_sabha,
puesto_trabajo.denominacion_sabha,
puesto_trabajo.codigo_mof,
puesto_trabajo.denominacion_mof,
puesto_trabajo.codigo_sap,
puesto_trabajo.denominacion_sap,
puesto_trabajo.otra_denominacion,
area.nombre as Area,
empresa.razon_social as empresa,
puesto_trabajo.funcion_principal,
puesto_trabajo.s_visual_actividad,
puesto_trabajo.s_visual_requerimiento,
puesto_trabajo.s_visual_restriccion,
puesto_trabajo.s_visual_pre_eval,
puesto_trabajo.s_auditivo_actividad,
puesto_trabajo.s_auditivo_requerimiento,
puesto_trabajo.s_auditivo_restriccion,
puesto_trabajo.s_auditivo_pre_eval,
puesto_trabajo.m_ext_inf_actividad,
puesto_trabajo.m_ext_inf_requerimiento,
puesto_trabajo.m_ext_inf_restriccion,
puesto_trabajo.m_ext_inf_pre_eval,
puesto_trabajo.m_ext_sup_actividad,
puesto_trabajo.m_ext_sup_requerimiento,
puesto_trabajo.m_ext_sup_restriccion,
puesto_trabajo.m_ext_sup_pre_eval,
puesto_trabajo.m_intelectual_actividad,
puesto_trabajo.m_intelectual_requerimiento,
puesto_trabajo.m_intelectual_restriccion,
puesto_trabajo.m_intelectual_pre_eval,
puesto_trabajo.m_psicosocial_actividad,
puesto_trabajo.m_psicosocial_requerimiento,
puesto_trabajo.m_psicosocial_restriccion,
puesto_trabajo.m_psicosocial_pre_eval,
puesto_trabajo.resultado_pt_s_visual,
puesto_trabajo.resultado_pt_s_auditivo,
puesto_trabajo.resultado_pt_m_ext_inf,
puesto_trabajo.resultado_pt_m_ext_sup,
puesto_trabajo.resultado_pt_m_intelectual,
puesto_trabajo.resultado_pt_m_psicosocial,
puesto_trabajo.resultado_final_s_visual,
puesto_trabajo.resultado_final_s_auditivo,
puesto_trabajo.resultado_final_m_ext_inf,
puesto_trabajo.resultado_final_m_ext_sup,
puesto_trabajo.resultado_final_m_intelectual,
puesto_trabajo.resultado_final_m_psicosocial,
CASE puesto_trabajo.es_apto WHEN 0 then 'NO APTO' WHEN 1 THEN 'APTO' END as es_apto,
puesto_trabajo.aplica_ajutes,
puesto_trabajo.estado_registro,
puesto_trabajo.notas,
personal.planilla,
personal.codigo_sap AS 'SAP_COD',
personal.fecha_ingreso,
personal.nombres_trabajador,
personal.apellidos_trabajador,
personal.regimen,
personal.sede,
personal.denominacion_sap AS 'SAP_DENO',
personal.area,
personal.fecha_nacimiento,
personal.sexo,
personal.anos_res_jubilacion,
personal.ano_jubilacion,
personal.dni,
personal.codigo_trabajador,
personal.gerencia
FROM 
puesto_trabajo
INNER JOIN `local` ON puesto_trabajo.id_local = `local`.id
INNER JOIN area ON puesto_trabajo.id_area = area.id
INNER JOIN empresa ON puesto_trabajo.id_empresa = empresa.id
RIGHT JOIN personal on puesto_trabajo.codigo_sap = personal.codigo_sap
WHERE puesto_trabajo.id_empresa = " . $this->session->id_empresa ."
or personal.id_empresa = " . $this->session->id_empresa ;

		$cabeceras = array(
			'Local', 'Nombre Entrevistado', 'Puesto Entrevistado', 'Telefono Entrevistado', 'Correo Entrevistado',
			'EVA-ERIN Resultado', 'EVA-ERIN Observaciones', 'SISO Visual', 'SISO Auditivo', 'SISO Ext Inferior', 'SISO Ext Superior',
			'SISO Intelectual', 'SISO Psicosocial', 'Codigo SABHA', 'Denominacion SABHA', 'Codigo MOF', 'Denominacion MOF', 'Codigo SAP',
			'Denominacion SAP', 'Otra Denominacion', 'Area', 'Empresa', 'Funcion Principal', 'Actividad Visual', 'Requerimiento Visual',
			'Restriccion Visual', 'Pre Evaluacion Visual', 'Actividad Auditivo', 'Requerimiento Auditivo', 'Restriccion Auditivo',
			'Pre Evaluacion Auditivo', 'Actividad Ext Inferior', 'Requerimiento Ext Inferior', 'Restriccion Ext Inferior', 'Pre Eval Ext Inferior',
			'Actividad Ext Superior', 'Requerimiento Ext Superior', 'Restriccion Ext Superior', 'Pre Eval Ext Superior', 'Actividad Intelectual',
			'Requerimiento Intelectual', 'Restriccion Intelectual', 'Pre Eval Intelectual', 'Actividad Psicosocial', 'Requerimiento Psicosocial',
			'Restriccion Psicosocial', 'Pre Eval Psicosocial', 'Resultado Visual', 'Resultado Auditivo', 'Resultado Ext Inferior', 'Resultado Ext Superior',
			'Resultado Intelectual', 'Resultado Psicosocial', 'Resultado Final Visual', 'Resultado Final Auditivo', 'Resultado Final Ext Inferior', 'Resultado Final Ext Superior',
			'Resultado Final Intelectual', 'Resultado Final Psicosocial', 'ES APTO', 'Aplica Ajustes', 'Estado', 'Notas', 'SAP Planilla', 'SAP Codigo',
			'SAP Fecha Ingreso', 'SAP Nombre Trabajador', 'SAP Apellidos Trabajador', 'SAP Regimen', 'SAP Sede', 'SAP Denominacion', 'SAP Area',
			'SAP Fecha Nacimiento', 'SAP Sexo', 'SAP Jubilacion', 'SAP DNI', 'SAP Codigo Trabajador', 'SAP Gerencia');

		$result = $this->db->query($_sql);


//		echo "<pre>", print_r($result->result_array());die();

		$this->load->database();
		$objPHPExcel = new \PHPExcel();
		$objPHPExcel->getProperties()->setCreator('Sistema de Evaluaciones')
			->setTitle('Puesto de Trabajo')
			->setLastModifiedBy('Sistema de Evaluaciones')
			->setDescription('Reporte de Puestos de Trabajo');

		$objPHPExcel->setActiveSheetIndex(0);
		$objPHPExcel->getActiveSheet()->fromArray($cabeceras, ' ', 'A1');
		$objPHPExcel->getActiveSheet()->fromArray($result->result_array(), ' ', 'A2');

// Redirect output to a client’s web browser (Excel5)
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Reporte-PuestosTrabajo-Personal.xls"');
		header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');
// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.0

		$objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
		exit;

	}
}
