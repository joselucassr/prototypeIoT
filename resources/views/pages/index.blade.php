@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-6 mx-auto formCard">
        <h1 class="col-12">Login</h1>
        <form method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label>Email</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Digite o email">

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label>Senha</label>
                <input id="password" type="password" class="form-control" name="senha" required placeholder="Senha">

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Lembrar senha
                        </label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
            <a href="/cadastro" class="btn btn-success float-right">Registrar</a>
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    Esqueceu a senha?
                </a>
        </form>
    </div>
</div>
@endsection
