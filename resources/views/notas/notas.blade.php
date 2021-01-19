@extends('layout')

@section('conteudo')

@if($request->session()->has('flash'))
<div class="col col-10 offset-1 mt-2 alert alert-success text-center" role="alert">{{ $request->session()->get('flash') }}</div>
@endif

<div class="row mt-3 mb-3">

    <div class="col col-6 text-center">
        <a class="btn btn-success" href="/criar">
            <i class="fas fa-plus"></i> Nova Nota
        </a>
    </div>
    <div class="col col-6 text-center">
        <span class="btn btn-outline-primary">
            <i class="fas fa-bars"></i> Total de Notas: {{ $notas->count() }}
        </span>
    </div>

</div>

<div class="row">
    @foreach ($notas as $nota)
        <div class="col col-12 col-md-6 col-lg-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <a href="/nota/{{ $nota->id }}" style="text-decoration: none"><h5 class="card-title link">{{ $nota->titulo }}</h5></a>
                    <p class="card-text mb-4" style="height: 100px">
                        @if(Str::length($nota->nota) > 200)
                            {{ Str::substr($nota->nota, 0, 205) }}
                            <a style="text-decoration: none" href="/nota/{{ $nota->id }}"> (...)</a>
                        @else
                            {{ $nota->nota }}
                        @endif
                    </p>
                    <div class="mt-2 mb-2 d-flex justify-content-end">
                        <a href="/nota/{{ $nota->id }}/editar" class="btn btn-sm btn-primary"><i class="far fa-edit"></i> Editar</a>
                        <a href="/apagar/{{ $nota->id }}" class="btn btn-sm btn-danger" style="margin-left: 5px"><i class="fas fa-eraser"></i> Apagar</a>
                    </div>
                    <div class="mt-2 mb-2 d-flex justify-content-end">
                        <small>Ultima alteração: {{ $nota->getAlteracao() }}</small>
                    </div>
                </div>

            </div>
        </div>
    @endforeach

</div>


@endsection
