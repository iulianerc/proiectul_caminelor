<?php


namespace App\Sorts\Custom;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Sorts\Sort;

class RoleName implements Sort
{
    protected string $table;

    public function __construct(string $table)
    {
        $this->table = $table;
    }

    public function __invoke(Builder $query, bool $descending, string $property) : Builder
    {
        $roles = config('permission.table_names.roles');
        $modelHasRoles = config('permission.table_names.model_has_roles');
        $table = $this->table;

        return $query
            ->leftJoin($modelHasRoles, static function($join) use ($modelHasRoles, $table) {
                $join->on("{$table}.id", "{$modelHasRoles}.model_id")
                    ->where("{$modelHasRoles}.model_type", User::class);
            })
            ->leftJoin("{$roles} AS sortable", "{$modelHasRoles}.role_id", 'sortable.id')
            ->orderBy('sortable.name', $descending ? 'desc' : 'asc');
    }
}
