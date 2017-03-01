<?php
/**
 * Created by PhpStorm.
 * User: jorgenunez
 * Date: 2/2/17
 * Time: 11:50 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class Area_model extends Eloquent {

    public $timestamps = false;
    protected $table = 'area';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre','id_local','usuario_creado','fecha_creado','usuario_modificado','fecha_modificado','estado'];

    function local() {
        return $this->belongsTo('Local_model','id_local');
    }

    function area() {
        return $this->hasMany('Puesto_trabajo', 'id_area');
    }
}