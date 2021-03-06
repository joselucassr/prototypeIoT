<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Sensor;
use App\User;
use Illuminate\Http\Request;
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
        $this->middleware('auth:web,responsavel');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (Auth::guard('web') -> check()) {
            $user = User::find(auth()->user()->id_empresa);
        }elseif (Auth::guard('responsavel') -> check()){
            $user = User::find(auth() -> user() -> empresa_id_empresa);
        }

        return view('grupos.index') -> with('grupos', $user -> grupos);
    }

    /**
     * Esse vai mostrar os grupos só que em lista
     * */

    public function gruposlista()
    {
        if (Auth::guard('web') -> check()) {
            $user = User::find(auth()->user()->id_empresa);
        }elseif (Auth::guard('responsavel') -> check()){
            $user = User::find(auth() -> user() -> empresa_id_empresa);
        }
        return view('grupos.grupoLista') -> with('grupos', $user -> grupos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Check for correct user
        /*
        if (Auth::guard('web') -> check() or Auth::guard('responsavel') -> check()){
            return view('grupos.adicionarGrupo');
        }
        */
        if (Auth::guard('web') -> check()){
            return view('grupos.adicionarGrupo');
        }
        return redirect('/grupos') -> with('error', 'Página não autorizada');

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
            'nome_grupo' => 'required'
        ]);

        // Criar Grupo
        $grupo = new Grupo;
        $grupo -> nome_grupo = $request -> input('nome_grupo');
        $grupo -> descricao_grupo = $request -> input('descricao_grupo');
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
    public function edit(Grupo $grupo)
    {

        // Check for correct user
        if (auth() -> user() -> id_empresa !== $grupo -> empresa_id_empresa){
            //if (auth() -> user() -> empresa_id_empresa !== $grupo -> empresa_id_empresa){
                return redirect('/grupos') -> with('error', 'Página não autorizada');
            //}
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
            'nome_grupo' => 'required'
        ]);

        // Editar Grupo
        $grupo = Grupo::find($id);
        $grupo -> nome_grupo = $request -> input('nome_grupo');
        $grupo -> descricao_grupo = $request -> input('descricao_grupo');
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
        $sensor = Sensor::where('grupo_id_grupo', 'LIKE', '%'.$grupo -> id_grupo.'%');
        // Check for correct user
        if (auth() -> user() -> id_empresa !== $grupo -> empresa_id_empresa){
            //if (auth() -> user() -> empresa_id_empresa !== $grupo -> empresa_id_empresa){
                return redirect('/grupos') -> with('error', 'Página não autorizada');
            //}
        }

        $grupo -> delete();
        $sensor -> delete();
        return redirect('/grupos') -> with ('success', 'Grupo Apagado');
    }
}
