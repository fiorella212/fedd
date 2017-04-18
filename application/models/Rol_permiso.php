<?php
/**
 * Created by PhpStorm.
 * User: jorgenunez
 * Date: 2/3/17
 * Time: 12:25 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class Rol_permiso extends Eloquent {

    public $timestamps = false;
    protected $table = 'rol_permiso';
    protected $fillable = ['id_rol','id_permiso','acceso','agregar','editar','eliminar','exportar','importar'];

    function roles() {
        return $this->belongsTo('Roles');
    }

    function permisos() {
        return $this->belongsTo('permisos');
    }

}