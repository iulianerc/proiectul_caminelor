<?php


namespace App\Http\Resources\AuthorizedPerson;


use Illuminate\Http\Resources\Json\JsonResource;

class AuthorizedPersonListResource extends JsonResource
{
    public function toArray ($request): array
    {
        return array_filter([
            'value'   => $this->id,
            'text'    => $this->{'name_'.app()->getLocale()}
        ]);
    }
}
