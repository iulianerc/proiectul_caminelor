<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusesTableSeeder extends Seeder
{
    private string $table = 'order_statuses';

    public function run()
    {
        foreach ($this->getDump() as $status) {
            $status['created_at'] = now();
            $status['updated_at'] = now();
            DB::table($this->table)->insertOrIgnore($status);
        }
    }

    public function getDump (): array
    {
        return [
            [
                'name' => 'PROCESSING',
                'alias' => 'processing',
                'color' => '#fff2cc',
            ],
            [
                'name' => 'CONFIRMED',
                'alias' => 'confirmed',
                'color' => '#dae8fc',
            ],
            [
                'name' => 'PAID',
                'alias' => 'paid',
                'color' => '#e1d5e7',
            ],
            [
                'name' => 'ISSUED',
                'alias' => 'issued',
                'color' => '#d5e8d4',
            ],
            [
                'name' => 'RETURNED',
                'alias' => 'returned',
                'color' => '#1ba1e2',
            ],
            [
                'name' => 'CLOSED',
                'alias' => 'closed',
                'color' => '#d9d4d4',
            ],
        ];
    }
}
