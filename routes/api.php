<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// migrate route
Route::get('/migrate', function () {
    Artisan::call('migrate', ['--force' => true]);
    return "Migration successful!";


// Admin APIs
Route::apiResource('projects', \App\Http\Controllers\Api\ProjectController::class);
Route::apiResource('skills', \App\Http\Controllers\Api\SkillsController::class);
Route::apiResource('resumes', \App\Http\Controllers\Api\ResumeController::class);
