<?php


namespace App\Builders\Schema\Components;


use App\Builders\Schema\Components\Base\Component;

class DateRangePicker extends Component
{
    protected string $component = 'daterangepicker';
    protected array $props = [
        'readonly'          => true,
        'no-title'          => true,
        'scrollable'        => true,
        'first_day_of_week' => 1
    ];

    public static function create(string $name): self
    {
        return new self($name);
    }


    /**
     * @param array $props = [
     *     'readonly' ?: 'no-title' ?: 'scrollable' => bool,
     *     'prepend_icon' => 'icon',
     *     'placeholder' => string,
     *     'first_day_of_week' => 1
     * ]
     *
     * @return $this
     */
    public function setProps(array $props): self
    {
        return parent::setProps($props);
    }

    public function toArray(): array
    {
        return [
            'name'        => $this->getName(),
            'title'       => $this->getTitle(),
            'description' => $this->getDescription(),
            'rules'       => $this->getRules(),
            'props'       => $this->getProps(),
            'component'   => $this->getComponent()
        ];
    }

}
