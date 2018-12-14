@extends('layouts.navbar')

@section('content')
    <div class="container mx-auto" style="margin-top: 50px;">
        <!-- GRUPO -->
        <div class="col-md-6 mx-auto">
            <div class="row">
                <div class="col-10">
                    <h3>Editar Sensor</h3>
                </div>
                <div class="col-2">
                    {!! Form::open(['action' => ['SensoresController@destroy', $sensor -> id_sensor], 'method' => 'POST', 'class' => 'float-right', 'onclick' => "return confirm('Você tem certeza que quer REMOVER esse sensor?');"]) !!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::button('<i class="fas fa-trash-alt"></i>', ['class' => 'btn btn-danger', 'type' => 'submit'])}}
                    {!! Form::close() !!}
                </div>
            </div>
            {!! Form::open(['action' => ['SensoresController@update', $sensor -> id_sensor], 'method' => 'POST']) !!}
                <div class="form-group">
                    {{Form::label('nome_sensor', 'Nome')}}
                    {{Form::text('nome_sensor', $sensor -> nome_sensor, ['class' => 'form-control', 'placeholder' => 'Nome do Sensor'])}}
                </div>
                <div class="form-group">
                    {{Form::label('id_sensor', 'ID')}}
                    {{Form::text('id_sensor', $sensor -> id_sensor, ['class' => 'form-control', 'placeholder' => '00000000000'])}}
                </div>
                <div class="form-row">
                    <div class="form-group col-6">
                        {{Form::label('tempmin', 'Temperatura Mínima')}}
                        {{Form::number('tempmin', $sensor -> tempmin, ['class' => 'form-control', 'placeholder' => '-X °C'])}}
                    </div>
                    <div class="form-group col-6">
                        {{Form::label('tempmax', 'Temperatura Máxima')}}
                        {{Form::number('tempmax', $sensor -> tempmax, ['class' => 'form-control', 'placeholder' => 'X °C'])}}
                    </div>
                </div>
                <div class="form-group">
                    {{Form::label('obs', 'Observações')}}
                    {{Form::textarea('obs', $sensor -> obs, ['class' => 'form-control', 'rows' => '3'])}}
                </div>
                {{Form::hidden('_method', 'PUT')}}
                {{Form::submit('Modificar', ['class' => 'btn btn-outline-info float-right'])}}
            {!! Form::close() !!}
        </div>
    </div>
@endsection

