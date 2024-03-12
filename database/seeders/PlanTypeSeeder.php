<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plan_types = [
            [
                'description' => 'Monthly',
            ],
            [
                'description' => 'Yearly',
            ],
        ];

        DB::table('plan_types')->insert($plan_types);
    }
}
