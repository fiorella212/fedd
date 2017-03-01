<?php
/**
 * Created by IntelliJ IDEA.
 * User: gustavo
 * Date: 2/4/17
 * Time: 12:38 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller
{
	function __construct()
	{
        parent::__construct();
        $this->load->model('Roles_model');
        $this->load->model('Usuarios_model');
        $this->load->model('Empresa_model');
		$this->load->library(array('form_validation', 'session'));
		$this->load->helper(array('url', 'html', 'form'));
        $this->load->library('Boxspoutxls');
	}

	public function index()
	{
		$data = array();
		$rolArray = array();
        $empresaArray = array();
		$rol = Roles_model::all();

		foreach ($rol as $row_rol){
			$array = array(
				'id' => $row_rol->id ,
				'nombre' => $row_rol->nombre
			);
			array_push($rolArray, $array);
		}

        $data['roles'] = $rolArray;
		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('usuario/main',$data);
		$this->load->view('footer');
	}

    public function getAll(){
        $arrayUsuario = array();
        $usuario = Usuarios_model::has('rol')->get();
        foreach ($usuario as $row_usuario){
            if($row_usuario->estado == 1){
                $empresa = Empresa_model::where(['id'=>$row_usuario->id_empresa])->first();
                $array = array(
                    'id' => $row_usuario->id ,
                    'nombres' => $row_usuario->nombres .' '.$row_usuario->apellidos  ,
                    'telefono' => $row_usuario->telefono,
                    'email' => $row_usuario->email,
                    'id_rol' => $row_usuario->rol->id,
                    'rol' => $row_usuario->rol->nombre,
                    'usuario' => $row_usuario->usuario,
                    'contrasena' => $row_usuario->contrasena,

                );
                array_push($arrayUsuario, $array);
            }

        }

        $array_usuario = array(
            "draw" => 1,
            "recordsTotal" => count($arrayUsuario),
            "recordsFiltered" => count($arrayUsuario),
            "data" => $arrayUsuario
        );
        echo json_encode($array_usuario);
    }

    public function insert(){
        $result = array('status' => false, 'result' => null);
        $permisos = $this->session->userdata('permisos');
        if ($permisos['usuario']['agregar'] == 1) {
            $nombres = $this->input->post('nombres');
            $apellidos = $this->input->post('apellidos');
            $telefono = $this->input->post('telefono');
            $email = $this->input->post('email');
            $nombre_usuario = $this->input->post('usuario');
            $contrasena = $this->input->post('contrasena');
            $id_rol = $this->input->post('id_rol');

            try {
                $usuario_existe = Usuarios_model::where(['usuario' => $nombre_usuario])->first();

                if ($usuario_existe) {
                    $result['result'] = 'Nombre de usuario repetido.';
                } else {
                    $usuario = new Usuarios_model();
                    $usuario->nombres = $nombres;
                    $usuario->apellidos = $apellidos;
                    $usuario->telefono = $telefono;
                    $usuario->email = $email;
                    $usuario->usuario = $nombre_usuario;
                    $usuario->contrasena = $contrasena;
                    $usuario->id_rol = $id_rol;
                    $usuario->usuario_creado = $this->session->userdata('usuario');
                    $usuario->fecha_creado = date('Y-m-d H:i:s');

                    $usuario->save();
                    $result['status'] = true;
                    $result['result'] = 'Se ha creado el usuario satisfactoriamente.';

                }

            } catch (Exception $e) {
                $result['result'] = $e->getMessage();

            }
        }else{
            $result['result'] = 'No tiene permisos para ejecutar esta acción.';
        }

        echo json_encode($result);
    }

    public function update(){
        $result = array('status' => false, 'result' => null);
        $permisos = $this->session->userdata('permisos');
        if ($permisos['usuario']['editar'] == 1) {
            $id = $this->input->post('id');
            $nombres = $this->input->post('nombres');
            $apellidos = $this->input->post('apellidos');
            $telefono = $this->input->post('telefono');
            $email = $this->input->post('email');
            $nombre_usuario = $this->input->post('usuario');
            $contrasena = $this->input->post('contrasena');
            $id_rol = $this->input->post('id_rol');

            try {
                $usuario = Usuarios_model::find($id);
                $usuario->nombres = $nombres;
                $usuario->apellidos = $apellidos;
                $usuario->telefono = $telefono;
                $usuario->email = $email;
                $usuario->usuario = $nombre_usuario;
                $usuario->contrasena = $contrasena;
                $usuario->id_rol = $id_rol;
                $usuario->usuario_modificado = $this->session->userdata('usuario');
                $usuario->fecha_modificado = date('Y-m-d H:i:s');


                $usuario->save();
                $result['status'] = true;
                $result['result'] = 'Se actualizo el usuario satisfactoriamente.';

            } catch (Exception $e) {
                $result['result'] = $e->getMessage();

            }
        }else{
            $result['result'] = 'No tiene permisos para ejecutar esta acción.';
        }

        echo json_encode($result);
    }

    public function delete(){
        $result = array('status' => false, 'result' => null);
        $permisos = $this->session->userdata('permisos');
        if ($permisos['usuario']['eliminar'] == 1) {
            $id = $this->input->post('id');

            try {
                $usuario = Usuarios_model::find($id);

                $usuario->estado = 0;
                $usuario->usuario_modificado = $this->session->userdata('usuario');
                $usuario->fecha_modificado = date('Y-m-d H:i:s');


                $usuario->save();

                $result['status'] = true;
                $result['result'] = 'Se elimino el usuario satisfactoriamente.';

            } catch (Exception $e) {
                $result['result'] = $e->getMessage();

            }
        }else{
            $result['result'] = 'No tiene permisos para ejecutar esta acción.';
        }

        echo json_encode($result);
    }

	public function recuperar()
	{
		$response = array('status' => false, 'result' => null);
		$email = $this->input->post('email');
        $usuario = Usuarios_model::where(['email' => $email])->first();
        if($usuario){
            $mailSender = new PHPMailer();
            $mailSender->isSMTP();
            $mailSender->Host = "a2plcpnl0822.prod.iad2.secureserver.net";
            $mailSender->SMTPAuth = true;
            $mailSender->Username = "sistemas@gruposabha.com";
            $mailSender->Password = "Sistemas4523";
//		$mailSender->SMTPSecure = "tls";

            $mailSender->setFrom('sistemas@gruposabha.com', 'Sistema Sabha');

            $mailSender->addAddress($email, '');

            $mailSender->isHTML(true);

            $mailSender->Subject = "Recuperacion de Correo";
            $mailSender->Body = "Cuerpo de Mensaje - Recuperacion de Correo";
            $mailSender->AltBody = "Usuario :". $usuario->usuario .'<br/>'. "Contraseña :". $usuario->contrasena;
            if ($mailSender->send()) {
                $response['result'] = "Se ha enviado un correo con sus datos de acceso.";
            } else {
                $response['result'] = "Ocurrio un problema en el envio de correo, intentelo nuevamente.";
            }
        }else{
            $response['result'] = "No existe usuario relacionado al correo proporcionado.";
        }


		echo json_encode($response);
	}


	public function exportar()
	{
        $result = array('status' => false, 'result' => null);
        $usuariosExport = array();
        $permisos = $this->session->userdata('permisos');
        if ($permisos['usuario']['exportar'] == 1) {
            $labels_columns = array('Nombres','Email','Telefono','Usuario','Rol');

            $sql = "SELECT u.nombres,u.apellidos,u.email,u.telefono,u.usuario,r.nombre rol
                FROM usuarios u
                INNER JOIN roles r ON r.id = u.id_rol;";

            $query = $this->db->query($sql);

            foreach ($query->result() as $value){
                $array = array(
                    $value->nombres .' '.$value->apellidos,
                    $value->email,
                    $value->telefono,
                    $value->usuario,
                    $value->rol
                );
                array_push($usuariosExport,$array);
            }
            $file_name = 'usuario_';
            $label_sheet = 'USUARIOS';
            $result['status']=true;
            $result['result'] = $this->boxspoutxls->create_pareto_detail_report_xlsx($label_sheet, $labels_columns, $usuariosExport,$file_name);
            echo json_encode($result);

        }else{
            $result['result'] = 'No tiene permisos para ejecutar esta acción.';
        }

	}


}


