<?php

/**
 * Created by IntelliJ IDEA.
 * User: gustavo
 * Date: 2/3/17
 * Time: 11:06 PM
 */
class Local extends CI_Controller
{

    function __construct()
    {

        parent::__construct();
        $this->load->model('Local_model');
        $this->load->model('Area_model');
        $this->load->model('Empresa_model');

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
        $this->load->view('local/main', $data);
        $this->load->view('footer');
    }

    public function getAll()
    {
        $arrayLocal = array();
//        $local = Local_model::whereRaw('id_empresa = ? AND estado = 1', array($this->session->id_empresa))->get();
        $local = Local_model::has('empresa')->get();
        foreach ($local as $row_local) {
            if ($row_local->estado != 0) {
                $array = array(
                    'id_empresa' => $row_local->empresa->id,
                    'razon_social' => $row_local->empresa->razon_social,
                    'id_local' => $row_local->id,
                    'nombre' => $row_local->nombre,
                    'direccion' => $row_local->direccion,
                    'ubicacion' => $row_local->ubicacion,
                    'encargado' => $row_local->encargado,
                    'telefono' => $row_local->telefono,
                    'email' => $row_local->email
                );
                array_push($arrayLocal, $array);
            }
        }

        $array_local = array(
            "draw" => 1,
            "recordsTotal" => count($arrayLocal),
            "recordsFiltered" => count($arrayLocal),
            "data" => $arrayLocal
        );
        echo json_encode($array_local);
    }

    public function insert()
    {
        $result = array('status' => false, 'result' => null);
        $permisos = $this->session->userdata('permisos');
        if ($permisos['local']['agregar'] == 1) {
            $empresa_id = $this->input->post('id_empresa');
            $nombre = $this->input->post('nombre');
            $direccion = $this->input->post('direccion');
            $encargado = $this->input->post('encargado');
            $telefono = $this->input->post('telefono');
            $email = $this->input->post('email');
            $ubicacion = $this->input->post('ubicacion');

            try {
                $local = new Local_model();
                $local->id_empresa = $empresa_id;
                $local->nombre = $nombre;
                $local->direccion = $direccion;
                $local->ubicacion = $ubicacion;
                $local->encargado = $encargado;
                $local->telefono = $telefono;
                $local->email = $email;
                $local->usuario_creado = $this->session->userdata('usuario');
                $local->fecha_creado = date('Y-m-d H:i:s');

                $local->save();
                $result['status'] = true;
                $result['result'] = 'Se ha creado el local satisfactoriamente.';
            } catch (Illuminate\Database\QueryException $e) {

                $error_code = $e->errorInfo[1];
                $contrain = $e->errorInfo[2];
                if ($error_code == 1062) { // < codigo de error MySQL para unique

                    if (strpos($contrain, "local_empresa_UN")) {
                        $result['result'] = "Local ya existe en la Empresa.";
                    }

                } else {

                    $result['result'] = "Error en la operacion, ocurrio un problema con el registro";
                }
            } catch (Exception $e) {
//				local_empresa_UN
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
        if ($permisos['local']['editar'] == 1) {
            $id = $this->input->post('id');
            $empresa_id = $this->input->post('id_empresa');
            $nombre = $this->input->post('nombre');
            $direccion = $this->input->post('direccion');
            $encargado = $this->input->post('encargado');
            $telefono = $this->input->post('telefono');
            $email = $this->input->post('email');
			$ubicacion = $this->input->post('ubicacion');

            try {
                $local = Local_model::find($id);
                $local->id_empresa = $empresa_id;
                $local->nombre = $nombre;
                $local->direccion = $direccion;
                $local->ubicacion = $ubicacion;
                $local->encargado = $encargado;
                $local->telefono = $telefono;
                $local->email = $email;
                $local->usuario_modificado = $this->session->userdata('usuario');
                $local->fecha_modificado = date('Y-m-d H:i:s');

                $local->save();
                $result['status'] = true;
                $result['result'] = 'Se actualizo el local satisfactoriamente.';
            } catch (Illuminate\Database\QueryException $e) {

                $error_code = $e->errorInfo[1];
                $contrain = $e->errorInfo[2];
                if ($error_code == 1062) { // < codigo de error MySQL para unique

                    if (strpos($contrain, "local_empresa_UN")) {
                        $result['result'] = "Local ya existe en la Empresa.";
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
        if ($permisos['local']['eliminar'] == 1) {
            $id = $this->input->post('id');

            try {
                $count = Area_model::where(['id_local' => $id,'estado'=> 1])->count();
                if ($count == 0) {
                    $local = Local_model::find($id);
                    $local->estado = 0;
                    $local->usuario_modificado = $this->session->userdata('usuario');
                    $local->fecha_modificado = date('Y-m-d H:i:s');

                    $local->save();

                    $result['status'] = true;
                    $result['result'] = 'Se elimino el local satisfactoriamente.';
                } else {
                    $result['status'] = true;
                    $result['result'] = 'El local tiene asociado areas, no puede ser eliminado.';
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
        if ($permisos['local']['exportar'] == 1) {
            $labels_columns = array('Razon Social', 'Nombre Local', 'Direccion', 'Encargado', 'Telefono', 'Email', 'Usuario_creado', 'Fecha Creacion', 'Usuario Modificado', 'Fecha Modificado');

            $sql = "SELECT empresa.razon_social, local.nombre, local.direccion, local.encargado, local.telefono, local.email,
					local.usuario_creado, local.fecha_creado, local.usuario_modificado, local.fecha_modificado, local.estado
					FROM local INNER JOIN empresa ON empresa.id = local.id;";

            $empresaExport = $this->db->query($sql)->result_array();

            $file_name = 'locales_';
            $label_sheet = 'Locales';
            $result['status'] = true;
            $result['result'] = $this->boxspoutxls->create_pareto_detail_report_xlsx($label_sheet, $labels_columns, $empresaExport, $file_name);
            echo json_encode($result);

        } else {
            $result['result'] = 'No tiene permisos para ejecutar esta acción.';
        }

    }

}

/* End of file Local_model.php */
/* Location: ./application/controllers/Local_model.php */
