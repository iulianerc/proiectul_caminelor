<?php


namespace App\Repositories\HtmlPage;


use App\Filters\DateBetween;
use App\Filters\MultipleExact;
use App\Models\HtmlPage\HtmlPage;
use App\Repositories\Repository;
use App\Sorts\Custom\AuthorName;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedSort;
use Spatie\QueryBuilder\QueryBuilder;

class HtmlPageRepository extends Repository
{
    protected function modelName(): string
    {
        return HtmlPage::class;
    }

    public function get(): LengthAwarePaginator
    {
        $this->model
            ->setActions(config('permissions.general.modules.html_pages.actions'))
            ->handleRowActions(['edit', 'delete'])
            ->setAppends(['_actions']);

        return QueryBuilder::for(
            $this->model
                ->applyPermissions()
                ->with( 'author')
                ->select(["{$this->model->getTable()}.*"])
        )
            ->allowedFilters([
                AllowedFilter::exact('id'),
                AllowedFilter::partial('name'),
                AllowedFilter::partial('alias'),
                AllowedFilter::custom('publish_date', new DateBetween()),
                AllowedFilter::custom('created_at', new DateBetween()),
                AllowedFilter::custom('updated_at', new DateBetween()),
                AllowedFilter::custom('author_name', new MultipleExact(), 'author_id'),
                AllowedFilter::scope('quick_filter'),
            ])
            ->defaultSort('id')
            ->allowedSorts([
                ...['id', 'name', 'alias', 'publish_date', 'created_at', 'updated_at'],
                AllowedSort::custom('author_name', new AuthorName($this->model->getTable())),
            ])
            ->jsonPaginate();
    }

    public function getPage(string $alias)
    {
        return $this->model->whereAlias($alias)->get()->first();
    }
}
