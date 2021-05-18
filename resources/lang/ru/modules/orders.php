<?php

return [
    'title'   => 'Заявки',
    'model'   => [
        'one'      => 'Заявка',
        'multiple' => 'Заявки',
    ],
    'actions' => [
        'list'            => 'Список',
        'create'          => 'Создать',
        'edit'            => 'Редактировать',
        'delete'          => 'Удалить',
        'change_manager'  => 'Смена менеджера',
        'confirm_payment' => 'Подтверждение оплаты',
        'payment_methods' => 'Способы оплаты',
        'add_payment'     => 'Добавить платеж',
        'get_payments'    => 'Получать платежи',
        'get_guarantees'  => 'Получите гарантии',
        'logs'            => 'Журналы'
    ],
    'release_mode' => [
        'normal' => 'Обычный',
        'urgent' => 'Срочный'
    ],
    'fields'  => [
        'id'             => [
            'title'       => 'ID',
            'description' => 'ID',
        ],
        'number'         => [
            'title'       => 'Название приложения',
            'description' => 'Название приложения',
        ],
        'carnet_number'  => [
            'title'       => 'Книжка',
            'description' => 'Книжка',
        ],
        'source'         => [
            'title'       => 'Источник',
            'description' => 'Источник',
        ],
        'status'         => [
            'title'       => 'Статус',
            'description' => 'Статус',
        ],
        'client'         => [
            'title'       => 'Бенефициар',
            'description' => 'Бенефициар',
        ],
        'manager_id'     => [
            'title'       => 'Специалист',
            'description' => 'Специалист',
        ],
        'tax_payed'      => [
            'title'       => 'Тариф',
            'description' => 'Тариф',
        ],
        'guaranty_payed' => [
            'title'       => 'Гарантия',
            'description' => 'Гарантия',
        ],
        'created_at'     => [
            'title'       => 'Дата создания',
            'description' => 'Дата создания',
        ],
        'proof_document' => [
            'title'       => 'Подтверждение гарантии',
            'description' => 'Подтверждение гарантии',
        ],
        'order'          => [
            'title'       => 'Заявка',
            'description' => 'Заявка',
        ],
        'order_id'       => [
            'title'       => 'Id Заявки',
            'description' => 'Id Заявки',
        ],
        'countries'      => [
            'title'       => 'Страны',
            'description' => 'Страны',
        ],
        'goods'          => [
            'title'       => 'Товары',
            'description' => 'Товары',
        ],
        'payed'          => [
            'title'       => 'Оплачен',
            'description' => 'Оплачен',
        ],
        'documents'      => [
            'title'       => 'Документы',
            'description' => 'Документы',
        ],
        'payments'       => [
            'title'       => 'Платежи',
            'description' => 'Платежи',
        ],
        'services'       => [
            'title'       => 'Услуги',
            'description' => 'Услуги',
        ],
        'date_released'  => [
            'title'       => 'Дата выпуска',
            'description' => 'Дата выпуска',
        ],
        'value'          => [
            'title'       => 'Значение',
            'description' => 'Значение',
        ],
        'text'           => [
            'title'       => 'Текст',
            'description' => 'Текст',
        ],
        'sum'            => [
            'title'       => 'Сумма',
            'description' => 'Сумма',
        ],
        'comments'       => [
            'title'       => 'Комментарии',
            'description' => 'Комментарии',
        ],
        'payment_method' => [
            'title'       => 'Способ оплаты',
            'description' => 'Способ оплаты',
        ],
        'type'           => [
            'title'       => 'Тип',
            'description' => 'Тип',
        ],
        'user_id'        => [
            'title'       => 'Id пользователя',
            'description' => 'Id пользователя',
        ],
        'event'          => [
            'title'       => 'Событие',
            'description' => 'Событие',
        ],
        'old_values'     => [
            'title'       => 'Старые значения',
            'description' => 'Старые значения',
        ],
        'new_values'     => [
            'title'       => 'Новые значения',
            'description' => 'Новые значения',
        ],
        'url'            => [
            'title'       => 'Url',
            'description' => 'Url',
        ],
        'ip_address'     => [
            'title'       => 'IP address',
            'description' => 'IP address',
        ],
        'user_agent'     => [
            'title'       => 'Пользовательский агент',
            'description' => 'Пользовательский агент',
        ],
        'tags'           => [
            'title'       => 'Теги',
            'description' => 'Теги',
        ],
        'updated_at'     => [
            'title'       => 'Время редактиования',
            'description' => 'Время редактиования',
        ],
    ],
];
