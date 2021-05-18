<?php

return [
    'title'   => 'Beneficiari',
    'model'   => [
        'one'      => 'Beneficiar',
        'multiple' => 'Beneficiari',
    ],
    'actions' => [
        'list'   => 'Lista',
        'create' => 'Crează',
        'edit'   => 'Modifică',
        'delete' => 'Șterge',
    ],
    'types'   => [
        'juridical' => 'Persoană juridică',
        'physical'  => 'Persoană fizică',
    ],
    'fields'  => [
        'id'                   => [
            'title'       => 'ID',
            'description' => 'Câmpul ID',
        ],
        'type'                 => [
            'title'       => 'Tip',
            'description' => 'Tipul clientului'
        ],
        'idno'                 => [
            'title'       => 'IDNP/IDNO',
            'description' => 'IDNP sau IDNO'
        ],
        'name'                 => [
            'title'       => 'Nume',
            'description' => 'Numele Clientului'
        ],
        'administrator_name'   => [
            'title'       => 'Numele administratorului',
            'description' => 'Numele administratorului'
        ],
        'vat_code'             => [
            'title'       => 'Codul TVA',
            'description' => 'Codul TVA a persoanei juridice'
        ],
        'identity_card'        => [
            'title'       => 'Număr buletin',
            'description' => 'Numărul de indetificare'
        ],
        'identity_card_date'   => [
            'title'       => 'Data emiterii buletinului',
            'description' => 'Data emiterii cardului'
        ],
        'identity_card_issued' => [
            'title'       => 'Buletin emis de',
            'description' => 'De către cine a fost eliberat'
        ],
        'contacts'             => [
            'title'       => 'Contacte',
            'description' => 'Contacte'
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
            'title'       => 'Adresa acasă',
            'description' => 'Adresa acasă'
        ],
        'client_bank_accounts' => [
            'title'       => 'Conturi bancare client',
            'description' => 'Conturi bancare client'
        ]
    ],
];
