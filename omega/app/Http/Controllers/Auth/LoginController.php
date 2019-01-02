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
        $this->middleware('guest:admin')->except('logout');
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $errors = [$this->username() => trans('Dados Incorretos')];

        if ($request->expectsJson()) {
            return response()->json($errors, 422);
        }

        return redirect()->back()
            ->withErrors($errors);
    }

    public function username()
    {
        return 'email';
    }

    public function showLoginForm()
    {
        return view('pages.loginEmpresa');
    }


    public function showResponsavelLoginForm()
    {
        return view('pages.index');
    }

    protected function attemptLogin(Request $request)
    {
        $userAttemptWeb = Auth::guard('web')->attempt(
            $this->credentials($request), $request->has('remember')
        );

        $userAttemptResponsavel = Auth::guard('responsavel')->attempt(
            $this->credentials($request), $request->has('remember')
        );

        $userAttemptAdmin = Auth::guard('admin')->attempt(
            $this->credentials($request), $request->has('remember')
        );

        if ($userAttemptResponsavel){
            return $userAttemptResponsavel;
        }

        if ($userAttemptWeb){
            return $userAttemptWeb;
        }

        if ($userAttemptAdmin){
            return $userAttemptAdmin;
        }
    }

    public function authenticate(Request $request)
    {
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {

            return redirect()->intended('/grupos');

        }elseif (Auth::guard('responsavel')->attempt(['email' => $request->email, 'password' => $request->password])){

            return redirect()->intended('/grupos');

        }elseif (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {

            return redirect()->intended('/admin');
        }
        return back()->withInput($request->only('email'));
    }
}
