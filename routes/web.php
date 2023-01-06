<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class,'AdminLogin'])->name('adminlogin');
    Route::post('/login-store', [AdminController::class,'loginstore'])->name('admin-login-store');
});

Route::middleware('AdminRolesMangemnets')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class,'AdminDashboard'])->name('admin.AdminDashboard');
    Route::get('/admin-profile', [AdminController::class,'AdminShowProfile'])->name('admin.profile');
});
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

// Route::get('/', function () {
//     return view('welcome');
// });
