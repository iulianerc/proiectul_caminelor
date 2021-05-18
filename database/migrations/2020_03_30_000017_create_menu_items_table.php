<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuItemsTable extends Migration
{

    public function up(): void
    {
        Schema::create('menu_items', static function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_ru', 50)->comment('Название на русском');
            $table->string('name_ro', 50)->comment('Название на румынском');
            $table->string('name_en', 50)->comment('Название на английском');
            $table->string('icon', 50)->comment('Иконка');
            $table->string('link')->comment('Сслыка');
            $table->unsignedInteger('author_id')->comment('Автор');
            $table->foreign('author_id')
                ->references('id')->on('users')
                ->onDelete('restrict');
            $table->timestamps();
            $table->unique(['name_ru', 'name_ro', 'name_en']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menu_items');
    }
}
