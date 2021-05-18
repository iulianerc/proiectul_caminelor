<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('statuses', static function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name', 100)->comment('Статус посылок');
            $table->string('alias', 100)->comment('Alias посылок');
            $table->string('color', 7)->comment('Цвет статуса');
            $table->enum('type', ['internal', 'external', 'user'])
                ->comment('Тип статуса, внутрений или внешний, для пользователя, для задачи');
            $table->unsignedInteger('author_id')->comment('Автор');
            $table->foreign('author_id')
                ->on('users')
                ->references('id')
                ->onDelete('RESTRICT');

            $table->unique(['type', 'alias']);

            $table->timestamps();
        });

        Schema::table('users', static function (Blueprint $table) {
            $table->unsignedSmallInteger('status_id')->nullable()->after('position_id');
            $table->foreign('status_id', 'users_status_id_foreign')
                ->on('statuses')
                ->references('id')
                ->onDelete('RESTRICT');
        });

        DB::statement("ALTER TABLE statuses comment 'Список статусов посылок'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        if (Schema::hasColumn('users', 'status_id')) {
            Schema::table('users', static function (Blueprint $table) {
                $table->dropForeign('users_status_id_foreign');
                $table->dropColumn('status_id');
            });
        }

        if (Schema::hasColumn('tasks', 'status_id')) {
            Schema::table('tasks', static function (Blueprint $table) {
                $table->dropForeign('task_status_id_foreign');
            });
        }

        Schema::dropIfExists('statuses');
    }
}
