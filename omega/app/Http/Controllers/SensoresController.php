<?php

namespace App\Http\Controllers;

use App\Grupo;
use App\Sensor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SensoresController extends Controller
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
    public function index($id)
    {
        $grupo = Grupo::find($id);

        $dados = Sensor::with('dados') -> get();

        // Check for correct user
        if (auth() -> user() -> id !== $grupo -> user_id){
            return redirect('/grupos') -> with('error', 'Página não autorizada');
        }

        return view('sensores.index') -> with( 'data', ['sensores' => $grupo -> sensores, 'id' => $id, 'dados' => $dados]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $grupo = Grupo::find($id);
        // Check for correct user
        if (auth() -> user() -> id !== $grupo -> user_id){
            return redirect('/grupos') -> with('error', 'Página não autorizada');
        }

        return view('sensores.adicionarSensor') -> with('id', $id);
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

        // Criar Sensor
        $sensor = new Sensor;
        $sensor -> nome = $request -> input('nome');
        $sensor -> id = $request -> input('id');
        $sensor -> tempmax = $request -> input('tempmax');
        $sensor -> tempmin = $request -> input('tempmin');
        $sensor -> obs = $request -> input('obs');
        $sensor -> grupo_id = $request -> input('grupo_id');
        $sensor -> save();

        $id = $sensor -> grupo_id = $request -> input('grupo_id');

        return redirect('/sensores/'.$id) -> with('success', 'Sensor criado');
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
        $sensor = Sensor::find($id);

        $grupo_id = $sensor -> grupo_id;
        $grupo = Grupo::find($grupo_id);
        // Check for correct user
        if (auth() -> user() -> id !== $grupo -> user_id){
            return redirect('/grupos') -> with('error', 'Página não autorizada');
        }

        return view('sensores.configurarSensor') -> with('sensor', $sensor);
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

        // Atualizar Sensor
        $sensor = Sensor::find($id);
        $sensor -> nome = $request -> input('nome');
        $sensor -> id = $request -> input('id');
        $sensor -> tempmax = $request -> input('tempmax');
        $sensor -> tempmin = $request -> input('tempmin');
        $sensor -> obs = $request -> input('obs');
        $sensor -> grupo_id = $request -> input('grupo_id');
        $sensor -> save();

        $id = $sensor -> grupo_id = $request -> input('grupo_id');

        return redirect('/sensores/'.$id) -> with('success', 'Página não autorizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $sensor = Sensor::find($id);

        $grupo_id = $sensor -> grupo_id;
        $grupo = Grupo::find($grupo_id);
        // Check for correct user
        if (auth() -> user() -> id !== $grupo -> user_id){
            return redirect('/grupos') -> with('error', 'Página não autorizada');
        }

        $sensor -> delete();

        $id = $sensor -> grupo_id = $request -> input('grupo_id');

        return redirect('/sensores/'.$id) -> with ('success', 'Grupo Apagado');
    }
}
