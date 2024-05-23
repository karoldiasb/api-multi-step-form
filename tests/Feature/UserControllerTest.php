<?php

namespace Tests\Feature;

use App\Models\AdOn;
use App\Models\Plan;
use App\Models\PlanType;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_user_successfully(): void
    {
        $plan = Plan::factory()->create();
        $planType = PlanType::factory()->create();
        $adOn = AdOn::factory()->create([
            'plan_id' => $plan->id,
            'plan_type_id' => $planType->id
        ]);

        $newUser = User::factory()->make()->toArray();

        $newUser['ad_on_ids'] = [$adOn->id];

        $response = $this->postJson('/api/users', $newUser);

        $response->assertStatus(Response::HTTP_CREATED);

        $responseJson = [
            'success' => true,
            "msg" => "user created"
        ];

        $response->assertExactJson($responseJson);
    }

    public function test_create_user_with_no_data(): void
    {
        $newUser = [];

        $response = $this->postJson('/api/users', $newUser);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);

        $responseJson = [
            'data' => [
                'ad_on_ids' => [
                    "The ad on ids field is required."
                ],
                'email' => [
                    "The email field is required."
                ],
                'name' => [
                    "The name field is required."
                ],
                'phone' => [
                    "The phone field is required."
                ],
            ],
            "message" => "Validation errors"
        ];

        $response->assertExactJson($responseJson);
    }
}
