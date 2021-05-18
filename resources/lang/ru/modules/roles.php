<?php

return [
    'title'   => 'Роли',
    'model'   => [
        'one'      => 'Роль',
        'multiple' => 'Роли',
    ],
    'actions' => [
        'list'             => 'Список',
        'create'           => 'Создать',
        'edit'             => 'Редактировать',
        'delete'           => 'Удалить',
        'filters'          => 'Фильтры',
        'edit_permissions' => 'Редактировать разрешения',
    ],
    'fields'  => [
        'id'         => [
            'title'       => 'ID',
            'description' => 'Поле ID',
        ],
        'name'       => [
            'title'       => 'Псевдоним',
            'description' => 'Псевдоним',
        ],
        'name_ro'    => [
            'title'       => 'Имя RO',
            'description' => 'Поле имени',
        ],
        'name_en'    => [
            'title'       => 'Имя EN',
            'description' => 'Поле имени',
        ],
        'name_ru'    => [
            'title'       => 'Имя RU',
            'description' => 'Поле имени',
        ],
        'guard_name' => [
            'title'       => 'API Guard',
            'description' => 'API Guard',
        ],
        'created_at' => [
            'title'       => 'Время создания',
            'description' => 'Время создания',
        ],
        'updated_at' => [
            'title'       => 'Время редактиования',
            'description' => 'Время редактиования',
        ],
        'value'      => [
            'title'       => 'Значение',
            'description' => 'Значение',
        ],
        'text'       => [
            'title'       => 'Текст',
            'description' => 'Текст',
        ],
    ],
];
