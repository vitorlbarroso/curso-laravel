<?php

/* 

    - Para criarmos Controllers no PHP, podemos utilizar o comando:
        php artisan make:controller nameController
        
    - Para passarmos/recebermos os dados do Controller na rota, precisamos passar para a instância da rota uma tabela informando a classe a ser utilizada
        Ex:
            use App\Http\Controllers\NomeController;
            
            Route::get('/', [NomeController::class, 'nomeFuncao']);

*/