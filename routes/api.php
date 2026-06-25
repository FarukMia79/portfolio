<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\SkillsController;
use App\Http\Controllers\Api\ResumeController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\DashboardController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('projects', [ProjectController::class, 'index']);
Route::get('skills', [SkillsController::class, 'index']);
Route::get('resumes', [ResumeController::class, 'index']);
Route::post('contact-submit', [ContactController::class, 'store']);
Route::post('/login', [AuthController::class, 'login']);

/*
|--------------------------------------------------------------------------
| Admin Routes (Protected by Sanctum)
|--------------------------------------------------------------------------
*/
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/dashboard-stats', [DashboardController::class, 'index']);

    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/contact-messages', [ContactController::class, 'index']);
    Route::delete('/contact-messages/{id}', [ContactController::class, 'destroy']);
    Route::post('/contact-messages/{id}/reply', [ContactController::class, 'reply']);
    Route::post('/contact-messages/{id}/read', [ContactController::class, 'markAsRead']);

    Route::apiResource('projects', ProjectController::class)->except(['index', 'show']);
    Route::apiResource('skills', SkillsController::class)->except(['index']);
    Route::apiResource('resumes', ResumeController::class)->except(['index']);
});