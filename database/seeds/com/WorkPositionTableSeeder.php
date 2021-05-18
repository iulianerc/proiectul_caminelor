<?php

namespace seeds\inn;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkPositionTableSeeder extends Seeder
{
    private string $table = 'work_positions';

    public function run(): void
    {
        foreach ($this->getDump() as $item) {
            $item['created_at'] = now();
            $item['updated_at'] = now();
            DB::table($this->table)->insertOrIgnore($item);
        }
    }

    private function getDump(): array
    {
        return [
            [
                'name'   => 'chairman',
            ],
            [
                'name'   => 'vice_president',
            ],
            [
                'name'   => 'department_head',
            ],
            [
                'name'   => 'specialist',
            ],
        ];
    }
}
