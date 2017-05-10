<?php
/**
 * Created by IntelliJ IDEA.
 * User: gustavo
 * Date: 2/4/17
 * Time: 12:11 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Siso extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Local_model');
		$this->load->model('Area_model');
		$this->load->model('Puesto_trabajo_model');
		$this->load->model('Pregunta_siso_model');
		$this->load->model('Cuestionario_siso_model');
		$this->load->library(array('form_validation', 'session'));
		$this->load->helper(array('url', 'html', 'form'));
		$this->load->library('Boxspoutxls');
	}

    public function index()
	{
		$id_puesto = $this->uri->segment(3);
		if (isset($id_puesto)) {
			$puesto_trabajo = Puesto_trabajo_model::where(['id' => $id_puesto])->first();
			$data['locales'] = Local_model::where('id_empresa', '=', $this->session->id_empresa)->get();
			$data['areas'] = Area_model::where('id_local', '=', $puesto_trabajo->id_local)->get();
			$data['puestos_trabajo'] = Puesto_trabajo_model::where('id_area', '=', $puesto_trabajo->id_area)->get();
			$data['puesto'] = $puesto_trabajo;

			$array = array(
				'sensorial_visual' => array(0 => 'Sin Discapacidad',
					1 => 'Ligero',
					2 => 'Moderado',
					3 => 'Importante',
					4 => 'Severo',
					5 => 'Grave'),
				'sensorial_auditivo' => array(0 => 'Sin Discapacidad',
					1 => 'Ligero',
					2 => 'Moderado',
					3 => 'Importante',
					4 => 'Severo',
					5 => 'Grave'),
				'ext_inferiores' => array(0 => 'Sin Discapacidad',
					1 => 'Ligero',
					2 => 'Moderado',
					3 => 'Importante',
					4 => 'Severo',
					5 => 'Grave'),
				'ext_superiores' => array(0 => 'Sin Discapacidad',
					1 => 'Ligero',
					2 => 'Moderado',
					3 => 'Importante',
					4 => 'Severo',
					5 => 'Grave'),
				'intelectual' => array(0 => 'Sin Discapacidad',
					1 => 'Ligero',
					2 => 'Moderado',
					3 => 'Importante',
					4 => 'Severo',
					5 => 'Grave'),
				'psicosocial' => array(0 => 'Sin Discapacidad',
					1 => 'Ligero',
					2 => 'Moderado',
					3 => 'Importante',
					4 => 'Severo',
					5 => 'Grave')

			);

			if ($puesto_trabajo->siso_s_visual >= 0 && !is_null($puesto_trabajo->siso_s_visual)) {
				$data['siso_s_visual'] = $array['sensorial_visual'][$puesto_trabajo->siso_s_visual];
			} else {
				$data['siso_s_visual'] = '';
			}
			if ($puesto_trabajo->siso_s_auditivo >= 0 && !is_null($puesto_trabajo->siso_s_auditivo)) {
				$data['siso_s_auditivo'] = $array['sensorial_auditivo'][$puesto_trabajo->siso_s_auditivo];
			} else {
				$data['siso_s_auditivo'] = '';
			}
			if ($puesto_trabajo->siso_m_ext_inferior >= 0 && !is_null($puesto_trabajo->siso_m_ext_inferior)) {
				$data['siso_m_ext_inferior'] = $array['ext_inferiores'][$puesto_trabajo->siso_m_ext_inferior];
			} else {
				$data['siso_m_ext_inferior'] = '';
			}

			if ($puesto_trabajo->siso_m_ext_superior >= 0 && !is_null($puesto_trabajo->siso_m_ext_superior)) {
				$data['siso_m_ext_superior'] = $array['ext_superiores'][$puesto_trabajo->siso_m_ext_superior];
			} else {
				$data['siso_m_ext_superior'] = '';
			}

			if ($puesto_trabajo->siso_m_intelectual >= 0 && !is_null($puesto_trabajo->siso_m_intelectual)) {
				$data['siso_m_intelectual'] = $array['intelectual'][$puesto_trabajo->siso_m_intelectual];
			} else {
				$data['siso_m_intelectual'] = '';
			}

			if ($puesto_trabajo->siso_m_psicosocial >= 0 && !is_null($puesto_trabajo->siso_m_psicosocial)) {
				$data['siso_m_psicosocial'] = $array['psicosocial'][$puesto_trabajo->siso_m_psicosocial];
			} else {
				$data['siso_m_psicosocial'] = '';
			}

			$this->load->view('header');
			$this->load->view('navbar');
			$this->load->view('siso/edit', $data);
			$this->load->view('footer');
		} else {
			$data['locales'] = Local_model::where('id_empresa', '=', $this->session->id_empresa)->get();
			$this->load->view('header');
			$this->load->view('navbar');
			$this->load->view('siso/main', $data);
			$this->load->view('footer');
		}
	}

	public function cuestionario()
	{
		$data = array(
			'id_puesto_trabajo' => $this->uri->segment(3),
			'codigo_sabha' => $this->uri->segment(4),
			'denominacion_sabha' => $this->uri->segment(5),
			'area' => $this->uri->segment(6),
			'local' => $this->uri->segment(7)
		);
		$data['cuestionario'] = Cuestionario_siso_model::where(['id_puesto_trabajo' => $this->uri->segment(3),
			'estado' => 1])->get();
		$data['preguntas'] = Pregunta_siso_model::orderBy('grupo', 'DESC')->orderBy('tipo_riesgo', 'ASC')
			->get();


		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('siso/cuestionario', $data);
		$this->load->view('footer');
	}

	public function getAreas()
	{
		$idLocal = (int)$this->input->post('idLocal');
		$data['areas'] = Area_model::where('id_local', '=', $idLocal)->get();
		echo json_encode($data);
	}

	public function getSiso()
	{
		$id = (int)$this->input->post('id');
		$array = array(
			'sensorial_visual' => array(0 => 'Sin Discapacidad',
				1 => 'Ligero',
				2 => 'Moderado',
				3 => 'Importante',
				4 => 'Severo',
				5 => 'Grave'),
			'sensorial_auditivo' => array(0 => 'Sin Discapacidad',
				1 => 'Ligero',
				2 => 'Moderado',
				3 => 'Importante',
				4 => 'Severo',
				5 => 'Grave'),
			'ext_inferiores' => array(0 => 'Sin Discapacidad',
				1 => 'Ligero',
				2 => 'Moderado',
				3 => 'Importante',
				4 => 'Severo',
				5 => 'Grave'),
			'ext_superiores' => array(0 => 'Sin Discapacidad',
				1 => 'Ligero',
				2 => 'Moderado',
				3 => 'Importante',
				4 => 'Severo',
				5 => 'Grave'),
			'intelectual' => array(0 => 'Sin Discapacidad',
				1 => 'Ligero',
				2 => 'Moderado',
				3 => 'Importante',
				4 => 'Severo',
				5 => 'Grave'),
			'psicosocial' => array(0 => 'Sin Discapacidad',
				1 => 'Ligero',
				2 => 'Moderado',
				3 => 'Importante',
				4 => 'Severo',
				5 => 'Grave')

		);
		$puesto_trabajo = Puesto_trabajo_model::where(['id' => $id])->first();

        if ($puesto_trabajo->siso_s_visual >= 0 && !is_null($puesto_trabajo->siso_s_visual)) {
            $data['siso_s_visual'] = $array['sensorial_visual'][$puesto_trabajo->siso_s_visual];
        } else {
            $data['siso_s_visual'] = '';
        }
        if ($puesto_trabajo->siso_s_auditivo >= 0 && !is_null($puesto_trabajo->siso_s_auditivo)) {
            $data['siso_s_auditivo'] = $array['sensorial_auditivo'][$puesto_trabajo->siso_s_auditivo];
        } else {
            $data['siso_s_auditivo'] = '';
        }
        if ($puesto_trabajo->siso_m_ext_inferior >= 0 && !is_null($puesto_trabajo->siso_m_ext_inferior)) {
            $data['siso_m_ext_inferior'] = $array['ext_inferiores'][$puesto_trabajo->siso_m_ext_inferior];
        } else {
            $data['siso_m_ext_inferior'] = '';
        }

        if ($puesto_trabajo->siso_m_ext_superior >= 0 && !is_null($puesto_trabajo->siso_m_ext_superior)) {
            $data['siso_m_ext_superior'] = $array['ext_superiores'][$puesto_trabajo->siso_m_ext_superior];
        } else {
            $data['siso_m_ext_superior'] = '';
        }

        if ($puesto_trabajo->siso_m_intelectual >= 0 && !is_null($puesto_trabajo->siso_m_intelectual)) {
            $data['siso_m_intelectual'] = $array['intelectual'][$puesto_trabajo->siso_m_intelectual];
        } else {
            $data['siso_m_intelectual'] = '';
        }

        if ($puesto_trabajo->siso_m_psicosocial >= 0 && !is_null($puesto_trabajo->siso_m_psicosocial)) {
            $data['siso_m_psicosocial'] = $array['psicosocial'][$puesto_trabajo->siso_m_psicosocial];
        } else {
            $data['siso_m_psicosocial'] = '';
        }


		echo json_encode($data);
	}

	public function getSabha()
	{
		$idArea = (int)$this->input->post('idArea');
		$data['puesto_trabajo'] = Puesto_trabajo_model::where('id_area', '=', $idArea)->get();
		echo json_encode($data);
	}

	public function insertCuestionario()
	{
		$cuestionario = $this->input->post('cuestionario');
		$id_puesto = $this->input->post('id_puesto');
		try {
            $this->db->query("DELETE FROM cuestionario_sido WHERE id_puesto_trabajo = $id_puesto");
//			$cuestionario_old = Cuestionario_siso_model::where(['id_puesto_trabajo' => $id_puesto])->get();
//			if ($cuestionario_old) {
//				foreach ($cuestionario_old as $row_cuestionario) {
//					$cuestionario_del = Cuestionario_siso_model::find($row_cuestionario->id);
//					$cuestionario_del->estado = 0;
//					$cuestionario_del->usuario_modificado = $this->session->userdata('usuario');
//					$cuestionario_del->fecha_modificado = date('Y-m-d H:i:s');
//
//					$cuestionario_del->save();
//				}
//			}

			if (count($cuestionario) > 0) {
				$j = 0;

				foreach ($cuestionario as $item) {
					$respuesta = null;
					if (isset($item['respuesta'])) {
						$respuesta = $item['respuesta'];
						$j++;
					}
					$cuestionario_siso = new Cuestionario_siso_model();
					$cuestionario_siso->id_puesto_trabajo = $item['id_puesto'];
					$cuestionario_siso->id_pregunta_siso = $item['id'];
					$cuestionario_siso->respuesta = $respuesta;
					$cuestionario_siso->usuario_creado = $this->session->userdata('usuario');
					$cuestionario_siso->fecha_creado = date('Y-m-d H:i:s');
					$cuestionario_siso->save();

				}
			}
			$preguntas = Pregunta_siso_model::orderBy('grupo', 'DESC')->orderBy('tipo_riesgo', 'ASC')->get();

			if (count($preguntas) == $j) {
				$valor_s_visual = 5;
				$valor_s_auditivo = 5;
				$valor_m_ext_inferior = 5;
				$valor_m_ext_superior = 5;
				$valor_m_intelectual = 5;
				$valor_m_psicosocial = 5;
				$sql = "SELECT ps.valor_s_visual,ps.valor_s_auditivo,ps.valor_m_ext_inferior,ps.valor_m_ext_superior,ps.valor_m_intelectual,ps.valor_m_psicosocial
            FROM cuestionario_siso cs
            INNER JOIN pregunta_siso ps ON ps.id = cs.id_pregunta_siso
            INNER JOIN puesto_trabajo pt ON pt.id = cs.id_puesto_trabajo
            WHERE cs.respuesta = 1 AND cs.estado = 1 AND pt.id = $id_puesto";

				$query = $this->db->query($sql);
				foreach ($query->result() as $key => $value) {
					if ($value->valor_s_visual != null) {
						if ($value->valor_s_visual < $valor_s_visual) {
							$valor_s_visual = $value->valor_s_visual;
						}
					}
					if ($value->valor_s_auditivo != null) {
						if ($value->valor_s_auditivo < $valor_s_auditivo) {
							$valor_s_auditivo = $value->valor_s_auditivo;
						}
					}
					if ($value->valor_m_ext_inferior != null) {
						if ($value->valor_m_ext_inferior < $valor_m_ext_inferior) {
							$valor_m_ext_inferior = $value->valor_m_ext_inferior;
						}
					}
					if ($value->valor_m_ext_superior != null) {
						if ($value->valor_m_ext_superior < $valor_m_ext_superior) {
							$valor_m_ext_superior = $value->valor_m_ext_superior;
						}
					}
					if ($value->valor_m_intelectual != null) {
						if ($value->valor_m_intelectual < $valor_m_intelectual) {
							$valor_m_intelectual = $value->valor_m_intelectual;
						}
					}
					if ($value->valor_m_psicosocial != null) {
						if ($value->valor_m_psicosocial < $valor_m_psicosocial) {
							$valor_m_psicosocial = $value->valor_m_psicosocial;
						}
					}

				}

				$puesto_trabajo = Puesto_trabajo_model::find($id_puesto);
				$puesto_trabajo->siso_s_visual = $valor_s_visual;
				$puesto_trabajo->siso_s_auditivo = $valor_s_auditivo;
				$puesto_trabajo->siso_m_ext_inferior = $valor_m_ext_inferior;
				$puesto_trabajo->siso_m_ext_superior = $valor_m_ext_superior;
				$puesto_trabajo->siso_m_intelectual = $valor_m_intelectual;
				$puesto_trabajo->siso_m_psicosocial = $valor_m_psicosocial;
				$puesto_trabajo->usuario_modificado = $this->session->userdata('usuario');
				$puesto_trabajo->fecha_modificado = date('Y-m-d H:i:s');
				$puesto_trabajo->save();

				$pt = Puesto_trabajo_model::find($id_puesto);

				if ($pt->s_visual_pre_eval != null && $valor_s_visual != null) {
					if ($pt->s_visual_pre_eval < $valor_s_visual) {
						$pt->resultado_pt_s_visual = $pt->s_visual_pre_eval;
					} else {
						$pt->resultado_pt_s_visual = $valor_s_visual;
					}
				} else if ($pt->s_visual_requerimiento != '' && $pt->s_visual_actividad != '' && $pt->s_visual_restriccion != '') {
					$pt->resultado_pt_s_visual = $valor_s_visual;
				}

				if ($pt->s_auditivo_pre_eval != null && $valor_s_auditivo != null) {
					if ($pt->s_auditivo_pre_eval < $valor_s_auditivo) {
						$pt->resultado_pt_s_auditivo = $pt->s_auditivo_pre_eval;
					} else {
						$pt->resultado_pt_s_auditivo = $valor_s_auditivo;
					}
				} else if ($pt->s_auditivo_requerimiento != '' && $pt->s_auditivo_actividad != '' && $pt->s_auditivo_restriccion != '') {
					$pt->resultado_pt_s_auditivo = $valor_s_visual;
				}

				if ($pt->m_ext_sup_pre_eval != null && $valor_m_ext_superior != null) {
					if ($pt->m_ext_sup_pre_eval < $valor_m_ext_superior) {
						$pt->resultado_pt_m_ext_sup = $pt->m_ext_sup_pre_eval;
					} else {
						$pt->resultado_pt_m_ext_sup = $valor_m_ext_superior;
					}
				} else if ($pt->m_ext_sup_requerimiento != '' && $pt->m_ext_sup_actividad != '' && $pt->m_ext_sup_restriccion != '') {
					$pt->resultado_pt_m_ext_sup = $valor_m_ext_superior;
				}

				if ($pt->m_ext_inf_pre_eval != null && $valor_m_ext_inferior != null) {
					if ($pt->m_ext_inf_pre_eval < $valor_m_ext_inferior) {
						$pt->resultado_pt_m_ext_inf = $pt->m_ext_inf_pre_eval;
					} else {
						$pt->resultado_pt_m_ext_inf = $valor_m_ext_inferior;
					}
				} else if ($pt->m_ext_inf_requerimiento != '' && $pt->m_ext_inf_actividad != '' && $pt->m_ext_inf_restriccion != '') {
					$pt->resultado_pt_m_ext_inf = $valor_m_ext_inferior;
				}

				if ($pt->m_intelectual_pre_eval != null && $valor_m_intelectual != null) {
					if ($pt->m_intelectual_pre_eval < $valor_m_intelectual) {
						$pt->resultado_pt_m_intelectual = $pt->m_intelectual_pre_eval;
					} else {
						$pt->resultado_pt_m_intelectual = $valor_m_intelectual;
					}
				} else if ($pt->m_intelectual_requerimiento != '' && $pt->m_intelectual_actividad != '' && $pt->m_intelectual_restriccion != '') {
					$pt->resultado_pt_m_intelectual = $valor_m_intelectual;
				}

				if ($pt->m_psicosocial_pre_eval != null && $valor_m_psicosocial != null) {
					if ($pt->m_psicosocial_pre_eval < $valor_m_psicosocial) {
						$pt->resultado_pt_m_psicosocial = $pt->m_psicosocial_pre_eval;
					} else {
						$pt->resultado_pt_m_psicosocial = $valor_m_psicosocial;
					}
				} else if ($pt->m_psicosocial_requerimiento != '' && $pt->m_psicosocial_actividad != '' && $pt->m_psicosocial_restriccion != '') {
					$pt->resultado_pt_m_psicosocial = $valor_m_psicosocial;
				}

				$pt->save();

				$puesto_trabajo1 = Puesto_trabajo_model::find($id_puesto);
				if ((($puesto_trabajo1->s_visual_pre_eval >= 0 && (!is_null($puesto_trabajo1->s_visual_pre_eval))) || ($puesto_trabajo1->s_visual_requerimiento != null && $puesto_trabajo1->s_visual_actividad != null && $puesto_trabajo1->s_visual_restriccion != null))
					&& (($puesto_trabajo1->s_auditivo_pre_eval >= 0 && (!is_null($puesto_trabajo1->s_auditivo_pre_eval))) || ($puesto_trabajo1->s_auditivo_requerimiento != null && $puesto_trabajo1->s_auditivo_actividad != null && $puesto_trabajo1->s_auditivo_restriccion != null))
					&& (($puesto_trabajo1->m_ext_sup_pre_eval >= 0 && (!is_null($puesto_trabajo1->s_auditivo_pre_eval))) || ($puesto_trabajo1->m_ext_sup_requerimiento != null && $puesto_trabajo1->m_ext_sup_actividad != null && $puesto_trabajo1->m_ext_sup_restriccion != null))
					&& (($puesto_trabajo1->m_ext_inf_pre_eval >= 0 && (!is_null($puesto_trabajo1->m_ext_inf_pre_eval))) || ($puesto_trabajo1->m_ext_inf_requerimiento != null && $puesto_trabajo1->m_ext_inf_actividad != null && $puesto_trabajo1->m_ext_inf_restriccion != null))
					&& (($puesto_trabajo1->m_intelectual_pre_eval >= 0 && (!is_null($puesto_trabajo1->m_intelectual_pre_eval))) || ($puesto_trabajo1->m_intelectual_requerimiento != null && $puesto_trabajo1->m_intelectual_actividad != null && $puesto_trabajo1->m_intelectual_restriccion != null))
					&& (($puesto_trabajo1->m_psicosocial_pre_eval >= 0 && (!is_null($puesto_trabajo1->m_psicosocial_pre_eval))) || ($puesto_trabajo1->m_psicosocial_requerimiento != null && $puesto_trabajo1->m_psicosocial_actividad != null && $puesto_trabajo1->m_psicosocial_restriccion != null))
					&& ($puesto_trabajo1->siso_s_visual >= 0 && (!is_null($puesto_trabajo1->siso_s_visual)))
					&& ($puesto_trabajo1->siso_s_auditivo >= 0 && (!is_null($puesto_trabajo1->siso_s_auditivo)))
					&& ($puesto_trabajo1->siso_m_ext_superior >= 0 && (!is_null($puesto_trabajo1->siso_m_ext_superior)))
					&& ($puesto_trabajo1->siso_m_ext_inferior >= 0 && (!is_null($puesto_trabajo1->siso_m_ext_inferior)))
					&& ($puesto_trabajo1->siso_m_intelectual >= 0 && (!is_null($puesto_trabajo1->siso_m_intelectual)))
					&& ($puesto_trabajo1->siso_m_psicosocial >= 0 && (!is_null($puesto_trabajo1->siso_m_psicosocial)))
					&& $puesto_trabajo1->eva_erin_resultado != null
				) {

					if ($puesto_trabajo1->eva_erin_resultado == 'VERDE') {
						$puesto_trabajo1->resultado_final_s_visual = $puesto_trabajo1->resultado_pt_s_visual;
						$puesto_trabajo1->resultado_final_s_auditivo = $puesto_trabajo1->resultado_pt_s_auditivo;
						$puesto_trabajo1->resultado_final_m_ext_inf = $puesto_trabajo1->resultado_pt_m_ext_inf;
						$puesto_trabajo1->resultado_final_m_ext_sup = $puesto_trabajo1->resultado_pt_m_ext_sup;
						$puesto_trabajo1->resultado_final_m_intelectual = $puesto_trabajo1->resultado_pt_m_intelectual;
						$puesto_trabajo1->resultado_final_m_psicosocial = $puesto_trabajo1->resultado_pt_m_psicosocial;
						$puesto_trabajo1->es_apto = 1;

					} else if ($puesto_trabajo1->eva_erin_resultado == 'ROJO') {
						$puesto_trabajo1->resultado_final_s_visual = 0;
						$puesto_trabajo1->resultado_final_s_auditivo = 0;
						$puesto_trabajo1->resultado_final_m_ext_inf = 0;
						$puesto_trabajo1->resultado_final_m_ext_sup = 0;
						$puesto_trabajo1->resultado_final_m_intelectual = 0;
						$puesto_trabajo1->resultado_final_m_psicosocial = 0;
						$puesto_trabajo1->es_apto = 0;

					} else if ($puesto_trabajo1->eva_erin_resultado == 'AMARILLO') {
						$puesto_trabajo1->resultado_final_s_visual = $puesto_trabajo1->resultado_pt_s_visual;
						$puesto_trabajo1->resultado_final_s_auditivo = $puesto_trabajo1->resultado_pt_s_auditivo;
						$puesto_trabajo1->resultado_final_m_ext_inf = $puesto_trabajo1->resultado_pt_m_ext_inf;
						$puesto_trabajo1->resultado_final_m_ext_sup = $puesto_trabajo1->resultado_pt_m_ext_sup;
						$puesto_trabajo1->resultado_final_m_intelectual = $puesto_trabajo1->resultado_pt_m_intelectual;
						$puesto_trabajo1->resultado_final_m_psicosocial = $puesto_trabajo1->resultado_pt_m_psicosocial;
						$puesto_trabajo1->es_apto = null;
					}
					$puesto_trabajo1->save();
				}

			}

			$result['status'] = true;
			$result['result'] = 'Se ha llenado el cuestionario satisfactoriamente.';

		} catch (Exception $e) {
			$result['result'] = $e->getMessage();

		}

		echo json_encode($result);

	}

	public function configuracion()
	{
		$data = array();
//		$data['preguntas'] = Pregunta_siso_model::all();
		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('siso/configuracion');
		$this->load->view('footer');
	}

	public function getPreguntasAll()
	{
		$puestoArray = array();
		$puestos = Pregunta_siso_model::whereRaw('estado = 1')->get();

		foreach ($puestos as $puesto) {
			$array = array(
				'id' => $puesto->id,
				'pregunuta' => $puesto->pregunuta,
				'grupo' => $puesto->grupo,
				'tipo_riesgo' => $puesto->tipo_riesgo,
				'valor_s_visual' => $puesto->valor_s_visual,
				'valor_s_auditivo' => $puesto->valor_s_auditivo,
				'valor_m_ext_inferior' => $puesto->valor_m_ext_inferior,
				'valor_m_ext_superior' => $puesto->valor_m_ext_superior,
				'valor_m_intelectual' => $puesto->valor_m_intelectual,
				'valor_m_psicosocial' => $puesto->valor_m_psicosocial
			);
			array_push($puestoArray, $array);
		}

		$array_empresa = array(
			"draw" => 1,
			"recordsTotal" => count($puestoArray),
			"recordsFiltered" => count($puestoArray),
			"data" => $puestoArray
		);
		echo json_encode($array_empresa);

	}

	public function pregunta()
	{
		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('siso/pregunta');
		$this->load->view('footer');
	}

	public function registrarPregunta()
	{
		$result = array('status' => false, 'result' => null);

		$permisos = $this->session->userdata('permisos');
		if ($permisos['siso/configuracion']['agregar'] == 1) {

			try {
				$pregunta = new Pregunta_siso_model();
				$pregunta->pregunuta = $this->input->post('txtPregunta');
				$pregunta->grupo = $this->input->post('txtGrupo');
				$pregunta->tipo_riesgo = $this->input->post('txtTipoRiesgo');

				$pregunta->valor_s_visual = $this->input->post('txtValorSensorialVisual', NULL);
				$pregunta->valor_s_auditivo = $this->input->post('txtValorSensorialAuditivo', NULL);
				$pregunta->valor_m_ext_inferior = $this->input->post('txtValorMotrizInferior', NULL);
				$pregunta->valor_m_ext_superior = $this->input->post('txtValorMotrizSuperior', NULL);
				$pregunta->valor_m_intelectual = $this->input->post('txtValorMentalIntelectual', NULL);
				$pregunta->valor_m_psicosocial = $this->input->post('txtValorMentalPsicosocial', NULL);

				$pregunta->usuario_creado = $this->session->userdata('usuario');
				$pregunta->fecha_creado = date('Y-m-d H:i:s');
				$pregunta->estado = 1;
				$pregunta->save();
				$result['status'] = true;
				$result['result'] = 'Se registro la pregunta satisfactoriamente.';
			} catch (Illuminate\Database\QueryException $e) {

				$error_code = $e->errorInfo[1];
				$contrain = $e->errorInfo[2];
				if ($error_code == 1062) { // < codigo de error MySQL para unique
					if (strpos($contrain, "pregunta_siso_UN")) {
						$result['result'] = "La pregunta se esta repitiendo.";
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

	public function editarPregunta()
	{
		$data = array();
		$idPregunta = (int)$this->uri->segment(3);
		$data['pregunta'] = Pregunta_siso_model::where(['id' => $idPregunta])->get();

		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('siso/preguntaEdit', $data);
		$this->load->view('footer');
	}

	public function actualizarPregunta()
	{
		$result = array('status' => false, 'result' => null);
		$permisos = $this->session->userdata('permisos');
		if ($permisos['siso/configuracion']['editar'] == 1) {
			$id = (int)$this->input->post('txtPreguntaId');
			try {
				$pregunta = Pregunta_siso_model::find($id);
				$pregunta->pregunuta = $this->input->post('txtPregunta');
				$pregunta->grupo = $this->input->post('txtGrupo');
				$pregunta->tipo_riesgo = $this->input->post('txtTipoRiesgo');

				$pregunta->valor_s_visual = $this->input->post('txtValorSensorialVisual', NULL);
				$pregunta->valor_s_auditivo = $this->input->post('txtValorSensorialAuditivo', NULL);
				$pregunta->valor_m_ext_inferior = $this->input->post('txtValorMotrizInferior', NULL);
				$pregunta->valor_m_ext_superior = $this->input->post('txtValorMotrizSuperior', NULL);
				$pregunta->valor_m_intelectual = $this->input->post('txtValorMentalIntelectual', NULL);
				$pregunta->valor_m_psicosocial = $this->input->post('txtValorMentalPsicosocial', NULL);

				$pregunta->usuario_modificado = $this->session->userdata('usuario');
				$pregunta->fecha_modificado = date('Y-m-d H:i:s');

				$pregunta->save();
				$result['status'] = true;
				$result['result'] = 'Se actualizo la pregunta satisfactoriamente.';
			} catch (Illuminate\Database\QueryException $e) {

				$error_code = $e->errorInfo[1];
				$contrain = $e->errorInfo[2];
				if ($error_code == 1062) { // < codigo de error MySQL para unique
					if (strpos($contrain, "pregunta_siso_UN")) {
						$result['result'] = "La pregunta se esta repitiendo.";
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

	public function deletePregunta()
	{

		$result = array('status' => false, 'result' => null);
		$permisos = $this->session->userdata('permisos');
		if ($permisos['siso/configuracion']['eliminar'] == 1) {
			$id = $this->input->post('id');
			try {
				$count = cuestionario_siso_model::where(['id_pregunta_siso' => $id, 'estado' => 1])->count();
				if ($count == 0) {
					Pregunta_siso_model::destroy($id);

//					$empresa->estado = 0;
//					$empresa->usuario_modificado = $this->session->userdata('usuario');
//					$empresa->fecha_modificado = date('Y-m-d H:i:s');
//
//					$empresa->save();
					$result['status'] = true;
					$result['result'] = 'Se elimino la Pregunta satisfactoriamente.';
				} else {
					$result['status'] = true;
					$result['result'] = 'La pregunta esta asociada a un cuestionario, no puede ser eliminada.';
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
		if ($permisos['siso/configuracion']['exportar'] == 1) {
			$labels_columns = array('Id', 'Pregunta', 'Grupo', 'Tipo Riesgo', 'Valor Visual', 'Valor Auditivo', 'Valor Ext. Inferior', 'Valor Ext. Inferior', 'Valor Intelectual', 'Valor Psicosocial', 'Usuario Creado', 'Fecha Creacion', 'Usuario Modificado', 'Fecha Modificado');

			$sql = "SELECT * FROM pregunta_siso ORDER BY 3 DESC, 4 ASC;";

			$empresaExport = $this->db->query($sql)->result_array();

			$file_name = 'preguntas_siso_';
			$label_sheet = 'PreguntasSiso';
			$result['status'] = true;
			$result['result'] = $this->boxspoutxls->create_pareto_detail_report_xlsx($label_sheet, $labels_columns, $empresaExport, $file_name);
			echo json_encode($result);

		} else {
			$result['result'] = 'No tiene permisos para ejecutar esta acción.';
		}

	}

}
