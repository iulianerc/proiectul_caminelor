<?php

namespace App\Http\Resources;

use App\Builders\Table\Table;
use App\Builders\Table\Components\ActionButton\Samples\CreateButton;
use App\Builders\Table\Components\ActionButton\Samples\DeleteButton;
use App\Builders\Table\Components\ActionButton\Samples\EditButton;
use Illuminate\Http\Resources\Json\ResourceCollection;

class MainResourceCollection extends ResourceCollection
{
    protected array $actionProps = [
        CreateButton::class,
        EditButton::class,
        DeleteButton::class,
    ];

    /**
     * MainResourceCollection constructor.
     * @param $resource
     * @param string $resourceClass
     * @param string $name - Название поля которое будет выведено в сообщении УДАЛИТЬ
     */
    public function __construct(
        $resource,
        string $resourceClass = MainResource::class,
        string $name = 'name'
    )
    {
        $this->collects = $resourceClass;
        app(Table::class)
            ->getColumn($name)
            ->setShowModalDelete(true);

        parent::__construct($resource);
    }

    public function toArray($request): array
    {
        return app(Table::class)
            ->setItems($this->resource)
            ->setActionProps($this->actionProps)
            ->build();
    }
}
