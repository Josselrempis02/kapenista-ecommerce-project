<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\ForgotPasswordController;

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
    return view('index');
});

//User Controller 
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/signup', [UserController::class, 'signup']);

Route::get('auth/google', [UserController::class, 'redirectToGoogle'])->name('login.google');
Route::get('auth/google/callback', [UserController::class, 'handleGoogleCallback']);

// Create New User
Route::post('/users', [UserController::class, 'store']);
// logout
Route::get('/logout', [UserController::class, 'logout'])->middleware('auth');
// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

//Showing shop pages 
Route::get('/shop', [ShopController::class, 'shop'])->middleware('auth');


// Show the form to request a password reset link
Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');

// Handle the form submission and send the reset link
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// Show the form to reset the password
Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');

// Handle the password reset
Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
