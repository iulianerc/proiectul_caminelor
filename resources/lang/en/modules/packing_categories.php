<?php

return [
    'title' => 'Packing Categories',
    'model' =>
        [
            'one' => 'Packing Category',
            'multiple' => 'Packing Categories',
        ],
    'actions' =>
        [
            'list' => 'List',
            'create' => 'Create',
            'edit' => 'Edit',
            'delete' => 'Delete',
        ],
    'fields' =>
        [
            'id' =>
                [
                    'title' => 'ID',
                    'description' => 'ID field',
                ],
            'name_ro' =>
                [
                    'title' => 'Name RO',
                    'description' => 'Name Ro',
                ],
            'name_en' =>
                [
                    'title' => 'Name EN',
                    'description' => 'Name En',
                ],
            'name_ru' =>
                [
                    'title' => 'Name RU',
                    'description' => 'Name RU',
                ]
        ],
];
