<?php


namespace App\Repositories\Menu;


use App\Builders\Table\Table;
use App\Filters\DateBetween;
use App\Filters\MultipleExact;
use App\Models\Menu\MenuItem;
use App\Repositories\Repository;
use App\Sorts\Custom\AuthorName;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedSort;
use Spatie\QueryBuilder\QueryBuilder;

class MenuItemRepository extends Repository
{
    protected function modelName(): string
    {
        return MenuItem::class;
    }

    public function get(): LengthAwarePaginator
    {
        $this->model
            ->setActions(config('permissions.general.modules.menu_items.actions'))
            ->handleRowActions(['edit', 'delete'])
            ->setAppends(['_actions']);
        return QueryBuilder::for(
            $this->model
                ->applyPermissions()
                ->with(['author'])
                ->select(["{$this->model->getTable()}.*"])
        )
            ->allowedFilters([
                AllowedFilter::partial('name_ru'),
                AllowedFilter::partial('name_ro'),
                AllowedFilter::partial('name_en'),
                AllowedFilter::partial('link'),
                AllowedFilter::custom('created_at', new DateBetween),
                AllowedFilter::custom('updated_at', new DateBetween),
                AllowedFilter::custom('author_name', new MultipleExact, 'author_id'),
                AllowedFilter::scope('quick_filter'),
            ])
            ->defaultSort('id')
            ->allowedSorts([
                ...['name_ru', 'name_ro', 'name_en', 'link', 'created_at', 'updated_at'],
                AllowedSort::custom('author_name', new AuthorName($this->model->getTable()))
            ])
            ->jsonPaginate();
    }

    public function getUnusedItems(int $userID, int $roleID, string $language): array
    {
        $usedItems = collect(app(MenuOrderRepository::class)->getUsedItems($userID, $roleID)['items']);

        if ($usedItems) {
            return $this->model::whereNotIn('id', $usedItems->pluck('menu_item_id'))
                ->get(['id', "name_{$language} AS text"])
                ->all();
        }

        return [];
    }

}
