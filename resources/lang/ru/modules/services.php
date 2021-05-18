<?php

return [
    'title'   => 'Сервисы',
    'model'   => [
        'one'      => 'Сервис',
        'multiple' => 'Сервисы',
    ],
    'actions' => [
        'list'   => 'Список',
        'create' => 'Создать',
        'edit'   => 'Редактировать',
        'delete' => 'Удалить',
    ],
    'fields'  => [
        'id'          => [
            'title'       => 'ID',
            'description' => 'Поле ID',
        ],
        'alias'       => [
            'title'       => 'Псевдоним',
            'description' => 'Поле псевдоним',
        ],
        'name_ro'     => [
            'title'       => 'Название ro',
            'description' => 'Поле название Ro',
        ],
        'name_en'     => [
            'title'       => 'Название en',
            'description' => 'Поле название En',
        ],
        'name_ru'     => [
            'title'       => 'Название ru',
            'description' => 'Поле название Ru',
        ],
        'values'      => [
            'title'       => 'Стоимость',
            'description' => 'Стоимость',
        ],
        'value'       => [
            'title'       => 'Значение',
            'description' => 'Значение',
        ],
        'text'        => [
            'title'       => 'Текст',
            'description' => 'Текст',
        ],
        'person_type' => [
            'title'       => 'Тип пользователя',
            'description' => 'Тип пользователя',
        ],
        'default' => [
            'title'       => 'По умолчанию',
            'description' => 'По умолчанию',
        ]
    ],
];
