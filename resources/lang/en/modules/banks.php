<?php

return [
    'title'   => 'Banks',
    'model'   => [
        'one'      => 'Bank',
        'multiple' => 'Banks',
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
        'name' => [
            'title'       => 'Name',
            'description' => 'Name field',
        ],
    ],
];
