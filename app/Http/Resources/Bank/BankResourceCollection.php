<?php


namespace App\Http\Resources\Bank;


use App\Builders\Table\Components\ActionButton\Samples\CreateButton;
use App\Builders\Table\Components\ActionButton\Samples\DeleteButton;
use App\Builders\Table\Components\ActionButton\Samples\EditButton;
use App\Builders\Table\Components\ActionButton\Samples\ToggleStateButton;
use App\Builders\Table\Table;
use App\Http\Resources\MainResource;
use App\Http\Resources\MainResourceCollection;
use App\Templates\User\ProfileButton;

class BankResourceCollection extends MainResourceCollection
{
    protected array $actionProps = [
        CreateButton::class,
        EditButton::class,
        DeleteButton::class,
    ];

    public function __construct($resource, string $resourceClass = MainResource::class, string $name = 'name')
    {
        app(Table::class)
            ->getColumn('id')->setWidth(1);

        app(Table::class)
            ->getColumn('code')->setWidth(1);


        parent::__construct($resource, $resourceClass, $name);
    }
}
