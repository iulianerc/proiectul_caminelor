<?php

namespace App\Http\Resources\PurposesOfUse;

use App\Http\Resources\BaseResource;

class PurposesOfUseResource extends BaseResource
{
    protected function fields(): array
    {
        $fields = [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'description_ro' => $this->description_ro,
            'description_en' => $this->description_en,
            'description_ru' => $this->description_ru,
        ];
        return array_filter($fields, fn($field) => $field);
    }
}
