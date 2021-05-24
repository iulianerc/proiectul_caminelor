<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHostelRentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hostel_rents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hostel_id');
            $table->unsignedBigInteger('resident_id');
            $table->unsignedBigInteger('room_category_id');
            $table->timestamps();

            $table->foreign('hostel_id')->on('hostels')->references('id')->onDelete('RESTRICT');
            $table->foreign('resident_id')->on('residents')->references('id')->onDelete('RESTRICT');
            $table->foreign('room_category_id')->on('room_categories')->references('id')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hostel_rents');
    }
}
