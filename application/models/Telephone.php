<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class Telephone extends Eloquent {
    
    public $timestamps = true;
    protected $table = 'telephone';
    protected $primaryKey = 'id';
    protected $fillable = [
                          'person_id',
                          'telephone_type_id'];
    
    function person() {
        return $this->belongsTo('Person');
    }
    
    function telephone_type() {
        return $this->hasOne('Telephone_type', 'id', 'telephone_type_id');
    }
}

