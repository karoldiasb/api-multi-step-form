<?php

namespace Tests\Feature;

use App\Models\AdOn;
use App\Models\Plan;
use App\Models\PlanType;
use Illuminate\Http\Response;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdOnControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_returns_ad_ons_with_no_request_params_successfully(): void
    {
        $plan = Plan::factory()->create();
        $planType = PlanType::factory()->create();
        AdOn::factory()->create([
            'plan_id' => $plan->id,
            'plan_type_id' => $planType->id
        ]);

        $response = $this->json('GET', '/api/ad-ons');

        $response->assertStatus(Response::HTTP_OK);

        $response->assertJsonCount(1, 'data');
    }

    public function test_returns_ad_ons_based_on_request_params_successfully(): void
    {
        $plan = Plan::factory()->create();
        $planType = PlanType::factory()->create();
        $adOn = AdOn::factory()->create([
            'plan_id' => $plan->id,
            'plan_type_id' => $planType->id
        ]);

        $request = [
            'plan_id' => $adOn->plan_id,
            'plan_type_id' => $adOn->plan_id,
        ];

        $response = $this->json('GET', '/api/ad-ons', $request);

        $response->assertStatus(Response::HTTP_OK);

        $response->assertJsonCount(1, 'data');
    }

     /**
     * A basic feature test example.
     */
    public function test_ad_ons_based_on_invalid_request_plan_type_id_param(): void
    {
        $plan = Plan::factory()->create();
        $planType = PlanType::factory()->create();
        AdOn::factory()->create([
            'plan_id' => $plan->id,
            'plan_type_id' => $planType->id
        ]);

        $request = [
            'plan_id' => 3,
            'plan_type_id' => 10,
        ];

        $response = $this->json('GET', '/api/ad-ons', $request);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);

        $responseJson = [
            'data' => [
                'plan_type_id' => [
                    'The selected plan type id is invalid.'
                ]
            ],
            'message' => 'Validation errors'
        ];

        $response->assertExactJson($responseJson);
    }

    /**
     * A basic feature test example.
     */
    public function test_ad_ons_based_on_invalid_request_plan_id_param(): void
    {
        $plan = Plan::factory()->create();
        $planType = PlanType::factory()->create();
        AdOn::factory()->create([
            'plan_id' => $plan->id,
            'plan_type_id' => $planType->id
        ]);

        $request = [
            'plan_id' => 3,
        ];

        $response = $this->json('GET', '/api/ad-ons', $request);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);

        $responseJson = [
            'data' => [
                'plan_id' => [
                    'The selected plan id is invalid.'
                ]
            ],
            'message' => 'Validation errors'
        ];

        $response->assertExactJson($responseJson);
    }
}
