<?php


namespace App\Builders\Table\Components\ActionButton;


use App\Builders\Table\Components\ActionButton\Components\Action;
use App\Builders\Table\Components\ActionButton\Components\Button;
use App\Builders\Table\Components\ActionButton\Components\Confirm;
use App\Builders\Table\Components\ActionButton\Components\Route;

abstract class ActionButton
{
    protected Button $button;
    protected Action $action;
    protected string $actionName;

    public function setButton(string $title, string $icon, string $shape = 'icon'): void
    {
        $this->button = new Button($title, $icon, $shape);
    }

    public function setAction(string $mode, Route $route, ?Confirm $confirm = null): void
    {
        $this->action = new Action($mode, $route, $confirm);
    }

    public function __invoke(): array
    {
        return [
            $this->actionName => [
                'button' => $this->button->toArray(),
                'action' => $this->action->toArray()
            ]
        ];
    }

}
