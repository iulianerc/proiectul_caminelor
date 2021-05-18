<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderReceipt\OrderReceiptRequest;
use App\Http\Resources\MainResourceCollection;
use App\Http\Resources\OrderReceipt\OrderReceiptResource;
use App\Models\OrderReceipt\OrderReceipt;
use App\Repositories\OrderReceipt\OrderReceiptRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Throwable;

class OrderReceiptController extends Controller
{
    protected OrderReceiptRepository $repository;

    public function __construct(OrderReceiptRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(): JsonResponse
    {
        return ok(new MainResourceCollection(
            $this->repository->get(),
            OrderReceiptResource::class,
            'id'
        ));
    }

    public function store(OrderReceiptRequest $request)
    {
        try {
            $receiptPDF = $this->repository->store($request);
        } catch (Throwable $exception) {
            return failed(['message' => $exception->getMessage()]);
        }
        return response($receiptPDF)->header('Content-Type', 'application/pdf');
    }

    public function destroy(Request $request): JsonResponse
    {
        try {
            DB::beginTransaction();
            $orderPayment = OrderReceipt::find($request->id ?? 0);
            Storage::delete("{$orderPayment->folder()}/{$orderPayment->number}.pdf");
            $orderPayment->delete();
            DB::commit();
        } catch (Throwable $throwable) {
            DB::commit();
            return failed();
        }

        return destroyed();
    }
}
