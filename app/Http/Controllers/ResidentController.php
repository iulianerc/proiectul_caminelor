<?php

namespace App\Http\Controllers;

use App\Http\Requests\Resident\ResidentRequest;
use App\Http\Resources\HostelResource\HostelResource;
use App\Http\Resources\ResidentResource\ResidentResource;
use App\Models\Resident;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

class ResidentController extends Controller
{
    public function list(): JsonResponse
    {
        return ok(ResidentResource::collection(Resident::all()));
    }

    public function store(ResidentRequest $request): JsonResponse
    {
        try {
            $attributes = $request->only((new Resident())->getFillable());
            $hostel = Resident::create($attributes);
        } catch (Throwable $throwable) {
            return failed(['message' => $throwable->getMessage()]);
        }
        return created($hostel);
    }

    public function destroy(Request $request): JsonResponse
    {
        try {
            Resident::find($request->id ?? 0)->delete();
        } catch (Throwable $throwable) {
            return failed(['message' => $throwable->getMessage()]);
        }

        return destroyed();
    }

    public function edit()
    {

    }
}
