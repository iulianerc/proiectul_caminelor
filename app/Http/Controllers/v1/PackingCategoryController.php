<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\PackingCategory\PackingCategoryRequest;
use App\Http\Resources\MainResourceCollection;
use App\Http\Resources\PackingCategory\PackingCategoryListResource;
use App\Http\Resources\PackingCategory\PackingCategoryResource;
use App\Models\PackingCategory\PackingCategory;
use App\Repositories\PackingCategory\PackingCategoryRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Merax\Helpers\Helper;
use Throwable;

class PackingCategoryController extends Controller
{
    protected PackingCategoryRepository $repository;

    public function __construct(PackingCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function list(Request $request): JsonResponse
    {
        return ok(PackingCategoryListResource::collection(
            $this->repository->getListFields($request)
        ));
    }

    public function index(): JsonResponse
    {
        return ok(new MainResourceCollection(
            $this->repository->get(),
            PackingCategoryResource::class,
            'name_en'
        ));
    }

    public function store(PackingCategoryRequest $request): JsonResponse
    {
        $attributes = $request->only($this->repository->getFillable());
        $country = PackingCategory::create($attributes);

        return created($country);
    }

    public function edit(PackingCategory $packingCategory): JsonResponse
    {
        return ok(new PackingCategoryResource($packingCategory));
    }

    public function update(Request $request,  PackingCategory $packingCategory): JsonResponse
    {
        Helper::checkConcurrentRequests($packingCategory);
        $attributes = $request->only($packingCategory->getFillable());
        $packingCategory->update($attributes);
        return updated($packingCategory);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function destroy(Request $request): JsonResponse
    {
        try {
            PackingCategory::find($request->id ?? 0)->delete();

            return destroyed();
        } catch (Throwable $throwable) {
            return response()->json([], Response::HTTP_GONE);
        }
    }
}
