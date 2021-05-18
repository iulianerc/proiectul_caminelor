<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderGuaranteesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_guarantees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id')->comment('Link with clients table');
            $table->unsignedBigInteger('order_id')->comment('Link with orders table');
            $table->unsignedDecimal('sum', 10, 2)->comment('Amount of guarantee');
            $table->enum('type', ['bank_deposit', 'guaranty_letter'])->comment('Type of guaranty');
            $table->enum('status', ['new', 'confirmed', 'canceled'])->comment('Guaranty status');
            $table->timestamps();

            $table->foreign('client_id')
                ->references('id')
                ->on('clients')
                ->onDelete('RESTRICT');
            $table->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_guarantees');
    }
}
