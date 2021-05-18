<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Order\PaymentMethodsResource;
use App\Models\PaymentMethod\PaymentMethod;
use Illuminate\Http\JsonResponse;

class PaymentMethodController extends Controller
{
    public function list(): JsonResponse
    {
        return ok(PaymentMethodsResource::collection(PaymentMethod::all()));
    }
}
