<?php

namespace App\Http\Resources\Order;

use App\Http\Resources\BaseResource;
use App\Models\Order\Order;
use App\Models\PaymentMethod\PaymentMethod;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

/**
 * Class OrderPaymentResources
 * @package App\Http\Resources\OrderPayment
 *
 * @property int user_id
 * @property object old_values
 * @property object new_values
 * @property string url
 * @property string ip_address
 * @property string event
 * @property string tags
 * @property string user_agent
 * @property string created_at
 * @property string updated_at
 */
class OrderAuditsResources extends BaseResource
{
    public function fields(): array
    {
        return [
            'user_id'    => $this->user_id,
            'event'      => $this->event,
            'old_values' => $this->old_values,
            'new_values' => $this->new_values,
            'url'        => $this->url,
            'ip_address' => $this->ip_address,
            'user_agent' => $this->user_agent,
            'tags'       => $this->tags,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
