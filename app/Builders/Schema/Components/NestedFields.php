<?php


namespace App\Builders\Schema\Components;


use App\Builders\Schema\Components\Base\Component;
use Illuminate\Support\Collection;

class NestedFields extends Component
{
    protected string $component = 'nestedFields';
    protected Collection $fields;

    public function __construct(string $name)
    {
        $this->fields = collect();
        parent::__construct($name);
    }

    public static function create(string $name): self
    {
        return new self($name);
    }

    public function setFields(Component ...$components): self
    {
        foreach ($components as $component) {
            $this->setField($component);
        }

        return $this;
    }

    public function setField(Component $component): self
    {
        $this->fields->put($component->getId(), $component->toArray());
        return $this;
    }

    public function toArray(): array
    {
        return [
            'fields'    => $this->fields,
            'component' => $this->component,
        ];
    }

    public function getFields(): Collection
    {
        return $this->fields->map(static function ($field) {
            return $field['props']['grid_area'];
        });
    }


}
