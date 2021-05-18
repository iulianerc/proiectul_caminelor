<?php

namespace App\Http\Resources\OrderReceipt;

use App\Http\Resources\BaseResource;
use App\Models\Order\Order;
use App\Models\PaymentMethod\PaymentMethod;

/**
 * Class OrderReceiptResources
 * @package App\Http\Resources\OrderReceipt
 * @property string $id
 * @property Order $order
 * @property string $number
 * @property string $client_name
 * @property string $client_idno
 * @property string $sum
 */
class OrderReceiptResource extends BaseResource
{
    public function fields (): array
    {
        return [
            'id' => $this->id,
            'order' => $this->order->number,
            'number' => $this->number,
            'client_name' => $this->client_name,
            'client_idno' => $this->client_idno,
            'sum' => $this->sum,
        ];
    }
}
