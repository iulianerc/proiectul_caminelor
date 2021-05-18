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
        'data' => [
            'title'       => 'Data',
            'description' => 'Data field',
        ],
        'received_at' => [
            'title'       => 'Received at',
            'description' => 'Received at',
        ],
        'read_at_at' => [
            'title'       => 'Read at at',
            'description' => 'Read at at',
        ],
        'created_at'        => [
            'title'       => 'Created at',
            'description' => 'Created at',
        ],
        'updated_at'        => [
            'title'       => 'Updated at',
            'description' => 'Updated at',
        ]
    ],
];
