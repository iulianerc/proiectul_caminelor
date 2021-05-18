<?php

return [
    'title'   => 'Utilizatori',
    'model'   => [
        'one'      => 'Utilizator',
        'multiple' => 'Utilizatori',
    ],
    'actions' => [
        'list'             => 'Lista',
        'create'           => 'Crează',
        'edit'             => 'Modifică',
        'delete'           => 'Șterge',
        'filters'          => 'Filtrează',
        'toggle_state'     => 'Inversează starea',
        'profile'          => 'Deschide profilul',
        'change_status'    => 'Modifică starea',
        'check_file'       => 'Verifică fișierul',
        'change_password'  => 'Modifică parola',
        'get_all_users'    => 'Obțineți toți utilizatorii',
        'specialists_list' => 'Lista de specialisti'
    ],
    'fields'  => [
        'id'                => [
            'title'       => 'ID',
            'description' => 'Câmpul ID',
        ],
        'name'              => [
            'title'       => 'Nume',
            'description' => 'Câmpul nume',
        ],
        'email'             => [
            'title'       => 'Email',
            'description' => 'Email',
        ],
        'phones'            => [
            'title'       => 'Telefoane',
            'description' => 'Telefoane',
        ],
        'position_name'     => [
            'title'       => 'Poziția',
            'description' => 'Poziția deținută',
        ],
        'position_id'       => [
            'title'       => 'ID poziția',
            'description' => 'ID poziția',
        ],
        'avatar'            => [
            'title'       => 'Аvatar',
            'description' => 'Аvatar',
        ],
        'email_verified_at' => [
            'title'       => 'Data confirmării prin e-mail',
            'description' => 'Data confirmării prin e-mail',
        ],
        'is_active'         => [
            'title'       => 'Activ',
            'description' => 'Activ',
        ],
        'role_name'         => [
            'title'       => 'Rol',
            'description' => 'Rol',
        ],
        'project_name'      => [
            'title'       => 'Proiect',
            'description' => 'Proiect',
        ],
        'status_name'       => [
            'title'       => 'Stare',
            'description' => 'Stare',
        ],
        'author_name'       => [
            'title'       => 'Autor',
            'description' => 'Autor',
        ],
        'created_at'        => [
            'title'       => 'Data creării',
            'description' => 'Data creării',
        ],
        'updated_at'        => [
            'title'       => 'Data actualizării',
            'description' => 'Data actualizării',
        ]
    ],
];
