<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipmentLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipment_locations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('shipment_id');
            $table->bigInteger('customer_id');
            $table->string('form');
            $table->string('to');
//            $table->decimal('bid_price',11,2);
            $table->string('rate_confirmation')->nullable();
            $table->string('bill_of_lading')->nullable();
            $table->string('proof_of_delivery')->nullable();
            $table->string('load');
            $table->date('pickup_date');
            $table->time('pickup_time');
            $table->date('delivery_date');
            $table->time('delivery_time');
            $table->bigInteger('driver_id');
            $table->bigInteger('distance')->comment('unit=meter');
            $table->bigInteger('distance_reach_time')->comment('unit=second');
            $table->string('delivery_time_txt')->nullable();
            $table->text('notes')->nullable();
            $table->decimal('from_lat',11,8)->nullable();
            $table->decimal('from_lng',11,8)->nullable();
            $table->decimal('to_lat',11,8)->nullable();
            $table->decimal('to_lng',11,8)->nullable();

            $table->date('actual_pickup_date')->nullable();
            $table->time('actual_pickup_time')->nullable();
            $table->date('actual_delivery_date')->nullable();
            $table->time('actual_delivery_time')->nullable();


            $table->decimal('actual_rent',11,2)->default(0)->nullable();
            $table->decimal('actual_insurance',11,2)->default(0)->nullable();
            $table->decimal('actual_gas',11,2)->default(0)->nullable();
            $table->decimal('actual_dispatch',11,2)->default(0)->nullable();
            $table->decimal('actual_factoring',11,2)->default(0)->nullable();


            $table->string('to_place_id')->nullable();
            $table->tinyInteger('status')->default(1)->comment('1=active,0=inactive');
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
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
        Schema::dropIfExists('shipment_locations');
    }
}
