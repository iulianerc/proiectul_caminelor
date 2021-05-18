<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Position\PositionRequest;
use App\Http\Resources\MainResourceCollection;
use App\Models\Position\Position;
use App\Repositories\Position\PositionRepository;
use App\Templates\Position\PositionFilter;
use App\Templates\Position\PositionForm;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Merax\Helpers\Helper;
use Throwable;

class PositionController extends Controller
{
    protected PositionRepository $repository;

    public function __construct(PositionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(): JsonResponse
    {
        return ok(new MainResourceCollection($this->repository->get()));
    }

    public function filters(PositionFilter $filters): JsonResponse
    {
        $filters->schema()->applyPermissions();
        return ok($filters->build());
    }

    public function create(PositionForm $form): JsonResponse
    {
        return ok($form->build());
    }

    public function store(PositionRequest $request): JsonResponse
    {
        $attributes = $request->only($this->repository->getFillable());
        $position = Position::create($attributes);

        return created($position);
    }

    public function edit(Position $position, PositionForm $form): JsonResponse
    {
        $form->dataObject()->set($position);
        return ok($form->build());
    }

    /**
     * @param PositionRequest $request
     * @param Position $position
     *
     * @return JsonResponse
     */
    public function update(PositionRequest $request, Position $position): JsonResponse {
        Helper::checkConcurrentRequests($position);
        $attributes = $request->only($this->repository->getFillable());

        $position->update($attributes);

        return updated($position);
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     * @throws Throwable
     */
    public function destroy(Request $request): ?JsonResponse
    {
        try {
            DB::beginTransaction();
            $this->repository->deleteIn($request->id);
            DB::commit();
            return destroyed();
        } catch (Exception $exception) {
            DB::rollBack();
            return failed();
        }
    }
}
