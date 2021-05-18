<?php

return [
    'title'   => 'Товары',
    'model'   => [
        'one'      => 'Товар',
        'multiple' => 'Товары',
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
        'id'      => [
            'title'       => 'ID',
            'description' => 'Поле ID',
        ],
        'code'    => [
            'title'       => 'Код',
            'description' => 'Поле кода',
        ],
        'name_ro' => [
            'title'       => 'Название ro',
            'description' => 'Поле название Ro',
        ],
        'name_en' => [
            'title'       => 'Название en',
            'description' => 'Поле название En',
        ],
        'name_ru' => [
            'title'       => 'Название ru',
            'description' => 'Поле название Ru',
        ],
    ],
];
