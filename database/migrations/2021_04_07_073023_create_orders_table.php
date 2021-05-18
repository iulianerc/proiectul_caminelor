<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->string('number', 13)->nullable()->unique()->comment('Number of request, in this format: ATA-{day: 05}{month: 01}{year: 21}-{number of carnet for today: 09(max: 99)}');
            $table->enum('carnet_type', ['original', 'copy', 'replacement'])->comment('Type of carnet it may exist in 3 form original, copy, extended');
            $table->enum('release_mode', ['normal', 'urgent'])->comment('Release mode, can be normal or urgent');
            $table->string('carnet_number', 10)->nullable()->unique()->comment('Number of carnet, the number is given after confirmation');
            $table->unsignedBigInteger('parent_carnet_id')->nullable()->comment('ID of parent carnet, if this carnet was extended');
            $table->enum('language', ['ro', 'en', 'ru'])->default('en')->comment('Carnet language, exist in 3 variants ro, en, ru');
            $table->tinyInteger('outputs')->comment('Number of carnets ata given for export, import, reexport, reimport');
            $table->date('valid_from')->comment('Date when the ata carnet was created');
            $table->date('valid_to')->comment('Date when the ata carnet will become invalid');
            $table->enum('source', ['operator', 'client'])->comment('Request for ata carnet source');
            $table->unsignedBigInteger('status_id')->default(1)->comment('State id of the ata carnet');
            $table->unsignedBigInteger('client_id')->comment('Client id');
            $table->string('client_delegate', 50)->comment('Name of the delegate'); // todo ( length: 50 ) ?
            $table->boolean('tax_payed')->default(0)->comment('Is payed tax for ata carnet issue');
            $table->boolean('guaranty_payed')->default(0)->comment('Is payed the guaranty for goods');
            $table->boolean('guaranty_required')->default(1)->comment('Is necessary to add guaranty in receipt');
            $table->unsignedSmallInteger('data_edit_count')->default(1)->comment('Count of edits');
            $table->boolean('is_ata_exposition')->default(0)->comment('Is for ata exposition');
            $table->decimal('required_guaranty_sum', 10, 2)->comment('Guarantee sum that need to be payed');
            $table->unsignedBigInteger('purpose_id')->comment('Id for purpose of use table');
            $table->string('purpose_description')->comment('Description for purpose of use, may be edited');
            $table->string('measure_unit', 2)->default('kg')->comment('Measure unit');
            $table->unsignedBigInteger('currency_id')->comment('Id of currency');
            $table->decimal('exchange_rate', 7, 4)->comment('Exchange rate selected in ata carnet');
            $table->unsignedBigInteger('authorized_person_id')->comment('Authorized person name');
            $table->string('package_description')->comment('Package description');
            $table->unsignedBigInteger('transport_category_id')->comment('Transport category name');
            $table->string('transport_description')->nullable()->comment('Description for transport, may be edited');
            $table->unsignedInteger('manager_id')->comment('Id of manager that evaluate this request');
            $table->date('date_released')->nullable()->comment('Date released');

            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('parent_carnet_id')->references('id')->on('orders');
            $table->foreign('purpose_id')->references('id')->on('purposes_of_uses');
            $table->foreign('status_id')->references('id')->on('order_statuses');
            $table->foreign('currency_id')->references('id')->on('currencies');
            $table->foreign('authorized_person_id')->references('id')->on('authorized_persons');
            $table->foreign('transport_category_id')->references('id')->on('transports');
            $table->foreign('manager_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');

    }
}
