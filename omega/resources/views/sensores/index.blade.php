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
                    <?php
                        $diferenca = '';
                        $cor_vermelha = '';
                        $border_radius = '';
                        $cor_titulo = 'rgba(0,0,0,0.85);';
                        $cor_bateria = 'color: #218536;';

                        if ($sensor -> temperatura != null){
                            if ($sensor -> temperatura > $sensor -> tempmax or $sensor -> temperatura < $sensor -> tempmin){
                                $cor_vermelha = 'background-color: rgba(255,0,0,0.64);';
                                $border_radius = 'border-radius: 10px';
                                $cor_titulo = 'color: #fff;';
                                $cor_bateria = 'color: #fff;';

                                if ($sensor -> temperatura > $sensor -> tempmax){
                                    $diferenca = $sensor -> temperatura - $sensor -> tempmax;
                                } elseif($sensor -> temperatura < $sensor -> tempmin){
                                    $diferenca = $sensor -> tempmin - $sensor -> temperatura ;
                                }
                            }
                        }
                        else{
                            $cor_vermelha = '';
                            $border_radius = '';
                            $cor_titulo = 'rgba(0,0,0,0.85);';
                            $cor_bateria = 'color: #218536;';
                        }
                    ?>
                    <!-- Card Personalizado -->
                    <div class="container-fluid col-md-4" >
                        <div  style="padding: 0 5px 30px 5px; margin: 0 5px 35px 5px; {{$cor_vermelha}} {{$border_radius}}">
                            <div class="row">
                                <div class="col-6"><a href="/sensor/{{$sensor->id_sensor}}" class="gray-link" style="{{$cor_titulo}} font-size: 25px">{{$sensor -> nome_sensor }}</a></div>
                                <div class="col-4 float-right my-auto" style="padding-top: 8px">
                                    <p class=" float-right" style="{{$cor_bateria}}">{{$sensor -> bateria}}% <i class="fas fa-battery-full iconBateria" style="{{$cor_bateria}}"></i></p>
                                </div>
                                @if(Auth::guard('web') -> check())
                                    <div class="col-2" style="padding-top: 10px">
                                        <a class="gray-link" href="/sensor/{{$sensor -> id_sensor}}/edit"><i class="fas fa-cog d-inline float-right"></i></a>
                                    </div>
                                @endif
                            </div>
                                <div class="corpo">
                                    @if ($sensor -> temperatura != null)
                                        <div id="sensor{{$sensor -> id_sensor}}" class="mx-auto" style="width: 200px; height: 100px; padding-top: 10px">
                                        <!-- AQUI FICA O GRÁFICO -->
                                        </div>
                                    @else
                                        <div class="mx-auto" style="width: 200px; height: 100px; padding-top: 10px">
                                            <h2 style="margin-top: 50px; color: rgba(255,0,0,0.80)">Não há dados</h2>
                                        </div>
                                    @endif
                                    <div class="col text-right" style="margin-top: 50px;"><p class="hora" style="color: rgba(0,0,0,0.65); font-weight: bold">Última Atualização: {{$sensor -> updated_at}}</p></div>
                                    @include('../inc/graficoRadial')
                                </div>
                            @if ($sensor -> temperatura > $sensor -> tempmax)
                                <div class="text-center" style="margin-top: 5px"><h3 style="color: #fff">Temperatura {{$diferenca}} °C acima do ideal</h3></div>
                            @elseif($sensor -> temperatura < $sensor -> tempmin)
                                <div class="text-center" style="margin-top: 5px"><h3 style="color: #fff">Temperatura {{$diferenca}} °C abaixo do ideal</h3></div>
                            @endif
                        </div>
                    </div>
                @endforeach
            @elseif(Auth::guard('web') -> check())
                <div class="alert alert-info col-12 text-center mx-auto" role="alert">
                    Você não possui nenhum sensor, clique  <a href="/sensores/{{$data['grupo'] -> id_grupo  }}/create" class="alert-link">aqui</a> para adicionar um.
                </div>
            @endif
        </div>
    </div>

@endsection


@section('scripts')
    <script src="https://rawgit.com/kimmobrunfeldt/progressbar.js/1.0.0/dist/progressbar.js"></script>
@endsection