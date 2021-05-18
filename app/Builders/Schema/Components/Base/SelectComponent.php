<?php


namespace App\Builders\Schema\Components\Base;


abstract class SelectComponent extends Component
{
    protected array $data = [];

    /**
     * @param array $data = [
     *     [
     *         'value' => int,
     *         'text' => string
     *     ]
     * ]
     *
     * @return $this
     */
    public function setData(array $data): parent
    {
        $this->data = $data;

        return $this;
    }

    public function getData(): array
    {
        return $this->data;
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
        ];
    }
}