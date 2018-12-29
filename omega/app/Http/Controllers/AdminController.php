<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $usuarios = User::all();
        return view('admin.index') -> with('usuarios', $usuarios);
    }
}
