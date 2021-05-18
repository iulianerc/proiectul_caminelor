<?php


namespace App\Builders\Schema\Layouts;


use Illuminate\Support\Collection;
use Illuminate\Support\Str;

abstract class Layout
{
    protected const BREAKPOINTS = ['xs', 'sm', 'md', 'lg', 'xl'];
    protected string $type;
    protected Collection $fields;
    protected Collection $breakpoints;
    protected Collection $buttons;
    protected Collection $layout;

    public function __construct()
    {
        $this->fields = collect();
        $this->breakpoints = collect();
        $this->buttons = collect();
        $this->layout = collect();
    }

    /**
     * Указание полей для шаблона
     *
     * @param Collection $fields = collect(['field1', 'field2'])
     *
     * @return $this
     */
    public function setFields(Collection $fields): self
    {
        $this->fields = $fields;
        return $this;
    }

    public function getFields(): Collection
    {
        return $this->fields;
    }

    /**
     * @param string $position  = 'bottom' ?: 'top'
     * @param string $textAlign = 'left' ?: 'center' ?: 'right'
     *
     * @return $this
     */
    public function setButtonsStyle(string $position = 'bottom', string $textAlign = 'right'): self
    {
        $this->buttons->put('style', collect([
            'position'   => $position,
            'text_align' => $textAlign
        ]));

        return $this;
    }

    public function get(): array
    {
        $this->build();
        $this->layout->put('type', $this->type);
        $this->layout->put('breakpoints', $this->breakpoints->all());
        $this->layout->put('buttons', $this->buttons->all());

        return $this->layout->filter()->all();
    }

    abstract protected function build(): void;
}