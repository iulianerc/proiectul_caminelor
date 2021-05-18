<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->comment('First name and last name');
            $table->string('email', 50)->comment('Email');
            $table->enum('gender', ['m', 'f'])->comment('Gender m or f');
            $table->date('birthdate')->comment('Birthdate');
            $table->string('phones')->comment('Comma-separated phones');
            $table->char('idnp', 13)->comment('Identification number');
            $table->boolean('is_active')->default(true)->comment('Is active field');
            $table->timestamps();

            $table->unsignedInteger('user_id')->nullable()->comment('User');
            $table->foreign('user_id')
                ->on('users')
                ->references('id')
                ->onDelete('RESTRICT');

            $table->unsignedInteger('author_id')->comment('Author');
            $table->foreign('author_id')
                ->on('users')
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
        Schema::dropIfExists('employees');
    }
}
