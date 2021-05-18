<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['physical', 'juridical'])->comment('Type of the beneficiary');
            $table->string('idno', 13)->comment('IDNP or IDNO');
            $table->string('name', 100)->comment('Name of the beneficiary');
            $table->string('administrator_name', 50)->nullable()->comment('Name of the administrator');
            $table->string('vat_code')->nullable()->comment('TVA code of the juridical person');
            $table->string('identity_card')->nullable()->comment('Identity card number');
            $table->date('identity_card_date')->nullable()->comment('Card issuing date');
            $table->string('identity_card_issued', 100)->nullable()->comment('Issued by');
            $table->string('address_ro', 100)->nullable();
            $table->string('address_en', 100)->nullable();
            $table->string('address_ru', 100)->nullable();
            $table->string('address_home', 100)->nullable();
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
        Schema::dropIfExists('clients');
    }
}
