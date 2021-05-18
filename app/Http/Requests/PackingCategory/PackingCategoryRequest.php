<?php


namespace App\Http\Requests\PackingCategory;

use App\Http\Requests\BasicRequest;

class PackingCategoryRequest extends BasicRequest
{
    protected array $rules = [
        'name_en'         => 'required|unique:packing_categories,name_en|string|min:3|max:100',
        'name_ro'         => 'required|unique:packing_categories,name_ro|string|min:3|max:100',
        'name_ru'         => 'required|unique:packing_categories,name_ru|string|min:3|max:100',
    ];
}
