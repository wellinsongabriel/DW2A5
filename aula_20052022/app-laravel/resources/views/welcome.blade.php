@extends('layouts.main')
@section('title', 'WCG Eventos')
@section('content')

<div id="search-container" class="col-md-12">
    <h1>Busque um evento</h1>     
    <form action="/" method="GET">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procuarar">
    </form>
</div>
<div id="events-container" class="cold-md-12">
    @if ($search)
        <h2>Buscando por: {{$search}}</h2>
    @else       
        <p class="subtitle">Veja os eventos dos próximos dias</p>
    @endif    
    <div id="cards-container" class="row">
        @foreach ($eventos as $evento)
            <div class="card col-md-3">
                <img src="/img/eventos/{{$evento->imagem}}" alt="{{$evento->titulo}}">
                <div class="card-body">
                    <p class="card-date">{{date('d/m/Y', strtotime($evento->data))}}</p>
                    <h5 class="card-title">{{$evento->titulo}}</h5>
                    <p class="card-participantes">{{count($evento->users)}} participante(s)</p>
                    <a href="/eventos/{{$evento->id}}" class="btn btn-primary">Saber mais</a>
                </div>
            </div>
        @endforeach
        @if (count($eventos)==0 && $search)
            <p>Não foi possível encontrar nenhum evento com {{$search}}! <a href="/">Ver todos</a></p>
        @elseif(count($eventos)==0)
            <p>Não há eventos disponíveis</p>
        @endif
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
