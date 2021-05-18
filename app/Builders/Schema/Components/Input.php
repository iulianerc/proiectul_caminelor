<?php


namespace App\Builders\Schema\Components;


use App\Builders\Schema\Components\Base\Component;

class Input extends Component
{
    protected string $component = 'input';
    protected array $props = ['type' => 'text'];

    public static function create(string $name): self
    {
        return new self($name);
    }

    /**
     * @param array $props = [
     *    'type' => 'text' ?: 'number' ?: 'email' ?: 'hidden' ?: 'checkbox',
     *    'readonly' ?: 'no-title' ?: 'scrollable' => bool,
     *    'prepend_icon' => 'icon',
     *    'placeholder' => string,
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
            'name'        => $this->name,
            'title'       => $this->title,
            'description' => $this->description,
            'rules'       => $this->rules,
            'props'       => $this->props,
            'component'   => $this->component,
        ];
    }


}
