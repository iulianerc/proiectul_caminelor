<?php

namespace App\Http\Resources\Order;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property string alias
 * @property int id
 */
class PaymentMethodsResource extends JsonResource
{
    public function toArray ($request): array
    {
        return [
            'value' => $this->id,
            'text' => $this->{'name_'.app()->getLocale()},
        ];
    }
}
