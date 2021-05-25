<?php

namespace App\Http\Controllers;

use App\Http\Requests\HostelRent\HostelRentRequest;
use App\Http\Resources\HostelRentResource\HostelRentResource;
use App\Models\HostelRent;
use App\Repositories\HostelRent\HostelRentRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Throwable;

class HostelRentController extends Controller
{
    protected HostelRentRepository $repository;

    public function __construct(HostelRentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function list(): JsonResponse
    {
        return ok(HostelRentResource::collection($this->repository->getList()));
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
