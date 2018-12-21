@extends ('layouts.app')
@section('content')

    <nav class="navbar navbar-light bg-light" style="background-color: none;">
        <a class="navbar-brand">Projeto Omega</a>
        <form class="form-inline">
            <a class="btn btn-outline-info" href="login-empresa" type="link" style="border-radius: 100px"><i class="fas fa-user"></i> Entrar</a>
        </form>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </nav>
@endsection