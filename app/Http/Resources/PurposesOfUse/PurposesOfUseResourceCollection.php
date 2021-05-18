<?php


namespace App\Http\Resources\PurposesOfUse;


use App\Builders\Table\Components\ActionButton\Samples\CreateButton;
use App\Builders\Table\Components\ActionButton\Samples\DeleteButton;
use App\Builders\Table\Components\ActionButton\Samples\EditButton;
use App\Builders\Table\Components\ActionButton\Samples\ToggleStateButton;
use App\Http\Resources\MainResource;
use App\Http\Resources\MainResourceCollection;
use App\Templates\User\ProfileButton;
use App\Builders\Table\Table;

class PurposesOfUseResourceCollection extends MainResourceCollection
{
    protected array $actionProps = [
        CreateButton::class,
        EditButton::class,
        DeleteButton::class,
        ToggleStateButton::class,
        ProfileButton::class
    ];

    public function __construct($resource, string $resourceClass = MainResource::class, string $name = 'name')
    {
        app(Table::class)
            ->getColumn('id')
            ->setSortable(false);

        app(Table::class)
            ->getColumn('description_ro')
            ->setSortable(false);

        app(Table::class)
            ->getColumn('description_ru')
            ->setSortable(false);

        app(Table::class)
            ->getColumn('description_en')
            ->setSortable(false);

        parent::__construct($resource, $resourceClass, $name);
    }
}
