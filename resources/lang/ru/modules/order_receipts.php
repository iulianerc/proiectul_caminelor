<?php

return [
    'title'   => 'Квитанции о заказе',
    'model'   => [
        'one'      => 'Квитанция о заказе',
        'multiple' => 'Квитанции о заказе',
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
