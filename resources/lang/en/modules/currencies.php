<?php


return [
    'title'   => 'Currencies',
    'model'   => [
        'one'      => 'Currency',
        'multiple' => 'Currencies',
    ],
    'actions' => [],
    'fields'  => [
        'value' => [
            'title'       => 'Value',
            'description' => 'Value field',
        ],
        'text'  => [
            'title'       => 'Text',
            'description' => 'Text field'
        ],
    ],
];
