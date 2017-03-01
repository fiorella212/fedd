<?php
/**
 * Created by IntelliJ IDEA.
 * User: gustavo
 * Date: 2/4/17
 * Time: 12:01 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Evaerin extends CI_Controller
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
		$data['locales'] = Local_model::where('id_empresa', '=', $this->session->id_empresa)->get();
		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('evaerin/main', $data);
		$this->load->view('footer');
	}


	public function registrarEvaluacion()
	{
		$result = array('status' => false, 'result' => null);

		$idPuesto = (int) $this->input->post('idPuesto');

		try {
			$evaerin = Puesto_trabajo_model::find($idPuesto);
			$evaerin->eva_erin_resultado = $this->input->post('cmbResultado');
			$evaerin->eva_erin_observaciones = $this->input->post('txtObservaciones');
			$evaerin->usuario_modificado = $this->session->userdata('usuario');
			$evaerin->fecha_modificado = date('Y-m-d H:i:s');
			$evaerin->save();

            $puesto_trabajo = Puesto_trabajo_model::find($idPuesto);
			if((($puesto_trabajo->s_visual_pre_eval >= 0 && (!is_null($puesto_trabajo->s_visual_pre_eval))) || ($puesto_trabajo->s_visual_requerimiento != null && $puesto_trabajo->s_visual_actividad !=null && $puesto_trabajo->s_visual_restriccion !=null))
				&& (($puesto_trabajo->s_auditivo_pre_eval >= 0 && (!is_null($puesto_trabajo->s_auditivo_pre_eval))) || ($puesto_trabajo->s_auditivo_requerimiento != null && $puesto_trabajo->s_auditivo_actividad !=null && $puesto_trabajo->s_auditivo_restriccion !=null))
				&& (($puesto_trabajo->m_ext_sup_pre_eval >= 0 && (!is_null($puesto_trabajo->s_auditivo_pre_eval))) ||($puesto_trabajo->m_ext_sup_requerimiento != null && $puesto_trabajo->m_ext_sup_actividad !=null && $puesto_trabajo->m_ext_sup_restriccion !=null))
				&& (($puesto_trabajo->m_ext_inf_pre_eval >= 0 && (!is_null($puesto_trabajo->m_ext_inf_pre_eval))) ||($puesto_trabajo->m_ext_inf_requerimiento != null && $puesto_trabajo->m_ext_inf_actividad !=null && $puesto_trabajo->m_ext_inf_restriccion !=null))
				&& (($puesto_trabajo->m_intelectual_pre_eval >= 0 && (!is_null($puesto_trabajo->m_intelectual_pre_eval))) || ($puesto_trabajo->m_intelectual_requerimiento != null && $puesto_trabajo->m_intelectual_actividad !=null && $puesto_trabajo->m_intelectual_restriccion !=null))
				&& (($puesto_trabajo->m_psicosocial_pre_eval >= 0  && (!is_null($puesto_trabajo->m_psicosocial_pre_eval))) || ($puesto_trabajo->m_psicosocial_requerimiento != null && $puesto_trabajo->m_psicosocial_actividad !=null && $puesto_trabajo->m_psicosocial_restriccion !=null))
				&& ($puesto_trabajo->siso_s_visual >= 0 && (!is_null($puesto_trabajo->siso_s_visual)))
                && ($puesto_trabajo->siso_s_auditivo>= 0 && (!is_null($puesto_trabajo->siso_s_auditivo)))
				&& ($puesto_trabajo->siso_m_ext_superior>= 0 && (!is_null($puesto_trabajo->siso_m_ext_superior)))
                && ($puesto_trabajo->siso_m_ext_inferior>= 0 && (!is_null($puesto_trabajo->siso_m_ext_inferior)))
                && ($puesto_trabajo->siso_m_intelectual>= 0 && (!is_null($puesto_trabajo->siso_m_intelectual)))
                && ($puesto_trabajo->siso_m_psicosocial >= 0 && (!is_null($puesto_trabajo->siso_m_psicosocial)))
				&& $puesto_trabajo->eva_erin_resultado != null) {

                if ($this->input->post('cmbResultado') == 'VERDE') {
                    $puesto_trabajo->resultado_final_s_visual = $puesto_trabajo->resultado_pt_s_visual;
                    $puesto_trabajo->resultado_final_s_auditivo = $puesto_trabajo->resultado_pt_s_auditivo;
                    $puesto_trabajo->resultado_final_m_ext_inf = $puesto_trabajo->resultado_pt_m_ext_inf;
                    $puesto_trabajo->resultado_final_m_ext_sup = $puesto_trabajo->resultado_pt_m_ext_sup;
                    $puesto_trabajo->resultado_final_m_intelectual = $puesto_trabajo->resultado_pt_m_intelectual;
                    $puesto_trabajo->resultado_final_m_psicosocial = $puesto_trabajo->resultado_pt_m_psicosocial;
                    $puesto_trabajo->es_apto = 1;

                } else if ($this->input->post('cmbResultado') == 'ROJO') {
                    $puesto_trabajo->resultado_final_s_visual = 0;
                    $puesto_trabajo->resultado_final_s_auditivo = 0;
                    $puesto_trabajo->resultado_final_m_ext_inf = 0;
                    $puesto_trabajo->resultado_final_m_ext_sup = 0;
                    $puesto_trabajo->resultado_final_m_intelectual = 0;
                    $puesto_trabajo->resultado_final_m_psicosocial = 0;
                    $puesto_trabajo->es_apto = 0;

                } else if ($this->input->post('cmbResultado') == 'AMARILLO') {

                    $puesto_trabajo->es_apto = null;
                }
                $puesto_trabajo->save();
            }
			$result['status'] = true;
			$result['result'] = 'Se Registro la evaluacon EvaErin satisfactoriamente.';

		} catch (Exception $e) {
			$result['result'] = $e->getMessage();
		}
		echo json_encode($result);

	}


	// XHR

	public function getAreas()
	{
		$idLocal = (int) $this->input->post('idLocal');
		$data['areas'] = Area_model::where('id_local', '=', $idLocal)->get();
		echo json_encode($data);
	}

	public function getSabha()
	{
		$idArea = (int) $this->input->post('idArea');
		$data['puesto_trabajo'] = Puesto_trabajo_model::where('id_area', '=', $idArea)->get();
		echo json_encode($data);
	}

	public function getEvaerin()
	{

		$idPuesto = (int) $this->input->post('idPuesto');
		$data = Puesto_trabajo_model::where('id', '=', $idPuesto)->get();
		echo json_encode($data);
	}

}
