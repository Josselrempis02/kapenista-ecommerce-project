<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\AdminResetPasswordController;
use App\Http\Controllers\AdminForgotPasswordController;

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

// Home Route
Route::get('/', function () {
    return view('index');
});

// ==================
// User Authentication Routes
// ==================

// Show the login page for users
Route::get('/login', [UserController::class, 'login'])->name('login');

// Show the signup page for new users
Route::get('/signup', [UserController::class, 'signup']);

// Handle Google OAuth login
Route::get('auth/google', [UserController::class, 'redirectToGoogle'])->name('login.google');

// Handle the callback after Google authentication
Route::get('auth/google/callback', [UserController::class, 'handleGoogleCallback']);

// Create a new user
Route::post('/users', [UserController::class, 'store']);

// Authenticate the user (log in)
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// Log out the user
Route::get('/logout', [UserController::class, 'logout'])->middleware('auth');

// ==================
// Shop Routes (Protected)
// ==================

// Show the shop page (only accessible by authenticated users)
Route::get('/shop', [ShopController::class, 'shop'])->middleware('auth');

// ==================
// Password Reset Routes
// ==================

// Show the form to request a password reset link
Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');

// Handle the form submission and send the reset link
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// Show the form to reset the password
Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');

// Handle the password reset
Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

// ==================
// Admin Authentication Routes
// ==================

// Show the admin login page
Route::get('admin/login', [AdminController::class, 'login']);

// Handle admin login
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin-login');

Route::post('/admin/login', [AdminController::class, 'store'])->name('admin');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin-logout');


// ==================
// Admin Authentication Routes
// 


// Show the form to request a password reset link for admins
Route::get('admin/forgot-password', [AdminForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.password.request');

// Handle the form submission and send the reset link to admins
Route::post('admin/forgot-password', [AdminForgotPasswordController::class, 'sendResetLinkEmail'])->name('admin.password.email');

// Show the form to reset the admin's password
Route::get('admin/reset-password/{token}', [AdminResetPasswordController::class, 'showResetForm'])->name('admin.password.reset');

// Handle the admin password reset
Route::post('admin/reset-password', [AdminResetPasswordController::class, 'reset'])->name('admin.password.update');

// ==================
// Admin Routes (Protected)
// ==================

// Admin dashboard (only accessible by authenticated admins)
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    });
});