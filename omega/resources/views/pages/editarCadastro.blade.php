@extends('layouts.navbar')

@section('content')
    <div class="container">
        <h2 class="text-center">Editar Cadastro</h2>
        <form method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}

        <!-- Empresa -->
            <div class="form-empresa">
                <h3>Empresa</h3>
                <div class="form-row">
                    <!-- NOME DA EMPRESA -->
                    <div class="form-group{{ $errors->has('nomeempresa') ? ' has-error' : '' }} col-md-6">
                        <label for="nome_empresa">Nome Empresa</label>
                        <input id="nome_empresa" type="text" class="form-control" name="nome_empresa" value="{{ $user -> nome_empresa}}" required autofocus placeholder="Nome da empresa">

                        @if ($errors->has('nome_empresa'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nome_empresa') }}</strong>
                            </span>
                        @endif
                    </div>

                    <!-- CNPJ -->
                    <div class="form-group col-md-6">
                        <label for="cnpj">CNPJ</label>
                        <input type="text" class="form-control" id="cnpj" name="cnpj" value="{{ old('cnpj') }}" data-mask="00.000.000/0000-00"    required placeholder="00.000.000/0000-00">

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
                        <label for="telefone_1_empresa">Telefone</label>
                        <input type="tel" class="form-control" id="telefone_1_empresa" name="telefone_1_empresa" value="{{ old('telefone_1_empresa') }}" data-mask="(00) 0000-0000" required placeholder="(00) 0000-0000">

                        @if ($errors->has('telefone_1_empresa'))
                            <span class="help-block">
                                <strong>{{ $errors->first('telefone_1_empresa') }}</strong>
                            </span>
                        @endif
                    </div>

                    <!-- TELEFONE 2 -->
                    <div class="form-group col-md-3">
                        <label for="telefone_2_empresa">Celular</label>
                        <input type="tel" class="form-control" id="telefone_2_empresa" name="telefone_2_empresa" value="{{ old('telefone_2_empresa') }}" data-mask="(00) 00000-0000" required placeholder="(00) 00000-0000">

                        @if ($errors->has('telefone_2_empresa'))
                            <span class="help-block">
                                <strong>{{ $errors->first('telefone_2_empresa') }}</strong>
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

            <!-- Responsável Legal -->
            <div class="form-empresa">
                <h3>Responsável</h3>
                <div class="form-row">
                    <!-- NOME RESPONSÁVEL -->
                    <div class="form-group col-md-6">
                        <label for="nome_responsavel">Nome</label>
                        <input type="text" class="form-control" id="nome_responsavel" name="nome_responsavel" value="{{ old('nome_responsavel') }}" required placeholder="Nome Completo">

                        @if ($errors->has('nome_responsavel'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nome_responsavel') }}</strong>
                            </span>
                        @endif
                    </div>

                    <!-- CPF -->
                    <div class="form-group col-md-6">
                        <label for="cpf">CPF</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" value="{{ old('cpf') }}" data-mask="000.000.000-00"  required placeholder="000.000.000-00">

                        @if ($errors->has('cpf'))
                            <span class="help-block">
                                <strong>{{ $errors->first('cpf') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-row">
                    <!-- EMAIL DO RESPONSÁVEL -->
                    <div class="form-group col-md-6">
                        <label for="email_responsavel">Email</label>
                        <input type="email" class="form-control" id="email_responsavel" name="email_responsavel" value="{{ old('email_responsavel') }}" required placeholder="email@email.com">

                        @if ($errors->has('email_responsavel'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email_responsavel') }}</strong>
                            </span>
                        @endif
                    </div>

                    <!-- TELEFONE RESPOSÁVEL -->
                    <div class="form-group col-md-3">
                        <label for="telefone_responsavel">Telefone</label>
                        <input type="tel" class="form-control" id="telefone_responsavel" name="telefone_responsavel" value="{{ old('telefone_responsavel') }}" data-mask="(00) 0000-0000" placeholder="(00)0000-0000">

                        @if ($errors->has('telefone_responsavel'))
                            <span class="help-block">
                                <strong>{{ $errors->first('telefone_responsavel') }}</strong>
                            </span>
                        @endif
                    </div>

                    <!-- CELULAR RESPONSÁVEL -->
                    <div class="form-group col-md-3">
                        <label for="celular_responsavel">Celular</label>
                        <input type="tel" class="form-control" id="celular_responsavel" name="celular_responsavel" value="{{ old('celular_responsavel') }}" data-mask="(00) 00000-0000" required placeholder="(00)00000-0000">

                        @if ($errors->has('celular_responsavel'))
                            <span class="help-block">
                                <strong>{{ $errors->first('celular_responsavel') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <fieldset class="form-group">
                    <!-- GÊNERO -->
                    <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">Gênero</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="genero" id="masculino" value="1">
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
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="genero" id="outro" value="3">
                                <label class="form-check-label" for="outro">
                                    Outro
                                </label>
                            </div>

                            @if ($errors->has('genero'))
                                <span class="help-block">
                                <strong>{{ $errors->first('genero') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </fieldset>

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
            </div>
            <button type="submit" class="btn btn-outline-primary">Salvar</button>
        </form>
    </div>
@endsection
