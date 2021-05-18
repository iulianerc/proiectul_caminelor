<?php

namespace App\Http\Resources\OrderPayment;

use App\Http\Resources\BaseResource;
use App\Models\Order\Order;
use App\Models\PaymentMethod\PaymentMethod;
use App\Models\User\User;
use Illuminate\Support\Facades\Storage;

/**
 * Class OrderPaymentResources
 * @package App\Http\Resources\OrderPayment
 *
 * @property int $id
 * @property string $sum
 * @property string $comments
 * @property Order $order
 * @property User $author
 * @property PaymentMethod payment_method
 * @property mixed created_at
 */
class OrderPaymentResource extends BaseResource
{
    public function fields(): array
    {
        return [
            'id'             => $this->id,
            'sum'            => $this->sum,
            'comments'       => $this->comments,
            'created_at'     => $this->created_at,
            'author'         => $this->author->name,
            'order'          => $this->order->number,
            'payment_method' => $this->payment_method->{'name_' . app()->getLocale()},
            'proof_document' => $this->getProofDocument()
        ];
    }

    private function getProofDocument(): ?array
    {
        if ($this->file === null) {
            return null;
        }

        return [
            'name' => $this->file->original_name,
            'url'  => Storage::url($this->path)
        ];
    }
}
