<?php

return [
    'title'   => 'Сотрудники',
    'model'   => [
        'one'      => 'Сотрудник',
        'multiple' => 'Сотрудники',
    ],
    'actions' => [
        'list'   => 'Список',
        'create' => 'Создать',
        'edit'   => 'Редактировать',
        'delete' => 'Удалить',
    ],
    'fields'  => [
        'id'         => [
            'title'       => 'ID',
            'description' => 'Поле ID',
        ],
        'name'       => [
            'title'       => 'Полное имя',
            'description' => 'Имя и фамилия',
        ],
        'phones'     => [
            'title'       => 'Телефоны',
            'description' => 'Телефоны',
        ],
        'email'      => [
            'title'       => 'Электронная почта',
            'description' => 'Электронная почта',
        ],
        'idnp'       => [
            'title'       => 'IDNP',
            'description' => 'IDNP',
        ],
        'gender'            => [
            'title'       => 'Гендер',
            'description' => 'Гендер',
        ],
        'birthdate'         => [
            'title'       => 'Дата рождения',
            'description' => 'Дата рождения',
        ],
        'user_name'       => [
            'title'       => 'Имя пользователя',
            'description' => 'Имя пользователя',
        ],
        'user_id'      => [
            'title'       => 'Id пользователя',
            'description' => 'Id пользователя',
        ],
        'user'      => [
            'title'       => 'Пользователь',
            'description' => 'Пользователь',
        ],
        'signature'  => [
            'title'       => 'Подпись',
            'description' => 'Подпись',
        ],
        'centers'        => [
            'title'       => 'Центры',
            'description' => 'Центры',
        ],
        'work_positions' => [
            'title'       => 'Занимаемые должности',
            'description' => 'Занимаемые должности',
        ],
        'is_active'  => [
            'title'       => 'Активный',
            'description' => 'Активный',
        ],
        'created_at'        => [
            'title'       => 'Создано на',
            'description' => 'Создано на',
        ],
        'updated_at'        => [
            'title'       => 'Обновлено на',
            'description' => 'Обновлено на',
        ]
    ],
];
