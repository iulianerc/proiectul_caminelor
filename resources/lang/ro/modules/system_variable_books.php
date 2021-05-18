<?php

return [
    'title'   => 'Variabile de sistem carnet',
    'model'   => [
        'one'      => 'Variabila de sistem carnet',
        'multiple' => 'Variabile de sistem carnet',
    ],
    'actions' => [
        'list'   => 'Lista',
        'create' => 'Crează',
        'edit'   => 'Modifică',
        'delete' => 'Șterge',
    ],
    'fields'  => [
        'id'       => [
            'title'       => 'ID',
            'description' => 'Câmpul ID',
        ],
        'name'     => [
            'title'       => 'Denumire',
            'description' => 'Denumirea băncii',
        ],
        'alias'    => [
            'title'       => 'Alias',
            'description' => 'Câmpul alias',
        ],
        'value_ro' => [
            'title'       => 'Valoare RO',
            'description' => 'Valoare în RO',
        ],
        'value_en' => [
            'title'       => 'Valoare EN',
            'description' => 'Valoare în EN',
        ],
        'value_ru' => [
            'title'       => 'Value RU',
            'description' => 'Valoare în RU',
        ],

    ],
];
