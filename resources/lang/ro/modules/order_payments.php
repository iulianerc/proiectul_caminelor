<?php

return [
    'title'   => 'Plățile cererii',
    'model'   => [
        'one'      => 'Plata cererii',
        'multiple' => 'Plățile cererii',
    ],
    'actions' => [
        'list'   => 'Lista',
        'create' => 'Crează',
        'edit'   => 'Modifică',
        'delete' => 'Șterge',
    ],
    'fields'  => [
        'id'             => [
            'title'       => 'ID',
            'description' => 'ID',
        ],
        'order'          => [
            'title'       => 'Numărul cererei',
            'description' => 'Numărul cererei',
        ],
        'comments'       => [
            'title'       => 'Comentarii',
            'description' => 'Comentarii',
            'sortable'    => false
        ],
        'created_at'     => [
            'title'       => 'Data creării',
            'description' => 'Data creării',
        ],
        'author'         => [
            'title'       => 'Autor',
            'description' => 'Autor',
        ],
        'payment_method' => [
            'title'       => 'Metoda plății',
            'description' => 'Metoda plății',
        ],
        'sum'            => [
            'title'       => 'Suma',
            'description' => 'Suma',
        ],
        'proof_document' => [
            'title'       => 'Document de dovadă',
            'description' => 'Document de dovadă',
            'sortable'    => false
        ],
    ]
];
