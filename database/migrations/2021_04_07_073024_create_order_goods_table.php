<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class  CreateOrderGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_goods', function (Blueprint $table) {
            $table->id();

            $table->string('name', 255)->comment('Name');
            $table->decimal('quantity', 6, 2)->comment('Count for Goods'); //0000.00
            $table->decimal('size', 6, 2)->comment('Size for Goods'); //0000.00
            $table->decimal('price_currency', 8, 4)->comment('Price currency'); //0000.0000
            $table->decimal('price',  13, 4)->comment('Price'); //0000.0000
            $table->unsignedBigInteger('order_id')->comment('Relationship for Order');
            $table->unsignedBigInteger('good_id')->nullable()->comment('Relationship for Good');
            $table->unsignedBigInteger('origin_country_id')->comment('Relationship for County');

            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('good_id')->references('id')->on('goods');
            $table->foreign('origin_country_id')->references('id')->on('countries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_goods');
    }
}
