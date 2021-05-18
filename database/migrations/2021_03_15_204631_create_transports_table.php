<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transports', function (Blueprint $table) {
            $table->id();
            $table->string('name_ro')->comment('Romanian name');
            $table->string('name_en')->comment('English name');
            $table->string('name_ru')->comment('Russian name');
            $table->unsignedInteger('author_id')->comment('Author');
            $table->timestamps();

            $table->foreign('author_id')->on('users')
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
        Schema::dropIfExists('transports');
    }
}
