<?php

return [
    'title'      => 'Order statuses',
    'model'      => [
        'one'      => 'Order statuse',
        'multiple' => 'Order statuses',
    ],
    'processing' => 'processing',
    'confirmed'  => 'confirmed',
    'paid'       => 'paid',
    'issued'     => 'issued',
    'returned'   => 'returned',
    'closed'     => 'closed',
    'fields'     => [
        'id'    => [
            'title'       => 'ID',
            'description' => 'ID',
        ],
        'name'  => [
            'title'       => 'Name',
            'description' => 'Name',
        ],
        'alias' => [
            'title'       => 'Alias',
            'description' => 'Alias',
        ],
        'color' => [
            'title'       => 'Color',
            'description' => 'Color',
        ],
    ],
];
