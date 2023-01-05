<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminLoginControllerSetup;
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminLoginControllerSetup::class,'AdminLogin'])->name('adminlogin');
    Route::post('/login-store', [AdminLoginControllerSetup::class,'loginstore'])->name('admin-login-store');
});
Route::middleware('AdminRolesMangemnets')->prefix('admin')->group(function () {
    Route::get('/', [AdminLoginControllerSetup::class,'AdminDashboard'])->name('admin.AdminDashboard');
});


Route::get('/', function () {
    return view('welcome');
});
