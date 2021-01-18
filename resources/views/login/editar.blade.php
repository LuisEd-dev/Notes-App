@extends('login.layout')

@section('conteudo')

<div class="col col-12 mt-5 pt-3 pb-3">
    <h2 class="text-center"><strong>Editar Usuário</strong></h2>
    <form action="/entrar" method="POST">
        @csrf
        <div class="col col-10 offset-1 mt-3 mb-3">
            <label for="nameEdit" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nameEdit" name="name" value="{{ $usuario->name }}">
        </div>

        <div class="col col-10 offset-1 mt-3 mb-3">
            <label for="emailEdit" class="form-label">Email</label>
            <input type="email" class="form-control" id="emailEdit" name="email" value="{{ $usuario->email }}" readonly>
        </div>

        <div class="col col-10 offset-1 mt-3 mb-3">
            <label for="passwordEdit" class="form-label">Senha</label>
            <input type="password" class="form-control" id="passwordEdit" name="password" placeholder="Senha">
        </div>

        <div class="col col-10 offset-1 d-flex justify-content-end">
            <button type="submit" class="btn btn-warning"><i class="far fa-edit"></i></i> Editar</button>
        </div>

    </form>
</div>

@endsection
