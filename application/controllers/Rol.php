<?php
/**
 * Created by IntelliJ IDEA.
 * User: gustavo
 * Date: 2/4/17
 * Time: 1:05 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Rol extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Roles_model');
		$this->load->model('Permisos');
		$this->load->model('Rol_permiso');
		$this->load->model('Usuarios_model');
		$this->load->library(array('form_validation', 'session'));
		$this->load->helper(array('url', 'html', 'form'));
        $this->load->library('Boxspoutxls');
	}

	public function index()
	{
		$data['permisos'] = Permisos::all();
		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('rol/main', $data);
		$this->load->view('footer');
	}

	public function getAll()
	{
		$rolesArray = array();
		$roles = Roles_model::where(['estado' => 1])->get();

		foreach ($roles as $row_rol) {
			$array = array(
				'id' => $row_rol->id,
				'nombre' => $row_rol->nombre
			);
			array_push($rolesArray, $array);
		}
		$array_rol = array(
			"draw" => 1,
			"recordsTotal" => count($rolesArray),
			"recordsFiltered" => count($rolesArray),
			"data" => $rolesArray
		);
		echo json_encode($array_rol);
	}

	public function insert()
	{
		$result = array('status' => false, 'result' => null);
		$permisos = $this->session->userdata('permisos');
		if ($permisos['rol']['agregar'] == 1) {
			$nombre = $this->input->post('nombre');
			$permisos = $this->input->post('permisos');

			try {
				$rol = new Roles_model();
				$rol->nombre = $nombre;

				$count = 0;

				$sql = "SELECT count(1) as count FROM roles where nombre = '$nombre'";
				$query = $this->db->query($sql);
				foreach ($query->result() as $key => $value) {
					$count = $value->count;
				}

				if ($count == 0) {
					$rol->save();
					$sql = "SELECT id FROM roles where nombre = '$nombre'";
					$query = $this->db->query($sql);
					foreach ($query->result() as $key => $value) {
						$id = $value->id;
					}

					if(count($permisos)){
                        foreach ($permisos as $item) {
                            $rol_permiso = new Rol_permiso();
                            $rol_permiso->id_rol = $id;
                            $rol_permiso->id_permiso = ($item['id']);
                            $rol_permiso->acceso = ($item['acceso']);
                            $rol_permiso->agregar = ($item['agregar']);
                            $rol_permiso->editar = ($item['editar']);
                            $rol_permiso->eliminar = ($item['eliminar']);
                            $rol_permiso->exportar = ($item['exportar']);
                            $rol_permiso->importar = ($item['importar']);
                            $rol_permiso->save();
                        }

                    }

					$result['status'] = true;
					$result['result'] = 'Se ha creado el rol satisfactoriamente.';

				} else {
					$result['status'] = false;
					$result['result'] = 'Ya existe nombre de rol.';
				}
			} catch (Exception $e) {

				$result['result'] = $e->getMessage();
			}
		} else {
			$result['result'] = 'No tiene permisos para ejecutar esta acción.';
		}

		$this->db->close();
		echo json_encode($result);
	}

	public function getPermisos()
	{
		$array_rol_permisos = array();
		$id = $this->input->post('rol_id');

		$rol_permiso = Rol_permiso::where(['id_rol' => $id])->get();

		foreach ($rol_permiso as $row_rol) {
			$array = array(
				'id_rol' => $row_rol->id_rol,
				'id_permiso' => $row_rol->id_permiso,
				'acceso' => $row_rol->acceso,
				'agregar' => $row_rol->agregar,
				'editar' => $row_rol->editar,
				'eliminar' => $row_rol->eliminar,
				'exportar' => $row_rol->exportar,
				'importar' => $row_rol->importar
			);
			array_push($array_rol_permisos, $array);
		}
		$this->db->close();

		echo json_encode($array_rol_permisos);
	}

	public function update()
	{
		$result = array('status' => false, 'result' => null);
		$permisos = $this->session->userdata('permisos');
		if ($permisos['rol']['editar'] == 1) {
			$id = $this->input->post('id');
			$nombre = $this->input->post('nombre');
			$permisos = $this->input->post('permisos');

			try {
				$rol = Roles_model::find($id);
				$rol->nombre = $nombre;

				$rol->save();

				$sql = "DELETE FROM rol_permiso where id_rol = $id";
				$this->db->query($sql);

				foreach ($permisos as $item) {
					$rol_permiso = new Rol_permiso();
					$rol_permiso->id_rol = $id;
					$rol_permiso->id_permiso = ($item['id']);
					$rol_permiso->acceso = ($item['acceso']);
					$rol_permiso->agregar = ($item['agregar']);
					$rol_permiso->editar = ($item['editar']);
					$rol_permiso->eliminar = ($item['eliminar']);
					$rol_permiso->exportar = ($item['exportar']);
					$rol_permiso->importar = ($item['importar']);
					$rol_permiso->save();
				}

				$result['status'] = true;
				$result['result'] = 'Se actualizo el rol satisfactoriamente.';

			} catch (Exception $e) {
				$result['result'] = $e->getMessage();

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
		if ($permisos['rol']['eliminar'] == 1) {
			$id = $this->input->post('id');
			try {
                $count = Usuarios_model::where(['id_rol'=> $id,'estado'=> 1])->count();
                if($count == 0) {
                    $sql = "DELETE FROM rol_permiso where id_rol = $id";
                    $this->db->query($sql);

                    $rol = Roles_model::find($id);

                    $rol->estado = 0;
                    $rol->save();
                    $result['status'] = true;
                    $result['result'] = 'Se ha eliminado el rol satisfactoriamente.';
                    $this->db->trans_commit();
                }else{
                    $result['status'] = true;
                    $result['result'] = "No es posible eliminar un Perfil, si esta asignado a un Usuario";
                }
			} catch (Exception $e) {
				$this->db->trans_rollback();
				$result['result'] = $e->getMessage();
			} finally {
				$this->db->close();
			}
		} else {
			$result['result'] = 'No tiene permisos para ejecutar esta acción.';
		}
		echo json_encode($result);
	}

	public function exportar()
	{
		$result = array('status' => false, 'result' => null);
		$export = array();
		$permisos = $this->session->userdata('permisos');
		if ($permisos['rol']['exportar'] == 1) {
			$labels_columns = array('Rol', 'Nombre','Acceso','Agregar','Editar', 'Eliminar','Exportar', 'Importar');

			$sql = "SELECT r.nombre,p.nombre as permiso,rp.acceso,rp.agregar,rp.editar,rp.eliminar,rp.exportar,rp.importar
                    FROM roles r
                    INNER JOIN rol_permiso rp ON rp.id_rol = r.id
                    INNER JOIN permisos p ON p.id = rp.id_permiso
                    WHERE r.estado = 1;";

            $query = $this->db->query($sql);
            foreach ($query->result() as $key => $value){

                $acceso = $value->acceso == 1 ? 'Si' : 'No';
                $agregar = $value->agregar == 1 ? 'Si' : 'No';
                $editar = $value->editar == 1 ? 'Si' : 'No';
                $eliminar = $value->eliminar == 1 ? 'Si' : 'No';
                $exportar = $value->exportar == 1 ? 'Si' : 'No';
                $importar = $value->importar == 1 ? 'Si' : 'No';
                if($value->permiso == 'EVALUACION EVA-ERIN' || $value->permiso == 'EVALUACION SISO' || $value->permiso == 'EVALUACION FEDD'
                    || $value->permiso == 'REPORTE INTERNO'){
                    $agregar = '';
                    $editar = '';
                    $eliminar = '';
                    $exportar ='';
                    $importar = '';
                }
				if($value->permiso == 'IMPORTAR PERSONAL SAP'){
                    $agregar = '';
                    $editar = '';
                    $exportar ='';
                    $importar = '';
				}
                if($value->permiso == 'MANT. EMPRESA' || $value->permiso == 'MANT. SEDE' || $value->permiso == 'MANT. AREA'
                    || $value->permiso == 'MANT. ROLES' || $value->permiso == 'MANT. USUARIO' || $value->permiso == 'CONFIGURACION SISO') {
                    $importar = '';
                }
				if($value->permiso == 'REPORTE PUESTOS' || $value->permiso == 'PUESTOS POR EMPRESA' || $value->permiso == 'PUESTOS POR ACTIVIDAD'
					|| $value->permiso == 'FUNCIONALIDAD POR PUESTO' || $value->permiso == 'RIESGO POR SEDE' || $value->permiso == 'APTITUD DE LOS PUESTOS'
					|| $value->permiso == 'REDUCCION DE CONTINGENCIA'){
                    $agregar = '';
                    $editar = '';
                    $eliminar = '';
                    $importar = '';
                }

                $array = array(
                    $value->nombre ,
                    $value->permiso ,
                    $acceso,
                    $agregar,
                    $editar,
                    $eliminar,
                    $exportar,
                    $importar
                );
                array_push($export, $array);
            }

			$file_name = 'roles_';
			$label_sheet = 'Roles';
			$result['status']=true;
			$result['result'] = $this->boxspoutxls->create_pareto_detail_report_xlsx($label_sheet, $labels_columns, $export,$file_name);
			echo json_encode($result);

		}else{
			$result['result'] = 'No tiene permisos para ejecutar esta acción.';
		}

	}
}
