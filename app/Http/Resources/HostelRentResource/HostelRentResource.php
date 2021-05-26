<?php


namespace App\Http\Resources\HostelRentResource;


use Illuminate\Http\Resources\Json\JsonResource;

class HostelRentResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'   => $this->id,
            'hostel' => $this->hostel->name,
            'resident' => $this->resident->name,
            'email' => $this->resident->email,
            'phones' => $this->resident->phones,
            'room_category' => $this->roomCategory->name,
            'residents_max_count' => $this->roomCategory->residents_max_count,
        ];
    }
}
