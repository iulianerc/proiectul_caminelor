<?php


namespace App\Builders\Schema\Components;


use App\Builders\Schema\Components\Base\Component;

class DatePicker extends Component
{
    protected string $component = 'datepicker';
    protected array $props = [
        'prepend_icon'      => 'mdi-calendar',
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
        parent::setProps($props);
    }

    public function toArray(): array
    {
        return [
            'name'        => $this->name,
            'title'       => $this->title,
            'description' => $this->description,
            'rules'       => $this->rules,
            'props'       => $this->props,
            'component'   => $this->component
        ];
    }

}
