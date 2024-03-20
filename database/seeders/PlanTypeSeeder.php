<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
                'created_at' => Carbon::now()
            ],
            [
                'description' => 'Yearly',
                'created_at' => Carbon::now()
            ],
        ];

        DB::table('plan_types')->insert($plan_types);
    }
}
