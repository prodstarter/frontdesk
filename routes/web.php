<?php

use Illuminate\Support\Facades\Route;
use App\Filament\App\Pages\Auth\Register;
use App\Http\Controllers\CheckInController;
use App\Http\Controllers\PreRegisterController;
use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\WelcomeController;
use App\Livewire\CheckIn;
use App\Livewire\CreateCheckin;
use App\Livewire\CreatePreRegister;
use App\Livewire\CreateQRLogin;
use App\Livewire\PreRegister;
use App\Livewire\StoreCheckin;

Route::group(['middleware' => 'redirect.if.not.installed'], function () {
    Route::get('register', Register::class)
        ->name('filament.app.auth.register')
        ->middleware('signed');
});

Route::get('/', [WelcomeController::class, 'index']);

Route::get('/company/qr-login/{company:uuid}', [QRCodeController::class, 'create'])->name('qrcode.create');
Route::post('/comapny/qr-login', [QRCodeController::class, 'store'])->name('qrcode.store');

// Route::get('/company/qr-login/{company:uuid}', CreateQRLogin::class)->name('qrcode.create');

Route::get('/company/{company:uuid}/check-in/{preregistration:id}', CreateCheckin::class)->name('check-in.create');

Route::get('/pre-register/{company:uuid}', CreatePreRegister::class)->name('pre-register');
