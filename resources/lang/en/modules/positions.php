<?php

return [
    'title'   => 'Positions',
    'model'   => [
        'one'      => 'Position',
        'multiple' => 'Positions',
    ],
    'actions' => [],
    'fields'  => [
        'id'          => [
            'title'       => 'ID',
            'description' => 'ID',
        ],
        'name'        => [
            'title'       => 'Name',
            'description' => 'Name',
        ],
        'author_name' => [
            'title'       => 'Author name',
            'description' => 'Author name',
        ],
        'created_at'  => [
            'title'       => 'Created at',
            'description' => 'Created at',
        ],
        'updated_at'  => [
            'title'       => 'Updated at',
            'description' => 'Updated at',
        ]
    ],
];
