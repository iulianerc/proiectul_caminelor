<?php

namespace Database\Seeders\inn\roles;

class SpecialistSeeder extends RoleSeeder
{
    protected string $alias = 'specialist';
    protected string $menu = 'seeds/com/files/roles/menu/specialist.php';
//    protected string $permissions = 'seeds/com/files/roles/permissions/specialist.json';
    protected string $permissions = 'seeds/com/files/roles/permissions/admin.json';

}
