<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRelationsTable extends Migration
{
    public function up(): void
    {
        Schema::create('user_relations', static function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')
                ->on('users')
                ->references('id')
                ->onDelete('CASCADE');
            $table->unsignedInteger('parent_id');
            $table->foreign('parent_id')
                ->on('users')
                ->references('id')
                ->onDelete('CASCADE');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_relations');
    }
}
