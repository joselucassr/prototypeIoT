<?php

namespace App\Http\Controllers;

use App\Sensor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;

class PagesController extends Controller
{
    public function index(){
        if (auth() -> user()){
            return redirect('/grupos');
        }
        return view('pages.index');
    }

    public function painelgeral(){
        return view('pages.painelgeral');
    }


    public function sensor(){
        return view('pages.sensor');
    }

    public function sensores(){
        return view('pages.sensores');
    }

    public function cadastro(){
        return view('pages.cadastro');
    }

    public function editarCadastro(){
        return view('pages.editarCadastro');
    }

    public function editarGrupo(){
        return view('pages.editarGrupo');
    }

    public function adicionarGrupo(){
        return view('pages.adicionarGrupo');
    }

    public function configurarSensor(){
        return view('pages.configurarSensor');
    }

    public function adicionarSensor(){
        return view('pages.adicionarSensor');
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

        $user = User::find(auth() -> user() -> id);
        $user -> nome_empresa = $request -> input('nome_empresa');
        $user -> cnpj = $request -> input('cnpj');
        $user -> email_empresa = $request -> input('email_empresa');
        $user -> telefone_1_empresa = $request -> input('telefone_1_empresa');
        $user -> telefone_2_empresa = $request -> input('telefone_2_empresa');
        $user -> cidade = $request -> input('cidade');
        $user -> estado = $request -> input('estado');
        $user -> cep = $request -> input('cep');
        $user -> nome_responsavel = $request -> input('nome_responsavel');
        $user -> cpf = $request -> input('cpf');
        $user -> email_responsavel = $request -> input('email_responsavel');
        $user -> telefone_responsavel = $request -> input('telefone_responsavel');
        $user -> celular_responsavel = $request -> input('celular_responsavel');
        $user -> genero = $request -> input('genero');
        $user -> save();

        return redirect('/cadastro/edit') -> with('success', 'Cadastro Atualizado');
    }

    /*
     * Funções Para a pesquisa
     */

    public function pesquisa()
    {
        return view('pages.pesquisa');
    }

    public function pesquisar()
    {
        $pesquisa = Input::get('pesquisa');
        $user_id = Input::get('user_id');

        if (auth() -> user() -> id == $user_id){
            if ($pesquisa != ""){
                $sensor = Sensor::where('id','LIKE','%'.$pesquisa.'%') -> where('user_id', $user_id) ->orWhere('nome','LIKE','%'.$pesquisa.'%') -> where('user_id', $user_id) -> get();
                if(count($sensor) > 0)
                    return view('pages.pesquisa') -> withDetails($sensor) -> withQuery($pesquisa);
            }
            else return view ('pages.pesquisa')->with('error', 'Não foram encontrados resultados!');
        }else{
            return redirect('/grupos') -> with('error', 'Página não autorizada');
        }
    }

}
