<?php

namespace Database\Factories;

use App\Models\AdOn;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AdOn>
 */
class AdOnFactory extends Factory
{
    protected $model = AdOn::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->sentence(),
            'value' => $this->faker->randomFloat(),
            'plan_id' => 1,
            'plan_type_id' => 1,
            'created_at' => now()
        ];
    }
}
