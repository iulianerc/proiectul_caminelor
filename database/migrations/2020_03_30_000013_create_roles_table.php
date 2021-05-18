<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    private static array $tables;

    public function __construct()
    {
        self::$tables = config('permission.table_names');
    }

    public function up(): void
    {
        Schema::create(self::$tables['roles'], static function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->string('name')->unique()->comment('Alias');
            $table->string('name_ro')->unique()->comment('Name RO');
            $table->string('name_en')->unique()->comment('Name EN');
            $table->string('name_ru')->unique()->comment('Name RU');
            $table->string('guard_name')->comment('web/api');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(self::$tables['roles']);
    }
}
