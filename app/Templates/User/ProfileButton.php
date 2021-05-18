<?php


namespace App\Templates\User;


use App\Builders\Table\Components\ActionButton\ActionButton;
use App\Builders\Table\Components\ActionButton\Components\Route;

class ProfileButton extends ActionButton
{
    protected string $actionName = 'profile';

    public function __invoke(): array
    {
        $this->setButton(__('modules/users.actions.profile'), 'mdi-account-arrow-right');
        $this->setAction(
            'changeRoute',
            new Route('/users/profile/<id>')
        );

        return parent::__invoke();
    }
}
