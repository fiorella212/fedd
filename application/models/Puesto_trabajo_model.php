<?php
/**
 * Created by PhpStorm.
 * User: jorgenunez
 * Date: 2/3/17
 * Time: 12:28 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class Puesto_trabajo_model extends Eloquent {

    public $timestamps = false;
    protected $table = 'puesto_trabajo';
    protected $primaryKey = 'id';
    protected $fillable = ['id_local','entrevistado_nombre','entrevistado_puesto','entrevistado_telefono','entrevistado_email',
                            'eva_erin_resultado','eva_erin_observaciones','id_cuestionario_siso','siso_s_visual','siso_s_auditivo',
                            'siso_m_ext_inferior','siso_m_ext_superior','siso_m_intelectual','siso_m_psicosocial','codigo_sabha',
                            'denominacion_sabha','codigo_mof','denominacion_mof','codigo_sap','denominacion_sap','otra_denominacion',
                            'id_area','funcion_principal','s_visual_actividad','s_visual_requerimiento','s_visual_restriccion',
                            's_visual_pre_eval','s_auditivo_actividad','s_auditivo_requerimiento','s_auditivo_restriccion',
                            's_auditivo_pre_eval','m_ext_inf_actividad','m_ext_inf_requerimiento','m_ext_inf_restriccion',
                            'm_ext_inf_pre_eval','m_ext_sup_actividad','m_ext_sup_requerimiento','m_ext_sup_restriccion',
                            'm_ext_sup_pre_eval','m_intelectual_actividad','m_intelectual_requerimiento','m_intelectual_restriccion',
                            'm_intelectual_pre_eval','m_psicosocial_actividad','m_psicosocial_requerimiento','m_psicosocial_restriccion',
                            'm_psicosocial_pre_eval','resultado_pt_s_visual','resultado_pt_s_auditivo','resultado_pt_m_ext_inf',
                            'resultado_pt_m_ext_sup','resultado_pt_m_intelectual','resultado_pt_m_psicosocial',
                            'resultado_final_s_visual','resultado_final_s_auditivo','resultado_final_m_ext_inf','resultado_final_m_ext_sup',
                            'resultado_final_m_intelectual','resultado_final_m_psicosocial','es_apto','aplica_ajutes','estado_registro',
                            'notas', 'id_empresa', 'usuario_creado','fecha_creado','usuario_modificado','fecha_modificado','estado'];

    function local() {
        return $this->belongsTo('Local_model', 'id_local');
    }

    function area() {
        return $this->belongsTo('Area_model', 'id_area');
    }

    function cuestionario_siso() {
        return $this->hasOne('Cuestionario_siso', 'id', 'id_puesto_trabajo');
    }

	public function getEsAptoAttribute($value)
	{
		if (is_null($value)) {
			$response = '';
		} else if ($value == 0) {
			$response = 'NO APTO';
		} else {
			$response = 'APTO';
		}
		return $response;
    }

	public function getEstadoRegistroAttribute($value)
	{
		return str_replace('_', ' ', $value);
	}

}
