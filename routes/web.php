<?php

use Illuminate\Support\Facades\Route;
use App\Filament\App\Pages\Auth\Register;

Route::group(['middleware' => 'redirect.if.not.installed'], function () {
    Route::get('register', Register::class)
        ->name('filament.app.auth.register')
        ->middleware('signed');
});
