<?php
namespace seeds\com;

use App\Models\Role\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PositionsTableSeeder extends Seeder
{
    private string $table = 'positions';
    private string $pivotTable = 'position_role';

    public function run(): void
    {
        foreach ($this->getDump() as $position) {
            $positionId = DB::table($this->table)->insertGetId([
                'name'         => $position['name'],
                'alias'        => $position['alias'],
                'author_id'    => 1,
                'created_at'   => now(),
                'updated_at'   => now(),
            ]);
            $roleName = Str::lower(str_replace(' ', '_', $position['name']));
            $role = Role::findByName($roleName, 'api')->first();
            if ($positionId && $role) {
                DB::table($this->pivotTable)->insertOrIgnore([
                    'role_id'     => $role->id,
                    'position_id' => $positionId,
                ]);
            }
        }
    }

    private function getDump(): array
    {
        return [
            [
                'name'         => 'Admin',
                'alias'        => 'admin',
            ],
            [
                'name'         => 'Guest',
                'alias'        => 'guest',
            ],
            [
                'name'         => 'Chairman',
                'alias'        => 'chairman',
            ],
            [
                'name'         => 'Vice president',
                'alias'        => 'vice_president',
            ],
            [
                'name'         => 'Department Head',
                'alias'        => 'department_head',
            ],
            [
                'name'         => 'Specialist',
                'alias'        => 'specialist',
            ],
        ];
    }

    public static function permissions(): array
    {
        return array_values(config('permissions.general.modules.positions.actions'));
    }
}
