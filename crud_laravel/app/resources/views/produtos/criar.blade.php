@extends('layouts.main')
@section('title', 'VCNAMODA')
@section('conteudo')
    <!-- Product section-->

    @if ($acao=='criar')
    <section class="py-5">
        <form action="/produtos" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container px-4 px-lg-5 my-5">
                <h1 class="display-6 fw-bolder">Informações do produto</h1>
                <hr>
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-3"><img id="foto" class="card-img-top mb-2 mb-md-0"
                            src="https://dummyimage.com/300x400/dee2e6/6c757d.jpg" alt="..." />
                        <!-- Escolher imagem-->

                    </div>
                    <div class="col-md-6">
                        <label for="title">Código do produto </label>
                        <input type="text" class="form-control" id="id" name="id"
                            placeholder="Informe um código númerico inteiro">


                        <label for="title">Tipo do produto </label>
                        <input type="text" class="form-control" id="tipo" name="tipo"
                            placeholder="Exemplo Camiseta, calça, blusa... ">

                        <label for="title">Marca do produto </label>
                        <input type="text" class="form-control" id="marca" name="marca"
                            placeholder="Informe a marca do produto">

                        <div class="form-group">
                            <label for="title">Tamanhos disponíveis </label>
                            <div class="form-group">
                                <input type="checkbox" name="tamanho[]" value="P"> P
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="tamanho[]" value="M"> M
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="tamanho[]" value="G"> G
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="tamanho[]" value="GG"> GG
                            </div>
                        </div>
                        <label for="title">Preço do produto </label>
                        <input type="number" step="0,01" class="form-control" id="preco" name="preco"
                            placeholder="Informe o valor do produto">
                    </div>
                </div>
            </div>
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-3">
                        <input type="file" class="form-control-file" id="imagem" name="imagem">
                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-3">
                        <input type="submit" class="btn btn-primary" value="Adicionar produto">
                    </div>
                </div>
                <hr>
            </div>
        </form>
    </section>
    @endif
    @if ($acao=='editar')
    <section class="py-5">
        <form action="/produtos/update/{{$produto->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container px-4 px-lg-5 my-5">
                <h1 class="display-6 fw-bolder">Informações do produto</h1>
                <hr>
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-3"><img id="foto" class="card-img-top mb-2 mb-md-0"
                            src="/images/produtos/{{$produto->imagem}}" alt="..." />
                        <!-- Escolher imagem-->

                    </div>
                    <div class="col-md-6">
                        
                        <label for="title">Tipo do produto </label>
                        <input type="text" class="form-control" id="tipo" name="tipo"
                            placeholder="Exemplo Camiseta, calça, blusa... " value="{{$produto->tipo}}">

                        <label for="title">Marca do produto </label>
                        <input type="text" class="form-control" id="marca" name="marca"
                            placeholder="Informe a marca do produto" value="{{$produto->marca}}">

                        <div class="form-group">
                            <label for="title">Tamanhos disponíveis </label>
                            <div class="form-group">
                                <input type="checkbox" name="tamanho[]" value="P"> P
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="tamanho[]" value="M"> M
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="tamanho[]" value="G"> G
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="tamanho[]" value="GG"> GG
                            </div>
                        </div>
                        <label for="title">Preço do produto </label>
                        <input type="number" step="0,01" class="form-control" id="preco" name="preco"
                            placeholder="Informe o valor do produto" value="{{$produto->preco}}">
                    </div>
                </div>
            </div>
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-3">
                        <input type="file" class="form-control-file" id="imagem" name="imagem">
                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-3">
                        <input type="submit" class="btn btn-primary" value="Salvar alterações">
                    </div>
                </div>
                <hr>
            </div>
        </form>
    </section>

    @endif
    <!-- Related items section-->
    <section class="py-5 bg-light">
        <div class="container px-4 px-lg-5 mt-5">
            <h2 class="fw-bolder mb-4">Produtos que você adicionou</h2>
            @include('layouts.listagem')
        </div>
        </div>
    </section>
@endsection
