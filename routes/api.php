<?php

use App\Http\Controllers\Api\Users\Auth\UserLoginController;
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

    Route::get('sssss',[UserLoginController::class,'test']);

    Route::post('login', [UserLoginController::class, 'login']);
   


    Route::group(['middleware' => 'auth:api'], function () {
    });
});
