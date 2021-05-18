<?php

return [
    'title'   => 'Authorized Persons',
    'model'   => [
        'one'      => 'Authorized Person',
        'multiple' => 'Authorized Persons',
    ],
    'actions' => [
        'list'   => 'List',
        'create' => 'Create',
        'edit'   => 'Edit',
        'delete' => 'Delete',
    ],
    'fields'  => [
        'id'      => [
            'title'       => 'ID',
            'description' => 'ID field',
        ],
        'name'    => [
            'title'       => 'Name',
            'description' => 'Name',
        ],
        'name_ro' => [
            'title'       => 'Name RO',
            'description' => 'Name Ro',
        ],
        'name_en' => [
            'title'       => 'Name EN',
            'description' => 'Name En',
        ],
        'name_ru' => [
            'title'       => 'Name RU',
            'description' => 'Name RU',
        ]
    ],
];
