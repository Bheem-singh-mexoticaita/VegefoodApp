<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Admin\AdminApiController;

Route::prefix('v1')->group(function () {
    Route::POST('/login', [AdminApiController::class,'loginWithAPI'])->name('admin.apilogin');
});
Route::middleware('auth:sanctum')->prefix('v1')->group(function () {
    Route::get('/fetchAdminDetails', [AdminApiController::class,'fetchAdminDetails'])->name('admin.admindetails');
});

// /*
// |--------------------------------------------------------------------------
// | API Routes
// |--------------------------------------------------------------------------
// |
// | Here is where you can register API routes for your application. These
// | routes are loaded by the RouteServiceProvider within a group which
// | is assigned the "api" middleware group. Enjoy building your API!
// |
// */

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
