<?php

namespace App\Http\Controllers\v1;

use App\Http\Requests\BasicRequest;
use App\Http\Requests\Role\RoleRequest;
use App\Http\Resources\Role\RoleEditResource;
use App\Http\Resources\Role\RoleListResource;
use App\Http\Resources\Role\RoleResource;
use App\Http\Resources\Role\RoleResourceCollection;
use App\Models\Role\Role;
use App\Repositories\Role\RoleRepository;
use App\Templates\Role\RoleFilter;
use App\Templates\Role\RoleForm;
use App\Services\Permission\PermissionHandler;
use Exception;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Merax\Helpers\Helper;
use Throwable;

class RoleController extends Controller
{
    protected RoleRepository $repository;

    public function __construct (RoleRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     *  Get roles
     *
     * @OA\Get(
     *      path="/api/v1/roles",
     *      tags={"Roles"},
     *      operationId="getRoles",
     *      description="Returns list of Roles",
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\JsonContent(ref="#/components/schemas/Role")
     *       ),
     *       @OA\Response(response=401, description="Unauthorized")
     *     )
     */
    public function index (): JsonResponse
    {
        return ok(
            new RoleResourceCollection(
                $this->repository->get(),
                RoleResource::class
            )
        );
    }

    /**
     *  Get Role Create Form
     *
     * @OA\Get(
     *      path="/api/v1/roles/create",
     *      tags={"Roles"},
     *      operationId="getRoleForm",
     *      description="Get Role Form(for create)",
     *      @OA\Response(response=200,description="Success"),
     *      @OA\Response(response=401, description="Unauthorized")
     *     )
     */
    public function create (RoleForm $form): JsonResponse
    {
        return ok($form->build());
    }

    /**
     * Store Role
     *
     * @OA\Post(
     *      path="/api/v1/roles",
     *      tags={"Roles"},
     *      operationId="storeRole",
     *      summary="Store a Role",
     *      requestBody={"$ref": "#/components/requestBodies/Role"},
     *      @OA\Response(
     *          response=201,
     *          description="Created",
     *          @OA\JsonContent(ref="#/components/schemas/Role")
     *       ),
     *       @OA\Response(response=422, description="Validation error"),
     *       @OA\Response(response=401, description="Unauthorized"),
     *)
     * @param RoleRequest $request
     * @return JsonResponse
     */
    public function store (RoleRequest $request): JsonResponse
    {
        $attributes = $request->only($this->repository->getFillable());
        $role = Role::create($attributes);

        return created($role);
    }

    public function show (Role $role): JsonResponse
    {
        return ok($role);
    }

    /**
     *  Get Role Edit Form
     *
     * @OA\Get(
     *      path="/api/v1/roles/{id}/edit",
     *      tags={"Roles"},
     *      operationId="getRoleEditForm",
     *      description="Get Role Form(for edit)",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Service id to edit",
     *         required=true
     *      ),
     *      @OA\Response(response=200,description="Success"),
     *      @OA\Response(response=401, description="Unauthorized")
     *     )
     * @param Role $role
     * @return JsonResponse
     */
    public function edit (Role $role): JsonResponse
    {
        return ok(new RoleEditResource($role));
    }

    /**
     * Update role
     *
     * @OA\Patch(
     *      path="/api/v1/roles/{id}",
     *      tags={"Roles"},
     *      operationId="UpdateRole",
     *      summary="Update a Role",
     *      @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Role id to update",
     *         required=true
     *      ),
     *      requestBody={"$ref": "#/components/requestBodies/Role"},
     *      @OA\Response(
     *          response=204,
     *          description="Updated",
     *          @OA\JsonContent(ref="#/components/schemas/Role")
     *       ),
     *       @OA\Response(response=422, description="Validation error"),
     *       @OA\Response(response=401, description="Unauthorized")
     *)
     * @param RoleRequest $request
     * @param Role $role
     * @return JsonResponse
     */
    public function update (RoleRequest $request, Role $role): JsonResponse
    {
        Helper::checkConcurrentRequests($role);
        $attributes = $request->only($this->repository->getFillable());
        $role->update($attributes);

        return updated($role);
    }

    /**
     * Delete a service
     *
     * @OA\Delete(
     *      path="/api/v1/roles",
     *      tags={"Roles"},
     *      operationId="deleteRole",
     *      summary="Delete a Role",
     *      @OA\Parameter(
     *         name="id",
     *         in="header",
     *         description="Role id to delete",
     *         required=true
     *      ),
     *      requestBody={"$ref": "#/components/requestBodies/Role"},
     *      @OA\Response(response=204, description="Delete successfull, no content"),
     *      @OA\Response(response=401, description="Unauthorized")
     *)
     * @param Request $request
     * @return JsonResponse
     */
    public function destroy (Request $request): JsonResponse
    {
        try {
            DB::beginTransaction();
            Role::find($request->id ?? 0)->delete();
            DB::commit();
            return destroyed();
        } catch (Exception $exception) {
            DB::rollBack();
            return failed();
        }
    }

    public function filters (RoleFilter $filters): JsonResponse
    {
        $filters->schema()->applyPermissions();
        return ok($filters->build());
    }

    /**
     * Edit role permissions form
     *
     * @OA\Get(
     *      path="/api/v1/roles/{role}/edit_permissions",
     *      tags={"Roles"},
     *      operationId="getRolePermisions",
     *      description="Get edit role_permissions form",
     *      @OA\Parameter(
     *         name="role",
     *         in="path",
     *         description="Role id to edit permissions",
     *         required=true
     *      ),
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="permission id to edit",
     *         required=true
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *       ),
     *       @OA\Response(response=401, description="Unauthorized")
     * )
     * @param Role $role - текущая роль
     * @param PermissionHandler $permissionHandler
     *
     * @return mixed
     */
    public function editPermissions (Role $role, PermissionHandler $permissionHandler)
    {
        // получаем схему прав доступа
        $data['schema']['groups'] = (array)config('permissions');
        $permissionHandler->handle($data['schema']);
        // устанавливаем название роли для которой изменяются права доступа
        $data['schema']['title'] = $role->name;
        // устанавливаем время создания формы
        $data['schema']['params']['created_at'] = time();
        // записываем текущие права доступа на данную роль
        $data['dataObject'] = $permissionHandler->getDataObject($role, $data['schema']['groups']);

        return $data;
    }

    /**
     * Update role permissions
     *
     * @OA\Patch(
     *      path="/api/v1/roles/{role}/edit_permissions",
     *      tags={"Roles"},
     *      operationId="UpdateRolePermissions",
     *      summary="Update permissions for a Role",
     *      @OA\Parameter(
     *         name="role",
     *         in="path",
     *         description="Role id to update permisisions",
     *         required=true
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="Updated"
     *       ),
     *       @OA\Response(response=422, description="Validation error"),
     *       @OA\Response(response=401, description="Unauthorized")
     *)
     * @param BasicRequest $request
     * @param Role $role
     * @param PermissionHandler $permissionHandler
     *
     * @return JsonResponse
     */
    public function updatePermissions (
        BasicRequest $request,
        Role $role,
        PermissionHandler $permissionHandler
    ): JsonResponse
    {
        try {
            DB::beginTransaction();
            // получаем выбранные права доступа
            $permissions = $request->groups;
            $allPermissions['groups'] = config('permissions');
            // обрабатываем выбранные права доступа и записываем новые, если есть
            $permissionHandler->handleAndCreate($allPermissions, $permissions);
            // удаляем текущие права доступа на роль
            $role->permissions()->detach();
            // задаем базовые права доступа на роль
            $permissionHandler->giveBasePermissions($role);
            // записываем новые права доступа
            $role->givePermissions($permissions);
            DB::commit();
            return ok();
        } catch (Exception $exception) {
            DB::rollBack();
            return failed();
        }
    }

    public function list (): JsonResponse
    {
        return ok(
            RoleListResource::collection(Role::all())
        );
    }
}
