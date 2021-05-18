<?php


namespace App\Builders\Schema\Components;


class TreeSelect extends Select
{
    protected string $component = 'treeSelect';
    protected array $props = ['defaultExpandLevel' => 1];

    public static function create(string $name): self
    {
        return new self($name);
    }

    /**
     * @param array $props = [
     *     'multiple' => true,
     *     'type' => 'select',
     *     'hideNoData' => true,
     *     'defaultExpandLevel' => 1,
     * ]
     *
     * @return $this
     */
    public function setProps(array $props): self
    {
        return parent::setProps($props);
    }

    /**
     * @return array [
     *     [
     *          'value' => int,
     *          'text' => string,
     *          'children' => [
     *               'value' => int,
     *               'text' => string
     *          ]
     *     ]
     * ]
     */
    public function getData(): array
    {
        return parent::getData();
    }


    /**
     *
     * @param array $data = [
     *     [
     *          'value' => int,
     *          'text' => string,
     *          'children' => [
     *               'value' => int,
     *               'text' => string
     *          ]
     *     ]
     * ]
     *
     * @return $this
     */
    public function setData(array $data): parent
    {
        return parent::setData($data);
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
            'data'        => $this->data,
            'dataSource'  => $this->dataSource,
        ];
    }

}
