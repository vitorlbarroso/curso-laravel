@extends('layouts.main')

@section('title', 'HDCEvents - Dashboard')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus Eventos</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($events) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Participantes</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                    <tr>
                        <td scope="row">{{ $loop->index + 1 }}</td>
                        <td><a href="/evento/{{ $event->id }}">{{ $event->title }}</a></td>
                        <td>{{ count($event->users) }}</td>
                        <td>
                            <a href="/evento/editar/{{ $event->id }}" class="btn btn-info edit-btn">Editar</a>
                            <form action="/evento/{{ $event->id }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger delete-btn">Deletar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Você ainda não tem eventos, <a href="/eventos/criar">Crie um evento!</a></p>
    @endif
</div>

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Eventos que você participa</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
@if(count($eventsasparticipant) > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Participantes</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($eventsasparticipant as $event)
                <tr>
                    <td scope="row">{{ $loop->index + 1 }}</td>
                    <td><a href="/evento/{{ $event->id }}">{{ $event->title }}</a></td>
                    <td>{{ count($event->users) }}</td>
                    <td>
                        <form action="/eventos/sair/{{ $event->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-btn">
                                Sair do evento
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>Você ainda não está participando de nenhum evento, <a href="/">veja todos os eventos!</a></p>
@endif
</div>

@endsection