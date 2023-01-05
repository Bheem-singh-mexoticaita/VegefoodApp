<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Admin\AdminApiController;
Route::prefix('v1')->group(function () {
    Route::POST('/login', [AdminApiController::class,'loginWithAPI'])->name('admin.apilogin');
});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });