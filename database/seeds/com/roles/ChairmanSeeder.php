<?php

namespace Database\Seeders\inn\roles;

class ChairmanSeeder extends RoleSeeder
{
    protected string $alias = 'chairman';
    protected string $menu = 'seeds/com/files/roles/menu/chairman.php';
//    protected string $permissions = 'seeds/com/files/roles/permissions/chairman.json';
    protected string $permissions = 'seeds/com/files/roles/permissions/admin.json';

}
