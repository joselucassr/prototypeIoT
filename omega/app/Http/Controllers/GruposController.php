<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Grupo;

class GruposController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth() -> user() -> id_empresa;
        $user = User::find($user_id);
        return view('grupos.index') -> with('grupos', $user -> grupos);
    }

    /**
     * Esse vai mostrar os grupos só que em lista
     * */

    public function gruposlista()
    {
        $user_id = auth() -> user() -> id;
        $user = User::find($user_id);
        return view('grupos.grupoLista') -> with('grupos', $user -> grupos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('grupos.adicionarGrupo');
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
            'nome' => 'required'
        ]);

        // Criar Grupo
        $grupo = new Grupo;
        $grupo -> nome_grupo = $request -> input('nome');
        $grupo -> descricao_grupo = $request -> input('obs');
        $grupo -> empresa_id_empresa = auth() -> user() -> id_empresa;
        $grupo -> save();

        return redirect('/grupos') -> with('success', 'Grupo criado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Grupo::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grupo = Grupo::find($id);

        // Check for correct user
        if (auth() -> user() -> id !== $grupo -> user_id){
            return redirect('/grupos') -> with('error', 'Página não autorizada');
        }
            return view('grupos.editarGrupo') -> with('grupo', $grupo);
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
            'nome' => 'required'
        ]);

        // Criar Grupo
        $grupo = Grupo::find($id);
        $grupo -> nome = $request -> input('nome');
        $grupo -> obs = $request -> input('obs');
        $grupo -> save();

        return redirect('/grupos') -> with('success', 'Grupo Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grupo = Grupo::find($id);

        // Check for correct user
        if (auth() -> user() -> id !== $grupo -> user_id){
            return redirect('/grupos') -> with('error', 'Página não autorizada');
        }

        $grupo -> delete();
        return redirect('/grupos') -> with ('success', 'Grupo Apagado');
    }
}
