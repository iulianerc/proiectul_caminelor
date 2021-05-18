<?php

namespace App\Builders\Schema\Components\Base;


abstract class PickerComponent extends Component
{
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
