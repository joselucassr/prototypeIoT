<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/grupos/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [

            // EMPRESA
            'nome_empresa' => 'required|string|max:255',
            'cnpj' => 'required|string|max:20|unique:empresa',
            'email_empresa' => 'required|string|max:255|unique:empresa',
            'telefone_empresa' => 'required|string|max:15|unique:empresa',
            'celular_empresa' => 'string|max:15|unique:empresa',
            'cidade' => 'required|string|max:255',
            'estado' => 'required|string|max:2',
            'cep' => 'required|string|max:13',
            'password' => 'required|string|min:6|confirmed'

            /*
            // RESPONSÁVEL
            'nome_usuario' => 'required|string|max:255|unique:users',
            'cpf' => 'required|string|max:14|unique:users',
            'email_usuario' => 'required|string|email|max:255|unique:users',
            'telefone_usuario' => 'required|string|max:15|unique:users',
            'celular_usuario' => 'required|string|max:15|unique:users',
            'genero' => 'required|string|max:11',
            'password' => 'required|string|min:6|confirmed',
            */
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([

            'nome_empresa' => $data['nome_empresa'],
            'cnpj' => $data['cnpj'],
            'email_empresa' => $data['email_empresa'],
            'telefone_empresa' => $data['telefone_empresa'],
            'celular_empresa' => $data['celular_empresa'],
            'cidade' => $data['cidade'],
            'estado' => $data['estado'],
            'cep' => $data['cep'],
            'password' => bcrypt($data['password'])

            /*
            'nome_usuario' => $data['nome_usuario'],
            'cpf' => $data['cpf'],
            'email_usuario' => $data['email_usuario'],
            'telefone_usuario' => $data['telefone_usuario'],
            'celular_usuario' => $data['celular_usuario'],
            'genero' => $data['genero'],
            'password' => bcrypt($data['password']),
            */
        ]);
    }
}
