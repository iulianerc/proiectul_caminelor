<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserFilesTable extends Migration
{
    public function up(): void
    {
        Schema::create('user_files', static function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')
                ->on('users')
                ->references('id')
                ->onDelete('RESTRICT');
            $table->string('file_type', 20)->default('unknown');
            $table->enum('status', ['new', 'confirmed', 'rejected'])->default('new');
            $table->unsignedInteger('performed_by')->nullable();
            $table->foreign('performed_by')
                ->on('users')
                ->references('id')
                ->onDelete('RESTRICT');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_files');
    }
}
