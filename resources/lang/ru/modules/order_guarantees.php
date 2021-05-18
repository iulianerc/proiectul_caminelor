<?php

return [
    'title'   => 'Гарантии заказа',
    'model'   => [
        'one'      => 'Гарантия заказа',
        'multiple' => 'Гарантии заказа',
    ],
    'actions' => [
        'list'   => 'Список',
        'create' => 'Создать',
        'edit'   => 'Редактировать',
        'delete' => 'Удалить',
    ],
    'types'   => [
        'bank_deposit'    => 'Банковский депозит',
        'guaranty_letter' => 'Гарантийное письмо'
    ],
    'fields'  => [
        'id'             => [
            'title'       => 'ID',
            'description' => 'ID',
        ],
        'client'          => [
            'title'       => 'Клиент',
            'description' => 'Клиент',
        ],
        'order' => [
            'title'       => 'Номер заявки',
            'description' => 'Номер заявки',
        ],
        'sum'     => [
            'title'       => 'Сума',
            'description' => 'Сума заявки',
        ],
        'created_at'     => [
            'title'       => 'Дата создания',
            'description' => 'Дата создания',
        ],
        'proof_document' => [
            'title'       => 'Подтверждающий документ',
            'description' => 'Подтверждающий документ',
            'sortable'    => false
        ],
        'type'            => [
            'title'       => 'Тип',
            'description' => 'Тип заявки',
        ],
        'status' => [
            'title'       => 'Статус',
            'description' => 'Статус Заявки',
        ],
    ]
];
