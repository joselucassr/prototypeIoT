@extends('layouts.navbar')

@section('content')
    <div class="container" style="margin-top:20px;">
        <div class="row">
            <!-- GRUPO -->
            <div class="col-md-6">
                <form>
                    <h3>Adicionar Grupo</h3>
                    <div class="form-group col">
                        <label for="nomegrupo">Nome Grupo</label>
                        <input type="text" class="form-control" id="nomegrupo" placeholder="Nome do Grupo">
                    </div>
                    <div class="form-group col">
                        <label for="descricao">Example textarea</label>
                        <textarea class="form-control" id="descricao" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Salvar</button>
                </form>
            </div>

            <!-- SENSORES -->
            <div class="col-md-6">
                <form>
                    <h3>Adicionar Sensores</h3>
                    <div class="form-group col">
                        <label for="nomegrupo">Nome Sensor</label>
                        <input type="text" class="form-control" id="nomesensor" placeholder="Nome do Grupo">
                    </div>
                    <div class="form-group col">
                        <label for="descricao">Example textarea</label>
                        <input type="number" class="form-control" id="id" placeholder="00000000000">
                    </div>
                    <button type="submit" class="btn btn-outline-primary float-right">Adicionar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
