<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plans = [
            [
                'title' => 'Arcade',
                'description' => '',
                'created_at' => Carbon::now()
            ],
            [
                'title' => 'Advanced',
                'description' => '',
                'created_at' => Carbon::now()
            ],
            [
                'title' => 'Pro',
                'description' => '',
                'created_at' => Carbon::now()
            ],
        ];

        DB::table('plans')->insert($plans);
    }
}
