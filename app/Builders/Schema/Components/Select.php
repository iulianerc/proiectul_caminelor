<?php


namespace App\Builders\Schema\Components;


use App\Builders\Schema\Components\Base\SelectComponent;

class Select extends SelectComponent
{
    protected string $component = 'select';
    protected array $props = ['type' => 'select'];
    protected array $dataSource = [];
    protected array $parents = [];
    protected array $children = [];

    public static function create(string $name): self
    {
        return new self($name);
    }

    /**
     * @param array $options = [
     *    'url' => string,
     *    'field' => string,
     *    'minLength' => 2,
     *    'method' => string
     * ]
     *
     * @return $this
     */
    public function setDataSource(array $options): self
    {
        $this->dataSource = $options;

        return $this;
    }

    public function getDataSource(): array
    {
        return $this->dataSource;
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

    public function setChildren(array $children): self
    {
        $this->children = $children;

        return $this;
    }

    public function getChildren(): array
    {
        return $this->children;
    }

    public function toArray(): array
    {
        return array_filter([
            'name'        => $this->name,
            'title'       => $this->title,
            'description' => $this->description,
            'rules'       => $this->rules,
            'props'       => $this->props,
            'component'   => $this->component,
            'data'        => $this->data,
            'dataSource'  => $this->dataSource,
            'children'    => $this->children,
        ]);
    }

    public function setParents(array $parents): Select
    {
        $this->parents = $parents;
        return $this;
    }

    public function getParents(): array
    {
        return $this->parents;
    }
}
