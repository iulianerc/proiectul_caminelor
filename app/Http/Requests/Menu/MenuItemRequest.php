<?php

namespace App\Http\Requests\Menu;

use App\Http\Requests\BasicRequest;

class MenuItemRequest extends BasicRequest
{
    protected array $rules
        = [
            'name_ru' => 'required|string|min:3|max:50|unique:menu_items,name_ru',
            'name_ro' => 'required|string|min:3|max:50|unique:menu_items,name_ro',
            'name_en' => 'required|string|min:3|max:50|unique:menu_items,name_en',
            'link'    => 'required|string|min:1|max:100',
            'icon'    => 'required|string|min:1|max:50',
        ];
}
