<?php


namespace App\Sorts\Custom;
use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Sorts\Sort;

class PositionName implements Sort
{
    protected string $table;

    public function __construct(string $table)
    {
        $this->table = $table;
    }

    public function __invoke(Builder $query, bool $descending, string $property) : Builder
    {
        return $query
            ->join('positions AS sortable', "{$this->table}.position_id", 'sortable.id')
            ->orderBy('sortable.name', $descending ? 'desc' : 'asc');
    }
}
