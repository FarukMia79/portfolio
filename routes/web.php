<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::get('/migrate', function () {
    try {
      
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        Artisan::call('cache:clear');
        
        Artisan::call('migrate', ['--force' => true]);
        
        return "Everything is cleared and Migration is successful! <br><br> Output: " . Artisan::output();
    } catch (\Exception $e) {
        return "Error: " . $e->getMessage();
    }
});

Route::get('/', fn() => view('welcome'));

Route::get('{any}', fn() => view('welcome'))->where('any', '.*');