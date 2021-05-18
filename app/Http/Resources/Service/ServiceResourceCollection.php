<?php


namespace App\Http\Resources\Service;


use App\Builders\Table\Components\ActionButton\Samples\CreateButton;
use App\Builders\Table\Components\ActionButton\Samples\DeleteButton;
use App\Builders\Table\Components\ActionButton\Samples\EditButton;
use App\Builders\Table\Table;
use App\Http\Resources\MainResource;
use App\Http\Resources\MainResourceCollection;

class ServiceResourceCollection extends MainResourceCollection
{
    protected array $actionProps = [
        CreateButton::class,
        EditButton::class,
        DeleteButton::class,
    ];

    public function __construct($resource, string $resourceClass = MainResource::class, string $name = 'name')
    {

        app(Table::class)
            ->getColumn('values')
            ->setSortable(false);


        parent::__construct($resource, $resourceClass, $name);
    }
}
