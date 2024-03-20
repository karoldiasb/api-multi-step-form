<?php

use App\Http\Controllers\Api\AdOnController;
use App\Http\Controllers\Api\PlanController;
use App\Http\Controllers\Api\PlanTypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/plans', [PlanController::class, 'index']);
Route::get('/ad-ons', [AdOnController::class, 'index']);
Route::get('/plan-types', [PlanTypeController::class, 'index']);

