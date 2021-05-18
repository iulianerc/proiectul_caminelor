<?php


namespace App\Repositories\Role;


use App\Builders\Table\Table;
use App\Filters\DateBetween;
use App\Models\Role\Role;
use App\Repositories\Repository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class RoleRepository extends Repository
{
    protected function modelName(): string
    {
        return Role::class;
    }

    public function get(): LengthAwarePaginator
    {
        $this->model
            ->setActions(config('permissions.general.modules.roles.actions'))
            ->handleRowActions(['edit', 'delete', 'edit_permissions'])
            ->setAppends(['_actions']);
        return QueryBuilder::for(
            $this->model
                ->applyPermissions()
                ->select(["{$this->model->getTable()}.*"])
        )
            ->allowedFilters([
                AllowedFilter::exact('name'),
                AllowedFilter::exact('name_ro'),
                AllowedFilter::exact('name_en'),
                AllowedFilter::exact('name_ru'),
                AllowedFilter::exact('guard_name'),
                AllowedFilter::custom('created_at', new DateBetween),
                AllowedFilter::custom('updated_at', new DateBetween),
                AllowedFilter::scope('quick_filter'),
            ])->defaultSort('id')
            ->allowedSorts(['id', 'name', 'name_ro', 'name_en', 'name_ru', 'guard_name', 'created_at', 'updated_at'])
            ->jsonPaginate();
    }
}
