<?php

namespace App\Models\Role;

use App\Models\Permission\Permission;
use App\Models\Permission\RoleHasPermission;
use App\Models\Position\Position;
use App\Traits\Mutator\BasicMutators;
use App\Traits\Permission\ApplyPermissions;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use OwenIt\Auditing\Contracts\Auditable;
use Yadakhov\InsertOnDuplicateKey;

/**
 * Class Role
 *
 * @property string guard_name
 * @property string id
 * @OA\Schema(
 *   required={"name"},
 *   @OA\Xml(name="Role"),
 *   @OA\Property(property="id", type="integer", readOnly="true", example="1"),
 *   @OA\Property(property="name", description="Role name", type="string", readOnly="false"),
 *   @OA\Property(property="guard_name", description="Role guard name", type="string", readOnly="false"),
 * )
 */
class  Role extends \Spatie\Permission\Models\Role implements Auditable
{
    use ApplyPermissions;
    use InsertOnDuplicateKey;
    use BasicMutators;
    use \OwenIt\Auditing\Auditable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'name_ro',
        'name_en',
        'name_ru',
    ];
    protected $attributes = [
        'guard_name' => 'api',
    ];
    protected $dates = ['created_at', 'updated_at'];

    /**
     * A role may be given various permissions.
     */
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(
            config('permission.models.permission'),
            config('permission.table_names.role_has_permissions'),
            'role_id',
            'permission_id'
        )->using(RoleHasPermission::class)->withPivot(['access_level', 'fields', 'params']);
    }

    public function givePermissions($permissions): self
    {
        // TODO валидация на то если передаются все нужные параметры
        // TODO если параметр не задан и он не обяхателен, то ставить null
        $permissionsKeys = array_keys($permissions);

        $permissionsKeys = collect($permissionsKeys)
            ->flatten()
            ->map(function ($permission) {
                if (empty($permission)) {
                    return false;
                }

                return $this->getStoredPermission($permission);
            })
            ->filter(static function ($permission) {
                return $permission instanceof Permission;
            })
            ->each(function ($permission) {
                $this->ensureModelSharesGuard($permission);
            })
            ->map->id
            ->all();

        foreach ($permissionsKeys as $key) {
            $permissionName = Permission::findById($key, $this->guard_name)->name;
            [$accessLevel, $fields, $params] = $this->createPivotValues($permissions[$permissionName]);
            $this->permissions()
                ->withPivotValue([
                    'access_level' => $accessLevel,
                    'fields'       => $fields,
                    'params'       => $params,
                ])
                ->sync($key, false);
        }
        $this->load('permissions');

        $this->forgetCachedPermissions();

        return $this;
    }

    private function createPivotValues($permission): array
    {
        $accessLevel = $permission['access_level'] ?? 'all';
        $fields = encode($permission['fields'] ?? []);
        $params = encode($permission['params'] ?? []);

        return [$accessLevel, $fields, $params];
    }

    public function scopeQuickFilter(Builder $query, $value): Builder
    {
        return $query->where('name', 'LIKE', "%{$value}%");
    }

    public function positions(): BelongsToMany
    {
        return $this->belongsToMany(Position::class);
    }
}
