<?php


namespace App\Http\Controllers\v1;


use App\Http\Controllers\Controller;
use App\Http\Resources\Currency\CurrencyResource;
use App\Models\Currency\Currency;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;

class CurrencyController extends Controller
{
    public function list(): JsonResponse
    {
       return ok(CurrencyResource::collection(Currency::all()));
    }
}
