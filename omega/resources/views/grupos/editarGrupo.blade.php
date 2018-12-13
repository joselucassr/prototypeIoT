@extends('layouts.navbar')

@section('content')
    <!-- Formulário -->

    <div class="container" style="margin-top: 50px;">
        <!-- GRUPO -->
        <div class="col-md-6 mx-auto">
            <div class="row">
                <div class="col-10">
                    <h3>Editar Grupo</h3>
                </div>
                <div class="col-2">
                    {!! Form::open(['action' => ['GruposController@destroy', $grupo -> id_grupo], 'method' => 'POST', 'class' => 'float-right', 'onclick' => "return confirm('Você tem certeza que quer REMOVER esse grupo?');"]) !!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::button('<i class="fas fa-trash-alt"></i>', ['class' => 'btn btn-danger', 'type' => 'submit'])}}
                    {!! Form::close() !!}
                </div>
            </div>
            {!! Form::open(['action' => ['GruposController@update', $grupo -> id_grupo], 'method' => 'POST']) !!}
            <div class="form-group">
                {{Form::label('nome_grupo', 'Nome')}}
                {{Form::text('nome_grupo', $grupo -> nome_grupo, ['class' => 'form-control', 'placeholder' => 'Nome do Grupo'])}}
            </div>
            <div class="form-group">
                {{Form::label('descricao_grupo', 'Observações')}}
                {{Form::textarea('descricao_grupo', $grupo -> descricao_grupo, ['class' => 'form-control', 'rows' => '3'])}}
            </div>
            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit('Modificar', ['class' => 'btn btn-outline-primary float-right'])}}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
