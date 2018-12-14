<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Responsavel extends Authenticatable
{

    use Notifiable;

    protected $guard = 'responsavel';

    protected $table = 'responsavel';
    protected $primaryKey = 'id_responsavel';

    protected $fillable = [
        'nome_responsavel', 'cpf', 'email_responsavel', 'telefone_responsavel', 'celular_responsavel', 'genero'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function user(){
        return $this -> belongsTo('App\User', 'empresa_id_empresa');
    }
}
