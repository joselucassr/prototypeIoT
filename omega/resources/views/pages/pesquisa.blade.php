@extends('layouts.navbar')

@section('content')
    <div class="container col-12" style="padding-bottom: 50px; margin-top: 50px">
        <h1 class="text-center">Pesquisa</h1>
        <div class="row mx-auto" style="padding: 0; margin-top: 30px">

            <form class="col-md-6 col-sm-10 mx-auto" action="/pesquisar" method="POST" role="search">
                {{ csrf_field() }}
                <div class="input-group">
                    <input type="text" class="form-control" name="pesquisa" placeholder="Procurar Sensores">
                    <span class="input-group-btn ">
                    <button type="submit" class="btn btn-outline-primary">
                        <i class="fas fa-search"></i>
                    </button>
                </span>
                </div>

                @if(Auth::guard('web') -> check())
                    <input type="hidden" value="{{auth()  -> user() -> id_empresa}}" name="id_empresa">
                @endif

                @if(Auth::guard('responsavel') -> check())
                    <input type="hidden" value="{{auth()  -> user() -> empresa_id_empresa}}" name="id_empresa">
                @endif
            </form>

            @if (isset($details))
                <div class="col-12" style="margin-top: 20px">
                    <div class="col-12">
                        <p> Os resultados para a pesquisa <b> {{ $query }} </b> são :</p>
                        <h2>Sensores encontrados</h2>
                        <table class="table table-striped text-center">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Acessar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($details as $sensor)
                                <tr>
                                    <td>{{$sensor->id_sensor}}</td>
                                    <td>{{$sensor->nome_sensor}}</td>
                                    <td><a class="gray-link" href="/sensor/{{$sensor -> id_sensor}}"><i class="fas fa-sign-in-alt"></i></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            @endif
        </div>
    </div>
@endsection
