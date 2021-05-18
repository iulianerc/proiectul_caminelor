<?php

return [
    'title'   => 'Order Receipts',
    'model'   => [
        'one'      => 'Order Receipt',
        'multiple' => 'Order Receipts',
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
        'number'       => [
            'title'       => 'Number',
            'description' => 'Receipt number',
        ],
        'client_name'     => [
            'title'       => 'Client name',
            'description' => 'Client name',
        ],
        'client_idno'         => [
            'title'       => 'Client IDNO',
            'description' => 'Client IDNO',
        ],
        'sum'            => [
            'title'       => 'Sum',
            'description' => 'Sum',
        ],
    ]
];
