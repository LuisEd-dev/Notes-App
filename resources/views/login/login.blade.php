@extends('login.layout')

@section('conteudo')

@if($request->session()->has('flash'))
<div class="col col-10 offset-1 mt-2 alert alert-danger text-center" role="alert">
    {{ $request->session()->get('flash') }}
  </div>
@endif

<div class="row">
    <div class="col col-12 col-lg-6 mt-5 pt-3 pb-3">
        <h2 class="text-center"><strong>Entrar</strong></h2>
        <form action="/entrar" method="POST">
            @csrf

            <div class="col col-8 offset-2 mt-3 mb-3">
                <label for="emailLogin" class="form-label">Email</label>
                <input type="email" class="form-control" id="emailLogin" name="email" placeholder="Endereço de e-mail" required>
            </div>

            <div class="col col-8 offset-2 mt-3 mb-3">
                <label for="passwordLogin" class="form-label">Senha</label>
                <input type="password" class="form-control" id="passwordLogin" name="password" placeholder="Senha" required>
            </div>

            <div class="col col-8 offset-2 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Entrar</button>
            </div>

        </form>
    </div>

    <div class="col col-12 col-lg-6 mt-5 pt-3 pb-3">
        <h2 class="text-center"><strong>Registrar</strong></h2>
        <form action="/registrar" method="POST">
            @csrf

            <div class="col col-8 offset-2 mt-3 mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="name" placeholder="Nome" required>
            </div>

            <div class="col col-8 offset-2 mt-3 mb-3">
                <label for="emailRegistro" class="form-label">Email</label>
                <input type="email" class="form-control" id="emailRegistro" name="email" placeholder="Endereço de e-mail" required>
            </div>

            <div class="col col-8 offset-2 mt-3 mb-3">
                <label for="passwordRegistro" class="form-label">Senha</label>
                <input type="password" class="form-control" id="passwordRegistro" name="password" placeholder="Senha" required>
            </div>

            <div class="col col-8 offset-2 d-flex justify-content-end">
                <button type="submit" class="btn btn-success"><i class="fas fa-sign-in-alt"></i> Registrar</button>
            </div>

        </form>
    </div>
</div>


@endsection
