<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipmentcancelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipmentcancels', function (Blueprint $table) {
            $table->id();
            $table->char('reason');
            $table->integer('is_requestsend')->default(0)->nullable();
            $table->integer('shipment_id');
            $table->decimal('amount',11,3)->nullable();
            $table->text('note')->nullable();
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
        Schema::dropIfExists('shipmentcancels');
    }
}
