<?php

namespace App\Http\Controllers;

use App\Http\Requests\HostelRent\HostelRentRequest;
use App\Http\Resources\HostelResource\HostelResource;
use App\Models\HostelRent;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

class HostelRentController extends Controller
{
    public function list(): JsonResponse
    {
        return ok(HostelResource::collection(HostelRent::all()));
    }

    public function store(HostelRentRequest $request): JsonResponse
    {
        try {
            $attributes = $request->only((new HostelRent())->getFillable());
            $hostel = HostelRent::create($attributes);
        } catch (Throwable $throwable) {
            return failed(['message' => $throwable->getMessage()]);
        }
        return created($hostel);
    }

    public function destroy(Request $request): JsonResponse
    {
        try {
            HostelRent::find($request->id ?? 0)->delete();
        } catch (Throwable $throwable) {
            return failed(['message' => $throwable->getMessage()]);
        }

        return destroyed();
    }

    public function edit()
    {

    }
}
