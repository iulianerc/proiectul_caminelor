<?php


namespace App\Builders\Schema\Layouts\Samples;

use App\Builders\Schema\Layouts\Layout;
use Illuminate\Support\Collection;

class FieldGroupsLayout extends Layout
{
    private string $name;
    private string $label;
    private string $gridType; /* [inline / named]*/
    private string $groupMode; /* [blocks / tabs / tabs_vertical]*/
    private string $defaultGroupLabel;
    private Collection $groups;
    private Collection $groupedFields;
    private Collection $groupFields;
    private Collection $groupBreakpoints;

    public function __construct(string $groupMode, string $defaultGroupLabel = '')
    {
        parent::__construct();
        $this->groupMode = $groupMode;
        $this->defaultGroupLabel = $defaultGroupLabel;
        $this->type = 'fieldGroups';
        $this->groups = collect();
        $this->groupedFields = collect();
        $this->groupFields = collect();
        $this->groupBreakpoints = collect();
    }

    /**
     * @param string $groupMode         = 'blocks' ?: 'tabs' ?: 'tabs_vertical'
     * @param string $defaultGroupLabel = 'Default'
     *
     * @return static
     */
    public static function create(string $groupMode, string $defaultGroupLabel = ''): self
    {
        return new self($groupMode, $defaultGroupLabel);
    }

    public function setGroupMode(string $groupMode): self
    {
        $this->groupMode = $groupMode;

        return $this;
    }

    public function setDefaultGroupLabel(string $defaultGroupLabel): self
    {
        $this->defaultGroupLabel = $defaultGroupLabel;
        return $this;
    }

    /**
     * Формирование шаблона inline
     *
     * @param string       $name
     * @param string       $label
     * @param InlineLayout $layout
     *
     * @return $this
     */
    public function inline(string $name, string $label, InlineLayout $layout): self
    {
        $this->name = $name;
        $this->label = $label;
        $this->gridType = 'inline';
        $this->groupFields = $layout->fields;
        $this->groupBreakpoints = $layout->breakpoints;
        return $this->createGroup();
    }

    /**
     * Формирование шаблона named
     *
     * @param string           $name
     * @param string           $label
     * @param NamedAreasLayout $layout
     *
     * @return $this
     */
    public function named(string $name, string $label, NamedAreasLayout $layout): self
    {
        $this->name = $name;
        $this->label = $label;
        $this->gridType = 'named';
        $layout->formatNamedAreas();
        $this->groupFields = $layout->getNamedFields();
        $this->groupBreakpoints = $layout->getNamedAreas();
        return $this->createGroup();
    }

    private function createGroup(): self
    {
        $this->groups->put($this->name, collect([
            'label'       => $this->label,
            'grid_type'   => $this->gridType,
            'fields'      => $this->groupFields->all(),
            'breakpoints' => $this->groupBreakpoints->all(),
        ])->filter());

        $this->groupedFields = $this->groupedFields->merge($this->groupFields);
        $this->groupFields = collect();
        $this->groupBreakpoints = collect();
        return $this;
    }

    protected function build(): void
    {
        $this->layout->put('group_mode', $this->groupMode);
        $this->layout->put('groups', $this->groups);
        $ungroupedFields = $this->fields->diff($this->groupedFields)->values();

        if (!empty($this->breakpoints) && $ungroupedFields->isNotEmpty()) {
            $ungrouped = InlineLayout::create()->setFields($ungroupedFields);
            $this->inline('ungrouped', $this->defaultGroupLabel, $ungrouped);
        }
    }
}
