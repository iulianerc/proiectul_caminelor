<?php

namespace App\Http\Resources\AuthorizedPerson;

use App\Http\Resources\BaseResource;

class AuthorizedPersonResource extends BaseResource
{
    protected function fields(): array
    {
        $fields = [
            'id' => $this->id,
            'name' => $this ->name,
            'name_en' => $this->name_en,
            'name_ro' => $this->name_ro,
            'name_ru' => $this->name_ru,
        ];
        return array_filter($fields, fn($field) => $field);
    }
}
