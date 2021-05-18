<?php


namespace App\Rules;


use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class UniqueJsonField implements Rule
{

    protected string $table;
    protected string $field;
    protected array $excluded;

    public function __construct(string $table, string $field, array $excluded = [])
    {
        $this->table = $table;
        $this->field = $field;
        $this->excluded = $excluded;
    }

    public function passes($attribute, $value): bool
    {
        return (bool)DB::table($this->table)
            ->whereNotIn('id', $this->excluded)
            ->where($this->field, $value)
            ->get()
            ->isEmpty();
    }

    public function message(): string
    {
        return 'The given :attribute has already been taken';
    }
}
