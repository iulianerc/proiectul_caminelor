<?php

return [
    'create' => [
        'name'   => 'v1.services.create.*',
        'levels' => ['all'],
    ],
    'delete' => [
        'name'   => 'v1.services.delete.*',
        'levels' => ['all'],
    ],
    'edit'   => [
        'name'   => 'v1.services.edit.*',
        'levels' => ['all'],
    ],
    'index'  => [
        'name'   => 'v1.services.index.*',
        'levels' => ['all'],
        'fields' => [
            'id',
            'alias',
            'name_en',
            'name_ro',
            'name_ru',
            'values',
        ]
    ],
    'list'   => [
        'name'   => 'v1.services.list.*',
        'levels' => ['all'],
        'fields' => [
            'value',
            'text',
            'alias',
            'values',
            'person_type',
            'default'
        ]
    ],
];
