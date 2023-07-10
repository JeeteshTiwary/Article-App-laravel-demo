<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthenticationController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('article', ArticleController::class);
});

require __DIR__ . '/auth.php';

Route::get('/authentication/request', function () {
    return view('authentication.sendOTP');
})->middleware(['auth', 'verified']);

Route::controller(AuthenticationController::class)->prefix('authentication')->name('authentication.')->group(function () {
    Route::get('/verification', 'verifyOTP');
    Route::post('/request', 'sendOTP')->name('request');
    Route::post('/verification', 'verifyOTP')->name('verify');
    Route::post('/password', 'verifyPassword')->name('password');
});