<?php

namespace App\Builders\Schema\Components;


use App\Builders\Schema\Components\Base\PickerComponent;

class FlagPicker extends PickerComponent
{
    protected string $component = 'flagpicker';

    public static function create(string $name): self
    {
        return new self($name);
    }

    /**
     * @param array $props = [
     *     'type' => 'text' ?: 'number' ?: 'email' ?: 'hidden' ?: 'checkbox',
     *     'readonly' ?: 'no-title' ?: 'scrollable' => bool,
     *     'prepend_icon' => 'icon',
     *     'placeholder' => string,
     * ]
     *
     * @return $this
     */
    public function setProps(array $props): self
    {
        return parent::setProps($props);
    }
}
