<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDocumentsTable extends Migration
{
    public function up()
    {
        Schema::create('order_documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id')->comment('Id of order');
            $table->string('number', 20)->nullable()->comment('Document number');
            $table->string('file_type')->comment('Document type');
            $table->date('date')->nullable()->comment('Date when the document was added');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_documents');
    }
}
