<?php

namespace App\Http\Resources\OrderStatus;

use App\Http\Resources\BaseResource;

class OrderStatusResource extends BaseResource
{
    protected function fields (): array
    {
        return [
            'id'    => $this->id,
            'name'  => __("modules/order_statuses.$this->alias"),
            'alias' => $this->alias,
            'color' => $this->color
        ];
    }
}
