<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('alias', 50)->comment('OrderService method Alias');
            $table->string('name_ro', 50)->comment('Romanian name');
            $table->string('name_en',50)->comment('English name');
            $table->string('name_ru',50)->comment('Russian name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_methods');
    }
}
