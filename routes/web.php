<?php

use Illuminate\Support\Facades\Route;
use App\Filament\App\Pages\Auth\Register;
use App\Http\Controllers\PreRegisterController;

Route::group(['middleware' => 'redirect.if.not.installed'], function () {
    Route::get('register', Register::class)
        ->name('filament.app.auth.register')
        ->middleware('signed');
});

Route::get('/pre-register/{company:uuid}', [PreRegisterController::class, 'view']);
Route::post('/pre-register/{company:uuid}', [PreRegisterController::class, 'store'])->name('pre-register.store');
