<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\SendController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/user', function () {
    return view('user');
})->name('user');

Route::get('/verify', [SendController::class, 'verifyCode'])->name('verify');



/*

Route::get('/user/{name}', [PhoneController::class, 'query'])->where('name', '[a-zA-Z]+');


Route::post('/', function () {
    return view('home');
});

Route::get('/name', function () {
    return response()->json(['amir', 'ssadegh', 'mosi']);
});


Route::get('/auth', function () {
    return view('auth.login');
});

Route::get('/phone/{phone}', [PhoneController::class, 'show']);

Route::GET('/verify', [SendController::class => 'verifyCode']);
Route::get('/user/{phone}', [PhoneController::class, 'query'])->where('phone', '[0-9]+');
Route::get('/user/{phone}/{name}', [PhoneController::class, 'query'])->where([
    'phone' => '[0-9]+', // not work
    'name' => '[a-zA-Z]+'
]);
Route::get('/user', function () {
    return view('user');
});

*/