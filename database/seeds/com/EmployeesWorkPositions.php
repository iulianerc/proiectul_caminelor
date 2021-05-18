<?php

namespace seeds\inn;

use App\Models\Employee\Employee;
use App\Models\WorkPosition\WorkPosition;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class EmployeesWorkPositions extends Seeder
{
    private string $table = 'employees_work_positions';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $centers = WorkPosition::all()->pluck('id')->toArray();
        $toInsert = [];
        Employee::all()->each(static function ($employee) use ($centers, &$toInsert){
            $toInsert[] = [
                'work_position_id' => faker()->randomElement($centers),
                'employee_id' => $employee->id
            ];
        });

        DB::table($this->table)->insertOrIgnore($toInsert);
    }
}
