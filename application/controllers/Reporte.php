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
        $this->load->library('Boxspoutxls');

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
personal.id_empresa_sap AS 'ID Empresa SAP',
personal.empresa_nombre_sap AS 'Nombre Empresa SAP',
personal.id_sede_sap AS 'ID Sede SAP',
personal.sede_nombre_sap AS 'Sede SAP',
personal.area_nombre,
personal.codigo_puesto_creado,
personal.codigo_sabha AS 'CODIGO SABHA SAP',
personal.consultoria,
personal.codigo_puesto,
personal.genero,
personal.num_colaborador,
personal.nombres_apellidos,
personal.fecha_nacimiento,
personal.fecha_ingreso

FROM 
puesto_trabajo
INNER JOIN `local` ON puesto_trabajo.id_local = `local`.id
INNER JOIN area ON puesto_trabajo.id_area = area.id
INNER JOIN empresa ON puesto_trabajo.id_empresa = empresa.id
LEFT JOIN personal on puesto_trabajo.codigo_sabha = personal.codigo_sabha
WHERE puesto_trabajo.id_empresa = " . $this->session->id_empresa .  "
or personal.id_empresa = " . $this->session->id_empresa .  "
group by personal.id

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
personal.id_empresa_sap AS 'ID Empresa SAP',
personal.empresa_nombre_sap AS 'Nombre Empresa SAP',
personal.id_sede_sap AS 'ID Sede SAP',
personal.sede_nombre_sap AS 'Sede SAP',
personal.area_nombre,
personal.codigo_puesto_creado,
personal.codigo_sabha AS 'CODIGO SABHA SAP',
personal.consultoria,
personal.codigo_puesto,
personal.genero,
personal.num_colaborador,
personal.nombres_apellidos,
personal.fecha_nacimiento,
personal.fecha_ingreso
FROM 
puesto_trabajo
INNER JOIN `local` ON puesto_trabajo.id_local = `local`.id
INNER JOIN area ON puesto_trabajo.id_area = area.id
INNER JOIN empresa ON puesto_trabajo.id_empresa = empresa.id
RIGHT JOIN personal on puesto_trabajo.codigo_sabha = personal.codigo_sabha
WHERE puesto_trabajo.id_empresa = " . $this->session->id_empresa ."
or personal.id_empresa = " . $this->session->id_empresa." group by personal.id" ;

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
			'Resultado Final Intelectual', 'Resultado Final Psicosocial', 'ES APTO', 'Aplica Ajustes', 'Estado', 'Notas', 'ID Empresa SAP',
			'Nombre Empresa SAP', 'ID Sede SAP', 'Sede SAP', 'Area Nombre SAP', 'Codigo puesto creado SAP', 'Codigo Sabha SAP', 'Consultoria SAP',
			'Codigo Puesto SAP', 'Genero SAP', 'Numero Colaborador SAP', 'Nombres y Apellidos SAP', 'Fecha Nacimiento SAP', 'Fecha Ingreso SAP');

		$result = $this->db->query($_sql);

		$fichero = $this->boxspoutxls->create_pareto_detail_report_xlsx('Reporte Interno', $cabeceras, $result->result_array(), 'ReporteInterno');
		// Redirect output to a client’s web browser (Excel5)
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="ReporteInterno_PersonalPuestos.xlsx"');
		header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');
// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.0
		readfile('uploads/' . $fichero['file_name'] .'.xlsx');
exit;
/*
//		$this->load->database();
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
*/
	}

	public function reportePuestos(){
        $this->load->view('header');
        $this->load->view('navbar');
		$data['locales'] = Local_model::where('id_empresa', '=', $this->session->id_empresa)->get();

        $permisos = $this->session->userdata('permisos');
        if (isset($permisos['reporte/reportePuestos']['acceso']) && $permisos['reporte/reportePuestos']['acceso'] == 1) {
            $this->load->view('reporte/main',$data);
        } else {
            $this->load->view('400/noacceso');
        }
        $this->load->view('footer');
    }

    public function getAllContingencia(){
        $id_empresa = $this->session->id_empresa;

        $reporte = array();

        $_sql ="SELECT e.razon_social, ( SELECT count( distinct personal.`codigo_puesto_creado`) total
FROM personal
WHERE personal.id_empresa =  $id_empresa ) puestos,
				SUM(CASE WHEN pt.es_apto = 1 OR pt.es_apto = 0 THEN 1 ELSE 0 END ) puestos_evaluados,
				SUM(CASE WHEN pt.es_apto = 1 THEN 1 ELSE 0 END ) puestos_apto,
                SUM(CASE WHEN pt.es_apto = 0 THEN 1 ELSE 0 END) puestos_no_apto
                FROM puesto_trabajo pt
                LEFT JOIN empresa e ON e.id = pt.id_empresa
                WHERE pt.id_empresa = $id_empresa";

        $_sql .= " GROUP BY e.id;";
        $result = $this->db->query($_sql);

            foreach ($result->result() as $key => $value) {
             $array = array(
                    'razon_social' => $value->razon_social,
                    'nro_puestos' => $value->puestos,
                    'nro_trabajadores' => 0,
                    'contingencia1' => 0,
                    'puestos_evaluados' => $value->puestos_evaluados,
                    'trabajadores_evaluados' => 0,
                    'contingencia2' => 0,
                    'puestos_apto' => $value->puestos_apto,
                    'puestos_no_apto' => $value->puestos_no_apto,
                     'trabajadores_apto' =>0,
                     'trabajadores_no_apto' => 0,
                    'contigencia3' =>0,
                    'contigencia4' => 0,
                    'reduccion_contingencia' => 0
                );

                $_sql2 ="SELECT e.razon_social, (  SELECT COUNT(1) FROM personal WHERE personal.id_empresa = $id_empresa ) trabajadores,
				SUM(CASE WHEN pt.es_apto = 1 OR pt.es_apto = 0 THEN 1 ELSE 0 END ) trabajadores_evaluados,
				SUM(CASE WHEN pt.es_apto = 1 THEN 1 ELSE 0 END ) trabajadores_apto,
                SUM(CASE WHEN pt.es_apto = 0 THEN 1 ELSE 0 END) trabajadores_no_apto
                FROM puesto_trabajo pt
                INNER JOIN personal p ON p.codigo_sabha = pt.codigo_sabha
                LEFT JOIN empresa e ON e.id = pt.id_empresa
                WHERE pt.id_empresa = $id_empresa AND p.`sede_estudio` = pt.`nombre_local` GROUP BY e.id";

                $result2 = $this->db->query($_sql2);
                if($result2->num_rows()>0){
                     $array['nro_trabajadores'] = $result2->row()->trabajadores;
                     $array['contingencia1'] = round(($result2->row()->trabajadores*3)/100);
                     $array['trabajadores_evaluados'] = $result2->row()->trabajadores_evaluados;
                     $array['contingencia2'] = round(($result2->row()->trabajadores_evaluados*3)/100);
                     $array['trabajadores_apto'] = $result2->row()->trabajadores_apto;
                     $array['trabajadores_no_apto'] = $result2->row()->trabajadores_no_apto;
                     $array['contingencia3'] = $result2->row()->trabajadores_apto;
                     $array['contingencia4'] = round(($result2->row()->trabajadores_apto*3)/100);
                     $array['reduccion_contingencia'] =round(($result2->row()->trabajadores_no_apto*3)/100);
                }

                array_push($reporte, $array);
            }

        $resultado['reporte'] = $reporte;

        echo json_encode($resultado);
    }

    public function getAllLocal(){
        $id_local = $this->input->post('id_local');
        $id_empresa = $this->session->id_empresa;
        // tabla 1
        $reporte = array();

        $_sql ="SELECT e.razon_social,l.id,l.nombre nombre_local,count(distinct pt.codigo_puesto_creado) puestos_sap
					FROM personal pt
					LEFT JOIN local l ON l.nombre = pt.sede_estudio
					LEFT JOIN empresa e ON e.id = pt.id_empresa
					WHERE pt.id_empresa =  $id_empresa";

        $_sql .= $id_local != '' ? " AND l.id = $id_local" :'';
        $_sql .= " GROUP BY l.nombre ORDER BY 3;";
        $result = $this->db->query($_sql);
        $nombre_empresa = '';
        $i = 0;

        $total_puestos = 0;
        $total_trabajadores = 0;
        $maximo_puestos = 0;
        $maximo_trabajadores = 0;

            foreach ($result->result() as $key => $value) {
                if($i>0){
                    if($nombre_empresa != $value->razon_social){
                        $nombre_empresa = $value->razon_social;
                    }else{
                        $nombre_empresa = '';
                    }
                }else{
                    $nombre_empresa = $value->razon_social;
                }

                $total_puestos += $value->puestos_sap;
                if($value->puestos_sap > $maximo_puestos){
                    $maximo_puestos = $value->puestos_sap;
                }

                $array = array(
                    'nombre_empresa' => $nombre_empresa,
                    'nombre_local' => $value->nombre_local,
                    'puestos_sap' => $value->puestos_sap,
                    'porcentaje_puestos' => 0,
                    'trabajadores' => 0,
                    'porcentaje_trabajadores' => 0
                );

                $_sql2 ="SELECT e.razon_social,l.id,l.nombre nombre_local,count(distinct pt.id) trabajadores
                FROM personal pt
                LEFT JOIN local l ON l.nombre = pt.sede_estudio
                LEFT JOIN empresa e ON e.id = pt.id_empresa
                WHERE pt.id_empresa = $id_empresa and l.id = $value->id;";

                $result2 = $this->db->query($_sql2);
                if($result2->num_rows()>0){

                    $total_trabajadores += $result2->row()->trabajadores;

                    if($result2->row()->trabajadores > $maximo_trabajadores){
                        $maximo_trabajadores = $result2->row()->trabajadores;
                    }

                    $array['trabajadores'] = $result2->row()->trabajadores;

                }

                $nombre_empresa = $value->razon_social;
                $i++;

                array_push($reporte, $array);
            }

        foreach($reporte as $k => $v){
            if($v['puestos_sap']>= 1){
                $reporte[$k]['porcentaje_puestos'] = round(($v['puestos_sap']*100)/$maximo_puestos);
            }
            if($v['trabajadores']>= 1){
                $reporte[$k]['porcentaje_trabajadores'] = round(($v['trabajadores']*100)/$maximo_trabajadores);
            }

        }

        $array_total = array(
            'nombre_empresa' => 'TOTAL GENERAL',
            'nombre_local' => '',
            'puestos_sap' => $total_puestos,
            'porcentaje_puestos' => 100,
            'trabajadores' => $total_trabajadores,
            'porcentaje_trabajadores' => 100
            );

        array_push($reporte, $array_total);
        $resultado['reporte'] = $reporte;


        // tabla 2


        $reporte2 = array();

        $_sql3 ="SELECT e.razon_social,l.id,l.nombre nombre_local, count(distinct a.id) areas,
                SUM(CASE WHEN pt.es_apto = 1 or pt.es_apto = 0 THEN 1 ELSE 0 END ) puestos
                FROM puesto_trabajo pt
                LEFT JOIN local l ON l.id = pt.id_local
                LEFT JOIN area a ON a.id = pt.id_area
                LEFT JOIN empresa e ON e.id = pt.id_empresa
                WHERE pt.id_empresa = $id_empresa";

        $_sql3 .= $id_local != '' ? " AND pt.id_local = $id_local" :'';
        $_sql3 .= " GROUP BY l.id ORDER BY 3;";
        $result3 = $this->db->query($_sql3);
        $nombre_empresa = '';
        $i = 0;

        $total_puestos_2 = 0;
        $total_trabajadores_2 = 0;

        foreach ($result3->result() as $key => $value) {
            if($i>0){
                if($nombre_empresa != $value->razon_social){
                    $nombre_empresa = $value->razon_social;
                }else{
                    $nombre_empresa = '';
                }
            }else{
                $nombre_empresa = $value->razon_social;
            }

            $total_puestos_2 += $value->puestos;

            $array = array(
                'nombre_empresa' => $nombre_empresa,
                'nombre_local' => $value->nombre_local,
                'areas' => $value->areas,
                'puestos' => $value->puestos,
                'porcentaje_puestos' => 0,
                'trabajadores' => 0,
                'porcentaje_trabajadores' => 0
            );

            $_sql4 ="SELECT e.razon_social,l.id,l.nombre nombre_local,
                SUM(CASE WHEN pt.es_apto = 1 or pt.es_apto = 0 THEN 1 ELSE 0 END ) trabajadores
                FROM puesto_trabajo pt
                INNER JOIN personal p ON p.codigo_sabha = pt.codigo_sabha
                LEFT JOIN local l ON l.id = pt.id_local
                LEFT JOIN area a ON a.id = pt.id_area
                LEFT JOIN empresa e ON e.id = pt.id_empresa
                WHERE pt.id_empresa = $id_empresa and l.id = $value->id AND p.`sede_estudio` = pt.`nombre_local` GROUP BY l.id;";

            $result4 = $this->db->query($_sql4);
            if($result4->num_rows()>0){

                $total_trabajadores_2 += $result4->row()->trabajadores;

                $array['trabajadores'] = $result4->row()->trabajadores;

            }

            $nombre_empresa = $value->razon_social;
            $i++;

            array_push($reporte2, $array);
        }

        foreach($reporte2 as $k => $v){
            if($v['puestos']>= 1){
                $reporte2[$k]['porcentaje_puestos'] = round(($v['puestos']*100)/$total_puestos_2);
            }
            if($v['trabajadores']>= 1){
                $reporte2[$k]['porcentaje_trabajadores'] = round(($v['trabajadores']*100)/$total_trabajadores_2);
            }

        }

        $array_total = array(
            'nombre_empresa' => 'TOTAL GENERAL',
            'nombre_local' => '',
            'areas' => '',
            'puestos' => $total_puestos_2,
            'porcentaje_puestos' => 100,
            'trabajadores' => $total_trabajadores_2,
            'porcentaje_trabajadores' => 100
        );

        array_push($reporte2, $array_total);
        $resultado['reporte2'] = $reporte2;

        echo json_encode($resultado);
    }

    public function getAll(){
        $id_local = $this->input->post('id_local');
        $id_empresa = $this->session->id_empresa;
        $reporte = array();

        $_sql ="SELECT l.nombre nombre_local, a.nombre nombre_area,
                SUM(CASE WHEN pt.es_apto = 0 THEN 1 ELSE 0 END ) no_apto,
                SUM(CASE WHEN pt.es_apto = 1 THEN 1 ELSE 0 END) apto,
                SUM(CASE WHEN pt.es_apto is not null THEN 1 ELSE 0 END) total
                FROM puesto_trabajo pt
                LEFT JOIN local l ON l.id = pt.id_local
                LEFT JOIN area a ON a.id = pt.id_area
                WHERE pt.id_empresa = $id_empresa";

        $_sql .= $id_local != '' ? " AND pt.id_local = $id_local" :'';
        $_sql .= " GROUP BY l.id,a.id;";
        $result = $this->db->query($_sql);
        $nombre_local = '';
        $i = 0;

        $total_apto = 0;
        $total_no_apto = 0;
        $total_total = 0;

        if($id_local != ''){
            foreach ($result->result() as $key => $value) {
                if($i>0){
                    if($nombre_local != $value->nombre_local){
                        $nombre_local = $value->nombre_local;
                    }else{
                        $nombre_local = '';
                    }
                }else{
                    $nombre_local = $value->nombre_local;
                }

                $total_apto += $value->apto;
                $total_no_apto += $value->no_apto;
                $total_total += $value->total;

                $array = array(
                    'nombre_local' => $nombre_local,
                    'nombre_area' => $value->nombre_area,
                    'no_apto' => $value->no_apto,
                    'apto' => $value->apto,
                    'total' => $value->total
                );
                array_push($reporte, $array);
                $nombre_local = $value->nombre_local;
                $i++;
            }

            $array_total = array(
                'nombre_local' => 'TOTAL DE PUESTOS DE TRABAJO' ,
                'nombre_area' => '',
                'no_apto' => $total_no_apto,
                'apto' => $total_apto,
                'total' => $total_total
            );

            array_push($reporte, $array_total);
        }else{
            $total_local_apto = 0;
            $total_local_no_apto = 0;
            $total_local_total = 0;
            foreach ($result->result() as $key => $value) {
                if($i>0){
                    if($nombre_local != $value->nombre_local){
                        $array_local = array(
                            'nombre_local' => 'SUBTOTAL POR  PUESTO DE TRABAJO' ,
                            'nombre_area' => '',
                            'no_apto' => $total_local_no_apto,
                            'apto' => $total_local_apto,
                            'total' => $total_local_total
                        );

                        array_push($reporte, $array_local);
                        $nombre_local = $value->nombre_local;
                        $total_local_apto = 0;
                        $total_local_no_apto = 0;
                        $total_local_total = 0;
                    }else{
                        $nombre_local = '';
                    }
                }else{
                    $nombre_local = $value->nombre_local;
                }

                $total_local_apto += $value->apto;
                $total_local_no_apto += $value->no_apto;
                $total_local_total += $value->total;

                $total_apto += $value->apto;
                $total_no_apto += $value->no_apto;
                $total_total += $value->total;

                $array = array(
                    'nombre_local' => $nombre_local,
                    'nombre_area' => $value->nombre_area,
                    'no_apto' => $value->no_apto,
                    'apto' => $value->apto,
                    'total' => $value->total
                );
                array_push($reporte, $array);
                $nombre_local = $value->nombre_local;
                $i++;
            }

            $array_local = array(
                'nombre_local' => 'SUBTOTAL POR  PUESTO DE TRABAJO' ,
                'nombre_area' => '',
                'no_apto' => $total_local_no_apto,
                'apto' => $total_local_apto,
                'total' => $total_local_total
            );

            array_push($reporte, $array_local);

            $array_total = array(
                'nombre_local' => 'TOTALES DE PUESTOS DE TRABAJO' ,
                'nombre_area' => '',
                'no_apto' => $total_no_apto,
                'apto' => $total_apto,
                'total' => $total_total
            );

            array_push($reporte, $array_total);
        }


        $resultado['reporte'] = $reporte;


        echo json_encode($resultado);
    }

    public function exportar()
    {
        $result = array('status' => false, 'result' => null);
        $id_local = $this->input->post('id_local');
        $id_empresa = $this->session->id_empresa;

        $permisos = $this->session->userdata('permisos');
        if ($permisos['reporte/reportePuestos']['exportar'] == 1) {
            $labels_columns = array(' ',' ','APTO','NO APTO','GENERAL');

            $reporte = array();

            $_sql ="SELECT l.nombre nombre_local, a.nombre nombre_area,
                SUM(CASE WHEN pt.es_apto = 0 THEN 1 ELSE 0 END ) no_apto,
                SUM(CASE WHEN pt.es_apto = 1 THEN 1 ELSE 0 END) apto,
                SUM(CASE WHEN pt.es_apto is not null THEN 1 ELSE 0 END) total
                FROM puesto_trabajo pt
                LEFT JOIN local l ON l.id = pt.id_local
                LEFT JOIN area a ON a.id = pt.id_area
                WHERE pt.id_empresa = $id_empresa";

            $_sql .= $id_local != '' ? " AND pt.id_local = $id_local" :'';
            $_sql .= " GROUP BY l.id,a.id;";
            $query = $this->db->query($_sql);

            $nombre_local = '';
            $i = 0;
            $total_apto = 0;
            $total_no_apto = 0;
            $total_total = 0;

            if($id_local != ''){
                foreach ($query->result() as $key => $value) {
                    if($i>0){
                        if($nombre_local != $value->nombre_local){
                            $nombre_local = $value->nombre_local;
                        }else{
                            $nombre_local = '';
                        }
                    }else{
                        $nombre_local = $value->nombre_local;
                    }

                    $total_apto += $value->apto;
                    $total_no_apto += $value->no_apto;
                    $total_total += $value->total;

                    $array = array(
                        $nombre_local,
                        $value->nombre_area,
                        (int)$value->apto,
                        (int)$value->no_apto,
                        (int)$value->total
                    );
                    array_push($reporte, $array);
                    $nombre_local = $value->nombre_local;
                    $i++;
                }
                $array_total = array('TOTALES','',$total_apto,$total_no_apto,$total_total);
                array_push($reporte, $array_total);
            }else{
                $total_local_apto = 0;
                $total_local_no_apto = 0;
                $total_local_total = 0;

                foreach ($query->result() as $key => $value) {
                    if($i>0){
                        if($nombre_local != $value->nombre_local){
                            $array_local = array(
                                 'SUBTOTAL POR PUESTO DE TRABAJO' ,
                                '',
                                $total_local_apto,
                                $total_local_no_apto,
                                $total_local_total
                            );

                            array_push($reporte, $array_local);
                            $nombre_local = $value->nombre_local;
                            $total_local_apto = 0;
                            $total_local_no_apto = 0;
                            $total_local_total = 0;

                        }else{
                            $nombre_local = '';
                        }
                    }else{
                        $nombre_local = $value->nombre_local;
                    }

                    $total_local_apto += $value->apto;
                    $total_local_no_apto += $value->no_apto;
                    $total_local_total += $value->total;

                    $total_apto += $value->apto;
                    $total_no_apto += $value->no_apto;
                    $total_total += $value->total;

                    $array = array(
                        $nombre_local,
                        $value->nombre_area,
                        (int)$value->apto,
                        (int)$value->no_apto,
                        (int)$value->total
                    );
                    array_push($reporte, $array);
                    $nombre_local = $value->nombre_local;
                    $i++;
                }

                $array_local = array(
                    'SUBTOTAL POR PUESTO DE TRABAJO' ,
                    '',
                    $total_local_apto,
                    $total_local_no_apto,
                    $total_local_total
                );

                array_push($reporte, $array_local);

                $array_total = array('TOTAL DE PUESTOS DE TRABAJO','',$total_apto,$total_no_apto,$total_total);
                array_push($reporte, $array_total);
            }


            $file_name = 'reporte_';
            $label_sheet = 'REPORTE';
            $result['status']=true;
            $result['result'] = $this->boxspoutxls->create_pareto_detail_report_xlsx2($label_sheet, $labels_columns, $reporte,$file_name);
            echo json_encode($result);

        }else{
            $result['result'] = 'No tiene permisos para ejecutar esta acción.';
        }

    }

    public function reporteAptitud(){
        $this->load->view('header');
        $this->load->view('navbar');
        $data['locales'] = Local_model::where('id_empresa', '=', $this->session->id_empresa)->get();

        $permisos = $this->session->userdata('permisos');
        if (isset($permisos['reporte/reporteAptitud']['acceso']) && $permisos['reporte/reporteAptitud']['acceso'] == 1) {
            $this->load->view('reporte/reporteAptitud',$data);
        } else {
            $this->load->view('400/noacceso');
        }
        $this->load->view('footer');
    }

    public function reporteContingencia(){
        $this->load->view('header');
        $this->load->view('navbar');
        $data['locales'] = Local_model::where('id_empresa', '=', $this->session->id_empresa)->get();

        $permisos = $this->session->userdata('permisos');
        if (isset($permisos['reporte/reporteContingencia']['acceso']) && $permisos['reporte/reporteContingencia']['acceso'] == 1) {
            $this->load->view('reporte/reporteContingencia',$data);
        } else {
            $this->load->view('400/noacceso');
        }
        $this->load->view('footer');
    }

    public function reporteLocalArea(){
        $this->load->view('header');
        $this->load->view('navbar');
        $data['locales'] = Local_model::where('id_empresa', '=', $this->session->id_empresa)->get();

        $permisos = $this->session->userdata('permisos');
        if (isset($permisos['reporte/reporteLocalArea']['acceso']) && $permisos['reporte/reporteLocalArea']['acceso'] == 1) {
            $this->load->view('reporte/reporteLocalArea',$data);
        } else {
            $this->load->view('400/noacceso');
        }
        $this->load->view('footer');
    }

    public function reporte5Excel(){
        $id_local = $this->input->post('cmbLocal');
        $id_empresa = $this->session->id_empresa;
        $reporte = array();

        $_sql ="SELECT l.id,l.nombre nombre_local, count(distinct a.id) areas,
                SUM(CASE WHEN pt.es_apto = 1 AND pt.tipo_puesto = 'SOPORTE' THEN 1 ELSE 0 END ) apto_soporte,
                SUM(CASE WHEN pt.es_apto = 1 AND pt.tipo_puesto = 'CORE' THEN 1 ELSE 0 END) apto_core,
                SUM(CASE WHEN pt.es_apto = 0 AND pt.tipo_puesto = 'SOPORTE' THEN 1 ELSE 0 END ) no_apto_soporte,
                SUM(CASE WHEN pt.es_apto = 0 AND pt.tipo_puesto = 'CORE' THEN 1 ELSE 0 END) no_apto_core,
                SUM(CASE WHEN pt.es_apto = 1 or pt.es_apto = 0 THEN 1 ELSE 0 END) total
                FROM puesto_trabajo pt
                LEFT JOIN local l ON l.id = pt.id_local
                LEFT JOIN area a ON a.id = pt.id_area
                WHERE pt.id_empresa = $id_empresa";

        $_sql .= $id_local != '' ? " AND pt.id_local = $id_local" :'';
        $_sql .= " GROUP BY l.id ORDER BY 2";
        $result = $this->db->query($_sql);

        $total_apto_soporte_puestos = 0;
        $total_apto_core_puestos = 0;
        $total_no_apto_soporte_puestos = 0;
        $total_no_apto_core_puestos = 0;
        $total_total_puestos = 0;

        $total_apto_soporte_sap = 0;
        $total_apto_core_sap = 0;
        $total_no_apto_soporte_sap = 0;
        $total_no_apto_core_sap = 0;
        $total_total_sap = 0;


        foreach ($result->result() as $key => $value) {

            $total_apto_soporte_puestos += $value->apto_soporte;
            $total_apto_core_puestos += $value->apto_core;
            $total_no_apto_soporte_puestos += $value->no_apto_soporte;
            $total_no_apto_core_puestos += $value->no_apto_core;
            $total_total_puestos += $value->total;

            $array = array(
                'nombre_local' => $value->nombre_local,
                'areas' => $value->areas,
                'desc' =>'PUESTOS',
				'apto_core' => $value->apto_core,
                'apto_soporte' => $value->apto_soporte,
				'no_apto_core' => $value->no_apto_core,
				'no_apto_soporte' => $value->no_apto_soporte,
                'total' => $value->total
            );
            array_push($reporte, $array);

            $_sql2 ="SELECT SUM(CASE WHEN pt.es_apto = 1 AND pt.tipo_puesto = 'SOPORTE' THEN 1 ELSE 0 END ) apto_soporte,
                SUM(CASE WHEN pt.es_apto = 1 AND pt.tipo_puesto = 'CORE' THEN 1 ELSE 0 END) apto_core,
                SUM(CASE WHEN pt.es_apto = 0 AND pt.tipo_puesto = 'SOPORTE' THEN 1 ELSE 0 END ) no_apto_soporte,
                SUM(CASE WHEN pt.es_apto = 0 AND pt.tipo_puesto = 'CORE' THEN 1 ELSE 0 END) no_apto_core,
                SUM(CASE WHEN pt.es_apto = 1 or pt.es_apto = 0 THEN 1 ELSE 0 END) total
                FROM puesto_trabajo pt
                INNER JOIN personal p ON p.codigo_sabha = pt.codigo_sabha
                LEFT JOIN local l ON l.id = pt.id_local
                LEFT JOIN area a ON a.id = pt.id_area
                WHERE pt.id_empresa = $id_empresa and l.id = $value->id AND p.`sede_estudio` = pt.`nombre_local` GROUP BY l.id;";

            $result2 = $this->db->query($_sql2);
            if($result2->num_rows()>0){

                $total_apto_soporte_sap += $result2->row()->apto_soporte;
                $total_apto_core_sap += $result2->row()->apto_core;
                $total_no_apto_soporte_sap += $result2->row()->no_apto_soporte;
                $total_no_apto_core_sap += $result2->row()->no_apto_core;
                $total_total_sap += $result2->row()->total;

                $array = array(
                    'nombre_local' => '',
                    'areas' => '',
                    'desc' => 'Nro TRABAJADORES',
					'apto_core' => $result2->row()->apto_core,
					'apto_soporte' => $result2->row()->apto_soporte,
					'no_apto_core' => $result2->row()->no_apto_core,
                    'no_apto_soporte' => $result2->row()->no_apto_soporte,
                    'total' => $result2->row()->total
                );
                array_push($reporte, $array);
            }else{
                $array = array(
                    'nombre_local' => '',
                    'areas' => '',
                    'desc' => 'Nro TRABAJADORES',
					'apto_core' => '',
					'apto_soporte' => '',
					'no_apto_core' => '',
                    'no_apto_soporte' => '',
                    'total' => ''
                );
                array_push($reporte, $array);
            }
        }

        $array_total_puesto = array(
            'nombre_local' => 'Total PUESTOS' ,
            'areas' => '',
            'desc' => '',
			'apto_core' => $total_apto_core_puestos,
			'apto_soporte' => $total_apto_soporte_puestos,
			'no_apto_core' => $total_no_apto_core_puestos,
            'no_apto_soporte' => $total_no_apto_soporte_puestos,
            'total' => $total_total_puestos
        );

        array_push($reporte, $array_total_puesto);

        $array_total_sap = array(
            'nombre_local' => 'Total Nro TRABAJADORES' ,
            'areas' => '',
            'desc' => '',
			'apto_core' => $total_apto_core_sap,
			'apto_soporte' => $total_apto_soporte_sap,
			'no_apto_core' => $total_no_apto_core_sap,
            'no_apto_soporte' => $total_no_apto_soporte_sap,
            'total' => $total_total_sap
        );

        array_push($reporte, $array_total_sap);

        $objPHPExcel = new PHPExcel();
        // Set document properties
        $objPHPExcel->getProperties()->setCreator("GEORDI")
            ->setLastModifiedBy("GEORDI")
            ->setTitle("Reporte de Aptitud")
            ->setDescription("Reporte de Aptitud");

        // Nombre de Hola Excel
        $objPHPExcel->getActiveSheet()->setTitle('Tabla Nro. 6');
        // Titulos de la grilla
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'Tabla N° 6 Determinacion de la aptitud de puestos disponibles para incorporar personas con discapacidad');

        $objPHPExcel->getActiveSheet()->setCellValue('A3', 'SEDE');
        $objPHPExcel->getActiveSheet()->setCellValue('B3', 'NRO. AREAS');
        $objPHPExcel->getActiveSheet()->setCellValue('C3', '');
        $objPHPExcel->getActiveSheet()->setCellValue('D3', 'APTO');
        $objPHPExcel->getActiveSheet()->setCellValue('E3', '');
        $objPHPExcel->getActiveSheet()->setCellValue('F3', 'NO APTO');
        $objPHPExcel->getActiveSheet()->setCellValue('G3', '');
        $objPHPExcel->getActiveSheet()->setCellValue('H3', 'TOTAL');


        $objPHPExcel->getActiveSheet()->setCellValue('A4', '');
        $objPHPExcel->getActiveSheet()->setCellValue('B4', '');
        $objPHPExcel->getActiveSheet()->setCellValue('C4', '');
        $objPHPExcel->getActiveSheet()->setCellValue('D4', 'CORE');
        $objPHPExcel->getActiveSheet()->setCellValue('E4', 'SOPORTE');
        $objPHPExcel->getActiveSheet()->setCellValue('F4', 'CORE');
        $objPHPExcel->getActiveSheet()->setCellValue('G4', 'SOPORTE');
        $objPHPExcel->getActiveSheet()->setCellValue('H4', 'GENERAL');

        $objPHPExcel->getActiveSheet()->mergeCells('B3:C3');
        $objPHPExcel->getActiveSheet()->mergeCells('D3:E3');
        $objPHPExcel->getActiveSheet()->mergeCells('F3:G3');

        $objPHPExcel->getActiveSheet()->getStyle('A3:H3')->applyFromArray(
            array(
                'font'    => array(
                    'bold'      => false,
                    'color' => array('rgb' => 'FFFFFF'),
                    'size'  => 10,
                    'name'  => 'Arial'
                ),
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                ),
                'fill' => array(
                    'type'       => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
                    'startcolor' => array(
                        'argb' => '3B5A66'
                    )
                )
            )
        );

        $objPHPExcel->getActiveSheet()->getStyle('A4:H4')->applyFromArray(
            array(
                'font'    => array(
                    'bold'      => false,
                    'color' => array('rgb' => 'FFFFFF'),
                    'size'  => 10,
                    'name'  => 'Arial'
                ),
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                ),
                'fill' => array(
                    'type'       => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
                    'startcolor' => array(
                        'argb' => '3B5A66'
                    )
                )
            )
        );


        $objPHPExcel->getActiveSheet()->getStyle('A3:H3')->getFill()->applyFromArray(array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'startcolor' => array(
                'rgb' => '2C3A63'
            )
        ));

        $objPHPExcel->getActiveSheet()->getStyle('A4:H4')->getFill()->applyFromArray(array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'startcolor' => array(
                'rgb' => '2C3A63'
            )
        ));

        foreach(range('B','H') as $columnID)
        {
            $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
        }
//        $this->cellColor('A1:G1','#3B5A66');
//        $this->cellColor('A2:G2','#3B5A66');

        // Rellenamos con la data de retorno la hoja activa
        $objPHPExcel->getActiveSheet()->fromArray($reporte, NULL, 'A5');

        // Redirect output to a client’s web browser (Excel5)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="REPORTE_NRO6'. date('ymd') .'.xls"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
        header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header ('Pragma: public'); // HTTP/1.0

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;
    }

    public function exportContingencia(){
        $id_empresa = $this->session->id_empresa;

        $reporte = array();

        $_sql ="SELECT e.razon_social, ( SELECT count( distinct personal.`codigo_puesto_creado`) total
FROM personal
WHERE personal.id_empresa =  $id_empresa ) puestos,
				SUM(CASE WHEN pt.es_apto = 1 OR pt.es_apto = 0 THEN 1 ELSE 0 END ) puestos_evaluados,
				SUM(CASE WHEN pt.es_apto = 1 THEN 1 ELSE 0 END ) puestos_apto,
                SUM(CASE WHEN pt.es_apto = 0 THEN 1 ELSE 0 END) puestos_no_apto
                FROM puesto_trabajo pt
                LEFT JOIN empresa e ON e.id = pt.id_empresa
                WHERE pt.id_empresa = $id_empresa";

        $_sql .= " GROUP BY e.id;";
        $result = $this->db->query($_sql);
//        echo $_sql;

        foreach ($result->result() as $key => $value) {
            $reporte = array(
                'razon_social' => $value->razon_social,
                'nro_puestos' => $value->puestos,
                'nro_trabajadores' => 0,
                'contingencia1' => 0,
                'puestos_evaluados' => $value->puestos_evaluados,
                'trabajadores_evaluados' => 0,
                'contingencia2' => 0,
                'puestos_apto' => $value->puestos_apto,
                'puestos_no_apto' => $value->puestos_no_apto,
                'trabajadores_apto' =>0,
                'trabajadores_no_apto' => 0,
                'contigencia3' =>0,
                'contigencia4' => 0,
                'reduccion_contingencia' => 0
            );

            $_sql2 ="SELECT e.razon_social, (  SELECT COUNT(1) FROM personal WHERE personal.id_empresa = $id_empresa ) trabajadores,
				SUM(CASE WHEN pt.es_apto = 1 OR pt.es_apto = 0 THEN 1 ELSE 0 END ) trabajadores_evaluados,
				SUM(CASE WHEN pt.es_apto = 1 THEN 1 ELSE 0 END ) trabajadores_apto,
                SUM(CASE WHEN pt.es_apto = 0 THEN 1 ELSE 0 END) trabajadores_no_apto
                FROM puesto_trabajo pt
                INNER JOIN personal p ON p.codigo_sabha = pt.codigo_sabha
                LEFT JOIN empresa e ON e.id = pt.id_empresa
                WHERE pt.id_empresa = $id_empresa AND p.`sede_estudio` = pt.`nombre_local` GROUP BY e.id";

            $result2 = $this->db->query($_sql2);
            if($result2->num_rows()>0){
                $reporte['nro_trabajadores'] = $result2->row()->trabajadores;
                $reporte['contingencia1'] = round(($result2->row()->trabajadores*3)/100);
                $reporte['trabajadores_evaluados'] = $result2->row()->trabajadores_evaluados;
                $reporte['contingencia2'] = round(($result2->row()->trabajadores_evaluados*3)/100);
                $reporte['trabajadores_apto'] = $result2->row()->trabajadores_apto;
                $reporte['trabajadores_no_apto'] = $result2->row()->trabajadores_no_apto;
                $reporte['contingencia3'] = $result2->row()->trabajadores_apto;
                $reporte['contingencia4'] = round(($result2->row()->trabajadores_apto*3)/100);
                $reporte['reduccion_contingencia'] =round(($result2->row()->trabajadores_no_apto*3)/100);
            }

        }

        $objPHPExcel = new PHPExcel();
        // Set document properties
        $objPHPExcel->getProperties()->setCreator("GEORDI")
            ->setLastModifiedBy("GEORDI")
            ->setTitle("Reporte de contigencia de ley")
            ->setDescription("Reporte de contigencia de ley");

        // Nombre de Hola Excel
        $objPHPExcel->getActiveSheet()->setTitle('Tabla Nro. 7');
        // Titulos de la grilla
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'Nro. 7 Reducción de contingencia de ley');
        $objPHPExcel->getActiveSheet()->setCellValue('A2', $reporte['razon_social']);
        $objPHPExcel->getActiveSheet()->setCellValue('B2', 'NRO. PUESTOS');
        $objPHPExcel->getActiveSheet()->setCellValue('C2', 'TOTAL DE TRABAJADORES');

        $objPHPExcel->getActiveSheet()->getStyle('A2:C2')->applyFromArray(
            array(
                'font'    => array(
                    'bold'      => false,
                    'color' => array('rgb' => 'FFFFFF'),
                    'size'  => 10,
                    'name'  => 'Arial'
                ),
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                ),
                'fill' => array(
                    'type'       => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
                    'startcolor' => array(
                        'argb' => '3B5A66'
                    )
                )
            )
        );
        $objPHPExcel->getActiveSheet()->getStyle('A2:C2')->getFill()->applyFromArray(array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'startcolor' => array(
                'rgb' => '3B5A66'
            )
        ));

        $objPHPExcel->getActiveSheet()->setCellValue('A3', 'TOTAL');
        $objPHPExcel->getActiveSheet()->setCellValue('B3', $reporte['nro_puestos']);
        $objPHPExcel->getActiveSheet()->setCellValue('C3', $reporte['nro_trabajadores']);
        $objPHPExcel->getActiveSheet()->setCellValue('A4', 'CONTINGENCIA');
        $objPHPExcel->getActiveSheet()->setCellValue('B4', '%3');
        $objPHPExcel->getActiveSheet()->setCellValue('C4', $reporte['contingencia1']);


        $objPHPExcel->getActiveSheet()->setCellValue('A6', 'EVALUACION SABHA');
        $objPHPExcel->getActiveSheet()->setCellValue('B6', '');
        $objPHPExcel->getActiveSheet()->setCellValue('C6', '');
        $objPHPExcel->getActiveSheet()->mergeCells('A6:C6');


        $objPHPExcel->getActiveSheet()->getStyle('A6:C6')->applyFromArray(
            array(
                'font'    => array(
                    'bold'      => false,
                    'color' => array('rgb' => 'FFFFFF'),
                    'size'  => 10,
                    'name'  => 'Arial'
                ),
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                ),
                'fill' => array(
                    'type'       => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
                    'startcolor' => array(
                        'argb' => '3B5A66'
                    )
                )
            )
        );
        $objPHPExcel->getActiveSheet()->getStyle('A6:C6')->getFill()->applyFromArray(array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'startcolor' => array(
                'rgb' => '2C3A63'
            )
        ));


        $objPHPExcel->getActiveSheet()->setCellValue('A7', 'PUESTOS EVALUADOS');
        $objPHPExcel->getActiveSheet()->setCellValue('B7', $reporte['puestos_evaluados']);
        $objPHPExcel->getActiveSheet()->setCellValue('C7', $reporte['trabajadores_evaluados']);
        $objPHPExcel->getActiveSheet()->setCellValue('A8', 'CONTINGENCIA');
        $objPHPExcel->getActiveSheet()->setCellValue('B8', '%3');
        $objPHPExcel->getActiveSheet()->setCellValue('C8', $reporte['contingencia2']);



        $objPHPExcel->getActiveSheet()->setCellValue('A10', 'IMPLEMENTACION GEORDI');
        $objPHPExcel->getActiveSheet()->setCellValue('B10', '');
        $objPHPExcel->getActiveSheet()->setCellValue('C10', '');
        $objPHPExcel->getActiveSheet()->mergeCells('A10:C10');

        $objPHPExcel->getActiveSheet()->getStyle('A10:C10')->applyFromArray(
            array(
                'font'    => array(
                    'bold'      => false,
                    'color' => array('rgb' => 'FFFFFF'),
                    'size'  => 10,
                    'name'  => 'Arial'
                ),
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                ),
                'fill' => array(
                    'type'       => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
                    'startcolor' => array(
                        'argb' => '3B5A66'
                    )
                )
            )
        );
        $objPHPExcel->getActiveSheet()->getStyle('A10:C10')->getFill()->applyFromArray(array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'startcolor' => array(
                'rgb' => '2C3A63'
            )
        ));

        $objPHPExcel->getActiveSheet()->setCellValue('A11', 'PUESTOS NO APTOS');
        $objPHPExcel->getActiveSheet()->setCellValue('B11', $reporte['puestos_no_apto']);
        $objPHPExcel->getActiveSheet()->setCellValue('C11', $reporte['trabajadores_no_apto']);

        $objPHPExcel->getActiveSheet()->setCellValue('A12', 'PUESTOS APTOS');
        $objPHPExcel->getActiveSheet()->setCellValue('B12', $reporte['puestos_apto']);
        $objPHPExcel->getActiveSheet()->setCellValue('C12', $reporte['trabajadores_apto']);

        $objPHPExcel->getActiveSheet()->setCellValue('A13', 'NUEVA CONTINGENCIA');
        $objPHPExcel->getActiveSheet()->setCellValue('B13', '');
        $objPHPExcel->getActiveSheet()->setCellValue('C13', $reporte['contingencia3']);



        $objPHPExcel->getActiveSheet()->setCellValue('A15', 'CONTINGENCIA');
        $objPHPExcel->getActiveSheet()->setCellValue('B15', '3%');
        $objPHPExcel->getActiveSheet()->setCellValue('C15', $reporte['contingencia4']);
        $objPHPExcel->getActiveSheet()->setCellValue('A16', 'REDUCCION DE CONTINGENCIA');
        $objPHPExcel->getActiveSheet()->setCellValue('B16', '');
        $objPHPExcel->getActiveSheet()->setCellValue('C16', $reporte['reduccion_contingencia']);

        $objPHPExcel->getActiveSheet()->getStyle('A15:C15')->applyFromArray(
            array(
                'font'    => array(
                    'bold'      => false,
                    'color' => array('rgb' => 'FFFFFF'),
                    'size'  => 10,
                    'name'  => 'Arial'
                ),
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                ),
                'fill' => array(
                    'type'       => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
                    'startcolor' => array(
                        'argb' => '848484'
                    )
                )
            )
        );
        $objPHPExcel->getActiveSheet()->getStyle('A15:C15')->getFill()->applyFromArray(array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'startcolor' => array(
                'rgb' => '848484'
            )
        ));

        $objPHPExcel->getActiveSheet()->getStyle('A16:C16')->applyFromArray(
            array(
                'font'    => array(
                    'bold'      => false,
                    'color' => array('rgb' => 'FFFFFF'),
                    'size'  => 10,
                    'name'  => 'Arial'
                ),
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                ),
                'fill' => array(
                    'type'       => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
                    'startcolor' => array(
                        'argb' => '848484'
                    )
                )
            )
        );
        $objPHPExcel->getActiveSheet()->getStyle('A16:C16')->getFill()->applyFromArray(array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'startcolor' => array(
                'rgb' => '2C3A63'
            )
        ));

        foreach(range('B','C') as $columnID)
        {
            $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
        }


        // Redirect output to a client’s web browser (Excel5)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="REPORTE_NRO7_'. date('ymd') .'.xls"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
        header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header ('Pragma: public'); // HTTP/1.0

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;
    }

    public function exportLocalArea(){
        $id_local = $this->input->post('id_local');
        $id_empresa = $this->session->id_empresa;
        $reporte = array();

        $_sql ="SELECT l.id,l.nombre nombre_local, count(distinct a.id) areas,
                SUM(CASE WHEN pt.tipo_puesto = 'CORE' THEN 1 ELSE 0 END ) puestos_core,
                SUM(CASE WHEN pt.tipo_puesto = 'SOPORTE' THEN 1 ELSE 0 END) puestos_soporte,
                SUM(CASE WHEN pt.tipo_puesto = 'CORE' OR pt.tipo_puesto = 'SOPORTE' THEN 1 ELSE 0 END ) total_puestos
                FROM puesto_trabajo pt
                LEFT JOIN local l ON l.id = pt.id_local
                LEFT JOIN area a ON a.id = pt.id_area
                WHERE pt.id_empresa = $id_empresa";

        $_sql .= $id_local != '' ? " AND pt.id_local = $id_local" :'';
        $_sql .= " GROUP BY l.id ORDER BY 2";
        $result = $this->db->query($_sql);

        $total_core_puestos = 0;
        $total_soporte_puestos = 0;
        $total_soporte_trabajadores = 0;
        $total_core_trabajadores= 0;
        $total_puestos = 0;
        $total_trabajadores= 0;

        foreach ($result->result() as $key => $value) {

            $total_core_puestos += $value->puestos_core;
            $total_soporte_puestos += $value->puestos_soporte;
            $total_puestos += $value->total_puestos;

            $array = array(
                'nombre_local' => $value->nombre_local,
                'areas' => $value->areas,
                'puestos_core' =>$value->puestos_core,
                'trabajadores_core' => 0,
                'porcentaje_core' => 0,
                'puestos_soporte' => $value->puestos_soporte,
                'trabajadores_soporte' => 0,
                'porcentaje_soporte' => 0,
                'total_puestos' => $value->total_puestos,
                'total_trabajadores' => 0,
                'total_porcentaje' => 0
            );

            $_sql2 ="SELECT l.id,l.nombre nombre_local, count(distinct a.id) areas,
                SUM(CASE WHEN pt.tipo_puesto = 'CORE' THEN 1 ELSE 0 END ) trabajadores_core,
                SUM(CASE WHEN pt.tipo_puesto = 'SOPORTE' THEN 1 ELSE 0 END) trabajadores_soporte,
                SUM(CASE WHEN pt.tipo_puesto = 'CORE' OR pt.tipo_puesto = 'SOPORTE' THEN 1 ELSE 0 END ) total_trabajadores
                FROM puesto_trabajo pt
                INNER JOIN personal p ON p.codigo_sabha = pt.codigo_sabha
                LEFT JOIN local l ON l.id = pt.id_local
                LEFT JOIN area a ON a.id = pt.id_area
                WHERE pt.id_empresa = ". $id_empresa ." AND l.id = $value->id AND p.`sede_estudio` = l.`nombre` GROUP BY l.id;";

            $result2 = $this->db->query($_sql2);
            if($result2->num_rows()>0){

                $total_soporte_trabajadores += $result2->row()->trabajadores_soporte;
                $total_core_trabajadores += $result2->row()->trabajadores_core;
                $total_trabajadores += $result2->row()->total_trabajadores;

                $array['trabajadores_core']=$result2->row()->trabajadores_core;
                $array['trabajadores_soporte']=$result2->row()->trabajadores_soporte;
                $array['total_trabajadores']=$result2->row()->total_trabajadores;
            }
            array_push($reporte, $array);
        }

        foreach($reporte as $k => $v){
            if($v['trabajadores_core']>= 1){
                $reporte[$k]['porcentaje_core'] = number_format(($v['trabajadores_core']*100)/$total_core_trabajadores,2,'.','');
            }
            if($v['trabajadores_soporte']>= 1){
                $reporte[$k]['porcentaje_soporte'] = number_format(($v['trabajadores_soporte']*100)/$total_soporte_trabajadores,2,'.','');
            }
            if($v['total_trabajadores']>= 1){
                $reporte[$k]['total_porcentaje'] = number_format(($v['total_trabajadores']*100)/$total_trabajadores,2,'.','');
            }
        }

        $array_total = array(
            'nombre_local' => 'Total Result',
            'areas' => '',
            'puestos_core' =>$total_core_puestos,
            'trabajadores_core' => $total_core_trabajadores,
            'porcentaje_core' => 100,
            'puestos_soporte' => $total_soporte_puestos,
            'trabajadores_soporte' => $total_soporte_trabajadores,
            'porcentaje_soporte' => 100,
            'total_puestos' => $total_puestos,
            'total_trabajadores' => $total_trabajadores,
            'total_porcentaje' => 100
        );

        array_push($reporte, $array_total);

        $objPHPExcel = new PHPExcel();
        // Set document properties
        $objPHPExcel->getProperties()->setCreator("GEORDI")
            ->setLastModifiedBy("GEORDI")
            ->setTitle("Reporte por Sede y Area")
            ->setDescription("Distribucion de puestos de trabajo por  unidad de producción y area");

        // Nombre de Hola Excel
        $objPHPExcel->getActiveSheet()->setTitle('Tabla Nro. 3');
        // Titulos de la grilla
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'Nro. 3 Distribución de puestos de trabajo por unidad de producción y área');

        $objPHPExcel->getActiveSheet()->setCellValue('A2', 'SEDE');
        $objPHPExcel->getActiveSheet()->setCellValue('B2', 'NRO. AREAS EVALUADAS');
        $objPHPExcel->getActiveSheet()->setCellValue('C2', 'TIPO PUESTO');
        $objPHPExcel->getActiveSheet()->setCellValue('D2', '');
        $objPHPExcel->getActiveSheet()->setCellValue('E2', '');
        $objPHPExcel->getActiveSheet()->setCellValue('F2', '');
        $objPHPExcel->getActiveSheet()->setCellValue('G2', '');
        $objPHPExcel->getActiveSheet()->setCellValue('H2', 'TOTAL');
        $objPHPExcel->getActiveSheet()->setCellValue('I2', '');
        $objPHPExcel->getActiveSheet()->setCellValue('J2', '');
        $objPHPExcel->getActiveSheet()->setCellValue('K2', '');


        $objPHPExcel->getActiveSheet()->setCellValue('A3', '');
        $objPHPExcel->getActiveSheet()->setCellValue('B3', '');
        $objPHPExcel->getActiveSheet()->setCellValue('C3', 'CORE');
        $objPHPExcel->getActiveSheet()->setCellValue('D3', '');
        $objPHPExcel->getActiveSheet()->setCellValue('E3', '');
        $objPHPExcel->getActiveSheet()->setCellValue('F3', 'SOPORTE');
        $objPHPExcel->getActiveSheet()->setCellValue('G3', '');
        $objPHPExcel->getActiveSheet()->setCellValue('H3', '');
        $objPHPExcel->getActiveSheet()->setCellValue('I3', '');
        $objPHPExcel->getActiveSheet()->setCellValue('J3', '');
        $objPHPExcel->getActiveSheet()->setCellValue('K3', '');

        $objPHPExcel->getActiveSheet()->setCellValue('A4', '');
        $objPHPExcel->getActiveSheet()->setCellValue('B4', '');
        $objPHPExcel->getActiveSheet()->setCellValue('C4', 'PUESTOS');
        $objPHPExcel->getActiveSheet()->setCellValue('D4', 'NRO. TRABAJADORES');
        $objPHPExcel->getActiveSheet()->setCellValue('E4', '');
        $objPHPExcel->getActiveSheet()->setCellValue('F4', 'PUESTOS');
        $objPHPExcel->getActiveSheet()->setCellValue('G4', 'NRO. TRABAJADORES');
        $objPHPExcel->getActiveSheet()->setCellValue('H4', '');
        $objPHPExcel->getActiveSheet()->setCellValue('I4', 'PUESTOS');
        $objPHPExcel->getActiveSheet()->setCellValue('J4', 'NRO. TRABAJADORES');
        $objPHPExcel->getActiveSheet()->setCellValue('K4', '');

        $objPHPExcel->getActiveSheet()->mergeCells('C2:G2');
        $objPHPExcel->getActiveSheet()->mergeCells('H2:K2');
        $objPHPExcel->getActiveSheet()->mergeCells('F2:G2');
        $objPHPExcel->getActiveSheet()->mergeCells('C3:E3');
        $objPHPExcel->getActiveSheet()->mergeCells('F3:H3');
        $objPHPExcel->getActiveSheet()->mergeCells('D4:E4');
        $objPHPExcel->getActiveSheet()->mergeCells('G4:H4');
        $objPHPExcel->getActiveSheet()->mergeCells('J4:K4');

        $objPHPExcel->getActiveSheet()->getStyle('A2:K2')->applyFromArray(
            array(
                'font'    => array(
                    'bold'      => false,
                    'color' => array('rgb' => 'FFFFFF'),
                    'size'  => 10,
                    'name'  => 'Arial'
                ),
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                ),
                'fill' => array(
                    'type'       => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
                    'startcolor' => array(
                        'argb' => '3B5A66'
                    )
                )
            )
        );

        $objPHPExcel->getActiveSheet()->getStyle('A3:K3')->applyFromArray(
            array(
                'font'    => array(
                    'bold'      => false,
                    'color' => array('rgb' => 'FFFFFF'),
                    'size'  => 10,
                    'name'  => 'Arial'
                ),
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                ),
                'fill' => array(
                    'type'       => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
                    'startcolor' => array(
                        'argb' => '3B5A66'
                    )
                )
            )
        );

        $objPHPExcel->getActiveSheet()->getStyle('A4:K4')->applyFromArray(
            array(
                'font'    => array(
                    'bold'      => false,
                    'color' => array('rgb' => 'FFFFFF'),
                    'size'  => 10,
                    'name'  => 'Arial'
                ),
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                ),
                'fill' => array(
                    'type'       => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
                    'startcolor' => array(
                        'argb' => '3B5A66'
                    )
                )
            )
        );


        $objPHPExcel->getActiveSheet()->getStyle('A2:K2')->getFill()->applyFromArray(array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'startcolor' => array(
                'rgb' => '2C3A63'
            )
        ));

        $objPHPExcel->getActiveSheet()->getStyle('A3:K3')->getFill()->applyFromArray(array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'startcolor' => array(
                'rgb' => '2C3A63'
            )
        ));

        $objPHPExcel->getActiveSheet()->getStyle('A4:K4')->getFill()->applyFromArray(array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'startcolor' => array(
                'rgb' => '2C3A63'
            )
        ));

        foreach(range('B','K') as $columnID)
        {
            $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
        }
//        $this->cellColor('A1:G1','#3B5A66');
//        $this->cellColor('A2:G2','#3B5A66');

        // Rellenamos con la data de retorno la hoja activa
        $objPHPExcel->getActiveSheet()->fromArray($reporte, NULL, 'A5');

        // Redirect output to a client’s web browser (Excel5)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="REPORTE_NRO3'. date('ymd') .'.xls"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
        header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header ('Pragma: public'); // HTTP/1.0

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;
    }


    public function getAll5(){
        $id_local = $this->input->post('id_local');
        $id_empresa = $this->session->id_empresa;
        $reporte = array();

        $_sql ="SELECT l.id,l.nombre nombre_local, count(distinct a.id) areas,
                SUM(CASE WHEN pt.es_apto = 1 AND pt.tipo_puesto = 'SOPORTE' THEN 1 ELSE 0 END ) apto_soporte,
                SUM(CASE WHEN pt.es_apto = 1 AND pt.tipo_puesto = 'CORE' THEN 1 ELSE 0 END) apto_core,
                SUM(CASE WHEN pt.es_apto = 0 AND pt.tipo_puesto = 'SOPORTE' THEN 1 ELSE 0 END ) no_apto_soporte,
                SUM(CASE WHEN pt.es_apto = 0 AND pt.tipo_puesto = 'CORE' THEN 1 ELSE 0 END) no_apto_core,
                SUM(CASE WHEN pt.es_apto = 1 or pt.es_apto = 0 THEN 1 ELSE 0 END) total
                FROM puesto_trabajo pt
                LEFT JOIN local l ON l.id = pt.id_local
                LEFT JOIN area a ON a.id = pt.id_area
                WHERE pt.id_empresa = $id_empresa";

        $_sql .= $id_local != '' ? " AND pt.id_local = $id_local" :'';
        $_sql .= " GROUP BY l.id ORDER BY 2";
        $result = $this->db->query($_sql);

        $total_apto_soporte_puestos = 0;
        $total_apto_core_puestos = 0;
        $total_no_apto_soporte_puestos = 0;
        $total_no_apto_core_puestos = 0;
        $total_total_puestos = 0;

        $total_apto_soporte_sap = 0;
        $total_apto_core_sap = 0;
        $total_no_apto_soporte_sap = 0;
        $total_no_apto_core_sap = 0;
        $total_total_sap = 0;


            foreach ($result->result() as $key => $value) {

                $total_apto_soporte_puestos += $value->apto_soporte;
                $total_apto_core_puestos += $value->apto_core;
                $total_no_apto_soporte_puestos += $value->no_apto_soporte;
                $total_no_apto_core_puestos += $value->no_apto_core;
                $total_total_puestos += $value->total;

                $array = array(
                    'nombre_local' => $value->nombre_local,
                    'areas' => $value->areas,
                    'desc' =>'PUESTOS',
                    'apto_soporte' => $value->apto_soporte,
                    'apto_core' => $value->apto_core,
                    'no_apto_soporte' => $value->no_apto_soporte,
                    'no_apto_core' => $value->no_apto_core,
                    'total' => $value->total
                );
                array_push($reporte, $array);

                $_sql2 ="SELECT SUM(CASE WHEN pt.es_apto = 1 AND pt.tipo_puesto = 'SOPORTE' THEN 1 ELSE 0 END ) apto_soporte,
                SUM(CASE WHEN pt.es_apto = 1 AND pt.tipo_puesto = 'CORE' THEN 1 ELSE 0 END) apto_core,
                SUM(CASE WHEN pt.es_apto = 0 AND pt.tipo_puesto = 'SOPORTE' THEN 1 ELSE 0 END ) no_apto_soporte,
                SUM(CASE WHEN pt.es_apto = 0 AND pt.tipo_puesto = 'CORE' THEN 1 ELSE 0 END) no_apto_core,
                SUM(CASE WHEN pt.es_apto = 1 or pt.es_apto = 0 THEN 1 ELSE 0 END) total
                FROM puesto_trabajo pt
                INNER JOIN personal p ON p.codigo_sabha = pt.codigo_sabha
                LEFT JOIN local l ON l.id = pt.id_local
                LEFT JOIN area a ON a.id = pt.id_area
                WHERE pt.id_empresa = $id_empresa and l.id = $value->id AND p.`sede_estudio` = pt.`nombre_local`GROUP BY l.id;";

                $result2 = $this->db->query($_sql2);
                if($result2->num_rows()>0){

                    $total_apto_soporte_sap += $result2->row()->apto_soporte;
                    $total_apto_core_sap += $result2->row()->apto_core;
                    $total_no_apto_soporte_sap += $result2->row()->no_apto_soporte;
                    $total_no_apto_core_sap += $result2->row()->no_apto_core;
                    $total_total_sap += $result2->row()->total;

                    $array = array(
                        'nombre_local' => '',
                        'areas' => '',
                        'desc' => 'Nro TRABAJADORES',
                        'apto_soporte' => $result2->row()->apto_soporte,
                        'apto_core' => $result2->row()->apto_core,
                        'no_apto_soporte' => $result2->row()->no_apto_soporte,
                        'no_apto_core' => $result2->row()->no_apto_core,
                        'total' => $result2->row()->total
                    );
                    array_push($reporte, $array);
                }else{
                    $array = array(
                        'nombre_local' => '',
                        'areas' => '',
                        'desc' => 'Nro TRABAJADORES',
                        'apto_soporte' => '',
                        'apto_core' => '',
                        'no_apto_soporte' => '',
                        'no_apto_core' => '',
                        'total' => ''
                    );
                    array_push($reporte, $array);
                }
            }

        $array_total_puesto = array(
            'nombre_local' => 'Total PUESTOS' ,
            'areas' => '',
            'desc' => '',
            'apto_soporte' => $total_apto_soporte_puestos,
            'apto_core' => $total_apto_core_puestos,
            'no_apto_soporte' => $total_no_apto_soporte_puestos,
            'no_apto_core' => $total_no_apto_core_puestos,
            'total' => $total_total_puestos
        );

        array_push($reporte, $array_total_puesto);

        $array_total_sap = array(
            'nombre_local' => 'Total Nro TRABAJADORES' ,
            'areas' => '',
            'desc' => '',
            'apto_soporte' => $total_apto_soporte_sap,
            'apto_core' => $total_apto_core_sap,
            'no_apto_soporte' => $total_no_apto_soporte_sap,
            'no_apto_core' => $total_no_apto_core_sap,
            'total' => $total_total_sap
        );

        array_push($reporte, $array_total_sap);



        $resultado['reporte'] = $reporte;


        echo json_encode($resultado);
    }

    public function getAllLocalArea(){
        $id_local = $this->input->post('id_local');
        $id_empresa = $this->session->id_empresa;
        $reporte = array();

        $_sql ="SELECT l.id,l.nombre nombre_local, count(distinct a.id) areas,
                SUM(CASE WHEN pt.tipo_puesto = 'CORE' THEN 1 ELSE 0 END ) puestos_core,
                SUM(CASE WHEN pt.tipo_puesto = 'SOPORTE' THEN 1 ELSE 0 END) puestos_soporte,
                SUM(CASE WHEN pt.tipo_puesto = 'CORE' OR pt.tipo_puesto = 'SOPORTE' THEN 1 ELSE 0 END ) total_puestos
                FROM puesto_trabajo pt
                LEFT JOIN local l ON l.id = pt.id_local
                LEFT JOIN area a ON a.id = pt.id_area
                WHERE pt.id_empresa = $id_empresa";

        $_sql .= $id_local != '' ? " AND pt.id_local = $id_local" :'';
        $_sql .= " GROUP BY l.id ORDER BY 2";
        $result = $this->db->query($_sql);

        $total_core_puestos = 0;
        $total_soporte_puestos = 0;
        $total_soporte_trabajadores = 0;
        $total_core_trabajadores= 0;
        $total_puestos = 0;
        $total_trabajadores= 0;

        foreach ($result->result() as $key => $value) {

            $total_core_puestos += $value->puestos_core;
            $total_soporte_puestos += $value->puestos_soporte;
            $total_puestos += $value->total_puestos;

            $array = array(
                'nombre_local' => $value->nombre_local,
                'areas' => $value->areas,
                'puestos_core' =>$value->puestos_core,
                'trabajadores_core' => 0,
                'porcentaje_core' => 0,
                'puestos_soporte' => $value->puestos_soporte,
                'trabajadores_soporte' => 0,
                'porcentaje_soporte' => 0,
                'total_puestos' => $value->total_puestos,
                'total_trabajadores' => 0,
                'total_porcentaje' => 0
            );

            $_sql2 ="SELECT l.id,l.nombre nombre_local, count(distinct a.id) areas,
                SUM(CASE WHEN pt.tipo_puesto = 'CORE' THEN 1 ELSE 0 END ) trabajadores_core,
                SUM(CASE WHEN pt.tipo_puesto = 'SOPORTE' THEN 1 ELSE 0 END) trabajadores_soporte,
                SUM(CASE WHEN pt.tipo_puesto = 'CORE' OR pt.tipo_puesto = 'SOPORTE' THEN 1 ELSE 0 END ) total_trabajadores
                FROM puesto_trabajo pt
                INNER JOIN personal p ON p.codigo_sabha = pt.codigo_sabha
                LEFT JOIN local l ON l.id = pt.id_local
                LEFT JOIN area a ON a.id = pt.id_area
                WHERE pt.id_empresa = ". $id_empresa ." AND l.id = $value->id AND p.`sede_estudio` = l.`nombre` GROUP BY l.id;";

            $result2 = $this->db->query($_sql2);
            if($result2->num_rows()>0){

                $total_soporte_trabajadores += $result2->row()->trabajadores_soporte;
                $total_core_trabajadores += $result2->row()->trabajadores_core;
                $total_trabajadores += $result2->row()->total_trabajadores;

                $array['trabajadores_core']=$result2->row()->trabajadores_core;
                $array['trabajadores_soporte']=$result2->row()->trabajadores_soporte;
                $array['total_trabajadores']=$result2->row()->total_trabajadores;
            }
            array_push($reporte, $array);
        }

        foreach($reporte as $k => $v){
            if($v['trabajadores_core']>= 1){
                $reporte[$k]['porcentaje_core'] = number_format(($v['trabajadores_core']*100)/$total_core_trabajadores,2,'.','');
            }
            if($v['trabajadores_soporte']>= 1){
                $reporte[$k]['porcentaje_soporte'] = number_format(($v['trabajadores_soporte']*100)/$total_soporte_trabajadores,2,'.','');
            }
            if($v['total_trabajadores']>= 1){
                $reporte[$k]['total_porcentaje'] = number_format(($v['total_trabajadores']*100)/$total_trabajadores,2,'.','');
            }
        }

        $array_total = array(
            'nombre_local' => 'Total Result',
            'areas' => '',
            'puestos_core' =>$total_core_puestos,
            'trabajadores_core' => $total_core_trabajadores,
            'porcentaje_core' => 100,
            'puestos_soporte' => $total_soporte_puestos,
            'trabajadores_soporte' => $total_soporte_trabajadores,
            'porcentaje_soporte' => 100,
            'total_puestos' => $total_puestos,
            'total_trabajadores' => $total_trabajadores,
            'total_porcentaje' => 100
        );

        array_push($reporte, $array_total);

        $resultado['reporte'] = $reporte;


        echo json_encode($resultado);
    }


    public function reporteProduccionArea() {

		$this->load->view('header');
		$this->load->view('navbar');
		$data['locales'] = Local_model::where('id_empresa', '=', $this->session->id_empresa)->get();

//		$permisos = $this->session->userdata('permisos');
//		if (isset($permisos['reporte/reporteProduccionArea']['acceso']) && $permisos['reporte/reporteProduccionArea']['acceso'] == 1) {
			$this->load->view('reporte/reporteProduccionArea',$data);
//		} else {
//			$this->load->view('400/noacceso');
//		}
		$this->load->view('footer');

	}


    public function reporteLocal() {

        $this->load->view('header');
        $this->load->view('navbar');
        $data['locales'] = Local_model::where('id_empresa', '=', $this->session->id_empresa)->get();

       $this->load->view('reporte/reporteLocal',$data);
        $this->load->view('footer');

    }

	public function getAllProduccionArea() {
		$id_local = $this->input->post('id_local');
		$id_empresa = $this->session->id_empresa;
		$reporte = array();

		$_sql ="SELECT l.id,l.nombre nombre_local, (SELECT count(distinct id_area) FROM puesto_trabajo
                WHERE id_local = l.id AND es_apto IS NOT NULL AND id_empresa = $id_empresa) areas, pt.`eva_erin_resultado`,
                SUM(CASE WHEN (pt.es_apto = 1 OR pt.es_apto = 0) AND pt.tipo_puesto = 'SOPORTE' THEN 1 ELSE 0 END ) puestos_soporte,
				SUM(CASE WHEN (pt.es_apto = 1 OR pt.es_apto = 0) AND pt.tipo_puesto = 'CORE' THEN 1 ELSE 0 END) puestos_core,
				SUM(CASE WHEN (pt.es_apto = 1 OR pt.es_apto = 0) AND (pt.tipo_puesto = 'SOPORTE' OR pt.tipo_puesto = 'CORE') THEN 1 ELSE 0 END) total
                FROM puesto_trabajo pt
                LEFT JOIN local l ON l.id = pt.id_local
                LEFT JOIN area a ON a.id = pt.id_area
                WHERE pt.id_empresa = $id_empresa";

		$_sql .= $id_local != '' ? " AND pt.id_local = $id_local" :'';
		$_sql .= " GROUP BY pt.`eva_erin_resultado`, l.id ORDER BY 2";
		$result = $this->db->query($_sql);

		$total_apto_soporte_puestos = 0;
		$total_apto_core_puestos = 0;
		$total_no_apto_soporte_puestos = 0;
		$total_no_apto_core_puestos = 0;
		$total_total_puestos = 0;

		$total_apto_soporte_sap = 0;
		$total_apto_core_sap = 0;
		$total_no_apto_soporte_sap = 0;
		$total_no_apto_core_sap = 0;
		$total_total_sap = 0;


		foreach ($result->result() as $key => $value) {

			$total_apto_soporte_puestos += $value->puestos_soporte;
			$total_apto_core_puestos += $value->puestos_core;

			$total_total_puestos += $value->total;

			$array = array(
				'nombre_local' => $value->nombre_local,
				'evaerin' => $value->eva_erin_resultado,
				'areas' => $value->areas,
				'desc' =>'PUESTOS',
				'puestos_soporte' => $value->puestos_soporte,
				'puestos_core' => $value->puestos_core,
				'total' => $value->total
			);
			array_push($reporte, $array);

			$_sql2 ="SELECT 
				SUM(CASE WHEN (pt.es_apto = 1 OR pt.es_apto = 0) AND pt.tipo_puesto = 'SOPORTE' THEN 1 ELSE 0 END ) puestos_soporte,
				SUM(CASE WHEN (pt.es_apto = 1 OR pt.es_apto = 0) AND pt.tipo_puesto = 'CORE' THEN 1 ELSE 0 END) puestos_core,
				SUM(CASE WHEN (pt.es_apto = 1 OR pt.es_apto = 0) AND (pt.tipo_puesto = 'SOPORTE' OR pt.tipo_puesto = 'CORE') THEN 1 ELSE 0 END) total
                FROM puesto_trabajo pt
                INNER JOIN personal p ON p.codigo_sabha = pt.codigo_sabha
                LEFT JOIN local l ON l.id = pt.id_local
                LEFT JOIN area a ON a.id = pt.id_area
                WHERE pt.id_empresa = $id_empresa and l.id = $value->id AND p.`sede_estudio` = l.`nombre`
                AND pt.`eva_erin_resultado` = '$value->eva_erin_resultado'
                GROUP BY pt.`eva_erin_resultado`, l.id;";

			$result2 = $this->db->query($_sql2);
			if($result2->num_rows()>0){

				$total_apto_soporte_sap += $result2->row()->puestos_soporte;
				$total_apto_core_sap += $result2->row()->puestos_core;
				$total_total_sap += $result2->row()->total;

				$array = array(
					'nombre_local' => '',
					'evaerin' => '',
					'areas' => '',
					'desc' => 'Nro TRABAJADORES',
					'puestos_soporte' => $result2->row()->puestos_soporte,
					'puestos_core' => $result2->row()->puestos_core,
					'total' => $result2->row()->total
				);
				array_push($reporte, $array);
			}else{
				$array = array(
					'nombre_local' => '',
					'evaerin' => '',
					'areas' => '',
					'desc' => 'Nro TRABAJADORES',
					'puestos_soporte' => '',
					'puestos_core' => '',
					'total' => ''
				);
				array_push($reporte, $array);
			}
		}

		$array_total_puesto = array(
			'nombre_local' => 'Total PUESTOS' ,
			'evaerin' => '',
			'areas' => '',
			'desc' => '',
			'puestos_soporte' => $total_apto_soporte_puestos,
			'puestos_core' => $total_apto_core_puestos,
			'total' => $total_total_puestos
		);

		array_push($reporte, $array_total_puesto);

		$array_total_sap = array(
			'nombre_local' => 'Total Nro TRABAJADORES' ,
			'evaerin' => '',
			'areas' => '',
			'desc' => '',
			'puestos_soporte' => $total_apto_soporte_sap,
			'puestos_core' => $total_apto_core_sap,
			'total' => $total_total_sap
		);

		array_push($reporte, $array_total_sap);



		$resultado['reporte'] = $reporte;


		echo json_encode($resultado);
	}


	public function exportProduccionArea() {
        $id_local = $this->input->post('id_local');
        $id_empresa = $this->session->id_empresa;
        $reporte = array();

        $_sql ="SELECT l.id,l.nombre nombre_local, (SELECT count(distinct id_area) FROM puesto_trabajo
                WHERE id_local = l.id AND es_apto IS NOT NULL AND id_empresa = $id_empresa) areas, pt.`eva_erin_resultado`,
                SUM(CASE WHEN (pt.es_apto = 1 OR pt.es_apto = 0) AND pt.tipo_puesto = 'SOPORTE' THEN 1 ELSE 0 END ) puestos_soporte,
				SUM(CASE WHEN (pt.es_apto = 1 OR pt.es_apto = 0) AND pt.tipo_puesto = 'CORE' THEN 1 ELSE 0 END) puestos_core,
				SUM(CASE WHEN (pt.es_apto = 1 OR pt.es_apto = 0) AND (pt.tipo_puesto = 'SOPORTE' OR pt.tipo_puesto = 'CORE') THEN 1 ELSE 0 END) total
                FROM puesto_trabajo pt
                LEFT JOIN local l ON l.id = pt.id_local
                LEFT JOIN area a ON a.id = pt.id_area
                WHERE pt.id_empresa = $id_empresa";

        $_sql .= $id_local != '' ? " AND pt.id_local = $id_local" :'';
        $_sql .= " GROUP BY pt.`eva_erin_resultado`, l.id ORDER BY 2";
        $result = $this->db->query($_sql);

        $total_apto_soporte_puestos = 0;
        $total_apto_core_puestos = 0;
        $total_no_apto_soporte_puestos = 0;
        $total_no_apto_core_puestos = 0;
        $total_total_puestos = 0;

        $total_apto_soporte_sap = 0;
        $total_apto_core_sap = 0;
        $total_no_apto_soporte_sap = 0;
        $total_no_apto_core_sap = 0;
        $total_total_sap = 0;


        foreach ($result->result() as $key => $value) {

            $total_apto_soporte_puestos += $value->puestos_soporte;
            $total_apto_core_puestos += $value->puestos_core;

            $total_total_puestos += $value->total;

            $array = array(
                'nombre_local' => $value->nombre_local,
                'evaerin' => $value->eva_erin_resultado,
                'areas' => $value->areas,
                'desc' =>'PUESTOS',
                'puestos_soporte' => $value->puestos_soporte,
                'puestos_core' => $value->puestos_core,
                'total' => $value->total
            );
            array_push($reporte, $array);

            $_sql2 ="SELECT
				SUM(CASE WHEN (pt.es_apto = 1 OR pt.es_apto = 0) AND pt.tipo_puesto = 'SOPORTE' THEN 1 ELSE 0 END ) puestos_soporte,
				SUM(CASE WHEN (pt.es_apto = 1 OR pt.es_apto = 0) AND pt.tipo_puesto = 'CORE' THEN 1 ELSE 0 END) puestos_core,
				SUM(CASE WHEN (pt.es_apto = 1 OR pt.es_apto = 0) AND (pt.tipo_puesto = 'SOPORTE' OR pt.tipo_puesto = 'CORE') THEN 1 ELSE 0 END) total
                FROM puesto_trabajo pt
                INNER JOIN personal p ON p.codigo_sabha = pt.codigo_sabha
                LEFT JOIN local l ON l.id = pt.id_local
                LEFT JOIN area a ON a.id = pt.id_area
                WHERE pt.id_empresa = $id_empresa and l.id = $value->id AND p.`sede_estudio` = l.`nombre`
                AND pt.`eva_erin_resultado` = '$value->eva_erin_resultado'
                GROUP BY pt.`eva_erin_resultado`, l.id;";

            $result2 = $this->db->query($_sql2);
            if($result2->num_rows()>0){

                $total_apto_soporte_sap += $result2->row()->puestos_soporte;
                $total_apto_core_sap += $result2->row()->puestos_core;
                $total_total_sap += $result2->row()->total;

                $array = array(
                    'nombre_local' => '',
                    'evaerin' => '',
                    'areas' => '',
                    'desc' => 'Nro TRABAJADORES',
                    'puestos_soporte' => $result2->row()->puestos_soporte,
                    'puestos_core' => $result2->row()->puestos_core,
                    'total' => $result2->row()->total
                );
                array_push($reporte, $array);
            }else{
                $array = array(
                    'nombre_local' => '',
                    'evaerin' => '',
                    'areas' => '',
                    'desc' => 'Nro TRABAJADORES',
                    'puestos_soporte' => '',
                    'puestos_core' => '',
                    'total' => ''
                );
                array_push($reporte, $array);
            }
        }

        $array_total_puesto = array(
            'nombre_local' => 'Total PUESTOS' ,
            'evaerin' => '',
            'areas' => '',
            'desc' => '',
            'puestos_soporte' => $total_apto_soporte_puestos,
            'puestos_core' => $total_apto_core_puestos,
            'total' => $total_total_puestos
        );

        array_push($reporte, $array_total_puesto);

        $array_total_sap = array(
            'nombre_local' => 'Total Nro TRABAJADORES' ,
            'evaerin' => '',
            'areas' => '',
            'desc' => '',
            'puestos_soporte' => $total_apto_soporte_sap,
            'puestos_core' => $total_apto_core_sap,
            'total' => $total_total_sap
        );

        array_push($reporte, $array_total_sap);

		$objPHPExcel = new PHPExcel();
		// Set document properties
		$objPHPExcel->getProperties()->setCreator("GEORDI")
			->setLastModifiedBy("GEORDI")
			->setTitle("Reporte de Aptitud")
			->setDescription("Tabla N° 5 Unidades de producción y áreas visitadas");

		// Nombre de Hola Excel
		$objPHPExcel->getActiveSheet()->setTitle('Tabla Nro. 5');
		// Titulos de la grilla
		$objPHPExcel->getActiveSheet()->setCellValue('A1', 'Tabla N° 5 Unidades de producción y áreas visitadas');

		$objPHPExcel->getActiveSheet()->setCellValue('A2', 'SEDES');
		$objPHPExcel->getActiveSheet()->setCellValue('B2', 'Nro AREAS');
		$objPHPExcel->getActiveSheet()->setCellValue('C2', 'EVALUACION EVA/ERIN');
		$objPHPExcel->getActiveSheet()->setCellValue('D2', 'VALORES');
		$objPHPExcel->getActiveSheet()->setCellValue('E2', 'PUESTO');
		$objPHPExcel->getActiveSheet()->setCellValue('F2', '');
		$objPHPExcel->getActiveSheet()->setCellValue('G2', 'TOTAL GENERAL');


		$objPHPExcel->getActiveSheet()->setCellValue('A3', '');
		$objPHPExcel->getActiveSheet()->setCellValue('B3', '');
		$objPHPExcel->getActiveSheet()->setCellValue('C3', '');
		$objPHPExcel->getActiveSheet()->setCellValue('D3', '');
		$objPHPExcel->getActiveSheet()->setCellValue('E3', 'CORE');
		$objPHPExcel->getActiveSheet()->setCellValue('F3', 'SOPORTE');
		$objPHPExcel->getActiveSheet()->setCellValue('G3', '');

		$objPHPExcel->getActiveSheet()->mergeCells('E2:F2');
//		$objPHPExcel->getActiveSheet()->mergeCells('A1:A2');
//		$objPHPExcel->getActiveSheet()->mergeCells('B1:B2');
//		$objPHPExcel->getActiveSheet()->mergeCells('C1:C2');
//		$objPHPExcel->getActiveSheet()->mergeCells('D1:D2');
//		$objPHPExcel->getActiveSheet()->mergeCells('G1:G2');

		$objPHPExcel->getActiveSheet()->getStyle('A2:G2')->applyFromArray(
			array(
				'font'    => array(
					'bold'  => true,
					'color' => array('rgb' => 'FFFFFF'),
					'size'  => 10,
					'name'  => 'Arial'
				),
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				),
				'fill' => array(
					'type'       => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
					'startcolor' => array(
						'argb' => '3B5A66'
					)
				)
			)
		);

		$objPHPExcel->getActiveSheet()->getStyle('A3:G3')->applyFromArray(
			array(
				'font'    => array(
					'bold'  => true,
					'color' => array('rgb' => 'FFFFFF'),
					'size'  => 10,
					'name'  => 'Arial'
				),
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				),
				'fill' => array(
					'type'       => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
					'startcolor' => array(
						'argb' => '3B5A66'
					)
				)
			)
		);
		// C1DDE7 // DEE5F0

		$objPHPExcel->getActiveSheet()->getStyle('A2:G2')->getFill()->applyFromArray(array(
			'type' => PHPExcel_Style_Fill::FILL_SOLID,
			'startcolor' => array(
				'rgb' => '2C3A63'
			)
		));

		$objPHPExcel->getActiveSheet()->getStyle('A3:G3')->getFill()->applyFromArray(array(
			'type' => PHPExcel_Style_Fill::FILL_SOLID,
			'startcolor' => array(
				'rgb' => '2C3A63'
			)
		));
//        $this->cellColor('A1:G1','#3B5A66');
//        $this->cellColor('A2:G2','#3B5A66');

		// Rellenamos con la data de retorno la hoja activa
		$objPHPExcel->getActiveSheet()->fromArray($reporte, NULL, 'A4');



//		for ($i = 'A'; $i !=  $objPHPExcel->getActiveSheet()->getHighestColumn(); $i++) { //
//			$objPHPExcel->getActiveSheet()->getColumnDimension($i)->setAutoSize(TRUE);
//		}

		foreach(range('B','G') as $columnID)
		{
			$objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
		}




		// Redirect output to a client’s web browser (Excel5)
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="REPORTE_TABLA_NRO5'. date('ymd') .'.xls"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
		exit;
	}

    public function exportLocal(){
        $id_local = $this->input->post('id_local');
        $id_empresa = $this->session->id_empresa;
        // tabla 1
        $reporte = array();

        $_sql ="SELECT e.razon_social,l.id,l.nombre nombre_local,count(distinct pt.codigo_puesto_creado) puestos_sap
					FROM personal pt
					LEFT JOIN local l ON l.nombre = pt.sede_estudio
					LEFT JOIN empresa e ON e.id = pt.id_empresa
					WHERE pt.id_empresa =  $id_empresa";

        $_sql .= $id_local != '' ? " AND l.id = $id_local" :'';
        $_sql .= " GROUP BY l.nombre ORDER BY 3;";
        $result = $this->db->query($_sql);
        $nombre_empresa = '';
        $i = 0;

        $total_puestos = 0;
        $total_trabajadores = 0;
        $maximo_puestos = 0;
        $maximo_trabajadores = 0;

        foreach ($result->result() as $key => $value) {
            if($i>0){
                if($nombre_empresa != $value->razon_social){
                    $nombre_empresa = $value->razon_social;
                }else{
                    $nombre_empresa = '';
                }
            }else{
                $nombre_empresa = $value->razon_social;
            }

            $total_puestos += $value->puestos_sap;
            if($value->puestos_sap > $maximo_puestos){
                $maximo_puestos = $value->puestos_sap;
            }

            $array = array(
                'nombre_empresa' => $nombre_empresa,
                'nombre_local' => $value->nombre_local,
                'puestos_sap' => $value->puestos_sap,
                'porcentaje_puestos' => 0,
                'trabajadores' => 0,
                'porcentaje_trabajadores' => 0
            );

            $_sql2 ="SELECT e.razon_social,l.id,l.nombre nombre_local,count(distinct pt.id) trabajadores
                FROM personal pt
                LEFT JOIN local l ON l.nombre = pt.sede_estudio
                LEFT JOIN empresa e ON e.id = pt.id_empresa
                WHERE pt.id_empresa = $id_empresa and l.id = $value->id;";

            $result2 = $this->db->query($_sql2);
            if($result2->num_rows()>0){

                $total_trabajadores += $result2->row()->trabajadores;

                if($result2->row()->trabajadores > $maximo_trabajadores){
                    $maximo_trabajadores = $result2->row()->trabajadores;
                }

                $array['trabajadores'] = $result2->row()->trabajadores;

            }

            $nombre_empresa = $value->razon_social;
            $i++;

            array_push($reporte, $array);
        }

        foreach($reporte as $k => $v){
            if($v['puestos_sap']>= 1){
                $reporte[$k]['porcentaje_puestos'] = round(($v['puestos_sap']*100)/$maximo_puestos);
            }
            if($v['trabajadores']>= 1){
                $reporte[$k]['porcentaje_trabajadores'] = round(($v['trabajadores']*100)/$maximo_trabajadores);
            }

        }

        $array_total = array(
            'nombre_empresa' => 'TOTAL GENERAL',
            'nombre_local' => '',
            'puestos_sap' => $total_puestos,
            'porcentaje_puestos' => 100,
            'trabajadores' => $total_trabajadores,
            'porcentaje_trabajadores' => 100
        );

        array_push($reporte, $array_total);
        $resultado['reporte'] = $reporte;


        // tabla 2


        $reporte2 = array();

        $_sql3 ="SELECT e.razon_social,l.id,l.nombre nombre_local, count(distinct a.id) areas,
                SUM(CASE WHEN pt.es_apto = 1 or pt.es_apto = 0 THEN 1 ELSE 0 END ) puestos
                FROM puesto_trabajo pt
                LEFT JOIN local l ON l.id = pt.id_local
                LEFT JOIN area a ON a.id = pt.id_area
                LEFT JOIN empresa e ON e.id = pt.id_empresa
                WHERE pt.id_empresa = $id_empresa";

        $_sql3 .= $id_local != '' ? " AND pt.id_local = $id_local" :'';
        $_sql3 .= " GROUP BY l.id ORDER BY 3;";
        $result3 = $this->db->query($_sql3);
        $nombre_empresa = '';
        $i = 0;

        $total_puestos_2 = 0;
        $total_trabajadores_2 = 0;

        foreach ($result3->result() as $key => $value) {
            if($i>0){
                if($nombre_empresa != $value->razon_social){
                    $nombre_empresa = $value->razon_social;
                }else{
                    $nombre_empresa = '';
                }
            }else{
                $nombre_empresa = $value->razon_social;
            }

            $total_puestos_2 += $value->puestos;

            $array = array(
                'nombre_empresa' => $nombre_empresa,
                'nombre_local' => $value->nombre_local,
                'areas' => $value->areas,
                'puestos' => $value->puestos,
                'porcentaje_puestos' => 0,
                'trabajadores' => 0,
                'porcentaje_trabajadores' => 0
            );

            $_sql4 ="SELECT e.razon_social,l.id,l.nombre nombre_local,
                SUM(CASE WHEN pt.es_apto = 1 or pt.es_apto = 0 THEN 1 ELSE 0 END ) trabajadores
                FROM puesto_trabajo pt
                INNER JOIN personal p ON p.codigo_sabha = pt.codigo_sabha
                LEFT JOIN local l ON l.id = pt.id_local
                LEFT JOIN area a ON a.id = pt.id_area
                LEFT JOIN empresa e ON e.id = pt.id_empresa
                WHERE pt.id_empresa = $id_empresa and l.id = $value->id AND p.`sede_estudio` = pt.`nombre_local` GROUP BY l.id;";

            $result4 = $this->db->query($_sql4);
            if($result4->num_rows()>0){

                $total_trabajadores_2 += $result4->row()->trabajadores;

                $array['trabajadores'] = $result4->row()->trabajadores;

            }

            $nombre_empresa = $value->razon_social;
            $i++;

            array_push($reporte2, $array);
        }

        foreach($reporte2 as $k => $v){
            if($v['puestos']>= 1){
                $reporte2[$k]['porcentaje_puestos'] = round(($v['puestos']*100)/$total_puestos_2) . "%";
            }
            if($v['trabajadores']>= 1){
                $reporte2[$k]['porcentaje_trabajadores'] = round(($v['trabajadores']*100)/$total_trabajadores_2) . "%";
            }

        }

        $array_total = array(
            'nombre_empresa' => 'TOTAL GENERAL',
            'nombre_local' => '',
            'areas' => '',
            'puestos' => $total_puestos_2,
            'porcentaje_puestos' => 100 . "%",
            'trabajadores' => $total_trabajadores_2,
            'porcentaje_trabajadores' => 100 . "%"
        );

        array_push($reporte2, $array_total);

        $objPHPExcel = new PHPExcel();
        // Set document properties
        $objPHPExcel->getProperties()->setCreator("GEORDI")
            ->setLastModifiedBy("GEORDI")
            ->setTitle("Reporte por Sede")
            ->setDescription("Distribucion de puestos de trabajo por unidad de producción");

        // Nombre de Hola Excel
        $objPHPExcel->getActiveSheet()->setTitle('Tabla Nro. 1.1');
        // Titulos de la grilla
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'Nro. 1 Distribución de puestos de trabajo por unidad de producción');

        $objPHPExcel->getActiveSheet()->setCellValue('A2', 'EMPRESA');
        $objPHPExcel->getActiveSheet()->setCellValue('B2', 'SEDE');
        $objPHPExcel->getActiveSheet()->setCellValue('C2', 'PUESTOS SAP');
        $objPHPExcel->getActiveSheet()->setCellValue('D2', '');
        $objPHPExcel->getActiveSheet()->setCellValue('E2', 'NRO. TRABAJADORES');
        $objPHPExcel->getActiveSheet()->setCellValue('F2', '');

        $objPHPExcel->getActiveSheet()->mergeCells('C2:D2');
        $objPHPExcel->getActiveSheet()->mergeCells('E2:F2');

        $objPHPExcel->getActiveSheet()->getStyle('A2:F2')->applyFromArray(
            array(
                'font'    => array(
                    'bold'      => false,
                    'color' => array('rgb' => 'FFFFFF'),
                    'size'  => 10,
                    'name'  => 'Arial'
                ),
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                ),
                'fill' => array(
                    'type'       => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
                    'startcolor' => array(
                        'argb' => '3B5A66'
                    )
                )
            )
        );


        $objPHPExcel->getActiveSheet()->getStyle('A2:F2')->getFill()->applyFromArray(array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'startcolor' => array(
                'rgb' => '2C3A63'
            )
        ));

        foreach(range('B','F') as $columnID)
        {
            $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
        }

        $objPHPExcel->getActiveSheet()->fromArray($reporte, NULL, 'A3');

        $objPHPExcel->createSheet();


        $objPHPExcel->setActiveSheetIndex(1); // marcar como activa la nueva hoja
        $objPHPExcel->getActiveSheet()->setTitle('Tabla Nro. 1.2');

        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'Nro. 1 Distribución de puestos de trabajo por unidad de producción');

        $objPHPExcel->getActiveSheet()->setCellValue('A2', 'EMPRESA');
        $objPHPExcel->getActiveSheet()->setCellValue('B2', 'SEDE');
        $objPHPExcel->getActiveSheet()->setCellValue('C2', 'NRO AREAS EVALUADAS');
        $objPHPExcel->getActiveSheet()->setCellValue('D2', 'PUESTOS EVALUADOS');
        $objPHPExcel->getActiveSheet()->setCellValue('E2', '');
        $objPHPExcel->getActiveSheet()->setCellValue('F2', 'NRO. TRABAJADORES');
        $objPHPExcel->getActiveSheet()->setCellValue('G2', '');

        $objPHPExcel->getActiveSheet()->mergeCells('D2:E2');
        $objPHPExcel->getActiveSheet()->mergeCells('F2:G2');

        $objPHPExcel->getActiveSheet()->getStyle('A2:G2')->applyFromArray(
            array(
                'font'    => array(
                    'bold'      => false,
                    'color' => array('rgb' => 'FFFFFF'),
                    'size'  => 10,
                    'name'  => 'Arial'
                ),
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                ),
                'fill' => array(
                    'type'       => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
                    'startcolor' => array(
                        'argb' => '2C3A63'
                    )
                )
            )
        );


        $objPHPExcel->getActiveSheet()->getStyle('A2:G2')->getFill()->applyFromArray(array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'startcolor' => array(
                'rgb' => '2C3A63'
            )
        ));

        foreach(range('B','G') as $columnID)
        {
            $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
        }

        // Rellenamos con la data de retorno la hoja activa

        $objPHPExcel->getActiveSheet()->fromArray($reporte2, NULL, 'A3');

        // Redirect output to a client’s web browser (Excel5)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="REPORTE_NRO1'. date('ymd') .'.xls"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
        header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header ('Pragma: public'); // HTTP/1.0

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;
    }

	public function reporteFuncionalidad() {

		$this->load->view('header');
		$this->load->view('navbar');
		$data['locales'] = Local_model::where('id_empresa', '=', $this->session->id_empresa)->get();
//
		$permisos = $this->session->userdata('permisos');
		if (isset($permisos['reporte/reporteFuncionalidad']['acceso']) && $permisos['reporte/reporteFuncionalidad']['acceso'] == 1) {
		$this->load->view('reporte/reporteFuncionalidad', $data);
		} else {
			$this->load->view('400/noacceso');
		}
		$this->load->view('footer');

	}

	public function getAllreporteFuncionalidad() {

		$id_empresa = $this->session->id_empresa;
		$id_local = $this->input->post('id_local');

		if ($id_local == '') {

			$_sql ="SELECT 'SENSORIAL VISUAL' as 'TIPO_DISCAPACIDAD', 'PUESTOS' AS 'VALORES',
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_visual_pre_eval` = 0  THEN 1 ELSE 0 END) valor_0,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_visual_pre_eval` = 1  THEN 1 ELSE 0 END) valor_1,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_visual_pre_eval` = 2  THEN 1 ELSE 0 END) valor_2,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_visual_pre_eval` = 3  THEN 1 ELSE 0 END) valor_3,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_visual_pre_eval` = 4  THEN 1 ELSE 0 END) valor_4,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_visual_pre_eval` = 5  THEN 1 ELSE 0 END) valor_5,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND (puesto_trabajo.`s_visual_pre_eval` IS NOT NULL) THEN 1 ELSE 0 END) total
		FROM puesto_trabajo WHERE puesto_trabajo.id_empresa = $id_empresa
		UNION ALL
		SELECT '' as 'TIPO_DISCAPACIDAD', 'Nro TRABAJADORES' AS 'VALORES',
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_visual_pre_eval` = 0  THEN 1 ELSE 0 END) valor_0,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_visual_pre_eval` = 1  THEN 1 ELSE 0 END) valor_1,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_visual_pre_eval` = 2  THEN 1 ELSE 0 END) valor_2,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_visual_pre_eval` = 3  THEN 1 ELSE 0 END) valor_3,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_visual_pre_eval` = 4  THEN 1 ELSE 0 END) valor_4,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_visual_pre_eval` = 5  THEN 1 ELSE 0 END) valor_5,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND (puesto_trabajo.`s_visual_pre_eval` IS NOT NULL) THEN 1 ELSE 0 END) total
		FROM puesto_trabajo INNER JOIN personal ON personal.codigo_sabha = puesto_trabajo.codigo_sabha
		WHERE puesto_trabajo.id_empresa = $id_empresa AND personal.`sede_estudio` = puesto_trabajo.`nombre_local`
		UNION ALL
		SELECT 'SENSORIAL AUDITIVO' as 'TIPO_DISCAPACIDAD', 'PUESTOS' AS 'VALORES',
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_auditivo_pre_eval` = 0  THEN 1 ELSE 0 END) valor_0,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_auditivo_pre_eval` = 1  THEN 1 ELSE 0 END) valor_1,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_auditivo_pre_eval` = 2  THEN 1 ELSE 0 END) valor_2,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_auditivo_pre_eval` = 3  THEN 1 ELSE 0 END) valor_3,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_auditivo_pre_eval` = 4  THEN 1 ELSE 0 END) valor_4,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_auditivo_pre_eval` = 5  THEN 1 ELSE 0 END) valor_5,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND (puesto_trabajo.`s_auditivo_pre_eval` IS NOT NULL) THEN 1 ELSE 0 END) total
		FROM puesto_trabajo WHERE puesto_trabajo.id_empresa = $id_empresa
		UNION ALL
		SELECT '' as 'TIPO_DISCAPACIDAD', 'Nro TRABAJADORES' AS 'VALORES',
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_auditivo_pre_eval` = 0  THEN 1 ELSE 0 END) valor_0,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_auditivo_pre_eval` = 1  THEN 1 ELSE 0 END) valor_1,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_auditivo_pre_eval` = 2  THEN 1 ELSE 0 END) valor_2,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_auditivo_pre_eval` = 3  THEN 1 ELSE 0 END) valor_3,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_auditivo_pre_eval` = 4  THEN 1 ELSE 0 END) valor_4,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_auditivo_pre_eval` = 5  THEN 1 ELSE 0 END) valor_5,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND (puesto_trabajo.`s_auditivo_pre_eval` IS NOT NULL) THEN 1 ELSE 0 END) total
		FROM puesto_trabajo INNER JOIN personal ON personal.codigo_sabha = puesto_trabajo.codigo_sabha
		WHERE puesto_trabajo.id_empresa = $id_empresa AND personal.`sede_estudio` = puesto_trabajo.`nombre_local`
		UNION ALL
		SELECT 'MOTRIZ EXT INFERIORES' as 'TIPO_DISCAPACIDAD', 'PUESTOS' AS 'VALORES',
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_inf_pre_eval` = 0  THEN 1 ELSE 0 END) valor_0,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_inf_pre_eval` = 1  THEN 1 ELSE 0 END) valor_1,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_inf_pre_eval` = 2  THEN 1 ELSE 0 END) valor_2,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_inf_pre_eval` = 3  THEN 1 ELSE 0 END) valor_3,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_inf_pre_eval` = 4  THEN 1 ELSE 0 END) valor_4,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_inf_pre_eval` = 5  THEN 1 ELSE 0 END) valor_5,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND (puesto_trabajo.`m_ext_inf_pre_eval` IS NOT NULL) THEN 1 ELSE 0 END) total
		FROM puesto_trabajo WHERE puesto_trabajo.id_empresa = $id_empresa
		UNION ALL
		SELECT '' as 'TIPO_DISCAPACIDAD', 'Nro TRABAJADORES' AS 'VALORES',
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_inf_pre_eval` = 0  THEN 1 ELSE 0 END) valor_0,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_inf_pre_eval` = 1  THEN 1 ELSE 0 END) valor_1,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_inf_pre_eval` = 2  THEN 1 ELSE 0 END) valor_2,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_inf_pre_eval` = 3  THEN 1 ELSE 0 END) valor_3,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_inf_pre_eval` = 4  THEN 1 ELSE 0 END) valor_4,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_inf_pre_eval` = 5  THEN 1 ELSE 0 END) valor_5,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND (puesto_trabajo.`m_ext_inf_pre_eval` IS NOT NULL) THEN 1 ELSE 0 END) total
		FROM puesto_trabajo INNER JOIN personal ON personal.codigo_sabha = puesto_trabajo.codigo_sabha
		WHERE puesto_trabajo.id_empresa = $id_empresa AND personal.`sede_estudio` = puesto_trabajo.`nombre_local`
		UNION ALL
		SELECT 'MOTRIZ EXT SUPERIORES' as 'TIPO_DISCAPACIDAD', 'PUESTOS' AS 'VALORES',
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_sup_pre_eval` = 0  THEN 1 ELSE 0 END) valor_0,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_sup_pre_eval` = 1  THEN 1 ELSE 0 END) valor_1,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_sup_pre_eval` = 2  THEN 1 ELSE 0 END) valor_2,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_sup_pre_eval` = 3  THEN 1 ELSE 0 END) valor_3,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_sup_pre_eval` = 4  THEN 1 ELSE 0 END) valor_4,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_sup_pre_eval` = 5  THEN 1 ELSE 0 END) valor_5,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND (puesto_trabajo.`m_ext_sup_pre_eval` IS NOT NULL) THEN 1 ELSE 0 END) total
		FROM puesto_trabajo WHERE puesto_trabajo.id_empresa = $id_empresa
		UNION ALL
		SELECT '' as 'TIPO_DISCAPACIDAD', 'Nro TRABAJADORES' AS 'VALORES',
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_sup_pre_eval` = 0  THEN 1 ELSE 0 END) valor_0,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_sup_pre_eval` = 1  THEN 1 ELSE 0 END) valor_1,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_sup_pre_eval` = 2  THEN 1 ELSE 0 END) valor_2,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_sup_pre_eval` = 3  THEN 1 ELSE 0 END) valor_3,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_sup_pre_eval` = 4  THEN 1 ELSE 0 END) valor_4,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_sup_pre_eval` = 5  THEN 1 ELSE 0 END) valor_5,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND (puesto_trabajo.`m_ext_sup_pre_eval` IS NOT NULL) THEN 1 ELSE 0 END) total
		FROM puesto_trabajo INNER JOIN personal ON personal.codigo_sabha = puesto_trabajo.codigo_sabha
		WHERE puesto_trabajo.id_empresa = $id_empresa AND personal.`sede_estudio` = puesto_trabajo.`nombre_local`
		UNION ALL
		SELECT 'MENTAL INTELECTUAL' as 'TIPO_DISCAPACIDAD', 'PUESTOS' AS 'VALORES',
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_intelectual_pre_eval` = 0  THEN 1 ELSE 0 END) valor_0,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_intelectual_pre_eval` = 1  THEN 1 ELSE 0 END) valor_1,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_intelectual_pre_eval` = 2  THEN 1 ELSE 0 END) valor_2,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_intelectual_pre_eval` = 3  THEN 1 ELSE 0 END) valor_3,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_intelectual_pre_eval` = 4  THEN 1 ELSE 0 END) valor_4,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_intelectual_pre_eval` = 5  THEN 1 ELSE 0 END) valor_5,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND (puesto_trabajo.`m_intelectual_pre_eval` IS NOT NULL) THEN 1 ELSE 0 END) total
		FROM puesto_trabajo WHERE puesto_trabajo.id_empresa = $id_empresa
		UNION ALL
		SELECT '' as 'TIPO_DISCAPACIDAD', 'Nro TRABAJADORES' AS 'VALORES',
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_intelectual_pre_eval` = 0  THEN 1 ELSE 0 END) valor_0,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_intelectual_pre_eval` = 1  THEN 1 ELSE 0 END) valor_1,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_intelectual_pre_eval` = 2  THEN 1 ELSE 0 END) valor_2,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_intelectual_pre_eval` = 3  THEN 1 ELSE 0 END) valor_3,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_intelectual_pre_eval` = 4  THEN 1 ELSE 0 END) valor_4,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_intelectual_pre_eval` = 5  THEN 1 ELSE 0 END) valor_5,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND (puesto_trabajo.`m_intelectual_pre_eval` IS NOT NULL) THEN 1 ELSE 0 END) total
		FROM puesto_trabajo INNER JOIN personal ON personal.codigo_sabha = puesto_trabajo.codigo_sabha
		WHERE puesto_trabajo.id_empresa = $id_empresa AND personal.`sede_estudio` = puesto_trabajo.`nombre_local`
		UNION ALL
		SELECT 'MENTAL PSICOLOGICO' as 'TIPO_DISCAPACIDAD', 'PUESTOS' AS 'VALORES',
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_psicosocial_pre_eval` = 0  THEN 1 ELSE 0 END) valor_0,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_psicosocial_pre_eval` = 1  THEN 1 ELSE 0 END) valor_1,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_psicosocial_pre_eval` = 2  THEN 1 ELSE 0 END) valor_2,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_psicosocial_pre_eval` = 3  THEN 1 ELSE 0 END) valor_3,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_psicosocial_pre_eval` = 4  THEN 1 ELSE 0 END) valor_4,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_psicosocial_pre_eval` = 5  THEN 1 ELSE 0 END) valor_5,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND (puesto_trabajo.`m_psicosocial_pre_eval` IS NOT NULL) THEN 1 ELSE 0 END) total
		FROM puesto_trabajo WHERE puesto_trabajo.id_empresa = $id_empresa
		UNION ALL
		SELECT '' as 'TIPO_DISCAPACIDAD', 'Nro TRABAJADORES' AS 'VALORES',
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_psicosocial_pre_eval` = 0  THEN 1 ELSE 0 END) valor_0,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_psicosocial_pre_eval` = 1  THEN 1 ELSE 0 END) valor_1,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_psicosocial_pre_eval` = 2  THEN 1 ELSE 0 END) valor_2,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_psicosocial_pre_eval` = 3  THEN 1 ELSE 0 END) valor_3,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_psicosocial_pre_eval` = 4  THEN 1 ELSE 0 END) valor_4,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_psicosocial_pre_eval` = 5  THEN 1 ELSE 0 END) valor_5,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND (puesto_trabajo.`m_psicosocial_pre_eval` IS NOT NULL) THEN 1 ELSE 0 END) total
		FROM puesto_trabajo INNER JOIN personal ON personal.codigo_sabha = puesto_trabajo.codigo_sabha
		WHERE puesto_trabajo.id_empresa = $id_empresa AND personal.`sede_estudio` = puesto_trabajo.`nombre_local`
		";

		} else {

			$_sql ="SELECT 'SENSORIAL VISUAL' as 'TIPO_DISCAPACIDAD', 'PUESTOS' AS 'VALORES',
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_visual_pre_eval` = 0  THEN 1 ELSE 0 END) valor_0,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_visual_pre_eval` = 1  THEN 1 ELSE 0 END) valor_1,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_visual_pre_eval` = 2  THEN 1 ELSE 0 END) valor_2,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_visual_pre_eval` = 3  THEN 1 ELSE 0 END) valor_3,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_visual_pre_eval` = 4  THEN 1 ELSE 0 END) valor_4,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_visual_pre_eval` = 5  THEN 1 ELSE 0 END) valor_5,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND (puesto_trabajo.`s_visual_pre_eval` IS NOT NULL) THEN 1 ELSE 0 END) total
		FROM puesto_trabajo WHERE puesto_trabajo.id_empresa = $id_empresa AND puesto_trabajo.id_local = $id_local 
		UNION ALL
		SELECT '' as 'TIPO_DISCAPACIDAD', 'Nro TRABAJADORES' AS 'VALORES',
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_visual_pre_eval` = 0  THEN 1 ELSE 0 END) valor_0,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_visual_pre_eval` = 1  THEN 1 ELSE 0 END) valor_1,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_visual_pre_eval` = 2  THEN 1 ELSE 0 END) valor_2,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_visual_pre_eval` = 3  THEN 1 ELSE 0 END) valor_3,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_visual_pre_eval` = 4  THEN 1 ELSE 0 END) valor_4,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_visual_pre_eval` = 5  THEN 1 ELSE 0 END) valor_5,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND (puesto_trabajo.`s_visual_pre_eval` IS NOT NULL) THEN 1 ELSE 0 END) total
		FROM puesto_trabajo INNER JOIN personal ON personal.codigo_sabha = puesto_trabajo.codigo_sabha
		WHERE puesto_trabajo.id_empresa = $id_empresa AND personal.`sede_estudio` = puesto_trabajo.`nombre_local` AND puesto_trabajo.id_local = $id_local 
		UNION ALL
		SELECT 'SENSORIAL AUDITIVO' as 'TIPO_DISCAPACIDAD', 'PUESTOS' AS 'VALORES',
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_auditivo_pre_eval` = 0  THEN 1 ELSE 0 END) valor_0,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_auditivo_pre_eval` = 1  THEN 1 ELSE 0 END) valor_1,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_auditivo_pre_eval` = 2  THEN 1 ELSE 0 END) valor_2,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_auditivo_pre_eval` = 3  THEN 1 ELSE 0 END) valor_3,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_auditivo_pre_eval` = 4  THEN 1 ELSE 0 END) valor_4,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_auditivo_pre_eval` = 5  THEN 1 ELSE 0 END) valor_5,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND (puesto_trabajo.`s_auditivo_pre_eval` IS NOT NULL) THEN 1 ELSE 0 END) total
		FROM puesto_trabajo WHERE puesto_trabajo.id_empresa = $id_empresa AND puesto_trabajo.id_local = $id_local 
		UNION ALL
		SELECT '' as 'TIPO_DISCAPACIDAD', 'Nro TRABAJADORES' AS 'VALORES',
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_auditivo_pre_eval` = 0  THEN 1 ELSE 0 END) valor_0,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_auditivo_pre_eval` = 1  THEN 1 ELSE 0 END) valor_1,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_auditivo_pre_eval` = 2  THEN 1 ELSE 0 END) valor_2,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_auditivo_pre_eval` = 3  THEN 1 ELSE 0 END) valor_3,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_auditivo_pre_eval` = 4  THEN 1 ELSE 0 END) valor_4,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_auditivo_pre_eval` = 5  THEN 1 ELSE 0 END) valor_5,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND (puesto_trabajo.`s_auditivo_pre_eval` IS NOT NULL) THEN 1 ELSE 0 END) total
		FROM puesto_trabajo INNER JOIN personal ON personal.codigo_sabha = puesto_trabajo.codigo_sabha
		WHERE puesto_trabajo.id_empresa = $id_empresa AND personal.`sede_estudio` = puesto_trabajo.`nombre_local` AND puesto_trabajo.id_local = $id_local 
		UNION ALL
		SELECT 'MOTRIZ EXT INFERIORES' as 'TIPO_DISCAPACIDAD', 'PUESTOS' AS 'VALORES',
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_inf_pre_eval` = 0  THEN 1 ELSE 0 END) valor_0,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_inf_pre_eval` = 1  THEN 1 ELSE 0 END) valor_1,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_inf_pre_eval` = 2  THEN 1 ELSE 0 END) valor_2,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_inf_pre_eval` = 3  THEN 1 ELSE 0 END) valor_3,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_inf_pre_eval` = 4  THEN 1 ELSE 0 END) valor_4,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_inf_pre_eval` = 5  THEN 1 ELSE 0 END) valor_5,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND (puesto_trabajo.`m_ext_inf_pre_eval` IS NOT NULL) THEN 1 ELSE 0 END) total
		FROM puesto_trabajo WHERE puesto_trabajo.id_empresa = $id_empresa AND puesto_trabajo.id_local = $id_local 
		UNION ALL
		SELECT '' as 'TIPO_DISCAPACIDAD', 'Nro TRABAJADORES' AS 'VALORES',
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_inf_pre_eval` = 0  THEN 1 ELSE 0 END) valor_0,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_inf_pre_eval` = 1  THEN 1 ELSE 0 END) valor_1,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_inf_pre_eval` = 2  THEN 1 ELSE 0 END) valor_2,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_inf_pre_eval` = 3  THEN 1 ELSE 0 END) valor_3,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_inf_pre_eval` = 4  THEN 1 ELSE 0 END) valor_4,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_inf_pre_eval` = 5  THEN 1 ELSE 0 END) valor_5,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND (puesto_trabajo.`m_ext_inf_pre_eval` IS NOT NULL) THEN 1 ELSE 0 END) total
		FROM puesto_trabajo INNER JOIN personal ON personal.codigo_sabha = puesto_trabajo.codigo_sabha
		WHERE puesto_trabajo.id_empresa = $id_empresa AND personal.`sede_estudio` = puesto_trabajo.`nombre_local` AND puesto_trabajo.id_local = $id_local 
		UNION ALL
		SELECT 'MOTRIZ EXT SUPERIORES' as 'TIPO_DISCAPACIDAD', 'PUESTOS' AS 'VALORES',
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_sup_pre_eval` = 0  THEN 1 ELSE 0 END) valor_0,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_sup_pre_eval` = 1  THEN 1 ELSE 0 END) valor_1,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_sup_pre_eval` = 2  THEN 1 ELSE 0 END) valor_2,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_sup_pre_eval` = 3  THEN 1 ELSE 0 END) valor_3,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_sup_pre_eval` = 4  THEN 1 ELSE 0 END) valor_4,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_sup_pre_eval` = 5  THEN 1 ELSE 0 END) valor_5,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND (puesto_trabajo.`m_ext_sup_pre_eval` IS NOT NULL) THEN 1 ELSE 0 END) total
		FROM puesto_trabajo WHERE puesto_trabajo.id_empresa = $id_empresa AND puesto_trabajo.id_local = $id_local 
		UNION ALL
		SELECT '' as 'TIPO_DISCAPACIDAD', 'Nro TRABAJADORES' AS 'VALORES',
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_sup_pre_eval` = 0  THEN 1 ELSE 0 END) valor_0,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_sup_pre_eval` = 1  THEN 1 ELSE 0 END) valor_1,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_sup_pre_eval` = 2  THEN 1 ELSE 0 END) valor_2,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_sup_pre_eval` = 3  THEN 1 ELSE 0 END) valor_3,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_sup_pre_eval` = 4  THEN 1 ELSE 0 END) valor_4,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_sup_pre_eval` = 5  THEN 1 ELSE 0 END) valor_5,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND (puesto_trabajo.`m_ext_sup_pre_eval` IS NOT NULL) THEN 1 ELSE 0 END) total
		FROM puesto_trabajo INNER JOIN personal ON personal.codigo_sabha = puesto_trabajo.codigo_sabha
		WHERE puesto_trabajo.id_empresa = $id_empresa AND personal.`sede_estudio` = puesto_trabajo.`nombre_local` AND puesto_trabajo.id_local = $id_local 
		UNION ALL
		SELECT 'MENTAL INTELECTUAL' as 'TIPO_DISCAPACIDAD', 'PUESTOS' AS 'VALORES',
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_intelectual_pre_eval` = 0  THEN 1 ELSE 0 END) valor_0,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_intelectual_pre_eval` = 1  THEN 1 ELSE 0 END) valor_1,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_intelectual_pre_eval` = 2  THEN 1 ELSE 0 END) valor_2,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_intelectual_pre_eval` = 3  THEN 1 ELSE 0 END) valor_3,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_intelectual_pre_eval` = 4  THEN 1 ELSE 0 END) valor_4,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_intelectual_pre_eval` = 5  THEN 1 ELSE 0 END) valor_5,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND (puesto_trabajo.`m_intelectual_pre_eval` IS NOT NULL) THEN 1 ELSE 0 END) total
		FROM puesto_trabajo WHERE puesto_trabajo.id_empresa = $id_empresa AND puesto_trabajo.id_local = $id_local 
		UNION ALL
		SELECT '' as 'TIPO_DISCAPACIDAD', 'Nro TRABAJADORES' AS 'VALORES',
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_intelectual_pre_eval` = 0  THEN 1 ELSE 0 END) valor_0,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_intelectual_pre_eval` = 1  THEN 1 ELSE 0 END) valor_1,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_intelectual_pre_eval` = 2  THEN 1 ELSE 0 END) valor_2,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_intelectual_pre_eval` = 3  THEN 1 ELSE 0 END) valor_3,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_intelectual_pre_eval` = 4  THEN 1 ELSE 0 END) valor_4,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_intelectual_pre_eval` = 5  THEN 1 ELSE 0 END) valor_5,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND (puesto_trabajo.`m_intelectual_pre_eval` IS NOT NULL) THEN 1 ELSE 0 END) total
		FROM puesto_trabajo INNER JOIN personal ON personal.codigo_sabha = puesto_trabajo.codigo_sabha
		WHERE puesto_trabajo.id_empresa = $id_empresa AND personal.`sede_estudio` = puesto_trabajo.`nombre_local` AND puesto_trabajo.id_local = $id_local 
		UNION ALL
		SELECT 'MENTAL PSICOLOGICO' as 'TIPO_DISCAPACIDAD', 'PUESTOS' AS 'VALORES',
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_psicosocial_pre_eval` = 0  THEN 1 ELSE 0 END) valor_0,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_psicosocial_pre_eval` = 1  THEN 1 ELSE 0 END) valor_1,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_psicosocial_pre_eval` = 2  THEN 1 ELSE 0 END) valor_2,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_psicosocial_pre_eval` = 3  THEN 1 ELSE 0 END) valor_3,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_psicosocial_pre_eval` = 4  THEN 1 ELSE 0 END) valor_4,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_psicosocial_pre_eval` = 5  THEN 1 ELSE 0 END) valor_5,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND (puesto_trabajo.`m_psicosocial_pre_eval` IS NOT NULL) THEN 1 ELSE 0 END) total
		FROM puesto_trabajo WHERE puesto_trabajo.id_empresa = $id_empresa AND puesto_trabajo.id_local = $id_local 
		UNION ALL
		SELECT '' as 'TIPO_DISCAPACIDAD', 'Nro TRABAJADORES' AS 'VALORES',
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_psicosocial_pre_eval` = 0  THEN 1 ELSE 0 END) valor_0,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_psicosocial_pre_eval` = 1  THEN 1 ELSE 0 END) valor_1,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_psicosocial_pre_eval` = 2  THEN 1 ELSE 0 END) valor_2,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_psicosocial_pre_eval` = 3  THEN 1 ELSE 0 END) valor_3,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_psicosocial_pre_eval` = 4  THEN 1 ELSE 0 END) valor_4,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_psicosocial_pre_eval` = 5  THEN 1 ELSE 0 END) valor_5,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND (puesto_trabajo.`m_psicosocial_pre_eval` IS NOT NULL) THEN 1 ELSE 0 END) total
		FROM puesto_trabajo INNER JOIN personal ON personal.codigo_sabha = puesto_trabajo.codigo_sabha
		WHERE puesto_trabajo.id_empresa = $id_empresa AND personal.`sede_estudio` = puesto_trabajo.`nombre_local` AND puesto_trabajo.id_local = $id_local 
		";

		}



		$result = $this->db->query($_sql);


		$resultado['reporte'] = $result->result_array();


		echo json_encode($resultado);


	}


	public function exportReporteFuncionalidad() {
		$id_empresa = $this->session->id_empresa;
		$id_local = $this->input->post('cmbLocal');

		if ($id_local == '') {

			$_sql ="SELECT 'SENSORIAL VISUAL' as 'TIPO_DISCAPACIDAD', 'PUESTOS' AS 'VALORES',
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_visual_pre_eval` = 0  THEN 1 ELSE 0 END) valor_0,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_visual_pre_eval` = 1  THEN 1 ELSE 0 END) valor_1,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_visual_pre_eval` = 2  THEN 1 ELSE 0 END) valor_2,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_visual_pre_eval` = 3  THEN 1 ELSE 0 END) valor_3,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_visual_pre_eval` = 4  THEN 1 ELSE 0 END) valor_4,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_visual_pre_eval` = 5  THEN 1 ELSE 0 END) valor_5,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND (puesto_trabajo.`s_visual_pre_eval` IS NOT NULL) THEN 1 ELSE 0 END) total
		FROM puesto_trabajo WHERE puesto_trabajo.id_empresa = $id_empresa
		UNION ALL
		SELECT '' as 'TIPO_DISCAPACIDAD', 'Nro TRABAJADORES' AS 'VALORES',
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_visual_pre_eval` = 0  THEN 1 ELSE 0 END) valor_0,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_visual_pre_eval` = 1  THEN 1 ELSE 0 END) valor_1,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_visual_pre_eval` = 2  THEN 1 ELSE 0 END) valor_2,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_visual_pre_eval` = 3  THEN 1 ELSE 0 END) valor_3,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_visual_pre_eval` = 4  THEN 1 ELSE 0 END) valor_4,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_visual_pre_eval` = 5  THEN 1 ELSE 0 END) valor_5,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND (puesto_trabajo.`s_visual_pre_eval` IS NOT NULL) THEN 1 ELSE 0 END) total
		FROM puesto_trabajo INNER JOIN personal ON personal.codigo_sabha = puesto_trabajo.codigo_sabha
		WHERE puesto_trabajo.id_empresa = $id_empresa AND personal.`sede_estudio` = puesto_trabajo.`nombre_local`
		UNION ALL
		SELECT 'SENSORIAL AUDITIVO' as 'TIPO_DISCAPACIDAD', 'PUESTOS' AS 'VALORES',
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_auditivo_pre_eval` = 0  THEN 1 ELSE 0 END) valor_0,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_auditivo_pre_eval` = 1  THEN 1 ELSE 0 END) valor_1,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_auditivo_pre_eval` = 2  THEN 1 ELSE 0 END) valor_2,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_auditivo_pre_eval` = 3  THEN 1 ELSE 0 END) valor_3,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_auditivo_pre_eval` = 4  THEN 1 ELSE 0 END) valor_4,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_auditivo_pre_eval` = 5  THEN 1 ELSE 0 END) valor_5,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND (puesto_trabajo.`s_auditivo_pre_eval` IS NOT NULL) THEN 1 ELSE 0 END) total
		FROM puesto_trabajo WHERE puesto_trabajo.id_empresa = $id_empresa
		UNION ALL
		SELECT '' as 'TIPO_DISCAPACIDAD', 'Nro TRABAJADORES' AS 'VALORES',
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_auditivo_pre_eval` = 0  THEN 1 ELSE 0 END) valor_0,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_auditivo_pre_eval` = 1  THEN 1 ELSE 0 END) valor_1,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_auditivo_pre_eval` = 2  THEN 1 ELSE 0 END) valor_2,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_auditivo_pre_eval` = 3  THEN 1 ELSE 0 END) valor_3,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_auditivo_pre_eval` = 4  THEN 1 ELSE 0 END) valor_4,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_auditivo_pre_eval` = 5  THEN 1 ELSE 0 END) valor_5,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND (puesto_trabajo.`s_auditivo_pre_eval` IS NOT NULL) THEN 1 ELSE 0 END) total
		FROM puesto_trabajo INNER JOIN personal ON personal.codigo_sabha = puesto_trabajo.codigo_sabha
		WHERE puesto_trabajo.id_empresa = $id_empresa AND personal.`sede_estudio` = puesto_trabajo.`nombre_local`
		UNION ALL
		SELECT 'MOTRIZ EXT INFERIORES' as 'TIPO_DISCAPACIDAD', 'PUESTOS' AS 'VALORES',
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_inf_pre_eval` = 0  THEN 1 ELSE 0 END) valor_0,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_inf_pre_eval` = 1  THEN 1 ELSE 0 END) valor_1,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_inf_pre_eval` = 2  THEN 1 ELSE 0 END) valor_2,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_inf_pre_eval` = 3  THEN 1 ELSE 0 END) valor_3,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_inf_pre_eval` = 4  THEN 1 ELSE 0 END) valor_4,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_inf_pre_eval` = 5  THEN 1 ELSE 0 END) valor_5,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND (puesto_trabajo.`m_ext_inf_pre_eval` IS NOT NULL) THEN 1 ELSE 0 END) total
		FROM puesto_trabajo WHERE puesto_trabajo.id_empresa = $id_empresa
		UNION ALL
		SELECT '' as 'TIPO_DISCAPACIDAD', 'Nro TRABAJADORES' AS 'VALORES',
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_inf_pre_eval` = 0  THEN 1 ELSE 0 END) valor_0,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_inf_pre_eval` = 1  THEN 1 ELSE 0 END) valor_1,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_inf_pre_eval` = 2  THEN 1 ELSE 0 END) valor_2,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_inf_pre_eval` = 3  THEN 1 ELSE 0 END) valor_3,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_inf_pre_eval` = 4  THEN 1 ELSE 0 END) valor_4,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_inf_pre_eval` = 5  THEN 1 ELSE 0 END) valor_5,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND (puesto_trabajo.`m_ext_inf_pre_eval` IS NOT NULL) THEN 1 ELSE 0 END) total
		FROM puesto_trabajo INNER JOIN personal ON personal.codigo_sabha = puesto_trabajo.codigo_sabha
		WHERE puesto_trabajo.id_empresa = $id_empresa AND personal.`sede_estudio` = puesto_trabajo.`nombre_local`
		UNION ALL
		SELECT 'MOTRIZ EXT SUPERIORES' as 'TIPO_DISCAPACIDAD', 'PUESTOS' AS 'VALORES',
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_sup_pre_eval` = 0  THEN 1 ELSE 0 END) valor_0,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_sup_pre_eval` = 1  THEN 1 ELSE 0 END) valor_1,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_sup_pre_eval` = 2  THEN 1 ELSE 0 END) valor_2,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_sup_pre_eval` = 3  THEN 1 ELSE 0 END) valor_3,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_sup_pre_eval` = 4  THEN 1 ELSE 0 END) valor_4,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_sup_pre_eval` = 5  THEN 1 ELSE 0 END) valor_5,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND (puesto_trabajo.`m_ext_sup_pre_eval` IS NOT NULL) THEN 1 ELSE 0 END) total
		FROM puesto_trabajo WHERE puesto_trabajo.id_empresa = $id_empresa
		UNION ALL
		SELECT '' as 'TIPO_DISCAPACIDAD', 'Nro TRABAJADORES' AS 'VALORES',
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_sup_pre_eval` = 0  THEN 1 ELSE 0 END) valor_0,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_sup_pre_eval` = 1  THEN 1 ELSE 0 END) valor_1,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_sup_pre_eval` = 2  THEN 1 ELSE 0 END) valor_2,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_sup_pre_eval` = 3  THEN 1 ELSE 0 END) valor_3,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_sup_pre_eval` = 4  THEN 1 ELSE 0 END) valor_4,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_sup_pre_eval` = 5  THEN 1 ELSE 0 END) valor_5,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND (puesto_trabajo.`m_ext_sup_pre_eval` IS NOT NULL) THEN 1 ELSE 0 END) total
		FROM puesto_trabajo INNER JOIN personal ON personal.codigo_sabha = puesto_trabajo.codigo_sabha
		WHERE puesto_trabajo.id_empresa = $id_empresa AND personal.`sede_estudio` = puesto_trabajo.`nombre_local`
		UNION ALL
		SELECT 'MENTAL INTELECTUAL' as 'TIPO_DISCAPACIDAD', 'PUESTOS' AS 'VALORES',
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_intelectual_pre_eval` = 0  THEN 1 ELSE 0 END) valor_0,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_intelectual_pre_eval` = 1  THEN 1 ELSE 0 END) valor_1,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_intelectual_pre_eval` = 2  THEN 1 ELSE 0 END) valor_2,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_intelectual_pre_eval` = 3  THEN 1 ELSE 0 END) valor_3,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_intelectual_pre_eval` = 4  THEN 1 ELSE 0 END) valor_4,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_intelectual_pre_eval` = 5  THEN 1 ELSE 0 END) valor_5,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND (puesto_trabajo.`m_intelectual_pre_eval` IS NOT NULL) THEN 1 ELSE 0 END) total
		FROM puesto_trabajo WHERE puesto_trabajo.id_empresa = $id_empresa
		UNION ALL
		SELECT '' as 'TIPO_DISCAPACIDAD', 'Nro TRABAJADORES' AS 'VALORES',
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_intelectual_pre_eval` = 0  THEN 1 ELSE 0 END) valor_0,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_intelectual_pre_eval` = 1  THEN 1 ELSE 0 END) valor_1,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_intelectual_pre_eval` = 2  THEN 1 ELSE 0 END) valor_2,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_intelectual_pre_eval` = 3  THEN 1 ELSE 0 END) valor_3,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_intelectual_pre_eval` = 4  THEN 1 ELSE 0 END) valor_4,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_intelectual_pre_eval` = 5  THEN 1 ELSE 0 END) valor_5,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND (puesto_trabajo.`m_intelectual_pre_eval` IS NOT NULL) THEN 1 ELSE 0 END) total
		FROM puesto_trabajo INNER JOIN personal ON personal.codigo_sabha = puesto_trabajo.codigo_sabha
		WHERE puesto_trabajo.id_empresa = $id_empresa AND personal.`sede_estudio` = puesto_trabajo.`nombre_local`
		UNION ALL
		SELECT 'MENTAL PSICOLOGICO' as 'TIPO_DISCAPACIDAD', 'PUESTOS' AS 'VALORES',
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_psicosocial_pre_eval` = 0  THEN 1 ELSE 0 END) valor_0,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_psicosocial_pre_eval` = 1  THEN 1 ELSE 0 END) valor_1,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_psicosocial_pre_eval` = 2  THEN 1 ELSE 0 END) valor_2,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_psicosocial_pre_eval` = 3  THEN 1 ELSE 0 END) valor_3,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_psicosocial_pre_eval` = 4  THEN 1 ELSE 0 END) valor_4,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_psicosocial_pre_eval` = 5  THEN 1 ELSE 0 END) valor_5,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND (puesto_trabajo.`m_psicosocial_pre_eval` IS NOT NULL) THEN 1 ELSE 0 END) total
		FROM puesto_trabajo WHERE puesto_trabajo.id_empresa = $id_empresa
		UNION ALL
		SELECT '' as 'TIPO_DISCAPACIDAD', 'Nro TRABAJADORES' AS 'VALORES',
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_psicosocial_pre_eval` = 0  THEN 1 ELSE 0 END) valor_0,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_psicosocial_pre_eval` = 1  THEN 1 ELSE 0 END) valor_1,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_psicosocial_pre_eval` = 2  THEN 1 ELSE 0 END) valor_2,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_psicosocial_pre_eval` = 3  THEN 1 ELSE 0 END) valor_3,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_psicosocial_pre_eval` = 4  THEN 1 ELSE 0 END) valor_4,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_psicosocial_pre_eval` = 5  THEN 1 ELSE 0 END) valor_5,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND (puesto_trabajo.`m_psicosocial_pre_eval` IS NOT NULL) THEN 1 ELSE 0 END) total
		FROM puesto_trabajo INNER JOIN personal ON personal.codigo_sabha = puesto_trabajo.codigo_sabha
		WHERE puesto_trabajo.id_empresa = $id_empresa AND personal.`sede_estudio` = puesto_trabajo.`nombre_local`
		";

		} else {

			$_sql ="SELECT 'SENSORIAL VISUAL' as 'TIPO_DISCAPACIDAD', 'PUESTOS' AS 'VALORES',
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_visual_pre_eval` = 0  THEN 1 ELSE 0 END) valor_0,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_visual_pre_eval` = 1  THEN 1 ELSE 0 END) valor_1,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_visual_pre_eval` = 2  THEN 1 ELSE 0 END) valor_2,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_visual_pre_eval` = 3  THEN 1 ELSE 0 END) valor_3,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_visual_pre_eval` = 4  THEN 1 ELSE 0 END) valor_4,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_visual_pre_eval` = 5  THEN 1 ELSE 0 END) valor_5,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND (puesto_trabajo.`s_visual_pre_eval` IS NOT NULL) THEN 1 ELSE 0 END) total
		FROM puesto_trabajo WHERE puesto_trabajo.id_empresa = $id_empresa AND puesto_trabajo.id_local = $id_local 
		UNION ALL
		SELECT '' as 'TIPO_DISCAPACIDAD', 'Nro TRABAJADORES' AS 'VALORES',
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_visual_pre_eval` = 0  THEN 1 ELSE 0 END) valor_0,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_visual_pre_eval` = 1  THEN 1 ELSE 0 END) valor_1,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_visual_pre_eval` = 2  THEN 1 ELSE 0 END) valor_2,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_visual_pre_eval` = 3  THEN 1 ELSE 0 END) valor_3,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_visual_pre_eval` = 4  THEN 1 ELSE 0 END) valor_4,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_visual_pre_eval` = 5  THEN 1 ELSE 0 END) valor_5,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND (puesto_trabajo.`s_visual_pre_eval` IS NOT NULL) THEN 1 ELSE 0 END) total
		FROM puesto_trabajo INNER JOIN personal ON personal.codigo_sabha = puesto_trabajo.codigo_sabha
		WHERE puesto_trabajo.id_empresa = $id_empresa AND personal.`sede_estudio` = puesto_trabajo.`nombre_local` AND puesto_trabajo.id_local = $id_local 
		UNION ALL
		SELECT 'SENSORIAL AUDITIVO' as 'TIPO_DISCAPACIDAD', 'PUESTOS' AS 'VALORES',
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_auditivo_pre_eval` = 0  THEN 1 ELSE 0 END) valor_0,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_auditivo_pre_eval` = 1  THEN 1 ELSE 0 END) valor_1,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_auditivo_pre_eval` = 2  THEN 1 ELSE 0 END) valor_2,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_auditivo_pre_eval` = 3  THEN 1 ELSE 0 END) valor_3,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_auditivo_pre_eval` = 4  THEN 1 ELSE 0 END) valor_4,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_auditivo_pre_eval` = 5  THEN 1 ELSE 0 END) valor_5,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND (puesto_trabajo.`s_auditivo_pre_eval` IS NOT NULL) THEN 1 ELSE 0 END) total
		FROM puesto_trabajo WHERE puesto_trabajo.id_empresa = $id_empresa AND puesto_trabajo.id_local = $id_local 
		UNION ALL
		SELECT '' as 'TIPO_DISCAPACIDAD', 'Nro TRABAJADORES' AS 'VALORES',
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_auditivo_pre_eval` = 0  THEN 1 ELSE 0 END) valor_0,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_auditivo_pre_eval` = 1  THEN 1 ELSE 0 END) valor_1,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_auditivo_pre_eval` = 2  THEN 1 ELSE 0 END) valor_2,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_auditivo_pre_eval` = 3  THEN 1 ELSE 0 END) valor_3,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_auditivo_pre_eval` = 4  THEN 1 ELSE 0 END) valor_4,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`s_auditivo_pre_eval` = 5  THEN 1 ELSE 0 END) valor_5,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND (puesto_trabajo.`s_auditivo_pre_eval` IS NOT NULL) THEN 1 ELSE 0 END) total
		FROM puesto_trabajo INNER JOIN personal ON personal.codigo_sabha = puesto_trabajo.codigo_sabha
		WHERE puesto_trabajo.id_empresa = $id_empresa AND personal.`sede_estudio` = puesto_trabajo.`nombre_local` AND puesto_trabajo.id_local = $id_local 
		UNION ALL
		SELECT 'MOTRIZ EXT INFERIORES' as 'TIPO_DISCAPACIDAD', 'PUESTOS' AS 'VALORES',
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_inf_pre_eval` = 0  THEN 1 ELSE 0 END) valor_0,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_inf_pre_eval` = 1  THEN 1 ELSE 0 END) valor_1,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_inf_pre_eval` = 2  THEN 1 ELSE 0 END) valor_2,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_inf_pre_eval` = 3  THEN 1 ELSE 0 END) valor_3,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_inf_pre_eval` = 4  THEN 1 ELSE 0 END) valor_4,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_inf_pre_eval` = 5  THEN 1 ELSE 0 END) valor_5,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND (puesto_trabajo.`m_ext_inf_pre_eval` IS NOT NULL) THEN 1 ELSE 0 END) total
		FROM puesto_trabajo WHERE puesto_trabajo.id_empresa = $id_empresa AND puesto_trabajo.id_local = $id_local 
		UNION ALL
		SELECT '' as 'TIPO_DISCAPACIDAD', 'Nro TRABAJADORES' AS 'VALORES',
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_inf_pre_eval` = 0  THEN 1 ELSE 0 END) valor_0,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_inf_pre_eval` = 1  THEN 1 ELSE 0 END) valor_1,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_inf_pre_eval` = 2  THEN 1 ELSE 0 END) valor_2,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_inf_pre_eval` = 3  THEN 1 ELSE 0 END) valor_3,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_inf_pre_eval` = 4  THEN 1 ELSE 0 END) valor_4,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_inf_pre_eval` = 5  THEN 1 ELSE 0 END) valor_5,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND (puesto_trabajo.`m_ext_inf_pre_eval` IS NOT NULL) THEN 1 ELSE 0 END) total
		FROM puesto_trabajo INNER JOIN personal ON personal.codigo_sabha = puesto_trabajo.codigo_sabha
		WHERE puesto_trabajo.id_empresa = $id_empresa AND personal.`sede_estudio` = puesto_trabajo.`nombre_local` AND puesto_trabajo.id_local = $id_local 
		UNION ALL
		SELECT 'MOTRIZ EXT SUPERIORES' as 'TIPO_DISCAPACIDAD', 'PUESTOS' AS 'VALORES',
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_sup_pre_eval` = 0  THEN 1 ELSE 0 END) valor_0,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_sup_pre_eval` = 1  THEN 1 ELSE 0 END) valor_1,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_sup_pre_eval` = 2  THEN 1 ELSE 0 END) valor_2,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_sup_pre_eval` = 3  THEN 1 ELSE 0 END) valor_3,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_sup_pre_eval` = 4  THEN 1 ELSE 0 END) valor_4,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_sup_pre_eval` = 5  THEN 1 ELSE 0 END) valor_5,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND (puesto_trabajo.`m_ext_sup_pre_eval` IS NOT NULL) THEN 1 ELSE 0 END) total
		FROM puesto_trabajo WHERE puesto_trabajo.id_empresa = $id_empresa AND puesto_trabajo.id_local = $id_local 
		UNION ALL
		SELECT '' as 'TIPO_DISCAPACIDAD', 'Nro TRABAJADORES' AS 'VALORES',
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_sup_pre_eval` = 0  THEN 1 ELSE 0 END) valor_0,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_sup_pre_eval` = 1  THEN 1 ELSE 0 END) valor_1,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_sup_pre_eval` = 2  THEN 1 ELSE 0 END) valor_2,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_sup_pre_eval` = 3  THEN 1 ELSE 0 END) valor_3,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_sup_pre_eval` = 4  THEN 1 ELSE 0 END) valor_4,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_ext_sup_pre_eval` = 5  THEN 1 ELSE 0 END) valor_5,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND (puesto_trabajo.`m_ext_sup_pre_eval` IS NOT NULL) THEN 1 ELSE 0 END) total
		FROM puesto_trabajo INNER JOIN personal ON personal.codigo_sabha = puesto_trabajo.codigo_sabha
		WHERE puesto_trabajo.id_empresa = $id_empresa AND personal.`sede_estudio` = puesto_trabajo.`nombre_local` AND puesto_trabajo.id_local = $id_local 
		UNION ALL
		SELECT 'MENTAL INTELECTUAL' as 'TIPO_DISCAPACIDAD', 'PUESTOS' AS 'VALORES',
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_intelectual_pre_eval` = 0  THEN 1 ELSE 0 END) valor_0,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_intelectual_pre_eval` = 1  THEN 1 ELSE 0 END) valor_1,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_intelectual_pre_eval` = 2  THEN 1 ELSE 0 END) valor_2,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_intelectual_pre_eval` = 3  THEN 1 ELSE 0 END) valor_3,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_intelectual_pre_eval` = 4  THEN 1 ELSE 0 END) valor_4,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_intelectual_pre_eval` = 5  THEN 1 ELSE 0 END) valor_5,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND (puesto_trabajo.`m_intelectual_pre_eval` IS NOT NULL) THEN 1 ELSE 0 END) total
		FROM puesto_trabajo WHERE puesto_trabajo.id_empresa = $id_empresa AND puesto_trabajo.id_local = $id_local 
		UNION ALL
		SELECT '' as 'TIPO_DISCAPACIDAD', 'Nro TRABAJADORES' AS 'VALORES',
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_intelectual_pre_eval` = 0  THEN 1 ELSE 0 END) valor_0,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_intelectual_pre_eval` = 1  THEN 1 ELSE 0 END) valor_1,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_intelectual_pre_eval` = 2  THEN 1 ELSE 0 END) valor_2,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_intelectual_pre_eval` = 3  THEN 1 ELSE 0 END) valor_3,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_intelectual_pre_eval` = 4  THEN 1 ELSE 0 END) valor_4,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_intelectual_pre_eval` = 5  THEN 1 ELSE 0 END) valor_5,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND (puesto_trabajo.`m_intelectual_pre_eval` IS NOT NULL) THEN 1 ELSE 0 END) total
		FROM puesto_trabajo INNER JOIN personal ON personal.codigo_sabha = puesto_trabajo.codigo_sabha
		WHERE puesto_trabajo.id_empresa = $id_empresa AND personal.`sede_estudio` = puesto_trabajo.`nombre_local` AND puesto_trabajo.id_local = $id_local 
		UNION ALL
		SELECT 'MENTAL PSICOLOGICO' as 'TIPO_DISCAPACIDAD', 'PUESTOS' AS 'VALORES',
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_psicosocial_pre_eval` = 0  THEN 1 ELSE 0 END) valor_0,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_psicosocial_pre_eval` = 1  THEN 1 ELSE 0 END) valor_1,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_psicosocial_pre_eval` = 2  THEN 1 ELSE 0 END) valor_2,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_psicosocial_pre_eval` = 3  THEN 1 ELSE 0 END) valor_3,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_psicosocial_pre_eval` = 4  THEN 1 ELSE 0 END) valor_4,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_psicosocial_pre_eval` = 5  THEN 1 ELSE 0 END) valor_5,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND (puesto_trabajo.`m_psicosocial_pre_eval` IS NOT NULL) THEN 1 ELSE 0 END) total
		FROM puesto_trabajo WHERE puesto_trabajo.id_empresa = $id_empresa AND puesto_trabajo.id_local = $id_local 
		UNION ALL
		SELECT '' as 'TIPO_DISCAPACIDAD', 'Nro TRABAJADORES' AS 'VALORES',
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_psicosocial_pre_eval` = 0  THEN 1 ELSE 0 END) valor_0,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_psicosocial_pre_eval` = 1  THEN 1 ELSE 0 END) valor_1,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_psicosocial_pre_eval` = 2  THEN 1 ELSE 0 END) valor_2,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_psicosocial_pre_eval` = 3  THEN 1 ELSE 0 END) valor_3,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_psicosocial_pre_eval` = 4  THEN 1 ELSE 0 END) valor_4,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND puesto_trabajo.`m_psicosocial_pre_eval` = 5  THEN 1 ELSE 0 END) valor_5,
		SUM(CASE WHEN (puesto_trabajo.es_apto = 1 OR puesto_trabajo.es_apto = 0) AND (puesto_trabajo.`m_psicosocial_pre_eval` IS NOT NULL) THEN 1 ELSE 0 END) total
		FROM puesto_trabajo INNER JOIN personal ON personal.codigo_sabha = puesto_trabajo.codigo_sabha
		WHERE puesto_trabajo.id_empresa = $id_empresa AND personal.`sede_estudio` = puesto_trabajo.`nombre_local` AND puesto_trabajo.id_local = $id_local 
		";

		}

		$result = $this->db->query($_sql);

		$objPHPExcel = new PHPExcel();
		// Set document properties
		$objPHPExcel->getProperties()->setCreator("GEORDI")
			->setLastModifiedBy("GEORDI")
			->setTitle("Resultados de la evaluación de funcionalidades físicas y mentales")
			->setDescription("Tabla N° 4 Resultados de la evaluación de funcionalidades físicas y mentales");

		// Nombre de Hola Excel
		$objPHPExcel->getActiveSheet()->setTitle('Tabla Nro. 4');
		// Titulos de la grilla
		$objPHPExcel->getActiveSheet()->setCellValue('A1', 'Tabla N° 4 Resultados de la evaluación de funcionalidades Físicas y Mentales');

		$objPHPExcel->getActiveSheet()->setCellValue('A2', 'FUNCIONALIDAD');
		$objPHPExcel->getActiveSheet()->setCellValue('B2', '');
		$objPHPExcel->getActiveSheet()->setCellValue('C2', 'NORMAL');
		$objPHPExcel->getActiveSheet()->setCellValue('D2', 'CLASES FUNCIONALES');
		$objPHPExcel->getActiveSheet()->setCellValue('E2', '');
		$objPHPExcel->getActiveSheet()->setCellValue('F2', '');
		$objPHPExcel->getActiveSheet()->setCellValue('G2', '');
		$objPHPExcel->getActiveSheet()->setCellValue('H2', '');
		$objPHPExcel->getActiveSheet()->setCellValue('I2', 'TOTAL GENERAL');


		$objPHPExcel->getActiveSheet()->setCellValue('A3', '');
		$objPHPExcel->getActiveSheet()->setCellValue('B3', '');
		$objPHPExcel->getActiveSheet()->setCellValue('C3', '0');
		$objPHPExcel->getActiveSheet()->setCellValue('D3', '1');
		$objPHPExcel->getActiveSheet()->setCellValue('E3', '2');
		$objPHPExcel->getActiveSheet()->setCellValue('F3', '3');
		$objPHPExcel->getActiveSheet()->setCellValue('G3', '4');
		$objPHPExcel->getActiveSheet()->setCellValue('H3', '5');
		$objPHPExcel->getActiveSheet()->setCellValue('I3', '');

		$objPHPExcel->getActiveSheet()->mergeCells('D2:H2');

		$objPHPExcel->getActiveSheet()->getStyle('A2:I2')->applyFromArray(
			array(
				'font'    => array(
					'bold'  => true,
					'color' => array('rgb' => 'FFFFFF'),
					'size'  => 10,
					'name'  => 'Arial'
				),
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				),
				'fill' => array(
					'type'       => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
					'startcolor' => array(
						'argb' => '3B5A66'
					)
				)
			)
		);

		$objPHPExcel->getActiveSheet()->getStyle('A3:I3')->applyFromArray(
			array(
				'font'    => array(
					'bold'  => true,
					'color' => array('rgb' => 'FFFFFF'),
					'size'  => 10,
					'name'  => 'Arial'
				),
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				),
				'fill' => array(
					'type'       => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
					'startcolor' => array(
						'argb' => '3B5A66'
					)
				)
			)
		);
		// C1DDE7 // DEE5F0

		$objPHPExcel->getActiveSheet()->getStyle('A2:I2')->getFill()->applyFromArray(array(
			'type' => PHPExcel_Style_Fill::FILL_SOLID,
			'startcolor' => array(
				'rgb' => '2C3A63'
			)
		));

		$objPHPExcel->getActiveSheet()->getStyle('A3:I3')->getFill()->applyFromArray(array(
			'type' => PHPExcel_Style_Fill::FILL_SOLID,
			'startcolor' => array(
				'rgb' => '2C3A63'
			)
		));
//        $this->cellColor('A1:G1','#3B5A66');
//        $this->cellColor('A2:G2','#3B5A66');

		$objPHPExcel->getActiveSheet()->fromArray($result->result_array(), NULL, 'A4');

		foreach(range('B','I') as $columnID)
		{
			$objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
		}

		// Redirect output to a client’s web browser (Excel5)
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="REPORTE_TABLA_NRO4'. date('ymd') .'.xls"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
		exit;



	}




}
