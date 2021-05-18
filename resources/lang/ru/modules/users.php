<?php

return [
    'title'   => 'Пользователи',
    'model'   => [
        'one'      => 'Пользователь',
        'multiple' => 'Пользователи',
    ],
    'actions' => [
        'list'             => 'Список',
        'create'           => 'Создать',
        'edit'             => 'Редактировать',
        'delete'           => 'Удалить',
        'filters'          => 'Фильтры',
        'toggle_state'     => 'Переключить состояние',
        'profile'          => 'Показать профиль',
        'change_status'    => 'Изменить статус',
        'check_file'       => 'Проверить файл',
        'change_password'  => 'Измени пароль',
        'get_all_users'    => 'Получить всех пользователей',
        'specialists_list' => 'Cписок специалистов'
    ],
    'fields'  => [
        'id'                => [
            'title'       => 'ID',
            'description' => 'Поле ID',
        ],
        'name'              => [
            'title'       => 'Имя',
            'description' => 'Поле имени',
        ],
        'email'             => [
            'title'       => 'Эл. адрес',
            'description' => 'Эл. адрес',
        ],
        'phones'            => [
            'title'       => 'Телефоны',
            'description' => 'Телефоны',
        ],
        'position_name'     => [
            'title'       => 'Должность',
            'description' => 'Должность',
        ],
        'position_id'       => [
            'title'       => 'ID должности',
            'description' => 'ID должности',
        ],
        'avatar'            => [
            'title'       => 'Аватар',
            'description' => 'Аватар',
        ],
        'email_verified_at' => [
            'title'       => 'Дата подтверждения эл-почты',
            'description' => 'Дата подтверждения эл-почты',
        ],
        'is_active'         => [
            'title'       => 'Активен',
            'description' => 'Активен',
        ],
        'role_name'         => [
            'title'       => 'Роль',
            'description' => 'Роль',
        ],
        'project_name'      => [
            'title'       => 'Проект',
            'description' => 'Проект',
        ],
        'status_name'       => [
            'title'       => 'Статус',
            'description' => 'Статус',
        ],
        'author_name'       => [
            'title'       => 'Автор',
            'description' => 'Автор',
        ],
        'created_at'        => [
            'title'       => 'Дата создания',
            'description' => 'Дата создания',
        ],
        'updated_at'        => [
            'title'       => 'Дата обновления',
            'description' => 'Дата обновления',
        ]
    ],
];
