<?php


namespace App\Builders\Schema\Layouts\Samples;


use App\Builders\Schema\Layouts\Layout;
use Intervention\Image\Exception\NotFoundException;

class InlineLayout extends Layout
{
    private const INLINE_CONTENT_TEMPLATE
        = [
            'xs' => 1,
            'sm' => 2,
            'md' => 3,
            'lg' => 4,
            'xl' => 5
        ];

    public function __construct()
    {
        parent::__construct();
        $this->type = 'inline';
        $this->breakpoints = collect(self::INLINE_CONTENT_TEMPLATE);
    }

    public static function create(): self
    {
        return new self();
    }

    /**
     * @param string $breakpoint = 'xs' ?: 'sm' ?: 'md' ?: 'lg' ?: 'xl'
     * @param int    $value      = 1 ?: 2 ?: 3 ?: 4 ?: 5 ?: 6 ?: 7 ?: 8 ?: 9 ?: 10 ?: 11 ?: 12
     *
     * @return $this
     */
    public function modify(string $breakpoint, int $value): self
    {
        if (!$this->breakpoints->has($breakpoint)) {
            throw new NotFoundException("Breakpoint {$breakpoint} not found");
        }

        $this->breakpoints->put($breakpoint, $value);

        return $this;
    }

    public function only(array $fields): self
    {
        $this->fields->only($fields);
    }

    protected function build(): void
    {
        // TODO: Implement build() method.
    }
}
