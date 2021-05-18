<?php

namespace Database\Seeders\inn\roles;

class VicePresidentSeeder extends RoleSeeder
{
    protected string $alias = 'vice_president';
    protected string $menu = 'seeds/com/files/roles/menu/vice_president.php';
//    protected string $permissions = 'seeds/com/files/roles/permissions/vice_president.json';
    protected string $permissions = 'seeds/com/files/roles/permissions/admin.json';

}
