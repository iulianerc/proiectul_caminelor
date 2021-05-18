<?php

return [
    'title'   => 'Work positions',
    'model'   => [
        'one'      => 'Work position',
        'multiple' => 'Work positions'
    ],
    'actions' => [
        'index'        => 'Index',
        'list'         => 'List',
        'create'       => 'Сreate',
        'edit'         => 'Edit',
        'delete'       => 'Delete',
        'filters'      => 'Filters',
        'toggle_state' => 'Toggle state'
    ],
    'fields'  => [
        'id'   => [
            'title'       => 'ID',
            'description' => 'ID field',
        ],
        'name' => [
            'title'       => 'Name',
            'description' => 'Name field',
        ],
    ],
];
