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
                        $borda_vermelha = '';


                        if ($sensor -> temperatura != null){
                            if ($sensor -> temperatura > $sensor -> tempmax or $sensor -> temperatura < $sensor -> tempmin){
                                $borda_vermelha = 'border: 3px solid #ec2222;';

                                if ($sensor -> temperatura > $sensor -> tempmax){
                                    $diferenca = $sensor -> temperatura - $sensor -> tempmax;
                                } elseif($sensor -> temperatura < $sensor -> tempmin){
                                    $diferenca = $sensor -> tempmin - $sensor -> temperatura ;
                                }
                            }
                        }
                    ?>
                    <!-- Card Personalizado -->
                    <div class="container-fluid col-md-4" >
                        <div style="padding: 0 5px 30px 5px; margin: 0 5px 35px 5px;">
                            <div class="row">
                                <div class="col-6"><a href="/sensor/{{$sensor->id_sensor}}" class="gray-link" style="font-size: 25px">{{$sensor -> nome_sensor }}</a></div>
                                <div class="col-4 float-right my-auto" style="padding-top: 8px">
                                    <p class=" float-right">{{$sensor -> bateria}}% <i class="fas fa-battery-full iconBateria"></i></p>
                                </div>
                                @if(Auth::guard('web') -> check())
                                    <div class="col-2" style="padding-top: 10px">
                                        <a class="gray-link" href="/sensor/{{$sensor -> id_sensor}}/edit"><i class="fas fa-cog d-inline float-right"></i></a>
                                    </div>
                                @endif
                            </div>
                                <div class="corpo" style="{{$borda_vermelha}}" onclick="location.href='/sensor/{{$sensor->id_sensor}}';">
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
    <script src="{{ asset('js/progressbar.js') }}"></script>
@endsection