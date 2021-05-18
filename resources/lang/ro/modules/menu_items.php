<?php

return [
    'title'   => 'Пункты меню',
    'model'   =>
        [
            'one'      => 'Пункт меню',
            'multiple' => 'Пункты меню',
        ],
    'actions' =>
        [
            'list'               => 'Список',
            'create'             => 'Создать',
            'edit'               => 'Редактировать',
            'delete'             => 'Удалить',
            'filters'            => 'Фильтры',
            'edit_order_holders' => 'Редактировать держателей заказов',
            'edit_order_content' => 'Редактировать содержимое заказа',
        ],
    'rules'   =>
        [
            'rule1' =>
                [
                    'title' => 'Правило 1',
                ],
        ],
    'fields'  =>
        [
            'id' =>
                [
                    'title'       => 'ID',
                    'description' => 'Поле ID',
                ],

            'name_ro'     =>
                [
                    'title'       => 'Имя ро',
                    'description' => 'Имя поля ro',
                ],
            'name_en'     =>
                [
                    'title'       => 'Имя en',
                    'description' => 'Имя поля en',
                ],
            'name_ru'     =>
                [
                    'title'       => 'Имя ru',
                    'description' => 'Название поля ru',
                ],
            'link'        =>
                [
                    'title'       => 'Ссылка',
                    'description' => 'Поле ссылки',
                ],
            'icon'        =>
                [
                    'title'       => 'Икона',
                    'description' => 'Поле значка',
                ],
            'created_at'  =>
                [
                    'title'       => 'Время создания',
                    'description' => 'Время создания',
                ],
            'updated_at'  =>
                [
                    'title'       => 'Время редактирования',
                    'description' => 'Поле время редактирования',
                ],
            'author_name' =>
                [
                    'title'       => 'Автор',
                    'description' => 'Поле автора',
                ],
        ],
];
