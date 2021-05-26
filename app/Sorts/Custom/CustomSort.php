<?php


namespace App\Sorts\Custom;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\Sorts\Sort;

class CustomSort implements Sort
{
    protected string $owner_type;
    protected string $table;

    public function __construct (string $table, string $owner_type)
    {
        $this->table = $table;
        $this->owner_type = $owner_type;
    }

    public function __invoke (Builder $query, bool $descending, string $property): Builder
    {
        $direction = $descending ? 'desc' : 'asc';

        return $query
            ->join('contacts', function (JoinClause $join) {
                $join
                    ->on("{$this->table}.id", '=', 'contacts.contactable_id')
                    ->where('contacts.contactable_type', $this->owner_type)
                    ->where('contacts.type', 'phone');
            })
            ->groupBy("{$this->table}.id")
            // TODO: Refactor
            ->orderBy(
                DB::raw("GROUP_CONCAT(contacts.value ORDER BY contacts.value {$direction})"),
                $direction
            );
    }
}
