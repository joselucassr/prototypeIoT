@extends('layouts.navbar')

@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="container-fluid col-md-4">
            <div class="row">
                <div class="col-6">Título</div>
                <div class="col-4">
                    <a href="/sensor" class="d-inline float-right ">Detalhes</a>
                </div>
                <div class="col-2">
                    <a href="/configurarsensor"><i class="fas fa-cog d-inline float-right"></i></a>
                </div>
            </div>
            <div class="corpo">
                <div class="col-12">
                    <h1>10 °C</h1>
                </div>
                <div class="row">
                    <div class="col-6">
                        <i class="fas fa-battery-full iconBateria"></i>
                    </div>
                    <div class="col-6"><p class="hora">13/11/2018 14:30:15</p></div>
                </div>
            </div>
        </div>
    </div>
@endsection
