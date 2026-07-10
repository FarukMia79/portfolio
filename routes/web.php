<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;


Route::get('/run-migrate', function () {
    Artisan::call('migrate --force');
    return "Database migrated successfully!";
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('{any}', function () {
    return view('welcome'); 
})->where('any', '.*');