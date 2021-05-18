<?php

return [
    'title'   => 'Employees',
    'model'   => [
        'one'      => 'Employee',
        'multiple' => 'Employees'
    ],
    'actions' => [
        'list'   => 'List',
        'create' => 'Сreate',
        'edit'   => 'Edit',
        'delete' => 'Delete',
    ],
    'fields'  => [
        'id'             => [
            'title'       => 'ID',
            'description' => 'Поле ID',
        ],
        'name'           => [
            'title'       => 'Full name',
            'description' => 'First name and last name',
        ],
        'phones'         => [
            'title'       => 'Phones',
            'description' => 'Phones',
        ],
        'email'          => [
            'title'       => 'Email',
            'description' => 'Email',
        ],
        'idnp'           => [
            'title'       => 'IDNP',
            'description' => 'IDNP',
        ],
        'gender'         => [
            'title'       => 'Gender',
            'description' => 'Gender',
        ],
        'birthdate'      => [
            'title'       => 'Birthdate',
            'description' => 'Birthdate',
        ],
        'user_name'      => [
            'title'       => 'User name',
            'description' => 'User name',
        ],
        'user_id'      => [
            'title'       => 'User id',
            'description' => 'User id',
        ],
        'user'      => [
            'title'       => 'User',
            'description' => 'User',
        ],
        'signature'      => [
            'title'       => 'Signature',
            'description' => 'Signature',
        ],
        'centers'        => [
            'title'       => 'Centers',
            'description' => 'Centers',
        ],
        'work_positions' => [
            'title'       => 'Work positions',
            'description' => 'Work positions',
        ],
        'is_active'      => [
            'title'       => 'Active',
            'description' => 'Active',
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
