<?php

namespace App\Providers;

use App\Models\admin\PublicSetting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }



    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        foreach (config('permissions') as $config_permission => $value) {
            Gate::define($config_permission, function ($auth) use ($config_permission) {
                return $auth->hasAccess($config_permission);
            });
        }
        ########### Share Setting
        View::composer('*', function ($view) {
            $setting = PublicSetting::first();
            $view->with('setting', $setting);
        });

        ########### Share Setting
    }
}
