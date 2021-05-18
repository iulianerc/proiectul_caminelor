<?php

namespace Database\Seeders\inn\roles;

class AdminSeeder extends RoleSeeder
{
    protected string $alias = 'admin';
    protected string $menu = 'seeds/com/files/roles/menu/admin.php';
    protected string $permissions = 'seeds/com/files/roles/permissions/admin.json';

}
