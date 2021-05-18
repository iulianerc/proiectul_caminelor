<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ExchangeRate\ExchangeRateResource;
use App\Models\ExchangeRate\ExchangeRate;
use App\Repositories\ExchangeRate\ExchangeRateApiRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ExchangeRateController extends Controller
{

    public function startWith(Request $request): JsonResponse
    {
        (new ExchangeRateApiRepository())->updateStartWith($request);
        return ok();
    }

    public function getExchange(int $currency_id, string $date): JsonResponse
    {
        return ok(
             ExchangeRateResource::collection(
                ExchangeRate::where('currency_id', $currency_id)
                    ->where('date', 'LIKE', "%{$date}%")
                    ->latest('date')
                    ->get()
            )
        );
    }

    public function getExchangeNow(int $currency_id): JsonResponse
    {
        $date = now()->format('Y-m-d');

        return ok(
            new ExchangeRateResource(
                ExchangeRate::where('currency_id', $currency_id)
                    ->where('date', 'LIKE', "%{$date}%")
                    ->first()
            )
        );
    }
}
