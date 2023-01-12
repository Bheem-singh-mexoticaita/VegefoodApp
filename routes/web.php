<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\PlanController;
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class,'AdminLogin'])->name('adminlogin');
    Route::post('/login-store', [AdminController::class,'loginstore'])->name('admin-login-store');
});

Route::middleware('AdminRolesMangemnets')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class,'AdminDashboard'])->name('admin.AdminDashboard');
    Route::get('/admin-profile', [AdminController::class,'AdminShowProfile'])->name('admin.profile');
});
Route::get('checkout', [PlanController::class, 'index']);
Route::get('checkout/{plan}', [PlanController::class, 'show'])->name("plans.show");
Route::post('subscription', [PlanController::class, 'subscription'])->name("subscription.create");
Route::get('PaymentSucuss', [PlanController::class, 'PaymentSucuss'])->name("PaymentSucuss");
Route::post('Paymenterror', [PlanController::class, 'Paymenterror'])->name("Paymenterror");


