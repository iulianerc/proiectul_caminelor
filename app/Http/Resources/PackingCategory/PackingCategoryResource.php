<?php

namespace App\Http\Resources\PackingCategory;

use App\Http\Resources\BaseResource;

class PackingCategoryResource extends BaseResource
{

    protected function fields(): array
    {
        return [
            'id' => $this->id,
            'name_en' => $this->name_en,
            'name_ro' => $this->name_ro,
            'name_ru' => $this->name_ru,
        ];
    }
}
