<?php

return [
    'title'   => 'Clients',
    'model'   => [
        'one'      => 'Client',
        'multiple' => 'Clients',
    ],
    'actions' => [
        'list'   => 'List',
        'create' => 'Create',
        'edit'   => 'Edit',
        'delete' => 'Delete',
    ],
    'types'   => [
        'juridical' => 'Juridical person',
        'physical'  => 'Physical person',
    ],
    'fields'  => [
        'id'                   => [
            'title'       => 'ID',
            'description' => 'ID field',
        ],
        'type'                 => [
            'title'       => 'Type',
            'description' => 'Type of the beneficiary'
        ],
        'idno'                 => [
            'title'       => 'IDNP/IDNO',
            'description' => 'IDNP or IDNO'
        ],
        'name'                 => [
            'title'       => 'Name',
            'description' => 'Name of the beneficiary'
        ],
        'administrator_name'   => [
            'title'       => 'Administrator name',
            'description' => 'Name of the administrator'
        ],
        'vat_code'             => [
            'title'       => 'Vat code',
            'description' => 'TVA code of the juridical person'
        ],
        'identity_card'        => [
            'title'       => 'Identity card',
            'description' => 'Identity card number'
        ],
        'identity_card_date'   => [
            'title'       => 'Identity card date',
            'description' => 'Card issuing date'
        ],
        'identity_card_issued' => [
            'title'       => 'Identity card issued',
            'description' => 'Issued by'
        ],
        'contacts'             => [
            'title'       => 'Contacts',
            'description' => 'Contacts'
        ],
        'address'              => [
            'title'       => 'Address',
            'description' => 'Address'
        ],
        'address_ro'           => [
            'title'       => 'Address ro',
            'description' => 'Address ro'
        ],
        'address_en'           => [
            'title'       => 'Address en',
            'description' => 'Address en'
        ],
        'address_ru'           => [
            'title'       => 'Address ru',
            'description' => 'Address ru'
        ],
        'address_home'         => [
            'title'       => 'Address home',
            'description' => 'Address home'
        ],
        'client_bank_accounts' => [
            'title'       => 'Client bank accounts',
            'description' => 'Client bank accounts'
        ]
    ],
];
