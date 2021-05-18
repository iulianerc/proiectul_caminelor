<?php

return [
    'title'   => 'Страны',
    'model'   => [
        'one'      => 'Страна',
        'multiple' => 'Страны',
    ],
    'actions' => [
        'list'   => 'Список',
        'create' => 'Создать',
        'edit'   => 'Редактировать',
        'delete' => 'Удалить',
        'all'    => 'Все'
    ],
    'fields'  => [
        'id'         => [
            'title'       => 'ID',
            'description' => 'Поле ID',
        ],
        'name'       => [
            'title'       => 'Имя',
            'description' => 'Имя страны',
        ],
        'code'       => [
            'title'       => 'Код',
            'description' => 'Код страны',
        ],
        'accept_ata' => [
            'title'       => 'Подержевает ата карнет',
            'description' => 'Подержевает ата карнет'
        ],
        'value' => [
            'title'       => 'Значение',
            'description' => 'Значение',
        ],
        'text'  => [
            'title'       => 'Текст',
            'description' => 'Текст'
        ],
    ],
];
