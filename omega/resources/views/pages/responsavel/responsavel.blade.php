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
                        @foreach($data['responsavel'] as $responsavel)
                            <tr>
                                <td>{{$responsavel -> nome_responsavel}}</td>
                                <td>{{$responsavel -> email_responsavel}}</td>
                                <td>{{$responsavel -> cpf}}</td>
                                <td>{{$responsavel -> telefone_responsavel}}</td>
                                <td>{{$responsavel -> celular_responsavel}}</td>
                                <td>
                                    @if($responsavel -> genero == 1)
                                        {{$genero = 'Masculino'}}
                                    @elseif($responsavel -> genero == 2)
                                        {{$genero = 'Feminino'}}
                                    @else
                                        {{$genero = 'Outro'}}
                                    @endif
                                </td>
                                <td><a href="/responsavel/{{$responsavel -> id_responsavel}}/edit" class="gray-link" style="font-size: 20px;"><i class="far fa-edit"></i></a></td>
                                <td>
                                    {!! Form::open(['action' => ['ResponsavelController@destroy', $responsavel -> id_responsavel], 'method' => 'POST', 'class' => 'float-right', 'onclick' => "return confirm('Você tem certeza que quer REMOVER esse usuário?');"]) !!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::button('<i class="fas fa-trash-alt"></i>', ['class' => 'btn btn-outline-danger', 'type' => 'submit', 'style' => 'border: none'])}}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                     </table>
                </div>
            </div>

        </div>
    <div class="row col-12 mx-auto">
        <a href="/responsavel/create" class="btn btn-outline-primary">Adicionar Usuário</a>
    </div>

    </div>
@endsection

