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
    protected $fillable = ['id_empresa_sap','empresa_nombre_sap','id_sede_sap','sede_nombre_sap','area_nombre',
                            'codigo_puesto_creado','codigo_sabha','consultoria','codigo_puesto','nombre_puesto',
                            'genero','num_colaborador','nombres_apellidos','fecha_nacimiento','fecha_ingreso','sede_estudio','id_empresa'];


}

