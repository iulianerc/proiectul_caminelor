<?php


namespace App\Http\Resources\WorkPosition;


use App\Http\Resources\BaseResource;

class WorkPositionResource extends BaseResource
{
    protected function fields(): array
    {
        return [
            'id'         => $this->id,
            'name'       => $this->name,
        ];
    }
}
