@extends('layouts.main')
@section('title', 'Editando: '.$evento->titulo)
@section('content')


    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Editando: {{$evento->titulo}}</h1>
        {{-- necessario para enviar arquivos por formulario html --}}
        <form action="/eventos/update/{{$evento->id}}" method="POST" enctype="multipart/form-data">
            {{-- diretiva do laravel necessária para enviar o formulário e gravar no banco --}}
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="imagem">Imagem do Evento: </label>
                <input type="file" class="form-control-file" id="imagem" name="imagem" >
                <img src="/img/eventos/{{$evento->imagem}}" alt="{{$evento->titulo}}" class="img-preview">
            </div>
            <div class="form-group">
                <label for="title">Evento: </label>
                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Nome do evento" value="{{$evento->titulo}}">
            </div>
            <div class="form-group">
                <label for="date">Data do evento: </label>
                <input type="date" class="form-control" id="date" name="data" value="{{$evento->data->format('Y-m-d')}}">
            </div>
            <div class="form-group">
                <label for="title">Cidade: </label>
                <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Local do evento" value="{{$evento->cidade}}">
            </div>
            <div class="form-group">
                <label for="title">O evento é privado? </label>
                <select name="privado" id="privado" class="form-control">
                    <option value="0">Não</option>
                    <option value="1" {{$evento->privado==1?"selected='selected'":""}}>Sim</option>
                </select>
            </div>
            <div class="form-group">
                <label for="title">Descrição: </label>
                <textarea type="text" class="form-control" id="descricao" name="descricao"
                    placeholder="O que vai ocorrer no evento?">{{$evento->descricao}}</textarea>
            </div>
            <div class="form-group">
                <label for="title">Adicione itens de infraestrutura: </label>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Cadeiras"> Cadeiras
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Palco"> Palco
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Cerveja grátis"> Cerveja grátis
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Open food"> Open food
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Brindes"> Brindes
                </div>
            </div>
            
            <input type="submit" class="btn btn-primary" value="Editar evento">
        </form>
    </div>

@endsection
