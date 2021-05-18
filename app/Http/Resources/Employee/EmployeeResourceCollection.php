<?php


namespace App\Http\Resources\Employee;


use App\Builders\Table\Table;
use App\Http\Resources\MainResource;
use App\Http\Resources\MainResourceCollection;

class EmployeeResourceCollection extends MainResourceCollection
{
    public function __construct($resource, string $resourceClass = MainResource::class, string $name = 'name')
    {
        foreach (['user_name', 'signature', 'centers', 'work_positions', ] as $column) {
            app(Table::class)
                ->getColumn($column)
                ->setSortable(false);
        }
        parent::__construct($resource, $resourceClass, $name);
    }
}
