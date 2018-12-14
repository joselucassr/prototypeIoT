@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link " href="/">Usuários</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="login-empresa">Empresa</a>
                </li>
            </ul>
        </div>
        <div class="card-body ">
            <h1 class="card-title text-center" style="margin-top: 60px;">Login</h1>
            <div class="col-md-6 col-md-6 mx-auto" style="margin-top: 60px;">
                <form method="POST" action="{{ route('login') }}" >
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('email_empresa') ? ' has-error' : '' }}">
                        <label>Email</label>
                        <input id="email" type="email" class="form-control" name="email_empresa" value="{{ old('email_empresa') }}" required autofocus placeholder="Digite o email">

                        @if ($errors->has('email_empresa'))
                            <span class="help-block">
                            <strong>{{ $errors->first('email_empresa') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label>Senha</label>
                        <input id="password" type="password" class="form-control" name="password" required placeholder="Senha">

                        @if ($errors->has('password'))
                            <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-success float-right">Login</button>
                    <a href="/cadastro" class="btn btn-info float-left">Registrar</a>
                </form>
                <div class="">
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        Esqueceu a senha?
                    </a>
                </div>
            </div>

        </div>
    </div>

@endsection
