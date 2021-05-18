<?php


namespace App\Http\Resources\User;


use Illuminate\Http\Resources\Json\JsonResource;

class UserListResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'value' => $this->id,
            'text' => $this->name
        ];
    }
}
