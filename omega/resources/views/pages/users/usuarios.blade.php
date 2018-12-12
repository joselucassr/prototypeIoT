@extends('layouts.navbar')

@section('content')
    <div class="container col-12" style="padding-bottom: 50px; margin-top: 20px">
        <h1 class="text-center">Meus Usuários</h1>
        <div class="row col-12 mx-auto" style="padding: 0;">
            <div class="col-12" style="margin-top: 20px">
                <div class="col-12">
                    <table class="table table-striped text-center table-responsive-lg">
                        <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">CPF</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Celular</th>
                            <th scope="col">Gênero</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Excluir</th>
                        </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>{{$users -> nome}}</td>
                                <td>6</td>
                                <td>3</td>
                                <td>1</td>
                                <td>0</td>
                                <td>Ativo</td>
                                <--Botões de editar e excluir-->
                                <td><a href="" class="gray-link" style="font-size: 20px;"><i class="far fa-edit"></i></a></td>
                                <td><a href="" class="gray-link"><i class="far fa-trash-alt"></i></a></td>
                            </tr>

                        </tbody>
                     </table>
                </div>
            </div>

        </div>
    <div class="row col-12 mx-auto">
        <button type="button" class="btn btn-outline-primary">Adicionar Usuário</button>
    </div>

    </div>
@endsection


