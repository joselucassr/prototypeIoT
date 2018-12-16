@extends('layouts.navbar')

@section('content')
    <div class="container col-12" style="margin-top: 20px;">
        <h1 class="text-center">{{$data['grupo'] -> nome}}</h1>
        <div class="row float-right especifico" style="font-size: 30px; color: rgba(0,0,0,.50); padding: 0;">
            @if(Auth::guard('web') -> check())
                <div class="col-2" style="margin-right: 15px">
                    <a href="/sensores/{{$data['grupo'] -> id_grupo}}/create" class="gray-link"><i class="fas fa-plus"></i></a>
                </div>
            @endif
            <div class="col-2">
                <a href="/sensores/{{$data['grupo'] -> id_grupo}}/lista" class="gray-link"><i class="fas fa-list-ul"></i></a>
            </div>
        </div>
        <div class="row col-12 mx-auto" style="padding: 20px 0 0 0;">
            @if (count($data['sensores']) > 0)
                @foreach ($data['sensores'] as $sensor)
                    <!-- Card Personalizado -->
                    <div class="container-fluid col-md-4" style="padding-bottom: 75px; margin-bottom: 0">
                        <div class="row">
                            <div class="col-6"><a href="/sensor/{{$sensor->id_sensor}}" class="gray-link" style="color: rgba(0,0,0,0.85); font-size: 25px">{{$sensor -> nome_sensor }}</a></div>
                            <div class="col-4 float-right my-auto">
                                <p class=" float-right" style="color: #218536;">{{$sensor -> bateria}}% <i class="fas fa-battery-full iconBateria"></i></p>
                            </div>
                            @if(Auth::guard('web') -> check())
                                <div class="col-2">
                                    <a class="gray-link" href="/sensor/{{$sensor -> id_sensor}}/edit"><i class="fas fa-cog d-inline float-right"></i></a>
                                </div>
                            @endif
                        </div>
                            <div class="corpo">
                                <div id="sensor{{$sensor -> id_sensor}}" class="mx-auto" style="width: 200px; height: 100px; padding-top: 10px">
                                <!-- AQUI FICA O GRÁFICO -->
                                </div>
                                <div class="col text-right" style="margin-top: 50px;"><p class="hora" style="color: rgba(0,0,0,0.85)">{{$sensor -> updated_at}}</p></div>
                                @include('../inc/graficoRadial')
                            </div>
                    </div>
                @endforeach
            @else
                @if(Auth::guard('web') -> check())
                    <div class="alert alert-info col-12 text-center mx-auto" role="alert">
                        Você não possui nenhum sensor, clique  <a href="/sensores/{{$data['grupo'] -> id_grupo  }}/create" class="alert-link">aqui</a> para adicionar um.
                    </div>
                @endif
            @endif
        </div>
    </div>

@endsection


@section('scripts')
    <script src="https://rawgit.com/kimmobrunfeldt/progressbar.js/1.0.0/dist/progressbar.js"></script>
@endsection