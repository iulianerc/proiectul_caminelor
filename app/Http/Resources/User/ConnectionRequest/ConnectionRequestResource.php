<?php


namespace App\Http\Resources\User\ConnectionRequest;


use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class ConnectionRequestResource extends JsonResource
{
    public function toArray($request): array
    {
        $requestTypes = __('global/connection_requests');
        return [
            'id'           => $this->id,
            'sender'       => $this->author->name,
            'request_type' => Str::upper($requestTypes[$this->type]),
            'receiver'     => $this->receiver->name,
            'created_at'   => $this->created_at,
            '_actions'     => $this->_actions,
        ];
    }
}
