<?php

use App\Http\Controllers\Dashboard\{
    AdminController,
    AuthController,
    CategoryController,
    DashboardController,
    RoleController,
    SettingController,
    UserController,
    SalesController,
    ContactUsController,
    GymController,
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

        Route::group(['prefix' => 'dashboard'], function () {

            Route::controller(AuthController::class)->group(function () {
                Route::get('login', 'loginForm')->name('login');
                Route::post('login', 'login')->name('postLogin');

                Route::get('reset-password', 'getResetPassword')->name('getResetPassword');
                Route::post('reset-password', 'postResetPassword')->name('postResetPassword');
                Route::get('check-reset-password', 'checkResetCode');
                Route::post('change-password', 'changePassword')->name('changePassword');
            });

            Route::middleware(['auth:admins'])->group(function () {
                Route::controller(AuthController::class)->group(function () {
                    Route::get('logout', 'logout')->name('logout');
                });

                Route::controller(SalesController::class)->group(function () {
                    Route::get('sales', 'sales')->name('sales');
                });

                Route::controller(ContactUsController::class)->group(function () {
                    Route::get('contactus', 'contactus')->name('contactus');
                });

                Route::controller(DashboardController::class)->group(function () {
                    Route::get('/index', 'index')->name('index');
                    Route::get('/dashboard', 'dashboard')->name('dashboard');
                });

                Route::controller(AdminController::class)->prefix('admins')->name('admins.')->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('/create', 'create')->name('create');
                    Route::post('/store', 'store')->name('store');
                    Route::get('/{id}/edit', 'edit')->name('edit');
                    Route::put('/{id}/update', 'update')->name('update');
                    Route::delete('/{id}/', 'destroy')->name('delete');
                });

                Route::controller(UserController::class)->prefix('users')->name('users.')->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('/create', 'create')->name('create');
                    Route::post('/store', 'store')->name('store');
                    Route::get('/{id}/edit', 'edit')->name('edit');
                    Route::put('/{id}/update', 'update')->name('update');
                    Route::delete('/{id}/', 'destroy')->name('delete');
                });

                Route::controller(GymController::class)->prefix('gyms')->name('gyms.')->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('/create', 'create')->name('create');
                    Route::post('/store', 'store')->name('store');
                    Route::get('/{id}/edit', 'edit')->name('edit');
                    Route::put('/{id}/update', 'update')->name('update');
                    Route::delete('/{id}/', 'destroy')->name('delete');
                });

                Route::controller(PackageController::class)->prefix('packages')->name('packages.')->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('/create', 'create')->name('create');
                    Route::post('/store', 'store')->name('store');
                    Route::get('/{id}/edit', 'edit')->name('edit');
                    Route::put('/{id}/update', 'update')->name('update');
                    Route::delete('/{id}/', 'destroy')->name('delete');
                });

                Route::controller(OfferController::class)->prefix('offers')->name('offers.')->group(function () {
                    Route::get('/create', 'create')->name('create');
                    Route::post('/store', 'store')->name('store');
                    Route::put('/{id}/update', 'update')->name('update');
                });

                Route::controller(RoleController::class)->prefix('roles')->name('roles.')->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::post('/store', 'store')->name('store');
                    Route::get('/{id}/', 'show')->name('show');
                    Route::put('/{id}/', 'update')->name('update');
                    /** ajax routes **/
                    Route::get('role/{id}/admins', 'admins');
                });


                Route::get('gifts', function(){
                    return view('dashboard.gifts');
                })->name('gifts');

                Route::get('settings', function(){
                    return view('dashboard.settings');
                })->name('settings');




            });
        });
    }
);
