<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\WorkPosition\WorkPositionRequest;
use App\Http\Resources\MainResourceCollection;
use App\Http\Resources\WorkPosition\WorkPositionResource;
use App\Models\WorkPosition\WorkPosition;
use App\Repositories\WorkPosition\WorkPositionRepository;
use App\Traits\Validation\BasicValidator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Merax\Helpers\Helper;
use Throwable;

class WorkPositionController extends Controller
{
    use BasicValidator;

    public WorkPositionRepository $repository;

    public function __construct(WorkPositionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function list(): JsonResponse
    {
        return ok(
            WorkPositionResource::collection($this->repository->list())
        );
    }

    public function index(): JsonResponse
    {
        return ok(new MainResourceCollection(
            $this->repository->get(),
            WorkPositionResource::class,
            'id'
        ));
    }


    public function store(WorkPositionRequest $request): JsonResponse
    {
        $attributes = $request->only($this->repository->getFillable());
        return created(WorkPosition::create($attributes));
    }


    public function edit(WorkPosition $workPosition): JsonResponse
    {
        return ok(new WorkPositionResource($workPosition));
    }


    public function update(WorkPositionRequest $request, WorkPosition $workPosition): JsonResponse
    {
        Helper::checkConcurrentRequests($workPosition);
        $attributes = $request->only($this->repository->getFillable());
        $workPosition->update($attributes);

        return updated($workPosition);
    }


    public function destroy(Request $request): JsonResponse
    {
        try {
            WorkPosition::find($request->id ?? 0)->delete();

            return destroyed();
        } catch (Throwable $throwable) {
            return failed();
        }
    }
}
