<?php

use Illuminate\Support\Facades\Route;
use App\Filament\App\Pages\Auth\Register;
use App\Http\Controllers\PreRegisterController;
use App\Http\Controllers\QRCodeController;
use App\Livewire\CheckIn;

Route::group(['middleware' => 'redirect.if.not.installed'], function () {
    Route::get('register', Register::class)
        ->name('filament.app.auth.register')
        ->middleware('signed');
});

Route::get('/pre-register/{company:uuid}', [PreRegisterController::class, 'view']);
Route::post('/pre-register/{company:uuid}', [PreRegisterController::class, 'store'])->name('pre-register.store');
Route::get('/company/check-in/{company:uuid}', [PreRegisterController::class, 'checkIn'])->name('company.check-in');
Route::get('/generate-qrcode', [QRCodeController::class, 'generate']);

Route::view('/scan', 'filament.qrcode');
Route::view('/scanner', 'filament.scanner');
Route::post('/comapny/qr-login', [QRCodeController::class, 'login'])->name('qrcode.login');
