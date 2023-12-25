<?php


use App\Http\Controllers\Gym\{
    AuthController,
    DashboardController,
    SettingController,
    UserController,
    SalesController,
    ContactUsController,
    NotificationController

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
                Route::get('/', 'index')->name('gyms.index');
                Route::get('/dashboard', 'dashboard')->name('gyms.dashboard');
            });


            Route::controller(UserController::class)->prefix('users')->name('users.')->group(function () {
                Route::get('/', 'index')->name('gyms.index');
                Route::get('/create', 'create')->name('gyms.create');
                Route::post('/store', 'store')->name('gyms.store');
                Route::get('/{id}/edit', 'edit')->name('gyms.edit');
                Route::put('/{id}/update', 'update')->name('gyms.update');
                Route::delete('/{id}/', 'destroy')->name('gyms.delete');
                Route::get('search' ,'search')->name('gyms.search');

            });
            Route::controller(SalesController::class)->group(function () {
                Route::get('sales', 'sales')->name('gyms.sales');
            });
            Route::controller(ContactUsController::class)->group(function () {
                Route::get('contactus', 'contactus')->name('gyms.contactus');
                Route::get('search' ,'search')->name('gyms.contactus.search');
            });
            Route::get('settings',[SettingController::class,'settings'])->name('gyms.settings');
            Route::put('settings/uodate/{id}',[SettingController::class,'update'])->name('gyms.settings.update');
            Route::post('deleteimage/{id}/', [SettingController::class,'deleteimage'])->name('gyms.settings.deleteimage');

            Route::post('pushendSubscription', [NotificationController::class, 'endSubscription'])->name('gyms.endSubscription');
            Route::post('pushToAllusers', [NotificationController::class, 'pushToAllusers'])->name('gyms.pushToAllusers');
            Route::post('seletedUsers', [NotificationController::class, 'seletedUsers'])->name('gyms.seletedUsers');
        });
    }
);
