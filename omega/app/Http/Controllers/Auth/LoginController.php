<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/grupos/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:responsavel')->except('logout');
    }

    public function username()
    {
        return 'email_empresa';
    }

    public function showLoginForm()
    {
        return view('pages.loginEmpresa');
    }

    public function showResponsavelLoginForm()
    {
        return view('pages.index');
    }

    public function responsavelLogin(Request $request)
    {
        $this->validate($request, [
            'email_responsavel'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt(['email_responsavel' => $request->email_responsavel, 'password' => $request->password])) {

            return redirect()->intended('/grupos');
        }
        return back()->withInput($request->only('email_responsavel'));
    }
}
