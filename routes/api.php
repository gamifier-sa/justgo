<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\Employees\Auth\EmployeeProfileController;
use App\Http\Controllers\Api\Employees\Auth\EmployeeLoginController;
use App\Http\Controllers\Api\Employees\Auth\ForgotPasswordController;
use App\Http\Controllers\Api\Employees\Auth\ResetPasswordController;
use App\Http\Controllers\Api\Employees\EmployeeJoinController;
use App\Http\Controllers\Api\Employees\NotificationController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\HomeController;
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


    Route::post('login', [EmployeeLoginController::class, 'login']);
    Route::post('forgotpassword', [ForgotPasswordController::class, 'forgotpassword']);
    Route::post('password/reset', [ResetPasswordController::class, 'resetEmployeePassword']);


    Route::group(['middleware' => 'auth:api'], function () {
    });
});
