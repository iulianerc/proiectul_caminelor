<?php

return [
    'title' => 'Тип упаковки',
    'model' =>
        [
            'one' => 'Тип упаковки',
            'multiple' => 'Тип упаковок',
        ],
    'actions' =>
        [
            'list' => 'Список',
            'create' => 'Создать',
            'edit' => 'Редактировать',
            'delete' => 'Удалить',
        ],
    'fields' =>
        [
            'id' => [
                'title' => 'ID',
                'description' => 'Поле ID',
            ],
            'name_ro' => [
                'title' => 'Имя RO',
                'description' => 'Имя Ro',
            ],
            'name_en' => [
                'title' => 'Имя EN',
                'description' => 'Имя En',
            ],
            'name_ru' => [
                'title' => 'Имя RU',
                'description' => 'Имя RU',
            ]
        ],
];
