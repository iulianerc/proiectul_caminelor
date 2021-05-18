<?php

namespace seeds\inn;

use App\Models\Employee\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;


class EmployeesTableSeeder extends Seeder
{
    private string $table = 'employees';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        factory(Employee::class, 25)->create();
    }

}
