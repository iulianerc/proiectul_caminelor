<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemVariableBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_variable_books', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Denumirea variabilei');
            $table->string('alias')->comment('Alias variabilă de sistem');
            $table->string('value_ro')->comment('Valoarea care va fi imprimată pe carnetul în limba RO');
            $table->string('value_en')->comment('Valoarea care va fi imprimată pe carnetul în limba EN');
            $table->string('value_ru')->comment('Valoarea care va fi imprimată pe carnetul în limba RU');
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
        Schema::dropIfExists('system_variable_books');
    }
}
