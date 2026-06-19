<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Admin APIs
Route::apiResource('projects', \App\Http\Controllers\Api\ProjectController::class);
Route::apiResource('skills', \App\Http\Controllers\Api\SkillsController::class);
