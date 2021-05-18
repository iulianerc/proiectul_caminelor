<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up ()
    {
        Schema::create('order_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id')->comment('Link with order table');
            $table->unsignedInteger('sum')->comment('To to pay');
            $table->unsignedTinyInteger('payment_method_id');
            $table->string('comments')->nullable()->comment('Comment');
            $table->unsignedInteger('author_id');
            $table->timestamps();

            $table->foreign('author_id')
                ->references('id')
                ->on('users')
                ->onDelete('RESTRICT');
            $table->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onDelete('RESTRICT');
            $table->foreign('payment_method_id')
                ->references('id')
                ->on('payment_methods')
                ->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down ()
    {
        Schema::dropIfExists('order_payments');
    }
}
