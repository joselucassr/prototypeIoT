@extends('layouts.navbar')

@section('content')
    <div class="container" style="margin-top: 50px">
        <h2 class="text-center">Editar Cadastro</h2>
        <form>
            <!-- Empresa -->
            <div class="form-empresa">
                <h3>Empresa</h3>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nomeempresa">Nome Empresa</label>
                        <input type="text" class="form-control" id="nomeempresa" placeholder="Nome da empresa">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="cnpj">CNPJ</label>
                        <input type="number" class="form-control" id="cnpj" placeholder="XX.XXX.XXX/XXXX-XX">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="emailempresa">Email</label>
                        <input type="email" class="form-control" id="emailempresa" placeholder="email@empresa.com">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="telefoneempresa">Telefone</label>
                        <input type="tel" class="form-control" id="telefoneempresa" placeholder="(00)0000-0000">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="telefone2">Telefone 2</label>
                        <input type="tel" class="form-control" id="telefone2" placeholder="(00)00000-0000">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="cidade">Cidade</label>
                        <input type="text" class="form-control" id="cidade">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="estado">Estado</label>
                        <select id="estado" class="form-control">
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
                    </div>
                    <div class="form-group col-md-2">
                        <label for="cep">CEP</label>
                        <input type="text" class="form-control" id="cep" placeholder="00000-000">
                    </div>
                </div>
            </div>

            <!-- Responsável Legal -->
            <div class="form-empresa">
                <h3>Responsável</h3>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" placeholder="Nome Completo">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="cpf">CPF</label>
                        <input type="number" class="form-control" id="cpf" placeholder="XXX.XXX.XXX-XX">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="emailresponsavel">Email</label>
                        <input type="email" class="form-control" id="emailresponsavel" placeholder="email@email.com">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="telefoneresponsavel">Telefone</label>
                        <input type="tel" class="form-control" id="telefoneresponsavel" placeholder="(00)0000-0000">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="celular">Celular</label>
                        <input type="tel" class="form-control" id="celular" placeholder="(00)00000-0000">
                    </div>
                </div>
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">Gênero</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" id="masculino" value="1" checked>
                                <label class="form-check-label" for="masculino">
                                    Masculino
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" id="feminino" value="2">
                                <label class="form-check-label" for="feminino">
                                    Feminino
                                </label>
                            </div>
                            <div class="form-check disabled">
                                <input class="form-check-input" type="radio" name="gridRadios" id="outro" value="3">
                                <label class="form-check-label" for="outro">
                                    Outro
                                </label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="senha">Senha</label>
                        <input type="password" class="form-control" id="senha" placeholder="Senha">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="confimasenha">Confirme a senha</label>
                        <input type="password" class="form-control" id="confimasenha" placeholder="Confirmar a senha">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-outline-primary float-right">Salvar</button>
        </form>
    </div>
@endsection
