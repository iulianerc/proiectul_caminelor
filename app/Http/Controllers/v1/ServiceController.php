<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Service\ServiceRequest;
use App\Http\Resources\Service\ServiceResourceCollection;
use App\Http\Resources\Service\ServiceResource;
use App\Http\Resources\Service\ServiceListResource;
use App\Models\Service\Service;
use App\Repositories\Service\ServiceRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Merax\Helpers\Helper;
use phpDocumentor\Reflection\Utils;
use Throwable;


class ServiceController extends Controller
{
    protected ServiceRepository $repository;

    public function __construct(ServiceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(): JsonResponse
    {
        return ok(new ServiceResourceCollection(
            $this->repository->get(),
            ServiceResource::class,
            'id'
        ));
    }

    public function list(): JsonResponse
    {
        return ok(ServiceListResource::collection($this->repository->list()));
    }

    public function store(ServiceRequest $request): JsonResponse
    {
        $service = $this->repository->create($request->all());
        return created($service);
    }

    public function edit(Service $service): JsonResponse
    {
        return ok(new ServiceResource($service));
    }

    public function update(ServiceRequest $request, Service $service): JsonResponse
    {
        Helper::checkConcurrentRequests($service);
        $service = $this->repository->update($request->all(), $service);
        return updated($service);
    }

    public function destroy(Request $request): JsonResponse
    {
        try {
            $this->repository->delete($request->id);

            return destroyed();
        } catch (Throwable $throwable) {
            return failed();
        }
    }
}
