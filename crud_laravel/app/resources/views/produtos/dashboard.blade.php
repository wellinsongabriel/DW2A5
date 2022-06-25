@extends('layouts.main')
@section('title', 'VCNAMODA')
@section('conteudo')



<section class="py-5 bg-light">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="container px-4 px-lg-5 mt-5">
            <h2 class="fw-bolder mb-4">Produtos que você adicionou</h2>   
        
        @include('layouts.listagem')
    </div>
    </div>
</section>

    
@endsection
