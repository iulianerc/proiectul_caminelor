<?php
namespace seeds\com;

use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    private string $table = 'ar_roles';

    public function run(): void
    {
        foreach ($this->getDump() as $role) {
            $role['guard_name'] = 'api';
            $role['created_at'] = now();
            $role['updated_at'] = now();
            DB::table($this->table)->insertOrIgnore($role);
        }
    }

    public function getDump(): array
    {
        return [
            [
                'name' => 'admin',
                'name_ro' => 'Administrator',
                'name_en' => 'Admin',
                'name_ru' => 'Админ',
            ],
            [
                'name' => 'guest',
                'name_ro' => 'Vizitator',
                'name_en' => 'Guest',
                'name_ru' => 'Гость',
            ],
            [
                'name' => 'chairman',
                'name_ro' => 'Președinte',
                'name_en' => 'Chairman',
                'name_ru' => 'Председатель',
            ],
            [
                'name' => 'vice_president',
                'name_ro' => 'Vice președinte',
                'name_en' => 'Vice president',
                'name_ru' => 'Вице-президент',
            ],
            [
                'name' => 'department_head',
                'name_ro' => 'Șef de secțiune',
                'name_en' => 'Department head',
                'name_ru' => 'Глава отделения',
            ],
            [
                'name' => 'specialist',
                'name_ro' => 'Specialist',
                'name_en' => 'Specialist',
                'name_ru' => 'Специалист',
            ],
        ];
    }

    public static function permissions(): array
    {
        return array_values(config('permissions.general.modules.roles.actions'));
    }

    public function get(array $fields): Collection
    {
        return DB::table($this->table)->get($fields);
    }
}
