<?php


namespace App\Builders\Table\Components\ActionButton\Samples;


use App\Builders\Table\Components\ActionButton\ActionButton;
use App\Builders\Table\Components\ActionButton\Components\Confirm;
use App\Builders\Table\Components\ActionButton\Components\Route;
use Illuminate\Support\Str;
use Merax\Helpers\Helper;

class DeleteButton extends ActionButton
{
    protected string $actionName = 'delete';

    /**
     * @return array
     */
    public function __invoke(): array
    {
        $delete = __('global/crud.actions.delete');
        $module = Helper::getModuleName();
        $moduleName = Str::lower(__("modules/{$module}.model.one"));
        $confirmText = "{$delete} {$moduleName} ?";
        $this->setButton($delete, 'mdi-delete');
        $this->setAction(
            'callFunction',
            new Route('quickDelete'),
            new Confirm($confirmText)
        );

        return parent::__invoke();
    }
}
