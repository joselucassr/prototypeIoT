@extends('layouts.navbar')

@section('content')
    <div class="container mx-auto" style="margin-top: 50px;">
        <!-- GRUPO -->
        <div class="col-md-6 mx-auto">
            <h3>Adicionar Sensor</h3>
            {!! Form::open(['action' => 'SensoresController@store', 'method' => 'POST']) !!}
                <div class="form-group">
                    {{Form::label('nome', 'Nome')}}
                    {{Form::text('nome', '', ['class' => 'form-control', 'placeholder' => 'Nome do Sensor'])}}
                </div>
                <div class="form-group">
                    {{Form::label('id', 'ID')}}
                    {{Form::text('id', '', ['class' => 'form-control', 'placeholder' => '00000000000'])}}
                </div>
                <div class="form-row">
                    <div class="form-group col-6">
                        {{Form::label('tempmin', 'Temperatura Mínima')}}
                        {{Form::number('tempmin', '', ['class' => 'form-control', 'placeholder' => '-X °C'])}}
                    </div>
                    <div class="form-group col-6">
                        {{Form::label('tempmax', 'Temperatura Máxima')}}
                        {{Form::number('tempmax', '', ['class' => 'form-control', 'placeholder' => 'X °C'])}}
                    </div>
                </div>
                <div class="form-group">
                    {{Form::label('obs', 'Observações')}}
                    {{Form::textarea('obs', '', ['class' => 'form-control', 'rows' => '3'])}}
                </div>
                {{Form::submit('Adicionar', ['class' => 'btn btn-outline-primary float-right'])}}
                {{ Form::hidden('grupo_id', $id)}}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
