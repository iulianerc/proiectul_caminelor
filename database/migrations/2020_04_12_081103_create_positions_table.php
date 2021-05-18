<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePositionsTable extends Migration
{
    public function up(): void
    {
        Schema::create('positions', static function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name')->unique();
            $table->string('alias')->unique();
            $table->unsignedInteger('author_id')->nullable();
            $table->foreign('author_id')
                ->references('id')->on('users')
                ->onDelete('RESTRICT');
            $table->timestamps();
        });

        Schema::table('users', static function (Blueprint $table) {
            $table->unsignedSmallInteger('position_id')->nullable()->after('remember_token');
            $table->foreign('position_id', 'users_position_id_foreign')
                ->on('positions')
                ->references('id')
                ->onDelete('RESTRICT');
        });
    }

    public function down(): void
    {
        Schema::table('users', static function (Blueprint $table) {
            $table->dropForeign('users_position_id_foreign');
            $table->dropColumn('position_id');
        });

        Schema::dropIfExists('positions');
    }
}
