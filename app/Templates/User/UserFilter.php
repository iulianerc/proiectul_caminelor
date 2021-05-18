<?php


namespace App\Templates\User;


use App\Builders\Schema\Components\DateRangePicker;
use App\Builders\Schema\Components\Input;
use App\Builders\Schema\Components\Select;
use App\Builders\Schema\Filter;

class UserFilter extends Filter
{
    protected function components(): array
    {
        return [
            Select::create('name')
                ->setProps(['multiple' => true, 'livesearch' => true])
                ->setDataSource([
                    'url'       => route(
                        'v1.users.live_search',
                        [
                            'fields' => ['value' => 'name', 'text' => 'name'],
                            'route'  => 'v1.users.index.get'
                        ]
                    ),
                    'field'     => 'name',
                    'minLength' => 2
                ]),
            Select::create('email')
                ->setProps(['multiple' => true, 'livesearch' => true])
                ->setDataSource([
                    'url'       => route(
                        'v1.users.live_search',
                        [
                            'fields' => ['value' => 'email', 'text' => 'email'],
                            'route'  => 'v1.users.index.get'
                        ]
                    ),
                    'field'     => 'email',
                    'minLength' => 2
                ]),
            Select::create('position_name')
                ->setProps(['multiple' => true, 'livesearch' => true])
                ->setDataSource([
                    'url'       => route(
                        'v1.positions.live_search',
                        [
                            'fields' => ['value' => 'id', 'text' => 'name'],
                            'has'    => 'users',
                            'route'  => 'v1.users.index.get'
                        ]
                    ),
                    'field'     => 'name',
                    'minLength' => 2,
                ]),
            Select::create('project_name')
                ->setProps(['multiple' => true]),
            Select::create('role_name')
                ->setProps(['multiple' => true, 'livesearch' => true])
                ->setDataSource([
                    'url'       => route(
                        'v1.roles.live_search',
                        [
                            'fields' => ['value' => 'id', 'text' => 'name'],
                            'has'    => 'users',
                            'route'  => 'v1.users.index.get'
                        ]
                    ),
                    'field'     => 'name',
                    'minLength' => 2,
                ]),
            Select::create('status_name')
                ->setProps(['multiple' => true]),
            Select::create('is_active'),
            DateRangePicker::create('created_at'),
            DateRangePicker::create('updated_at'),
            Select::create('author_name')
                ->setProps(['multiple' => true, 'livesearch' => true])
                ->setDataSource([
                    'url'       => route(
                        'v1.users.live_search',
                        [
                            'fields' => ['value' => 'id', 'text' => 'name'],
                            'has'    => 'authors',
                            'route'  => 'v1.users.index.get'
                        ]
                    ),
                    'field'     => 'name',
                    'minLength' => 2,
                ])
        ];
    }
}
