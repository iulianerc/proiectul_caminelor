<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuOrderTable extends Migration
{

    public function up(): void
    {
        Schema::create('menu_order', static function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id')->nullable()->comment('Пользователь');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('RESTRICT');
            $table->unsignedInteger('role_id')->comment('Роль');
            $table->foreign('role_id')
                ->references('id')->on(config('permission.table_names.roles'))
                ->onDelete('RESTRICT');
            $table->unsignedBigInteger('menu_item_id')->comment('Эллемент меню');
            $table->foreign('menu_item_id')
                ->references('id')->on('menu_items')
                ->onDelete('RESTRICT');
            $table->unsignedBigInteger('parent_id')->nullable()->comment('Родительский эллемент меню');
            $table->foreign('parent_id')
                ->references('id')->on('menu_items')
                ->onDelete('RESTRICT');
            $table->unsignedSmallInteger('order_list')->comment('сортировачный номер');
            $table->unsignedInteger('author_id')->comment('Автор');
            $table->foreign('author_id')
                ->references('id')->on('users')
                ->onDelete('RESTRICT');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menu_order');
    }
}
