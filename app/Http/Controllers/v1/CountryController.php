<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Country\CountryListResource;
use App\Http\Resources\Country\CountryResourceCollection;
use App\Models\Country\Country;
use App\Http\Requests\Country\CountryRequest;
use App\Http\Resources\Country\CountryResource;
use App\Repositories\Country\CountryRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Merax\Helpers\Helper;
use Throwable;

class CountryController extends Controller
{
    protected CountryRepository $repository;

    public function __construct(CountryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(): JsonResponse
    {
        return ok(new CountryResourceCollection(
            $this->repository->get(),
        ));
    }

    public function list(): JsonResponse
    {
        return ok(
            CountryListResource::collection(
                Country::where('accept_ata', 1)->get()
            )
        );
    }

    public function store(CountryRequest $request): JsonResponse
    {
        $attributes = $request->only($this->repository->getFillable());
        $country = Country::create($attributes);

        return created($country);
    }

    /**
     * @param Country $country
     * @return JsonResponse
     */
    public function edit(Country $country): JsonResponse
    {
        return ok(new CountryResource($country));
    }

    public function update(CountryRequest $request, Country $country): JsonResponse
    {
        Helper::checkConcurrentRequests($country);
        $attributes = $request->only($country->getFillable());
        $country->update($attributes);

        return updated(new CountryResource($country));
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function destroy(Request $request): JsonResponse
    {
        try {
            Country::find($request->id ?? 0)->delete();

            return destroyed();
        } catch (Throwable $throwable) {
            return response()->json([], Response::HTTP_GONE);
        }
    }
}
