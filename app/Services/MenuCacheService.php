<?php


namespace App\Services;

use App\Repositories\Menu\MenuOrderRepository;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Merax\Helpers\TreeBuilder;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class MenuCacheService
{
    public const USER = 'user';
    public const ROLE = 'role';

    public static function get(int $userID, int $roleID, string $language): array
    {
        $userKey = self::USER . ":{$userID}:{$language}";
        $roleKey = self::ROLE . ":{$roleID}:{$language}";
        $cache = Cache::get($userKey) ?? Cache::get($roleKey);

        if (empty($cache)) {
            self::update($userID, $roleID);
            $cache = self::get($userID, $roleID, $language);
        }

        return $cache;
    }

    public static function update(int $userID, int $roleID): void
    {
        $data = app(MenuOrderRepository::class)->getUsedItems($userID, $roleID);
        if (empty($data['items'])) {
            throw new NotFoundHttpException('Not found menu items');
        }
        $handlerID = $data['handler'] === self::USER ? $userID : $roleID;

        $tree = TreeBuilder::build(
            $data['items'],
            0,
            'parent_id',
            'children',
            'menu_item_id',
            'order_list'
        );

        foreach (Config::get('app.locales') as $language) {
            $tmp = $tree;
            $formattedTree = MenuOrderRepository::formatTree($tmp, $language);

            Cache::put("{$data['handler']}:{$handlerID}:{$language}", $formattedTree);
        }
    }

    public static function delete(int $userID, int $roleID): void
    {
        foreach (Config::get('app.locales') as $language) {
            $userKey = self::USER . ":{$userID}:{$language}";
            $roleKey = self::ROLE . ":{$roleID}:{$language}";
            Cache::forget($userKey);
            Cache::forget($roleKey);
        }
    }

    public static function clear(): void
    {
        Cache::flush();
    }
}
