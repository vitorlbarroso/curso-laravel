@extends('layouts.main')

@section('title', 'HDC Events')

@section('content')

<h1>Algum título</h1>
@if (10 > 5)
    <p>A condição é true</p>
@endif

@if ($name == 'Pedro')
    <p>Nome é igual a Pedro</p>
@else
    <p>Nome é igual a {{ $name }}</p>
@endif

@for($i = 0; $i < count($arr); $i++)
    <p>{{ $i }} - {{ $arr[$i] }}</p>
    @if($i == 2)
    <p>o i é 2</p>
    @endif
@endfor

@foreach($names as $k => $v)
    <p>{{ $k }} - {{ $v }}</p>
@endforeach

@php
    $name = 'Jonas';
    echo $name;
@endphp

{{-- Comentário do Blade --}}

@endsection