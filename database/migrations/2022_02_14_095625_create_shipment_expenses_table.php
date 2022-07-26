<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipmentExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('shipment_expenses', function (Blueprint $table) {
            $table->id();
            $table->integer('shipment_id');
            $table->decimal('insurance_per_day',11,3)->comment('unit=$');
            $table->decimal('truck_per_day',11,3)->comment('unit=$');
            $table->decimal('truck_per_mile_cost',11,3)->comment('unit=$');
            $table->decimal('dispatch_bid_percentage',11,3);
            $table->decimal('factoring_bid_percentage',11,3);
            $table->decimal('driver_profit_percentage',11,3);
            $table->decimal('per_gallon_gas_price',11,3)->nullable()->comment('unit=$');


            $table->decimal('driver_fixed_pay',11,3)->nullable()->comment('unit=$');
            $table->decimal('driver_per_mile_pay',11,3)->nullable()->comment('unit=$');
            $table->decimal('driver_percentage_revenue',11,3)->nullable()->comment('unit=$');
            $table->integer('driver_pay_status')->nullable()->comment('1="Per Mile" 2=% of revenue 3=% of profit 4=Fixed');
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
        Schema::dropIfExists('shipment_expenses');
    }
}
