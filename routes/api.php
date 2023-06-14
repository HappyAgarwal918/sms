<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RegisterController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [RegisterController::class, 'createUser'])->name('register');
Route::post('login', [AuthController::class, 'loginUser'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum')->name('logout');
Route::post('forgot_password', [AuthController::class, 'forgot_password']);
Route::post('change_password', [AuthController::class, 'change_password'])->middleware('auth:sanctum');

Route::any('request_otp', [AuthController::class, 'requestOtp']);
Route::post('verify_otp', [AuthController::class, 'verifyOtp']);
Route::post('reset_password', [AuthController::class, 'reset_password']);

// Route::apiResource('posts', PostController::class)->middleware('auth:sanctum');