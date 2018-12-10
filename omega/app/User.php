<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        /*'nome_empresa', 'cnpj', 'email_empresa', 'telefone_1_empresa', 'telefone_2_empresa', 'cidade', 'estado', 'cep',*/
        'nome_usuario', 'cpf', 'email_usuario', 'telefone_usuario', 'celular_usuario', 'genero', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'senha', 'remember_token',
    ];

    public function grupos(){
        return $this -> hasMany('App\Grupo');
    }
}
