<?php
namespace seeds\com;

use App\Models\Permission\Permission;
use App\Models\Role\Role;
use App\Services\Permission\PermissionHandler;
use Illuminate\Database\Seeder;

class BasePermissionsTableSeeder extends Seeder
{
    public function run(): void
    {
        $roles = Role::all();
        foreach ($roles as $role) {
            app(PermissionHandler::class)->giveBasePermissions($role);
        }
    }

    public static function givePermissions(Role $role, array $permissions): void
    {
        $permissionNames = array_column($permissions, 'name');
        foreach ($permissionNames as $key => $name) {
            Permission::findOrCreate($name, 'api');
            if (!$role->hasPermissionTo($name)) {
                $accessPermissions = $permissions[$key];
                $accessPermissions['access_level'] = array_shift($accessPermissions['levels']);
                unset($accessPermissions['name'], $accessPermissions['levels']);
                $role->givePermissions([$name => $accessPermissions]);
            }
        }

    }
}
