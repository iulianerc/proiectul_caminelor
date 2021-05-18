<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelHasRolesTable extends Migration
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
        Schema::create(self::$tables['model_has_roles'], static function (Blueprint $table) {
            $table->unsignedInteger('role_id');

            $table->string('model_type');
            $table->unsignedBigInteger(self::$columns['model_morph_key']);
            $table->index([self::$columns['model_morph_key'], 'model_type',]);

            $table->foreign('role_id')
                ->references('id')
                ->on(self::$tables['roles'])
                ->onDelete('cascade');

            $table->primary([
                'role_id',
                self::$columns['model_morph_key'],
                'model_type'
            ],
                'model_has_roles_role_model_type_primary');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(self::$tables['model_has_roles']);
    }
}
