<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::get('/migrate', function () {
    try {
        \Artisan::call('migrate', ['--force' => true]);
        return "Migration successful! <br><br> Output: " . \Artisan::output();
    } catch (\Exception $e) {
        return "Database Error: " . $e->getMessage();
    }
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('{any}', function () {
    return view('welcome'); 
})->where('any', '.*');