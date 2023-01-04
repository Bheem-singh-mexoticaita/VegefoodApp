<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\Admin\AdminLoginController;

Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', [AdminLoginController::class,'Adminlogin'])->name('adminlogin');
  //  Route::get('/', [AdminController::class,'Admindashboard'])->name('admin.dashboard');
});



// Route::group(['prefix' => 'admin'], function () {
    //     Route::get('/', [AdminController::class,'index'])->name('admin.dashboard');
    // });



