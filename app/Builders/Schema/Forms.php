<?php


namespace App\Builders\Schema;


use Illuminate\Support\Collection;

class Forms
{
    private Collection $forms;

    public function __construct()
    {
        $this->forms = collect();
    }

    public function get(string $key): Form
    {
        return $this->forms->get($key);
    }

    public function put(string $key, Form $form): self
    {
        $this->forms->put($key, $form);

        return $this;
    }

    public function all(): array
    {
        return $this->forms
            ->map(fn (Form $form) => $form->build())
            ->all();
    }

}
