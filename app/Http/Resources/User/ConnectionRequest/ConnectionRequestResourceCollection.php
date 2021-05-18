<?php


namespace App\Http\Resources\User\ConnectionRequest;


use App\Http\Resources\MainResourceCollection;
use App\Templates\User\ConnectionRequest\ApproveButton;
use App\Templates\User\ConnectionRequest\DismissButton;

class ConnectionRequestResourceCollection extends MainResourceCollection
{
    protected array $actionProps = [
        ApproveButton::class,
        DismissButton::class,
    ];

    public function __construct($resource, string $resourceClass = ConnectionRequestResource::class, string $name = 'receiver')
    {
        parent::__construct($resource, $resourceClass, $name);
    }

}
