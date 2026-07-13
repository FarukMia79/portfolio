<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;


Route::get('/run-migrate', function () {
    Artisan::call('migrate --force');
    return "Database migrated successfully!";
});

Route::get('/run-seed', function () {
    Artisan::call('db:seed --force');
    return "Admin Data Seeded Successfully!";
});

Route::get('/run-sql', function () {
    try {
        DB::statement('ALTER TABLE projects ADD COLUMN github_link VARCHAR(255) NULL;');
        DB::statement('ALTER TABLE projects ADD COLUMN live_demo_link VARCHAR(255) NULL;');
        return "Columns added successfully via RAW SQL!";
    } catch (\Exception $e) {
        return "Error: " . $e->getMessage();
    }
});





Route::get('/', function () {
    return view('welcome');
});

Route::get('{any}', function () {
    return view('welcome'); 
})->where('any', '.*');