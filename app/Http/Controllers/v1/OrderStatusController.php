<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderStatus\OrderStatusRequest;
use App\Http\Resources\OrderStatus\OrderStatusResource;
use App\Repositories\OrderStatus\OrderStatusRepository;
use App\Models\OrderStatus\OrderStatus;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Merax\Helpers\Helper;
use Throwable;

class OrderStatusController extends Controller
{
    protected OrderStatusRepository $repository;

    public function __construct (OrderStatusRepository $repository)
    {
        $this->repository = $repository;
    }

    public function list (): JsonResponse
    {
        return ok(OrderStatusResource::collection(
            OrderStatus::all()
        ));
    }

    public function listValueText (): JsonResponse
    {
        return ok($this->repository->listValueText());
    }

    public function store (OrderStatusRequest $request): JsonResponse
    {
        $attributes = $request->only($this->repository->getFillable());
        return created(OrderStatus::create($attributes));
    }

    public function edit (OrderStatus $orderStatus): JsonResponse
    {
        return ok(new OrderStatusResource($orderStatus));
    }

    public function update (OrderStatusRequest $request, OrderStatus $orderStatus): JsonResponse
    {
        Helper::checkConcurrentRequests($orderStatus);
        $attributes = $request->only($this->repository->getFillable());
        $orderStatus->update($attributes);

        return updated($orderStatus);
    }

    public function destroy (Request $request): JsonResponse
    {
        try {
            OrderStatus::find($request->id ?? 0)->delete();

            return destroyed();
        } catch (Throwable $throwable) {
            return failed();
        }
    }
}
