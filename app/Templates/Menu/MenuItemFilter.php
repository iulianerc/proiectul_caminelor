<?php


namespace App\Templates\Menu;


use App\Builders\Schema\Components\DateRangePicker;
use App\Builders\Schema\Components\Input;
use App\Builders\Schema\Components\Select;
use App\Builders\Schema\Filter;
use Illuminate\Support\Collection;

class MenuItemFilter extends Filter
{
    protected function components(): array
    {
        return [
            Input::create('name_ru'),
            Input::create('name_ro'),
            Input::create('name_en'),
            Input::create('link'),
            DateRangePicker::create('created_at'),
            DateRangePicker::create('updated_at'),
            Select::create('author_name')
                ->setProps(['multiple' => true, 'livesearch' => true])
                ->setDataSource([
                    'url'       => route(
                        'v1.users.live_search',
                        [
                            'fields' => ['value' => 'id', 'text' => 'name'],
                            'has'    => 'menuItems',
                            'route'  => 'v1.menu_items.index.get'
                        ]
                    ),
                    'field'     => 'name',
                    'minLength' => 2,
                ])
        ];
    }
}
