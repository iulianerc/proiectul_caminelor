<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Bank\BankRequest;
use App\Http\Resources\Bank\BankResource;
use App\Http\Resources\Bank\BankResourceCollection;
use App\Models\Bank\Bank;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Repositories\Bank\BankRepository;
use Merax\Helpers\Helper;
use Throwable;

class BankController extends Controller
{

    protected BankRepository $repository;

    public function __construct(BankRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(): JsonResponse
    {
        return ok(new BankResourceCollection(
            $this->repository->get(),
            BankResource::class,
            'id'
        ));
    }

    public function list(): JsonResponse
    {
        return ok(BankResource::collection(
            $this->repository->list()
        ));
    }

    public function store(BankRequest $request): JsonResponse
    {
        $attributes = $request->only($this->repository->getFillable());
        return created(Bank::create($attributes));
    }

    public function edit(Bank $bank): JsonResponse
    {
        return ok(new BankResource($bank));
    }

    public function update(BankRequest $request, Bank $bank): JsonResponse
    {
        Helper::checkConcurrentRequests($bank);
        $attributes = $request->only($this->repository->getFillable());
        $bank->update($attributes);

        return updated($bank);
    }

    public function destroy(Request $request): JsonResponse
    {
        try {
            Bank::find($request->id ?? 0)->delete();

            return destroyed();
        } catch (Throwable $throwable) {
            return failed();
        }
    }
}
