<?php


namespace App\Http\Requests\HtmlPage;

use App\Http\Requests\BasicRequest;

class HtmlPageRequest extends BasicRequest
{
    protected array $rules = [
        'name'         => 'required|string|min:2|max:100',
        'alias'        => 'required|string|min:2|max:100|unique:html_pages,alias',
        'content'      => 'required|string|min:2|max:65000',
        'publish_date' => 'required',
    ];

    protected bool $ignorable = true;

    protected string $routeParameter = 'html_pages';

}
