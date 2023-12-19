<?php

use App\Http\Controllers\Gym\{
    AdminController,
    AuthController,
    CategoryController,
    DashboardController,
    RoleController,
    SettingController,
    UserController,
    SalesController,
    ContactUsController,
    GiftController,
    GymController,
    NotificationController,
    PackageController,
    OfferController
};


use Illuminate\Support\Facades\{Artisan, Route};
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ],
    function () {

            Route::controller(AuthController::class)->group(function () {
                Route::get('login', 'loginForm')->name('gyms.login');
                Route::post('login', 'login')->name('gyms.postLogin');
                Route::get('register', 'registerForm')->name('gyms.register');
                Route::post('register', 'registerPost')->name('gyms.PostRegister');

                Route::get('reset-password', 'getResetPassword')->name('gyms.getResetPassword');
                Route::post('reset-password', 'postResetPassword')->name('gyms.postResetPassword');
                Route::get('check-reset-password', 'checkResetCode');
                Route::post('change-password', 'changePassword')->name('gyms.changePassword');
            });

            Route::middleware(['auth:gyms'])->group(function () {
                Route::controller(AuthController::class)->group(function () {
                    Route::get('logout', 'logout')->name('gyms.logout');
                });



                Route::controller(DashboardController::class)->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('/dashboard', 'dashboard')->name('gyms.dashboard');
                });









        });
    }
);
