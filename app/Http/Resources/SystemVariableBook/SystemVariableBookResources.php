<?php


namespace App\Http\Resources\SystemVariableBook;


use App\Http\Resources\BaseResource;

class SystemVariableBookResources extends BaseResource
{
    protected function fields(): array
    {
        return [
            'id'       => $this->id,
            'name'     => $this->name,
            'alias'    => $this->alias,
            'value_ro' => $this->value_ro,
            'value_en' => $this->value_en,
            'value_ru' => $this->value_ru,
        ];
    }
}
