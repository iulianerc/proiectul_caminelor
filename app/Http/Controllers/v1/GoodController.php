<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Good\GoodRequest;
use App\Http\Resources\Good\GoodResource;
use App\Http\Resources\MainResourceCollection;
use App\Models\Good\Good;
use App\Repositories\Good\GoodRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Merax\Helpers\Helper;
use Throwable;

class GoodController extends Controller
{
    protected GoodRepository $repository;

    public function __construct(GoodRepository $repository)
    {
        $this->repository = $repository;
    }


    public function index(): JsonResponse
    {
;        return ok(new MainResourceCollection(
            $this->repository->get(),
            GoodResource::class,
            'id'
        ));
    }

    public function list(): JsonResponse
    {
        return ok(GoodResource::collection(
            $this->repository->list()
        ));
    }

    public function store(GoodRequest $request): JsonResponse
    {
        $attributes = $request->only($this->repository->getFillable());
        return created(Good::create($attributes));
    }

    public function edit(Good $good): JsonResponse
    {
        return ok(new GoodResource($good));
    }

    public function update(GoodRequest $request, Good $good): JsonResponse
    {
        Helper::checkConcurrentRequests($good);
        $attributes = $request->only($this->repository->getFillable());
        $good->update($attributes);

        return updated($good);
    }

    public function destroy(Request $request): JsonResponse
    {
        try {
            Good::find($request->id ?? 0)->delete();

            return destroyed();
        } catch (Throwable $throwable) {
            return failed();
        }
    }
}
