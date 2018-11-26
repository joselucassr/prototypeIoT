<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    public function user(){
        return $this -> belongsTo('App\User');
    }

    public function sensores(){
        return $this -> hasMany('App\Sensor');
    }
}
