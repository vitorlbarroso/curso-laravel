<?php

/* 

    - Com as migrations podemos fazer um versionamento do Banco de Dados;
        . Podemos avançar e retroceder a qualquer momento;
        . Podemos adicionar e remover colunas com facilidade, além de poder zerar ele;
        . Podemos fazer o setup do DB de uma nova instalação em apenas um comando;
        . Podemos verificar as migrations com migrate:status;
        
    - Como criar tabelas com migration:
        php artisan make:migration create_tablename_table
        
    - Como ver o status das tabelas:
        php artisan migrate:status
        
    - Como atualizar as tabelas:
        php artisan migrate
        
    - Como atualizar as colunas que foram criadas
        php artisan migrate:fresh
        
    - Tipos de funções para criar dados no Laravel:
        string(string, limite) -> Varchar;
        integer() -> No. Inteiro
        text() -> Texto grande;
        
    - Para criar uma nova coluna sem resetar todos os dados da database, utilizamos:
        php artisan make:migrate add_category_to_nametable_table;
            Vou no arquivo da nova migration criada e adiciono os novos campos e configuro os campos que serão removidos em caso de rollback;
                Executo o php artisan migrate
                
    - Para dar rollback de todas as colunas e zerar o Banco de Dados, utiliza-se:
        php artisan migrate:reset

    - A diferença entre o migrate:fresh e o migrate:refresh é:
        migrate:fresh - Reseta todos os dados da database e depois faz um rollback e desfaz o rollback;
        migrate:refresh - Apenas faz o rollback e depois desfaz esse rollback;

*/