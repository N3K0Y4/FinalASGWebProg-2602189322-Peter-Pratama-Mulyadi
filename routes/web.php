<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\FriendRequestController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.register');
});

Route::get('/register', [AuthenticationController::class, 'view_register']);
Route::post('/register', [AuthenticationController::class, 'register']);

Route::get('/login', [AuthenticationController::class, 'view_login']);
Route::post('/login', [AuthenticationController::class, 'login']);
Route::post('/logout', [AuthenticationController::class, 'logout']);

Route::get('/payment', [AuthenticationController::class, 'payment'])->name('payment');
Route::post('/update_paid', [AuthenticationController::class, 'update_paid'])->name('update_paid');
Route::get('/over_payment', [AuthenticationController::class, 'handle_overpayment'])->name('handle_overpayment');
Route::post('/over_payment', [AuthenticationController::class, 'process_overpayment'])->name('process_overpayment');

Route::middleware(['auth', 'paid'])->group(function () {
    // Route::get('/home', [AuthenticationController::class, 'view_home'])->name('home');

    Route::resource('/user', UserController::class);
    Route::resource('friend-request', FriendRequestController::class);
    Route::resource('friend', FriendController::class);
    Route::resource('message', MessageController::class);
});