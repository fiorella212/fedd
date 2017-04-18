<?php
/**
 * Created by PhpStorm.
 * User: jorgenunez
 * Date: 2/16/17
 * Time: 11:30 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Personal extends CI_Controller
{

    function __construct()
    {

        parent::__construct();
        $this->load->model('Personal_model');

        $this->load->library(array('form_validation', 'session'));
        $this->load->helper(array('url', 'html', 'form'));
    }

    public function index()
    {
        $this->load->view('header');
        $this->load->view('navbar');
        $this->load->view('personal/main');
        $this->load->view('footer');
    }

    function subirarchivo(){
        $result = array('status' => false, 'result' => null);
        $permisos = $this->session->userdata('permisos');
        if($permisos['area']['eliminar'] == 1) {
            if (isset($_FILES['archivo'])) {
                $archivo = $_FILES['archivo'];
                $original = pathinfo($archivo['name'], PATHINFO_FILENAME);
                $extension = pathinfo($archivo['name'], PATHINFO_EXTENSION);
                $time = date('YmdHis');
                $nombre = "$original" . "_" . "$time.$extension";
                if (move_uploaded_file($archivo['tmp_name'], "uploads/$nombre")) {
                    $this->cargarexcel($nombre);
                } else {
                    $result['result'] = 'El archivo no pudo subir';
                    echo json_encode($result);
                }
            }
        }else{
           $result['result'] = 'No tiene permisos para ejecutar esta acción.';
            echo json_encode($result);
        }
    }

    function cargarexcel($newfilename){
        try{
            $result = array('status' => false, 'result' => null);
            $this->load->library('excel');

            ini_set('max_execution_time', -1);
            ini_set('memory_limit', '-1');
            $this->load->database();

            $obj_excel = PHPExcel_IOFactory::load("uploads/{$newfilename}");
            $sheetData = $obj_excel->getActiveSheet()->toArray(null,true,true,true);

            foreach ($sheetData as $index => $value) {
                if ( $index != 1 ){
//                    'id_empresa_sap','empresa_nombre_sap','id_sede_sap','sede_nombre_sap','area_nombre',
//                            'codigo_puesto_creado','codigo_sabha','consultoria','codigo_puesto','nombre_puesto',
//                            'genero','num_colaborador',
//                            'nombres_apellidos','fecha_nacimiento','fecha_ingreso','id_empresa'
                    $personal = new Personal_model();
                    $personal->id_empresa_sap = $value['A'];
                    $personal->empresa_nombre_sap = $value['B'];
                    $personal->id_sede_sap = $value['C'];
                    $personal->sede_nombre_sap = $value['D'];
                    $personal->area_nombre = $value['E'];
                    $personal->codigo_puesto_creado = $value['F'];
                    $personal->codigo_sabha = $value['G'];
                    $personal->consultoria = $value['H'];
                    $personal->codigo_puesto = $value['I'];
                    $personal->nombre_puesto = $value['J'];
                    $personal->genero = $value['K'];
                    $personal->num_colaborador = $value['L'];
                    $personal->nombres_apellidos = $value['M'];
                    $personal->fecha_nacimiento = date("Y-m-d",strtotime($value['N']));
                    $personal->fecha_ingreso = date("Y-m-d",strtotime($value['O']));
                    $personal->sede_estudio = $value['P'] == ''? '' : $value['P'];
                    $personal->id_empresa = $this->session->id_empresa;
                    $personal->save();
                }
            }
            $result['status'] = true;
            $result['result'] = 'Se importo los registros SAP correctamente';

        }catch(Exception $e){
            $result['result'] = $e->getMessage();
        }

        unlink("uploads/{$newfilename}");
        echo json_encode($result);
    }

    function deleteall() {
		try {
			$result = array('status' => false, 'result' => null);
			$this->db->query('TRUNCATE personal');
			$result['status'] = true;
			$result['result'] = 'Se elimino correctamente los registros de Personal SAP';
		} catch(Exception $e){
			$result['result'] = $e->getMessage();
		}
		echo json_encode($result);
	}
}
