<?php


namespace App\Builders\Schema;


use App\Builders\Schema\Components\Base\Component;
use App\Builders\Schema\Components\NestedFields;
use App\Builders\Schema\Layouts\Layout;
use App\Services\Permission\PermissionService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;
use Merax\Helpers\Helper;

class Schema
{
    private string $title;
    private string $description;
    private Collection $params;
    private Collection $components;
    private ?Layout $layout = null;

    public function __construct(string $title, string $description)
    {
        $this->title = $title;
        $this->description = $description;
        $this->params = collect(['created_at' => time()]);
        $this->components = collect();
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $key   = 'created_at' ?: 'guard'
     * @param mixed  $value = 'unsavedForm'
     *
     * @return $this
     */
    public function setParams(string $key, $value): self
    {
        $this->params->put($key, $value);

        return $this;
    }

    public function getParams(): Collection
    {
        return $this->params;
    }

    public function setComponents(Component ...$components): Schema
    {
        foreach ($components as $component) {
            $this->setComponent($component);
        }

        return $this;
    }

    public function setComponent(Component $component): self
    {
        if ($component->isNestedField()) {
            if (!$this->components->has($component->getGroupName())) {
                $this->components->put($component->getGroupName(), NestedFields::create($component->getGroupName()));
            }
            $this->components->get($component->getGroupName())->setField($component);
            return $this;
        }

        $this->components->put($component->getId(), $component);
        return $this;
    }

    public function hasComponent(string $componentName): bool
    {
        return $this->components->has($componentName);
    }

    public function getComponent(string $componentName): Component
    {
        return $this->components->get($componentName);
    }

    public function getComponents(): array
    {
        return $this->components
            ->filter(fn(Component $component) => $component->isVisible())
            ->map(fn(Component $component) => $component->toArray())
            ->all();
    }

    public function removeComponent(string $componentName): self
    {
        $this->components->forget($componentName);

        return $this;
    }

    public function componentKeys(): Collection
    {
        $fields = $this->components
            ->filter(fn(Component $component) => $component->isVisible())
            ->map(fn(Component $component) => $component instanceof NestedFields
                ?
                $component->getFields()
                :
                $component->getName()
            );

        $simpleFields = $fields->filter(fn($field) => is_string($field));
        $nestedFields = $fields->collapse();

        return $simpleFields->merge($nestedFields);
    }

    public function applyPermissions(): self
    {
        $fields = PermissionService::getFields(Route::currentRouteName());
        $this->components = $this->components->intersectByKeys(array_flip($fields));
        return $this;
    }

    public function setLayout(?Layout $layout): self
    {
        $this->layout = $layout;

        return $this;
    }

    public function get(): Collection
    {
        return collect([
            'title'       => $this->title,
            'description' => $this->description,
            'fields'      => $this->getComponents(),
            'params'      => $this->params->all(),
            'layout'      => $this->layout ? $this->layout->get() : null,
        ])->filter();
    }
}
