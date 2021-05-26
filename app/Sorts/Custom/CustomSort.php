<?php


namespace App\Sorts\Custom;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\Sorts\Sort;

class CustomSort implements Sort
{
    protected string $localForeign;

    public function __construct (string $localForeign)
    {
        $this->localForeign = $localForeign;
    }

    public function __invoke (Builder $query, bool $descending, string $property): Builder
    {
        $table = explode('.', $property)[0];
        return $query
            ->join($table, "hostel_rents.{$this->localForeign}", "{$table}.id")
            ->orderBy($property, $descending ? 'desc' : 'asc');
    }
}
