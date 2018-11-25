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
        'nome_empresa', 'cnpj', 'email_empresa', 'telefone_1_empresa', 'telefone_2_empresa', 'cidade', 'estado', 'cep', 'nome_responsavel', 'cpf', 'email_responsavel', 'genero', 'senha'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'senha', 'remember_token',
    ];
}
