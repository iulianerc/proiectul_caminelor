<?php


namespace App\Traits\Permission;


use App\Services\Permission\PermissionService;
use Illuminate\Support\Str;

trait BasicScopes
{
    private function createLocalScopeName($permissionName): string
    {
        self::$accessLevels[$permissionName] ??= PermissionService::getAccessLevel($permissionName);
        $localScopeName = 'scope' . Str::ucfirst(self::$accessLevels[$permissionName]);

        return Str::camel($localScopeName);
    }

    private function scopeAll($query)
    {
        return $query;
    }

    private function scopeOwn($query)
    {
        return $query->where('author_id', \user()->id);
    }

    private function scopeProject($query)
    {
        return $query->where('project_id', \user()->project_id);
    }

    private function scopeProductsIn($query, $params)
    {
        return $query->whereIn('products.id', $params);
    }
}
