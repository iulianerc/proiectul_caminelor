<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateDefaultProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('default_profiles', static function (Blueprint $table) {
            $table->unsignedInteger('user_id')->primary()->comment('User Id');
            $table->foreign('user_id')
                ->on('users')
                ->references('id')
                ->onDelete('RESTRICT');

            /**
             * Personal tab
             */
            $table->string('first_name')->nullable()->comment('First name');
            $table->string('middle_name')->nullable()->comment('Middle name');
            $table->string('last_name')->nullable()->comment('Last name');
            $table->string('nick_name')->nullable()->comment('Nick name');
            $table->date('birth_date')->nullable()->comment('Date of birth');
            $table->text('biography')->nullable()->comment('Biography');
            $table->string('city', 50)->nullable()->comment('City');
            $table->string('street', 200)->nullable()->comment('Mailing address');
            $table->string('apartment', 20)->nullable()->comment('Apartment');
            $table->string('house', 100)->nullable()->comment('House');
            $table->string('zip', 20)->nullable()->comment('Postal code');

        });

        DB::statement("ALTER TABLE default_profiles comment 'Default profiles'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('default_profiles');
    }
}
