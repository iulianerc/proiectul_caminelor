<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_receipts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id')->comment('Foreign key for orders table');
            $table->string('number', 13)->comment('Receipts number');
            $table->unsignedDecimal('sum', 10)->comment('Total sum to be payed');
            $table->date('date')->comment('Receipt date');
            $table->unsignedInteger('author_id')->comment('Author ID');
            $table->string('client_name', 50)->comment('Client name');
            $table->string('client_idno' ,13)->comment('Client idno');
            $table->json('cci_info')->comment('Json object with cci data when was saved receipts');
            $table->json('services')->comment('Json object with services data');
            $table->unsignedDecimal('guaranty_sum', 10, 2)->comment('Sum to be payed for guaranty');
            $table->timestamps();

            $table->foreign('author_id')
                ->on('users')
                ->references('id')
                ->onDelete('RESTRICT');
            $table->foreign('order_id')
                ->on('orders')
                ->references('id')
                ->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_receipts');
    }
}
