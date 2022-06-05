@extends('layouts.main')
@section('title', 'Criar Evento')
@section('content')


    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Crie o seu evento</h1>
        {{-- necessario para enviar arquivos por formulario html --}}
        <form action="/eventos" method="POST" enctype="multipart/form-data">
            {{-- diretiva do laravel necessária para enviar o formulário e gravar no banco --}}
            @csrf
            <div class="form-group">
                <label for="imagem">Imagem do Evento: </label>
                <input type="file" class="form-control-file" id="imagem" name="imagem" >
            </div>
            <div class="form-group">
                <label for="title">Evento: </label>
                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Nome do evento">
            </div>
            <div class="form-group">
                <label for="date">Data do evento: </label>
                <input type="date" class="form-control" id="date" name="data">
            </div>
            <div class="form-group">
                <label for="title">Cidade: </label>
                <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Local do evento">
            </div>
            <div class="form-group">
                <label for="title">O evento é privado? </label>
                <select name="privado" id="privado" class="form-control">
                    <option value="0">Não</option>
                    <option value="1">Sim</option>
                </select>
            </div>
            <div class="form-group">
                <label for="title">Descrição: </label>
                <textarea type="text" class="form-control" id="descricao" name="descricao"
                    placeholder="O que vai ocorrer no evento?"></textarea>
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
            
            <input type="submit" class="btn btn-primary" value="Criar evento">
        </form>
    </div>

@endsection
