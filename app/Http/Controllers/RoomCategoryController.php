<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomCategory\RoomCategoryRequest;
use App\Http\Resources\HostelResource\HostelResource;
use App\Models\Resident;
use App\Models\RoomCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

class RoomCategoryController extends Controller
{
    public function list(): JsonResponse
    {
        return ok(HostelResource::collection(RoomCategory::all()));
    }

    public function store(RoomCategoryRequest $request): JsonResponse
    {
        try {
            $attributes = $request->only((new RoomCategory())->getFillable());
            $hostel = RoomCategory::create($attributes);
        } catch (Throwable $throwable) {
            return failed(['message' => $throwable->getMessage()]);
        }
        return created($hostel);
    }

    public function destroy(Request $request): JsonResponse
    {
        try {
            RoomCategory::find($request->id ?? 0)->delete();
        } catch (Throwable $throwable) {
            return failed(['message' => $throwable->getMessage()]);
        }

        return destroyed();
    }

    public function edit()
    {

    }
}
