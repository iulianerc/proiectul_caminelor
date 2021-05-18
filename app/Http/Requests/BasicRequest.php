<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class BasicRequest extends FormRequest implements BasicRequestInterface
{
    /**
     * Правила валидации
     *
     * @var array $rules
     */
    protected array $rules = [];

    /**
     * Игнорировать текущую запись при проверке на уникальность
     *
     * @var bool $ignorable
     */
    protected bool $ignorable = false;

    /**
     * Параметр маршрута для определения текущей записи
     *
     * @var string $routeParameter
     */
    protected string $routeParameter = '';

    public function rules(): array
    {
        $this->ignore();
        if ($this->isMethod('patch')) {
            return array_intersect_key($this->rules, $this->all());
        }

        return $this->rules;
    }

    public function ignore(): void
    {
        $model = $this->route($this->routeParameter);
        if ($this->ignorable && $model) {
            foreach ($this->rules as &$rule) {
                if (Str::contains($rule, ['unique:', 'unique_with:'])) {
                    $rule .= ',' . $model->id;
                }
            }
        }
    }

}
