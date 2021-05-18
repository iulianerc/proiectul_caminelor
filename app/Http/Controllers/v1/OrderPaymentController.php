<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderPayment\OrderPaymentRequest;
use App\Http\Resources\MainResourceCollection;
use App\Http\Resources\OrderPayment\OrderPaymentResourceCollection;
use App\Http\Resources\OrderPayment\OrderPaymentResource;
use App\Models\OrderPayment\OrderPayment;
use App\Repositories\OrderPayment\OrderPaymentRepository;
use App\Services\OrderPayment\OrderPaymentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class OrderPaymentController extends Controller
{
    protected OrderPaymentRepository $repository;

    public function __construct(OrderPaymentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(): JsonResponse
    {
        return ok(new MainResourceCollection(
            $this->repository->get(),
            OrderPaymentResource::class,
            'id'
        ));
    }

    public function store(OrderPaymentRequest $request): JsonResponse
    {
        $attributes = $request->only($this->repository->getFillable());
        $orderPayment = OrderPayment::create($attributes);

        return created($orderPayment);
    }

    public function destroy(Request $request, OrderPaymentService $paymentService): JsonResponse
    {
        try {
            DB::beginTransaction();
            $orderPayment = OrderPayment::find($request->id ?? 0);
            $paymentService->revokePayment($orderPayment);
            $this->repository->updateFile($orderPayment);
            $orderPayment->delete();

            DB::commit();
        } catch (Throwable $throwable) {
            DB::commit();
            return failed();
        }

        return destroyed();
    }
}
