@extends('layouts.navbar')

@section('content')
    <div class="container col-12" style="padding-bottom: 50px">
        <div class="row float-right especifico" style="font-size: 30px; color: rgba(0,0,0,.50); margin-top: 20px; margin-bottom: 30px">
            @if(Auth::guard('web') -> check())
                <div class="col-2" style="margin-right: 15px">
                    <a href="/grupos/create" class="gray-link"><i class="fas fa-plus"></i></a>
                </div>
            @endif
            <div class="col-2">
                <a href="/gruposlista" class="gray-link"><i class="fas fa-list-ul"></i></a>
            </div>
        </div>
        <div class="row col-12 mx-auto" style="padding: 0;">
            @if (count($grupos) > 0)
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


                     <!-- Card Novo -->
                        <div class="container-fluid col-md-4" style="margin-bottom: 30px">
                            <div class="row col-12">
                                <div class="text-left col-8">
                                    <a href="/sensores/{{$grupo -> id_grupo}}/" class="linkAzul"><h3>{{$grupo -> nome_grupo}}</h3></a>
                                </div>
                                @if(Auth::guard('web') -> check())
                                    <div class="text-right col-4">
                                        <a href="/grupos/{{$grupo -> id_grupo}}/edit" class="gray-link" style="font-size: 20px;"><i class="fas fa-cog" style=" vertical-align: middle"></i></a>
                                    </div>
                                @endif
                            </div>
                            <div class="col-12">
                                <table class="corpo table table-striped">
                                    <tbody>
                                    <tr>
                                        <th scope="row">Dias de Monitoramento:</th>
                                        <td>25 Dias</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Notificações Enviadas:</th>
                                        <td>5</td>
                                    </tr>
                                    <tr style="color: {{$cor_vermelha_bateria}}">
                                        <th scope="row">Sensores com bateria fraca:</th>
                                        <td>{{$bateria_numero}}</td>
                                    </tr>
                                    <tr style="color: {{$cor_vermelha_temperatura}}">
                                        <th scope="row">Temperatura Crítica</th>
                                        <td>{{$temperatura_numero}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Status:</th>
                                        <td>Ativo</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-right col-12" style="margin-top: -10px">
                                <a href="/sensores/{{$grupo -> id_grupo}}" class="linkAzul">Veja seus sensores</a>
                            </div>
                        </div>
                @endforeach
            @else
                @if(Auth::guard('web') -> check())
                    <div class="alert alert-info col-12 text-center mx-auto" role="alert">
                        Você não possui nenhum grupo, clique  <a href="/grupos/create" class="alert-link">aqui</a> para adicionar um.
                    </div>
                @endif
            @endif
        </div>
    </div>
@endsection
