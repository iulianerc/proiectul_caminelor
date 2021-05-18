<?php


namespace App\Http\Resources\OrderGuarantee;


use App\Builders\Table\Components\ActionButton\Samples\CreateButton;
use App\Builders\Table\Components\ActionButton\Samples\DeleteButton;
use App\Builders\Table\Components\ActionButton\Samples\EditButton;
use App\Builders\Table\Table;
use App\Http\Resources\MainResource;
use App\Http\Resources\MainResourceCollection;

class OrderGuaranteeResourceCollection extends MainResourceCollection
{
    public function __construct($resource, string $resourceClass = MainResource::class, string $name = 'name')
    {
        app(Table::class)
            ->getColumn('id')
            ->setWidth(1);

        parent::__construct($resource, $resourceClass, $name);
    }
}
