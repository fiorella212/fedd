<?php
/**
 * Created by IntelliJ IDEA.
 * User: gustavo
 * Date: 2/3/17
 * Time: 9:08 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Puestos extends CI_Controller
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
		$this->load->view('header');
		$this->load->view('navbar');

		$permisos = $this->session->userdata('permisos');
		if (isset($permisos['puestos']['acceso']) && $permisos['puestos']['acceso'] == 1) {
			$this->load->view('puestos/main');
		} else {
			$this->load->view('400/noacceso');
		}
		$this->load->view('footer');
	}


	public function getAll()
	{
		$puestoArray = array();
		$puestos = Puesto_trabajo_model::whereRaw('id_empresa = ? AND estado = 1 ', array($this->session->id_empresa))->get();

		foreach ($puestos as $puesto) {
			$array = array(
				'id' => $puesto->id,
				'denominacion_sabha' => $puesto->denominacion_sabha,
				'entrevistado_nombre' => $puesto->entrevistado_nombre,
				'es_apto' => $puesto->es_apto,
				'estado_registro' => $puesto->estado_registro
//				'telefono' => $puesto->telefono,
			);
			array_push($puestoArray, $array);
		}
//		print_r($puestos);
		$array_empresa = array(
			"draw" => 1,
			"recordsTotal" => count($puestoArray),
			"recordsFiltered" => count($puestoArray),
			"data" => $puestoArray
		);
		echo json_encode($array_empresa);
	}

	public function edit()
	{
		$data = array();
		$idPuesto = (int)$this->uri->segment(3);
		$data['puesto'] = Puesto_trabajo_model::where(['id' => $idPuesto, 'estado' => 1])->get();
		$data['locales'] = Local_model::where('id_empresa', '=', $this->session->id_empresa)->get();
		$data['area'] = Area_model::where(['id_local' => $data['puesto'][0]['id_local'], 'estado' => 1])->get();
		$this->load->view('header');
		$this->load->view('navbar');

		$permisos = $this->session->userdata('permisos');
		if (isset($permisos['puestos']['editar']) && $permisos['puestos']['editar'] == 1) {
			$this->load->view('puestos/edit', $data);
		} else {
			$this->load->view('400/noacceso');
		}
		$this->load->view('footer');
	}

	public function nuevo()
	{
		$data = array();

		$data['locales'] = Local_model::where('id_empresa', '=', $this->session->id_empresa)->get();

		$this->load->view('header');
		$this->load->view('navbar');
		$permisos = $this->session->userdata('permisos');
		if (isset($permisos['puestos']['editar']) && $permisos['puestos']['editar'] == 1) {
			$this->load->view('puestos/nuevo', $data);
		} else {
			$this->load->view('400/noacceso');
		}

		$this->load->view('footer');
	}

	public function registrarPuesto()
	{
		$result = array('status' => false, 'result' => null);
		$permisos = $this->session->userdata('permisos');
		if ($permisos['puestos']['agregar'] == 1) {

			try {
				$puesto = new Puesto_trabajo_model();
				$puesto->id_local = (int)$this->input->post('cmbLocal');
				$puesto->entrevistado_nombre = $this->input->post('txtNombreEntrevistado');
				$puesto->entrevistado_puesto = $this->input->post('txtPuestoEntrevistado');
				$puesto->entrevistado_telefono = $this->input->post('txtTelefonoEntrevistado');
				$puesto->entrevistado_email = $this->input->post('txtEmailEntrevistado');
				$puesto->codigo_sabha = $this->input->post('txtCodigoSabha');
				$puesto->denominacion_sabha = $this->input->post('txtDenominacionSabha');
				$puesto->codigo_mof = $this->input->post('txtCodigoMof');
				$puesto->denominacion_mof = $this->input->post('txtDenominacionMof');
				$puesto->codigo_sap = $this->input->post('txtCodigoSap');
				$puesto->denominacion_sap = $this->input->post('txtDenominacionSap');
				$puesto->otra_denominacion = $this->input->post('txtOtraDenominacion');
				$puesto->id_empresa = $this->input->post('txtEmpresaId');
				$puesto->id_area = $this->input->post('cmbArea');
				$puesto->funcion_principal = $this->input->post('txtFuncionPuesto');
				$puesto->estado_registro = $this->input->post('txtEstado');
				$puesto->notas = $this->input->post('txtNotas');
				$puesto->id_local = $this->input->post('cmbLocal');
				$puesto->usuario_creado = $this->session->userdata('usuario');
				$puesto->usuario_modificado = $this->session->userdata('usuario');

				$puesto->save();

				$result['status'] = true;
				$result['result'] = "Registro actualizado Satisfactoriamente";

			} catch (Illuminate\Database\QueryException $e) {
				$error_code = $e->errorInfo[1];
				if ($error_code == 1062) { // < codigo de error MySQL para unique
					//				$result['status'] = false;
					$result['result'] = "Error al registrar, Codigo SABHA " . $this->input->post('txtCodigoSabha') . " repetido.";
				} else {
					//				$result['status'] = false;
					$result['result'] = "Error al registrar, ocurrio un problema";
				}
			}
		} else {
			$result['result'] = "No tiene los permisos para agregar un puesto de trabajo";
		}
		echo json_encode($result);

	}

	public function actualizarPuesto()
	{
		$result = array('status' => false, 'result' => null);

		$id_puesto = (int)$this->input->post('txtPuestoId');
		$codigo_sabha = $this->input->post('txtCodigoSabha');

		try {
			$puesto = Puesto_trabajo_model::find($id_puesto);
			$puesto->id_local = (int)$this->input->post('cmbLocal');
			$puesto->entrevistado_nombre = $this->input->post('txtNombreEntrevistado');
			$puesto->entrevistado_puesto = $this->input->post('txtPuestoEntrevistado');
			$puesto->entrevistado_telefono = $this->input->post('txtTelefonoEntrevistado');
			$puesto->entrevistado_email = $this->input->post('txtEmailEntrevistado');
			$puesto->codigo_sabha = $this->input->post('txtCodigoSabha');
			$puesto->denominacion_sabha = $this->input->post('txtDenominacionSabha');
			$puesto->codigo_mof = $this->input->post('txtCodigoMof');
			$puesto->denominacion_mof = $this->input->post('txtDenominacionMof');
			$puesto->codigo_sap = $this->input->post('txtCodigoSap');
			$puesto->denominacion_sap = $this->input->post('txtDenominacionSap');
			$puesto->otra_denominacion = $this->input->post('txtOtraDenominacion');
			$puesto->id_empresa = $this->input->post('txtEmpresaId');
			$puesto->id_area = $this->input->post('cmbArea');
			$puesto->funcion_principal = $this->input->post('txtFuncionPuesto');
			$puesto->estado_registro = $this->input->post('txtEstado');
			$puesto->notas = $this->input->post('txtNotas');
			$puesto->id_local = $this->input->post('cmbLocal');


			$puesto->usuario_modificado = $this->session->userdata('usuario');
			$puesto->fecha_modificado = date('Y-m-d H:i:s');
			$puesto->save();

			$result['status'] = true;
			$result['result'] = "Registro actualizado Satisfactoriamente";

		} catch (Illuminate\Database\QueryException $e) {
			$error_code = $e->errorInfo[1];
			if ($error_code == 1062) { // < codigo de error MySQL para unique
//				$result['status'] = false;
				$result['result'] = "Error al registrar, Codigo SABHA " . $codigo_sabha . " repetido.";
			} else {
//				$result['status'] = false;
				$result['result'] = "Error al registrar, ocurrio un problema";
			}
		}

		echo json_encode($result);
	}


	// XHR

	public function getAreas()
	{
		$idLocal = (int)$this->input->post('idLocal');
		$data['areas'] = Area_model::where('id_local', '=', $idLocal)->get();
		echo json_encode($data);
	}

	function upload_file()
	{


		$result = array('status' => false, 'result' => null);
		$permisos = $this->session->userdata('permisos');
		if ($permisos['area']['eliminar'] == 1) {
			if (isset($_FILES['archivo'])) {
				$archivo = $_FILES['archivo'];
				$original = pathinfo($archivo['name'], PATHINFO_FILENAME);
				$extension = pathinfo($archivo['name'], PATHINFO_EXTENSION);
				$time = date('YmdHis');
				$nombre = "$original" . "_" . "$time.$extension";
				if (move_uploaded_file($archivo['tmp_name'], "uploads/$nombre")) {
					$this->procesarFicheroImportado("uploads/$nombre");
				} else {
					$result['result'] = 'El archivo no pudo subir';
					echo json_encode($result);
				}
			}
		} else {
			$result['result'] = 'No tiene permisos para ejecutar esta acción.';
			echo json_encode($result);
		}

//		//upload file
//		$config['upload_path'] = 'uploads/';
//		$config['allowed_types'] = 'csv';
//		$config['max_filename'] = '255';
////		$config['encrypt_name'] = TRUE;
//		$config['max_size'] = '1024'; //1 MB
//
//		if (isset($_FILES['file']['name'])) {
//			if (0 < $_FILES['file']['error']) {
//				echo 'Error during file upload' . $_FILES['file']['error'];
//			} else {
//				if (file_exists('uploads/' . $_FILES['file']['name'])) {
//					echo 'File already exists : uploads/' . $_FILES['file']['name'];
//				} else {
//					$this->load->library('upload', $config);
//					if (!$this->upload->do_upload('file')) {
//						echo $this->upload->display_errors();
//					} else {
//
//						$this->procesarFicheroImportado('uploads/' . $_FILES['file']['name']);
//
//						echo 'File successfully uploaded : uploads/' . $_FILES['file']['name'];
//					}
//				}
//			}
//		} else {
//			echo 'Please choose a file';
//		}
	}

	public function getCodSabha()
	{
		$idArea = (int)$this->input->post('idArea');
		$count = Puesto_trabajo_model::where('id_area', '=', $idArea)->count();
		echo json_encode($count);
	}


	public function procesarFicheroImportado($fichero)
	{
		$result = array('status' => false, 'result' => null, 'log' => null);
		$logArray = array();
		$myfile = fopen($fichero, "r");

		if ($myfile) {

			$logName = $this->session->userdata('usuario') . date('Ymdhms');

			$localesEmpresa = $this->getLocalesFromEmpresa($this->session->userdata('id_empresa'));

			$contador = 0;
			$indice = 0;
			while (!feof($myfile)) {

				$csvLine = fgets($myfile);

				if ($csvLine === false) break;

				$line = str_getcsv($csvLine);

				if (count(array_keys($line) > 0)) {


					$nota = $line[0];
					$local = $line[2];
					$cod_sabha = $line[3];
					$deno_sabha = $line[4];
//					if (strlen($line[4])>0) {
						$deno_sabha = $line[4];
//					} else {
//						$this->escribirLogImport($myfile . "LogError.txt", "ERROR", " No se Encontro Denominacion Sabha en el registro => ", $csvLine);
//						$indice++;
//						$contador++;
//						continue;
//					}


					$cod_mof = $line[5];
					$deno_mof = $line[6];
					$cod_sap = $line[7];
					$deno_sap = $line[8];
					$deno_otro = $line[9];
					$area = $line[10];
					$encargado = $line[11];
					$encargado_puesto = $line[12];
					$encargado_funcion = $line[13];

					$s_actividad = $line[14];
					$s_requerimiento = $line[15];
					$s_restriccion = $line[16];

					if (strlen($line[18]) > 0) {
						$pre_eval = 0;
					} elseif (strlen($line[19]) > 0) {
						$pre_eval = 1;
					} elseif (strlen($line[20]) > 0) {
						$pre_eval = 2;
					} elseif (strlen($line[21]) > 0) {
						$pre_eval = 3;
					} elseif (strlen($line[22]) > 0) {
						$pre_eval = 4;
					} elseif (strlen($line[23]) > 0) {
						$pre_eval = 5;
					}

					$res_pt = $line[24];
					$siso_s = $line[25];

					$res_eva = $line[26];
					$res_final = $line[27];

					$apto = ($line[28] == "APTO") ? 1 : 0;

					$LocalEncontrado = Local_model::whereRaw('id_empresa = ? AND estado = 1  AND nombre = ?',
						array($this->session->id_empresa, strtolower($local)))->first();

					if ($LocalEncontrado) {

						$AreaEncontrada = Area_model::whereRaw('id_local = ? AND estado = 1 AND nombre = ?',
							array((int)$LocalEncontrado->id, $area))->first();

						if ($AreaEncontrada) {

							if (($contador % 6) == 0) {
								$indice = 0;

								try {
									$puestoImportado = new Puesto_trabajo_model();
									$puestoImportado->id_empresa = (int)$this->session->userdata('id_empresa');
									$puestoImportado->id_local = (int)$LocalEncontrado->id;
									$puestoImportado->id_area = (int) $AreaEncontrada->id;
									$puestoImportado->entrevistado_nombre = $encargado;
									$puestoImportado->entrevistado_puesto = $encargado_puesto;
									$puestoImportado->s_visual_actividad = $s_actividad;
									$puestoImportado->s_visual_requerimiento = $s_requerimiento;
									$puestoImportado->s_visual_restriccion = $s_restriccion;
									$puestoImportado->funcion_principal = $encargado_funcion;

									$puestoImportado->eva_erin_resultado = $res_eva;
									$puestoImportado->s_visual_pre_eval = $pre_eval;
									$puestoImportado->siso_s_visual = $siso_s;
									$puestoImportado->resultado_pt_s_visual = $res_pt;

									$puestoImportado->resultado_final_s_visual = $res_final;

									$puestoImportado->codigo_sabha = $cod_sabha;
									$puestoImportado->denominacion_sabha = $deno_sabha;
									$puestoImportado->codigo_mof = $cod_mof;
									$puestoImportado->denominacion_sabha = $deno_mof;
									$puestoImportado->codigo_sap = $cod_sap;
									$puestoImportado->denominacion_sap = $deno_sap;
									$puestoImportado->otra_denominacion = $deno_otro;

									$puestoImportado->notas = $nota;

									$puestoImportado->usuario_creado = $this->session->userdata('usuario');
									$puestoImportado->fecha_creado = date('Y-m-d H:i:s');
									$puestoImportado->usuario_modificado = $this->session->userdata('usuario');
									$puestoImportado->fecha_modificado = date('Y-m-d H:i:s');
									$puestoImportado->estado = 1;
									$puestoImportado->es_apto = $apto;
									$puestoImportado->estado_registro = "CONCLUIDO";

									$puestoImportado->save();

								} catch (Illuminate\Database\QueryException $e) {
									$error_code = $e->errorInfo[1];
									if ($error_code == 1062) { // < codigo de error MySQL para unique
										$this->escribirLogImport($logName . "LogError.txt", "ERROR", "El Codigo SABHA se esta repitiendo.", $csvLine);
										$result['log'] = base_url("uploads/Import_".$logName . "LogError");
										$indice++;
										$contador++;
										continue;
									}
								}

							} else {
								if ($cod_sabha != '') {

									try {
										$puestoImportado = Puesto_trabajo_model::whereRaw('codigo_sabha = ? ', array($cod_sabha))->first();
										if ($puestoImportado) {
											if ($indice == 1) {
												$puestoImportado->s_auditivo_actividad = $s_actividad;
												$puestoImportado->s_auditivo_requerimiento = $s_requerimiento;
												$puestoImportado->s_auditivo_restriccion = $s_restriccion;
												$puestoImportado->s_auditivo_pre_eval = $pre_eval;
												$puestoImportado->siso_s_auditivo = $siso_s;
												$puestoImportado->resultado_pt_s_auditivo = $res_pt;
												$puestoImportado->resultado_final_s_auditivo = $res_final;

											} else if ($indice == 2) {
												$puestoImportado->m_ext_inf_actividad = $s_actividad;
												$puestoImportado->m_ext_inf_requerimiento = $s_requerimiento;
												$puestoImportado->m_ext_inf_restriccion = $s_restriccion;
												$puestoImportado->m_ext_inf_pre_eval = $pre_eval;
												$puestoImportado->siso_m_ext_inferior = $siso_s;
												$puestoImportado->resultado_pt_m_ext_inf = $res_pt;
												$puestoImportado->resultado_final_m_ext_inf = $res_final;
											} else if ($indice == 3) {
												$puestoImportado->m_ext_sup_actividad = $s_actividad;
												$puestoImportado->m_ext_sup_requerimiento = $s_requerimiento;
												$puestoImportado->m_ext_sup_restriccion = $s_restriccion;
												$puestoImportado->m_ext_sup_pre_eval = $pre_eval;
												$puestoImportado->siso_m_ext_superior = $siso_s;
												$puestoImportado->resultado_pt_m_ext_sup = $res_pt;
												$puestoImportado->resultado_final_m_ext_sup = $res_final;
											} else if ($indice == 4) {
												$puestoImportado->m_intelectual_actividad = $s_actividad;
												$puestoImportado->m_intelectual_requerimiento = $s_requerimiento;
												$puestoImportado->m_intelectual_restriccion = $s_restriccion;
												$puestoImportado->m_intelectual_pre_eval = $pre_eval;
												$puestoImportado->siso_m_intelectual = $siso_s;
												$puestoImportado->resultado_pt_m_intelectual = $res_pt;
												$puestoImportado->resultado_final_m_intelectual = $res_final;
											} else if ($indice == 5) {
												$puestoImportado->m_psicosocial_actividad = $s_actividad;
												$puestoImportado->m_psicosocial_requerimiento = $s_requerimiento;
												$puestoImportado->m_psicosocial_restriccion = $s_restriccion;
												$puestoImportado->m_psicosocial_pre_eval = $pre_eval;
												$puestoImportado->siso_m_psicosocial = $siso_s;
												$puestoImportado->resultado_pt_m_psicosocial = $res_pt;
												$puestoImportado->resultado_final_m_psicosocial = $res_final;
											}
											$puestoImportado->save();
										} else {
											$this->escribirLogImport($logName . "LogError.txt", "ERROR", " No se Encontro Registro para Correspondiente para => ", $csvLine);
											$result['log'] = base_url("uploads/Import_".$logName . "LogError");
											$indice++;
											$contador++;
											continue;
										}

									} catch (Illuminate\Database\QueryException $e) {
										$logArray['fila'][] = $line;
										$error_code = $e->errorInfo[1];
										if ($error_code == 1062) { // < codigo de error MySQL para unique
											$this->escribirLogImport($logName . "LogError.txt", "ERROR", "Error al registrar, Codigo SABHA  repetido. ", $csvLine);
											$result['log'] = base_url("uploads/Import_".$logName . "LogError");
											$indice++;
											$contador++;
											continue;

										} else {
											$this->escribirLogImport($logName . "LogError.txt", "ERROR", "Error al registrar, ocurrio un problema", $csvLine);
											$result['log'] = base_url("uploads/Import_".$logName . "LogError");
											$indice++;
											$contador++;
											continue;

										}
									}

								} else {
									$this->escribirLogImport($logName . "LogError.txt", "ERROR", " No se Encontro CODIGO SABHA, Revise Formato de fichero a importar | ", $csvLine);
									$result['log'] = base_url("uploads/Import_".$logName . "LogError");
									$indice++;
									$contador++;
									continue;
								}

							}

							$indice++;
							$contador++;

						} else {
							$this->escribirLogImport($logName . "LogError.txt", "ERROR", "El Area no se encuentra registrada . | ", $csvLine);
							$result['log'] = base_url("uploads/Import_".$logName . "LogError");
							$indice++;
							$contador++;
							continue;
						}

					} else {
						$this->escribirLogImport($logName . "LogError.txt", "ERROR", "El Local no se encuentra registrado . | ", $csvLine);
						$result['log'] = base_url("uploads/Import_".$logName . "LogError");
						$indice++;
						$contador++;
						continue;
					}

				} else {
					$this->escribirLogImport($logName . "LogError.txt", "ERROR", "Se detecto un Formato de Fichero no adecuado  | ", $csvLine);
					$result['log'] = base_url("uploads/Import_".$logName . "LogError");
					$indice++;
					$contador++;
					continue;
				}


			}
			fclose($myfile);
			unlink($fichero);

			$info = (!is_null($result['log'])) ?
				"Puestos de Trabajo Importados, con algunos registros que no cumplen los requisitos de importacion.\nSe adjunta Log de Errores para descargar" :
				"Puestos de Trabajo importados correctamente";
			$result['status'] = true;
			$result['result'] = $info ;
		} else {
			$result['result'] = "No se ha podido abrir el fichero importado";
		}

		echo json_encode($result);


	}

	public function exportar()
	{
		$permisos = $this->session->userdata('permisos');
		if (isset($permisos['puestos']['exportar']) && $permisos['puestos']['exportar'] == 1) {

			ini_set('max_execution_time', -1);
			ini_set('memory_limit', '-1');

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
		puesto_trabajo.usuario_creado,
		puesto_trabajo.fecha_creado,
		puesto_trabajo.usuario_modificado,
		puesto_trabajo.fecha_modificado
		FROM 
		puesto_trabajo
		INNER JOIN `local` ON puesto_trabajo.id_local = `local`.id
		INNER JOIN area ON puesto_trabajo.id_area = area.id
		INNER JOIN empresa ON puesto_trabajo.id_empresa = empresa.id;";


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
				'Resultado Final Intelectual', 'Resultado Final Psicosocial', 'ES APTO', 'Aplica Ajustes', 'Estado', 'Notas', 'Usuario Creado',
				'Fecha Creado', 'Usuario Modificado', 'Fecha Modificado');

			$this->load->database();

			$result = $this->db->query($_sql);

			$objPHPExcel = new \PHPExcel();
			$objPHPExcel->getProperties()->setCreator('Sistema de Evaluaciones')->setTitle('Puesto de Trabajo')
				->setLastModifiedBy('Sistema de Evaluaciones')->setDescription('Reporte de Puestos de Trabajo');

			$objPHPExcel->setActiveSheetIndex(0);
			$objPHPExcel->getActiveSheet()->fromArray($cabeceras, ' ', 'A1');
			$objPHPExcel->getActiveSheet()->fromArray($result->result_array(), ' ', 'A2');


			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="PuestosTrabajo.xls"');
			header('Cache-Control: max-age=0');
			header('Cache-Control: max-age=1');
			header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
			header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
			header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
			header('Pragma: public'); // HTTP/1.0

			$objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
			$objWriter->save('php://output');
			exit;

		} else {
			$this->load->view('400/noacceso');
		}
	}

	public function importar()
	{

		$this->load->view('header');
		$this->load->view('navbar');

		$permisos = $this->session->userdata('permisos');
		if (isset($permisos['puestos']['importar']) && $permisos['puestos']['importar'] == 1) {
			$this->load->view('puestos/importar');
		} else {
			$this->load->view('400/noacceso');
		}
		$this->load->view('footer');
		
	}

	public function eliminar()
	{
		$result = array('status' => false, 'result' => null);
		$id_puesto = (int)$this->input->post('txtPuestoId');
		$permisos = $this->session->userdata('permisos');
		if (isset($permisos['puestos']['eliminar']) && $permisos['puestos']['eliminar'] == 1) {
			try {
				$puesto = Puesto_trabajo_model::find($id_puesto);
				$puesto->estado = 0;
				$puesto->save();

				$result['status'] = true;
				$result['result'] = 'Se elimino el puesto de trabajo';
			} catch (Exception $e) {
				$result['result'] = 'Ocurrio un problema al eliminar el puesto de trabajo ' . "\n" . $e->getMessage();
			}

		} else {
			$result['result'] = 'No tiene permisos para Eliminar el Puesto de Trabajo';
		}

		echo json_encode($result);
	}

	public function escribirLogImport($fichero, $tipoLog, $errDescription, $content)
	{
		$myfile = fopen("uploads/Import_" . $fichero . ".txt", "a");
		if ($myfile) {

			if ($tipoLog == 'ERROR') {
				$pre = "[" . $tipoLog . "] => " . $errDescription . " en => " . $content;
				fwrite($myfile, "\n" . $pre);
			}
			fclose($myfile);
		}
	}

	public function getLocalesFromEmpresa($id_empresa)
	{
		$locales = Local_model::whereRaw('id_empresa = ? AND estado = 1 ', array($this->session->id_empresa))->get();
		return $locales->toArray();
	}

	public function getAreasFromLocal()
	{
		$areas = Area_model::whereRaw('');
		return $areas->toArray();
	}
}

/* End of file Puestos.php */
/* Location: ./application/controllers/Puestos.php */
