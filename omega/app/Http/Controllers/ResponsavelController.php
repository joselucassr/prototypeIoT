<?php

namespace App\Http\Controllers;

use App\Responsavel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class ResponsavelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresa = User::find(auth() -> user() -> id_empresa);

        return view('pages.responsavel.responsavel') -> with( 'data', ['responsavel' => $empresa -> responsaveis, 'empresa' => $empresa]);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.responsavel.cadastroResponsavel');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this -> validate($request, [
            'nome_responsavel' => 'required|string|max:255',
            'cpf' => 'required|string|max:16',
            'email_responsavel' => 'required|string|max:255',
            'telefone_responsavel' => 'required|string|max:15',
            'celular_responsavel' => 'required|string|max:18',
            'genero' => 'required|string|max:10',
            'password' => 'required|string|min:6|confirmed',
        ]);


        // Criar responsavel
        $responsavel = new Responsavel;
        $responsavel -> nome_responsavel = $request -> input('nome_responsavel');
        $responsavel -> empresa_id_empresa = auth() -> user() -> id_empresa;
        $responsavel -> cpf = $request -> input('cpf');
        $responsavel -> email_responsavel = $request -> input('email_responsavel');
        $responsavel -> telefone_responsavel = $request -> input('telefone_responsavel');
        $responsavel -> celular_responsavel = $request -> input('celular_responsavel');
        $responsavel -> genero = $request -> input('genero');
        $responsavel -> password = bcrypt($request -> input('password'));
        $responsavel -> save();

        return redirect('/responsavel') -> with('success', 'Novo usuário criado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $responsavel = Responsavel::find($id);

        return view('pages.responsavel.editarResponsavel') -> with('responsavel', $responsavel);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this -> validate($request, [
            'nome_responsavel' => 'required|string|max:255',
            'cpf' => 'required|string|max:16',
            'email_responsavel' => 'required|string|max:255',
            'telefone_responsavel' => 'required|string|max:15',
            'celular_responsavel' => 'required|string|max:18',
            'genero' => 'required|string|max:10',
            'password' => 'required|string|min:6|confirmed',
        ]);


        // Atualizar responsavel
        $responsavel = Responsavel::find($id);
        $responsavel -> nome_responsavel = $request -> input('nome_responsavel');
        $responsavel -> cpf = $request -> input('cpf');
        $responsavel -> email_responsavel = $request -> input('email_responsavel');
        $responsavel -> telefone_responsavel = $request -> input('telefone_responsavel');
        $responsavel -> celular_responsavel = $request -> input('celular_responsavel');
        $responsavel -> genero = $request -> input('genero');
        $responsavel -> password = bcrypt($request -> input('password'));
        $responsavel -> save();

        return redirect('/responsavel') -> with('success', 'Usuário atualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $responsavel = Responsavel::find($id);

        $responsavel -> delete();

        return redirect('/responsavel') -> with ('success', 'Usuário Apagado');
    }
}
