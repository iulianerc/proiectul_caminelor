<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientBankAccount\ClientBankAccountRequest;
use App\Http\Resources\ClientBankAccount\ClientBankAccountResource;
use App\Http\Resources\MainResourceCollection;
use App\Models\ClientBankAccount\ClientBankAccount;
use App\Repositories\ClientBankAccount\ClientBankAccountRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Merax\Helpers\Helper;
use Throwable;

class ClientBankAccountController extends Controller
{
    protected ClientBankAccountRepository $repository;

    public function __construct(ClientBankAccountRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(): JsonResponse
    {
        return ok(new MainResourceCollection(
            $this->repository->get(),
            ClientBankAccountResource::class,
            'account'
        ));
    }

    public function store(ClientBankAccountRequest $request): JsonResponse
    {
        $attributes = $request->only($this->repository->getFillable());
        $clientBankAccount = ClientBankAccount::create($attributes);

        return created($clientBankAccount);
    }

    /**
     * @param ClientBankAccount $clientBankAccount
     * @return JsonResponse
     */
    public function edit(ClientBankAccount $clientBankAccount): JsonResponse
    {
        return ok(new ClientBankAccountResource($clientBankAccount));
    }

    public function update(ClientBankAccountRequest $request,  ClientBankAccount $clientBankAccount): JsonResponse
    {
        Helper::checkConcurrentRequests($clientBankAccount);
        $attributes = $request->only($clientBankAccount->getFillable());
        $clientBankAccount->update($attributes);

        return updated(new ClientBankAccountResource($clientBankAccount));
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function destroy(Request $request): JsonResponse
    {
        try {
            ClientBankAccount::find($request->id ?? 0)->delete();

            return destroyed();
        } catch (Throwable $throwable) {
            return response()->json([], Response::HTTP_GONE);
        }
    }
}
