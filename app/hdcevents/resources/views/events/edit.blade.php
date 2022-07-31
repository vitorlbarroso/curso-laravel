@extends('layouts.main')

@section('title', 'HDCEvents - Editando: ' . $event->title)

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Editando: {{ $event->title }}</h1>
    <form action="/eventos/update/{{ $event->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="image">Banner evento:</label>
            <input type="file" id="image" name="image" class="form-control file">
            <img src="/img/events/{{ $event->image }}" alt="{{ $event->title }}" class="img-preview">
        </div>
        <div class="form-group">
            <label for="title">Evento:</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Nome do evento..." value="{{ $event->title }}">
        </div>
        <div class="form-group">
            <label for="city">Cidade</label>
            <input type="text" name="city" id="city" class="form-control" placeholder="Local do evento..." value="{{ $event->city }}">
        </div>
        <div class="form-group">
            <label for="private">O evento é privado?</label>
            <select name="private" id="private" class="form-control">
                <option value="0">Não</option>
                <option value="1" {{ $event->private == 1 ? "selected='selected'" : "" }}>Sim</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Adicione itens de infraestrutura</label>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Cadeiras" {{ (in_array("Cadeiras", $event->items)) ? "checked='checked'" : '' }}> Cadeiras
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Palco" {{ (in_array("Palco", $event->items)) ? "checked='checked'" : '' }}> Palco
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Cerveja Gratis" {{ (in_array("Cerveja Gratis", $event->items)) ? "checked='checked'" : '' }}> Cerveja Grátis
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Open Food" {{ (in_array("Open Food", $event->items)) ? "checked='checked'" : '' }}> Open Food
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Brindes" {{ (in_array("Brindes", $event->items)) ? "checked='checked'" : '' }}> Brindes
            </div>
        </div>
        <div class="form-group">
            <label for="date">Data do evento:</label>
            <input type="date" id="date" class="form-control" name="date" value="{{ date('Y-m-d', strtotime($event->date)) }}">
        </div>
        <div class="form-group">
            <label for="description">Descrição:</label>
            <textarea name="description" id="description" class="form-control" placeholder="O que vai acontecer no evento">{{ $event->description }}</textarea>
        </div>
        <input type="submit" class="btn btn-primary" value="Editar evento">
    </form>
</div>

@endsection