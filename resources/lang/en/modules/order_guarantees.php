<?php

return [
    'title'   => 'Order Guarantees',
    'model'   => [
        'one'      => 'Order Guarantee',
        'multiple' => 'Order Guarantees',
    ],
    'actions' => [
        'list'   => 'List',
        'create' => 'Create',
        'edit'   => 'Edit',
        'delete' => 'Delete',
    ],
    'types'   => [
        'bank_deposit'    => 'Bank deposit',
        'guaranty_letter' => 'Guarantee letter'
    ],
    'fields'  => [
        'id'             => [
            'title'       => 'ID',
            'description' => 'ID',
        ],
        'client'         => [
            'title'       => 'Client',
            'description' => 'Client',
        ],
        'order'          => [
            'title'       => 'Request number',
            'description' => 'Request number ',
        ],
        'sum'            => [
            'title'       => 'Sum',
            'description' => 'Guarantee sum',
        ],
        'created_at'     => [
            'title'       => 'Created at',
            'description' => 'Created at',
        ],
        'proof_document' => [
            'title'       => 'Proof document',
            'description' => 'Proof document',
            'sortable'    => false
        ],
        'type'           => [
            'title'       => 'Type',
            'description' => 'Guarantee type',
        ],
        'status'         => [
            'title'       => 'Status',
            'description' => 'Guarantee status',
        ],
    ]
];
