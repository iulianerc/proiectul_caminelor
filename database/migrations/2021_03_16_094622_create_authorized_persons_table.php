<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorizedPersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authorized_persons', function (Blueprint $table) {
            $table->id();
            $table->string('name_en')->comment('Name EN');
            $table->string('name_ro')->comment('Name RO');
            $table->string('name_ru')->comment('Name RU');
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
        Schema::dropIfExists('authorized_persons');
    }
}
