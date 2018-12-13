<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responsavel extends Model
{
    protected $table = 'responsavel';
    protected $primaryKey = 'id_responsavel';

    public function user(){
        return $this -> belongsTo('App\User', 'empresa_id_empresa');
    }
}
