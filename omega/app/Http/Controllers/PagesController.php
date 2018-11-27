<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
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

}
