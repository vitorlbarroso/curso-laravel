<?php
/* 

    Podemos criar components reutilizaveis com o blade;
        Para isso, podemos criar um pasta chamada components dentro das views;
        logo após, criar um arquivo main dentro dessa pasta.
            Para substituirmos um conteúdo desse main dinamicamente, podemos utilizar o @yield('');
                Para podermos incluir esse conteúdo dinamicamente, utilizamos o @extends('layouts.main') no arquivo do conteúdo;
                Para setarmos um dado, como o título, podemos utilizar o @section('title', 'HDC Events');
                Para setarmos o conteúdo principal, utilizamos o @section('content') no começo do conteúdo e no final do conteúdo o @endsection

*/