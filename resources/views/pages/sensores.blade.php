@extends('layouts.navbar')

@section('content')
    <div class="container col-12">
        <h1 class="text-center titulo">Meus Sensores</h1>
        <div class="row col-12" style="padding-top: 20px;">
            <!-- Card Sensor -->
            <div class="sensores">
                <div class="nomeSensor">
                    <a class="link" href="/sensor"><h3 class="d-inline">Nome do Sensor</h3></a>
                    <i class="fas fa-battery-full d-inline float-right iconBateria"></i>
                </div>
                <div class="corpo">
                    <a class="link" href="/sensor"><h1 class="temperatura">-3 °C</h1></a>
                    <p class="hora">13/11/2018 14:30:15</p>
                </div>
            </div>

            <!-- Adicionar Grupo -->
            <div class="sensores">
                <div class="nomeSensor">
                    <h3 class="d-inline">Nome do Sensor</h3>
                    <i class="fas fa-battery-full d-inline float-right iconBateria"></i>
                </div>
                <div class="corpo">
                    <div id="slider" class="slider"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
