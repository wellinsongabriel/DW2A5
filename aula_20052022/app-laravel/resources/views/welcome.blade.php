@extends('layouts.main')
@section('title', 'WCG Eventos')
@section('content')

<div id="search-container" class="col-md-12">
    <h1>Busque um evento</h1>
    <form action="">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procuarar">
    </form>
</div>
<div id="events-container" class="cold-md-12">
    <h2>Próximos Eventos</h2>
    <p class="subtitle">Veja os eventos dos próximos dias</p>
    <div id="cards-container" class="row">
        @foreach ($eventos as $evento)
            <div class="card col-md-3">
                <img src="/img/banner.jpg" alt="{{$evento->titulo}}">
                <div class="card-body">
                    <p class="card-date">21/05/2022</p>
                    <h5 class="card-title">{{$evento->titulo}}</h5>
                    <p class="card-participantes">X participantes</p>
                    <a href="#" class="btn btn-primary">Saber mais</a>
                </div>
            </div>
        @endforeach
    </div>
</div>

{{-- @foreach($eventos as $evento)

    <p>{{$evento->titulo}} -- {{$evento->descricao}}</p>
@endforeach --}}


@endsection
{{-- <h1>algum titulo</h1>
<img src="/img/banner.jpg" alt="Banner" width="100%">
@if(10>55)
<p>condição verdadeira</p>
@endif
<p>{{$nome}}</p>
@if($nome=="João")
    <p>O nome é João</p>
@elseif ($nome=="Wellinson")
        <p>O nome é {{$nome}}, tem {{$idade}} anos e é {{$profissao}}</p>
@else    
    <p>O nome não é Pedro</p>        
@endif

@for($i = 0; $i < count($arr); $i++)
        <p>{{$arr[$i]}} - {{$i}}</p>
        @if($i == 2)
            <p>O i é 2</p>
        @endif
@endfor

@foreach($nomes as $nome)
    <p>{{$loop->index}}</p>
    <p>{{$nome}}</p>
@endforeach

@php
    $name = "João";
    echo $name;
@endphp
<!--Comentário do HTML-->
Comentário com blade --}}
