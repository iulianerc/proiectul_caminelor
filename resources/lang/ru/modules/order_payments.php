<?php

return [
    'title'   => 'Платежи по заказу',
    'model'   => [
        'one'      => 'Платёж по заказу',
        'multiple' => 'Платежи по заказу',
    ],
    'actions' => [
        'list'   => 'Список',
        'create' => 'Создать',
        'edit'   => 'Редактировать',
        'delete' => 'Удалить',
    ],
    'fields'  => [
        'id'             => [
            'title'       => 'ID',
            'description' => 'ID',
        ],
        'order'          => [
            'title'       => 'Номер заявки',
            'description' => 'Номер заявки',
        ],
        'comments'       => [
            'title'       => 'Комментарии',
            'description' => 'Комментарии',
            'sortable'    => false
        ],
        'created_at'     => [
            'title'       => 'Дата создания',
            'description' => 'Дата создания',
        ],
        'author'         => [
            'title'       => 'Автор',
            'description' => 'Автор',
        ],
        'payment_method' => [
            'title'       => 'Способ оплаты',
            'description' => 'Способ оплаты',
        ],
        'sum'            => [
            'title'       => 'Сумма',
            'description' => 'Сумма',
        ],
        'proof_document' => [
            'title'       => 'Подтверждающий документ',
            'description' => 'Подтверждающий документ',
            'sortable'    => false
        ]
    ]
];
