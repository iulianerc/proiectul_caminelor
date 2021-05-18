<?php


namespace App\Repositories\Menu;


use App\Models\Menu\MenuOrder;
use App\Repositories\Repository;
use App\Services\MenuCacheService;

class MenuOrderRepository extends Repository
{
    protected function modelName(): string
    {
        return MenuOrder::class;
    }

    public static function formatTree(&$parents, string $language)
    {
        foreach ($parents as &$parent) {
            $parent = $parent->toArray();
            $result = [
                'text' => $parent['menu_item']['name_' . $language],
                'link' => $parent['menu_item']['link'],
                'icon' => $parent['menu_item']['icon'],
                'id'   => $parent['menu_item_id'],
            ];
            if (isset($parent['children'])) {
                $result['children'] = self::formatTree($parent['children'], $language);

            }
            $parent = $result;
        }
        return $parents;
    }

    public static function toListArray(
        array $parents,
        array &$result = [],
        int $parentID = 0
    ): array {
        if (!empty($parents)) {
            foreach ($parents as $parent) {
                if (isset($parent['children'])) {
                    self::toListArray($parent['children'], $result, $parent['id']);
                    unset($parent['children']);
                }
                $parent['parent_id'] = $parentID;

                $result[] = $parent;
            }
        }

        return $result;
    }

    public function insertOrder(
        int $userID,
        int $roleID,
        array $tree
    ): void {
        $authorID = \user()->id ?? 1;
        $order = 0;
        $toInsert = [];
        foreach ($tree as $item) {
            $order++;
            $toInsert[] = [
                'user_id'      => $userID ?: null,
                'role_id'      => $roleID ?: null,
                'menu_item_id' => $item['id'],
                'parent_id'    => $item['parent_id'] ?: null,
                'order_list'   => $order,
                'created_at'   => now(),
                'updated_at'   => now(),
                'author_id'    => $authorID
            ];
        }

        $this->model::insert($toInsert);
    }

    public function removeOrder(int $userID, int $roleID): void {
        if ($userID) {
            $this->model::where('user_id', $userID)->delete();
        } else {
            $this->model::where('role_id', $roleID)->delete();
        }
    }


    public function getUsedItems(int $userID, int $roleID): array
    {
        $handler = '';
        if ($items = $this->getUserUsedItems($userID)) {
            $handler = MenuCacheService::USER;
        }

        if ($items = $this->getRoleUsedItems($roleID)) {
            $handler = MenuCacheService::ROLE;
        }

        return [
            'handler' => $handler,
            'items'   => $items,
        ];
    }

    private function getUserUsedItems(int $userID): array
    {
        return $this->model::with('menuItem')
            ->where('user_id', $userID)
            ->get()
            ->all();
    }

    private function getRoleUsedItems(int $roleID): array
    {
        return $this->model::with('menuItem')
            ->where('role_id', $roleID)
            ->get()
            ->all();
    }


}
