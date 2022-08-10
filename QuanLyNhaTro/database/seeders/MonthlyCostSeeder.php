<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class MonthlyCostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('monthly_costs')->insert([
            'name' => 'Tiền rác',
        ]);
        DB::table('monthly_costs')->insert([
            'name' => 'Tiền điện',
        ]);
        DB::table('monthly_costs')->insert([
            'name' => 'Tiền mạng',
        ]);
    }
}
