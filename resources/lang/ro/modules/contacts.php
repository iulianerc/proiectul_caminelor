<?php

return [
    'title'   => 'Contacte',
    'model'   => [
        'one'      => 'Date de Contact',
        'multiple' => 'Contacte',
    ],
    'actions' => [
        'list'            => 'Lista',
        'create'          => 'Crează',
        'edit'            => 'Modifică',
        'delete'          => 'Șterge',
    ],
    'fields'  => [
        'id'           => [
            'title'       => 'ID',
            'description' => 'Câmpul ID',
        ],
        'contact_type' => [
            'title'       => 'Tipul',
            'description' => 'Tipul contactului',
        ],
        'value'        => [
            'title'       => 'Valoare',
            'description' => 'Datele de contact',
        ],
        'client_id'        => [
            'title'       => 'ID clientului',
            'description' => 'ID clientului',
        ],
        'created_at'        => [
            'title'       => 'Creat la',
            'description' => 'Creat la',
        ],
        'updated_at'        => [
            'title'       => 'Actualizat la',
            'description' => 'Actualizat la',
        ]
    ],
];
