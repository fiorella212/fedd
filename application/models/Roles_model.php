<?php
/**
 * Created by PhpStorm.
 * User: jorgenunez
 * Date: 2/3/17
 * Time: 12:16 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class Roles_model extends Eloquent {

    public $timestamps = false;
    protected $table = 'roles';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre','estado'];

    function usuarios() {
        return $this->belongsTo('Usuarios_model','id_usuario');
    }

    function rol_permiso() {
        return $this->hasMany('Rol_permiso', 'id_rol');
    }

}