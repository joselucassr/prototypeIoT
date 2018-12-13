@extends('layouts.navbar')

@section('content')
    <div class="container" style="margin-top:20px;">
        <!-- GRUPO -->
        <div class="col-md-6 mx-auto">
            <h3>Adicionar Grupo</h3>
            {!! Form::open(['action' => 'GruposController@store', 'method' => 'POST']) !!}
                <div class="form-group">
                    {{Form::label('nome_grupo', 'Nome')}}
                    {{Form::text('nome_grupo', '', ['class' => 'form-control', 'placeholder' => 'Nome do Grupo'])}}
                </div>
                <div class="form-group">
                    {{Form::label('descricao_grupo', 'Observações')}}
                    {{Form::textarea('descricao_grupo', '', ['class' => 'form-control', 'rows' => '3'])}}
                </div>
                {{Form::submit('Adicionar', ['class' => 'btn btn-outline-primary float-right'])}}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
