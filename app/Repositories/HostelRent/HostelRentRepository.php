<?php


namespace App\Repositories\HostelRent;


use App\Builders\Table\Table;
use App\Filters\DateBetween;
use App\Models\HostelRent;
use App\Models\Role\Role;
use App\Repositories\Repository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class HostelRentRepository extends Repository
{
    protected function modelName(): string
    {
        return HostelRent::class;
    }


    public function getList()
    {
     dd($this->model);
        return QueryBuilder::for(
              $this->model
                  ->select(["{$this->model->getTable()}.*"])
        )
            ->allowedFilters([
        AllowedFilter::partial('id'),
        AllowedFilter::partial('hostel', 'hostel.name'),
        AllowedFilter::partial('resident', 'resident.name'),
        AllowedFilter::partial('email', 'resident.email'),
        AllowedFilter::partial('room_category', 'room_category.name'),
        AllowedFilter::partial('residents_max_count', 'room_category.residents_max_count'),
    ])
        ->defaultSort('id')
        ->allowedSorts([
            'id',
            'hostel',
            'resident',
            'email',
            'room_category',
            'residents_max_count',
        ]);
    }
}
