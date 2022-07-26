<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->string('driver_name');
            $table->string('email');
            $table->string('mobile');
            $table->string('vehicle_number');
            $table->string('gas_card_number');
            $table->decimal('profit_percentage',11,3)->nullable();
            $table->decimal('	fixed',11,3)->nullable();
            $table->decimal('per_mile',11,3)->nullable();
            $table->decimal('percentage_revenue',11,3)->nullable();
            $table->integer('	pay_status')->comment('	1="Per Mile" 2=% of revenue 3=% of profit 4=Fixed');
            $table->tinyInteger('email_status')->default(0)->comment('0=not_send 1=email_send');
            $table->tinyInteger('status')->default(1)->comment('1=active,0=inactive');
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drivers');
    }
}
