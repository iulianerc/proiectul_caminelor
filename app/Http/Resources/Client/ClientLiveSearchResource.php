<?php


namespace App\Http\Resources\Client;


use App\Http\Resources\BaseResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientLiveSearchResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'value' => $this->id,
            'text' => "$this->name ($this->idno)",
        ];
    }
}
