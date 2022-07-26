<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_type')->default(1)->comment('1=Broker,2=Shipper,3=Forwarder');
            $table->string('company_name');
            $table->string('mc_number');
            $table->string('tracking_email');
            $table->integer('process_type')->default(1)->comment('1=Factor,2=Quickpay,3=Direct');
            $table->tinyInteger('status')->default(1)->comment('1=active,0=inactive');
            $table->string('accounting_email')->nullable();
            $table->string('pay_percent')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('customers');
    }
}
