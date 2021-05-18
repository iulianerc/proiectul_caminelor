<?php
return [
    'list'               => [
        'name'   => 'v1.menu_items.index.*',
        'levels' => ['all', 'own'],
        'fields' => [
            'id',
            'name_ru',
            'name_ro',
            'name_en',
            'link',
            'icon',
            'author_name',
            'created_at',
            'updated_at',
        ]
    ],
    'filters'            => [
        'name'   => 'v1.menu_items.filters.*',
        'levels' => ['all', 'own'],
        'fields' => [
            'id',
            'name_ru',
            'name_ro',
            'name_en',
            'link',
            'icon',
            'author_name',
            'created_at',
            'updated_at',
        ]
    ],
    'create'             => [
        'name'   => 'v1.menu_items.create.*',
        'levels' => ['all'],

    ],
    'edit'               => [
        'name'   => 'v1.menu_items.edit.*',
        'levels' => ['all', 'own'],
    ],
    'delete'             => [
        'name'   => 'v1.menu_items.delete.*',
        'levels' => ['all', 'own'],

    ],
    'edit_order_content' => [
        'name'   => 'v1.menu_items.edit_order_content.*',
        'levels' => ['all'],
    ],
    'edit_order_holders' => [
        'name'   => 'v1.menu_items.edit_order_holders.*',
        'levels' => ['all'],
    ],

];
