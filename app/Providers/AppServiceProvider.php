<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Response;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

        $this->registerPolicies();

        $this->add_response_statuses();

        Gate::before(function ($admin, $ability){
            if(Auth::guard('admins')->check()&& $admin->abilities()->contains($ability)){
                return true;
            }
        });
    }
    private function add_response_statuses()
    {
        Response::macro("success", function (array $extra = []) {
            return response()->json(array_merge([
                'status' => 'success',
            ], $extra), 200);
        });

        Response::macro("fail", function (array $extra = [], int $code = 400) {
            return response()->json(array_merge([
                'status' => 'fail',
            ], $extra), $code);
        });

    }
}
