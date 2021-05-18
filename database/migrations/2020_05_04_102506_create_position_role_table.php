<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePositionRoleTable extends Migration
{
    public function up(): void
    {
        $rolesTableName = config('permission.table_names.roles');
        Schema::create('position_role', static function (Blueprint $table) use ($rolesTableName) {
            $table->unsignedInteger('role_id');
            $table->foreign('role_id')
                ->references('id')->on($rolesTableName)
                ->onDelete('RESTRICT');
            $table->unsignedSmallInteger('position_id');
            $table->foreign('position_id')
                ->references('id')->on('positions')
                ->onDelete('RESTRICT');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('position_role');
    }
}
