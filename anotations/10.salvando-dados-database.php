<?php
/* 

    - A action específica para o post chame: store.
        Lá vamos criar o objeto e compor ele com base nos dados enviados pelo POST;
        Com o objeto formado, utilizamos o método "save" para persistir no banco;
        
    - Para enviarmos formulário com Laravel/Blade, utilizamos:
        @csfr

    - Para criar uma requsição Post, criamos uma rota:
        Route::post('rota', [Controller::class, 'store'])
        - Na rota, criamos uma classe chamada store:
            public function store(Request $request) {}

*/