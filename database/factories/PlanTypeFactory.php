<?php

namespace Database\Factories;

use App\Models\PlanType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PlanType>
 */
class PlanTypeFactory extends Factory
{
    protected $model = PlanType::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description' => $this->faker->sentence(),
            'created_at' => now()
        ];
    }
}
