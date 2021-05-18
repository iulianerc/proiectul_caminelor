<?php
namespace seeds\com;

use App\Models\Status\Status;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class StatusesTableSeeder extends Seeder
{
    private string $table = 'statuses';

    public function run(): void
    {
        foreach ($this->getDump() as $status) {
            $status['author_id'] = 1;
            $status['created_at'] = now();
            $status['updated_at'] = now();
            DB::table($this->table)->insertOrIgnore($status);
        }

        $confirmedStatus = Status::where([['name', 'CONFIRMED'], ['type', 'user']])->get('id')->first()->id;
        DB::table('users')->update(['status_id' => $confirmedStatus]);
    }

    private function getDump(): array
    {
        return [
            [
                'name'  => 'NEW',
                'alias' => 'new',
                'color' => '#ffcccc',
                'type'  => 'user'
            ],
            [
                'name'  => 'CONFIRMED',
                'alias' => 'confirmed',
                'color' => '#339966',
                'type'  => 'user'
            ],
            [
                'name'  => 'ACTIVE',
                'alias' => 'active',
                'color' => '#28a745',
                'type'  => 'user'
            ],
        ];
    }

    public function get(array $fields): Collection
    {
        return DB::table($this->table)->get($fields);
    }
}
