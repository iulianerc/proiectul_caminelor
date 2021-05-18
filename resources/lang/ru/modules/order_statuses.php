<?php

return [
    'title'      => 'Статусы заказа',
    'model'      => [
        'one'      => 'Статус заказа',
        'multiple' => 'Статусы заказа',
    ],
    'processing' => 'Обработка',
    'confirmed'  => 'Подтвержденный',
    'paid'       => 'Оплаченный',
    'issued'     => 'Изданный',
    'returned'   => 'Возвращенный',
    'closed'     => 'Закрытый',
    'fields'     => [
        'id'    => [
            'title'       => 'ID',
            'description' => 'ID',
        ],
        'name'  => [
            'title'       => 'Название',
            'description' => 'Название',
        ],
        'alias' => [
            'title'       => 'Псевдоним',
            'description' => 'Псевдоним',
        ],
        'color' => [
            'title'       => 'Цвет',
            'description' => 'Цвет',
        ],
    ],
];
