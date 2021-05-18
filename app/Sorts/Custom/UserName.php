<?php


namespace App\Sorts\Custom;


use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Sorts\Sort;

class UserName implements Sort
{
    protected string $table;
    protected string $foreignField;

    public function __construct(string $table, string $foreignField)
    {
        $this->table = $table;
        $this->foreignField = $foreignField;
    }

    public function __invoke(Builder $query, bool $descending, string $property) : Builder
    {
        return $query
            ->join('users AS sortable', "{$this->table}.{$this->foreignField}", 'sortable.id')
            ->orderBy('sortable.name', $descending ? 'desc' : 'asc');
    }
}
