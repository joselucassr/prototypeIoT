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

    protected $table = 'empresa';
    protected $primaryKey = 'id_empresa';


    protected $fillable = [
        'nome_empresa', 'cnpj', 'email_empresa', 'telefone_empresa', 'celular_empresa', 'cidade', 'estado', 'cep', 'password'
        /*'nome_usuario', 'cpf', 'email_usuario', 'telefone_usuario', 'celular_usuario', 'genero', 'password'*/
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function grupos(){
        return $this -> hasMany('App\Grupo', 'empresa_id_empresa', 'id_empresa');
    }

    public function sensores(){
        return $this -> hasMany('App\Sensor', 'empresa_id_empresa');
    }

    public function responsaveis(){
        return $this -> hasMany('App\Responsavel', 'empresa_id_empresa', 'id_empresa');
    }

}
