<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{

    public function up(): void
    {
        Schema::create('users', static function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->uuid('uuid')->unique()->comment('Уникальный идентификатор');
            $table->string('name', 255)->comment('Имя');
            $table->string('email', 255)->unique()->comment('Email');
            $table->dateTime('email_verified_at')->nullable()->comment('Время проверки емейла');
            $table->dateTime('password_changed_at')->nullable()->comment('Время последней смены пароля');
            $table->boolean('password_expired')->comment('Флаг что пароль просрочен');
            $table->string('password', 255)->comment('Пароль');
            $table->string('remember_token', 100)->nullable()->comment('Токен');
            $table->boolean('is_active');
            $table->unsignedInteger('author_id')->nullable()->comment('ID роли пользователя');
            $table->timestamps();
        });

        Schema::table('users', static function (Blueprint $table) {
            $table->foreign('author_id')
                ->references('id')
                ->on('users')
                ->onDelete('RESTRICT');
        });

    }

    public function down(): void
    {
        Schema::drop('users');
    }

}
