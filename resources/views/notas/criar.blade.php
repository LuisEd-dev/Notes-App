@extends('layout')

@section('conteudo')

<form action="/criar" method="POST">
    @csrf
    <div class="mt-3 mb-3">
        <label for="titulo" class="form-label">Título</label>
        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título da Nota">
    </div>

    <div class="mb-3">
        <label for="nota" class="form-label">Nota</label>
        <textarea class="form-control" id="nota" name="nota" rows="3" placeholder="Conteúdo da Nota"></textarea>
    </div>

    <div class="d-flex flex-row-reverse">
        <button type="submit" class="btn btn-success"><i class="fas fa-pencil-alt"></i> Salvar Nota</button>
    </div>

</form>

@endsection
