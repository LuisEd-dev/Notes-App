@extends('login.layout')

@section('conteudo')

<form action="/entrar" method="POST">
        @csrf
        <div class="col col-6 offset-3 mt-3 mb-3">
            <label for="titulo" class="form-label">Email</label>
            <input type="email" class="form-control" id="titulo" name="email" placeholder="Endereço de e-mail" required>
        </div>

        <div class="col col-6 offset-3 mb-3">
            <label for="nota" class="form-label">Senha</label>
            <input type="password" class="form-control" id="nota" name="pass" placeholder="Senha" required>
        </div>

        <div class="col col-9 d-flex flex-row-reverse">
            <button type="submit" class="btn btn-success"><i class="fas fa-pencil-alt"></i> Entrar</button>
        </div>

    </div>

</form>

@endsection
