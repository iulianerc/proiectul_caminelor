<?php


namespace App\Builders\Table\Components\ActionButton\Samples;


use App\Builders\Table\Components\ActionButton\ActionButton;
use App\Builders\Table\Components\ActionButton\Components\Route;
use Merax\Helpers\Helper;

class CreateButton extends ActionButton
{
    protected string $actionName = 'create';
    /**
     * @return array
     */
    public function __invoke(): array
    {
        $module = Helper::getModuleName();
        $this->setButton(__('global/crud.actions.create'),'mdi-plus');
        $this->setAction('changeRoute',new Route("/{$module}/create"));
        return parent::__invoke();
    }
}
