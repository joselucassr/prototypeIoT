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
                                <div id="container" class="col-12">

                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <i class="fas fa-battery-full iconBateria"></i>
                                    </div>
                                    <div class="col-6"><p class="hora">13/11/2018 14:30:15</p></div>
                                </div>
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
    <script>
        var ProgressBar = require('progressbar.js')
        var bar = new ProgressBar.SemiCircle(container, {
            strokeWidth: 6,
            color: '#FFEA82',
            trailColor: '#eee',
            trailWidth: 1,
            easing: 'easeInOut',
            duration: 1400,
            svgStyle: null,
            text: {
                value: '',
                alignToBottom: false
            },
            from: {color: '#FFEA82'},
            to: {color: '#ED6A5A'},
            // Set default step function for all animate calls
            step: (state, bar) => {
                bar.path.setAttribute('stroke', state.color);
                var value = Math.round(bar.value() * 100);
                if (value === 0) {
                    bar.setText('');
                } else {
                    bar.setText(value);
                }

                bar.text.style.color = state.color;
            }
        });
        bar.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
        bar.text.style.fontSize = '2rem';

        bar.animate(0.8);  // Number from 0.0 to 1.0
    </script>
@endsection