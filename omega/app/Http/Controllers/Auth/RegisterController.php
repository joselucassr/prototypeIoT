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
            'cnpj' => 'required|string|max:20|unique:users',
            'email_empresa' => 'required|string|max:255|unique:users',
            'telefone_1_empresa' => 'required|string|max:15|unique:users',
            'telefone_2_empresa' => 'string|max:15|unique:users',
            'cidade' => 'required|string|max:255',
            'estado' => 'required|string|max:2',
            'cep' => 'required|string|max:13',
            // RESPONSÁVEL
            'nome_responsavel' => 'required|string|max:255|unique:users',
            'cpf' => 'required|string|max:14|unique:users',
            'email_responsavel' => 'required|string|email|max:255|unique:users',
            'telefone_responsavel' => 'required|string|max:15|unique:users',
            'celular_responsavel' => 'required|string|max:15|unique:users',
            'genero' => 'required|string|max:11',
            'password' => 'required|string|min:6|confirmed',
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
            'telefone_1_empresa' => $data['telefone_1_empresa'],
            'telefone_2_empresa' => $data['telefone_2_empresa'],
            'cidade' => $data['cidade'],
            'estado' => $data['estado'],
            'cep' => $data['cep'],
            'nome_responsavel' => $data['nome_responsavel'],
            'cpf' => $data['cpf'],
            'email_responsavel' => $data['email_responsavel'],
            'telefone_responsavel' => $data['telefone_responsavel'],
            'celular_responsavel' => $data['celular_responsavel'],
            'genero' => $data['genero'],
            'password' => bcrypt($data['password']),
        ]);
    }
}