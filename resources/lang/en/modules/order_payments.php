<?php

return [
    'title'   => 'Order Payments',
    'model'   => [
        'one'      => 'Order OrderService',
        'multiple' => 'Order Payments',
    ],
    'actions' => [
        'list'   => 'List',
        'create' => 'Create',
        'edit'   => 'Edit',
        'delete' => 'Delete',
    ],
    'fields'  => [
        'id'             => [
            'title'       => 'ID',
            'description' => 'ID',
        ],
        'order'          => [
            'title'       => 'Order number',
            'description' => 'Order number',
        ],
        'comments'       => [
            'title'       => 'Comments',
            'description' => 'Comments',
            'sortable'    => false
        ],
        'created_at'     => [
            'title'       => 'Created at',
            'description' => 'Created at',
        ],
        'author'         => [
            'title'       => 'Author name',
            'description' => 'Author name',
        ],
        'payment_method' => [
            'title'       => 'Payment method',
            'description' => 'Payment method',
        ],
        'sum'            => [
            'title'       => 'Sum',
            'description' => 'Sum',
        ],
        'proof_document' => [
            'title'       => 'Proof document',
            'description' => 'Proof document',
            'sortable'    => false
        ],
    ]
];
