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

    public function sensores(){
        return view('pages.sensores');
    }

    public function sensor(){
        return view('pages.sensor');
    }
}
