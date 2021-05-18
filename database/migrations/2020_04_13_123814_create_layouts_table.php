<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateLayoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('layouts', static function (Blueprint $table) {
            $table->smallIncrements('id')->comment('Id');
            $table->string('name', 50)->comment('Layout name');
            $table->string('path', 200)->comment('Path in project to layout');
            $table->boolean('is_active')->default(1)->comment('Layout status (1 = active, 0 = hidden)');
            $table->unsignedInteger('author_id')->comment('Author of the record');
            $table->foreign('author_id')
                ->on('users')
                ->references('id')
                ->onDelete('RESTRICT');
            $table->unique(['name', 'path']);
            $table->timestamps();
        });

        DB::statement("ALTER TABLE layouts comment 'List of all templates registered in system'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('layouts');
    }
}
