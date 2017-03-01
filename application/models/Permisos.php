<?php
/**
 * Created by PhpStorm.
 * User: jorgenunez
 * Date: 2/3/17
 * Time: 12:20 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class Permisos extends Eloquent {

    public $timestamps = false;
    protected $table = 'permisos';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre','base_url'];

   function rol_permiso() {
        return $this->hasMany('Rol_permiso', 'id_permiso');
    }

}