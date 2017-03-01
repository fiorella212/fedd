<?php
/**
 * Created by PhpStorm.
 * User: jorgenunez
 * Date: 2/2/17
 * Time: 11:37 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class Local_model extends Eloquent {

    public $timestamps = false;
    protected $table = 'local';
    protected $primaryKey = 'id';
    protected $fillable = ['codigo','id_empresa','nombre','direccion','encargado','telefono','email',
        'usuario_creado' ,'fecha_creado','usuario_modificado','fecha_modificado','estado'];

    function empresa() {
        return $this->belongsTo('Empresa_model', 'id_empresa');
    }

    function area() {
        return $this->hasMany('Area', 'id_local');
   }

}
