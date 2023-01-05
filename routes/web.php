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

// Route::prefix('admin')->group(function () {
//     Route::get('/', [AdminLoginControllerSetup::class,'AdminDashboard'])->name('admin.AdminDashboard');
// });
// Route::group(['prefix' => 'admin'], function () {
//     Route::get('/login', [AdminLoginControllerSetup::class,'AdminLogin'])->name('adminlogin');
//   //  Route::get('/', [AdminController::class,'Admindashboard'])->name('admin.dashboard');
// });

// /*
// |--------------------------------------------------------------------------
// | Web Routes
// |--------------------------------------------------------------------------
// |
// | Here is where you can register web routes for your application. These
// | routes are loaded by the RouteServiceProvider within a group which
// | contains the "web" middleware group. Now create something great!
// |
// */

Route::get('/', function () {
    return view('welcome');
});
