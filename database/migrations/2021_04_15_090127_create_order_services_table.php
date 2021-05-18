<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('quantity')->default(1)->comment('Show how many services of it type was included');
            $table->integer('sum_no_vat')->comment('Sum without vat');
            $table->integer('sum_with_vat')->comment('Sum with vat');
            $table->unsignedBigInteger('order_id')->comment('Relationship with order');
            $table->unsignedBigInteger('service_id')->comment('Relationship with services');
            $table->unsignedInteger('author_id')->comment('Relationship with user');
            $table->timestamps();

            $table->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onDelete('RESTRICT');
            $table->foreign('service_id')
                ->references('id')
                ->on('services')
                ->onDelete('RESTRICT');
            $table->foreign('author_id')
                ->references('id')
                ->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_services');
    }
}
