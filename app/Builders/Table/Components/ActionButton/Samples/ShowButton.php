<?php


namespace App\Builders\Table\Components\ActionButton\Samples;


use App\Builders\Table\Components\ActionButton\ActionButton;
use App\Builders\Table\Components\ActionButton\Components\Route;
use Merax\Helpers\Helper;

class ShowButton extends ActionButton
{
    protected string $actionName = 'show';

    /**
     * @return array
     */
    public function __invoke(): array
    {
        $module = Helper::getModuleName();
        $this->setButton(__('global/crud.actions.show'), ' account-details');
        $this->setAction(
            'changeRoute',
            new Route("/{$module}/show/<id>")
        );
        return parent::__invoke();
    }
}
