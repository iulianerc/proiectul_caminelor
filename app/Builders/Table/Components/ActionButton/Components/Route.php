<?php


namespace App\Builders\Table\Components\ActionButton\Components;


class Route
{
    protected string $value;
    protected ?string $method = null;
    protected ?array $data = null;

    public function __construct(string $value, ?string $method = null, ?array $data = null)
    {
        $this->value = $value;
        $this->method = $method;
        $this->data = $data;
    }

    public function toArray(): array
    {
        return array_filter([
            'value'  => $this->value,
            'method' => $this->method,
            'data'   => $this->data
        ]);
    }
}
