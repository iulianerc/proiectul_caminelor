<?php


namespace App\Repositories;


use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

abstract class Repository
{
    protected Model $model;

    /**
     * Repository constructor.
     *
     * @throws BindingResolutionException
     */
    public function __construct()
    {
        $this->model = app()->make($this->modelName());
    }

    abstract protected function modelName(): string;

    public function get(): LengthAwarePaginator
    {
        // TODO: Implement get() method.
    }

    final public function updateBy(string $field, $value, array $attributes)
    {
        return $this->model::where($field, '=', $value)->update($attributes);
    }

    final public function updateIn(string $field, $value, array $attributes)
    {
        return $this->model::whereIn($field, $value)->update($attributes);
    }

    final public function deleteBy(string $field, $value)
    {
        return $this->model::where($field, '=', $value)->delete();
    }

    final public function deleteByFilter(array $filter)
    {
        return $this->model::where($filter)->delete();
    }

    final public function deleteIn($value, string $field = 'id')
    {
        return $this->model::whereIn($field, $value)->delete();
    }

    final public function findBy(string $field, $value, $columns = ['*'])
    {
        return $this->model::where($field, $value)->select($columns)->first();
    }

    final public function findWhere(array $criteria, $columns = ['*'])
    {
        return $this->model::where($criteria)->select($columns)->first();
    }

    final public function setModel(Model $model): void
    {
        $this->model = $model;
    }

    final public function getModel(): Model
    {
        return $this->model;
    }

    final public function getFillable(): array
    {
        return $this->model->getFillable();
    }

    final public function liveSearch(
        string $field,
        array $filters,
        array $fields,
        string $route,
        string $relation = null
    )
    {
        $model = $this->model->applyPermissions($route);

        if ($relation) {
            $model->whereHas($relation);
        }

        $select = [
            "{$fields['value']} AS value",
            "{$fields['text']} AS text"
        ];

        if (isset($fields['label'])) {
            $select[] = "{$fields['label']} AS label";
        }

        $filters = collect($filters)
            ->transform(static fn($item, $key) => [$key, 'LIKE', "'%{$item}%'"])
            ->values()
            ->toArray();

        // Fixme
        $results = [];
        foreach ($filters as $value) {
            $results[] = Implode(' ', $value);
        }

        $results = Implode(" or ", $results);
        // fixmeend

        return $model
            ->whereRaw("($results)")
            ->limit(config('com.app.live_search_limit'))
            ->get($select)
            ->all();
    }

    final public function getAllowedList(array $fields = ['id AS value', 'name AS text'])
    {
        return $this->model->applyPermissions()
            ->get($fields)
            ->all();
    }

    final public function filteredList(string $field, array $value, array $fields = [])
    {
        return $this->model
            ->whereIn($field, $value)
            ->get($fields);
    }

    public function getListFields($request)
    {
        $fields = $request->fields;
        $orderBy = $request->orderBy;

        return $this->model
            ->when($fields, static fn($query, $fields) => $query->select(...$fields))
            ->when($orderBy, function ($query, $orderBy) {
                return $query->orderBy($orderBy['field'] ?? 'id', $orderBy['direction'] ?? 'asc');
            })
            ->get();
    }
}
