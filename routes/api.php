<?php

use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\ContactUsController;
use App\Http\Controllers\Api\FavouriteGymController;
use App\Http\Controllers\Api\GymController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\PackageController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\SubscriptionController;
use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\Api\Users\Auth\ForgotPasswordController;
use App\Http\Controllers\Api\Users\Auth\ResetPasswordController;
use App\Http\Controllers\Api\Users\Auth\UserLoginController;
use App\Http\Controllers\Api\Users\Auth\UserRegisterController;
use App\Http\Controllers\Api\Users\Auth\UserProfileController;
use App\Http\Controllers\Api\Users\NotificationController;
use App\Http\Controllers\Api\VisitController;
use App\Models\Package;
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
    // Payment webhook
    Route::controller(TransactionController::class)->group(function () {
        Route::get('transaction/webhook', 'webhook');
    });
    Route::post('register',[UserRegisterController::class,'register']);
    Route::post('login', [UserLoginController::class, 'login']);

    Route::post('password/request',[ForgotPasswordController::class,'sendResetPasswordCode']);
    Route::post('password/code/check',[ForgotPasswordController::class,'checkConfirmationCode']);
    Route::post('password/reset', [ResetPasswordController::class,'resetUserPassword']);
    // GymRoute
    Route::get('gyms',[GymController::class,'index']);
    Route::get('gym',[GymController::class,'show']);
    Route::get('gymbypackage',[GymController::class,'gymbypackage']);

    // PackageRoute
    Route::get('packages',[PackageController::class,'index']);
    Route::get('packages/{id}',[PackageController::class,'show']);

    Route::get('home',[HomeController::class,'index']);
    Route::get('setting',[SettingController::class,'setting']);
    Route::get('cities',[CityController::class,'cities']);
    Route::get('notification',[NotificationController::class,'index']);
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('myprofile',[UserProfileController::class,'myprofile']);
        Route::post('updateProfile',[UserProfileController::class,'updateProfile']);
        Route::post('review/store',[ReviewController::class,'store']);
        Route::post('Addfavourit',[FavouriteGymController::class,'Addfavourit']);
        Route::post('subscription/store',[SubscriptionController::class,'store']);
        Route::get('myfavorites',[FavouriteGymController::class,'myfavorites']);
        Route::get('uservisits',[VisitController::class,'index']);
        Route::post('visit/store',[VisitController::class,'store']);
        Route::get('mypackage',[UserProfileController::class,'mypackage']);
        Route::post('contactus',[ContactUsController::class,'contactus']);

    });
});
