<?php

return [
    'title'   => 'Занимаемые должности',
    'model'   => [
        'one'      => 'Занимаемая должность',
        'multiple' => 'Занимаемые должности',
    ],
    'actions' => [
        'index'        => 'Индекс',
        'list'         => 'Список',
        'create'       => 'Создать',
        'edit'         => 'Редактировать',
        'delete'       => 'Удалить',
        'filters'      => 'Фильтры',
        'toggle_state' => 'Переключить состояние'
    ],
    'fields'  => [
        'id'   => [
            'title'       => 'ID',
            'description' => 'Поле ID',
        ],
        'name' => [
            'title'       => 'Название',
            'description' => 'Название',
        ],
    ],
];
