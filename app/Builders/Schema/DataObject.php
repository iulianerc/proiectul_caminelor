<?php


namespace App\Builders\Schema;


use Illuminate\Support\Collection;

class DataObject
{
    public Collection $dataObject;

    public function __construct()
    {
        $this->dataObject = collect();
    }

    public function set($dataObject): self
    {
        $this->dataObject = collect($dataObject);

        return $this;
    }

    public function get(): Collection
    {
        return $this->dataObject;
    }
}
