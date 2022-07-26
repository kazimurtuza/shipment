<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->decimal('dispatch_bid_percentage',11,2)->default(12);
            $table->decimal('factoring_bid_percentage',11,2)->default(4.5);
            $table->decimal('insurance_per_day',11,2)->default(12)->comment('unit=$');
            $table->decimal('truck_per_day',11,2)->default(92)->comment('unit=$');
            $table->decimal('truck_per_mile_cost',11,2)->default(0.15)->comment('unit=$');
            $table->decimal('per_gallon_gas_price',11,2)->default(4)->comment('unit=gallon');

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
        Schema::dropIfExists('expenses');
    }
}
