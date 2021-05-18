<?php


namespace App\Http\Resources\Notification;


use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'         => $this->id,
            'data'       => $this->data,
            'received_at' => carbon($this->created_at, config('app.timezone'))->timezone(userTimezone())->diffForHumans(),
            'read_at'    => $this->read_at ? \carbon($this->read_at, config('app.timezone'))->timezone(userTimezone())->format('d.m.Y H:i:s') : null,
            'created_at' => \carbon($this->created_at, config('app.timezone'))->timezone(userTimezone())->format('d.m.Y H:i:s'),
            'updated_at' => \carbon($this->updated_at, config('app.timezone'))->timezone(userTimezone())->format('d.m.Y H:i:s')
        ];
    }
}
