@extends('layouts.navbar')

@section('content')

    <div class="container mx-auto" style="margin-top: 50px;">

        <h2 class="text-center" style="margin-bottom: 50px">Cadastrar Usuário</h2>

        <div class="col-md-8 mx-auto">
            <form action="/responsavel" method="POST">
                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nome_responsavel">Nome</label>
                        <input type="text" class="form-control" id="nome_responsavel" name="nome_responsavel" value="{{ old('nome_responsavel') }}" placeholder="Nome Completo">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="cpf">CPF</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" value="{{ old('cpf') }}" data-mask="000.000.000-00" placeholder="000.000.000-00">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email_responsavel">Email</label>
                        <input type="email" class="form-control" id="email_responsavel" value="{{ old('email_responsavel') }}" name="email_responsavel" placeholder="email@email.com">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="telefone_responsavel">Telefone</label>
                        <input type="tel" class="form-control" id="telefone_responsavel" value="{{ old('telefone_responsavel') }}" name="telefone_responsavel" data-mask="(00) 0000-0000" placeholder="(00) 0000-0000">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="celular_responsavel">Celular</label>
                        <input type="tel" class="form-control" id="celular_responsavel" value="{{ old('celular_responsavel') }}" name="celular_responsavel" data-mask="(00) 00000-0000" placeholder="(00) 00000-0000">
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
                <button class="btn btn-outline-info float-right">Adicionar</button>
            </form>
        </div>
    </div>
@endsection
