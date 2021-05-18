<?php


namespace App\Templates\Role;


use App\Builders\Schema\Components\DateRangePicker;
use App\Builders\Schema\Components\Input;
use App\Builders\Schema\Components\Select;
use App\Builders\Schema\Filter;
use Illuminate\Support\Collection;

class RoleFilter extends Filter
{
    protected function components(): array
    {
        return [
            Input::create('id'),
            Select::create('name')
                ->setProps(['multiple' => true, 'livesearch' => true])
                ->setDataSource([
                    'url'       => route(
                        'v1.roles.live_search',
                        [
                            'fields' => ['value' => 'name', 'text' => 'name'],
                            'route'  => 'v1.roles.index.get',
                        ]
                    ),
                    'field'     => 'name',
                ]),
            Select::create('guard_name')
                ->setProps(['multiple' => true, 'livesearch' => true])
                ->setDataSource([
                    'url'       => route(
                        'v1.roles.live_search',
                        [
                            'fields' => ['value' => 'guard_name', 'text' => 'guard_name'],
                            'route'  => 'v1.roles.index.get',
                        ]
                    ),
                    'field'     => 'guard_name',
                ]),
            DateRangePicker::create('created_at'),
            DateRangePicker::create('updated_at'),
        ];
    }
}
