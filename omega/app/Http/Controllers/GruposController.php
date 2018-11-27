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
        $user_id = auth() -> user() -> id;
        $user = User::find($user_id);
        return view('grupos.index') -> with('grupos', $user -> grupos);
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
        $grupo -> nome = $request -> input('nome');
        $grupo -> obs = $request -> input('obs');
        $grupo -> user_id = auth() -> user() -> id;
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
        $grupo -> delete();
        return redirect('/grupos') -> with ('success', 'Grupo Apagado');
    }
}
