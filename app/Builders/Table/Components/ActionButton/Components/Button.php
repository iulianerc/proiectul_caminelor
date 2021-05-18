<?php


namespace App\Builders\Table\Components\ActionButton\Components;


class Button
{
    protected string $shape;
    protected string $icon;
    protected string $title;

    public function __construct(string $title, string $icon, string $shape = 'icon')
    {
        $this->title = $title;
        $this->icon = $icon;
        $this->shape = $shape;
    }

    public function toArray(): array
    {
        return [
            'shape' => $this->shape,
            'icon'  => $this->icon,
            'title' => $this->title,
        ];
    }
}