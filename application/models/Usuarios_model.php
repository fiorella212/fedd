<?php
/**
 * Created by PhpStorm.
 * User: jorgenunez
 * Date: 2/3/17
 * Time: 12:11 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class Usuarios_model extends Eloquent {

    public $timestamps = false;
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $fillable = ['nombres','apellidos','telefono','email','usuario','contrasena','id_rol','usuario_creado','fecha_creado','usuario_modificado','fecha_modificado','estado'];

    function rol() {
        return $this->hasOne('Roles_model', 'id', 'id_rol');
    }

}