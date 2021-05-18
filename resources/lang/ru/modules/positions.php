<?php

return [
    'title'   => 'Должности',
    'model'   => [
        'one'      => 'Должность',
        'multiple' => 'Должности',
    ],
    'actions' => [],
    'fields'  => [
        'id'          => [
            'title'       => 'ID',
            'description' => 'ID',
        ],
        'name'        => [
            'title'       => 'Название',
            'description' => 'Название',
        ],
        'author_name' => [
            'title'       => 'Автор',
            'description' => 'Автор',
        ],
        'created_at'  => [
            'title'       => 'Дата создания',
            'description' => 'Дата создания',
        ],
        'updated_at'  => [
            'title'       => 'Дата обновления',
            'description' => 'Дата обновления',
        ]
    ],
];
