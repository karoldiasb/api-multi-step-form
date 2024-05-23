<?php

namespace Tests\Feature;

use App\Models\Plan;
use Illuminate\Http\Response;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PlanControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_returns_all_plans_successfully(): void
    {
        Plan::factory()->create();

        $response = $this->json('GET', '/api/plans');

        $response->assertStatus(Response::HTTP_OK);

        $response->assertJsonCount(1, 'data');
    }
}
