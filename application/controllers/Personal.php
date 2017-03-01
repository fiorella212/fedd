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
                    $personal = new Personal_model();
                    $personal->planilla = $value['A'];
                    $personal->codigo_sap = $value['B'];
                    $personal->fecha_ingreso = $value['C'];
                    $personal->nombres_trabajador = $value['D'];
                    $personal->apellidos_trabajador = $value['E'];
                    $personal->regimen = $value['F'];
                    $personal->sede = $value['G'];
                    $personal->denominacion_sap = $value['H'];
                    $personal->area = $value['I'];
                    $personal->fecha_nacimiento = $value['J'];
                    $personal->sexo = $value['K'];
                    $personal->anos_res_jubilacion = $value['L'];
                    $personal->ano_jubilacion = $value['M'];
                    $personal->dni = $value['N'];
                    $personal->codigo_trabajador = $value['O'];
                    $personal->gerencia = $value['P'];
                    $personal->id_empresa = $this->session->id_empresa;
                    $personal->save();
                }
            }
            $result['status'] = true;
            $result['result'] = 'Se importo los puestos correctamente';

        }catch(Exception $e){
            $result['result'] = $e->getMessage();
        }

        unlink("uploads/{$newfilename}");
        echo json_encode($result);
    }
}