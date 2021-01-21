@extends('layout')

@section('conteudo')

@if ($request->session()->has('flash'))
<div class="col col-10 offset-1 mt-2 alert alert-{{ $request->session()->get('alert') }} text-center" role="alert">{{ $request->session()->get('flash') }}</div>
@endif


<h2 class="text-center mt-5"><strong>Editar Nota</strong></h2>
<form method="POST" onsubmit="return confirm('Tem certeza que deseja editar {{ addslashes($nota->titulo) }}?')">
        @csrf
        <input type="hidden" value="{{ $nota->id }}" name="id">
        <div class="col col-12 col-md-8 offset-md-2 mt-3 mb-3">
            <label for="titulo" class="form-label">Titulo</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $nota->titulo }}" required>
        </div>

        <div class="col col-12 col-md-8 offset-md-2 mt-3 mb-3">
            <label for="emailEdit" class="form-label">Nota</label>
            <textarea class="form-control" id="nota" name="nota" rows="10">{{ $nota->nota }}</textarea>
        </div>

        <div class="col col-12 col-md-8 offset-md-2 d-flex justify-content-end mb-3">
            <small><b>Autor:</b> {{ $autor->name }} - <b>Ultima alteração:</b> {{ $nota->getAlteracao() }}</small>
        </div>

        <div class="col col-12 col-md-8 offset-md-2 d-flex justify-content-end">
            <a href="/" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Voltar</a>
            <a href="/apagar/{{ $nota->id }}" class="btn btn-danger margin-left" onclick="return confirm('Tem certeza que deseja excluir {{ addslashes($nota->titulo) }}?')"><i class="fas fa-eraser"></i> Apagar</a>
            <button type="submit" class="btn btn-warning margin-left"><i class="far fa-edit"></i></i> Editar</button>
        </div>
</form>

@endsection
