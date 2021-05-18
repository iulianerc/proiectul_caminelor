<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Database\Query\Builder;

/**
 * Class MultipleExists - to check if values exists in Database
 * @package App\Rules
 */
class MultipleExists implements Rule
{
    private string $tableName;
    private array $fields;

    /**
     * Check if the values exists in database.
     *
     * @param string $tableName - Table in the database
     * @param mixed  ...$fields - Fields to check.
     *                          It can be a value, so we apologize that
     *                          field in database and field in request have the same name.
     *
     *                          If the field in database has not the same name as in request,
     *                          developer can use aliases:
     *                          <pre>[$fieldNameInDatabase => $nameInRequest]</pre>
     */
    public function __construct(string $tableName, ...$fields)
    {
        $this->tableName = $tableName;
        $this->fields = $fields;
    }

    public function passes($attribute, $value): bool
    {
        if (!$this->requestHasAllFields($value)) {
            return false;
        }
        $query = $this->prepareQuery($value);

        return $query->limit(1)->get()->isNotEmpty();
    }

    private function prepareQuery($value): Builder
    {
        $query = \DB::table($this->tableName);
        foreach ($this->fields as $field) {
            if (is_array($field)) {
                foreach ($field as $requestName => $columnName) {
                    $query->where($columnName, $value[$requestName]);
                }
            } else {
                $query->where($field, $value[$field]);
            }
        }

        return $query;
    }

    private function requestHasAllFields($request): bool
    {
        foreach ($this->fields as $field) {
            if (is_array($field)) {
                foreach (array_keys($field) as $columnName) {
                    if (!isset($request[$columnName])) {
                        return false;
                    }
                }
            } elseif (!isset($request[$field])) {
                return false;
            }
        }

        return true;
    }

    public function message()
    {
        return 'The :attribute is invalid';
    }
}
