<?php

namespace App\Http\Requests\Role;

use App\Http\Requests\BasicRequest;

/**
 * @OA\RequestBody(
 *   request="Role",
 *   description="Role object that will be stored",
 *   required=true,
 *   @OA\JsonContent(
 *     @OA\Items(ref="#/components/schemas/Role")
 *   ),
 *   @OA\MediaType(
 *      mediaType="application/x-www-form-urlencoded",
 *      @OA\Schema(ref="#/components/schemas/Role"),
 *   )
 * )
 */

class RoleRequest extends BasicRequest
{
    protected array $rules = [
            'name' => 'required|min:2|max:255|unique:ar_roles,name',
            'guard_name' => ['required', 'in:api,web'],
            'name_ro' => ['required', 'min:2', 'max:255','unique:ar_roles,name_ro'],
            'name_en' => ['required', 'min:2', 'max:255','unique:ar_roles,name_en'],
            'name_ru' => ['required', 'min:2', 'max:255','unique:ar_roles,name_ru']
        ];

    protected bool $ignorable = true;

    protected string $routeParameter = 'role';
}
