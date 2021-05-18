<?php


namespace App\Sorts\Custom;


use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Sorts\Sort;

class StatusName implements Sort
{
    protected string $table;
    protected string $type;

    public function __construct(string $table, string $type)
    {
        $this->table = $table;
        $this->type = $type;
    }

    public function __invoke(Builder $query, bool $descending, string $property) : Builder
    {
        $table = $this->table;
        $type = $this->type;

        return $query
            ->join('statuses AS sortable', static function($join) use ($table, $type) {
                $join->on("{$table}.status_id", 'sortable.id');
                $join->where('sortable.type', $type);
            })
            ->orderBy('sortable.name', $descending ? 'desc' : 'asc');
    }
}
