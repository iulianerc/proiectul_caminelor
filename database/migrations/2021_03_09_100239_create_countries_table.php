<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('PackingCategory name');
            $table->string('code')->comment('PackingCategory code');
            $table->boolean('accept_ata')
                ->default(false)
                ->comment('Show if the ata carnet is supported');
            $table->timestamps();
            $table->unsignedInteger('author_id')->comment('Author');

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
        Schema::dropIfExists('countries');
    }
}
