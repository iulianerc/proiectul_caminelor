<?php

return [
    'title' => 'Tipul transporturilor',
    'model' =>
        [
            'one' => 'Tipul transportului',
            'multiple' => 'Tipul transporturilor',
        ],
    'actions' => [
        'list' => 'Lista',
        'create' => 'Crează',
        'edit' => 'Modifică',
        'delete' => 'Șterge',
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
                    'title' => 'Denumirea RO',
                    'description' => 'Denumirea în RO',
                ],
            'name_en' =>
                [
                    'title' => 'Denumirea EN',
                    'description' => 'Denumirea în En',
                ],
            'name_ru' =>
                [
                    'title' => 'Denumirea RU',
                    'description' => 'Denumirea în RU',
                ],
        ],
];
