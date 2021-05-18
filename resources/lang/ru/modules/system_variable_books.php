<?php

return [
    'title'   => 'Системные переменные книги',
    'model'   => [
        'one'      => 'Системная переменная книги',
        'multiple' => 'Системные переменные книги',
    ],
    'actions' => [
        'list'            => 'Список',
        'create'          => 'Создать',
        'edit'            => 'Редактировать',
        'delete'          => 'Удалить',
        'filters'         => 'Фильтры',
        'toggle_state'    => 'Переключить состояние',
        'profile'         => 'Показать профиль',
        'change_status'   => 'Изменить статус',
        'check_file'      => 'Проверить файл',
        'change_password' => 'Измени пароль',
    ],
    'fields'  => [
        'id'       => [
            'title'       => 'ID',
            'description' => 'Поле ID',
        ],
        'name'     => [
            'title'       => 'Название',
            'description' => 'Поле название',
        ],
        'alias'    => [
            'title'       => 'Псевдоним',
            'description' => 'Поле псевдоним',
        ],
        'value_ro' => [
            'title'       => 'Значение RO',
            'description' => 'Поле значение RO',
        ],
        'value_en' => [
            'title'       => 'Значение EN',
            'description' => 'Поле значение EN',
        ],
        'value_ru' => [
            'title'       => 'Значение RU',
            'description' => 'Поле значение RU',
        ],

    ],
];
