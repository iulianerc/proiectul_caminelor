<?php

namespace App\Http\Requests\HostelRent;

use App\Http\Requests\BasicRequest;

class HostelRentRequest extends BasicRequest
{
    protected array $rules = [
            'hostel_id' => ['required', 'integer', 'exists:hostels,id'],
            'resident_id' => ['required', 'integer', 'exists:residents,id'],
            'room_category_id' => ['required', 'integer', 'exists:room_categories,id'],
        ];

    protected bool $ignorable = true;

    protected string $routeParameter = 'role';
}
