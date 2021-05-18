<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaidSumColumnInOrderServicesTable extends Migration
{
    public function up(): void
    {
        Schema::table('order_services', function (Blueprint $table) {
            $table->decimal('paid_sum', 10)->default(0);
        });
    }

    public function down(): void
    {
        Schema::table('order_services', function (Blueprint $table) {
            $table->dropColumn('paid_sum');
        });
    }
}
