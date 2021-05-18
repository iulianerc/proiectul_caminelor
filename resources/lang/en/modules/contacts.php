<?php

return [
    'title'   => 'Contacts',
    'model'   => [
        'one'      => 'Contact',
        'multiple' => 'Contacts',
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
        'id'           => [
            'title'       => 'ID',
            'description' => 'ID field',
        ],
        'contact_type' => [
            'title'       => 'Contact type',
            'description' => 'Contact type field',
        ],
        'value'        => [
            'title'       => 'Value',
            'description' => 'Value field',
        ],
        'client_id'        => [
            'title'       => 'Client ID',
            'description' => 'Client ID',
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
