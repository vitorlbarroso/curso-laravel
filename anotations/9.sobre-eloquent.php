<?php
/* 

    - O que é o Eloquent?
        É o ORM do Laravel;
            É uma abstração das Querys;
            Cada tabela tem um Model que é responsável pela interação esnte as requisições ao banco.
        O Model sempre será no singular e com a primeira letra maiúscula, a migration sempre será no plural tudo minúsculo.
        
    - Como selecionar dados do banco:
        Você irá utilizar o Model específico e:
            $select = ModelSpecific::all();

*/