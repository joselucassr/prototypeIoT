@extends('layouts.navbar')

@section('content')
    <div class="container mx-auto" style="margin-top: 50px;">

        <!-- GRUPO -->
        <div class="col-md-6 mx-auto">
            <h3>Adicionar Sensor</h3>
            {!! Form::open(['action' => 'SensoresController@store', 'method' => 'POST', 'novalidate', 'class' => 'needs-validation']) !!}
                <div class="form-group">
                    {{Form::label('nome_sensor', 'Nome')}}
                    {{Form::text('nome_sensor', '', ['class' => 'form-control', 'placeholder' => 'Nome do Sensor', 'required'])}}
                    <div class="invalid-feedback">
                        Campo Obrigatório
                    </div>
                </div>
                <div class="form-group">
                    {{Form::label('id_sensor', 'ID')}}
                    <button type="button" class="btn btn-outline-info float-right" style="border: none;" data-toggle="modal" data-target="#modalSensorID"><i class="fas fa-question"></i></button>
                    {{Form::text('id_sensor', '', ['class' => 'form-control', 'placeholder' => '00000000000', 'required'])}}
                    <div class="invalid-feedback">
                        Campo Obrigatório
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-6">
                        {{Form::label('tempmin', 'Temperatura Mínima')}}
                        {{Form::number('tempmin', '', ['class' => 'form-control', 'placeholder' => '-X °C', 'required'])}}
                        <div class="invalid-feedback">
                            Campo Obrigatório
                        </div>
                    </div>
                    <div class="form-group col-6">
                        {{Form::label('tempmax', 'Temperatura Máxima')}}
                        {{Form::number('tempmax', '', ['class' => 'form-control', 'placeholder' => 'X °C', 'required'])}}
                        <div class="invalid-feedback">
                            Campo Obrigatório
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    {{Form::label('obs', 'Observações')}}
                    {{Form::textarea('obs', '', ['class' => 'form-control', 'rows' => '3'])}}
                    <div class="invalid-feedback">
                        Campo Obrigatório
                    </div>
                </div>
                {{Form::submit('Adicionar', ['class' => 'btn btn-outline-primary float-right'])}}
                {{ Form::hidden('grupo_id_grupo', $id)}}
            {!! Form::close() !!}
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalSensorID" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Número de Identificação do Sensor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Para identificarmos o sensor vem com um número de identificação de X dígitos em uma etiqueta, verifique e digite no campo.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
@endsection