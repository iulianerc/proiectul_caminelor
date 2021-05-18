<?php

namespace seeds\com;

use App\Models\OrderReceipt\OrderReceipt;
use Database\Seeders\inn\roles\AdminSeeder;
use Database\Seeders\inn\roles\ChairmanSeeder;
use Database\Seeders\inn\roles\DepartmentHeadSeeder;
use Database\Seeders\inn\roles\SpecialistSeeder;
use Database\Seeders\inn\roles\VicePresidentSeeder;
use Database\Seeders\OrderStatusesTableSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use seeds\inn\EmployeesTableSeeder;
use seeds\inn\EmployeesWorkPositions;
use seeds\inn\WorkPositionTableSeeder;

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
            WorkPositionTableSeeder::class,
            UsersTableSeeder::class,
            BasePermissionsTableSeeder::class,
            MenuItemsTableSeeder::class,
            BanksTableSeeder::Class,
            CountriesTableSeeder::class,
            PackingCategoriesTableSeeder::class,
            PurposesOfUseTableSeeder::class,
            ClientsTableSeeder::class,
            ClientBankAccountsTableSeeder::class,
            TransportTableSeeder::class,
            CurrencySeeder::class,
            ExchangeRateSeeder::class,
            SystemVariableBookSeeder::class,
            GoodsSeeder::class,
            OrderStatusesTableSeeder::class,
            AuthorizedPersonsTableSeeder::class,
            OrdersTableSeeder::class,
            OrderCountriesSeeder::class,
            EmployeesTableSeeder::class,
            EmployeesWorkPositions::class,
            ServicesSeeder::class,
            TelegramReceiversSeeder::class,
            OrderGoodsSeeder::class,
            PaymentMethodsTableSeeder::class,
            OrderGuaranteesTableSeeder::class,
            OrderReceiptsSeeder::class
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // пользователи
        $this->call([AdminSeeder::class]);
        $this->call([ChairmanSeeder::class]);
        $this->call([DepartmentHeadSeeder::class]);
        $this->call([SpecialistSeeder::class]);
        $this->call([VicePresidentSeeder::class]);
    }
}
