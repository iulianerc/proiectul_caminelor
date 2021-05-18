<?php

return [
    'title'   => 'Client Bank Accounts',
    'model'   => [
        'one'      => 'Client Bank Account',
        'multiple' => 'Client Bank Accounts',
    ],
    'actions' => [
        'list'   => 'List',
        'create' => 'Create',
        'edit'   => 'Edit',
        'delete' => 'Delete',
    ],
    'fields'  => [
        'id'        => [
            'title'       => 'ID',
            'description' => 'ID field',
        ],
        'bank_id'   => [
            'title'       => 'Bank id',
            'description' => 'Bank id'
        ],
        'bank'      => [
            'title'       => 'Bank',
            'description' => 'Bank'
        ],
        'client_id' => [
            'title'       => 'Client id',
            'description' => 'Client id'
        ],
        'account'   => [
            'title'       => 'Account',
            'description' => 'Number of the account'
        ],
    ],
];
