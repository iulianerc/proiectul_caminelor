<?php

namespace App\Http\Resources\Good;

use App\Http\Resources\BaseResource;

class GoodResource extends BaseResource
{
    protected function fields(): array
    {
        return [
            'id'      => $this->id,
            'code'    => $this->code,
            'name_ro' => $this->name_ro,
            'name_ru' => $this->name_ru,
            'name_en' => $this->name_en,
        ];
    }
}
