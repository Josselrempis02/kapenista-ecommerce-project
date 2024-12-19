<?php

use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SalesReportController;
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
    return view('index');
});


Route::middleware('guest:web')->group(function () {
   // Show the login page for users
    Route::get('/login', [UserController::class, 'login'])->name('login');
    
    // Authenticate the user (log in)
    Route::post('/users/authenticate', [UserController::class, 'authenticate']);
    
    });
// ==================
// User Authentication Routes
// ==================



// Show the signup page for new users
Route::get('/signup', [UserController::class, 'signup']);

// Handle Google OAuth login
Route::get('auth/google', [UserController::class, 'redirectToGoogle'])->name('login.google');

// Handle the callback after Google authentication
Route::get('auth/google/callback', [UserController::class, 'handleGoogleCallback']);

// Create a new user
Route::post('/users', [UserController::class, 'store']);



// Log out the user (requires authentication)
Route::get('/logout', [UserController::class, 'logout'])->middleware('auth');

// ==================
// User Account Management Routes (Protected)
// ==================

// Display the user's account settings
Route::get('/users/account', [UserController::class, 'UserAccountSettings'])->middleware('auth');

//Display Purchase
Route::get('/users/purchase', [UserController::class, 'UserPurchase'])
->middleware('auth')
->name('user.purchase');

// Show a specific user's account
Route::get('/user/account/{id}', [UserController::class, 'ShowUserAccount'])
->name('user.account');

// Update the user's profile
Route::put('/user/update-profile', [UserController::class, 'updateProfile'])->name('user.updateProfile');

// Update the user's password
Route::put('/user/update-password', [UserController::class, 'updatePassword'])->name('user.updatePassword');

// User Order list
Route::get('/user/order-list', [UserController::class, 'UserOrder'])->name('user.orders.index');

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

//Filter by Category
Route::get('/shop/category/{category}', [ShopController::class, 'showByCategory'])->name('shop.category');



// Add product to cart
Route::post('/shop-cart/cart', [ShopController::class, 'store'])
    ->middleware('auth')
    ->name('cart.store');

// Show the checkout page
Route::get('/shop-checkout', [ShopController::class, 'ShowCheckout'])->middleware('auth');


Route::post('/shop-checkout/place-order', [PaymentController::class, 'placeOrder'])
->name('checkout.process');

Route::get('/shop-cart', [ShopController::class, 'showCart'])
    ->middleware('auth')
    ->name('shop.cart');

Route::get('/cart/remove/{rowId}', [ShopController::class, 'removeItem'])
    ->middleware('auth')
    ->name('cart.remove');

Route::get('/cart/clear', [ShopController::class, 'clearCart'])
    ->middleware('auth')
    ->name('cart.clear');



Route::post('/cart/update', [ShopController::class, 'update'])->name('cart.update');






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
Route::middleware('guest:admin')->group(function () {
// Show the admin login page
Route::get('admin/login', [AdminController::class, 'showLoginForm'])->name('admin-login');

// Handle admin login submission
Route::post('/admin/login', [AdminController::class, 'store'])->name('admin');


});

Route::middleware('guest:staff')->group(function () {
    // Show the admin login page
    Route::get('admin/login', [AdminController::class, 'showLoginForm'])->name('admin-login');
    
    // Handle admin login submission
    Route::post('/admin/login', [AdminController::class, 'store'])->name('admin');
    
    });

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

Route::middleware(['auth:admin,staff'])->group(function () {
 

    // Show Dashboard
    Route::get('/admin/dashboard', [AdminController::class, 'showDashboard']);

    // Show all products
    Route::get('/products', [AdminController::class, 'showAll']);

    // Add products
    Route::post('/add-products', [AdminController::class, 'add'])->name('products.store');
    

    // Edit products
     Route::put('/products/edit/{product_id}', [AdminController::class, 'updateProduct'])->name('update');

     //Delete category
     Route::delete('/products/delete/{product_id}', [AdminController::class, 'destroyProduct'])->name('products.destroy');

    // Order list
    Route::get('/order-list', [AdminController::class, 'customerOrder'])->name('admin.orders.index');

    // Order details
    Route::get('/order-list/order-details/{order_id}', [AdminController::class, 'orderDetails'])->name('order.details');


    // Update order status
    Route::post('/orders/{order}/status', [AdminController::class, 'updateOrderStatus'])->name('order.updateStatus');

    
    //Show Staff page
    Route::get('/staff-list', [AdminController::class, 'staffList']);
    
    Route::post('/add-staff', [AdminController::class, 'addStaff'])->name('admin.staff.store');

    //Edit staff 
    Route::put('/staff/edit/{id}', [AdminController::class, 'updateStaff'])->name('admin.staff.update');

    //Delete Staff
    Route::delete('/staff/delete/{id}', [AdminController::class, 'destroy'])->name('admin.staff.destroy');

    //Category List
    Route::get('/category-list', [CategoryController::class, 'categoryList']);

    //Add Category 
    Route::post('/category-staff', [CategoryController::class, 'addCategory'])->name('admin.category.store');

     //Edit category 
     Route::put('/category/edit/{id}', [CategoryController::class, 'updateCategory'])->name('admin.category.update');

     //Delete category
     Route::delete('/category/delete/{id}', [CategoryController::class, 'destroyCategory'])->name('admin.category.destroy');

     //Show Invetory
    // Inventory
    Route::get('/inventory', [AdminController::class, 'showInventory'])->name('inventory');

    Route::put('/products/{id}', [AdminController::class, 'updateInventory'])->name('products.update');

    //Show Customer list

    Route::get('/customer-list', [AdminController::class, 'showCustomerList'])->name('CustomerList');

     //Delete Staff
     Route::delete('/user/delete/{id}', [AdminController::class, 'destroyCustomer'])->name('customer.destroy');

     //Show Sales-report
     Route::get('/sales-report', [SalesReportController::class, 'showSalesReport'])->name('showSalesReport');

     Route::get('/export-sales-report', [SalesReportController::class, 'exportPDF'])->name('export.sales.report');

     Route::get('/admin/notifications', [NotificationController::class, 'indexAdmin'])->name('admin.notifications');
     Route::post('/admin/notifications/{id}', [NotificationController::class, 'markAsReadAdmin'])->name('admin.notifications.read');
 

});



Route::get('/my-purchase', [UserController::class, 'showMyPurchase'])->middleware('auth')->name('mypurchases');
Route::get('/orders/{order_id}/details', [UserController::class, 'showOrderDetails'])->middleware('auth')->name('orders.details');
Route::put('/order/{order}/received', [UserController::class, 'markAsReceived'])->middleware('auth')->name('order.received');
Route::put('/order/{order}/cancelled', [UserController::class, 'cancelOrder'])->middleware('auth')->name('order.cancel');


Route::get('/order-message/{order_number}', [UserController::class, 'showOrderMessage'])->middleware('auth')->name('OrderMessage');


Route::middleware(['auth'])->group(function () {

    Route::get('/notification', [NotificationController::class, 'showNotif'])->name('notif.index');
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
Route::get('/notifications/read/{id}', [NotificationController::class, 'markAsRead'])->name('notifications.read');


});

