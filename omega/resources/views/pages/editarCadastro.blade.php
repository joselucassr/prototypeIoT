@extends('layouts.navbar')

@section('content')
    <div class="container" style="margin-top: 50px; padding-bottom: 75px;">
        <h2 class="text-center">Editar Cadastro</h2>
            {!! Form::open(['action' => ['PagesController@update', auth() -> user() -> id_empresa], 'method' => 'POST']) !!}


            <!-- Empresa -->
            <div class="form-empresa">
                <h3>Empresa</h3>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nome_empresa">Nome Empresa</label>
                        <input type="text" class="form-control" id="nome_empresa" name="nome_empresa" value="{{auth() -> user() -> nome_empresa}}" placeholder="Nome da empresa">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="cnpj">CNPJ</label>
                        <input type="text" class="form-control" id="cnpj" name="cnpj" value="{{auth() -> user() -> cnpj}}" data-mask="00.000.000/0000-00" placeholder="00.000.000/0000-00">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email_empresa">Email</label>
                        <input type="email" class="form-control" id="email_empresa" name="email_empresa" value="{{auth() -> user() -> email_empresa}}" placeholder="email@empresa.com">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="telefone_1_empresa">Telefone</label>
                        <input type="tel" class="form-control" id="telefone_1_empresa" name="telefone_1_empresa" value="{{auth() -> user() -> telefone_empresa}}" data-mask="(00) 0000-0000" placeholder="(00) 0000-0000">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="celular_empresa">Celular</label>
                        <input type="tel" class="form-control" id="celular_empresa" name="celular_empresa" value="{{auth() -> user() -> celular_empresa}}" data-mask="(00) 00000-0000" placeholder="(00) 00000-0000">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="cidade">Cidade</label>
                        <input type="text" class="form-control" id="cidade" name="cidade" value="{{auth() -> user() -> cidade}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="estado">Estado</label>
                        <select id="estado" class="form-control" name="estado">
                            <option value="{{auth() -> user() -> estado}}">{{auth() -> user() -> estado}}</option>
                            <option value="AC">AC</option>
                            <option value="AL">AL</option>
                            <option value="AM">AM</option>
                            <option value="AP">AP</option>
                            <option value="BA">BA</option>
                            <option value="CE">CE</option>
                            <option value="DF">DF</option>
                            <option value="ES">ES</option>
                            <option value="GO">GO</option>
                            <option value="MA">MA</option>
                            <option value="MG">MG</option>
                            <option value="MS">MS</option>
                            <option value="MT">MT</option>
                            <option value="PA">PA</option>
                            <option value="PB">PB</option>
                            <option value="PE">PE</option>
                            <option value="PI">PI</option>
                            <option value="PR">PR</option>
                            <option value="RJ">RJ</option>
                            <option value="RN">RN</option>
                            <option value="RS">RS</option>
                            <option value="RO">RO</option>
                            <option value="RR">RR</option>
                            <option value="SC">SC</option>
                            <option value="SE">SE</option>
                            <option value="SP">SP</option>
                            <option value="TO">TO</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="cep">CEP</label>
                        <input type="text" class="form-control" id="cep" value="{{auth() -> user() -> cep}}" name="cep" data-mask="00000-000" placeholder="00000-000">
                    </div>
                </div>
            </div>

        {{Form::hidden('_method', 'PUT')}}
            <button type="submit" class="btn btn-outline-info col-4">Salvar</button>
        {!! Form::close() !!}
    </div>
@endsection
