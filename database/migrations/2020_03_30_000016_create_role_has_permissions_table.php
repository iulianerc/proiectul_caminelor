<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleHasPermissionsTable extends Migration
{
    protected static array $tables;

    public function __construct()
    {
        self::$tables = config('permission.table_names');
    }

    public function up(): void
    {
        Schema::create(self::$tables['role_has_permissions'], static function (Blueprint $table) {
            $table->unsignedInteger('permission_id');
            $table->unsignedInteger('role_id');
            $table->string('access_level', 20)->default('all');
            $table->json('fields')->nullable();
            $table->json('params')->nullable();
            $table->foreign('permission_id')
                ->references('id')
                ->on(self::$tables['permissions'])
                ->onDelete('cascade');
            $table->foreign('role_id')
                ->references('id')
                ->on(self::$tables['roles'])
                ->onDelete('cascade');
            $table->primary(['permission_id', 'role_id']);
        });

        app('cache')
            ->store(config('permission.cache.store') !== 'default'
                ? config('permission.cache.store') : null)
            ->forget(config('permission.cache.key'));
    }

    public function down(): void
    {
        Schema::dropIfExists(self::$tables['role_has_permissions']);
    }
}
