<?php


namespace App\Builders\Table\Components\ActionButton\Components;


class Action
{
    protected string $mode; // callFunction, changeRoute, sendRequest
    protected Route $route;
    protected ?Confirm $confirm;

    public function __construct(string $mode, Route $route, ?Confirm $confirm = null)
    {
        $this->mode = $mode;
        $this->route = $route;
        $this->confirm = $confirm;
    }

    public function toArray(): array
    {
        $result = [
            'mode'  => $this->mode,
            'route' => $this->route->toArray(),
        ];

        if ($this->confirm) {
            $result['confirm'] = $this->confirm->toArray();
        }

        return $result;
    }
}
