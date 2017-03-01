<?php
/**
 * Created by PhpStorm.
 * User: jorgenunez
 * Date: 2/3/17
 * Time: 12:06 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class Preguntas_doctor extends Eloquent {

    public $timestamps = false;
    protected $table = 'preguntas_doctor';
    protected $fillable = ['valor_s_visual_preg','valor_s_auditivo_preg','valor_m_ext_inferior_preg','valor_m_ext_superior_preg',
        'valor_m_intelectual_preg','valor_m_psicosocial_preg'];
}