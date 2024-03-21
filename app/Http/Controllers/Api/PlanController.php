<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $plans = Plan::with('values', 'values.planType')->get();

        // dd($plans[0]);

        return response()->json([
            'data' => $plans,
            'total' => $plans->count(),
        ], 200);
    }
}
