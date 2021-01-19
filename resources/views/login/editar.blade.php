@extends('login.layout')

@section('conteudo')

@if ($request->session()->has('flash'))
<div class="col col-12 col-md-8 offset-md-2 mt-2 alert alert-{{ $request->session()->get('alert') }}" role="alert">{{ $request->session()->get('flash') }}</div>
@endif

<div class="col col-12 mt-5 pt-3 pb-3">
    <h2 class="text-center"><strong>Editar Usuário</strong></h2>
    <form action="/usuario/editar" method="POST">
        @csrf
        <div class="col col-12 col-md-8 offset-md-2 mt-3 mb-3">
            <label for="nameEdit" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nameEdit" name="name" value="{{ $request->user()->name }}" required>
        </div>

        <div class="col col-12 col-md-8 offset-md-2 mt-3 mb-3">
            <label for="emailEdit" class="form-label">Email</label>
            <input type="email" class="form-control" id="emailEdit" name="email" value="{{ $request->user()->email }}" readonly>
        </div>

        <div class="col col-12 col-md-8 offset-md-2 mt-3 mb-3">
            <label for="passwordEdit" class="form-label">Senha</label>
            <input type="password" class="form-control" id="passwordEdit" name="password" placeholder="Senha">
        </div>
        <div class="col col-12 col-md-8 offset-md-2 mt-3 mb-3">
            <label for="passwordConfirmar" class="form-label">Confirme</label>
            <input type="password" class="form-control" id="passwordConfirmar" name="password_confirmation" placeholder="Confirme sua senha">
        </div>

        <div class="col col-12 col-md-8 offset-md-2 d-flex justify-content-end">
            <a href="/" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Voltar</a>
            <button type="submit" class="btn btn-warning"><i class="far fa-edit"></i></i> Editar</button>
        </div>

    </form>
</div>

@endsection
