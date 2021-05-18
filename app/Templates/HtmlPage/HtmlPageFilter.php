<?php


namespace App\Templates\HtmlPage;


use App\Builders\Schema\Components\DateRangePicker;
use App\Builders\Schema\Components\Input;
use App\Builders\Schema\Components\Select;
use App\Builders\Schema\Filter;

class HtmlPageFilter extends Filter
{
    protected function components(): array
    {
        return [
            Input::create('name'),
            Input::create('alias'),
            DateRangePicker::create('publish_date'),
            DateRangePicker::create('created_at'),
            DateRangePicker::create('updated_at'),
            Select::create('author_name')
                ->setProps(['multiple' => true, 'livesearch' => true])
                ->setDataSource([
                    'url'       => route(
                        'v1.users.live_search',
                        [
                            'fields' => ['value' => 'id', 'text' => 'name'],
                            'has'    => 'htmlPages',
                            'route'  => 'v1.html_pages.index.get'
                        ]
                    ),
                    'field'     => 'name',
                    'minLength' => 2,
                ]),
        ];
    }
}
