<?php


namespace App\Http\Resources\Country;


use App\Builders\Table\Components\ActionButton\Samples\CreateButton;
use App\Builders\Table\Components\ActionButton\Samples\DeleteButton;
use App\Builders\Table\Components\ActionButton\Samples\EditButton;
use App\Builders\Table\Table;
use App\Http\Resources\MainResourceCollection;

class CountryResourceCollection extends MainResourceCollection
{
    protected array $actionProps = [
        CreateButton::class,
        EditButton::class,
        DeleteButton::class,
    ];

    public function __construct($resource)
    {
        app(Table::class)
            ->getColumn('id')->setWidth(1);

        app(Table::class)
            ->getColumn('accept_ata')->setWidth(1);


        parent::__construct($resource, CountryResource::class, 'name');
    }
}
