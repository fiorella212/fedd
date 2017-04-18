<?php
/**
 * Created by PhpStorm.
 * User: jorgenunez
 * Date: 2/2/17
 * Time: 11:37 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class Empresa_model extends Eloquent {

    public $timestamps = false;
    protected $table = 'empresa';
    protected $primaryKey = 'id';
    protected $fillable = ['codigo','razon_social','ruc','direccion','telefono',
                            'usuario_creado','fecha_creado','usuario_modificado','fecha_modificado','estado', 'rubro'];

    function local() {
        return $this->hasMany('Local_model', 'id_empresa');
    }
}

