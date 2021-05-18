<?php

return [
    'title'   => 'Bănci',
    'model'   => [
        'one'      => 'Banc',
        'multiple' => 'Bănci',
    ],
    'actions' => [
        'list'            => 'Lista',
        'create'          => 'Crează',
        'edit'            => 'Modifică',
        'delete'          => 'Șterge',
    ],
    'fields'  => [
        'id'   => [
            'title'       => 'ID',
            'description' => 'Câmpul ID',
        ],
        'code' => [
            'title'       => 'Cod',
            'description' => 'Codul băncii',
        ],
        'name' => [
            'title'       => 'Denumire',
            'description' => 'Denumirea băncii',
        ]

    ],
];
