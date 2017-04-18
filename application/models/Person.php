<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class Person extends Eloquent {
    
    public $timestamps = false;
    protected $table = 'person';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];
    
    function telephone() {
        return $this->hasMany('Telephone', 'person_id');
    }
}

