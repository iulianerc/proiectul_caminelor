<?php


namespace App\Services\Permission;

use Spatie\Permission\WildcardPermission;

class PermissionService
{

    public static function getAccessLevel(string $permissionName): ?string
    {
        return self::search('access_level', $permissionName);
    }

    public static function getFields(string $permissionName): array
    {
        return self::search('fields', $permissionName) ?? [];
    }

    public static function getParams(string $permissionName): array
    {
        return self::search('params', $permissionName) ?? [];
    }

    private static function search(string $field, string $permissionName)
    {
        foreach (user()->getAllPermissions() as $permission) {
            $userPermission = new WildcardPermission($permission->name);

            if ($userPermission->implies($permissionName)) {
                return $permission->pivot->{$field};
            }
        }

        return null;
    }
}
