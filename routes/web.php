<?php

use Illuminate\Support\Facades\Route;
use App\Filament\App\Pages\Auth\Register;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('register', Register::class)
    ->name('filament.app.auth.register')
    ->middleware('signed');
