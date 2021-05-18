<?php

namespace App\Http\Resources;

use App\Services\Permission\PermissionService;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Route;

abstract class BaseResource extends JsonResource
{
    protected array $exceptions = ['_actions', '_class'];

    public function toArray($request): array
    {
        // получаем права доступа на поля
        $fields = PermissionService::getFields(Route::currentRouteName());

        // если неверный тип данных выдаём исключение
        if (!\is_array($fields)) {
            throw new \TypeError('fields must be an array');
        }

        $fields = array_merge($fields, $this->exceptions);
        return array_intersect_key($this->fields(), array_flip($fields));
    }

    abstract protected function fields(): array;
}
