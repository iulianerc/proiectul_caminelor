<?php

return [
    'title'   => 'Users',
    'model'   => [
        'one'      => 'User',
        'multiple' => 'Users',
    ],
    'actions' => [
        'list'             => 'List',
        'create'           => 'Create',
        'edit'             => 'Edit',
        'delete'           => 'Delete',
        'filters'          => 'Filters',
        'toggle_state'     => 'Toggle state',
        'profile'          => 'Show profile',
        'change_status'    => 'Change status',
        'check_file'       => 'Check file',
        'change_password'  => 'Change password',
        'get_all_users'    => 'Get all users',
        'specialists_list' => 'Specialists list'
    ],
    'fields'  => [
        'id'                => [
            'title'       => 'ID',
            'description' => 'ID field',
        ],
        'name'              => [
            'title'       => 'Name',
            'description' => 'Name field',
        ],
        'email'             => [
            'title'       => 'Email',
            'description' => 'Email',
        ],
        'phones'            => [
            'title'       => 'Phones',
            'description' => 'Phones',
        ],
        'position_name'     => [
            'title'       => 'Position',
            'description' => 'Position',
        ],
        'position_id'       => [
            'title'       => 'Position ID',
            'description' => 'Position ID',
        ],
        'avatar'            => [
            'title'       => 'Аvatar',
            'description' => 'Аvatar',
        ],
        'email_verified_at' => [
            'title'       => 'Email verified at',
            'description' => 'Email verified at',
        ],
        'is_active'         => [
            'title'       => 'Active',
            'description' => 'Active',
        ],
        'role_name'         => [
            'title'       => 'Role name',
            'description' => 'Role name',
        ],
        'project_name'      => [
            'title'       => 'Project name',
            'description' => 'Project name',
        ],
        'status_name'       => [
            'title'       => 'Status name',
            'description' => 'Status name',
        ],
        'author_name'       => [
            'title'       => 'Author name',
            'description' => 'Author name',
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
