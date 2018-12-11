<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon;

class Sensor extends Model
{
    protected $primaryKey = 'id_sensor';

    public function user(){
        return $this -> belongsTo('App\Grupo', 'grupo_id_grupo', 'empresa_id_empresa');
    }

    public function dados(){
        return $this -> hasMany('App\Dado');
    }

    // Isso retorna a data no formato que eu escolher
    public function getCreatedAtAttribute($date)
    {
        return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y H:i:s');
    }

    public function getUpdatedAtAttribute($date)
    {
        return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y H:i:s');
    }
}
