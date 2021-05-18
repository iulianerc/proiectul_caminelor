<?php

namespace seeds\com;

use App\Models\Client\Client;
use App\Models\User\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactsTableSeeder extends Seeder
{
    private string $table = 'contacts';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->getDump() as $country) {
            $country['created_at'] = now();
            $country['updated_at'] = now();
            $country['client_id'] = app(Client::class)->first()->id;
            DB::table($this->table)->insertOrIgnore($country);
        }
    }

    private function getDump(): array
    {
        return [
            [
                'contact_type' => 'email',
                'value'        => 'testmail1@gmail.com',
            ],
            [
                'contact_type' => 'phone',
                'value'        => '+37378463354',
            ],
            [
                'contact_type' => 'email',
                'value'        => 'testmail1@gmail.com',
            ],
            [
                'contact_type' => 'phone',
                'value'        => '+37368763524',
            ],
        ];
    }
}
