@extends('layouts.main')
@section('title', 'Criar Evento')
@section('content')
    
   
    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Crie o seu evento</h1>
        <form action="/eventos" method="POST">
            {{-- diretiva do laravel necessária para enviar o formulário e gravar no banco --}}
            @csrf
                <div class="form-group">
                    <label for="title">Evento: </label>
                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Nome do evento">
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
                    <textarea type="text" class="form-control" id="descricao" name="descricao" placeholder="O que vai ocorrer no evento?"></textarea>
                </div>
                    <input type="submit" class="btn btn-primary" value="Criar evento">
        </form>
    </div>
    
@endsection