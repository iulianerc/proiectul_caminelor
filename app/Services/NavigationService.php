<?php

namespace App\Services;

use Illuminate\Http\JsonResponse;

class NavigationService
{
    public function __invoke(MenuCacheService $menuCacheService): JsonResponse
    {
        $userID = \user()->id;
        $roleID = \user_role()->id;
        $language = app()->getLocale();
        $response['items'] = $menuCacheService::get($userID, $roleID, $language);
        return ok($response);
    }
}
