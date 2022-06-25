@extends('layouts.main')
@section('title', 'VCNAMODA')
@section('conteudo')
    <section class="py-5">
        <hr>
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-4"><img class="card-img-top mb-3 mb-md-0" src="/images/produtos/{{ $produto->imagem }}"
                        alt="..." /></div>
                <div class="col-md-6">
                    <div class="small mb-1">Código: {{ $produto->id }}</div>
                    <h1 class="display-5 fw-bolder">{{ $produto->tipo }} - {{ $produto->marca }}</h1>
                    <h6>Tamanhos disponíveis</h6>
                    @foreach ($produto->tamanho as $t)
                        <li>{{ $t }}</li>
                    @endforeach
                    <div class="fs-5 mb-5">

                        <span>R$ {{ $produto->preco }}</span>
                        <p><u>Publicado por: </u><b>{{ $produtoOwner['name'] }}</b> </p>
                        
                        @php
                            
                        @endphp
                        @if ($eProprietario)
                        
                            <a href="/produtos/editar/{{ $produto->id }}" class="btn btn-warning">
                                <ion-icon name="create-outline"></ion-icon>  Editar produto  
                            </a> 
                                                   
                            <form action="/produtos/{{ $produto->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger delete-btn">
                                    <ion-icon name="trash-outline">Apagar produto</ion-icon>
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </section>
@endsection
