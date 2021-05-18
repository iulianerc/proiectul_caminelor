<?php


namespace App\Http\Requests\Employee;


use App\Http\Requests\BasicRequest;

class EmployeeRequest extends BasicRequest
{
    protected array $rules = [
        'name'             => 'required|string|min:2|max:50',
        'phones'           => 'required|array',
        'email'            => 'required|email:rfc,dns|min:1|max:50|unique:employees,email',
        'idnp'             => 'nullable|valid_idnp|size:13|unique:employees,idnp',
        'gender'           => 'required|in:m,f',
        'birthdate'        => 'required|date_format:Y-m-d',
        'is_active'        => 'nullable|in:true,false',
        'signature'        => 'nullable',
        'user_id'          => 'nullable',
        'work_positions'   => 'required|array',
        'work_positions.*' => 'integer',
    ];

    protected bool $ignorable = true;
    protected string $routeParameter = 'employee';
}
