<?php

namespace seeds\com;

use App\Models\User\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesTableSeeder extends Seeder
{
    private string $table = 'countries';

    public function run()
    {
        foreach ($this->getDump() as $country) {
            $country['created_at'] = now();
            $country['updated_at'] = now();
            $country['author_id'] = app(User::class)->first()->id;
            DB::table($this->table)->insertOrIgnore($country);
        }
    }

    private function getDump()
    {
        $path = database_path('seeds/com/files/locations/countries/countries.json');
        $file = file_get_contents($path);
        return decode($file);
    }
}
