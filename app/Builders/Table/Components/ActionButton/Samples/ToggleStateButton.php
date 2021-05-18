<?php


namespace App\Builders\Table\Components\ActionButton\Samples;



use App\Builders\Table\Components\ActionButton\ActionButton;
use App\Builders\Table\Components\ActionButton\Components\Confirm;
use App\Builders\Table\Components\ActionButton\Components\Route;

class ToggleStateButton extends ActionButton
{
    protected string $actionName = 'toggle_state';

    /**
     * @return array
     */
    public function __invoke(): array
    {
        $confirmText = __('global/crud.actions.toggle_state') . '?';
        $this->setButton(__('global/crud.actions.toggle_state'), 'mdi-toggle-switch-off');
        $this->setAction(
            'callFunction',
            new Route('toggleStatus'),
            new Confirm($confirmText));
        return parent::__invoke();
    }
}
