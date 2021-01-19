@extends('layout')

@section('conteudo')

<form action="/criar" method="POST">
    @csrf
    <h2 class="text-center mt-5"><strong>Nova Nota</strong></h2>
    <div class="col col-12 col-md-8 offset-md-2 mt-3 mb-3">
        <label for="titulo" class="form-label">Título</label>
        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título da Nota">
    </div>

    <div class="col col-12 col-md-8 offset-md-2 mb-3">
        <label for="nota" class="form-label">Nota</label>
        <textarea class="form-control" id="nota" name="nota" rows="3" placeholder="Conteúdo da Nota"></textarea>
    </div>

    <div class="col col-12 col-md-8 offset-md-2 d-flex justify-content-end">
        <a href="/" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Cancelar</a>
        <button type="submit" class="btn btn-success" style="margin-left: 5px"><i class="fas fa-pencil-alt"></i> Salvar Nota</button>
    </div>
</form>

@endsection
