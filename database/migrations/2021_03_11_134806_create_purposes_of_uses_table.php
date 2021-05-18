<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurposesOfUsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purposes_of_uses', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Denumirea anexei');
            $table->string('description_ro')->comment('Descrierea anexei în limba română');
            $table->string('description_en')->comment('Descrierea anexei în limba engleză');
            $table->string('description_ru')->comment('Descrierea anexei în limba rusă');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purposes_of_uses');
    }
}
