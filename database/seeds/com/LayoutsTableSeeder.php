<?php
namespace seeds\com;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class LayoutsTableSeeder extends Seeder
{
    private string $table = 'layouts';

    public function run(): void
    {
        foreach ($this->getDump() as $layout) {
            $layout['author_id'] = 1;
            $layout['created_at'] = now();
            $layout['updated_at'] = now();
            DB::table($this->table)->insertOrIgnore($layout);
        }
    }

    private function getDump(): array
    {
        return [
            [
                'name' => 'Default layout',
                'path' => 'default'
            ],
            [
                'name' => 'First layout',
                'path' => 'first'
            ],
            [
                'name' => 'Second layout',
                'path' => 'second'
            ],
            [
                'name' => 'Halloween layout',
                'path' => 'halloween'
            ],

        ];
    }

    public static function permissions(): array
    {
        return [];
    }

    public function get(array $fields): Collection
    {
        return DB::table($this->table)->get($fields);
    }

}
