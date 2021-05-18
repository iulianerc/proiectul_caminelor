<?php

return [
    'title'   => 'Țari',
    'model'   => [
        'one'      => 'Țara',
        'multiple' => 'Țari',
    ],
    'actions' => [
        'list'   => 'Lista',
        'create' => 'Crează',
        'edit'   => 'Modifică',
        'delete' => 'Șterge',
        'all'    => 'Toate'
    ],
    'fields'  => [
        'id'         => [
            'title'       => 'ID',
            'description' => 'Câmpul ID',
        ],
        'name'       => [
            'title'       => 'Denumirea',
            'description' => 'Denumirea țării',
        ],
        'code'       => [
            'title'       => 'Cod',
            'description' => 'Codul țării',
        ],
        'accept_ata' => [
            'title'       => 'Acceptă ATA',
            'description' => 'Acceptă carnetul ATA'
        ],
        'value' => [
            'title'       => 'Valoare',
            'description' => 'Valoare',
        ],
        'text'  => [
            'title'       => 'Text',
            'description' => 'Text'
        ],
    ],
];
