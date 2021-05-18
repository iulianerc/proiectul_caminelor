<?php

return [
    'title'   => 'HTML Pages',
    'model'   =>
        [
            'one'      => 'HTML Page',
            'multiple' => 'HTML Pages',
        ],
    'actions' =>
        [
            'list'    => 'List',
            'create'  => 'Create',
            'edit'    => 'Edit',
            'delete'  => 'Delete',
            'filters' => 'Filters',
            'page'    => 'Get html page',
        ],
    'fields'  =>
        [
            'id'           =>
                [
                    'title'       => 'ID',
                    'description' => 'ID field',
                ],
            'alias'        =>
                [
                    'title'       => 'Alias',
                    'description' => 'Page alias field',
                ],
            'name'         =>
                [
                    'title'       => 'Name',
                    'description' => 'Page name field',
                ],
            'content'      =>
                [
                    'title'       => 'Content',
                    'description' => 'Page content field',
                ],
            'publish_date' =>
                [
                    'title'       => 'Publish date',
                    'description' => 'Publish date field',
                ],
            'created_at'   =>
                [
                    'title'       => 'Created at',
                    'description' => 'Created at',
                ],
            'updated_at'   =>
                [
                    'title'       => 'Updated at',
                    'description' => 'Updated at',
                ],
            'author_name'  =>
                [
                    'title'        => 'Author',
                    'description'  => 'Author',
                    'customizable' => '1',
                ],
        ],
];
