@extends('layouts.navbar')

@section('content')
    <div class="container col-12" style="padding-bottom: 50px">
        <div class="row float-right especifico" style="font-size: 30px; color: rgba(0,0,0,.50); margin-top: 20px; margin-bottom: 30px">
            <div class="col-2" style="margin-right: 15px">
                <a href="/grupos/create" class="gray-link"><i class="fas fa-plus"></i></a>
            </div>
            <div class="col-2">
                <a href="/gruposlista" class="gray-link"><i class="fas fa-list-ul"></i></a>
            </div>
        </div>
        <div class="row col-12 mx-auto" style="padding: 0;">
            @if (count($grupos) > 0)
                @foreach ($grupos as $grupo)
                     <!-- Card Novo -->
                        <div class="container-fluid col-md-4" style="margin-bottom: 30px">
                            <div class="row col-12">
                                <div class="text-left col-8">
                                    <a href="/sensores/{{$grupo -> id_grupo}}/" class="linkAzul"><h3>{{$grupo -> nome_grupo}}</h3></a>
                                </div>
                                <div class="text-right col-4">
                                    <a href="/grupos/{{$grupo -> id_grupo}}/edit" class="gray-link" style="font-size: 20px;"><i class="fas fa-cog" style=" vertical-align: middle"></i></a>
                                </div>
                            </div>
                            <div class="col-12">
                                <table class="table table-striped">
                                    <tbody>
                                    <tr>
                                        <th scope="row">Dias de Monitoramento:</th>
                                        <td>25 Dias</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Notificações Enviadas:</th>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Bateria(s) Fraca(s):</th>
                                        <td>2</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Alertas:</th>
                                        <td>0</td>
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
                    <div class="alert alert-info col-12 text-center mx-auto" role="alert">
                        Você não possui nenhum grupo, clique  <a href="/grupos/create" class="alert-link">aqui</a> para adicionar um.
                    </div>
            @endif
        </div>
    </div>
@endsection
