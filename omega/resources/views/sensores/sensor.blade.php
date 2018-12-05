@extends('layouts.navbar')

@section('content')
    <div class="container col-12">
        <a class="gray-link" href="/sensores/{{$sensor -> grupo_id}}" style="font-size: 35px; position: relative; z-index: 999;"><i class="fas fa-long-arrow-alt-left"></i></a>
        <div class="col-12" style="margin-top: -50px;">
            <h1 class="text-center" style="color: #4b4b4b; margin-top: 10px;">{{$sensor -> nome}} #{{$sensor -> id}}</h1>
        </div>
        <div class="container col-12" style="padding-top: 20px;">
           <div class="row container-temp-chart">
                <!-- Temperatura -->
                <div class="col-lg-6 col-md-12">
                    <div id="sensor{{$sensor -> id}}" class="col-12 mx-auto" style="width: 400px; height: 200px; padding-top: 10px;">
                        <!-- AQUI FICA O GRÁFICO -->
                    </div>
                </div>


                @include('../inc/graficoRadialSensor')

               <!-- Histórico de Variação -->
               <div class="col-lg-6 col-md-12">
                       <canvas id="myChart"></canvas>
               </div>
           </div>
           <div class="col-12 row mx-auto container-sts-bat-anot">
               <!-- Status -->
               <div class="col-md-3">
                   <h2>Status: <span style="color: #218536;">{{$sensor -> status}}</span></h2>
               </div>

               <!-- Bateria -->
               <div class="col-md-3">
                    <h2>Bateria: {{$sensor -> bateria}}%</h2>
               </div>

               <!-- Anotações -->
               <div class="col-md-6">
                   {!! Form::open(['action' => ['SensoresController@updateSensor', $sensor -> id], 'method' => 'POST']) !!}
                       {{Form::label('obs', 'Observações')}}
                       {{Form::textarea('obs', $sensor -> obs, ['class' => 'form-control', 'rows' => '6'])}}
                   {{ Form::hidden('grupo_id', $sensor -> grupo_id)}}
                   {{Form::hidden('_method', 'PUT')}}
                   {{Form::submit('Salvar', ['class' => 'btn btn-outline-primary float-right', 'style' => 'margin-top: 5px'])}}
                   {!! Form::close() !!}
               </div>
           </div>
        </div>
    </div>

    <script src="{{ asset('js/MyChart.js') }}" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js" type="text/javascript"></script>
    <script src="../../../node_modules/chart.js/dist/Chart.js" type="text/javascript"></script>
    <script>
        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["00:00", "01:00", "02:00", "03:00", "04:00", "05:00", "06:00", "07:00", "08:00", "09:00", "10:00", "11:00", "12:00",
                         "13:00", "14:00", "15:00", "16:00", "17:00", "18:00", "19:00", "20:00", "21:00", "22:00", "23:00"
                        ],
                datasets: [{
                    label: 'Variação da Temperatura em 24 hs',
                    data: [-10, -11, -10, -9, -8, -9, -10, -9, -9, -9, -10, -10, -9, -8, -7, -6, -5, -4, -3, -2, -1, 0, 1, 2],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)'
                    ],
                    borderWidth: 1,
                    fill: false
                }]
            },
            options: {
                responsive: true,
                aspectRatio: 2,
                maintainAspectRatio: true,
                legend: {
                    display: true,
                    labels: {
                        fontSize: 15,
                        fontColor: '#000000'
                    }
                }
            }
        });
    </script>
@endsection

@section('scripts')
    <script src="https://rawgit.com/kimmobrunfeldt/progressbar.js/1.0.0/dist/progressbar.js"></script>
@endsection