<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelHasPermissionsTable extends Migration
{
    private static array $tables;
    private static array $columns;

    public function __construct()
    {
        self::$tables = config('permission.table_names');
        self::$columns = config('permission.column_names');
    }

    public function up(): void
    {
        Schema::create(self::$tables['model_has_permissions'], static function (Blueprint $table) {
            $table->unsignedInteger('permission_id')->comment('ID правила досс');
            $table->string('model_type')->comment('Модель');
            $table->unsignedBigInteger(self::$columns['model_morph_key']);
            $table->string('access_level', 20)->default('all');
            $table->json('fields')->nullable();
            $table->json('params')->nullable();

            $table->index([self::$columns['model_morph_key'], 'model_type',]);

            $table->foreign('permission_id')
                ->references('id')
                ->on(self::$tables['permissions'])
                ->onDelete('cascade');

            $table->primary([
                'permission_id',
                self::$columns['model_morph_key'],
                'model_type'
            ], 'model_has_permissions_permission_model_type_primary');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(self::$tables['model_has_permissions']);
    }
}
