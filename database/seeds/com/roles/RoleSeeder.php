<?php

namespace Database\Seeders\inn\roles;

use App\Models\Menu\MenuItem;
use App\Models\Position\Position;
use App\Models\Role\Role;
use App\Repositories\Menu\MenuOrderRepository;
use App\Services\MenuCacheService;
use App\Services\Permission\PermissionHandler;
use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

abstract class RoleSeeder extends Seeder
{
    protected Role $role;
    protected string $alias;
    protected string $permissions;
    protected string $menu;
    protected Collection $menuItems;

    public function run(): void
    {
        $this->position = Position::findByAlias($this->alias);
        $this->role = $this->position->roles->first();
        $this->link();
        $this->applyPermissions();

        $this->menuItems = MenuItem::all(['id', 'link'])->keyBy('link');
        $this->menu();
    }

    protected function link(): void
    {
        $this->position
            ->users()
            ->get()
            ->map(fn($user) => $user->syncRole());
    }

    protected function applyPermissions(): void
    {
        try {
            // получаем выбранные права доступа
            $permissions = decode(file_get_contents(database_path($this->permissions)))['groups'];
            $allPermissions['groups'] = config('permissions');
            // обрабатываем выбранные права доступа и записываем новые, если есть
            app(PermissionHandler::class)->handleAndCreate($allPermissions, $permissions);
            // удаляем текущие права доступа на роль
            $this->role->permissions()->detach();
            // задаем базовые права доступа на роль
            app(PermissionHandler::class)->giveBasePermissions($this->role);
            // записываем новые права доступа
            $this->role->givePermissions($permissions);
        } catch (Exception $exception) {
            dump($exception->getMessage());
        }
    }

    protected function menu(): void
    {
        $tree = include(database_path($this->menu));
        $tree = $this->formatMenu($tree);

        app(MenuOrderRepository::class)->removeOrder(0, $this->role->id);
        app(MenuOrderRepository::class)->insertOrder(0, $this->role->id, $tree);
        MenuCacheService::delete(0, $this->role->id);
    }

    private function formatMenu(array $items, array &$menu = [], int $parentId = 0): array
    {
        foreach ($items as $item => $children) {
            if (is_array($children)) {
                $menu[] = [
                    'id'        => $this->menuItems[$item]->id,
                    'parent_id' => null
                ];
                $this->formatMenu($children, $menu, $this->menuItems[$item]->id);
            } else {
                $menu[] = [
                    'id'        => $this->menuItems[$children]->id,
                    'parent_id' => $parentId ?: null
                ];
            }
        }

        return $menu;
    }
}
