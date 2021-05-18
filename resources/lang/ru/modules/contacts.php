<?php

return [
    'title'   => 'Контакты',
    'model'   => [
        'one'      => 'Контакт',
        'multiple' => 'Контакты',
    ],
    'actions' => [
        'list'            => 'Список',
        'create'          => 'Создать',
        'edit'            => 'Редактировать',
        'delete'          => 'Удалить',
        'filters'         => 'Фильтры',
    ],
    'fields'  => [
        'id'           => [
            'title'       => 'ID',
            'description' => 'Поле ID',
        ],
        'contact_type' => [
            'title'       => 'Тип контаков',
            'description' => 'Поле тип контаков',
        ],
        'value'        => [
            'title'       => 'Значение',
            'description' => 'Поле значение',
        ],
        'client_id'        => [
            'title'       => 'ID Клиента',
            'description' => 'ID Клиента',
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
