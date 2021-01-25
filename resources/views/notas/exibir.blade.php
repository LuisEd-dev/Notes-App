@extends('layout')

@section('conteudo')

    <h2 class="text-center mt-5"><strong>{{ $nota->titulo }}</strong></h2>

    <div class="col col-12 col-md-8 offset-md-2 d-flex justify-content-end">
        <div class="btn-group" role="group" aria-label="Basic example">
            @if (!Str::contains($request->url(), 'markdown'))
                <a href="{{ Str::before($request->url(), '/markdown')}}"class="btn btn-primary" id="text-html">Texto</button>
                <a href="{{ $request->url() }}/markdown" class="btn btn-secondary" id="markdown">MarkDown</a>
            @else
                <a href="{{ Str::before($request->url(), '/markdown')}}"class="btn btn-secondary" id="text-html">Texto</button>
                <a href="{{ $request->url() }}/markdown" class="btn btn-primary" id="markdown">MarkDown</a>
            @endif
        </div>
    </div>

    @if (!Str::contains($request->url(), 'markdown'))
        <div class="col col-12 col-md-8 offset-md-2 mt-3">
            <textarea readonly class="form-control" id="nota" name="nota" rows="10">{{ $nota->nota }}</textarea>
        </div>
    @else
        <div class="col col-12 col-md-8 offset-md-2 mt-3 border border-gray rounded bg-light">
            <div class="mx-2">
                {!! $nota->nota !!}
            </div>

        </div>
    @endif

    <div class="col col-12 col-md-8 offset-md-2 d-flex justify-content-end mb-3">
        <small><b>Autor:</b> {{ $autor->name }} - <b>Ultima alteração:</b> {{ $nota->getAlteracao() }}</small>
    </div>
    <div class="col col-12 col-md-8 offset-md-2 d-flex justify-content-end">
        <a href="/home" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Voltar</a>
    </div>

@endsection
