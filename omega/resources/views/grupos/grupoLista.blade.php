@extends('layouts.navbar')

@section('content')

    <!-- Modal -->
    <div class="modal fade" id="modal_notificacoes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Notificações Enviadas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Aqui irá mostrar a hora e a data das notificações
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

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
                                <th scope="col">Sensores com bateria fraca</th>
                                <th scope="col">Temperatura Crítica</th>
                                <th scope="col">Status</th>
                                <th scope="col">Configurar</th>
                                <th scope="col">Sensores</th>
                            </tr>
                            </thead>
                            <tbody>
            @foreach ($grupos as $grupo)

                <?php
                    $id_grupo = $grupo -> id_grupo;
                    $bateria = \Illuminate\Support\Facades\DB::table('sensors') -> where('grupo_id_grupo', $id_grupo) -> where('bateria', '<', '25') -> get();
                    $bateria_numero = count($bateria);

                    $cor_vermelha_bateria = '';

                    if ($bateria_numero > 0){
                        $cor_vermelha_bateria = '#ff0000';
                    }

                    $temperaturas = \Illuminate\Support\Facades\DB::table('sensors') -> where('grupo_id_grupo', $id_grupo) -> where('temperatura', '>', 'tempmax') -> orWhere ('grupo_id_grupo', $id_grupo) -> where ('temperatura', '<', 'tempmin') -> get();
                    $temperatura_numero = count($temperaturas);

                    $cor_vermelha_temperatura = '';
                    if ($temperatura_numero > 0){
                        $cor_vermelha_temperatura = '#ff0000';
                    }
                ?>

                                <tr>
                                    <td>{{$grupo -> nome_grupo}}</td>
                                    <td>0</td>
                                    <td><button type="button" class="btn btn-link gray-link" data-toggle="modal" data-target="#modal_notificacoes" style="padding: 0; text-decoration:none; color:#000000 ">5</button></td>
                                    <td style="color: {{$cor_vermelha_bateria}}">{{$bateria_numero}}</td>
                                    <td style="color: {{$cor_vermelha_temperatura}}">{{$temperatura_numero}}</td>
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
