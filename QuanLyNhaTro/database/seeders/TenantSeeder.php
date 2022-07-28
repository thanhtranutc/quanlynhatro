<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $limit = 10;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('tenants')->insert([
                'name' => $faker->name(10),
                'phone' => $faker->phoneNumber(),
                'email' => $faker->email(),
            ]);
        }
    }
}
