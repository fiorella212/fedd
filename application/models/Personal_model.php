<?php
/**
 * Created by PhpStorm.
 * User: jorgenunez
 * Date: 2/16/17
 * Time: 11:23 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class Personal_model extends Eloquent {

    public $timestamps = false;
    protected $table = 'personal';
    protected $primaryKey = 'id';
    protected $fillable = ['planilla','codigo_sap','fecha_ingreso','nombres_trabajador','apellidos_trabajador',
                            'regimen','sede','denominacion_sap','area','fecha_nacimiento','sexo','anos_res_jubilacion',
                            'ano_jubilacion','dni','codigo_trabajador','gerencia','id_empresa'];

}

