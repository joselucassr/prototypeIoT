@extends('layouts.navbar')

@section('content')
    <div class="container col-12" style="padding-bottom: 50px">
        <div class="row float-right especifico" style="font-size: 30px; color: rgba(0,0,0,.50); margin-top: 20px; margin-bottom: 30px">
            @if(Auth::guard('web') -> check())
                <div class="col-2" style="margin-right: 15px">
                    <a href="/sensores/{{$data['grupo'] -> id_grupo}}/create" class="gray-link"><i class="fas fa-plus"></i></a>
                </div>
            @endif
            <div class="col-2">
                <a href="/sensores/{{$data['grupo'] -> id_grupo}}" class="gray-link"><i class="fas fa-table"></i></a>
            </div>
        </div>
        <div class="row col-12 mx-auto" style="padding: 0;">
        @if (count($data['sensores']) > 0)
                <div class="col-12" style="margin-top: 20px">
                    <div class="col-12">
                        <table class="table table-striped text-center table-responsive-lg">
                            <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Temperatura</th>
                                <th scope="col">Bateria</th>
                                <th scope="col">Última Atualização</th>
                                <th scope="col">Configurar</th>
                                <th scope="col">Detalhar</th>
                            </tr>
                            </thead>
                            <tbody>
            @foreach ($data['sensores'] as $sensor)
                <tr>
                    <td>{{$sensor -> nome_sensor}}</td>
                    <td>{{$sensor -> temperatura}} °C</td>
                    <td>{{$sensor -> bateria}}%</td>
                    <td>{{$sensor -> updated_at}}</td>
                    <td><a href="/sensor/{{$sensor -> id_sensor}}/edit" class="gray-link" style="font-size: 20px;"><i class="fas fa-cog"></i></a></td>
                    <td><a href="/sensor/{{$sensor->id_sensor}}" class="gray-link"><i class="fas fa-arrow-right"></i></a></td>
                </tr>
                @endforeach
            @else
                <div class="alert alert-info col-12 text-center mx-auto" role="alert">
                    Você não possui nenhum sensor, clique  <a href="/sensores/{{$data['id_sensor']}}/create" class="alert-link">aqui</a> para adicionar um.
                </div>
            @endif
        </div>
    </div>
@endsection
