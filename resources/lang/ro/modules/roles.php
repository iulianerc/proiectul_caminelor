<?php

return [
    'title'   => 'Роли',
    'model'   =>
        [
            'one'      => 'Роль',
            'multiple' => 'Роли',
        ],
    'actions' =>
        [
            'list'             => 'Lista',
            'create'           => 'Crează',
            'edit'             => 'Modifică',
            'delete'           => 'Șterge',
            'filters'          => 'Filtre',
            'edit_permissions' => 'Redactează permisiunile',
        ],
    'fields'  =>
        [
            'id'         => [
                'title'       => 'ID',
                'description' => 'Câmpul ID',
            ],
            'name'       => [
                'title'       => 'Alias',
                'description' => 'Alias',
            ],
            'name_ro'    => [
                'title'       => 'Numele RO',
                'description' => 'Câmpul Numele',
            ],
            'name_en'    => [
                'title'       => 'Numele EN',
                'description' => 'Câmpul Numele',
            ],
            'name_ru'    => [
                'title'       => 'Numele RU',
                'description' => 'Câmpul Numele',
            ],
            'guard_name' => [
                'title'       => 'API Guard',
                'description' => 'API Guard',
            ],
            'created_at' => [
                'title'       => 'Data creării',
                'description' => 'Data creării',
            ],
            'updated_at' => [
                'title'       => 'Data editării',
                'description' => 'Data editării',
            ],
            'value'      => [
                'title'       => 'Valoare',
                'description' => 'Valoare',
            ],
            'text'       => [
                'title'       => 'Text',
                'description' => 'Text',
            ],
        ],
];
