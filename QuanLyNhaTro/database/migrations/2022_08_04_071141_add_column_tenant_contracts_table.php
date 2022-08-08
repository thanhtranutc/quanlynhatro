<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnTenantContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tenant_contracts', function (Blueprint $table) {
            $table->integer('water_number_start')->nullable();
            $table->integer('electricity_number_start')->nullable();
            $table->integer('water_pay_type')->nullable();
            $table->integer('electricity_pay_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tenant_contracts', function (Blueprint $table) {
            //
        });
    }
}
