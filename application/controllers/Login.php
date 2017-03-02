<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{

	function __construct()
	{

		parent::__construct();
		$this->load->model('Usuarios_model');
		$this->load->model('Empresa_model');

		$this->load->library(array('form_validation', 'session'));
		$this->load->helper(array('url', 'html', 'form','cifrado'));
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('login/login');
		$this->load->view('footer');
	}

	function valid()
	{
		$data = array();
		// Validation Rules
		$this->form_validation->set_rules('empresa', 'Empresa', 'required');
		$this->form_validation->set_rules('usuario', 'Usuario', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_message('required', 'El campo  %s es requerido');
		// hold error messages in div
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		// check for validation
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('header');
			$this->load->view('login/login');
			$this->load->view('footer');
		} else {
			$this->session->set_flashdata('item', 'form submitted successfully');
			$empresa = Empresa_model::where(['codigo' => $this->input->post('empresa')])->first();
//			print_r($empresa);die();
			if ($empresa) {
				$usuario = Usuarios_model::where(['usuario' => $this->input->post('usuario'),
					'contrasena' => encriptar($this->input->post('password')), 'estado' => 1])->first();

				if ($usuario) {
					$data_user = array(
						'id' => $usuario->id,
						'nombres' => $usuario->nombres,
						'apellidos' => $usuario->apellidos,
						'email' => $usuario->email,
						'usuario' => $usuario->usuario,
						'rol' => $usuario->id_rol,
						'id_empresa' => $empresa->id,
						'empresa' => $empresa->razon_social,
						'permisos' => $this->getPermisos($usuario->id_rol)
					);
					$this->session->set_userdata($data_user);
					redirect('puestos');
				} else {
					$data['error'] = 'El usuario y/o contraseña son incorrectos';
					$this->load->view('header');
					$this->load->view('login/login', $data);
					$this->load->view('footer');
				}
			} else {
				$data['error'] = 'El codigo de empresa no existe';
				$this->load->view('header');
				$this->load->view('login/login', $data);
				$this->load->view('footer');

			}
		}


	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('Login');
	}

	public function getPermisos($rol_id)
	{
		$elements = array();
		$this->load->database();
		$sql = "SELECT p.nombre,p.base_url,rp.id_permiso,rp.acceso,rp.agregar,
                      rp.editar,rp.editar,rp.eliminar,rp.exportar,rp.importar
                FROM rol_permiso rp
                INNER JOIN permisos p ON p.id = rp.id_permiso
                where rp.id_rol = $rol_id;";

		$query = $this->db->query($sql);
		foreach ($query->result() as $key => $value) {
			$elements[$value->base_url] = array(
				'nombre' => $value->nombre,
				$value->base_url => $value->base_url,
				'permiso_id' => $value->id_permiso,
				'acceso' => $value->acceso,
				'agregar' => $value->agregar,
				'editar' => $value->editar,
				'eliminar' => $value->eliminar,
				'importar' => $value->importar,
				'exportar' => $value->exportar
			);

			//array_push($elements, $array);
		}
		$this->db->close();
		return $elements;
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
