@extends('layouts.navbar')

@section('content')

    <--Cadastro Usuário>


    <div class="form-empresa">
        <h3>Cadastrar Usuário</h3>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nome_usuario">Nome</label>
                <input type="text" class="form-control" id="nome_usuario" value="{{auth() -> user() -> nome_usuario}}" name="nome_usuario" placeholder="Nome Completo">
            </div>
            <div class="form-group col-md-6">
                <label for="cpf">CPF</label>
                <input type="text" class="form-control" id="cpf" value="{{auth() -> user() -> cpf}}" name="cpf" data-mask="000.000.000-00" placeholder="000.000.000-00">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="email_usuario">Email</label>
                <input type="email" class="form-control" id="email_usuario" value="{{auth() -> user() -> email_usuario}}" name="email_usuario" placeholder="email@email.com">
            </div>
            <div class="form-group col-md-3">
                <label for="telefone_usuario">Telefone</label>
                <input type="tel" class="form-control" id="telefone_usuario" value="{{auth() -> user() -> telefone_usuario}}" name="telefone_usuario" data-mask="(00) 0000-0000" placeholder="(00) 0000-0000">
            </div>
            <div class="form-group col-md-3">
                <label for="celular_usuario">Celular</label>
                <input type="tel" class="form-control" id="celular_usuario" value="{{auth() -> user() -> celular_usuario}}" name="celular_usuario" data-mask="(00) 00000-0000" placeholder="(00) 00000-0000">
            </div>
        </div>
        <fieldset class="form-group">
            <div class="row">
                <legend class="col-form-label col-sm-2 pt-0">Gênero</legend>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio"  name="genero" id="masculino" value="1" checked>
                        <label class="form-check-label" for="masculino">
                            Masculino
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="genero" id="feminino" value="2">
                        <label class="form-check-label" for="feminino">
                            Feminino
                        </label>
                    </div>
                    <div class="form-check disabled">
                        <input class="form-check-input" type="radio" name="genero" id="outro" value="3">
                        <label class="form-check-label" for="outro">
                            Outro
                        </label>
                    </div>
                </div>
            </div>
        </fieldset>
    </div>
@endsection
