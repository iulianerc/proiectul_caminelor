<?php

namespace App\Http\Controllers;

use App\Http\Requests\Hostel\HostelRequest;
use App\Http\Resources\HostelResource\HostelResource;
use App\Models\Hostel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

class HostelController extends Controller
{
    public function list(): JsonResponse
    {
        return ok(HostelResource::collection(Hostel::all()));
    }

    public function store(HostelRequest $request): JsonResponse
    {
        try {
            $attributes = $request->only((new Hostel())->getFillable());
            $hostel = Hostel::create($attributes);
        } catch (Throwable $throwable) {
            return failed(['message' => $throwable->getMessage()]);
        }
        return created($hostel);
    }

    public function destroy(Request $request): JsonResponse
    {
        try {
            Hostel::find($request->id ?? 0)->delete();
        } catch (Throwable $throwable) {
            return failed(['message' => $throwable->getMessage()]);
        }

        return destroyed();
    }

    public function edit()
    {

    }
}
