<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class PagesController extends Controller
{
    public function index(){
        if (auth() -> user()){
            return redirect('/grupos');
        }
        return view('pages.index');
    }

    public function sensores(){
        return view('pages.sensores');
    }

    public function cadastro(){
        return view('pages.cadastro');
    }

    /*
     * Esses são para editar o cadastro
     */

    public function edit()
    {
        return view('pages.editarCadastro');
    }

    protected function update(Request $request)
    {

        $user = User::find(auth() -> user() -> id_empresa);
        $user -> nome_empresa = $request -> input('nome_empresa');
        $user -> cnpj = $request -> input('cnpj');
        $user -> email_empresa = $request -> input('email_empresa');
        $user -> telefone_empresa = $request -> input('telefone_1_empresa');
        $user -> celular_empresa = $request -> input('celular_empresa');
        $user -> cidade = $request -> input('cidade');
        $user -> estado = $request -> input('estado');
        $user -> cep = $request -> input('cep');
        /*
        $user -> nome_usuario = $request -> input('nome_usuario');
        $user -> cpf = $request -> input('cpf');
        $user -> email_usuario = $request -> input('email_usuario');
        $user -> telefone_usuario = $request -> input('telefone_usuario');
        $user -> celular_usuario = $request -> input('celular_usuario');
        $user -> genero = $request -> input('genero');
        */
        $user -> save();

        return redirect('/cadastro/edit') -> with('success', 'Cadastro Atualizado');
    }

}
