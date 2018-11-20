@extends('layouts.navbar')

@section('content')
    <div class="container col-12">
        <h1 class="text-center titulo">Nome Sensor:</h1>
        <div class="container col-12" style="padding-top: 20px;">
           <div class="col-12 row container-temp-chart">
                <!-- Temperatura -->
                <div class="col-lg-6 col-md-12">
                    <a class="link" href="/sensor"><h1 class="temperatura">-3 °C</h1></a>
                </div>

               <!-- Histórico de Variação -->
               <div class="col-lg-6 col-md-12">
                       <canvas id="myChart"></canvas>
               </div>
           </div>
           <div class="col-12 row mx-auto container-sts-bat-anot">
               <!-- Status -->
               <div class="col-3">
                    <h2>Status: X</h2>
               </div>

               <!-- Bateria -->
               <div class="col-3">
                    <h2>Bateria: X</h2>
               </div>

               <!-- Anotações -->
               <div class="col-6">
                   <form class="form-group">
                       <textarea class="form-control autoExpand" rows="3" data-min-rows="3"></textarea>
                       <button class="btn btn-primary">Salvar</button>
                   </form>
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
                    label: 'Histórico de Variação da Temperatura',
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
                responsive: true
            }
        });
    </script>
@endsection