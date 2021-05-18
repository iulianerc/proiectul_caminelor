<?php


namespace App\Templates\Role;


use App\Builders\Table\Components\ActionButton\ActionButton;
use App\Builders\Table\Components\ActionButton\Components\Route;

class EditPermissionButton extends ActionButton
{
    protected string $actionName = 'edit_permissions';

    public function __invoke(): array
    {
        $this->setButton(__('global/crud.actions.edit'), 'mdi-power-plug');
        $this->setAction(
            'changeRoute',
            new Route('/roles/edit_permissions/<id>')
        );

        return parent::__invoke();
    }
}
