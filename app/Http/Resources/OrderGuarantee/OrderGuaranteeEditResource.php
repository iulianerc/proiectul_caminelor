<?php

namespace App\Http\Resources\OrderGuarantee;

use App\Http\Resources\BaseResource;
use App\Models\Client\Client;
use App\Models\Order\Order;
use Illuminate\Support\Facades\Storage;

/**
 * Class OrderGuaranteeResource
 * @package App\Http\Resources\OrderGuarantee
 *
 * @property int $id
 * @property Client $client
 * @property Order $order
 * @property float $sum
 * @property string $type
 * @property string $status
 */

class OrderGuaranteeEditResource extends BaseResource
{
    protected function fields (): array
    {
        return [
            'id'     => $this->id,
            'client' => [
                'value' => $this->client->id,
                'text' => $this->client->name,
            ],
            'order'  => [
                'value' => $this->order->id,
                'text' => $this->order->carnet_number,
            ],
            'sum'    => $this->sum,
            'type'   => $this->type,
            'status' => $this->status,
        ];
    }
}
