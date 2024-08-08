<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;

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

// Create New User
Route::post('/users', [UserController::class, 'store']);
// logout
Route::get('/logout', [UserController::class, 'logout']);
// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

//Showing shop pages 
Route::get('/shop', [ShopController::class, 'shop'])->middleware('auth');
