<?php


namespace App\Builders\Schema;


use Illuminate\Support\Collection;

trait Rules
{
    private Collection $rules;

    private function getRules(): Collection
    {
        return $this->rules;
    }

    private function applyRules(): self
    {
        $this->rules->map(function ($rule, $componentName) {
            $this->schema->hasComponent($componentName) &&
            !$this->schema->getComponent($componentName)->getRules() &&
            $this->schema->getComponent($componentName)->setRules($rule);
        });

        return $this;
    }

    protected function setRules(array $rules): self
    {
        $this->rules = collect($rules);

        return $this->applyRules();
    }

    protected function setRulesFromRequest(string $request): self
    {
        $this->setRules((new $request)->rules());

        return $this->applyRules();
    }
}
