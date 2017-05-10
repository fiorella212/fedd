<?php
/**
 * Created by IntelliJ IDEA.
 * User: gustavo
 * Date: 2/3/17
 * Time: 9:08 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa extends CI_Controller
{

    function __construct()
    {

        parent::__construct();
        $this->load->model('Empresa_model');
        $this->load->model('Local_model');

        $this->load->library(array('form_validation', 'session'));
        $this->load->helper(array('url', 'html', 'form'));
		$this->load->library('Boxspoutxls');
    }

    public function index()
    {
        $this->load->view('header');
        $this->load->view('navbar');
        $this->load->view('empresa/main');
        $this->load->view('footer');
    }

    public function getAll()
    {
        $empresaArray = array();
        $empresa = Empresa_model::where(['estado' => 1])->get();

        foreach ($empresa as $row_empresa) {
            $array = array(
                'id' => $row_empresa->id,
                'codigo' => $row_empresa->codigo,
                'razon_social' => $row_empresa->razon_social,
                'ruc' => $row_empresa->ruc,
                'rubro' => $row_empresa->rubro,
                'direccion' => $row_empresa->direccion,
                'telefono' => $row_empresa->telefono,
            );
            array_push($empresaArray, $array);
        }
        $array_empresa = array(
            "draw" => 1,
            "recordsTotal" => count($empresaArray),
            "recordsFiltered" => count($empresaArray),
            "data" => $empresaArray
        );
        echo json_encode($array_empresa);
    }

    public function insert()
    {
        $result = array('status' => false, 'result' => null);
        $permisos = $this->session->userdata('permisos');
        if ($permisos['empresa']['agregar'] == 1) {
            $codigo = $this->input->post('codigo');
            $razon_social = $this->input->post('razon_social');
            $ruc = $this->input->post('ruc');
            $direccion = $this->input->post('direccion');
            $telefono = $this->input->post('telefono');
            $rubro = $this->input->post('rubro');

            try {
                $empresa = new Empresa_model();
                $empresa->codigo = $codigo;
                $empresa->razon_social = $razon_social;
                $empresa->ruc = $ruc;
                $empresa->direccion = $direccion;
                $empresa->telefono = $telefono;
                $empresa->usuario_creado = $this->session->userdata('usuario');
                $empresa->fecha_creado = date('Y-m-d H:i:s');
                $empresa->rubro = $rubro;

                $empresa->save();
                $result['status'] = true;
                $result['result'] = 'Se ha creado la empresa satisfactoriamente.';

			} catch (Illuminate\Database\QueryException $e) {

				$error_code = $e->errorInfo[1];
				$contrain = $e->errorInfo[2];
				if ($error_code == 1062) { // < codigo de error MySQL para unique

					if (strpos($contrain, "empresa_codigo_UN")) {
						$result['result'] = "Codigo de Empresa ya existe.";
					}
					if (strpos($contrain, "empresa_ruc_UN")) {
						$result['result'] = "RUC de Empresa ya registrado.";
					}

				} else {

					$result['result'] = "Error en la operacion, ocurrio un problema con el registro";
					$result['exception'] = $e->getMessage();
				}
			} catch (Exception $e) {
				$result['result'] = "Error en la operacion, ocurrio un problema con el registro";
				$result['exception'] = $e->getMessage();

            }
        } else {
            $result['result'] = 'No tiene permisos para ejecutar esta acción.';
        }

        echo json_encode($result);
    }

    public function update()
    {
        $result = array('status' => false, 'result' => null);
        $permisos = $this->session->userdata('permisos');
        if ($permisos['empresa']['editar'] == 1) {
            $id = $this->input->post('id');
            $codigo = $this->input->post('codigo');
            $razon_social = $this->input->post('razon_social');
            $ruc = $this->input->post('ruc');
            $direccion = $this->input->post('direccion');
            $telefono = $this->input->post('telefono');
			$rubro = $this->input->post('rubro');

            try {
                $empresa = Empresa_model::find($id);
                $empresa->codigo = $codigo;
                $empresa->razon_social = $razon_social;
                $empresa->ruc = $ruc;
                $empresa->direccion = $direccion;
                $empresa->telefono = $telefono;
                $empresa->usuario_modificado = $this->session->userdata('usuario');
                $empresa->fecha_modificado = date('Y-m-d H:i:s');
				$empresa->rubro = $rubro;

                $empresa->save();
                $result['status'] = true;
                $result['result'] = 'Se actualizo la empresa satisfactoriamente.';
			} catch (Illuminate\Database\QueryException $e) {

				$error_code = $e->errorInfo[1];
				$contrain = $e->errorInfo[2];
				if ($error_code == 1062) { // < codigo de error MySQL para unique

					if (strpos($contrain, "empresa_codigo_UN")) {
						$result['result'] = "Codigo de Empresa ya existe.";
					}
					if (strpos($contrain, "empresa_ruc_UN")) {
						$result['result'] = "RUC de Empresa ya registrado.";
					}

				} else {
					$result['result'] = "Error en la operacion, ocurrio un problema con el registro";
					$result['exception'] = $e->getMessage();
				}
            } catch (Exception $e) {
				$result['result'] = "Error en la operacion, ocurrio un problema con el registro";
				$result['exception'] = $e->getMessage();

            }
        } else {
            $result['result'] = 'No tiene permisos para ejecutar esta acción.';
        }

        echo json_encode($result);
    }

    public function delete()
    {
        $result = array('status' => false, 'result' => null);
        $permisos = $this->session->userdata('permisos');
        if ($permisos['empresa']['eliminar'] == 1) {
            $id = $this->input->post('id');

            try {
                $count = Local_model::where(['id_empresa'=> $id,'estado'=> 1])->count();
               if($count == 0){
                   Empresa_model::destroy($id);
//                   $empresa = Empresa_model::find($id);
//
//                   $empresa->estado = 0;
//                   $empresa->usuario_modificado = $this->session->userdata('usuario');
//                   $empresa->fecha_modificado = date('Y-m-d H:i:s');
//
//                   $empresa->save();
                   $result['status'] = true;
                   $result['result'] = 'Se elimino la empresa satisfactoriamente.';
               }else{
                   $result['status'] = true;
                   $result['result'] = 'La empresa tiene asociado locales, no puede ser eliminada.';
               }

            } catch (Exception $e) {
                $result['result'] = $e->getMessage();

            }
        } else {
            $result['result'] = 'No tiene permisos para ejecutar esta acción.';
        }

        echo json_encode($result);
    }

	public function exportar()
	{
		$result = array('status' => false, 'result' => null);
		$empresaExport = array();
		$permisos = $this->session->userdata('permisos');
		if ($permisos['empresa']['exportar'] == 1) {
			$labels_columns = array('Codigo', 'Razon Social','Telefono', 'Direccion', 'Usuario_creado', 'Fecha Creacion','Usuario Modificado', 'Fecha Modificado');

			$sql = "SELECT 	empresa.codigo,	empresa.razon_social, empresa.ruc,	empresa.direccion,	empresa.telefono,
					empresa.usuario_creado,	empresa.fecha_creado,	empresa.usuario_modificado,
					empresa.fecha_modificado, empresa.estado FROM empresa;";

			$empresaExport = $this->db->query($sql)->result_array();

			$file_name = 'empresas_';
			$label_sheet = 'Empresas';
			$result['status']=true;
			$result['result'] = $this->boxspoutxls->create_pareto_detail_report_xlsx($label_sheet, $labels_columns, $empresaExport,$file_name);
			echo json_encode($result);

		}else{
			$result['result'] = 'No tiene permisos para ejecutar esta acción.';
		}

	}

}

/* End of file Empresa_model.php */
/* Location: ./application/controllers/Empresa_model.php */
