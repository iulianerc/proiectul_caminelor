<?php

return [
    'title'   => 'Клиентские банковские счета',
    'model'   => [
        'one'      => 'Клиентский банковский счет',
        'multiple' => 'Клиентские банковские счета',
    ],
    'actions' => [
        'list'   => 'Список',
        'create' => 'Создать',
        'edit'   => 'Редактировать',
        'delete' => 'Удалить',
    ],
    'fields'  => [
        'id'        => [
            'title'       => 'ID',
            'description' => 'Поле ID',
        ],
        'bank_id'   => [
            'title'       => 'Банк ID',
            'description' => 'Банк ID'
        ],
        'bank'      => [
            'title'       => 'Банк',
            'description' => 'Банк'
        ],
        'client_id' => [
            'title'       => 'ID Клиента',
            'description' => 'ID Клиента'
        ],
        'account'   => [
            'title'       => 'Акаунт',
            'description' => 'Номер акаунта'
        ],
    ],
];
