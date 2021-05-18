<?php


namespace App\Templates\User;


use App\Builders\Schema\Components\Input;
use App\Builders\Schema\Components\Select;
use App\Builders\Schema\Components\SelectionControl;
use App\Builders\Schema\Form;
use App\Http\Requests\User\UserCreateRequest;


class UserCreateForm extends Form
{
    protected function components(): array
    {
        return [
            Input::create('name'),
            Input::create('email')->setProps(['type' => 'email']),
            Input::create('password')->setRules('required')->setProps(['type' => 'password']),
            Input::create('password_confirmation')->setProps(['type' => 'password']),
            SelectionControl::create('password_expired')
                ->setTitle(__('modules/users.fields.password_expired.title'))
                ->setDescription(__('modules/users.fields.password_expired.description'))
                ->setProps(['checkbox' => true]),
            Select::create('project_id')
                ->setProps(['multiple' => true])
                ->setTitle(__('modules/users.fields.project_name.title'))
                ->setDescription(__('modules/users.fields.project_name.description')),
            Select::create('position_id')
                ->setTitle(__('modules/users.fields.position_name.title'))
                ->setDescription(__('modules/users.fields.position_name.description')),
            Select::create('role_id')
                ->setTitle(__('modules/users.fields.role_name.title'))
                ->setDescription(__('modules/users.fields.role_name.description')),
            SelectionControl::create('is_active')
                ->setTitle(__('modules/users.fields.is_active.title'))
                ->setDescription(__('modules/users.fields.is_active.description'))
                ->setProps(['checkbox' => true]),
            Select::create('status_id')
                ->setTitle(__('modules/users.fields.status_name.title'))
                ->setDescription(__('modules/users.fields.status_name.description'))
        ];
    }

    protected function rules(): void
    {
        $this->setRulesFromRequest(UserCreateRequest::class);
    }
}
