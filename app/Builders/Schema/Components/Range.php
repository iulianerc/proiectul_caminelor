<?php

namespace App\Builders\Schema\Components;


use App\Builders\Schema\Components\Base\Component;

class Range extends Component
{
    protected string $component = 'range';
    private array $customTitle;
    private array $customDescription;
    private array $customRules = [];

    /**
     * @return array = ['from' => string, 'to' => 'string']
     */
    public function getCustomTitle(): array
    {
        return $this->customTitle;
    }

    public function setCustomTitle(string $from, string $to): self
    {
        $this->customTitle = ['from' => $from, 'to' => $to];

        return $this;
    }

    /**
     * @return array = ['from' => string, 'to' => 'string']
     */
    public function getCustomDescription(): array
    {
        return $this->customDescription;
    }

    public function setCustomDescription(string $from, string $to): self
    {
        $this->customDescription = ['from' => $from, 'to' => $to];

        return $this;

    }

    /**
     * @return array = ['from' => string, 'to' => 'string']
     */
    public function getCustomRules(): array
    {
        return $this->customRules;
    }

    public function setCustomRules(string $from, string $to): self
    {
        $this->customRules = ['from' => $from, 'to' => $to];

        return $this;
    }

    public static function create(string $name): self
    {
        return new self($name);
    }


    /**
     * @param array $props = [
     *     'type' => 'text' ?: 'number' ?: 'email' ?: 'hidden' ?: 'checkbox',
     *     'readonly' ?: 'no-title' ?: 'scrollable' => bool,
     *     'readonly' => bool,
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

    public function toArray(): array
    {
        return [
            'name'        => $this->name,
            'title'       => $this->customTitle ?? $this->title,
            'description' => $this->customDescription ?? $this->description,
            'rules'       => $this->customRules ?: $this->rules,
            'props'       => $this->props,
            'component'   => $this->component
        ];
    }

}
