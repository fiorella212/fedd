<?php
/**
 * Created by PhpStorm.
 * User: jorgenunez
 * Date: 2/3/17
 * Time: 12:02 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class Pregunta_siso_model extends Eloquent {

    public $timestamps = false;
    protected $table = 'pregunta_siso';
    protected $primaryKey = 'id';
    protected $fillable = ['pregunuta','grupo','tipo_riesgo','valor_s_visual','valor_s_auditivo','valor_m_ext_inferior',
                            'valor_m_ext_superior','valor_m_intelectual','valor_m_psicosocial'];

    function cuestionario_siso() {
        return $this->belongsTo('Cuestionario_siso');
    }

	public function setValorSVisualAttribute($value)
	{
		$this->attributes['valor_s_visual'] = trim($value) == '' ? null : trim($value);
	}

	public function setValorSAuditivoAttribute($value)
	{
		$this->attributes['valor_s_auditivo'] = trim($value) == '' ? null : trim($value);
	}

	public function setValorMExtInferiorAttribute($value)
	{
		$this->attributes['valor_m_ext_inferior'] = trim($value) == '' ? null : trim($value);
	}

	public function setValorMExtSuperiorAttribute($value)
	{
		$this->attributes['valor_m_ext_superior'] = trim($value) == '' ? null : trim($value);
	}

	public function setValorMIntelectualAttribute($value)
	{
		$this->attributes['valor_m_intelectual'] = trim($value) == '' ? null : trim($value);
	}

	public function setValorMPsicosocialAttribute($value)
	{
		$this->attributes['valor_m_psicosocial'] = trim($value) == '' ? null : trim($value);
	}

}
