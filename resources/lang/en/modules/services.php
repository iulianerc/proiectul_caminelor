<?php

return [
    'title'   => 'Services',
    'model'   => [
        'one'      => 'Service',
        'multiple' => 'Services',
    ],
    'actions' => [
        'list'   => 'List',
        'create' => 'Create',
        'edit'   => 'Edit',
        'delete' => 'Delete',
    ],
    'fields'  => [
        'id'      => [
            'title'       => 'ID',
            'description' => 'ID field',
        ],
        'alias'   => [
            'title'       => 'Alias',
            'description' => 'Alias field',
        ],
        'name_ro' => [
            'title'       => 'Name ro',
            'description' => 'Name ro field',
        ],
        'name_en' => [
            'title'       => 'Name en',
            'description' => 'Name en field',
        ],
        'name_ru' => [
            'title'       => 'Name ru',
            'description' => 'Name ru field',
        ],
        'values'  => [
            'title'       => 'Cost',
            'description' => 'Cost',
        ],
        'value'   => [
            'title'       => 'Value',
            'description' => 'Value',
        ],
        'text'    => [
            'title'       => 'Text',
            'description' => 'Text',
        ],
        'person_type' => [
            'title'       => 'Person type',
            'description' => 'Person type',
        ],
        'default' => [
            'title'       => 'Default',
            'description' => 'Default',
        ]
    ],
];
