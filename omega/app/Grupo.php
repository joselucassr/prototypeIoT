<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $primaryKey = 'id_grupo';

    public function user(){
        return $this -> belongsTo('App\User', 'empresa_id_empresa');
    }

    public function sensores(){
        return $this -> hasMany('App\Sensor', 'grupo_id_grupo');
    }

    // this is a recommended way to declare event handlers
    public static function boot() {
        parent::boot();

        static::deleting(function($grupo) { // before delete() method call this
            $grupo->sensores()->delete();
            // do the rest of the cleanup...
        });
    }
}
