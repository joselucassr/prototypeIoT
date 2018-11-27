<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    public function user(){
        return $this -> belongsTo('App\Grupo', 'grupo_id', 'id');
    }

    public function dados(){
        return $this -> hasMany('App\Dado');
    }
}
