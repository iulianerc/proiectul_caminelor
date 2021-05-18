<?php


namespace App\Builders\Table;


use App\Builders\Table\Components\TableColumn\TableColumn;
use App\Services\Permission\PermissionService;
use Illuminate\Support\Collection;
use Merax\Helpers\Helper;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Route;

class Table
{
    protected Collection $headers;
    protected Collection $actionProps;
    protected LengthAwarePaginator $items;

    public function __construct()
    {
        $table = $this;
        $table->headers = collect();
        $table->actionProps = collect();
        $module = Helper::getModuleName();
        $moduleFields = collect(__("modules/{$module}.fields"));
        $moduleFields->map(static function ($field, $fieldName) use ($table) {
            $column = new TableColumn($fieldName, $field['title']);
            $column->setSortable($field['sortable'] ?? true);
            $column->setWidth($field['width'] ?? 0);
            $table->addColumn($column);
        });
    }

    public function getHeaders(): array
    {
        $fields = PermissionService::getFields(Route::currentRouteName());
        return $this->headers
            ->intersectByKeys(array_flip($fields))
            ->map(fn($column) => $column->toArray())
            ->values()
            ->all();
    }

    public function setHeaders(array $headers): self
    {
        $this->headers = collect($headers);

        return $this;
    }

    public function getItems(): LengthAwarePaginator
    {
        return $this->items;
    }

    public function setItems(LengthAwarePaginator $items): self
    {
        $this->items = $items;
        return $this;
    }

    public function addColumn(TableColumn $column): self
    {
        $this->headers->put($column->getName(), $column);

        return $this;
    }

    public function getColumn(string $columnName): TableColumn
    {
        return $this->headers[$columnName];
    }

    public function build($headers = true): array
    {
        $data = [
            'items'   => $this->items,
            'actions' => $this->actionProps->all(),
        ];

        if ($headers) {
            $data['headers'] = $this->getHeaders();
        }

        return collect($data)->filter()->all();
    }

    public function applyPermissions(array $allowedHeaders = null): self
    {
        $allowedHeaders ??= PermissionService::getFields(Route::currentRouteName());
        $this->headers = $this->headers->filter(fn($column, $columnName) => empty($allowedHeaders) || in_array($columnName, $allowedHeaders, true));

        return $this;
    }

    public function getActionProps(): Collection
    {
        return $this->actionProps;
    }

    /**
     * Заполнение свойств для действий
     *
     * @param array $actionProps = [
     *     CreateButton::class,
     *     EditButton::class,
     *     DeleteButton::class
     *]
     *
     * @return $this
     */
    public function setActionProps(array $actionProps): self
    {
        $this->actionProps = collect($actionProps)->mapWithKeys(
            fn($actionProp, $key) => (new $actionProp)()
        );

        return $this;
    }
}
