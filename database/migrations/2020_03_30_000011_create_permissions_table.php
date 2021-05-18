<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration
{
    private static array $tables;

    public function __construct()
    {
        self::$tables = config('permission.table_names');
    }

    public function up(): void
    {
        Schema::create(self::$tables['permissions'], static function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->string('name')->unique()->comment('Название');
            $table->string('guard_name')->comment('web/api');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(self::$tables['permissions']);
    }
}
