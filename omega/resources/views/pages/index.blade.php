@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-12 ">
        <a href="login-empresa" class="btn btn-outline-info float-right ">Login Empresa</a>
    </div>

    <div class="col-md-6 col-sm-10 mx-auto formCard">
        <h1 class="col-12">Login</h1>
        <form method="POST" action="/login-responsavel">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('email_responsavel') ? ' has-error' : '' }}">
                <label>Email</label>
                <input id="email" type="email" class="form-control" name="email_responsavel" value="{{ old('email_responsavel') }}" required autofocus placeholder="Digite o email">

                @if ($errors->has('email_responsavel'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email_responsavel') }}</strong>
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
            <button type="submit" class="btn btn-primary float-right">Login</button>
            <a href="/cadastro" class="btn btn-success float-left">Registrar</a>
        </form>
        <div class="">
            <a class="btn btn-link" href="{{ route('password.request') }}">
                Esqueceu a senha?
            </a>
        </div>
    </div>
</div>
@endsection
