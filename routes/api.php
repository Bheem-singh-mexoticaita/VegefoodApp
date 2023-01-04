<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\Admin\AdminLoginController;
Route::group(['prefix' => 'v1'], function () {
    Route::POST('/login', [AdminLoginController::class,'loginstore'])->name('admin.apilogin');
});




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
