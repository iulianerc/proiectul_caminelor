<?php

return [
    'title'   => 'Countries',
    'model'   => [
        'one'      => 'Country',
        'multiple' => 'Countries',
    ],
    'actions' => [
        'list'   => 'List',
        'create' => 'Create',
        'edit'   => 'Edit',
        'delete' => 'Delete',
        'all'    => 'All'
    ],
    'fields'  => [
        'id'         => [
            'title'       => 'ID',
            'description' => 'ID field',
        ],
        'name'       => [
            'title'       => 'Name',
            'description' => 'Name',
        ],
        'code'       => [
            'title'       => 'Code',
            'description' => 'Code',
        ],
        'accept_ata' => [
            'title'       => 'Accept ATA',
            'description' => 'Support ATA carnet',
        ],
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
