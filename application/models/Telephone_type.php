<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class Telephone_type extends Eloquent {
    
    public $timestamps = true;
    protected $table = 'telephone_type';
    protected $primaryKey = 'id';
    protected $fillable = ['type'];
    
    function telephone() {
        return $this->belongsTo('Telephone');
    }    
}

