<?php

return [
    'title'   => 'Goods',
    'model'   => [
        'one'      => 'Good',
        'multiple' => 'Goods',
    ],
    'actions' => [
        'list'            => 'List',
        'create'          => 'Create',
        'edit'            => 'Edit',
        'delete'          => 'Delete',
        'filters'         => 'Filters',
        'toggle_state'    => 'Toggle state',
        'profile'         => 'Show profile',
        'change_status'   => 'Change status',
        'check_file'      => 'Check file',
        'change_password' => 'Change password',
    ],
    'fields'  => [
        'id'   => [
            'title'       => 'ID',
            'description' => 'ID field',
        ],
        'code' => [
            'title'       => 'Code',
            'description' => 'Code field',
        ],
        'name_ro' => [
            'title'       => 'Name ro',
            'description' => 'Name field in Ro',
        ],
        'name_en' => [
            'title'       => 'Name en',
            'description' => 'Name field in EN',
        ],
        'name_ru' => [
            'title'       => 'Name ru',
            'description' => 'Name field in RU',
        ],
    ],
];
