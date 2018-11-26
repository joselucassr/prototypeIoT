@extends('layouts.app')

@section('navbar')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Projeto Omega</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/grupos">Painel Geral<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Relatório</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/editarcadastro">Meus Dados</a>
            </li>
        </ul>
        <div class="float-right row" style="padding-right: 20px">
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar sensor">
                <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Pesquisar</button>
            </form>
            <ul class="navbar-nav mr-auto">

                <!-- Authentication Links -->
                @if (Auth::guest())
                @else
                    <li>
                        <a href="#" class="nav-link">
                            Usuário: {{ Auth::user()->nome_empresa }}
                        </a>
                    </li>
                     <li>
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
@endsection