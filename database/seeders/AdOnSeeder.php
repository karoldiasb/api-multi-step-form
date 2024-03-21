<?php

namespace Database\Seeders;

use App\Models\AdOn;
use Illuminate\Database\Seeder;

class AdOnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adsOn = [];
        $i = 0;
        $plan_id = 1;
        $multiplicator = 1;
        while($i < 3){
            $adsOn[] = [
                'title' => 'Online service',
                'description' => 'Access to multiplayer games',
                'value' => 1 * $multiplicator,
                'plan_id' => $plan_id,
                'plan_type_id' => 1
            ];
            $adsOn[] = [
                'title' => 'Larger storage',
                'description' => 'Extra 1TB of cloud save',
                'value' => 2 * $multiplicator,
                'plan_id' => $plan_id,
                'plan_type_id' => 1
            ];
            $adsOn[] = [
                'title' => 'Customize profile',
                'description' => 'Custom theme on your profile',
                'value' => 2 * $multiplicator,
                'plan_id' => $plan_id,
                'plan_type_id' => 1
            ];
            $adsOn[] = [
                'title' => 'Online service',
                'description' => 'Access to multiplayer games',
                'value' => 10 * $multiplicator,
                'plan_id' => $plan_id,
                'plan_type_id' => 2
            ];
            $adsOn[] = [
                'title' => 'Larger storage',
                'description' => 'Extra 1TB of cloud save',
                'value' => 20 * $multiplicator,
                'plan_id' => $plan_id,
                'plan_type_id' => 2
            ];
            $adsOn[] = [
                'title' => 'Customize profile',
                'description' => 'Custom theme on your profile',
                'value' => 20 * $multiplicator,
                'plan_id' => $plan_id,
                'plan_type_id' => 2
            ];
            $i++;
            $plan_id+= 1;
            $multiplicator+=1;
        }

        foreach ($adsOn as $adOn) {
            AdOn::create($adOn);
        }
    }
}
