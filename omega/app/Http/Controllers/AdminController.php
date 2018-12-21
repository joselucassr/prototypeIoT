<?php

namespace App\Http\Controllers;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        return ('admin.index');
    }
}
