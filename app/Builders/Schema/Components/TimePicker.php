<?php


namespace App\Builders\Schema\Components;

use App\Builders\Schema\Components\Base\PickerComponent;

class TimePicker extends PickerComponent
{
    protected string $component = 'timepicker';

    public static function create(string $name): self
    {
        return new self($name);
    }
}
