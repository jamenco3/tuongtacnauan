<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $table="Comment";

    public function recipe(){
    	return $this->belongsTo('App\Recipe','id_recipe','id');
    }

    public function user(){
    	return $this->belongsTo('App\User','id_user','id');
    }
}
