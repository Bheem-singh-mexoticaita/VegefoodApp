<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\Admin\AdminLoginController;
Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', [AdminLoginController::class,'Adminlogin'])->name('adminlogin');
  //  Route::get('/', [AdminController::class,'Admindashboard'])->name('admin.dashboard');
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
