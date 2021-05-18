<?php


namespace App\Templates\Menu;


use App\Builders\Schema\Components\IconPicker;
use App\Builders\Schema\Components\Input;
use App\Builders\Schema\Form;
use App\Http\Requests\Menu\MenuItemRequest;

class MenuItemForm extends Form
{
    protected function components(): array
    {
        return [
            Input::create('name_ru'),
            Input::create('name_ro'),
            Input::create('name_en'),
            Input::create('link'),
            IconPicker::create('icon')
        ];

    }

    protected function rules(): void
    {
        $this->setRulesFromRequest(MenuItemRequest::class);
    }
}
