@extends('layouts.navbar')

@section('content')
    <div class="container col-12">
        <div class="row float-right especifico" style="font-size: 30px; color: rgba(0,0,0,.50);">
            <div class="col-2" style="margin-right: 15px">
                <a href="/grupos/create" class="gray-link"><i class="fas fa-plus"></i></a>
            </div>
            <div class="col-2">
                <a href="/grupos" class="gray-link"><i class="fas fa-table"></i></a>
            </div>
        </div>
        <div class="row col-12" style="padding-top: 20px;">
        @if (count($grupos) > 0)
                <div class="col-12" style="margin-top: 20px">
                    <div class="col-12">
                        <table class="table table-striped text-center">
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
                <!-- Table Novo -->
                                <tr>
                                    <td>{{$grupo -> nome}}</td>
                                    <td>6</td>
                                    <td>3</td>
                                    <td>1</td>
                                    <td>0</td>
                                    <td>Ativo</td>
                                    <td><a href="/grupos/{{$grupo -> id}}/edit" class="gray-link" style="font-size: 20px;"><i class="fas fa-cog"></i></a></td>
                                    <td><a href="#" class="gray-link"><i class="fas fa-arrow-right"></a></i></td>
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