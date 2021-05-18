<?php

namespace App\Http\Resources\OrderPayment;

use App\Http\Resources\BaseResource;
use App\Models\Order\Order;
use App\Models\PaymentMethod\PaymentMethod;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

/**
 * Class OrderPaymentResources
 * @package App\Http\Resources\OrderPayment
 *
 * @property int $id
 * @property string $sum
 * @property string $comments
 * @property Order $order
 * @property PaymentMethod payment_method
 * @property string created_at
 */
class OrderPaymentListResource extends BaseResource
{
    public function fields (): array
    {
        $fileName = optional($this->file)->saved_name;

        return [
            'id' => $this->id,
            'sum' => $this->sum,
            'comments' => $this->comments,
            'payment_method' => $this->payment_method->{'name_'.app()->getLocale()},
            'created_at' => Carbon::createFromDate($this->created_at)->isoFormat('DD.MM.YYYY'),
            'proof_document' => [
                'name' => $fileName,
                'url'  => Storage::url($this->folder() . '/' . $fileName)
            ]
        ];
    }
}
