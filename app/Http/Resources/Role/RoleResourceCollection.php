<?php


namespace App\Http\Resources\Role;


use App\Builders\Table\Components\ActionButton\Samples\CreateButton;
use App\Builders\Table\Components\ActionButton\Samples\DeleteButton;
use App\Builders\Table\Components\ActionButton\Samples\EditButton;
use App\Http\Resources\MainResourceCollection;
use App\Templates\Role\EditPermissionButton;

class RoleResourceCollection extends MainResourceCollection
{
    protected array $actionProps = [
        CreateButton::class,
        EditButton::class,
        EditPermissionButton::class,
        DeleteButton::class
    ];
}
