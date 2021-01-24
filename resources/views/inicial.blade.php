@extends('layout')

@section('conteudo')

<div class="row">
    <div class="col col-12 col-lg-8 offset-2 mt-5 pb-3">
        <div class="col col-12 border rounded">
            <h2 class="text-center mt-4 mb-4">
                <i class="fas fa-sticky-note"></i> Notes App
            </h2>
            <h6 class="text-center">Projetado para você guardar suas anotações pessoais</h6>
            <hr class="my-4 col-10 offset-1">
            <p class="h5 text-justify col-10 offset-1">
                Aqui você pode armazenar todas suas observações, lembretes, listas, etc. <br>
                Com o controle de usuários, somente os autores poderão ver, editar e apagar suas próprias notas.<br>
            </p>
            <div class="col-2 offset-9 d-flex justify-content-end mb-3">
                <a href="/home" class="btn btn-success btn-block"> Home <i class="fas fa-arrow-right"></i></a>
            </div>
            <a class="text-decoration-none text-center" href="https://github.com/luised-dev" target="__blank"><h4><i class="fab fa-github"></i> /luised-dev</h4></a>
        </div>
    </div>
</div>

@endsection
