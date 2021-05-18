<?php

return [
    'title' => 'Tipul Pachetelor',
    'model' =>
        [
            'one' => 'Tipul Pachetului',
            'multiple' => 'Tipul Pachetelor',
        ],
    'actions' => [
        'list'            => 'Lista',
        'create'          => 'Crează',
        'edit'            => 'Modifică',
        'delete'          => 'Șterge',
    ],
    'fields' =>
        [
            'id' =>
                [
                    'title' => 'ID',
                    'description' => 'Câmpul ID',
                ],
            'name_ro' =>
                [
                    'title' => 'Numele RO',
                    'description' => 'Numele în Ro',
                ],
            'name_en' =>
                [
                    'title' => 'Numele EN',
                    'description' => 'Numele în EN',
                ],
            'name_ru' =>
                [
                    'title' => 'Numele RU',
                    'description' => 'Numele în RU',
                ]
        ],
];
