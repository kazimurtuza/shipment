<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alerts', function (Blueprint $table) {
            $table->id();
            $table->string('tracking_mail');
            $table->string('agent_mail');
            $table->integer('customer_id');
            $table->integer('shipment_id');
            $table->tinyInteger('alert_for')->comment('1=Pickup,2=Delivery');
            $table->tinyInteger('alert_file')->comment('1=Bill of Lading,2=Proof of Delivery');
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
        Schema::dropIfExists('alerts');
    }
}
