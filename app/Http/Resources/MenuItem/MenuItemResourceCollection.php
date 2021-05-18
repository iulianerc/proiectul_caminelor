<?php


namespace App\Http\Resources\MenuItem;


use App\Builders\Table\Table;
use App\Http\Resources\MainResource;
use App\Http\Resources\MainResourceCollection;

class MenuItemResourceCollection extends MainResourceCollection
{
    public function __construct($resource, string $resourceClass = MainResource::class, string $name = 'name')
    {
        app(Table::class)
            ->getColumn('icon')
            ->setType('icon');
        parent::__construct($resource, $resourceClass, $name);
    }
}
