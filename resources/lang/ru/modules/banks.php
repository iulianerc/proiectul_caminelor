<?php

return [
    'title'   => 'Банки',
    'model'   => [
        'one'      => 'Банк',
        'multiple' => 'Банки',
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
        'id'   => [
            'title'       => 'ID',
            'description' => 'Поле ID',
        ],
        'code' => [
            'title'       => 'Код',
            'description' => 'Поле кода',
        ],
        'name' => [
            'title'       => 'Название',
            'description' => 'Поле название',
        ]

    ],
];
