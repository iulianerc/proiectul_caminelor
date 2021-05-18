<?php


namespace App\Builders\Schema\Components;


use App\Builders\Schema\Components\Base\SelectComponent;

class CurrencySelect extends SelectComponent
{
    protected string $component = 'currencyselect';

    public static function create(string $name): self
    {
        return new self($name);
    }

    /**
     * @param array $props = [
     *     'multiple' => true,
     *     'type' => 'select',
     *     'hide_no_data' => true
     * ]
     *
     * @return $this
     */
    public function setProps(array $props): self
    {
        return parent::setProps($props);
    }
}
