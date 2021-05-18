<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHtmlPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('html_pages', static function (Blueprint $table) {
            $table->smallIncrements('id');

            $table->string('name', 100)->comment('Название страницы');
            $table->string('alias', 100)->unique()->comment('Алиас страницы');
            $table->text('content')->comment('Контент html страницы');
            $table->date('publish_date')->comment('Дата публикации');

            $table->unsignedInteger('author_id')->comment('Автор');
            $table->foreign('author_id')
                ->on('users')
                ->references('id')
                ->onDelete('RESTRICT');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('html_pages');
    }
}
