<?php

namespace seeds\com;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TelegramReceiversSeeder extends Seeder
{
    private string $table = 'telegram_receivers';

    public function run(): void
    {
        $toInsert = [];

        foreach ($this->getDump() as $item) {
            $item['created_at'] = now();
            $item['updated_at'] = now();
            $toInsert[] = $item;
        }

        DB::table($this->table)->insertOrIgnore($toInsert);
    }

    private function getDump(): array
    {
        return [
            [
                'alias'            => 'admin',
                'telegram_chat_id' => '-506388671',
            ],
            [
                'alias'            => 'operator',
                'telegram_chat_id' => '-586131347',
            ],

        ];
    }

}
