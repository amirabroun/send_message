<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\SendController;
use App\Http\Controllers\MessageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/user', function () {
    return view('user');
})->name('user');

Route::get('/admin', [PhoneController::class, 'index'])->name('admin');

Route::get('/message', [MessageController::class, 'index'])->name('messages');

Route::post('/message', [MessageController::class, 'messageRequest'])->name('selectMessage');

Route::get('/verify', [SendController::class, 'verifyCode'])->name('verify');
