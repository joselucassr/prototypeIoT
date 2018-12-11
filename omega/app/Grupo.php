<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    public function user(){
        return $this -> belongsTo('App\User', 'empresa_id_empresa');
    }

    public function sensores(){
        return $this -> hasMany('App\Sensor', 'grupo_id_grupo');
    }
    protected $primaryKey = 'id_grupo';
}
