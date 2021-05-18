<?php


namespace App\Traits\Permission;

use App\Services\Permission\PermissionService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Route;

trait ApplyPermissions
{
    use BasicRules;
    use BasicScopes;

    protected static array $accessLevels;

    protected static array $actions = [];

    protected static array $rowActions = [];

    public function scopeApplyPermissions(Builder $query, string $permissionName = null) : Builder
    {
        $permissionName ??= Route::currentRouteName();
        if (!$permissionName) {
            return $query;
        }

        $method = $this->createLocalScopeName($permissionName);
        if (method_exists($this, $method)) {
            $params = PermissionService::getParams($permissionName);
            return $this->{$method}($query, $params);
        }
        throw new \RuntimeException('There is no local scope called: ' . $method . ' in ' . self::class);
    }

    public function scopeAllowedWhereHas(
        Builder $query,
        string $relation = null,
        string $permissionName = null
    ): Builder {
        if (!$relation) {
            return $query;
        }
        return $query->whereHas($relation, static function (Builder $subquery) use ($permissionName) {
            $subquery->applyPermissions($permissionName);
        });
    }

    public function setActions(array $actions): self
    {
        self::$actions = $actions;

        return $this;
    }

    /**
     * Обработка действий для вызова из строки таблицы
     *
     * @param array $rowActions
     *
     * @return $this
     */
    public function handleRowActions(array $rowActions): self
    {
        foreach ($rowActions as $key => $rowAction) {
            $permissionName = self::$actions[$rowAction]['name'];
            if (!$accessLevel = PermissionService::getAccessLevel($permissionName)) {
                unset(self::$rowActions[$key]);
                continue;
            }
            self::$rowActions[$rowAction] = $permissionName;
            self::$accessLevels[$permissionName] = $accessLevel;
        }

        return $this;
    }

    /**
     * Обработка доступных действий для каждой записи
     *
     * @return array|null
     */
    public function getActionsAttribute(): ?array
    {
        $actions = [];
        foreach (self::$rowActions as $rowAction => $permissionName) {
            $rule = $this->createRuleName($permissionName);
            if (!$this->$rule()) {
                continue;
            }
            $actions[] = $rowAction;
        }

        return array_flip($actions);
    }

    public function resolveRouteBinding($value, $field = null)
    {
        return $this->where($field ?? $this->getRouteKeyName(), $value)
            ->applyPermissions()
            ->first();
    }
}
