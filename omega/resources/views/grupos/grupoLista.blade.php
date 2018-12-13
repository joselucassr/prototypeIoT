@extends('layouts.navbar')

@section('content')
    <div class="container col-12" style="padding-bottom: 50px; margin-top: 20px">
        <h1 class="text-center">Painel Geral</h1>
        <div class="row float-right especifico" style="font-size: 30px; color: rgba(0,0,0,.50); margin-top: 20px; margin-bottom: 30px">
            <div class="col-2" style="margin-right: 15px">
                <a href="/grupos/create" class="gray-link"><i class="fas fa-plus"></i></a>
            </div>
            <div class="col-2">
                <a href="/grupos" class="gray-link"><i class="fas fa-table"></i></a>
            </div>
        </div>
        <div class="row col-12 mx-auto" style="padding: 0;">
        @if (count($grupos) > 0)
                <div class="col-12" style="margin-top: 20px">
                    <div class="col-12">
                        <table class="table table-striped text-center table-responsive-lg">
                            <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Dias de Monitoramento</th>
                                <th scope="col">Notificações Enviadas</th>
                                <th scope="col">Bateria(s) Fraca(s)</th>
                                <th scope="col">Alertas</th>
                                <th scope="col">Status</th>
                                <th scope="col">Configurar</th>
                                <th scope="col">Sensores</th>
                            </tr>
                            </thead>
                            <tbody>
            @foreach ($grupos as $grupo)
                                <tr>
                                    <td>{{$grupo -> nome_grupo}}</td>
                                    <td>6</td>
                                    <td>3</td>
                                    <td>1</td>
                                    <td>0</td>
                                    <td>Ativo</td>
                                    <td><a href="/grupos/{{$grupo -> id_grupo}}/edit" class="gray-link" style="font-size: 20px;"><i class="fas fa-cog"></i></a></td>
                                    <td><a href="/sensores/{{$grupo -> id_grupo}}/" class="gray-link"><i class="fas fa-arrow-right"></i></a></td>
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
