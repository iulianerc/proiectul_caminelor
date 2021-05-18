<?php


namespace App\Http\Resources\User;


use App\Builders\Table\Components\ActionButton\Samples\CreateButton;
use App\Builders\Table\Components\ActionButton\Samples\DeleteButton;
use App\Builders\Table\Components\ActionButton\Samples\EditButton;
use App\Builders\Table\Components\ActionButton\Samples\ToggleStateButton;
use App\Builders\Table\Table;
use App\Http\Resources\MainResource;
use App\Http\Resources\MainResourceCollection;
use App\Templates\User\ProfileButton;

class UserResourceCollection extends MainResourceCollection
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
//        app(Table::class)
//            ->getColumn('avatar_link')
//            ->setSortable(false)
//            ->setType('image')
//            ->setProps([
//                'rounded' => true,
//                'size'    => [
//                    'width'  => 50,
//                    'height' => 50
//                ]
//            ]);
//        app(Table::class)
//            ->getColumn('password_confirmation')
//            ->setType('icon');
//        app(Table::class)
//            ->getColumn('password_expired')
//            ->setType('icon');
//        app(Table::class)
//            ->getColumn('is_active')
//            ->setType('icon');
        parent::__construct($resource, $resourceClass, $name);
    }

}
