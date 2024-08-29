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

// ==================
// Home Route
// ==================

Route::get('/', function () {
    return view('admin.dashboard');
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

// Log out the user (requires authentication)
Route::get('/logout', [UserController::class, 'logout'])->middleware('auth');

// ==================
// User Account Management Routes (Protected)
// ==================

// Display the user's account settings
Route::get('/users/account', [UserController::class, 'UserAccountSettings'])->middleware('auth');

// Show a specific user's account
Route::get('/user/account/{id}', [UserController::class, 'ShowUserAccount'])->name('user.account');

// Update the user's profile
Route::put('/user/update-profile', [UserController::class, 'updateProfile'])->name('user.updateProfile');

// Update the user's password
Route::put('/user/update-password', [UserController::class, 'updatePassword'])->name('user.updatePassword');

// ==================
// Shop Routes (Protected)
// ==================

// Show the shop page (only accessible by authenticated users)
Route::get('/shop', [ShopController::class, 'shop'])->middleware('auth');

// Show the products in the shop (only accessible by authenticated users)
Route::get('/shop', [ShopController::class, 'showProducts'])
->middleware('auth')
->name('shop');

// Show the details of a specific product
Route::get('/shop-details/{product_id}', [ShopController::class, 'showProductDetails'])
    ->middleware('auth')
    ->name('shop.details');



// Add product to cart
Route::post('/shop-cart/cart', [ShopController::class, 'store'])
    ->middleware('auth')
    ->name('cart.store');

// Show the checkout page
Route::get('/shop-checkout', [ShopController::class, 'ShowCheckout'])->middleware('auth');

Route::get('/shop-cart', [ShopController::class, 'showCart'])
    ->middleware('auth')
    ->name('shop.cart');

Route::get('/cart/remove/{rowId}', [ShopController::class, 'removeItem'])
    ->middleware('auth')
    ->name('cart.remove');

Route::get('/cart/clear', [ShopController::class, 'clearCart'])
    ->middleware('auth')
    ->name('cart.clear');








// ==================
// Password Reset Routes
// ==================

// Show the form to request a password reset link
Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');

// Handle the form submission and send the reset link
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// Show the form to reset the password using the provided token
Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');

// Handle the password reset and update it
Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

// ==================
// Admin Authentication Routes
// ==================

// Show the admin login page
Route::get('admin/login', [AdminController::class, 'showLoginForm'])->name('admin-login');

// Handle admin login submission
Route::post('/admin/login', [AdminController::class, 'store'])->name('admin');

// Log out the admin
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin-logout');

// ==================
// Admin Password Reset Routes
// ==================

// Show the form to request a password reset link for admins
Route::get('admin/forgot-password', [AdminForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.password.request');

// Handle the form submission and send the reset link to admins
Route::post('admin/forgot-password', [AdminForgotPasswordController::class, 'sendResetLinkEmail'])->name('admin.password.email');

// Show the form to reset the admin's password using the provided token
Route::get('admin/reset-password/{token}', [AdminResetPasswordController::class, 'showResetForm'])->name('admin.password.reset');

// Handle the admin password reset and update it
Route::post('admin/reset-password', [AdminResetPasswordController::class, 'reset'])->name('admin.password.update');

// ==================
// Admin Routes (Protected)
// ==================

Route::middleware(['auth:admin'])->group(function () {
    // Admin dashboard
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    });
});

Route::get('/products', [AdminController::class, 'showAll']);

Route::post('/add-products', [AdminController::class, 'add']);

Route::get('/order-list', [AdminController::class, 'orderList']);

Route::get('/order-list/order-details', [AdminController::class, 'orderDetails'])->name('order.details');

Route::get('/inventory', [AdminController::class, 'inventory'])->name('inventory');
