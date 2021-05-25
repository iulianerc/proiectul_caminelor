<?php


namespace App\Http\Resources\HostelRentResource;


use Illuminate\Http\Resources\Json\JsonResource;

class HostelRentResource extends JsonResource
{
    protected function fields(): array
    {

        return [
            'id'   => $this->id,
            'hostel' => $this->hostel->name,
            'resident' => $this->resident->name,
            'email' => $this->resident->email,
            'room_category' => $this->room_category->name,
            'residents_max_count' => $this->room_category->name,
        ];
    }
}
