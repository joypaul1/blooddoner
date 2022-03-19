<?php

namespace App\Providers;

use App\Models\SiteInfo;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        view()->composer('*', function ($view) {
            if (!session()->has('info')) {
                session()->put('info', SiteInfo::find(1));
            }

            view()->share('info', session()->get('info'));

            if ($view->getName() == 'backend.partials._footer') {
                session()->forget('info');
            }
        });
    }
}
