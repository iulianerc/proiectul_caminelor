<?php

namespace App\Templates\Menu;


use App\Builders\Schema\Components\Select;
use App\Builders\Schema\Form;

class MenuOrderForm extends Form
{
    public function __construct()
    {
        parent::__construct();
        $this->schema()->setTitle(__('modules/menu_items.actions.edit_order_holders'));
    }

    protected function components(): array
    {
        return [
            Select::create('role_id')
                ->setTitle(__('modules/roles.title'))
                ->setChildren(['user_id']),
            Select::create('user_id')
                ->setTitle(__('modules/users.title'))
        ];
    }

    protected function rules(): void
    {
        // TODO: Implement rules() method.
    }
}
