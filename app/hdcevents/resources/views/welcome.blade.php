@extends('layouts.main')

@section('title', 'HDC Events')

@section('content')

<div id="search-container" class="col-md-12">
    <h1>Busque um evento</h1>
    <form action="/" method="get">
        <input type="text" name="search" id="search" class="form-control" placeholder="Procurar...">
    </form>
</div>

<div id="events-container" class="col-md-12">
    @if($search)
        <h2>Buscando por {{ $search }}</h2>
    @else
        <h2>Próximos Eventos</h2>
    @endif
    <p class="subtitle">Veja os eventos dos próximos dias</p>
    <div id="cards-container" class="row">
        @foreach($events as $event)
        <div class="card col-md-3">
            <img src="/img/events/{{ $event->image }}" alt="{{ $event->title }}">
            <div class="card-body">
                <p class="card-date"> {{ date('d/m/Y', strtotime($event->date)) }} </p>
                <h5 class="card-title"> {{ $event->title }} </h5>
                <p class="card-participants">X Participantes</p>
                <a href="/evento/{{ $event->id }}" class="btn btn-primary">Saber mais</a>
            </div>
        </div>
        @endforeach
        @if(count($events) == 0)
            @if($search)
                <p>Não encontramos eventos com {{ $search }}!</p>
                <a href="/">Ver todos os eventos ativos</a>
            @else
                <p>Não há eventos disponíveis!</p>
            @endif
        @endif
    </div>
</div>

@endsection