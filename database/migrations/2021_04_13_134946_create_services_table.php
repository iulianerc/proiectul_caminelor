<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->enum('person_type', ['physical', 'juridical' ,'both'])->comment('Person that can take advantage of this service');
            $table->string('alias', 100)->comment('Service alias');
            $table->text('name_en')->comment('Service en name');
            $table->text('name_ro')->comment('Service ro name');
            $table->text('name_ru')->comment('Service ru name');
            $table->boolean('default')->default(0)->comment('Show if service is default');
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
        Schema::dropIfExists('services');
    }
}
