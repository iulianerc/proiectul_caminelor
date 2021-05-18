<?php


namespace App\Http\Resources\Order;


use App\Builders\Table\Components\ActionButton\Samples\CreateButton;
use App\Builders\Table\Components\ActionButton\Samples\DeleteButton;
use App\Builders\Table\Components\ActionButton\Samples\EditButton;
use App\Builders\Table\Table;
use App\Http\Resources\MainResource;
use App\Http\Resources\MainResourceCollection;

class OrderResourceCollection extends MainResourceCollection
{
    protected array $actionProps = [
        CreateButton::class,
        EditButton::class,
        DeleteButton::class,
    ];

    public function __construct($resource, string $resourceClass = MainResource::class, string $name = 'name')
    {

        app(Table::class)
            ->getColumn('id')
            ->setWidth(1);
        foreach (['tax_payed', 'guaranty_payed'] as $column) {
            app(Table::class)
                ->getColumn($column)
                ->setSortable(false)
                ->setWidth(90);
        }

        parent::__construct($resource, $resourceClass, $name);
    }
}
