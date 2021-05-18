<?php

namespace App\Http\Controllers\v1;

use App\Actions\EnumLangAction;
use App\Actions\OrderReleaseAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderGuarantee\OrderGuaranteeRequest;
use App\Http\Resources\MainResourceCollection;
use App\Http\Resources\OrderGuarantee\OrderGuaranteeEditResource;
use App\Http\Resources\OrderGuarantee\OrderGuaranteeResource;
use App\Http\Resources\OrderGuarantee\OrderGuaranteeResourceCollection;
use App\Models\OrderGuarantee\OrderGuarantee;
use App\Repositories\OrderGuarantee\OrderGuaranteeRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Merax\Helpers\Helper;
use Throwable;

class OrderGuaranteeController extends Controller
{
    protected OrderGuaranteeRepository $repository;

    public function __construct(OrderGuaranteeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(): JsonResponse
    {
        return ok(new MainResourceCollection(
            $this->repository->get(),
            OrderGuaranteeResource::class,
            'id'
        ));
    }

    public function store(OrderGuaranteeRequest $request, OrderReleaseAction $releaseAction)
    {
        try {
            DB::beginTransaction();
            $attributes = $request->only($this->repository->getFillable());
            $orderGuarantee = OrderGuarantee::create($attributes);
            $orderGuarantee->saveFile($request->file('proof_document'));

            $releaseAction->handle($orderGuarantee->order);
            DB::commit();
        } catch (Throwable $throwable) {
            DB::rollBack();

            return failed($throwable->getMessage());
        }

        return created(new OrderGuaranteeResource($orderGuarantee));
    }

    public function edit(OrderGuarantee $orderGuarantee): JsonResponse
    {
        return ok(new OrderGuaranteeEditResource($orderGuarantee));
    }

    public function update(OrderGuaranteeRequest $request, OrderGuarantee $orderGuarantee): JsonResponse
    {
        try {
            DB::beginTransaction();
            Helper::checkConcurrentRequests($orderGuarantee);
            $attributes = $request->only($this->repository->getFillable());
            $orderGuarantee->update($attributes);
            $orderGuarantee->updateFile([
                'uploaded_file' => $request->file('proof_document'),
                'file_name'     => $request->file_name,
            ]);
            DB::commit();
        } catch (Throwable $throwable) {
            DB::rollBack();

            return failed($throwable->getMessage());
        }

        return updated($orderGuarantee);
    }

    public function destroy(Request $request): JsonResponse
    {
        try {
            DB::beginTransaction();
            $orderGuarantee = OrderGuarantee::find($request->id ?? 0);
            $orderGuarantee->deleteFile();
            $orderGuarantee->delete();
            DB::commit();
        } catch (Throwable $throwable) {
            DB::rollBack();

            return failed(['message' => $throwable->getMessage()]);
        }

        return destroyed();
    }

    public function getProofDocument(OrderGuarantee $orderGuarantee): array
    {
        $file = optional($orderGuarantee->file);
        return [
            'name' => $file->original_name,
            'url'  => Storage::url($orderGuarantee->folder() . '/' . $file->saved_name)
        ];
    }

    public function getTypes(EnumLangAction $langAction)
    {
        return ok($langAction->handle(__('modules/order_guarantees.types')));
    }

}
