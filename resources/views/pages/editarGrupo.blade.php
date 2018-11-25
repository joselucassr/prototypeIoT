@extends('layouts.navbar')

@section('content')
    <!-- Formulário -->

    <div class="container" style="margin-top: ;: 20px;">
        <!-- GRUPO -->
        <div class="col-md-6 mx-auto">
            <form>
                <h3>Editar Grupo</h3>
                <div class="form-group">
                    <label for="nomegrupo">Nome Grupo</label>
                    <input type="text" class="form-control" id="nomegrupo" placeholder="Nome do Grupo">
                </div>
                <div class="form-group">
                    <label for="descricao">Example textarea</label>
                    <textarea class="form-control" id="descricao" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-outline-primary">Salvar</button>
            </form>
        </div>
    </div>
@endsection
