<?php


namespace App\Builders\Schema\Components\Base;


use Merax\Helpers\Helper;

abstract class Component
{
    protected string $id;
    protected string $name;
    protected string $component;
    protected string $title = '';
    protected string $description = '';
    protected string $rules = '';
    protected array $props = [];
    protected bool $visible = true;
    protected string $groupName;

    /**
     * Component constructor.
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->id = $name;
        $this->name = $name;
        $module = Helper::getModuleName();
        $moduleText = __("modules/{$module}.fields.{$name}");
        if (is_array($moduleText)) {
            $this->title = $moduleText['title'];
            $this->description = $moduleText['description'];
        }
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getRules(): string
    {
        return $this->rules;
    }

    public function setRules(string $rules): self
    {
        $this->rules = $rules;

        return $this;
    }

    public function getProps(): array
    {
        return $this->props;
    }

    public function setProps(array $props): self
    {
        $this->props = array_replace($this->props, $props);

        return $this;
    }

    public function setProp(string $key, string $value): self
    {
        $this->props[$key] = $value;

        return $this;
    }

    public function getComponent(): string
    {
        return $this->component;
    }

    public function setComponent(string $component): self
    {
        $this->component = $component;

        return $this;
    }

    public function setVisible(bool $visible): self
    {
        $this->visible = $visible;
        return $this;
    }

    public function isVisible(): bool
    {
        return $this->visible;
    }

    abstract public static function create(string $name): self;

    abstract public function toArray(): array;

    public function setGroupName(string $groupName): Component
    {
        $this->groupName = $groupName;
        $this->props['grid_area'] = "{$this->groupName}__{$this->name}";
        return $this;
    }

    public function getGroupName(): string
    {
        return $this->groupName;
    }

    public function isNestedField(): bool
    {
        return isset($this->groupName);
    }
}
