<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\MenuItemRequest;
use App\Http\Resources\MainResource;
use App\Http\Resources\MenuItem\MenuItemResource;
use App\Http\Resources\MenuItem\MenuItemResourceCollection;
use App\Models\Menu\MenuItem;
use App\Repositories\Menu\MenuItemRepository;
use App\Repositories\Menu\MenuOrderRepository;
use App\Repositories\Role\RoleRepository;
use App\Repositories\User\UserRepository;
use App\Templates\Menu\MenuItemFilter;
use App\Templates\Menu\MenuItemForm;
use App\Templates\Menu\MenuOrderForm;
use App\Services\MenuCacheService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Merax\Helpers\Helper;
use Throwable;

class MenuItemController extends Controller
{
    protected MenuItemRepository $repository;

    public function __construct(MenuItemRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(): JsonResponse
    {
        return ok(
            new MenuItemResourceCollection(
                $this->repository->get(),
                MenuItemResource::class,
                'name_'.app()->getLocale()
            )
        );
    }

    public function filters(MenuItemFilter $filters): JsonResponse
    {
        $filters->schema()->applyPermissions();
        return ok($filters->build());
    }

    public function create(MenuItemForm $form): JsonResponse
    {
        return ok($form->build());
    }

    public function store(MenuItemRequest $request): JsonResponse
    {
        $attributes = $request->only($this->repository->getFillable());
        $menuItem = MenuItem::create($attributes);

        return created($menuItem);
    }

    public function edit(MenuItem $menuItem, MenuItemForm $form): JsonResponse
    {
        $form->dataObject()->set($menuItem);

        return ok($form->build());
    }

    /**
     * @param  MenuItemRequest  $request
     * @param  MenuItem  $menuItem
     *
     * @return JsonResponse
     */
    public function update(MenuItemRequest $request, MenuItem $menuItem): JsonResponse
    {
        Helper::checkConcurrentRequests($menuItem);
        $attributes = $request->only($this->repository->getFillable());

        $menuItem->update($attributes);
        MenuCacheService::clear();

        return updated($menuItem);
    }

    /**
     * @param  Request  $request
     *
     * @return JsonResponse
     * @throws Throwable
     */
    public function destroy(Request $request): ?JsonResponse
    {
        try {
            DB::beginTransaction();
            $this->repository->deleteIn($request->id);
            MenuCacheService::clear();

            DB::commit();
            return destroyed();
        } catch (Exception $exception) {
            DB::rollBack();
            return failed();
        }
    }

    public function editOrderHolders(
        MenuOrderForm $form,
        RoleRepository $roleRepository,
        UserRepository $userRepository
    ): JsonResponse {
        $form->schema()->getComponent('role_id')
            ->setData($roleRepository->getAllowedList());

        $form->schema()->getComponent('user_id')
            ->setData($userRepository->getAllowedUsersByRoles());

        return ok($form->build());
    }

    public function editOrderContent(Request $request, MenuCacheService $menuCacheService): JsonResponse
    {
        //TODO REFACTOR ROUTE
        $userID = (int) $request->get('user_id');
        $roleID = (int) $request->get('role_id');
        $language = app()->getLocale();

        return ok([
            'unused_items' => $this->repository->getUnusedItems($userID, $roleID, $language),
            'tree'         => $menuCacheService::get($userID, $roleID, $language)
        ]);
    }

    /**
     * @param  Request  $request
     * @param  MenuOrderRepository  $menuOrderRepository
     *
     * @return JsonResponse
     * @throws Throwable
     */
    public function storeOrderContent(Request $request, MenuOrderRepository $menuOrderRepository): ?JsonResponse
    {
        //TODO REFACTOR ROUTE
        try {
            DB::beginTransaction();
            $userID = (int) $request->get('user_id');
            $roleID = (int) $request->get('role_id');
            $tree = $request->get('tree');
            $tree = $menuOrderRepository->toListArray($tree);

            $menuOrderRepository->removeOrder($userID, $roleID);
            $menuOrderRepository->insertOrder($userID, $roleID, $tree);
            MenuCacheService::delete($userID, $roleID);

            DB::commit();
            return ok();
        } catch (Exception $exception) {
            DB::rollBack();
            return failed();
        }
    }


}
