@extends('layouts.navbar')

@section('content')
    <div class="container col-12" style="margin-top: 20px;">
        <h1 class="text-center">{{$data['grupo'] -> nome}}</h1>
        <div class="row float-right especifico" style="font-size: 30px; color: rgba(0,0,0,.50); padding: 0;">
            <div class="col-2" style="margin-right: 15px">
                <a href="/sensores/{{$data['id']}}/create" class="gray-link"><i class="fas fa-plus"></i></a>
            </div>
            <div class="col-2">
                <a href="/sensores/{{$data['grupo'] -> id}}/lista" class="gray-link"><i class="fas fa-list-ul"></i></a>
            </div>
        </div>
        <div class="row col-12 mx-auto" style="padding: 20px 0 0 0;">
            @if (count($data['sensores']) > 0)
                @foreach ($data['sensores'] as $sensor)
                    <!-- Card Personalizado -->
                    <div class="container-fluid col-md-4" style="padding-bottom: 50px">
                        <div class="row">
                            <div class="col-6">{{$sensor -> nome}}</div>
                            <div class="col-4">
                                <a href="/sensor" class="d-inline float-right gray-link">Detalhes</a>
                            </div>
                            <div class="col-2">
                                <a class="gray-link" href="/sensor/{{$sensor -> id}}/edit"><i class="fas fa-cog d-inline float-right"></i></a>
                            </div>
                        </div>
                            <div class="corpo">
                                <div id="sensor{{$sensor -> id}}" class="col-12 mx-auto" style="width: 200px; height: 100px; padding-top: 10px">
                                <!-- AQUI FICA O GRÁFICO -->
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <i class="fas fa-battery-full iconBateria"></i>
                                    </div>
                                    <div class="col-6"><p class="hora">{{$sensor -> updated_at}}</p></div>
                                </div>
                                @include('../inc/graficoRadial')
                            </div>
                    </div>
                @endforeach
            @else
                <div class="alert alert-info col-12 text-center mx-auto" role="alert">
                    Você não possui nenhum sensor, clique  <a href="/sensores/{{$data['id']}}/create" class="alert-link">aqui</a> para adicionar um.
                </div>
            @endif
        </div>
    </div>

@endsection


@section('scripts')
    <script src="https://rawgit.com/kimmobrunfeldt/progressbar.js/1.0.0/dist/progressbar.js"></script>
@endsection