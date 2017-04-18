<?php
/**
 * Created by IntelliJ IDEA.
 * User: gustavo
 * Date: 2/3/17
 * Time: 9:08 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Area extends CI_Controller
{

    function __construct()
    {

        parent::__construct();
        $this->load->model('Empresa_model');
        $this->load->model('Local_model');
        $this->load->model('Area_model');
        $this->load->model('Puesto_trabajo_model');

        $this->load->library(array('form_validation', 'session'));
        $this->load->helper(array('url', 'html', 'form'));
        $this->load->library('Boxspoutxls');
    }

    public function index()
    {
        $data = array();
        $empresaArray = array();
        $empresa = Empresa_model::where(['estado' => 1])->get();

        foreach ($empresa as $row_empresa) {
            $array = array(
                'id' => $row_empresa->id,
                'codigo' => $row_empresa->codigo,
                'razon_social' => $row_empresa->razon_social,
                'ruc' => $row_empresa->ruc,
                'direccion' => $row_empresa->direccion,
                'telefono' => $row_empresa->telefono,
            );
            array_push($empresaArray, $array);
        }

        $data['empresas'] = $empresaArray;

        $this->load->view('header');
        $this->load->view('navbar');
        $this->load->view('area/main', $data);
        $this->load->view('footer');
    }

    public function getLocalByEmpresaId()
    {
        $arrayLocal = array();
        $empresa_id = (int)$this->input->post('id_empresa');

        $local = Local_model::where(['id_empresa' => $empresa_id, 'estado' => 1])->get();

        foreach ($local as $row_local) {
            $array = array(
                'id' => $row_local->id,
                'nombre' => $row_local->nombre
            );

            array_push($arrayLocal, $array);
        }
        echo json_encode($arrayLocal);
    }

    public function getAll()
    {
        $arrayArea = array();
//        $tmpLocales = Local_model::select('id')->whereRaw('id_empresa = ?', array($this->session->id_empresa))->get()->toArray();
//        $idLocal = array();
//		foreach ($tmpLocales as $id => $x) {
//			array_push($idLocal, $x['id']);
//        }
//        print_r($idLocal);die();
//        print_r(array(4,5,6,7,8));die();
//        $area = Area_model::whereIn('id_local', array(4,5,6,7,8));
//        print_r($area);die();
        $area = Area_model::has('local')->get();


        foreach ($area as $row_area) {
            if ($row_area->estado == 1) {
                $empresa = Empresa_model::where(['id' => $row_area->local->id_empresa])->first();
                $array = array(
                    'id_empresa' => $empresa->id,
                    'razon_social' => $empresa->razon_social,
                    'id_local' => $row_area->local->id,
                    'local' => $row_area->local->nombre,
                    'id_area' => $row_area->id,
                    'nombre' => $row_area->nombre
                );
                array_push($arrayArea, $array);
            }
        }

        $array_area = array(
            "draw" => 1,
            "recordsTotal" => count($arrayArea),
            "recordsFiltered" => count($arrayArea),
            "data" => $arrayArea
        );
        echo json_encode($array_area);
    }

    public function insert()
    {
        $result = array('status' => false, 'result' => null);
        $permisos = $this->session->userdata('permisos');
        if ($permisos['area']['agregar'] == 1) {
            $id_local = $this->input->post('id_local');
            $nombre = $this->input->post('nombre');

            try {
                $area = new Area_model();
                $area->id_local = $id_local;
                $area->nombre = $nombre;
                $area->usuario_creado = $this->session->userdata('usuario');
                $area->fecha_creado = date('Y-m-d H:i:s');

                $area->save();
                $result['status'] = true;
                $result['result'] = 'Se ha creado el area satisfactoriamente.';
            } catch (Illuminate\Database\QueryException $e) {

                $error_code = $e->errorInfo[1];
                $contrain = $e->errorInfo[2];
                if ($error_code == 1062) { // < codigo de error MySQL para unique

                    if (strpos($contrain, "area_local_UN")) { // buscamos el nombre del constrain y preguntamos por el =) : HACK://
                        $result['result'] = "Area ya existe en el Local";
                    }

                } else {

                    $result['result'] = "Error en la operacion, ocurrio un problema con el registro";
                }
            } catch (Exception $e) {
                $result['result'] = $e->getMessage();

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
        if ($permisos['area']['editar'] == 1) {
            $id = $this->input->post('id');
            $id_local = $this->input->post('id_local');
            $nombre = $this->input->post('nombre');

            try {
                $area = Area_model::find($id);
                $area->id_local = $id_local;
                $area->nombre = $nombre;
                $area->usuario_modificado = $this->session->userdata('usuario');
                $area->fecha_modificado = date('Y-m-d H:i:s');

                $area->save();
                $result['status'] = true;
                $result['result'] = 'Se actualizo el local satisfactoriamente.';
            } catch (Illuminate\Database\QueryException $e) {

                $error_code = $e->errorInfo[1];
                $contrain = $e->errorInfo[2];
                if ($error_code == 1062) { // < codigo de error MySQL para unique

                    if (strpos($contrain, "area_local_UN")) { // buscamos el nombre del constrain y preguntamos por el =) : HACK://
                        $result['result'] = "Area ya existe en el Local";
                    }

                } else {

                    $result['result'] = "Error en la operacion, ocurrio un problema con el registro";
                }
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
        if ($permisos['area']['eliminar'] == 1) {
            $id = $this->input->post('id');

            try {
                $count = Puesto_trabajo_model::where(['id_area'=> $id, 'estado'=>1])->count();
                if ($count == 0) {

                    $area = Area_model::find($id);
                    $area->estado = 0;
                    $area->usuario_modificado = $this->session->userdata('usuario');
                    $area->fecha_modificado = date('Y-m-d H:i:s');

                    $area->save();

                    $result['status'] = true;
                    $result['result'] = 'Se elimino el area satisfactoriamente.';
                } else {
                    $result['status'] = true;
                    $result['result'] = 'El area tiene asociado puestos de trabajo, no puede ser eliminada.';
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
        if ($permisos['area']['exportar'] == 1) {
            $labels_columns = array('Id', 'Nombre Area', 'Local', 'Usuario_creado', 'Fecha Creacion', 'Usuario Modificado', 'Fecha Modificado');

            $sql = "SELECT area.id, area.nombre, `local`.nombre AS local, area.usuario_creado, area.fecha_creado, area.usuario_modificado, area.fecha_modificado, area.estado FROM area
INNER JOIN `local` ON area.id_local = `local`.id;";

            $empresaExport = $this->db->query($sql)->result_array();

            $file_name = 'areas_';
            $label_sheet = 'Areas';
            $result['status'] = true;
            $result['result'] = $this->boxspoutxls->create_pareto_detail_report_xlsx($label_sheet, $labels_columns, $empresaExport, $file_name);
            echo json_encode($result);

        } else {
            $result['result'] = 'No tiene permisos para ejecutar esta acción.';
        }

    }

}

/* End of file Area_model.php */
/* Location: ./application/controllers/Area_model.php */
