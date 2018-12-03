<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dado extends Model
{
    public function dado(){
        return $this -> belongsTo('App\Sensor');
    }
}
