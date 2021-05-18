<?php

return [
    'title'   => 'Garanțiile Cererilor',
    'model'   => [
        'one'      => 'Garanția Cererii',
        'multiple' => 'Garanțiile Cererilor',
    ],
    'actions' => [
        'list'    => 'Lista',
        'create'  => 'Crează',
        'edit'    => 'Modifică',
        'delete'  => 'Șterge',
    ],
    'types'   => [
        'bank_deposit'    => 'Depozit bancar',
        'guaranty_letter' => 'Scrisoare de garantie'
    ],
    'fields'  => [
        'id'             => [
            'title'       => 'ID',
            'description' => 'ID',
        ],
        'client'          => [
            'title'       => 'Client',
            'description' => 'Client',
        ],
        'order' => [
            'title'       => 'Numărul cererii',
            'description' => 'Numărul cererii',
        ],
        'sum'     => [
            'title'       => 'Sumă',
            'description' => 'Suma Garanții',
        ],
        'created_at'     => [
            'title'       => 'Creat la',
            'description' => 'Creat la',
        ],
        'proof_document' => [
            'title'       => 'Document de dovadă',
            'description' => 'Document de dovadă',
            'sortable'    => false
        ],
        'type'            => [
            'title'       => 'Tip',
            'description' => 'Tipul garanții',
        ],
        'status' => [
            'title'       => 'Stare',
            'description' => 'Starea garanții',
        ],
    ]
];
