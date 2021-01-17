@extends('layout')

@section('conteudo')

<div class="row mt-3 mb-3">

    <div class="col col-6 text-center">
        <a class="btn btn-success" href="/criar">
            Nova Nota
        </a>
    </div>
    <div class="col col-6 text-center">
        <span class="btn btn-primary">
            Total de Notas: {{ $notas->count() }}
        </span>
    </div>

</div>

<div class="row">
    @foreach ($notas as $nota)
        <div class="col col-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $nota->titulo }}</h5>
                    <p class="card-text mb-4" style="height: 100px">
                        @if(Str::length($nota->nota) > 200)
                            {{ Str::substr($nota->nota, 0, 205) }}
                            <a style="text-decoration: none" href="/nota/{{ $nota->id }}"> (...)</a>
                        @else
                            {{ $nota->nota }}
                        @endif
                    </p>
                    <div class="mt-2 mb-2 d-flex flex-row-reverse">
                        <a href="/apagar/{{ $nota->id }}" class="btn btn-sm btn-danger" style="margin-left: 5px"><i class="fas fa-eraser"></i> Apagar</a>
                        <a href="#" class="btn btn-sm btn-primary"><i class="far fa-edit"></i> Editar</a>
                    </div>
                    <div class="mt-2 mb-2 d-flex flex-row-reverse">
                        <small>Ultima alteração: {{ $nota->getAlteracao() }}</small>
                    </div>
                </div>

            </div>
        </div>
    @endforeach

</div>


@endsection
