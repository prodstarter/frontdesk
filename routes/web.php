<?php

use Illuminate\Support\Facades\Route;
use App\Filament\App\Pages\Auth\Register;
use App\Http\Controllers\CheckInController;
use App\Http\Controllers\PreRegisterController;
use App\Http\Controllers\QRCodeController;
use App\Livewire\CheckIn;
use App\Livewire\PreRegister;

Route::group(['middleware' => 'redirect.if.not.installed'], function () {
    Route::get('register', Register::class)
        ->name('filament.app.auth.register')
        ->middleware('signed');
});

// Route::get('/pre-register/{company:uuid}', PreRegister::class);
Route::get('/pre-register/{company:uuid}', [PreRegisterController::class, 'view']);
Route::post('/pre-register/{company:uuid}', [PreRegisterController::class, 'store'])->name('pre-register.store');

Route::get('/company/{company:uuid}/check-in/{pre-user-id}', [CheckInController::class, 'create'])->name('check-in.create');
Route::post('/company/{company:uuid}/check-in', [CheckInController::class, 'store'])->name('check-in.store');

Route::get('/company/qr-login/{company:uuid}', [QRCodeController::class, 'create'])->name('qrcode.create');
Route::post('/comapny/qr-login', [QRCodeController::class, 'store'])->name('qrcode.store');
