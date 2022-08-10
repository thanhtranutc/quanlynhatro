<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractMonthlyCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_monthly_costs', function (Blueprint $table) {
            $table->id();
            $table->integer('pay_type');
            $table->integer('price');
            $table->integer('monthly_costs_id');
            $table->integer('tenant_contract_id');
            $table->timestamps();
        });

        Schema::create('contract_monthly_costs', function (Blueprint $table) {
            $table->foreign('monthly_costs_id')->references('id')->on('monthly_costs')->onDelete('cascade');
            $table->foreign('tenant_contract_id')->references('id')->on('tenant_contracts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contract_monthly_costs');
    }
}
