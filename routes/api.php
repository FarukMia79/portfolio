<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\SkillsController;
use App\Http\Controllers\Api\ResumeController;


// Public Routes
Route::get('projects', [ProjectController::class, 'index']);
Route::get('projects/{project}', [ProjectController::class, 'show']);
Route::get('skills', [SkillsController::class, 'index']);
Route::get('resumes', [ResumeController::class, 'index']);

Route::post('/login', [AuthController::class, 'login']);

// Admin Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::apiResource('projects', ProjectController::class)->except(['index', 'show']);
    Route::apiResource('skills', SkillsController::class)->except(['index']);
    Route::apiResource('resumes', ResumeController::class)->except(['index']);
});