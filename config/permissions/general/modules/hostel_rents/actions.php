<?php

return [
    'create' => [
        'name'   => 'v1.hostel_rents.create',
        'levels' => ['all'],
    ],
    'delete' => [
        'name'   => 'v1.hostel_rents.delete',
        'levels' => ['all'],
    ],
    'edit'   => [
        'name'   => 'v1.hostel_rents.edit',
        'levels' => ['all'],
    ],
    'list'   => [
        'name'   => 'v1.hostel_rents.list',
        'levels' => ['all'],
        'fields' => [
            'id',
            'hostel',
            'resident',
            'email',
            'room_category',
            'residents_max_count'
        ]
    ],
];
