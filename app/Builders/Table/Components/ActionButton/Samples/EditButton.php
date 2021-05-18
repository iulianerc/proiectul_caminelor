<?php


namespace App\Builders\Table\Components\ActionButton\Samples;


use App\Builders\Table\Components\ActionButton\ActionButton;
use App\Builders\Table\Components\ActionButton\Components\Route;
use Merax\Helpers\Helper;

class EditButton extends ActionButton
{
    protected string $actionName = 'edit';
    protected string $key = 'id';

    public function __invoke(): array
    {
        $module = Helper::getModuleName();
        $this->setButton(__('global/crud.actions.edit'), 'mdi-pencil');
        $this->setAction(
            'changeRoute',
            new Route("/{$module}/edit/<{$this->key}>")
        );
        return parent::__invoke();
    }
}
