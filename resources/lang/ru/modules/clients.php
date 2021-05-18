<?php

return [
    'title'   => 'Клиенты',
    'model'   => [
        'one'      => 'Клиент',
        'multiple' => 'Клиенты',
    ],
    'actions' => [
        'list'   => 'Список',
        'create' => 'Создать',
        'edit'   => 'Редактировать',
        'delete' => 'Удалить',
    ],
    'types'   => [
        'juridical' => 'Юридическое лицо',
        'physical'  => 'Физическое лицо',
    ],
    'fields'  => [
        'id'                   => [
            'title'       => 'ID',
            'description' => 'Поле ID',
        ],
        'type'                 => [
            'title'       => 'Тип',
            'description' => 'Тип получателя'
        ],
        'idno'                 => [
            'title'       => 'IDNP/IDNO',
            'description' => 'IDNP или IDNO'
        ],
        'name'                 => [
            'title'       => 'Имя',
            'description' => 'Имя получателя'
        ],
        'administrator_name'   => [
            'title'       => 'Имя администратора',
            'description' => 'Имя администратора'
        ],
        'vat_code'             => [
            'title'       => 'Ват код',
            'description' => 'TVA код юридического лица'
        ],
        'identity_card'        => [
            'title'       => 'Номер удостоверения личности',
            'description' => 'Номер удостоверения личности'
        ],
        'identity_card_date'   => [
            'title'       => 'Дата выдачи карты',
            'description' => 'Дата выдачи карты'
        ],
        'identity_card_issued' => [
            'title'       => 'Кем выдан',
            'description' => 'Кем выдан'
        ],
        'contacts'             => [
            'title'       => 'Контакты',
            'description' => 'Контакты'
        ],
        'address'           => [
            'title'       => 'Адрес',
            'description' => 'Адрес'
        ],
        'address_ro'           => [
            'title'       => 'Адрес ro',
            'description' => 'Адрес ro'
        ],
        'address_en'           => [
            'title'       => 'Адрес en',
            'description' => 'Адрес en'
        ],
        'address_ru'           => [
            'title'       => 'Адрес ru',
            'description' => 'Адрес ru'
        ],
        'address_home'         => [
            'title'       => 'Адрес дома',
            'description' => 'Адрес дома'
        ],
        'client_bank_accounts' => [
            'title'       => 'Клиентские банковские счета',
            'description' => 'Клиентские банковские счета'
        ]
    ],
];
