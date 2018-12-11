@extends('layouts.navbar')

@section('content')
    <div class="container" style="margin-top: 50px">
        <h2 class="text-center">Cadastro</h2>
        <form method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}

            <!-- Empresa -->
            <div class="form-empresa">
                <h3>Empresa</h3>
                <div class="form-row">
                    <!-- NOME DA EMPRESA -->
                    <div class="form-group{{ $errors->has('nome_empresa') ? ' has-error' : '' }} col-md-6">
                        <label for="nome_empresa">Nome Empresa</label>
                        <input id="nome_empresa" type="text" class="form-control" name="nome_empresa" value="{{ old('nome_empresa') }}" required autofocus placeholder="Nome da empresa">

                        @if ($errors->has('nome_empresa'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nome_empresa') }}</strong>
                            </span>
                        @endif
                    </div>

                    <!-- CNPJ -->
                    <div class="form-group col-md-6">
                        <label for="cnpj">CNPJ</label>
                        <input type="text" class="form-control" id="cnpj" name="cnpj" value="{{ old('cnpj') }}" data-mask="00.000.000/0000-00" required placeholder="00.000.000/0000-00">

                        @if ($errors->has('cnpj'))
                            <span class="help-block">
                                <strong>{{ $errors->first('cnpj') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-row">
                    <!-- EMAIL EMPRESA -->
                    <div class="form-group col-md-6">
                        <label for="email_empresa">Email</label>
                        <input type="email" class="form-control" id="email_empresa" name="email_empresa" value="{{ old('email_empresa') }}" required placeholder="email@empresa.com">

                        @if ($errors->has('email_empresa'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email_empresa') }}</strong>
                            </span>
                        @endif
                    </div>

                    <!-- TELEFONE 1 -->
                    <div class="form-group col-md-3">
                        <label for="telefone_empresa">Telefone</label>
                        <input type="tel" class="form-control" id="telefone_empresa" name="telefone_empresa" value="{{ old('telefone_empresa') }}" data-mask="(00) 0000-0000" required placeholder="(00) 0000-0000">

                        @if ($errors->has('telefone_empresa'))
                            <span class="help-block">
                                <strong>{{ $errors->first('telefone_empresa') }}</strong>
                            </span>
                        @endif
                    </div>

                    <!-- TELEFONE 2 -->
                    <div class="form-group col-md-3">
                        <label for="celular_empresa">Celular</label>
                        <input type="tel" class="form-control" id="celular_empresa" name="celular_empresa" value="{{ old('celular_empresa') }}" data-mask="(00) 00000-0000" required placeholder="(00) 00000-0000">

                        @if ($errors->has('celular_empresa'))
                            <span class="help-block">
                                <strong>{{ $errors->first('celular_empresa') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-row">
                    <!-- CIDADE -->
                    <div class="form-group col-md-6">
                        <label for="cidade">Cidade</label>
                        <input type="text" class="form-control" id="cidade" name="cidade" value="{{ old('cidade') }}" required placeholder="Nome da Cidade">

                        @if ($errors->has('cidade'))
                            <span class="help-block">
                                <strong>{{ $errors->first('cidade') }}</strong>
                            </span>
                        @endif
                    </div>

                    <!-- ESTADO -->
                    <div class="form-group col-md-4">
                        <label for="estado">Estado</label>
                        <select id="estado" name="estado" class="form-control" required>
                            <option value="">Selecione</option>
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
                        @if ($errors->has('estado'))
                            <span class="help-block">
                                <strong>{{ $errors->first('estado') }}</strong>
                            </span>
                        @endif
                    </div>

                    <!-- CEP -->
                    <div class="form-group col-md-2">
                        <label for="cep">CEP</label>
                        <input type="text" class="form-control" id="cep" name="cep" value="{{ old('cep') }}"  data-mask="00000-000" required placeholder="00000-000">

                        @if ($errors->has('cep'))
                            <span class="help-block">
                                <strong>{{ $errors->first('cep') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="form-row">
                <!-- SENHA -->
                <div class="form-group col-md-6">
                    <label for="senha">Senha</label>
                    <input type="password" class="form-control" id="senha" name="password" value="{{ old('senha') }}" placeholder="Senha">
                </div>

                <!-- CONFIRMAR SENHA -->
                <div class="form-group col-md-6">
                    <label for="confimasenha">Confirme a senha</label>
                    <input type="password" class="form-control" id="confimasenha" name="password_confirmation" placeholder="Confirmar a senha">
                </div>
            </div>
            <button type="submit" class="btn btn-outline-primary">Salvar</button>
        </form>
    </div>
@endsection
