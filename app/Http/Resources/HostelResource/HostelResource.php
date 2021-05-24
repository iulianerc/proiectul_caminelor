<?php


namespace App\Http\Resources\HostelResource;


use Illuminate\Http\Resources\Json\JsonResource;

class HostelResource extends JsonResource
{
    protected function fields(): array
    {

        return [
            'id'   => $this->id,
            'name' => $this->name,
        ];
    }
}
