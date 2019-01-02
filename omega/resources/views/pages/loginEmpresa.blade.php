@extends('layouts.app')

@section('content')
    <div class="card">

        <div class="card-body " style="padding-top: 100px; border-color: #ffffff;">
            <h1 class="card-title text-center" style="margin-top: 60px;">Login</h1>
            <div class="col-md-6 col-md-6 mx-auto" style="margin-top: 60px;">
                <form method="POST" action="{{ route('login') }}" >
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Email</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Digite o email">
                    </div>
                    <div class="form-group">
                        <label>Senha</label>
                        <input id="password" type="password" class="form-control" name="password" required placeholder="Senha">
                    </div>
                    <button type="submit" class="btn btn-info float-right">Login</button>
                </form>
                {{--
                <div class="">
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        Esqueceu a senha?
                    </a>
                </div>
                --}}
            </div>

        </div>
    </div>

@endsection
