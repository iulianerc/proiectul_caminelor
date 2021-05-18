<?php

return [
    'title'   => 'Servicii',
    'model'   => [
        'one'      => 'Serviciu',
        'multiple' => 'Servicii',
    ],
    'actions' => [
        'list'   => 'Lista',
        'create' => 'Crează',
        'edit'   => 'Modifică',
        'delete' => 'Șterge',
    ],
    'fields'  => [
        'id'      => [
            'title'       => 'ID',
            'description' => 'Câmpul ID',
        ],
        'alias'   => [
            'title'       => 'Alias',
            'description' => 'Alias field',
        ],
        'name_ro' => [
            'title'       => 'Denumire ro',
            'description' => 'Denumirea in Ro',
        ],
        'name_en' => [
            'title'       => 'Denumire en',
            'description' => 'Denumirea in En',
        ],
        'name_ru' => [
            'title'       => 'Denumire ru',
            'description' => 'Denumirea in Ru',
        ],
        'values'  => [
            'title'       => 'Costul',
            'description' => 'Costul',
        ],
        'value'   => [
            'title'       => 'Valoare',
            'description' => 'Valoare',
        ],
        'text'    => [
            'title'       => 'Text',
            'description' => 'Text',
        ],
        'person_type' => [
            'title'       => 'Tip de persoană',
            'description' => 'Tip de persoană',
        ],
        'default' => [
            'title'       => 'Implicit',
            'description' => 'Implicit',
        ]
    ]
];
