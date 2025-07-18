<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/run-migration', function(){
    Artisan::call('optimize::clear');
    Artisan::call('migrate:fresh --seed');

    return 'Migration successful!';
})

//require __DIR__.'/auth.php';
