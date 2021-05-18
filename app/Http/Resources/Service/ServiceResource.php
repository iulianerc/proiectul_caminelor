<?php

namespace App\Http\Resources\Service;

use App\Http\Resources\BaseResource;

/**
 * @property mixed values
 */
class ServiceResource extends BaseResource
{
    protected function fields(): array
    {
        return [
            'id'      => $this->id,
            'alias'   => $this->alias,
            'name_en' => $this->name_en,
            'name_ro' => $this->name_ro,
            'name_ru' => $this->name_ru,
            'values'  => $this->getValues()
        ];
    }

    public function getValues()
    {
        return collect($this->values)->map(fn($think) => [
            'min'   => optional($think)->min,
            'max'   => optional($think)->max,
            'value' => optional($think)->value,
        ]);
    }
}
