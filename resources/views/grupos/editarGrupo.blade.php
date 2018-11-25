@extends('layouts.navbar')

@section('content')
    <!-- Formulário -->

    <div class="container" style="margin-top: ;: 20px;">
        <!-- GRUPO -->
        <div class="col-md-6 mx-auto">
            <div class="row">
                <div class="col-10">
                    <h3>Editar Grupo</h3>
                </div>
                <div class="col-2">
                    {!! Form::open(['action' => ['GruposController@destroy', $grupo -> id], 'method' => 'POST', 'class' => 'float-right']) !!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::button('<i class="fas fa-trash-alt"></i>', ['class' => 'btn btn-danger', 'type' => 'submit'])}}
                    {!! Form::close() !!}
                </div>
            </div>
            {!! Form::open(['action' => ['GruposController@update', $grupo -> id], 'method' => 'POST']) !!}
            <div class="form-group">
                {{Form::label('nome', 'Nome')}}
                {{Form::text('nome', $grupo -> nome, ['class' => 'form-control', 'placeholder' => 'Nome do Grupo'])}}
            </div>
            <div class="form-group">
                {{Form::label('obs', 'Observações')}}
                {{Form::textarea('obs', $grupo -> obs, ['class' => 'form-control', 'rows' => '3'])}}
            </div>
            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit('Modificar', ['class' => 'btn btn-outline-primary'])}}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
