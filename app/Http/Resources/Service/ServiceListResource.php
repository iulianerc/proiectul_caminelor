<?php

namespace App\Http\Resources\Service;

use App\Http\Resources\BaseResource;
use Illuminate\Support\Collection;

/**
 * @property string person_type
 */
class ServiceListResource extends BaseResource
{
    protected function fields(): array
    {
        $person_type  = $this->person_type == 'both' ? ['juridical', 'physical'] : [$this->person_type];

        return [
            'value'  => $this->id,
            'text'   => $this->{'name_'.app()->getLocale()},
            'alias'  => $this->alias,
            'person_type' => $person_type,
            'values' => $this->getValues(),
            'default' => $this->default
        ];
    }

    public function getValues(): Collection
    {
        return $this->values->map(fn($value) => [
            'min'   => $value->min,
            'max'   => $value->max,
            'value' => $value->value
        ]);
    }
}
