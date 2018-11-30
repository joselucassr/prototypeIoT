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
                    {!! Form::open(['action' => ['SensoresController@destroy', $sensor -> id], 'method' => 'POST', 'class' => 'float-right']) !!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{ Form::hidden('grupo_id', $sensor -> grupo_id)}}
                        {{Form::button('<i class="fas fa-trash-alt"></i>', ['class' => 'btn btn-danger', 'type' => 'submit'])}}
                    {!! Form::close() !!}
                </div>
            </div>
            {!! Form::open(['action' => ['SensoresController@update', $sensor -> id], 'method' => 'POST']) !!}
                <div class="form-group">
                    {{Form::label('nome', 'Nome')}}
                    {{Form::text('nome', $sensor -> nome, ['class' => 'form-control', 'placeholder' => 'Nome do Sensor'])}}
                </div>
                <div class="form-group">
                    {{Form::label('id', 'ID')}}
                    {{Form::text('id', $sensor -> id, ['class' => 'form-control', 'placeholder' => '00000000000'])}}
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
                {{ Form::hidden('grupo_id', $sensor -> grupo_id)}}
                {{Form::hidden('_method', 'PUT')}}
                {{Form::submit('Modificar', ['class' => 'btn btn-outline-primary float-right'])}}
            {!! Form::close() !!}
        </div>
    </div>
@endsection

