<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Password\ChangePasswordRequest;
use App\Http\Requests\User\UserCreateRequest;
use App\Http\Requests\User\UserEditRequest;
use App\Http\Resources\User\UserEditResource;
use App\Http\Resources\User\UserListResource;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\User\UserResourceCollection;
use App\Http\Resources\User\UserSpecialistsResource;
use App\Models\User\User;
use App\Repositories\User\UserRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use LaravelMerax\Avatars\App\Models\Avatar;
use Merax\Helpers\Helper;
use Throwable;

class UserController extends Controller
{
    protected UserRepository $repository;

    public function __construct (UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index (): JsonResponse
    {
        return ok(new UserResourceCollection(
            $this->repository->get(),
            UserResource::class,
        ));
    }

    public function store (UserCreateRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();
            $user = $this->repository->store($request->validated());
            DB::commit();
        } catch (Throwable $throwable) {
            DB::rollBack();

            return failed(['message' => $throwable->getMessage()]);
        }

        return created(new UserResource($user));
    }

    public function edit (User $user): JsonResponse
    {
        return ok(new UserEditResource($user));
    }

    public function update (UserEditRequest $request, User $user, Avatar $avatar): JsonResponse
    {
        Helper::checkConcurrentRequests($user);
        try {
            DB::beginTransaction();

            $attributes = $request->only($this->repository->getFillable());
            $user->update($attributes);
            $this->repository->updateDependencies($user, $request->validated());

            DB::commit();
        } catch (Throwable $throwable) {
            DB::rollBack();

            return failed(['message' => $throwable->getMessage()]);
        }

        return updated($user);
    }

    public
    function destroy (Request $request): JsonResponse
    {
        try {
            DB::beginTransaction();
            User::find($request->id ?? 0)->delete();
            DB::commit();
            return destroyed();
        } catch (Exception $exception) {
            DB::rollBack();

            return failed();
        }
    }

    public
    function toggleState (User $user): JsonResponse
    {
        $user->update(['is_active' => !$user->getAttributes()['is_active']]);

        return updated();
    }


    public
    function changePassword (ChangePasswordRequest $request, User $user): JsonResponse
    {
        $user->update([
            'password'            => $request->password,
            'password_changed_at' => now()
        ]);

        $user->tokens()->delete();

        return updated();
    }

    public
    function getAllUsers (): JsonResponse
    {
        return ok(UserListResource::collection(User::all()));
    }

    public
    function specialistsList (): JsonResponse
    {
        $specialists = $this->repository->specialistsList();

        return ok(UserSpecialistsResource::collection($specialists));
    }
}

