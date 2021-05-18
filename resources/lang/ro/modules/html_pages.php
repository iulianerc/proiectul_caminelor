<?php

return [
    'title'   => 'HTML страницы',
    'model'   =>
        [
            'one'      => 'HTML страница',
            'multiple' => 'HTML страницы',
        ],
    'actions' =>
        [
            'list'    => 'Список',
            'create'  => 'Создать',
            'edit'    => 'Редактировать',
            'delete'  => 'Удалить',
            'filters' => 'Фильтры',
            'page'    => 'Получить html страницу',
        ],
    'fields'  =>
        [
            'id'           =>
                [
                    'title'       => 'ID',
                    'description' => 'Поле ID',
                ],
            'alias'        =>
                [
                    'title'       => 'Псевдоним',
                    'description' => 'Поле псевдонима страницы',
                ],
            'name'         =>
                [
                    'title'       => 'Имя',
                    'description' => 'Поле названия страницы',
                ],
            'content'      =>
                [
                    'title'       => 'Содержание',
                    'description' => 'Поле содержимого страницы',
                ],
            'publish_date' =>
                [
                    'title'       => 'Дата публикации',
                    'description' => 'Поле даты публикации',
                ],
            'created_at'   =>
                [
                    'title'       => 'Время создания',
                    'description' => 'Время создания',
                ],
            'updated_at'   =>
                [
                    'title'       => 'Время редактирования',
                    'description' => 'Время редактирования',
                ],
            'author_name'  =>
                [
                    'title'        => 'Автор',
                    'description'  => 'Автор',
                    'customizable' => '1',
                ],
        ],
];
