<?php


namespace App\Sorts\Custom;


use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Sorts\Sort;

class ParentName implements Sort
{
    protected string $table;

    public function __construct(string $table)
    {
        $this->table = $table;
    }

    public function __invoke(Builder $query, bool $descending, string $property) : Builder
    {
        return $query
            ->leftJoin("{$this->table} AS sortable", "{$this->table}.parent_id", 'sortable.id')
            ->orderBy('sortable.name', $descending ? 'desc' : 'asc');
    }
}
