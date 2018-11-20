@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-6 mx-auto formCard">
        <h1 class="col-12">Login</h1>
        <form>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control"placeholder="Digite o email">
            </div>
            <div class="form-group">
                <label>Senha</label>
                <input type="password" name="senha" class="form-control"placeholder="Senha">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
            <a href="#" class="btn btn-success float-right">Registrar</a>
        </form>
    </div>
</div>
@endsection
