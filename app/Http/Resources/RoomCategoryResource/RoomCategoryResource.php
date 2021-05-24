<?php


namespace App\Http\Resources\RoomCategoryResource;


use Illuminate\Http\Resources\Json\JsonResource;

class RoomCategoryResource extends JsonResource
{
    protected function fields(): array
    {
        return [
            'id'   => $this->id,
            'name' => $this->name,
        ];
    }
}
