<?php

return [
    'title'   => 'Roles',
    'model'   => [
        'one'      => 'Role',
        'multiple' => 'Roles',
    ],
    'actions' => [
        'list'             => 'List',
        'create'           => 'Create',
        'edit'             => 'Edit',
        'delete'           => 'Delete',
        'filters'          => 'Filters',
        'edit_permissions' => 'Edit permissions',
    ],
    'fields'  => [
        'id'         => [
            'title'       => 'ID',
            'description' => 'ID field',
        ],
        'name'       => [
            'title'       => 'Alias',
            'description' => 'Alias field',
        ],
        'name_ro'    => [
            'title'       => 'Name RO',
            'description' => 'Name field',
        ],
        'name_en'    => [
            'title'       => 'Name EN',
            'description' => 'Name field',
        ],
        'name_ru'    => [
            'title'       => 'Name RU',
            'description' => 'Name field',
        ],
        'guard_name' => [
            'title'       => 'API Guard',
            'description' => 'API Guard',
        ],
        'created_at' => [
            'title'       => 'Created at',
            'description' => 'Created at',
        ],
        'updated_at' => [
            'title'       => 'Updated at',
            'description' => 'Updated at',
        ],
        'value'      => [
            'title'       => 'Value',
            'description' => 'Value',
        ],
        'text'       => [
            'title'       => 'Text',
            'description' => 'Text',
        ],
    ],
];
