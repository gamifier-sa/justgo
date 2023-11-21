<?php


use App\Http\Controllers\Api\Users\Auth\ForgotPasswordController;
use App\Http\Controllers\Api\Users\Auth\ResetPasswordController;
use App\Http\Controllers\Api\Users\Auth\UserLoginController;
use App\Http\Controllers\Api\Users\Auth\UserRegisterController;
use App\Http\Controllers\Api\Users\Auth\UserProfileController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['namespace' => 'Api'], function () {

    Route::post('register',[UserRegisterController::class,'register']);
    Route::post('login', [UserLoginController::class, 'login']);

    Route::post('forgotpassword',[ForgotPasswordController::class,'forgotpassword']);
    Route::post('password/reset', [ResetPasswordController::class,'resetUserPassword']);

    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('myprofile',[UserProfileController::class,'myprofile']);
        Route::post('updateProfile',[UserProfileController::class,'updateProfile']);

    });
});
