@extends('layout')

@section('conteudo')

    <h2 class="text-center mt-5"><strong>{{ $nota->titulo }}</strong></h2>

    <div class="col col-12 col-md-8 offset-md-2 mt-3">
        <textarea readonly class="form-control" id="nota" name="nota" rows="10">{{ $nota->nota }}</textarea>
    </div>

    <div class="col col-12 col-md-8 offset-md-2 d-flex justify-content-end mb-3">
        <small><b>Autor:</b> {{ $autor->nome }} - <b>Ultima alteração:</b> {{ $nota->getAlteracao() }}</small>
    </div>
    <div class="col col-12 col-md-8 offset-md-2 d-flex justify-content-end">
        <a href="/" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Voltar</a>
        <a href="/" class="btn btn-warning"><i class="far fa-edit" aria-hidden="true"></i> Editar</a>
    </div>
</form>

@endsection
