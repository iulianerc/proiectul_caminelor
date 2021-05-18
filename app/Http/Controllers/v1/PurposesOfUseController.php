<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;

use App\Http\Requests\PurposesOfUse\PurposesOfUseRequest;
use App\Http\Resources\PurposesOfUse\PurposesOfUseForRequestResource;
use App\Http\Resources\PurposesOfUse\PurposesOfUseListLangResource;
use App\Http\Resources\PurposesOfUse\PurposesOfUseResource;
use App\Http\Resources\PurposesOfUse\PurposesOfUseResourceCollection;
use App\Models\PurposesOfUse\PurposesOfUse;
use App\Repositories\PurposesOfUse\PurposesOfUseRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Merax\Helpers\Helper;
use Throwable;

class PurposesOfUseController extends Controller
{
    protected PurposesOfUseRepository $repository;

    public function __construct(PurposesOfUseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function list(Request $request): JsonResponse
    {
        return ok(PurposesOfUseResource::collection(
            $this->repository->getListFields($request)
        ));
    }

    public function listLanguage(Request $request, string $language): JsonResponse
    {
        PurposesOfUseListLangResource::setLang($language);
        return ok(PurposesOfUseListLangResource::collection(
            $this->repository->getListFields($request)
        ));
    }

    public function infoForRequest(PurposesOfUse $purposesOfUse, $lang): JsonResponse
    {
        if (!in_array($lang, ['ro','en', 'ru'])) {
            return response()->json('', 404);
        }
        PurposesOfUseForRequestResource::setLang($lang);
        return ok(new PurposesOfUseForRequestResource($purposesOfUse));
    }

    public function index(): JsonResponse
    {
        return ok(new PurposesOfUseResourceCollection(
            $this->repository->get(),
            PurposesOfUseResource::class,
            'id'
        ));
    }

    public function store(PurposesOfUseRequest $request): JsonResponse
    {
        $attributes = $request->only($this->repository->getFillable());
        return created(PurposesOfUse::create($attributes));
    }

    public function edit(PurposesOfUse $purposesOfUse): JsonResponse
    {
        return ok(new PurposesOfUseResource($purposesOfUse));
    }

    public function update(PurposesOfUseRequest $request, PurposesOfUse $purposesOfUse): JsonResponse
    {
        Helper::checkConcurrentRequests($purposesOfUse);
        $attributes = $request->only($this->repository->getFillable());
        $purposesOfUse->update($attributes);

        return updated($purposesOfUse);
    }

    public function destroy(Request $request)
    {
        try {
            PurposesOfUse::find($request->id ?? 0)->delete();

            return destroyed();
        } catch (Throwable $throwable) {
            return failed();
        }
    }
}
