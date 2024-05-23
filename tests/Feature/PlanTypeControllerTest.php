<?php

namespace Tests\Feature;

use App\Models\PlanType;
use Illuminate\Http\Response;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PlanTypeControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_returns_all_plan_types_successfully(): void
    {
        PlanType::factory()->create();

        $response = $this->json('GET', '/api/plan-types');

        $response->assertStatus(Response::HTTP_OK);

        $response->assertJsonCount(1, 'data');
    }
}
