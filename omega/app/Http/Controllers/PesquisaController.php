<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sensor;

class PesquisaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:web,responsavel');
    }


    public function pesquisa()
    {
        return view('pages.pesquisa');
    }

    public function pesquisar(Request $request)
    {

        $pesquisa = $request -> input('pesquisa');
        $id_empresa = $request -> input('id_empresa');


        if (auth() -> user() -> id_empresa == $id_empresa or auth() -> user() -> empresa_id_empresa == $id_empresa){
            if ($pesquisa != ''){
                $sensor = Sensor::where('id_sensor','LIKE','%'.$pesquisa.'%') -> where('empresa_id_empresa', $id_empresa) /* ->orWhere('nome_sensor','LIKE','%'.$pesquisa.'%') -> where('empresa_id_empresa', $id_empresa) */ -> get();
                if(count($sensor) > 0) {
                    return view('pages.pesquisa') -> withDetails($sensor) -> withQuery($pesquisa);
                } else{
                    return redirect('/pesquisa')
                        -> with('erro_resultados', 'Não foram encontrados resultados para:')
                        -> with('erro_resultados_corpo', $pesquisa);
                }
            } else {
                return redirect('/pesquisa') -> with('erro_resultados', 'Digite algo no campo abaixo!');
            }

        }else{
            return redirect('/grupos') -> with('error', 'Página não autorizada');
        }
    }
}
