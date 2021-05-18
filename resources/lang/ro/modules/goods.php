<?php

return [
    'title'   => 'Mărfuri',
    'model'   => [
        'one'      => 'Mărfu',
        'multiple' => 'Mărfuri',
    ],
    'actions' => [
        'list'    => 'Lista',
        'create'  => 'Crează',
        'edit'    => 'Modifică',
        'delete'  => 'Șterge',
    ],
    'fields'  => [
        'id'      => [
            'title'       => 'ID',
            'description' => 'Câmpul ID',
        ],
        'code'    => [
            'title'       => 'Cod',
            'description' => 'Codul',
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
    ],
];
