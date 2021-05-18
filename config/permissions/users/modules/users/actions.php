<?php

return [
    'create' => [
        'name'   => 'v1.users.create.*',
        'levels' => ['all', 'project'],
    ],
    'delete' => [
        'name'   => 'v1.users.delete.*',
        'levels' => ['all', 'project'],
    ],
    'edit' => [
        'name' => 'v1.users.edit.*',
        'levels' => ['all', 'project'],
        'fields' => [
            'id',
            'name',
            'phones',
            'email',
            'position_name',
            'position_id',
            'avatar'
        ]
    ],
    'filters' => [
        'name'   => 'v1.users.filters.*',
        'levels' => ['all', 'project'],
        'fields' => [
            'id',
            'name',
            'email',
            'phones',
            'email_verified_at',
            'is_active',
            'position_name',
            'role_name',
            'project_name',
            'status_name',
            'author_name',
            'created_at',
            'updated_at',
        ]
    ],
    'list' => [
        'name'   => 'v1.users.index.*',
        'levels' => ['all', 'project'],
        'fields' => [
            'id',
            'name',
            'email',
            'phones',
            'position_name',
        ]
    ],
    'profile' => [
        'name'   => 'v1.users.profile.*',
        'levels' => ['all', 'project', 'own'],
    ],
    'toggle_state' => [
        'name'   => 'v1.users.toggle_state.*',
        'levels' => ['all'],
    ],
    'change_status' => [
        'name'   => 'v1.users.change_status.*',
        'levels' => ['all'],
    ],
    'check_file' => [
        'name'   => 'v1.users.check_file.*',
        'levels' => ['all'],
    ],
    'change_password' => [
        'name'   => 'v1.users.change_password.*',
        'levels' => ['all'],
    ],
    'specialists_list' => [
        'name'   => 'v1.users.list.specialists',
        'levels' => ['all', 'project'],
        'fields' => [
            'id',
            'name',
            'email',
            'phones',
            'is_active',
        ]
    ],
    'get_all_users' => [
        'name'   => 'v1.users.list.all',
        'levels' => ['all', 'project'],
        'fields' => []
    ],
];
