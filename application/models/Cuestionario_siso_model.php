<?php
/**
 * Created by PhpStorm.
 * User: jorgenunez
 * Date: 2/2/17
 * Time: 11:57 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class Cuestionario_siso_model extends Eloquent {

    public $timestamps = false;
    protected $table = 'cuestionario_siso';
    protected $primaryKey = 'id';
    protected $fillable = ['id_puesto_trabajo','id_pregunta_siso','respuesta','usuario_creado' ,'fecha_creado','usuario_modificado','fecha_modificado','estado'];

    function puesto_trabajo() {
        return $this->hasMany('Puesto_trabajo', 'id_cuestionario_siso');
    }

    function pregunta_siso() {
        return $this->hasOne('Pregunta_siso', 'id', 'id_cuestionario_siso');
    }

}