<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_countries', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('order_id')->comment('Relationship for Order');
            $table->unsignedBigInteger('country_id')->comment('Relationship for County');
            $table->enum('scope', ['destination', 'transit'])->comment('Scope');

            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('country_id')->references('id')->on('countries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_countries');
    }
}
