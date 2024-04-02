<?php

use App\Http\Controllers\Api\AdOnController;
use App\Http\Controllers\Api\PlanController;
use App\Http\Controllers\Api\PlanTypeController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/users', [UserController::class, 'store']);
Route::get('/plans', [PlanController::class, 'index']);
Route::get('/ad-ons', [AdOnController::class, 'index']);
Route::get('/plan-types', [PlanTypeController::class, 'index']);
