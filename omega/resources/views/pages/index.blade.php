@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-6 col-sm-10 mx-auto formCard">
        <h1 class="col-12">Login</h1>
        <form method="POST" action="{{ route('login') }}">
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
            <div class="row" style="padding-bottom: 15px">
                <div class="col-6">
                    <a href="/cadastro" class="btn btn-outline-success float-left">Registrar</a>
                </div>
                <div class="col-6"  >
                    <button type="submit" class="btn btn-outline-primary float-right">Login</button>
                </div>
            </div>
        </form>
        <a class="text-left" href="{{ route('password.request') }}">
            Esqueceu a senha?
        </a>
    </div>
</div>
@endsection
