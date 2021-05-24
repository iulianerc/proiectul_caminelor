<?php

namespace seeds\com;

use Database\Seeders\com\HostelRentsSeeder;
use Database\Seeders\com\HostelsTableSeeder;
use Database\Seeders\com\ResidentsSeeder;
use Database\Seeders\com\RoomCategoriesSeeder;
use Database\Seeders\inn\roles\AdminSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // модули
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        $this->call([
            LayoutsTableSeeder::class,
            RolesTableSeeder::class,
            PositionsTableSeeder::class,
            StatusesTableSeeder::class,
            UsersTableSeeder::class,
            BasePermissionsTableSeeder::class,
            MenuItemsTableSeeder::class,
            HostelsTableSeeder::class,
            ResidentsSeeder::class,
            RoomCategoriesSeeder::class,
            HostelRentsSeeder::class
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // пользователи
        $this->call([AdminSeeder::class]);
    }
}
