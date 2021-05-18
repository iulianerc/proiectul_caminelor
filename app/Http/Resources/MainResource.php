<?php

namespace App\Http\Resources;

use App\Services\Permission\PermissionService;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Route;
use Merax\Helpers\Helper;

class MainResource extends BaseResource
{

    protected function fields(): array
    {
        $resource = $this;
        $module = Helper::getModuleName();
        $moduleFields = collect(array_keys(__("modules/{$module}.fields")));
        return $moduleFields
            ->merge($this->exceptions)
            ->mapWithKeys(static function ($field) use ($resource) {
                return [$field => $resource->$field];
            })
            ->all();
    }
}
