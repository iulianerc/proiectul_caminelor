<?php

namespace App\Http\Controllers\v1;

use App\Actions\EnumLangAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\ClientLiveSearchRequest;
use App\Http\Requests\Client\ClientRequest;
use App\Http\Resources\Client\ClientEditResource;
use App\Http\Resources\Client\ClientInfoForRequestResource;
use App\Http\Resources\Client\ClientLiveSearchResource;
use App\Http\Resources\Client\ClientResource;
use App\Http\Resources\MainResourceCollection;
use App\Models\Client\Client;
use App\Repositories\Client\ClientRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Merax\Helpers\Helper;
use Throwable;

class ClientController extends Controller
{
    protected ClientRepository $repository;

    public function __construct(ClientRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(): JsonResponse
    {
        return ok(new MainResourceCollection(
            $this->repository->get(),
            ClientResource::class
        ));
    }

    public function liveSearchForFilters(ClientLiveSearchRequest $request): JsonResponse
    {
        return ok(
            ClientLiveSearchResource::collection(
                $this->repository->liveSearchForFilters($request->searchValue)
            )
        );
    }

    public function liveSearchForRequest(ClientLiveSearchRequest $request): JsonResponse
    {
        return ok(
            $this->repository->liveSearchForRequest($request->searchValue)
        );
    }

    public function infoForRequest(Client $client, $lang): JsonResponse
    {
        if (!in_array($lang, ['ro', 'en', 'ru'])) {
            return response()->json('', 404);
        }
        ClientInfoForRequestResource::setLang($lang);
        return ok(new ClientInfoForRequestResource($client));
    }

    public function store(ClientRequest $request): JsonResponse
    {
        return created($this->repository->create($request));
    }

    /**
     * @param Client $client
     * @return JsonResponse
     */
    public function edit(Client $client): JsonResponse
    {
        return ok(new ClientEditResource($client));
    }

    public function update(ClientRequest $request, Client $client): JsonResponse
    {
        Helper::checkConcurrentRequests($client);
        $updatedClient = $this->repository->update($request, $client);

        return updated(new ClientEditResource($updatedClient));
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function destroy(Request $request): JsonResponse
    {
        try {
            DB::beginTransaction();
            $client = Client::find($request->id ?? 0);
            $client->bank_accounts()->delete();
            $client->contacts()->delete();
            $client->delete();
            DB::commit();
            return destroyed();
        } catch (Throwable $throwable) {
            DB::rollBack();
            return response()->json([], Response::HTTP_GONE);
        }
    }

    public function getTypes(EnumLangAction $langAction)
    {
        return ok($langAction->handle(__('modules/clients.types')));
    }
}
