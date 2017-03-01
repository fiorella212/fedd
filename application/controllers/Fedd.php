<?php
/**
 * Created by IntelliJ IDEA.
 * User: gustavo
 * Date: 2/5/17
 * Time: 2:55 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Fedd extends CI_Controller
{

    function __construct()
    {

        parent::__construct();
        $this->load->model('Local_model');
        $this->load->model('Area_model');
        $this->load->model('Puesto_trabajo_model');
        $this->load->model('Preguntas_doctor');

        $this->load->library(array('form_validation', 'session'));
        $this->load->helper(array('url', 'html', 'form'));
    }

    public function index()
    {
        $data['locales'] = Local_model::where('id_empresa', '=', $this->session->id_empresa)->get();
        $data['preguntas'] = Preguntas_doctor::all();
        $this->load->view('header');
        $this->load->view('navbar');
        $this->load->view('fedd/main', $data);
        $this->load->view('footer');
    }

    public function getAreas()
    {
        $idLocal = (int)$this->input->post('idLocal');
        $data['areas'] = Area_model::where('id_local', '=', $idLocal)->get();
        echo json_encode($data);
    }

    public function getSabha()
    {
        $idArea = (int)$this->input->post('idArea');
        $data['puesto_trabajo'] = Puesto_trabajo_model::where('id_area', '=', $idArea)->get();
        echo json_encode($data);
    }

    public function createEvalFinal()
    {
        $evaerin = $this->input->post('evaerin');
        $visual = $this->input->post('visual');
        $auditivo = $this->input->post('auditivo');
        $superiores = $this->input->post('superiores');
        $inferiores = $this->input->post('inferiores');
        $intelectual = $this->input->post('intelectual');
        $psicosocial = $this->input->post('psicosocial');
        $ajustes = $this->input->post('ajustes');
        $puesto_id = (int)$this->input->post('puestoId');

        try {

            $puesto_trabajo = Puesto_trabajo_model::find($puesto_id);

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

                if ($evaerin == 'VERDE') {
                    $puesto_trabajo->resultado_final_s_visual = $puesto_trabajo->resultado_pt_s_visual;
                    $puesto_trabajo->resultado_final_s_auditivo = $puesto_trabajo->resultado_pt_s_auditivo;
                    $puesto_trabajo->resultado_final_m_ext_inf = $puesto_trabajo->resultado_pt_m_ext_inf;
                    $puesto_trabajo->resultado_final_m_ext_sup = $puesto_trabajo->resultado_pt_m_ext_sup;
                    $puesto_trabajo->resultado_final_m_intelectual = $puesto_trabajo->resultado_pt_m_intelectual;
                    $puesto_trabajo->resultado_final_m_psicosocial = $puesto_trabajo->resultado_pt_m_psicosocial;
                    $puesto_trabajo->es_apto = 1;

                } else if ($evaerin == 'ROJO') {
                    $puesto_trabajo->resultado_final_s_visual = 0;
                    $puesto_trabajo->resultado_final_s_auditivo = 0;
                    $puesto_trabajo->resultado_final_m_ext_inf = 0;
                    $puesto_trabajo->resultado_final_m_ext_sup = 0;
                    $puesto_trabajo->resultado_final_m_intelectual = 0;
                    $puesto_trabajo->resultado_final_m_psicosocial = 0;
                    $puesto_trabajo->es_apto = 0;

                } else if ($evaerin == 'AMARILLO') {
                    $puesto_trabajo->resultado_final_s_visual = $visual;
                    $puesto_trabajo->resultado_final_s_auditivo = $auditivo;
                    $puesto_trabajo->resultado_final_m_ext_inf = $inferiores;
                    $puesto_trabajo->resultado_final_m_ext_sup = $superiores;
                    $puesto_trabajo->resultado_final_m_intelectual = $intelectual;
                    $puesto_trabajo->resultado_final_m_psicosocial = $psicosocial;
                    if ($visual >= 1 && $auditivo >= 1 && $inferiores >= 1 && $superiores >= 1 && $intelectual >= 1 && $psicosocial >= 1) {
                        $puesto_trabajo->es_apto = 1;
                    } else {
                        $puesto_trabajo->es_apto = 0;
                    }

                }

                $puesto_trabajo->aplica_ajutes = $ajustes;
                $puesto_trabajo->usuario_modificado = $this->session->userdata('usuario');
                $puesto_trabajo->fecha_modificado = date('Y-m-d H:i:s');
                $puesto_trabajo->save();
                $result['status'] = true;
                $result['result'] = 'Se ha registrado satisfactoriamente.';
            }else{
                $result['status'] = false;
                $result['result'] = 'Existen evaluaciones incompletas.';
            }


        } catch (Exception $e) {
            $result['result'] = $e->getMessage();

        }
        echo json_encode($result);
    }

    public function createEvalFedd()
    {
        $resultado_id = (int)$this->input->post('resultadoId');
        $actividades = $this->input->post('actividades');
        $requerimiento = $this->input->post('requerimiento');
        $restricciones = $this->input->post('restricciones');
        $resultado = $this->input->post('resultado');
        $puesto_id = (int)$this->input->post('puestoId');
        try {

            $puesto_trabajo = Puesto_trabajo_model::find($puesto_id);
            if ($resultado_id == 0) {
                $puesto_trabajo->s_visual_actividad = $actividades;
                $puesto_trabajo->s_visual_requerimiento = $requerimiento;
                $puesto_trabajo->s_visual_restriccion = $restricciones;
                if ($resultado == '') {
                    $puesto_trabajo->s_visual_pre_eval = null;
                    $puesto_trabajo->resultado_pt_s_visual = $puesto_trabajo->siso_s_visual;
                } else {
                    $puesto_trabajo->s_visual_pre_eval = $resultado;
                    if ($puesto_trabajo->s_visual_pre_eval < $puesto_trabajo->siso_s_visual) {
                        $puesto_trabajo->resultado_pt_s_visual = $puesto_trabajo->s_visual_pre_eval;
                    } else {
                        $puesto_trabajo->resultado_pt_s_visual = $puesto_trabajo->siso_s_visual;
                    }
                }

            } else if ($resultado_id == 1) {
                $puesto_trabajo->s_auditivo_actividad = $actividades;
                $puesto_trabajo->s_auditivo_requerimiento = $requerimiento;
                $puesto_trabajo->s_auditivo_restriccion = $restricciones;
                if ($resultado == '') {
                    $puesto_trabajo->s_auditivo_pre_eval = null;
                    $puesto_trabajo->resultado_pt_s_auditivo = $puesto_trabajo->siso_s_auditivo;
                } else {
                    $puesto_trabajo->s_auditivo_pre_eval = $resultado;
                    if ($puesto_trabajo->s_auditivo_pre_eval < $puesto_trabajo->siso_s_auditivo) {
                        $puesto_trabajo->resultado_pt_s_auditivo = $puesto_trabajo->s_auditivo_pre_eval;
                    } else {
                        $puesto_trabajo->resultado_pt_s_auditivo = $puesto_trabajo->siso_s_auditivo;
                    }
                }

            } else if ($resultado_id == 3) {
                $puesto_trabajo->m_ext_inf_actividad = $actividades;
                $puesto_trabajo->m_ext_inf_requerimiento = $requerimiento;
                $puesto_trabajo->m_ext_inf_restriccion = $restricciones;
                if ($resultado == '') {
                    $puesto_trabajo->m_ext_inf_pre_eval = null;
                    $puesto_trabajo->resultado_pt_m_ext_inf = $puesto_trabajo->siso_m_ext_inferior;
                } else {
                    $puesto_trabajo->m_ext_inf_pre_eval = $resultado;
                    if ($puesto_trabajo->m_ext_inf_pre_eval < $puesto_trabajo->siso_m_ext_inferior) {
                        $puesto_trabajo->resultado_pt_m_ext_inf = $puesto_trabajo->m_ext_inf_pre_eval;
                    } else {
                        $puesto_trabajo->resultado_pt_m_ext_inf = $puesto_trabajo->siso_m_ext_inferior;
                    }
                }

            } else if ($resultado_id == 2) {
                $puesto_trabajo->m_ext_sup_actividad = $actividades;
                $puesto_trabajo->m_ext_sup_requerimiento = $requerimiento;
                $puesto_trabajo->m_ext_sup_restriccion = $restricciones;

                if ($resultado == '') {
                    $puesto_trabajo->m_ext_sup_pre_eval = null;
                    $puesto_trabajo->resultado_pt_m_ext_sup = $puesto_trabajo->siso_m_ext_superior;
                } else {
                    $puesto_trabajo->m_ext_sup_pre_eval = $resultado;
                    if ($puesto_trabajo->m_ext_sup_pre_eval < $puesto_trabajo->siso_m_ext_superior) {
                        $puesto_trabajo->resultado_pt_m_ext_sup = $puesto_trabajo->m_ext_sup_pre_eval;
                    } else {
                        $puesto_trabajo->resultado_pt_m_ext_sup = $puesto_trabajo->siso_m_ext_superior;
                    }
                }

            } else if ($resultado_id == 4) {
                $puesto_trabajo->m_intelectual_actividad = $actividades;
                $puesto_trabajo->m_intelectual_requerimiento = $requerimiento;
                $puesto_trabajo->m_intelectual_restriccion = $restricciones;

                if ($resultado == '') {
                    $puesto_trabajo->m_intelectual_pre_eval = null;
                    $puesto_trabajo->resultado_pt_m_intelectual = $puesto_trabajo->siso_m_intelectual;
                } else {
                    $puesto_trabajo->m_intelectual_pre_eval = $resultado;
                    if ($puesto_trabajo->m_intelectual_pre_eval < $puesto_trabajo->siso_m_intelectual) {
                        $puesto_trabajo->resultado_pt_m_intelectual = $puesto_trabajo->m_intelectual_pre_eval;
                    } else {
                        $puesto_trabajo->resultado_pt_m_intelectual = $puesto_trabajo->siso_m_intelectual;
                    }
                }

            } else if ($resultado_id == 5) {
                $puesto_trabajo->m_psicosocial_actividad = $actividades;
                $puesto_trabajo->m_psicosocial_requerimiento = $requerimiento;
                $puesto_trabajo->m_psicosocial_restriccion = $restricciones;


                if ($resultado == '') {
                    $puesto_trabajo->m_psicosocial_pre_eval = null;
                    $puesto_trabajo->resultado_pt_m_psicosocial = $puesto_trabajo->siso_m_psicosocial;
                } else {
                    $puesto_trabajo->m_psicosocial_pre_eval = $resultado;
                    if ($puesto_trabajo->m_psicosocial_pre_eval < $puesto_trabajo->siso_m_psicosocial) {
                        $puesto_trabajo->resultado_pt_m_psicosocial = $puesto_trabajo->m_psicosocial_pre_eval;
                    } else {
                        $puesto_trabajo->resultado_pt_m_psicosocial = $puesto_trabajo->siso_m_psicosocial;
                    }
                }
            }

            $puesto_trabajo->usuario_modificado = $this->session->userdata('usuario');
            $puesto_trabajo->fecha_modificado = date('Y-m-d H:i:s');
            $puesto_trabajo->save();
            $result['status'] = true;
            $result['result'] = 'Se ha registrado satisfactoriamente.';
            $result['puesto'] = $puesto_trabajo;

        } catch (Exception $e) {
            $result['result'] = $e->getMessage();

        }

        echo json_encode($result);
    }

    public function getFedd()
    {
        $id = (int)$this->input->post('id');
        $data = array();
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

        if ($puesto_trabajo->s_visual_pre_eval >= 0 && !is_null($puesto_trabajo->s_visual_pre_eval)) {
            $data['s_visual_actividad'] = $puesto_trabajo->s_visual_actividad;
            $data['s_visual_requerimiento'] = $puesto_trabajo->s_visual_requerimiento;
            $data['s_visual_restriccion'] = $puesto_trabajo->s_visual_restriccion;
            $data['s_visual_pre_eval'] = $array['sensorial_visual'][$puesto_trabajo->s_visual_pre_eval];
        }elseif($puesto_trabajo->s_visual_actividad !='' && $puesto_trabajo->s_visual_requerimiento !='' && $puesto_trabajo->s_visual_restriccion !=''){
            $data['s_visual_actividad'] = $puesto_trabajo->s_visual_actividad;
            $data['s_visual_requerimiento'] = $puesto_trabajo->s_visual_requerimiento;
            $data['s_visual_restriccion'] = $puesto_trabajo->s_visual_restriccion ;
            $data['s_visual_pre_eval'] = 'Sin Resultado';
        } else {
            $data['s_visual_actividad'] = '';
            $data['s_visual_requerimiento'] = '';
            $data['s_visual_restriccion'] = '';
            $data['s_visual_pre_eval'] = '';
        }

        if ($puesto_trabajo->s_auditivo_pre_eval >= 0 && !is_null($puesto_trabajo->s_auditivo_pre_eval)) {
            $data['s_auditivo_actividad'] = $puesto_trabajo->s_auditivo_actividad;
            $data['s_auditivo_requerimiento'] = $puesto_trabajo->s_auditivo_requerimiento;
            $data['s_auditivo_restriccion'] = $puesto_trabajo->s_auditivo_restriccion;
            $data['s_auditivo_pre_eval'] = $array['sensorial_auditivo'][$puesto_trabajo->s_auditivo_pre_eval];
        }elseif($puesto_trabajo->s_auditivo_actividad !='' && $puesto_trabajo->s_auditivo_requerimiento !='' && $puesto_trabajo->s_auditivo_restriccion !=''){
            $data['s_auditivo_actividad'] = $puesto_trabajo->s_auditivo_actividad;
            $data['s_auditivo_requerimiento'] = $puesto_trabajo->s_auditivo_requerimiento;
            $data['s_auditivo_restriccion'] = $puesto_trabajo->s_auditivo_restriccion ;
            $data['s_auditivo_pre_eval'] = 'Sin Resultado';
        } else {
            $data['s_auditivo_actividad'] = '';
            $data['s_auditivo_requerimiento'] = '';
            $data['s_auditivo_restriccion'] = '';
            $data['s_auditivo_pre_eval'] = '';
        }


        if ($puesto_trabajo->m_ext_inf_pre_eval >= 0 && !is_null($puesto_trabajo->m_ext_inf_pre_eval)) {

            $data['m_ext_inf_actividad'] = $puesto_trabajo->m_ext_inf_actividad;
            $data['m_ext_inf_requerimiento'] = $puesto_trabajo->m_ext_inf_requerimiento;
            $data['m_ext_inf_restriccion'] = $puesto_trabajo->m_ext_inf_restriccion;
            $data['m_ext_inf_pre_eval'] = $array['ext_inferiores'][$puesto_trabajo->m_ext_inf_pre_eval];
        }elseif($puesto_trabajo->m_ext_inf_actividad !='' && $puesto_trabajo->m_ext_inf_requerimiento !='' && $puesto_trabajo->m_ext_inf_restriccion !=''){
            $data['m_ext_inf_actividad'] = $puesto_trabajo->m_ext_inf_actividad;
            $data['m_ext_inf_requerimiento'] = $puesto_trabajo->m_ext_inf_requerimiento;
            $data['m_ext_inf_restriccion'] = $puesto_trabajo->m_ext_inf_restriccion ;
            $data['m_ext_inf_pre_eval'] = 'Sin Resultado';
        } else {
            $data['m_ext_inf_actividad'] = '';
            $data['m_ext_inf_requerimiento'] = '';
            $data['m_ext_inf_restriccion'] = '';
            $data['m_ext_inf_pre_eval'] = '';
        }

        if ($puesto_trabajo->m_ext_sup_pre_eval >= 0 && !is_null($puesto_trabajo->m_ext_sup_pre_eval)) {
            $data['m_ext_sup_actividad'] = $puesto_trabajo->m_ext_sup_actividad;
            $data['m_ext_sup_requerimiento'] = $puesto_trabajo->m_ext_sup_requerimiento;
            $data['m_ext_sup_restriccion'] = $puesto_trabajo->m_ext_sup_restriccion;
            $data['m_ext_sup_pre_eval'] = $array['ext_superiores'][$puesto_trabajo->m_ext_sup_pre_eval];
        }elseif($puesto_trabajo->m_ext_sup_actividad !='' && $puesto_trabajo->m_ext_sup_requerimiento !='' && $puesto_trabajo->m_ext_sup_restriccion !=''){
            $data['m_ext_sup_actividad'] = $puesto_trabajo->m_ext_sup_actividad;
            $data['m_ext_sup_requerimiento'] = $puesto_trabajo->m_ext_sup_requerimiento;
            $data['m_ext_sup_restriccion'] = $puesto_trabajo->m_ext_sup_restriccion ;
            $data['m_ext_sup_pre_eval'] = 'Sin Resultado';
        } else {
            $data['m_ext_sup_actividad'] = '';
            $data['m_ext_sup_requerimiento'] = '';
            $data['m_ext_sup_restriccion'] = '';
            $data['m_ext_sup_pre_eval'] = '';
        }


        if ($puesto_trabajo->m_intelectual_pre_eval >= 0 && !is_null($puesto_trabajo->m_intelectual_pre_eval)) {
            $data['m_intelectual_actividad'] = $puesto_trabajo->m_intelectual_actividad;
            $data['m_intelectual_requerimiento'] = $puesto_trabajo->m_intelectual_requerimiento;
            $data['m_intelectual_restriccion'] = $puesto_trabajo->m_intelectual_restriccion;
            $data['m_intelectual_pre_eval'] = $array['intelectual'][$puesto_trabajo->m_intelectual_pre_eval];
        }elseif($puesto_trabajo->m_intelectual_actividad !='' && $puesto_trabajo->m_intelectual_requerimiento !='' && $puesto_trabajo->m_intelectual_restriccion !=''){
            $data['m_intelectual_actividad'] = $puesto_trabajo->m_intelectual_actividad;
            $data['m_intelectual_requerimiento'] = $puesto_trabajo->m_intelectual_requerimiento;
            $data['m_intelectual_restriccion'] = $puesto_trabajo->m_intelectual_restriccion ;
            $data['m_intelectual_pre_eval'] = 'Sin Resultado';
        } else {
            $data['m_intelectual_actividad'] = '';
            $data['m_intelectual_requerimiento'] = '';
            $data['m_intelectual_restriccion'] = '';
            $data['m_intelectual_pre_eval'] = '';
        }


        if ($puesto_trabajo->m_psicosocial_pre_eval >= 0 && !is_null($puesto_trabajo->m_psicosocial_pre_eval)) {
            $data['m_psicosocial_actividad'] = $puesto_trabajo->m_psicosocial_actividad;
            $data['m_psicosocial_requerimiento'] = $puesto_trabajo->m_psicosocial_requerimiento;
            $data['m_psicosocial_restriccion'] = $puesto_trabajo->m_psicosocial_restriccion;
            $data['m_psicosocial_pre_eval'] = $array['psicosocial'][$puesto_trabajo->m_psicosocial_pre_eval];
        }elseif($puesto_trabajo->m_psicosocial_actividad !='' && $puesto_trabajo->m_psicosocial_requerimiento !='' && $puesto_trabajo->m_psicosocial_restriccion !=''){
            $data['m_psicosocial_actividad'] = $puesto_trabajo->m_psicosocial_actividad;
            $data['m_psicosocial_requerimiento'] = $puesto_trabajo->m_psicosocial_requerimiento;
            $data['m_psicosocial_restriccion'] = $puesto_trabajo->m_psicosocial_restriccion ;
            $data['m_psicosocial_pre_eval'] = 'Sin Resultado';
        } else {
            $data['m_psicosocial_actividad'] = '';
            $data['m_psicosocial_requerimiento'] = '';
            $data['m_psicosocial_restriccion'] = '';
            $data['m_psicosocial_pre_eval'] = '';
        }

        $data['resultado_final_s_visual'] = $puesto_trabajo->resultado_final_s_visual;
        $data['resultado_final_s_auditivo'] = $puesto_trabajo->resultado_final_s_auditivo;
        $data['resultado_final_m_ext_inf'] = $puesto_trabajo->resultado_final_m_ext_inf;
        $data['resultado_final_m_ext_sup'] = $puesto_trabajo->resultado_final_m_ext_sup;
        $data['resultado_final_m_intelectual'] = $puesto_trabajo->resultado_final_m_intelectual;
        $data['resultado_final_m_psicosocial'] = $puesto_trabajo->resultado_final_m_psicosocial;

        $data['eva_erin_resultado'] = $puesto_trabajo->eva_erin_resultado;
        $data['eva_erin_observaciones'] = $puesto_trabajo->eva_erin_observaciones;
        $data['aplica_ajutes'] = $puesto_trabajo->aplica_ajutes;
        if($puesto_trabajo->es_apto == 'APTO'){
            $data['es_apto'] = 1;
        }else if($puesto_trabajo->es_apto == 'NO APTO'){
            $data['es_apto'] = 0;
        }else{
            $data['es_apto'] = null;
        }
        echo json_encode($data);
    }

}
