@extends('layouts.navbar')

@section('content')
    <div class="container col-12">
        <div class="row float-right especifico" style="font-size: 30px; color: rgba(0,0,0,.50);">
            <div class="col-2" style="margin-right: 15px">
                <a href="/grupos/create" class="gray-link"><i class="fas fa-plus"></i></a>
            </div>
            <div class="col-2">
                <i class="fas fa-list-ul"></i>
            </div>
        </div>
        <div class="row col-12" style="padding-top: 20px;">
            @if (count($grupos) > 0)
                @foreach ($grupos as $grupo)
                    <!-- Card Grupo -->
                        <div class="card" style="margin: 0 5px 10px; width: 30%">
                            <div class="card-header">
                                <p class="d-inline">{{$grupo -> nome}}</p> <a href="/grupos/{{$grupo -> id}}/edit" class="gray-link" style="font-size: 20px"><i class="fas fa-cog d-inline float-right"></i></a>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">X Dias de Monitoramento</li>
                                <li class="list-group-item">X Notificações Enviadas</li>
                                <li class="list-group-item">X Bateria(s) Fraca(s)</li>
                                <li class="list-group-item">X Alertas</li>
                                <li class="list-group-item">Status: X</li>
                                <li class="list-group-item"><a href="/sensores" class="float-right">Veja os seus sensores</a></li>
                            </ul>
                        </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
