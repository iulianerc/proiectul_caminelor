<?php


namespace App\Builders\Table\Components\TableColumn;

class TableColumn
{
    private string $name;
    private string $text;
    private bool $sortable = true;
    private bool $showModalDelete = false;
    private int $width = 0;
    private string $type = '';
    private array $props = [];

    /**
     * TableColumn constructor.
     *
     * @param string $name
     * @param string $text
     */
    public function __construct(string $name, string $text) {
        $this->name = $name;
        $this->text = $text;
    }

    public function toArray(): array
    {
        $items = array_filter([
            'value'           => $this->name,
            'text'            => $this->text,
            'sortable'        => $this->sortable,
            'showModalDelete' => $this->showModalDelete,
            'width'           => $this->width,
            'type'            => $this->type,
            'props'           => $this->props,
        ]);
        $items['sortable'] = $this->sortable;

        return $items;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function isSortable(): bool
    {
        return $this->sortable;
    }

    public function setSortable(bool $sortable): self
    {
        $this->sortable = $sortable;

        return $this;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function setWidth(int $width): self
    {
        $this->width = $width;

        return $this;
    }

    public function isShowModalDelete(): bool
    {
        return $this->showModalDelete;
    }

    public function setShowModalDelete(bool $showModalDelete): self
    {
        $this->showModalDelete = $showModalDelete;

        return $this;
    }

    public function setType(string $type): TableColumn
    {
        $this->type = $type;
        return $this;
    }

    public function setProps(array $props): TableColumn
    {
        $this->props = $props;
        return $this;
    }

}
