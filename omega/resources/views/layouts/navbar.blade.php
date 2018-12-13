@extends('layouts.app')

@section('navbar')
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #fff; border-bottom: 1px solid rgba(0,0,0,0.25)">
    <a class="navbar-brand" href="/grupos">Projeto Omega</a>
    @if (!Auth::guest())
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
                    <a class="nav-link" href="/cadastro/edit">Meus Dados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/pesquisa">Pesquisar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/responsavel">Meus Usuários</a>
                </li>
            </ul>
            <div class="float-right row" style="padding-right: 20px">
                <ul class="navbar-nav mr-auto">

                    <!-- Authentication Links -->
                    @if (Auth::guest())
                    @else
                         <li>
                            <a class="btn btn-outline-danger" style="border: none" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                <i class="fas fa-power-off"></i>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    @endif
</nav>
@endsection