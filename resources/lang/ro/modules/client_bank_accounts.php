<?php

return [
    'title'   => 'Conturile bancare ai clientului',
    'model'   =>
        [
            'one'      => 'Contul bancar al clientului',
            'multiple' => 'Conturile bancare a clientului',
        ],
    'actions' => [
        'list'   => 'Lista',
        'create' => 'Crează',
        'edit'   => 'Modifică',
        'delete' => 'Șterge',
    ],
    'fields'  =>
        [
            'id'        => [
                'title'       => 'ID',
                'description' => 'Câmpul ID',
            ],
            'bank_id'   => [
                'title'       => 'ID-ul bancului',
                'description' => 'ID-ul bancului'
            ],
            'bank'      => [
                'title'       => 'Bancă',
                'description' => 'Bancă'
            ],
            'client_id' => [
                'title'       => 'ID-ul clientului',
                'description' => 'ID-ul clientului'
            ],
            'account'   => [
                'title'       => 'Cont',
                'description' => 'Numărului contului'
            ],
        ],
];
