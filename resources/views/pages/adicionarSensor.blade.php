@extends('layouts.navbar')

@section('content')
    <div class="container mx-auto" style="margin-top: ;: 20px;">
        <!-- GRUPO -->
        <div class="col-md-6 mx-auto">
            <form>
                <h3>Adicionar Sensor</h3>
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" placeholder="Nome do Sensor">
                </div>
                <div class="form-group">
                    <label for="descricao">ID</label>
                    <input type="number" class="form-control" id="id" placeholder="00000000000">
                </div>
                <div class="form-row">
                    <div class="form-group col-6">
                        <label for="descricao">Temperatura Mínima</label>
                        <input type="number" class="form-control" id="tempminima" placeholder="-X °C">
                    </div>
                    <div class="form-group col-6">
                        <label for="descricao">Temperatura Máxima</label>
                        <input type="number" class="form-control" id="tempmaxima" placeholder="X °C">
                    </div>
                </div>
                <div class="form-group">
                    <label for="descricao">Example textarea</label>
                    <textarea class="form-control" id="descricao" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-outline-primary">Adicionar</button>
            </form>
        </div>
    </div>
@endsection
