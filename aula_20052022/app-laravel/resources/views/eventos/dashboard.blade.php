@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')

    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Meus Eventos</h1>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-events-container">
        @if (count($eventos) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th class="col">#</th>
                        <th class="col">Nome</th>
                        <th class="col">Participantes</th>
                        <th class="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($eventos as $evento)
                        <tr>
                            <td scope="row">{{ $loop->index + 1 }}</td>
                            <td><a href="/eventos/{{ $evento->id }}">{{ $evento->titulo }}</a></td>
                            <td>{{ count($evento->users) }}</td>
                            <td>
                                <a href="/eventos/editar/{{ $evento->id }}" class="btn btn-info edit-btn">
                                    <ion-icon name="create-outline"></ion-icon> Editar
                                </a>

                                <form action="/eventos/{{ $evento->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger delete-btn" type="submit">
                                        <ion-icon name="trash-outline"></ion-icon>Deletar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Você ainda não tem eventos, <a href="/eventos/criar">criar evento</a></p>
        @endif
    </div>
    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Eventos que estou participando</h1>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-events-container">
        @if (count($eventoAsParticipant )> 0)
            <table class="table">
                <thead>
                    <tr>
                        <th class="col">#</th>
                        <th class="col">Nome</th>
                        <th class="col">Participantes</th>
                        <th class="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($eventoAsParticipant as $evento)
                        <tr>
                            <td scope="row">{{ $loop->index + 1 }}</td>
                            <td><a href="/eventos/{{ $evento->id }}">{{ $evento->titulo }}</a></td>
                            <td>{{ count($evento->users) }}</td>
                            <td>
                                <form action="/eventos/leave/{{$evento->id}}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-danger delete-btn">
                                        <ion-icon name="trash-outline">Sair do evento</ion-icon>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Você ainda não está participando de nenhum evento, <a href="/">veja todos os eventos</a></p>
        @endif
    </div>

@endsection
