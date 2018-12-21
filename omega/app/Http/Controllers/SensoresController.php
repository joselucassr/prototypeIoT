<?php

namespace App\Http\Controllers;

use App\Grupo;
use App\Sensor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SensoresController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $grupo = Grupo::find($id);

        // Check for correct user
        if (auth() -> user() -> id_empresa !== $grupo -> empresa_id_empresa){
            /* if (auth() -> user() -> empresa_id_empresa !== $grupo -> empresa_id_empresa){ */
                return redirect('/grupos') -> with('error', 'Página não autorizada');
            //}
        }

        return view('sensores.index') -> with( 'data', ['sensores' => $grupo -> sensores, 'grupo' => $grupo]);

    }

    /**
     * Esse deve mostrar os sensores em lista
     */

    public function sensoreslista($id)
    {
        $grupo = Grupo::find($id);

        // Check for correct user
        if (auth() -> user() -> id_empresa !== $grupo -> empresa_id_empresa){
            /* if (auth() -> user() -> empresa_id_empresa !== $grupo -> empresa_id_empresa){ */
            return redirect('/grupos') -> with('error', 'Página não autorizada');
            //}
        }

        return view('sensores.sensoresLista') -> with( 'data', ['sensores' => $grupo -> sensores, 'grupo' => $grupo]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
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
            'nome_sensor' => 'required'
        ]);

        // Criar Sensor
        $sensor = new Sensor;
        $sensor -> empresa_id_empresa = auth() -> user() -> id_empresa;
        $sensor -> grupo_id_grupo = $request -> input('grupo_id_grupo');
        $sensor -> nome_sensor = $request -> input('nome_sensor');
        $sensor -> id_sensor = $request -> input('id_sensor');
        $sensor -> tempmax = $request -> input('tempmax');
        $sensor -> tempmin = $request -> input('tempmin');
        $sensor -> obs = $request -> input('obs');
        $sensor -> save();

        $id = $sensor -> grupo_id_grupo = $request -> input('grupo_id_grupo');

        return redirect('/sensores/'.$id) -> with('success', 'Sensor criado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Sensor $sensor)
    {
        // Check for correct user
        if (auth() -> user() -> id_empresa !== $sensor -> empresa_id_empresa){
            /* if (auth() -> user() -> empresa_id_empresa !== $sensor -> empresa_id_empresa){ */
            return redirect('/grupos') -> with('error', 'Página não autorizada');
            //}
        }


        return view('sensores.sensor') -> with('sensor', $sensor);
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

        // Check for correct user
        if (auth() -> user() -> id_empresa !== $sensor -> empresa_id_empresa){
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
            'nome_sensor' => 'required'
        ]);

        // Atualizar Sensor
        $sensor = Sensor::find($id);

        // Check for correct user
        if (auth() -> user() -> id_empresa !== $sensor -> empresa_id_empresa){
            /* if (auth() -> user() -> empresa_id_empresa !== $sensor -> empresa_id_empresa){ */
            return redirect('/grupos') -> with('error', 'Página não autorizada');
            //}
        }

        $sensor -> empresa_id_empresa = auth() -> user() -> id_empresa;
        $sensor -> grupo_id_grupo = $sensor -> grupo_id_grupo;
        $sensor -> nome_sensor = $request -> input('nome_sensor');
        $sensor -> id_sensor = $request -> input('id_sensor');
        $sensor -> tempmax = $request -> input('tempmax');
        $sensor -> tempmin = $request -> input('tempmin');
        $sensor -> obs = $request -> input('obs');
        $sensor -> save();

        return redirect('/sensores/'.$sensor -> grupo_id_grupo) -> with('success', 'Sensor Modificado');
    }

    /*
     * Essa função é tipo a de cima mas para um único sensor apenas
     */

    public function updateSensor(Request $request, $id)
    {

        // Atualizar Sensor
        $sensor = Sensor::find($id);

        // Check for correct user
        if (auth() -> user() -> id_empresa !== $sensor -> empresa_id_empresa){
            /* if (auth() -> user() -> empresa_id_empresa !== $sensor -> empresa_id_empresa){ */
            return redirect('/grupos') -> with('error', 'Página não autorizada');
            //}
        }

        $sensor -> obs = $request -> input('obs');
        $sensor -> save();

        return Redirect::back() -> with('success', 'Sensor Modificado');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sensor = Sensor::find($id);

        // Check for correct user
        if (auth() -> user() -> id_empresa !== $sensor -> empresa_id_empresa){
            /* if (auth() -> user() -> empresa_id_empresa !== $sensor -> empresa_id_empresa){ */
            return redirect('/grupos') -> with('error', 'Página não autorizada');
            //}
        }

        $sensor -> delete();


        return redirect('/sensores/'.$sensor -> grupo_id_grupo) -> with ('success', 'Grupo Apagado');
    }
}
