<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ListMethod\ListMethodRequest;
use App\Http\Requests\Transport\TransportRequest;
use App\Http\Resources\Transport\TransportListResource;
use App\Http\Resources\Transport\TransportResource;
use App\Repositories\Transport\TransportRepository;
use App\Models\Transport\Transport;
use App\Http\Resources\MainResourceCollection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Merax\Helpers\Helper;
use Throwable;

class TransportController extends Controller
{
    protected TransportRepository $repository;

    public function __construct(TransportRepository $repository)
    {
        $this->repository = $repository;
    }

    public function list(ListMethodRequest $request): JsonResponse
    {
        return ok(TransportListResource::collection($this->repository->getListFields($request)));
    }

    public function index(): JsonResponse
    {
        return ok(new MainResourceCollection(
            $this->repository->get(),
            TransportResource::class,
            'name_en'
        ));
    }

    public function store(TransportRequest $request): JsonResponse
    {
        $attributes = $request->only($this->repository->getFillable());
        $transport = Transport::create($attributes);

        return created($transport);
    }

    /**
     * @param Transport $transport
     * @return JsonResponse
     */
    public function edit(Transport $transport): JsonResponse
    {
        return ok(new TransportResource($transport));
    }

    public function update(TransportRequest $request,  Transport $transport): JsonResponse
    {
        Helper::checkConcurrentRequests($transport);
        $attributes = $request->only($transport->getFillable());
        $transport->update($attributes);

        return updated(new TransportResource($transport));
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function destroy(Request $request): JsonResponse
    {
        try {
            Transport::find($request->id ?? 0)->delete();

            return destroyed();
        } catch (Throwable $throwable) {
            return response()->json([], Response::HTTP_GONE);
        }
    }
}
