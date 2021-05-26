<?php


namespace App\Repositories\HostelRent;


use App\Models\HostelRent;
use App\Repositories\Repository;
use App\Sorts\Custom\CustomSort;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedSort;
use Spatie\QueryBuilder\QueryBuilder;

class HostelRentRepository extends Repository
{
    protected function modelName(): string
    {
        return HostelRent::class;
    }


    public function getList()
    {

        return QueryBuilder::for(
            HostelRent::class
        )
            ->allowedFilters([
                AllowedFilter::exact('id'),
                AllowedFilter::partial('hostel', 'hostel.name'),
                AllowedFilter::partial('resident', 'resident.name'),
                AllowedFilter::partial('email', 'resident.email'),
                AllowedFilter::partial('phones', 'resident.phones'),
                AllowedFilter::partial('room_category', 'room_category.name'),
                AllowedFilter::exact('room_places', 'room_category.residents_max_count'),
            ])
            ->defaultSort('id')
            ->allowedSorts([
                'id',
                AllowedSort::custom('hostel', new CustomSort('hostel_id'), 'hostels.name'),
                AllowedSort::custom('resident', new CustomSort('resident_id'), 'residents.name'),
                AllowedSort::custom('email', new CustomSort('resident_id'), 'residents.email'),
                AllowedSort::custom('phones', new CustomSort('resident_id'), 'residents.phones'),
                AllowedSort::custom('room_category', new CustomSort('room_category_id'), 'room_categories.name'),
                AllowedSort::custom('room_places', new CustomSort('room_category_id'), 'room_categories.residents_max_count')
            ])->get();
    }
}
