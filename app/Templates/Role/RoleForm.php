<?php

namespace App\Templates\Role;

use App\Builders\Schema\Components\Input;
use App\Builders\Schema\Form;
use App\Builders\Schema\Components\FileUploader;
use App\Http\Requests\Role\RoleRequest;
use Illuminate\Support\Collection;

class RoleForm extends Form
{
    protected function components(): array
    {
        return [
            Input::create('name')
        ];
    }

    protected function rules(): void
    {
        $this->setRulesFromRequest(RoleRequest::class);
    }
}
