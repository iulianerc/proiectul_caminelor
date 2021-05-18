<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorizedPerson\AuthorizedPersonRequest;
use App\Http\Requests\ListMethod\ListMethodRequest;
use App\Http\Resources\AuthorizedPerson\AuthorizedPersonListResource;
use App\Http\Resources\AuthorizedPerson\AuthorizedPersonResource;
use App\Http\Resources\MainResourceCollection;
use App\Models\AuthorizedPerson\AuthorizedPerson;
use App\Repositories\AuthorizedPerson\AuthorizedPersonRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Merax\Helpers\Helper;
use Throwable;

class AuthorizedPersonController extends Controller
{
    protected AuthorizedPersonRepository $repository;

    public function __construct(AuthorizedPersonRepository $repository)
    {
        $this->repository = $repository;
    }

    public function list(ListMethodRequest $request): JsonResponse
    {
        return ok(
            AuthorizedPersonListResource::collection(
                $this->repository->getListFields($request)
            )
        );
    }

    public function index(): JsonResponse
    {
        return ok(new MainResourceCollection(
            $this->repository->get(),
            AuthorizedPersonResource::class,
            'name_en'
        ));
    }

    public function store(AuthorizedPersonRequest $request): JsonResponse
    {
        $attributes = $request->only($this->repository->getFillable());
        $country = AuthorizedPerson::create($attributes);

        return created($country);
    }

    public function edit(AuthorizedPerson $authorizedPerson): JsonResponse
    {
        return ok(new AuthorizedPersonResource($authorizedPerson));
    }

    public function update(AuthorizedPersonRequest $request,  AuthorizedPerson $authorizedPerson): JsonResponse
    {
        Helper::checkConcurrentRequests($authorizedPerson);
        $attributes = $request->only($authorizedPerson->getFillable());
        $authorizedPerson->update($attributes);
        return updated($authorizedPerson);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function destroy(Request $request): JsonResponse
    {
        try {
            AuthorizedPerson::find($request->id ?? 0)->delete();

            return destroyed();
        } catch (Throwable $throwable) {
            return response()->json([], Response::HTTP_GONE);
        }
    }
}
