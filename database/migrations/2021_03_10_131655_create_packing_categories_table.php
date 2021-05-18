<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackingCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packing_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name_en')->comment('Type of packing');
            $table->string('name_ro')->comment('Tipul ambalajului');
            $table->string('name_ru')->comment('Вид упаковки');
            $table->unsignedInteger('author_id')->comment('Author');
            $table->timestamps();

            $table->foreign('author_id')
                ->on('users')
                ->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packing_categories');
    }
}
