@extends('layouts.navbar')

@section('content')

    <div class="container mx-auto" style="margin-top: 50px;">



        <div class="col-md-8 mx-auto">
            <div class="row" style="margin-bottom: 20px">
                <div class="col-10">
                    <h2>Editar Usuário</h2>
                </div>
                <div class="col-2">
                    {!! Form::open(['action' => ['ResponsavelController@destroy', $responsavel -> id_responsavel], 'method' => 'POST', 'class' => 'float-right', 'onclick' => "return confirm('Você tem certeza que quer REMOVER esse usuário?');"]) !!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::button('<i class="fas fa-trash-alt"></i>', ['class' => 'btn btn-danger', 'type' => 'submit'])}}
                    {!! Form::close() !!}
                </div>
            </div>
            <form action="/responsavel/{{$responsavel -> id_responsavel}}" method="POST">
                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                {{ method_field('PATCH') }}

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nome_responsavel">Nome</label>
                        <input type="text" class="form-control" id="nome_responsavel" value="{{$responsavel -> nome_responsavel}}" name="nome_responsavel" placeholder="Nome Completo">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="cpf">CPF</label>
                        <input type="text" class="form-control" id="cpf" value="{{$responsavel -> cpf}}" name="cpf" data-mask="000.000.000-00" placeholder="000.000.000-00">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email_responsavel">Email</label>
                        <input type="email" class="form-control" id="email_responsavel" value="{{$responsavel -> email_responsavel}}" name="email_responsavel" placeholder="email@email.com">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="telefone_responsavel">Telefone</label>
                        <input type="tel" class="form-control" id="telefone_responsavel" value="{{$responsavel -> telefone_responsavel}}" name="telefone_responsavel" data-mask="(00) 0000-0000" placeholder="(00) 0000-0000">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="celular_responsavel">Celular</label>
                        <input type="tel" class="form-control" id="celular_responsavel" value="{{$responsavel -> celular_responsavel}}" name="celular_responsavel" data-mask="(00) 00000-0000" placeholder="(00) 00000-0000">
                    </div>
                </div>
                <div class="form-group">
                    <label for="nivel_acesso">Permissão de Acesso</label>
                    <select class="form-control" id="nivel_acesso">
                        <option>Administrador</option>
                        <option>Usuário</option>

                    </select>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="password">Senha</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password_confirmation">Confirmar Senha</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                    </div>
                </div>
                <button class="btn btn-outline-info float-right">Editar</button>
            </form>
        </div>
    </div>
@endsection
