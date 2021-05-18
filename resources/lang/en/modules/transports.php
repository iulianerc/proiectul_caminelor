<?php

return [
    'title'   => 'Transports',
    'model'   =>
        [
            'one'      => 'Transport',
            'multiple' => 'Transports',
        ],
    'actions' =>
        [
            'list'   => 'List',
            'create' => 'Create',
            'edit'   => 'Edit',
            'delete' => 'Delete',
        ],
    'fields'  =>
        [
            'id'      =>
                [
                    'title'       => 'ID',
                    'description' => 'ID field',
                ],
            'name_ro' =>
                [
                    'title'       => 'Name RO',
                    'description' => 'Name RO',
                ],
            'name_en' =>
                [
                    'title'       => 'Name EN',
                    'description' => 'Name En',
                ],
            'name_ru' =>
                [
                    'title'       => 'Name RU',
                    'description' => 'Name RU',
                ],
        ],
];
