<?php

return [
    'title'   => 'Cereri',
    'model'   => [
        'one'      => 'Cerere',
        'multiple' => 'Cereri',
    ],
    'actions' => [
        'list'            => 'Lista',
        'create'          => 'Crează',
        'edit'            => 'Modifică',
        'delete'          => 'Șterge',
        'change_manager'  => 'Schimbarea managerului',
        'confirm_payment' => 'Confirma plata',
        'payment_methods' => 'Metode de plata',
        'add_payment'     => 'Adăugați plata',
        'get_payments'    => 'Obțineți plăți',
        'get_guarantees'  => 'Obțineți garanții',
        'logs'            => 'Busteni'
    ],
    'release_mode' => [
        'normal' => 'Normal',
        'urgent' => 'Urgent'
    ],
    'fields'  => [
        'id'             => [
            'title'       => 'ID',
            'description' => 'ID',
        ],
        'number'         => [
            'title'       => 'Nume cerere',
            'description' => 'Nume cerere',
        ],
        'carnet_number'  => [
            'title'       => 'Carnet',
            'description' => 'Carnet',
        ],
        'source'         => [
            'title'       => 'Sursa',
            'description' => 'Sursa',
        ],
        'status'         => [
            'title'       => 'Statut',
            'description' => 'Statut',
        ],
        'client'         => [
            'title'       => 'Beneficiar',
            'description' => 'Beneficiar',
        ],
        'manager_id'     => [
            'title'       => 'Specialist',
            'description' => 'Specialist',
        ],
        'tax_payed'      => [
            'title'       => 'Taxa',
            'description' => 'Taxa',
        ],
        'guaranty_payed' => [
            'title'       => 'Garanție',
            'description' => 'Garanție',
        ],
        'created_at'     => [
            'title'       => 'Data creării',
            'description' => 'Data creării',
        ],
        'proof_document' => [
            'title'       => 'Confirmarea garanției',
            'description' => 'Confirmarea garanției',
        ],
        'order'          => [
            'title'       => 'Cererea',
            'description' => 'Cererea',
        ],
        'order_id'       => [
            'title'       => 'Id cererea',
            'description' => 'Id cererea',
        ],
        'countries'      => [
            'title'       => 'Țări',
            'description' => 'Țări',
        ],
        'goods'          => [
            'title'       => 'Goods',
            'description' => 'Goods',
        ],
        'payed'          => [
            'title'       => 'Plătit',
            'description' => 'Plătit',
        ],
        'documents'      => [
            'title'       => 'Bunuri',
            'description' => 'Bunuri',
        ],
        'payments'       => [
            'title'       => 'Plăți',
            'description' => 'Plăți',
        ],
        'services'       => [
            'title'       => 'Servicii',
            'description' => 'Servicii',
        ],
        'date_released'  => [
            'title'       => 'Data eliberare',
            'description' => 'Data eliberare',
        ],
        'value'          => [
            'title'       => 'Valoare',
            'description' => 'Valoare',
        ],
        'text'           => [
            'title'       => 'Text',
            'description' => 'Text',
        ],
        'sum'            => [
            'title'       => 'Sumă',
            'description' => 'Sumă',
        ],
        'comments'       => [
            'title'       => 'Comentarii',
            'description' => 'Comentarii',
        ],
        'payment_method' => [
            'title'       => 'Modalitate de plată',
            'description' => 'Modalitate de plată',
        ],
        'type'           => [
            'title'       => 'Tip',
            'description' => 'Tip',
        ],
        'user_id'        => [
            'title'       => 'Utilizator id',
            'description' => 'Utilizator id',
        ],
        'event'          => [
            'title'       => 'Eveniment',
            'description' => 'Eveniment',
        ],
        'old_values'     => [
            'title'       => 'Vechi valori',
            'description' => 'Vechi valori',
        ],
        'new_values'     => [
            'title'       => 'Valori noi',
            'description' => 'Valori noi',
        ],
        'url'            => [
            'title'       => 'Url',
            'description' => 'Url',
        ],
        'ip_address'     => [
            'title'       => 'IP address',
            'description' => 'IP address',
        ],
        'user_agent'     => [
            'title'       => 'Agent utilizator',
            'description' => 'Agent utilizator',
        ],
        'tags'           => [
            'title'       => 'Etichete',
            'description' => 'Etichete',
        ],
        'updated_at' => [
            'title'       => 'Data editării',
            'description' => 'Data editării',
        ],
    ],
];
