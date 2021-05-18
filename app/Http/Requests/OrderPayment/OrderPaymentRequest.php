<?php

namespace App\Http\Requests\OrderPayment;

use App\Http\Requests\BasicRequest;
use Illuminate\Http\UploadedFile;

/**
 * Class OrderPaymentRequest
 * @package App\Http\Requests\OrderPayment
 *
 * @property float $sum
 * @property string $comments
 * @property int $order_id
 * @property int $payment_method_id
 * @property UploadedFile $proof_document
 */
class OrderPaymentRequest extends BasicRequest
{
    protected array $rules = [
        'sum'               => ['required', 'integer', 'min:1'],
        'comments'          => ['string', 'max:255'],
        'order_id'          => ['required', 'exists:orders,id'],
        'payment_method_id' => ['required', 'exists:payment_methods,id'],
        'proof_document'    => ['file'],
    ];
}
