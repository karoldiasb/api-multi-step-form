<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdOnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ads_on = [
            [
                'title' => 'Online service',
                'description' => 'Access to multiplayer games',
                'value' => 1,
                'id_plan' => 1,
                'id_plan_type' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'title' => 'Larger storage',
                'description' => 'Extra 1TB of cloud save',
                'value' => 2,
                'id_plan' => 1,
                'id_plan_type' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'title' => 'Customize profile',
                'description' => 'Custom theme on your profile',
                'value' => 2,
                'id_plan' => 1,
                'id_plan_type' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'title' => 'Online service',
                'description' => 'Access to multiplayer games',
                'value' => 10,
                'id_plan' => 1,
                'id_plan_type' => 2,
                'created_at' => Carbon::now()
            ],
            [
                'title' => 'Larger storage',
                'description' => 'Extra 1TB of cloud save',
                'value' => 20,
                'id_plan' => 1,
                'id_plan_type' => 2,
                'created_at' => Carbon::now()
            ],
            [
                'title' => 'Customize profile',
                'description' => 'Custom theme on your profile',
                'value' => 20,
                'id_plan' => 1,
                'id_plan_type' => 2,
                'created_at' => Carbon::now()
            ],
        ];

        DB::table('ad_ons')->insert($ads_on);
    }
}
