<?php

return [
    'title'   => 'Orders',
    'model'   => [
        'one'      => 'Order',
        'multiple' => 'Orders',
    ],
    'actions' => [
        'list'            => 'List',
        'create'          => 'Create',
        'edit'            => 'Edit',
        'delete'          => 'Delete',
        'change_manager'  => 'Change manager',
        'confirm_payment' => 'Confirm payment',
        'payment_methods' => 'Payment methods',
        'add_payment'     => 'Add payment',
        'get_payments'    => 'Get payments',
        'get_guarantees'  => 'Get guarantees',
        'logs'            => 'Logs'
    ],
    'release_mode' => [
        'normal' => 'Normal',
        'urgent' => 'Urgent'
    ],
    'fields'  => [
        'id'             => [
            'title'       => 'ID',
            'description' => 'ID',
        ],
        'number'         => [
            'title'       => 'Application name',
            'description' => 'Application name',
        ],
        'carnet_number'  => [
            'title'       => 'Book',
            'description' => 'Book',
        ],
        'source'         => [
            'title'       => 'Source',
            'description' => 'Source',
        ],
        'status'         => [
            'title'       => 'Status',
            'description' => 'Status',
        ],
        'client'         => [
            'title'       => 'Beneficiary',
            'description' => 'Beneficiary',
        ],
        'manager_id'     => [
            'title'       => 'Specialist',
            'description' => 'Specialist',
        ],
        'tax_payed'      => [
            'title'       => 'Fee',
            'description' => 'Fee',
        ],
        'guaranty_payed' => [
            'title'       => 'Guarantee',
            'description' => 'Guarantee',
        ],
        'created_at'     => [
            'title'       => 'Creation date',
            'description' => 'Creation date',
        ],
        'proof_document' => [
            'title'       => 'Guarantee confirmation',
            'description' => 'Guarantee confirmation',
        ],
        'order'          => [
            'title'       => 'Order',
            'description' => 'Order',
        ],
        'order_id'       => [
            'title'       => 'Order id',
            'description' => 'Order id',
        ],
        'countries'      => [
            'title'       => 'Countries',
            'description' => 'Countries',
        ],
        'goods'          => [
            'title'       => 'Goods',
            'description' => 'Goods',
        ],
        'payed'          => [
            'title'       => 'Payed',
            'description' => 'Payed',
        ],
        'documents'      => [
            'title'       => 'Documents',
            'description' => 'Documents',
        ],
        'payments'       => [
            'title'       => 'Payments',
            'description' => 'Payments',
        ],
        'services'       => [
            'title'       => 'Services',
            'description' => 'Services',
        ],
        'date_released'  => [
            'title'       => 'Date released',
            'description' => 'Date released',
        ],
        'value'          => [
            'title'       => 'Value',
            'description' => 'Value',
        ],
        'text'           => [
            'title'       => 'Text',
            'description' => 'Text',
        ],
        'sum'            => [
            'title'       => 'Sum',
            'description' => 'Sum',
        ],
        'comments'       => [
            'title'       => 'Comments',
            'description' => 'Comments',
        ],
        'payment_method' => [
            'title'       => 'Payment method',
            'description' => 'Payment method',
        ],
        'type'           => [
            'title'       => 'Type',
            'description' => 'Type',
        ],
        'user_id'        => [
            'title'       => 'User id',
            'description' => 'User id',
        ],
        'event'        => [
            'title'       => 'Event',
            'description' => 'Event',
        ],
        'old_values'        => [
            'title'       => 'Old values',
            'description' => 'Old values',
        ],
        'new_values'        => [
            'title'       => 'New values',
            'description' => 'New values',
        ],
        'url'        => [
            'title'       => 'Url',
            'description' => 'Url',
        ],
        'ip_address'        => [
            'title'       => 'IP address',
            'description' => 'IP address',
        ],
        'user_agent'        => [
            'title'       => 'User agent',
            'description' => 'User agent',
        ],
        'tags'        => [
            'title'       => 'Tags',
            'description' => 'Tags',
        ],
        'updated_at'        => [
            'title'       => 'Updated at',
            'description' => 'Updated at',
        ],
    ],
];
