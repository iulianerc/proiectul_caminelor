<?php


namespace App\Http\Resources\HostelRentResource;


use Illuminate\Http\Resources\Json\JsonResource;

class HostelRentResource extends JsonResource
{
    protected function fields(): array
    {

        return [
            'id'   => $this->id,
            'name' => $this->name,
        ];
    }
}
