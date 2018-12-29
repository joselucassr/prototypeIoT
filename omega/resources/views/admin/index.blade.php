@extends ('layouts.app')
@section('content')

    <nav class="navbar navbar-light bg-light" style="margin-bottom: 20px">
        <a class="navbar-brand">Projeto Omega</a>
        <div class="row">
            <div class="col-8">
                <form class="form-inline">
                    <a class="btn btn-outline-info" href="/cadastro" type="link" style="border-radius: 100px"><i class="fas fa-user"></i>Cadastrar Usuário</a>
                </form>
            </div>
            <div class="col-4">
                <a class="btn btn-outline-danger" style="border: none" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                    <i class="fas fa-power-off"></i>
                </a>
            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
    </nav>

    {{-- Conteúdo --}}
    <div class="container col-12" style="padding-bottom: 50px">
        <h1 class="text-center">Usuários</h1>
        <div class="row col-12 mx-auto" style="padding: 0;">
            @if (count($usuarios) > 0)
                <div class="col-12" style="margin-top: 20px">
                    <div class="col-12">
                        <table class="table table-striped text-center table-responsive-lg">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">CNPJ</th>
                                <th scope="col">Email</th>
                                <th scope="col">Telefone</th>
                                <th scope="col">Celular</th>
                                <th scope="col">Cidade</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($usuarios as $usuario)
                                <tr>
                                    <th scope="col">{{$usuario -> id_empresa}}</th>
                                    <th scope="col">{{$usuario -> nome_empresa}}</th>
                                    <th scope="col">{{$usuario -> cnpj}}</th>
                                    <th scope="col">{{$usuario -> email_empresa}}</th>
                                    <th scope="col">{{$usuario -> telefone_empresa}}</th>
                                    <th scope="col">{{$usuario -> celular_empresa}}</th>
                                    <th scope="col">{{$usuario -> cidade}} ({{$usuario -> estado}})</th>
                                </tr>
                            @endforeach
                            @else
                                <div class="alert alert-info col-12 text-center mx-auto" role="alert">
                                    Você não possui nenhum usuário, clique <a href="/cadastro" class="alert-link">aqui</a> para adicionar um.
                                </div>
                        @endif
                    </div>
                </div>
@endsection