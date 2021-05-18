<?php


namespace App\Builders\Schema\Layouts\Samples;

use App\Builders\Schema\Layouts\Layout;
use Illuminate\Support\Collection;
use Intervention\Image\Exception\NotFoundException;

class NamedAreasLayout extends Layout
{
    protected const EXCEPTIONS = ['.', 'GROUP_NAME', 'INLINE_BUTTONS'];
    protected Collection $namedAreas;
    protected Collection $namedFields;

    public function __construct()
    {
        parent::__construct();
        $this->type = 'namedAreas';
        $this->namedAreas = collect();
        $this->namedFields = collect();
    }

    public static function create(): self
    {
        return new self();
    }

    public function getNamedFields(): Collection
    {
        return $this->namedFields;
    }

    public function getNamedAreas(): Collection
    {
        return $this->namedAreas;
    }

    /**
     * Установка шаблона для разрешения
     *
     * @param string $breakpoint = 'xs' ?: 'sm' ?: 'md' ?: 'lg' ?: 'xl'
     * @param string $columns    = 'repeat(1, 1fr)' ?: 'repeat(2, 1fr)' ?: 'repeat(3, 1fr)'
     * @param array  $areas      = [['field' , 'field', 'field']]
     *
     * @return $this
     */
    public function put(string $breakpoint, string $columns, array $areas): self
    {
        if (!in_array($breakpoint, self::BREAKPOINTS)) {
            throw new NotFoundException("Breakpoint {$breakpoint} not found");
        }
        //todo добавить валидацию на правильность заполнения gridTemplateAreas
        // и соответствия gridTemplateColumns

        $this->namedAreas->put($breakpoint, collect([
            'gridTemplateColumns' => $columns,
            'gridTemplateAreas'   => collect($areas)
        ]));

        return $this;
    }

    /**
     * Форматирование установленных шаблонов для разрешений
     *
     * @return $this
     */
    public function formatNamedAreas(): self
    {
        $fields = $this->fields;
        $namedFields = $this->namedFields;
        $this->namedAreas = $this->namedAreas->map(static function ($namedArea) use ($namedFields, $fields) {
            $gridTemplateAreas = $namedArea->get('gridTemplateAreas')->map(static function ($gridTemplateArea) use (
                $namedFields, $fields
            ) {
                $gridTemplateArea = collect($gridTemplateArea)->map(static function ($namedField) use ($namedFields, $fields) {
                    $namedField = $fields->has($namedField) ? $fields->get($namedField) : $namedField;
                    $namedFields->push($namedField);
                    return $namedField;
                });
                return "'{$gridTemplateArea->implode(' ')}'";
            });

            $namedArea->put('gridTemplateAreas', $gridTemplateAreas->implode(' '));
            return $namedArea;
        });

        $this->namedFields = $this->namedFields->unique()->diff(self::EXCEPTIONS)->values();

        return $this;
    }

    protected function build(): void
    {
        $this->namedFields = $this->fields;
        $this->formatNamedAreas();
        $this->breakpoints = $this->namedAreas;
    }
}
