@extends('layouts.navbar')

@section('content')

        @if (count($data['responsavel']) > 0)

            <div class="container col-12" style="padding-bottom: 50px; margin-top: 20px">
                <div class="col-12 " style="padding: 0;">
                    <h1 class="text-center">Meus Usuários</h1>
                </div>
                <div class="col-12 " style="padding-right: 40px;">
                    <a href="/responsavel/create" class="btn btn-outline-info float-right ">Adicionar Usuário</a>
                </div>
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
                                    <th scope="col">Permissão</th>
                                    <th scope="col">Editar</th>
                                    <th scope="col">Excluir</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($data['responsavel'] as $responsavel)
                                    <tr>
                                        <td>{{$responsavel -> nome_responsavel}}</td>
                                        <td>{{$responsavel -> email_responsavel}}</td>
                                        <td>{{$responsavel -> cpf}}</td>
                                        <td>{{$responsavel -> telefone_responsavel}}</td>
                                        <td>{{$responsavel -> celular_responsavel}}</td>
                                        <td>{{$responsavel -> celular_responsavel}}</td>

                                        <td><a href="/responsavel/{{$responsavel -> id_responsavel}}/edit" class="gray-link" style="font-size: 20px;"><i class="far fa-edit"></i></a></td>
                                        <td>
                                            <div style="padding-right: 45px;">
                                                {!! Form::open(['action' => ['ResponsavelController@destroy', $responsavel -> id_responsavel], 'method' => 'POST', 'class' => 'float-right', 'onclick' => "return confirm('Você tem certeza que quer REMOVER esse usuário?');"]) !!}
                                                    {{Form::hidden('_method', 'DELETE')}}
                                                    {{Form::button('<i class="fas fa-trash-alt"></i>', ['class' => 'btn btn-outline-danger', 'type' => 'submit', 'style' => 'border: none'])}}
                                                {!! Form::close() !!}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                             </table>
                        </div>
                    </div>

                </div>
            </div>

    @else
        <div class="alert alert-info col-12 text-center mx-auto" role="alert">
            Você não possui nenhum usuário, clique  <a href="responsavel/create" class="alert-link">aqui</a> para adicionar um.
        </div>
    @endif

@endsection


