<?php

namespace Database\Seeders\inn\roles;

class DepartmentHeadSeeder extends RoleSeeder
{
    protected string $alias = 'department_head';
    protected string $menu = 'seeds/com/files/roles/menu/department_head.php';
//    protected string $permissions = 'seeds/com/files/roles/permissions/department_head.json';
    protected string $permissions = 'seeds/com/files/roles/permissions/admin.json';

}
