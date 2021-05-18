<?php

return [
    'create'       => [
        'name'   => 'v1.html_pages.create.*',
        'levels' => ['all'],
    ],
    'delete'       => [
        'name'   => 'v1.html_pages.delete.*',
        'levels' => ['all'],
    ],
    'edit'         => [
        'name'   => 'v1.html_pages.edit.*',
        'levels' => ['all'],
    ],
    'filters'      => [
        'name'   => 'v1.html_pages.filters.*',
        'levels' => ['all'],
        'fields' => [
            'name',
            'alias',
            'publish_date',
            'author_name',
            'created_at',
            'updated_at',
        ]
    ],
    'list'         => [
        'name'   => 'v1.html_pages.index.*',
        'levels' => ['all'],
        'fields' => [
            'id',
            'name',
            'alias',
            'publish_date',
            'author_name',
            'created_at',
            'updated_at',
        ]
    ],
    'page' => [
        'name'   => 'v1.html_pages.page.*',
        'levels' => ['all'],
    ]
];
