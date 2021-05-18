<?php

return [
    'title' => 'Menu items',
    'model' =>
        [
            'one' => 'Menu item',
            'multiple' => 'Menu items',
        ],
    'actions' =>
        [
            'list' => 'List',
            'create' => 'Create',
            'edit' => 'Edit',
            'delete' => 'Delete',
            'filters' => 'Filters',
            'edit_order_holders' => 'Edit order holders',
            'edit_order_content' => 'Edit order content',
        ],
    'rules' =>
        [
            'rule1' => [
                'title' => 'Rule 1',
            ],
        ],
    'fields' =>
        [
            'id' => [
                'title' => 'ID',
                'description' => 'ID field',
            ],
            'name_ro' => [
                'title' => 'Name ro',
                'description' => 'Name ro field',
            ],
            'name_en' => [
                'title' => 'Name en',
                'description' => 'Name en field',
            ],
            'name_ru' => [
                'title' => 'Name ru',
                'description' => 'Name ru field',
            ],
            'link' => [
                'title' => 'Link',
                'description' => 'Link field',
            ],
            'icon' => [
                'title' => 'Icon',
                'description' => 'Icon field',
            ],
            'created_at' => [
                'title' => 'Created at',
                'description' => 'Created at',
            ],
            'updated_at' => [
                'title' => 'Updated at',
                'description' => 'Updated at field',
            ],
            'author_name' => [
                'title' => 'Author',
                'description' => 'Author field',
            ],
        ],
];
